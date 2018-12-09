<? include_once $_SERVER["DOCUMENT_ROOT"]."/main/shared/public/classes/WebRoute.php"; ?>
<?
$route = new WebRoute();
$email = $route->getProperty("WEB_EMAIL");
$link_fb = $route->getProperty("WEB_FACEBOOK");
$ports = $route->getPortfolioList();
$comms = $route->getCustomerComment();
?>

<!DOCTYPE html>
<html class="no-js" lang="ko">
<head>
    <meta charset="utf-8">
    <meta name="og:title" content="PickleCode">
    <meta name="og:description" content="맛있는 코드를 그려내는 피클코드">
    <meta name="og:image" content="http://picklecode.co.kr/first.png">
    <title>PickleCode</title>
    <meta name="description" content="맛있는 코드를 그려내는 피클코드입니다.">
    <meta name="author" content="PickleCode">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS  -->
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/main.css">
    <!-- script  -->
    <script src="js/modernizr.js"></script>
    <script src="js/pace.min.js"></script>

    <!-- favicons  -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

<body id="top">

<!-- header
================================================== -->
<header class="s-header">

    <div class="header-logo">
        <a class="site-logo" href="index.php">
            <img src="images/logo.png" alt="Homepage">
        </a>
    </div> <!-- end header-logo -->
    <nav class="header-nav">
        <a href="#0" class="header-nav__close" title="close"><span>Close</span></a>
        <div class="header-nav__content">
            <h3>PickleCode</h3>
            <ul class="header-nav__list">
                <? if(basename($_SERVER['PHP_SELF']) == "index.php") {
                    $FIX_SCROLL = "smoothscroll";
                    $FIX_PAGE = "";
                }else{
                    $FIX_SCROLL = "";
                    $FIX_PAGE = "index.php";
                }
                ?>
                <li class="current"><a class="<?=$FIX_SCROLL?>"  href="<?=$FIX_PAGE?>#home" title="home">홈</a></li>
                <li><a class="<?=$FIX_SCROLL?>"  href="<?=$FIX_PAGE?>#about" title="about">소개</a></li>
                <li><a class="<?=$FIX_SCROLL?>"  href="<?=$FIX_PAGE?>#services" title="services">서비스</a></li>
                <li><a class="<?=$FIX_SCROLL?>"  href="<?=$FIX_PAGE?>#works" title="works">포트폴리오</a></li>
                <li><a class="<?=$FIX_SCROLL?>"  href="<?=$FIX_PAGE?>#contact" title="contact">문의</a></li>
                <li><a class=""  href="faq.php" title="faq">FAQ</a></li>
                <li><a class=""  href="notice.php" title="notice">공지사항</a></li>
            </ul>
            <p>
                아삭하고 맛있는 <a href='#0'>PickleCode</a>.
                <br/>

                <?
                if(AuthUtil::isLoggedIn()){
                    $displayName = 
                        AuthUtil::getLoggedInfo()->name."(".AuthUtil::getLoggedInfo()->company.")";
                ?>
                    <div class="text-right">
                    <i class="fa fa-user"></i>&nbsp;<a href="profile.php"><?=$displayName?></a> 님<br/>
                    <a href="#" class="jLogoutNav"><i class="fa fa-sign-out-alt"></i>&nbsp;Logout</a>
                <?
                }else{
                ?>
                <div class="text-center">
                    <a href="login.php">로그인</a> |
                    <a href="join.php">회원가입</a>
                <?}?>
                </div>
            </p>
            <ul class="header-nav__social">
                <li>
                    <a href="<?=$link_fb?>"><i class="fab fa-facebook"></i></a>
                </li>
            </ul>
        </div> <!-- end header-nav__content -->
    </nav> <!-- end header-nav -->

    <a class="header-menu-toggle" href="#0">
        <span class="header-menu-icon"></span>
    </a>
</header> <!-- end s-header -->
<!-- Java Script  -->
<script src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/AjaxUtil.js"></script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>

<script>
    $(document).ready(function(){
        $(".jLogoutNav").click(function(){
            callJson(
                "/eVote/shared/public/route.php?F=UserAuthRoute.requestLogout",
                null, function(data){
                    if(data.returnCode == 1){
                        alert(data.returnMessage);
                        location.href = "index.php";
                    }else{
                        alert("오류가 발생하였습니다.\n관리자에게 문의하세요.");
                    }
                }
            );
        });
    });
</script>