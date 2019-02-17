<? include_once $_SERVER["DOCUMENT_ROOT"]."/main/admin/inc/header.php"; ?>
<?
if(!AuthUtil::isLoggedIn()){
    echo "<script>alert('로그인 후 이용 가능한 서비스입니다.'); location.href='login.php';</script>";
}
?>
<script>
    $(document).ready(function(){

        $(".jSubmit").click(function(){
            callJson(
                "/main/shared/public/route.php?F=WebRoute.saveQuery",
                {
                    userId : "<?=$_REQUEST["id"]?>",
                    title : $(".jTitle").val(),
                    isReply : 1,
                    budget : $(".jMoney").val(),
                    content : $(".jContent").val(),
                    queryOf : $("#queryOf").val()
                }
                , function(data){
                    if(data.returnCode > 0){
                        alert(data.returnMessage);
                        if(data.returnCode > 1){
                        }else{
                            location.reload();
                        }
                    }else{
                        alert("오류가 발생하였습니다.\n관리자에게 문의하세요.");
                    }
                }
            )
        });

        buttonLink(".jGoList", "queryManage.php");

        $(".jReply").hide();
        var Visflag = false;
        $(".jReplyShow").click(function(e){
            e.preventDefault();
            e.stopPropagation();

            $("#queryOf").val('0');

            if(Visflag) {
                $(".jReply").fadeOut();
                Visflag = false;
            }else{
                $(".jReply").fadeIn();
                Visflag = true;
            }
        });

        // Query List

        var currentPage = 1;
        var isFinal = false;

        function loadMore(page){
            loadPageInto(
                "/main/ajaxPages/ajaxAdminQueryDetailList.php",
                {
                    id : "<?=$_REQUEST["id"]?>",
                    page : page,
                    query : "<?=$_REQUEST["query"]?>"
                },
                ".jContainer",
                true,
                function(){
                    isFinal = true;
                    currentPage--;
                    $(".jLoadMore").hide();
                }
            );
        }

        loadMore(currentPage);

        $(".jLoadMore").click(function(){
            loadMore(++currentPage);
        });

        $(document).on("click", ".jDeny", function(e){
            e.preventDefault();
            e.stopPropagation();
            callJson(
                "/main/shared/public/route.php?F=WebRoute.denyQuery",
                {
                    id : $(this).attr("queryId"),
                    denyFlag : $(this).attr("flag")
                }
                , function(data){
                    if(data.returnCode > 0){
                        alert(data.returnMessage);
                        if(data.returnCode > 1){
                        }else{
                            location.reload();
                        }
                    }else{
                        alert("오류가 발생하였습니다.\n관리자에게 문의하세요.");
                    }
                }
            )
        });

        $(document).on("click", ".jDetail", function(){
            var id = $(this).attr("placeContent");
            var qOf = $(this).attr("queryOf");
            $("#queryOf").val(qOf);
            if(Visflag) {
            }else{
                $(".jReply").fadeIn();
                Visflag = true;
            }

            $(".jTitle").val(id);

        });

    });
</script>
    <!-- styles
    ================================================== -->
    <section id="styles" class="s-sub" >
        <div class="row">
            <div class="col-twelve tab-full">
                <h3>문의 관리</h3>
                <a href="#" class="btn btn--primary jGoList"><i class="fa fa-list">&nbsp;</i>목록으로</a>
                <a href="#" class="btn btn--primary jReplyShow"><i class="fa fa-pencil-alt">&nbsp;</i>답변하기</a>

                <div class="col-twelve tab-full jReply">
                    <h3>문의하기</h3>
                    <form>
                        <div>
                            <label for="jTitle">제목</label>
                            <input type="hidden" id="queryOf" value="0" />
                            <input class="full-width jTitle" type="text" placeholder="제목" id="jTitle">
                        </div>
                        <div>
                            <label for="jMoney">예산(단위:원)</label>
                            <input class="full-width jMoney" type="number" placeholder="예산(선택입력)" id="jMoney">
                        </div>
                        <div>
                            <label for="jContent">문의 내용</label>
                            <textarea class="full-width jContent" placeholder="문의 내용" id="jContent"></textarea>
                        </div>
                        <div class="text-center">
                            <a class="jSubmit btn btn--primary">제출</a>
                        </div>
                    </form>
                </div>

                <div class="jQL jPanel">
                    <div class="jContainer" style="padding-bottom: 30px !important;">
                    </div>
                    <div class="text-center">
                        <button class="btn btn--stroke jLoadMore" style="margin-top: 20px;" ><i class="fa fa-spinner"></i>더보기</button>
                    </div>
                </div>
            </div>

        </div> <!-- end row -->
    </section>
<? include_once $_SERVER["DOCUMENT_ROOT"]."/main/admin/inc/footer.php"; ?>