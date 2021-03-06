<?php global $default_colorscheme, $shortname, $category_menu, $exclude_pages, $exclude_cats, $hide, $strdepth, $strdepth2, $page_menu; ?>
<?php $colorSchemePath = '';
	  $colorScheme = get_option($shortname . '_color_scheme');
      if ($colorScheme <> $default_colorscheme) $colorSchemePath = strtolower($colorScheme) . '/'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<?php elegant_description(); ?>
<?php elegant_keywords(); ?>
<?php elegant_canonical(); ?>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<!--[if lt IE 7]>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie6style.css" />
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/DD_belatedPNG_0.0.8a-min.js"></script>
	<script type="text/javascript">DD_belatedPNG.fix('img#logo, #cat-nav-left, #cat-nav-right, #search-form, #cat-nav-content, div.top-overlay, .slide .description, div.overlay, a#prevlink, a#nextlink, .slide a.readmore, .slide a.readmore span, .recent-cat .entry .title, #recent-posts .entry p.date, .footer-widget ul li, #tabbed-area ul#tab_controls li span');</script>
<![endif]-->
<!--[if IE 7]>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie7style.css" />
<![endif]-->
<!--[if IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie8style.css" />
<![endif]-->

<script type="text/javascript">
	document.documentElement.className = 'js';
</script>

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>

</head>
<body<?php if (is_home()) echo(' id="home"'); ?> <?php body_class(); ?>>
	<div id="header-top" class="clearfix">
		<div class="container clearfix">
			<!-- Start Logo -->
			<?php  $colorFolder = '';
			if ( $colorScheme == 'Light' || $colorScheme == 'Red' || $colorScheme == 'Blue') $colorFolder = $colorSchemePath; ?>

			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php $logo = (get_option('thesource_logo') <> '') ? get_option('thesource_logo') : get_template_directory_uri().'/images/'.$colorFolder.'logo.png'; ?>
				<img src="<?php echo esc_attr( $logo ); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" id="logo"/>
			</a>
			<p id="slogan"><?php bloginfo('description'); ?></p>
			<!-- End Logo -->

			<!-- Start Page-menu -->
			<div id="page-menu">
				<div id="p-menu-left"> </div>
				<div id="p-menu-content">

					<?php $menuClass = 'nav clearfix';
					$primaryNav = '';

					if (function_exists('wp_nav_menu')) $primaryNav = wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => '', 'fallback_cb' => '', 'menu_class' => $menuClass, 'echo' => false ) );
					if ($primaryNav == '') show_page_menu($menuClass);
					else echo($primaryNav); ?>

				</div>
				<div id="p-menu-right"> </div>
			</div>	<!-- end #page-menu -->
			<!-- End Page-menu -->

			<div id="cat-nav" class="clearfix">
				<div id="cat-nav-left"> </div>
				<div id="cat-nav-content">

					<?php $menuClass = 'superfish nav clearfix';
					$secondaryNav = '';

					if (function_exists('wp_nav_menu')) $secondaryNav = wp_nav_menu( array( 'theme_location' => 'secondary-menu', 'container' => '', 'fallback_cb' => '', 'menu_class' => $menuClass, 'echo' => false ) );
					if ($secondaryNav == '') show_categories_menu($menuClass);
					else echo($secondaryNav); ?>

					<!-- Start Searchbox -->
					<div id="search-form">
						<form method="get" id="searchform1" action="<?php echo esc_url( home_url( '/' ) ); ?>">
							<input type="text" value="<?php esc_attr_e('search...','TheSource'); ?>" name="s" id="searchinput" />

							<input type="image" src="<?php echo get_template_directory_uri(); ?>/images/<?php echo esc_attr($colorSchemePath); ?>search_btn.png" id="searchsubmit" />
						</form>
					</div>
				<!-- End Searchbox -->
				</div> <!-- end #cat-nav-content -->
				<div id="cat-nav-right"> </div>
			</div>	<!-- end #cat-nav -->
		</div> 	<!-- end .container -->
	</div> 	<!-- end #header-top -->



	<?php if ( (is_home() || is_front_page()) && get_option('thesource_featured') == 'on' ) get_template_part('includes/featured'); ?>

	<div id="content">
		<?php if (!is_home()) { ?>
			<div id="content-top-shadow"></div>
		<?php }; ?>
		<div class="container">