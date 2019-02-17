<? include_once $_SERVER["DOCUMENT_ROOT"]."/main/shared/public/classes/WebRoute.php"; ?>
<?
$router = new WebRoute();
$list = $router->getQueryListOf($_REQUEST["id"]);
?>
<?foreach($list as $item){
    $bd = $item["budget"] == "" ? "해당없음" : $item["budget"];
    ?>
    <div queryId="<?=$item["id"]?>" queryOf="<?=$item["queryOf"]?>" placeContent="<?="RE:".$item["title"]?>" class="col-twelve jDetail text-right"
         style="padding:10px;font-size:13px;border: 1px #BBBBBB solid; margin-bottom: 10px;
         <?if($item["isDenied"]){?>
                 background-color: #e68787;
         <?}?>
         <?if($item["isReply"]){?>
                 background-color: #b3e6cb;
         <?}?>
           ">
        <div class="text-left">
        <h5 style="margin-top: 12px; font-size: 15px; margin-bottom: 5px;">
            <?if($item["queryOf"] == 0){?>
                <i class="fa fa-dot-circle"></i>&nbsp;<?=$item["title"]?> [예산 : <?=$bd?>]
            <?}else{?>
                <i class="fa fa-dot-circle"></i>&nbsp;(<a href="projectDetail.php?id=<?=$item["queryOf"]?>">프로젝트</a>) <?=$item["title"]?> [예산 : <?=$bd?>]
            <?}?>
            <?if($item["isDenied"] == 1){?>
                &nbsp;/&nbsp;견적요청 반려됨
            <?}else if($item["isDenied"] == 2){?>
                &nbsp;/&nbsp;견적요청 보류됨
            <?}?>
        </h5>
            <p style="margin: 0;"><?=$item["content"]?></p>
        </div>
        <i class="fa fa-list"></i>&nbsp;<span><?=$item["id"]?></span>&nbsp;
        <i class="fa fa-calendar"></i>&nbsp;<span><?=$item["regDate"]?></span>&nbsp;
        <i class="fa fa-desktop"></i>&nbsp;<span><?=$item["isReply"] == "1" ? "답변" : $item["className"]?></span>
        &nbsp;/
        <a href="#" queryId="<?=$item["id"]?>" class="jDeny" style="color:red" flag="1">반려</a>
        <a href="#" queryId="<?=$item["id"]?>" class="jDeny" style="color:black" flag="2">보류</a>
        <a href="#" queryId="<?=$item["id"]?>" class="jDeny" style="color:gray" flag="0">해제</a>
        <p style="margin-bottom: 12px;"></p>
    </div>
<?}?>
