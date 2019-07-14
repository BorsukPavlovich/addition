<?php get_header(); ?>
	<section id="main" style="background: url(<?php the_field( "bg-pattern" ); ?>) bottom right/contain no-repeat, url(<?php the_field( "background" ); ?>) center/cover no-repeat fixed; ">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<header id="masthead" class="site-header">
						<div class="site-branding">
							<?php
							the_custom_logo();
							?>
						</div>

						<nav id="site-navigation" class="main-navigation">
							<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'addition' ); ?></button>
							<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							) );
							?>
						</nav>
					</header>

					<div class="hero row">
						<div class="col-lg-5">
							<h1 class="title"><?php bloginfo( 'name' ); ?></h1>
							<p class="description"><?php echo get_bloginfo( 'description', 'display' ); ?></p>
							<p class="content"><?php $content = apply_filters('the_content', get_post(17)->post_content);
																		echo wp_strip_all_tags( $content, $remove_breaks = false );
																	?>
							</p>
							<a href="#video" class="video-link html5lightbox" title="<?php the_field( "hero_video_title" ); ?>"><i class="fas fa-chevron-circle-right fa-lg"></i> Watch video</a>

							<div id="video">
								<?php the_field( "video" ); ?>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="about">
		<div class="bg" style="background: url(<?php the_field( "about_pattern" ); ?>) bottom left/contain no-repeat, url(<?php the_field( "background_about" ); ?>) center/cover no-repeat fixed; ">
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-6 about-content">
					<h1 class="title"><?php the_field( "about_title" ); ?></h1>
					<p class="description"><?php the_field( "about_description" ); ?></p>
					<img src="<?php the_field( "about_image" ); ?>" alt="copter image" class="image">
				</div>
			</div>
		</div>
	</section>

	<section id="services">
		<div class="bg">
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 services-content">
					<h1 class="title"><?php the_field( "services_title" ); ?></h1>
					<p class="description"><?php the_field( "services_description" ); ?></p>
					<div class="services row">
						<?php
							$args = array(
								'post_type' => 'services'
							);
							$post_query = new WP_Query($args);
							if($post_query->have_posts() ) {
								while($post_query->have_posts() ) {
									$post_query->the_post();
						?>
								<div class="col-md-4 services-item">
									<div class="border">
										<div class="image-wrapper" style="background: url(<?php the_post_thumbnail_url( ); ?>) center/cover no-repeat">

										</div>
										<h2 class="service-tite"><?php the_title(); ?></h2>
										<p class="service-description"><?php remove_filter ('the_content', 'wpautop'); the_content(); ?></p>
									</div>
								</div>

						<?php
								}
							}
							wp_reset_postdata();
						?>
					</div>
				</div>
			</div>
		</div>
		<a href="#contact" class="link"><?php esc_attr_e( 'Get in touch', 'cropsaver' ); ?></a>
	</section>

	<section id="how">
		<div class="container">
			<div class="row">
				<div class="col-md-12 how-content">
					<h1 class="title"><?php the_field( "how_title" ); ?></h1>
					<div class="instructions row">
						<?php
						$args = array(
							'post_type' => 'steps'
						);
						$post_query = new WP_Query($args);
						if($post_query->have_posts() ) {
							while($post_query->have_posts() ) {
								$post_query->the_post();
								?>
								<div class="col-md-4 services-item">
									<div class="border">
										<div class="image-wrapper" style="background: url(<?php the_post_thumbnail_url( ); ?>) center/auto no-repeat">

										</div>
										<h2 class="how-tite"><?php the_title(); ?></h2>
										<p class="how-description"><?php remove_filter ('the_content', 'wpautop'); the_content(); ?></p>
									</div>
								</div>

								<?php
							}
						}

						wp_reset_postdata();
						?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="team">
		<div class="container">
			<div class="row">
				<div class="col-md-12 team-content">
					<h1 class="title"><?php the_field( "team_title" ); ?></h1>
					<div class="team row">
						<?php
						$args = array(
							'post_type' => 'team'
						);
						$post_query = new WP_Query($args);
						if($post_query->have_posts() ) {
							while($post_query->have_posts() ) {
								$post_query->the_post();
								?>
								<div class="col-md-3 team-item">
									<div class="border">
										<div class="limiter">
											<div class="image-wrapper" style="background: url(<?php the_post_thumbnail_url( ); ?>) center/cover no-repeat">

											</div>
										</div>
										<h2 class="team-tite"><?php the_title(); ?></h2>
										<p class="team-description"><?php remove_filter ('the_content', 'wpautop'); the_content(); ?></p>
									</div>
								</div>

								<?php
							}
						}

						wp_reset_postdata();
						?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="awards">
		<div class="container">
			<div class="row">
				<div class="col-md-12 awards-content">
					<h1 class="title"><?php the_field( "awards_title" ); ?></h1>
					<div class="awards row">
						<?php
						$args = array(
							'post_type' => 'awards'
						);
						$post_query = new WP_Query($args);
						if($post_query->have_posts() ) {
							while($post_query->have_posts() ) {
								$post_query->the_post();
								?>
								<div class="col-md-6 awards-item">
									<div class="row flex">
										<div class="col-md-6 part">
											<?php the_post_thumbnail(); ?>
										</div>
										<div class="col-md-6 part">
											<h2 class="awards-tite"><?php the_title(); ?></h2>
										</div>
									</div>
								</div>

								<?php
							}
						}

						wp_reset_postdata();
						?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="contacts" style="background: url(<?php the_field( "contact_pattern" ); ?>) center right/contain no-repeat, url(<?php the_field( "contact_background" ); ?>) center/cover no-repeat fixed; ">
		<div class="container">
			<div class="row">
				<div class="col-md-12 contact-content">

				</div>
			</div>
		</div>
	</section>



	<div id="content" class="site-content">

	<div id="primary" class="content-area aaaaaaa">
		<main id="main" class="site-main">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
