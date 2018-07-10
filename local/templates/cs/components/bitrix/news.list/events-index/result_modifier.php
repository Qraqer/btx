<?
/**
 * @var array $arResult
 * @var array $arParams
 */

/** @var CFile $CFile */
$CFile = new CFile;

$item = &$arResult['ITEMS'][0];
$item['PREVIEW_PICTURE_RESIZED'] =  $CFile->ResizeImageGet(
	$item['PREVIEW_PICTURE'],
	array(
		'width'  => 380,
		'height' => 380
	),
	BX_RESIZE_IMAGE_PROPORTIONAL
);

foreach (range(1, $arParams['NEWS_COUNT'] - 1 ) as $index)
{
	$item = &$arResult['ITEMS'][$index];
	$item['PREVIEW_PICTURE_RESIZED'] =  $CFile->ResizeImageGet(
		$item['PREVIEW_PICTURE'],
		array(
			'width'  => 160,
			'height' => 160
		),
		BX_RESIZE_IMAGE_PROPORTIONAL
	);
}
unset($item);
