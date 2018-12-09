<? include_once $_SERVER["DOCUMENT_ROOT"]."/main/inc/subHeader.php"; ?>
<? include_once $_SERVER["DOCUMENT_ROOT"]."/main/shared/public/classes/WebRoute.php"; ?>

<?
$webInfo = new WebRoute();
$list = $webInfo->getFaqList();
?>
<script>
    $(document).ready(function(){
        $(".jLogin").click(function(){
            if($(".jEmailTxt").val() == "" || $(".jPasswordTxt").val() == ""){
                alert("회원 정보를 입력하세요.");
                return;
            }
            callJson(
                "/main/shared/public/route.php?F=UserAuthRoute.requestLogin",
                {
                    email : $(".jEmailTxt").val(),
                    pwd : $(".jPasswordTxt").val()
                }
                , function(data){
                    if(data.returnCode > 0){
                        if(data.returnCode > 1){
                            alert(data.returnMessage);
                        }else{
                            location.href = "index.php";
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
    <section id="styles" class="s-about">
        <div class="row narrow section-intro add-bottom">
            <div class="col-twelve tab-full text-center">
                <h1 class="display-1">FAQ</h1>

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