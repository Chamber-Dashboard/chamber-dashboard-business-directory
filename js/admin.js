jQuery(document).ready(function($){
  $(".cdash_email_subscribe_div .email_signup").click(function(e) {
    $(".cdash_email_popup").slideDown("slow");
  });

  $(".cdash_email_popup .close_button").click(function(e){
    $(".cdash_email_popup").slideUp("slow");
  });
});
