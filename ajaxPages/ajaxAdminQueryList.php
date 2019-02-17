<? include_once $_SERVER["DOCUMENT_ROOT"]."/main/shared/public/classes/WebRoute.php"; ?>
<?
$router = new WebRoute();
$list = $router->getAllQueries($_REQUEST["id"]);
?>
<?foreach($list as $item){
    $bd = $item["budget"] == "" ? "해당없음" : $item["budget"];
    ?>
    <div queryId="<?=$item["userId"]?>" class="col-twelve jDetail text-right"
         style="padding:10px;font-size:13px;border: 1px #BBBBBB solid; margin-bottom: 10px;">
        <div class="text-left">
        <h5 style="margin-top: 12px; font-size: 15px; margin-bottom: 5px;">
            <i class="fa fa-dot-circle"></i>&nbsp;<?=$item["uName"]?> (예산 : <?=$item["uMail"]?>)
        </h5>
        </div>
        <i class="fa fa-list"></i>&nbsp;<span><?=$item["id"]?></span>&nbsp;
        <i class="fa fa-calendar"></i>&nbsp;<span><?=$item["regDate"]?></span>&nbsp;
        <i class="fa fa-comments"></i>&nbsp;<span><?=$item["rn"]?></span>
        <p style="margin-bottom: 12px;"></p>
    </div>
<?}?>
