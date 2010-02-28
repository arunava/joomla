<?php
/**
 * @version		$Id$
 * @package		Joomla
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

 /* Weblinks Component Route Helper
 *
 * @package		Joomla.Site
 * @subpackage	com_weblinks
 * @since 1.6
 */

defined('_JEXEC') or die;

jimport('joomla.application.categories');

/**
 * Build the route for the com_weblinks component
 *
 * @param	array	An array of URL arguments
 *
 * @return	array	The URL arguments to use to assemble the subsequent URL.
 */
function WeblinksBuildRoute(&$query)
{
	$segments = array();

	// get a menu item based on Itemid or currently active
	$menu = &JSite::getMenu();

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

	// are we dealing with an weblink that is attached to a menu item?
	if (($mView == 'weblink') and (isset($query['id'])) and ($mId == intval($query['id']))) {
		unset($query['view']);
		unset($query['catid']);
		unset($query['id']);
	}

	if (isset($view) and $view == 'category') {
		if ($mId != intval($query['id']) || $mView != $view) {
			$categories = JCategories::getInstance('com_weblinks');
			$category = $categories->get($query['id']);
			$path = $category->getPath();
			$path[] = $category->id.':'.$category->alias;
			$path = array_reverse($path);
			
			$array = array();
			foreach($path as $id)
			{
				if((int) $id == (int)$mId)
				{
					break;
				}
				$array[] = $id;
			}
			$segments = array_merge($segments, array_reverse($array));
			unset($query['id']);
		}
	}
	
	if (isset($view) and $view == 'weblink') {
		if ($mId != intval($query['catid']) || $mView != $view) {
			$categories = JCategories::getInstance('com_weblinks');
			$category = $categories->get($query['catid']);
			$path = $category->getPath();
			$path[] = $category->id.':'.$category->alias;
			$path = array_reverse($path);
			
			$array = array();
			foreach($path as $id)
			{
				if((int) $id == (int)$mId)
				{
					break;
				}
				$array[] = $id;
			}
			$segments = array_merge($segments, array_reverse($array));
			unset($query['catid']);
			$segments[] = $query['id'];
			unset($query['id']);
		}
	}

	if (isset($query['year']))
	{
		if (!empty($query['Itemid'])) {
			$segments[] = $query['year'];
			unset($query['year']);
		}
	};

	if (isset($query['month']))
	{
		if (!empty($query['Itemid'])) {
			$segments[] = $query['month'];
			unset($query['month']);
		}
	};

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
function WeblinksParseRoute($segments)
{
	$vars = array();

	//Get the active menu item.
	$menu = &JSite::getMenu();
	$item = &$menu->getActive();

	// Count route segments
	$count = count($segments);

	// Standard routing for weblinks.
	if (!isset($item))
	{
		$vars['view']	= $segments[0];
		$vars['id']		= $segments[$count - 1];
		return $vars;
	}

	// Handle View and Identifier.
	switch ($item->query['view'])
	{
		case 'categories':
		case 'category':
			// From the categories view, we can only jump to a category.
			//$categories = JCategories::getInstance('com_weblinks');
			$id = (isset($item->query['id']) && $item->query['id'] > 1) ? $item->query['id'] : 'root';
			$category = JCategories::getInstance('com_weblinks')->get($id);
			
			$categories = $category->getChildren();
			$found = 0;
			foreach($segments as $segment)
			{
				foreach($categories as $category)
				{
					if ($category->slug == $segment)
					{
						$vars['id'] = $segment;
						$vars['view'] = 'category';
						$categories = $category->getChildren();
						$found = 1;
						break;
					}
				}
				if ($found == 0)
				{
					$vars['id'] = $segment;
					$vars['view'] = 'weblink';
					break;
				}
				$found = 0;
			}


	}
		return $vars;

}