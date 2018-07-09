<?php
namespace core;

class accesslevel {

    private $path;
    private $type;

    public function __construct ($path, $type) {
        // $this->path = $path;
        // $this->type = $type;
        echo "here you are";
        exit;
    }

    public function __get($property) {
        if (property_exists($this, $property))
            return $this->$property;
    }

    public function __set($property, $value) {
        if (property_exists($this, $property))
            $this->$property = $value;
        return $this;
    }

    public function __toString()
    {
        return $this->flag . $this->language;
    }
}


class authorization
{
    public $accesslevels = array();
    public function __construct () {
        
        new accesslevel("", "");
        // array_push($this->languages, new language("fa", "فارسی"));
        // array_push($this->languages, new language("en", "English"));
        // array_push($this->languages, new language("ru", "русский"));
    }
    
}

new authorization();

?>
