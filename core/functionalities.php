<?php
namespace core;

/*

TODO: make functions static


*/

class functionalities
{
    function label($key)
    {
        /*
        TODO: What if it was a sentece in last record of dictionary? -It has bug ;)
        */
        if(!isset($_COOKIE["LANG"])) {
            setcookie("LANG", "fa-IR", time() + (86400 * 30), "/");
            $LANG = "fa-IR";
        }
            else $LANG = $_COOKIE["LANG"];
        if ($LANG == "fa-IR")
        {
            return $key;
            exit;
        }
        $dictionary = explode("\n", file_get_contents('variable/dictionary.yaml'));
        $keys = [];
        for( $i= 0 ; $i <= sizeof($dictionary) ; $i++ )
        {  
            if (substr($dictionary[$i], 0, 1) == "-")
            {
                if ($key == substr($dictionary[$i], 1, strlen($dictionary[$i]) - 1))
                {
                    $k = $i;
                    for ($j = $i + 1; $j <= sizeof($dictionary) ; $j++  )
                    {
                        if (substr($dictionary[$j], 0, 1) == "-")
                        {
                            $k = $j;
                            break;
                        }
                    }
                    if ($k > $i + 1)
                        for ($j = $i + 1; $j <= $k ; $j++  )
                            if (substr($dictionary[$j], 0, strlen($LANG)) == $LANG)
                                return substr($dictionary[$j], strlen($LANG) + 1, strlen($dictionary[$j]) - 1 - strlen($LANG));
                        return $key;
                }
            }
        }
    }

    function ifexists($varname)
    {
      return(isset($$varname)?$varname:null);
    }

    function ifexistsidx($var,$index)
    {
        return(isset($var[$index])?$var[$index]:null);
    }

    function makeAbstract($input, $lenght, $allowed_tags = null)
    {
        // TODO : bug : question mark at the end of the string for persian characters
        // mb_internal_encoding('UTF-8');     
        // return mb_substr(strip_tags($input, $allowed_tags), 0, $lenght, "UTF-8") . " ...";
        return
        (substr(strip_tags($input, $allowed_tags), 0, $lenght) .
        ((strlen($input) > $lenght) ?
        " ..." :
        "")
        );
    }
    
    function getMime($filename){
        
        if(function_exists('mime_content_type')&&$mode==0){
            $mimetype = mime_content_type($filename);
            return $mimetype;
            
        }elseif(function_exists('finfo_open')&&$mode==0){
            $finfo = finfo_open(FILEINFO_MIME);
            $mimetype = finfo_file($finfo, $filename);
            finfo_close($finfo);
            return $mimetype;
        }elseif(array_key_exists($ext, $mime_types)){
            return $mime_types[$ext];
        }else {
            return 'application/octet-stream';
        } 
    }
    
}

?>