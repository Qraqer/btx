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

$brands = array_column($arResult['SECTIONS'], 'UF_BRAND');
$arResult['BRANDS'] = \BH\Model\Brand::getList(array('ID' => $brands));


$countries = array_column($arResult['BRANDS'], 'PROPERTY_COUNTRY_VALUE');
$arResult['COUNTRIES'] = \BH\Model\Country::getList(array('ID' => $countries));

