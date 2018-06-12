<?php 

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require 'database.php';
require 'models/artis.php';
require 'models/user.php';

$db = new Database();
$app = new \Slim\App;


/* ARTIS 
load($id)V
load_all()V
get_data()
add_artis($nama)v
edit_artis($nama)v
delete_artis()v
search_artis_by_nama($nama)v
*/
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
	$artis_model->load_all();
	$response->getBody()->write(json_endode($body));

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
    $artis_model = new Product($db);
    $artis_model->load($id);
    $body = $artis_model->delete_artis();
    $response->getBody()->write(json_encode($body));

    $newResponse = $response->withHeader('Content-type', 'application/json')
                            ->withHeader('Access-Control-Allow-Origin', '*')
                            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
                            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    return $newResponse;
});

$app->get('/artis/{nama}', function (Request $request, Response $response, array $args){
	global $db;
    $nama = $args['nama'];
    $artis_model = new artis($db);
    $artis_model->search_artis_by_nama($nama);
    $body = $artis_model->get_data();
    $response->getBody()->write(json_encode($body));

    $newResponse = $response->withHeader('Content-type', 'application/json')->withHeader('Access-Control-Allow-Origin', '*');
    return $newResponse;
});

/* USER
load($id)v
load_all()v
get_data()
register($nama, $email, $password, $status, $subscribe)v
login($email,$password)v
update_user($nama, $email, $password, $subscribe,$id)v
subscribe($subscribe)v
delete_user()v
 */

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
	$user_model->load_all();
	$response->getBody()->write(json_endode($body));

	$newResponse = $response->withHeader('Content-type', 'application/json')->withHeader('Access-Control-Allow-Origin', '*');
    return $newResponse;
});

$app->post('/user',function (Request $request, Response $response, array $args){
	global $db;
    $data = $request->getParsedBody();
    $user_model = new user($db);
    $body = $user_model->register($data['nama'], $data['email'],$data['password'], $data['subscribe']);
    $response->getBody()->write(json_encode($body));

    $newResponse = $response->withHeader('Content-type', 'application/json')->withHeader('Access-Control-Allow-Origin', '*');
    return $newResponse;
});

$app->post('/user', function (Request $request, Response $response, array $args) {
	global $db;
    $data = $request->getParsedBody();
    $user_model = new user($db);
    $body = $user_model->login($data['email'], $data['password']);
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

$app->put('/user/{id}', function (Request $request, Response $response, array $args) {
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

$app->run();

?>