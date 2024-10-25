console.log('heeloo')

///Проверка совпадения паролей
function checkpass(pass) {
  let pass2 = document.getElementById('password').value
  pass != pass2 ? document.getElementById('pass2').setCustomValidity(false) : document.getElementById('pass2').setCustomValidity('')
}

//Проверка типа файлов и размеров
function filecontrol() {
  pic = document.getElementById('user_pic')
  size = pic.files[0].size
  type = pic.files[0].type
  if ((type == 'image/png' || type == 'image/jpeg' || type == 'image/jpg') && size < 2097152) {
    pic.setCustomValidity('')
  } else {
    pic.setCustomValidity(false)
  }
}
//Включение кнопки "Отправить", если форма валидна
function valid_form() {
  console.log(document.getElementById('submit'))
  document.querySelector('form').checkValidity()
    ? (document.getElementById('submit').disabled = false)
    : (document.getElementById('submit').disabled = true)
}
