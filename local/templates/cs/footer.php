<?
/**
 * @global CMain $APPLICATION
 */
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
</div> <? // .footer-push?>
<footer class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <img src="<?= SITE_TEMPLATE_PATH . '/logo.png' ?> ">
            </div>
            <div class="col-lg-3 col-sm-6 footer-contacts"><h5>8 800 XXX XX XX</h5>
                <a href="mailto:info@climatesystems.ru">Связаться с нами</a></div>
            <div class="col-lg-3 col-sm-6 ml-lg-auto">
				<?
				$APPLICATION->IncludeComponent("bitrix:main.share", "socials", array(
					"HANDLERS"   => array('vk', 'facebook', 'twitter'),
					"PAGE_URL"   => $APPLICATION->GetCurPage(),
					"PAGE_TITLE" => $APPLICATION->GetPageProperty('title'),
					"TEXT"    => '',
					"HIDE"       => 'N',
				),
					false,
					array("HIDE_ICONS" => "Y")
				);
				?>

            </div>
        </div>
    </div>
</footer>

<?php
echo \BH\Frontend\Phones::getInstance()->getJS();
?>
</body>
</html>