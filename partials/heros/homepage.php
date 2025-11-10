<?php
    global $the_theme;

    $title = get_field('homepage_title');
    $excerpt = get_the_excerpt();
    $cta = get_field('homepage_cta');
    $background_type = get_field('homepage_bg_type');
    $video = get_field('homepage_video');
    $image = get_field('homepage_image');
?>
<section class="homepage-hero" <?php if($background_type == 'image') : ?>style="background-image: url('<?= $image['url'] ?>')"<?php endif; ?>>
    <?php if($background_type == 'video') : ?>
        <video class="homepage-hero__video" autoplay muted loop playsinline>
            <source src="<?= $video['url'] ?>" type="video/mp4">
        </video>
    <?php endif; ?>
    <div class="homepage-hero__content">
        <h1 class="homepage-hero__title animate-up"><?= $title ?></h1>
        <?php if(!empty($excerpt)) : ?>
            <p class="homepage-hero__excerpt animate-fade-in" data-delay="0.5"><?= $excerpt ?></p>
        <?php endif; ?>
        <?php if(!empty($cta)) : ?>
            <div class="homepage-hero__button-container animate-fade-in" data-delay="1">
                <a class="homepage-hero__button" href="<?= $cta['url'] ?>" target="<?= $cta['target'] ?>"><?= $cta['title'] ?></a>
            </div>
        <?php endif; ?>
        <a class="homepage-hero__scroll-button js-scroll-button" href="#"><img class="homepage-hero__scroll-button__image" src="<?= $the_theme->build ?>/svgs/arrow-large.svg"/></a>
    </div>
</section>
