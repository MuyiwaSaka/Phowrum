<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Insert title here</title>
</head>
<frameset>
    <frame>
    <frame>
    <noframes>
    <body>
    <p>This page uses frames. The current browser you are using does not support frames.</p>
    
	<?php echo form_open('topic/create');?>
		<?php echo form_input('topictitle');?>
		<?php echo form_textarea('topicbody');?>
		<?php echo form_submit();?><?php echo form_reset();?>
	<?php echo form_close();?>
    </body>
    </noframes>
</frameset>
</html>