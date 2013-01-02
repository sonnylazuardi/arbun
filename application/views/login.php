<div class="container">
  <div style="height:50px"></div>
  <div class="login strip">
      <?php echo form_open('user/auth'); ?>
          <label>NIM/NIP</label>
          <input type="text" name="username" tabindex="20">
          
          <label>Password (<?php echo anchor('user/forgot', "Lupa Password"); ?>)</label>
          <input type="password" name="password" tabindex="21">
          <br/>
          <button type="submit" class="btn btn-large btn-primary">Login</button>
          <span class="create-account">atau <?php echo anchor('user/register', "Buat Akun"); ?></span>
      <?php echo form_close(); ?>
    </section>
</div>