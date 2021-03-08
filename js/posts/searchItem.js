const SEARCH_PATH = '../controllers/';
const search = document.querySelector('input[name="search"]');
const seachBtn = document.querySelector('#searchBtn');
const searchDrop = document.querySelector('.panel-form-list');

const fsData = new FormData();



// Showing the user server errors
const renderResponseSearch = (json) => {
  if (json.status === 400) {
    alert(json.message);
  }
  if (json.status === 200) {
    console.log(json.values);
    alert(
      "ID авто: " + json.values.id_product, +  "\n" +
      "Название авто: " + json.values.name_auto
    );
  }
}

seachBtn.addEventListener('click', async (e) => {
  e.preventDefault();

  fsData.append('name', search.value);

  let response = await fetch(`${URL_PATH}searchProduct.php`, {
    method: 'POST',
    body: fsData
  })
    .then((response) => response.json())
    .then(res => renderResponseSearch(res))
});