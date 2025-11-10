<?php
    global $the_theme;

    $phone = format_phone(get_field('contact_info_phone'));
    $email = get_field('contact_info_email');
    $title = get_field('contact_info_title');
    $excerpt = get_field('contact_info_excerpt');
    $cta = get_field('contact_info_cta');
?>
<div class="block-contact-info__container">
    <?php if(!empty($email) || !empty($phone)) : ?>
        <div class="block-contact-info__details">
            <?php if(!empty($email)) : ?>
                <div class="block-contact-info__detail">
                    <img class="block-contact-info__detail__icon --short" src="<?= $the_theme->build ?>/svgs/email.svg"/>
                    <a class="block-contact-info__detail__link" href="mailto:<?= $email ?>">Send me an E-mail</a>
                </div>
            <?php endif; ?>
            <?php if(!empty($phone)) : ?>
                <div class="block-contact-info__detail">
                    <img class="block-contact-info__detail__icon" src="<?= $the_theme->build ?>/svgs/phone.svg"/>
                    <a class="block-contact-info__detail__link" href="<?= $phone->url ?>"><?= $phone->formatted ?></a>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <?php $the_theme->get_partial('card', [
        'title' => $title,
        'excerpt' => $excerpt,
        'cta' => $cta,
        'class' => 'block-contact-info',
    ]); ?>
</div>
