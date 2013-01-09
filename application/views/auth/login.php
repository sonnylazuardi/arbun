<div class="container">
  <div style="height:50px"></div>
  <div class="login strip">
      <?php echo form_open('auth/login'); ?>
          <label>NIM/NIP</label>
            <?php echo form_input('Login[nim]', $model->nim, 'tabindex="1"'); ?>
          
          <label>Password (<?php echo anchor('auth/forgot', "Lupa Password"); ?>)</label>
            <?php echo form_password('Login[password]', '', 'tabindex="2"'); ?>
          <br/>
          <button type="submit" class="btn btn-large btn-primary">Login</button>
          <span class="create-account">atau <?php echo anchor('auth/register', "Buat Akun"); ?></span>
      <?php echo form_close(); ?>
    </section>
    <?php $this->load->view('theme/validation', array('model'=>$model)); ?>
</div>