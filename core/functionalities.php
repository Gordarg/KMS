<?php
namespace core;

/*

TODO: make functions static


*/

class functionalities
{
    function label($text)
    {
        if(!isset($_COOKIE["LANG"])) {
            $_COOKIE["LANG"] = "fa-IR";
        }
        $LANG = $_COOKIE["LANG"];

        /*

        TODO: Translate from FA to $LANG
        from variable dictionary.yaml
        
        */

        return $text;
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