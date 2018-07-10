<?
/**
 * @var array $arResult
 * @var array $arParams
 */

/** @var CFile $CFile */
$CFile = new CFile;

foreach ($arResult['ITEMS'] as &$item)
{
	$item['PREVIEW_PICTURE_RESIZED'] = $CFile->ResizeImageGet(
		$item['PREVIEW_PICTURE'],
		array(
			'width'  => 70,
			'height' => 70
		),
		BX_RESIZE_IMAGE_PROPORTIONAL
	);
}
unset($item);
