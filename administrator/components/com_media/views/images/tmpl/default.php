<?php
/**
 * @version		$Id$
 * @package		Joomla.Administrator
 * @subpackage	com_media
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;
?>
<script type='text/javascript'>
var image_base_path = '<?php $params = &JComponentHelper::getParams('com_media');
echo $params->get('image_path', 'images');?>/';
</script>
<form action="index.php" id="imageForm" method="post" enctype="multipart/form-data">
	<div id="messages" style="display: none;">
		<span id="message"></span><?php echo JHTML::_('image','media/dots.gif', '...', array('width' =>22, 'height' => 12), true)?>
	</div>
	<fieldset>
		<div class="fltlft">
			<label for="folder"><?php echo JText::_('COM_MEDIA_DIRECTORY') ?></label>
			<?php echo $this->folderList; ?>
			<button type="button" id="upbutton" title="<?php echo JText::_('COM_MEDIA_DIRECTORY_UP') ?>"><?php echo JText::_('COM_MEDIA_UP') ?></button>
		</div>
		<div class="fltrt">
			<button type="button" onclick="<?php if ($this->state->get('field.id')):?>window.parent.jInsertFieldValue(document.id('f_url').value,'<?php echo $this->state->get('field.id');?>');<?php else:?>ImageManager.onok();<?php endif;?>window.parent.SqueezeBox.close();"><?php echo JText::_('COM_MEDIA_INSERT') ?></button>
			<button type="button" onclick="window.parent.SqueezeBox.close();"><?php echo JText::_('JCANCEL') ?></button>
		</div>
	</fieldset>
	<iframe id="imageframe" name="imageframe" src="index.php?option=com_media&amp;view=imagesList&amp;tmpl=component&amp;folder=<?php echo $this->state->folder?>"></iframe>

	<fieldset>
		<table class="properties">
			<tr>
				<td><label for="f_url"><?php echo JText::_('COM_MEDIA_IMAGE_URL') ?></label></td>
				<td><input type="text" id="f_url" value="" /></td>
				<?php if (!$this->state->get('field.id')):?>
				<td><label for="f_align"><?php echo JText::_('COM_MEDIA_ALIGN') ?></label></td>
				<td>
					<select size="1" id="f_align" title="Positioning of this image">
						<option value="" selected="selected"><?php echo JText::_('COM_MEDIA_NOT_SET') ?></option>
						<option value="left"><?php echo JText::_('JGLOBAL_LEFT') ?></option>
						<option value="right"><?php echo JText::_('JGLOBAL_RIGHT') ?></option>
					</select>
				</td>
				<?php endif;?>
			</tr>
			<?php if (!$this->state->get('field.id')):?>
			<tr>
				<td><label for="f_alt"><?php echo JText::_('COM_MEDIA_IMAGE_DESCRIPTION') ?></label></td>
				<td><input type="text" id="f_alt" value="" /></td>
			</tr>
			<tr>
				<td><label for="f_title"><?php echo JText::_('COM_MEDIA_TITLE') ?></label></td>
				<td><input type="text" id="f_title" value="" /></td>
				<td><label for="f_caption"><?php echo JText::_('COM_MEDIA_CAPTION') ?></label></td>
				<td><input type="checkbox" id="f_caption" /></td>
			</tr>
			<?php endif;?>
		</table>
	</fieldset>
	<input type="hidden" id="dirPath" name="dirPath" />
	<input type="hidden" id="f_file" name="f_file" />
	<input type="hidden" id="tmpl" name="component" />
</form>
<form action="<?php echo JURI::base(); ?>index.php?option=com_media&amp;task=file.upload&amp;tmpl=component&amp;<?php echo $this->session->getName().'='.$this->session->getId(); ?>&amp;pop_up=1&amp;<?php echo JUtility::getToken();?>=1" id="uploadForm" method="post" enctype="multipart/form-data">
	<fieldset>
		<legend><?php echo JText::_('COM_MEDIA_UPLOAD'); ?></legend>
		<fieldset class="actions">
			<input type="file" id="file-upload" name="Filedata" />
			<input type="submit" id="file-upload-submit" value="<?php echo JText::_('COM_MEDIA_START_UPLOAD'); ?>"/>
			<span id="upload-clear"></span>
		</fieldset>
		<ul class="upload-queue" id="upload-queue">
			<li style="display: none" />
		</ul>
	</fieldset>
	<input type="hidden" name="return-url" value="<?php echo base64_encode('index.php?option=com_media&view=images&tmpl=component&e_name='.JRequest::getCmd('e_name')); ?>" />
</form>
