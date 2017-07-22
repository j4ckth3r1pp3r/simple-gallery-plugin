<?php
add_action( 'admin_enqueue_scripts', 'jg_add_admin_assets' );
function jg_add_admin_assets( $page ) {
  if( $page == 'post.php' || $page == 'post-new.php' ) {
    wp_enqueue_media();
    wp_enqueue_script( 'jg_admin_media', plugins_url( '/../assets/js/media.js' , __FILE__ ), array('jquery') );
    wp_enqueue_style( 'jg_admin_media', plugins_url('/../assets/css/media.css' , __FILE__) );
  }
}
?>
