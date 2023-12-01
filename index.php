<?php
// use Composer autoloader
require 'vendor/autoload.php';
\Slim\Slim::registerAutoloader();

// configure credentials
// for MySQL
$config["db"]["name"] = 'test';
$config["db"]["host"] = 'localhost';
$config["db"]["port"] = '3306';
$config["db"]["user"] = 'root';
$config["db"]["password"] = '';

// configure Slim application instance
$app = new \Slim\Slim();
$app->config(array(
  'debug' => true,
  'templates.path' => '.'
));

// initialize PDO object
$db = $config["db"]["name"];
$host = $config["db"]["host"];
$port = $config["db"]["port"];
$username = $config["db"]["user"];
$password = $config["db"]["password"];  
$dbh = new PDO("mysql:host=$host;dbname=$db;port=$port;charset=utf8", $username, $password);

// start session for flash messages
session_start();

// index page handlers
$app->get('/', function () use ($app) {
  $app->redirect('/index');
});

$app->get('/index',  function () use ($app, $dbh) {
  $sth = $dbh->query("SELECT id, tdesc, tdue FROM tasks ORDER BY tdue");
  $app->render('index.tpl', array('data' => $sth));
});

$app->get('/delete/:id',  function ($id) use ($app, $dbh) {
  $dbh->exec("DELETE FROM tasks WHERE id='$id'");
  $app->flash('success', 'Task successfully deleted.');
  $app->redirect('/index');
});

$app->post('/add',  function () use ($app, $dbh) {
  $tdesc = $app->request->params('tdesc');
  $tdue = $app->request->params('tdue');
  if (!empty($tdesc) && !empty($tdue)) {
    $sth = $dbh->prepare("INSERT INTO tasks (tdesc, tdue) VALUES(:desc, :due)");
    $sth->execute(array(':desc' => $tdesc, ':due' => $tdue));  
    $app->flash('success', 'Task successfully added.');
  } else {
    $app->flash('error', 'Please enter both description and date.');
  }
  $app->redirect('/index');
});

$app->run();
