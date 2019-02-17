<? include_once $_SERVER["DOCUMENT_ROOT"]."/main/admin/inc/header.php"; ?>
<? include_once $_SERVER["DOCUMENT_ROOT"]."/main/shared/public/classes/AdminRoute.php"; ?>
<?
$route = new AdminRoute();
$stat = $route->getProjectInfo();
?>

<?
$total = $stat["cnt_total"];
$facebook = $stat["cnt_facebook"];
$login = $stat["cnt_login"];
$fb_iab = $stat["cnt_facebook_iab"];

$ratio1_l = $facebook / $total * 100.0;
$ratio1_r = ($total - $facebook) / $total * 100.0;

$ratio2_l = $login / $total * 100.0;
$ratio2_r = ($total - $login) / $total * 100.0;

$ratio3_l = $fb_iab / $facebook * 100.0;
$ratio3_r = ($facebook - $fb_iab) / $facebook * 100.0;
?>

<script>
    $(document).ready(function(){

    });

    window.onload = function() {

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
//
        var chart3 = new CanvasJS.Chart("chartContainer3", {
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
        chart3.render();

    }

</script>
    <!-- styles
    ================================================== -->
    <section id="styles" class="s-sub" >
        <div class="row">
            <div class="col-twelve">
                <h1><i class="fa fa-desktop"></i> 관리자 대시보드</h1>
                <?if($stat["recentPr"] > 0){?>
                    <div class="alert-box alert-box--info hideit">
                        <p>3일 이내 <?=$stat["recentPr"]?>개의 프로젝트가 등록되었습니다.</p>
                        <i class="fa fa-times alert-box__close" aria-hidden="true"></i>
                    </div>
                <?}?>
                <?if($stat["recentEx"] > 0){?>
                    <div class="alert-box alert-box--error hideit">
                        <p>3일 이내 <?=$stat["recentEx"]?>개의 프로젝트가 마감 예정입니다.</p>
                        <i class="fa fa-times alert-box__close" aria-hidden="true"></i>
                    </div>
                <?}?>
                <hr/>
                <h3><i class="fa fa-clock"></i> 현황 통계</h3>
                <ul class="stats-tabs">
                    <li><a href="#"><?=$stat["totalCount"]?> <em>총 프로젝트</em></a></li>
                    <li><a href="#"><?=$stat["thisCount"]?> <em>당월 프로젝트</em></a></li>
                    <li><a href="#"><?=$stat["doneCount"]?> <em>완료 프로젝트</em></a></li>
                    <li><a href="#"><?=$stat["totalCustomer"]?> <em>고객</em></a></li>
                    <li><a href="#"><?=$stat["totalWork"]?> <em>총 작업</em></a></li>
                    <li><a href="#"><?=$stat["totalQuery"]?> <em>총 문의</em></a></li>
                    <li><a href="#"><?=$stat["totalReply"]?> <em>총 답변</em></a></li>
                    <li><a href="#"><?=$stat["generalQuery"]?> <em>일반 문의</em></a></li>
                    <li><a href="#"><?=$stat["proQuery"]?> <em>프로젝트 문의</em></a></li>
                </ul>
            </div>
            <hr/>
            <?
            $ratio_pr = intval($stat["prRatio"] * 100);
            $ratio_this = intval($stat["thisRatio"] * 100);
            ?>
            <div class="col-twelve">
                <h3><i class="fa fa-chart-pie"></i> 비율 통계</h3>
                <ul class="skill-bars">
                    <li>
                        <div class="progress" style="width: <?=$ratio_pr?>%"><span><?=$ratio_pr?>%</span></div>
                        <strong>전체 프로젝트 진행률</strong>
                    </li>
                    <li>
                        <div class="progress" style="width: <?=$ratio_this?>%"><span><?=$ratio_this?>%</span></div>
                        <strong>당월 프로젝트 진행률</strong>
                    </li>
                </ul>
            </div>
            <hr/>
            <div class="col-twelve" style="margin-bottom: 50px;">
                <h3><i class="fa fa-chart-pie"></i> 접속 통계</h3>
                <h5>총 유입량 : <?=$stat["cnt_total"]?> / 페이스북 유입량 : <?=$stat["cnt_facebook"]?> / 회원 유입량 : <?=$stat["cnt_login"]?></h5>
                <br/>
                <div id="chartContainer1" class="col-four" style="height: 300px;"></div>
                <div id="chartContainer2" class="col-four" style="height: 300px;"></div>
                <div id="chartContainer3" class="col-four" style="height: 300px;"></div>
            </div>
        </div> <!-- end row -->
    </section>
<? include_once $_SERVER["DOCUMENT_ROOT"]."/main/admin/inc/footer.php"; ?>