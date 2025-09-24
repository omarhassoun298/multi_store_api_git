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

class ControllerRestOnBoardingForm extends RestController
{

    public function onboarding()
    {

        $this->checkPlugin();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {      
            $post = $this->getPost();
            $this->addonboarding($post);
        }else if($_SERVER['REQUEST_METHOD'] === 'GET'){
            $this->getOnBoardings();
        } else {
            $this->statusCode = 405;
            $this->allowedHeaders = array("POST");
        }

        return $this->sendResponse();
    }


    public function addonboarding($post){
        $this->load->model('rest/onboarding_form');
        
        // if ($this->model_rest_onboarding_form->getTotalOnBoardingsByEmail($post['email'])) {
        //     $this->json['error'][] = 'This email is already exists';
        // }else if($this->model_rest_onboarding_form->getTotalOnBoardingsByTelephone($post['telephone'])){
        //     $this->json['error'][] = 'This telephone is already exists';
        // }else{
           
        // }

        if ($this->model_rest_onboarding_form->getTotalOnBoardingsByEmail($post['email'])) {
            $data['exist_email'] = $post['email'];
        }else if($this->model_rest_onboarding_form->getTotalOnBoardingsByTelephone($post['telephone'])){
            $data['exist_telephone'] = $post['telephone'];
        }else{
            $data = array();
        }

        $this->model_rest_onboarding_form->addOnBoarding($post,$data);
    }

    public function getOnBoardings(){
        $this->load->model('rest/onboarding_form');

        $results = $this->model_rest_onboarding_form->getOnBoardings();


        foreach($results as $result){
            $this->json['data'][] = array( 
                'name' => $result['name'],
                'email' => $result['email'],
                'telephone' => $result['telephone'],
                'topic' => $result['topic'],
                'help' => $result['help'],
                'help_details' => $result['help_details'],
            );
        }
    }
}   