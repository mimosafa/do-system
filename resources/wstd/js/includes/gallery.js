import Sortable from 'sortablejs';

let sortables = $('.adminGallery.sortable');

for (let sortable of sortables) {
  let submit = sortable.nextElementSibling;

  new Sortable(sortable, {
    draggable: '.adminGalleryItem',
    handle: '.sortHandler',
    onEnd: (e) => {

      if (e.newIndex !== e.oldIndex) {
        let resultEl = sortable.getElementsByClassName('sort-result')[0];
        let currentValue = resultEl.getAttribute('value');
        let newValueArray = currentValue.split(',');

        let moved = newValueArray.splice(e.oldIndex, 1)[0];
        newValueArray.splice(e.newIndex, 0, moved);

        let newValue = newValueArray.join(',');

        resultEl.setAttribute('value', newValue);

        if (resultEl.getAttribute('data-old') !== newValue) {
          resultEl.setAttribute('name', resultEl.getAttribute('data-name'));
          submit.style.visibility = 'visible';
          submit.removeAttribute('disabled');
        }
        else {
          resultEl.removeAttribute('name');
          submit.style.visibility = 'hidden';
          submit.setAttribute('disabled', 'disabled');
        }
      }

    }
  });
}
