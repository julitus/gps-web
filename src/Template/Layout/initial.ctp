<!DOCTYPE html>
<html>
<head>
  <?= $this->Html->charset() ?>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>
  	Gps - Home
  </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?= $this->Html->meta('icon') ?>

  <?= $this->Html->css('bootstrap.min.css') ?>
  <?= $this->Html->css('font-awesome.min.css') ?>
  <?= $this->Html->css('ionicons.min.css') ?>
  <?= $this->Html->css('AdminLTE.min.css') ?>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <?= $this->Html->css('custom.css') ?>

  <?= $this->fetch('meta') ?>
  <?= $this->fetch('css') ?>
  <?= $this->fetch('script') ?>
</head>
<body class="hold-transition login-page">

	<div class="login-box">
	  <?= $this->Flash->render() ?>
	  <div class="login-logo">
	  	<?= $this->Html->image('logo.png', ['class' => 'img-login']) ?>
	  </div>
	  <?= $this->fetch('content') ?>
	</div>

	<?= $this->Html->script('jquery.min.js') ?>
    <?= $this->Html->script('jquery-ui.min.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>

</body>
</html>