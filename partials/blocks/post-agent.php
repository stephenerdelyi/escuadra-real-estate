<?php
    $post_agent = get_field('post_agent');
    $agent = get_agent($post_agent);
    $site_title = get_bloginfo('name');
?>
<?php if(!empty($post_agent)) : ?>
    <div class="block-post-agent__container">
        <?php if(!empty($agent->image->sizes)) : ?>
            <img class="block-post-agent__image" src="<?= $agent->image->sizes->medium ?>"/>
        <?php endif; ?>
        <div class="block-post-agent__details">
            <p class="block-post-agent__name"><?= $agent->name ?></p>
            <?php if(!empty($agent->role)) : ?>
                <p class="block-post-agent__role"><?= $agent->role . ', ' . $site_title ?></p>
            <?php endif; ?>
            <?php if(!empty($agent->license)) : ?>
                <p class="block-post-agent__license"><?= $agent->license ?></p>
            <?php endif; ?>
            <div class="block-post-agent__buttons">
                <a class="block-post-agent__button" href="/about/">About Me</a>
                <?php if(!empty($agent->email)) : ?>
                    <a class="block-post-agent__button" href="mailto:<?= $agent->email ?>">Email Me</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>