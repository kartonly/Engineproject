<!DOCTYPE html>
<html lang="ru">
<head>
<title>ЧК "Мадрид"</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css.css">
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

<div class="aboutus">
<h1>О нас</h1>
<p>Наш клуб существует уже 10 лет, и все эти 10 лет мы стараемся воплощать Ваши мечты в жизнь. <br>Наша дружная команда не раз была победителем соревно
ваний разного уровня, не раз наши лошади доказывали что они - настоящие бойцы, спортивные партнеры. На наших конюшнях всегда есть лошади, готовые поразмяться на поле конного клуба.<br> Занятия верховой ездой в Москве могут проходить планово, например, несколько раз в неделю в группе или индивидуально, а также вне графика – в наиболее удобное для вас время. Нередко по выходным к нам приезжают целыми семьями, ведь активный отдых с лошадьми – удовольствие, с которым ничто не сравниться.
<br>
Школа верховой езды проводит обучение верховой езде детей с 5 лет и дает уроки верховой езды для начинающих вне зависимости от возраста. Для самых маленьких спортсменов мы разработали специальные программы – верховая езда на пони. Такие занятия воспитывают в детях заботу о животных и бережное отношение к природе. Тесная психологическая связь людей с лошадьми способна творить чудеса, и пример тому – эффективность иппотерапии в целях реабилитации.
<br>
Верховая езда надолго станет вашим любимым занятием. Попробовав единожды, вы не сможете и не захотите отказываться от удовольствия снова прокатиться на лошадях.
</p>
<div class="butons">
<a href="index1.php" class="button">Наши лошади</a>
<a href="index4.php" class="button">Контакты</a>
</div>
</div>

<div style="background-color:white; margin-top:4%; margin-bottom:5%;" class="servises">
<div ><img style="width:84%" src="https://kskprovans.ru/img/about-1.png" alt="Преимущество 1"><h2>Около метро</h2><p>Мы находимя в 10 минутах от метро Чертаново в одном из крпнейших КСК Москвы - Битце.</p></div>
<div ><img style="width:90%" src="https://kskprovans.ru/img/about-2.png" alt="Преимущество 2"><h2>Лучшие тренера</h2><p>Наши тренера имеют звания, они победители многих соревнований, а так же действующие спортсмены.</p></div>
<div > <img style="width:90%" src="https://kskprovans.ru/img/about-3.png" alt="Преимущество 3"><h2>Хорошие лошади</h2><p>Характерные, но добрые, настоящие спортсмены, они готовы помочь Вам и на тренировке, и на турнире.</p></div>
</div>

<div class="pricecont">
<div style="height:230px"></div>

<?php
include 'viewer.php'; 
// подключаеммодульсбиблиотекойфункций
// есливпараметрахнеуказанатекущаястраница – выводимсамуюпервую
if( !isset($_GET['pg']) || $_GET['pg']<0 ) $_GET['pg']=0; 
// есливпараметрахнеуказантипсортировкиилионнедопустим
if(!isset($_GET['sort']) || ($_GET['sort']!='byid' && $_GET['sort']!='fam' &&     $_GET['sort']!='birth'))  $_GET['sort']='byid'; 
// устанавливаемсортировкупоумолчанию// формируемконтентстраницыспомощьюфункцииивыводимего
echo getFriendsList($_GET['sort'], $_GET['pg']); 
?>
</div>

<div class="contaktme">
  <div class="callme">
<br>
  <form name="form_add" method="post" action="">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="phonenum">Номер телефона</label>
      <input class="form-control" id="phonenum" name="phonenum" placeholder="Номер телефона">
    </div>
    <div class="form-group col-md-6">
      <label for="name">Имя</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Имя">
    </div>
  </div>
  <input type="submit" name="button" class="form-control" value="Перезвоните мне!"> 
</form>
<?php
$name = $_POST['name'];
$phonenum = $_POST['phonenum'];
$name = (string)$_POST['name'];
$phonenum = (int)$_POST['phonenum'];
$mysqli = mysqli_connect('std-mysql', 'std_941', '84996111636', 'std_941');

if( mysqli_connect_errno() ) // проверяем корректность подключения
echo 'Ошибка подключения к БД: '.mysqli_connect_error();
// если были переданы данные для добавления в БД
if( isset($_POST['button']) && $_POST['button']== 'Перезвоните мне!')
{ 
// если были переданы данные для добавления в БД

  // формируем и выполняем SQL-запрос для добавления записи
$pre_id=mysqli_query($mysqli, 'SELECT * FROM std_941.callme');
$id=mysqli_num_rows($pre_id)+1;
$sql_res=mysqli_query($mysqli,'INSERT INTO std_941.callme (name, phonenum) VALUES ("'.
(string)($_POST['name']).'", "'.
(int)($_POST['phonenum']).
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
