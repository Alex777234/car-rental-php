const CONTROLLES_PATH = '../controllers/';
let currentIdDel = 0;
const removeUserBtn = document.querySelector('#removeItem');
const selectIdDel = document.getElementById('id-auto-delete');
const nameAutoDel = document.querySelector('input[name="name_del"]');
const imgAuto = document.querySelector('#admin-image');

const fData = new FormData();

// Showing the user server errors
const renderResponseDel = (json) => {
  if (json.status === 400) {
    alert(json.message);
  }
  if (json.status_id === 1) {
    alert(json.message);
    location.reload();
  } else {
    nameAutoDel.value = json.values.name_auto;
    imgAuto.src = CONTROLLES_PATH + "upload-files/" + json.values.img_auto;
  }
}

// Get value option in ID Auto
selectIdDel.addEventListener('change', function () {
  value = this.value;
  if (value === '0') {
    currentIdDel = 0;
  } else {
    fData.append('id_auto', new Number(value));
    getInfoForIDDelete();
    currentIdDel = 1;
  }
});



removeUserBtn.addEventListener('click', (e) => {
  e.preventDefault();
  switchBtnDel(currentIdDel);
});

const switchBtnDel = () => {
  if (currentIdDel === 0) {
    alert("Выберите ID авто из списка");
  }
  else {
    console.log('Функция изменения');
    deleteItem();
  }
}

const deleteItem = async () => {

  let response = await fetch(`${CONTROLLES_PATH}delProduct.php`, {
    method: 'POST',
    body: fData
  })
    .then((response) => response.json())
    .then(res => renderResponseDel(res))
}

const getInfoForIDDelete = async () => {

  let response = await fetch(`${CONTROLLES_PATH}getProduct.php`, {
    method: 'POST',
    body: fData
  })
    .then((response) => response.json())
    .then(res => renderResponseDel(res))
}