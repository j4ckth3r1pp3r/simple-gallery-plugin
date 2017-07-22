<?php
wp_nonce_field( plugin_basename(__FILE__), 'jg_nonce' );
$imageSizes = get_intermediate_image_sizes();
?>
<div class="jg_wrapper">
  <div class="jg_images_wrapper mtb10">
    <div class="jg_images">
      <!-- Здесь изображения-->
    </div>
  </div>
  <div class="form-group mtb10">
    <label for="jg_select_size">Размеры изображений:</label>
    <select class="jg_select_size shortcode_value" id="jg_select_size" name="size">
      <?php foreach ($imageSizes as $size): ?>
        <option value="<?= $size ?>"><?= $size ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group mtb10">
    <label for="jg_select_template">Шаблон:</label>
    <select class="jg_select_template shortcode_value" id="jg_select_template" name="template">
      <option value="">По умолчанию</option>
      <option value="dark">Темный</option>
      <option value="blue">Синий</option>
    </select>
  </div>
  <input type="hidden" id="jg_hidden_media" class="jg_hidden_media shortcode_value" name="jg_hidden_media" value="">
  <input type="button" class="button mtb10" id="jg_media" name="jg_media" value="Выбрать изображения">
  <div class="jg_code mtb10">
    <p>Код для вставки:</p>
    <textarea readonly="readonly"></textarea>
  </div>
</div>
