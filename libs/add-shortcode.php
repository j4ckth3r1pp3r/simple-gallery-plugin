<?php
  add_shortcode('jgallery', 'jg_shortcode');

  function jg_shortcode($atts) {
    $atts = shortcode_atts(array(
  		'size' => 'full',
  		'template' => 'default',
      'ids' => false
  	), $atts);

    if (array_search(!$atts['size'], get_intermediate_image_sizes())) $atts['size'] == 'thumbnail';
    if (array_search(!$atts['template'], get_intermediate_image_sizes())) $atts['template'] == 'default';

    wp_enqueue_style('fancybox');
    wp_enqueue_style('jg_gallery');
    wp_enqueue_script('fancybox');
    wp_enqueue_script('jg_gallery');

    if ($atts['ids'] === false) return '<p>Необходимо указать изображения!</p>';
    ob_start();
    require __DIR__.'/../includes/gallery-frontend.php';
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
  }
?>
