<? include_once $_SERVER["DOCUMENT_ROOT"]."/main/inc/subHeader.php"; ?>
<? include_once $_SERVER["DOCUMENT_ROOT"]."/main/shared/public/classes/WebRoute.php"; ?>
<?
    if(!AuthUtil::isLoggedIn()){
        echo "<script>alert('로그인 후 이용 가능한 서비스입니다.'); location.href='login.php';</script>";
    }

    $router = new WebRoute();
    $classList = $router->getClassList();

?>
<script>
    $(document).ready(function(){
        $(".jSubmit").click(function(){
            if($(".jTitle").val() == ""
                || $(".jContent").val() == ""
                || $(".jClass").val() == ""
                ){
                alert("문의 정보를 모두 입력하세요.");
                return;
            }

            callJson(
                "/main/shared/public/route.php?F=WebRoute.saveQuery",
                {
                    userId : "<?=AuthUtil::getLoggedInfo()->id?>",
                    budget : $(".jMoney").val(),
                    title : $(".jTitle").val(),
                    content : $(".jContent").val(),
                    classId : $(".jClass").val()
                }
                , function(data){
                    if(data.returnCode > 0){
                        alert(data.returnMessage);
                        if(data.returnCode > 1){
                        }else{
                            location.href="profile.php";
                        }
                    }else{
                        alert("오류가 발생하였습니다.\n관리자에게 문의하세요.");
                    }
                }
            )
        });
    });
</script>
    <!-- styles
    ================================================== -->
    <section id="styles" class="s-sub" >
        <div class="row">
            <div class="col-twelve tab-full">
                <h3>문의하기</h3>
                <form>
                    <div>
                        <label for="jTitle">제목</label>
                        <input class="full-width jTitle" type="text" placeholder="제목" id="jTitle">
                    </div>
                    <div>
                        <label for="jMoney">예산(단위:원)</label>
                        <input class="full-width jMoney" type="number" placeholder="예산(선택입력)" id="jMoney">
                    </div>
                    <div>
                        <label for="jClass">분류</label>
                        <div class="cl-custom-select">
                            <select class="full-width jClass" id="jClass">
                                <option value="0">미분류</option>
                                <?foreach ($classList as $item){?>
                                    <option value="<?=$item["id"]?>"><?=$item["className"]?></option>
                                <?}?>
                            </select>
                        </div>
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

        </div> <!-- end row -->
    </section>
<? include_once $_SERVER["DOCUMENT_ROOT"]."/main/inc/subFooter.php"; ?>