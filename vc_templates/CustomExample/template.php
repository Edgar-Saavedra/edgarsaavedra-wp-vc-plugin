<?php
extract( shortcode_atts( array(
	'title' => !empty($title)? $title : '',
	'content'   => !empty($content)? $content : '',
), $atts ) );

/**
	* Keep track of how many instances of the shortcode appear on the page
	*/
global $CustomExample_count;
$CustomExample_count += 1;
?>
<div id="CustomExample-<?php print $CustomExample_count ?>" class="CustomExample clearfix">
	<section class="custom-wp-vc-shortcodes-section clearfix">
		<div class="clearfix">
			Title field : <?php print $title ?>
		</div>
	</section>

</div>