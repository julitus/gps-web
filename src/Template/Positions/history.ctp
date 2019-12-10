<section class="content-header gps-page" data-sidebar="devices">
  <h1>
    Historial de <?= $user->name ?>
  </h1>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">

      	<?php
    			$temp_positions = [];
    			foreach ($positions as $key => $pos):
    				$temp_pos = [];
    				$temp_pos['lat'] = $pos->lat;
    				$temp_pos['lng'] = $pos->lng;
    				$temp_pos['date'] = date('d-m-Y H:m', strtotime($pos->created));
    				array_push($temp_positions, $temp_pos);
    			endforeach; 
        ?>
        <div class="map">
            <div id="map-history" data-positions='<?= json_encode($temp_positions) ?>' ></div>
        </div>

	  </div>
	</div>
  </div>
</section>