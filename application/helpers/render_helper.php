<?php
function render_layout ($views) {
	$CI =& get_instance();
	$CI->load->view('header');
	$CI->load->view('menu');
	foreach ($views as $v => $d) {
		$CI->load->view ($v, $d);
	}
	$CI->load->view('footer');
}
