<?php

function requiredInput($input)
{
    if (empty($input)) return true;
    else return false;
};

function minInput($input, $length)
{
    if (strlen($input) < $length) return true;
    else return false;
}
function maxInput($input, $length)
{
    if (strlen($input) > $length) return true;
    else return false;
}

function emailValidate($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) return true;
    else return false;
}

// function emailExistValidate($email){
//     $users = json_decode(file_get_contents('../data/users.json'));
//     if(isset($users)){
//         foreach($users as $user) {
//             if($email == $user->email) return true;
//         }
//     }
//     return false;
// }