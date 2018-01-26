<?php
namespace orm;

/*

TODO: make functions static


*/

class semi_orm
{
    function ifexists($varname)
    {
      return(isset($$varname)?$varname:null);
    }
}