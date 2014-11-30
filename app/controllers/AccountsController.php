<?php

namespace App\Controller;

/**
* Handkes homepage, about etc
*/
class AccountsController extends BaseController
{
    protected $paramFilter = array('name', 'amount');
    protected $layout = 'master.phtml';
    
    function indexAction()
    {
        // get accounts
        $user = $this->getCurrentUser();
        
        $accounts = $user->accounts;
        
        // return accounts
        return $this->returnArray(array(
            'user' => $user->toArray(),
            'accounts' => $accounts->toArray(),
        ));
    }
    
    function showAction($accountId)
    {
        // get account -- add some functionality to Rowset to query that
        list($user, $account) = $this->getUserAccount($accountId);
        
        $transactions = $account->transactions;
        
        // return account
        return $this->returnArray(array(
            'user' => $user->toArray(),
            'account' => $account->toArray(),
            'transactions' => $transactions->toArray(),
        ));
    }
    
    function createAction()
    {
        $user = $this->getCurrentUser();
        
        // fetch these here as we will want to repopulate the form
        // if there is an error
        $params = $this->filterParams($this->getPost());
        
        // we will use our validator to check 
        $validator = $this->app->service('validator');
        
        // is this a post, if so process the submitted data
        if ($this->isPost()) { 
            
            $validator->set($params['name'])
                ->isNotEmpty('Name must be given');
            
            $validator->set($params['amount'])
                ->isNotEmpty('Amount must be given')
                ->isNumeric('Amount must be numeric');
            
            // validate
            if(! $validator->hasErrors()) {
                
                $user = $this->getCurrentUser();
                
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
                    $this->redirect('/accounts');
                } else {
                    $validator->logError('There was a problem when saving');
                }
            }
        }
        
        return $this->returnArray(array(
            'user' => $user->toArray(),
            'params' => $params,
            'errors' => $validator->getErrors(),
        ));
    }
    
    function editAction($accountId)
    {
        // fetch these here as we will want to repopulate the form
        // if there is an error
        list($user, $account) = $this->getUserAccount($accountId);
        
        $params = $this->filterParams($this->getPost());
        $params = array_merge($account->toArray(), $params);
        
        // get account -- add some functionality to Rowset to query that
        
        // we will use our validator to check 
        $validator = $this->app->service('validator');
        
        // is this a post, if so process the submitted data
        if ($this->isPut()) { 
            
            // validator
            $validator->set($params['name'])
                ->isNotEmpty('Name must be given');
            
            $validator->set($params['amount'])
                ->isNotEmpty('Amount must be given')
                ->isNumeric('Amount must be numeric');
            
            if(! $validator->hasErrors()) {
                
                $user = $this->getCurrentUser();
                
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
        
        return $this->returnArray(array(
            'user' => $user->toArray(),
            'account' => $account->toArray(),
            'params' => $params,
            'errors' => $validator->getErrors(),
        ));
    }
    
    function deleteAction($accountId)
    {
        // get account -- add some functionality to Rowset to query that
        list($user, $account) = $this->getUserAccount($accountId);
        
        // we will use our validator to check 
        $validator = $this->app->service('validator');
        
        if ($this->isDelete()) { 
            if($account->delete()) {
                $this->redirect('/accounts');
            } else {
                $validator->logError('There was a problem when deleting');
            }
        }
        
        // return account
    
        return $this->returnArray(array(
            'user' => $user->toArray(),
            'account' => $account->toArray(),
            'errors' => $validator->getErrors(),
        ));
    }
}