const PATH = '../controllers/';
const filterBtn = document.querySelector('#filterBtn');
const checkbox = document.getElementsByName('checkbox-name[]');
const min = document.querySelector('input[name="price_min"]');
const max = document.querySelector('input[name="price_max"]');

const formData = new FormData();

// Showing the user server errors
const renderResponseBrand = (json) => {
  if (json.status === 400) {
    alert(json.message);
  }
  if (json.status_id === 2) {
    renderCardBrand(json.values);
  }
}


// Add form data on change checkbox
checkbox.forEach(el => {
  el.addEventListener('change', function (e) {
    if (e.target.checked) {
      formData.append('id_brand', this.id);
    } else {
      formData.delete('id_brand');
    }
  });
});


// Send form on press button
filterBtn.addEventListener('click', async (e) => {
  e.preventDefault();
  // formData.append('price_min', min.value);
  // formData.append('price_max', max.value);

  if (!/^\d+$/.test(min.value)) {
    min.style.border = "2px solid rgb(255, 203, 203)";
  } else {
    min.style.border = "2px solid rgb(203, 255, 203)";
    formData.append('price_min', min.value);
  }

  if (!/^\d+$/.test(max.value)) {
    max.style.border = "2px solid rgb(255, 203, 203)";
  } else {
    max.style.border = "2px solid rgb(203, 255, 203)";
    formData.append('price_max', max.value);
  }

  let response = await fetch(`${PATH}filterProduct.php`, {
    method: 'POST',
    body: formData
  })
    .then((response) => response.json())
    .then(res => renderResponseBrand(res))
});


// Render filter brand card product
const renderCardBrand = (json) => {
  while (row.firstChild) {
    row.removeChild(row.firstChild);
  }
  let volume;
  json.map((el) => {
    if (/\./.test(el.engine_capacity)) {
      volume = el.engine_capacity;
    } else {
      volume = el.engine_capacity + '.0';
    }
    row.insertAdjacentHTML('afterbegin', `
    <div class="col-xl-4 col-lg-4 col-md-6">
    <div class="news-card autopark-card">
      <div class="news-card__image">
        <img src="../controllers/upload-files/${el.img_auto}" alt="Изображение автомобиля" class="news-card__img">
      </div>
      <h3 class="news-card__title">${el.name_auto}</h3>
      <span class="news-card__price">${el.price_rental} ₽</span>
      <a href="pages/autopark.php" class="btn news-card__btn">Забронировать</a>
      <div class="news-card__info">
        <span class="news-card__setting"><img src="../img/news/settings.svg" alt="Иконка карточки">${el.name_type}</span>
        <span class="news-card__setting"><img src="../img/news/calendar.svg" alt="Иконка карточки">${el.year_release}</span>
        <span class="news-card__setting"><img src="../img/news/paper.svg" alt="Иконка карточки">${volume}</span>
      </div>
    </div>
  </div>
  `);
  });
}