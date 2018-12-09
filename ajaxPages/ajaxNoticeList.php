<? include_once $_SERVER["DOCUMENT_ROOT"]."/main/shared/public/classes/WebRoute.php"; ?>
<?
$router = new WebRoute();
$list = $router->getNoticeList();
?>
<?foreach($list as $item){
    $madeBy = "관리자(".$item["madeName"].")";
    if($item["madeBy"]==0) $madeBy = "관리자";
    ?>
    <div noticeID="<?=$item["id"]?>" class="col-twelve jDetail text-right" style="padding:10px;font-size:13px;border: 1px #BBBBBB solid; margin-bottom: 10px;">
        <div class="text-left">
        <h5 style="margin-top: 12px; font-size: 15px; margin-bottom: 5px;">
            <i class="fa fa-dot-circle"></i>&nbsp;<?=$item["title"]?></h5>
        </div>
        <i class="fa fa-list"></i>&nbsp;<span><?=$item["id"]?></span>&nbsp;
        <i class="fa fa-user"></i>&nbsp;<span><?=$madeBy?></span>&nbsp;
        <i class="fa fa-calendar"></i>&nbsp;<span><?=$item["regDate"]?></span>&nbsp;
        <i class="fa fa-eye"></i>&nbsp;<span><?=$item["hit"]?></span>
        <p style="margin-bottom: 12px;"></p>
    </div>
<?}?>
