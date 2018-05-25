<?php
namespace app\index\controller;
use think\Db;

class Index
{
    public function index()
    {
		$where = [
			'内容' => 'www.baidu.com'
		];
		$res = Db::name('data_content_263')->where($where)->value('PageUrl');
		var_dump($res);
    }
	
	public function direc(){
		$str = input('post.str',false);
		$data = explode("\n",$str);
		foreach($data as $v){
			var_dump($v);die;
		}
	}
}
