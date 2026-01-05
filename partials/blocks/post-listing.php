<?php
    global $the_theme;

    $image = get_field('image_text_image');
    $excerpt = get_field('image_text_excerpt');
    $posts = get_data('post', 'e_get_post', ['posts_per_page' => $the_theme->php_listing_limit]);
    $num_posts = wp_count_posts('post')->publish;
?>
<div class="block-post-listing__container js-post-listing">
    <?php if($num_posts > 0) : ?>
        <div class="block-post-listing__post-items js-post-listing-results">
            <?php foreach($posts->results as $post) : ?>
                <a class="block-post-listing__post-item" href="<?= $post->url ?>">
                    <div class="block-post-listing__image">
                        <img class="block-post-listing__image__img" src="<?= $post->image->url ?>" alt="<?= $post->title ?>"/>
                    </div>
                    <div class="block-post-listing__info">
                        <h2 class="block-post-listing__title"><?= $post->title ?></h2>
                        <?php if(!empty($post->excerpt)) : ?>
                            <p class="block-post-listing__text"><?= $post->excerpt ?></p>
                        <?php endif; ?>
                        <?php if(!empty($post->linked_agent)) : ?>
                            <p class="block-post-listing__text --meta">Posted <?= $post->post_date ?> by <?= $post->linked_agent->name ?></p>
                        <?php else : ?>
                            <p class="block-post-listing__text --meta">Posted <?= $post->post_date ?></p>
                        <?php endif; ?>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
        <?php if($num_posts > $the_theme->php_listing_limit) : ?>
            <div class="block-post-listing__buttons">
                <a class="block-post-listing__button js-post-listing-more" href="#">Load More</a>
            </div>
        <?php endif; ?>
    <?php else : ?>
        <p class="block-post-listing__empty">Sorry, we couldn't find any articles right now. Check back again soon.</p>
    <?php endif; ?>
</div>
