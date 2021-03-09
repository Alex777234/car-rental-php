const URL_PATH = '../controllers/';
const row = document.querySelector('.history__row');

// Showing the user server errors
const renderResponse = (json) => {
  if (json.status === 400) {
    alert(json.message);
  }
  if (json.status === 200) {
    renderCard(json.values);
  }
}
// ==================================

// Show all Auto when page is loaded
document.addEventListener('DOMContentLoaded', async () => {
  let response = await fetch(`${URL_PATH}getUserBasket.php`, {
    method: 'POST'
  })
    .then((response) => response.json())
    .then(res => renderResponse(res))
});


// ==================================

// Render All card product
const renderCard = (json) => {
  json.map((el) => {
    row.insertAdjacentHTML('afterbegin',
      '<div class="col-xl-12 history-card">' +
      `<img src="${URL_PATH}/upload-files/${el.img_auto}" alt="Изображение автомобиля" class="history-card__img">` +
      `<h3 class="history-card__title">${el.name_auto}</h3>` +
      '<ul class="history-card-list">' +
      `<li class="history-card-list__item">Год выпуска <span>${el.year_release}</span></li>` +
      `<li class="history-card-list__item">Стоимость брони <span>${el.price_rental}</span></li>` +
      `<li class="history-card-list__item">Окочание брони <span>${el.date_rental}</span></li>` +
      '</ul>' +
      `<a href="#" class="btn history-card__btn">Отменить бронь</a>` +
      '</div >'
    );
  });
}
