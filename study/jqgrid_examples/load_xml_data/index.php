<?php
include_once ('../jqgrid_head.php');
?>

<body>
	<table id="list1"></table>
	<div id="pager1"></div>
</body>
</html>
<script>
	$(document).ready(function() {
		console.log('jsgrid is ok');
		jQuery("#list1").jqGrid({
			url : 'server.php?q=1',
			datatype : "xml",
			colNames : ['Inv No', 'Date', 'Client', 'Amount', 'Tax', 'Total', 'Notes'],
			colModel : [{
				name : 'invid',
				index : 'invid',
				width : 75
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
			autowidth : true,
			rowList : [10, 20, 30],
			pager : jQuery('#pager1'),
			sortname : 'invid',
			viewrecords : true,
			sortorder : "desc",
			caption : "XML Example"
		}).navGrid('#pager1', {
			edit : false,
			add : false,
			del : false
		});
	}); 
</script>

