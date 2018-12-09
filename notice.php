<? include_once $_SERVER["DOCUMENT_ROOT"]."/main/inc/subHeader.php"; ?>

<script>
    $(document).ready(function(){

        var currentPage = 1;
        var isFinal = false;

        function loadMore(page){
            loadPageInto(
                "/main/ajaxPages/ajaxNoticeList.php",
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
            var id = $(this).attr("noticeID");
            location.href = "noticeDetail.php?id=" + id;
        });

    });
</script>
    <!-- styles
    ================================================== -->
    <section id="styles" class="s-about">
        <div class="row add-bottom">
            <div class="col-twelve">

                <h3>공지사항</h3>
                <p>피클코드의 최신 소식을 전해드립니다.</p>

                <div class="table-responsive">

                    <table>
                        <thead>
                        <tr>
                            <th>번호</th>
                            <th>제목</th>
                            <th>작성자</th>
                            <th>조회</th>
                            <th>등록일시</th>
                        </tr>
                        </thead>
                        <tbody class="jContainer">
                        </tbody>
                    </table>

                </div>

                <div class="text-center">
                <button class="btn btn--stroke jLoadMore" ><i class="fa fa-spinner"></i>더보기</button>
                </div>

            </div>

        </div> <!-- end row -->
    </section>
<? include_once $_SERVER["DOCUMENT_ROOT"]."/main/inc/subFooter.php"; ?>