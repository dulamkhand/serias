<div style="color:#ED242D;margin:10px 0;padding:0;">
		АНХААРУУЛГА: Уншигчдын бичсэн сэтгэгдэлд <b style="color:#ED242D;">baavar.mn</b> хариуцлага хүлээхгүй болно. 
		Манай сайт ХХЗХ-ны журмын дагуу зүй зохисгүй зарим үг, хэллэгийг хязгаарласан тул 
		та сэтгэгдэл бичихдээ бусдын эрх ашгийг хүндэтгэн үзнэ үү.
</div>
<a name="comment-form"></a>
<form action="#" method="post" class="form" id="comment-form">
      <input type="hidden" value="<?php echo $objectType ?>" name="commentObjectType" id="commentObjectType" />
      <input type="hidden" value="<?php echo $objectId ?>" name="commentObjectId" id="commentObjectId" />
      
      <input type="text" name="comment-name" id="comment-name" value="Зочин" style="margin:0 0 2px 0;border:1px solid #ccc;width:400px;" /><br>
      <textarea name="comment-area" id="comment-area" style="margin:0 0 4px 0;border:1px solid #ccc;width:400px;height:150px;">Сайн байна уу, </textarea>
      <div id="comment-error" style="color:#ED242D;margin:0 0 6px 0;"></div>
    
      <span style="padding:1px 0px 1px 1px;border:1px solid #0677cf;background:#fff;width:181px;display:block;">
          <button class="button" type="button" style="width:180px;padding:4px 15px;" value="Сэтгэгдэл үлдээх" onclick="submitCommentForm();">
              Сэтгэгдэл үлдээх
          </button>
      </span>
      <?php echo image_tag('icons/loading.gif', array('id'=>'comment-loader', 'style'=>'display:none;'))?>
      <br clear="all">
</form>

<script type="text/javascript">
function submitCommentForm()
{
  $('#comment-error').html('');
  
  // validate
  if($('#comment-area').val().trim() == "") {
      $('#comment-error').html('&uarr; Та сэтгэгдлээ оруулна уу &uarr;');
      return false;
  }
  
  $.ajax({
    url: "<?php echo url_for('comment/save')?>", 
    type: "POST",
    data: {commentObjectId:$('#commentObjectId').val(), commentObjectType:$('#commentObjectType').val(), commentName:$('#comment-name').val(), commentBody:$('#comment-area').val()},
    beforeSend: function(){
      $('#comment-loader').show();
    },
    success: function(data)        
    {
      $('#comment-loader').hide();
      $("#comments").append(data);

      $('#comment-area').val("Сайн байна уу, ");
    }
  });
  return false;
}


$(document).ready(function(){
  
  /* name */
  $('#comment-name').click(function(){
      if($(this).val().trim() == "Зочин")
      {
          $(this).val('');
      }
  }).blur(function() {
      if($(this).val().trim() == "")
      {
          $(this).val('Зочин');
      }
  });
  
  
  /* textarea */
  $('#comment-area').blur(function(){
      if($(this).val().trim() == "")
      {
          $(this).val('Сайн байна уу, ');
      }
  });
  
  
  /* avator choose */
  $('#comment-img').mouseover(function(){
      $('#comment-imgs').show();
  });
  
  $('#comment-img').mouseleave(function(){
      $('#comment-imgs').hide();
  });
  
  $('.comment-avator').mouseover(function(){
      $(this).css('border','1px solid green');
  });
  
  $('.comment-avator').mouseleave(function(){
      $(this).css('border','1px solid #fff');
  });

  $('.comment-avator').click(function(){
      src = $(this).attr('src');
      $('#chosen-comment-avator').attr('src',src);
  });
  

});
</script>