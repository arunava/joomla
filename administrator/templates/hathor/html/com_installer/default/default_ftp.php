<?php
/**
 * @version		$Id$
 * @package		Joomla.Administrator
 * @subpackage	templates.hathor
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @since		1.6
 */

// no direct access
defined('_JEXEC') or die;
?>
<fieldset class="adminform" title="<?php echo JText::_('COM_INSTALLER_MSG_DESCFTPTITLE'); ?>">
	<legend><?php echo JText::_('COM_INSTALLER_MSG_DESCFTPTITLE'); ?></legend>

	<?php echo JText::_('COM_INSTALLER_MSG_DESCFTP'); ?>

	<?php if (JError::isError($this->ftp)): ?>
		<p><?php echo JText::_($this->ftp->message); ?></p>
	<?php endif; ?>

	<div>
		<label for="username"><?php echo JText::_('COM_INSTALLER_LABEL_USERNAME'); ?>:</label>
		<input type="text" id="username" name="username" class="inputbox" value="" />
	</div>
	<div>
		<label for="password"><?php echo JText::_('COM_INSTALLER_LABEL_PASSWORD'); ?>:</label>
		<input type="password" id="password" name="password" class="input_box" value="" />
	</div>

</fieldset>