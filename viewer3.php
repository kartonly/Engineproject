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
<input type="submit" name="edit" id="edit" class="form-control" value="Редактировать отзыв" data-toggle="modal" data-target="#myModal">
<form class="form-control" name="form_updel" method="post" action="">
<input type="submit" name="del" id="del" class="form-control" value="Удалить отзыв">
<input style="display:none;" name="numup" class="form-control" value='.$row['id'].'> </form>
</div>
</div>
<div class="modal" style="z-index:200000000" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        
        <div class="modal-header">
          <h4 class="modal-title">Редактирование отзыва</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        
        <div class="modal-body">
        <form class="form-control" name="form_up" method="post" action="">
        <label for="nameup">Имя</label>
        <input class="form-control" type="text" id="nameup" name="nameup" placeholder="Имя">
        <label for="surnameup">Фамилия</label>
        <input  class="form-control" id="surnameup" type="text" name="surnameup" placeholder="Фамилия">
        <label for="documentup">Ваш отзыв</label>
        <textarea  class="form-control" id="documentup" type="text" name="documentup" placeholder="Отзыв"></textarea>
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


if( isset($_POST['edit'])){
  $numup = $_POST['numup'];
  $nameup = $_POST['nameup'];
  $surnameup = $_POST['surnameup'];
  $documentup = $_POST['documentup'];
if( isset($_POST['buttonupdate']) && $_POST['buttonupdate']== 'Опубликовать отзыв'){
  $numup=(int)$_POST['numup'];
  $nameup = (string)$_POST['nameup'];
  $surnameup = (string)$_POST['surnameup'];
  $documentup = (string)$_POST['documentup'];
  $pre_id=mysqli_query($mysqli, 'SELECT * FROM std_941.review');
$id=mysqli_num_rows($pre_id)+1;
$sql_res=mysqli_query($mysqli,'UPDATE std_941.review SET name="'.$nameup.'", surname="'.$surnameup.'", document="'.$documentup.'" WHERE id='.$numup.'');
$nameup = '';
$surnameup = '';
$documentup = '';
}};
if( isset($_POST['del'])){
  $numup = $_POST['numup'];
  $numup=(int)$_POST['numup'];
$mysqli = mysqli_connect('std-mysql', 'std_941', '84996111636', 'std_941');
  $query ="DELETE FROM review WHERE id = ".$numup."";
  $result = mysqli_query($mysqli, $query) or die("Ошибка " . mysqli_error($mysqli)); 

  // перенаправление
  header('Location: index3.php');
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
