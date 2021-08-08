<?php

function dd($data)
{
 echo "<pre>";
 die(var_dump($data));
 echo "</pre>";
}


function excerpt ($string, $numCharacter){
    return implode(" ",array_splice(explode(" ",$string),0,$numCharacter));
}