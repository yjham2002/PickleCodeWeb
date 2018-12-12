<? include_once $_SERVER["DOCUMENT_ROOT"]."/main/inc/subHeader.php"; ?>
<? include_once $_SERVER["DOCUMENT_ROOT"]."/main/shared/public/classes/WebRoute.php"; ?>
<?

$router = new WebRoute();
$router->updateNoticeHit();
$item = $router->getNotice();
?>

<script>
    $(document).ready(function(){
        buttonLink(".jBack", "notice.php");

    });
</script>
    <!-- styles
    ================================================== -->
    <section id="styles" class="s-sub">
        <div class="row add-bottom">
            <div class="col-twelve">

                <h3>공지사항 상세보기</h3>

                <div class="table-responsive">
                    <?
                    $madeName = "관리자";
                    if($item["madeBy"] != 0) $madeName .= "(".$item["madeName"].")";
                    ?>
                    <table>
                        <thead>
                        <tr>
                            <th><?=$item["id"]?></th>
                            <th colspan="3"><?=$item["title"]?></th>
                        </tr>
                        <tr>
                            <th>작성자</th>
                            <td><?=$madeName?></td>
                            <th>조회</th>
                            <th><?=$item["hit"]?></th>
                        </tr>
                        </thead>
                        <tbody class="jContainer">
                        <tr>
                            <td colspan="4"><?=$item["desc"]?></td>
                        </tr>
                        </tbody>
                    </table>

                </div>

                <div class="text-center">
                <button class="btn btn--stroke jBack" ><i class="fa fa-list"></i>목록으로</button>
                </div>

            </div>

        </div> <!-- end row -->
    </section>
<? include_once $_SERVER["DOCUMENT_ROOT"]."/main/inc/subFooter.php"; ?>