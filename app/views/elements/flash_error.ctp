<div class="flasher error">
	<?php echo $message; ?>
</div>
<script>
$().ready(function(){ $("div.flasher, div#flashMessage").hide().slideDown(); }); $("div.flasher, #flashMessage").bind("click", function(){ $("div.flasher, #flashMessage").slideUp()});
</script>