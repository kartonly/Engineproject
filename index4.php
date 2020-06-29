<!DOCTYPE html>
<html lang="en">
<head>
<title>ЧК "Мадрид"</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css4.css">
<link rel="stylesheet" type="text/css" href="scss.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Work+Sans:400,700&display=swap" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet"> 
</head>
<body>

<div class="forprint">
    <h3>КК Мадрид</h3>
    <p>Мы находимся в КСК Битца, Балаклавский пр,33</p>
</div>

<header>
<div class="hamburger-menu">
    <input id="menu__toggle" type="checkbox" />
    <label class="menu__btn" for="menu__toggle">
      <span></span>
    </label>

    <ul class="menu__box">
      <li><a class="menu__item" href="index.php">Главная</a></li>
			<li><a class="menu__item" href="index1.php">Наши лошади</a></li>
			<li><a class="menu__item" href="index2.php">Наша команда</a></li>
			<li><a class="menu__item" href="index3.php">Отзывы</a></li>
			<li><a class="menu__item" href="index4.php">Контакты</a></li>
    </ul>
  </div>

<div class="logocontainer">
<img class="logo" src="http://www.moscowhorse.ru/images/logo.png" alt="logoofcompany"></div>
<img class="logo2" src="http://www.moscowhorse.ru/images/logo.png" alt="logoofcompany">
<div class="menucontainer">
<a class="headmenu" href="index.php">Главная</a>
<a class="headmenu" href="index1.php">Наши лошади</a>
<a class="headmenu" href="index2.php">Наша команда</a>
<a class="headmenu" href="index3.php">Отзывы</a>
<a class="headmenu" href="index4.php">Контакты</a></div>
</header>
<main>

<div class="headercont">

</div>
<div class="contakts">
<h1>Контакты</h1>

<div class="lokation">

<div class="lokationcard">
    <h2 style="color:white"><b>Мы находимся в КСК Битца</b></h2>
    <h3 style="color:white"><b>м.Чертановская, Балаклавский пр.33</b></h3>
</div>

</div>
<h3 style="margin:2%; margin-left:0%">Свяжитесь с нами через наших менеджеров</h3>
<table class="menegers">
<thead>
    <tr>
    <th>Контактное лицо</th>
    <th>Должность</th>
    <th>Номер телефона</th>
    <th>email</th>
    </tr>
    </thead>
    <tbody>
    <tr>
    <td aria-label="Контактное лицо - ">Алёна</td>
    <td aria-label="Должность - ">Главный тренер</td>
    <td aria-label="Номер телефона - ">8(976)578-90-76</td>
    <td aria-label="email - ">alzonozina@yandex.ru</td>
    </tr>
    <tr>
    <td aria-label="Контактное лицо - ">Елена</td>
    <td aria-label="Должность - ">Директор</td>
    <td aria-label="Номер телефона - ">8(946)864-67-76</td>
    <td aria-label="email - ">kkmadrid@mail.ru</td>
    </tr>
</tbody>
</table>

</div>
<div class="map">

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1065.7347077219756!2d37.58226000393093!3d55.64202347840169!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b536a5bb2ec657%3A0x50e957f7665a6105!2z0JrQodCaINCR0LjRgtGG0LA!5e0!3m2!1sru!2sru!4v1593268735789!5m2!1sru!2sru" width="600" height="450" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

</div>
<div class="contaktme">
<div class="callme">
<br>
  <form name="form_add" method="post" action="">
  <div class="form-column">
      <label for="email">Электронная почта</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="email">
      <label for="name">Имя</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Имя">
      <label for="qu">Вопрос</label>
      <textarea class="form-control" id="qu" name="qu" placeholder="Ваш вопрос" rows="3"></textarea>
  </div>
  <input type="submit" style="margin-top:2%" name="button" class="form-control" value="Задать вопрос!"> 
</form>
<?php
$name = $_POST['name'];
$email = $_POST['email'];
$qu = $_POST['qu'];
$name = (string)$_POST['name'];
$email = (string)$_POST['email'];
$qu = (string)$_POST['qu'];
$mysqli = mysqli_connect('std-mysql', 'std_941', '84996111636', 'std_941');

if( mysqli_connect_errno() ) // проверяем корректность подключения
echo 'Ошибка подключения к БД: '.mysqli_connect_error();
// если были переданы данные для добавления в БД
if( isset($_POST['button']) && $_POST['button']== 'Задать вопрос!')
{ 
// если были переданы данные для добавления в БД

  // формируем и выполняем SQL-запрос для добавления записи
$pre_id=mysqli_query($mysqli, 'SELECT * FROM std_941.questions');
$id=mysqli_num_rows($pre_id)+1;
$sql_res=mysqli_query($mysqli,'INSERT INTO std_941.questions (name, email, question) VALUES ("'.
(string)($_POST['name']).'", "'.
(string)($_POST['email']).'", "'.
(string)($_POST['qu']).
'")');
header("Refresh: 0");
}


?>
  </div>
</div>
</main>
<footer>
<div class="nameofus"><p>ЧК "Мадрид"</p></div>
<div class="footermenu"><a class="footerpodmenu" style="margin-right: 3%;" href="index.php">Главная</a>
<a class="footerpodmenu" style="margin-right: 3%;" href="index1.php">Наши лошади</a>
<a class="footerpodmenu" style="margin-right: 3%" href="index2.php">Наша команда</a>
<a class="footerpodmenu" style="margin-right: 3%" href="index3.php">Отзывы</a>
<a class="footerpodmenu" style="margin-right: 3%" href="index4.html">Контакты</a></div>
<div class="soc">
<a href="#"><img src="http://domenblin.std-941.ist.mospolytech.ru/2sem_laba4/4web/Vector%284%29.png" alt=""></a>
</div>
</footer>
</body>
</html>
