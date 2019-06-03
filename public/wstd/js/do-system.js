/*
 * Workstore Tokyo Do DoSystem Scripts
 */

+function ($) {

  $('.modal').each(function() {
    var $formItems = $(this).find('input, select, textarea');
    if ($formItems.length) {
      $form = $(this).closest('form');
      $formItems.attr('disabled', 'disabled');
      $(this)
        .on('show.bs.modal', function () {
          $formItems.removeAttr('disabled');
          $form.attr('action', $(this).find('[type="submit"]').attr('formaction'));
        })
        .on('hide.bs.modal', function () {
          $formItems.attr('disabled', 'disabled');
          $form.removeAttr('action');
        })
    }
  });

  $('.nav-tabs-custom').each(function() {
    $(this).find('a:first').tab('show');
  });

}(jQuery)
