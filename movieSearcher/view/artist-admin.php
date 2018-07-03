<?php
session_start();
    if (!isset($_SESSION['email'])) {
        header("location:sign-in-admin.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
	<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="../plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="../plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="../plugins/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
	<title>Artist</title>
</head>
<body>
<div id="wrapper">
	<nav class="navbar navbar-default navbar-static-top m-b-0" style="padding: 0px;">
            <div class="navbar-header">
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <a class="profile-pic" href="#"> <img src="profile.jpg" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><?php echo $_SESSION['nama']; ?></b></a>
                    </li>
                </ul>
            </div>
    </nav>
	<div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Movie Reviews</span></h3>
                </div>
                <ul class="nav" id="side-menu">
                    <li style="padding: 70px 0 0;">
                        <a href="index-admin.php" class="waves-effect"><i class="fa fa-film fa-fw" aria-hidden="true"></i>Movie List</a>
                    </li>
                    <li>
                        <a href="artist-admin.php" class="waves-effect active"><i class="fa  fa-star-half-empty fa-fw" aria-hidden="true"></i>Artist List</a>
                    </li>
                    <li>
                        <a href="user-admin.php" class="waves-effect"><i class="fa fa-users fa-fw" aria-hidden="true"></i>User List</a>
                    </li>
                    <li>
                        <a href="sign-in-admin.php" class="waves-effect"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>Sign Out</a>
                    </li>
                </ul>
            </div>
    </div>
    <div id="page-wrapper">
    	<div class="container-fluid">
    		<div class="row row bg-title"><div class="col"><h1>Artist List</h1></div>
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-hover" id>
                    <thead>
                        <tr>
                            <th width="10%">#</th>
                            <th width="80%">Nama</th>
                        </tr>
                    </thead>
                    <tbody id="artis-table">

                    </tbody>
                </table>
            </div>
        </div>
    		</div>
    	</div>
	</div>

  <!-- ADD ARTIS MODAL -->
      <div class="modal fade" role="dialog" id="add-movie-modal" data-keyboard="false" data-backdrop="static">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
              <div class="modal-header">
                  <h3 class="modal-title">Add Artis</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="form-group">
                      <label for="nama-artis">Nama: </label>
                      <input type="text" id="nama_artis" class="form-control" placeholder="Artist Name">
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-primary" id="add-movie-submit">Add</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
              </div>
          </div>
      </div>

<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script type="text/javascript">
    function load_data(){
        $("#artis-table").html('');
        $.get('http://localhost:8008/public/artis',{}, function(data){
            $.each(data, function(index,value){
                var line = '<tr><td>' + (index + 1) + '</td><td>' + value['nama'] + '</td><button class="btn btn-danger" onclick="delete_artis(' + value['id'] + ')">Delete</button></td></tr>';
                $('#movie-table').append(line);
            });
        });
    }
    function delete_artis(id){
        $.delete('http://localhost:8008/public/artis/' + id, {"_METHOD": "DELETE"}, function(data){
            if(data['status'] == 0){
                alert(data['msg']);
            }else{
                load_data();
            }
        });
    }




    </script>
</body>
</html>
