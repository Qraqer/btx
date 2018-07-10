<?
/**
 * @var array $arResult
 * @var array $arParams
 */
$this->setFrameMode(true);
$currentDate = new DateTime(date("d.m.Y H:i:s", time()));
?>

<div class="actions-index default-list">
    <div class="row">
		<? foreach ($arResult['ITEMS'] as $item) { ?>
            <div class="col-md-6 col-lg-3 index-element-item">
                <div class="default-item action-item">
                    <div class="image">

                        <img src="<?= $item['PREVIEW_PICTURE_RESIZED']['src'] ?>"/>

                        <div class="title">
                            <a class="black-text" href="<?= $item['DETAIL_PAGE_URL'] ?>"><h5><?= $item['NAME'] ?></h5>
                            </a>
                        </div>
                    </div>

                    <div class="timer">
                        <div class="orange-text">
							<? if ($currentDate->getTimestamp() > strtotime($item['DATE_ACTIVE_TO'])) { ?>
                                <div class="beige-accent-text">Акция завершена!</div>
							<? }
							else {
								$actionDate = new DateTime($item['DATE_ACTIVE_TO']);
								$interval = $currentDate->diff($actionDate);

								$months = $interval->m;
								$days = $interval->d;
								$hours = $interval->h; ?>

                                <div class="beige-accent-text">До окончания акции</div>

								<? if ($months > 0) {
									echo $months . ' месяц' . Morph::getEnd($months, Morph::GENDER_MALE, 0) . ' ';
								}

								if ($days > 0) {
									echo $days . ' д' . Morph::getEnd($days, Morph::GENDER_MALE, 7) . ' ';
								}

								echo $hours . ' час' . Morph::getEnd($hours, Morph::GENDER_MALE, 1); ?>

							<? } ?>

                        </div>
                    </div>
                </div>
            </div>
			<?php
		}

		if ($arParams['USE_AD'] == 'Y') {
			?>
            <div class="col-md-6 col-lg-3 index-element-item">
                <div class="default-item action-item banner">
					<?= $arParams['AD_ID'] ?>
                </div>
            </div>
		<? } ?>
    </div>

	<?= $arResult["NAV_STRING"] ?>

</div>
