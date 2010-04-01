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
<form action="<?php echo JRoute::_('index.php?option=com_installer&view=discover');?>" method="post" name="adminForm">
	<?php if ($this->showMessage) : ?>
		<?php echo $this->loadTemplate('message'); ?>
	<?php endif; ?>

	<?php if ($this->ftp) : ?>
		<?php echo $this->loadTemplate('ftp'); ?>
	<?php endif; ?>

	<?php if (count($this->items)) : ?>
	<table class="adminlist">
		<thead>
			<tr>
				<th width="10"><?php echo JText::_('COM_INSTALLER_HEADING_NUM'); ?></th>
				<th width="20"><input type="checkbox" name="toggle" value="" onclick="checkAll(this)" /></th>
				<th class="nowrap"><?php echo JHTML::_('grid.sort', 'COM_INSTALLER_HEADING_NAME', 'name', $this->state->get('list.direction'), $this->state->get('list.ordering')); ?></th>
				<th class="center"><?php echo JHTML::_('grid.sort', 'COM_INSTALLER_HEADING_TYPE', 'type', $this->state->get('list.direction'), $this->state->get('list.ordering')); ?></th>
				<th width="10%" class="center"><?php echo JText::_('COM_INSTALLER_HEADING_VERSION'); ?></th>
				<th width="10%" class="center"><?php echo JText::_('COM_INSTALLER_HEADING_DATE'); ?></th>
				<th><?php echo JHTML::_('grid.sort', 'COM_INSTALLER_HEADING_FOLDER', 'folder', $this->state->get('list.direction'), $this->state->get('list.ordering')); ?></th>
				<th><?php echo JHTML::_('grid.sort', 'COM_INSTALLER_HEADING_CLIENT', 'client_id', $this->state->get('list.direction'), $this->state->get('list.ordering')); ?></th>
				<th width="15%" class="center"><?php echo JText::_('COM_INSTALLER_HEADING_AUTHOR'); ?></th>
				<th width="10"><?php echo JHTML::_('grid.sort', 'COM_INSTALLER_HEADING_ID', 'extension_id', $this->state->get('list.direction'), $this->state->get('list.ordering')); ?></th>
			</tr>
		</thead>
		<tfoot><tr><td colspan="10"><?php echo $this->pagination->getListFooter(); ?></td></tr>
		</tfoot>
		<tbody>
		<?php foreach ($this->items as $i => $item): ?>
			<tr class="row<?php echo $i%2;?>">
				<td><?php echo $this->pagination->getRowOffset($i); ?></td>
				<td><?php echo JHtml::_('grid.id', $i, $item->extension_id); ?></td>
				<td><span class="bold hasTip" title="<?php echo htmlspecialchars($item->name.'::'.$item->description); ?>"><?php echo $item->name; ?></span></td>
				<td class="center"><?php echo JText::_('COM_INSTALLER_TYPE_' . $item->type); ?></td>
				<td class="center"><?php echo @$item->version != '' ? $item->version : '&nbsp;'; ?></td>
				<td class="center"><?php echo @$item->creationDate != '' ? $item->creationDate : '&nbsp;'; ?></td>
				<td class="center"><?php echo @$item->folder != '' ? $item->folder : JText::_('COM_INSTALLER_TYPE_NONAPPLICABLE'); ?></td>
				<td class="center"><?php echo $item->client; ?></td>
				<td class="center">
					<span class="editlinktip hasTip" title="<?php echo JText::_('COM_INSTALLER_AUTHOR_INFORMATION');?>::<?php echo $item->author_info; ?>">
						<?php echo @$item->author != '' ? $item->author : '&nbsp;'; ?>
					</span>
				</td>
				<td><?php echo $item->extension_id ?></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<?php else : ?>
		<?php echo JText::_('COM_INSTALLER_MSG_DISCOVER_NOEXTENSION'); ?>
	<?php endif; ?>

	<input type="hidden" name="task" value="" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="filter_order" value="<?php echo $this->state->get('list.ordering'); ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $this->state->get('list.direction'); ?>" />
	<?php echo JHTML::_('form.token'); ?>
</form>