<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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

					<?php
					the_archive_title( '<h1 class="blog-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</div>
			</div>
		</div>
	</section>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">
				<div class="row archive-wrapper">
					<?php get_sidebar(); ?>

					<div class="col-sm-8 category">
						<?php if ( have_posts() ) : ?>
							<?php
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								/*
                 * Include the Post-Type-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                 */
								get_template_part( 'template-parts/content', get_post_type() );

							endwhile;

							the_posts_navigation();

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif;
						?>
					</div>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
