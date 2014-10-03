<?php
include_once ('../jqgrid_head.php');
?>

<body>
	<table id="list6"></table>
	<div id="pager6"></div>
	<br />
	<a href="javascript:void(0)" id="g1" onclick="alert(jQuery('#list6').jqGrid('getGridParam','url'));">Get url</a>
	<br />
	<a href="javascript:void(0)" id="g2" onclick="alert(jQuery('#list6').jqGrid('getGridParam','sortname'));">Get Sort Name</a>
	<br />
	<a href="javascript:void(0)" id="g3" onclick="alert(jQuery('#list6')jqGrid('getGridParam','sortorder'));">Get Sort Order</a>
	<br />
	<a href="javascript:void(0)" id="g4" onclick="alert(jQuery('#list6')jqGrid('getGridParam','selrow'));">Get Selected Row</a>
	<br />
	<a href="javascript:void(0)" id="g5" onclick="alert(jQuery('#list6')jqGrid('getGridParam','page'));">Get Current Page</a>
	<br />
	<a href="javascript:void(0)" id="g6" onclick="alert(jQuery('#list6').jqGrid('getGridParam','rowNum'));">Get Number of Rows requested</a>
	<br />
	<a href="javascript:void(0)" id="g7" onclick="alert('See Multi select rows example');">Get Selected Rows</a>
	<br />
	<a href="javascript:void(0)" id="g8" onclick="alert(jQuery('#list6').jqGrid('getGridParam','datatype'));">Get Data Type requested</a>
	<br />
	<a href="javascript:void(0)" id="g9" onclick="alert(jQuery('#list6').jqGrid('getGridParam','records'));">Get number of records in Grid</a>

</body>
</html>
<script>
	$(document).ready(function() {
		console.log('jsgrid is ok');
		////////////////////////////

		jQuery("#list6").jqGrid({
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
			//rowList:[10,20,30],
			pager : '#pager6',
			sortname : 'invid',
			viewrecords : true,
			sortorder : "desc",
			onSortCol : function(name, index) {
				alert("Column Name: " + name + " Column Index: " + index);
			},
			ondblClickRow : function(id) {
				alert("You double click row with id: " + id);
			},
			caption : " Get Methods",
			height : 200
		});
		jQuery("#list6").jqGrid('navGrid', "#pager6", {
			edit : false,
			add : false,
			del : false
		});
		////////////////////////////
	}); 
</script>