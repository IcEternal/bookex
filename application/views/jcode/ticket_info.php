<?php 
	function getTypeString($type){
		if ($type == 1) return '49元（减9元）';
		if ($type == 2) return '59元（减9元）';
		if ($type == 3) return '69元（减9元）';
		if ($type == 4) return '49元（免费）';
		if ($type == 5) return '59元（免费）';
		if ($type == 6) return '69元（免费）';
		return '数据库错误，未知';
	}

	if (!$valid){ ?>
		<div class = "row-fluid">
		<p class = "span2">  <strong> 该优惠券不存在。</strong> </p>
	</div>
<?php } 
else {
	$ticketid = $data->ticket_id;
	?>
<div id="content">
	<div class = "row-fluid">
		<p class = "span2">  <strong> 免费券号码：</strong> </p>
		<p class = "span10" style = "font-size: 17px; color: #ff0000;">
			<strong> <?php echo $data->ticket_id; ?> </strong>
		</p>
	</div>

	<div class = "row-fluid">
		<p class = "span2">  <strong> 类型：</strong> </p>
		<p class = "span10" style = "font-size: 17px; color: #ff0000;">
			<strong> <?php echo getTypeString($data->type); ?> </strong>
		</p>
	</div>

	<div class = "row-fluid">
		<p class = "span2">  <strong> 发出时间：</strong> </p>
		<p class = "span10" style = "font-size: 17px; color: #ff0000;">
			<strong> <?php echo $data->activated_time; ?> </strong>
		</p>
	</div>

	<div class = "row-fluid">
		<p class = "span2">  <strong> 使用时间：</strong> </p>
		<p class = "span10" style = "font-size: 17px; color: #ff0000;">
			<strong> <?php echo $data->used_time; ?> </strong>
		</p>
	</div>

	<div class = "row-fluid">
		<p class = "span2">  <strong> 使用人：</strong> </p>
		<p class = "span10" style = "font-size: 17px; color: #ff0000;">
			<strong> <?php if (strlen($data->username) > 3) echo $data->username; else echo '未使用'; ?> </strong>
		</p>
	</div>

	<a href="<?php echo site_url("jcode/getTicketInfo?ticket_id=$ticketid&use=1"); ?>">使用这张券</a>
</div>

<?php } ?>