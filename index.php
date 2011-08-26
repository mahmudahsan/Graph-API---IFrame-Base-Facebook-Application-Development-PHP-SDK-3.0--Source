<?php
    include_once "fbmain.php";
    
    //if user is logged in and session is valid.
    if ($user){
        //fql query example using legacy method call and passing parameter
        try{
            $fql            =   "select name, hometown_location, sex, pic_square from user where uid=" . $user;
            
            //http://developers.facebook.com/docs/reference/fql/
            $param  =   array(
                'method'    => 'fql.query',
                'query'     => $fql,
                'callback'  => ''
            );
            $fqlResult   =   $facebook->api($param);
        }
        catch(Exception $o){
            d($o);
        }
    }
    //set page to include default is home.php
    $page   =   isset($_REQUEST['page']) ? $_REQUEST['page'] : "home.php";
    include_once "template.php";
?>