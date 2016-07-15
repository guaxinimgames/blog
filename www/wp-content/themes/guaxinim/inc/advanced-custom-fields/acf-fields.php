<?php
/**
 *  Install Add-ons
 *  
 *  The following code will include all 4 premium Add-Ons in your theme.
 *  Please do not attempt to include a file which does not exist. This will produce an error.
 *  
 *  The following code assumes you have a folder 'add-ons' inside your theme.
 *
 *  IMPORTANT
 *  Add-ons may be included in a premium theme/plugin as outlined in the terms and conditions.
 *  For more information, please read:
 *  - http://www.advancedcustomfields.com/terms-conditions/
 *  - http://www.advancedcustomfields.com/resources/getting-started/including-lite-mode-in-a-plugin-theme/
 */ 

// Add-ons 
include_once('add-ons/acf-repeater/acf-repeater.php');
// include_once('add-ons/acf-gallery/acf-gallery.php');
// include_once('add-ons/acf-flexible-content/acf-flexible-content.php');
// include_once( 'add-ons/acf-options-page/acf-options-page.php' );

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_page',
		'title' => 'Page',
		'fields' => array (
			array (
				'key' => 'field_5609a21ac2e73',
				'label' => 'Sidebar',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_5609a228c2e74',
				'label' => 'Sidebar Position',
				'name' => 'sidebar_position',
				'type' => 'select',
				'instructions' => 'Select a sidebar position',
				'choices' => array (
					'none' => 'None',
					'left' => 'Left',
					'right' => 'Right',
				),
				'default_value' => 'none',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_5609a29e890d7',
				'label' => 'Sidebars',
				'name' => 'sidebars',
				'type' => 'select',
				'instructions' => 'Select your sidebar',
				'choices' => array (
					'widget-area-1' => 'Widget Area 1',
					'widget-area-2' => 'Widget Area 2',
					'widget-area-3' => 'Widget Area 3',
					'widget-area-4' => 'Widget Area 4',
					'widget-area-5' => 'Widget Area 5',
					'widget-area-6' => 'Widget Area 6',
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_561fbd9720f87',
				'label' => 'Revolution Slider',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_561fbe8f20f88',
				'label' => 'Revolution Slider Name',
				'name' => 'revolution_slider',
				'type' => 'text',
				'instructions' => 'Enter the alias of the revolution slider which you would like to display on the page',
				'default_value' => '',
				'placeholder' => 'e.g main_slider',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));

	register_field_group(array (
		'id' => 'acf_portfolio',
		'title' => 'Portfolio',
		'fields' => array (
			array (
				'key' => 'field_5607b9ac59094',
				'label' => 'Thumbnails',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_5607ba3459095',
				'label' => 'Primary Image',
				'name' => 'primary_image',
				'type' => 'image',
				'instructions' => 'Upload your primary thumbnail',
				'save_format' => 'url',
				'preview_size' => 'full',
				'library' => 'all',
			),
			array (
				'key' => 'field_5607ba8859097',
				'label' => 'Secondary Image',
				'name' => 'secondary_image',
				'type' => 'image',
				'instructions' => 'Upload your secondary image which is displayed on hover',
				'save_format' => 'url',
				'preview_size' => 'full',
				'library' => 'all',
			),
			array (
				'key' => 'field_56091e9fbd24a',
				'label' => 'Portfolio',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_56091eafbd24b',
				'label' => 'Portfolio Message',
				'name' => '',
				'type' => 'message',
				'message' => 'Upload your high-res images that will be displayed in the single project view',
			),
			array (
				'key' => 'field_56091eccbd24c',
				'label' => 'Portfolio',
				'name' => 'portfolio',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_56091ee3bd24d',
						'label' => 'Image',
						'name' => 'image',
						'type' => 'image',
						'column_width' => '',
						'save_format' => 'url',
						'preview_size' => 'full',
						'library' => 'all',
					),
				),
				'row_min' => 0,
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Image',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'portfolio',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));

	register_field_group(array (
		'id' => 'acf_lookbook',
		'title' => 'Lookbook',
		'fields' => array (
			array (
				'key' => 'field_5607b9ac59094l',
				'label' => 'Thumbnails',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_5607ba3459095l',
				'label' => 'Primary Image',
				'name' => 'primary_image',
				'type' => 'image',
				'instructions' => 'Upload your primary thumbnail',
				'save_format' => 'url',
				'preview_size' => 'full',
				'library' => 'all',
			),
			array (
				'key' => 'field_5607ba8859097l',
				'label' => 'Secondary Image',
				'name' => 'secondary_image',
				'type' => 'image',
				'instructions' => 'Upload your secondary image which is displayed on hover',
				'save_format' => 'url',
				'preview_size' => 'full',
				'library' => 'all',
			),
			array (
				'key' => 'field_56091e9fbd24al',
				'label' => 'Lookbook',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_56091eafbd24bl',
				'label' => 'Lookbook Message',
				'name' => '',
				'type' => 'message',
				'message' => 'Upload your high-res images that will be displayed in the single project view',
			),
			array (
				'key' => 'field_56091eccbd24cl',
				'label' => 'Lookbook',
				'name' => 'lookbook',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_56091ee3bd24dl',
						'label' => 'Image',
						'name' => 'image',
						'type' => 'image',
						'column_width' => '',
						'save_format' => 'url',
						'preview_size' => 'full',
						'library' => 'all',
					),
				),
				'row_min' => 0,
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Image',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'lookbook',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));

	register_field_group(array (
	    'id' => 'acf_campaign',
	    'title' => 'Campanha',
	    'fields' => array (
	      array (
	        'key' => 'field_5607b9ac59094c',
	        'label' => 'Thumbnails',
	        'name' => '',
	        'type' => 'tab',
	      ),
	      array (
	        'key' => 'field_5607ba3459095c',
	        'label' => 'Primary Image',
	        'name' => 'primary_image',
	        'type' => 'image',
	        'instructions' => 'Upload your primary thumbnail',
	        'save_format' => 'url',
	        'preview_size' => 'full',
	        'library' => 'all',
	      ),
	      array (
	        'key' => 'field_5607ba8859097c',
	        'label' => 'Secondary Image',
	        'name' => 'secondary_image',
	        'type' => 'image',
	        'instructions' => 'Upload your secondary image which is displayed on hover',
	        'save_format' => 'url',
	        'preview_size' => 'full',
	        'library' => 'all',
	      ),
	      array (
	        'key' => 'field_56091e9fbd24ac',
	        'label' => 'Campanha',
	        'name' => '',
	        'type' => 'tab',
	      ),
	      array (
	        'key' => 'field_56091eafbd24bc',
	        'label' => 'Portfolio Message',
	        'name' => '',
	        'type' => 'message',
	        'message' => 'Upload your high-res images that will be displayed in the single project view',
	      ),
	      array (
	        'key' => 'field_56091eccbd24cc',
	        'label' => 'Campanha',
	        'name' => 'campaign',
	        'type' => 'repeater',
	        'sub_fields' => array (
	          array (
	            'key' => 'field_56091ee3bd24dc',
	            'label' => 'Image',
	            'name' => 'image',
	            'type' => 'image',
	            'column_width' => '',
	            'save_format' => 'url',
	            'preview_size' => 'full',
	            'library' => 'all',
	          ),
	        ),
	        'row_min' => 0,
	        'row_limit' => '',
	        'layout' => 'table',
	        'button_label' => 'Add Image',
	      ),
	    ),
	    'location' => array (
	      array (
	        array (
	          'param' => 'post_type',
	          'operator' => '==',
	          'value' => 'campaign',
	          'order_no' => 0,
	          'group_no' => 0,
	        ),
	      ),
	    ),
	    'options' => array (
	      'position' => 'acf_after_title',
	      'layout' => 'default',
	      'hide_on_screen' => array (
	      ),
	    ),
	    'menu_order' => 0,
	  ));

	register_field_group(array (
		'id' => 'acf_post',
		'title' => 'Post',
		'fields' => array (
			array (
				'key' => 'field_563b8dd3f5342',
				'label' => 'Post Colour',
				'name' => 'post_colour',
				'type' => 'color_picker',
				'instructions' => 'Select a colour for this post',
				'default_value' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));


	register_field_group(array (
		'id' => 'acf_videos',
		'title' => 'Vídeos',
		'fields' => array (
			array (
				'key' => 'field_5607b9ac590942',
				'label' => 'Thumbnails',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_5607ba34590952',
				'label' => 'Primary Image',
				'name' => 'primary_image',
				'type' => 'image',
				'instructions' => 'Upload your primary thumbnail',
				'save_format' => 'url',
				'preview_size' => 'full',
				'library' => 'all',
			),
			array (
				'key' => 'field_5607ba88590972',
				'label' => 'Secondary Image',
				'name' => 'secondary_image',
				'type' => 'image',
				'instructions' => 'Upload your secondary image which is displayed on hover',
				'save_format' => 'url',
				'preview_size' => 'full',
				'library' => 'all',
			),
			array (
				'key' => 'field_56091e9fbd24al2',
				'label' => 'Vídeos',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_56091eafbd24bl2',
				'label' => 'Vídeo Message',
				'name' => '',
				'type' => 'message',
				'message' => 'Upload your high-res images that will be displayed in the single project view',
			),
			array (
				'key' => 'field_56091eccbd24cl2',
				'label' => 'Vídeos',
				'name' => 'videos',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_56091ee3bd24d2l',
						'label' => 'Imagem',
						'name' => 'videos_repeater_image',
						'type' => 'image',
						'column_width' => '',
						'save_format' => 'url',
						'required' => true,
						'preview_size' => 'thumbnail',
						'library' => 'all',
					),
					array (
						'key' => 'field_561fbe8f20f882',
						'label' => 'Link',
						'name' => 'videos_repeater_link',
						'type' => 'text',
						'instructions' => 'Insira o link do vídeo desejado',
						'default_value' => '',
						'placeholder' => 'https://youtube.com.br/example',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
						'required' => true,
					),
				),
				'row_min' => 0,
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Image',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}

?>