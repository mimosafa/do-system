/*
 * Workstore Tokyo Do DoSystem Scripts
 */

+function ($) {

  $('.modal').each(function() {
    var $formItems = $(this).find('input, select, textarea');
    if ($formItems.length) {
      $formItems.attr('disabled', 'disabled');
      $(this)
        .on('show.bs.modal', function () {
          $formItems.removeAttr('disabled');
        })
        .on('hide.bs.modal', function () {
          $formItems.attr('disabled', 'disabled');
        })
    }
  });

  $('.nav-tabs-custom').each(function() {
    $(this).find('a:first').tab('show');
  });

}(jQuery)
