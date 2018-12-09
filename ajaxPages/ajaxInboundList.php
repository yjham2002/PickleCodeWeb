<? include_once $_SERVER["DOCUMENT_ROOT"]."/main/shared/public/classes/AdminRoute.php"; ?>
<?
$router = new AdminRoute();
$list = $router->getInboundList();

?>
<?foreach($list as $item){
    ?>
    <div accessId="<?=$item["qID"]?>" class="col-twelve jDetail text-right" style="padding:10px;font-size:13px;border: 1px #BBBBBB solid; margin-bottom: 10px;">
        <div class="text-left">
        <h5 style="margin-top: 12px; font-size: 15px; margin-bottom: 5px;">
            <i class="fa fa-dot-circle"></i>&nbsp;<?=$item["accessIp"]?> [FBCLID : <?=$item["fbclid"]?>]</h5>
            <p><?=$item["agent"]?></p>
        </div>
        <i class="fa fa-user"></i>&nbsp;<span><?=$item["uID"] == "" ? "(Unknown)" : $item["uID"]?></span>&nbsp;
        <i class="fa fa-calendar"></i>&nbsp;<span><?=$item["qReg"]?></span>&nbsp;
        <i class="fa fa-desktop"></i>&nbsp;<span><?=$item["email"] == "" ? "(Unknown)" : $item["email"]?></span>
        <p style="margin-bottom: 12px;"></p>
    </div>
<?}?>
