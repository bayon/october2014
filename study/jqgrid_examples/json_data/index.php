<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />

		<link rel="stylesheet" type="text/css" media="screen" href="../../jq_master/css/jq_ui.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="../../jq_master/css/jqgrid.css" />

		<script src="../../jq_master/js/latest_jquery.js" type="text/javascript"></script>
		<script src="../../jq_master/js/grid.locale-en.js" type="text/javascript"></script>
		<script src="../../jq_master/js/jqGrid_min.js" type="text/javascript"></script>
	</head>
	<body>
		<p>
			jqgrid: json data
		</p>
		<table id="list2"></table>
		<div id="pager2"></div>
	</body>
</html>
<script>
	$(document).ready(function() {
		console.log('jq is on...');
// $responce->rows[$i]['cell']=array($row['invid'],$row['invdate'],$row['client_id'],$row['amount'],$row['tax'],$row['total'],$row['note']);
//?q=2 at the end of urlparam server.php??????
		$("#list2").jqGrid({
			url : 'server.php',
			datatype : "json",
			colNames : ['Inv No', 'Date', 'Client ID', 'Amount', 'Tax', 'Total', 'Notes'],
			colModel : [{
				name : 'invid',
				index : 'invid',
				width : 55
			}, {
				name : 'invdate',
				index : 'invdate',
				width : 90
			}, {
				name : 'client_id',
				index : 'client_id',
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
		$("#list2").jqGrid('navGrid', '#pager2', {
			edit : false,
			add : false,
			del : false
		});

	});

</script>