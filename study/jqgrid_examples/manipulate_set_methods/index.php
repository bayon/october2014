<?php
include_once ('../jqgrid_head.php');
?>

<body>
	<table id="list7"></table>
	<div id="pager7"></div>
	<br />
	<a href="javascript:void(0)" id="s1">1 Set new url</a>
	<br />
	<a href="javascript:void(0)" id="s2">2 Set Sort to amount column</a>
	<br />
	<a href="javascript:void(0)" id="s3" >3 Set Sort new Order</a>
	<br />
	<a href="javascript:void(0)" id="s4">4 Set to view second Page</a>
	<br />
	<a href="javascript:void(0)" id="s5">5 Set new Number of Rows(3)</a>
	<br />
	<a href="javascript:void(0)" id="s6" >6 Set Data Type from json to xml</a>
</body>
</html>
<script>
	$(document).ready(function() {
		console.log('jsgrid is ok');
		////////////////////////////
		jQuery("#list7").jqGrid({
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
			pager : '#pager7',
			sortname : 'invid',
			viewrecords : true,
			sortorder : "desc",
			caption : "Set Methods Example",
			hidegrid : false,
			height : 210
		});
		jQuery("#list7").jqGrid('navGrid', '#pager7', {
			edit : false,
			add : false,
			del : false,
			refresh : false,
			searchtext : "Find"
		});

		jQuery("#s1").click(function() {
			jQuery("#list7").jqGrid('setGridParam', {
				url : "server.php?q=2"
			}).trigger("reloadGrid")
		});
		jQuery("#s2").click(function() {
			jQuery("#list7").jqGrid('setGridParam', {
				sortname : "amount",
				sortorder : "asc"
			}).trigger("reloadGrid");
		});
		jQuery("#s3").click(function() {
			var so = jQuery("#list7").jqGrid('getGridParam', 'sortorder');
			so = so == "asc" ? "desc" : "asc";
			jQuery("#list7").jqGrid('setGridParam', {
				sortorder : so
			}).trigger("reloadGrid");
		});
		jQuery("#s4").click(function() {
			jQuery("#list7").jqGrid('setGridParam', {
				page : 2
			}).trigger("reloadGrid");
		});
		jQuery("#s5").click(function() {
			jQuery("#list7").jqGrid('setGridParam', {
				rowNum : 3
			}).trigger("reloadGrid");
		});
		jQuery("#s6").click(function() {
			jQuery("#list7").jqGrid('setGridParam', {
				url : "server.php?q=1",
				datatype : "xml"
			}).trigger("reloadGrid");
		});
		jQuery("#s7").click(function() {
			jQuery("#list7").jqGrid('setCaption', "New Caption");
		});
		jQuery("#s8").click(function() {
			jQuery("#list7").jqGrid('sortGrid', "name", false);
		});
		////////////////////////////
	}); 
</script>