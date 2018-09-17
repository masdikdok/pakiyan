<?php

class Input{

  public static function get($name){
    if(isset($_POST[$name])){
      return $_POST[$name];
    } else if (isset($_GET[$name])){
      return $_GET[$name];
    }

    return false;
  }

  public static function getFile($name, $value){
    if(isset($_FILES[$name][$value])){
      return $_FILES[$name][$value];
    } else if (isset($_FILES[$name][$value])){
      return $_FILES[$name][$value];
    }

    return false;
  }




}
?>
