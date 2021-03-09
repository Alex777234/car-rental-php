const URL_PATH = '../controllers/';

// Showing the user server errors
const renderResponse = (json) => {
  if (json.status === 400) {
    alert(json.message);
  }
  if (json.status === 200) {
    document.location.href = '/';
  }
}

// Register new users
const regUserBtn = document.querySelector('#authUserBtn');
regUserBtn.addEventListener('click', async (e) => {
  e.preventDefault();
  let email = document.querySelector('input[name="email"]');
  let pass = document.querySelector('input[name="password"]');

  let formData = new FormData();

  if (!/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/.test(email.value) || email.value === '') {
    email.classList.add('input_error');
  } else {
    email.classList.remove('input_error');
    email.classList.add('input_success');
    formData.append('email', email.value);
  }

  if (pass.value === '') {
    pass.classList.add('input_error');
  } else {
    pass.classList.remove('input_error');
    pass.classList.add('input_success');
    formData.append('pass', pass.value);
  }

  let response = await fetch(`${URL_PATH}authUser.php`, {
    method: 'POST',
    body: formData
  })
    .then((response) => response.json())
    .then(res => renderResponse(res))
});
