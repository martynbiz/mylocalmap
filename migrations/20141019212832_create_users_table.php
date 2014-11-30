<?php

use Phinx\Migration\AbstractMigration;

class CreateUsersTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     *
     * Uncomment this method if you would like to use it.
     */
    public function change()
    {
    	// create the table
    	$table = $this->table('users');
    	$table->addColumn('name', 'string')
            ->addColumn('username', 'string')
            ->addColumn('password', 'string')
            ->addColumn('salt', 'string')
            ->addColumn('email', 'string')
            ->addColumn('created_at', 'datetime')
            ->addColumn('updated_at', 'datetime')
            ->addColumn('deleted_at', 'datetime', array('null' => true))
            ->addIndex(array('username', 'email'), array('unique' => true))
    	    ->create();
    }
    
    
    /**
     * Migrate Up.
     */
    public function up()
    {
    
    }

    /**
     * Migrate Down.
     */
    public function down()
    {

    }
}
