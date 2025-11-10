<?php
    global $the_theme;

    $form_id = get_field('contact_form');
    $excerpt = get_the_excerpt();
?>
<section class="contact-us-hero" block-first="<?= $the_theme->block_recorder->first_block ?>">
    <div class="contact-us-hero__container">
        <h1 class="contact-us-hero__title"><?= get_the_title() ?></h1>
        <?php if(!empty($excerpt)) : ?>
            <p class="contact-us-hero__excerpt"><?= $excerpt ?></p>
        <?php endif; ?>
        <div class="contact-us-hero__form">
            <?php gravity_form($form_id, false, false, false, false, true); ?>
        </div>
    </div>
</section>
