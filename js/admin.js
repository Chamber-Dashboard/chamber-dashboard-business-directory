jQuery(document).ready(function($){
  $(".cdash_email_subscribe_div .email_signup").click(function(e) {
    $(".cdash_email_popup").slideDown("slow");
  });

  $(".cdash_email_popup .close_button").click(function(e){
    $(".cdash_email_popup").slideUp("slow");
  });

  var cdash_image_uploader;
  $('#cdash_default_thumb_button').click(function(e) {
    e.preventDefault();
    //If the uploader object has already been created, reopen the dialog
   if (cdash_image_uploader) {
     cdash_image_uploader.open();
     return;
   }

  //Extend the wp.media object
  cdash_image_uploader = wp.media.frames.file_frame = wp.media({
   title: 'Choose Image',
   button: {
   text: 'Choose Image'
   },
   multiple: false
  });

  //When a file is selected, grab the URL and set it as the text field's value
  cdash_image_uploader.on('select', function() {
   attachment = cdash_image_uploader.state().get('selection').first().toJSON();
   var url = '';
   url = attachment['url'];
   jQuery('#cdash_default_thumb').val(url);
  });

  //Open the uploader dialog
  cdash_image_uploader.open();
  });
});
