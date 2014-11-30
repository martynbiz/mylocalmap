<?php

// set models
$dbConfig = $this->config('db');

$databaseAdapter = new \MartynBiz\Database\Adapter($dbConfig);

// set the models in service
$this->service(array(
    'models.accounts' => new \App\Model\Account($databaseAdapter),
    'models.transactions' => new \App\Model\Transaction($databaseAdapter),
    'models.users' => new \App\Model\User($databaseAdapter),
));