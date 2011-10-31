<?php
/**
 * The Test Controller
 *
 * @access     public
 * @since      0.1
 * @author     talkingwithsean
**/
class Demo extends MY_Controller
{
     public function __construct()
     {
          parent::__construct();
          
          // Set the prefix
          // $this->prefix = 'myprefix_';
     }
     
     /**
      * Post Method
      *
      * @access     public
     **/
     public function action_update_post()
     {
          // Do magic here...
     }
     
     /**
      * Get Method
      *
      * @access     public
     **/
     public function action_update_get()
     {
          // Do magic here...
     }
     
     /**
      * Put Method
      *
      * @access     public
     **/
     public function action_update_put()
     {
          // Do magic here...
     }
}
/* End of file demo.php */