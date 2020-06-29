<?php
function getFriendsList($type, $page)
{
// осуществляем подключение к базе данных
$mysqli = mysqli_connect('std-mysql', 'std_941', '84996111636', 'std_941');
if( mysqli_connect_errno() ) // проверяем корректность подключения
return 'Ошибка подключения к БД: '.mysqli_connect_error();
// формируем и выполняем SQL-запрос для определения числа записей
$sql_res=mysqli_query($mysqli, 'SELECT COUNT(*) FROM std_941.review');
// проверяем корректность выполнения запроса и определяем его результат
if( !mysqli_errno($mysqli) && $row=mysqli_fetch_row($sql_res) )
{
if( !$TOTAL=$row[0] ) // если в таблице нет записей
return 'В таблице нет данных'; // возвращаем сообщение
$PAGES = ceil($TOTAL/10);// вычисляем общее количество страниц
if( $page>=$PAGES ) // если указана страница больше максимальной
$page=$TOTAL-1; // будем выводить последнюю страницу
$diapazon=$page*10;
if ($_GET['sort'] == 'byid')// формируем и выполняем SQL-запрос для выборки записей из БД
$sql='SELECT * FROM std_941.review LIMIT '.$diapazon.', 10';
if ($_GET['sort'] == 'fam')
$sql='SELECT * FROM std_941.review ORDER BY name LIMIT '.$diapazon.', 10';
if ($_GET['sort'] == 'birth')
$sql='SELECT * FROM std_941.review ORDER BY name LIMIT '.$diapazon.', 10';
$sql_res=mysqli_query($mysqli, $sql);
$ret='<div style="background-color:#f3f9ec; border-bottom: 4px solid #e38445;" class="reviewslist">'; // строка с будущим контентом страницы
while( $row=mysqli_fetch_assoc($sql_res) ) // пока есть записи
{
// выводим каждую запись как строку таблицы
$ret.='<div class="reviewcard" style="padding:3%;">
<b>'.$row['id'].'.'.$row['name'].' '.$row['surname'].'</b>
<p>'.$row['document'].'</p>
<div class="butons">
<input style="border-radius: 10px;"  type="submit" name="edit" class="form-control" value="Редактировать отзыв" data-toggle="modal" data-target="#myModal'.$row['id'].'">
<form style="border-radius: 10px;" class="form-control" name="form_updel" method="post" action="">
<input style="border-radius: 10px; border:0px;" type="submit" name="del" class="form-control" value="Удалить отзыв">
<input style="display:none;" name="numup" class="form-control" value='.$row['id'].'> </form>
</div>
</div>
<div class="modal" style="z-index:200000000" id="myModal'.$row['id'].'">
    <div class="modal-dialog">
      <div class="modal-content">
      
        
        <div class="modal-header">
          <h4 class="modal-title">Редактирование отзыва</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        
        <div class="modal-body">
        <form class="form-control" name="form_up" method="post" action="">
        <input name="numup2" class="form-control" value='.$row['id'].'>
        <label for="nameup'.$row['id'].'">Имя</label>
        <input class="form-control" type="text" id="nameup'.$row['id'].'" name="nameup" placeholder="Имя" value='.$row['name'].'>
        <label for="surnameup'.$row['id'].'">Фамилия</label>
        <input  class="form-control" id="surnameup'.$row['id'].'" type="text" name="surnameup" placeholder="Фамилия" value='.$row['surname'].'>
        <label for="documentup'.$row['id'].'">Ваш отзыв</label>
        <textarea  class="form-control" id="documentup'.$row['id'].'" name="documentup" placeholder="Отзыв">'.$row['document'].'</textarea>
        <input type="submit" name="buttonupdate" class="form-control" value="Опубликовать отзыв" > 
        </form>
        </div>
        
      
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
';


if( isset($_POST['buttonupdate']) && $_POST['buttonupdate']== 'Опубликовать отзыв'){
  $numup = $_POST['numup2'];
  $nameup = $_POST['nameup'];
  $surnameup = $_POST['surnameup'];
  $documentup = $_POST['documentup'];
  $numup=(int)$_POST['numup2'];
  $nameup = (string)$_POST['nameup'];
  $surnameup = (string)$_POST['surnameup'];
  $documentup = (string)$_POST['documentup'];
  $mysqli = mysqli_connect('std-mysql', 'std_941', '84996111636', 'std_941');
$sql_res=mysqli_query($mysqli,'UPDATE std_941.review SET name="'.$nameup.'", surname="'.$surnameup.'", document="'.$documentup.'" WHERE id='.$numup.'');
$nameup = '';
$surnameup = '';
$documentup = '';
header("Refresh: 0");
};

if( isset($_POST['del'])){
  $numup = $_POST['numup'];
  $numup=(int)$_POST['numup'];
$mysqli = mysqli_connect('std-mysql', 'std_941', '84996111636', 'std_941');
  $query ="DELETE FROM review WHERE id = ".$numup."";
  $result = mysqli_query($mysqli, $query) or die("Ошибка " . mysqli_error($mysqli)); 

  // перенаправление
  header("Refresh: 0");
}

}
$ret.='</div>'; // заканчиваем формирование таблицы с контентом
if( $PAGES>1 ) // если страниц больше одной – добавляем пагинацию
{
$ret.='<div id="pages">Выберите страницу: '; // блок пагинации
for($i=0; $i<$PAGES; $i++) // цикл для всех страниц пагинации
if( $i != $page ) // если не текущая страница
$ret.='<a href="?p=viewer&pg='.$i.'&sort='.$_GET['sort'].'"> '.($i+1).'</a>';
else // если текущая страница
$ret.='<span> '.($i+1).'</span>';
$ret.='</div>';
}
return $ret; // возвращаем сформированный контент
}
// если запрос выполнен некорректно
return 'Неизвестная ошибка'; // возвращаем сообщение

} 
?>
