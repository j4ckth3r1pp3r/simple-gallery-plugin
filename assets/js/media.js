jQuery(document).ready( function($) {
      var shortcodeAtts = {size: 'thumbnail'};
      $('.jg_wrapper').on('click', 'input#jg_media, .jg-preview-image', function(e) {

             e.preventDefault();
             var imageFrame;
             if(imageFrame){
                 imageFrame.open();
             }

             imageFrame = wp.media({
                           title: 'Выбрать изображения',
                           multiple : true,
                           library : {
                                type : 'image',
                            }
                       });

                       imageFrame.on('close', function() {
                          var selection =  imageFrame.state().get('selection');
                          var gallery_ids = new Array();
                          var my_index = 0;
                          selection.each(function(attachment) {
                             gallery_ids[my_index] = attachment['id'];
                             my_index++;
                          });
                          var ids = gallery_ids.join(",");
                          $('input#jg_hidden_media').val(ids);
                          refreshImages(ids);
                          changeShortcode('ids', ids);
                       });

                      imageFrame.on('open',function() {
                        var selection =  imageFrame.state().get('selection');
                        ids = $('input#jg_hidden_media').val().split(',');
                        ids.forEach(function(id) {
                          attachment = wp.media.attachment(id);
                          attachment.fetch();
                          selection.add( attachment ? [ attachment ] : [] );
                        });

                      });

                    imageFrame.open();
     });

     function refreshImages(ids){
       var data = {
         action: 'jg_get_images',
         ids: ids
       };
       $('.jg_images').fadeOut(400, function () {
         $('.jg_images').html('<div class="jg_loading"></div>');
         $('.jg_images').fadeIn();
       })

       $.get(ajaxurl, data, function(response) {
         if(response.success === true) {
           var images = response.data;
           $('.jg_images').fadeOut(400, function () {
             $('.jg_images').html('');
             images.forEach(function (image, i, images) {
               $('.jg_images').append(image);
             });
           })
           $('.jg_images').fadeIn();
         }
       });
     }

     $('.jg_code').find('textarea').click(function (e) {
       e.preventDefault();
       $(this).select();
     });

     $('.shortcode_value').change(function () {
       changeShortcode($(this).attr('name'), $(this).val());
     });

     function changeShortcode(type, value) {
       if ($('.jg_code').is(':hidden') && $('#jg_hidden_media').val().length) $('.jg_code').slideDown();
       if (!$('#jg_hidden_media').val().length) $('.jg_code').slideUp();
       var textarea = $('.jg_code').find('textarea');
       var textShortcode = '[jgallery';

       if (value == '') delete(shortcodeAtts[type]);
       else shortcodeAtts[type] = value;

       for (var key in shortcodeAtts) {
         textShortcode += ' '+key+'="'+shortcodeAtts[key]+'"';
       }
       textShortcode += ']';

       $('.jg_code').find('textarea').val(textShortcode);
     }
});
