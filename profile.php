<? include_once $_SERVER["DOCUMENT_ROOT"]."/main/inc/subHeader.php"; ?>
<?
if(!AuthUtil::isLoggedIn()){
    echo "<script>alert('로그인 후 이용 가능한 서비스입니다.'); location.href='login.php';</script>";
}
?>
<script>
    $(document).ready(function(){
        $(".jPanel").hide();
        $(".jPanel").first().show();

        $(".jShow").click(function () {
            $(".jPanel").hide();
            var tg = $(this).attr("vTarget");
            $(tg).fadeIn();
        });

        var currentPage = 1;
        var isFinal = false;

        function loadMore(page){
            loadPageInto(
                "/main/ajaxPages/ajaxQueryList.php",
                {
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

        $(document).on("click", ".jDetail", function(){
            var id = $(this).attr("queryId");
            location.href = "queryDetail.php?id=" + id;
        });
    });
</script>
    <!-- styles
    ================================================== -->
    <section id="styles" class="s-sub" >
        <div class="row">
            <div class="col-twelve tab-full">
                <?
                $displayName =
                    AuthUtil::getLoggedInfo()->name."(".AuthUtil::getLoggedInfo()->company.")";
                ?>
                <h3>대시보드</h3>
                <p><b><?=$displayName?></b>님의 정보를 확인합니다.</p>
                <a href="#" class="btn btn--primary jShow" vTarget=".jInfo"><i class="fa fa-user">&nbsp;</i>회원정보</a>
                <a href="#" class="btn btn--primary jShow" vTarget=".jQL"><i class="fa fa-question">&nbsp;</i>문의내역</a>
                <a href="query.php" class="btn btn--medium btn--pill"><i class="fa fa-plus"></i>&nbsp;문의하기</a>
                <div class="jInfo jPanel">
                <h3>회원정보</h3>
                    <p>※ 회원정보 수정은 관리자에게 문의바랍니다.</p>
                <form>
                    <div>
                        <label for="jName">성명</label>
                        <input disabled class="full-width jNameTxt" type="text" value="<?=AuthUtil::getLoggedInfo()->name?>" id="jName">
                    </div>
                    <div>
                        <label for="jEmail">이메일</label>
                        <input disabled class="full-width jEmailTxt" type="email" value="<?=AuthUtil::getLoggedInfo()->email?>" id="jEmail">
                    </div>
                    <div>
                        <label for="jPhoneTxt">전화번호</label>
                        <input disabled class="full-width jPhoneTxt" type="text" value=<?=AuthUtil::getLoggedInfo()->phone?> id="jPhoneTxt">
                    </div>
                    <div>
                        <label for="jCompanyTxt">회사명</label>
                        <input disabled class="full-width jCompanyTxt" type="text" value=<?=AuthUtil::getLoggedInfo()->company?> id="jCompanyTxt">
                    </div>
                    <div>
                        <label for="jRoleTxt">직책/직급</label>
                        <input disabled class="full-width jRoleTxt" type="text" value=<?=AuthUtil::getLoggedInfo()->role?> id="jRoleTxt">
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
<? include_once $_SERVER["DOCUMENT_ROOT"]."/main/inc/subFooter.php"; ?>