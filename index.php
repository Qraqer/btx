<?
/**
 * @global CMain $APPLICATION
 */
define('NO_HEADER_TITLE', true);
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
$APPLICATION->SetTitle("Главная");
?>
    <div class="container-fluid content-block index-tender">
        <div class="container">
            <div class="row flex-row justify-content-center">
                <div class="col-sm-6">
                    <h1 class="tender-title"><? \BH\Frontend::includeArea('index-tender-title') ?></h1>
                </div>
            </div>

            <div class="row flex-row justify-content-center">
                <div class="col-10">
                    <div class="tender-seo"><? \BH\Frontend::includeArea('index-tender-seo') ?></div>
                </div>
            </div>

            <div class="row flex-row justify-content-center">
                <div class="col-10">
                    <?php

                    ?>
                </div>
            </div>


        </div>
    </div>

    <div class="container-fluid content-block">
        <div class="container">
            <div class="row index-ratings">
                <div class="col-sm-4">
					<? $APPLICATION->IncludeComponent(
						"bitrix:news.list",
						"brands-rating",
						Array(
							"ACTIVE_DATE_FORMAT"              => "d.m.Y",
							"ADD_SECTIONS_CHAIN"              => "N",
							"AJAX_MODE"                       => "N",
							"AJAX_OPTION_ADDITIONAL"          => "",
							"AJAX_OPTION_HISTORY"             => "N",
							"AJAX_OPTION_JUMP"                => "N",
							"AJAX_OPTION_STYLE"               => "Y",
							"CACHE_FILTER"                    => "N",
							"CACHE_GROUPS"                    => "Y",
							"CACHE_TIME"                      => "3600",
							"CACHE_TYPE"                      => "A",
							"CHECK_DATES"                     => "Y",
							"DETAIL_URL"                      => "",
							"DISPLAY_BOTTOM_PAGER"            => "N",
							"DISPLAY_TOP_PAGER"               => "N",
							"FIELD_CODE"                      => array("PREVIEW_TEXT", "PREVIEW_PICTURE", "DATE_ACTIVE_TO", "ACTIVE_TO", "DATE_CREATE"),
							"FILTER_NAME"                     => "",
							"HIDE_LINK_WHEN_NO_DETAIL"        => "N",
							"IBLOCK_ID"                       => \BH\Model\Brand::getIblockID(),
							"IBLOCK_TYPE"                     => "-",
							"INCLUDE_IBLOCK_INTO_CHAIN"       => "Y",
							"INCLUDE_SUBSECTIONS"             => "Y",
							"MESSAGE_404"                     => "",
							"NEWS_COUNT"                      => "10",
							"PAGER_BASE_LINK_ENABLE"          => "N",
							"PAGER_DESC_NUMBERING"            => "N",
							"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
							"PAGER_SHOW_ALL"                  => "N",
							"PAGER_SHOW_ALWAYS"               => "N",
							"PAGER_TEMPLATE"                  => ".default",
							"PAGER_TITLE"                     => "Новости",
							"PARENT_SECTION"                  => "",
							"PARENT_SECTION_CODE"             => "",
							"PREVIEW_TRUNCATE_LEN"            => "",
							"PROPERTY_CODE"                   => array("RATING", ""),
							"SET_BROWSER_TITLE"               => "Y",
							"SET_LAST_MODIFIED"               => "N",
							"SET_META_DESCRIPTION"            => "Y",
							"SET_META_KEYWORDS"               => "Y",
							"SET_STATUS_404"                  => "N",
							"SET_TITLE"                       => "Y",
							"SHOW_404"                        => "N",
							"SORT_BY1"                        => "PROPERTY_RATING",
							"SORT_ORDER1"                     => "DESC",
							"SORT_BY2"                        => "SORT",
							"SORT_ORDER2"                     => "ASC",
							// custom field
							"FIRST_BIG"                       => "N",
							"USE_AD"                          => "N",
							"SECTION_TITLE"                   => "Новости компаний",
							"LINK_ALL"                        => "Y",
							"IN_HR"                           => "Y"

						)
					); ?>

                </div>
                <div class="col-sm-4">
					<? $APPLICATION->IncludeComponent(
						"bitrix:news.list",
						"companies-rating",
						Array(
							"ACTIVE_DATE_FORMAT"              => "d.m.Y",
							"ADD_SECTIONS_CHAIN"              => "N",
							"AJAX_MODE"                       => "N",
							"AJAX_OPTION_ADDITIONAL"          => "",
							"AJAX_OPTION_HISTORY"             => "N",
							"AJAX_OPTION_JUMP"                => "N",
							"AJAX_OPTION_STYLE"               => "Y",
							"CACHE_FILTER"                    => "N",
							"CACHE_GROUPS"                    => "Y",
							"CACHE_TIME"                      => "3600",
							"CACHE_TYPE"                      => "A",
							"CHECK_DATES"                     => "Y",
							"DETAIL_URL"                      => "",
							"DISPLAY_BOTTOM_PAGER"            => "N",
							"DISPLAY_TOP_PAGER"               => "N",
							"FIELD_CODE"                      => array("PREVIEW_TEXT", "PREVIEW_PICTURE", "DATE_ACTIVE_TO", "ACTIVE_TO", "DATE_CREATE"),
							"FILTER_NAME"                     => "",
							"HIDE_LINK_WHEN_NO_DETAIL"        => "N",
							"IBLOCK_ID"                       => \BH\Model\Company::getIblockID(),
							"IBLOCK_TYPE"                     => "-",
							"INCLUDE_IBLOCK_INTO_CHAIN"       => "Y",
							"INCLUDE_SUBSECTIONS"             => "Y",
							"MESSAGE_404"                     => "",
							"NEWS_COUNT"                      => "10",
							"PAGER_BASE_LINK_ENABLE"          => "N",
							"PAGER_DESC_NUMBERING"            => "N",
							"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
							"PAGER_SHOW_ALL"                  => "N",
							"PAGER_SHOW_ALWAYS"               => "N",
							"PAGER_TEMPLATE"                  => ".default",
							"PAGER_TITLE"                     => "Новости",
							"PARENT_SECTION"                  => "",
							"PARENT_SECTION_CODE"             => "",
							"PREVIEW_TRUNCATE_LEN"            => "",
							"PROPERTY_CODE"                   => array("RATING", ""),
							"SET_BROWSER_TITLE"               => "Y",
							"SET_LAST_MODIFIED"               => "N",
							"SET_META_DESCRIPTION"            => "Y",
							"SET_META_KEYWORDS"               => "Y",
							"SET_STATUS_404"                  => "N",
							"SET_TITLE"                       => "Y",
							"SHOW_404"                        => "N",
							"SORT_BY1"                        => "PROPERTY_RATING",
							"SORT_ORDER1"                     => "DESC",
							"SORT_BY2"                        => "SORT",
							"SORT_ORDER2"                     => "ASC",
							// custom field
							"FIRST_BIG"                       => "N",
							"USE_AD"                          => "N",
							"SECTION_TITLE"                   => "Новости компаний",
							"LINK_ALL"                        => "Y",
							"IN_HR"                           => "Y"

						)
					); ?>
                </div>
                <div class="col-sm-4">
					<? $APPLICATION->IncludeComponent(
						"bitrix:advertising.banner",
						"", Array(
							"TYPE"       => "370_460",
							"CACHE_TYPE" => "A",
							"NOINDEX"    => "Y",
							"CACHE_TIME" => "3600"
						)
					); ?>
                </div>
            </div>
        </div>

        <div class="container">

			<? $APPLICATION->IncludeComponent(
				"bitrix:news.list",
				"actions-index",
				Array(
					"ACTIVE_DATE_FORMAT"              => "d.m.Y",
					"ADD_SECTIONS_CHAIN"              => "Y",
					"AJAX_MODE"                       => "N",
					"AJAX_OPTION_ADDITIONAL"          => "",
					"AJAX_OPTION_HISTORY"             => "N",
					"AJAX_OPTION_JUMP"                => "N",
					"AJAX_OPTION_STYLE"               => "Y",
					"CACHE_FILTER"                    => "N",
					"CACHE_GROUPS"                    => "Y",
					"CACHE_TIME"                      => "3600",
					"CACHE_TYPE"                      => "A",
					"CHECK_DATES"                     => "Y",
					"DETAIL_URL"                      => "",
					"DISPLAY_BOTTOM_PAGER"            => "N",
					"DISPLAY_TOP_PAGER"               => "N",
					"FIELD_CODE"                      => array("PREVIEW_TEXT", "PREVIEW_PICTURE", "DATE_ACTIVE_TO", "ACTIVE_TO", ""),
					"FILTER_NAME"                     => "",
					"HIDE_LINK_WHEN_NO_DETAIL"        => "N",
					"IBLOCK_ID"                       => \BH\Model\Action::getIblockID(),
					"IBLOCK_TYPE"                     => "-",
					"INCLUDE_IBLOCK_INTO_CHAIN"       => "Y",
					"INCLUDE_SUBSECTIONS"             => "Y",
					"MESSAGE_404"                     => "",
					"NEWS_COUNT"                      => "4",
					"PAGER_BASE_LINK_ENABLE"          => "N",
					"PAGER_DESC_NUMBERING"            => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL"                  => "N",
					"PAGER_SHOW_ALWAYS"               => "N",
					"PAGER_TEMPLATE"                  => ".default",
					"PAGER_TITLE"                     => "Новости",
					"PARENT_SECTION"                  => "",
					"PARENT_SECTION_CODE"             => "",
					"PREVIEW_TRUNCATE_LEN"            => "",
					"PROPERTY_CODE"                   => array("", ""),
					"SET_BROWSER_TITLE"               => "Y",
					"SET_LAST_MODIFIED"               => "N",
					"SET_META_DESCRIPTION"            => "Y",
					"SET_META_KEYWORDS"               => "Y",
					"SET_STATUS_404"                  => "N",
					"SET_TITLE"                       => "Y",
					"SHOW_404"                        => "N",
					"SORT_BY1"                        => "ACTIVE_FROM",
					"SORT_BY2"                        => "SORT",
					"SORT_ORDER1"                     => "DESC",
					"SORT_ORDER2"                     => "ASC"
				)
			); ?>
        </div>
    </div>

    <div class="content-block container-fluid beige-accent-block">

        <div class="container">
			<? $APPLICATION->IncludeComponent(
				"bitrix:news.list",
				"events-index",
				Array(
					"ACTIVE_DATE_FORMAT"              => "d.m.Y",
					"ADD_SECTIONS_CHAIN"              => "Y",
					"AJAX_MODE"                       => "N",
					"AJAX_OPTION_ADDITIONAL"          => "",
					"AJAX_OPTION_HISTORY"             => "N",
					"AJAX_OPTION_JUMP"                => "N",
					"AJAX_OPTION_STYLE"               => "Y",
					"CACHE_FILTER"                    => "N",
					"CACHE_GROUPS"                    => "Y",
					"CACHE_TIME"                      => "3600",
					"CACHE_TYPE"                      => "A",
					"CHECK_DATES"                     => "Y",
					"DETAIL_URL"                      => "",
					"DISPLAY_BOTTOM_PAGER"            => "N",
					"DISPLAY_TOP_PAGER"               => "N",
					"FIELD_CODE"                      => array("PREVIEW_TEXT", "PREVIEW_PICTURE", "DATE_ACTIVE_TO", "ACTIVE_TO", ""),
					"FILTER_NAME"                     => "",
					"HIDE_LINK_WHEN_NO_DETAIL"        => "N",
					"IBLOCK_ID"                       => \BH\Model\Event::getIblockID(),
					"IBLOCK_TYPE"                     => "",
					"INCLUDE_IBLOCK_INTO_CHAIN"       => "Y",
					"INCLUDE_SUBSECTIONS"             => "Y",
					"MESSAGE_404"                     => "",
					"NEWS_COUNT"                      => "5",
					"PAGER_BASE_LINK_ENABLE"          => "N",
					"PAGER_DESC_NUMBERING"            => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL"                  => "N",
					"PAGER_SHOW_ALWAYS"               => "N",
					"PAGER_TEMPLATE"                  => ".default",
					"PAGER_TITLE"                     => "Новости",
					"PARENT_SECTION"                  => "",
					"PARENT_SECTION_CODE"             => "",
					"PREVIEW_TRUNCATE_LEN"            => "",
					"PROPERTY_CODE"                   => array("DATE", ""),
					"SET_BROWSER_TITLE"               => "Y",
					"SET_LAST_MODIFIED"               => "N",
					"SET_META_DESCRIPTION"            => "Y",
					"SET_META_KEYWORDS"               => "Y",
					"SET_STATUS_404"                  => "N",
					"SET_TITLE"                       => "Y",
					"SHOW_404"                        => "N",
					"SORT_BY1"                        => "ACTIVE_FROM",
					"SORT_BY2"                        => "SORT",
					"SORT_ORDER1"                     => "DESC",
					"SORT_ORDER2"                     => "ASC"
				)
			); ?>
        </div>

    </div>

    <div class="container-fluid content-block">

        <div class="container">

	        <? $APPLICATION->IncludeComponent(
		        "bitrix:advertising.banner",
		        "", Array(
			        "TYPE"       => "1170_180",
			        "CACHE_TYPE" => "A",
			        "NOINDEX"    => "Y",
			        "CACHE_TIME" => "3600"
		        )
	        ); ?>

			<?php
			$adId = 'AD_BANNER_370_370';
			ob_start();
			?>

			<? $APPLICATION->IncludeComponent(
				"bitrix:news.list",
				"news-index",
				Array(
					"ACTIVE_DATE_FORMAT"              => "d.m.Y",
					"ADD_SECTIONS_CHAIN"              => "Y",
					"AJAX_MODE"                       => "N",
					"AJAX_OPTION_ADDITIONAL"          => "",
					"AJAX_OPTION_HISTORY"             => "N",
					"AJAX_OPTION_JUMP"                => "N",
					"AJAX_OPTION_STYLE"               => "Y",
					"CACHE_FILTER"                    => "Y",
					"CACHE_GROUPS"                    => "Y",
					"CACHE_TIME"                      => "3600",
					"CACHE_TYPE"                      => "A",
					"CHECK_DATES"                     => "Y",
					"DETAIL_URL"                      => "",
					"DISPLAY_BOTTOM_PAGER"            => "N",
					"DISPLAY_TOP_PAGER"               => "N",
					"FIELD_CODE"                      => array("PREVIEW_TEXT", "PREVIEW_PICTURE", "DATE_ACTIVE_TO", "ACTIVE_TO", "DATE_CREATE"),
					"FILTER_NAME"                     => "",
					"HIDE_LINK_WHEN_NO_DETAIL"        => "N",
					"IBLOCK_ID"                       => \BH\Model\News::getIblockID(),
					"IBLOCK_TYPE"                     => "-",
					"INCLUDE_IBLOCK_INTO_CHAIN"       => "Y",
					"INCLUDE_SUBSECTIONS"             => "Y",
					"MESSAGE_404"                     => "",
					"NEWS_COUNT"                      => "4",
					"PAGER_BASE_LINK_ENABLE"          => "N",
					"PAGER_DESC_NUMBERING"            => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL"                  => "N",
					"PAGER_SHOW_ALWAYS"               => "N",
					"PAGER_TEMPLATE"                  => ".default",
					"PAGER_TITLE"                     => "Новости",
					"PARENT_SECTION"                  => "601",
					"PARENT_SECTION_CODE"             => "",
					"PREVIEW_TRUNCATE_LEN"            => "",
					"PROPERTY_CODE"                   => array("", ""),
					"SET_BROWSER_TITLE"               => "Y",
					"SET_LAST_MODIFIED"               => "N",
					"SET_META_DESCRIPTION"            => "Y",
					"SET_META_KEYWORDS"               => "Y",
					"SET_STATUS_404"                  => "N",
					"SET_TITLE"                       => "Y",
					"SHOW_404"                        => "N",
					"SORT_BY1"                        => "ACTIVE_FROM",
					"SORT_BY2"                        => "SORT",
					"SORT_ORDER1"                     => "DESC",
					"SORT_ORDER2"                     => "ASC",
					// custom fields
					"FIRST_BIG"                       => "Y",
					"USE_AD"                          => "Y",
					"SECTION_TITLE"                   => "Новости отрасли",
					"LINK_ALL"                        => "Y",
					"IN_HR"                           => "Y",
                    "AD_ID" => $adId
				)
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
							"TYPE"       => "370_370",
							// Если отключить кэш, изменения в баннерах будут моментальные
							"CACHE_TYPE" => "A",
							"NOINDEX"    => "Y",
							"CACHE_TIME" => "3600"
						)
					);

					$bannerHtml = trim(ob_get_contents());
					ob_end_clean();

					// Заменили
					echo str_replace($adId, $bannerHtml, $componentHtml);

				}
				else {
					echo $componentHtml;
				}
			} ?>

			<? $APPLICATION->IncludeComponent(
				"bitrix:news.list",
				"news-index",
				Array(
					"ACTIVE_DATE_FORMAT"              => "d.m.Y",
					"ADD_SECTIONS_CHAIN"              => "Y",
					"AJAX_MODE"                       => "N",
					"AJAX_OPTION_ADDITIONAL"          => "",
					"AJAX_OPTION_HISTORY"             => "N",
					"AJAX_OPTION_JUMP"                => "N",
					"AJAX_OPTION_STYLE"               => "Y",
					"CACHE_FILTER"                    => "N",
					"CACHE_GROUPS"                    => "Y",
					"CACHE_TIME"                      => "3600",
					"CACHE_TYPE"                      => "A",
					"CHECK_DATES"                     => "Y",
					"DETAIL_URL"                      => "",
					"DISPLAY_BOTTOM_PAGER"            => "N",
					"DISPLAY_TOP_PAGER"               => "N",
					"FIELD_CODE"                      => array("PREVIEW_TEXT", "PREVIEW_PICTURE", "DATE_ACTIVE_TO", "ACTIVE_TO", "DATE_CREATE"),
					"FILTER_NAME"                     => "",
					"HIDE_LINK_WHEN_NO_DETAIL"        => "N",
					"IBLOCK_ID"                       => \BH\Model\News::getIblockID(),
					"IBLOCK_TYPE"                     => "-",
					"INCLUDE_IBLOCK_INTO_CHAIN"       => "Y",
					"INCLUDE_SUBSECTIONS"             => "Y",
					"MESSAGE_404"                     => "",
					"NEWS_COUNT"                      => "3",
					"PAGER_BASE_LINK_ENABLE"          => "N",
					"PAGER_DESC_NUMBERING"            => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL"                  => "N",
					"PAGER_SHOW_ALWAYS"               => "N",
					"PAGER_TEMPLATE"                  => ".default",
					"PAGER_TITLE"                     => "Новости",
					"PARENT_SECTION"                  => "600",
					"PARENT_SECTION_CODE"             => "",
					"PREVIEW_TRUNCATE_LEN"            => "",
					"PROPERTY_CODE"                   => array("", ""),
					"SET_BROWSER_TITLE"               => "Y",
					"SET_LAST_MODIFIED"               => "N",
					"SET_META_DESCRIPTION"            => "Y",
					"SET_META_KEYWORDS"               => "Y",
					"SET_STATUS_404"                  => "N",
					"SET_TITLE"                       => "Y",
					"SHOW_404"                        => "N",
					"SORT_BY1"                        => "ACTIVE_FROM",
					"SORT_BY2"                        => "SORT",
					"SORT_ORDER1"                     => "DESC",
					"SORT_ORDER2"                     => "ASC",
					// custom field
					"FIRST_BIG"                       => "N",
					"USE_AD"                          => "N",
					"SECTION_TITLE"                   => "Новости компаний",
					"LINK_ALL"                        => "Y",
					"IN_HR"                           => "Y",

				)
			); ?>
        </div>
    </div>

<?
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php');
?>