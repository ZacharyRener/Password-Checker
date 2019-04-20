<?php
# --------------
# -- Programmer:  Zachary Rener
# -- Course:      ITSE-1306 (Intro to PHP)
# -- Instructor:  Cesar "Coach" Marrero
# -- Assignment:  Week 11 - Lab - Pursue - Custom Function
# -- Description: This function determines the complexity of a password
# ---------------

function checkPassword($password){

    $lessThanEightChars = strlen($password) < 8;
    $onlyNumbers = preg_match("/^\d+$/", $password);
    $onlyLetters = preg_match("/^[a-zA-Z]+$/", $password);
    $hasAtLeastTwoNumbers = preg_match("/[a-zA-Z]+\d{2,}/", $password);
    $hasNumbersAndSpecialChar = preg_match("/\d+([a-zA-Z]{2,}|[\[\\\^\$\.\|\?\*\+\(\)\{\}_]{2,})/", $password);
    $hasLettersNumbersSpecialChars = preg_match("/[a-zA-Z]+\d+[\[\\\^\$\.\|\?\*\+\(\)\{\}_]+/", $password);
    
    $strength = 10;
    $strength += ($lessThanEightChars) ? -4 : 0;
    $strength += ($onlyNumbers) ? -3 : 0;
    $strength += ($onlyLetters) ? -3 : 0;
    $strength += ($hasAtLeastTwoNumbers) ? 3 : 0;
    $strength += ($hasNumbersAndSpecialChar) ? 3 : 0;
    $strength += ($hasLettersNumbersSpecialChars) ? 3 : 0;

    $error13 = "The number 13 itself isn't included in the assignment algorithm. We'll call it questionable, since strong is OVER 13.";

    switch(true){
        case($strength > 13):
            return "Strong";
        case($strength >= 10 && $strength <= 12):
            return "Questionable";
        case($strength < 10):
            return "Weak";
        case($strength == 13):
            return $error13;
    }

    return null;

}

print checkPassword("My_Password123+__");

?>