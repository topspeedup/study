
<?php


function zhengpin(){
	$domain = $_SERVER['HTTP_HOST'];
	//$domain = 'a123.com';
	$conn = mysqli_connect('45.33.81.121','test','test6666','test','3306');
	$sql = "select * from A_domain where 域名 = '" . $domain . "'";
	//echo $sql;
	$res = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($res);
	$wenjianjia = $row['文件夹'];
	$mobanid = $row['模板ID'];
	//echo '-------';
	//echo $mobanid;
	//echo '-------';
	//echo $wenjianjia;
	$url_address = 'http://' . $domain . '/' . $wenjianjia . '/index.htm';
	mysqli_close($conn);//关闭数据库连接
	//输出数据库查询到的站点地址
	$dakai = "<script> window.open('{$url_address}')</script>";
	echo $dakai;//打开正品新窗口

	//echo $url_address;
}



function jianzhan(){
	$auto = 'YES';
	require_once('/www/web/moban/web_dir.php');	//调用建站php
}

function shuaxin(){
   echo "<script language=\"JavaScript\">alert(\"我是shuaxin\");</script>";
}

function shanchu(){

echo '<div style="padding: 20px 20px;">'; 
echo '<input type="submit" onclick="javascript:queren()" style="color: #FF0000;float: left;font-size: 18px;height: 50px;width: 100px;" value="确认删除"/>';
echo '<br/></div>'; 
}

function queren(){  
   require_once('/www/web/moban/remove.php');
}

function qie(){
   echo "<script language=\"JavaScript\">alert(\"预留功能，请耐心等候\");</script>";
}
function guale(){
   echo "<script language=\"JavaScript\">alert(\"我是guale\");</script>";
}

function fangpin(){
	$domain = $_SERVER['HTTP_HOST'];
	$url_address = 'http://' . $domain . '/fangpin.htm';
	$dakai = "<script> window.open('{$url_address}')</script>";
	echo $dakai;//打开正品新窗口
}

function shoudong_jz(){
   $auto = 'NO';
   $num = $_POST['moban'];
   require_once('/www/web/moban/web_dir.php');	//调用手动建站
   //echo "<script language=\"JavaScript\">alert(\"我是sdjianzhan\");</script>";
}
if($_GET["do"]=="jianzhan"){
	jianzhan();
}elseif ($_GET["do"]=="shuaxin") {
	shuaxin();
}elseif ($_GET["do"]=="shanchu") {
	shanchu();
}elseif ($_GET["do"]=="qie") {
	qie();
}elseif ($_GET["do"]=="guale") {
	guale();
}elseif ($_GET["do"]=="zhengpin") {
	zhengpin();
}elseif ($_GET["do"]=="fangpin") {
	fangpin();
}elseif ($_GET["do"]=="queren") {
	queren();
}elseif ($_GET["do"]=="shoudong_jz") {
	shoudong_jz();
}elseif ($_GET["do"]=="biaoqian_sd"){
	echo '手动标签';//调用建站php;//判断为手动自定义三大标签
	require_once('/www/web/moban/biaoqian_ok.php');
	
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>欢迎使用自助建站系统</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
</head>
<body>


<H2>欢迎使用自助建站系统</H2>




<script type="text/javascript">
 function jianzhan(){
    document.location.href="?do=jianzhan";
 }
 
  function shuaxin(){
    document.location.href="?do=shuaxin";
 }
 
   function shanchu(){
    document.location.href="?do=shanchu";
 }
 
    function queren(){
    document.location.href="?do=queren";
 }
 
   function qie(){
    document.location.href="?do=qie";
 }
 
   function guale(){
    document.location.href="?do=guale";
 }
 
   function zhengpin(){
	document.location.href="?do=zhengpin";
 }
 
   function fangpin(){
    document.location.href="?do=fangpin";
 }

</script>




<div style="float: left;padding-left: 30px;">

<input type="submit" onclick="javascript:jianzhan()" style="font-size: 18px;height: 50px;width: 100px;" value="建站"/>

</div>

<div style="float: left;padding-left: 30px;">

<input type="submit" onclick="javascript:shuaxin()" style="font-size: 18px;height: 50px;width: 100px;" value="刷新标签"/>

</div>


<div style="float: left;padding-left: 30px;">
<input type="submit" onclick="javascript:shanchu()" style="font-size: 18px;height: 50px;width: 100px;" value="删除重建"/>
</div>

<div style="float: left;padding-left: 30px;">
<input type="submit" onclick="javascript:qie()" style="font-size: 18px;height: 50px;width: 100px;" value="切"/>
</div>


<div style="float: left;padding-left: 30px;padding-right:30px;">
<input type="submit" onclick="javascript:guale()" style="font-size: 18px;height: 50px;width: 100px;" value="挂了"/>
</div>



<div style="float: left;padding-left: 30px;padding-right:30px;">
<input type="submit" onclick="javascript:zhengpin()" style="font-size: 18px;height: 50px;width: 100px;" value="查看正品"/>
</div>


<div>
<input type="submit" onclick="javascript:fangpin()" style="font-size: 18px;height: 50px;width: 100px;" value="查看仿品"/>
</div>

<br>


<form action="?do=shoudong_jz" method="POST">
<H3>自定义模板建站</H3>
<H5>请输入ID编号，例如：</H5>
<textarea name="moban" rows="2" cols="20" id="moban" style="height:30px;width:318px;">2</textarea>
<input type="submit" style="font-size: 18px;height: 50px;width: 100px;" value="建站"/>

</form>




<form action="?do=biaoqian_sd" method="POST" target="_blank">
<H3>自定义标签</H3>
<textarea name="title" rows="2" cols="20" id="content" style="height:30px;width:318px;">标题</textarea>
<br/>
<textarea name="keywords" rows="2" cols="20" id="content" style="height:30px;width:318px;">关键词</textarea>
<br/>
<textarea name="description" rows="2" cols="20" id="content" style="height:30px;width:318px;">描述</textarea>
<br/>

<input type="submit" style="font-size: 18px;height: 50px;width: 318px;" value="提交"/>
</form>


<br/><br/>

</body>






</html>

