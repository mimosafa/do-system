import Sortable from 'sortablejs';

const sortableTables = document.getElementsByClassName('sortable-table');

for (let table of sortableTables) {

  let toggleOrSubmit = table.parentNode.getElementsByClassName('toggle-or-submit')[0];
  toggleOrSubmit.initToggle = () => {
    let exchangeText = toggleOrSubmit.dataset.exchangetext;
    toggleOrSubmit.innerHTML = '<b>' + exchangeText + '</b>';
    toggleOrSubmit.type = 'button';
    toggleOrSubmit.dataset.toggle = 'modal';
  };
  toggleOrSubmit.initSubmit = () => {
    let sortText = toggleOrSubmit.dataset.sorttext;
    toggleOrSubmit.innerHTML = '<b>' + sortText + '</b>';
    toggleOrSubmit.type = 'submit';
    toggleOrSubmit.dataset.toggle = false;
  };

  toggleOrSubmit.initToggle();

  let sortStateEl = table.parentNode.getElementsByClassName('sort-state')[0];
  let sortState = sortStateEl.dataset.order.split(',');

  let handlerTh = document.createElement('th');
  handlerTh.innerHTML = '<i class="sort-handler-head fa fa-exchange"></i>';
  table.querySelector('thead tr').appendChild(handlerTh);

  let tbody = table.querySelector('tbody');
  for (let tr of tbody.getElementsByTagName('tr')) {
    let handler = document.createElement('td');
    handler.title = 'Sort this row';
    handler.style.verticalAlign = 'middle';
    handler.innerHTML = '<span class="sort-handler"><i class="fa fa-bars"></i></span>';
    tr.appendChild(handler);
  }

  new Sortable(table.querySelector('tbody'), {
    draggable: 'tr',
    handle: '.sort-handler',
    onEnd: (e) => {

      if (e.newIndex !== e.oldIndex) {
        let currentValue = sortStateEl.value;
        let sortStateNow = currentValue.split(',');

        let moved = sortStateNow.splice(e.oldIndex, 1)[0];
        sortStateNow.splice(e.newIndex, 0, moved);

        let newOrder = sortStateNow.join(',');

        sortStateEl.value = newOrder;

        if (JSON.stringify(sortState) !== JSON.stringify(sortStateNow)) {
          toggleOrSubmit.initSubmit();
          sortStateEl.name = sortStateEl.dataset.name;
        }
        else {
          toggleOrSubmit.initToggle();
          sortStateEl.removeAttribute('name');
        }
      }
    }
  });

}
