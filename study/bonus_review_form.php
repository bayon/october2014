<html>
	<body>
		
	
<!-- begin main page -->
<br>
<h2>Professional Services Bonus History</h2>
<link href="install_detail.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="bonus_review.js"></script><script type="text/javascript" src="install_detail.js"></script><script type="text/javascript" src="/tasks/tasks.js"></script><script type="text/javascript" src="xmlHttpRequest.js"></script><script type="text/javascript" src="jquery.js"></script>
<form action="bonus_review.php" method="GET">
	<div id="installFilter">
		<table>
			<tr>
				<td class="label" style="width:100px;">User:</td><td colspan="3">
				<select name="uid" id="uid">
					<option value="0">ALL</option><option value='346777'>Cassaboom, Steven</option><option value='368234'>Chavez, Patrick</option><option value='346793'>Duntz, Dan</option><option value='374314'>Jacobs, Craig</option><option value='368222'>Lupo, Vince</option><option value='283670'>Mattox, Rob</option><option value='346821'>Mitchell, Justin</option><option value='346854'>Morford, Guy</option><option value='346825'>Rehrer, Craig</option><option value='283690'>Strunk, Roxie</option><option value='337346'>Toothaker, Mick</option><option value='283754'>Welch, Joe</option>
				</select></td>
			</tr>
			<tr>
				<td class="label" style="width:100px;">Search From:</td><td style="width:250px;">
				<input id="searchFrom" name="searchFrom" style="width:auto; text-align:left;" class="datepicker" value="2014-06-01">
				<script type="text/javascript">
					Calendar.setup({
						weekNumbers : false,
						inputField : searchFrom,
						ifFormat : "%Y-%m-%d",
						onClose : calendarClose
					});
				</script></td><td class="label">Search To:</td><td style="width:100px;">
				<input id="searchTo" name="searchTo" class="datepicker" value="">
				<script type="text/javascript">
					Calendar.setup({
						weekNumbers : false,
						inputField : searchTo,
						ifFormat : "%Y-%m-%d",
						onClose : calendarClose
					});
				</script></td>
			</tr>
			<tr>
				<td class="label" style="width:100px;">Sort:</td><td>
				<select name="presetSort">
					<option value="start_date DESC, name">Week Of THEN Name</option>
					<option value="name, start_date DESC" >Name THEN Week Of</option>
				</select></td><td class="label" style="width:100px;">View Paid Bonuses:</td><td>
				<select name="viewMode">
					<option value="">No</option>
					<option value="1" >Yes</option>
				</select></td>
			</tr>
			<tr>
				<td colspan="4" align="center">
				<input type="submit" value="Search" name="search" />
				</td>
			</tr>
		</table>
	</div>
</form>
<table id="installs" cellspacing=0 cellpadding=0 style="width:100%;">
	<tr>
		<th class="report_hdr" title="Name"><a href="?&direction=ASC&sort=name">Name</a></th><th class="report_hdr" title="Week Of"><a href="?&direction=ASC&sort=start_date">Week Of</a></th><th class="report_hdr" title="Salary"><a href="?&direction=ASC&sort=salary">Salary</a></th><th class="report_hdr" title="Employee Type"><a href="?&direction=ASC&sort=employee_type">Employee Type</a></th><th class="report_hdr" title="CSAT Score"><a href="?&direction=ASC&sort=csat">CSAT Score</a></th><th class="report_hdr" title="Hours Billed"><a href="?&direction=ASC&sort=billable_hours">Hours Billed</a></th><th class="report_hdr" title="Bonus"><a href="?&direction=ASC&sort=bonus">Bonus</a></th><th class="report_hdr" title="Paid/Edited"><a href="?&direction=ASC&sort=status">Paid/Edited</a></th>
	</tr>
	<tr>
		<td colspan="8" style="font-weight:bold; text-align:center;">There are no records that match the given criteria.</td>
	</tr>
</table>
<!-- end main page -->
</body>
</html>