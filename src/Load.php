<?php

namespace Custom\Plugins\CustomVCPlugins	{

	use Custom\Plugins\CustomVCPlugins\Frontend\Assets;
	use Custom\Plugins\CustomVCPlugins\Helpers\Helpers;

	class Load
	{
		function __construct()
		{
			$this->init();
		}
		private function init()
		{
			//load our frontend assets
			(new Assets())->init();

			// Bring our rest interface online, example only.
			// new Rest();
		}
		/**
			* Plugin activation hook
			*/
		public function activate() {
		}

		/**
			* Plugin deactivation hook
			*/
		public function deactivate() {
		}
	}
}