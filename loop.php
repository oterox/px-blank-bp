       	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<header>
				<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
				<p><?php _e('Posted by','thepixellary'); ?><a href="#"><?php the_author(); ?></a> on <span><?php the_time('F jS, Y') ?></span> - <span class="comments"><?php comments_number('(No Comments)', '(One Comment)', '(% Comments)' );?></span></p>
			</header>
			<section>
				<?php 
				if ( is_archive() || is_search() ) { // Only display Excerpts for archives & search 
					the_excerpt(); 
				} else { 
					the_content('READ MORE &raquo;'); 
				}
				?>
			</section>
			<footer>
				<p><?php the_tags('Tags: ', ', ', '<br>'); ?> Posted in <?php the_category(', '); ?> &bull; <?php edit_post_link('Edit', '', ' &bull; '); ?> <?php comments_popup_link('Respond to this post &raquo;', '1 Response &raquo;', '% Responses &raquo;'); ?></p>
			</footer>

			<hr>
		</article>