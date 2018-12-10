<? include_once $_SERVER["DOCUMENT_ROOT"]."/main/admin/inc/header.php"; ?>
<? include_once $_SERVER["DOCUMENT_ROOT"]."/main/shared/public/classes/WebRoute.php"; ?>

<?
$webInfo = new WebRoute();
$list = $webInfo->getFaqList();
?>

<script>
    $(document).ready(function(){
        $(".jSave").click(function(e){
            e.stopPropagation();
            var id = $(this).attr("fid");
            var title = $("#tit" + id).val();
            var content = $("#con" + id).val();
            saveFaq(id, title, content);
        });

        function saveFaq(id, title, content){
            callJson(
                "/main/shared/public/route.php?F=AdminRoute.upsertFaq",
                {
                    id : id,
                    title : title,
                    content : content
                }, function(data){
                    if(data.returnCode == 1){
                        alert(data.returnMessage);
                        location.reload();
                    }else{
                        alert("오류가 발생하였습니다.\n관리자에게 문의하세요.");
                    }
                }
            );
        }

        $(".jDelete").click(function(e){
            e.stopPropagation();
            var id = $(this).attr("fid");
            callJson(
                "/main/shared/public/route.php?F=AdminRoute.deleteFaq",
                {
                    id : id
                }, function(data){
                    if(data.returnCode == 1){
                        alert(data.returnMessage);
                        location.reload();
                    }else{
                        alert("오류가 발생하였습니다.\n관리자에게 문의하세요.");
                    }
                }
            );
        });
    });
</script>

    <!-- styles
    ================================================== -->
    <section id="styles" class="s-sub">
        <div class="row narrow section-intro add-bottom">
            <div class="col-twelve tab-full text-left">
                <h1>FAQ 관리</h1>

                <div class="row">
                    <div class="col-twelve tab-full">
                        <div class="collapsible">
                                <span style="font-size: 14px;">
                                    <input type="text" class="jTitle full-width" id="tit0" style="margin: 0;" value="" placeholder="제목" />
                                    <div class="text-right">
                                        <a href="#" fid="0" class="jSave btn btn--primary" style="margin: 0;" ><i class="fa fa-plus"></i>신규추가</a>
                                    </div>
                                </span>
                        </div>
                        <div class="collapsible_content">
                            <textarea id="con0" class="faq-answer full-width"><?=$item["content"]?></textarea>
                        </div>
                        
                        <? foreach ($list as $item){ ?>
                            <div class="collapsible">
                                <span style="font-size: 14px;">
                                    <input type="text" class="jTitle full-width" id="tit<?=$item["id"]?>" style="margin: 0;" placeholder="제목" value="<?=$item["title"]?>" />
                                    <div class="text-right">
                                        <a href="#" fid="<?=$item["id"]?>" class="jSave btn btn--primary" style="margin: 0;" >저장</a>
                                        <a href="#" fid="<?=$item["id"]?>" class="jDelete btn btn--danger" style="background: #a00000; margin: 0;" >삭제</a>
                                    </div>
                                </span>
                            </div>
                            <div class="collapsible_content">
                                <textarea id="con<?=$item["id"]?>" class="faq-answer full-width"><?=$item["content"]?></textarea>
                            </div>
                        <?}?>
                    </div>
                </div> <!-- end row -->

            </div>

        </div>

    </section>
<? include_once $_SERVER["DOCUMENT_ROOT"]."/main/admin/inc/footer.php"; ?>