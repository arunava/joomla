<?php
/**
 * @version		$Id: edit.php 14542 2010-02-04 03:54:41Z eddieajau $
 * @package		Joomla.Administrator
 * @subpackage	com_newsfeeds
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

// Include the HTML helpers.
JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('behavior.keepalive');

?>
<script type="text/javascript">
<!--
	function submitbutton(task)
	{
		// @todo Validation is currently busted
		//if (task == 'newsfeed.cancel' || document.formvalidator.isValid(document.id('newsfeed-form'))) {
		if (task == 'newsfeed.cancel') {
			submitform(task);
		}
		// @todo Deal with the editor methods
		submitform(task);
	}
// -->
</script>

<form action="<?php echo JRoute::_('index.php?option=com_newsfeeds'); ?>" method="post" name="adminForm" id="newsfeed-form" class="form-validate">
<div class="col main-section">
	<fieldset class="adminform">
		<legend><?php echo empty($this->item->id) ? JText::_('COM_NEWSFEEDS_NEW_NEWSFEED') : JText::sprintf('COM_NEWSFEEDS_EDIT_NEWSFEED', $this->item->id); ?></legend>

			<?php echo $this->form->getLabel('name'); ?>
			<?php echo $this->form->getInput('name'); ?>
			
			<?php echo $this->form->getLabel('link'); ?>
			<?php echo $this->form->getInput('link'); ?>
			
			<?php echo $this->form->getLabel('catid'); ?>
			<?php echo $this->form->getInput('catid'); ?>

			<?php echo $this->form->getLabel('alias'); ?>
			<?php echo $this->form->getInput('alias'); ?>

			<?php echo $this->form->getLabel('published'); ?>
			<?php echo $this->form->getInput('published'); ?>

			<?php echo $this->form->getLabel('access'); ?>
			<?php echo $this->form->getInput('access'); ?>

			<?php echo $this->form->getLabel('ordering'); ?>
			<div id="jform_ordering" class="fltlft"><?php echo $this->form->getInput('ordering'); ?></div>

			<?php echo $this->form->getLabel('language'); ?>
			<?php echo $this->form->getInput('language'); ?>
			
			<?php echo $this->form->getLabel('id'); ?>
			<?php echo $this->form->getInput('id'); ?>

	</fieldset>
</div>

<div class="col options-section">
	<?php echo JHtml::_('sliders.start','content-sliders-'.$this->item->id, array('useCookie'=>1)); ?>

		<?php echo JHtml::_('sliders.panel',JText::_('COM_NEWSFEEDS_FIELD_OPTIONS'), 'newsfeeds-options'); ?>
	<fieldset class="panelform">
		<legend class="element-invisible"><?php echo JText::_('COM_NEWSFEEDS_FIELD_OPTIONS'); ?></legend>

			<?php echo $this->form->getLabel('numarticles'); ?>
			<?php echo $this->form->getInput('numarticles'); ?>

			<?php echo $this->form->getLabel('cache_time'); ?>
			<?php echo $this->form->getInput('cache_time'); ?>

			<?php echo $this->form->getLabel('rtl'); ?>
			<?php echo $this->form->getInput('rtl'); ?>

		<?php foreach($this->form->getFieldset('params') as $field): ?>
			<?php if ($field->hidden): ?>
				<?php echo $field->input; ?>
			<?php else: ?>
			<div class="paramrow">
				<?php echo $field->label; ?>
				<?php echo $field->input; ?>
			</div>
			<?php endif; ?>
		<?php endforeach; ?>

	</fieldset>
	<?php echo JHtml::_('sliders.end'); ?>	
</div>

<div class="clr"></div>

	<input type="hidden" name="task" value="" />
	<?php echo JHtml::_('form.token'); ?>
</form>