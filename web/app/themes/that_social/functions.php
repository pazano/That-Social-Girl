<?php
//////////////////////////////////////////////////////////////////
// Set Content Width
//////////////////////////////////////////////////////////////////
if ( ! isset( $content_width ) )
	$content_width = 1080;

//////////////////////////////////////////////////////////////////
// Theme set up
//////////////////////////////////////////////////////////////////
add_action( 'after_setup_theme', 'solopine_theme_setup' );

if ( !function_exists('solopine_theme_setup') ) {

	function solopine_theme_setup() {

		// Register navigation menu
		register_nav_menus(
			array(
				'main-menu' => 'Primary Menu',
			)
		);

		// Localization support
		load_theme_textdomain('solopine', get_template_directory() . '/lang');

		// Post formats
		add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio' ) );

		// Featured image
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'full-thumb', 1080, 0, true );
		add_image_size( 'square-hero', 700, 540, true);
		add_image_size( 'misc-thumb', 520, 400, true );
		add_image_size( 'gallery-thumb', 300, 0, true );
		add_image_size( 'gallery-scroll', 500, 0, true );

		// Feed Links
		add_theme_support( 'automatic-feed-links' );

	}

}

//////////////////////////////////////////////////////////////////
// Register & enqueue styles/scripts
//////////////////////////////////////////////////////////////////

add_action( 'wp_enqueue_scripts','solopine_load_scripts' );

function solopine_load_scripts() {

	// Register scripts and styles
	wp_register_style('google-fonts', '//fonts.googleapis.com/css?family=Fjalla+One|Open+Sans+Condensed:300|Open+Sans:600,400,300');
	wp_register_style('local_fonts', get_template_directory_uri() . '/css/fonts.css');
	wp_register_style('main-css', get_stylesheet_directory_uri() . '/style.css');
	wp_register_style('reset-css', get_template_directory_uri() . '/css/reset.css');
	wp_register_style('footer-css', get_template_directory_uri() . '/css/footer.css');
	wp_register_style('wp-core-css', get_template_directory_uri() . '/css/wp-core.css');
	wp_register_style('magnific-popup-css', get_template_directory_uri() . '/bower_components/magnific-popup/dist/magnific-popup.css');
	// wp_register_style('slicknav-css', get_template_directory_uri() . '/css/slicknav.css');
	wp_register_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
	wp_register_style('responsive', get_template_directory_uri() . '/css/responsive.css');
	wp_register_script('imagesloaded', get_template_directory_uri() . '/bower_components/imagesloaded/imagesloaded.pkgd.min.js', array('jquery'), '', true);
	wp_register_script('magnific-popup', get_template_directory_uri() . '/bower_components/magnific-popup/dist/jquery.magnific-popup.min.js', array('jquery'), '', true);
	wp_register_script('wookmark', get_template_directory_uri() . '/js/wookmark.js', array('jquery'), '', true);
	wp_register_script('fitvids', get_template_directory_uri() . '/js/fitvids.js', array('jquery'), '', true);
	wp_register_script('initialize', get_template_directory_uri() . '/js/init.js', array('jquery'), '', true);


	// Enqueue scripts and styles
	wp_enqueue_style('google-fonts');
	wp_enqueue_style('local-fonts');
	wp_enqueue_style('reset-css');
	wp_enqueue_style('main-css');
	wp_enqueue_style('footer-css');
	wp_enqueue_style('magnific-popup-css');
	wp_enqueue_style('wp-core-css');
	wp_enqueue_style('font-awesome');

	// JS
	wp_enqueue_script('jquery');
	wp_enqueue_script('imagesloaded');
	wp_enqueue_script('magnific-popup');
	wp_enqueue_script('wookmark');
	wp_enqueue_script('fitvids');
	wp_enqueue_script('initialize');

}


//////////////////////////////////////////////////////////////////
// Include files
//////////////////////////////////////////////////////////////////

// Theme Options
include('functions/customizer/sp_custom_controller.php');
include('functions/customizer/sp_customizer_settings.php');
include('functions/customizer/sp_customizer_style.php');

// Widgets
include("inc/widgets/about_widget.php");
include("inc/widgets/social_widget.php");
include("inc/widgets/post_widget.php");
include("inc/widgets/facebook_widget.php");

//////////////////////////////////////////////////////////////////
// Register footer widgets
//////////////////////////////////////////////////////////////////
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Sidebar',
		'id' => 'sidebar-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'name' => 'Instagram Footer',
		'id' => 'sidebar-2',
		'before_widget' => '<div id="%1$s" class="instagram-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="instagram-title">',
		'after_title' => '</h4>',
		'description' => 'Use the Instagram widget here. IMPORTANT: For best result select "Large" under "Photo Size" and set number of photos to 6.',
	));
}

//////////////////////////////////////////////////////////////////
// PAGINATION
//////////////////////////////////////////////////////////////////
function solopine_pagination() {

	?>

	<div class="pagination">

		<div class="older"><?php next_posts_link(__( 'Older Posts <i class="fa fa-angle-double-right"></i>', 'solopine')); ?></div>
		<div class="newer"><?php previous_posts_link(__( '<i class="fa fa-angle-double-left"></i> Newer Posts', 'solopine')); ?></div>

	</div>

	<?php

}

//////////////////////////////////////////////////////////////////
// AUTHOR SOCIAL LINKS
//////////////////////////////////////////////////////////////////
function solopine_contactmethods( $contactmethods ) {

	$contactmethods['twitter']   = 'Twitter Username';
	$contactmethods['facebook']  = 'Facebook Username';
	$contactmethods['google']    = 'Google Plus Username';
	$contactmethods['tumblr']    = 'Tumblr Username';
	$contactmethods['instagram'] = 'Instagram Username';
	$contactmethods['pinterest'] = 'Pinterest Username';

	return $contactmethods;
}
add_filter('user_contactmethods','solopine_contactmethods',10,1);

//////////////////////////////////////////////////////////////////
// PREVENT SCROLL ON READ MORE LINK
//////////////////////////////////////////////////////////////////
function remove_more_link_scroll( $link ) {
	$link = preg_replace( '|#more-[0-9]+|', '', $link );
	return $link;
}
add_filter( 'the_content_more_link', 'remove_more_link_scroll' );

//////////////////////////////////////////////////////////////////
// EXCLUDE FEATURED CATEGORY
//////////////////////////////////////////////////////////////////

function sp_category($separator) {

	if(get_theme_mod( 'sp_featured_cat_hide' ) == true) {

		$excluded_cat = get_theme_mod('sp_featured_cat');

		$first_time = 1;
		foreach((get_the_category()) as $category) {
			if ($category->cat_ID != $excluded_cat) {
				if ($first_time == 1) {
					echo '<a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s", "solopine" ), $category->name ) . '" ' . '>'  . $category->name.'</a>';
					$first_time = 0;
				} else {
					echo $separator . '<a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s", "solopine" ), $category->name ) . '" ' . '>' . $category->name.'</a>';
				}
			}
		}

	} else {

		$first_time = 1;
		foreach((get_the_category()) as $category) {
			if ($first_time == 1) {
				echo '<a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s", "solopine" ), $category->name ) . '" ' . '>'  . $category->name.'</a>';
				$first_time = 0;
			} else {
				echo $separator . '<a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s", "solopine" ), $category->name ) . '" ' . '>' . $category->name.'</a>';
			}
		}

	}
}

/**
 * From Twentyfourteen
 * @return string The filtered title.
 */
function solopine_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'solopine' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'solopine_wp_title', 10, 2 );

//////////////////////////////////////////////////////////////////
// THE EXCERPT
//////////////////////////////////////////////////////////////////
function custom_excerpt_length( $length ) {
	return 200;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function sp_string_limit_words($string, $word_limit)
{
	$words = explode(' ', $string, ($word_limit + 1));

	if(count($words) > $word_limit) {
		array_pop($words);
	}

	return implode(' ', $words);
}

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package	   TGM-Plugin-Activation
 * @subpackage Example
 * @version	   2.4.1
 * @author	   Thomas Griffin <thomas@thomasgriffinmedia.com>
 * @author	   Gary Jones <gamajo@gamajo.com>
 * @copyright  Copyright (c) 2012, Thomas Griffin
 * @license	   http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function my_theme_register_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin pre-packaged with a theme
		array(
			'name'     				=> 'Vafpress Post Formats UI', // The plugin name
			'slug'     				=> 'vafpress-post-formats-ui-develop', // The plugin slug (typically the folder name)
			'source'   				=> get_stylesheet_directory() . '/plugins/vafpress-post-formats-ui-develop.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> 'WP Instagram Widget', // The plugin name
			'slug'     				=> 'wp-instagram-widget', // The plugin slug (typically the folder name)
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> 'Contact Form 7', // The plugin name
			'slug'     				=> 'contact-form-7', // The plugin slug (typically the folder name)
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		)

	);

	// Change this to your theme text domain, used for internationalising strings
	$theme_text_domain = 'tgmpa';

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'       		=> $theme_text_domain,         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
		'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> __( 'Install Required Plugins', $theme_text_domain ),
			'menu_title'                       			=> __( 'Install Plugins', $theme_text_domain ),
			'installing'                       			=> __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
			'oops'                             			=> __( 'Something went wrong with the plugin API.', $theme_text_domain ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                           			=> __( 'Return to Required Plugins Installer', $theme_text_domain ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', $theme_text_domain ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', $theme_text_domain ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );

}
