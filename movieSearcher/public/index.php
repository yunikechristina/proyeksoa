<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require 'database.php';
require 'models/artis.php';
require 'models/user.php';
require 'models/movie.php';
require 'models/komentar.php';
require 'models/trailer.php';

$db = new Database();
$app = new \Slim\App;


/* ARTIS */
$app->get('/artis/search/{nama}', function (Request $request, Response $response, array $args){
    global $db;
    $nama = $args['nama'];
    $artis_model = new artis($db);
    $body =  $artis_model->search_artis_by_nama($nama);
    $response->getBody()->write(json_encode($body));

    $newResponse = $response->withHeader('Content-type', 'application/json')->withHeader('Access-Control-Allow-Origin', '*');
    return $newResponse;
});

$app->get('/artis/{id}', function (Request $request, Response $response, array $args) {
    global $db;
    $id = $args['id'];
    $artis_model = new artis($db);
    $artis_model->load($id);
    $body = $artis_model->get_data();
    $response->getBody()->write(json_encode($body));

    $newResponse = $response->withHeader('Content-type', 'application/json')->withHeader('Access-Control-Allow-Origin', '*');
    return $newResponse;
});

$app->get('/artis', function (Request $request, Response $response, array $args){
	global $db;
	$artis_model = new artis($db);
	$body = $artis_model->load_all();
	$response->getBody()->write(json_encode($body));
	$newResponse = $response->withHeader('Content-type', 'application/json')->withHeader('Access-Control-Allow-Origin', '*');
    return $newResponse;
});

$app->post('/artis',function (Request $request, Response $response, array $args){
	global $db;
	$data = $request->getParsedBody();
	$artis_model = new artis($db);
	$artis_model->load($id);
	$body = $artis_model->add_artis($data['name']);
	$response->getBody()->write(json_encode($body));

	 $newResponse = $response->withHeader('Content-type', 'application/json')->withHeader('Access-Control-Allow-Origin', '*');
    return $newResponse;
});

$app->put('/artis/{id}',function (Request $request, Response $response, array $args){
	global $db;
	$id = $args['id'];
	$data= $request->getParsedBody();
	$artis_model = new artis($db);
	$artis_model->load($id);
	$body = $artis_model->edit_artis($data['name']);
	$response->getBody()->write(json_encode($body));

    $newResponse = $response->withHeader('Content-type', 'application/json')->withHeader('Access-Control-Allow-Origin', '*');
    return $newResponse;
});

$app->delete('/artis/{id}', function (Request $request, Response $response, array $args){
	global $db;
	$id = $args['id'];
	$data = $request->getParsedBody();
    $artis_model = new artis($db);
    $artis_model->load($id);
    $body = $artis_model->delete_artis();
    $response->getBody()->write(json_encode($body));

    $newResponse = $response->withHeader('Content-type', 'application/json')
                            ->withHeader('Access-Control-Allow-Origin', '*')
                            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
                            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    return $newResponse;
});



/* USER */

$app->get('/user/{id}', function (Request $request, Response $response, array $args) {
	global $db;
    $id = $args['id'];
    $user_model = new user($db);
    $user_model->load($id);
    $body = $user_model->get_data();
    $response->getBody()->write(json_encode($body));

    $newResponse = $response->withHeader('Content-type', 'application/json')->withHeader('Access-Control-Allow-Origin', '*');
    return $newResponse;
});

$app->get('/user',function (Request $request, Response $response, array $args){
	global $db;
    $user_model = new user($db);
    $body = $user_model->load_all();
    $response->getBody()->write(json_encode($body));
    $newResponse = $response->withHeader('Content-type', 'application/json')->withHeader('Access-Control-Allow-Origin', '*');
    return $newResponse;
});

$app->post('/user/login', function (Request $request, Response $response, array $args) {
    global $db;
    $data = $request->getParsedBody();
    $user_model = new user($db);
    $body = $user_model->login($data['email'], $data['password']);
    $response->getBody()->write(json_encode($body));

    $newResponse = $response->withHeader('Content-type', 'application/json')->withHeader('Access-Control-Allow-Origin', '*');
    return $newResponse;
});

$app->post('/user/register',function (Request $request, Response $response, array $args){
	global $db;
    $data = $request->getParsedBody();
    $user_model = new user($db);
    $body = $user_model->register($data['nama'], $data['email'], $data['password'], $data['status'], $data['subscribe']);
    $response->getBody()->write(json_encode($body));

    $newResponse = $response->withHeader('Content-type', 'application/json')->withHeader('Access-Control-Allow-Origin', '*');
    return $newResponse;
});

$app->put('/user/subscribe/{id}', function (Request $request, Response $response, array $args) {
    global $db;
    $id = $args['id'];
    $data = $request->getParsedBody();
    $user_model = new user($db);
    $user_model->load($id);
    $body = $user_model->subscribe($data['subscribe']);
    $response->getBody()->write(json_encode($body));

    $newResponse = $response->withHeader('Content-type', 'application/json')->withHeader('Access-Control-Allow-Origin', '*');
    return $newResponse;
});

$app->put('/user/{id}', function (Request $request, Response $response, array $args){
    global $db;
    $id = $args['id'];
    $data = $request->getParsedBody();
    $user_model = new user($db);
    $user_model->load($id);
    $body = $user_model->update_user($data['nama'], $data['email'], $data['password'], $data['subscribe']);
    $response->getBody()->write(json_encode($body));

    $newResponse = $response->withHeader('Content-type', 'application/json')->withHeader('Access-Control-Allow-Origin', '*');
    return $newResponse;
});

$app->delete('/user/{id}', function (Request $request, Response $response, array $args) {
    global $db;
    $id = $args['id'];
    $data = $request->getParsedBody();
    $user_model = new user($db);
    $user_model->load($id);
    $body = $user_model->delete_user();
    $response->getBody()->write(json_encode($body));

    $newResponse = $response->withHeader('Content-type', 'application/json')
                            ->withHeader('Access-Control-Allow-Origin', '*')
                            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
                            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    return $newResponse;
});

/* MOVIE
add_movie($judul,$tahun,$sinopsis,$img,$trailer,$genre)
edit_movie($judul,$tahun,$sinopsis,$img,$trailer,$genre)
delete_movie()
search_movie($name)
*/


$app->get('/movie/search/{nama}', function (Request $request, Response $response, array $args){
    global $db;
    $nama = $args['nama'];
    $movie_model = new movie($db);
    $body =  $movie_model->search_movie($nama);
    $response->getBody()->write(json_encode($body));

    $newResponse = $response->withHeader('Content-type', 'application/json')->withHeader('Access-Control-Allow-Origin', '*');
    return $newResponse;
});

$app->get('movie/{id}', function (Request $request, Response $response, array $args){
    global $db;
    $id = $args['id'];
    $movie_model = new movie($db);
    $movie_model->load($id);
    $body = $movie_model->get_data();
    $response->getBody()->write(json_encode($body));

    $newResponse = $response->withHeader('Content-type', 'application/json')->withHeader('Access-Control-Allow-Origin', '*');
    return $newResponse;
});

$app->get('/movie',function (Request $request, Response $response, array $args){
    global $db;
    $movie_model = new movie($db);
    $body = $movie_model->load_all();
    $response->getBody()->write(json_encode($body));
    $newResponse = $response->withHeader('Content-type', 'application/json')->withHeader('Access-Control-Allow-Origin', '*');
    return $newResponse;
});

$app->post('/movie',function (Request $request, Response $response, array $args){
    global $db;
    $data = $request->getParsedBody();
    $movie_model = new movie($db);
    $movie_model->load($id);
    $body = $movie_model->add_movie($data['judul'],$data['tahun'],$data['sinopsis'],$data['img'],$data['trailer'],$data['genre']);
    $response->getBody()->write(json_encode($body));

     $newResponse = $response->withHeader('Content-type', 'application/json')->withHeader('Access-Control-Allow-Origin', '*');
    return $newResponse;
});

$app->put('/movie/{id}', function (Request $request, Response $response, array $args){
    global $db;
    $id = $args['id'];
    $data = $request->getParsedBody();
    $movie_model = new movie($db);
    $movie_model->load($id);
    $body = $movie_model->update_movie($data['judul'],$data['tahun'],$data['sinopsis'],$data['img'],$data['trailer'],$data['genre']);
    $response->getBody()->write(json_encode($body));
    $newResponse = $response->withHeader('Content-type', 'application/json')->withHeader('Access-Control-Allow-Origin', '*');
    return $newResponse;
});

$app->delete('/movie/{id}', function (Request $request, Response $response, array $args) {
    global $db;
    $id = $args['id'];
    $data = $request->getParsedBody();
    $movie_model = new movie($db);
    $movie_model->load($id);
    $body = $movie_model->delete_user();
    $response->getBody()->write(json_encode($body));

    $newResponse = $response->withHeader('Content-type', 'application/json')
                            ->withHeader('Access-Control-Allow-Origin', '*')
                            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
                            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    return $newResponse;
});


/* KOMENTAR
search_komentar_by_movie($id_movie)
*/
$app->get('/komentar/search/{komen}',function (Request $request, Response $response, array $args){
    global $db;
    $nama = $args['nama'];
    $komen_model = new komentar($db);
    $komen_model->search_komentar_by_movie($id_movie);
    $body = $komen_model->get_data();
    $response->getBody()->write(json_encode($body));

    $newResponse = $response->withHeader('Content-type', 'application/json')->withHeader('Access-Control-Allow-Origin', '*');
    return $newResponse;
});

$app->get('/komentar/{id}', function (Request $request, Response $response, array $args) {
    global $db;
    $id = $args['id'];
    $komen_model = new komentar($db);
    $komen_model->load($id);
    $body = $komen_model->get_data();
    $response->getBody()->write(json_encode($body));

    $newResponse = $response->withHeader('Content-type', 'application/json')->withHeader('Access-Control-Allow-Origin', '*');
    return $newResponse;
});

$app->get('/komentar',function (Request $request, Response $response, array $args){
    global $db;
    $komen_model = new komentar($db);
    $komen_model->load_all();
    $response->getBody()->write(json_encode($body));

    $newResponse = $response->withHeader('Content-type', 'application/json')->withHeader('Access-Control-Allow-Origin', '*');
    return $newResponse;
});

$app->post('/komentar',function (Request $request, Response $response, array $args){
    global $db;
    $data = $request->getParsedBody();
    $komen_model = new komentar($db);
    $body = $komen_model->add_komentar($data['komen'], $data['id_user'], $data['id_movie']);
    $response->getBody()->write(json_encode($body));

    $newResponse = $response->withHeader('Content-type', 'application/json')->withHeader('Access-Control-Allow-Origin', '*');
    return $newResponse;
});

$app->put('/komentar/{id}', function (Request $request, Response $response, array $args){
    global $db;
    $id = $args['id'];
    $data = $request->getParsedBody();
    $komen_model = new komentar($db);
    $komen_model->load($id);
    $body = $komen_model->edit_komentar($data['komen'], $data['id_user'], $data['id_movie']);
    $response->getBody()->write(json_encode($body));

    $newResponse = $response->withHeader('Content-type', 'application/json')->withHeader('Access-Control-Allow-Origin', '*');
    return $newResponse;
});

$app->delete('/komentar/{id}', function (Request $request, Response $response, array $args) {
    global $db;
    $id = $args['id'];
    $data = $request->getParsedBody();
    $komen_model = new komentar($db);
    $komen_model->load($id);
    $body = $komen_model->delete_komentar();
    $response->getBody()->write(json_encode($body));

    $newResponse = $response->withHeader('Content-type', 'application/json')
                            ->withHeader('Access-Control-Allow-Origin', '*')
                            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
                            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    return $newResponse;
});

/*trailer
load($id)
load_all()
get_data()
add_trailer($link,$id_movie)
edit_trailer($link,$id_movie)
delete_trailer()
search_trailer_by_movie($id_movie)*/

$app->get('/trailer/search/{id_movie}',function (Request $request, Response $response, array $args){
    global $db;
    $nama = $args['nama'];
    $trailer_model = new trailer($db);
    $trailer_model->search_trailer_by_movie($id_movie);
    $body = $trailer_model->get_data();
    $response->getBody()->write(json_encode($body));

    $newResponse = $response->withHeader('Content-type', 'application/json')->withHeader('Access-Control-Allow-Origin', '*');
    return $newResponse;
});

$app->get('/trailer/{id}', function (Request $request, Response $response, array $args) {
    global $db;
    $id = $args['id'];
    $trailer_model = new trailer($db);
    $trailer_model->load($id);
    $body = $trailer_model->get_data();
    $response->getBody()->write(json_encode($body));

    $newResponse = $response->withHeader('Content-type', 'application/json')->withHeader('Access-Control-Allow-Origin', '*');
    return $newResponse;
});

$app->get('/trailer',function (Request $request, Response $response, array $args){
    global $db;
    $trailer_model = new trailer($db);
    $trailer_model->load_all();
    $response->getBody()->write(json_encode($body));

    $newResponse = $response->withHeader('Content-type', 'application/json')->withHeader('Access-Control-Allow-Origin', '*');
    return $newResponse;
});

$app->post('/trailer',function (Request $request, Response $response, array $args){
    global $db;
    $data = $request->getParsedBody();
    $trailer_model = new trailer($db);
    $body = $komen_model->add_trailer($data['link'],$data['id_movie']);
    $response->getBody()->write(json_encode($body));

    $newResponse = $response->withHeader('Content-type', 'application/json')->withHeader('Access-Control-Allow-Origin', '*');
    return $newResponse;
});

$app->put('/trailer/{id}', function (Request $request, Response $response, array $args){
    global $db;
    $id = $args['id'];
    $data = $request->getParsedBody();
    $trailer_model = new trailer($db);
    $trailer_model->load($id);
    $body = $komen_model->edit_trailer($data['link'],$data['id_movie']);
    $response->getBody()->write(json_encode($body));

    $newResponse = $response->withHeader('Content-type', 'application/json')->withHeader('Access-Control-Allow-Origin', '*');
    return $newResponse;
});

$app->delete('/trailer/{id}', function (Request $request, Response $response, array $args) {
    global $db;
    $id = $args['id'];
    $data = $request->getParsedBody();
    $trailer_model = new trailer($db);
    $trailer_model->load($id);
    $body = $trailer_model->delete_trailer();
    $response->getBody()->write(json_encode($body));

    $newResponse = $response->withHeader('Content-type', 'application/json')
                            ->withHeader('Access-Control-Allow-Origin', '*')
                            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
                            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    return $newResponse;
});



$app->run();

?>
