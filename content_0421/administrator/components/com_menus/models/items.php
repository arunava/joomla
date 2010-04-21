<?php
/**
 * @version		$Id$
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

/**
 * Menu Item List Model for Menus.
 *
 * @package		Joomla.Administrator
 * @subpackage	com_menus
 * @since		1.6
 */
class MenusModelItems extends JModelList
{
	/**
	 * Model context string.
	 *
	 * @var		string
	 */
	protected $_context = 'com_menus.items';

	/**
	 * Method to auto-populate the model state.
	 *
	 * @return	void
	 */
	protected function populateState()
	{
		$app = JFactory::getApplication('administrator');

		$search = $app->getUserStateFromRequest($this->_context.'.search', 'filter_search');
		$this->setState('filter.search', $search);

		$published = $app->getUserStateFromRequest($this->_context.'.published', 'filter_published', '');
		$this->setState('filter.published', $published);

		$access = $app->getUserStateFromRequest($this->_context.'.filter.access', 'filter_access', 0, 'int');
		$this->setState('filter.access', $access);

		$parentId = $app->getUserStateFromRequest($this->_context.'.filter.parent_id', 'filter_parent_id', 0, 'int');
		$this->setState('filter.parent_id',	$parentId);

		$level = $app->getUserStateFromRequest($this->_context.'.filter.level', 'filter_level', 0, 'int');
		$this->setState('filter.level', $level);

		$menuType = $app->getUserStateFromRequest($this->_context.'.filter.menutype', 'menutype', 'mainmenu');
		$this->setState('filter.menutype', $menuType);

		// Component parameters.
		$params	= JComponentHelper::getParams('com_menus');
		$this->setState('params', $params);

		// List state information.
		parent::populateState('a.lft', 'asc');
	}

	/**
	 * Method to get a store id based on model configuration state.
	 *
	 * This is necessary because the model is used by the component and
	 * different modules that might need different sets of data or different
	 * ordering requirements.
	 *
	 * @param	string		$id	A prefix for the store id.
	 * @return	string		A store id.
	 */
	protected function getStoreId($id = '')
	{
		// Compile the store id.
		$id	.= ':'.$this->getState('filter.access');
		$id	.= ':'.$this->getState('filter.published');
		$id	.= ':'.$this->getState('filter.search');
		$id	.= ':'.$this->getState('filter.parent_id');
		$id	.= ':'.$this->getState('filter.menu_id');

		return parent::getStoreId($id);
	}

	/**
	 * Builds an SQL query to load the list data.
	 *
	 * @return	JDatabaseQuery	A query object.
	 */
	protected function getListQuery()
	{
		// Create a new query object.
		$db = $this->getDbo();
		$query = $db->getQuery(true);

		// Select all fields from the table.
		$query->select($this->getState('list.select', 'a.*'));
		$query->from('`#__menu` AS a');

		// Join over the users.
		$query->select('u.name AS editor');
		$query->join('LEFT', '`#__users` AS u ON u.id = a.checked_out');

		//Join over components
		$query->select('c.name AS componentname');
		$query->join('LEFT', '`#__extensions` AS c ON c.extension_id = a.component_id');

		// Join over the asset groups.
		$query->select('ag.title AS access_level');
		$query->join('LEFT', '#__viewlevels AS ag ON ag.id = a.access');

		// Exclude the root category.
		$query->where('a.id > 1');

		// Filter on the published state.
		$published = $this->getState('filter.published');
		if (is_numeric($published)) {
			$query->where('a.published = '.(int) $published);
		} else if ($published === '') {
			$query->where('(a.published IN (0, 1))');
		}

		// Filter by search in title, alias or id
		if ($search = trim($this->getState('filter.search'))) {
			if (stripos($search, 'id:') === 0) {
				$query->where('a.id = '.(int) substr($search, 3));
			} else if (stripos($search, 'link:') === 0) {
				if ($search = substr($search, 5)) {
					$search = $db->Quote('%'.$db->getEscaped($search, true).'%');
					$query->where('a.link LIKE '.$search);
				}
			} else {
				$search = $db->Quote('%'.$db->getEscaped($search, true).'%');
				$query->where('('.'a.title LIKE '.$search.' OR a.alias LIKE '.$search.' OR a.note LIKE '.$search.')');
			}
		}

		// Filter the items over the parent id if set.
		$parentId = $this->getState('filter.parent_id');
		if (!empty($parentId)) {
			$query->where('p.id = '.(int)$parentId);
		}

		// Filter the items over the menu id if set.
		$menuId = $this->getState('filter.menu_id');
		if (!empty($menuId)) {
			$query->where('a.menu_id = '.(int) $menuId);
		}

		// Filter the items over the menu id if set.
		$menuType = $this->getState('filter.menutype');
		if (!empty($menuType)) {
			$query->where('a.menutype = '.$db->quote($menuType));
		}

		// Filter on the access level.
		if ($access = $this->getState('filter.access')) {
			$query->where('a.access = '.(int) $access);
		}

		// Filter on the level.
		if ($level = $this->getState('filter.level')) {
			$query->where('a.level <= '.(int) $level);
		}

		// Add the list ordering clause.
		$query->order($db->getEscaped($this->getState('list.ordering', 'a.lft')).' '.$db->getEscaped($this->getState('list.direction', 'ASC')));

		//echo nl2br(str_replace('#__','jos_',(string)$query)).'<hr/>';
		return $query;
	}
}
