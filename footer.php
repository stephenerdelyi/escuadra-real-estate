<?php
	global $the_theme;

	$footer_nav = get_navigation('Footer Navigation');
	$copyright_text = get_field('copyright_text', 'option');
	$copyright_text = str_replace('{year}', date('Y', time()), $copyright_text);
	$footer_social = get_field('footer_social', 'option');
?>
		</main>
		<footer class="site-footer">
			<div class="site-footer__container">
				<div class="site-footer__main-container">
					<div class="site-footer__logo-container">
						<img class="site-footer__logo" src="<?= $the_theme->build ?>/svgs/logomark-cream.png"/>
					</div>
					<?php if(!empty($footer_nav)) : ?>
						<div class="site-footer__nav-container">
							<div class="site-footer__nav-container__upper">
								<p class="site-footer__nav-title">Helpful Links</p>
								<?php if(!empty($footer_social)) : ?>
								<div class="site-footer__nav-social">
									<?php foreach($footer_social as $item) : ?>
										<a class="site-footer__nav-social__link" href="<?= $item['url'] ?>" target="_blank">
											<img class="site-footer__nav-social__icon" src="<?= $the_theme->build ?>/svgs/<?= $item['type'] ?>.svg"/>
										</a>
									<?php endforeach; ?>
								</div>
								<?php endif; ?>
							</div>
							<nav class="site-footer__navigation">
								<?php foreach($footer_nav as $nav_item) : ?>
									<div class="site-footer__navigation__link-container">
										<a class="site-footer__navigation__link <?= ($nav_item->post_id == get_the_ID() ? '--active' : null) ?>" href="<?= $nav_item->url ?>"><?= $nav_item->title ?></a>
									</div>
								<?php endforeach; ?>
								<a href="https://www.hud.gov/stat/fheo/rights-obligations" target="_blank" title="Fair Housing Information"><img class="site-footer__eq-icon" src="<?= $the_theme->build ?>/images/equal-housing.png"/></a>
							</nav>
						</div>
					<?php endif; ?>
				</div>
				<div class="site-footer__secondary-container">
					<?php if(!empty($copyright_text)) : ?>
						<a class="site-footer__secondary-container__text --link" href="<?= get_home_url() ?>/trec-cpn" target="_blank">Texas Real Estate Commission Consumer Protection Notice</a>
						<a class="site-footer__secondary-container__text --link" href="<?= get_home_url() ?>/trec-iabs" target="_blank">Texas Real Estate Commission Information About Brokerage Services</a>
						<br/>
						<p class="site-footer__secondary-container__text"><?= $copyright_text ?></p>
					<?php endif; ?>
				</div>
			</div>
		</footer>
		<?php wp_footer(); ?>
		<script>
			window.theme = [];
			window.theme['variables'] = {
				<?php foreach($the_theme->variables as $key => $value) : ?>
					"<?= $key ?>" : '<?= $value ?>',
				<?php endforeach; ?>
			};
		</script>
		<?php if(!empty($the_theme->modals)) : ?>
			<div class="modal-container js-modal-container">
				<a class="modal-container__close js-universal-modal-close js-modal-close" href="#">
				    <?= $the_theme->get_icon('close', 'modal-container__close__icon') ?>
				</a>
				<?php foreach($the_theme->modals as $modal) {
					$the_theme->get_partial('modals/' . $modal);
				} ?>
			</div>
		<?php endif; ?>
	</body>
</html>
