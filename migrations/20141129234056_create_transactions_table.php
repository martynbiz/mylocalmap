<?php

use Phinx\Migration\AbstractMigration;

class CreateTransactionsTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     *
     * Uncomment this method if you would like to use it.
     *
    */
    public function change()
    {
        // create the table
        $table = $this->table('transactions');
        $table->addColumn('description', 'string')
            ->addColumn('amount', 'integer')
            ->addColumn('account_id', 'integer')
            ->addColumn('created_at', 'datetime')
            ->addColumn('updated_at', 'datetime')
            ->addColumn('deleted_at', 'datetime', array('null' => true))
            ->create();
    }
}