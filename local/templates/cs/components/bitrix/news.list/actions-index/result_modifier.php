<?
/**
 * @var array $arResult
 */

/** @var CFile $CFile */
$CFile = new CFile;

foreach ($arResult['ITEMS'] as &$item) {

	$item['PREVIEW_PICTURE_RESIZED'] =  $CFile->ResizeImageGet(
		$item['PREVIEW_PICTURE'],
		array(
			'width'  => 300,
			'height' => 300
		),
		BX_RESIZE_IMAGE_PROPORTIONAL
	);

}
unset($item);