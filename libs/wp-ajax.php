<?php
add_action( 'wp_ajax_jg_get_images', 'jg_get_images'   );
function jg_get_images() {
  if(isset($_GET['ids'])){
    $ids = explode(',', $_GET['ids']);
    $images = array();
    foreach ($ids as $id) {
      $images[] = wp_get_attachment_image( filter_var( $id, FILTER_VALIDATE_INT ), 'thumbnail', false, array('class' => 'jg-preview-image'));
    }
      wp_send_json_success( $images );
  } else {
      wp_send_json_error();
  }
}
?>
