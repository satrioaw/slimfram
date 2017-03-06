<?php
// Routes
$app->get('/','App\Action\HomeAction:dispatch')->setName('homepage');
$app->get('/login', 'App\Action\HomeAction:login')->setName('login');
$app->get('/logout', 'App\Action\HomeAction:logout')->setName('logout');
$app->get('/register', 'App\Action\HomeAction:register')->setName('register');
$app->get('/dashboard', 'App\Action\HomeAction:dashboard')->setName('dashboard');
$app->post('/login','App\Action\HomeAction:loginPost')->setName('login.post');
//$app->post('/login','App\Action\HomeAction:testJson')->setName('login.post');
$app->post('/register','App\Action\HomeAction:registerPost')->setName('register.post');

$app->get('/admin', 'App\Action\HomeAction:dashboard')->setName('dashboard');

/*$route = App\Model\Route::all();
foreach ($route as $rt) {
	$app->get('/'.$rt->route,$rt->address)->setName($rt->route);
}*/

//route for trx
$app->get('/trx','App\Action\TrxmoneyAction:index');
$app->get('/trx/approve/{id}','App\Action\TrxmoneyAction:update');
$app->get('/trx/form','App\Action\TrxmoneyAction:create');
$app->post('/trx/send','App\Action\TrxmoneyAction:store');

//route for trx
$app->get('/api/trx','App\Action\TrxmoneyAction:indexJson');
$app->get('/api/trx/approve/{id}','App\Action\TrxmoneyAction:updateJson');
$app->post('/api/trx/send','App\Action\TrxmoneyAction:storeJson');