<?php

function checkRequestMethod($method)
{
    if ('POST' == $method) return true;
    else return false;
}
function checkPostInput($input)
{
    if (isset($_POST[$input])) return true;
    else return false;
}
function senitizeInput($input)
{
    return trim(htmlspecialchars(htmlentities($input)));
}


function getDataInput($input)
{
    if (isset($input)) {
        return $input;
    } else {
        return '';
    }
}

function redirect($path){
    header("location:".$path);
}