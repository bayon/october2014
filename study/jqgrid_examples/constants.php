<?php
//invheaders and clients
define("id","invid");
define("invdate","invdate");
define("name","name");
define("amount","amount");
define("tax","tax");
define("total","total");
define("note","note");
//invlines
define("num", "num");
define("item", "item");
define("qty", "qty");
define("unit", "unit");

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