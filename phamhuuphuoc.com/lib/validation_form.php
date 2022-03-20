<?php
//Output normalized data
function set_value($label_field)
{
    global $$label_field;
    if(!empty($$label_field)){
        return $$label_field;
    }

}


//Output normalized gender data
function set_value_gender_male($label_field)
{
    global $_POST;
    if (!empty($_POST[$label_field])) {
        if ($_POST[$label_field] == 'male') {
            return "checked='checked'";
        }
    }
}


//Output normalized gender data
function set_value_gender_female($label_field)
{
    global $_POST;
    if (!empty($_POST[$label_field])) {
        if ($_POST[$label_field] == 'female') {
            return "checked='checked'";
        }
    }
}


//Output error to users
function form_error($label_field)
{
    global $error;
    if (!empty($error[$label_field])) {
        return $error[$label_field];
    }
}


//Enough length check
function enough_lenght($username)
{
    if ((strlen($username) >= 6) and (strlen($username) <= 32))
        return true;
}


//Check username format
function is_username($username)
{
    $partten = "/^[A-Za-z0-9_\.]{6,32}$/";
    if (preg_match($partten, $username, $matchs))
        return true;
}


//Check password format
function is_password($password)
{
    $partten = "/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";
    if (preg_match($partten, $password, $matchs))
        return true;
}

//Check email format
function is_email($email)
{
    $partten = "/^[A-Za-z0-9_\.]{2,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/";
    if (preg_match($partten, $email, $matchs))
        return true;
}

//Check phone number format
function is_phone_number($phone)
{
    $partten_old = "/^[0-9]{10,11}$/";
    $partten_new = "/^(09|08|07|01[2|6|8|9])+([0-9]{8})$/";
    if (preg_match($partten_new, $phone, $matchs))
        return true;
}
