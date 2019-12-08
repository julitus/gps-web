<section class="content-header gps-page" data-sidebar="devices">
  <h1>
    Dispositivos Asociados
    <small class="keys"> <span class="pull-right-container"><small class="label pull-left bg-yellow">Token :</small></span> <b><?= $this->request->session()->read('Auth.User.key') ?></b></small>
  </h1>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <!--div class="box-header">
          <h3 class="box-title"></h3-->

          <!--div class="box-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

              <div class="input-group-btn">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </div>
        </div-->
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tr>
              <th>#</th>
              <th><?= $this->Paginator->sort('email', 'Email') ?></th>
              <th><?= $this->Paginator->sort('phone', 'Teléfono') ?></th>
              <th><?= $this->Paginator->sort('phone', 'Nombre') ?></th>
              <th><?= $this->Paginator->sort('phone', 'Visualización') ?></th>
              <!--th scope="col" class="actions"><?= __('Acciones') ?></th-->
            </tr>
            <?php foreach ($devices as $key => $device): ?>
              <tr>
                <td><?= $key + 1 ?></td>
                <td><?= $device->email ?></td>
                <td><?= $device->phone ?></td>
                <td><?= $device->name ?></td>
                <td><?= ($device->location ? '<span class="label label-success">Si</span>' : '<span class="label label-error">No</span>') ?></td>
                <!--td></td-->
              </tr>
              <?php endforeach; ?>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>