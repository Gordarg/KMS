<?php
namespace core;

class language {

    private $code;
    private $language;
    private $region;
    private $direction;
    private $flag;

    public function __construct ($code, $language, $region, $direction, $flag) {
        $this->code = $code;
        $this->language = $language;
        $this->region = $region;
        $this->direction = $direction;
        $this->flag = $flag;
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
?>