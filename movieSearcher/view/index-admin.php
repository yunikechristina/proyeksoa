<?php
		session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
 <!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous"> -->
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
    <title>home</title>
    <style>
    .modal-backdrop{
        z-index: -1;
    }
    #wrapper{
        z-index:0;
    }
</style>
</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-default navbar-static-top m-b-0" style="padding: 0px;">
            <div class="navbar-header">
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <form role="search" class="app-search hidden-sm hidden-xs m-r-10">
                            <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
                    </li>
                    <li>
                        <a class="profile-pic" href="#"> <img src="profile.jpg" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><?php echo $_SESSION['email']; ?></b></a>
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
                        <a href="index.php" class="waves-effect active"><i class="fa fa-film fa-fw" aria-hidden="true"></i>Movie List</a>
                    </li>
                    <li>
                        <a href="artist.php" class="waves-effect"><i class="fa  fa-star-half-empty fa-fw" aria-hidden="true"></i>Artist List</a>
                    </li>
                    <li>
                        <a href="basic-table.html" class="waves-effect"><i class="fa fa-users fa-fw" aria-hidden="true"></i>User List</a>
                    </li>
                    <li>
                        <a href="sign-in.php" class="waves-effect"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>Sign Out</a>
                    </li>
                </ul>
            </div>
    </div>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row row bg-title">
                <div class="col"><h1>Movie List</h1></div>
                <div class="text-right">
                    <button class="btn btn-success" style="margin-top: 10px;" data-toggle="modal" data-target="#add-movie-modal">Add Movie</button>
                </div>
            </div>
            <div class="row">
            <nav class="navbar navbar-light bg-light">
                <div class="form-inline">
                    <input class="form-control mr-sm-2" id="namaMovie" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" id="search">Search</button>
                </div>
            </nav>
        </div>
        <div class="row">
                    <?php print_r($_SESSION); ?>
            <div class="col-sm-12">
                <table class="table table-hover" id>
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="20%">Movie Title</th>
                            <th width="10%">Year</th>
                            <th width="20%">Genre</th>
                        </tr>
                    </thead>
                    <tbody id="movie-table">

                    </tbody>
                </table>
            </div>
        </div>

    </div>

        </div>
    </div>


    <div class="modal fade" role="dialog" id="add-movie-modal" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Movie</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="movie-title">Title: </label>
                    <input type="text" id="movie-title" class="form-control" placeholder="Movie Title">
                </div>
                <div class="form-group">
                    <label for="movie-sinopsis">Synopsis: </label>
                    <input type="text" id="movie-sinopsis" class="form-control" placeholder="Synopsis">
                </div>
                <div class="form-group">
                    <label for="movie-year">Year: </label>
                    <input type="text" id="movie-year" class="form-control" placeholder="Year">
                </div>
                <div class="form-group">
                    <label for="movie-genre">Genre: </label>
                    <input type="text" id="movie-genre" class="form-control" placeholder="Genre">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="add-movie-submit">Add</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
   <!--  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script> -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

    <script type="text/javascript">
        function load_data(){
            $("#movie-table").html('');
            $.get('http://localhost:8800/public/movie',{}, function(data){
                $.each(data, function(index,value){
                    var line = '<tr><td>' + (index + 1) + '</td><td>' + value['name'] + '</td><td>' + value['qty'] + '</td>';
                    $('#movie-table').append(line);
                });
            });
        }

        $(document).ready(function(){
            load_data();
   

            $("#add-movie-submit").click(function(){
                var title = $("#movie-title").val();
                var sinopsis = $("#movie-sinopsis").val();
                var genre = $("#movie-genre").val();
                var year = $("#movie-year").val();
                //'img': 'dummyimg', 'trailer': 'dummy',
                $.post('http://localhost:8008/public/movie', {'judul': title, 'tahun': year, 'sinopsis': sinopsis, 'genre': genre}, function(data){
                    if(data['status'] == 0){
                        alert(data['msg']);
                    }else{
                        load_data();
                        $("#movie-title").val('');
                        $("#movie-sinopsis").val('');
                        $("#movie-genre").val('');
                        $("#movie-year").val('');
                        $("#add-movie-modal").modal('hide');
                    }
                });
            });
        });
    </script>


</body>
</html>
