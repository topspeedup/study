

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>欢迎使用自助建站系统</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
</head>
<body>



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

</body>
</html>

<?php



function biaoqian_sd(){
	//先把文件读进来
	//$content = file_get_contents('index.htm');
	$myfile = fopen("index.htm", "r") or die("文件不存在，请先建立网站!");
	$content = fread($myfile,filesize("index.htm"));
	fclose($myfile);

	$title = $_POST['title'];
	$keywords = $_POST['keywords'];
	$description = $_POST['description'];
	//去除所有的空格和换行符,只保留一个,貌似无效
	$content = preg_replace("/([\s]{2,})/","\\1",$content);

	//去除三大标签
	$content = preg_replace("/<title(.*)title>/U", "", $content);	
	$content = preg_replace("/<meta name(.*)keywords(.*)>/U", "", $content);
	$content = preg_replace("/<meta name(.*)description(.*)>/U", "", $content);
	//在head后面新增三大标签
	$content = preg_replace("/<head>/U", '<head>
	<title>' . $title . '</title>
	<meta name="keywords" content="' . $keywords . '" />
	<meta name="description" content="' . $description . '" />', $content);
	$domain = $_SERVER["HTTP_HOST"];
	//echo $sql3;
	//unlink($lujing);//删除首页
	//unlink('index.htm');//删除首页
	
	$myfile = fopen('index1.htm', "w") or die("文件不存在，请先建立网站!");//建立对应的文件
	fwrite($myfile, $content);//将替换好的内容写入到文件
	fclose($myfile);//写入完毕关闭文件
	echo $title;
	echo $keywords;
	echo $description;
	//echo $content;
	$url_address = 'http://itjjj.com/index1.htm';
	$dakai = "<script> window.open('{$url_address}')</script>";
	echo $dakai;//打开新窗口
}

if ($_GET["do"]=="biaoqian_sd"){
	biaoqian_sd();
}

?>
