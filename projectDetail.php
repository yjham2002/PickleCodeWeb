<? include_once $_SERVER["DOCUMENT_ROOT"]."/main/inc/subHeader.php"; ?>
<? include_once $_SERVER["DOCUMENT_ROOT"]."/main/shared/public/classes/WebRoute.php"; ?>
<?
if(!AuthUtil::isLoggedIn()){
    echo "<script>alert('로그인 후 이용 가능한 서비스입니다.'); location.href='login.php';</script>";
}
?>
<?
$webInfo = new WebRoute();
$projectItem = $webInfo->getProject();
$workList = $webInfo->getProjectWorks();
?>
<script>
    $(document).ready(function(){
        // Query List

        var currentPage = 1;
        var isFinal = false;

        function loadMore(page){
            loadPageInto(
                "/main/ajaxPages/ajaxPQueryList.php",
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

        $(document).on("click", ".jDetail", function(){
            var id = $(this).attr("queryId");
            location.href = "queryDetail.php?id=" + id;
        });

        buttonLink(".jGoDash", "profile.php");

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
                <h3><i class="fa fa-dot-circle"></i>&nbsp;프로젝트 상세정보</h3>


                <a href="#" class="btn btn--primary jGoDash"><i class="fa fa-list">&nbsp;</i>대시보드로</a>
                <a href="query.php?queryOf=<?=$_REQUEST["id"]?>" class="btn btn--medium btn--pill"><i class="fa fa-plus"></i>프로젝트&nbsp;문의하기</a>

                <div class="" style="padding-bottom: 30px !important;">
                    <div class="col-twelve text-right" style="padding:10px;font-size:13px;border: 1px #BBBBBB solid; margin-bottom: 10px;">
                        <div class="text-left">
                            <h5 style="margin: 0;"><i class="fa fa-search"></i>&nbsp;<b>'<?=$projectItem["title"]?>'</b> 프로젝트</h5>
                            <hr/>
                            <p style="margin: 0;"><?=$projectItem["content"]?></p>
                        </div>
                    </div>
                </div>
                <br/>
                <br/>
                <?
                $percent = intval($projectItem["currentLevel"] / $projectItem["projectLevel"] * 100);
                ?>
                <div class="" style="padding-bottom: 30px !important;">
                    <div class="col-twelve text-right" style="padding:10px;font-size:13px;border: 1px #BBBBBB solid; margin-bottom: 10px;">
                        <div class="text-left">
                            <h5 style="margin: 0;"><i class="fa fa-clock"></i>&nbsp;<b>프로젝트 진행 현황 (<?=$percent?>%)</h5>
                            <hr/>
                            <ul class="skill-bars">
                                <li style="margin: 10px 0px;">
                                    <div class="progress" style="width: <?=$percent?>%"><span><?=$percent?>%</span></div>
                                    <strong>상태 : <?=$projectItem["shortStatus"]?></strong>
                                </li>
                            </ul>
                            <hr/>
                            <?foreach($workList as $witem){?>
                                <div class="" style="padding-bottom: 10px !important;">
                                    <div class="col-twelve text-right" style="padding:5px 10px;font-size:11px;border: 1px #BBBBBB solid; margin-bottom: 10px;">
                                        <div class="text-left">
                                            <p style="margin: 0; font-weight: bold;"><?=$witem["status"]?></p>
                                        </div>
                                        <hr style="margin: 0;"/>
                                        <p style="margin: 0;"><?=$witem["regDate"]?></p>
                                    </div>
                                </div>
                            <?}?>
                        </div>
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
<? include_once $_SERVER["DOCUMENT_ROOT"]."/main/inc/subFooter.php"; ?>