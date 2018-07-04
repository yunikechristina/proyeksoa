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
                        <a href="basic-table.html" class="waves-effect"><i class="fa fa-users fa-fw" aria-hidden="true"></i>User List</a>
                    </li>
                    <li>
                        <a href="sign-in-admin.php" class="waves-effect"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>Sign Out</a>
                    </li>
                </ul>
            </div>
    </div>
    <div id="page-wrapper">
        <h1 style="margin-left: 10px;">Movie Detail</h1>
        <form style="width: 32%; margin-left: 20px; padding-top: 20px;">
            <div class="form-group">
                <label for="formGroupExampleInput">Movie ID</label>
                <input type="text" class="form-control" id="movie-id" disabled>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Movie Title</label>
                <input type="text" class="form-control" id="movie-title" placeholder="Movie Title">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Year</label>
                <input type="text" class="form-control" id="movie-year" placeholder="Year">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Sinopsis</label>
                <textarea class="form-control" id="movie-sinopsis" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Genre</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Action">
                    <label class="form-check-label" for="inlineCheckbox1">Action</label>
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Horror">
                    <label class="form-check-label" for="inlineCheckbox2">Horror</label>
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox8" value="Thriller">
                    <label class="form-check-label" for="inlineCheckbox2">Thriller</label>
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox6" value="Comedy">
                    <label class="form-check-label" for="inlineCheckbox2">Comedy</label>
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="Fantasy">
                    <label class="form-check-label" for="inlineCheckbox2">Fantasy</label>
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="Animation">
                    <label class="form-check-label" for="inlineCheckbox2">Animation</label>
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="Adventure">
                    <label class="form-check-label" for="inlineCheckbox2">Adventure</label>
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox7" value="Romance">
                    <label class="form-check-label" for="inlineCheckbox2">Romance</label>
                </div>
            </div>
        </form>
        <div class="container-fluid">
            <div class="row row bg-title">
                <div class="col">
                    <h1 style="display: inline-block;">Trailer List</h1>
                    <button class="btn btn-success" style="margin-top: 15px; float: right;" data-toggle="modal" data-target="#add-trailer-modal">Add Trailer</button>
                </div>
            </div>
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-hover" id>
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="20%">Trailer</th>
                        </tr>
                    </thead>
                    <tbody id="trailer-table">

                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <div class="container-fluid">
            <div class="row row bg-title">
                <div class="col">
                    <h1 style="display: inline-block;">Image List</h1>
                </div>
            </div>
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-hover" id>
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="20%">Image Title</th>
                            <th width="10%">Image</th>
                        </tr>
                    </thead>
                    <tbody id="image-table">

                    </tbody>
                </table>
            </div>
            <form>
              <div class="form-group">
                <label for="exampleFormControlFile1">Input image</label>
                <input type="file" class="form-control-file" id="movie-image">
              </div>
            </form>
        </div>
    </div>
    <button type="button" style="float: right; margin-right: 30px;" id="movie-id" class="btn btn-primary" onclick="save()">SAVE</button>
    </div>
</div>

<!-- ADD MOVIE MODAL -->
    <div class="modal fade" role="dialog" id="add-trailer-modal" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Add Trailer</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="trailer-link">Link: </label>
                    <input type="text" id="add-trailer-link" class="form-control" placeholder="Link">
                </div>
                <div class="form-group">
                    <label for="trailer-id-movie">Id Movie: </label>
                    <input type="text" id="add-movie-id" class="form-control" disabled>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="add-trailer-submit">Add</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
<!-- EDIT MOVIE MODAL -->
<div class="modal fade" tabindex="-1" role="dialog" id="edit-trailer-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Edit Trailer</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="trailer-link">Link: </label>
                    <input type="text" id="edit-trailer-link" class="form-control" placeholder="Link">
                </div>
                <div class="form-group">
                    <label for="trailer-id-movie">Id movie: </label>
                    <input type="text" id="edit-trailer-id-movie" class="form-control" disabled>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="edit-trailer-submit" data="0" onclick="edit_trailer()">Edit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>


   <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <!--  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script> -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    
    <script type="text/javascript">
        function decode_base64 (s)
        {
            var e = {}, i, k, v = [], r = '', w = String.fromCharCode;
            var n = [[65, 91], [97, 123], [48, 58], [43, 44], [47, 48]];

            for (z in n)
            {
                for (i = n[z][0]; i < n[z][1]; i++)
                {
                    v.push(w(i));
                }
            }
            for (i = 0; i < 64; i++)
            {
                e[v[i]] = i;
            }

            for (i = 0; i < s.length; i+=72)
            {
                var b = 0, c, x, l = 0, o = s.substring(i, i+72);
                for (x = 0; x < o.length; x++)
                {
                    c = e[o.charAt(x)];
                    b = (b << 6) + c;
                    l += 6;
                    while (l >= 8)
                    {
                        r += w((b >>> (l -= 8)) % 256);
                    }
                 }
            }
            return r;
        }

        function load_data(id){
            $("#trailer-table").html('');
            $.get('http://localhost:8008/public/trailer/search/'+id,{}, function(data){
                $.each(data, function(index,value){
                    // <td><button class="btn btn-warning" onclick="load_movie(' + value['id'] + ')">Edit</button></td>
                    var line = '<tr><td>' + (index + 1) + '</td><td><iframe width="420" height="315" src="'+value['link']+'"></iframe></td><td><button style="margin-right:10px;" class="btn btn-success" onclick="load_trailer(' + value['id'] + ')">Edit</button><button class="btn btn-danger" onclick="delete_trailer(' + value['id'] + ')">Delete</button></td></tr>';
                    $('#trailer-table').append(line);
                });
            });

            $("#image-table").html('');
            $.get('http://localhost:8008/public/image/search/'+id,{}, function(data){
                $.each(data, function(index,value){
                    //echo '<img src="data:'.$result['tipe'].';base64,'.base64_encode($result['data']).'"/>';
                    var line = '<tr><td>' + (index + 1) + '</td><td>' + value['nama_file'] + '</td><td><img id="myimg" width="420" height="315" src="data:'+value['tipe']+';base64,' + value['data'] +'" /></td><td><button class="btn btn-danger" onclick="delete_image(' + value['id'] + ')">Delete</button></td></tr>';
                    $('#image-table').append(line);

                    //$('#myimg').attr('src', "data:image/"+ value['tipe'] +";base64,"+value['data'])
                    //$('#image-table').append(line);
                });
            });
        }
        function load_trailer(id){
            $.get('http://localhost:8800/public/trailer/' + id, {}, function(data){
                $("#edit-trailer-link").val(data['link']);
                $("#edit-trailer-id-movie").val(data['id_movie']);
                $("#edit-trailer-submit").data('id', id);
                $("#edit-trailer-modal").modal();
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
        function delete_trailer(id){
            $.delete('http://localhost:8008/public/trailer/' + id, {"_METHOD": "DELETE"}, function(data){
                if(data['status'] == 0){
                    alert(data['msg']);
                }else{
                    load_data($("#movie-id").val());
                }
            });
        }

        function edit_trailer(){
            var id = $("#edit-trailer-submit").data('id');
            var link = $("#edit-trailer-link").val();
            var id_movie = $("#edit-trailer-id-movie").val();
            $.put('http://localhost:8008/public/trailer/' + id, {'link': link, 'id_movie': id_movie}, function(data){
                if(data['status'] == 0){
                    alert(data['msg']);
                }else{
                    load_data();
                    $("#edit-trailer-link").val('');
                    $("#edit-trailer-id-movie").val('');
                    $("#edit-trailer-submit").data('id', 0);
                    $("#edit-trailer-modal").modal('hide');
                }
            });
        }
        function save(){
            var genres = [];
            var title=$("#movie-title").val();
            var year=$("#movie-year").val();
            var sinopsis=$("#movie-sinopsis").val();
            var id=$("#movie-id").val();
            $('input[class=form-check-input]:checked').each(function(){
                genres.push(this.value);
            });
            $.put('http://localhost:8008/public/movie/' + id, {'judul': title, 'tahun': year, 'sinopsis': sinopsis, 'genre': genres.toString()}, function(data){
                if(data['status'] == 0){
                    alert(data['msg']);
                }else{
                    window.location.href="index-admin.php";
                }
            });
        }
        $(document).ready(function(){
            var queryString = decodeURIComponent(window.location.search);
            queryString = queryString.substring(1);
            var queries = queryString.split("&");
            $("#movie-title").val(queries[1].split("=").pop());
            $("#movie-year").val(queries[2].split("=").pop());
            $("#movie-sinopsis").val(queries[4].split("=").pop());
            $("#movie-id").val(queries[0].split("=").pop());
            $("#add-movie-id").val(queries[0].split("=").pop());
            var array = queries[3].split("=").pop().split(",");
            for(i=0;i<array.length;i++){
                $('input[class=form-check-input]').each(function(){
                    if(this.value == array[i]){
                        $('input[value='+this.value+']').prop('checked',true);
                    }
                });
            }
            load_data(queries[0].split("=").pop());

            $("#add-trailer-submit").click(function(){
                var link = $("#add-trailer-link").val();
                var movie_id = $("#add-movie-id").val();
                $.post('http://localhost:8008/public/trailer', {'link': link, 'id_movie': movie_id}, function(data){
                    if(data['status'] == 0){
                        alert(data['msg']);
                    }else{
                        load_data(movie_id);
                        $("#add-trailer-link").val('');
                        $("#add-movie-id").val('');
                        $("#add-trailer-modal").modal('hide');
                    }
                });
            });
        });
    </script>


</body>
</html>
