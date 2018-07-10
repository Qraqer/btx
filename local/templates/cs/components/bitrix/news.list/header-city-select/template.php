<?
/**
 * @global CMain $APPLICATION
 * @var array    $arResult
 */
$this->setFrameMode(true);
$currentDate = new DateTime(date("d.m.Y H:i:s", time()));
$currentPage = $APPLICATION->GetCurPage();
$currentCityLabel = 'Москва'; // Todo:
?>

<div class="header-city-select">

    <div class="dropdown">
        <button class="btn white-block dropdown-toggle" type="button"
                id="dropdownCitySelect" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
			<?= $currentCityLabel ?>
        </button>

        <div class="dropdown-menu" aria-labelledby="dropdownCitySelect">
			<? foreach ($arResult['ITEMS'] as $option) {
				?>
                <a class="dropdown-item"
                   href="<?= $currentPage ?>?setCity=<?= $option['ID'] ?>">
					<?= $option['NAME'] ?>
                </a>
				<?php
			} ?>
        </div>
    </div>
</div>
