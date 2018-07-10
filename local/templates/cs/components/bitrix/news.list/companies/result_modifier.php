<?
/**
 * @var array $arResult
 */

/** @var CFile $CFile */
$CFile = new CFile;

$arResult['LETTERS'] = array();

foreach ($arResult['ITEMS'] as &$item) {

	$item['PREVIEW_PICTURE_RESIZED'] = $CFile->ResizeImageGet(
		$item['PREVIEW_PICTURE'],
		array(
			'width'  => 100,
			'height' => 70
		),
		BX_RESIZE_IMAGE_PROPORTIONAL
	);
}
unset($item);
