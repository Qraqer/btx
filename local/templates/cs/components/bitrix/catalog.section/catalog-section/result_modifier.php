<?
/**
 * @var array $arResult
 */

/** @var CFile $CFile */
$CFile = new CFile;

foreach ($arResult['ITEMS'] as &$item) {

    if (is_array($item['PREVIEW_PICTURE'])) {

        $item['PREVIEW_PICTURE_RESIZED'] = $CFile->ResizeImageGet(
            $item['PREVIEW_PICTURE'],
            array(
                'width' => 150,
                'height' => 100
            ),
            BX_RESIZE_IMAGE_PROPORTIONAL
        );
    }
}
unset($item);


