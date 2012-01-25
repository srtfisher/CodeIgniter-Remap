<?php
/**
 * We are making the controller better
 *
 * We want to use any method name and CodeIgniter doesn't enable
 * that out of the box. We are enabling that box.
 *
 * @access     public
 * @author     talkingwithsean
 * @version    0.1
**/
class MY_Controller extends CI_Controller
{
     /**
      * The Prefix Applied to Methods
      * FuelPHP Inspired
      *
      * @global     string
     **/
     public $prefix      = 'action_';
     
     /**
      * Storing info about this request
      *
      * @global     object
      * @access     protected
     **/
     protected $method = NULL;
     
     /**
      * The Constructor
      *
      * @access     public
      * @return     void
     **/
     public function __construct()
     {
          parent::__construct();
          
          // Find the method
          $this->method = $this->_detect_method();
     }
     
     /**
      * We want to remap the controller
      *
      * @access     private
      * @param      string
     **/
     public function _remap($method, $params = array())
     {
          // We allow dashes in our method names
          $method = str_replace('-', '_DASH_', $method);
          
          // The Methods we are going to generate in order of priority
          $methods = array(
               
               // `action_method_get`, `action_method_post`, ..
               $this->prefix.$method.'_'.$this->method,
               
               // `action_method`
               $this->prefix.$method,
               
               // `method_get`, `method_post`, ..
               $method.'_'.$this->method,
               
               // `action_method`
               $this->prefix.$method,
               
               // `method`
               $method,
               
               // `action_four_oh_four_get`
               $this->prefix.'four_oh_four.'.$this->method,
          );
          
          // Loop though them in priority
          foreach($methods as $m) :
               // They founnd it
               if (method_exists($this, $m))
                    return call_user_func_array(array($this, $m), $params);
                    
          endforeach;
          
          // No Bueno
          show_404();
     }
     
     /**
      * Detect Method
      * Detect which method (POST, PUT, GET, DELETE) is being used
      *
      * @author     philsturgeon
     **/
     private function _detect_method()
     {
          $method = strtolower($this->input->server('REQUEST_METHOD'));
          if (in_array(strtolower($method), array('get', 'delete', 'post', 'put')))
               return $method;
          
          // Resorts to get
          return 'get';
    }
}

/* End of file My_Controller.php */