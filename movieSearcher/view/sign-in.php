<?php
    session_start();

    if(isset($_SESSION['email']) && isset($_SESSION['password'])){
      session_unset();
      session_destroy();
    }
    if(isset($_POST['email']) && $_POST['password']){
      $_SESSION['email'] = $_GET['email'];
      $_SESSION['password'] = $_GET['password'];
    }



?>
<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>Sign In</title>
</head>
<body>
<div class="container" style="height: 100%;width: 40%; margin-top: 50px;">
    <div class="jumbotron" style="height: 100%;">
        <h1>Movie Review</h1>
  <form method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="InputPassword1" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary" id="sign-in-submit" onclick="signin()">Submit</button>
  </form>

  <!-- <?php
      if(isset($_POST['email']) && isset($_POST['password'])){
        $url = 'http://localhost:8000/public/user/login';
        $data = array('email' => $_POST['email'], 'password' => $_POST['password']);

        $options = array(
          'http' => array(
            'header' => "Content-type : application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
          )
        );
        $context = stream_context_create($options);
        $result = file_get_contents($url,false, $context);


          if ($result['status'] === 1){
            header("Location : index.php");
          } else {
            echo "<p style='color:red;''>password dan username salah</p>";
          }
      }
   ?>-->

  <button type="button" class="btn btn-primary" id="sign-in-submit" onclick="signin()">Sign In</button>
  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#register-modal">Sign Up</button>
</form>
    </div>
</div>

<!-- Sign Up modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="register-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Register Your Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="user-name">Nama: </label>
                    <input type="text" id="register-user-nama" class="form-control" placeholder="Nama">
                </div>
                <div class="form-group">
                    <label for="user-email">Email: </label>
                    <input type="text" id="register-user-email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="user-password">Password: </label>
                    <input type="password" id="register-user-password" class="form-control" placeholder="Password">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="register-user-submit" data="0" onclick="signup()">Register</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

    <script type="text/javascript">
      function signin(){
        var email = document.getElementById("InputEmail1").value;
        var password = document.getElementById("InputPassword1").value;
        $.post('http://localhost:8000/public/user/login',{'email' : email, 'password' : password},function(data){
            if(data['status'] == 0){
              alert(data['msg']);
            }else{
              alert(data['msg']);
              window.location.href="index.php";
            }
          });
      }

      function signup(){
        var nama = $('#register-user-nama').val();
        var email = $('#register-user-email').val();
        var password = $('#register-user-password').val();
        $.post('http://localhost:8080/public/user/register',{'nama' : nama, 'email' : email, 'password' : password, 'status' : 'user', 'subscribe' : 'false'},function(data){
          alert(data);
            if(data['status'] == 0){
              alert(data['msg']);
            }else{
              alert(data['msg']);
              window.location.href="sign-in.php";
            }
          });
      }

      /*$(document).ready(function(){
        $("#sign-in-submit").click(function(){
          var email = ("#InputEmail1").val();
          alert(email);
          var password = ("#InputPassword1").val();
          alert(password);
          $.post('http://localhost:8008/public/user/login',{'email' = email, 'password' = password},function(data){
            if(data['status'] == 0){
              alert(data['msg']);
            }else{
              alert(data['msg']);
              href.location="index.php";
            }
          });
        });
      });*/

    </script>
</body>
</html>
