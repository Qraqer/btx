<?
/**
 * @var array $arResult
 * @var array $arParams
 */
use Bitrix\Main\Localization\Loc;

$this->setFrameMode(true);
?>

<div class="news-short-list default-short-list">

	<?php
	$section = array_pop($arResult['SECTION']['PATH']);

	?>
    <div class="row">
        <div class="col-9"><h5><?= $section['NAME'] ?></h5></div>
        <div class="col-3 short-list-more-link"><a class="" href="<?= $section['SECTION_PAGE_URL'] ?>"><nobr>Ещё ></nobr></a></div>
    </div>

	<? foreach ($arResult['ITEMS'] as $index => $item) { ?>

		<?= $index != 0 ? '<hr>' : '' ?>
        <div class="row short-list-item news-short-list-item">
            <div class="col-4">
                <div class="image">

                    <img src="<?= $item['PREVIEW_PICTURE_RESIZED']['src'] ?>"/>
                </div>
            </div>
            <div class="col-8">

                <div class="date">
					<? $date = new DateTime(!empty($item['DATE_ACTIVE_FROM']) ? $item['DATE_ACTIVE_FROM'] : $item['DATE_CREATE']);
					echo $date->format('d') . ' ' . Loc::getMessage('MONTH_' . $date->format('n') . '_S');
					?>
                </div>

                <a class="short-list-link" href="<?= $item['DETAIL_PAGE_URL'] ?>">
					<?= $item['NAME'] ?>
                </a>

            </div>
        </div>

		<?php
	}

	?>

</div>
