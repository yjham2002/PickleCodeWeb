<? include_once $_SERVER["DOCUMENT_ROOT"]."/main/admin/inc/header.php"; ?>
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

        // Query List

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

        // Project List

        var currentPageP = 1;
        var isFinalP = false;

        function loadMoreP(page){
            loadPageInto(
                "/main/ajaxPages/ajaxProjectList.php",
                {
                    page : page,
                    query : "<?=$_REQUEST["query"]?>"
                },
                ".jContainerP",
                true,
                function(){
                    isFinalP = true;
                    currentPageP--;
                    $(".jLoadMoreP").hide();
                }
            );
        }

        loadMoreP(currentPageP);

        $(".jLoadMoreP").click(function(){
            loadMoreP(++currentPageP);
        });

        $(document).on("click", ".jDetailP", function(){
            var id = $(this).attr("queryId");
            location.href = "projectDetail.php?id=" + id;
        });
    });
</script>
    <!-- styles
    ================================================== -->
    <section id="styles" class="s-sub" >
        <div class="row">
            <div class="col-twelve tab-full">
                <h3>프로젝트 관리</h3>
                <div class="jProject jPanel">
                    <div class="jContainerP" style="padding-bottom: 30px !important;">
                    </div>
                    <div class="text-center">
                        <button class="btn btn--stroke jLoadMoreP" style="margin-top: 20px;" ><i class="fa fa-spinner"></i>더보기</button>
                    </div>
                </div>
            </div>

        </div> <!-- end row -->
    </section>
<? include_once $_SERVER["DOCUMENT_ROOT"]."/main/admin/inc/footer.php"; ?>