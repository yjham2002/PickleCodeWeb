<? include_once $_SERVER["DOCUMENT_ROOT"]."/main/shared/public/classes/WebRoute.php"; ?>
<?
$router = new WebRoute();
$list = $router->getQueryList();
?>
<?foreach($list as $item){
    $bd = $item["budget"] == "" ? "해당없음" : $item["budget"];
    ?>
    <div queryId="<?=$item["id"]?>" class="col-twelve jDetail text-right" style="padding:10px;font-size:13px;border: 1px #BBBBBB solid; margin-bottom: 10px;">
        <div class="text-left">
        <h5 style="margin-top: 12px; font-size: 15px; margin-bottom: 5px;">
            <i class="fa fa-dot-circle"></i>&nbsp;<?=$item["title"]?> [예산 : <?=$bd?>]</h5>
            <p><?=$item["content"]?></p>
        </div>
        <i class="fa fa-list"></i>&nbsp;<span><?=$item["id"]?></span>&nbsp;
        <i class="fa fa-calendar"></i>&nbsp;<span><?=$item["regDate"]?></span>&nbsp;
        <i class="fa fa-desktop"></i>&nbsp;<span><?=$item["className"]?></span>
        <p style="margin-bottom: 12px;"></p>
    </div>
<?}?>
