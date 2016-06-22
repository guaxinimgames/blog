<!DOCTYPE html>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"><?php if(!get_option( 'site_icon' )): ?>
  <link href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico" rel="shortcut icon"><?php endif ?><!--[if lt IE 9]>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/html5.js"></script><![endif]-->	
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/html5.js"></script><?php wp_head(); ?>
</head>
<body <?php body_class(); ?>><a id="skippy" href="#content" class="sr-only sr-only-focusable">
    <div class="container"><span class="skiplink-text"><?php _e( 'Skip to content', 'odin' ); ?></span></div></a>
  <header id="header" role="banner">
    <div class="container">
      <div class="header-top">
        <div class="col-md-3"></div>
      </div>
      <div class="page-header"><?php odin_the_custom_logo(); ?><?php if(is_home()): ?>
        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"></a><?php bloginfo('name') ?>
        </h1>
        <h2 class="site-description"><?php bloginfo('description') ?>
        </h2><?php else:       ?>
        <div class="site-title h1"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo('name') ?></a></div>
        <div class="site-description h2"><?php bloginfo('description') ?>
        </div><?php endif ?><?php $header_image = get_header_image(); ?><?php if(!empty($header_image)): ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $header_image ); ?>" height="<?php esc_attr_e( $header_image->height ); ?>" width="<?php esc_attr_e( $header_image->width ); ?>" alt=""></a><?php endif ?>
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
  <div id="wrapper" class="container">Sou um portfólio!
  </div>
  <footer id="footer" role="contentinfo">
    <div class="container-fluid">
        <div class="social-block">
          <ul>
            <li class="list-unstyled"><a href="http://www.google.com" target="_blank"><i class="fa fa-twitter"></i></a></li>
            <li class="list-unstyled"><a href="http://www.google.com" target="_blank"><i class="fa fa-facebook"></i></a></li>
            <li class="list-unstyled"><a href="http://www.google.com" target="_blank"><i class="fa fa-pinterest"></i></a></li>
            <li class="list-unstyled"><a href="http://www.google.com" target="_blank"><i class="fa fa-linkedin"></i></a></li>
            <li class="list-unstyled"><a href="http://www.google.com" target="_blank"><i class="fa fa-youtube"></i></a></li>
            <li class="list-unstyled"><a href="http://www.google.com" target="_blank"><i class="fa fa-vimeo"></i></a></li>
            <li class="list-unstyled"><a href="http://www.google.com" target="_blank"><i class="fa fa-instagram"></i></a></li>
          </ul>
        </div>
    </div>
    <div class="container-fluid">
      <div class="menu">
        <?php echo wp_nav_menu(
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