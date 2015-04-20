<?php

class PhpEngine{
	public $currentTplPath;

	private $params = array();

	function __construct(){

	}

	/**
	 * @param array $params 参数
	 * @param string $fileName 文件 (路径为 view/$fileName)
	 * @return string 返回渲染完成后的html代码
	 */
	function fetch($params,$fileName){
		$filePath = 'view'.'/'.$fileName;
		$this->currentTplPath = dirname($filePath);
		if(!file_exists($filePath)){
			die('File "'.$filePath.'" does not exists!');
		}
		ob_start();
		extract($params);
		include $filePath;
		$ret = ob_get_contents();
		ob_end_clean();
		return $ret;
	}

	function display($fileName){
		$html = $this->fetch($this->params,$fileName);
		echo $html;
	}

	function assign($name,$value){
		$this->params[$name] = $value;
	}

}