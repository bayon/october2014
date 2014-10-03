<?php
include_once ('jqgrid_head.php');
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
			colNames : ['pk',   'id', 'code', 'statement' ],
			colModel : [{
				name : 'pk',
				index : 'pk',
				width : 55
			}, {
				name : 'id',
				index : 'id',
				width : 80,
				align : "left"
			}, {
				name : 'code',
				index : 'code',
				width : 80,
				align : "left"
			}, {
				name : 'statement',
				index : 'statement',
				width : 580,
				align : "left"
			} ],
			rowNum : 10,
			rowList : [10, 20, 30],
			pager : '#pager2',
			sortname : 'pk',
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