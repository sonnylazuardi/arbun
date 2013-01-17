<div class="strip bookrak bookshelf">
  <div class="shelf">
    <div class="rows">
      <div class="loc">
        <?php
          $model = new Buku();
          $model->select('*');
          $model->order_by('view','desc')->get(6);
          $ctr = 1;
          foreach ($model as $data) {
            echo '<div class="book">'.anchor('arsip/view/'.$data->id, $data->judul).'</div>';
            if($ctr == 3) {
              echo '</div></div><div class="rows"><div class="loc">';
            }
            $ctr++;
          }
        ?>
      </div>
    </div>
  </div>
</div>