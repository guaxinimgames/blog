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
  <div class="main-container">
    <div class="main-content">
      <div id="wrapper">
        <main id="content" tabindex="-1" role="main"><?php if ( have_posts() ) : ?>
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