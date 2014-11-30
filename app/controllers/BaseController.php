<?php

namespace App\Controller;

/**
* Handkes homepage, about etc
*/
class BaseController extends \MartynBiz\MVC\Controller
{
    public function getCurrentUser()
    {
        $usersTable = $this->app->service('models.users');
        
        $user = $usersTable->find(1);
        
        // we don't require all fields of user, so we should remove password/salt
        // as these will be visible in ajax calls
        $user->uset(array('password', 'salt'));
        
        return $user;
    }
    
    protected function getUserAccount($accountId)
    {
        // get the current user. we'll do so because users are
        // only permitted to view their own accounts/transactions
        $user = $this->getCurrentUser();
        
        // check if account id is set
        $account = null;
        
        // get the account
        $account = $user->accounts
            ->filter(array(
                'id' => $accountId,
            ))
            ->first(); // filtered will return a Rowset, this just gets the Row
        
        // if not found, throw excpetion
        if(! $account )
            throw new \Exception('Account not found');
        
        return array($user, $account);
    }
    
    protected function getUserAccountTransaction($accountId, $transactionId)
    {
        list($user, $account) = $this->getUserAccount($accountId);
        
        // get the transaction
        $transaction = $account->transactions
            ->filter(array(
                'id' => $transactionId,
            ))
            ->first(); // filtered will return a Rowset, this just gets the Row
        
        // if not found, throw excpetion
        if(! $transaction )
            throw new \Exception('Transaction not found');
        
        return array($user, $account, $transaction);
    }
}