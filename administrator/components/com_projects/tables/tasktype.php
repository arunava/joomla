<?php
/**
 * @version     $Id$
 * @package     Joomla.Administrator
 * @subpackage	com_projects
 * @copyright   Copyright (C) 2005 - 2008 Open Source Matters. All rights reserved.
 * @license     GNU/GPL, see LICENSE.php
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die;

/**
 * @package		Joomla.Administrator
 * @subpackage	com_projects
 */
class jcTable_Project_task_types extends JTable
{
	var $id	= null;
	var $title	= null;
	var $alias	= null;
	var $description	= null;
	var $ordering	= null;
	var $created	= null;
	var $created_by	= null;
	var $created_by_alias	= null;
	var $modified	= null;
	var $modified_by	= null;
	var $state	= null;
	var $language	= null;
	var $featured	= null;
	var $xreference	= null;
	var $params	= null;
	var $checked_out	= null;
	var $checked_out_time	= null;	
	
	/**
	 * @param	JDatabase	A database connector object
	 */
	function __construct(&$db)
	{
		parent::__construct('#__project_task_types', 'id', $db);
	}
}