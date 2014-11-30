<?php

namespace App\Controller;

/**
* Handkes homepage, about etc
*/
class TransactionsController extends BaseController
{
    protected $paramFilter = array('description', 'amount', 'accounts_id');
    protected $layout = 'master.phtml';
    
    function indexAction($accountId)
    {
        // get accounts
        list($user, $account) = $this->getUserAccount($accountId);
        
        // transactions for this account
        $transactions = $account->transactions;
        
        // return account
        return $this->returnArray(array(
            'user' => $user->toArray(),
            'account' => $account->toArray(),
            'transactions' => $transactions->toArray(),
        ));
    }
    
    function showAction($accountId, $transactionId)
    {
        list($user, $account, $transaction) = $this->getUserAccountTransaction($accountId, $transactionId);
        
        // return account
        return $this->returnArray(array(
            'user' => $user->toArray(),
            'account' => $account->toArray(),
            'transaction' => $transaction->toArray(),
        ));
    }
    
    function createAction($accountId)
    {
        list($user, $account) = $this->getUserAccount($accountId);
        
        // fetch these here as we will want to repopulate the form
        // if there is an error
        $params = $this->filterParams($this->getPost());
        
        // we will use our validator to check
        $validator = $this->app->service('validator');
        
        // is this a post, if so process the submitted data
        if ($this->isPost()) { 
            
            $validator->set($params['description'])
                ->isNotEmpty('Description must be given');
            
            $validator->set($params['amount'])
                ->isNotEmpty('Amount must be given')
                ->isNumeric('Amount must be numeric');
            
            // validate
            if(! $validator->hasErrors()) {
                
                if(! $user) {
                    // **you must be logged in, return 4xx error
                }
                
                // create new  account
                $transactionsTable = $this->app->service('models.transactions');
                
                $transaction = $transactionsTable->prepareNew(array(
                    'description' => $params['description'],
                    'amount' => $params['amount'],
                    'account_id' => $account->id,
                ));
                
                if($transaction->save()) {
                    $this->redirect('/accounts/' . $account->id . '/transactions');
                } else {
                    $validator->logError('There was a problem when saving');
                }
            }
        }
        
        return $this->returnArray(array(
            'user' => $user->toArray(),
            'account' => $account->toArray(),
            'params' => $params,
            'errors' => $validator->getErrors(),
        ));
    }
    
    function editAction($accountId, $transactionId)
    {
        list($user, $account, $transaction) = $this->getUserAccountTransaction($accountId, $transactionId);
        
        $params = $this->filterParams($this->getPost());
        $params = array_merge( $transaction->toArray(), $params );
        
        // we will use our validator to check 
        $validator = $this->app->service('validator');
        
        // // is this a post, if so process the submitted data
        if ($this->isPut()) { 
            
            // validator
            $validator->set($params['description'])
                ->isNotEmpty('Description must be given');
            
            $validator->set($params['amount'])
                ->isNotEmpty('Amount must be given')
                ->isNumeric('Amount must be numeric');
            
            if(! $validator->hasErrors()) {
                
                if(! $user) {
                    // **you must be logged in, return 4xx error
                }
                
                // create new  account
                $accountsTable = $this->app->service('models.accounts');
                
                $account = $accountsTable->prepareNew(array(
                    'name' => $params['name'],
                    'amount' => $params['amount'],
                    'user_id' => $user->id,
                ));
                
                if($account->save()) {
                    $this->redirect('/accounts/' . $account->id);
                } else {
                    $validator->logError('There was a problem when saving');
                }
            }
        }
        
        // return account
        return $this->returnArray(array(
            'user' => $user->toArray(),
            'account' => $account->toArray(),
            'transaction' => $transaction->toArray(),
            'params' => $params,
            'errors' => $validator->getErrors(),
        ));
    }
    
    function deleteAction($accountId, $transactionId)
    {
        list($user, $account, $transaction) = $this->getUserAccountTransaction($accountId, $transactionId);
        
        // we will use our validator to check 
        $validator = $this->app->service('validator');
        
        if ($this->isDelete()) { 
            
            if($transaction->delete()) {
                $this->redirect('/accounts/' . $account->id . '/transactions');
            } else {
                $validator->logError('There was a problem when deleting');
            }
        }   
        
        // return account
        return $this->returnArray(array(
            'user' => $user->toArray(),
            'account' => $account->toArray(),
            'transaction' => $transaction->toArray(),
            'errors' => $validator->getErrors(),
        ));
    }
}