<?php
/**
 * guest.php
 *
 * Guest customer management
 *
 * @author     Opencart-api.com
 * @copyright  2017
 * @license    License.txt
 * @version    2.0
 * @link       https://opencart-api.com/results/shopping-cart-rest-api/
 * @documentations https://opencart-api.com/opencart-rest-api-documentations/
 */
require_once(DIR_SYSTEM . 'engine/restcontroller.php');

class ControllerRestContactForm extends RestController
{

    public function contact()
    {

        $this->checkPlugin();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {      
            $post = $this->getPost();
            $this->addContact($post);
        }else if($_SERVER['REQUEST_METHOD'] === 'GET'){
            $this->getContacts();
        } else {
            $this->statusCode = 405;
            $this->allowedHeaders = array("POST");
        }

        return $this->sendResponse();
    }


    public function addContact($post) {
        $this->load->model('rest/contact_form');
    
        
        $this->model_rest_contact_form->addContact($post);
    }
    

    public function getContacts(){
        $this->load->model('rest/contact_form');

        $results = $this->model_rest_contact_form->getContacts();


        foreach($results as $result){
            $this->json['data'][] = array( 
                'name' => $result['name'],
                'email' => $result['email'],
                'telephone' => $result['telephone'],
                'topic' => $result['topic'],
                'help' => $result['help'],
                'help_details' => $result['help_details'] ?? ''
            );
        }
    }
}   