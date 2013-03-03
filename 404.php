<?php get_header(); ?>
	
	<section>
	<div class="grid_12">
		<article>
			<h1>Error 404 - Not Found</h1>
			<p>Sorry, but the page you were trying to view does not exist.</p>
			<p>It looks like this was the result of either:</p>
			<ul>
				<li>a mistyped address</li>
				<li>an out-of-date link</li>
			</ul>
			
			<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
			
			<?php get_search_form(); ?>

			<h2>Or Choose A Popular Topic</h2>
			<p><?php wp_tag_cloud(''); ?> </p>

		</article>
	</div>
	</section>
	<script type="text/javascript">
		// focus on search field after it has loaded
		document.getElementById('s') && document.getElementById('s').focus();
	</script>
<?php get_footer(); ?>