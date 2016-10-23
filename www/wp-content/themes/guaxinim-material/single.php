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
  <div class="main-container">
    <div class="main-content">
      <div id="wrapper">
        <main id="content" tabindex="-1" role="main">
          <div class="cf"></div>
        </main>
      </div>
      <footer id="footer" role="contentinfo">
        <div id="copyright">
          <div class="wrapper-footer col-xs-12 col-sm-10 col-md-10">
            <p>&copy; Copyright 2005-<?php echo date('Y'); ?> <?php echo bloginfo('name') ?>. Todos os direitos reservados.</p><a href="http://www.tinpix.com" title="Tinpix Digital" target="_blank" id="tinpix-logo"></a>
            <div class="clear"></div>
          </div>
          <div class="clear"></div>
        </div>
      </footer><?php wp_footer(); ?>
    </div>
  </div>
</body>