<?
/**
 * @var array $arResult
 */

/** @var CFile $CFile */
$CFile = new CFile;

$arResult['LETTERS'] = array();

foreach ($arResult['SECTIONS'] as &$section) {

	$section['PICTURE_RESIZED'] = $CFile->ResizeImageGet(
		$section['PICTURE'],
		array(
			'width'  => 150,
			'height' => 100
		),
		BX_RESIZE_IMAGE_PROPORTIONAL
	);
}
unset($section);
