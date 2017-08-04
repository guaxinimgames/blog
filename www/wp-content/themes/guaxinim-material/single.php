<!DOCTYPE html><?php $fetured_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
if(is_array($fetured_image)) {
	$fetured_image = reset($fetured_image);
} ?>
<head>
  <title><?php echo bloginfo('name'); ?></title>
  <meta charset="<?php echo bloginfo('charset') ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <meta property="og:url" content="<?php echo get_the_permalink() ?>">
  <meta property="og:type" content="article">
  <meta property="og:title" content="<?php echo get_the_title() ?>">
  <meta property="og:description" content="<?php echo get_the_excerpt() ?>">
  <meta property="og:image" content="<?php echo $fetured_image ?>"><?php if(!get_option( 'site_icon' )): ?>
  <link href="<?php echo get_template_directory_uri(); ?>/library/images/favicon.ico" rel="shortcut icon"><?php endif ?><?php wp_head(); ?>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/library/css/pages/single/single.css">
</head>
<body <?php body_class(); ?>>
  <div id="fb-root"></div>
  <script>var FB_APP_ID = "<?php echo get_field('fb_app_id','options') ?>";</script>
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header"><?php //Template Name: Archives ?><?php wp_reset_postdata();
wp_reset_query(); ?>
    <header id="header" class="mdl-layout__header">
      <div class="mdl-layout__header-row">
        <div aria-expanded="false" role="button" tabindex="0" class="mdl-layout__drawer-button"><i class="material-icons"></i></div>
        <!-- Title--><span class="mdl-layout-title">Title</span>
        <!-- Add spacer, to align navigation to the right-->
        <div class="mdl-layout-spacer"></div>
        <!-- Navigation. We hide it in small screens.-->
        <nav class="mdl-navigation mdl-layout--large-screen-only"><a href="" class="mdl-navigation__link">Link</a><a href="" class="mdl-navigation__link">Link</a><a href="" class="mdl-navigation__link">Link</a><a href="" class="mdl-navigation__link">Link</a></nav>
      </div>
    </header>
    <div class="mdl-layout__drawer"><span class="mdl-layout-title">Title</span>
      <nav class="mdl-navigation"><a href="" class="mdl-navigation__link">Link</a><a href="" class="mdl-navigation__link">Link</a><a href="" class="mdl-navigation__link">Link</a><a href="" class="mdl-navigation__link">Link</a></nav>
    </div>
    <div id="wrapper">
      <main id="main" tabindex="-1" role="main" class="mdl-layout__content">
        <div class="main-grid mdl-grid">
          <div id="single" class="mdl-cell mdl-cell--12-col">
                <div class="back-btn"><a href="<?php echo get_site_url() ?>" title="Ir para a Home" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored"><i class="material-icons">home</i></a></div><?php while ( have_posts() ) : the_post(); ?><?php $img = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
if(is_array($img)) {
	$img = reset($img);
} ?>
            <div style="background-image:url('<?php echo $img?>')" class="bg-image"></div>
            <article class="mdl-card mdl-shadow--4dp mdl-cell mdl-cell--12-col">
              <header style="background-image:url('<?php echo $img?>')" class="mdl-card__media mdl-color-text--grey-50">
                <div class="overlay-shadow"></div>
                <div class="media-content"> 
                  <div class="title">
                    <h2 class="mdl-card__title-text"><?php echo get_the_title();; ?></h2>
                  </div>
                </div>
              </header>
              <div class="mdl-card__supporting-text meta"><a href="<?php echo get_author_posts_url(get_the_author_id()) ?>">
                  <div class="meta-content">
                    <div style="background-image:url('<?php echo get_avatar_url(get_the_author_id())?>')" class="avatar img-circle"></div>
                    <div class="info"><strong><?php echo get_the_author_meta('display_name', get_the_author_id()); ?></strong><span><?php echo get_time_ago(); ?></span></div>
                  </div></a></div>
              <div class="mdl-card__supporting-text mdl-color-text--grey-700">
                <div class="content"><?php the_content() ?>
                </div>
              </div>
              <div class="mdl-color-text--primary-contrast mdl-card__supporting-text comments">
                <div class="fb-comments"></div>
              </div>
            </article><?php endwhile ?>
          </div>
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