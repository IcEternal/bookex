	<?php 
	// big box alert
	if (($err == '订购成功！工作人员从卖家拿到书后会与您联系') || ($err == '订购成功！手机号已在图片下方显示。')) { ?>
		<div class="modal hide fade" id="shareInfo">
		  <div class="modal-header">
		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		    <h4>订购成功~喜欢这个网站的话请分享一下哈~</h4>
		  </div>
		  <div class="modal-body">
			<div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare" style="margin: auto">
				<a class="bds_renren"></a>
				<a class="bds_tsina"></a>
				<a class="bds_qzone"></a>
				<a class="bds_tqq"></a>
				<a class="bds_t163"></a>
				<span class="bds_more"></span>
			</div>
		  </div>
		  <div class="modal-footer">
		    <a class="btn" data-dismiss="modal" aria-hidden="true">取消</a>
		  </div>
		</div>
	<?php } ?> 

	<?php if ($show == true && $err == '订购成功！工作人员从卖家拿到书后会与您联系') { ?>
		<?php if ($mustphone) redirect("book_details/use_phone/$id"); ?>
		<div class="modal hide fade" id="phoneInfo">
		  <div class="modal-header">
		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		    <h3>提示</h3>
		  </div>
		  <div class="modal-body">
		    <p>对方支持当面交易,手机号为 <?php echo $phone ?>.</p>
		    <p><strong>自行当面交易</strong> 后，手机号会在书本图片下方显示。</p>
		    <br/>
		    <p> <?php if (!$mustphone) {?> 工作人员从卖家取书后联系，<a style="cursor:pointer" data-dismiss="modal" aria-hidden="true" id="do_not_use_phone">委托BookEx取书</a><?php } ?></p>
		    <br/>
		    <p>速度快又方便, 还能认识些同学, 选择<a class="btn" href='<?php echo site_url("book_details/use_phone/$id") ?>'><b>自行当面交易</b></a></p>
		  </div>
		</div>
	<?php } ?>
