<?php
 

class Responce{
	public $page;
	public $total;
	public $records;
	public $rows;
	
	public function __construct($page="1",$total="1",$records="1",$rows=array()){
		$this->page = $page;
		$this->total = $total;
		$this->records = $records;
		$this->rows = $rows;
	}
}
?>