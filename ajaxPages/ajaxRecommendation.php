<? include_once $_SERVER["DOCUMENT_ROOT"]."/main/shared/public/classes/Routable.php"; ?>
<?
$router = new Routable();
$arr = $router->getRecommendation($_REQUEST["key"], $_REQUEST["table"], $_REQUEST["col"]);
echo json_encode($arr);
?>