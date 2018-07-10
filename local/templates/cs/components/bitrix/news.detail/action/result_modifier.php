<?
/**
 * @var array $arResult
 */

/** @var CFile $CFile */
$CFile = new CFile;

if (!is_array($arResult['DETAIL_PICTURE'])) {
	if (is_array($arResult['PREVIEW_PICTURE'])) {
		$arResult['DETAIL_PICTURE'] = $arResult['PREVIEW_PICTURE'];
	}
}

if (is_array($arResult['DETAIL_PICTURE'])) {

	$arResult['DETAIL_PICTURE_RESIZED'] = $CFile->ResizeImageGet(
		$arResult['DETAIL_PICTURE'],
		array(
			'width'  => 700,
			'height' => 700
		),
		BX_RESIZE_IMAGE_PROPORTIONAL
	);
}

