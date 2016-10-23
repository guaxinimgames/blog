<?php $type = isset($types[$i])? $types[$i] : 'list';
$posts_class = "{$type} col-xs-12 ";
$post_image_container_class = "col-xs-12 ";
$post_text_container_class = "col-xs-12 ";

switch($type) {
	case 'medium':
		$post_content_class .= "col-md-6";
		$post_image_container_class .= "col-md-6";
		$post_text_container_class .= "col-md-6";
		break;
	case 'little':
		$posts_class .= "col-sm-6";
		$post_image_container_class .= "col-lg-4";
		$post_text_container_class .= "col-lg-8";
		break;
	case 'list':
		$posts_class .= "col-sm-6 col-md-6 col-lg-4";
		break;
} ?><?php if ( is_single() ): ?>
<article><?php $posttype = get_post_type(get_the_ID());
$category = reset(wp_get_post_terms(get_the_ID(), "{$posttype}_categories")); ?>
  <header class="entry-header">
    <h4 class="entry-category"><a href="<?php echo get_term_link($category) ?>"><?php echo $category->name; ?></a></h4>
    <h1 class="entry-title"><?php echo get_the_title(); ?></h1>
    <div class="entry-meta">
      <div class="info date"><span class="date"><?php echo get_the_date(); ?></span><span>&nbsp;</span><span class="time"><?php echo get_the_time(); ?></span></div>
      <div class="info author"><span>Por:</span><span>&nbsp;</span><span><?php echo get_the_author(); ?></span></div>
    </div>
  </header>
  <div class="row">
    <div class="share-container hidden-xs hidden-sm col-md-1">
      <ul class="share"><?php $socials = ['facebook', 'twitter','linkedin', 'instagram', 'pinterest']; ?><?php $fa_icons = ['facebook', 'twitter','linkedin', 'instagram', 'pinterest-p']; ?><?php foreach ($socials as $i=>$social): ?>
        <li class="<?php echo $social ?>">
          <button data-service="<?php echo $social ?>"><i class="fa <?php echo "fa-{$fa_icons[$i]}" ?>"></i></button>
        </li><?php endforeach ?>
      </ul>
    </div>
    <div class="entry-content col-md-10"><?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'odin' ) );
wp_link_pages( array(
	'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'odin' ) . '</span>',
	'after'       => '</div>',
	'link_before' => '<span>',
	'link_after'  => '</span>',
) ); ?>
      <div class="entry-comments">
        <div data-href="<?php echo get_the_permalink() ?>" data-numposts="5" class="fb-comments"></div>
      </div>
    </div>
  </div>
  <footer class="entry-meta"></footer>
</article><?php else: ?>
<article id="post-<?php echo the_ID() ?>" class="featured-post <?php echo $posts_class ?>">
  <div class="content">
    <div class="row">
      <div class="<?php echo $post_image_container_class ?>"><a href="<?php echo esc_url(get_permalink()) ?>" title="<?php echo get_the_title() ?>" class="block"><?php $img = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
if(is_array($img)) {
	$img = reset($img);
} ?>
          <div style="background-image:url('<?php echo $img?>')" class="image"></div></a></div>
      <div class="<?php echo $post_text_container_class ?>">
        <div class="text-content"><?php $post_type = get_post_type_object(get_post_type($post->ID));
$cat = reset(get_the_terms($post, $post_type->name . '_categories')); ?>
          <h4><a href="<?php echo get_term_link($cat->term_id) ?>"><?php echo $cat->name; ?></a></h4><a href="<?php echo the_permalink() ?>">
            <h3 class="entry-title"><?php echo get_the_title(); ?></h3><?php if($type == 'medium'): ?>
            <p class="entry-summary"><?php echo get_the_excerpt(); ?></p><?php endif ?></a>
        </div>
      </div>
    </div>
  </div>
</article><?php endif ?>