<?php
/**
 * @version		$Id$
 * @package		Joomla.Administrator
 * @subpackage	templates.bluestork
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @since		1.6
 */

// no direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT.DS.'helpers'.DS.'html');
JHtml::_('behavior.tooltip');
JHtml::_('script','multiselect.js');
$user	= &JFactory::getUser();
$userId	= $user->get('id');
$listOrder	= $this->state->get('list.ordering');
$listDirn	= $this->state->get('list.direction');

// Get additional language strings prefixed with TPL_HATHOR
$lang =& JFactory::getLanguage();
$lang->load('tpl_hathor', JPATH_ADMINISTRATOR)
|| $lang->load('tpl_hathor', JPATH_ADMINISTRATOR.DS.'templates/hathor');


?>

<form action="<?php echo JRoute::_('index.php?option=com_contact'); ?>" method="post" name="adminForm" id="adminForm">
	<fieldset id="filter-bar">
	<legend class="element-invisible"><?php echo JText::_('JSEARCH_FILTER_LABEL'); ?></legend>
		<div class="filter-search">
			<label class="filter-search-lbl" for="filter_search"><?php echo JText::_('JSEARCH_FILTER_LABEL'); ?>:</label>
			<input type="text" name="filter_search" id="filter_search" value="<?php echo $this->state->get('filter.search'); ?>" title="<?php echo JText::_('COM_CONTACT_SEARCH_IN_NAME'); ?>" />
			<button type="submit"><?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?></button>
			<button type="button" onclick="document.id('filter_search').value='';this.form.submit();"><?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?></button>
		</div>
		<div class="filter-select">
			<label class="selectlabel" for="filter_access">
				<?php echo JText::_('JOPTION_SELECT_ACCESS'); ?>
			</label>
			<select name="filter_access" id="filter_access" class="inputbox">
				<option value=""><?php echo JText::_('JOPTION_SELECT_ACCESS');?></option>
				<?php echo JHtml::_('select.options', JHtml::_('access.assetgroups'), 'value', 'text', $this->state->get('filter.access'));?>
			</select>
			<label class="selectlabel" for="filter_published">
				<?php echo JText::_('JOPTION_SELECT_PUBLISHED'); ?>
			</label> 
			<select name="filter_published" id="filter_published" class="inputbox">
				<option value=""><?php echo JText::_('JOPTION_SELECT_PUBLISHED');?></option>
				<?php echo JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'), 'value', 'text', $this->state->get('filter.published'), true);?>
			</select>
			<label class="selectlabel" for="filter_category_id">
				<?php echo JText::_('JOPTION_SELECT_CATEGORY'); ?>
			</label>
			<select name="filter_category_id" id="filter_category_id" class="inputbox"">
				<option value=""><?php echo JText::_('JOPTION_SELECT_CATEGORY');?></option>
				<?php echo JHtml::_('select.options', JHtml::_('category.options', 'com_contact'), 'value', 'text', $this->state->get('filter.category_id'));?>
			</select>
			
			<button type="button" id="filter-go" onclick="this.form.submit();">
				<?php echo JText::_('GO'); ?></button>
			
		</div>
	</fieldset>
	<div class="clr"> </div>

	<table class="adminlist">
		<thead>
			<tr>
				<th class="row-number-col">
					<?php echo JText::_('JGRID_HEADING_ROW_NUMBER'); ?>
				</th>
				<th class="checkmark-col">
					<input type="checkbox" name="toggle" value="" title="<?php echo JText::_('TPL_HATHOR_CHECKMARK_ALL'); ?>" onclick="checkAll(<?php echo count($this->items); ?>);" />
				</th>
				<th class="title">
					<?php echo JHtml::_('grid.sort',  'JGRID_HEADING_TITLE', 'a.name', $listDirn, $listOrder); ?>
				</th>
				<th class="nowrap state-col">
					<?php echo JHtml::_('grid.sort',  'JGRID_HEADING_STATE', 'a.state', $listDirn, $listOrder); ?>
				</th>
				<th class="nowrap ordering-col">
					<?php echo JHtml::_('grid.sort',  'JGRID_HEADING_ORDERING', 'a.ordering', $listDirn, $listOrder); ?>
					<?php echo JHtml::_('grid.order', $this->items, 'filesave.png', 'contacts.saveorder'); ?>
				</th>
				<th class="title category-col">
					<?php echo JHtml::_('grid.sort',  'JGRID_HEADING_CATEGORY', 'category_title', $listDirn, $listOrder); ?>
				</th>
				<th class="title access-col">
					<?php echo JHtml::_('grid.sort',  'JGRID_HEADING_ACCESS', 'access_level', $listDirn, $listOrder); ?>
				</th>
				<th class="nowrap id-col">
					<?php echo JHtml::_('grid.sort',  'JGRID_HEADING_ID', 'a.id', $listDirn, $listOrder); ?>
				</th>
			</tr>
		</thead>
		
		<tbody>
		<?php
		$n = count($this->items);
		foreach ($this->items as $i => $item) :
			$ordering	= ($listOrder == 'a.ordering');
			$checkedOut	= JTable::isCheckedOut($userId, $item->checked_out);

			$item->cat_link = JRoute::_('index.php?option=com_categories&extension=com_contact&task=edit&type=other&='. $item->catid);
			?>
			<tr class="row<?php echo $i % 2; ?>">
				<th>
					<?php echo $this->pagination->getRowOffset($i); ?>
				</th>
				<td>
					<?php echo JHtml::_('grid.checkedout', $item, $i); ?>
				</td>
				<td>
					<?php if (JTable::isCheckedOut($userId, $item->checked_out)) : ?>
						<?php echo $item->name; ?>
					<?php else : ?>
						<a href="<?php echo JRoute::_('index.php?option=com_contact&task=contact.edit&id='.(int) $item->id); ?>">
							<?php echo $this->escape($item->name) ?></a>
					<?php endif; ?>
					<p class="smallsub">(<span><?php echo JText::_('COM_CONTACT_CONTACT_VIEW_ALIAS') ?>:</span>
					<?php echo $this->escape($item->alias);?>)</p>
				</td>
				<td align="center">
					<?php echo JHtml::_('jgrid.published', $item->published, $i, 'contacts.');?>
				</td>
				<td class="order">
					<span><?php echo $this->pagination->orderUpIcon($i, ($item->catid == @$this->items[$i-1]->catid),'contacts.orderup', 'JGRID_MOVE_UP', $ordering); ?></span>
					<span><?php echo $this->pagination->orderDownIcon($i, $n, ($item->catid == @$this->items[$i+1]->catid), 'contacts.orderdown', 'JGRID_MOVE_DOWN', $ordering); ?></span>
					<?php $disabled = $ordering ?  '' : 'disabled="disabled"'; ?>
					<input type="text" name="order[]" value="<?php echo $item->ordering;?>" <?php echo $disabled ?> class="text-area-order" title="<?php echo $item->name; ?> order" />
				</td>
				<td align="center">
					<?php echo $item->category_title; ?>
				</td>
				<td align="center">
					<?php echo $item->access_level; ?>
				</td>
				<td align="center">
					<?php echo $item->id; ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	
	<?php echo $this->pagination->getListFooter(); ?>

	<input type="hidden" name="task" value="" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
	<?php echo JHtml::_('form.token'); ?>
</form>