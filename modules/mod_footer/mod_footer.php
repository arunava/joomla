<?php
/**
 * @version		$Id$
 * @package		Joomla.Site
 * @subpackage	mod_footer
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

$app		= JFactory::getApplication();
$date		= JFactory::getDate();
$cur_year	= $date->format('Y');
$csite_name	= $app->getCfg('sitename');

if (JString::strpos(JText :: _('MOD_FOOTER_LINE1'), '%date%')) {
	$line1 = ereg_replace('%date%', $cur_year, JText :: _('MOD_FOOTER_LINE1'));
}
else {
	$line1 = JText :: _('MOD_FOOTER_LINE1');
}

if (JString::strpos($line1, '%sitename%')) {
	$lineone = ereg_replace('%sitename%', $csite_name, $line1);
}
else {
	$lineone = $line1;
}

require JModuleHelper::getLayoutPath('mod_footer', $params->get('layout', 'default'));
