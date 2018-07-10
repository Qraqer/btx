<?
/**
 * @global CMain $APPLICATION
 */
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");

?>
    <div class="container">
        <div class="row">
            <div class="col-7">
                <div class="white-block contacts-block">
                    <div class="row">
                        <div class="col">
                            <?
                            $APPLICATION->IncludeComponent(
                                "bitrix:news.detail",
                                "contact",
                                array(
                                    "COMPONENT_TEMPLATE" => "contact",
                                    "IBLOCK_TYPE" => "content",
                                    "IBLOCK_ID" => "65",
                                    "ELEMENT_ID" => "",
                                    "ELEMENT_CODE" => "AD_PORTAL",
                                    "CHECK_DATES" => "Y",
                                    "FIELD_CODE" => array(
                                        0 => "CODE",
                                        1 => "DETAIL_TEXT",
                                        2 => "NAME",
                                    ),
                                    "PROPERTY_CODE" => array(
                                        0 => "EMAIL",
                                        1 => "PHONE",
                                        2 => "",
                                    ),
                                    "IBLOCK_URL" => "",
                                    "DETAIL_URL" => "",
                                    "AJAX_MODE" => "N",
                                    "AJAX_OPTION_JUMP" => "N",
                                    "AJAX_OPTION_STYLE" => "Y",
                                    "AJAX_OPTION_HISTORY" => "N",
                                    "AJAX_OPTION_ADDITIONAL" => "",
                                    "CACHE_TYPE" => "A",
                                    "CACHE_TIME" => "36000000",
                                    "CACHE_GROUPS" => "Y",
                                    "SET_TITLE" => "N",
                                    "SET_CANONICAL_URL" => "N",
                                    "SET_BROWSER_TITLE" => "N",
                                    "BROWSER_TITLE" => "-",
                                    "SET_META_KEYWORDS" => "N",
                                    "META_KEYWORDS" => "-",
                                    "SET_META_DESCRIPTION" => "N",
                                    "META_DESCRIPTION" => "-",
                                    "SET_LAST_MODIFIED" => "N",
                                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                    "ADD_SECTIONS_CHAIN" => "N",
                                    "ADD_ELEMENT_CHAIN" => "N",
                                    "ACTIVE_DATE_FORMAT" => "d.m.Y",
                                    "USE_PERMISSIONS" => "N",
                                    "DISPLAY_DATE" => "Y",
                                    "DISPLAY_NAME" => "Y",
                                    "DISPLAY_PICTURE" => "Y",
                                    "DISPLAY_PREVIEW_TEXT" => "Y",
                                    "USE_SHARE" => "N",
                                    "PAGER_TEMPLATE" => ".default",
                                    "DISPLAY_TOP_PAGER" => "N",
                                    "DISPLAY_BOTTOM_PAGER" => "Y",
                                    "PAGER_TITLE" => "Страница",
                                    "PAGER_SHOW_ALL" => "N",
                                    "PAGER_BASE_LINK_ENABLE" => "N",
                                    "SET_STATUS_404" => "N",
                                    "SHOW_404" => "N",
                                    "MESSAGE_404" => ""
                                ),
                                false
                            );
                            ?>

                            <?
                            $APPLICATION->IncludeComponent(
                                "bitrix:news.detail",
                                "contact",
                                array(
                                    "COMPONENT_TEMPLATE" => "contact",
                                    "IBLOCK_TYPE" => "content",
                                    "IBLOCK_ID" => "65",
                                    "ELEMENT_ID" => "",
                                    "ELEMENT_CODE" => "AD_SUPPORT",
                                    "CHECK_DATES" => "Y",
                                    "FIELD_CODE" => array(
                                        0 => "CODE",
                                        1 => "DETAIL_TEXT",
                                        2 => "NAME",
                                    ),
                                    "PROPERTY_CODE" => array(
                                        0 => "EMAIL",
                                        1 => "PHONE",
                                        2 => "",
                                    ),
                                    "IBLOCK_URL" => "",
                                    "DETAIL_URL" => "",
                                    "AJAX_MODE" => "N",
                                    "AJAX_OPTION_JUMP" => "N",
                                    "AJAX_OPTION_STYLE" => "Y",
                                    "AJAX_OPTION_HISTORY" => "N",
                                    "AJAX_OPTION_ADDITIONAL" => "",
                                    "CACHE_TYPE" => "A",
                                    "CACHE_TIME" => "36000000",
                                    "CACHE_GROUPS" => "Y",
                                    "SET_TITLE" => "N",
                                    "SET_CANONICAL_URL" => "N",
                                    "SET_BROWSER_TITLE" => "N",
                                    "BROWSER_TITLE" => "-",
                                    "SET_META_KEYWORDS" => "N",
                                    "META_KEYWORDS" => "-",
                                    "SET_META_DESCRIPTION" => "N",
                                    "META_DESCRIPTION" => "-",
                                    "SET_LAST_MODIFIED" => "N",
                                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                    "ADD_SECTIONS_CHAIN" => "N",
                                    "ADD_ELEMENT_CHAIN" => "N",
                                    "ACTIVE_DATE_FORMAT" => "d.m.Y",
                                    "USE_PERMISSIONS" => "N",
                                    "DISPLAY_DATE" => "Y",
                                    "DISPLAY_NAME" => "Y",
                                    "DISPLAY_PICTURE" => "Y",
                                    "DISPLAY_PREVIEW_TEXT" => "Y",
                                    "USE_SHARE" => "N",
                                    "PAGER_TEMPLATE" => ".default",
                                    "DISPLAY_TOP_PAGER" => "N",
                                    "DISPLAY_BOTTOM_PAGER" => "Y",
                                    "PAGER_TITLE" => "Страница",
                                    "PAGER_SHOW_ALL" => "N",
                                    "PAGER_BASE_LINK_ENABLE" => "N",
                                    "SET_STATUS_404" => "N",
                                    "SHOW_404" => "N",
                                    "MESSAGE_404" => ""
                                ),
                                false
                            );
                            ?>
                        </div>
                    </div>
                </div>

                <div class="white-block contacts-block">
                    <div class="row">
                        <div class="col">
                            <?
                            $APPLICATION->IncludeComponent(
                                "bitrix:news.detail",
                                "contact",
                                array(
                                    "COMPONENT_TEMPLATE" => "contact",
                                    "IBLOCK_TYPE" => "content",
                                    "IBLOCK_ID" => "65",
                                    "ELEMENT_ID" => "",
                                    "ELEMENT_CODE" => "AD_SCOPE",
                                    "CHECK_DATES" => "Y",
                                    "FIELD_CODE" => array(
                                        0 => "CODE",
                                        1 => "DETAIL_TEXT",
                                        2 => "NAME",
                                    ),
                                    "PROPERTY_CODE" => array(
                                        0 => "EMAIL",
                                        1 => "PHONE",
                                        2 => "",
                                    ),
                                    "IBLOCK_URL" => "",
                                    "DETAIL_URL" => "",
                                    "AJAX_MODE" => "N",
                                    "AJAX_OPTION_JUMP" => "N",
                                    "AJAX_OPTION_STYLE" => "Y",
                                    "AJAX_OPTION_HISTORY" => "N",
                                    "AJAX_OPTION_ADDITIONAL" => "",
                                    "CACHE_TYPE" => "A",
                                    "CACHE_TIME" => "36000000",
                                    "CACHE_GROUPS" => "Y",
                                    "SET_TITLE" => "N",
                                    "SET_CANONICAL_URL" => "N",
                                    "SET_BROWSER_TITLE" => "N",
                                    "BROWSER_TITLE" => "-",
                                    "SET_META_KEYWORDS" => "N",
                                    "META_KEYWORDS" => "-",
                                    "SET_META_DESCRIPTION" => "N",
                                    "META_DESCRIPTION" => "-",
                                    "SET_LAST_MODIFIED" => "N",
                                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                    "ADD_SECTIONS_CHAIN" => "N",
                                    "ADD_ELEMENT_CHAIN" => "N",
                                    "ACTIVE_DATE_FORMAT" => "d.m.Y",
                                    "USE_PERMISSIONS" => "N",
                                    "DISPLAY_DATE" => "Y",
                                    "DISPLAY_NAME" => "Y",
                                    "DISPLAY_PICTURE" => "Y",
                                    "DISPLAY_PREVIEW_TEXT" => "Y",
                                    "USE_SHARE" => "N",
                                    "PAGER_TEMPLATE" => ".default",
                                    "DISPLAY_TOP_PAGER" => "N",
                                    "DISPLAY_BOTTOM_PAGER" => "Y",
                                    "PAGER_TITLE" => "Страница",
                                    "PAGER_SHOW_ALL" => "N",
                                    "PAGER_BASE_LINK_ENABLE" => "N",
                                    "SET_STATUS_404" => "N",
                                    "SHOW_404" => "N",
                                    "MESSAGE_404" => ""
                                ),
                                false
                            );
                            ?>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-5">
                <? $APPLICATION->IncludeComponent("bitrix:form.result.new",
                    "contacts", Array(
                        "SEF_MODE" => "Y",
                        "WEB_FORM_ID" => 10,
                        "LIST_URL" => "",
                        "EDIT_URL" => "",
                        "SUCCESS_URL" => "",
                        "CHAIN_ITEM_TEXT" => "",
                        "CHAIN_ITEM_LINK" => "",
                        "IGNORE_CUSTOM_TEMPLATE" => "Y",
                        "USE_EXTENDED_ERRORS" => "Y",
                        "CACHE_TYPE" => "A",
                        "CACHE_TIME" => "3600",
                        "SEF_FOLDER" => "/",
                        "VARIABLE_ALIASES" => Array()
                    )
                ); ?>
            </div>
        </div>
    </div>
    <br>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>