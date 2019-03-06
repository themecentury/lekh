<?php

/*Lazy load ajax */
if (!function_exists('lekh_lazy_load_post')):

	function lekh_lazy_load_post() {

		$lazy_load_data = isset($_POST['lozyload']) ? wp_unslash($_POST['lozyload']) : array();
		$offset = isset($lazy_load_data['offset']) ? absint($lazy_load_data['offset']) : 0;
		$posts_per_page = isset($lazy_load_data['post_count']) ? absint($lazy_load_data['post_count']) : 0;
		$post_template = lekh_blog_template();
		$post_column = lekh_blog_column();
		$lazy_load_args = array(
			'post_type' => 'post',
			'post_status' => 'publish',
			'offset' => $offset,
			'posts_per_page' => $posts_per_page,
		);
		$lazy_load_query = new WP_Query($lazy_load_args);
		if ($lazy_load_query->have_posts()):
			?>
			<div class="lekh-ajax-wraper">
				<?php
				while ($lazy_load_query->have_posts()):
					$lazy_load_query->the_post();
					?>
					<div class="post-wrapper <?php echo esc_attr($post_column); ?>">
						<?php get_template_part('template-parts/post/content', $post_template); ?>
					</div>
					<?php
				endwhile;
				?>
			</div>
			<?php
		endif;
		wp_die();
	}

endif;
add_action('wp_ajax_lazy_load_post', 'lekh_lazy_load_post');
add_action('wp_ajax_nopriv_lazy_load_post', 'lekh_lazy_load_post');