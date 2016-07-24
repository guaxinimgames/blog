<!DOCTYPE html>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"><?php if(!get_option( 'site_icon' )): ?>
  <link href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico" rel="shortcut icon"><?php endif ?><!--[if lt IE 9]>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/html5.js"></script><![endif]-->	
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/html5.js"></script><?php wp_head(); ?><?php $layout = "full"; ?>
</head>
<body <?php body_class(); ?>>
  <script>
var FB_APP_ID = "<?php echo get_field('fb_app_id','options') ?>";

  </script><?php //Template Name: Home ?><a id="skippy" href="#content" class="sr-only sr-only-focusable">
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
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <h1 class="text-center">Últimas Postagens</h1><?php $itens = array();
foreach(get_posts(array('post_type' => 'post', 'numberposts' => 3)) as $key => $value) {
	array_push($itens, (object) array(
		'src' => wp_get_attachment_image_src( get_post_thumbnail_id($value->ID), 'large' )['0'],
		'title' => $value->post_title,
		'href' => get_permalink($value->ID)
		)
	);
}
$slider = array('items' => $itens); ?><?php $slider['options'] = isset($slider['options']) && is_object($slider['options']) ? $slider['options'] : new stdClass;
$slider['options']->id = isset($slider['options']->id)? $slider['options']->id : 'pipa-slider-'.uniqid();
$slider['options']->height = isset($slider['options']->height)? $slider['options']->height : 400;
$slider['options']->interval = isset($slider['options']->interval)? $slider['options']->interval : 5;
$slider['options']->wrap = isset($slider['options']->wrap)? $slider['options']->wrap : true;
$slider['options']->dots = isset($slider['options']->dots)? $slider['options']->dots : true;
$slider['options']->shadow = isset($slider['options']->shadow)? $slider['options']->shadow : true;
$slider['options']->controls = isset($slider['options']->controls)? $slider['options']->controls : true;
$slider['options']->control_class	= isset($slider['options']->control_class)? $slider['options']->control_class : false;
$slider['options']->out_dots	= isset($slider['options']->out_dots)? $slider['options']->out_dots : false;
$slider['options']->out_controls	= isset($slider['options']->out_controls)? $slider['options']->out_controls : false;
$slider['items']	= isset($slider['items'])? $slider['items'] : array();

 ?>
            <div id="slider-<?php echo $slider['options']->id; ?>" data-ride="carousel" data-interval="<?php echo $slider['options']->interval * 1000 ?>" data-wrap="<?php echo $slider['options']->wrap ?>" data-height="<?php echo $slider['options']->height ?>" class="carousel slide <?php echo ($slider['options']->out_dots)? 'out':'' ?>">
              <div role="listbox" class="carousel-inner"><?php foreach($slider['items'] as $key => $value): ?><?php $value = (object) $value;

$src = null;
if(isset($value->src)){
	$src = $value->src;
}
 ?>
                <div data-src="<?php echo $src ?>" class="item <?php echo ($key == 0)? 'active' : '' ?>"><?php if(isset($value->href)): ?><a href="<?php echo $value->href ?>" target="<?php echo isset($value->target)? $value->target : '_self' ?>"></a><?php endif ?>
                  <div style="background-image:<?php echo "url({$src});" ?>" class="slider-size">
                    <div class="carousel-caption"><?php $title = null;
if(isset($value->title)){
	$title = $value->title;
} ?>
                      <h3><?php echo $title;; ?></h3><?php $caption = null;
if(isset($value->sliders_post_format_field_images_repeater_description)){
	$caption = $value->sliders_post_format_field_images_repeater_description;
} else if(isset($value->caption)){
	$caption = $value->caption;
} ?>
                      <p><?php echo $caption;; ?></p>
                    </div>
                  </div>
                </div><?php endforeach ?><?php if($slider['options']->controls && !$slider['options']->out_controls): ?><a href="#slider-<?php echo $slider['options']->id ?>" role="button" data-slide="prev" class="left carousel-control <?php echo ($slider['options']->shadow)? '':'no-shadow' ?> <?php echo ($slider['options']->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left <?php echo ($slider['options']->control_class)? ($slider['options']->control_class . '-left') : ('') ?>"></span><span class="sr-only">Previous</span></a><a href="#slider-<?php echo $slider['options']->id ?>" role="button" data-slide="next" class="right carousel-control <?php echo ($slider['options']->shadow)? '':'no-shadow' ?> <?php echo ($slider['options']->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right <?php echo ($slider['options']->control_class)? ($slider['options']->control_class . '-right') : ('') ?>"></span><span class="sr-only">Next</span></a><?php endif ?>
              </div><?php if($slider['options']->controls && $slider['options']->out_controls): ?><a href="#slider-<?php echo $slider['options']->id ?>" role="button" data-slide="prev" class="left carousel-control <?php echo ($slider['options']->shadow)? '':'no-shadow' ?> <?php echo ($slider['options']->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left <?php echo ($slider['options']->control_class)? ($slider['options']->control_class . '-left') : ('') ?>"></span><span class="sr-only">Previous</span></a><a href="#slider-<?php echo $slider['options']->id ?>" role="button" data-slide="next" class="right carousel-control <?php echo ($slider['options']->shadow)? '':'no-shadow' ?> <?php echo ($slider['options']->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right <?php echo ($slider['options']->control_class)? ($slider['options']->control_class . '-right') : ('') ?>"></span><span class="sr-only">Next</span></a><?php endif ?><?php if($slider['options']->dots && !$slider['options']->out_dots): ?>
                <ol class="carousel-indicators"><?php foreach($slider['items'] as $key=>$value): ?>
                  <li data-target="#slider-<?php echo $slider['options']->id ?>" data-slide-to="<?php echo $key ?>" class="<?php echo ($key == 0)? 'active' : '' ?>"></li><?php endforeach ?>
                </ol><?php endif				 ?><?php if($slider['options']->dots && $slider['options']->out_dots): ?>
                <ol class="carousel-indicators"><?php foreach($slider['items'] as $key=>$value): ?>
                  <li data-target="#slider-<?php echo $slider['options']->id ?>" data-slide-to="<?php echo $key ?>" class="<?php echo ($key == 0)? 'active' : '' ?>"></li><?php endforeach ?>
                </ol><?php endif ?>
            </div><?php $slider = null; ?>
        </div>
      </div>
      <div class="row margin">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 margin">
          <h1 class="text-center no-margin">Categorias</h1><?php $masonry = array() ?><?php foreach(get_categories(array('post_type' => 'post')) as $key => $value): ?><?php $item = new StdClass();
$item->name = $value->name;
$item->href = get_term_link($value->term_id);
$item->src = get_field('category_image', $value);
$item->_class = "img-category";
$item->target = "_self";
array_push($masonry, $item);  ?><?php endforeach ?>
            <div class="masonry margin">
              <div class="grid">
                <div class="grid-sizer col-xs-12 col-sm-4 col-md-4 col-lg-4"></div><?php foreach ($masonry as $item): ?>
                <div class="grid-item col-xs-12 col-sm-4 col-md-4 col-lg-4">
                  <div class="grid-item-content"><a href="<?php echo $item->href ?>"></a><img src="<?php echo $item->src ?>" class="img-responsive <?php echo $item->_class ?>">
                    <h3 class="text-center"><?php echo $item->name; ?></h3>
                  </div>
                </div><?php endforeach ?>
              </div>
            </div><?php $masonry = null; ?>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 margin">
          <div class="content-fluid"><a data-theme="light" data-height="600" href="https://twitter.com/gamesguaxinim" class="twitter-timeline">Tweets by gamesguaxinim</a>
            <script async. src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
          </div>
        </div>
      </div>
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
        <p> &copy; <?php echo date('Y'); ?> <a href="<?php echo home_url(); ?>">Guaxinim Games</a> <?php echo _e( 'All rights reserved', 'odin' ) ?>
        </p>
      </div>
    </div>
  </footer><?php wp_footer(); ?>
</body>