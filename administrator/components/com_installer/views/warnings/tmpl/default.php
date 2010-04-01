<?php
/**
 * @version		$Id$
 * @package		Joomla.Administrator
 * @subpackage	com_installer
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
?>
<form action="<?php echo JRoute::_('index.php?option=com_installer&view=warnings');?>" method="post" name="adminForm">
<?php

if (!count($this->messages)) {
	echo '<p class="nowarning">'. JText::_('COM_INSTALLER_MSG_WARNINGS_NONE').'</p>';
} else {
	echo JHtml::_('sliders.start', 'warning-sliders', array('useCookie'=>1));
	foreach($this->messages as $message) {
		echo JHtml::_('sliders.panel', $message['message'], str_replace(' ','', $message['message']));
		echo '<div style="padding: 5px;" >'.$message['description'].'</div>';
	}
	echo JHtml::_('sliders.panel', JText::_('COM_INSTALLER_MSG_WARNINGFURTHERINFO'),'furtherinfo-pane');
	echo '<div style="padding: 5px;" >'. JText::_('COM_INSTALLER_MSG_WARNINGFURTHERINFODESC') .'</div>';
	echo JHtml::_('sliders.end');
}
?>
<div class="clr"> </div>
<input type="hidden" name="boxchecked" value="0" />
<?php echo JHTML::_('form.token'); ?>
</form>