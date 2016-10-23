
<aside id="sidebar" role="complementary" class="<?php echo odin_classes_page_sidebar_aside() ?>"><?php if ( ! dynamic_sidebar( 'main-sidebar' ) ) {
	the_widget( 'WP_Widget_Recent_Posts', array( 'number' => 10 ) );
	the_widget( 'WP_Widget_Archives', array( 'count' => 0, 'dropdown' => 1 ) );
	the_widget( 'WP_Widget_Tag_Cloud' );
} ?>
  <div class="ad magin box">
    <div class="ad-inner"></div>
    <div class="span text-center"><?php echo _e('Publicidade', 'odin'); ?></div>
  </div>
</aside>