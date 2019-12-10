<header class="main-header">
  <!-- Logo -->
  <a href="#" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><?= $this->Html->image('logo.png') ?></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><?= $this->Html->image('logo.png') ?>GPs</span>
    
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->
        <li class="dropdown messages-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>
            <span class="label label-success"><?= $session_notifications->count() ?></span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">Tu tienes <?= $session_notifications->count() ?> dispositivos enlazados</li>
            <li>
              <ul class="menu">
                <?php foreach ($session_notifications as $key => $not): ?>
                <li>
                  <a href="#">
                    <div class="pull-left">
                      <span class="img-circle"><?= substr($not->sender->name, 0, 2) ?></span>
                    </div>
                    <h4>
                      <?= $not->title ?>
                      <small><i class="fa fa-clock-o"></i> <?= date('d-m-Y  H:m', strtotime($not->created)) ?></small>
                    </h4>
                    <p><?= $not->body ?></p>
                  </a>
                </li>
                <?php endforeach; ?>
              </ul>
            </li>
          </ul>
        </li>
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="user-image"><?= substr($this->request->session()->read('Auth.User.name'), 0, 2) ?></span>
            <!--img src="dist/img/user2-160x160.jpg" class="user-image" alt="" -->
            <span class="hidden-xs"><?= $this->request->session()->read('Auth.User.name') ?></span>
          </a>
          <!--ul class="dropdown-menu">
            < Menu Footer>
            <li class="user-footer">
              <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <a href="#" class="btn btn-default btn-flat">Cerrar Sesión</a>
              </div>
            </li>
          </ul-->
        </li>
      </ul>
    </div>
  </nav>
</header>