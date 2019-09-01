<?php get_header(); ?>
	<section id="main" style="background: url(<?php echo get_option('hero_pattern'); ?>) bottom right/contain no-repeat, linear-gradient(to top, rgba(0,0,0,0.5) 0%, rgba(255,255,255,0.23) 100%), url(<?php echo get_option('hero_image'); ?>) center/cover no-repeat fixed; " class="home">
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

					<div class="hero row">
						<div class="col-sm-12 col-md-8 col-lg-6 hero-text">
							<h1 class="title"><?php bloginfo( 'name' ); ?></h1>
							<p class="description"><?php echo get_bloginfo( 'description', 'display' ); ?></p>
							<p class="content"><?php $content = apply_filters('the_content', get_post(17)->post_content);
																		echo wp_strip_all_tags( $content, $remove_breaks = false );
																	?>
							</p>
							<a href="#video" class="video-link html5lightbox" title="<?php the_field( "hero_video_title" ); ?>"><i class="fas fa-chevron-circle-right fa-lg"></i><?php the_field('hero_button'); ?></a>

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
		<div class="bg" style="background: url(<?php the_field( "about_pattern" ); ?>) bottom left/contain no-repeat, linear-gradient(to top, rgba(0,0,0,0.5) 0%, rgba(255,255,255,0.23) 100%), url(<?php the_field( "background_about" ); ?>) center/cover no-repeat fixed; ">
		</div>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-12 offset-xs-0 offset-lg-6 about-content">
					<h1 class="title"><?php the_field( "about_title" ); ?></h1>
					<p class="description"><?php the_field( "about_description" ); ?></p>
					<div class="image-wrapper">
						<img src="<?php the_field( "about_image" ); ?>" alt="copter image" class="image">
					</div>
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
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-4 services-item">
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
		<a href="#contacts" class="link"><?php the_field( 'services_button' ); ?></a>
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
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-4 how-item">
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
					<p class="description"><?php the_field( "team_description" ); ?></p>
					<div class="team row">
						<?php
						$args = array(
							'post_type' => 'team'
						);
						$post_query = new WP_Query($args);
						if($post_query->have_posts() ) {
							while($post_query->have_posts() ) {
								$post_query->the_post();
								$index = $post_query->current_post + 1;
								?>
								<div class="col-sm-6 col-md-4 col-lg-3 team-item">
									<div class="border">
										<div class="limiter">
											<a href="#member<?php echo $index; ?>" class="image-wrapper html5lightbox" style="background: url(<?php the_post_thumbnail_url( ); ?>) center/cover no-repeat">
											</a>

											<i class="fas fa-lg fa-long-arrow-alt-right" onclick="event.target.previousElementSibling.click()"></i>

											<div id="member<?php echo $index; ?>" class="team-popup">
												<div class="popup-wrapper">
													<div class="popup-image col-sm-12  col-md-5 col-12"
															 style="background: url(<?php the_post_thumbnail_url(); ?>) center/cover no-repeat">
														<div class="popup-contacts">
															<?php if (get_field("email")) { ?>
																<a href="mailto:<?php the_field("email") ?>"><i class="fas fa-envelope"></i><?php the_field("email") ?></a>
															<?php } ?>
															<?php if (get_field("phone")) { ?>
																<a href="tel:<?php the_field("phone") ?>"><i class="fas fa-phone-alt"></i><?php the_field("phone") ?></a>
															<?php } ?>
														</div>
													</div>
													<div class="popup-info col-sm-12 col-md-7 col-12">
														<h2 class="popup-name"><?php the_title(); ?></h2>
														<h3 class="popup-position"><?php the_field("position"); ?></h3>
														<p class="popup-description"><?php remove_filter('the_content', 'wpautop');
															the_content(); ?></p>
													</div>
												</div>
											</div>
										</div>
										<h2 class="team-tite"><?php the_title(); ?></h2>
										<p class="team-description"><?php the_field( "position" ); ?></p>
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
								<div class="col-xs-12 col-md-6 awards-item">
									<div class="row flex">
										<div class="col-xs-12 col-md-6 part">
											<?php the_post_thumbnail(); ?>
										</div>
										<div class="col-xs-12 col-md-6 part">
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
					<h1 class="title"><?php the_field( "contact_title" ); ?></h1>
					<?php echo do_shortcode( '[contact-form-7 id="133" title="Contact form 1"]' ); ?>
				</div>
			</div>
		</div>
	</section>
<?php
get_footer();
