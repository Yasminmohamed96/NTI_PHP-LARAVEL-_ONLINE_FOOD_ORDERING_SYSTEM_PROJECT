<?php 

# Session Started ... 
 //session_start();

 # Clean input ...
 function CleanInputs($input){

    $input = trim($input);
    $input = stripcslashes($input);
    $input = htmlspecialchars($input);

    return $input;
  }


# Validate Inputs .... 
/*
1-- empty
2--lenght
3--number/password
4--email
5--url
*/
function Validator($input,$flag,$length=3){

    $status = true;
    switch ($flag) {
        case 1:
            if(empty($input)){
                $status = false;
            }
            break;
        
        case 2: 
            if(strlen($input) < $length){
                $status = false;
            }
            break;  
            
        case 3: 
            if(!filter_var($input,FILTER_VALIDATE_INT)){
                $status = false;
            }    
            break;

        case 4:
            if(!filter_var($input,FILTER_VALIDATE_EMAIL)){
                $status = false;
            }    
            break;
        case 5:
            if(!filter_var($input,FILTER_VALIDATE_URL)){
                $status = false;
            }    
            break;
    }

    return $status;
}



# SANITIZE INPUTS ... 
function Sanitize($input,$flag){

    $sanitize_var = $input;

    switch ($flag) {
        case 1:
              
         $sanitize_var = filter_var($sanitize_var,FILTER_SANITIZE_NUMBER_INT);
            break;
        
    }

    return $sanitize_var;
}




function _url_($dis){

    return   $txt = "http://".$_SERVER['HTTP_HOST']."/nti%20course/New%20folder/SESSIONONE/FinalProject/NTI_PHP-LARAVEL-_ONLINE_FOOD_ORDERING_SYSTEM_PROJECT/task2_dashboard/".$dis;
  
  
   }
  




?>