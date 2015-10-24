			<footer class="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">

				<div id="inner-footer" class="wrap cf">

					<nav role="navigation">
						<?php wp_nav_menu(array(
    					'container' => 'div',                           // enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
    					'container_class' => 'footer-links cf',         // class of container (should you choose to use it)
    					'menu' => __( 'Footer Links', 'bonestheme' ),   // nav name
    					'menu_class' => 'nav footer-nav cf',            // adding custom nav class
    					'theme_location' => 'footer-links',             // where it's located in the theme
    					'before' => '',                                 // before the menu
    					'after' => '',                                  // after the menu
    					'link_before' => '',                            // before each link
    					'link_after' => '',                             // after each link
    					'depth' => 0,                                   // limit the depth of the nav
    					'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
    					)); ?>
    				</nav>

    				<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.</p>

    			</div>

    		</footer>

    	</div>

    	<?php // all js scripts are loaded in library/bones.php ?>
    	<?php wp_footer(); ?>

    </body>

	<script type='text/javascript' id="__bs_script__">//<![CDATA[
		document.write("<script async src='http://HOST:3000/browser-sync/browser-sync-client.2.9.11.js'><\/script>".replace("HOST", location.hostname));
		//]]></script>
	

	</html> <!-- end of site. what a ride! -->
