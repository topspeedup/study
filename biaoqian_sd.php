<?php

// 三大标签文本替换源码，但是在生成的时候

//注意：需要进行编码定义后重新写入到文件

//$content = file_get_contents('index.htm');
$myfile = fopen("index.htm", "w+") or die("文件不存在，请先建立网站!");
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
$conn = mysqli_connect('45.33.81.121','test','test6666','test','3306');
$sql3 = 'select 文件夹 from A_domain where 域名 = "' . $domain . '"';//取根据随机数查询对应的模板内容
$result = mysqli_query($conn,$sql3);
while($data = mysqli_fetch_array($result)){
$wenjianjia1 = $data['文件夹'];//获取具体的文件夹路径
//echo $sql3;
mysql_close($conn);//关闭数据库连接
}
//echo $sql3;
$lujing = '/www/web/' . $domain . '/public_html/' . $wenjianjia1 . '/index.htm';


//unlink($lujing);//删除首页

//unlink('index.htm');//删除首页

//echo $lujing;
$myfile = fopen($lujing, "w+") or die("文件不存在，请先建立网站!");//建立对应的文件
fwrite($myfile, $content);//将替换好的内容写入到文件
fclose($myfile);//写入完毕关闭文件


$myfile = fopen('index.htm', "w+") or die("文件不存在，请先建立网站!");//建立对应的文件
fwrite($myfile, $content);//将替换好的内容写入到文件
fclose($myfile);//写入完毕关闭文件


echo $title;
echo $keywords;
echo $description;

echo $content;


	


