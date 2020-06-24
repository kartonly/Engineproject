<!DOCTYPE html>
<html>
<head>
<title>ЧК "Мадрид"</title>
<html lang="en">
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css3.css">
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
			<li><a class="menu__item" href="index4.html">Контакты</a></li>
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
<a class="headmenu" href="index4.html">Контакты</a></div>
</header>
<main>

<div class="headercont"></div>

<div class="reviews">
    <h1>Отзывы клиентов</h1>
    <?php
$mysqli = mysqli_connect('std-mysql', 'std_941', '84996111636', 'std_941');
if( mysqli_connect_errno() ) // проверяем корректность подключения
return 'Ошибка подключения к БД: '.mysqli_connect_error();
$sql_res=mysqli_query($mysqli,"SELECT * FROM review");
$sql_res = mysqli_query($mysqli,'SELECT COUNT(`c`.`name`) `count` FROM  `review` `c`') or die($mysqli_error());
while ($row = mysqli_fetch_assoc($sql_res))
echo '<h2>Всего отзывов - '.$row['count'].'</h2>';
?>  
<?php
include 'viewer3.php'; 
// подключаеммодульсбиблиотекойфункций
// есливпараметрахнеуказанатекущаястраница – выводимсамуюпервую
if( !isset($_GET['pg']) || $_GET['pg']<0 ) $_GET['pg']=0; 
// есливпараметрахнеуказантипсортировкиилионнедопустим
if(!isset($_GET['sort']) || ($_GET['sort']!='byid' && $_GET['sort']!='fam' &&     $_GET['sort']!='birth'))  $_GET['sort']='byid'; 
// устанавливаемсортировкупоумолчанию// формируемконтентстраницыспомощьюфункцииивыводимего
echo getFriendsList($_GET['sort'], $_GET['pg']); 
?>


</div>



<div class="formforreview">
<form class="transparent" name="form_add" method="post" action="">
   <div class="form-inner">
    <h3>Напишите отзыв</h3>
     <label for="name">Имя</label>
     <input type="text" id="name" name="name" placeholder="Имя">
     <label for="surname">Фамилия</label>
     <input id="surname" type="text" name="surname" placeholder="Фамилия">
     <label for="document">Ваш отзыв</label>
     <textarea id="document" type="text" name="document" placeholder="Отзыв"></textarea>
     <input type="submit" name="button" class="form-control" value="Опубликовать"> 
  </div>
</form>

<?php
$name = $_POST['name'];
$surname = $_POST['surname'];
$document = $_POST['document'];
$name = (string)$_POST['name'];
$phonenum = (string)$_POST['phonenum'];
$document = (string)$_POST['document'];
$mysqli = mysqli_connect('std-mysql', 'std_941', '84996111636', 'std_941');

if( mysqli_connect_errno() ) // проверяем корректность подключения
echo 'Ошибка подключения к БД: '.mysqli_connect_error();
// если были переданы данные для добавления в БД
if( isset($_POST['button']) && $_POST['button']== 'Опубликовать')
{ 
// если были переданы данные для добавления в БД

  // формируем и выполняем SQL-запрос для добавления записи
$pre_id=mysqli_query($mysqli, 'SELECT * FROM std_941.review');
$id=mysqli_num_rows($pre_id)+1;
$sql_res=mysqli_query($mysqli,'INSERT INTO std_941.review (name, surname, document) VALUES ("'.
(string)($_POST['name']).'","'.
(string)($_POST['surname']).'", "'.
(string)($_POST['document']).
'")');
$name = '';
$surname = '';
$document = '';
}
?>
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

  </div>
</footer>
</body>
</html>
