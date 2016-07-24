
<article id="post-<?php echo the_ID() ?>"><?php if ( is_single() ): ?>
  <header class="entry-header margin"><?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    <div class="entry-meta"><?php odin_posted_on(); ?>
    </div>
  </header>
  <div class="entry-content"><?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'odin' ) );
wp_link_pages( array(
	'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'odin' ) . '</span>',
	'after'       => '</div>',
	'link_before' => '<span>',
	'link_after'  => '</span>',
) ); ?>
  </div>
  <footer class="entry-meta"></footer><?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) ) : ?><span class="cat-links"><?php echo __( 'Posted in:', 'odin' ) . ' ' . get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'odin' ) );; ?></span><?php endif ?><?php the_tags( '<span class="tag-links">' . __( 'Tagged as:', 'odin' ) . ' ', ', ', '</span>' ); ?><?php else: ?><a href="<?php echo esc_url( get_permalink() ) ?>" title="<?php echo the_title() ?>" class="block"></a>
  <h3 class="entry-title text-center text-uppercase"><?php echo get_the_title(); ?></h3><?php $img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium' )['0']; ?><?php if(!is_null($img)): ?><img src="<?php echo $img ?>" alt="<?php echo get_the_title() ?>" data-src="<?php echo $img ?>" class="img-responsive margin"/><?php endif ?>
  <p class="entry-summary text-justify"><?php echo get_the_excerpt(); ?></p><?php endif ?>
</article>