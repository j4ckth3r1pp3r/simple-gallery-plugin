<div class="jgallery <?= $atts['template'] ?>">
  <?php $randomId = uniqid(); ?>
    <?php foreach (explode(',', $atts['ids']) as $id) : ?>
      <?php $fullSrc = wp_get_attachment_url($id); ?>
      <div class="image">
        <a href="<?= $fullSrc ?>" data-fancybox="images-<?= $randomId ?>">
          <?= wp_get_attachment_image( filter_var( $id, FILTER_VALIDATE_INT ), $atts['size'], false, array('class' => 'jg-preview-image')); ?>
        </a>
      </div>
    <?php endforeach; ?>
</div>
