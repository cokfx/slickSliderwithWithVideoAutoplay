<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$iblock_awards = 6;
if (SITE_ID == 's2') {
    $iblock_awards = 22;
}

//Главная картинка
$arResult['DETAIL_PICTURE'] = CFile::ResizeImageGet($arResult['DETAIL_PICTURE'], array('width' => 1920, 'height' => 660), BX_RESIZE_IMAGE_PROPORTIONAL, true);

//Привязанные проекты
foreach ($arResult['PROPERTIES']['projects']['VALUE'] as $key => $item) {

    $arSelect = array("ID", "NAME", "DETAIL_PAGE_URL", "PREVIEW_PICTURE");
    $arFilter = array("IBLOCK_ID" => $arParams['IBLOCK_ID'], "ACTIVE" => "Y", "ID" => $item);
    $res = CIBlockElement::GetList(array(), $arFilter, false, array("nPageSize" => 50), $arSelect);
    while ($ob = $res->GetNextElement()) {
        $arFields = $ob->GetFields();
        $arResult['DISPLAY_PROPERTIES']['projects']['VALUE'][$key] = $arFields;
        $arResult['DISPLAY_PROPERTIES']['projects']['VALUE'][$key]['PREVIEW_PICTURE'] = CFile::ResizeImageGet($arResult['DISPLAY_PROPERTIES']['projects']['VALUE'][$key]['PREVIEW_PICTURE'], array('width' => 411, 'height' => 226), BX_RESIZE_IMAGE_PROPORTIONAL, true);
    }
}


//Получение наград
foreach ($arResult['PROPERTIES']['awards']['VALUE'] as $key => $item) {
    $arSelect = array("ID", "NAME", "DETAIL_PAGE_URL");
    $arFilter = array("IBLOCK_ID" => $iblock_awards, "ACTIVE" => "Y", "ID" => $item);
    $res = CIBlockElement::GetList(array(), $arFilter, false, array("nPageSize" => 50), $arSelect);
    while ($ob = $res->GetNextElement()) {
        $arFields = $ob->GetFields();
        $arResult['PROPERTIES']['awards']['VALUE'][$key] = $arFields;
    }
}

//Обработка главной галереи
if ($arResult['PROPERTIES']['img']['VALUE'] || $arResult['PROPERTIES']['video']['VALUE']) {
    $count = count($arResult['PROPERTIES']['img']['VALUE']) + count($arResult['PROPERTIES']['video']['VALUE']);
    $arGallery = array();
    $arGallerySecond = array();
    if ($arResult['PROPERTIES']['img']['VALUE']) {
        foreach ($arResult['PROPERTIES']['img']['VALUE'] as $key => $item) {
            if ($arResult['PROPERTIES']['img']['DESCRIPTION'][$key]) {
                $arGallery[] = array(
                    'ID' => $item,
                    'TYPE' => 'img',
                    'ORDER' => $arResult['PROPERTIES']['img']['DESCRIPTION'][$key],
                    'VALUERES' => CFile::ResizeImageGet($arResult['PROPERTIES']['img']['VALUE'][$key], array('width' => 140, 'height' => 140), BX_RESIZE_IMAGE_PROPORTIONAL_ALT , true),

                    'VALUE' => CFile::ResizeImageGet($item, array('width' => 1920, 'height' => 1280), BX_RESIZE_IMAGE_PROPORTIONAL, true),

                );

            } else {
                $arGallerySecond[] = array(
                    'ID' => $item,
                    'TYPE' => 'img',
                    'ORDER' => $arResult['PROPERTIES']['img']['DESCRIPTION'][$key],
                    'VALUE' => CFile::ResizeImageGet($item, array('width' => 1920, 'height' => 1280), BX_RESIZE_IMAGE_PROPORTIONAL, true),
                    'VALUERES' => CFile::ResizeImageGet($arResult['PROPERTIES']['img']['VALUE'][$key], array('width' => 140, 'height' => 140), BX_RESIZE_IMAGE_PROPORTIONAL_ALT , true),

                );
            }
        }
    }


    if ($arResult['PROPERTIES']['video']['VALUE']) {
        foreach ($arResult['PROPERTIES']['video']['VALUE'] as $key => $item) {
            $video_code = explode('https://youtu.be/', $item);
            $video_code = $video_code[1];
            if ($arResult['PROPERTIES']['video']['DESCRIPTION'][$key]) {
                $arGallery[] = array(
                    'TYPE' => 'video',
                    'ORDER' => $arResult['PROPERTIES']['video']['DESCRIPTION'][$key],
                    'VALUE' => $item,
                    'IMG' => '//img.youtube.com/vi/' . $video_code . '/sddefault.jpg',
                    $arSrc = explode("/", $item),
                    "SRC" => 'https://youtube.com/embed/' . $arSrc[3] . '?enablejsapi=1&controls=0&fs=0&iv_load_policy=3&rel=0&showinfo=0&autoplay=1&loop=1&start=1'
                );
            } else {
                $arGallerySecond[] = array(
                    'TYPE' => 'video',
                    'ORDER' => $arResult['PROPERTIES']['video']['DESCRIPTION'][$key],
                    'VALUE' => $item,
                    'IMG' => '//img.youtube.com/vi/' . $video_code . '/sddefault.jpg'
                );
            }
        }
    }
    for ($j = 0; $j < count($arGallery) - 1; $j++) {
        for ($i = 0; $i < count($arGallery) - $j - 1; $i++) {
            // если текущий элемент больше следующего
            if ($arGallery[$i]['ORDER'] > $arGallery[$i + 1]['ORDER']) {
                // меняем местами элементы
                $tmp_var = $arGallery[$i + 1];
                $arGallery[$i + 1] = $arGallery[$i];
                $arGallery[$i] = $tmp_var;
            }
        }
    }
    foreach ($arGallerySecond as $keyGal => $itemGal) {
        array_push($arGallery, $itemGal);
    }
    $arResult['MAIN_GALLERY'] = $arGallery;
}
/*foreach ($arResult['MAIN_GALLERY'] as $i=> $item){
   if($item['TYPE']=='img'){
       $arResult['MAIN_GALLERY'][ $i]['VALUERES']=CFile::ResizeImageGet($item['VALUE'], array('width' => 140, 'height' => 140), BX_RESIZE_IMAGE_PROPORTIONAL, true);

   }


}*/

if ($arResult['PROPERTIES']['main_cover']['VALUE']) {
    $arResult['PROPERTIES']['main_cover']['VALUE'] = CFile::ResizeImageGet($arResult['PROPERTIES']['main_cover']['VALUE'], array('width' => 1636, 'height' => 900), BX_RESIZE_IMAGE_PROPORTIONAL, true);
}

//Обработка второй галереи
if ($arResult['PROPERTIES']['img2']['VALUE'] || $arResult['PROPERTIES']['video2']['VALUE']) {
    $count = count($arResult['PROPERTIES']['img2']['VALUE']) + count($arResult['PROPERTIES']['video2']['VALUE']);
    $arGallery = array();
    $arGallerySecond = array();
    if ($arResult['PROPERTIES']['img2']['VALUE']) {
        foreach ($arResult['PROPERTIES']['img2']['VALUE'] as $key => $item) {
            if ($arResult['PROPERTIES']['img2']['DESCRIPTION'][$key]) {
                $arGallery[] = array(
                    'TYPE' => 'img',
                    'ORDER' => $arResult['PROPERTIES']['img2']['DESCRIPTION'][$key],
                    'VALUE' => CFile::ResizeImageGet($item, array('width' => 1920, 'height' => 1280), BX_RESIZE_IMAGE_PROPORTIONAL, true)
                );
            } else {
                $arGallerySecond[] = array(
                    'TYPE' => 'img',
                    'ORDER' => $arResult['PROPERTIES']['img2']['DESCRIPTION'][$key],
                    'VALUE' => CFile::ResizeImageGet($item, array('width' => 1920, 'height' => 1280), BX_RESIZE_IMAGE_PROPORTIONAL, true)
                );
            }
        }
    }

    if ($arResult['PROPERTIES']['video2']['VALUE']) {
        foreach ($arResult['PROPERTIES']['video2']['VALUE'] as $key => $item) {
            $video_code = explode('https://youtu.be/', $item);
            $video_code = $video_code[1];
            if ($arResult['PROPERTIES']['video2']['DESCRIPTION'][$key]) {
                $arGallery[] = array(
                    'TYPE' => 'video',
                    'ORDER' => $arResult['PROPERTIES']['video2']['DESCRIPTION'][$key],
                    'VALUE' => $item,
                    'IMG' => '//img.youtube.com/vi/' . $video_code . '/sddefault.jpg'
                );
            } else {
                $arGallerySecond[] = array(
                    'TYPE' => 'video',
                    'ORDER' => $arResult['PROPERTIES']['video2']['DESCRIPTION'][$key],
                    'VALUE' => $item,
                    'IMG' => '//img.youtube.com/vi/' . $video_code . '/sddefault.jpg'
                );
            }
        }
    }
    for ($j = 0; $j < count($arGallery) - 1; $j++) {
        for ($i = 0; $i < count($arGallery) - $j - 1; $i++) {
            // если текущий элемент больше следующего

            if ($arGallery[$i]['ORDER'] > $arGallery[$i + 1]['ORDER']) {
                // меняем местами элементы
                $tmp_var = $arGallery[$i + 1];
                $arGallery[$i + 1] = $arGallery[$i];
                $arGallery[$i] = $tmp_var;
            }
        }
    }
    foreach ($arGallerySecond as $keyGal => $itemGal) {
        array_push($arGallery, $itemGal);
    }
    $arResult['SECOND_GALLERY'] = $arGallery;
}

if ($arResult['PROPERTIES']['main_cover2']['VALUE']) {
    $arResult['PROPERTIES']['main_cover2']['VALUE'] = CFile::ResizeImageGet($arResult['PROPERTIES']['main_cover2']['VALUE'], array('width' => 627, 'height' => 319), BX_RESIZE_IMAGE_PROPORTIONAL, true);
}

//Обработка третьей галереи
if ($arResult['PROPERTIES']['img3']['VALUE'] || $arResult['PROPERTIES']['video3']['VALUE']) {
    $count = count($arResult['PROPERTIES']['img3']['VALUE']) + count($arResult['PROPERTIES']['video2']['VALUE']);
    $arGallery = array();
    $arGallerySecond = array();
    if ($arResult['PROPERTIES']['img3']['VALUE']) {
        foreach ($arResult['PROPERTIES']['img3']['VALUE'] as $key => $item) {
            if ($arResult['PROPERTIES']['img3']['DESCRIPTION'][$key]) {
                $arGallery[] = array(
                    'TYPE' => 'img',
                    'ORDER' => $arResult['PROPERTIES']['img3']['DESCRIPTION'][$key],
                    'VALUE' => CFile::ResizeImageGet($item, array('width' => 1920, 'height' => 1280), BX_RESIZE_IMAGE_PROPORTIONAL, true)
                );
            } else {
                $arGallerySecond[] = array(
                    'TYPE' => 'img',
                    'ORDER' => $arResult['PROPERTIES']['img3']['DESCRIPTION'][$key],
                    'VALUE' => CFile::ResizeImageGet($item, array('width' => 1920, 'height' => 1280), BX_RESIZE_IMAGE_PROPORTIONAL, true)
                );
            }
        }
    }

    if ($arResult['PROPERTIES']['video3']['VALUE']) {
        foreach ($arResult['PROPERTIES']['video3']['VALUE'] as $key => $item) {
            $video_code = explode('https://youtu.be/', $item);
            $video_code = $video_code[1];
            if ($arResult['PROPERTIES']['video3']['DESCRIPTION'][$key]) {
                $arGallery[] = array(
                    'TYPE' => 'video',
                    'ORDER' => $arResult['PROPERTIES']['video3']['DESCRIPTION'][$key],
                    'VALUE' => $item,
                    'IMG' => '//img.youtube.com/vi/' . $video_code . '/sddefault.jpg'
                );
            } else {
                $arGallerySecond[] = array(
                    'TYPE' => 'video',
                    'ORDER' => $arResult['PROPERTIES']['video3']['DESCRIPTION'][$key],
                    'VALUE' => $item,
                    'IMG' => '//img.youtube.com/vi/' . $video_code . '/sddefault.jpg'
                );
            }
        }
    }
    for ($j = 0; $j < count($arGallery) - 1; $j++) {
        for ($i = 0; $i < count($arGallery) - $j - 1; $i++) {
            // если текущий элемент больше следующего
            if ($arGallery[$i]['ORDER'] > $arGallery[$i + 1]['ORDER']) {
                // меняем местами элементы
                $tmp_var = $arGallery[$i + 1];
                $arGallery[$i + 1] = $arGallery[$i];
                $arGallery[$i] = $tmp_var;
            }
        }
    }
    foreach ($arGallerySecond as $keyGal => $itemGal) {
        array_push($arGallery, $itemGal);
    }
    $arResult['THIRD_GALLERY'] = $arGallery;
}

if ($arResult['PROPERTIES']['main_cover3']['VALUE']) {
    $arResult['PROPERTIES']['main_cover3']['VALUE'] = CFile::ResizeImageGet($arResult['PROPERTIES']['main_cover3']['VALUE'], array('width' => 627, 'height' => 319), BX_RESIZE_IMAGE_PROPORTIONAL, true);
}


