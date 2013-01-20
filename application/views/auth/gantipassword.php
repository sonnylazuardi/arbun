<div class="container">
  <div style="height:50px"></div>
  <div class="login strip" style="width:330px">
    <?php if(!empty($password)): ?>
      Password Anda menjadi <?php echo $password ?>, mohon segera diubah
    <?php else: ?>
      <?php echo form_open() ?>
      <p class="help">Klik link dibawah jika yakin ingin mereset password</p>
      <?php echo form_submit('submit', 'Ganti Password', 'class="btn btn-primary btn-large"') ?>
      <?php echo form_close() ?>
    <?php endif; ?>
  </div>
</div>