<div class="login-box-body">
  <p class="login-box-msg">Registrar Maestro</p>

  <?= $this->Form->create($user) ?>
  <!--form action="../../index2.html" method="post"-->
    <div class="form-group has-feedback">
      <?= $this->Form->input('name', ['class' => 'form-control', 'placeholder' => 'Nombre', 'label' => false]) ?>
      <span class="glyphicon glyphicon-user form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      <?= $this->Form->input('email', ['class' => 'form-control', 'placeholder' => 'Email', 'label' => false]) ?>
      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      <?= $this->Form->input('password', ['class' => 'form-control', 'placeholder' => 'Contraseña', 'label' => false]) ?>
      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      <?= $this->Form->input('repassword', ['type' => 'password', 'class' => 'form-control', 'placeholder' => 'Repetir Contraseña', 'label' => false]) ?>
      <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
    </div>
    <div class="row">
      <div class="col-xs-8">
      </div>
      <!-- /.col -->
      <div class="col-xs-4">
        <?= $this->Form->button('Registrar', ['class' => 'btn btn-primary btn-block btn-flat']) ?>
        <!--button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button-->
      </div>
      <!-- /.col -->
    </div>
  <?= $this->Form->end() ?>
  <!--/form-->

  <!--a href="#">I forgot my password</a><br-->
  <?= $this->Html->link('Ya tengo una cuenta', ['action' => 'login'], ['class' => 'text-center']) ?>
  <!--a href="#" class="text-center">Registrar Maestro</a-->

</div>