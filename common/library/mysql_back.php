<?php
namespace common\library;
/**
 * 功能描述：数据库备份+还原操作;
 * @Auther：Desperado;
 * @date:2017-7-18;
 */
class mysql_back{
	private $config;  //加载配置项;
	private $content;
	private $dbname = array();//操作的数据库;

	const DIR_SEP = '/';
	/**
	 * 构造方法
	 * @param [type] $config [description]传入配置项内容;
	 */
	public function __construct($config){
		header("Content-type:text/html;charset=utf-8");
		$this->config = $config;
		$this->connect();
	}
	/**
	 * 连接数据库
	 */
	public function connect(){
		$base = mysqli_connect($this->config['host']. ':' . $this->config['port'], $this->config['username'], $this->config['password']);
		if ($base) {  
                mysqli_query($base,"SET NAMES '{$this->config['charset']}'");  
                mysqli_query($base,"set interactive_timeout=24*3600");  
        } else {  
                $this->throwException('无法连接到数据库!');  
        }  
	}
	/**
	 * 设置欲备份的数据库
	 * @param  string $dbname [description]
	 * @return [type]         [description]
	 */
	public function setdbname($dbname='*'){
		if($dbname=='*'){
			$rs = mysql_list_dbs();//获取连接的数据库所有数据表；
			$rows = mysql_num_rows($rs);//获取返回的数据表个数;
			if($rows){
				for($i=0;$i<$rows;$i++){
					$dbname = mysql_tablename($rs,$i);
					var_dump($dbname);
				}
			}else{
				$this->throwException("没有任何数据库");
			}
		}else{
			$this->dbname = func_get_args();  
		}
		//return $this->dbname;

	}
	/**
	 * 获取备份文件
	 * @param  [type] $filename [description]
	 * @return [type]           [description]
	 */
	private function getfile($filename){
		$this->content="";
		$fileName = $this->trimPath($this->config['path'].self::DIR_SEP.$filename);
		if(is_file($fileName)){
			$ext = strrchr($fileName, '.'); //查找字符串在另一个字符串中最后一次出现的位置，并返回从该位置到字符串结尾的所有字符
			if($ext =='.sql'){
				$this->content = file_get_contents($fileName);//打开文件
			}elseif ($ext=='.gz') {
				$this->content = implode('',gzfile($fileName));
			}else{
				$this->throwException("无法识别改文件格式");
			}
		}
	}
	/**
	 * 备份文件
	 */
	private function setfile(){
		$recognize = '';
		$recognize = explode('_', $this->dbname);
		$fileName = $this->trimPath($this->config['path'].self::DIR_SEP.$recognize.'_'.date('YmdHis').'_'.mt_rand(100000000,999999999).'.sql');
		$path = $this->setPath($fileName);
	}
	/**
	 * 转义
	 * @param  [type] $path [description]
	 * @return [type]       [description]
	 */
	private function trimPath($path){
		return str_replace(array('/','\\','//','\\\\'), self::DIR_SEP, $path);
	}
	/**
	 * 设置并创建目录
	 * @param [type] $fileName [description]
	 */
	private function setPath($fileName){
		$dirs = explode(self::DIR_SEP,dirname($fileName));
		$tmp="";
		foreach($dirs as $dir){
			$tmp .= $dir.self::DIR_SEP;
			if(!file_exists($tmp) && !@mkdir($tmp,0777)){
				return $tmp;
			} 
		}
		return true;
	}
	/**
	 * 下载文件
	 * @param  [type] $filename [description]
	 * @return [type]           [description]
	 */
	private function downloadfile($filename){
		header("Cache-Control:must-revalidate,post-check=0,post-check=0");
		header('Content-Description: File Transfer');  
        header('Content-Type: application/octet-stream');  
        header('Content-Length: ' . filesize($fileName));  
        header('Content-Disposition: attachment; filename=' . basename($fileName));  
        readfile($fileName); 

	}
	/**
	 * 给表明或者数据库加上 ``
	 * @param  [type] $str [description]
	 * @return [type]      [description]
	 */
	private function backquote($str){
		return "`{$str}`";
	}
	private function getTables($dbname){
		$rs = Yii::$app->db->createCommand("SHOW　ＴＡＢＬＥ STATUS")->queryAll();
	}

}








?>