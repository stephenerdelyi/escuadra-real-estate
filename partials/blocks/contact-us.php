<?php
    $title = get_field('contact_title');
    $form_id = get_field('contact_form');
?>
<div class="block-contact-us__container">
    <p class="block-contact-us__title">Contact Us</p>
    <?php gravity_form($form_id, false, false, false, false, true); ?>
</div>
