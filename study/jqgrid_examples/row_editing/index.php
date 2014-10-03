<?php
include_once ('../jqgrid_head.php');
?>

<body>
	<table id="rowed5"></table>
	 
	<br />
</body>
</html>
<script>
	$(document).ready(function() {
		console.log('jsgrid is ok');

		////////////////////////////
		var
		lastsel;
		jQuery("#rowed3").jqGrid({
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
				width : 90,
				editable : true
			}, {
				name : 'name',
				index : 'name',
				width : 100,
				editable : true
			}, {
				name : 'amount',
				index : 'amount',
				width : 80,
				align : "right",
				editable : true
			}, {
				name : 'tax',
				index : 'tax',
				width : 80,
				align : "right",
				editable : true
			}, {
				name : 'total',
				index : 'total',
				width : 80,
				align : "right",
				editable : true
			}, {
				name : 'note',
				index : 'note',
				width : 150,
				sortable : false,
				editable : true
			}],
			rowNum : 10,
			rowList : [10, 20, 30],
			pager : '#prowed3',
			sortname : 'invid',
			viewrecords : true,
			sortorder : "desc",
			onSelectRow : function(id) {
				if (id && id !== lastsel) {
					jQuery('#rowed3').jqGrid('restoreRow', lastsel);
					jQuery('#rowed3').jqGrid('editRow', id, true);
					lastsel = id;
				}
			},
			editurl : "server.php",
			caption : "Using events example"
		});
		jQuery("#rowed3").jqGrid('navGrid', "#prowed3", {
			edit : false,
			add : false,
			del : false
		});

		//////////////////////////////
	}); 
</script>