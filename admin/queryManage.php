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
                "/main/ajaxPages/ajaxAdminQueryList.php",
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
            location.href = "queryManageDetail.php?id=" + id;
        });

    });
</script>
    <!-- styles
    ================================================== -->
    <section id="styles" class="s-sub" >
        <div class="row">
            <div class="col-twelve tab-full">
                <h3>문의 관리</h3>
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