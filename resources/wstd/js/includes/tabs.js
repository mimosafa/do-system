import Cookies from 'js-cookie';

$('.nav-tabs-custom').each(function() {

  const path = location.pathname.match(/\/admin\/([a-z-]+)/)[1];
  const key = 'shown_nav_tab_' + path;
  let shown = Cookies.get(key);

  if (shown === undefined) {
    $(this).find('a:first').tab('show');
  }
  else {
    $('a[href="' + shown + '"]').tab('show');
  }

  $(this).on('shown.bs.tab', (e) => {
    Cookies.set(key, e.target.getAttribute('href'), {expires: 7});
  });

});
