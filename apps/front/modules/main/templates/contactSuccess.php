<br clear="all">
<br clear="all">
<br clear="all">

<?php $form = new FeedbackForm()?>
<form action="<?php echo url_for('page/contact')?>" method="post" class="left" 
    style="width:360px;margin:0 40px 0 0;border-right:1px solid #dedede;">

		<div style="background:#FEAA66;padding:5px;width:301px;" class="border-radius-5">
				<div style="border:1px dashed #fff;color:#fff;text-align:center;">
						Бид таны захидлыг хүлээж авсан дариудаа хариу илгээх болно.
				</div>
		</div>
  	<?php echo $form->renderGlobalErrors() ?>
		<br clear="all">
    <?php echo $form['organization']->renderError() ?>
    <?php echo $form['organization'] ?>
    <br clear="all">
    <?php echo $form['name']->renderError() ?>
    <?php echo $form['name'] ?>
    <br clear="all">
    <?php echo $form['email']->renderError() ?>
    <?php echo $form['email'] ?>
    <br clear="all">
    <?php echo $form['phone']->renderError() ?>
    <?php echo $form['phone'] ?>
    <br clear="all">
    <?php echo $form['message']->renderError() ?>
    <?php echo $form['message'] ?>
    <br clear="all">
  	<input type="submit" value="Илгээх" class="button" style="height:36px;width:120px;text-align:center;cursor:pointer;" />
  	<br clear="all">
</form>

<div class="left" style="width:300px;">
		<h3>ИМЭЙЛ</h3>
		<a href="mailto:mmdb.llc@gmail.com">mmdb.llc@gmail.com</a>

		<br clear="all">
		<br clear="all">
		
		<h3>ХОЛБОГДОХ УТАС</h3>
		99258807, 99022507, 99688179
		
		<br clear="all">
		<br clear="all">
		 
		<h3>ХАЯГ БАЙРШИЛ</h3>
		Манай оффис өөр гаригт байдаг тул та бүхэн бидэнтэй дээрх утас, имэйл-р холбогдох эсвэл захидал илгээхийг хүсье.

		<br clear="all">
		<br clear="all">
		
		<?php include_partial('partial/socials', array());?>
		<br clear="all">

		Latest Tweets and Latest FB posts can be here.
		
		<br clear="all">
		<br clear="all">
</div>


<script type="text/javascript">
$(document).ready(function(){
  $('#feedback_org').click(function(){
      if($(this).val().trim() == "Байгууллага") { $(this).val(''); }
  }).blur(function() {
      if($(this).val().trim() == "") { $(this).val('Байгууллага'); }
  });

  $('#feedback_name').click(function(){
      if($(this).val().trim() == "Таны бүтэн нэр") { $(this).val(''); }
  }).blur(function() {
      if($(this).val().trim() == "") { $(this).val('Таны бүтэн нэр'); }
  });
  
  $('#feedback_email').click(function(){
      if($(this).val().trim() == "Имэйл хаяг") { $(this).val(''); }
  }).blur(function() {
      if($(this).val().trim() == "") { $(this).val('Имэйл хаяг'); }
  });

  $('#feedback_phone').click(function(){
      if($(this).val().trim() == "Утасны дугаар") { $(this).val(''); }
  }).blur(function() {
      if($(this).val().trim() == "") { $(this).val('Утасны дугаар'); }
  });

  $('#feedback_message').click(function(){
      if($(this).val().trim() == "Захидал") { $(this).val(''); }
  }).blur(function() {
      if($(this).val().trim() == "") { $(this).val('Захидал'); }
  });
  
});
</script>