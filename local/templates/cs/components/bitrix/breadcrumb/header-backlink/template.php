<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;


$strReturn = '';

$item = array_pop($arResult);
if(is_array($item))
{
	if($item['LINK'] == '/')
		$item['TITLE'] = 'На главную';
	
	$strReturn = '<a class="header-backlink" href="'. $item['LINK'] . '">' . $item['TITLE'] . '</a>';
}


return $strReturn;
