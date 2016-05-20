<script type="text/javascript">
$('#email').click(function(){
    if($(this).val().trim() == "Жш: user@gmail.com"){
        $(this).val('');
        $(this).css('color', '#000');
    }
}).blur(function() {
    if($(this).val().trim() == ""){
        $(this).val('Жш: user@gmail.com');
        $(this).css('color', '#aaa');
    }
});
</script>