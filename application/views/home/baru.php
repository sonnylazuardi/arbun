<div class="strip bookrak bookshelf">
  <div class="shelf">
    <div class="rows">
      <div class="loc">
        <?php
          $model = new Buku();
          $model->select('*');
          $model->order_by('tgl_terbit','desc')->get(6);
          $ctr = 1;
          foreach ($model as $data) : ?>
            <a href="<?php echo site_url('arsip/view/'.$data->id, $data->judul) ?>" class="book" rel="popover" title="<?php echo $data->judul ?>" data-content="<?php echo limit_words($data->abstrak, 20) ?>">
              <img src="<?php echo $data->get_cover() ?>" alt="" />
            </a>
        <?php
            if($ctr == 3) echo '</div></div><div class="rows"><div class="loc">'; $ctr++;
          endforeach;
        ?>
      </div>
    </div>
  </div>
</div>