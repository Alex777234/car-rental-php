const URL_PATH = '../controllers/';

// Showing the user server errors
const renderResponse = (json) => {
  if (json.status === 400) {
    alert(json.message);
  }
  if (json.status === 201) {
    alert(json.message);
    document.location.href = '/';
  }
  if (json.status === 200) {
    alert(json.message);
    document.location.href = '/';
  }
}

// Register new users
const regUserBtn = document.querySelector('#addItem');
regUserBtn.addEventListener('click', async (e) => {
  e.preventDefault();
  let select = document.getElementById('brand_add');
  let name = document.querySelector('input[name="name_add"]');

  let formData = new FormData();

  select.addEventListener('change', function () {
    let getValue = this.value;
    formData.append('id_brand', getValue);
  });




  let response = await fetch(`${URL_PATH}addProduct.php`, {
    method: 'POST',
    body: formData
  })
    .then((response) => response.json())
    .then(res => renderResponse(res))
});
