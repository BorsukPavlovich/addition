<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package addition
 */

get_header();
?>
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

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">
				<div class="row">
					<div class="col-md-12 post">
						<?php
							while ( have_posts() ) :
								the_post();

								get_template_part( 'template-parts/content', get_post_type() );

								the_post_navigation();


							endwhile; // End of the loop.
						?>
					</div>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
