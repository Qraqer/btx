<?php

require_once 'bxhelpers/bitrix-helpers.php';
\BH\BitrixHelper::init();

require_once 'classes/models/Action.php';
require_once 'classes/models/Brand.php';
require_once 'classes/models/Catalog.php';
require_once 'classes/models/CatalogSection.php';
require_once 'classes/models/City.php';
require_once 'classes/models/Company.php';
require_once 'classes/models/Country.php';
require_once 'classes/models/Event.php';
require_once 'classes/models/News.php';
require_once 'classes/models/Region.php';

/*
 * todo: не работает? О_о
Bitrix\Main\Loader::registerAutoLoadClasses(null, array(
	'Moprh' => 'classes/Morph.php'
));
*/