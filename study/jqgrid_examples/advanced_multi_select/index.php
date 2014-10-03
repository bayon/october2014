<?php
include_once ('../jqgrid_head.php');
 
?>

<body>
	<table id="list9"></table>
	<div id="pager9"></div>
	<br />
	<a href="javascript:void(0)" id="m1">Get Selected id's</a>
	<a href="javascript:void(0)" id="m1s">Select(Unselect) row 3</a>
</body>
</html>
<script>
	$(document).ready(function() {
		console.log('jsgrid is ok');
		///////////////////////////
		jQuery("#list9").jqGrid({
			url : 'server.php?q=2&nd=' + new Date().getTime(),
			datatype : "json",
			colNames : ['Inv No', 'Date', 'Client', 'Amount', 'Tax', 'Total', 'Notes'],
			colModel : [{
				name : 'id',
				index : 'id',
				width : 55
			}, {
				name : 'invdate',
				index : 'invdate',
				width : 90
			}, {
				name : 'name',
				index : 'name',
				width : 100
			}, {
				name : 'amount',
				index : 'amount',
				width : 80,
				align : "right"
			}, {
				name : 'tax',
				index : 'tax',
				width : 80,
				align : "right"
			}, {
				name : 'total',
				index : 'total',
				width : 80,
				align : "right"
			}, {
				name : 'note',
				index : 'note',
				width : 150,
				sortable : false
			}],
			rowNum : 10,
			rowList : [10, 20, 30],
			pager : '#pager9',
			sortname : 'invid',
			recordpos : 'left',
			viewrecords : true,
			sortorder : "desc",
			multiselect : true,
			caption : "Multi Select Example"
		});
		jQuery("#list9").jqGrid('navGrid', '#pager9', {
			add : false,
			del : false,
			edit : false,
			position : 'right'
		});
		jQuery("#m1").click(function() {
			var s;
			s = jQuery("#list9").jqGrid('getGridParam', 'selarrrow');
			alert(s);
		});
		jQuery("#m1s").click(function() {
			jQuery("#list9").jqGrid('setSelection', "3");
		});
		/////////////////////////
	}); 
</script>