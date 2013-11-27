<?php
/*
================================================================
contact.php

include: includes/header.php
		 includes/footer.php

The contact us page.

Whenever you changed this page, please leave a log here.
The log includes time and changed content.
Just like the following:

#---------------------------------------------------------------
#Last updated: 11.1.2013 by Wang Sijie
#What's new: The first vision.
================================================================
 */ 
?>
<?php include("includes/header.php"); ?>

<div class="content-full"><!-- structure -->
	<h2>各院联系方式</h2>
	<p>想要出售物品的同学请发送短信 "姓名+物品+寝室" 到各院青志队联系人手机~~~</p>
	<p>另外我们提供大量摊位，想自己卖东西的同学12.4日当天带着物品到现场就行了哈~~</p>
  <p>如有疑问请拨打 15900773276 或 15821921130~</p>
  <div class="btn qzdContact" style="width:200px; margin-top:10px;">点击展开青志队联系方式</div>
  <div class="qzdTable" style="display:none; margin-top:10px;">
	<table class="table table-bordered table-striped">
    <colgroup>
      <col class="span1">
      <col class="span1">
    </colgroup>
    <thead>
      <tr>
        <th>院系</th>
        <th>手机号</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>化院</td>
        <td>15202177989</td>
      </tr>
      <tr>
        <td>致远</td>
        <td>15921118891</td>
      </tr>
      <tr>
        <td>国务院</td>
        <td>15026616097</td>
      </tr>
      <tr>
        <td>机动</td>
        <td>18817874979</td>
      </tr>
      <tr>
        <td>农生</td>
        <td>18817519509</td>
      </tr>
      <tr>
        <td>巴黎高科</td>
        <td>18818273165</td>
      </tr>
      <tr>
        <td>软院</td>
        <td>18818272604</td>
      </tr>
      <tr>
        <td>媒设</td>
        <td>15821903571</td>
      </tr>
      <tr>
        <td>材料</td>
        <td>18818270902</td>
      </tr>
      <tr>
        <td>船建</td>
        <td>18818275860</td>
      </tr>
      <tr>
        <td>生科院</td>
        <td>18818273112</td>
      </tr>
      <tr>
        <td>凯原</td>
        <td>13122261017</td>
      </tr>
      <tr>
        <td>安泰</td>
        <td>18317151530</td>
      </tr>
      <tr>
        <td>密西根</td>
        <td>13636323493</td>
      </tr>
      <tr>
        <td>微电子</td>
        <td>18018678737</td>
      </tr>
      <tr>
        <td>药学院</td>
        <td>13774289668</td>
      </tr>
      <tr>
        <td>外院</td>
        <td>13301756160</td>
      </tr>
      <tr>
        <td>数学系</td>
        <td>18818213447</td>
      </tr>
      <tr>
        <td>信安学院</td>
        <td>待定</td>
      </tr>
      <tr>
        <td>环境</td>
        <td>待定</td>
      </tr>
      <tr>
        <td>生医工</td>
        <td>待定</td>
      </tr>
    </tbody>
  </table>
  </div>
</div><!-- content-full -->

<div class="content-full"><!-- structure -->
	<h2>活动介绍</h2>
	闲置的二手书、淘来的小物件、多余的电子产品、DIY的美食精品、不穿的旧衣  …… <br/>
	12月4日，光彪楼广场前，<span style="color: red;font-size: 16px; font-weight: bold;">跳蚤市场</span>，这次是真的来了！ <br/><br/>

	<span style="color: red; font-size: 16px; font-weight: bold;">时间：2013年12月4日11:30-2:30</span><br/>
	<span style="color: red; font-size: 16px; font-weight: bold;">地点：上海交通大学光彪楼前广场</span><br/><br/>

	本次活动由二手交易平台BookEx主办，价格由你来定，零差价交易，我们提供平台！<br/>
	<span style="color: red; font-size: 16px; font-weight: bold;">这里免费发放200多本书，选一本喜欢的书，在摊位前翻阅着温暖的记忆或是淘到一本崭新的教材</span><br/>
	这里有便宜的二手货，在寝室里堆积的物品，小小的创意都可以在这里展现<br/>
	这里更有好玩的摊主，和摊主们聊天，和顾客搭搭讪，不妨挂上“有半个摊位，求美女合摊！”或许一场美丽的邂逅就此展开！<br/><br/>

	无论你是寻求小资的文艺青年，还是来淘便宜商品的生活家，亦或是凑凑热闹的亲们！<br/>
	让我们一起来这里寻珍品，让我们一起来这里寻开心，让我们购一件物品，结一次缘分，让我们一起在这里让创意与二手碰撞交融。

</div><!-- content-full -->

<div class="content-full"><!-- structure -->
	<h2>活动规则</h2>
	1. 由各院系青志队向本院学生收集交易物品（若需出售的物品多，卖家可以选择活动当天自行去光彪楼前广场摊位） <br/>
	2. 当天跳蚤市场分成两部分，一半书本交易活动：BookEx赠书、同学自主交易买卖书本；另外开辟区域供学院青志、报名摆摊销售物品的同学使用。<br/> 
  3. 现场参与者将手机转发的人人“博易BookEx”的状态给工作人员便可挑选一本赠书区的书。<br/>
	4. 活动以公平自愿为原则，商品价格由买卖双方商讨后确定，也可以以物换物方式进行交易。<br/>


</div><!-- content-full -->

<script type="text/javascript">
  $(document).ready(function(){
    $(".qzdContact").css("cursor", "pointer").click(function(){
      $(".qzdTable").slideDown("slow");
      $(this).hide();
    });
  });
</script>

<?php include("includes/footer.php"); ?>
