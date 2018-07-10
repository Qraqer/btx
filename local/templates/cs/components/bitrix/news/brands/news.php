<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

$countries = \BH\Model\Country::getList();

$request = \Bitrix\Main\Context::getCurrent()->getRequest();
$filterCountry = $request->get('country');
$filterName = $request->get('query');
$filterLetter = $request->get('letter');
$filterSort = $request->get('sort');

if (empty($filterSort))
    $filterSort = 'rating';

$needAll = false;
$currentCountryId = false;

if (!empty($countries[$filterCountry])) {
    $currentCountryId = $countries[$filterCountry]['ID'];
    $currentCountryLabel = $countries[$filterCountry]['NAME'];
    $needAll = true;
} else {
    $currentCountryLabel = 'Все страны';
}

// Поиск формы важнее буквы в фильтре
if (empty($filterLetter))
    $filterLetter = 'all';

// Поиск формы важнее буквы в фильтре
if ($filterLetter == 'all' || !empty($filterName))
    $filterLetter = false;

?>
<div class="row">
    <div class="col-lg-9 col-md-12">

<div class="row preset-filter">
    <div class="col-md-4">
        <div class="inner-region-selector dropdown">
            <button class="btn beige-block dropdown-toggle" type="button"
                    id="innerDropDownCountrySelect" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                <?= $currentCountryLabel ?>
            </button>

            <div class="dropdown-menu" aria-labelledby="innerDropDownCountrySelect">
                <? if ($needAll) { ?>
                    <a class="dropdown-item" href="<?= $APPLICATION->GetCurPageParam('', array('country')) ?>">Все
                        страны</a>
                    <?php
                }

                foreach ($countries as $country) { ?>
                    <a class="dropdown-item <?= $country['ID'] == $currentCountryId ? ' active' : '' ?>"
                       href="<?= $APPLICATION->GetCurPageParam('country=' . $country['ID'], array('country')) ?>"
                    ><?= $country['NAME'] ?></a>
                    <?php
                } ?>
            </div>
        </div>
    </div>

    <div class="col-md-8 region-filter">
        <div class="inner-search">
            <form class="search" method="get" action="<?= $APPLICATION->GetCurPage() ?>">
                <input id="inner_search_text" type="text" name="query"
                       class="beige-block beige-accent-text"
                       placeholder="Поиск по брендам" aria-label="Поиск по брендам"
                       value="<?= $filterName ?>">

                <input id="inner_search_submit" type="submit" name="search"
                       value="" title="Искать"
                       aria-label="Искать">
            </form>
        </div>
    </div>
</div>

<div class="row letter-filter">
    <div class="col-12">

        <div class="letters-wrap">
            <div class="letter<?= $filterLetter === false ? ' active' : '' ?> all">
                <a href="<?= $APPLICATION->GetCurPageParam('letter=all', array('letter')) ?>"">Все</a></div>

            <div class="letters-row-wrap">
                <div class="letter-row ru">
                    <div class="letter-half-row-wrapper">
                        <? foreach (range(chr(0xC0), chr(0xDF)) as $letter) {
                            $letter = iconv('CP1251', 'UTF-8', $letter);
                            if (!in_array($letter, array('Ё', 'Й', 'Ъ', 'Ы', 'Ь'))) { ?>
                                <div class="letter<?= $filterLetter == $letter ? ' active' : '' ?>">
                                    <a href="<?= $APPLICATION->GetCurPageParam('letter=' . $letter, array('letter')) ?>"
                                    ><?= $letter ?></a>
                                </div>
                                <?= $letter == 'О' ? '</div><div class="letter-half-row-wrapper">' : ''; ?>
                            <? }
                        } ?>
                    </div>
                </div>

                <div class="letter-row en">
                    <div class="letter-half-row-wrapper">
                        <? for ($i = 65; $i <= 90; $i++) {
                            $letter = chr($i); ?>
                            <div class="letter<?= $filterLetter == $letter ? ' active' : '' ?>">
                                <a href="<?= $APPLICATION->GetCurPageParam('letter=' . $letter, array('letter')) ?>"
                                ><?= $letter ?></a>
                            </div>
                            <?= $letter == 'O' ? '</div><div class="letter-half-row-wrapper">' : ''; ?>
                        <? } ?>

                        <div class="letter number<?= $filterLetter == '09' ? ' active' : '' ?>">
                            <a href="<?= $APPLICATION->GetCurPageParam('letter=09', array('letter')) ?>">0-9</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 sort-row">
        <?php
        foreach (array('rating' => 'По рейтингу', 'name' => 'По алфавиту') as $sort => $title) {
            ?>
            <a href="<?= $filterSort == $sort ? '#' : $APPLICATION->GetCurPageParam('sort=' . $sort, array('sort')) ?>"
               class="<?= $filterSort == $sort ? 'active' : '' ?>"><?= $title ?></a>
            <span class="delimeter"></span>
            <?php
        }
        ?>
    </div>
</div>

<? global ${$arParams["FILTER_NAME"]};

if ($filterCountry) {
    ${$arParams["FILTER_NAME"]}['PROPERTY_COUNTRY'] = $filterCountry;
}

if ($filterName) {
    ${$arParams["FILTER_NAME"]}['NAME'] = '%' . $filterName . '%';
} elseif ($filterLetter) {
    if ($filterLetter == '09') {
        ${$arParams["FILTER_NAME"]}['>NAME'] = 0;
        ${$arParams["FILTER_NAME"]}['<NAME'] = 9;
    } else {
        ${$arParams["FILTER_NAME"]}['NAME'] = $filterLetter . '%';
    }
}

?>

<? $APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "brands",
    Array(
        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "AJAX_MODE" => $arParams['AJAX_MODE'],
        "NEWS_COUNT" => $arParams["NEWS_COUNT"],
        "SORT_BY1" => $filterSort == 'name' ? 'NAME' : 'PROPERTY_RATING',
        "SORT_ORDER1" => $filterSort == 'name' ? 'ASC' : 'DESC',
        "SORT_BY2" => 'SORT',
        "SORT_ORDER2" => 'ASC',
        "FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
        "PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
        "DETAIL_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["detail"],
        "SECTION_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
        "IBLOCK_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["news"],
        "DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
        "SET_TITLE" => $arParams["SET_TITLE"],
        "SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
        "MESSAGE_404" => $arParams["MESSAGE_404"],
        "SET_STATUS_404" => $arParams["SET_STATUS_404"],
        "SHOW_404" => $arParams["SHOW_404"],
        "FILE_404" => $arParams["FILE_404"],
        "INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
        "CACHE_TYPE" => $arParams["CACHE_TYPE"],
        "CACHE_TIME" => $arParams["CACHE_TIME"],
        "CACHE_FILTER" => $arParams["CACHE_FILTER"],
        "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
        "DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
        "DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
        "PAGER_TITLE" => $arParams["PAGER_TITLE"],
        "PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
        "PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
        "PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
        "PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
        "PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
        "PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
        "PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
        "PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
        "DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
        "DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
        "PREVIEW_TRUNCATE_LEN" => $arParams["PREVIEW_TRUNCATE_LEN"],
        "ACTIVE_DATE_FORMAT" => $arParams["LIST_ACTIVE_DATE_FORMAT"],
        "USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
        "GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
        "FILTER_NAME" => $arParams["FILTER_NAME"],
        "HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
        "CHECK_DATES" => $arParams["CHECK_DATES"],
        "USE_AD" => $arParams["USE_AD"]
    ),
    $component
); ?>

    </div>


    <div class="col-lg-3 col-md-12">
        <div class="row adversting-row brands-adversting-row">
            <div class="col">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:advertising.banner",
                    "", Array(
                        "TYPE" => "277_366",
                        "CACHE_TYPE" => "A",
                        "NOINDEX" => "Y",
                        "CACHE_TIME" => "3600"
                    )
                ); ?>
            </div>
        </div>

        <? $APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "companies-rating",
            Array(
                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                "ADD_SECTIONS_CHAIN" => "N",
                "AJAX_MODE" => "N",
                "AJAX_OPTION_ADDITIONAL" => "",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "CACHE_FILTER" => "N",
                "CACHE_GROUPS" => "Y",
                "CACHE_TIME" => "3600",
                "CACHE_TYPE" => "A",
                "CHECK_DATES" => "Y",
                "DETAIL_URL" => "",
                "DISPLAY_BOTTOM_PAGER" => "N",
                "DISPLAY_TOP_PAGER" => "N",
                "FIELD_CODE" => array("PREVIEW_TEXT", "PREVIEW_PICTURE", "DATE_ACTIVE_TO", "ACTIVE_TO", "DATE_CREATE"),
                "FILTER_NAME" => "",
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                "IBLOCK_ID" => \BH\Model\Brand::IBLOCK_ID,
                "IBLOCK_TYPE" => "-",
                "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
                "INCLUDE_SUBSECTIONS" => "Y",
                "MESSAGE_404" => "",
                "NEWS_COUNT" => "10",
                "PAGER_BASE_LINK_ENABLE" => "N",
                "PAGER_DESC_NUMBERING" => "N",
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                "PAGER_SHOW_ALL" => "N",
                "PAGER_SHOW_ALWAYS" => "N",
                "PAGER_TEMPLATE" => ".default",
                "PAGER_TITLE" => "Новости",
                "PARENT_SECTION" => "",
                "PARENT_SECTION_CODE" => "",
                "PREVIEW_TRUNCATE_LEN" => "",
                "PROPERTY_CODE" => \BH\Model\Brand::getComponentPropertiesSelect(),
                "SET_BROWSER_TITLE" => "Y",
                "SET_LAST_MODIFIED" => "N",
                "SET_META_DESCRIPTION" => "Y",
                "SET_META_KEYWORDS" => "Y",
                "SET_STATUS_404" => "N",
                "SET_TITLE" => "Y",
                "SHOW_404" => "N",
                "SORT_BY1" => "PROPERTY_RATING",
                "SORT_ORDER1" => "DESC",
                "SORT_BY2" => "SORT",
                "SORT_ORDER2" => "ASC",
                // custom field
                "FIRST_BIG" => "N",
                "USE_AD" => "N",
                "SECTION_TITLE" => "Новости компаний",
                "LINK_ALL" => "Y",
                "IN_HR" => "Y",
                "SIDEBAR" => "Y"
            )
        ); ?>

    </div>
</div>