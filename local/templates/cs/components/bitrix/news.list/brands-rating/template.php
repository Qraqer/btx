<?
/**
 * @var array $arResult
 */
$this->setFrameMode(true);
?>
<div class="rating-block">

    <h4 class="rating-title">Рейтинг брендов</h4>

    <div class="companies-rating default-rating">

        <div class="companies-list">
			<? foreach ($arResult['ITEMS'] as $index => $item) {
				$rating = $item['PROPERTIES']['RATING']['VALUE']; ?>
                <div class="row default-rating-item company-rating-item">
                    <div class="col-2 position">
                        <div class="circle"><?= $index + 1 ?></div>
                    </div>
                    <div class="col-5 name"><?= $item['NAME'] ?></div>
                    <div class="col-5 rating" title="Средняя оценка: <?= $rating ?>">
                        <div class="empty">
                            <div class="fill" style="width: <?= $rating / 5 * 100 ?>%"></div>
                        </div>
                    </div>
                </div>
				<?php
			}
			?>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="rating-all-link">
                    <a href="/brands/">Все бренды</a>
                </div>
            </div>
        </div>

    </div>
</div>
