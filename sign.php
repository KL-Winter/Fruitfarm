<?php

session_start();

if (!isset($_SESSION['logged_in'])) {
    $nav ='includes/nav.php';
}

elseif($_SESSION['logged_in'] == 'True') {
  header('Location: index');
}

else{
  $nav ='includes/navconnected.php';
  $idsess = $_SESSION['id'];
}
error_reporting(0);

 require 'includes/header.php';
 require $nav; ?>



<div class="container-fluid center-align sign">
  <div class="container">

  <div class="row">
    <div class="col s12">
       <ul class="tabs">
        <li class="tab col s3"><a class="active" href="#test1">Log In</a></li>
        <li class="tab col s3"><a  href="#test2">Sign Up</a></li>
       </ul>
   </div>

<div class="container forms">
 <div class="row">

<div id="test2" class="col s12 left-align">
     <div class="card">
       <div class="row">

    <form class="col s12" method="POST" enctype="multipart/form-data">
      <div class="row">

        <div class="input-field col s6">
          <i class="material-icons prefix">email</i>
          <input id="icon_prefix" type="text" name="email" class="validate" required>
          <label for="icon_prefix">Email</label>
        </div>

        <div class="input-field col s6">
          <i class="material-icons prefix">phone</i>
          <input id="icon_prefix" type="text" name="phone" class="validate" required>
          <label for="icon_prefix">Phone</label>
        </div>

        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="icon_prefix" type="text" name="firstname" class="validate" required>
          <label for="icon_prefix">First Name</label>
        </div>

        <div class="input-field col s6">
          <i class="material-icons prefix">perm_identity</i>
          <input id="icon_prefix" type="text" name="lastname" class="validate" required>
          <label for="icon_prefix">Last Name</label>
        </div>

        <div class="input-field col s6">
          <i class="material-icons prefix">lock</i>
          <input id="icon_prefix" type="password" name="password" class="validate value1" required>
          <label for="icon_prefix">Password</label>
        </div>

        <div class="input-field col s6">
          <i class="material-icons prefix">lock</i>
          <input id="icon_prefix" type="password" name="confirmation" class="validate value2" required>
          <label for="icon_prefix">Confirm Password</label>
        </div>

        <div class="input-field col s6">
          <i class="material-icons prefix">business</i>
          <input id="icon_prefix" type="text" name="city" class="validate" required>
          <label for="icon_prefix">City</label>
        </div>

        <div class="input-field col s6 meh">
          <i class="material-icons prefix">location_on</i>
          <input id="icon_prefix" type="text" name="address" class="validate" required>
          <label for="icon_prefix">Address</label>
        </div>


<?php require 'includes/signupconfirmation.php'; ?>
            <div class="center-align">
                <button type="submit" id="confirmed" name="signup" class="btn meh button-rounded waves-effect waves-light ">Sign up</button>
            </div>

            <p>Bằng cách đăng ký, bạn đồng ý rằng bạn đã đọc và chấp nhận <a href="">sự thỏa thuận của người dùng</a>,
            bạn ít nhất 18 tuổi và bạn đồng ý với chúng tôi <a href="">Thông báo bảo mật và nhận</a>
            truyền thông tiếp thị từ chúng tôi.</p>
      </div>
    </form>
  </div>
     </div>
     </div>
      <div id="test1" class="col s12 left-align">

        <div class="card">
          <div class="row">
       <form class="col s12" method="POST">

           <div class="input-field col s12">
             <i class="material-icons prefix">email</i>
             <input id="icon_prefix" type="text" name="emaillog" class="validate">
             <label for="icon_prefix">Email</label>
           </div>
           <div class="input-field col s12 meh">
             <i class="material-icons prefix">lock</i>
             <input id="icon_prefix" type="password" name="passworddb" class="validate">
             <label for="icon_prefix">Password</label>
           </div>

           <?php require 'includes/loginconfirmation.php';?>
               <div class="center-align">
                   <button type="submit" name="login" class="btn button-rounded waves-effect waves-light ">Login</button>
               </div>&nbsp;
               &nbsp;
               <div class="center-align">
                   <a href="pass.php">forgot password?</a>
               </div>

       </form>
     </div>
        </div>

      </div>
      </div>
      </div>
   </div>
  </div>
</div>


  <?php require 'includes/footer.php'; ?>
