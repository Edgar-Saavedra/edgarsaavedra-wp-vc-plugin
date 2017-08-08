<?php

namespace {  // global code
	if ( class_exists( '\\WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_CustomExample extends \WPBakeryShortCode {}
	}
}

namespace Custom\Plugins\CustomVCPlugins\Shortcodes\VC
{
		class CustomExample implements CustomVCPlugin
		{
			/**
				* Initialize our shortcode
				*/
			function init() {
				if (class_exists('\\WPBakeryShortCodesContainer')) {
					add_action( 'vc_before_init', array($this,'registerVcElement') );
					add_shortcode( 'CustomExample', array($this,'registerShortCode') );
				}
			}

			function registerVcElement() {
				vc_map(
					array(
						'name' => __('CustomExample', 'edgarsaavedra-wp-vc-plugin'),
						'base' => 'CustomExample',
//      'icon' => 'ti-image',
						'description' => __('A template custom vc plugin.', 'edgarsaavedra-wp-vc-plugin'),
						'content_element' => true,
						'params' => array(
							array(
								'type' => 'textfield',
								'value' => '',
								'heading' => __('Title', 'edgarsaavedra-wp-vc-plugin'),
								'param_name' => 'title',
							),
						)
					)
				);
			}

			function registerShortCode($atts, $content) {
				// TODO: Implement registerShortCode() method.
				ob_start();
				include( Helpers::getPluginPath() .'/vc_templates/CustomExample/template.php');
				return ob_get_clean();
			}
		}
}