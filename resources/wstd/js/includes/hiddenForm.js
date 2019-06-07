$('.modal').each(function() {
  var $formItems = $(this).find('input, select, textarea');
  if ($formItems.length) {
    var $form = $(this).closest('form');
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
