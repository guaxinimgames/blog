<?php function postcards( $posts ){ ?><?php global $post; ?><?php foreach ( $posts as $post ): ?><?php setup_postdata( $post ); ?>
<div class="mdl-cell">
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
</div><?php wp_reset_postdata(); ?><?php endforeach ?><?php } ?>