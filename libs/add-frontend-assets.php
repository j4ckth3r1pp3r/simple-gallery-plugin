<?php
add_action( 'wp_enqueue_scripts', 'jg_add_frontend_assets_register' );
function jg_add_frontend_assets_register( $page ) {
  wp_register_style('fancybox', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.20/jquery.fancybox.min.css');
  wp_register_style('jg_gallery', plugins_url( '/../assets/css/gallery.css' , __FILE__ ));

  wp_register_script('fancybox', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.20/jquery.fancybox.min.js',  array('jquery'));
  wp_register_script('jg_gallery', plugins_url( '/../assets/js/gallery.js' , __FILE__ ),  array('jquery', 'fancybox'));
}
?>
