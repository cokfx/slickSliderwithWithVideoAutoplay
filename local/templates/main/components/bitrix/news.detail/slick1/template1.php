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
$this->setFrameMode(true);
//include __DIR__.'/dist/index.html';
?>

<?

//if (!empty($arResult['MAIN_GALLERY'])) { ?>
<div class="slick">

    <section class="main-slider">
        <div class="item youtube">
            <iframe class="embed-player slide-media" width="980" height="520"
                    src="https://youtube.com/embed/sQs7epPoHhc?enablejsapi=1&controls=0&fs=0&iv_load_policy=3&rel=0&showinfo=0&loop=1&playlist=QV5EXOFcdrQ&start=1"
                    frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="item image">
            <span class="loading">Loading...</span>
            <figure>
                <div class="slide-image slide-media" style="background-image:url('https://drive.google.com/uc?export=view&id=0B_koKn2rKOkLRkY4S0JDTk1BbE0');">
                    <img data-lazy="https://drive.google.com/uc?export=view&id=0B_koKn2rKOkLRkY4S0JDTk1BbE0" class="image-entity" />
                </div>
                <figcaption class="caption">Static Image</figcaption>
            </figure>
        </div>
        <div class="item vimeo" data-video-start="4">
            <iframe class="embed-player slide-media" src="https://player.vimeo.com/video/217885864?api=1&byline=0&portrait=0&title=0&background=1&mute=1&loop=1&autoplay=0&id=217885864" width="980" height="520" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            <p class="caption">Vimeo</p>
        </div>
        <div class="item image">
            <figure>
                <div class="slide-image slide-media" style="background-image:url('https://drive.google.com/uc?export=view&id=0B_koKn2rKOkLNXBIcEdOUFVIWmM');">
                    <img data-lazy="https://drive.google.com/uc?export=view&id=0B_koKn2rKOkLNXBIcEdOUFVIWmM" class="image-entity" />
                </div>
                <figcaption class="caption">Static Image</figcaption>
            </figure>
        </div>
        <div class="item youtube">
            <iframe class="embed-player slide-media" width="980" height="520" src="https://www.youtube.com/embed/QV5EXOFcdrQ?enablejsapi=1&controls=0&fs=0&iv_load_policy=3&rel=0&showinfo=0&loop=1&playlist=QV5EXOFcdrQ&start=1" frameborder="0" allowfullscreen></iframe>
            <p class="caption">YouTube</p>
        </div>
        <div class="item image">
            <figure>
                <div class="slide-image slide-media" style="background-image:url('https://drive.google.com/uc?export=view&id=0B_koKn2rKOkLSlBkWDBsWXJNazQ');">
                    <img data-lazy="https://drive.google.com/uc?export=view&id=0B_koKn2rKOkLSlBkWDBsWXJNazQ" class="image-entity" />
                </div>
                <figcaption class="caption">Static Image</figcaption>
            </figure>
        </div>
        <div class="item video">
            <video class="slide-video slide-media" loop muted preload="metadata" poster="https://drive.google.com/uc?export=view&id=0B_koKn2rKOkLSXZCakVGZWhOV00">
                <source src="https://player.vimeo.com/external/138504815.sd.mp4?s=8a71ff38f08ec81efe50d35915afd426765a7526&profile_id=112" type="video/mp4" />
            </video>
            <p class="caption">HTML 5 Video</p>
        </div>
    </section>

</div>


<? //} ?>

<!--<div class="slick">
    <section class="main-slider">
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
                    src="https://www.youtube.com/embed/TeZ7b1P8bkk?enablejsapi=1&controls=0&fs=0&iv_load_policy=3&rel=0&showinfo=0&loop=1&playlist=QV5EXOFcdrQ&start=1"
                    frameborder="0" allowfullscreen></iframe>
            <p class="caption">YouTube</p>
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
    </section>
</div>-->

<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js'></script>
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

        //start the slider
        slideWrapper.slick({
            autoplay: false,
            fade: true,
            autoplaySpeed: 4000,
            lazyLoad: "progressive",
            speed: 600,
            arrows: false,
            dots: true,
            cssEase: "cubic-bezier(0.87, 0.03, 0.41, 0.9)"
        });
    });

    // Resize event
    $(window).on("resize.slickVideoPlayer", function () {
        resizePlayer(iframes, 16 / 9);
    });
</script>
