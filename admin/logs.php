<? include_once $_SERVER["DOCUMENT_ROOT"]."/main/admin/inc/header.php"; ?>
<? include_once $_SERVER["DOCUMENT_ROOT"]."/main/shared/public/classes/AdminRoute.php"; ?>
<?
$route = new AdminRoute();
$statData = $route->getStatisticData();

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
                "/main/ajaxPages/ajaxInboundList.php",
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

//        $(document).on("click", ".jDetail", function(){
//            var id = $(this).attr("queryId");
//            location.href = "queryDetail.php?id=" + id;
//        });
    });

    window.onload = function() {

        <?
        $total = $statData["count"]["cnt_total"];
        $facebook = $statData["count"]["cnt_facebook"];
        $login = $statData["count"]["cnt_login"];
        $fb_iab = $statData["count"]["cnt_facebook_iab"];

        $ratio1_l = $facebook / $total * 100.0;
        $ratio1_r = ($total - $facebook) / $total * 100.0;

        $ratio2_l = $login / $total * 100.0;
        $ratio2_r = ($total - $login) / $total * 100.0;

        $ratio3_l = $fb_iab / $facebook * 100.0;
        $ratio3_r = ($facebook - $fb_iab) / $facebook * 100.0;
        ?>

        var chart1 = new CanvasJS.Chart("chartContainer1", {
            animationEnabled: true,
            title: {
                text: "총 유입량 대비 페이스북 유입량"
            },
            data: [{
                type: "pie",
                startAngle: 240,
                yValueFormatString: "##0.00\"%\"",
                indexLabel: "{label} {y}",
                dataPoints: [
                    {y: <?=$ratio1_l?>, label: "페이스북"},
                    {y: <?=$ratio1_r?>, label: "일반"}
                ]
            }]
        });
        chart1.render();

        var chart2 = new CanvasJS.Chart("chartContainer2", {
            animationEnabled: true,
            title: {
                text: "총 유입량 대비 로그인 유입량"
            },
            data: [{
                type: "pie",
                startAngle: 240,
                yValueFormatString: "##0.00\"%\"",
                indexLabel: "{label} {y}",
                dataPoints: [
                    {y: <?=$ratio2_l?>, label: "회원"},
                    {y: <?=$ratio2_r?>, label: "비회원"}
                ]
            }]
        });
        chart2.render();

        var chart3 = new CanvasJS.Chart("chartContainer3", {
            animationEnabled: true,
            title: {
                text: "Agent별 유입량"
            },
            data: [{
                type: "pie",
                startAngle: 240,
                yValueFormatString: "##0.00\"%\"",
                indexLabel: "{label} {y}",
                dataPoints: [
                    <?foreach ($statData["agent"] as $agent){?>
                    {y: <?=$agent["cnt"]?>, label: "<?=str_replace("\"", "", $agent["agent"])?>"},
                    <?}?>
                ]
            }]
        });
        chart3.render();
//
        var chart4 = new CanvasJS.Chart("chartContainer4", {
            animationEnabled: true,
            title: {
                text: "페이스북 유입량 비율"
            },
            data: [{
                type: "pie",
                startAngle: 240,
                yValueFormatString: "##0.00\"%\"",
                indexLabel: "{label} {y}",
                dataPoints: [
                    {y: <?=$ratio3_l?>, label: "Link"},
                    {y: <?=$ratio3_r?>, label: "IAB"}
                ]
            }]
        });
        chart4.render();

    }

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
                <h1>접속기록</h1>
                <h3>인바운드 접속 기록</h3>
                <a href="#" class="btn btn--primary jShow" vTarget=".jInfo"><i class="fa fa-chart-pie">&nbsp;</i>접속통계</a>
                <a href="#" class="btn btn--primary jShow" vTarget=".jQL"><i class="fa fa-list">&nbsp;</i>접속기록</a>
                <div class="jInfo jPanel">
                    <h5>총 유입량 : <?=$statData["count"]["cnt_total"]?> / 페이스북 유입량 : <?=$statData["count"]["cnt_facebook"]?> / 회원 유입량 : <?=$statData["count"]["cnt_login"]?></h5>
                    <div class="col-twelve" style="margin-bottom: 50px;">
                        <div id="chartContainer1" class="col-six" style="height: 300px;"></div>
                        <div id="chartContainer2" class="col-six" style="height: 300px;"></div>
                    </div>
                    <div class="col-twelve" style="margin-bottom: 50px;">
                        <div id="chartContainer3" class="col-six" style="height: 300px;"></div>
                        <div id="chartContainer4" class="col-six" style="height: 300px;"></div>
                    </div>
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
