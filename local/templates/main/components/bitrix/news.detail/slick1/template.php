<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true); ?>
<div style="margin-top: 50px">
    <?
    pretty_print($arResult['PROPERTIES'], false, false, '$arResult["PROPERTIES"]');
    pretty_print($arResult['MAIN_GALLERY'], false, false, "arResult 'MAIN_GALLERY'");
    ?>
</div>

<section class="main-slider">
    <? foreach ($arResult['MAIN_GALLERY'] as $i => $item) : ?>
        <? if ($item['TYPE'] == 'video'): ?>
            <div data-thumb="<?= $item['IMG']; ?>" class="item youtube b-slider__carousel--screen">
                <iframe src="<?= $item['SRC']; ?>" class="embed-player slide-media" width="980" height="520"
                        frameborder="0" allowfullscreen></iframe>
            </div>
        <? elseif ($item['TYPE'] == 'img'): ?>
            <div data-thumb="<?= $item['VALUE']['src']; ?>" class="item image">

                <figure data-thumb="<?= $item['VALUE']['src']; ?>">
                    <div class="slide-image slide-media b-slider__carousel--screen"
                         style="background-image:url('<?= $item['VALUE']['src']; ?>');">
                        <img data-lazy="<?= $item['VALUE']['src']; ?>"
                             class="image-entity"/>
                    </div>
                    <
                </figure>
            </div>
        <? endif; ?>

    <? endforeach; ?>

</section>
<div class="b-slider__carousel b-slider__carousel--thumbs">
    <? foreach ($arResult['MAIN_GALLERY'] as $i => $item) : ?>
        <? if ($item['TYPE'] == 'video'): ?>
            <div style='background: url("<?= $item['IMG']; ?>") no-repeat ; background-size: cover; ' class="b-slider__item"><img src="<?//= $item['IMG']; ?>" alt=""/></div>
        <? elseif ($item['TYPE'] == 'img'): ?>
            <div style='background: url("<?= $item['VALUERES']['src']; ?>") no-repeat ; background-size: cover; ' class="b-slider__item"><img src="<?//= $item['VALUERES']['src']; ?>" alt=""/></div>
        <? endif; ?>
    <? endforeach; ?>
</div>
<div class="clear"></div>
<!--<section class="main-slider">
    <div class="item image">
        <span class="loading">Loading...</span>
        <figure>
            <div class="slide-image slide-media"
                 style="background-image:url('https://drive.google.com/uc?export=view&id=0B_koKn2rKOkLRkY4S0JDTk1BbE0');">
                <img data-lazy="https://drive.google.com/uc?export=view&id=0B_koKn2rKOkLRkY4S0JDTk1BbE0"
                     class="image-entity"/>
            </div>
            <figcaption class="caption">Static Image</figcaption>
        </figure>
    </div>
    <div class="item vimeo" data-video-start="4">
        <iframe class="embed-player slide-media"
                src="https://player.vimeo.com/video/217885864?api=1&byline=0&portrait=0&title=0&background=1&mute=1&loop=1&autoplay=0&id=217885864"
                width="980" height="520" frameborder="0" webkitallowfullscreen mozallowfullscreen
                allowfullscreen></iframe>
        <p class="caption">Vimeo</p>
    </div>
    <div class="item image">
        <figure>
            <div class="slide-image slide-media"
                 style="background-image:url('https://drive.google.com/uc?export=view&id=0B_koKn2rKOkLNXBIcEdOUFVIWmM');">
                <img data-lazy="https://drive.google.com/uc?export=view&id=0B_koKn2rKOkLNXBIcEdOUFVIWmM"
                     class="image-entity"/>
            </div>
            <figcaption class="caption">Static Image</figcaption>
        </figure>
    </div>
    <div class="item youtube">
        <iframe class="embed-player slide-media" width="980" height="520"
                src="https://www.youtube.com/embed/QV5EXOFcdrQ?enablejsapi=1&controls=0&fs=0&iv_load_policy=3&rel=0&showinfo=0&loop=1&playlist=QV5EXOFcdrQ&start=1"
                frameborder="0" allowfullscreen></iframe>
        <p class="caption">YouTube</p>
    </div>
    <div class="item image">
        <figure>
            <div class="slide-image slide-media"
                 style="background-image:url('https://drive.google.com/uc?export=view&id=0B_koKn2rKOkLSlBkWDBsWXJNazQ');">
                <img data-lazy="https://drive.google.com/uc?export=view&id=0B_koKn2rKOkLSlBkWDBsWXJNazQ"
                     class="image-entity"/>
            </div>
            <figcaption class="caption">Static Image</figcaption>
        </figure>
    </div>
    <div class="item video">
        <video class="slide-video slide-media" loop muted preload="metadata"
               poster="https://drive.google.com/uc?export=view&id=0B_koKn2rKOkLSXZCakVGZWhOV00">
            <source src="https://player.vimeo.com/external/138504815.sd.mp4?s=8a71ff38f08ec81efe50d35915afd426765a7526&profile_id=112"
                    type="video/mp4"/>
        </video>
        <p class="caption">HTML 5 Video</p>
    </div>
</section>-->
<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<!--<script src='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js'></script>-->
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<!--<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js'></script>-->
<script>


    var slideWrapper = $(".main-slider"),
        iframes = slideWrapper.find('.embed-player'),
        lazyImages = slideWrapper.find('.slide-image'),
        lazyCounter = 0;



    // POST commands to YouTube or Vimeo API
    function postMessageToPlayer(player, command) {
        if (player == null || command == null) return;
        player.contentWindow.postMessage(JSON.stringify(command), "*");
    }

    // When the slide is changing
    function playPauseVideo(slick, control) {
        var currentSlide, slideType, startTime, player, video;

        currentSlide = slick.find(".slick-current");
        slideType = currentSlide.attr("class").split(" ")[1];
        player = currentSlide.find("iframe").get(0);
        startTime = currentSlide.data("video-start");

        if (slideType === "vimeo") {
            switch (control) {
                case "play":
                    if ((startTime != null && startTime > 0) && !currentSlide.hasClass('started')) {
                        currentSlide.addClass('started');
                        postMessageToPlayer(player, {
                            "method": "setCurrentTime",
                            "value": startTime
                        });
                    }
                    postMessageToPlayer(player, {
                        "method": "play",
                        "value": 1
                    });
                    break;
                case "pause":
                    postMessageToPlayer(player, {
                        "method": "pause",
                        "value": 1
                    });
                    break;
            }
        } else if (slideType === "youtube") {
            switch (control) {
                case "play":
                    postMessageToPlayer(player, {
                        "event": "command",
                        "func": "mute"
                    });
                    postMessageToPlayer(player, {
                        "event": "command",
                        "func": "playVideo"
                    });
                    break;
                case "pause":
                    postMessageToPlayer(player, {
                        "event": "command",
                        "func": "pauseVideo"
                    });
                    break;
            }
        } else if (slideType === "video") {
            video = currentSlide.children("video").get(0);
            if (video != null) {
                if (control === "play") {
                    video.play();
                } else {
                    video.pause();
                }
            }
        }
    }

    // Resize player
    function resizePlayer(iframes, ratio) {
        if (!iframes[0]) return;
        var win = $(".main-slider"),
            width = win.width(),
            playerWidth,
            height = win.height(),
            playerHeight,
            ratio = ratio || 16 / 9;

        iframes.each(function () {
            var current = $(this);
            if (width / ratio < height) {
                playerWidth = Math.ceil(height * ratio);
                current.width(playerWidth).height(height).css({
                    left: (width - playerWidth) / 2,
                    top: 0
                });
            } else {
                playerHeight = Math.ceil(width / ratio);
                current.width(width).height(playerHeight).css({
                    left: 0,
                    top: (height - playerHeight) / 2
                });
            }
        });
    }

    // DOM Ready
    $(function () {
        // Initialize
        slideWrapper.on("init", function (slick) {
            slick = $(slick.currentTarget);
            setTimeout(function () {
                playPauseVideo(slick, "play");
            }, 1000);
            resizePlayer(iframes, 16 / 9);
        });
        slideWrapper.on("beforeChange", function (event, slick) {
            slick = $(slick.$slider);
            playPauseVideo(slick, "pause");
        });
        slideWrapper.on("afterChange", function (event, slick) {
            slick = $(slick.$slider);
            playPauseVideo(slick, "play");
        });
        slideWrapper.on("lazyLoaded", function (event, slick, image, imageSource) {
            lazyCounter++;
            if (lazyCounter === lazyImages.length) {
                lazyImages.addClass('show');
                // slideWrapper.slick("slickPlay");
            }
        });
        //init();
        //start the slider
        slideWrapper.slick({
            //asNavFor:'.b-slider__carousel--thumbs',
            fade: true,
            autoplay: false,
            autoplaySpeed: 15000,
            accessibility: true,
            lazyLoad: "progressive",
            speed: 800,
            arrows: true,
            dots: false,
            /*customPaging : function(slider, i) {
                var thumb = $(slider.$slides[i]).data('thumb');
                console.log(slider.$slides[i]);
                return '<a><img src="'+thumb+'"></a>';
            },*/
            cssEase: "cubic-bezier(0.87, 0.03, 0.41, 0.9)",
            //adaptiveHeight: true,
            //asNavFor: '.slider-nav',


        });

        /*$('.slider-nav').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.main-slider'
        });*/
    });

    // Resize event
    $(window).on("resize.slickVideoPlayer", function () {
        resizePlayer(iframes, 16 / 9);
    });
    // $('document').ready(function () {
    $('body').on("click", function (e) {
        console.log($(e.target).val());
        $(".b-slider__carousel--thumbs div").click(function (e) {
            e.preventDefault();
            slideIndex = $(this).index();
            $('.main-slider')[0].slick.slickGoTo(parseInt(slideIndex));
            //$('.main-slider').slick('slickGoTo', slideIndex, true);
            //alert ("ok");
        });
    });

    // });
</script>
