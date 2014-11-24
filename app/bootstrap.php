<?php

// set models
$dbConfig = $this->config('db');

$databaseAdapter = new \MartynBiz\Database\Adapter($dbConfig);