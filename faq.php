<? include_once $_SERVER["DOCUMENT_ROOT"]."/main/inc/subHeader.php"; ?>
<? include_once $_SERVER["DOCUMENT_ROOT"]."/main/shared/public/classes/WebRoute.php"; ?>

<?
$webInfo = new WebRoute();
$list = $webInfo->getFaqList();
?>
    <!-- styles
    ================================================== -->
    <section id="styles" class="s-about">
        <div class="row narrow section-intro add-bottom">
            <div class="col-twelve tab-full text-left">
                <h3>FAQ</h3>
                <p>자주 묻는 질문</p>

                <div class="row">
                    <div class="col-twelve tab-full">
                        <? foreach ($list as $item){ ?>
                            <div class="collapsible">
                                <span style="font-size: 14px;">
                                    <i class="fa fa-question-circle"></i>&nbsp;&nbsp;<?=$item["title"]?>
                                </span>
                            </div>
                            <div class="collapsible_content">
                                <p class="faq-answer"><?=$item["content"]?></p>
                            </div>
                        <?}?>
                    </div>
                </div> <!-- end row -->

            </div>

        </div>

    </section>
<? include_once $_SERVER["DOCUMENT_ROOT"]."/main/inc/subFooter.php"; ?>