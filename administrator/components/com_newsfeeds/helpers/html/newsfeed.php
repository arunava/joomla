<?php
/**
 * @version		$Id$
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

/**
 * Utility class for creating HTML Grids
 *
 * @static
 * @package		Joomla.Administrator
 * @subpackage	com_newsfeeds
 * @since		1.5
 */
class JHtmlNewsfeed
{
	/**
	 * @param	int $value	The state value
	 * @param	int $i
	 */
	function state($value = 0, $i)
	{
		// Array of image, task, title, action
		$states	= array(
			1	=> array('tick.png',		'newsfeeds.unpublish',	'JSTATE_PUBLISHED',			'JSTATE_UNPUBLISH_ITEM'),
			0	=> array('publish_x.png',	'newsfeeds.publish',		'JSTATE_UNPUBLISHED',		'JSTATE_PUBLISH_ITEM')
		);
		$state	= JArrayHelper::getValue($states, (int) $value, $states[0]);
		$html	= '<a href="javascript:void(0);" onclick="return listItemTask(\'cb'.$i.'\',\''.$state[1].'\')" title="'.JText::_($state[3]).'">'
				. JHTML::_('image','admin/'.$state[0], JText::_($state[2]), NULL, true).'</a>';

		return $html;
	}

	/**
	 * Display an HTML select list of state filters
	 *
	 * @param	int $selected	The selected value of the list
	 * @return	string			The HTML code for the select tag
	 * @since	1.6
	 */
	function filterstate($selected)
	{
		// Build the active state filter options.
		$options	= array();
		$options[]	= JHtml::_('select.option', '*', JText::_('JOPTION_ANY'));
		$options[]	= JHtml::_('select.option', '1', JText::_('JSTATE_PUBLISHED'));
		$options[]	= JHtml::_('select.option', '0', JText::_('JSTATE_UNPUBLISHED'));


		return JHTML::_('select.genericlist', $options, 'filter_published',
			array(
				'list.attr' => 'class="inputbox" onchange="this.form.submit();"',
				'list.select' => $selected
			)
		);
	}
}