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

<div id="messageBox" ></div>

<?php
	if ($show_ticket) {
		?>
		<div class="fixed"></div>
		<div class="TKcontent">
			<h2 class="TKH"> 显示等待被使用的优惠券们~~</h2>
			<div class="TKmain">
		<?php
		for ($i = 1;$i <= 6;++$i) {
		?>
			<div class="jCodeTKname"><?php echo getTypeString($i); ?></div>
			<div class="jCodeTKcontent">
				<?php
					foreach ($ticket["$i"] as $eachTicket) {
						echo $eachTicket->ticket_id." ";
					}
				?>
			</div>
			<?php
		} 
		?>
		<div class="fixed"></div>
			</div>
		</div>
		<?php
	}
?>

<div id="jCodecontent">
<?php 
	for ($i = 1;$i <= 6;++$i) { 
?>
	<div class="jCodebox">
		<div class="pic">
			<img src="<?php echo base_url() ?>public/img/jcode.png" />
		</div>
		<div class="info">
			<span class="name"><?php echo getTypeString($i)." 剩余".$num["$i"]; ?></span>
			<span class="getTicket" ticket_type = "<?php echo "$i" ?>">领取</span>
		</div>
	</div>
<?php
	}
?>
</div>

<script type="text/javascript">
	var getTicket = function(event){
		event.preventDefault();
		$.get(
            "<?php echo site_url();?>/jcode/getTicket",
            {"ticket_type":$(this).attr("ticket_type")},
            function(data)
            {
            	$("#messageBox").text(data).slideDown();
            });
	}
	$(".getTicket").css("cursor", "pointer").bind("click", getTicket);
	$(document).ready(function(){
	$(".TKH").css("cursor", "pointer").click(function(){
	    $(".TKmain").slideToggle();
	  });
	});
</script>