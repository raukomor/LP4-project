<?php
date_default_timezone_set("America/Sao_Paulo");
//ssession_start();


function incluirClasses($nameClasse){
  if (file_exists($nameClasse.".php") === true){
    require_once($nameClasse."php");
  }
}
spl_autoload_register("incluirClasses");
spl_autoload_register(function($nameClasse){
  $filename = "class" . DIRECTORY_SEPARATOR . $nameClasse.".php";
  if (file_exists(($filename))){
      require_once($filename);  
    }
});

spl_autoload_register(function($nameClasse){
  
  $filename = "services" . DIRECTORY_SEPARATOR . $nameClasse.".php";
  if (file_exists(($filename))){
    require_once($filename);  
  }
});

spl_autoload_register(function($nameClasse){
  
  $filename = ".." . DIRECTORY_SEPARATOR ."class". DIRECTORY_SEPARATOR . $nameClasse.".php";
  if (file_exists(($filename))){
    require_once($filename);  
  }
});

spl_autoload_register(function($nameClasse){
  $filename = ".." . DIRECTORY_SEPARATOR . $nameClasse.".php";
  if (file_exists(($filename))){
    require_once($filename);  
  }
});
?>