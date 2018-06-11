<?php 

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require 'database.php';
require 'models/artis.php';

$db = new Database();
$app = new \Slim\App;

$app->get('/artis/{id}', function (Request $request, Response $response, array $args) {
    global $db;
    $id = $args['id'];
    $product_model = new Product($db);
    $product_model->load($id);
    $body = $product_model->get_data();
    $response->getBody()->write(json_encode($body));

    $newResponse = $response->withHeader('Content-type', 'application/json')->withHeader('Access-Control-Allow-Origin', '*');
    return $newResponse;
});

$app->run();

?>