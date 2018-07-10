
<?php
$brand = array_pop(\BH\Model\CatalogSection::getList(array('CODE' => $arResult['VARIABLES']['SECTION_CODE'])));
?>

<? $ElementID = $APPLICATION->IncludeComponent(
    "bitrix:news.detail",
    "brand",
    array(
        "IBLOCK_ID" => \BH\Model\Brand::IBLOCK_ID,
        "PROPERTY_CODE" => \BH\Model\Brand::getComponentPropertiesSelect(),
        "BROWSER_TITLE" => "-",
        "SET_TITLE" => "N",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "ADD_SECTIONS_CHAIN" => "N",
        "ACTIVE_DATE_FORMAT" => $arParams["DETAIL_ACTIVE_DATE_FORMAT"],
        "CACHE_TYPE" => "N",
        "CACHE_TIME" => "0",
        "CACHE_GROUPS" => "N",
        "USE_PERMISSIONS" => "N",
        "GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
        "DISPLAY_TOP_PAGER" => "N",
        "DISPLAY_BOTTOM_PAGER" => "N",
        "PAGER_TITLE" => "",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => "elements-pager",
        "PAGER_SHOW_ALL" => "N",
        "CHECK_DATES" => "N",
        "ELEMENT_ID" => $brand["UF_BRAND"],
        "IBLOCK_URL" => "",
        "USE_SHARE" => "N",
        "ADD_ELEMENT_CHAIN" => "N",
        "USE_AD" => $arParams["USE_AD"],
        "COMPONENT_TEMPLATE" => "brand",
        "IBLOCK_TYPE" => "content",
        "FIELD_CODE" => array(
            0 => "ID",
            1 => "CODE",
            2 => "XML_ID",
            3 => "NAME",
            4 => "PREVIEW_TEXT",
            5 => "PREVIEW_PICTURE",
            6 => "DETAIL_TEXT",
            7 => "DETAIL_PICTURE",
            8 => "",
        ),
        "DETAIL_URL" => "",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_ADDITIONAL" => "undefined",
        "SET_CANONICAL_URL" => "N",
        "SET_BROWSER_TITLE" => "Y",
        "SET_META_KEYWORDS" => "Y",
        "META_KEYWORDS" => "-",
        "SET_META_DESCRIPTION" => "Y",
        "META_DESCRIPTION" => "-",
        "SET_LAST_MODIFIED" => "N",
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "SET_STATUS_404" => "N",
        "SHOW_404" => "N",
        "MESSAGE_404" => ""
    ),
    false
); ?>
</div>

<div class="container-fluid beige-accent-block brand-customers-block">
    <div class="container">
        <div class="row">
            <div class="col customers-title">
                <div class="in-hr">
                    <hr>
                    <h4 class="title text-uppercase">Официальные поставщики</h4>
                    <hr>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-4"></div>
            <div class="col-4"></div>
            <div class="col-4"></div>
        </div>

    </div>
</div>

<div class="container-fluid catalog-brand-block">
    <div class="container">

        <div class="row">
            <div class="col catalog-brand-title">
                <div class="in-hr">
                    <hr>
                    <h4 class="title text-uppercase">Каталог</h4>
                    <hr>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-9">
                <?php
                $adId = 'AD_BANNER_270_370';
                ob_start();
                ?>

                <? $APPLICATION->IncludeComponent(
                    "bitrix:catalog.section.list",
                    "catalog-sections",
                    Array(
                        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                        "SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
                        "SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
                        "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                        "CACHE_TIME" => $arParams["CACHE_TIME"],
                        "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                        "COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
                        "TOP_DEPTH" => $arParams["SECTION_TOP_DEPTH"],
                        "SECTION_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
                        "USE_AD" => "Y",
                        "AD_ID" => $adId,
                        "SECTION_FIELDS" => $arParams['SECTION_FIELDS']
                    ),
                    $component
                ); ?>

                <?php
                // Собрали HTML компонента
                $componentHtml = trim(ob_get_contents());
                ob_end_clean();

                if (strlen($componentHtml) > 0) {
                    if (strpos($componentHtml, $adId) !== false) {

                        ob_start();

                        // Собрали HTML баннера
                        $APPLICATION->IncludeComponent(
                            "bitrix:advertising.banner",
                            "", Array(
                                "TYPE" => "270_370",
                                // Если отключить кэш, изменения в баннерах будут моментальные
                                "CACHE_TYPE" => "N",
                                "NOINDEX" => "Y",
                                "CACHE_TIME" => "0"
                            )
                        );

                        $bannerHtml = trim(ob_get_contents());
                        ob_end_clean();

                        // Заменили
                        echo str_replace($adId, $bannerHtml, $componentHtml);
                    } else {
                        echo $componentHtml;
                    }
                } ?>

            </div>

            <div class="col-md-3">
                Отзывы / обзоры (будет позже)
            </div>
        </div>
    </div>
</div>

<? $APPLICATION->IncludeComponent(
    "bitrix:catalog.section",
    "catalog-section",
    Array(
        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "ELEMENT_SORT_FIELD" => $arParams["ELEMENT_SORT_FIELD"],
        "ELEMENT_SORT_ORDER" => $arParams["ELEMENT_SORT_ORDER"],
        "ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
        "ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
        "PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
        "META_KEYWORDS" => $arParams["LIST_META_KEYWORDS"],
        "META_DESCRIPTION" => $arParams["LIST_META_DESCRIPTION"],
        "BROWSER_TITLE" => $arParams["LIST_BROWSER_TITLE"],
        "INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"],
        "BASKET_URL" => $arParams["BASKET_URL"],
        "ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
        "PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
        "SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
        "PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
        "FILTER_NAME" => $arParams["FILTER_NAME"],
        "CACHE_TYPE" => $arParams["CACHE_TYPE"],
        "CACHE_TIME" => $arParams["CACHE_TIME"],
        "CACHE_FILTER" => $arParams["CACHE_FILTER"],
        "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
        "SET_TITLE" => $arParams["SET_TITLE"],
        "SET_STATUS_404" => $arParams["SET_STATUS_404"],
        "DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
        "PAGE_ELEMENT_COUNT" => $arParams["PAGE_ELEMENT_COUNT"],
        "LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
        "PRICE_CODE" => $arParams["PRICE_CODE"],
        "USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
        "SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],

        "PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
        "USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
        "QUANTITY_FLOAT" => $arParams["QUANTITY_FLOAT"],
        "DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
        "DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
        "PAGER_TITLE" => $arParams["PAGER_TITLE"],
        "PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
        "PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
        "PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
        "PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
        "PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],

        "SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
        "SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
        "SECTION_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
        "DETAIL_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["element"],
        'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
        'CURRENCY_ID' => $arParams['CURRENCY_ID'],
        'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
    ),
    $component
);
?>