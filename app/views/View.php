<?php

namespace App\View;

class View extends \MartynBiz\View
{
    /**
     * Render the template within the layout
     *
     * @return void
     * @author Martyn Bissett
     **/
    public function render($data=array())
    {
        // if this is an XHR request, return json **test
        if ($this->isAjax()) {
            
            // the checksum is used on the front end to trigger a fresh reload
            // cases such as changing the layout should trigger a fresh reload
            $data['checksum'] = $this->checksum();
            
            return json_encode($data);
        }
        
        return parent::render($data);   
    }
    /**
     * Generate a checksum so the front end knows to do a fresh load (e.g. change layout)
     *
     * @return void
     * @author Martyn Bissett
     **/
    public function checksum()
    {
        return md5($this->layout);   
    }
}