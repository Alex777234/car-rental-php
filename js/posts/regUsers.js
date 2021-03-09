const URL_PATH = '../controllers/';

// Showing the user server errors
const renderResponse = (json) => {
  if (json.status === 400) {
    alert(json.message);
  }
  if (json.status === 201) {
    document.location.href = '/';
  }
}

// Register new users
const regUserBtn = document.querySelector('#regUserBtn');
regUserBtn.addEventListener('click', async (e) => {
  e.preventDefault();
  let username = document.querySelector('input[name="user_name"]');
  let email = document.querySelector('input[name="email"]');
  let pass = document.querySelector('input[name="pass"]');
  let pass_confirm = document.querySelector('input[name="pass_confirm"]');

  let formData = new FormData();

  if (!/^([А-Я]{1}[а-яё]{1,23}|[A-Z]{1}[a-z]{1,23})$/.test(username.value) || username.value === '') {
    username.classList.add('input_error');
  } else {
    username.classList.remove('input_error');
    username.classList.add('input_success');
    formData.append('username', username.value);
  }

  if (!/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/.test(email.value) || email.value === '') {
    email.classList.add('input_error');
  } else {
    email.classList.remove('input_error');
    email.classList.add('input_success');
    formData.append('email', email.value);
  }

  if (!/(?=[#$-/:-?{-~!"^_`\[\]a-zA-Z]*([0-9#$-/:-?{-~!"^_`\[\]]))(?=[#$-/:-?{-~!"^_`\[\]a-zA-Z0-9]*[a-zA-Z])[#$-/:-?{-~!"^_`\[\]a-zA-Z0-9]{4,}/.test(pass.value) || pass.value === '') {
    pass.classList.add('input_error');
  } else {
    pass.classList.remove('input_error');
    pass.classList.add('input_success');
  }

  if (pass_confirm.value === '' || pass_confirm.value != pass.value || pass.value === '') {
    pass_confirm.classList.add('input_error');
  } else {
    pass_confirm.classList.remove('input_error');
    pass_confirm.classList.add('input_success');
    formData.append('pass', pass_confirm.value);
  }

  let response = await fetch(`${URL_PATH}regUser.php`, {
    method: 'POST',
    body: formData
  })
    .then((response) => response.json())
    .then(res => renderResponse(res))
});
