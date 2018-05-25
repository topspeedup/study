<?php
$conn = mysqli_connect('45.33.81.121','test','test6666','test','3306');
$sql = "select PageUrl from data_content_263 where 内容 = 'www.baidu.com'";
$res = mysqli_query($conn,$sql);
$arr=array();
while($row = mysqli_fetch_array($res)){
	array_push($arr,$row);
}
var_dump($arr);