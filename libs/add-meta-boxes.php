<?php
function jg_add_metaboxes() {
$screens = array( 'post', 'page' );
foreach ( $screens as $screen )
  add_meta_box( 'jg_gallery', 'Галерея', 'jg_add_metaboxes_callback', $screen );
}
add_action('add_meta_boxes', 'jg_add_metaboxes');

function jg_add_metaboxes_callback() {
  require __DIR__.'/../includes/gallery-metabox.php';
}
?>
