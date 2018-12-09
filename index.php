<? include_once $_SERVER["DOCUMENT_ROOT"]."/main/inc/header.php"; ?>
<?
    $newHit = $hit + 1;
    $route->setPropertyLoc("WEB_HIT", "#", $newHit);
?>
<script>
    $(document).ready(function(){
        if("<?=$_REQUEST["msg"] != ""?>"){
            alert("<?=$_REQUEST["msg"]?>");
            location.href="index.php";
        }
    });
</script>
    <!-- home
    ================================================== -->
    <section id="home" class="s-home target-section" data-parallax="scroll" data-image-src="images/hero-bg.jpg" data-natural-width=3000 data-natural-height=2000 data-position-y=top>

        <div class="shadow-overlay"></div>

        <div class="home-content">

            <div class="row home-content__main">
                <h1>맛있는 코드를</h1>
                <h1 class="themeColor">그려냅니다</h1>

                <p>Software Development and Consulting</p>
            </div> <!-- end home-content__main -->

        </div> <!-- end home-content -->

        <ul class="home-sidelinks">
            <li><a class="smoothscroll" href="#about">About<span>피클코드를 소개합니다</span></a></li>
            <li><a class="smoothscroll" href="#services">Services<span>최선의 파트너가 되어드립니다</span></a></li>
            <li><a  class="smoothscroll" href="#contact">Contact<span>함께 나아갑니다</span></a></li>
        </ul> <!-- end home-sidelinks -->

        <ul class="home-social">
            <li class="home-social-title">Follow Us</li>
            <li><a href="<?=$link_fb?>">
                <i class="fab fa-facebook"></i>
                <span class="home-social-text">Facebook</span>
            </a></li>
            <!--<li><a href="#0">-->
                <!--<i class="fab fa-twitter"></i>-->
                <!--<span class="home-social-text">Twitter</span>-->
            <!--</a></li>-->
            <!--<li><a href="#0">-->
                <!--<i class="fab fa-linkedin"></i>-->
                <!--<span class="home-social-text">LinkedIn</span>-->
            <!--</a></li>-->
        </ul> <!-- end home-social -->

        <a href="#about" class="home-scroll smoothscroll">
            <span class="home-scroll__text">자세히 보기</span>
            <span class="home-scroll__icon"></span>
        </a> <!-- end home-scroll -->

    </section> <!-- end s-home -->


    <!-- about
    ================================================== -->
    <section id='about' class="s-about">

        <div class="row section-header" >
            <div class="col-full">
                <h3 class="subhead">피클코드를 소개합니다</h3>
                <h1 class="display-1">아삭하고 맛있는 코드를 그려내는 피클코드입니다.</h1>
            </div>
        </div> <!-- end section-header -->

        <div class="row" >
            <div class="col-full">
                <p class="lead">
                    피클코드는 최신 IT 트렌드와 효율적인 기술, 그리고 현대적이고 감각적인 디자인을 사용하여 고객이 만족할 수 있는 서비스를 창조하는 팀 입니다.
                    저희 개발팀은 다년 간의 경험에 토대를 둔 다양한 플랫폼과 웹, 앱, 서버 시스템 등 다양한 환경에서의 개발을 종합적으로 진행하고 있습니다.
                </p>
            </div>
        </div> <!-- end about-desc -->

        <div class="row">

            <div class="about-process process block-1-2 block-tab-full">

                <div class="process__vline-left"></div>
                <div class="process__vline-right"></div>

                <div class="col-block process__col" data-item="1" >
                    <div class="process__text">
                        <h4>Planning & Consulting</h4>
                        <p>
                            고객의 요구사항을 정확히 파악하고 정의하여, 가장 효과적인 방향을 제시합니다.
                            어떤 것이든 최고의 전문성으로 기획 및 설계합니다.
                        </p>
                    </div>
                </div>
                <div class="col-block process__col" data-item="2" >
                    <div class="process__text">
                        <h4>Design & Manner</h4>
                        <p>
                            가장 직관적이고 아름다운 서비스를 디자인합니다.
                            톤 앤 매너, 레퍼런스 사이트 그리고 레퍼런스 서비스 수집 및 컨셉 제시를 통해
                            보다 유연한 UI/UX 기획 및 설계를 제공합니다.
                        </p>
                    </div>
                </div>
                <div class="col-block process__col" data-item="3" >
                    <div class="process__text">
                        <h4>Build & Development</h4>
                        <p>
                            플랫폼에 제한이 없는 피클코드는 웹과 모바일 앱, 서버 시스템 등 다양한 소프트웨어를
                            고객이 필요한 서비스에 알맞게 최적화하여 구축합니다.
                            뿐만 아니라, 서비스에 필요한 각 환경에 대해 Backend 및 Frontend 에 특화된 개발진이 전문적으로 설계 및 개발합니다.
                        </p>
                    </div>
                </div>
                <div class="col-block process__col" data-item="4" >
                    <div class="process__text">
                        <h4>Launching System</h4>
                        <p>
                            고객의 서비스를 실제로 운영 및 이용할 수 있도록 시스템 제반사항을 구축하여 제공하며,
                            요구사항에 정확하게 맞춘 환경 및 설비 이관을 제공합니다.
                        </p>
                    </div>
                </div>

            </div> <!-- end process -->

        </div> <!-- end about-stats -->

    </section> <!-- end s-about -->


    <!-- services
    ================================================== -->
    <section id='services' class="s-services light-gray">

        <div class="row section-header" >
            <div class="col-full">
                <h3 class="subhead">최선의 파트너가 되어드립니다</h3>
                <h1 class="display-1">피클코드는 귀하에게 필요한 모든 것이 준비되어 있습니다.</h1>
            </div>
        </div> <!-- end section-header -->

        <div class="row" >
            <div class="col-full">
                <p class="lead">
                    고객에게 필요한 업무, 서비스, 플랫폼 등을 각 고객의 특성에 맞추어 정확하게 제공합니다.
                    축적된 노하우를 통해 고객의 비즈니스에 가장 정확하고 깐깐한 파트너가 되어드립니다.
                </p>
            </div>
        </div> <!-- end about-desc -->

        <div class="row services-list block-1-3 block-m-1-2 block-tab-full">

            <div class="col-block service-item " >
                <div class="service-text">
                    <h3 class="h4">비즈니스 기반 지원</h3>
                    <p>
                        비즈니스 운영을 하기 위해 필요한 모든 제반사항에 도움을 드립니다.
                        서비스 도메인부터, 서버 임대 등의 기반을 갖추어 드립니다.
                    </p>
                </div>
            </div>

            <div class="col-block service-item" >
                <div class="service-text">
                    <h3 class="h4">SEO 서비스</h3>
                    <p>
                        비즈니스를 위해 가장 중요한 것은 마케팅입니다.
                        귀하의 서비스가 알려지기 위해 가장 중요한 첫 단계, SEO(Search Engine Optimization)을 제공합니다.
                    </p>
                </div>
            </div>

            <div class="col-block service-item" >
                <div class="service-text">
                    <h3 class="h4">끈끈한 파트너십</h3>
                    <p>
                        귀하의 서비스가 지속적으로 발전하고 이어질 수 있도록 최선의 유지보수를 진행하고 있습니다.
                    </p>
                </div>
            </div>

            <div class="col-block service-item" >
                <div class="service-text">
                    <h3 class="h4">다양한 부가서비스</h3>
                    <p>
                        추가적인 기능 혹은 옵션에 대한 요청에 대해 빠르고 정확한 피드백을 드립니다.
                    </p>
                </div>
            </div>

            <div class="col-block service-item" >
                <div class="service-text">
                    <h3 class="h4">폭넓은 선택</h3>
                    <p>
                        웹, 앱, 모바일웹, 반응형웹 외의 소프트웨어를 원하시나요?
                        저희는 특수한 알고리즘부터 기계학습까지, 어떠한 환경도 가리지 않습니다.
                    </p>
                </div>
            </div>

            <div class="col-block service-item" >
                <div class="service-text">
                    <h3 class="h4">유연한 커뮤니케이션</h3>
                    <p>
                        저희는 어떠한 커뮤니케이션 채널도 가리지 않습니다.
                        모바일 메신져부터 이메일, 유선전화 등 모든 방법으로 커뮤니케이션합니다.
                    </p>
                </div>
            </div>

        </div> <!-- end services-list -->

    </section> <!-- end s-services -->


    <!-- works
    ================================================== -->
    <section id='works' class="s-works">

        <div class="row section-header" >
            <div class="col-full">
                <h3 class="subhead">프로젝트 이력</h3>
                <h1 class="display-1">
                    아삭하고 맛있는 프로젝트 이력을 확인하세요!
                </h1>
            </div>
        </div> <!-- end section-header -->

        <div class="row masonry-wrap">
            <div class="masonry">
                <? foreach ($ports as $item){?>
                    <div class="masonry__brick" >
                        <div class="item-folio">
                            <div class="item-folio__thumb">
                                <a href="<?=$item["imgPath"]?>" class="thumb-link" title="<?=$item["title"]?>" data-size="1050x700">
                                    <img src="<?=$item["imgPath"]?>"
                                         srcset="<?=$item["imgPath"]?> 1x, <?=$item["imgPath"]?> 2x" alt="">
                                </a>
                            </div>
                            <div class="item-folio__text">
                                <h3 class="item-folio__title">
                                    <?=$item["title"]?>
                                </h3>
                                <p class="item-folio__cat">
                                    <?=$item["class"]?>
                                </p>
                            </div>
                            <a href="#" class="item-folio__project-link" title="Project link">자세히 보기</a>
                            <span class="item-folio__caption">
                            <p>
                                <?=$item["desc"]?>
                            </p>
                        </span>

                        </div> <!-- end item-folio -->
                    </div> <!-- end masonry__brick -->
                <?}?>

            </div> <!-- end masonry -->
        </div> <!-- end masonry-wrap -->

        <div class="testimonials-wrap" >

            <div class="row">
                <div class="col-full testimonials-header">
                    <h2 class="h1">믿음직한 파트너십</h2>
                </div>
            </div>

            <div class="row testimonials">
                <div class="col-full testimonials__slider">
                <?foreach ($comms as $item){?>
                        <div class="testimonials__slide">
                            <img src="images/user.png" alt="PickleCode Comment" class="testimonials__avatar">
                            <p><?=$item["content"]?></p>
                            <div class="testimonials__author">
                                <?=$item["name"]?>
                                <span><?=$item["role"]?>, <?=$item["company"]?></span>
                            </div>
                        </div>
                <?}?>
                </div> <!-- end testimonials__slider -->
            </div> <!-- end testimonials -->

        </div> <!-- end testimonials-wrap -->

    </section> <!-- end s-works -->

<?php
$end_date = date('2017-12-13');
$d_day = floor(( strtotime(substr($end_date,0,10)) - strtotime(date('Y-m-d')) )/86400);
if($d_day < 0) $d_day *= -1;
?>
    <!-- stats
    ================================================== -->
    <section id="stats" class="s-stats">

        <div class="row stats block-1-4 block-m-1-2 block-mob-full" >

            <div class="col-block stats__col ">
                <div class="stats__count"><?=$hit?></div>
                <h5>누적 유입수</h5>
            </div>
            <div class="col-block stats__col">
                <div class="stats__count"><?=$d_day?></div>
                <h5>업력(일)</h5>
            </div>

        </div> <!-- end stats -->

    </section> <!-- end s-stats -->


    <!-- contact
    ================================================== -->
    <section id="contact" class="s-contact">

        <div class="row section-header" >
            <div class="col-full">
                <h3 class="subhead subhead--light">함께 나아갑니다</h3>
                <h1 class="display-1 display-1--light">
                    함께 하시겠습니까?<br/>지금 바로 문의주십시오.
                </h1>
            </div>
        </div> <!-- end section-header -->

        <div class="row">

            <div class="col-full contact-main" >
                <p>
                <a href="mailto:<?=$email?>" class="contact-email"><?=$email?></a>
                <span class="contact-number">+82) 010 2918 9484  /  +82) 010 2948 4648</span>
                </p>
            </div> <!-- end contact-main -->

        </div> <!-- end row -->

        <div class="row">

            <!--<div class="col-five tab-full contact-secondary" >-->
                <!--<h3 class="subhead subhead&#45;&#45;light">Where To Find Us</h3>-->

                <!--<p class="contact-address">-->
                    <!--1600 Amphitheatre Parkway<br>-->
                    <!--Mountain View, CA<br>-->
                    <!--94043 US-->
                <!--</p>-->
            <!--</div> &lt;!&ndash; end contact-secondary &ndash;&gt;-->

            <div class="col-five tab-full contact-secondary" >
                <h3 class="subhead subhead--light">Follow Us</h3>

                <ul class="contact-social">
                    <li>
                        <a href="<?=$link_fb?>"><i class="fab fa-facebook"></i></a>
                    </li>
                    <!--<li>-->
                        <!--<a href="#0"><i class="fab fa-twitter"></i></a>-->
                    <!--</li>-->
                    <!--<li>-->
                        <!--<a href="#0"><i class="fab fa-instagram"></i></a>-->
                    <!--</li>-->
                    <!--<li>-->
                        <!--<a href="#0"><i class="fab fa-behance"></i></a>-->
                    <!--</li>-->
                    <!--<li>-->
                        <!--<a href="#0"><i class="fab fa-dribbble"></i></a>-->
                    <!--</li>-->
                </ul> <!-- end contact-social -->

                <!--<div class="contact-subscribe">-->
                    <!--<form id="mc-form" class="group mc-form" novalidate="true">-->
                        <!--<input type="email" value="" name="EMAIL" class="email" id="mc-email" placeholder="Email Address" required="">-->
                        <!--<input type="submit" name="subscribe" value="Subscribe">-->
                        <!--<label for="mc-email" class="subscribe-message"></label>-->
                    <!--</form>-->
                <!--</div> &lt;!&ndash; end contact-subscribe &ndash;&gt;-->
            </div> <!-- end contact-secondary -->

        </div> <!-- end row -->

<? include_once $_SERVER["DOCUMENT_ROOT"]."/main/inc/footer.php"; ?>