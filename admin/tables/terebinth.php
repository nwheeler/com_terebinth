<?php
/**
 * Terebinth Component
 *
 * Copyright (c) 2013 Nicholas Wheeler
 *
 * @license GNU / GPL 
 *   
**/


// No direct access
defined('_JEXEC') or die('Restricted access');

// import Joomla table library
jimport('joomla.database.table');

/**
 * Terebinth Table class
 */
class TerebinthTableTerebinth extends JTable
{
	/**
	 * Constructor
	 *
	 * @param object Database connector object
	 */
	function __construct(&$db) 
	{
		parent::__construct('#__terebinth', 'id', $db);
	}

  public function bind($array, $ignore = '')
  {
    if (isset($array['params']) && is_array($array['params']))
    {
      $parameter = new JRegistry;
      $parameter->loadArray($array['params']);
      $array['params'] = (string)$parameter;
    }

    // bind the rules
    if (isset($array['rules']) && is_array($array['rules']))
    {
      $rules = new JAccessRules($array['rules']);
      $this->setRules($rules);
    }

    return parent::bind($array, $ignore);

  }
}
