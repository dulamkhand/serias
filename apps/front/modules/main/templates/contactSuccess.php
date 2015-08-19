<br clear="all">
<table width="100%">
    <tr>
    		<td width="30%">
            <span style="margin:0;">УТАС</span>
        </td>
        <td width="70%"><?php echo sfConfig::get('app_phone')?></td>
    </tr>
    <tr><td>&nbsp;</td></tr>
    <tr>
        <td>
            <span style="margin:0;">ИМЭЙЛ ХАЯГ</span>
        </td>
        <td><?php echo sfConfig::get('app_feedback_email')?></td>
    </tr>
    <tr><td>&nbsp;</td></tr>
    <tr>
        <td>
            <span style="margin:0;">ХАМТРАН АЖИЛЛАХ</span>
            
        </td>
        <td><a href="<?php echo url_for('main/cooperate')?>" style="color:#0677cf;font-weight:bold;">Тухай</a></td>
    </tr>
    <tr><td>&nbsp;</td></tr>
    <tr>
        <td>
            <span style="margin:0;">ХАЯГ</span>
        </td>
        <td><?php echo sfConfig::get('app_address')?></td>
    </tr>
    <tr><td>&nbsp;</td></tr>
    <tr>
        <td>
            <span style="margin:0;">ЗУРВАС ИЛГЭЭХ</span>
        </td>
        <td>
					 <?php include_partial('main/contact', array('form'=>$form));?>				       
        </td>
    </tr>
</table>
<br clear="all">

<script type="text/javascript">
$(document).ready(function(){
  $('#feedback_org').click(function(){
      if($(this).val().trim() == "Байгууллага") { $(this).val(''); }
  }).blur(function() {
      if($(this).val().trim() == "") { $(this).val('Байгууллага'); }
  });

  $('#feedback_name').click(function(){
      if($(this).val().trim() == "Таны нэр") { $(this).val(''); }
  }).blur(function() {
      if($(this).val().trim() == "") { $(this).val('Таны нэр'); }
  });
  
  $('#feedback_email').click(function(){
      if($(this).val().trim() == "Имэйл") { $(this).val(''); }
  }).blur(function() {
      if($(this).val().trim() == "") { $(this).val('Имэйл'); }
  });

  $('#feedback_phone').click(function(){
      if($(this).val().trim() == "Утас") { $(this).val(''); }
  }).blur(function() {
      if($(this).val().trim() == "") { $(this).val('Утас'); }
  });

  $('#feedback_message').click(function(){
      if($(this).val().trim() == "Захидал") { $(this).val(''); }
  }).blur(function() {
      if($(this).val().trim() == "") { $(this).val('Захидал'); }
  });
  
});
</script>