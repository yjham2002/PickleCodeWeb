<? include_once $_SERVER["DOCUMENT_ROOT"]."/main/shared/public/classes/WebRoute.php"; ?>
<?
$router = new WebRoute();
$list = $router->getNoticeList();
?>
<?foreach($list as $item){
    $madeBy = "관리자(".$item["madeName"].")";
    if($item["madeBy"]==0) $madeBy = "관리자";
    ?>
    <tr class="jDetail" noticeID="<?=$item["id"]?>">
        <td><?=$item["id"]?></td>
        <td><?=$item["title"]?></td>
        <td><?=$madeBy?></td>
        <td><?=$item["hit"]?></td>
        <td><?=$item["regDate"]?></td>
    </tr>
<?}?>
