<?php ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<link rel="stylesheet" type="text/css" media="screen" href="../../jq_master/css/jq_ui.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="../../jq_master/css/jqgrid.css" />
		<script src="../../jq_master/js/latest_jquery.js" type="text/javascript"></script>
		<script src="../../jq_master/js/jqgrid_locale-en.js" type="text/javascript"></script>
		<script src="../../jq_master/js/jqGrid_min.js" type="text/javascript"></script>
	</head>
	<body>
		<table id="grid"></table>
		<div id="pager"></div>
		<div id="ajax_response"></div>
		<a href="#" id="a1">select row</a>
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
		jQuery.ajax({
			url : "ajax_backend.php",
			type : "POST",
			data : {
				"name" : $(this).val(),
				"datasource" : "mysql"
			},
			success : function(rtndata) {
				$("#ajax_response").html("<pre>" + rtndata + "</pre>");
				// FOR MYSQL DATA:
				var eson = eval(rtndata)
				///////////////////////////////////////////
				$("#grid").jqGrid({//set your grid id
					data : eson, //insert data from the data object we created above
					datatype : 'local',
					width : 500, //specify width; optional
					colNames : ['Id', 'Name'], //define column names
					colModel : [{
						name : 'id',
						index : 'id',
						key : true,
						width : 50
					}, {
						name : 'name',
						index : 'name',
						width : 100
					}], //define column models
					pager : '#pager', //set your pager div id
					sortname : 'id', //the column according to which data is to be sorted; optional
					viewrecords : true, //if true, displays the total number of records, etc. as: "View X to Y out of Z” optional
					sortorder : "asc", //sort order; optional
					caption : "jqGrid Example" //title of grid
				});

				////////////////////////////////////
				jQuery("#a1").click(function() {
					var id = jQuery("#grid").jqGrid('getGridParam', 'selrow');
					if (id) {
						var ret = jQuery("#grid").jqGrid('getRowData', id);
						alert("id=" + ret.id + " name=" + ret.name + "...");
					} else {
						alert("Please select row");
					}
				});
				jQuery("#a2").click(function() {
					var su = jQuery("#grid").jqGrid('delRowData', 12);
					if (su)
						alert("Succes. Write custom code to delete row from server");
					else
						alert("Allready deleted or not in list");
				});
				jQuery("#a3").click(function() {
					var su = jQuery("#grid").jqGrid('setRowData', 11, {
						id : "333",
						name : "about face" 
					});
					if (su)
						alert("Succes. Write custom code to update row in server");
					else
						alert("Can not update");
				});
				jQuery("#a4").click(function() {
					var datarow = {
						id : "99",
						name : "test3"
					};
					var su = jQuery("#grid").jqGrid('addRowData', 99, datarow);
					if (su)
						alert("Succes. Write custom code to add data in server");
					else
						alert("Can not update");
				});
				///////////////////////
			}
		});
	}); 
</script>
