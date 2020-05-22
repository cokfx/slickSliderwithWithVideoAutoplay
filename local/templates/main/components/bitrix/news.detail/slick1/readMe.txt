Slick - известный и очень популярный слайдер для изображений и HTML для любого сайта. Но, что он кроет в себе? Отличный функционал, множество возможностей, о которых не знают даже профессионалы... Мы их раскроем все.



Смотрите также: Простой слайдер для HTML сайта jQuery +DEMO
Погрузись вместе с нами в мир, который уже создали для тебя... Это невероятно, но факт! Slick умеет так много, используя при этом так мало JS и CSS кода. Вместе с Slick, твоя жизнь стремительно измениться. Создавай уникальные эффекты, используй функционал этого маленького, но очень мощного слайдера на все 100%! И мы тебе в этом поможем.

Slick используют все... Начиная с каких-то дополнений для различных CMS, до больших порталов. Например, сайт канала ТВ3 (Россия) использует именно Slick...



Мы расскажем все, что знаем о Skick. Покажем, что мы уже сделали за многие годы его использования и поделимся исходным кодом. Тебе остается лишь все прикрутить к своему проекту.

Навигация:

Функционал
Обратные функции и др.
Slick slider, который ты не знаешь...
1. Краткий обзор и установка. Стандартные и банальные подключения.

Показываю какие есть варианты слайдера, подключаю с помощью разных способов.
Прохожусь по функционалу слайдера, используя стандартные и озвученные более-менее в справке (https://kenwheeler.github.io/slick/) возможности.
2, 3. Слайдер не только картинок...

Подключаем его, с использованием различных вариантов самих слайдов. Это могут быть не только изображения... Но и HTML =)
А изображения мы будем подгружать, только, если слайд с ним активен! Так сказать LazyLoading, но не по скроллу, а по переключению слайдов #2 варианта.
4. Малоизвестный функционал, вертикальный слайдер при скролле.

На самом деле, у Slick гораздо больше возможностей, чем указано в документации.
Мы рассмотрим адаптацию для различных экранов (PC, mobile, tablet).
А также поймем, как можно использовать Slick с помощью события Scroll.
Кроме того, сделаем слайдер НЕ ползающим (влево, вправо), а с эффектом fade.
5. Темы слайдера для разных случаев.

Убираем шрифт slick, оптимизируем код слайдера. Добавляем все в свои JS и CSS файлы.
Изменяем положения и общий вид функциональных элементов (навигационные кнопки, шарики с активным слайдом/количеством всех слайдов).
Видео + код + файлы + DEMO:
1 часть. Подключение 2 способа
 Скачать архив с кодом и файлами #1 (1 MB)
Перейти на страницу DEMO

1-ый способ подключения – используя CDN:
Подключаем JS (jQuery, Slick.min):

code
<script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script><script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
Подключаем стили:

code
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
Также можно смело добавить такие стили:

code
<style>
.simpleimgs{display: flex!important;justify-content: center;align-items: center}
.simpleimgs img{width:100%;min-height:40vh;max-height:90vh;height:100%;object-fit:contain}
</style>
Только выставите необходимые размеры слайдов (min-height:40vh - здесь меняйте и далее).

2-ой способ - локальное подключение (с темой оформления)
Подключаем JavaScript: jQuery и Slick (min версию - минифицированную)

code
<script src="/js/jquery.min.js"></script>
<script src="/js/slick.min.js"></script>
Подключаем стили (css):

code
<link rel="stylesheet" href="/css/slick.css">
<link rel="stylesheet" href="/css/slick-theme.css">
Используем JS код подключения:

code
<script>
$('.simpleimgs').slick({
  accessibility:false,
  autoplay:true,
  cssEase: 'cubic-bezier(0.2, 1.02, 0.51, 0.22)'
})
</script>


HTML код должен быть такой:

code
<div class="simpleimgs">
    <img src="/img/1.jpg" alt="">
    <img src="/img/2.jpg" alt="">
    <img src="/img/3.jpg" alt="">
    <img src="/img/4.jpg" alt="">
    <img src="/img/5.jpg" alt="">
    <img src="/img/6.jpg" alt="">
</div>
2 часть. Настройки
 Скачать архив с кодом и файлами #2 (1 MB)
Перейти на страницу DEMO

code
let $slider = $(".simpleimgs");/*при необходимости измените лишь название класса*/
function mouseWheel($slider){$slider.on('wheel',{$slider: $slider},mouseWheelHandler)};
function mouseWheelHandler(event){/*функция отслеживания прокрутки мыши (вверх или вниз)*/
    const $slider = event.data.$slider,/*объявляем сам слайдер*/
        delta = event.originalEvent.deltaY,/*объявляем куда скроллим*/
        activeSlide=$('.slick-active').data('slick-index'),/*узнаем какой индекс у текущего слайда*/
        slideLength=$('.slick-slide').length;/*всего слайдов*/
    if(delta > 0) {/*если скроллим вниз*/
        if(activeSlide!=slideLength-1){event.preventDefault()};/*если слайд НЕ последний, то отменяем стандартное событие скролла и перематываем слайды вниз (к следующему)*/
        $slider.slick('slickNext');/*управляющее событие - к следующему слайду*/
    }else{
        if(activeSlide!=0){event.preventDefault()}; /*если скроллим вверх, то переключаем слайды, пока НЕдолистаем до первого*/
        $slider.slick('slickPrev');/*управляющее событие - предыдущий слайд*/
    }
};
$slider.on('init',function(){
    mouseWheel($slider);
}).slick({
    infinite:false,
    arrows:false,
    verticalSwiping:true,
    touchThreshold:30,
    accessibility:true,
    fade:true
});
JavaScriptCopy
Данный код позволит Вам подключить Slick, задействовать вертикальную опцию – он будет перемещать слайды вертикально. А также Вы сможете управлять слайдами, при помощи колесика мыши.

В видео этот же код, но здесь он доделан, чтобы при долистывании к последнему слайду - событие прокрутки колесика прокручивало страницу, и наоборот — если долистаем до первого слайда (вверх страницу прокрутить позволяло).

Код HTML для слайдера:
code
<div class="simpleimgs">
    <img src="/img/1.jpg" alt="">
    <img src="/img/2.jpg" alt="">
    <img src="/img/3.jpg" alt="">
    <img src="/img/4.jpg" alt="">
    <img src="/img/5.jpg" alt="">
    <img src="/img/6.jpg" alt="">
</div>
MarkupCopy
Можно использовать более сложный код, как здесь:

code
<div class="b3 slick">
    <div class="p b3 slick-div">
        <div class="pa loadSlickImg o0" data-img="https://f.usemind.org/files/scripts/0/slick/img/1.jpg"></div>
        <div class="slick-title">123</div>
        <div><button class="pa p4 b3 c0 tu fwb slick-link-text_" onclick="location.href='#'">321</button></div>
    </div>

    <div class="p b3 slick-div">
        <div class="pa loadSlickImg o0" data-img="https://f.usemind.org/files/scripts/0/slick/image3/02_door.jpg"></div>
        <div class="slick-title">Защиту осуществляют входные двери</div>
        <div><button class="pa p4 b3 c0 tu fwb slick-link-text_" onclick="location.href='#'">Каталог входных дверей</button></div>
    </div>

    <div class="p b3 slick-div">
        <div class="pa loadSlickImg o0" data-img="https://f.usemind.org/files/scripts/0/slick/image3/01_door.jpg"></div>
        <div class="slick-title">Уют создают межкомнатные двери</div>
        <div><button class="pa p4 b3 c0 tu fwb slick-link-text_" onclick="location.href='#'">Каталог межкомнатных дверей</button></div>
    </div>

    <div class="p b3 slick-div">
        <div class="pa loadSlickImg o0" data-img="https://f.usemind.org/files/scripts/0/slick/image3/03_window.jpg"></div>
        <div class="slick-title">Заботятся качественные пластиковые окна</div>
        <div><button class="pa p4 b3 c0 tu fwb slick-link-text_" onclick="location.href='#'">Каталог пластиковых окон</button></div>
    </div>
</div>
MarkupCopy
3 часть. Стиль и lazyLoading
 Скачать архив с кодом и файлами #3 (2 MB)
Перейти на страницу DEMO

HTML:

code
<div class="b3 slick">
    <div class="p b3 slick-div">
        <div class="pa loadSlickImg o0" data-img="https://f.usemind.org/files/scripts/0/slick/img/1.jpg"></div>
        <div class="slick-title">123</div>
        <div><button class="pa p4 b3 c0 tu fwb slick-link-text_" onclick="location.href='#'">321</button></div>
    </div>

    <div class="p b3 slick-div">
        <div class="pa loadSlickImg o0" data-img="https://f.usemind.org/files/scripts/0/slick/image3/02_door.jpg"></div>
        <div class="slick-title">Защиту осуществляют входные двери</div>
        <div><button class="pa p4 b3 c0 tu fwb slick-link-text_" onclick="location.href='#'">Каталог входных дверей</button></div>
    </div>

    <div class="p b3 slick-div">
        <div class="pa loadSlickImg o0" data-img="https://f.usemind.org/files/scripts/0/slick/image3/01_door.jpg"></div>
        <div class="slick-title">Уют создают межкомнатные двери</div>
        <div><button class="pa p4 b3 c0 tu fwb slick-link-text_" onclick="location.href='#'">Каталог межкомнатных дверей</button></div>
    </div>

    <div class="p b3 slick-div">
        <div class="pa loadSlickImg o0" data-img="https://f.usemind.org/files/scripts/0/slick/image3/03_window.jpg"></div>
        <div class="slick-title">Заботятся качественные пластиковые окна</div>
        <div><button class="pa p4 b3 c0 tu fwb slick-link-text_" onclick="location.href='#'">Каталог пластиковых окон</button></div>
    </div>
</div>
MarkupCopy
JS и два способа lazyLoading (первый закомментирован):

code
//slick init
if($('div').is('.slick')){
    $(".slick").slick({
    dots: true,
    focusOnSelect: true
    /*autoplay: true,
    autoplaySpeed: 3500,*/
    });
};
//\ slick init

//sync load Slider img #FIRST VAR
/*if($('div').is('.slick-div')) { // 1,2,3..
    var qq=setTimeout(function () {
        $('.loadSlickImg').each(function (x) {
            var qli=$('.loadSlickImg'),
                i=new Image();
            i.src = $(this).attr('data-img');
            $(i).on('load',function(){
                $(qli[x]).css({'background':'url('+$(qli[x]).attr('data-img')+')50% 50% / cover no-repeat'}).removeClass('o0').parent('.slick-div').addClass('loadDn')
            });

        });
        clearTimeout(qq)
    },1000)
};*/
//\sync load Slider img

//sync load img in slick.on btn click # SECOND VAR
//when change slide
$('.slick').on('afterChange', function (){//1 > 2 > 3..
    var this_=$('.slick-active .loadSlickImg').not('ldd');
    $(this_).css({background:'url(\''+$(this_).data('img')+'\')50% /cover no-repeat'})
    var im_=new Image() ;
    im_.src=$(this_).data('img') ;
    im_.onload=function(){
        $(this_).removeClass('o0').parent('.slick-div').addClass('loadDn')
    }
});
//when page loaded
$('.slick-active .loadSlickImg').eq(0).css({background:'url(\''+$('.slick-active .loadSlickImg').eq(0).data('img')+'\')50% /cover no-repeat'});
var im_=new Image();
im_.src=$('.slick-active .loadSlickImg').eq(0).data('img') ;
im_.onload=function() {
    $('.slick-active .loadSlickImg').eq(0).removeClass('o0').addClass('ldd').parent('.slick-div').addClass('loadDn')
};
//\ sync load img in slick.on btn click # SECOND VAR
JavaScriptCopy
4 часть. callback + адаптивность и др.
 Скачать архив с кодом и файлами #4 (1 MB)
Перейти на страницу DEMO

Различные обратные функции и дополнительные функции:

code
//1. init
//[Первичная инициализация]
$('.your-element').on('init', function(){
  console.log('slick init');
  // left
});

//2.
//[Срабатывает ПОСЛЕ swipe/drag (свайпа пальцами или мышью ИЛИ перемещения мышью)]
$('.your-element').on('swipe', function(slick, settigs, direction){
  console.log(direction);
  // left
});

//3.
// On edge hit [Сообщает, когда доскроллили до конца в режиме НЕ бесконечном (NON infinite [Настройка: {infinite:FALSE}]).]
$('.your-element').on('edge', function(event, slick, direction){
  console.log('edge was hit')
});

//4.
// On before slide change
$('.your-element').on('beforeChange', function(event, slick, currentSlide, nextSlide){
  console.log(nextSlide);
});
//ЕЩЕ
var sqx=$('.slide')//один слайд
$sliderSites.on('beforeChange', function(event, slick, currentSlide, nextSlide){
    $(sqx).removeClass('slideClMin');/*all*/
    $(sqx[currentSlide]).addClass('slideClMin');/*slide on left*/
    $(sqx[currentSlide+2]).removeClass('slideClMin').addClass('slideClPlus');/*slide on right*/
    $(sqx[currentSlide+1]).removeClass('slideClPlus');/*all*/
});


//5.
$sliderSites.on('afterChange', function(event, slick, currentSlide_, nextSlide){
    $('.splslide .slick-active').removeClass('slideClMin',function() {
        $('.splslide .slick-active').removeClass('slideClPlus')
    })
});

//6. Переход к слайду
$('.videopl').slick('slickGoTo',s);

//7. Подключение по событию...
if($('.slick-active').find('.slide').length !== 0){

    $sliderSites.slick({
        dots: true,
        autoplay: true,
        infinite: false,
        speed: 700,
        slidesToShow: 1,
        accessibility:false
    });

}
JavaScriptCopy
Подключение Slick с адаптивностью:

code
$('.slick').slick({
    dots: true,
    infinite: false,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 4,
    /*mobileFirst:true,*/
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: false,
                dots: true
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]
});
JavaScriptCopy
Дополнительно:

code
let $slider = $(".slick"),/*это класс div'а, в котором лежал слайды*/
    mainSlDiv=$('.h1p'),/*можно убрать*/
    isAnimView=0,/*моя переменная для анимации*/
    toScroll='';
function mouseWheel($slider){$slider.on('wheel',{$slider: $slider},mouseWheelHandler)};
function mouseWheelHandler(event){/*здесь и чуть выше код, который позволяет перелистывать Slick колесом мыши*/
    if(toScroll=='check'){return false};
    event.preventDefault();
    const $slider = event.data.$slider,
        delta = event.originalEvent.deltaY;
    if(delta &gt; 0) {
        $slider.slick('slickNext');
    }
    else {
        $slider.slick('slickPrev');
    }
};

$slider.on('init',function(){/*после инициализации я подключаю функцию обработки событий мыши, чтобы они перехватывались ||| !!! Выше в уроке есть аналог, который позволит также пролистывать страницу вверх, если долистали до первого слайда и крутим вверх, а также &mdash; вниз, если долистали до последнего слайда и крутим вниз*/
    mouseWheel($slider);
    $('.scrllerOne').on('click',function() {
        $("main.container").slick('slickGoTo', 1);
    });
    $('.extLnk').on('click',function() {
        $("main.container").slick('slickGoTo', 2);
    })
}).slick({/*подключение Slick*/
    dots:true,
    vertical:true,
    infinite:false,
    arrows:false,
    verticalSwiping:true,
    touchThreshold:30,
    accessibility:true
});

let sqx=$('.slide'),i_;/*Некоторые переменные*/
$(sqx).addClass('o0');/*Добавляю прозрачность opacity:0*/

$slider.on('afterChange', function(event, slick, currentSlide, nextSlide){
    $(mainSlDiv).removeClass('slideClMinMain');/*здесь и ниже представлен код, как я взаимодействую со Slick*/
    /*load sites*/
    var splslide = $("div.slide"),
        $sliderSites = $(".splslide");/*слайдер в слайдере*/

    /*slide sites*/
    if($('.slick-active').find('.slide').length !== 0){/*если я нахожу слайдер, то активирую его и подгружаю изображения*/
        if(!$('.slide').hasClass('JSloaded')){
            $.each(sqx,function(x){/*свой lazyLoading*/
                i_=new Image();
                i_.src = $(this).attr('data-img');
                $(i_).on('load',function(){
                    $(sqx[x]).css({'background':'url('+$(sqx[x]).attr('data-img')+')50% /contain no-repeat'}).removeClass('o0').addClass('JSloaded');
                    $('.lSI').parent('div').remove();
                })
            });
            /*slick in slick - view sites | with pseudo-3D*/
            $sliderSites.slick({/*активация второго слайдера, если к нему пришел пользователь*/
                dots: true,
                autoplay: true,
                infinite: false,
                speed: 700,
                slidesToShow: 1,
                accessibility:false
            });
            $('.slisSites').addClass('fc');
            $(sqx).eq(1).addClass('slideClPlus');

            $sliderSites.on('afterChange', function(event, slick, currentSlide_, nextSlide){
                $('.splslide .slick-active').removeClass('slideClMin',function() {
                    $('.splslide .slick-active').removeClass('slideClPlus')
                })
            });

            $sliderSites.on('beforeChange', function(event, slick, currentSlide, nextSlide){
                $(sqx).removeClass('slideClMin');/*здесь я пытаюсь сбросить классы, чтобы затем санимировать псевдо-3D*/
                $(sqx[currentSlide]).addClass('slideClMin');/*slide on left*/
                $(sqx[currentSlide+2]).removeClass('slideClMin').addClass('slideClPlus');/*slide on right*/
                $(sqx[currentSlide+1]).removeClass('slideClPlus');/*all*/
            });

            $('.splslide .slick-dots').on('click',function() {
                $(sqx).removeClass('slideClMin slideClPlus')
            })
            /*slick in slick - view sites*/

        }
    };
   /*anim*/
    if($(".slick-active").find(".anim").length !== 0 && isAnimView==0){
        isAnimView=1;
        let qliThree=$(".qli div.pr");
        $(qliThree).each(function(x) {
            let bg_=$(this).attr("data-bg");
            $(qliThree[x]).append('<div class="pa qliP" style="opacity:1;'+bg_+'"></div>');
            $(qliThree[x]).prepend('<div class="pa qliPseudo" style="'+bg_+'"></div>');
        })
    };

    /*load brand/poly*/
    if($('.slick-active').find('.grid7').length !== 0){
        $('.scrller').remove();
        if(currentSlide==1){
            $sliderSites.slick('slickPlay')
        }else{
            if($('.splslide').hasClass('slick-slider'))$sliderSites.slick('slickPause')
        };
        if($('.gdIm').hasClass('o0')){
            let sq=$('.gdIm');
            $.each(sq,function(x){
                i=new Image();
                i.src = $(this).attr('data-img');
                $(i).on('load',function(){
                    $(sq[x]).css({background:'url('+$(sq[x]).attr('data-img')+')50% 50% /cover no-repeat'}).removeClass('o0');
                    $('.loading_').remove();
                })
            })
        };
        if(!$('div').is('.JShover_'))$('.grid7').after('<div class="pa fc z5 br3 cp JShover_" style="background-color:rgba(255,255,255,.75);width:0;height:0;transform:translate3d('+$(window).width()/2+'px,'+$(window).height()/2+'px,0)scale(0)"><div class="p loop_"></div></div>');
        let activeGd;
        $('.gd').on('mouseover',function(){
            activeGd=$('.gd').index(this);
            $('.JShover_').css({width:$(this).outerWidth(),height:$(this).outerHeight(),'transform':'translate3d('+$(this).offset().left+'px,'+$(this).offset().top+'px,0)scale(1)'});
        });
        $('.JShover_').on('click',function(){
            $('.JShover_').css({'transform':'translate3d('+$(window).width()/2+'px,'+$(window).height()/2+'px,0)scale(0)'});
            $('.gdIm').eq(activeGd).trigger('click')
        });
        $(window).resize(function(){
            $('.JShover_').css({'transform':'translate3d('+$(window).width()/2+'px,'+$(window).height()/2+'px,0)scale(0)'})
        });
    }
});

if($(window).width()<644){
    /*slick in slick - view sites*/
    let $sb=$('.sb');
    $sb.slick({
        dots: true,
        infinite: false,
        speed: 700,
        slidesToShow: 1,
        accessibility:false
    });
    let gd=$('.grid7 .gd');
    gd.eq(0).removeClass('o0');
    $sb.on('afterChange', function(event, slick, currentSlide_, nextSlide){
        $('.sb .slick-active').removeClass('slideClMin slideClPlus')
    });
    $sb.on('beforeChange', function(event, slick, currentSlide_, nextSlide){
        $(gd[currentSlide_]).addClass('slideClMin');/*slide on left*/
        $(gd[currentSlide_+2]).removeClass('slideClMin').addClass('slideClPlus');/*slide on right*/
        $(gd[currentSlide_+1]).removeClass('slideClPlus')/*all*/
    });
    $('.grid7 .slick-dots').on('click',function() {
        gd.removeClass('slideClMin slideClPlus')
    })
};
JavaScriptCopy
Некоторый HTML-код:

1. Простой слайдер в слайдере:

code
<div class="b3 slick">

    <div class="p b3 slick-div"><!--1-->
        <div class="pa loadSlickImg o0" data-img="https://f.usemind.org/files/scripts/0/slick/image3/02_door.jpg"></div>
        <div class="slick-title">Защиту осуществляют входные двери</div>
        <div><button class="pa p4 b3 c0 tu fwb slick-link-text_" onclick="location.href='#'">Каталог входных дверей</button></div>
    </div>

    <div class="p b3 slick-div"><!--2-->
        <div class="pa loadSlickImg o0" data-img="https://f.usemind.org/files/scripts/0/slick/image3/01_door.jpg"></div>
        <div class="slick-title">Уют создают межкомнатные двери</div>
        <div><button class="pa p4 b3 c0 tu fwb slick-link-text_" onclick="location.href='#'">Каталог межкомнатных дверей</button></div>
    </div>

    <div class="p b3 slick-div"><!--3-->
        <div class="pa loadSlickImg o0" data-img="https://f.usemind.org/files/scripts/0/slick/image3/03_window.jpg"></div>
        <div class="slick-title">Заботятся качественные пластиковые окна</div>
        <div><button class="pa p4 b3 c0 tu fwb slick-link-text_" onclick="location.href='#'">Каталог пластиковых окон</button></div>
    </div>

    <div class="p b3 slick-div"><!--4-->
        <div class="slick2">
            <div>1</div>
            <div>2</div>
            <div>3</div>
            <div>4</div>
        </div>
    </div>
</div>
MarkupCopy
2. Слайдер в слайдере мой рабочий:

code
<!doctype html>
<html lang="ru" dir="ltr">
   <head>
      <meta name="viewport" content="width=device-width,initial-scale=1.0">
      <meta charset="utf-8">
   </head>
   <body>
      <div class="main">
         <main class="pr z2 container">
            <section class="fc h1p pt1r background mh1">
               <div>
                1 слайд
               </div>
            </section>
            <section class="fc pr z2 h1p mh pt1r background animD">
               <div class="fc anim">
                2 слайд
               </div>
            </section>
            <section class="pr h1p pt1r background slisSites"><!-- Слайдер в слайдере -->
               <div class="mx m0">
                  <div class="ovh">
                     <h2 class="p h22 z2 cf h2 h21 br3 p4">Слайдер в слайдере</h2>
                  </div>
                  <div class="pa fc">
                     <div class="pa loading lSI"></div>
                  </div>
                  <div class="pr splslide">
                     <div class="slide" data-img="/sys/sliderInSlider/04_auto.webp">
                        <div class="pr cp br3 tac bigTxt" onclick="window.open('https://link.inverser.pro/r?l=aHR0cHM6Ly9mLnVzZW1pbmQub3JnL2ZpbGVzL3NjcmlwdHMvMC9hdnRvcHJpZ29uL2luZGV4LnBocA==')">
                           Авто пригон
                           <div class="sml">сайт компании</div>
                           <div class="p birTxtA"></div>
                        </div>
                     </div>
                     <div class="slide" data-img="/sys/sliderInSlider/08_lyu.webp">
                        <div class="pr cp br3 tac bigTxt" onclick="window.open('https://link.inverser.pro/r?l=aHR0cHM6Ly9rdXBpdC1seXVzdHJ1LWRvbmV0c2sucnU=')">
                           Дом люстры
                           <div class="sml">интернет-магазин</div>
                           <div class="p birTxtA"></div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="p fc scrller scrllerPa"></div>
            </section>
            <section class="pr h1p pt1r background print">
               <div>
                4 слайд
               </div>
            </section>
         </main>
      </div>
   </body>
</html>
MarkupCopy
Немного CSS:

code
.an,.qli{-webkit-transition:all .4s;transition:all .4s}
.br3,.b3,.btn{-webkit-border-radius:3px;border-radius:3px}
.b50{-webkit-border-radius:50%;border-radius:50%}
.pa{position:absolute;top:0;right:0;bottom:0;left:0}
.pr{position:relative}
.p{position:absolute}
.pf{position:fixed}
.m0{margin:0 auto}
.mx{max-width:60vw;width:60vw}
.mh10,p{margin:10px 0}
.mt10{margin-top:10px}
.mr10{margin-right:10px!important}
.ml10{margin-left:10px!important}
.mr2{margin-right:2px}
.mt2{margin-top:2px}
.o0{opacity:0}
.cf{color:#fff}
.c7{color:#777}
.c0{color:#000!important}
button{font-family:'Play',sans;border:0;background:transparent}
.z1{z-index:1}
.z2{z-index:2}
.z3{z-index:3}
.z4{z-index:4}
.z5{z-index:5}
.z6{z-index:6}
.z-1,.js-tilt-glare{z-index:-1}
.z-2{z-index:-2}
.z-3{z-index:-3}
.z-4{z-index:-4}
.z-5{z-index:-5}
b,strong{font-weight:bold}
.ns{-webkit-user-select:none;user-select:none}
.ttu,.mp{text-transform:uppercase}
.ff{color:#fff}
.p4{padding:4px}
.fwb{font-weight:bold}
.m0a{margin:0 auto}
.tnw{white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.cp,.btn,.next,.prev,button{cursor:pointer}
.slide{transition:transform .5s linear,opacity .4s linear;will-change:transform}
.slideClMin{transform:matrix3d(1,0,0.00,-0.001,0.00,1,0.00,0,0,0,1,0,0,0,0,1);transform-origin:100% 0;opacity:0!important}
.slideClPlus{transform:matrix3d(1,0,0.00,0.001,0.00,1,0.00,0,0,0,1,0,0,0,0,1);transform-origin:0 0;opacity:0!important}
CSSCopy
Функционал...
Setting	Type	Default	Description
accessibility	boolean	true	Включает вкладки и навигацию по клавишам со стрелками
adaptiveHeight	boolean	false	Обеспечивает адаптивную высоту для слайдов с разной высотой.
autoplay	boolean	false	Управление автоматическим стартом пролистывания слайдов
autoplaySpeed	int(ms)	3000	Скорость автостарта (к предыдущей настройке) в миллисекундах (ms)
arrows	boolean	true	Предыдущий/следующий кнопки
asNavFor	string	null	Установите слайдер с которым будет синхронизироваться второй слайдер (имя класса или идентификатора)
appendArrows	string	$(element)	Изменить место, где прикреплены стрелки навигации (Selector, htmlString, Array, Element, jQuery object)
appendDots	string	$(element)	Изменить место, где прикреплены точки навигации (Selector, htmlString, Array, Element, jQuery object)
prevArrow	string (html|jQuery selector) | object (DOM node|jQuery object)
code
<button type="button" class="slick-prev">Previous</button>
HTMLCopy
Позволяет выбрать узел или настроить HTML для стрелки «Предыдущий».
nextArrow	string (html|jQuery selector) | object (DOM node|jQuery object)
code
<button type="button" class="slick-next">Next</button>
HTMLCopy
Позволяет выбрать узел или настроить HTML-код для стрелки «Следующий».
centerMode	boolean	false	Включает центрированный вид с частичными предыдущими / следующими слайдами. Используйте с нечетными slidesToShow значениями.
centerPadding	string	'50px'	Когда в режиме center mode, можно добавить отступы сбоку (px или %)
cssEase	string	'ease'	CSS3 Animation Easing (linear, ease-in..., cubic-bezier(...))
customPaging	function	n/a
Пользовательская функция вывода количества слайдов/текущий слайд или иная функция. Например:

code
$('.slideshow').slick({ slide: 'img', autoplay: true, dots: true, dotsClass: 'custom_paging', customPaging: function (slider, i) { //FYI just have a look at the object to find available information //press f12 to access the console in most browsers //you could also debug or look in the source console.log(slider); var slideNumber = (i + 1), totalSlides = slider.slideCount; return '<a class="custom-dot" role="button" title="' + slideNumber + ' of ' + totalSlides + '"><span class="string">' + slideNumber + '</span></a>'; } });
еще

code
1$(".slider").slick({

 autoplay: true,
 dots: true,
 customPaging : function(slider, i) {
 var thumb = $(slider.$slides[i]).data('thumb');
 return '<a><img src="'+thumb+'"></a>';
 },

 responsive: [{
 breakpoint: 500,
 settings: {
 dots: false,
 arrows: false,
 infinite: false,
 slidesToShow: 2,
 slidesToScroll: 2
 }
 }]
});
еще

code
customPaging: function(slick,index) {
    var image_title = slick.$slides.get(index).find('img').attr('title') || '';
    return '<b> ' + targetImage + '</b>';
}
dots	boolean	false	Показать точки (навигационные элементы)
dotsClass	string	'slick-dots'	Класс для точек
draggable	boolean	true	Включить перетаскивание мыши
fade	boolean	false	Управление fade-эффектом (исчезновение вместо пролистывания слайдлов влево/вправо)
focusOnSelect	boolean	false	Включить фокусировку на выбранном элементе (по клику)
easing	string	'linear'	Добавить easing для jQuery animate. Использовать с библиотеками easing или методами по умолчанию
edgeFriction	integer	0.15	Сопротивление при swipe (перемещение касанием). Чем больше, тем больше необходимо расстояния от начала касания, до сброса
infinite	boolean	true	Бесконечная прокрутка слайдов
initialSlide	integer	0	Изначальный номер слайда
lazyLoad	string	'ondemand'	Добавить ленивую загрузку (lazy loading). Принимает значения 'ondemand' или 'progressive'
mobileFirst	boolean	false	Настройки адаптивности, используется для мобильных при первой отрисовке или НЕТ
pauseOnFocus	boolean	true	Пауза при фокусе
pauseOnHover	boolean	true	Пауза при наведении мыши
pauseOnDotsHover	boolean	false	Пауза при наведении на управляющие точки
respondTo	string	'window'	Объект, на который реагирует реагирующий объект: 'window', 'slider' или 'min' (меньшее из двух)
responsive	object	none	Объект, содержащий breakpoint и объекты настроек (см. Демонстрацию). Включает настройки для заданной ширины экрана. Установите настройки «unslick» вместо объекта, чтобы отключить пятно в заданной breakpoint.
rows	int	1	Установка более 1 инициализирует режим сетки. Используйте slidesPerRow, чтобы установить, сколько слайдов должно быть в каждой строке.
slide	element	''	Элемент запроса для использования в качестве слайда
slidesPerRow	int	1	С режимом сетки, инициализируемым с помощью опции строк, это устанавливает, сколько слайдов в каждой строке сетки.
slidesToShow	int	1	... слайдов показывать
slidesToScroll	int	1	... слайдов перемещать за 1 перемещение
speed	int(ms)	300	время анимации перемещения/исчезновения-появления слайда
swipe	boolean	true	включить ли управление с помощью swipe (перемещением мыши или пальцами)
swipeToSlide	boolean	false	Разрешить пользователям перетаскивать или проводить пальцем прямо к слайду независимо от слайдов ToScroll
touchMove	boolean	true	Включить движение слайдов одним касанием
touchThreshold	int	5	Для продвижения слайдов пользователь должен провести пальцем по длине (1 / touchThreshold) * ширина слайдера
useCSS	boolean	true	Вкл/выкл CSS Transitions (transition: all .5s ease)
useTransform	boolean	true	Вкл/выкл CSS Transforms (transform: rotateX(180deg))
variableWidth	boolean	false	Вариативная ширина слайдов
vertical	boolean	false	Вертикальная ориентация слайдов
verticalSwiping	boolean	false	Вертикальные управления swipe действиями
rtl	boolean	false	Изменение направления RTL - right-to-left (справа налево) или LTR - left-ro-right (слева направо)
waitForAnimate	boolean	true	Игнорирует запросы на продвижение слайда во время анимации
zIndex	number	1000	Установите значения zIndex для слайдов, полезно для IE9 и ниже
Обратные функции (callback)
Event	Arguments	Description
afterChange	slick, currentSlide	После изменения слайдов
beforeChange	slick, currentSlide, nextSlide	ДО изменения слайдов (событие изменения уже запущено)
breakpoint	event, slick, breakpoint	После окончания изменений
destroy	event, slick	Слайдер выключен (destroy, unslick) – противоположность функции подключения.
edge	slick, direction	Сообщает, когда доскроллили до конца в режиме НЕ бесконечном (NON infinite [Настройка: {infinite:FALSE}]).
init	slick	Первичная инициализация
reInit	slick	Повторная инициализация (если до этого была функция destroy)
setPosition	slick	Сообщает когда позиция слайдов ИЛИ размер был изменен
swipe	{slick}, {settings}, "direction"	Срабатывает ПОСЛЕ swipe/drag (свайпа пальцами или мышью ИЛИ перемещения мышью)
lazyLoaded	event, slick, image, imageSource	Срабатывает, когда изображениЕ! загрузилось в режиме lazyLoading (Настройка: {lazyLoad:'ondemand'} ИЛИ {lazyLoad:'progressive'})
lazyLoadError	event, slick, image, imageSource	Если изображения в режиме lazyLoad (как выше) НЕ загрузились
slickCurrentSlide	none	возвращает индекс активного слайда
slickGoTo	int : slide number, boolean: dont animate	Переход к слайду – по индексу
slickNext	none	Переход к следующему слайду
slickPrev	none	Переход к предыдущему слайду
slickPause	none	Пауза, если стоит режим autoplay [Настройки {autoplay;true}]
slickPlay	none	Если поставлена пауза в режиме autoplay, то эта функция запускает слайдер снова в режим autoplay
slickAdd	html or DOM object, index, addBefore
Добавляет слайд. Если добавить ТАКЖЕ индекс, то слайд добавится ПОСЛЕ указанного индекса. Если индекс НЕ указан, то слайд добавится последним. Принимается HTML String || Object

code
var slideIndex = 5;
$('.js-add-slide').on('click', function() {
  slideIndex++;
  $('.slider-info').slick('slickAdd','<div><h3>' + slideIndex + '</h3></div>');
  $('.slider-info').slick('slickGoTo', 'slickCurrentSlide' + 1);
});
JavaScriptCopy
slickRemove	index, removeBefore	Удаление слайда по индексу. Если переменная removeBefore установлена в true, то будет удален первый слайд, если НЕ указан индекс (слайд, который необходимо удалить). Если removeBefore установлена в false, то будет удален последний слайд, если индекс НЕ указан.
slickFilter	Selector or Function	Фильтрация слайдов, используя jQuery .filter()
Посмотреть пример кода с фильтрами Slick слайдера
Скачать архив с примерами (298 KB)
code
var filterString = '';

$('.letter-filter a').on('click', function(event) {
    event.preventDefault();
    $('#responsive-carousel').slick('slickUnfilter');
    var filterString = $(this).attr('data-filter-by');
    console.log(filterString);
    $('#responsive-carousel').slick('slickFilter', '[data-first-letter="'+filterString+'"]');
    //$(this).text('Unfilter Slides');
    filtered = true;
});
JavaScriptCopy
slickUnfilter	index	Удаление примененных фильтров
slickGetOption	option : string	Получает индивидуальное значение параметра.
slickSetOption	option : string, value : depends on option, refresh : boolean	Устанавливает конкретное значение. Установите значение true, если требуется обновить UI.
code
slider = $('.slider').slick({
infinite: false,
speed: 300,
slidesToShow: 1,
adaptiveHeight: true,
asNavFor: '#menu-mobile',
draggable: true
});
$('input[type=text]').focus(function () {
console.log('in');
slider.slick("slickSetOption", "draggable", false, false);
}).blur(function () {
console.log('out');
slider.slick("slickSetOption", "draggable", true, false);
});
JavaScriptCopy
unslick	none	Обратное значение подключению slick() – деконструкция или деинициализация
code
$window.on('resize', function() {
  if ($window.width() < 640) {
    if ($slick_slider.hasClass('slick-initialized'))
      $slick_slider.slick('unslick');
    return
  }
  if ( ! $slick_slider.hasClass('slick-initialized'))
    return $slick_slider.slick(settings);
});
JavaScriptCopy
getSlick	none	Получить Slick Object
code
Slick.prototype.asNavFor = function(index) {
var _ = this, asNavFor = _.options.asNavFor !== null ? $(_.options.asNavFor).slick('getSlick') : null;
if(asNavFor !== null) asNavFor.slideHandler(index, true);
};
JavaScriptCopy
