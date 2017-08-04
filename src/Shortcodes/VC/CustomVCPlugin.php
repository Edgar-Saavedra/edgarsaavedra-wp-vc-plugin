<?php

namespace Custom\Plugins\CustomVCPlugins\Shortcodes\VC
{
	interface CustomVCPlugin
	{
		function init();
		function registerVcElement();
		function registerShortCode($atts, $content);
	}
}
