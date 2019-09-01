<?php get_header(); ?>
	<section id="main" class="blog" style="background: url(<?php echo get_option('hero_pattern'); ?>) bottom right/contain no-repeat, linear-gradient(to top, rgba(0,0,0,0.5) 0%, rgba(255,255,255,0.23) 100%), url(<?php echo get_option('hero_image'); ?>) center/cover no-repeat fixed; ">
		<div class="container blog">
			<div class="row">
				<div class="col-md-12">
					<header id="masthead" class="site-header">
						<div class="site-branding">
							<?php
							the_custom_logo();
							?>
						</div>

						<nav id="site-navigation" class="main-navigation">
							<div class="menu-toggle"><?php esc_html_e( 'Primary Menu', 'addition' ); ?></div>
							<div class="toggle"><span class="center"></span></div>
							<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							) );
							?>
						</nav>
					</header>

					<h1 class="blog-title"><?php echo get_the_title(); ?></h1>
				</div>
			</div>
		</div>
	</section>

	<section class="post-tabs">
		<div class="container blog">
			<div class="row">
				<div class="col-md-12">
					<?php
					$active = '';
					echo '<ul class="nav nav-tabs" role="tablist">';
					$args = array(
						'hide_empty'=> 1,
						'orderby' => 'name',
						'order' => 'ASC',
						'exclude' => '1'
					);
					$categories = get_categories($args);
					foreach($categories as $key=>$category) {
						if ($key + 1 == 1) {
							$active = 'active';
						} else {
							$active = '';
						}
						echo '<li class="nav-item"><a href="#'.$category->slug.'" role="tab" data-toggle="tab" class="nav-link '.$active.'">'.$category->name.'</a></li>';
					}
					echo '</ul>';

					echo '<div class="tab-content">';
					foreach($categories as $key=>$category) {
						if ($key + 1 == 1) {
							$active = ' show active';
						} else {
							$active = '';
						}
						echo '<div class="tab-pane fade'.$active.'" role="tabpanel" id="' . $category->slug.'">';
						$the_query = new WP_Query(array(
							'posts_per_page' => 100,
							'category_name' => $category->slug
						));

						while ( $the_query->have_posts() ) :
							$the_query->the_post();
						?>
							<a href="<?php echo post_permalink(); ?>">
								<div class="image-wrapper">
									<div class="image" style="background-image: url(<?php the_post_thumbnail_url( ); ?>)"></div>
								</div>

								<div class="content-wrapper">
									<h1><?php the_title(); ?></h1>

									<p><?php $content = get_the_content();
										$content = strip_tags($content);
										echo substr($content, 0, 285).' ...'; ?></p>
									<p class="date"><?php echo get_post_time('l F j, Y', TRUE, get_the_ID(), TRUE); ?></p>
								</div>
							</a>

						<?php endwhile;
						echo '</div>';
					}
					?>
				</div>
			</div>
		</div>
	</section>
<?php
get_footer();
