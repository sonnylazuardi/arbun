<div class="container">
  <div style="height:50px"></div>
  <div class="login strip">
      <?php echo form_open('home/adminlogin'); ?>
          <label>Username</label>
            <?php echo form_input('Login[nim]', $model->nim, 'tabindex="1"'); ?>
          
          <label>Password</label>
            <?php echo form_password('Login[password]', '', 'tabindex="2"'); ?>
          <br/>
          <button type="submit" class="btn btn-large btn-primary">Login</button>
      <?php echo form_close(); ?>
    </section>
</div>