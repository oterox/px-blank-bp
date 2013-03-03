<?php get_header(); ?>
<!--Title Start-->
<div id="title">
	<div class="grid_12">
		<div id="breadcrumb">
			<a href="<?php echo home_url('/'); ?>">Home</a>
			<em>></em>
			<span>Archive</span>
			
			<?php if (have_posts()) : ?>

				<?php $post = $posts[0]; // hack: set $post so that the_date() works ?>
				<?php if (is_category()) { ?>
				<h1>Category: <?php single_cat_title(); ?></h1>

				<?php } elseif(is_tag()) { ?>
				<h1>Tag: <?php single_tag_title(); ?></h1>

				<?php } elseif (is_day()) { ?>
				<h1>Day: <?php the_time('F jS, Y'); ?></h1>

				<?php } elseif (is_month()) { ?>
				<h1>Month: <?php the_time('F, Y'); ?></h1>

				<?php } elseif (is_year()) { ?>
				<h1>Year: <?php the_time('Y'); ?></h1>

				<?php } elseif (is_author()) { ?>
				<h1>Author Archive</h1>

				<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<h1>Blog Archives</h1>
				<?php } ?>
			<?php else : ?>
			<?php endif; ?>
			<hr>
		</div>

	</div>
	<div class="clearfix"></div>
</div>

<!--Title End-->

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

<?php get_footer(); ?>