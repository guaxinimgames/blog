<!DOCTYPE html>
<head>
  <title><?php echo bloginfo('name'); ?></title>
  <meta charset="<?php echo bloginfo('charset') ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <meta property="og:url" content="<?php echo get_site_url() ?>">
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?php echo bloginfo("name") ?>">
  <meta property="og:description" content="<?php echo bloginfo("description") ?>">
  <meta property="og:image" content="<?php echo get_template_directory_uri() ?>/library/images/share-image.jpg"><?php if(!get_option( 'site_icon' )): ?>
  <link href="<?php echo get_template_directory_uri(); ?>/library/images/favicon.ico" rel="shortcut icon"><?php endif ?><?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <div id="fb-root"></div>
  <script>var FB_APP_ID = "<?php echo get_field('fb_app_id','options') ?>";</script>
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header"><?php wp_reset_postdata();
wp_reset_query(); ?>
    <header id="header" class="mdl-layout__header">
      <div class="mdl-layout__header-row">
        <div aria-expanded="false" role="button" tabindex="0" class="mdl-layout__drawer-button"><i class="material-icons"></i></div>
        <!-- Title--><span class="mdl-layout-title"></span><a href="<?php echo home_url() ?>" class="mdl-navigation__link"><img src="<?php echo get_template_directory_uri() ?>/library/images/main/logo-horizontal.svg" alt=""></a>
        <!-- Add spacer, to align navigation to the right-->
        <div class="mdl-layout-spacer"></div>
        <!-- Navigation. We hide it in small screens.-->
        <nav class="mdl-navigation mdl-layout--large-screen-only"><?php foreach(wp_get_nav_menu_items('Main Menu') as $item): ?><a href="<?php echo $item->url ?>" title="<?php echo $item->title ?>" class="mdl-navigation__link"><?php echo $item->title; ?></a><?php endforeach ?>
        </nav>
      </div>
    </header>
    <div class="mdl-layout__drawer"><span class="mdl-layout-title"><a href="<?php echo home_url() ?>" class="mdl-navigation__link"><img src="<?php echo get_template_directory_uri() ?>/library/images/main/logo-horizontal-black.svg" alt=""></a></span>
      <nav class="mdl-navigation"><?php foreach(wp_get_nav_menu_items('Main Menu') as $item): ?><a href="<?php echo $item->url ?>" title="<?php echo $item->title ?>" class="mdl-navigation__link"><?php echo $item->title; ?></a><?php endforeach ?>
      </nav>
    </div>
    <div id="wrapper">
      <main id="main" tabindex="-1" role="main" class="mdl-layout__content">
        <div class="main-grid mdl-grid"><?php if ( have_posts() ) : ?>
          <header class="page-header"></header><?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?><?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
          <div class="masonry">
            <div class="grid">
              <div class="grid-sizer col-xs-12 col-sm-6 col-md-4 col-lg-4"></div><?php while ( have_posts() ) : the_post(); ?>
              <div class="grid-item col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="grid-item-content margin"><?php get_template_part( 'content', get_post_format() ); ?>
                </div>
              </div><?php endwhile ?><?php wp_reset_postdata(); ?>
            </div>
          </div><?php else: ?><?php get_template_part( 'content', 'none' ); ?><?php endif ?>
        </div>
        <div class="cf"></div>
      </main>
    </div>
    <footer id="footer" role="contentinfo" class="mdl-mini-footer">
      <div class="mdl-mini-footer--left-section">
            <div class="social-block text-left">
              <ul><?php $icons = array (
	'facebook' 	=> "facebook",
	'twitter'	=>	"twitter",
	'pinterest'	=>	"pinterest-p",
	'youtube'	=>	"youtube-play",
	'instagram'	=>	"instagram",
	'linkedin'	=>	"linkedin"
);
$socials = isset($socials)? $socials : get_field('socials', 'options'); ?><?php foreach($socials as $social): ?><?php $_name = $social['name'];
$_url = $social['url'];
$_icon = isset($icons[$_name])? $icons[$_name] : $_name; ?>
                <li class="<?php echo $_name ?>"><a href="<?php echo $_url ?>" target="_blank" title="<?php echo ucfirst($_name) ?>"><i class="fa <?php echo "fa-{$_icon}" ?>"></i></a></li><?php endforeach ?><?php $socials = null; ?>
              </ul>
            </div>
      </div>
      <div class="mdl-mini-footer--right-section">
        <div id="copyright">
          <div class="wrapper-footer col-xs-12 col-sm-10 col-md-10">
            <p>&copy; Copyright 2005-<?php echo date('Y'); ?> <?php echo bloginfo('name') ?>. Todos os direitos reservados.</p>
            <div class="clear"></div>
          </div>
          <div class="clear"></div>
        </div>
      </div>
    </footer><?php wp_footer(); ?>
  </div>
</body>