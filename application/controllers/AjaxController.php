<?php
class AjaxController extends CI_Controller{
    // constructor
    public function __construct()
    {
        parent::__construct();
            $this->load->helper('url');
    }

    // Insert Country dropdown with mobile code
    public function ajax()
    {
        if(isset($_POST["country"])){
            // Capture selected country
            $country = $_POST["country"];

            $contents= file_get_contents('../eshop/assets/data.json');
            $phone=json_decode($contents);
            // Define country and city array
            // $category = $this->BaitModel->country();
            

            // Display city dropdown based on country name
            if($country !== 'Select'){
                foreach($phone as $value){
                    if($value->countryName==$country)
                        echo "<option value='+$value->phoneCode' selected>+". $value->phoneCode . "</option>";
                    else{
                        echo "<option value='+$value->phoneCode'>+". $value->phoneCode . "</option>";
                    }
                }
            } 
        }
    }
    // Insert provinces
    public function ajaxprovince()
    {
        if(isset($_POST["country"])){
            // Capture selected country
            $country = $_POST["country"];
            
            // Define country and city array
            // $province = $this->BaitModel->province();
            
            $contents= file_get_contents('../eshop/assets/countrystates.json');
            $states=json_decode($contents);
            // Display city dropdown based on country name
            if($country !== 'Select'){
                foreach($states as $value){
                    foreach($value as $val)
                    {
                        if($val->CountryName==$country)
                        {
                            foreach($val as $call)
                            {
                                foreach($call as $cal)
                                {
                                    echo "<option value='$cal->StateName'>". $cal->StateName . "</option>";
                                }

                            }
                        }
                    }
                } 
            }
        }
    }
    // Insert cities
    public function ajaxcity()
    {
        if(isset($_POST["state"])){
            // Capture selected country
            $state = $_POST["state"];
            
            // Define country and city array
            // $cities = $this->BaitModel->city();
            

            $contents= file_get_contents('../eshop/assets/countrystates.json');
            $states=json_decode($contents);


            // Display city dropdown based on country name
            if($state !== 'Select'){
                foreach($states as $value){
                    foreach($value as $val)
                    {
                        foreach($val as $call)
                        {
                            if(is_array($call))
                            {
                                foreach($call as $cal)
                                {
                                    if($cal->StateName==$state)
                                    {
                                        foreach($cal as $ca){
                                            if(is_array($ca))
                                            {
                                                foreach($ca as $dev)
                                                    echo "<option value='$dev'>". $dev . "</option>";
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            } 
        }
    }
}