const URL_PATH = '../controllers/';
const row = document.querySelector('.autopark__content');
const search = document.querySelector('input[name="search"]');
const seachBtn = document.querySelector('#searchBtn');
const dropRental = document.querySelector('.drop-rental');
const dropRentalClose = document.querySelector('.drop-rental_close');
const dropRentalBlock = document.querySelector('.drop-rental__block');
const spanName = document.getElementById('span_name');
const spanRental = document.getElementById('span_rental');
const spanPrice = document.getElementById('span_price');
const date = document.getElementById('date');
const rentalBtn = document.getElementById('rentalBtn');

const fsData = new FormData();

// Showing the user server errors
const renderResponse = (json) => {
  if (json.status === 400) {
    alert(json.message);
  }
  if (json.status === 200) {
    renderCard(json.values);
  }
  if (json.status === 201) {
    location.reload();
  }
  if (json.status_id === 1) {
    renderSearchCard(json.values);
  }
}
// ==================================

// Show all Auto when page is loaded
document.addEventListener('DOMContentLoaded', async () => {
  let response = await fetch(`${URL_PATH}getAllProduct.php`, {
    method: 'POST'
  })
    .then((response) => response.json())
    .then(res => renderResponse(res))
});

// Show Product from input keypress
search.addEventListener('keydown', async () => {
  fsData.append('name', search.value);
  let response = await fetch(`${URL_PATH}searchProduct.php`, {
    method: 'POST',
    body: fsData
  })
    .then((response) => response.json())
    .then(res => renderResponse(res))
});

// Show Product from button click
seachBtn.addEventListener('click', async (e) => {
  e.preventDefault();
  fsData.append('name', search.value);
  let response = await fetch(`${URL_PATH}searchProduct.php`, {
    method: 'POST',
    body: fsData
  })
    .then((response) => response.json())
    .then(res => renderResponse(res))
});


// ==================================

// Render All card product
const renderCard = (json) => {
  let volume;
  json.map((el) => {
    if (/\./.test(el.engine_capacity)) {
      volume = el.engine_capacity;
    } else {
      volume = el.engine_capacity + '.0';
    }
    row.insertAdjacentHTML('afterbegin',
      '<div class="col-xl-4 col-lg-4 col-md-6">' +
      '<div class="news-card autopark-card">' +
      '<div class="news-card__image">' +
      `<img src="../controllers/upload-files/${el.img_auto}" alt="Изображение автомобиля" class="news-card__img">` +
      '</div>' +
      `<h3 class="news-card__title">${el.name_auto}</h3>` +
      `<span class="news-card__price">${el.price_rental} ₽</span>` +
      '<a href="#" class="btn news-card__btn" onclick="showDropRental(\'' + el.name_auto + '\', + \'' + el.price_rental + '\', + \'' + el.id_product + '\')">Забронировать</a>' +
      '<div class="news-card__info">' +
      `<span class="news-card__setting"><img src="../img/news/settings.svg" alt="Иконка карточки">${el.name_type}</span>` +
      `<span class="news-card__setting"><img src="../img/news/calendar.svg" alt="Иконка карточки">${el.year_release}</span>` +
      `<span class="news-card__setting"><img src="../img/news/paper.svg" alt="Иконка карточки">${volume}</span>` +
      '</div>' +
      '</div>' +
      '</div>'
    );
  });
}

// Show popup rental
function showDropRental(name, price, id) {
  let id_product = id;
  dropRental.classList.toggle('drop-rental_active');
  dropRentalBlock.classList.toggle('drop-rental__block_active');
  spanName.textContent = name;
  spanRental.textContent = price + "₽";
  spanPrice.textContent = price + "₽";

  let form = new FormData();
  form.append('id_product', id_product);

  let time = new Date();
  let month = time.getMonth() + 1;
  let day = time.getDate() + 1;
  if (month / 10 < 1) {
    month = '0' + month;
  }
  if (day / 10 < 1) {
    day = '0' + day;
  }

  date.setAttribute('min', `${time.getFullYear()}` + '-' + `${month}` + '-' + `${day}`);

  date.addEventListener('change', () => {
    form.append('date', date.value);
    date.style.border = "2px solid rgb(203, 255, 203)";
    const date1 = new Date(date.min);
    const date2 = new Date(date.value);
    const timeDiff = Math.abs(date2.getTime() - date1.getTime());
    let diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
    diffDays++;
    spanPrice.textContent = price * diffDays + '₽';
  });


  rentalBtn.addEventListener('click', async (e) => {
    e.preventDefault();

    let response = await fetch(`${URL_PATH}addRental.php`, {
      method: 'POST',
      body: form
    })
      .then((response) => response.json())
      .then(res => renderResponse(res))
  });
}


// Render Card from Search
const renderSearchCard = (json) => {
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
    row.insertAdjacentHTML('afterbegin',
      '<div class="col-xl-4 col-lg-4 col-md-6">' +
      '<div class="news-card autopark-card">' +
      '<div class="news-card__image">' +
      `<img src="../controllers/upload-files/${el.img_auto}" alt="Изображение автомобиля" class="news-card__img">` +
      '</div>' +
      `<h3 class="news-card__title">${el.name_auto}</h3>` +
      `<span class="news-card__price">${el.price_rental} ₽</span>` +
      '<a href="#" class="btn news-card__btn" onclick="showDropRental(\'' + el.name_auto + '\', + \'' + el.price_rental + '\')">Забронировать</a>' +
      '<div class="news-card__info">' +
      `<span class="news-card__setting"><img src="../img/news/settings.svg" alt="Иконка карточки">${el.name_type}</span>` +
      `<span class="news-card__setting"><img src="../img/news/calendar.svg" alt="Иконка карточки">${el.year_release}</span>` +
      `<span class="news-card__setting"><img src="../img/news/paper.svg" alt="Иконка карточки">${volume}</span>` +
      '</div>' +
      '</div>' +
      '</div>'
    );
  });
}


dropRentalClose.addEventListener('click', (e) => {
  e.preventDefault();
  dropRentalBlock.classList.toggle('drop-rental__block_active');
  dropRental.classList.toggle('drop-rental_active');
});