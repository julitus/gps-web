<section class="content-header">
  <h1>
    Mapa de Dispositivos
    <small></small>
  </h1>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">

      	<?php
      	  $positions = $positions->toArray();
          $temp_positions = [];
          $temp_positions['name'] = $positions[0]->user->name;
          $temp_positions['lat'] = $positions[0]->lat;
          $temp_positions['lng'] = $positions[0]->lng;
        ?>
        <div class="map">
            <div id="map" data-positions='<?= json_encode($temp_positions) ?>' ></div>
        </div>

	  </div>
	</div>
  </div>
</section>
