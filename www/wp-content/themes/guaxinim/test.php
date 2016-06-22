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
<body <?php body_class(); ?>><?php //Template Name: Teste ?><a id="skippy" href="#content" class="sr-only sr-only-focusable">
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
  <?php 
  			$items = array(
  				(object) array(
  					"src" => get_template_directory_uri() . "/assets/images/remove_this/ramona1.jpg",
  					"href" => "http://www.google.com",
  					"target" => "_blank",
  					"title" => "Sexy!",
  					"caption" => "Wow, such <b>Amazing</b>!"
  				),
  				(object) array(
  					"src" => get_template_directory_uri() . "/assets/images/remove_this/ramona2.jpg",
  					"title" => "Cute!",
  					"caption" => "<i class=\"fa fa-heart\"></i> <i class=\"fa fa-bomb\"></i> <i class=\"fa fa-heartbeat\"></i>"
  				),
  				(object) array(
  					"src" => get_template_directory_uri() . "/assets/images/remove_this/ramona3.jpg",
  					"title" => "Amazing!",
  					"caption" => "Such <em>Beautiful</em>, Wow!"
  				),
  				(object) array(
  					"src" => get_template_directory_uri() . "/assets/images/remove_this/ramona4.jpg",
  					"title" => "Fabulous!"
  				),
  				(object) array(
  					"src" => get_template_directory_uri() . "/assets/images/remove_this/ramona5.jpg",
  					"caption" => "Outstanding!"
  				),
  				(object) array(
  					"src" => get_template_directory_uri() . "/assets/images/remove_this/ramona6.jpg"
  				)
  	); ?>
  <?php
  		$options = (object) array(
  					"out"=> true,
  					"height"=> 400,
  					"controls"=> false
  		); ?><?php 
    	$options = (object) array(
    		'height' => isset($options->height)? $options->height : false,
    		'interval' => isset($options->interval)? $options->interval : 5000,
    		'wrap' => isset($options->wrap)? $options->wrap : true,
    		'dots' => isset($options->dots)? $options->dots : true,
    		'shadow' => isset($options->shadow)? $options->shadow : true,
    		'controls' => isset($options->controls)? $options->controls : true,
    		'control_class'	=> isset($options->control_class)? $options->control_class : false,
    		'out_dots'	=> isset($options->out_dots)? $options->out_dots : false,
    		'out_controls'	=> isset($options->out_controls)? $options->out_controls : false,
    	); ?><?php if(isset($items) && sizeof($items) > 0): ?>
    <div id="carousel-0" data-ride="carousel" data-interval="<?php echo $options->interval ?>" data-wrap="<?php echo $options->wrap ?>" class="carousel slide <?php echo ($options->out_dots)? 'out':'' ?>">
      <div role="listbox" class="carousel-inner"><?php foreach($items as $key=>$value): ?>
        <div class="item <?php echo ($key == 0)? 'active' : '' ?>"><?php if(isset($value->href)): ?><a href="<?php echo $value->href ?>" target="<?php echo isset($value->target)? $value->target : '_blank' ?>"></a><?php endif					 ?>
          <div style="background-image:<?php echo "url({$value->src})" ?><?php echo ($options->height)? "; height:{$options->height}px":""  ?>" class="slider-size">
            <div class="carousel-caption"> 
              <h3><?php echo (isset($value->title)? $value->title : '&nbsp;' ) ?> </h3>
              <p><?php echo (isset($value->caption)? $value->caption : '&nbsp;' ) ?></p>
            </div>
          </div>
        </div><?php endforeach				 ?><?php if($options->controls && !$options->out_controls): ?><a href="#carousel-0" role="button" data-slide="prev" class="left carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-left') : ('') ?>"></span><span class="sr-only">Previous</span></a><a href="#carousel-0" role="button" data-slide="next" class="right carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-right') : ('') ?>"></span><span class="sr-only">Next</span></a><?php endif ?>
      </div><?php if($options->controls && $options->out_controls): ?><a href="#carousel-0" role="button" data-slide="prev" class="left carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-left') : ('') ?>"></span><span class="sr-only">Previous</span></a><a href="#carousel-0" role="button" data-slide="next" class="right carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-right') : ('') ?>"></span><span class="sr-only">Next</span></a><?php endif ?><?php if($options->dots && !$options->out_dots): ?>
        <ol class="carousel-indicators"><?php foreach($items as $key=>$value): ?>
          <li data-target="#carousel-0" data-slide-to="<?php echo $key ?>" class="<?php echo ($key == 0)? 'active' : '' ?>"></li><?php endforeach ?>
        </ol><?php endif				 ?><?php if($options->dots && $options->out_dots): ?>
        <ol class="carousel-indicators"><?php foreach($items as $key=>$value): ?>
          <li data-target="#carousel-0" data-slide-to="<?php echo $key ?>" class="<?php echo ($key == 0)? 'active' : '' ?>"></li><?php endforeach ?>
        </ol><?php endif ?>
    </div><?php endif ?><?php $options = null; ?>
  <div id="wrapper" class="container">
    <main id="content" tabindex="-1" role="main" class="<?php echo odin_classes_page_full(); ?>">
      <div class="container-fluid">
        <div class="row">
          <div class="row">
            <div class="col-md-12">
              <h1 class="text-center">Slider</h1>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="carousel-container">
                <h2 class="text-center">Default</h2><?php 
                  	$options = (object) array(
                  		'height' => isset($options->height)? $options->height : false,
                  		'interval' => isset($options->interval)? $options->interval : 5000,
                  		'wrap' => isset($options->wrap)? $options->wrap : true,
                  		'dots' => isset($options->dots)? $options->dots : true,
                  		'shadow' => isset($options->shadow)? $options->shadow : true,
                  		'controls' => isset($options->controls)? $options->controls : true,
                  		'control_class'	=> isset($options->control_class)? $options->control_class : false,
                  		'out_dots'	=> isset($options->out_dots)? $options->out_dots : false,
                  		'out_controls'	=> isset($options->out_controls)? $options->out_controls : false,
                  	); ?><?php if(isset($items) && sizeof($items) > 0): ?>
                  <div id="carousel-1" data-ride="carousel" data-interval="<?php echo $options->interval ?>" data-wrap="<?php echo $options->wrap ?>" class="carousel slide <?php echo ($options->out_dots)? 'out':'' ?>">
                    <div role="listbox" class="carousel-inner"><?php foreach($items as $key=>$value): ?>
                      <div class="item <?php echo ($key == 0)? 'active' : '' ?>"><?php if(isset($value->href)): ?><a href="<?php echo $value->href ?>" target="<?php echo isset($value->target)? $value->target : '_blank' ?>"></a><?php endif					 ?>
                        <div style="background-image:<?php echo "url({$value->src})" ?><?php echo ($options->height)? "; height:{$options->height}px":""  ?>" class="slider-size">
                          <div class="carousel-caption"> 
                            <h3><?php echo (isset($value->title)? $value->title : '&nbsp;' ) ?> </h3>
                            <p><?php echo (isset($value->caption)? $value->caption : '&nbsp;' ) ?></p>
                          </div>
                        </div>
                      </div><?php endforeach				 ?><?php if($options->controls && !$options->out_controls): ?><a href="#carousel-1" role="button" data-slide="prev" class="left carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-left') : ('') ?>"></span><span class="sr-only">Previous</span></a><a href="#carousel-1" role="button" data-slide="next" class="right carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-right') : ('') ?>"></span><span class="sr-only">Next</span></a><?php endif ?>
                    </div><?php if($options->controls && $options->out_controls): ?><a href="#carousel-1" role="button" data-slide="prev" class="left carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-left') : ('') ?>"></span><span class="sr-only">Previous</span></a><a href="#carousel-1" role="button" data-slide="next" class="right carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-right') : ('') ?>"></span><span class="sr-only">Next</span></a><?php endif ?><?php if($options->dots && !$options->out_dots): ?>
                      <ol class="carousel-indicators"><?php foreach($items as $key=>$value): ?>
                        <li data-target="#carousel-1" data-slide-to="<?php echo $key ?>" class="<?php echo ($key == 0)? 'active' : '' ?>"></li><?php endforeach ?>
                      </ol><?php endif				 ?><?php if($options->dots && $options->out_dots): ?>
                      <ol class="carousel-indicators"><?php foreach($items as $key=>$value): ?>
                        <li data-target="#carousel-1" data-slide-to="<?php echo $key ?>" class="<?php echo ($key == 0)? 'active' : '' ?>"></li><?php endforeach ?>
                      </ol><?php endif ?>
                  </div><?php endif ?><?php $options = null; ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="carousel-container">
                <h2 class="text-center">Custom Height</h2><?php
                		$options = (object) array(
                					"height"=> 600,
                		); ?>
                <pre><?php var_dump($options); ?></pre><?php 
                  	$options = (object) array(
                  		'height' => isset($options->height)? $options->height : false,
                  		'interval' => isset($options->interval)? $options->interval : 5000,
                  		'wrap' => isset($options->wrap)? $options->wrap : true,
                  		'dots' => isset($options->dots)? $options->dots : true,
                  		'shadow' => isset($options->shadow)? $options->shadow : true,
                  		'controls' => isset($options->controls)? $options->controls : true,
                  		'control_class'	=> isset($options->control_class)? $options->control_class : false,
                  		'out_dots'	=> isset($options->out_dots)? $options->out_dots : false,
                  		'out_controls'	=> isset($options->out_controls)? $options->out_controls : false,
                  	); ?><?php if(isset($items) && sizeof($items) > 0): ?>
                  <div id="carousel-2" data-ride="carousel" data-interval="<?php echo $options->interval ?>" data-wrap="<?php echo $options->wrap ?>" class="carousel slide <?php echo ($options->out_dots)? 'out':'' ?>">
                    <div role="listbox" class="carousel-inner"><?php foreach($items as $key=>$value): ?>
                      <div class="item <?php echo ($key == 0)? 'active' : '' ?>"><?php if(isset($value->href)): ?><a href="<?php echo $value->href ?>" target="<?php echo isset($value->target)? $value->target : '_blank' ?>"></a><?php endif					 ?>
                        <div style="background-image:<?php echo "url({$value->src})" ?><?php echo ($options->height)? "; height:{$options->height}px":""  ?>" class="slider-size">
                          <div class="carousel-caption"> 
                            <h3><?php echo (isset($value->title)? $value->title : '&nbsp;' ) ?> </h3>
                            <p><?php echo (isset($value->caption)? $value->caption : '&nbsp;' ) ?></p>
                          </div>
                        </div>
                      </div><?php endforeach				 ?><?php if($options->controls && !$options->out_controls): ?><a href="#carousel-2" role="button" data-slide="prev" class="left carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-left') : ('') ?>"></span><span class="sr-only">Previous</span></a><a href="#carousel-2" role="button" data-slide="next" class="right carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-right') : ('') ?>"></span><span class="sr-only">Next</span></a><?php endif ?>
                    </div><?php if($options->controls && $options->out_controls): ?><a href="#carousel-2" role="button" data-slide="prev" class="left carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-left') : ('') ?>"></span><span class="sr-only">Previous</span></a><a href="#carousel-2" role="button" data-slide="next" class="right carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-right') : ('') ?>"></span><span class="sr-only">Next</span></a><?php endif ?><?php if($options->dots && !$options->out_dots): ?>
                      <ol class="carousel-indicators"><?php foreach($items as $key=>$value): ?>
                        <li data-target="#carousel-2" data-slide-to="<?php echo $key ?>" class="<?php echo ($key == 0)? 'active' : '' ?>"></li><?php endforeach ?>
                      </ol><?php endif				 ?><?php if($options->dots && $options->out_dots): ?>
                      <ol class="carousel-indicators"><?php foreach($items as $key=>$value): ?>
                        <li data-target="#carousel-2" data-slide-to="<?php echo $key ?>" class="<?php echo ($key == 0)? 'active' : '' ?>"></li><?php endforeach ?>
                      </ol><?php endif ?>
                  </div><?php endif ?><?php $options = null; ?>
              </div>
            </div>
            <div class="col-md-6">
              <div class="carousel-container">
                <h2 class="text-center">No shadow</h2><?php
                		$options = (object) array(
                					"shadow"=> false,
                		); ?>
                <pre><?php var_dump($options); ?></pre><?php 
                  	$options = (object) array(
                  		'height' => isset($options->height)? $options->height : false,
                  		'interval' => isset($options->interval)? $options->interval : 5000,
                  		'wrap' => isset($options->wrap)? $options->wrap : true,
                  		'dots' => isset($options->dots)? $options->dots : true,
                  		'shadow' => isset($options->shadow)? $options->shadow : true,
                  		'controls' => isset($options->controls)? $options->controls : true,
                  		'control_class'	=> isset($options->control_class)? $options->control_class : false,
                  		'out_dots'	=> isset($options->out_dots)? $options->out_dots : false,
                  		'out_controls'	=> isset($options->out_controls)? $options->out_controls : false,
                  	); ?><?php if(isset($items) && sizeof($items) > 0): ?>
                  <div id="carousel-3" data-ride="carousel" data-interval="<?php echo $options->interval ?>" data-wrap="<?php echo $options->wrap ?>" class="carousel slide <?php echo ($options->out_dots)? 'out':'' ?>">
                    <div role="listbox" class="carousel-inner"><?php foreach($items as $key=>$value): ?>
                      <div class="item <?php echo ($key == 0)? 'active' : '' ?>"><?php if(isset($value->href)): ?><a href="<?php echo $value->href ?>" target="<?php echo isset($value->target)? $value->target : '_blank' ?>"></a><?php endif					 ?>
                        <div style="background-image:<?php echo "url({$value->src})" ?><?php echo ($options->height)? "; height:{$options->height}px":""  ?>" class="slider-size">
                          <div class="carousel-caption"> 
                            <h3><?php echo (isset($value->title)? $value->title : '&nbsp;' ) ?> </h3>
                            <p><?php echo (isset($value->caption)? $value->caption : '&nbsp;' ) ?></p>
                          </div>
                        </div>
                      </div><?php endforeach				 ?><?php if($options->controls && !$options->out_controls): ?><a href="#carousel-3" role="button" data-slide="prev" class="left carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-left') : ('') ?>"></span><span class="sr-only">Previous</span></a><a href="#carousel-3" role="button" data-slide="next" class="right carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-right') : ('') ?>"></span><span class="sr-only">Next</span></a><?php endif ?>
                    </div><?php if($options->controls && $options->out_controls): ?><a href="#carousel-3" role="button" data-slide="prev" class="left carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-left') : ('') ?>"></span><span class="sr-only">Previous</span></a><a href="#carousel-3" role="button" data-slide="next" class="right carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-right') : ('') ?>"></span><span class="sr-only">Next</span></a><?php endif ?><?php if($options->dots && !$options->out_dots): ?>
                      <ol class="carousel-indicators"><?php foreach($items as $key=>$value): ?>
                        <li data-target="#carousel-3" data-slide-to="<?php echo $key ?>" class="<?php echo ($key == 0)? 'active' : '' ?>"></li><?php endforeach ?>
                      </ol><?php endif				 ?><?php if($options->dots && $options->out_dots): ?>
                      <ol class="carousel-indicators"><?php foreach($items as $key=>$value): ?>
                        <li data-target="#carousel-3" data-slide-to="<?php echo $key ?>" class="<?php echo ($key == 0)? 'active' : '' ?>"></li><?php endforeach ?>
                      </ol><?php endif ?>
                  </div><?php endif ?><?php $options = null; ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="carousel-container">
                <h2 class="text-center">Font Awesome arrow</h2><?php
                		$options = (object) array(
                					"control_class"=> "caret",
                		); ?>
                <pre><?php var_dump($options); ?></pre><?php 
                  	$options = (object) array(
                  		'height' => isset($options->height)? $options->height : false,
                  		'interval' => isset($options->interval)? $options->interval : 5000,
                  		'wrap' => isset($options->wrap)? $options->wrap : true,
                  		'dots' => isset($options->dots)? $options->dots : true,
                  		'shadow' => isset($options->shadow)? $options->shadow : true,
                  		'controls' => isset($options->controls)? $options->controls : true,
                  		'control_class'	=> isset($options->control_class)? $options->control_class : false,
                  		'out_dots'	=> isset($options->out_dots)? $options->out_dots : false,
                  		'out_controls'	=> isset($options->out_controls)? $options->out_controls : false,
                  	); ?><?php if(isset($items) && sizeof($items) > 0): ?>
                  <div id="carousel-4" data-ride="carousel" data-interval="<?php echo $options->interval ?>" data-wrap="<?php echo $options->wrap ?>" class="carousel slide <?php echo ($options->out_dots)? 'out':'' ?>">
                    <div role="listbox" class="carousel-inner"><?php foreach($items as $key=>$value): ?>
                      <div class="item <?php echo ($key == 0)? 'active' : '' ?>"><?php if(isset($value->href)): ?><a href="<?php echo $value->href ?>" target="<?php echo isset($value->target)? $value->target : '_blank' ?>"></a><?php endif					 ?>
                        <div style="background-image:<?php echo "url({$value->src})" ?><?php echo ($options->height)? "; height:{$options->height}px":""  ?>" class="slider-size">
                          <div class="carousel-caption"> 
                            <h3><?php echo (isset($value->title)? $value->title : '&nbsp;' ) ?> </h3>
                            <p><?php echo (isset($value->caption)? $value->caption : '&nbsp;' ) ?></p>
                          </div>
                        </div>
                      </div><?php endforeach				 ?><?php if($options->controls && !$options->out_controls): ?><a href="#carousel-4" role="button" data-slide="prev" class="left carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-left') : ('') ?>"></span><span class="sr-only">Previous</span></a><a href="#carousel-4" role="button" data-slide="next" class="right carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-right') : ('') ?>"></span><span class="sr-only">Next</span></a><?php endif ?>
                    </div><?php if($options->controls && $options->out_controls): ?><a href="#carousel-4" role="button" data-slide="prev" class="left carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-left') : ('') ?>"></span><span class="sr-only">Previous</span></a><a href="#carousel-4" role="button" data-slide="next" class="right carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-right') : ('') ?>"></span><span class="sr-only">Next</span></a><?php endif ?><?php if($options->dots && !$options->out_dots): ?>
                      <ol class="carousel-indicators"><?php foreach($items as $key=>$value): ?>
                        <li data-target="#carousel-4" data-slide-to="<?php echo $key ?>" class="<?php echo ($key == 0)? 'active' : '' ?>"></li><?php endforeach ?>
                      </ol><?php endif				 ?><?php if($options->dots && $options->out_dots): ?>
                      <ol class="carousel-indicators"><?php foreach($items as $key=>$value): ?>
                        <li data-target="#carousel-4" data-slide-to="<?php echo $key ?>" class="<?php echo ($key == 0)? 'active' : '' ?>"></li><?php endforeach ?>
                      </ol><?php endif ?>
                  </div><?php endif ?><?php $options = null; ?>
              </div>
            </div>
            <div class="col-md-6">
              <div class="carousel-container">
                <h2 class="text-center">No arrow</h2><?php
                		$options = (object) array(
                					"controls"=> false,
                		); ?>
                <pre><?php var_dump($options); ?></pre><?php 
                  	$options = (object) array(
                  		'height' => isset($options->height)? $options->height : false,
                  		'interval' => isset($options->interval)? $options->interval : 5000,
                  		'wrap' => isset($options->wrap)? $options->wrap : true,
                  		'dots' => isset($options->dots)? $options->dots : true,
                  		'shadow' => isset($options->shadow)? $options->shadow : true,
                  		'controls' => isset($options->controls)? $options->controls : true,
                  		'control_class'	=> isset($options->control_class)? $options->control_class : false,
                  		'out_dots'	=> isset($options->out_dots)? $options->out_dots : false,
                  		'out_controls'	=> isset($options->out_controls)? $options->out_controls : false,
                  	); ?><?php if(isset($items) && sizeof($items) > 0): ?>
                  <div id="carousel-5" data-ride="carousel" data-interval="<?php echo $options->interval ?>" data-wrap="<?php echo $options->wrap ?>" class="carousel slide <?php echo ($options->out_dots)? 'out':'' ?>">
                    <div role="listbox" class="carousel-inner"><?php foreach($items as $key=>$value): ?>
                      <div class="item <?php echo ($key == 0)? 'active' : '' ?>"><?php if(isset($value->href)): ?><a href="<?php echo $value->href ?>" target="<?php echo isset($value->target)? $value->target : '_blank' ?>"></a><?php endif					 ?>
                        <div style="background-image:<?php echo "url({$value->src})" ?><?php echo ($options->height)? "; height:{$options->height}px":""  ?>" class="slider-size">
                          <div class="carousel-caption"> 
                            <h3><?php echo (isset($value->title)? $value->title : '&nbsp;' ) ?> </h3>
                            <p><?php echo (isset($value->caption)? $value->caption : '&nbsp;' ) ?></p>
                          </div>
                        </div>
                      </div><?php endforeach				 ?><?php if($options->controls && !$options->out_controls): ?><a href="#carousel-5" role="button" data-slide="prev" class="left carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-left') : ('') ?>"></span><span class="sr-only">Previous</span></a><a href="#carousel-5" role="button" data-slide="next" class="right carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-right') : ('') ?>"></span><span class="sr-only">Next</span></a><?php endif ?>
                    </div><?php if($options->controls && $options->out_controls): ?><a href="#carousel-5" role="button" data-slide="prev" class="left carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-left') : ('') ?>"></span><span class="sr-only">Previous</span></a><a href="#carousel-5" role="button" data-slide="next" class="right carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-right') : ('') ?>"></span><span class="sr-only">Next</span></a><?php endif ?><?php if($options->dots && !$options->out_dots): ?>
                      <ol class="carousel-indicators"><?php foreach($items as $key=>$value): ?>
                        <li data-target="#carousel-5" data-slide-to="<?php echo $key ?>" class="<?php echo ($key == 0)? 'active' : '' ?>"></li><?php endforeach ?>
                      </ol><?php endif				 ?><?php if($options->dots && $options->out_dots): ?>
                      <ol class="carousel-indicators"><?php foreach($items as $key=>$value): ?>
                        <li data-target="#carousel-5" data-slide-to="<?php echo $key ?>" class="<?php echo ($key == 0)? 'active' : '' ?>"></li><?php endforeach ?>
                      </ol><?php endif ?>
                  </div><?php endif ?><?php $options = null; ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="carousel-container">
                <h2 class="text-center">Finite</h2><?php
                		$options = (object) array(
                					"wrap"=> false,
                		); ?>
                <pre><?php var_dump($options); ?></pre><?php 
                  	$options = (object) array(
                  		'height' => isset($options->height)? $options->height : false,
                  		'interval' => isset($options->interval)? $options->interval : 5000,
                  		'wrap' => isset($options->wrap)? $options->wrap : true,
                  		'dots' => isset($options->dots)? $options->dots : true,
                  		'shadow' => isset($options->shadow)? $options->shadow : true,
                  		'controls' => isset($options->controls)? $options->controls : true,
                  		'control_class'	=> isset($options->control_class)? $options->control_class : false,
                  		'out_dots'	=> isset($options->out_dots)? $options->out_dots : false,
                  		'out_controls'	=> isset($options->out_controls)? $options->out_controls : false,
                  	); ?><?php if(isset($items) && sizeof($items) > 0): ?>
                  <div id="carousel-6" data-ride="carousel" data-interval="<?php echo $options->interval ?>" data-wrap="<?php echo $options->wrap ?>" class="carousel slide <?php echo ($options->out_dots)? 'out':'' ?>">
                    <div role="listbox" class="carousel-inner"><?php foreach($items as $key=>$value): ?>
                      <div class="item <?php echo ($key == 0)? 'active' : '' ?>"><?php if(isset($value->href)): ?><a href="<?php echo $value->href ?>" target="<?php echo isset($value->target)? $value->target : '_blank' ?>"></a><?php endif					 ?>
                        <div style="background-image:<?php echo "url({$value->src})" ?><?php echo ($options->height)? "; height:{$options->height}px":""  ?>" class="slider-size">
                          <div class="carousel-caption"> 
                            <h3><?php echo (isset($value->title)? $value->title : '&nbsp;' ) ?> </h3>
                            <p><?php echo (isset($value->caption)? $value->caption : '&nbsp;' ) ?></p>
                          </div>
                        </div>
                      </div><?php endforeach				 ?><?php if($options->controls && !$options->out_controls): ?><a href="#carousel-6" role="button" data-slide="prev" class="left carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-left') : ('') ?>"></span><span class="sr-only">Previous</span></a><a href="#carousel-6" role="button" data-slide="next" class="right carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-right') : ('') ?>"></span><span class="sr-only">Next</span></a><?php endif ?>
                    </div><?php if($options->controls && $options->out_controls): ?><a href="#carousel-6" role="button" data-slide="prev" class="left carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-left') : ('') ?>"></span><span class="sr-only">Previous</span></a><a href="#carousel-6" role="button" data-slide="next" class="right carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-right') : ('') ?>"></span><span class="sr-only">Next</span></a><?php endif ?><?php if($options->dots && !$options->out_dots): ?>
                      <ol class="carousel-indicators"><?php foreach($items as $key=>$value): ?>
                        <li data-target="#carousel-6" data-slide-to="<?php echo $key ?>" class="<?php echo ($key == 0)? 'active' : '' ?>"></li><?php endforeach ?>
                      </ol><?php endif				 ?><?php if($options->dots && $options->out_dots): ?>
                      <ol class="carousel-indicators"><?php foreach($items as $key=>$value): ?>
                        <li data-target="#carousel-6" data-slide-to="<?php echo $key ?>" class="<?php echo ($key == 0)? 'active' : '' ?>"></li><?php endforeach ?>
                      </ol><?php endif ?>
                  </div><?php endif ?><?php $options = null; ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="carousel-container">
                <h2 class="text-center">Custom Interval</h2><?php
                		$options = (object) array(
                					"interval"=> 1000,
                		); ?>
                <pre><?php var_dump($options); ?></pre><?php 
                  	$options = (object) array(
                  		'height' => isset($options->height)? $options->height : false,
                  		'interval' => isset($options->interval)? $options->interval : 5000,
                  		'wrap' => isset($options->wrap)? $options->wrap : true,
                  		'dots' => isset($options->dots)? $options->dots : true,
                  		'shadow' => isset($options->shadow)? $options->shadow : true,
                  		'controls' => isset($options->controls)? $options->controls : true,
                  		'control_class'	=> isset($options->control_class)? $options->control_class : false,
                  		'out_dots'	=> isset($options->out_dots)? $options->out_dots : false,
                  		'out_controls'	=> isset($options->out_controls)? $options->out_controls : false,
                  	); ?><?php if(isset($items) && sizeof($items) > 0): ?>
                  <div id="carousel-7" data-ride="carousel" data-interval="<?php echo $options->interval ?>" data-wrap="<?php echo $options->wrap ?>" class="carousel slide <?php echo ($options->out_dots)? 'out':'' ?>">
                    <div role="listbox" class="carousel-inner"><?php foreach($items as $key=>$value): ?>
                      <div class="item <?php echo ($key == 0)? 'active' : '' ?>"><?php if(isset($value->href)): ?><a href="<?php echo $value->href ?>" target="<?php echo isset($value->target)? $value->target : '_blank' ?>"></a><?php endif					 ?>
                        <div style="background-image:<?php echo "url({$value->src})" ?><?php echo ($options->height)? "; height:{$options->height}px":""  ?>" class="slider-size">
                          <div class="carousel-caption"> 
                            <h3><?php echo (isset($value->title)? $value->title : '&nbsp;' ) ?> </h3>
                            <p><?php echo (isset($value->caption)? $value->caption : '&nbsp;' ) ?></p>
                          </div>
                        </div>
                      </div><?php endforeach				 ?><?php if($options->controls && !$options->out_controls): ?><a href="#carousel-7" role="button" data-slide="prev" class="left carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-left') : ('') ?>"></span><span class="sr-only">Previous</span></a><a href="#carousel-7" role="button" data-slide="next" class="right carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-right') : ('') ?>"></span><span class="sr-only">Next</span></a><?php endif ?>
                    </div><?php if($options->controls && $options->out_controls): ?><a href="#carousel-7" role="button" data-slide="prev" class="left carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-left') : ('') ?>"></span><span class="sr-only">Previous</span></a><a href="#carousel-7" role="button" data-slide="next" class="right carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-right') : ('') ?>"></span><span class="sr-only">Next</span></a><?php endif ?><?php if($options->dots && !$options->out_dots): ?>
                      <ol class="carousel-indicators"><?php foreach($items as $key=>$value): ?>
                        <li data-target="#carousel-7" data-slide-to="<?php echo $key ?>" class="<?php echo ($key == 0)? 'active' : '' ?>"></li><?php endforeach ?>
                      </ol><?php endif				 ?><?php if($options->dots && $options->out_dots): ?>
                      <ol class="carousel-indicators"><?php foreach($items as $key=>$value): ?>
                        <li data-target="#carousel-7" data-slide-to="<?php echo $key ?>" class="<?php echo ($key == 0)? 'active' : '' ?>"></li><?php endforeach ?>
                      </ol><?php endif ?>
                  </div><?php endif ?><?php $options = null; ?>
              </div>
            </div>
            <div class="col-md-6">
              <div class="carousel-container">
                <h2 class="text-center">No interval</h2><?php
                		$options = (object) array(
                					"interval"=> false,
                		); ?>
                <pre><?php var_dump($options); ?></pre><?php 
                  	$options = (object) array(
                  		'height' => isset($options->height)? $options->height : false,
                  		'interval' => isset($options->interval)? $options->interval : 5000,
                  		'wrap' => isset($options->wrap)? $options->wrap : true,
                  		'dots' => isset($options->dots)? $options->dots : true,
                  		'shadow' => isset($options->shadow)? $options->shadow : true,
                  		'controls' => isset($options->controls)? $options->controls : true,
                  		'control_class'	=> isset($options->control_class)? $options->control_class : false,
                  		'out_dots'	=> isset($options->out_dots)? $options->out_dots : false,
                  		'out_controls'	=> isset($options->out_controls)? $options->out_controls : false,
                  	); ?><?php if(isset($items) && sizeof($items) > 0): ?>
                  <div id="carousel-8" data-ride="carousel" data-interval="<?php echo $options->interval ?>" data-wrap="<?php echo $options->wrap ?>" class="carousel slide <?php echo ($options->out_dots)? 'out':'' ?>">
                    <div role="listbox" class="carousel-inner"><?php foreach($items as $key=>$value): ?>
                      <div class="item <?php echo ($key == 0)? 'active' : '' ?>"><?php if(isset($value->href)): ?><a href="<?php echo $value->href ?>" target="<?php echo isset($value->target)? $value->target : '_blank' ?>"></a><?php endif					 ?>
                        <div style="background-image:<?php echo "url({$value->src})" ?><?php echo ($options->height)? "; height:{$options->height}px":""  ?>" class="slider-size">
                          <div class="carousel-caption"> 
                            <h3><?php echo (isset($value->title)? $value->title : '&nbsp;' ) ?> </h3>
                            <p><?php echo (isset($value->caption)? $value->caption : '&nbsp;' ) ?></p>
                          </div>
                        </div>
                      </div><?php endforeach				 ?><?php if($options->controls && !$options->out_controls): ?><a href="#carousel-8" role="button" data-slide="prev" class="left carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-left') : ('') ?>"></span><span class="sr-only">Previous</span></a><a href="#carousel-8" role="button" data-slide="next" class="right carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-right') : ('') ?>"></span><span class="sr-only">Next</span></a><?php endif ?>
                    </div><?php if($options->controls && $options->out_controls): ?><a href="#carousel-8" role="button" data-slide="prev" class="left carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-left') : ('') ?>"></span><span class="sr-only">Previous</span></a><a href="#carousel-8" role="button" data-slide="next" class="right carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-right') : ('') ?>"></span><span class="sr-only">Next</span></a><?php endif ?><?php if($options->dots && !$options->out_dots): ?>
                      <ol class="carousel-indicators"><?php foreach($items as $key=>$value): ?>
                        <li data-target="#carousel-8" data-slide-to="<?php echo $key ?>" class="<?php echo ($key == 0)? 'active' : '' ?>"></li><?php endforeach ?>
                      </ol><?php endif				 ?><?php if($options->dots && $options->out_dots): ?>
                      <ol class="carousel-indicators"><?php foreach($items as $key=>$value): ?>
                        <li data-target="#carousel-8" data-slide-to="<?php echo $key ?>" class="<?php echo ($key == 0)? 'active' : '' ?>"></li><?php endforeach ?>
                      </ol><?php endif ?>
                  </div><?php endif ?><?php $options = null; ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="carousel-container"></div>
              <h2 class="text-center">Outer Dots</h2><?php
              		$options = (object) array(
              					"out_dots"=> true,
              		); ?>
              <pre><?php var_dump($options); ?></pre><?php 
                	$options = (object) array(
                		'height' => isset($options->height)? $options->height : false,
                		'interval' => isset($options->interval)? $options->interval : 5000,
                		'wrap' => isset($options->wrap)? $options->wrap : true,
                		'dots' => isset($options->dots)? $options->dots : true,
                		'shadow' => isset($options->shadow)? $options->shadow : true,
                		'controls' => isset($options->controls)? $options->controls : true,
                		'control_class'	=> isset($options->control_class)? $options->control_class : false,
                		'out_dots'	=> isset($options->out_dots)? $options->out_dots : false,
                		'out_controls'	=> isset($options->out_controls)? $options->out_controls : false,
                	); ?><?php if(isset($items) && sizeof($items) > 0): ?>
                <div id="carousel-9" data-ride="carousel" data-interval="<?php echo $options->interval ?>" data-wrap="<?php echo $options->wrap ?>" class="carousel slide <?php echo ($options->out_dots)? 'out':'' ?>">
                  <div role="listbox" class="carousel-inner"><?php foreach($items as $key=>$value): ?>
                    <div class="item <?php echo ($key == 0)? 'active' : '' ?>"><?php if(isset($value->href)): ?><a href="<?php echo $value->href ?>" target="<?php echo isset($value->target)? $value->target : '_blank' ?>"></a><?php endif					 ?>
                      <div style="background-image:<?php echo "url({$value->src})" ?><?php echo ($options->height)? "; height:{$options->height}px":""  ?>" class="slider-size">
                        <div class="carousel-caption"> 
                          <h3><?php echo (isset($value->title)? $value->title : '&nbsp;' ) ?> </h3>
                          <p><?php echo (isset($value->caption)? $value->caption : '&nbsp;' ) ?></p>
                        </div>
                      </div>
                    </div><?php endforeach				 ?><?php if($options->controls && !$options->out_controls): ?><a href="#carousel-9" role="button" data-slide="prev" class="left carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-left') : ('') ?>"></span><span class="sr-only">Previous</span></a><a href="#carousel-9" role="button" data-slide="next" class="right carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-right') : ('') ?>"></span><span class="sr-only">Next</span></a><?php endif ?>
                  </div><?php if($options->controls && $options->out_controls): ?><a href="#carousel-9" role="button" data-slide="prev" class="left carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-left') : ('') ?>"></span><span class="sr-only">Previous</span></a><a href="#carousel-9" role="button" data-slide="next" class="right carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-right') : ('') ?>"></span><span class="sr-only">Next</span></a><?php endif ?><?php if($options->dots && !$options->out_dots): ?>
                    <ol class="carousel-indicators"><?php foreach($items as $key=>$value): ?>
                      <li data-target="#carousel-9" data-slide-to="<?php echo $key ?>" class="<?php echo ($key == 0)? 'active' : '' ?>"></li><?php endforeach ?>
                    </ol><?php endif				 ?><?php if($options->dots && $options->out_dots): ?>
                    <ol class="carousel-indicators"><?php foreach($items as $key=>$value): ?>
                      <li data-target="#carousel-9" data-slide-to="<?php echo $key ?>" class="<?php echo ($key == 0)? 'active' : '' ?>"></li><?php endforeach ?>
                    </ol><?php endif ?>
                </div><?php endif ?><?php $options = null; ?>
            </div>
            <div class="col-md-5 pull-right">
              <div class="carousel-container"></div>
              <h2 class="text-center">Outer Controls</h2><?php
              		$options = (object) array(
              					"out_controls"=> true,
              		); ?>
              <pre><?php var_dump($options); ?></pre><?php 
                	$options = (object) array(
                		'height' => isset($options->height)? $options->height : false,
                		'interval' => isset($options->interval)? $options->interval : 5000,
                		'wrap' => isset($options->wrap)? $options->wrap : true,
                		'dots' => isset($options->dots)? $options->dots : true,
                		'shadow' => isset($options->shadow)? $options->shadow : true,
                		'controls' => isset($options->controls)? $options->controls : true,
                		'control_class'	=> isset($options->control_class)? $options->control_class : false,
                		'out_dots'	=> isset($options->out_dots)? $options->out_dots : false,
                		'out_controls'	=> isset($options->out_controls)? $options->out_controls : false,
                	); ?><?php if(isset($items) && sizeof($items) > 0): ?>
                <div id="carousel-10" data-ride="carousel" data-interval="<?php echo $options->interval ?>" data-wrap="<?php echo $options->wrap ?>" class="carousel slide <?php echo ($options->out_dots)? 'out':'' ?>">
                  <div role="listbox" class="carousel-inner"><?php foreach($items as $key=>$value): ?>
                    <div class="item <?php echo ($key == 0)? 'active' : '' ?>"><?php if(isset($value->href)): ?><a href="<?php echo $value->href ?>" target="<?php echo isset($value->target)? $value->target : '_blank' ?>"></a><?php endif					 ?>
                      <div style="background-image:<?php echo "url({$value->src})" ?><?php echo ($options->height)? "; height:{$options->height}px":""  ?>" class="slider-size">
                        <div class="carousel-caption"> 
                          <h3><?php echo (isset($value->title)? $value->title : '&nbsp;' ) ?> </h3>
                          <p><?php echo (isset($value->caption)? $value->caption : '&nbsp;' ) ?></p>
                        </div>
                      </div>
                    </div><?php endforeach				 ?><?php if($options->controls && !$options->out_controls): ?><a href="#carousel-10" role="button" data-slide="prev" class="left carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-left') : ('') ?>"></span><span class="sr-only">Previous</span></a><a href="#carousel-10" role="button" data-slide="next" class="right carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-right') : ('') ?>"></span><span class="sr-only">Next</span></a><?php endif ?>
                  </div><?php if($options->controls && $options->out_controls): ?><a href="#carousel-10" role="button" data-slide="prev" class="left carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-left') : ('') ?>"></span><span class="sr-only">Previous</span></a><a href="#carousel-10" role="button" data-slide="next" class="right carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-right') : ('') ?>"></span><span class="sr-only">Next</span></a><?php endif ?><?php if($options->dots && !$options->out_dots): ?>
                    <ol class="carousel-indicators"><?php foreach($items as $key=>$value): ?>
                      <li data-target="#carousel-10" data-slide-to="<?php echo $key ?>" class="<?php echo ($key == 0)? 'active' : '' ?>"></li><?php endforeach ?>
                    </ol><?php endif				 ?><?php if($options->dots && $options->out_dots): ?>
                    <ol class="carousel-indicators"><?php foreach($items as $key=>$value): ?>
                      <li data-target="#carousel-10" data-slide-to="<?php echo $key ?>" class="<?php echo ($key == 0)? 'active' : '' ?>"></li><?php endforeach ?>
                    </ol><?php endif ?>
                </div><?php endif ?><?php $options = null; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="carousel-container"></div>
              <h2 class="text-center">No Dots</h2><?php
              		$options = (object) array(
              					"dots"=> false,
              		); ?>
              <pre><?php var_dump($options); ?></pre><?php 
                	$options = (object) array(
                		'height' => isset($options->height)? $options->height : false,
                		'interval' => isset($options->interval)? $options->interval : 5000,
                		'wrap' => isset($options->wrap)? $options->wrap : true,
                		'dots' => isset($options->dots)? $options->dots : true,
                		'shadow' => isset($options->shadow)? $options->shadow : true,
                		'controls' => isset($options->controls)? $options->controls : true,
                		'control_class'	=> isset($options->control_class)? $options->control_class : false,
                		'out_dots'	=> isset($options->out_dots)? $options->out_dots : false,
                		'out_controls'	=> isset($options->out_controls)? $options->out_controls : false,
                	); ?><?php if(isset($items) && sizeof($items) > 0): ?>
                <div id="carousel-11" data-ride="carousel" data-interval="<?php echo $options->interval ?>" data-wrap="<?php echo $options->wrap ?>" class="carousel slide <?php echo ($options->out_dots)? 'out':'' ?>">
                  <div role="listbox" class="carousel-inner"><?php foreach($items as $key=>$value): ?>
                    <div class="item <?php echo ($key == 0)? 'active' : '' ?>"><?php if(isset($value->href)): ?><a href="<?php echo $value->href ?>" target="<?php echo isset($value->target)? $value->target : '_blank' ?>"></a><?php endif					 ?>
                      <div style="background-image:<?php echo "url({$value->src})" ?><?php echo ($options->height)? "; height:{$options->height}px":""  ?>" class="slider-size">
                        <div class="carousel-caption"> 
                          <h3><?php echo (isset($value->title)? $value->title : '&nbsp;' ) ?> </h3>
                          <p><?php echo (isset($value->caption)? $value->caption : '&nbsp;' ) ?></p>
                        </div>
                      </div>
                    </div><?php endforeach				 ?><?php if($options->controls && !$options->out_controls): ?><a href="#carousel-11" role="button" data-slide="prev" class="left carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-left') : ('') ?>"></span><span class="sr-only">Previous</span></a><a href="#carousel-11" role="button" data-slide="next" class="right carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-right') : ('') ?>"></span><span class="sr-only">Next</span></a><?php endif ?>
                  </div><?php if($options->controls && $options->out_controls): ?><a href="#carousel-11" role="button" data-slide="prev" class="left carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-left') : ('') ?>"></span><span class="sr-only">Previous</span></a><a href="#carousel-11" role="button" data-slide="next" class="right carousel-control <?php echo ($options->shadow)? '':'no-shadow' ?> <?php echo ($options->out_controls)? 'out no-shadow':'' ?>"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right <?php echo ($options->control_class)? ('fa fa-' . $options->control_class . '-right') : ('') ?>"></span><span class="sr-only">Next</span></a><?php endif ?><?php if($options->dots && !$options->out_dots): ?>
                    <ol class="carousel-indicators"><?php foreach($items as $key=>$value): ?>
                      <li data-target="#carousel-11" data-slide-to="<?php echo $key ?>" class="<?php echo ($key == 0)? 'active' : '' ?>"></li><?php endforeach ?>
                    </ol><?php endif				 ?><?php if($options->dots && $options->out_dots): ?>
                    <ol class="carousel-indicators"><?php foreach($items as $key=>$value): ?>
                      <li data-target="#carousel-11" data-slide-to="<?php echo $key ?>" class="<?php echo ($key == 0)? 'active' : '' ?>"></li><?php endforeach ?>
                    </ol><?php endif ?>
                </div><?php endif ?><?php $options = null; ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="row">
            <div class="col-md-12">
              <h1 class="text-center">Newsletter</h1>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <h2 class="text-center">Default</h2><?php 
                		$newsletter = (object) array(
                					"name" => (isset($newsletter->name))? $newsletter->name : false,
                					"phone" => (isset($newsletter->phone))? $newsletter->phone : false,
                					"block" => (isset($newsletter->block))? $newsletter->block : false,
                					"classes" => (isset($newsletter->classes))? $newsletter->classes : null,
                					"remove_addon" => (isset($newsletter->remove_addon))? $newsletter->remove_addon : false,
                					"submit_class" => (isset($newsletter->submit_class))? $newsletter->submit_class : false
                			); ?>
                <?php 
                	$n_fields = 1;
                	if($newsletter->name){
                		$n_fields++;			
                	}
                	if($newsletter->phone){
                		$n_fields++;
                	}
                	$col_class = "";
                	if(!$newsletter->block){
                		switch($n_fields){			
                			case 2:
                				$col_class .= " col-sm-5 col-lg-5";
                				break;
                			case 3:
                				$col_class .= " col-sm-3 col-lg-3";
                				break;
                		}			
                	} ?>
                <div class="newsletter container-fluid">
                  <form class="<?php echo ($newsletter->block)? 'block':'navbar-form' ?> <?php echo ($n_fields >= 3)? 'n-fields': null ?> <?php echo $newsletter->classes ?>"><?php if($newsletter->block): ?>
                    <div>
                        <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control">
                          </div><?php else: ?>
                          <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control"><?php endif ?>
                        </div>
                    </div><?php if($newsletter->name): ?>
                    <div>
                        <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control">
                          </div><?php else: ?>
                          <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control"><?php endif ?>
                        </div>
                    </div><?php endif				 ?><?php if($newsletter->phone): ?>
                    <div>
                        <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control">
                          </div><?php else: ?>
                          <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control"><?php endif ?>
                        </div>
                    </div><?php endif ?>
                    <div class="form-group pull-right">
                      <button type="submit" name="submit" class="btn btn-default"><?php echo _e('Send','odin') ?>
                      </button>
                    </div><?php else: ?>
                      <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                          <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control">
                        </div><?php else: ?>
                        <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control"><?php endif ?>
                      </div><?php if($newsletter->name): ?>
                      <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                          <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control">
                        </div><?php else: ?>
                        <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control"><?php endif ?>
                      </div><?php endif				 ?><?php if($newsletter->phone): ?>
                      <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-phone"></i></span>
                          <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control">
                        </div><?php else: ?>
                        <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control"><?php endif ?>
                      </div><?php endif ?>
                    <div class="form-group">
                      <button type="submit" name="submit" class="btn btn-default pull-right-xs <?php echo ($newsletter->block)? 'pull-right':'' ?> <?php echo ($newsletter->submit_class)? $newsletter->submit_class : '' ?>"><?php echo _e('Send','odin') ?>
                      </button>
                    </div><?php endif ?>
                  </form>
                </div><?php $newsletter = null; ?>
            </div>
            <div class="col-md-6">
              <h2 class="text-center">Remove Addon</h2>	<?php 
              				$newsletter = (object) array(
              					"remove_addon" => true
              					);
              	?>
              <pre><?php var_dump($newsletter) ?></pre><?php 
                		$newsletter = (object) array(
                					"name" => (isset($newsletter->name))? $newsletter->name : false,
                					"phone" => (isset($newsletter->phone))? $newsletter->phone : false,
                					"block" => (isset($newsletter->block))? $newsletter->block : false,
                					"classes" => (isset($newsletter->classes))? $newsletter->classes : null,
                					"remove_addon" => (isset($newsletter->remove_addon))? $newsletter->remove_addon : false,
                					"submit_class" => (isset($newsletter->submit_class))? $newsletter->submit_class : false
                			); ?>
                <?php 
                	$n_fields = 1;
                	if($newsletter->name){
                		$n_fields++;			
                	}
                	if($newsletter->phone){
                		$n_fields++;
                	}
                	$col_class = "";
                	if(!$newsletter->block){
                		switch($n_fields){			
                			case 2:
                				$col_class .= " col-sm-5 col-lg-5";
                				break;
                			case 3:
                				$col_class .= " col-sm-3 col-lg-3";
                				break;
                		}			
                	} ?>
                <div class="newsletter container-fluid">
                  <form class="<?php echo ($newsletter->block)? 'block':'navbar-form' ?> <?php echo ($n_fields >= 3)? 'n-fields': null ?> <?php echo $newsletter->classes ?>"><?php if($newsletter->block): ?>
                    <div>
                        <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control">
                          </div><?php else: ?>
                          <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control"><?php endif ?>
                        </div>
                    </div><?php if($newsletter->name): ?>
                    <div>
                        <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control">
                          </div><?php else: ?>
                          <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control"><?php endif ?>
                        </div>
                    </div><?php endif				 ?><?php if($newsletter->phone): ?>
                    <div>
                        <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control">
                          </div><?php else: ?>
                          <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control"><?php endif ?>
                        </div>
                    </div><?php endif ?>
                    <div class="form-group pull-right">
                      <button type="submit" name="submit" class="btn btn-default"><?php echo _e('Send','odin') ?>
                      </button>
                    </div><?php else: ?>
                      <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                          <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control">
                        </div><?php else: ?>
                        <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control"><?php endif ?>
                      </div><?php if($newsletter->name): ?>
                      <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                          <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control">
                        </div><?php else: ?>
                        <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control"><?php endif ?>
                      </div><?php endif				 ?><?php if($newsletter->phone): ?>
                      <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-phone"></i></span>
                          <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control">
                        </div><?php else: ?>
                        <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control"><?php endif ?>
                      </div><?php endif ?>
                    <div class="form-group">
                      <button type="submit" name="submit" class="btn btn-default pull-right-xs <?php echo ($newsletter->block)? 'pull-right':'' ?> <?php echo ($newsletter->submit_class)? $newsletter->submit_class : '' ?>"><?php echo _e('Send','odin') ?>
                      </button>
                    </div><?php endif ?>
                  </form>
                </div><?php $newsletter = null; ?>
            </div>
          </div>
          <div class="row hidden-xs">
            <div class="col-md-12">
              <h2 class="text-center">Form Class (position)</h2>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              	<?php 
              				$newsletter = (object) array(
              					"classes" => 'left'
              					);
              	?>
              <pre><?php var_dump($newsletter) ?></pre>
              <h3 class="text-left">left (default)</h3><?php 
                		$newsletter = (object) array(
                					"name" => (isset($newsletter->name))? $newsletter->name : false,
                					"phone" => (isset($newsletter->phone))? $newsletter->phone : false,
                					"block" => (isset($newsletter->block))? $newsletter->block : false,
                					"classes" => (isset($newsletter->classes))? $newsletter->classes : null,
                					"remove_addon" => (isset($newsletter->remove_addon))? $newsletter->remove_addon : false,
                					"submit_class" => (isset($newsletter->submit_class))? $newsletter->submit_class : false
                			); ?>
                <?php 
                	$n_fields = 1;
                	if($newsletter->name){
                		$n_fields++;			
                	}
                	if($newsletter->phone){
                		$n_fields++;
                	}
                	$col_class = "";
                	if(!$newsletter->block){
                		switch($n_fields){			
                			case 2:
                				$col_class .= " col-sm-5 col-lg-5";
                				break;
                			case 3:
                				$col_class .= " col-sm-3 col-lg-3";
                				break;
                		}			
                	} ?>
                <div class="newsletter container-fluid">
                  <form class="<?php echo ($newsletter->block)? 'block':'navbar-form' ?> <?php echo ($n_fields >= 3)? 'n-fields': null ?> <?php echo $newsletter->classes ?>"><?php if($newsletter->block): ?>
                    <div>
                        <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control">
                          </div><?php else: ?>
                          <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control"><?php endif ?>
                        </div>
                    </div><?php if($newsletter->name): ?>
                    <div>
                        <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control">
                          </div><?php else: ?>
                          <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control"><?php endif ?>
                        </div>
                    </div><?php endif				 ?><?php if($newsletter->phone): ?>
                    <div>
                        <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control">
                          </div><?php else: ?>
                          <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control"><?php endif ?>
                        </div>
                    </div><?php endif ?>
                    <div class="form-group pull-right">
                      <button type="submit" name="submit" class="btn btn-default"><?php echo _e('Send','odin') ?>
                      </button>
                    </div><?php else: ?>
                      <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                          <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control">
                        </div><?php else: ?>
                        <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control"><?php endif ?>
                      </div><?php if($newsletter->name): ?>
                      <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                          <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control">
                        </div><?php else: ?>
                        <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control"><?php endif ?>
                      </div><?php endif				 ?><?php if($newsletter->phone): ?>
                      <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-phone"></i></span>
                          <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control">
                        </div><?php else: ?>
                        <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control"><?php endif ?>
                      </div><?php endif ?>
                    <div class="form-group">
                      <button type="submit" name="submit" class="btn btn-default pull-right-xs <?php echo ($newsletter->block)? 'pull-right':'' ?> <?php echo ($newsletter->submit_class)? $newsletter->submit_class : '' ?>"><?php echo _e('Send','odin') ?>
                      </button>
                    </div><?php endif ?>
                  </form>
                </div><?php $newsletter = null; ?>
            </div>
            <div class="col-md-12">
              	<?php 
              				$newsletter = (object) array(
              					"classes" => 'center'
              					);
              	?>
              <h3 class="text-center">center</h3><?php 
                		$newsletter = (object) array(
                					"name" => (isset($newsletter->name))? $newsletter->name : false,
                					"phone" => (isset($newsletter->phone))? $newsletter->phone : false,
                					"block" => (isset($newsletter->block))? $newsletter->block : false,
                					"classes" => (isset($newsletter->classes))? $newsletter->classes : null,
                					"remove_addon" => (isset($newsletter->remove_addon))? $newsletter->remove_addon : false,
                					"submit_class" => (isset($newsletter->submit_class))? $newsletter->submit_class : false
                			); ?>
                <?php 
                	$n_fields = 1;
                	if($newsletter->name){
                		$n_fields++;			
                	}
                	if($newsletter->phone){
                		$n_fields++;
                	}
                	$col_class = "";
                	if(!$newsletter->block){
                		switch($n_fields){			
                			case 2:
                				$col_class .= " col-sm-5 col-lg-5";
                				break;
                			case 3:
                				$col_class .= " col-sm-3 col-lg-3";
                				break;
                		}			
                	} ?>
                <div class="newsletter container-fluid">
                  <form class="<?php echo ($newsletter->block)? 'block':'navbar-form' ?> <?php echo ($n_fields >= 3)? 'n-fields': null ?> <?php echo $newsletter->classes ?>"><?php if($newsletter->block): ?>
                    <div>
                        <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control">
                          </div><?php else: ?>
                          <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control"><?php endif ?>
                        </div>
                    </div><?php if($newsletter->name): ?>
                    <div>
                        <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control">
                          </div><?php else: ?>
                          <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control"><?php endif ?>
                        </div>
                    </div><?php endif				 ?><?php if($newsletter->phone): ?>
                    <div>
                        <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control">
                          </div><?php else: ?>
                          <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control"><?php endif ?>
                        </div>
                    </div><?php endif ?>
                    <div class="form-group pull-right">
                      <button type="submit" name="submit" class="btn btn-default"><?php echo _e('Send','odin') ?>
                      </button>
                    </div><?php else: ?>
                      <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                          <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control">
                        </div><?php else: ?>
                        <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control"><?php endif ?>
                      </div><?php if($newsletter->name): ?>
                      <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                          <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control">
                        </div><?php else: ?>
                        <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control"><?php endif ?>
                      </div><?php endif				 ?><?php if($newsletter->phone): ?>
                      <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-phone"></i></span>
                          <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control">
                        </div><?php else: ?>
                        <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control"><?php endif ?>
                      </div><?php endif ?>
                    <div class="form-group">
                      <button type="submit" name="submit" class="btn btn-default pull-right-xs <?php echo ($newsletter->block)? 'pull-right':'' ?> <?php echo ($newsletter->submit_class)? $newsletter->submit_class : '' ?>"><?php echo _e('Send','odin') ?>
                      </button>
                    </div><?php endif ?>
                  </form>
                </div><?php $newsletter = null; ?>
            </div>
            <div class="col-md-12">
              	<?php 
              				$newsletter = (object) array(
              					"classes" => 'right'
              					);
              	?>
              <h3 class="text-right">right</h3><?php 
                		$newsletter = (object) array(
                					"name" => (isset($newsletter->name))? $newsletter->name : false,
                					"phone" => (isset($newsletter->phone))? $newsletter->phone : false,
                					"block" => (isset($newsletter->block))? $newsletter->block : false,
                					"classes" => (isset($newsletter->classes))? $newsletter->classes : null,
                					"remove_addon" => (isset($newsletter->remove_addon))? $newsletter->remove_addon : false,
                					"submit_class" => (isset($newsletter->submit_class))? $newsletter->submit_class : false
                			); ?>
                <?php 
                	$n_fields = 1;
                	if($newsletter->name){
                		$n_fields++;			
                	}
                	if($newsletter->phone){
                		$n_fields++;
                	}
                	$col_class = "";
                	if(!$newsletter->block){
                		switch($n_fields){			
                			case 2:
                				$col_class .= " col-sm-5 col-lg-5";
                				break;
                			case 3:
                				$col_class .= " col-sm-3 col-lg-3";
                				break;
                		}			
                	} ?>
                <div class="newsletter container-fluid">
                  <form class="<?php echo ($newsletter->block)? 'block':'navbar-form' ?> <?php echo ($n_fields >= 3)? 'n-fields': null ?> <?php echo $newsletter->classes ?>"><?php if($newsletter->block): ?>
                    <div>
                        <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control">
                          </div><?php else: ?>
                          <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control"><?php endif ?>
                        </div>
                    </div><?php if($newsletter->name): ?>
                    <div>
                        <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control">
                          </div><?php else: ?>
                          <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control"><?php endif ?>
                        </div>
                    </div><?php endif				 ?><?php if($newsletter->phone): ?>
                    <div>
                        <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control">
                          </div><?php else: ?>
                          <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control"><?php endif ?>
                        </div>
                    </div><?php endif ?>
                    <div class="form-group pull-right">
                      <button type="submit" name="submit" class="btn btn-default"><?php echo _e('Send','odin') ?>
                      </button>
                    </div><?php else: ?>
                      <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                          <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control">
                        </div><?php else: ?>
                        <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control"><?php endif ?>
                      </div><?php if($newsletter->name): ?>
                      <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                          <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control">
                        </div><?php else: ?>
                        <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control"><?php endif ?>
                      </div><?php endif				 ?><?php if($newsletter->phone): ?>
                      <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-phone"></i></span>
                          <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control">
                        </div><?php else: ?>
                        <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control"><?php endif ?>
                      </div><?php endif ?>
                    <div class="form-group">
                      <button type="submit" name="submit" class="btn btn-default pull-right-xs <?php echo ($newsletter->block)? 'pull-right':'' ?> <?php echo ($newsletter->submit_class)? $newsletter->submit_class : '' ?>"><?php echo _e('Send','odin') ?>
                      </button>
                    </div><?php endif ?>
                  </form>
                </div><?php $newsletter = null; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <h2 class="text-center">Block</h2>	<?php 
              				$newsletter = (object) array(
              					"block" => true
              					);
              	?>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-5"><?php 
                		$newsletter = (object) array(
                					"name" => (isset($newsletter->name))? $newsletter->name : false,
                					"phone" => (isset($newsletter->phone))? $newsletter->phone : false,
                					"block" => (isset($newsletter->block))? $newsletter->block : false,
                					"classes" => (isset($newsletter->classes))? $newsletter->classes : null,
                					"remove_addon" => (isset($newsletter->remove_addon))? $newsletter->remove_addon : false,
                					"submit_class" => (isset($newsletter->submit_class))? $newsletter->submit_class : false
                			); ?>
                <?php 
                	$n_fields = 1;
                	if($newsletter->name){
                		$n_fields++;			
                	}
                	if($newsletter->phone){
                		$n_fields++;
                	}
                	$col_class = "";
                	if(!$newsletter->block){
                		switch($n_fields){			
                			case 2:
                				$col_class .= " col-sm-5 col-lg-5";
                				break;
                			case 3:
                				$col_class .= " col-sm-3 col-lg-3";
                				break;
                		}			
                	} ?>
                <div class="newsletter container-fluid">
                  <form class="<?php echo ($newsletter->block)? 'block':'navbar-form' ?> <?php echo ($n_fields >= 3)? 'n-fields': null ?> <?php echo $newsletter->classes ?>"><?php if($newsletter->block): ?>
                    <div>
                        <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control">
                          </div><?php else: ?>
                          <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control"><?php endif ?>
                        </div>
                    </div><?php if($newsletter->name): ?>
                    <div>
                        <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control">
                          </div><?php else: ?>
                          <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control"><?php endif ?>
                        </div>
                    </div><?php endif				 ?><?php if($newsletter->phone): ?>
                    <div>
                        <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control">
                          </div><?php else: ?>
                          <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control"><?php endif ?>
                        </div>
                    </div><?php endif ?>
                    <div class="form-group pull-right">
                      <button type="submit" name="submit" class="btn btn-default"><?php echo _e('Send','odin') ?>
                      </button>
                    </div><?php else: ?>
                      <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                          <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control">
                        </div><?php else: ?>
                        <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control"><?php endif ?>
                      </div><?php if($newsletter->name): ?>
                      <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                          <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control">
                        </div><?php else: ?>
                        <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control"><?php endif ?>
                      </div><?php endif				 ?><?php if($newsletter->phone): ?>
                      <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-phone"></i></span>
                          <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control">
                        </div><?php else: ?>
                        <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control"><?php endif ?>
                      </div><?php endif ?>
                    <div class="form-group">
                      <button type="submit" name="submit" class="btn btn-default pull-right-xs <?php echo ($newsletter->block)? 'pull-right':'' ?> <?php echo ($newsletter->submit_class)? $newsletter->submit_class : '' ?>"><?php echo _e('Send','odin') ?>
                      </button>
                    </div><?php endif ?>
                  </form>
                </div><?php $newsletter = null; ?>
            </div>
            <div class="hidden-xs col-sm-6 col-md-4">
              	<?php 
              				$newsletter = (object) array(
              					"block" => true
              					);
              	?><?php 
                		$newsletter = (object) array(
                					"name" => (isset($newsletter->name))? $newsletter->name : false,
                					"phone" => (isset($newsletter->phone))? $newsletter->phone : false,
                					"block" => (isset($newsletter->block))? $newsletter->block : false,
                					"classes" => (isset($newsletter->classes))? $newsletter->classes : null,
                					"remove_addon" => (isset($newsletter->remove_addon))? $newsletter->remove_addon : false,
                					"submit_class" => (isset($newsletter->submit_class))? $newsletter->submit_class : false
                			); ?>
                <?php 
                	$n_fields = 1;
                	if($newsletter->name){
                		$n_fields++;			
                	}
                	if($newsletter->phone){
                		$n_fields++;
                	}
                	$col_class = "";
                	if(!$newsletter->block){
                		switch($n_fields){			
                			case 2:
                				$col_class .= " col-sm-5 col-lg-5";
                				break;
                			case 3:
                				$col_class .= " col-sm-3 col-lg-3";
                				break;
                		}			
                	} ?>
                <div class="newsletter container-fluid">
                  <form class="<?php echo ($newsletter->block)? 'block':'navbar-form' ?> <?php echo ($n_fields >= 3)? 'n-fields': null ?> <?php echo $newsletter->classes ?>"><?php if($newsletter->block): ?>
                    <div>
                        <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control">
                          </div><?php else: ?>
                          <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control"><?php endif ?>
                        </div>
                    </div><?php if($newsletter->name): ?>
                    <div>
                        <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control">
                          </div><?php else: ?>
                          <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control"><?php endif ?>
                        </div>
                    </div><?php endif				 ?><?php if($newsletter->phone): ?>
                    <div>
                        <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control">
                          </div><?php else: ?>
                          <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control"><?php endif ?>
                        </div>
                    </div><?php endif ?>
                    <div class="form-group pull-right">
                      <button type="submit" name="submit" class="btn btn-default"><?php echo _e('Send','odin') ?>
                      </button>
                    </div><?php else: ?>
                      <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                          <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control">
                        </div><?php else: ?>
                        <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control"><?php endif ?>
                      </div><?php if($newsletter->name): ?>
                      <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                          <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control">
                        </div><?php else: ?>
                        <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control"><?php endif ?>
                      </div><?php endif				 ?><?php if($newsletter->phone): ?>
                      <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-phone"></i></span>
                          <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control">
                        </div><?php else: ?>
                        <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control"><?php endif ?>
                      </div><?php endif ?>
                    <div class="form-group">
                      <button type="submit" name="submit" class="btn btn-default pull-right-xs <?php echo ($newsletter->block)? 'pull-right':'' ?> <?php echo ($newsletter->submit_class)? $newsletter->submit_class : '' ?>"><?php echo _e('Send','odin') ?>
                      </button>
                    </div><?php endif ?>
                  </form>
                </div><?php $newsletter = null; ?>
            </div>
            <div class="hidden-xs hidden-sm col-md-3">
              	<?php 
              				$newsletter = (object) array(
              					"block" => true
              					);
              	?><?php 
                		$newsletter = (object) array(
                					"name" => (isset($newsletter->name))? $newsletter->name : false,
                					"phone" => (isset($newsletter->phone))? $newsletter->phone : false,
                					"block" => (isset($newsletter->block))? $newsletter->block : false,
                					"classes" => (isset($newsletter->classes))? $newsletter->classes : null,
                					"remove_addon" => (isset($newsletter->remove_addon))? $newsletter->remove_addon : false,
                					"submit_class" => (isset($newsletter->submit_class))? $newsletter->submit_class : false
                			); ?>
                <?php 
                	$n_fields = 1;
                	if($newsletter->name){
                		$n_fields++;			
                	}
                	if($newsletter->phone){
                		$n_fields++;
                	}
                	$col_class = "";
                	if(!$newsletter->block){
                		switch($n_fields){			
                			case 2:
                				$col_class .= " col-sm-5 col-lg-5";
                				break;
                			case 3:
                				$col_class .= " col-sm-3 col-lg-3";
                				break;
                		}			
                	} ?>
                <div class="newsletter container-fluid">
                  <form class="<?php echo ($newsletter->block)? 'block':'navbar-form' ?> <?php echo ($n_fields >= 3)? 'n-fields': null ?> <?php echo $newsletter->classes ?>"><?php if($newsletter->block): ?>
                    <div>
                        <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control">
                          </div><?php else: ?>
                          <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control"><?php endif ?>
                        </div>
                    </div><?php if($newsletter->name): ?>
                    <div>
                        <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control">
                          </div><?php else: ?>
                          <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control"><?php endif ?>
                        </div>
                    </div><?php endif				 ?><?php if($newsletter->phone): ?>
                    <div>
                        <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control">
                          </div><?php else: ?>
                          <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control"><?php endif ?>
                        </div>
                    </div><?php endif ?>
                    <div class="form-group pull-right">
                      <button type="submit" name="submit" class="btn btn-default"><?php echo _e('Send','odin') ?>
                      </button>
                    </div><?php else: ?>
                      <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                          <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control">
                        </div><?php else: ?>
                        <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control"><?php endif ?>
                      </div><?php if($newsletter->name): ?>
                      <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                          <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control">
                        </div><?php else: ?>
                        <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control"><?php endif ?>
                      </div><?php endif				 ?><?php if($newsletter->phone): ?>
                      <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-phone"></i></span>
                          <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control">
                        </div><?php else: ?>
                        <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control"><?php endif ?>
                      </div><?php endif ?>
                    <div class="form-group">
                      <button type="submit" name="submit" class="btn btn-default pull-right-xs <?php echo ($newsletter->block)? 'pull-right':'' ?> <?php echo ($newsletter->submit_class)? $newsletter->submit_class : '' ?>"><?php echo _e('Send','odin') ?>
                      </button>
                    </div><?php endif ?>
                  </form>
                </div><?php $newsletter = null; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <h2 class="text-center">With name</h2>	<?php 
              				$newsletter = (object) array(
              					"name" => true,
              					);
              	?>
              <pre><?php var_dump($newsletter) ?></pre><?php 
                		$newsletter = (object) array(
                					"name" => (isset($newsletter->name))? $newsletter->name : false,
                					"phone" => (isset($newsletter->phone))? $newsletter->phone : false,
                					"block" => (isset($newsletter->block))? $newsletter->block : false,
                					"classes" => (isset($newsletter->classes))? $newsletter->classes : null,
                					"remove_addon" => (isset($newsletter->remove_addon))? $newsletter->remove_addon : false,
                					"submit_class" => (isset($newsletter->submit_class))? $newsletter->submit_class : false
                			); ?>
                <?php 
                	$n_fields = 1;
                	if($newsletter->name){
                		$n_fields++;			
                	}
                	if($newsletter->phone){
                		$n_fields++;
                	}
                	$col_class = "";
                	if(!$newsletter->block){
                		switch($n_fields){			
                			case 2:
                				$col_class .= " col-sm-5 col-lg-5";
                				break;
                			case 3:
                				$col_class .= " col-sm-3 col-lg-3";
                				break;
                		}			
                	} ?>
                <div class="newsletter container-fluid">
                  <form class="<?php echo ($newsletter->block)? 'block':'navbar-form' ?> <?php echo ($n_fields >= 3)? 'n-fields': null ?> <?php echo $newsletter->classes ?>"><?php if($newsletter->block): ?>
                    <div>
                        <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control">
                          </div><?php else: ?>
                          <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control"><?php endif ?>
                        </div>
                    </div><?php if($newsletter->name): ?>
                    <div>
                        <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control">
                          </div><?php else: ?>
                          <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control"><?php endif ?>
                        </div>
                    </div><?php endif				 ?><?php if($newsletter->phone): ?>
                    <div>
                        <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control">
                          </div><?php else: ?>
                          <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control"><?php endif ?>
                        </div>
                    </div><?php endif ?>
                    <div class="form-group pull-right">
                      <button type="submit" name="submit" class="btn btn-default"><?php echo _e('Send','odin') ?>
                      </button>
                    </div><?php else: ?>
                      <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                          <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control">
                        </div><?php else: ?>
                        <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control"><?php endif ?>
                      </div><?php if($newsletter->name): ?>
                      <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                          <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control">
                        </div><?php else: ?>
                        <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control"><?php endif ?>
                      </div><?php endif				 ?><?php if($newsletter->phone): ?>
                      <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-phone"></i></span>
                          <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control">
                        </div><?php else: ?>
                        <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control"><?php endif ?>
                      </div><?php endif ?>
                    <div class="form-group">
                      <button type="submit" name="submit" class="btn btn-default pull-right-xs <?php echo ($newsletter->block)? 'pull-right':'' ?> <?php echo ($newsletter->submit_class)? $newsletter->submit_class : '' ?>"><?php echo _e('Send','odin') ?>
                      </button>
                    </div><?php endif ?>
                  </form>
                </div><?php $newsletter = null; ?>
            </div>
            <div class="col-md-6">
              <h2 class="text-center">With name (block)</h2>	<?php 
              				$newsletter = (object) array(
              					"name" => true,
              					"block" => true
              					);
              	?>
              <pre><?php var_dump($newsletter) ?></pre><?php 
                		$newsletter = (object) array(
                					"name" => (isset($newsletter->name))? $newsletter->name : false,
                					"phone" => (isset($newsletter->phone))? $newsletter->phone : false,
                					"block" => (isset($newsletter->block))? $newsletter->block : false,
                					"classes" => (isset($newsletter->classes))? $newsletter->classes : null,
                					"remove_addon" => (isset($newsletter->remove_addon))? $newsletter->remove_addon : false,
                					"submit_class" => (isset($newsletter->submit_class))? $newsletter->submit_class : false
                			); ?>
                <?php 
                	$n_fields = 1;
                	if($newsletter->name){
                		$n_fields++;			
                	}
                	if($newsletter->phone){
                		$n_fields++;
                	}
                	$col_class = "";
                	if(!$newsletter->block){
                		switch($n_fields){			
                			case 2:
                				$col_class .= " col-sm-5 col-lg-5";
                				break;
                			case 3:
                				$col_class .= " col-sm-3 col-lg-3";
                				break;
                		}			
                	} ?>
                <div class="newsletter container-fluid">
                  <form class="<?php echo ($newsletter->block)? 'block':'navbar-form' ?> <?php echo ($n_fields >= 3)? 'n-fields': null ?> <?php echo $newsletter->classes ?>"><?php if($newsletter->block): ?>
                    <div>
                        <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control">
                          </div><?php else: ?>
                          <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control"><?php endif ?>
                        </div>
                    </div><?php if($newsletter->name): ?>
                    <div>
                        <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control">
                          </div><?php else: ?>
                          <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control"><?php endif ?>
                        </div>
                    </div><?php endif				 ?><?php if($newsletter->phone): ?>
                    <div>
                        <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control">
                          </div><?php else: ?>
                          <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control"><?php endif ?>
                        </div>
                    </div><?php endif ?>
                    <div class="form-group pull-right">
                      <button type="submit" name="submit" class="btn btn-default"><?php echo _e('Send','odin') ?>
                      </button>
                    </div><?php else: ?>
                      <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                          <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control">
                        </div><?php else: ?>
                        <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control"><?php endif ?>
                      </div><?php if($newsletter->name): ?>
                      <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                          <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control">
                        </div><?php else: ?>
                        <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control"><?php endif ?>
                      </div><?php endif				 ?><?php if($newsletter->phone): ?>
                      <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-phone"></i></span>
                          <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control">
                        </div><?php else: ?>
                        <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control"><?php endif ?>
                      </div><?php endif ?>
                    <div class="form-group">
                      <button type="submit" name="submit" class="btn btn-default pull-right-xs <?php echo ($newsletter->block)? 'pull-right':'' ?> <?php echo ($newsletter->submit_class)? $newsletter->submit_class : '' ?>"><?php echo _e('Send','odin') ?>
                      </button>
                    </div><?php endif ?>
                  </form>
                </div><?php $newsletter = null; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <h2 class="text-center">With name & phone</h2>	<?php 
              				$newsletter = (object) array(
              					"name" => true,
              					"phone" => "(99)9999-9999?9",
              					);
              	?>
              <pre><?php var_dump($newsletter) ?></pre><?php 
                		$newsletter = (object) array(
                					"name" => (isset($newsletter->name))? $newsletter->name : false,
                					"phone" => (isset($newsletter->phone))? $newsletter->phone : false,
                					"block" => (isset($newsletter->block))? $newsletter->block : false,
                					"classes" => (isset($newsletter->classes))? $newsletter->classes : null,
                					"remove_addon" => (isset($newsletter->remove_addon))? $newsletter->remove_addon : false,
                					"submit_class" => (isset($newsletter->submit_class))? $newsletter->submit_class : false
                			); ?>
                <?php 
                	$n_fields = 1;
                	if($newsletter->name){
                		$n_fields++;			
                	}
                	if($newsletter->phone){
                		$n_fields++;
                	}
                	$col_class = "";
                	if(!$newsletter->block){
                		switch($n_fields){			
                			case 2:
                				$col_class .= " col-sm-5 col-lg-5";
                				break;
                			case 3:
                				$col_class .= " col-sm-3 col-lg-3";
                				break;
                		}			
                	} ?>
                <div class="newsletter container-fluid">
                  <form class="<?php echo ($newsletter->block)? 'block':'navbar-form' ?> <?php echo ($n_fields >= 3)? 'n-fields': null ?> <?php echo $newsletter->classes ?>"><?php if($newsletter->block): ?>
                    <div>
                        <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control">
                          </div><?php else: ?>
                          <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control"><?php endif ?>
                        </div>
                    </div><?php if($newsletter->name): ?>
                    <div>
                        <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control">
                          </div><?php else: ?>
                          <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control"><?php endif ?>
                        </div>
                    </div><?php endif				 ?><?php if($newsletter->phone): ?>
                    <div>
                        <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control">
                          </div><?php else: ?>
                          <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control"><?php endif ?>
                        </div>
                    </div><?php endif ?>
                    <div class="form-group pull-right">
                      <button type="submit" name="submit" class="btn btn-default"><?php echo _e('Send','odin') ?>
                      </button>
                    </div><?php else: ?>
                      <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                          <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control">
                        </div><?php else: ?>
                        <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control"><?php endif ?>
                      </div><?php if($newsletter->name): ?>
                      <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                          <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control">
                        </div><?php else: ?>
                        <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control"><?php endif ?>
                      </div><?php endif				 ?><?php if($newsletter->phone): ?>
                      <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-phone"></i></span>
                          <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control">
                        </div><?php else: ?>
                        <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control"><?php endif ?>
                      </div><?php endif ?>
                    <div class="form-group">
                      <button type="submit" name="submit" class="btn btn-default pull-right-xs <?php echo ($newsletter->block)? 'pull-right':'' ?> <?php echo ($newsletter->submit_class)? $newsletter->submit_class : '' ?>"><?php echo _e('Send','odin') ?>
                      </button>
                    </div><?php endif ?>
                  </form>
                </div><?php $newsletter = null; ?>
            </div>
            <div class="col-md-6">
              <h2 class="text-center">With name & phone (block)</h2>	<?php 
              				$newsletter = (object) array(
              					"name" => true,
              					"phone" => "(99)9999-9999?9",
              					"block" => true
              					);
              	?>
              <pre><?php var_dump($newsletter) ?></pre><?php 
                		$newsletter = (object) array(
                					"name" => (isset($newsletter->name))? $newsletter->name : false,
                					"phone" => (isset($newsletter->phone))? $newsletter->phone : false,
                					"block" => (isset($newsletter->block))? $newsletter->block : false,
                					"classes" => (isset($newsletter->classes))? $newsletter->classes : null,
                					"remove_addon" => (isset($newsletter->remove_addon))? $newsletter->remove_addon : false,
                					"submit_class" => (isset($newsletter->submit_class))? $newsletter->submit_class : false
                			); ?>
                <?php 
                	$n_fields = 1;
                	if($newsletter->name){
                		$n_fields++;			
                	}
                	if($newsletter->phone){
                		$n_fields++;
                	}
                	$col_class = "";
                	if(!$newsletter->block){
                		switch($n_fields){			
                			case 2:
                				$col_class .= " col-sm-5 col-lg-5";
                				break;
                			case 3:
                				$col_class .= " col-sm-3 col-lg-3";
                				break;
                		}			
                	} ?>
                <div class="newsletter container-fluid">
                  <form class="<?php echo ($newsletter->block)? 'block':'navbar-form' ?> <?php echo ($n_fields >= 3)? 'n-fields': null ?> <?php echo $newsletter->classes ?>"><?php if($newsletter->block): ?>
                    <div>
                        <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control">
                          </div><?php else: ?>
                          <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control"><?php endif ?>
                        </div>
                    </div><?php if($newsletter->name): ?>
                    <div>
                        <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control">
                          </div><?php else: ?>
                          <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control"><?php endif ?>
                        </div>
                    </div><?php endif				 ?><?php if($newsletter->phone): ?>
                    <div>
                        <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control">
                          </div><?php else: ?>
                          <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control"><?php endif ?>
                        </div>
                    </div><?php endif ?>
                    <div class="form-group pull-right">
                      <button type="submit" name="submit" class="btn btn-default"><?php echo _e('Send','odin') ?>
                      </button>
                    </div><?php else: ?>
                      <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                          <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control">
                        </div><?php else: ?>
                        <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control"><?php endif ?>
                      </div><?php if($newsletter->name): ?>
                      <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                          <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control">
                        </div><?php else: ?>
                        <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control"><?php endif ?>
                      </div><?php endif				 ?><?php if($newsletter->phone): ?>
                      <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-phone"></i></span>
                          <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control">
                        </div><?php else: ?>
                        <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control"><?php endif ?>
                      </div><?php endif ?>
                    <div class="form-group">
                      <button type="submit" name="submit" class="btn btn-default pull-right-xs <?php echo ($newsletter->block)? 'pull-right':'' ?> <?php echo ($newsletter->submit_class)? $newsletter->submit_class : '' ?>"><?php echo _e('Send','odin') ?>
                      </button>
                    </div><?php endif ?>
                  </form>
                </div><?php $newsletter = null; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <h2 class="text-center">Submit class</h2>	<?php 
              				$newsletter = (object) array(
              					"submit_class" => "btn-primary",
              					"remove_addon" => true
              					);
              	?>
              <pre><?php var_dump($newsletter) ?></pre><?php 
                		$newsletter = (object) array(
                					"name" => (isset($newsletter->name))? $newsletter->name : false,
                					"phone" => (isset($newsletter->phone))? $newsletter->phone : false,
                					"block" => (isset($newsletter->block))? $newsletter->block : false,
                					"classes" => (isset($newsletter->classes))? $newsletter->classes : null,
                					"remove_addon" => (isset($newsletter->remove_addon))? $newsletter->remove_addon : false,
                					"submit_class" => (isset($newsletter->submit_class))? $newsletter->submit_class : false
                			); ?>
                <?php 
                	$n_fields = 1;
                	if($newsletter->name){
                		$n_fields++;			
                	}
                	if($newsletter->phone){
                		$n_fields++;
                	}
                	$col_class = "";
                	if(!$newsletter->block){
                		switch($n_fields){			
                			case 2:
                				$col_class .= " col-sm-5 col-lg-5";
                				break;
                			case 3:
                				$col_class .= " col-sm-3 col-lg-3";
                				break;
                		}			
                	} ?>
                <div class="newsletter container-fluid">
                  <form class="<?php echo ($newsletter->block)? 'block':'navbar-form' ?> <?php echo ($n_fields >= 3)? 'n-fields': null ?> <?php echo $newsletter->classes ?>"><?php if($newsletter->block): ?>
                    <div>
                        <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control">
                          </div><?php else: ?>
                          <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control"><?php endif ?>
                        </div>
                    </div><?php if($newsletter->name): ?>
                    <div>
                        <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control">
                          </div><?php else: ?>
                          <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control"><?php endif ?>
                        </div>
                    </div><?php endif				 ?><?php if($newsletter->phone): ?>
                    <div>
                        <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control">
                          </div><?php else: ?>
                          <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control"><?php endif ?>
                        </div>
                    </div><?php endif ?>
                    <div class="form-group pull-right">
                      <button type="submit" name="submit" class="btn btn-default"><?php echo _e('Send','odin') ?>
                      </button>
                    </div><?php else: ?>
                      <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                          <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control">
                        </div><?php else: ?>
                        <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control"><?php endif ?>
                      </div><?php if($newsletter->name): ?>
                      <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                          <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control">
                        </div><?php else: ?>
                        <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control"><?php endif ?>
                      </div><?php endif				 ?><?php if($newsletter->phone): ?>
                      <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-phone"></i></span>
                          <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control">
                        </div><?php else: ?>
                        <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control"><?php endif ?>
                      </div><?php endif ?>
                    <div class="form-group">
                      <button type="submit" name="submit" class="btn btn-default pull-right-xs <?php echo ($newsletter->block)? 'pull-right':'' ?> <?php echo ($newsletter->submit_class)? $newsletter->submit_class : '' ?>"><?php echo _e('Send','odin') ?>
                      </button>
                    </div><?php endif ?>
                  </form>
                </div><?php $newsletter = null; ?>	<?php 
              				$newsletter = (object) array(
              					"submit_class" => "btn-success",
              					"remove_addon" => true
              					);
              	?><?php 
                		$newsletter = (object) array(
                					"name" => (isset($newsletter->name))? $newsletter->name : false,
                					"phone" => (isset($newsletter->phone))? $newsletter->phone : false,
                					"block" => (isset($newsletter->block))? $newsletter->block : false,
                					"classes" => (isset($newsletter->classes))? $newsletter->classes : null,
                					"remove_addon" => (isset($newsletter->remove_addon))? $newsletter->remove_addon : false,
                					"submit_class" => (isset($newsletter->submit_class))? $newsletter->submit_class : false
                			); ?>
                <?php 
                	$n_fields = 1;
                	if($newsletter->name){
                		$n_fields++;			
                	}
                	if($newsletter->phone){
                		$n_fields++;
                	}
                	$col_class = "";
                	if(!$newsletter->block){
                		switch($n_fields){			
                			case 2:
                				$col_class .= " col-sm-5 col-lg-5";
                				break;
                			case 3:
                				$col_class .= " col-sm-3 col-lg-3";
                				break;
                		}			
                	} ?>
                <div class="newsletter container-fluid">
                  <form class="<?php echo ($newsletter->block)? 'block':'navbar-form' ?> <?php echo ($n_fields >= 3)? 'n-fields': null ?> <?php echo $newsletter->classes ?>"><?php if($newsletter->block): ?>
                    <div>
                        <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control">
                          </div><?php else: ?>
                          <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control"><?php endif ?>
                        </div>
                    </div><?php if($newsletter->name): ?>
                    <div>
                        <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control">
                          </div><?php else: ?>
                          <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control"><?php endif ?>
                        </div>
                    </div><?php endif				 ?><?php if($newsletter->phone): ?>
                    <div>
                        <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control">
                          </div><?php else: ?>
                          <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control"><?php endif ?>
                        </div>
                    </div><?php endif ?>
                    <div class="form-group pull-right">
                      <button type="submit" name="submit" class="btn btn-default"><?php echo _e('Send','odin') ?>
                      </button>
                    </div><?php else: ?>
                      <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                          <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control">
                        </div><?php else: ?>
                        <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control"><?php endif ?>
                      </div><?php if($newsletter->name): ?>
                      <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                          <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control">
                        </div><?php else: ?>
                        <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control"><?php endif ?>
                      </div><?php endif				 ?><?php if($newsletter->phone): ?>
                      <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-phone"></i></span>
                          <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control">
                        </div><?php else: ?>
                        <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control"><?php endif ?>
                      </div><?php endif ?>
                    <div class="form-group">
                      <button type="submit" name="submit" class="btn btn-default pull-right-xs <?php echo ($newsletter->block)? 'pull-right':'' ?> <?php echo ($newsletter->submit_class)? $newsletter->submit_class : '' ?>"><?php echo _e('Send','odin') ?>
                      </button>
                    </div><?php endif ?>
                  </form>
                </div><?php $newsletter = null; ?>	<?php 
              				$newsletter = (object) array(
              					"submit_class" => "btn-warning",
              					"remove_addon" => true
              					);
              	?><?php 
                		$newsletter = (object) array(
                					"name" => (isset($newsletter->name))? $newsletter->name : false,
                					"phone" => (isset($newsletter->phone))? $newsletter->phone : false,
                					"block" => (isset($newsletter->block))? $newsletter->block : false,
                					"classes" => (isset($newsletter->classes))? $newsletter->classes : null,
                					"remove_addon" => (isset($newsletter->remove_addon))? $newsletter->remove_addon : false,
                					"submit_class" => (isset($newsletter->submit_class))? $newsletter->submit_class : false
                			); ?>
                <?php 
                	$n_fields = 1;
                	if($newsletter->name){
                		$n_fields++;			
                	}
                	if($newsletter->phone){
                		$n_fields++;
                	}
                	$col_class = "";
                	if(!$newsletter->block){
                		switch($n_fields){			
                			case 2:
                				$col_class .= " col-sm-5 col-lg-5";
                				break;
                			case 3:
                				$col_class .= " col-sm-3 col-lg-3";
                				break;
                		}			
                	} ?>
                <div class="newsletter container-fluid">
                  <form class="<?php echo ($newsletter->block)? 'block':'navbar-form' ?> <?php echo ($n_fields >= 3)? 'n-fields': null ?> <?php echo $newsletter->classes ?>"><?php if($newsletter->block): ?>
                    <div>
                        <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control">
                          </div><?php else: ?>
                          <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control"><?php endif ?>
                        </div>
                    </div><?php if($newsletter->name): ?>
                    <div>
                        <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control">
                          </div><?php else: ?>
                          <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control"><?php endif ?>
                        </div>
                    </div><?php endif				 ?><?php if($newsletter->phone): ?>
                    <div>
                        <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control">
                          </div><?php else: ?>
                          <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control"><?php endif ?>
                        </div>
                    </div><?php endif ?>
                    <div class="form-group pull-right">
                      <button type="submit" name="submit" class="btn btn-default"><?php echo _e('Send','odin') ?>
                      </button>
                    </div><?php else: ?>
                      <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                          <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control">
                        </div><?php else: ?>
                        <input type="email" name="email" placeholder="E-mail" required="required" rules="email" class="form-control"><?php endif ?>
                      </div><?php if($newsletter->name): ?>
                      <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                          <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control">
                        </div><?php else: ?>
                        <input type="text" name="name" placeholder="<?php echo _e('Name','odin') ?>" required="required" rules="notnull" class="form-control"><?php endif ?>
                      </div><?php endif				 ?><?php if($newsletter->phone): ?>
                      <div class="form-group <?php echo $col_class ?>"><?php if(!$newsletter->remove_addon): ?>
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-phone"></i></span>
                          <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control">
                        </div><?php else: ?>
                        <input type="text" name="phone" placeholder="<?php echo _e('Phone','odin') ?>" required="required" data-mask="<?php echo $newsletter->phone ?>" rules="notnull" class="form-control"><?php endif ?>
                      </div><?php endif ?>
                    <div class="form-group">
                      <button type="submit" name="submit" class="btn btn-default pull-right-xs <?php echo ($newsletter->block)? 'pull-right':'' ?> <?php echo ($newsletter->submit_class)? $newsletter->submit_class : '' ?>"><?php echo _e('Send','odin') ?>
                      </button>
                    </div><?php endif ?>
                  </form>
                </div><?php $newsletter = null; ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="row text-center">
            <h1>Modal</h1>
            <button data-toggle="modal" data-target="#myModal1" class="btn btn-primary btn-lg">Default</button>
            <button data-toggle="modal" data-target="#myModal2" class="btn btn-primary btn-lg">Dialog class</button>
            <button data-toggle="modal" data-target="#myModal3" class="btn btn-primary btn-lg">Dialog class</button>
              <div id="myModal1" tabindex="-1" role="dialog" aria-labelledby="" class="modal fade">
                <div role="document" class="modal-dialog undefined">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Test Title</h4>
                    </div>
                    <div class="modal-body">
                      <div class="container-fluid">
                        <h2>Modal Example.</h2>
                        <p>Same modal</p><img src="<?php echo get_template_directory_uri() . '/assets/images/remove_this/kim3.jpg'?>" class="img-responsive">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" data-dismiss="modal" class="btn btn-default"><?php echo _e('Close', 'odin')	 ?>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <div id="myModal2" tabindex="-1" role="dialog" aria-labelledby="" class="modal fade">
                <div role="document" class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Test Title 2</h4>
                    </div>
                    <div class="modal-body">
                      <div class="container-fluid">
                        <h2>Another modal example</h2>
                        <h3>Same modal</h3>
                        <p class="text-center">Now with dialog class</p>
                        <div class="col-md-10 col-md-offset-1"><img src="<?php echo get_template_directory_uri() . '/assets/images/remove_this/kim2.jpg'?>" class="img-responsive"></div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" data-dismiss="modal" class="btn btn-default"><?php echo _e('Close', 'odin')	 ?>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <div id="myModal3" tabindex="-1" role="dialog" aria-labelledby="" class="modal fade">
                <div role="document" class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Test Title 3</h4>
                    </div>
                    <div class="modal-body">
                      <div class="container-fluid">
                        <h4>The Third</h4>
                        <h5>Example</h5>
                        <p class="text-center">Now with a diferent dialog class</p><img src="<?php echo get_template_directory_uri() . '/assets/images/remove_this/kim1.jpg'?>" class="img-responsive">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" data-dismiss="modal" class="btn btn-default"><?php echo _e('Close', 'odin')	 ?>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </main>
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