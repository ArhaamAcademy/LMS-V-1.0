<?php
	
    function base(){
        
        echo str_replace("index.php","",$_SERVER['PHP_SELF']);
        
    }
	$url = explode("/",$_SERVER['QUERY_STRING']);

	$url2 = explode("&",$_SERVER['QUERY_STRING']);

    if(!empty($url2[1])){


        str_replace("$url2[1]","",$_SERVER['QUERY_STRING']);
        require_once($url2[0].".php");

        }else{

            if(file_exists($url[0].".php")){

                require_once($url[0].".php");

            }elseif($url[0] == ""){

                require_once("home.php");

            }else{

            require_once("404.php");
        }

    }

	
?>
