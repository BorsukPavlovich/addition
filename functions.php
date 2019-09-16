<?php
/**
 * addition functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package addition
 */

if ( ! function_exists( 'addition_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function addition_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on addition, use a find and replace
		 * to change 'addition' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'addition', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'addition' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'addition_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'addition_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function addition_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'addition_content_width', 640 );
}
add_action( 'after_setup_theme', 'addition_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function addition_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'addition' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'addition' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'addition_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function addition_scripts() {
	wp_enqueue_style( 'reset', get_template_directory_uri() . '/lib/reset.css' );

	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/lib/fontawesome/css/all.min.css' );

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/lib/bootstrap.min.css' );

	wp_enqueue_style( 'lightbox', get_template_directory_uri() . '/lib/html5lightbox/icons/css/fontello.css' );

	wp_enqueue_style( 'main-style', get_stylesheet_uri() );

	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/lib/html5lightbox/jquery.js' );

	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/lib/bootstrap.min.js' );

	wp_enqueue_script( 'lightbox', get_template_directory_uri() . '/lib/html5lightbox/html5lightbox.js' );

	wp_enqueue_script( 'smoothscroll', get_template_directory_uri() . '/js/smoothscroll.js' );

	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js' );

	wp_enqueue_script( 'addition-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'addition-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'addition_scripts' );

// Our custom post type function
function create_team() {

	register_post_type( 'team',
		// CPT Options
		array(
			'labels' => array(
				'name' => __( 'Team' ),
				'singular_name' => __( 'Member' )
			),
			'menu_position' => 4,
			'menu_icon' => 'dashicons-businessperson',
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'team'),
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
				'custom-fields'
			)
		)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_team' );

function create_services() {

	register_post_type( 'services',
		// CPT Options
		array(
			'labels' => array(
				'name' => __( 'Services' ),
				'singular_name' => __( 'Service' )
			),
			'menu_position' => 5,
			'menu_icon' => 'dashicons-admin-tools',
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'services'),
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
				'custom-fields'
			)
		)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_services' );

function create_steps() {

	register_post_type( 'steps',
		// CPT Options
		array(
			'labels' => array(
				'name' => __( 'Steps' ),
				'singular_name' => __( 'Step' )
			),
			'menu_position' => 6,
			'menu_icon' => 'dashicons-clipboard',
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'steps'),
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
				'custom-fields'
			)
		)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_steps' );

function create_awards() {

	register_post_type( 'awards',
		// CPT Options
		array(
			'labels' => array(
				'name' => __( 'Awards' ),
				'singular_name' => __( 'Award' )
			),
			'menu_position' => 7,
			'menu_icon' => 'dashicons-welcome-learn-more',
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'awards'),
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
				'custom-fields'
			)
		)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_awards' );

remove_action('load-update-core.php','wp_update_plugins');
add_filter('pre_site_transient_update_plugins','__return_null');

add_filter('use_block_editor_for_post', '__return_false', 10);

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

//Custom Theme Settings
add_action('admin_menu', 'add_gcf_interface');

function add_gcf_interface() {
	add_options_page('Global Custom Fields', 'Global Custom Fields', '8', 'functions', 'editglobalcustomfields');
}

function editglobalcustomfields() {
	?>
	<div class='wrap'>
		<h2>Global Fields</h2>
		<form method="post" action="options.php">
			<?php wp_nonce_field('update-options') ?>

			<p><strong>Hero image</strong><br />
				<input type="text" name="hero_image" size="45" value="<?php echo get_option('hero_image'); ?>" placeholder="<?php echo get_option('hero_image'); ?>" />

			</p><p><strong>Hero pattern</strong><br />
				<input type="text" name="hero_pattern" size="45" value="<?php echo get_option('hero_pattern'); ?>" placeholder="<?php echo get_option('hero_pattern'); ?>" /></p>

			<p><strong>Footer logo</strong><br />
				<input type="text" name="footer_logo" size="45" value="<?php echo get_option('footer_logo'); ?>" placeholder="<?php echo get_option('footer_logo'); ?>" /></p>

			<p><strong>Copyright:</strong><br />
				<input type="text" name="copyright" size="45" value="<?php echo get_option('copyright'); ?>" placeholder="<?php echo get_option('copyright'); ?>"/></p>

			<p><input type="submit" name="Submit" value="Update Options" /></p>

			<input type="hidden" name="action" value="update" />
			<input type="hidden" name="page_options" value="footer_logo,copyright,hero_image,hero_pattern" />

		</form>
	</div>
	<?php
}


function my_theme_archive_title( $title ) {
	if ( is_month() ) {
		/* translators: Monthly archive title. %s: Month name and year */
		$title = sprintf(__('Month: %s'),__(get_the_date('F')).' '.__(get_the_date('Y')));
	}

	return $title;
}

add_filter( 'get_the_archive_title', 'my_theme_archive_title' );


