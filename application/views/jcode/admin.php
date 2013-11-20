
<div id="check_ticket_form">
		<fieldset>
			<h2>查询优惠券信息：</h2>
			<form class="form-horizontal" action="<?php echo site_url('jcode/getTicketInfo') ?>" method="get" accept-charset="utf-8">
				<div class="control-group">
					<label class="control-label" for="ticket_id">优惠码</label>
					<div class="controls">
							<input type="text" id="ticket_id" name="ticket_id" placeholder="输入优惠码">
					</div>
				</div>

				<div class="control-group">
					<div class="controls">
							<button type="submit" class="btn">查询</button>
					</div>
				</div>
			</form>
		</fieldset>
	</div>