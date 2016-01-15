<?php

namespace applications\model_testing{
    
    /* Prevent direct access */
    defined('ADAPT_STARTED') or die;
    
    class controller_root extends controller{
        
        public function __construct(){
            parent::__construct();
        }
        
        public function view_default(){
            //require(FRAMEWORK_PATH . "adapt/install.php"); 
            
            $bundle = new \frameworks\adapt\bundle();
            $bundle->load('locales_uk');
            $bundle->install();
        }
        
        public function view_test(){
            $this->add_view(new html_p(preg_replace("/[^\d+]/", "", "+(07814) 125870")));
        }
        
        public function view_model(){
            $model = new \frameworks\adapt\model('field');
            
            $this->add_view(new html_h1('Model testing'));
            //$model->load_by_name('datetime');
            $model->load(10);
            //$this->add_view(new html_pre(print_r($model->to_hash(), true)));
            //$xml = $model->to_xml();
            //$this->add_view($xml->render());
            //$this->add_view($model->to_xml());
            $this->add_view($model->to_form());
        }
        
    }
    
}

?>