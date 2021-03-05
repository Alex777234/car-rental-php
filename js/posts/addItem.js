const URL_PATH = '../controllers/';
let currentId = 0;
const regUserBtn = document.querySelector('#addItem');
const selectId = document.getElementById('id-auto');
const selectBrand = document.getElementById('brand');
const selectTypeBox = document.getElementById('type-box');
const selectYear = document.getElementById('year');
const selectCapacity = document.getElementById('capacity');
const image = document.getElementById('file');
const nameAuto = document.querySelector('input[name="name"]');
const price = document.querySelector('input[name="rental"]');

const formData = new FormData();

// Showing the user server errors
const renderResponse = (json) => {
  if (json.status === 400) {
    alert(json.message);
  }
  if (json.status === 201) {
    alert(json.message);
  }
  if (json.status === 200) {
    image.disabled = true;
    nameAuto.value = json.values.name_auto;
    selectBrand.value = json.values.id_brand;
    selectTypeBox.value = json.values.id_type;
    selectYear.value = json.values.year_release;
    if (!/\./.test(json.values.engine_capacity)) {
      selectCapacity.value = json.values.engine_capacity + '.0';
    }
    price.value = json.values.price_rental;
  }
}

// Get value option in ID Auto
selectId.addEventListener('change', function () {
  value = this.value;
  if (value === '0') {
    image.disabled = false;
    currentId = 0;
    regUserBtn.textContent = 'Добавить';
  } else {
    formData.append('id_auto', new Number(value));
    getInfoForID();
    currentId = 1;
    regUserBtn.textContent = 'Изменить';
  }
});


// Get value option in Brand
formData.append('id_brand', selectBrand.value);
selectBrand.addEventListener('change', function () {
  formData.delete('id_brand', selectBrand.value);
  let getValue = this.value;
  if (!getValue) {
    selectBrand.classList.add('input_error');
  } else {
    selectBrand.classList.remove('input_error');
    selectBrand.classList.add('input_success');
    formData.append('id_brand', selectBrand.value);
  }
});


// Get value in File
image.addEventListener('change', () => {
  if (!['image/png'].includes(image.files[0].type)) {
    alert('Картинка должна быть в PNG формате');
    image.classList.add('input_error');
  } else {
    image.classList.remove('input_error');
    image.classList.add('input_success');
    formData.append('image', image.files[0]);
  }
});


// Get value option in Type Box
formData.append('id_box', selectTypeBox.value);
selectTypeBox.addEventListener('change', function () {
  formData.delete('id_box', selectTypeBox.value);
  let getValue = this.value;
  if (!getValue) {
    selectTypeBox.classList.add('input_error');
  } else {
    selectTypeBox.classList.remove('input_error');
    selectTypeBox.classList.add('input_success');
    formData.append('id_box', selectTypeBox.value);
  }
});

// Get value option in Year Realse
formData.append('year', selectYear.value);
selectYear.addEventListener('change', function () {
  formData.delete('year', selectTypeBox.value);
  let getValue = this.value;
  if (!getValue) {
    selectYear.classList.add('input_error');
  } else {
    selectYear.classList.remove('input_error');
    selectYear.classList.add('input_success');
    formData.append('year', selectYear.value);
  }
});

// Get value option in Year Engine Capacity
formData.append('capacity', selectCapacity.value);
selectCapacity.addEventListener('change', function () {
  formData.delete('capacity', selectTypeBox.value);
  let getValue = this.value;
  if (!getValue) {
    selectCapacity.classList.add('input_error');
  } else {
    selectCapacity.classList.remove('input_error');
    selectCapacity.classList.add('input_success');
    formData.append('capacity', selectCapacity.value);
  }
});



regUserBtn.addEventListener('click', (e) => {
  e.preventDefault();
  switchBtn(currentId);
});

const switchBtn = () => {
  if (currentId === 0) {
    console.log('Функция добавления');
    addNewAuto();
  }
  else {
    console.log('Функция изменения');
    updateAuto();
  }
}

const addNewAuto = async () => {
  let name = document.querySelector('input[name="name"]');
  let price = document.querySelector('input[name="rental"]');

  if (!/^([a-z-A-Z]+\s)([a-z-A-Z-0-9]+$|([a-z-A-Z-0-9]+\s)[a-z-A-Z-0-9]+)$/.test(name.value) || name.value === '') {
    name.classList.add('input_error');
  } else {
    name.classList.remove('input_error');
    name.classList.add('input_success');
    formData.append('name', name.value);
  }

  if (!/^\d+$/.test(price.value) || price.value === '') {
    price.classList.add('input_error');
  } else {
    price.classList.remove('input_error');
    price.classList.add('input_success');
    formData.append('rental', price.value);
  }

  if (image.files.length === 0) {
    image.classList.add('input_error');
  }

  let response = await fetch(`${URL_PATH}addProduct.php`, {
    method: 'POST',
    body: formData
  })
    .then((response) => response.json())
    .then(res => renderResponse(res))
}

const updateAuto = async () => {
  let name = document.querySelector('input[name="name"]');
  let price = document.querySelector('input[name="rental"]');

  if (!/^([a-z-A-Z]+\s)([a-z-A-Z-0-9]+$|([a-z-A-Z-0-9]+\s)[a-z-A-Z-0-9]+)$/.test(name.value) || name.value === '') {
    name.classList.add('input_error');
  } else {
    name.classList.remove('input_error');
    name.classList.add('input_success');
    formData.append('name', name.value);
  }

  if (!/^\d+$/.test(price.value) || price.value === '') {
    price.classList.add('input_error');
  } else {
    price.classList.remove('input_error');
    price.classList.add('input_success');
    formData.append('rental', price.value);
  }

  let response = await fetch(`${URL_PATH}updateProduct.php`, {
    method: 'POST',
    body: formData
  })
    .then((response) => response.json())
    .then(res => renderResponse(res))
}

const getInfoForID = async () => {

  let response = await fetch(`${URL_PATH}getProduct.php`, {
    method: 'POST',
    body: formData
  })
    .then((response) => response.json())
    .then(res => renderResponse(res))
}