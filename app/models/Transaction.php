<?php

namespace App\Model;

/**
* 
*/
class Transaction extends \MartynBiz\Database\Table
{
    protected $tableName = 'transactions';
    
    protected $belongsTo = array(
        'account' => array(
            'table' => 'App\\Model\\Account',
            'foreign_key' => 'account_id',
        )
    );
}