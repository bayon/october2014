<?php
include_once ('../jqgrid_head.php');
?>

<body>
	<table id="list5"></table>
	<div id="pager5"></div>
	<br />
	<a href="#" id="a1">Get data from selected row</a>
	<br />
	<a href="#" id="a2">Delete row 2</a>
	<br />
	<a href="#" id="a3">Update amounts in row 1</a>
	<br />
	<a href="#" id="a4">Add row with id 99</a>
	<script src="manipex.js" type="text/javascript"></script>
	<br />
</body>
</html>
<script>
	$(document).ready(function() {
		console.log('jsgrid is ok');
		jQuery("#list5").jqGrid({
			url : 'server.php?q=2',
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
			pager : '#pager5',
			sortname : 'invid',
			viewrecords : true,
			sortorder : "desc",
			caption : "Simple data manipulation",
			editurl : "someurl.php"
		}).navGrid("#pager5", {
			edit : false,
			add : false,
			del : false
		});
		jQuery("#a1").click(function() {
			var id = jQuery("#list5").jqGrid('getGridParam', 'selrow');
			if (id) {
				var ret = jQuery("#list5").jqGrid('getRowData', id);
				alert("id=" + ret.id + " invdate=" + ret.invdate + "...");
			} else {
				alert("Please select row");
			}
		});
		jQuery("#a2").click(function() {
			var su = jQuery("#list5").jqGrid('delRowData', 2);
			if (su)
				alert("Succes. Write custom code to delete row from server");
			else
				alert("Allready deleted or not in list");
		});
		jQuery("#a3").click(function() {
			var su = jQuery("#list5").jqGrid('setRowData', 1, {
				amount : "333.00",
				tax : "33.00",
				total : "366.00",
				note : "<img src='images/user1.gif'/>"
			});
			if (su)
				alert("Succes. Write custom code to update row in server");
			else
				alert("Can not update");
		});
		jQuery("#a4").click(function() {
			var datarow = {
				id : "99",
				invdate : "2007-09-01",
				name : "test3",
				note : "note3",
				amount : "400.00",
				tax : "30.00",
				total : "430.00"
			};
			var su = jQuery("#list5").jqGrid('addRowData', 99, datarow);
			if (su)
				alert("Succes. Write custom code to add data in server");
			else
				alert("Can not update");
		});
	}); 
</script>