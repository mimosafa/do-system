const axios = require('axios');

const ep = location.origin + '/api/health-centers';

const forms = document.getElementsByTagName('form');

const initHealthCenterSelect = (selectHealthCenter, prefectureId) => {

  selectHealthCenter.innerHTML = '';
  let empty = document.createElement('option');
  empty.value = '';
  empty.textContent = '-';
  selectHealthCenter.appendChild(empty);

  if (prefectureId > 0) {
    axios.get(ep + '?prefecture_id=' + prefectureId)
      .then((response) => {
        let data = response.data;
        if (data.length) {
          for (let hc of data) {
            let option = document.createElement('option');
            option.value = hc.health_center_id;
            option.textContent = hc.health_center_name;
            selectHealthCenter.appendChild(option);
          }
          selectHealthCenter.removeAttribute('readonly');
        }
      })
      .catch((error) => {
        //
      })
    ;
  }
  else {
    selectHealthCenter.setAttribute('readonly', 'readonly');
  }

};

for (let form of forms) {

  let selectPrefecture = form.querySelector('select.select-prefecture');
  let selectHealthCenter = form.querySelector('select.select-health-center');

  if (selectPrefecture && selectHealthCenter) {
    let prefectureId = selectPrefecture.value;
    if (prefectureId > 0) {
      initHealthCenterSelect(selectHealthCenter, prefectureId);
    }
    else {
      selectHealthCenter.setAttribute('readonly', 'readonly');
    }

    selectPrefecture.addEventListener('change', (e) => {
      let changed = e.target.value;
      if (changed) {
        initHealthCenterSelect(selectHealthCenter, changed);
      }
    });
  }

}
