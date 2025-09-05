<?php

// code struture done , admin type , validatios done , routing

//validation

        



        //main functions
        function requiredInput($input){
            if (empty($input)) {
                return true;
            
            }else{
                return false;
            }
        }


        function minInput($input,$length){
            if (strlen($input)<$length) {
                return true;
            
            }else{
                return false;
            }
        }


        function maxInput($input,$length){
            if (strlen($input)>$length) {
                return true;
            
            }else{
                return false;
            }
        }


        function emailInput($email){

            if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
                return true;
            }else{
            return false;

            }


        }



        function isNotDigits($phone){

            if (!ctype_digit($phone)) {
                return true;
            }else{
            return false;

            }




        }


        // function passwordVerify($password){

        //     if (password_verify($password,$user['password'])) {
        //         return true;
        //     }else{
        //     return false;

        //     }


        // }