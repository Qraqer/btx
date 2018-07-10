<?
/**
 * @var array $arResult
 */
use Bitrix\Main\Localization\Loc;

$this->setFrameMode(true);
$currentDate = new DateTime(date("d.m.Y H:i:s", time()));
?>

<div class="events-index default-list">

    <div class="in-hr">
        <hr>
        <h4 class="title">События</h4>
        <hr>
    </div>


    <div class="row">

		<?php
		$item = array_shift($arResult['ITEMS']);
		?>
        <div class="col-md-12 col-lg-4 index-element-item">
            <div class="default-item event-item first">

                <img src="<?= $item['PREVIEW_PICTURE_RESIZED']['src'] ?>"/>

                <div class="overlay">
                    <div class="date">
                       <? $date = new DateTime($item['PROPERTIES']['DATE']['VALUE']);
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

		<? foreach ($arResult['ITEMS'] as $item) { ?>
            <div class="col-md-6 col-lg-2 index-element-item">
                <div class="default-item event-item">

                    <img src="<?= $item['PREVIEW_PICTURE_RESIZED']['src'] ?>"/>

                    <div class="title">
                        <div class="date beige-accent-text">
		                    <?
		                    $date = new DateTime($item['PROPERTIES']['DATE']['VALUE']);
		                    echo $date->format('d') . ' ' . Loc::getMessage('MONTH_' . $date->format('n') . '_S');
		                    ?>
                        </div>

                        <a class="black-text" href="<?= $item['DETAIL_PAGE_URL'] ?>">
                            <h5><?= $item['NAME'] ?></h5>
                        </a>
                    </div>
                </div>
            </div>
			<?php
		}
		?>
    </div>

    <div class="row link-all">
        <div class="col-sm-5 col-md-5 col-lg-3 m-auto ">
            <a class="button beige-button" href="/events/">
                Все события
            </a>
        </div>
    </div>
</div>
