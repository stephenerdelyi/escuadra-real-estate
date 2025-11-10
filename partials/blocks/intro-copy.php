<?php
    $title = get_field('intro_copy_title');
    $excerpt = get_field('intro_copy_excerpt');
    $stats = get_field('intro_copy_stats');
?>
<?php if(!empty($title) || !empty($excerpt) || !empty($stats)) : ?>
    <div class="block-intro-copy__container">
        <?php if(!empty($title)) : ?>
            <p class="block-intro-copy__title animate-up"><?= $title ?></p>
        <?php endif; ?>
        <?php if(!empty($excerpt)) : ?>
            <p class="block-intro-copy__subtitle animate-fade-in"><?= $excerpt ?></p>
        <?php endif; ?>
        <?php if(!empty($stats)) : ?>
            <div class="block-intro-copy__stats-container">
                <div class="block-intro-copy__main-stat animate-left <?= sizeof($stats) == 1 ? '--single' : null ?>">
                    <p class="block-intro-copy__main-stat__stat"><?= $stats[0]['title'] ?></p>
                    <p class="block-intro-copy__main-stat__title"><?= $stats[0]['description'] ?></p>
                </div>
                <?php if(sizeof($stats) > 1) : ?>
                    <div class="block-intro-copy__secondary-stats animate-grow">
                        <div class="block-intro-copy__secondary-stats__stat-container <?= (sizeof($stats) == 2 ? '--single' : null) ?>">
                            <p class="block-intro-copy__secondary-stats__stat"><?= $stats[1]['title'] ?></p>
                            <p class="block-intro-copy__secondary-stats__title"><?= $stats[1]['description'] ?></p>
                        </div>
                        <?php if(sizeof($stats) > 2) : ?>
                            <div class="block-intro-copy__secondary-stats__stat-container">
                                <p class="block-intro-copy__secondary-stats__stat"><?= $stats[2]['title'] ?></p>
                                <p class="block-intro-copy__secondary-stats__title"><?= $stats[2]['description'] ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>
