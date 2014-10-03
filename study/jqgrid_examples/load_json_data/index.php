<?php
include_once ('../jqgrid_head.php');
?>

<body>
	<table id="list2"></table>
	<div id="pager2"></div>
</body>
</html>
<script>
	$(document).ready(function() {
		console.log('jsgrid is ok');
		jQuery("#list2").jqGrid({
			url : 'server.php?q=2',
			datatype : "json",
			colNames : ['Inv No', 'Date', 'Client', 'Amount', 'Tax', 'Total', 'Notes'],
			colModel : [{
				name : 'invid',
				index : 'invid',
				width : 55
			}, {
				name : 'invdate',
				index : 'invdate',
				width : 90
			}, {
				name : 'name',
				index : 'name asc, invdate',
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
			pager : '#pager2',
			sortname : 'invid',
			viewrecords : true,
			sortorder : "desc",
			caption : "JSON Example"
		});
		jQuery("#list2").jqGrid('navGrid', '#pager2', {
			edit : false,
			add : false,
			del : false
		});
	}); 
</script>