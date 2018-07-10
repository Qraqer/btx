<?
/**
 * @global CMain $APPLICATION
 */
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();

/** @var \Bitrix\Main\Page\Asset $asset */
$asset = \Bitrix\Main\Page\Asset::getInstance();

$asset->addCss(SITE_TEMPLATE_PATH . '/css/bootstrap.min.css');
$asset->addCss(SITE_TEMPLATE_PATH . '/css/font-awesome.min.css');
$asset->addJs(SITE_TEMPLATE_PATH . '/js/jquery-3.2.1.min.js');
// bootstrap dependence
$asset->addJs(SITE_TEMPLATE_PATH . '/js/popper.js');
$asset->addJs(SITE_TEMPLATE_PATH . '/js/tether.min.js');
$asset->addJs(SITE_TEMPLATE_PATH . '/js/bootstrap.min.js');

$asset->addJs(SITE_TEMPLATE_PATH . '/script.js');
?>
<!DOCTYPE html>
<html>
<head>
	<? $APPLICATION->ShowHead(); ?>
    <title><? $APPLICATION->ShowTitle(); ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico"/>
    <meta lang="ru" charset="UTF-8"/>
</head>
<body>

<div id="panel"><? $APPLICATION->ShowPanel(); ?></div>
<div class="footer-push">
    <nav class="header-toggle-menu navbar navbar-toggleable-sm navbar-light">

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarHeaderMenu" aria-controls="navbarHeaderMenu" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="col-6 navbar-brand" href="#">
            <a href="/">
                <img class="hidden-md-up" src="<?= SITE_TEMPLATE_PATH . '/logo.png' ?> ">
            </a>
        </div>

        <div class="collapse navbar-collapse" id="navbarHeaderMenu">

            <div class="white-block header-top-block">
                <div class="container header-submenu">

                    <div class="row navbar-nav">
                        <div class="nav-item col-sm-12 col-md-3">
							<? $APPLICATION->IncludeComponent(
								"bitrix:news.list",
								"header-city-select",
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
									"FIELD_CODE"                      => array("", ""),
									"FILTER_NAME"                     => "",
									"HIDE_LINK_WHEN_NO_DETAIL"        => "N",
									"IBLOCK_ID"                       => \BH\Model\Region::IBLOCK_ID,
									"IBLOCK_TYPE"                     => "content",
									"INCLUDE_IBLOCK_INTO_CHAIN"       => "N",
									"INCLUDE_SUBSECTIONS"             => "Y",
									"MESSAGE_404"                     => "",
									"NEWS_COUNT"                      => "4",
									"PAGER_BASE_LINK_ENABLE"          => "N",
									"PAGER_DESC_NUMBERING"            => "N",
									"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
									"PAGER_SHOW_ALL"                  => "N",
									"PAGER_SHOW_ALWAYS"               => "N",
									"PAGER_TEMPLATE"                  => ".default",
									"PAGER_TITLE"                     => "Выбор города",
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
									"SORT_BY1"                        => "SORT",
									"SORT_BY2"                        => "ASC",
									"SORT_ORDER1"                     => "NAME",
									"SORT_ORDER2"                     => "ASC"
								)
							); ?>

                        </div>

                        <div class="nav-item col-sm-12 col-md-5">

                            <div class="header-search">
                                <form class="search" method="get" action="/search/">
                                    <input id="search_text" type="text" name="query"
                                           class="beige-block beige-accent-text"
                                           placeholder="Поиск" aria-label="Поиск">

                                    <input id="search_submit" type="submit" name="search"
                                           value="" title="Искать"
                                           aria-label="Искать">
                                </form>
                            </div>

                        </div>

                            <div class="nav-item col-sm-12 col-md-4 header-right-side-links">
                                <a class="header-contacts" href="/contacts/">Контакты</a>

                                <button class="button auth-button orange-button" type="button"
                                        id="headerAuthDropdown" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                                    <nobr>Вход / Регистрация</nobr>
                                </button>

                                <div class="dropdown-menu dropdown-auth" aria-labelledby="headerAuthDropdown">
                                    <?$APPLICATION->IncludeComponent("bitrix:system.auth.form",
                                    "index",
                                    array(
                                         "REGISTER_URL" => "register.php",
                                         "FORGOT_PASSWORD_URL" => "",
                                         "PROFILE_URL" => "profile.php",
                                         "SHOW_ERRORS" => "Y"
                                         )
                                    );?>
                                </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="logo-and-description">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <a href="/">
                                <img src="<?= SITE_TEMPLATE_PATH . '/logo.png' ?> ">
                            </a>
                        </div>
                        <div class="col-md-6 header-site-description">
                            <? BH\Frontend::includeArea('header-description') ?>
                        </div>
                    </div>
                </div>
            </div>

			<?php
			$APPLICATION->IncludeComponent(
				"bitrix:menu",
				"header-menu",
				array(
					"ROOT_MENU_TYPE"        => "header",
					"MAX_LEVEL"             => "1",
					"CHILD_MENU_TYPE"       => "top",
					"USE_EXT"               => "Y",
					"DELAY"                 => "N",
					"ALLOW_MULTI_SELECT"    => "Y",
					"MENU_CACHE_TYPE"       => "N",
					"MENU_CACHE_TIME"       => "3600",
					"MENU_CACHE_USE_GROUPS" => "Y",
					"MENU_CACHE_GET_VARS"   => ""
				),
				false
			);
			?>

        </div>
    </nav>

    <? if(defined('NEED_EXTRA_MENU'))
    {
        ?>
        <div class="container-fluid extra-menu-container <?=NEED_EXTRA_MENU?>-extra-menu">
            <div class="container">
               <? require_once ($_SERVER['DOCUMENT_ROOT'] . '/' . NEED_EXTRA_MENU . '_extra_menu.php'); ?>
            </div>
        </div>
        <?
    }


    if(!defined('NO_HEADER_TITLE')) {?>

    <div class="container">
        <div class="row">
            <div class="col-12">
            <?php
                $APPLICATION->IncludeComponent(
                        'bitrix:breadcrumb',
                         'header-backlink'
                         );
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <h1 class="page-title"><? $APPLICATION->ShowTitle() ?></h1>
            </div>
        </div>
    </div>
<?
}