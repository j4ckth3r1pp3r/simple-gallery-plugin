<?php
/*
Plugin Name: J4ck Gallery
Description: Gallery by shortcode
Version: 0.1
Author: J4ck Th3 R1pp3r
Author URI: https://github.com/j4ckth3r1pp3r/
*/
foreach (glob(plugin_dir_path(__FILE__)."/libs/*.php") as $lib) {
  require_once $lib;
}
?>
