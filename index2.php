<!DOCTYPE html>
<html lang="ru">
<head>
<title>ЧК "Мадрид" - Наша команда</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css2.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Work+Sans:400,700&display=swap" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet"> 
</head>
<body>
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
<h1>Наша команда</h1>
<?php
$mysqli = mysqli_connect('std-mysql', 'std_941', '84996111636', 'std_941');
if( mysqli_connect_errno() ) // проверяем корректность подключения
return 'Ошибка подключения к БД: '.mysqli_connect_error();
$sql_res=mysqli_query($mysqli,"SELECT * FROM coaches");
$sql_res = mysqli_query($mysqli,'SELECT COUNT(`c`.`name`) `count` FROM  `coaches` `c`') or die($mysqli_error());
while ($row = mysqli_fetch_assoc($sql_res))
echo '<h2>Членов команды - '.$row['count'].'</h2>';
?>
<?php
include 'viewer2.php'; 
// подключаеммодульсбиблиотекойфункций
// есливпараметрахнеуказанатекущаястраница – выводимсамуюпервую
if( !isset($_GET['pg']) || $_GET['pg']<0 ) $_GET['pg']=0; 
// есливпараметрахнеуказантипсортировкиилионнедопустим
if(!isset($_GET['sort']) || ($_GET['sort']!='byid' && $_GET['sort']!='fam' &&     $_GET['sort']!='birth'))  $_GET['sort']='byid'; 
// устанавливаемсортировкупоумолчанию// формируемконтентстраницыспомощьюфункцииивыводимего
echo getFriendsList($_GET['sort'], $_GET['pg']); 
?>
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
</body></html>
