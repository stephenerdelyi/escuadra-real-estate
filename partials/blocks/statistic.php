<?php
    $title = get_field('statistic_title');
    $description = get_field('statistic_description');
?>
<div class="block-statistic__container">
    <p class="block-statistic__title"><?= $title ?></p>
    <p class="block-statistic__text"><?= $description ?></p>
</div>
