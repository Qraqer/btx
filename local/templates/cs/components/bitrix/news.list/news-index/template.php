<?
/**
 * @var array $arResult
 * @var array $arParams
 */
use Bitrix\Main\Localization\Loc;

$this->setFrameMode(true);
$currentDate = new DateTime(date("d.m.Y H:i:s", time()));

?>

<div class="news-index default-list">

	<?php
	if ($arParams['IN_HR'] == 'Y') {
		?>
        <div class="in-hr">
            <hr>
            <h4 class="title"><?= $arParams['SECTION_TITLE'] ?></h4>
            <hr>
        </div>
	<? } ?>

    <div class="row">

		<?php
		if ($arParams['FIRST_BIG'] == 'Y') {
			$item = array_shift($arResult['ITEMS']);
			?>
            <div class="col-lg-8 col-md-12 index-element-item">
                <div class="default-item news-item first">

                    <img src="<?= $item['PREVIEW_PICTURE_RESIZED']['src'] ?>"/>

                    <div class="overlay">
                        <div class="date">
							<? $date = new DateTime($item['DATE_ACTIVE_FROM']);
							echo $date->format('d') . ' ' . Loc::getMessage('MONTH_' . $date->format('n') . '_S') . ' ' . $date->format('Y');
							?>
                        </div>

                        <a href="<?= $item['DETAIL_PAGE_URL'] ?>">
                            <h5 class="element-title-accent"><?= $item['NAME'] ?></h5>
                        </a>

                        <a class="element-detail-link-wrap" href="<?= $item['DETAIL_PAGE_URL'] ?>">
                            <span class="detail-link orange-block white-text">Читать</span>
                        </a>
                    </div>
                </div>
            </div>
		<? } ?>

		<? foreach ($arResult['ITEMS'] as $item) { ?>
            <div class="col-lg-4 col-md-6 index-element-item">
                <div class="default-item news-item">

                    <img src="<?= $item['PREVIEW_PICTURE_RESIZED']['src'] ?>"/>

                    <div class="description">
                        <div class="date beige-accent-text">
							<? $date = new DateTime(!empty($item['DATE_ACTIVE_FROM']) ? $item['DATE_ACTIVE_FROM'] : $item['DATE_CREATE']);
							echo $date->format('d') . ' ' . Loc::getMessage('MONTH_' . $date->format('n') . '_S');
							?>
                        </div>

                        <a class="black-text" href="<?= $item['DETAIL_PAGE_URL'] ?>">
                            <h5><?= $item['NAME'] ?></h5>
                        </a>


                        <div class="preview-text">
							<?= $item['PREVIEW_TEXT'] ?>
                        </div>
                    </div>

                </div>
            </div>
			<?php
		}

		if ($arParams['USE_AD'] == 'Y') {
			?>
            <div class="col-md-4 index-element-item">
                <div class="default-item news-item banner">
					<?= $arParams['AD_ID'] ?>
                </div>
            </div>
			<?php
		}
		?>

    </div>

	<? if ($arParams['LINK_ALL'] == 'Y') { ?>
        <div class="row link-all">
            <div class="col-sm-5 col-md-5 col-lg-3 m-auto">
                <a class="button beige-accent-button" href="<?= $arResult['SECTION']['PATH'][0]['SECTION_PAGE_URL'] ?>">
                    Eщё
                </a>
            </div>
        </div>
	<? } ?>

	<? if ($arParams['DISPLAY_BOTTOM_PAGER'] == 'Y') {
		echo $arResult['NAV_STRING'];
	} ?>
</div>
