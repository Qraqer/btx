<?
/**
 * @var array $arResult
 * @var array $arParams
 */

/** @var CFile $CFile */
$CFile = new CFile;
$firstBig = $arParams['FIRST_BIG'] == 'Y';

if($firstBig) {
	$item = &$arResult['ITEMS'][0];
	$item['PREVIEW_PICTURE_RESIZED'] = $CFile->ResizeImageGet(
		$item['PREVIEW_PICTURE'],
		array(
			'width'  => 730,
			'height' => 730
		),
		BX_RESIZE_IMAGE_PROPORTIONAL
	);
}

foreach (range($firstBig ? 1 : 0, $arParams['NEWS_COUNT'] - 1) as $index)
{
	$item = &$arResult['ITEMS'][$index];
	$item['PREVIEW_PICTURE_RESIZED'] =  $CFile->ResizeImageGet(
		$item['PREVIEW_PICTURE'],
		array(
			'width'  => 380,
			'height' => 380
		),
		BX_RESIZE_IMAGE_PROPORTIONAL
	);
}
unset($item);
