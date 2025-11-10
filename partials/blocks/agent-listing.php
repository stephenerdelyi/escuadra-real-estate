<?php
    global $the_theme;

    $the_theme->register_modal('agent-detail');

    $agents = [];
    $order = get_field('agent_listing_order');

    if($order == 'alphabetical') {
        $agents = get_data('agents', 'get_agent', [
            'orderby' => 'post_title',
            'order' => 'ASC'
        ]);
    } else if($order == 'manual') {
        $agents = get_data('agents', 'get_agent', [
            'post_ids' => get_field('agent_listing_manual')
        ]);
    }
?>
<div class="block-agent-listing__container <?= ($agents->num_results == 0 ? '--empty' : null) ?>">
    <?php if($agents->num_results > 0) : ?>
        <?php foreach($agents->results as $agent) : ?>
            <div class="block-agent-listing__agent">
                <img class="block-agent-listing__agent__image" src="<?= $agent->image->sizes->large ?>"/>
                <div class="block-agent-listing__agent__card --light">
                    <p class="block-agent-listing__agent__card__title"><?= $agent->name ?></p>
                    <div class="block-agent-listing__agent__card__details">
                        <p class="block-agent-listing__agent__card__tag"><?= $agent->role ?></p>
                        <a class="block-agent-listing__agent__card__cta js-modal-open" href="#" data-modal-name="agent-detail" data-agent-id="<?= $agent->id ?>" target="">Learn More</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p class="block-agent-listing__empty">Sorry, we couldn't find any agents right now. Check back again soon.</p>
    <?php endif; ?>
</div>
