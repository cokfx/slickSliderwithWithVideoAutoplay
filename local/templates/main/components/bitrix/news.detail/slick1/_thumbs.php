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
<div class="container">
    <div class="b-slider b-slider--horizontal-tm-1 js-slider-horizontal-tm-1">
        <div class="b-slider__carousel b-slider__carousel--screen">

            <div class="b-slider__item"><img src="//placehold.it/500x300&amp;text=1" alt=""/></div>
            <div class="b-slider__item"><img src="//placehold.it/500x300&amp;text=2" alt=""/></div>
            <div class="b-slider__item"><img src="//placehold.it/500x300&amp;text=3" alt=""/></div>
            <div class="b-slider__item"><img src="//placehold.it/500x300&amp;text=4" alt=""/></div>
            <div class="b-slider__item"><img src="//placehold.it/500x300&amp;text=5" alt=""/></div>
            <div class="b-slider__item"><img src="//placehold.it/500x300&amp;text=6" alt=""/></div>
        </div>
        <div class="b-slider__carousel b-slider__carousel--thumbs">
            <div class="b-slider__item"><img src="//placehold.it/500x300&amp;text=1" alt=""/></div>
            <div class="b-slider__item"><img src="//placehold.it/500x300&amp;text=2" alt=""/></div>
            <div class="b-slider__item"><img src="//placehold.it/500x300&amp;text=3" alt=""/></div>
            <div class="b-slider__item"><img src="//placehold.it/500x300&amp;text=4" alt=""/></div>
            <div class="b-slider__item"><img src="//placehold.it/500x300&amp;text=5" alt=""/></div>
            <div class="b-slider__item"><img src="//placehold.it/500x300&amp;text=6" alt=""/></div>
        </div>
    </div>
</div>
<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js'></script>
<script>
    // $ npm install -S slick-carousel
    // 'node_modules/slick-carousel/slick/slick.min.js',
    // 'node_modules/slick-carousel/slick/slick.css',
    // SLICK
    (function(){
        var
            $sl = $('.b-slider');
        if ($sl.length) {
            $sl.each(function(index, el) {
                var
                    $sl    = $(this),
                    $slFor   = $sl.find('.b-slider__carousel--screen'),
                    $slNav   = $sl.find('.b-slider__carousel--thumbs');

                // theme list
                if ($sl.is('.js-slider-horizontal-tm-1')) {
                    $slFor.slick({
                        asNavFor: $slNav.length ? $slNav : false,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: true,
                        adaptiveHeight: true,
                        prevArrow: '<i class="fas fa-arrow-alt-circle-left"></i>',
                        nextArrow: '<i class="fas fa-arrow-alt-circle-right"></i>',
                        // fade: true,
                        // VERTICAL
                        // vertical: true,
                        // verticalSwiping: true,
                        responsive: [
                            {
                                breakpoint: 768,
                                settings: {
                                    arrows: false,
                                    dots: true,
                                }
                            }
                        ]
                    });
                    var
                        slShow = 5,
                        slBool = ($slNav.children().length > slShow) ? true : false,
                        slScroll = ($slNav.children().length > slShow) ? 1 : slShow;
                    $slNav.slick({
                        asNavFor: $slFor.length ? $slFor : false,
                        centerPadding: '0',
                        slidesToShow: slShow,
                        slidesToScroll: slScroll,
                        infinite: slBool,
                        centerMode: slBool,
                        focusOnSelect: true,
                        dots: false,
                        arrows: true,
                        prevArrow: '<i class="far fa-arrow-alt-circle-left"></i>',
                        nextArrow: '<i class="far fa-arrow-alt-circle-right"></i>',
                        responsive: [
                            {
                                breakpoint: 768,
                                settings: {
                                    slidesToShow: 3,
                                }
                            }
                        ]
                    });
                }
            });
        }
    }());



    // // slickGoTo + slickCurrentSlide
    // var
    //   $slGoTo = $('[data-slide]');
    // $slGoTo.on('click', function(e) {
    //   e.preventDefault();
    //   var slideno = $(this).data('slide');
    //   $(nav).slick('slickGoTo', slideno-1);
    // });
    // $(sld).on('afterChange', function(slick, currentSlide) {
    //   var currentS = $(this).slick('slickCurrentSlide');
    //   $slGoTo.removeClass('active');
    //   $('[data-slide='+(currentS+1)+']').addClass('active');
    // });
</script>
