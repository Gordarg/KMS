<?php
namespace core;

class functionalities
{

    function makeAbstract($input, $lenght, $allowed_tags = null)
    {
        return substr(strip_tags($input, $allowed_tags), 0, $lenght);
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