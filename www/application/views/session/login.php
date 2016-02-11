<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Lasku Billing</title>
	<link type="text/css" rel="stylesheet" href="<?=URL::base()?>static/css/main.css" />
	<link type="text/css" rel="stylesheet" href="<?=URL::base()?>static/css/session/login.css" />
</head>

<body class="">
	<div id="LoginPanel"><div class="wrapper">
		<form method="post">
			<p>Please login to continue.</p>
			<?php if(@$errors) : ?>
			<p class="error">
				Invalid username/password.
			</p>
			<?php endif; ?>
			<table class="form">
				<tr>
					<th><?=Form::label('user', 'Username')?></th>
					<td><?=Form::input('user', @$post['user'])?></td>
				</tr>
				<tr>
					<th><?=Form::label('pass', 'Password')?></th>
					<td><?=Form::password('pass')?></td>
				</tr>
			</table>
			<p><?=Form::submit(NULL, 'Login')?></p>
		</form>
	</div></div><!--#LoginPanel-->
</body>

</html>
