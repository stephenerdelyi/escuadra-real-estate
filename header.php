<?php
	global $the_theme;

	$the_theme->block_recorder = new BlockRecorder();

	$header_nav = get_navigation('Main Navigation');
?>
<html>
	<head>
		<?php $the_theme->get_partial('meta'); ?>
	</head>
	<body class="<?= is_user_logged_in() ? 'logged-in' : null ?>">
		<header class="site-header js-navigation">
			<a class="site-header__navigation__logo --mobile js-navigation-mobile" href="#">
				<img class="site-header__navigation__logo__image --main --cream" src="<?= $the_theme->build ?>/svgs/logomark-cream.png"/>
				<img class="site-header__navigation__logo__image --main --red" src="<?= $the_theme->build ?>/svgs/logomark-red.png"/>
				<p class="site-header__navigation__logo__label">Menu</p>
			</a>
			<nav class="site-header__navigation">
				<div class="site-header__navigation__link-container --mobile">
					<a class="site-header__navigation__link <?= (is_front_page() == true ? '--active' : null) ?>" href="<?= get_home_url() ?>">Home</a>
				</div>
				<?php $index = 1; ?>
				<?php foreach($header_nav as $nav_item) : ?>
					<div class="site-header__navigation__link-container">
						<a class="site-header__navigation__link <?= ($nav_item->post_id == get_the_ID() ? '--active' : null) ?>" href="<?= $nav_item->url ?>" target="<?= $nav_item->target ?>"><?= $nav_item->title ?></a>
						<?php if(sizeof($nav_item->children) > 0) : ?>
							<div class="site-header__navigation__children">
								<?php foreach($nav_item->children as $subnav_item) : ?>
									<a class="site-header__navigation__child-link <?= ($subnav_item->post_id == get_the_ID() ? '--active' : null) ?>" href="<?= $subnav_item->url ?>" target="<?= $subnav_item->target ?>"><?= $subnav_item->title ?></a>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
					</div>
					<?php if($index == floor(sizeof($header_nav) / 2)) : ?>
						<a class="site-header__navigation__logo --desktop --cream" href="<?= get_site_url() ?>"><img class="site-header__navigation__logo__image" src="<?= $the_theme->build ?>/svgs/logomark-cream.png"/></a>
						<a class="site-header__navigation__logo --desktop --red" href="<?= get_site_url() ?>"><img class="site-header__navigation__logo__image" src="<?= $the_theme->build ?>/svgs/logomark-red.png"/></a>
					<?php endif; ?>
					<?php $index += 1; ?>
				<?php endforeach; ?>
			</nav>
		</header>
		<main>
