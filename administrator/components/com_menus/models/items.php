<?php
/**
 * @version		$Id$
 * @package		Joomla.Administrator
 * @subpackage	com_menus
 * @copyright	Copyright (C) 2005 - 2009 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');
jimport('joomla.database.query');

/**
 * Menu Item List Model for Menus.
 *
 * @package		Joomla.Administrator
 * @subpackage	com_menus
 * @version		1.6
 */
class MenusModelItems extends JModelList
{
	/**
	 * Model context string.
	 *
	 * @access	protected
	 * @var		string
	 */
	protected $_context = 'menus.items';

	/**
	 * Method to build an SQL query to load the list data.
	 *
	 * @access	protected
	 * @return	string	An SQL query
	 * @since	1.0
	 */
	protected function _getListQuery()
	{
		// Create a new query object.
		$query = new JQuery;

		// Select all fields from the table.
		$query->select($this->getState('list.select', 'a.*'));
		$query->from('`#__menus` AS a');

		// Add the level in the tree.
		$query->select('COUNT(DISTINCT p.id) AS level');
		$query->join('LEFT OUTER', '`#__menus` AS p ON a.left_id > p.left_id AND a.right_id < p.right_id');
		$query->group('a.id');

		// If the model is set to check item state, add to the query.
		if ($this->getState('check.state', true)) {
			$state = $this->getState('filter.state');
			$query->where('a.published = '.(int)$state);
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

		// Filter the comments over the search string if set.
		$search = $this->getState('filter.search');
		if (!empty($search)) {
			$query->where('a.title LIKE '.$this->_db->Quote('%'.$search.'%'));
		}

		// Add the list ordering clause.
		$query->order($this->_db->getEscaped($this->getState('list.ordering', 'a.left_id')).' '.$this->_db->getEscaped($this->getState('list.direction', 'ASC')));

		echo nl2br(str_replace('#__','jos_',$query->toString())).'<hr/>';die;
		return $query;
	}

	/**
	 * Method to get a store id based on model configuration state.
	 *
	 * This is necessary because the model is used by the component and
	 * different modules that might need different sets of data or different
	 * ordering requirements.
	 *
	 * @access	protected
	 * @param	string		$context	A prefix for the store id.
	 * @return	string		A store id.
	 * @since	1.0
	 */
	function _getStoreId($id = '')
	{
		// Compile the store id.
		$id	.= ':'.$this->getState('list.start');
		$id	.= ':'.$this->getState('list.limit');
		$id	.= ':'.$this->getState('list.ordering');
		$id	.= ':'.$this->getState('list.direction');
		$id	.= ':'.$this->getState('check.state');
		$id	.= ':'.$this->getState('filter.state');
		$id	.= ':'.$this->getState('filter.search');
		$id	.= ':'.$this->getState('filter.parent_id');
		$id	.= ':'.$this->getState('filter.menu_id');

		return md5($id);
	}

	/**
	 * Method to auto-populate the model state.
	 *
	 * This method should only be called once per instantiation and is designed
	 * to be called on the first call to the getState() method unless the model
	 * configuration flag to ignore the request is set.
	 *
	 * @access	protected
	 * @return	void
	 * @since	1.0
	 */
	function _populateState()
	{
		// Initialize variables.
		$app = & JFactory::getApplication('administrator');

		// Load the filter state.
		$this->setState('filter.search', $app->getUserStateFromRequest($this->_context.'filter.search', 'filter_search', ''));
		$this->setState('filter.state', $app->getUserStateFromRequest($this->_context.'filter.state', 'filter_state', 1, 'string'));
		$this->setState('filter.parent_id', $app->getUserStateFromRequest($this->_context.'filter.parent_id', 'filter_parent_id', 0, 'int'));
		$this->setState('filter.menu_id', $app->getUserStateFromRequest($this->_context.'filter.menu_id', 'filter_menu_id', 0, 'int'));

		// Load the list state.
		$this->setState('list.start', $app->getUserStateFromRequest($this->_context.'list.start', 'limitstart', 0, 'int'));
		$this->setState('list.limit', $app->getUserStateFromRequest($this->_context.'list.limit', 'limit', $app->getCfg('list_limit', 25), 'int'));
		$this->setState('list.ordering', 'a.left_id');
		$this->setState('list.direction', 'ASC');

		// Load the user parameters.
		$user = & JFactory::getUser();
		$this->setState('user',	$user);
		$this->setState('user.id', (int)$user->id);
		$this->setState('user.aid', (int)$user->get('aid'));

		// Load the check parameters.
		if ($this->_state->get('filter.state') === '*') {
			$this->setState('check.state', false);
		} else {
			$this->setState('check.state', true);
		}

		// Load the parameters.
		$params = & JComponentHelper::getParams('com_menus');
		$this->setState('params', $params);
	}
}
