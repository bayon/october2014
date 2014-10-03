<?php ?>
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
		<table id="grid"></table>
		<div id="pager"></div>
	</body>
</html>
<script>
	$(document).ready(function() {
		console.log('jq is on...');
		var mydata = getData();
		fire(mydata);
	});

	function getData() {
		var mydata = [{
			id : "one",
			"name" : "row one"
		}, {
			id : "two",
			"name" : "row two"
		}, {
			id : "three",
			"name" : "row three"
		}];

		return mydata;
	}

	function fire(mydata) {
		$("#grid").jqGrid({//set your grid id
			data : mydata, //insert data from the data object we created above
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
	}

</script>