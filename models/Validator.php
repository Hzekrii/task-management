<?php


class Validator
{

    //* checks if the string does not contain any special chars;
    public static function isStrValid($str)
    {
        return preg_match("/^[a-zA-Z]+(?:\\s[a-zA-Z]+)*$/", $str) && !empty($str);
    }

    //* checks if the string contains only alphbets and numbers (alphanumeric)
    public static function isAlphaNum($str)
    {
        return preg_match("/^[a-zA-Z0-9,.&#;\/!?:_\-\s]*$/", $str) && !empty($str);
    }

    //* checks if the email is valid;
    public static function isEmailValid($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    //* checks if the password is valid
    public static function isPasswordValid($password)
    {
        $message = "valid";
        if (strlen($password) < 8) {
            $message = "Your Password Must Contain At Least 8 Characters!";
        } elseif (!preg_match("/[0-9]+/", $password)) {
            $message = "Your Password Must Contain At Least 1 Number!";
        } elseif (!preg_match("/[A-Z]+/", $password)) {
            $message = "Your Password Must Contain At Least 1 Capital Letter!";
        } elseif (!preg_match("/[a-z]+/", $password)) {
            $message = "Your Password Must Contain At Least 1 Lowercase Letter!";
        }
        return $message;
    }
}
