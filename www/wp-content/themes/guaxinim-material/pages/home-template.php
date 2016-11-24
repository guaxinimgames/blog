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
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/library/css/pages/archive/archive.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/library/css/pages/home/home.css">
</head>
<body <?php body_class(); ?>>
  <div id="fb-root"></div>
  <script>var FB_APP_ID = "<?php echo get_field('fb_app_id','options') ?>";</script>
  <div class="main-container mdl-layout__container"><?php //Template Name: Home ?><?php //Template Name: Archives ?>
    <div id="wrapper">
      <main id="main" tabindex="-1" role="main" class="mdl-layout__content">
        <div class="main-grid mdl-grid"><?php $posts = get_posts(array('post_type' => 'post', 'numberposts' => 6));
$posts_total = wp_count_posts('post')->publish;
$posts_length = sizeof($posts); ?>
          <div id="home" class="home-cell mdl-cell mdl-cell--12-col">
            <div class="gxn-card mdl-card mdl-shadow--2dp"><a href="<?php echo get_site_url() ?>">
                <div class="mdl-card__media"></div></a></div>
          </div><?php foreach( $posts as $post ): ?><?php setup_postdata($post) ?>
          <div class="post-card mdl-cell">
            <div class="mdl-card hover mdl-shadow--2dp"><?php $img = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
	if(is_array($img)) {
		$img = reset($img);
	} ?><a href="<?php echo get_the_permalink() ?>">
                <div class="mdl-card__media mdl-color-text--grey-50">
                  <div style="background-image:url('<?php echo $img?>')" class="background"></div>
                  <div class="overlay-shadow"></div>
                  <div class="media-content"> 
                    <div class="title">
                      <h2 class="mdl-card__title-text"><?php echo get_the_title();; ?></h2>
                    </div>
                  </div>
                </div></a>
              <div class="mdl-card__supporting-text meta mdl-color-text--grey-600"><a href="<?php echo get_author_posts_url(get_the_author_id()) ?>">
                  <div class="meta-content">
                    <div style="background-image:url('<?php echo get_avatar_url(get_the_author_id())?>')" class="avatar img-circle"></div>
                    <div class="info"><strong><?php echo get_the_author_meta('display_name', get_the_author_id()); ?></strong><span><?php echo get_time_ago()	; ?></span></div>
                  </div></a></div>
            </div>
          </div><?php wp_reset_postdata() ?><?php endforeach ?><?php if ( $posts_length < $posts_total ): ?>
          <div class="load-more-container mdl-cell mdl-cell--12-col text-center">
            <button data-total-posts="<?php echo $posts_total ?>" data-posts-length="<?php echo $posts_length ?>" class="load-more mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">Mais Posts</button>
          </div><?php endif ?>
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
                <li class="<?php echo $_name ?>"><a href="<?php echo $_url ?>" target="_blank"><i class="fa <?php echo "fa-{$_icon}" ?>"></i></a></li><?php endforeach ?><?php $socials = null; ?>
              </ul>
            </div>
      </div>
      <div class="mdl-mini-footer--right-section">
        <div id="copyright">
          <div class="wrapper-footer col-xs-12 col-sm-10 col-md-10">
            <p>&copy; Copyright 2005-<?php echo date('Y'); ?> <?php echo bloginfo('name') ?>. Todos os direitos reservados.</p><a href="http://www.tinpix.com" title="Tinpix Digital" target="_blank" id="tinpix-logo"></a>
            <div class="clear"></div>
          </div>
          <div class="clear"></div>
        </div>
      </div>
    </footer><?php wp_footer(); ?>
  </div>
</body>