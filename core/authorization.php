<?php

namespace core;
require_once 'variable/config.php';
use core\config;

class accesslevel {

    private $path;
    private $role;

    public function __construct ($path, $role) {
        $this->path = config::Url_PATH . "/" . $path;
        $this->role = $role;
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
        return $this->role;
    }
}


class authorization
{
    private $accesslevels = array();

    public function __construct ()
    {
        // TODO: to read from file
        array_push($this->accesslevels, new accesslevel("tinyfilemanager.php", "ADMIN"));
        array_push($this->accesslevels, new accesslevel("profile.php", "VSTOR"));
        array_push($this->accesslevels, new accesslevel("profile.php", "ADMIN"));
        array_push($this->accesslevels, new accesslevel("post.php", "ADMIN"));
        array_push($this->accesslevels, new accesslevel("settings.php", "ADMIN"));
        array_push($this->accesslevels, new accesslevel("box.php", "ADMIN"));
        array_push($this->accesslevels, new accesslevel("box.php", "VSTOR"));
        array_push($this->accesslevels, new accesslevel("question.php", "ADMIN"));
    }
    public function validate($path, $role) // TODO: Not only path, but also paramters
                                           // Like post types (comment or post)
    {
        foreach ($this->accesslevels as $acccesslevel)
        {
            if (((string)$acccesslevel) == $role)
                if ($acccesslevel->path == $path)
                    return true;
        }
        return false;
    }
}
?>
