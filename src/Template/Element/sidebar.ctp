<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">PRINCIPAL</li>
      <li class="active">
        <?= $this->Html->link('<i class="fa fa-map-marker"></i> <span>Mapa</span>', ['controller' => 'positions', 'action' => 'locations'], ['escape' => false]) ?>
      </li>
      <li>
        <?= $this->Html->link('<i class="fa fa-mobile"></i> <span>Dispositivos</span>', ['controller' => 'users', 'action' => 'devices'], ['escape' => false]) ?>
      </li>
      <li>
        <?= $this->Html->link('<i class="fa fa-sign-out"></i> <span>Cerrar Sessión</span>', ['controller' => 'users', 'action' => 'logout'], ['escape' => false]) ?>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>