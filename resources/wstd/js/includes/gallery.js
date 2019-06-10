import Sortable from 'sortablejs';

let galleries = document.getElementsByClassName('adminGallery');

for (let gallery of galleries) {

  let submit = gallery.nextElementSibling;

  submit.init = (context) => {
    if (context === false) {
      submit.style.visibility = 'hidden';
      submit.setAttribute('disabled', 'disabled');
    }
    else {
      submit.style.visibility = 'visible';
      submit.removeAttribute('disabled');
      if (context === 'sort') {
        submit.textContent = submit.dataset.sorttext;
      }
      else if (context === 'remove') {
        submit.textContent = submit.dataset.removetext;
      }
    }
  };

  gallery.reset = () => {};

  if (gallery.classList.contains('sortable')) {
    let sortResult = gallery.querySelector('input.sort-result');
    let order = sortResult.dataset.order.split(',');

    gallery.sorted = () => {
      gallery.classList.add('sorting');
      sortResult.setAttribute('name', sortResult.getAttribute('data-name'));
      submit.init('sort');
    };

    gallery.init = () => {
      gallery.classList.remove('sorting');
      sortResult.removeAttribute('name');
      sortResult.value = order.join(',');
    };

    gallery.checkOrder = (_order) => {
      if (JSON.stringify(order) === JSON.stringify(_order)) {
        gallery.init();
        submit.init(false);
      }
      else {
        gallery.sorted();
      }
    };

    gallery.reset = () => {
      for (let id of [...order].reverse()) {
        let item = gallery.querySelector('[data-id="' + id + '"]');
        gallery.insertBefore(item, gallery.firstElementChild);
      }
      gallery.init();
    };

    new Sortable(gallery, {
      draggable: '.adminGalleryItem',
      handle: '.sortHandler',
      onEnd: (e) => {

        if (e.newIndex !== e.oldIndex) {
          let currentValue = sortResult.value;
          let newValueArray = currentValue.split(',');

          let moved = newValueArray.splice(e.oldIndex, 1)[0];
          newValueArray.splice(e.newIndex, 0, moved);

          let newValue = newValueArray.join(',');

          sortResult.setAttribute('value', newValue);

          gallery.checkOrder(newValueArray);
        }

      }
    });
  }

  if (gallery.classList.contains('removal')) {

    let items = gallery.getElementsByClassName('adminGalleryItem');

    for (let item of items) {
      let handle = item.querySelector('.removeHandler');
      let removeResult = gallery.querySelector('input.remove-result');
      let removeArray = [];

      handle.addEventListener('click', (e) => {

        e.preventDefault();

        item.classList.toggle('remove');

        let removeItems = gallery.querySelectorAll('.adminGalleryItem.remove');

        if (removeItems.length) {
          for (let removeItem of removeItems) {
            removeArray.push(removeItem.dataset.id);
          }
          removeResult.value = removeArray.join(',');
          removeResult.setAttribute('name', removeResult.dataset.name);
          gallery.reset();
          submit.init('remove');
          gallery.classList.add('removing');
        }
        else {
          removeResult.value = '';
          removeResult.removeAttribute('name');
          submit.init(false);
          gallery.classList.remove('removing');
        }
        removeArray = [];

      });
    }

  }

}
