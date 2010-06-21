<?php
/**
 * @version     $Id$
 * @package     Joomla.Site
 * @subpackage	com_projects
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

// Vars
$params =  $this->params;
$pageClass = $this->escape($params->get('pageclass_sfx'));
$model = $this->getModel();
?>
<div class="projects<?php echo $pageClass;?>">
<div class="item-page">
	<div class="item">
		<h1><?php echo $this->title;?></h1>
		<?php if($model->getState('type') != 'list') :?>
			<form action="<?php echo JRoute::_('index.php?option=com_projects&id='.$model->getState('project.id')); ?>" method="post">
		<?php endif; ?>

		<?php echo $this->loadTemplate('buttons');?>
		<ul>
		<?php 
			$c = count($this->items);
			for($i = 0; $i<$c;$i++){
				$this->item = &$this->items[$i];
				echo $this->loadTemplate('item');
			}
		?>
		</ul>
		<?php echo $this->loadTemplate('buttons');?>
		
		<?php if($model->getState('type') != 'list') :?>
			<input type="hidden" name="task" value="members.<?php echo $model->getState('type'); ?>" />
			<?php echo JHTML::_( 'form.token' ); ?>
			</form>
		<?php endif; ?>
	</div>
	</div>	
</div>