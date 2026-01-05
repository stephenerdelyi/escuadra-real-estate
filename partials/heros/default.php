<?php
    global $the_theme;

    $title = get_the_title();
    $excerpt = get_the_excerpt();
    $bg_image = get_field('default_page_image');
    $hero_size = get_field('default_page_hero_size');
    $title_class = '';
    $excerpt_class = '';
    $post_type = get_post_type();
    $e_post = null;

    if($post_type == 'post') {
        $e_post = e_get_post();
        $title_class = '--post';
        $excerpt_class = '--wide';

        if(strlen($title) > 80) {
            $title_class = '--post-longer';
        } else if(strlen($title) > 50) {
            $title_class = '--post-long';
        }
    }
?>
<section class="default-hero --<?= $hero_size ?>" block-first="<?= $the_theme->block_recorder->first_block ?>" style="<?= isset($bg_image['url']) ? "background-image: url('" . $bg_image['url'] . "')" : null ?>">
    <div class="default-hero__content">
        <h1 class="default-hero__title animate-up <?= $title_class ?>"><?= $title ?></h1>
        <?php if(!empty($excerpt)) : ?>
            <p class="default-hero__excerpt <?= $excerpt_class ?> animate-fade-in" data-delay="0.5"><?= $excerpt ?></p>
        <?php endif; ?>
        <?php if($post_type == 'post' && !empty($e_post->linked_agent)) : ?>
            <p class="default-hero__excerpt --meta animate-fade-in" data-delay="0.5">Posted <?= $e_post->post_date ?> by <?= $e_post->linked_agent->name ?></p>
        <?php elseif($post_type == 'post') : ?>
            <p class="default-hero__excerpt --meta animate-fade-in" data-delay="0.5">Posted <?= $e_post->post_date ?></p>
        <?php endif; ?>
        <?php if($hero_size == 'full') : ?>
            <a class="default-hero__scroll-button js-scroll-button" href="#"><img class="default-hero__scroll-button__image" src="<?= $the_theme->build ?>/svgs/arrow-large.svg"/></a>
        <?php endif; ?>
    </div>
</section>
