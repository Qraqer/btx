<?
/**
 * @global CMain $APPLICATION
 */
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Акции");
?>
    <div class="container">

        <div class="row">
            <div class="col-12">
                <?php
                $APPLICATION->IncludeComponent(
                    "bitrix:advertising.banner",
                    "", Array(
                        "TYPE" => "1170_180",
                        // Если отключить кэш, изменения в баннерах будут моментальные
                        "CACHE_TYPE" => "A",
                        "NOINDEX" => "Y",
                        "CACHE_TIME" => "3600"
                    )
                );
                ?>
            </div>
        </div>
        <? $APPLICATION->IncludeComponent(
            "bitrix:news",
            "actions",
            Array(
                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                "ADD_ELEMENT_CHAIN" => "N",
                "ADD_SECTIONS_CHAIN" => "N",
                "AJAX_MODE" => "N",
                "AJAX_OPTION_ADDITIONAL" => "",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "BROWSER_TITLE" => "NAME",
                "CACHE_FILTER" => "N",
                "CACHE_GROUPS" => "Y",
                "CACHE_TIME" => "3600",
                "CACHE_TYPE" => "A",
                "CHECK_DATES" => "Y",
                "DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
                "DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
                "DETAIL_DISPLAY_TOP_PAGER" => "N",
                "DETAIL_FIELD_CODE" => array("PREVIEW_TEXT", "PREVIEW_PICTURE", "DETAIL_TEXT", "DETAIL_PICTURE", "DATE_ACTIVE_TO", "ACTIVE_TO", ""),
                "DETAIL_PAGER_SHOW_ALL" => "Y",
                "DETAIL_PAGER_TEMPLATE" => "",
                "DETAIL_PAGER_TITLE" => "Страница",
                "DETAIL_PROPERTY_CODE" => array("", ""),
                "DETAIL_SET_CANONICAL_URL" => "N",
                "DETAIL_URL" => "",
                "DISPLAY_BOTTOM_PAGER" => "Y",
                "DISPLAY_DATE" => "Y",
                "DISPLAY_NAME" => "Y",
                "DISPLAY_PICTURE" => "Y",
                "DISPLAY_PREVIEW_TEXT" => "Y",
                "DISPLAY_TOP_PAGER" => "Y",
                "FIELD_CODE" => array("PREVIEW_TEXT", "PREVIEW_PICTURE", "DATE_ACTIVE_TO", "ACTIVE_TO", ""),
                "FILTER_NAME" => "",
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                "IBLOCK_ID" => \BH\Model\Action::IBLOCK_ID,
                "IBLOCK_TYPE" => "content",
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "INCLUDE_SUBSECTIONS" => "N",
                "LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
                "LIST_FIELD_CODE" => array("PREVIEW_TEXT", "PREVIEW_PICTURE", "DETAIL_TEXT", "DETAIL_PICTURE", "DATE_ACTIVE_TO", "ACTIVE_TO", ""),
                "LIST_PROPERTY_CODE" => array("", ""),
                "MESSAGE_404" => "",
                "META_DESCRIPTION" => "-",
                "META_KEYWORDS" => "-",
                "NEWS_COUNT" => "7",
                "PAGER_BASE_LINK_ENABLE" => "N",
                "PAGER_DESC_NUMBERING" => "N",
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                "PAGER_SHOW_ALL" => "N",
                "PAGER_SHOW_ALWAYS" => "N",
                "PAGER_TEMPLATE" => "elements-pager",
                "PAGER_TITLE" => "Новости",
                "PARENT_SECTION" => "",
                "PARENT_SECTION_CODE" => "",
                "PREVIEW_TRUNCATE_LEN" => "",
                "PROPERTY_CODE" => array("", ""),
                "SEF_FOLDER" => "/actions/",
                "SEF_MODE" => "Y",
                "SEF_URL_TEMPLATES" => Array("detail" => "#ELEMENT_CODE#/", "news" => "/", "section" => "#SECTION_CODE#/"),
                "SET_BROWSER_TITLE" => "Y",
                "SET_LAST_MODIFIED" => "Y",
                "SET_META_DESCRIPTION" => "Y",
                "SET_META_KEYWORDS" => "Y",
                "SET_STATUS_404" => "N",
                "SET_TITLE" => "Y",
                "SHARE_HANDLERS" => array("delicious", "facebook", "lj", "mailru", "twitter", "vk"),
                "SHARE_HIDE" => "N",
                "SHARE_SHORTEN_URL_KEY" => "",
                "SHARE_SHORTEN_URL_LOGIN" => "",
                "SHARE_TEMPLATE" => "",
                "SHOW_404" => "N",
                "SORT_BY1" => "ACTIVE_FROM",
                "SORT_BY2" => "SORT",
                "SORT_ORDER1" => "DESC",
                "SORT_ORDER2" => "ASC",
                "USE_AD" => "Y",
                "USE_CATEGORIES" => "N",
                "USE_FILTER" => "N",
                "USE_PERMISSIONS" => "N",
                "USE_RATING" => "N",
                "USE_REVIEW" => "Y",
                "USE_RSS" => "N",
                "USE_SEARCH" => "N",
                "USE_SHARE" => "Y"
            )
        ); ?>
    </div>
    <br><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>