<?php get_header(); ?>
	<section id="main">
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
								echo '<a href="'.post_permalink().'"><h1>';
									the_title();
								echo '</h1></a>';
							endwhile;
							echo '</div>';
						}
					?>
				</div>
			</div>
		</div>
	</section>
<?php
get_footer();
