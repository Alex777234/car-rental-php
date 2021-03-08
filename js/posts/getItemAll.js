const URL_PATH = '../controllers/';
const row = document.querySelector('.autopark__content');

// Showing the user server errors
const renderResponse = (json) => {
  if (json.status === 400) {
    alert(json.message);
  }
  if (json.status === 200) {
    renderCard(json.values);
  }
}

const renderCard = (json) => {
  console.log(json);
  let volume;
  json.map((el) => {
    console.log(el.name_auto);
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

document.addEventListener('DOMContentLoaded', async () => {
  let response = await fetch(`${URL_PATH}getAllProduct.php`, {
    method: 'POST'
  })
    .then((response) => response.json())
    .then(res => renderResponse(res))
});