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

?>

<?php
	if ($show_ticket) {
		for ($i = 1;$i <= 6;++$i) {
			echo getTypeString($i)."<br/>";
			foreach ($ticket["$i"] as $eachTicket) {
				echo $eachTicket->ticket_id."<br/>";
			}
		} 
	}
 ?>

<?php 
	for ($i = 1;$i <= 6;++$i) { 
?>
	<?php echo getTypeString($i)." 剩余".$num["$i"]."<br/>"; ?>
	<div class="btn getTicket" ticket_type = "<?php echo "$i" ?>">Click Here to Get</div>
<?php
	}
?>


<div id="messageBox"></div>

<script type="text/javascript">
	var getTicket = function(event){
		event.preventDefault();
		$.get(
            "<?php echo site_url();?>/jcode/getTicket",
            {"ticket_type":$(this).attr("ticket_type")},
            function(data)
            {
            	$("#messageBox").text(data);
            });
	}
	$(".getTicket").css("cursor", "pointer").bind("click", getTicket);
</script>