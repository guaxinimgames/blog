<!DOCTYPE html>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"><?php if(!get_option( 'site_icon' )): ?>
  <link href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico" rel="shortcut icon"><?php endif ?><!--[if lt IE 9]>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/html5.js"></script><![endif]-->	
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/html5.js"></script><?php wp_head(); ?><?php $layout = "sidebar"; ?>
</head>
<body <?php body_class(); ?>>
  <script>
var FB_APP_ID = "<?php echo get_field('fb_app_id','options') ?>";

  </script><a id="skippy" href="#content" class="sr-only sr-only-focusable">
    <div class="container"><span class="skiplink-text"><?php _e( 'Skip to content', 'odin' ); ?></span></div></a>
  <header id="header" role="banner">
    <div class="container">
      <div class="header-top">
        <div class="col-md-3"></div>
      </div>
      <div class="page-header"><?php odin_the_custom_logo(); ?><?php $header_image = get_header_image(); ?><?php if(!empty($header_image)): ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="background-image:url(<?php echo esc_url( $header_image ); ?>)" class="text-center"></a><?php endif ?>
      </div>
      <div id="main-navigation" class="navbar navbar-default">
        <div class="navbar-header">
          <button type="button" data-toggle="collapse" data-target=".navbar-main-navigation" class="navbar-toggle"><span class="sr-only"><?php _e( 'Toggle navigation', 'odin' ); ?></span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" class="navbar-brand visible-xs-block"></a>
        </div>
        <nav role="navigation" class="collapse navbar-collapse navbar-main-navigation"><?php wp_nav_menu(array('theme_location' => 'main-menu','depth' => 2,'container' => false,'menu_class' => 'nav navbar-nav','fallback_cb' => 'Odin_Bootstrap_Nav_Walker::fallback','walker' => new Odin_Bootstrap_Nav_Walker())); ?>
            <form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search" class="navbar-form navbar-right">
              <label for="navbar-search" class="sr-only"><?php _e( 'Search:', 'odin' ); ?>
              </label>
              <div class="form-group">
                <input id="navbar-search" type="search" value="<?php echo get_search_query(); ?>" name="s" placeholder="<?php echo _e( 'Search', 'odin' ); ?>" class="form-control">
              </div>
              <button type="submit" title="<?php echo _e( 'Search', 'odin' ) ?>" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
            </form>
        </nav>
      </div>
    </div>
  </header>
  <div id="wrapper" class="container"><?php switch($layout){
	case "full":
		$_class = odin_classes_page_full();
		break;
	case "sidebar":
		$_class = odin_classes_page_sidebar();
		break;
} ?>
    <main id="content" tabindex="-1" role="main" class="<?php echo $_class; ?>">
      <main id="content" tabindex="-1" role="main" class="<?php echo odin_classes_page_full(); ?>">
        <header id="page-header">
          <h1 class="page-title"> <?php _e( 'Not Found', 'odin' ); ?>
          </h1>
        </header>
        <div class="page-content">
          <p> <?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'odin' ); ?>
          </p>
            <form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search" class="navbar-form">
              <label for="navbar-search" class="sr-only"><?php _e( 'Search:', 'odin' ); ?>
              </label>
              <div class="form-group">
                <input id="navbar-search" type="search" value="<?php echo get_search_query(); ?>" name="s" placeholder="<?php echo _e( 'Search', 'odin' ); ?>" class="form-control">
              </div>
              <button type="submit" title="<?php echo _e( 'Search', 'odin' ) ?>" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
            </form>
        </div>
      </main>
    </main><?php if($layout == "sidebar"): ?>
    <div class="hidden-xs hidden-sm"><?php get_sidebar(); ?>
    </div><?php endif ?>
  </div>
  <footer id="footer" role="contentinfo">
    <div class="container-fluid"><?php $socials = get_field('socials', 'options'); ?><?php if(isset($socials) && is_array($socials)): ?>
        <div class="social-block">
          <ul><?php foreach($socials as $social): ?>
            <li class="list-unstyled"><a href="<?php echo $social['url'] ?>" target="_blank"><i class="fa fa-<?php echo $social['name'] ?>"></i></a></li><?php endforeach ?>
          </ul>
        </div><?php endif ?><?php $socials = null; ?>
    </div>
    <div class="container-fluid">
      <div class="menu"><?php echo wp_nav_menu(
	array(
		'theme_location' => 'main-menu',
		'depth' => 2,
		'container' => false,
		'menu_class' => 'nav navbar-nav center',
		'fallback_cb' => 'Odin_Bootstrap_Nav_Walker::fallback',
		'walker' => new Odin_Bootstrap_Nav_Walker()
	)
); ?>
      </div>
      <div>
        <p> &copy; <?php echo date('Y'); ?> <a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ) ?></a> <?php echo _e( 'All rights reserved', 'odin' ) . " | " . sprintf( __( 'Powered by the <a href="%s" rel="nofollow" target="_blank">Odin</a> forces and <a href="%s" rel="nofollow" target="_blank">WordPress</a>.', 'odin' ), 'http://wpod.in/', 'http://wordpress.org/' );  ?>
        </p>
      </div>
    </div>
  </footer><?php wp_footer(); ?>
</body>