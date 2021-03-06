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
                        <a href="index-admin.php" class="waves-effect active"><i class="fa fa-film fa-fw" aria-hidden="true"></i>Movie List</a>
                    </li>
                    <li>
                        <a href="artist-admin.php" class="waves-effect"><i class="fa  fa-star-half-empty fa-fw" aria-hidden="true"></i>Artist List</a>
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
            <div class="row row bg-title">
                <div class="col">
                    <h1 style="display: inline-block;">Movie List</h1>
                    <button class="btn btn-success" style="margin-top: 15px; float: right;" data-toggle="modal" data-target="#add-movie-modal">Add Movie</button>
                </div>
            </div>
            <div class="row">
                <div class="form-inline">
                    <input class="form-control mr-sm-2" id="search-movie-keyword" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" id="search-movie-submit">Search</button>
                </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-hover" id>
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="20%">Movie Title</th>
                            <th width="10%">Year</th>
                            <th width="20%">Genre</th>
                            <th width="20%">Action</th>
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

<!-- ADD MOVIE MODAL -->
    <div class="modal fade" role="dialog" id="add-movie-modal" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Add Movie</h3>
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
                    <textarea class="form-control" id="movie-sinopsis" class="form-control" rows="3" placeholder="Synopsis"></textarea>
                </div>
                <div class="form-group">
                    <label for="movie-year">Year: </label>
                    <input type="text" id="movie-year" class="form-control" placeholder="Year">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Genre</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox" value="Action">
                        <label class="form-check-label" for="inlineCheckbox1">Action</label>
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox" value="Horror">
                        <label class="form-check-label" for="inlineCheckbox2">Horror</label>
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox" value="Thriller">
                        <label class="form-check-label" for="inlineCheckbox2">Thriller</label>
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox" value="Comedy">
                        <label class="form-check-label" for="inlineCheckbox2">Comedy</label>
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox" value="Fantasy">
                        <label class="form-check-label" for="inlineCheckbox2">Fantasy</label>
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox" value="Animation">
                        <label class="form-check-label" for="inlineCheckbox2">Animation</label>
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox" value="Adventure">
                        <label class="form-check-label" for="inlineCheckbox2">Adventure</label>
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox" value="Romance">
                        <label class="form-check-label" for="inlineCheckbox2">Romance</label>
                    </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="add-movie-submit">Add</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>

<!-- EDIT MOVIE MODAL -->
<?php /*
<div class="modal fade" tabindex="-1" role="dialog" id="edit-movie-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="movie-title">Title: </label>
                    <input type="text" id="edit-movie-title" class="form-control" placeholder="Movie Title">
                </div>
                <div class="form-group">
                    <label for="movie-sinopsis">Synopsis: </label>
                    <input type="text" id="edit-movie-sinopsis" class="form-control" placeholder="Synopsis">
                </div>
                <div class="form-group">
                    <label for="movie-year">Year: </label>
                    <input type="text" id="edit-movie-year" class="form-control" placeholder="Year">
                </div>
                <div class="form-group">
                    <label for="movie-genre">Genre: </label>
                    <input type="text" id="edit-movie-genre" class="form-control" placeholder="Genre">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="edit-movie-submit" data="0" onclick="edit_movie()">Edit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
    */ ?>


   <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <!--  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script> -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    
    <script type="text/javascript">
        function load_data(){
            $("#movie-table").html('');
            $.get('http://localhost:8008/public/movie',{}, function(data){
                $.each(data, function(index,value){
                    // <td><button class="btn btn-warning" onclick="load_movie(' + value['id'] + ')">Edit</button></td>
                    var line = '<tr><td>' + (index + 1) + '</td><td>' + value['judul'] + '</td><td>' + value['tahun'] + '</td><td>' + value['genre'] + '</td><td><button style="margin-right:10px;" class="btn btn-success" onclick="load_movie(' + value['id'] + ')">Detail</button><button class="btn btn-danger" onclick="delete_movie(' + value['id'] + ')">Delete</button></td></tr>';
                    $('#movie-table').append(line);
                });
            });
        }

        $.delete = function(url, data, callback, type){
            if ( $.isFunction(data) ){
            type = type || callback,
                callback = data,
                data = {}
            }
            return $.ajax({
                url: url,
                type: 'DELETE',
                success: callback,
                data: data,
                contentType: type
            });
        }
        $.put = function(url, data, callback, type){
            if ( $.isFunction(data) ){
                type = type || callback,
                callback = data,
                data = {}
            }
            return $.ajax({
                url: url,
                type: 'PUT',
                success: callback,
                data: data,
                contentType: type
            });
        }

        //PORT VIEW
        function delete_movie(id){
            $.delete('http://localhost:8008/public/movie/' + id, {"_METHOD": "DELETE"}, function(data){
                if(data['status'] == 0){
                    alert(data['msg']);
                }else{
                    load_data();
                }
            });
        }

        function load_movie(id){
            $.get('http://localhost:8800/public/movie/' + id, {}, function(data){
                window.location.href = "detail-movie.php?id="+id+"&judul="+data['judul']+"&tahun="+data['tahun']+"&genre="+data['genre']+"&sinopsis="+data['sinopsis'];
                // $("#edit-movie-title").val(data['judul']);
                // $("#edit-movie-year").val(data['tahun']);
                // $("#edit-movie-genre").val(data['genre']);
                // $("#edit-movie-sinopsis").val(data['sinopsis']);
                // $("#edit-movie-submit").data('id', id);
                // $("#edit-movie-modal").modal();
            });
        }

        function edit_movie(){
            var id = $("#edit-movie-submit").data('id');
            var title = $("#edit-movie-title").val();
            var year = $("#edit-movie-year").val();
            var genre = $("#edit-movie-genre").val();
            var sinopsis = $("#edit-movie-sinopsis").val();
            $.put('http://localhost:8008/public/movie/' + id, {'judul': title, 'tahun': year, 'sinopsis': sinopsis, 'genre': genre}, function(data){
                if(data['status'] == 0){
                    alert(data['msg']);
                }else{
                    load_data();
                    $("#edit-movie-title").val('');
                    $("#edit-movie-year").val('');
                    $("#edit-movie-genre").val('');
                    $("#edit-movie-sinopsis").val('');
                    $("#edit-movie-submit").data('id', 0);
                    $("#edit-movie-sinopsis").modal('hide');
                }
            });
        }

         function search_movie(name){
            $("#movie-table").html('');
            $.get('http://localhost:8800/public/movie/search/'+name, {}, function(data){
                $.each(data, function(index, value){
                    //<td><button class="btn btn-warning" onclick="load_movie(' + value['id'] + ')">Edit</button></td>
                    var line = '<tr><td>' + (index + 1) + '</td><td>' + value['judul'] + '</td><td>' + value['tahun'] + '</td><td>' + value['genre'] + '</td><td><button class="btn btn-success" onclick="load_movie(' + value['id'] + ')">Detail</button><button class="btn btn-danger" onclick="delete_movie(' + value['id'] + ')">Delete</button></td></tr>';
                    $("#movie-table").append(line);
                });
            });
        }

        $(document).ready(function(){

            if ($("#search-movie-keyword").val() == "") {load_data();}
   

            $("#add-movie-submit").click(function(){
                var genres = [];
                var title = $("#movie-title").val();
                var sinopsis = $("#movie-sinopsis").val();
                $('input[class=form-check-input]:checked').each(function(){
                    genres.push(this.value);
                });
                var year = $("#movie-year").val();
                $.post('http://localhost:8008/public/movie', {'judul': title, 'tahun': year, 'sinopsis': sinopsis, 'genre': genres.toString()}, function(data){
                    if(data['status'] == 0){
                        alert(data['msg']);
                    }else{
                        load_data();
                        $("#movie-title").val('');
                        $("#movie-sinopsis").val('');
                        $('input[class=form-check-input]').prop('checked',false);
                        $("#movie-year").val('');
                        $("#add-movie-modal").modal('hide');
                    }
                });
            });

            $("#search-movie-submit").click(function(){
                if ($("#search-movie-keyword").val() == "") {load_data();}
                else {
                    var name = $("#search-movie-keyword").val();
                    search_movie(name);
                }
            });
        });
    </script>


</body>
</html>
