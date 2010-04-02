<?php
/**
 * @version		$Id$
 * @package		Joomla
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

jimport('joomla.application.categories');

/**
 * Build the route for the com_contact component
 *
 * @param	array	An array of URL arguments
 *
 * @return	array	The URL arguments to use to assemble the subsequent URL.
 */
function ContactBuildRoute(&$query){
	$segments = array();

	// get a menu item based on Itemid or currently active
	$menu = &JSite::getMenu();
	$params = JComponentHelper::getParams('com_contact');
	$advanced = $params->get('sef_advanced_link', 0);
	
	if (empty($query['Itemid'])) {
		$menuItem = &$menu->getActive();
	}
	else {
		$menuItem = &$menu->getItem($query['Itemid']);
	}
	$mView	= (empty($menuItem->query['view'])) ? null : $menuItem->query['view'];
	$mCatid	= (empty($menuItem->query['catid'])) ? null : $menuItem->query['catid'];
	$mId	= (empty($menuItem->query['id'])) ? null : $menuItem->query['id'];

	if (isset($query['view']))
	{
		$view = $query['view'];
		if (empty($query['Itemid'])) {
			$segments[] = $query['view'];
		}
		unset($query['view']);
	};

	// are we dealing with an newsfeed that is attached to a menu item?
	if (($mView == 'contact') and (isset($query['id'])) and ($mId == intval($query['id']))) {
		unset($query['view']);
		unset($query['catid']);
		unset($query['id']);
		return $segments;
	}

	if (isset($view) and ($view == 'category' or $view == 'contact')) {
		if ($mId != intval($query['id']) || $mView != $view) {
			if($view == 'contact' && isset($query['catid']))
			{
				$catid = $query['catid'];
				$menuCatid = $mCatid;
			} elseif(isset($query['id'])) {
				$catid = $query['id'];
				$menuCatid = $mId;
			}
			$categories = JCategories::getInstance('com_contact');
			$category = $categories->get($catid);
			$path = $category->getPath();
			$path = array_reverse($path);
			
			$array = array();
			foreach($path as $id)
			{
				if((int) $id == (int)$menuCatid)
				{
					break;
				}
				if($advanced)
				{
					list($tmp, $id) = explode(':', $id, 2);
				}
				$array[] = $id;
			}
			$segments = array_merge($segments, array_reverse($array));
			if($view == 'contact')
			{
				if($advanced)
				{
					list($tmp, $id) = explode(':', $query['id'], 2);
				} else {
					$id = $query['id'];
				}
				$segments[] = $id;
			}
			unset($query['id']);
			unset($query['catid']);
		}
	}

	if (isset($query['layout']))
	{
		if (!empty($query['Itemid']) && isset($menuItem->query['layout']))
		{
			if ($query['layout'] == $menuItem->query['layout']) {

				unset($query['layout']);
			}
		}
		else
		{
			if ($query['layout'] == 'default') {
				unset($query['layout']);
			}
		}
	};

	return $segments;
}
/**
 * Parse the segments of a URL.
 *
 * @param	array	The segments of the URL to parse.
 *
 * @return	array	The URL attributes to be used by the application.
 */
function ContactParseRoute($segments)
{
	$vars = array();

	//Get the active menu item.
	$menu = &JSite::getMenu();
	$item = &$menu->getActive();
	$params = JComponentHelper::getParams('com_contact');
	$advanced = $params->get('sef_advanced_link', 0);

	// Count route segments
	$count = count($segments);

	// Standard routing for newsfeeds.
	if (!isset($item))
	{
		$vars['view']	= $segments[0];
		$vars['id']		= $segments[$count - 1];
		return $vars;
	}

	// From the categories view, we can only jump to a category.
	$id = (isset($item->query['id']) && $item->query['id'] > 1) ? $item->query['id'] : 'root';
	$categories = JCategories::getInstance('com_contact')->get($id)->getChildren();
	$vars['catid'] = $id;
	$vars['id'] = $id;		
	$found = 0;
	foreach($segments as $segment)
	{
		$segment = $advanced ? str_replace(':', '-',$segment) : $segment;
		foreach($categories as $category)
		{
			if ($category->slug == $segment || $category->alias == $segment)
			{
				$vars['id'] = $category->id;
				$vars['catid'] = $category->id;
				$vars['view'] = 'category';
				$categories = $category->getChildren();
				$found = 1;
				break;
			}
		}
		if ($found == 0)
		{
			if($advanced)
			{
				$db = JFactory::getDBO();
				$query = 'SELECT id FROM #__contact_details WHERE catid = '.$vars['catid'].' AND alias = '.$db->Quote($segment);
				$db->setQuery($query);
				$nid = $db->loadResult();
			} else {
				$nid = $segment;
			}
			$vars['id'] = $nid;
			$vars['view'] = 'contact';
		}
		$found = 0;
	}
	return $vars;
}

