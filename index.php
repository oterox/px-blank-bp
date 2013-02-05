<?php get_header(); ?>

	<section>
	
	<div class="grid_8">
	<?php if (have_posts ()) { ?>
		<?php while (have_posts ()) {
			the_post(); ?>
			<?php get_template_part( 'loop' ); ?>
		<?php } ?>

		<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
		<div id="nav" class="navigation">
			<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } else { ?>
				<div class="nav-previous"><?php next_posts_link(sprintf(__( 'older articles %s', 'thepixellary' ),'<span class="meta-nav">&raquo;</span>')) ?></div>
				<div class="nav-next"><?php previous_posts_link(sprintf(__( '%s newer articles', 'thepixellary' ),'<span class="meta-nav">&laquo;</span>')) ?></div>
			<?php } ?>
		</div>
		<?php } ?> 

    <?php } else { ?>
        <p><?php _e('Apologies, but no results were found. Perhaps searching will help find a related post.', 'thepixellary'); ?></p>
    <?php } ?>

	</div>

	<div class="grid_4">
		<?php get_sidebar(''); ?>
	</div>

	</section>
	
<?php get_footer(); ?>