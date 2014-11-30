<?php

namespace App\Controller;

/**
* Handkes homepage, about etc
*/
class MembersController extends BaseController
{
    protected $layout = 'members.phtml';
    
    function settingsAction()
    {
        $user = $this->getCurrentUser();
        
        // return accounts
        return $this->returnArray(array(
            'user' => $user->toArray(),
        ));
    }
}