<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/loginstyle.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
   <section class="loginmain">
     <div class="container">
       <div class="row">
         <div class="col-md-7">
           <div class="login-box">
             <img class="logol" src="<?= base_url(); ?>assets/images/logo1.png">
             <h3>SHOPE</h3>
             <?php echo $this->session->flashdata('message'); ?>
             <form method="post" action="<?= base_url(); ?>login/authorizein">
               <input type="text" name="userName" placeholder="Username / Email">
               <input type="password" name="userPassword" placeholder="Password">
              <div class="forgotsubmit">
               <a href="#">Forgot Password?</a>
                <button type="submit">Login</button></div>
               
               
             </form>
           </div>
           <img class="scholerzlogo" src="<?= base_url(); ?>assets/images/scholerz.png">
         </div>

         <div class="col-md-5"></div>
       </div>
     </div>
   </section>

</body>
</html>