<?php
global $data;
include("header_2.php");
?>
<section id="new-arrivals" class="new-arrivals">
    <div class="container">
      <div class="section-header">
        
      </div>
      <!--/.section-header-->
      <div class="new-arrivals-content">
      <div class="welcome-hero-txt"><center><h2><b>Login</b></h2></center></div>
      <center>
  <form method="post" action="<?=$data['base_path']; ?>/home/loginact">
  <div class="hm-foot-email">
    <div class="foot-email-box">
      <input type="text" class="form-control" placeholder="username" name="username" required/>
    </div>
    <!--/.foot-email-box-->
  </div>
  
  <div class="hm-foot-email">
    <div class="foot-email-box">
      <input type="password" class="form-control" placeholder="password" name="password" required/>
    </div>
    <!--/.foot-email-box-->
  </div>
  
  <button class="btn-cart welcome-add-cart" type="submit">Login</button>
</form></center>
      </div>
    </div>
</section>
<?php
include("footer_2.php");
?>