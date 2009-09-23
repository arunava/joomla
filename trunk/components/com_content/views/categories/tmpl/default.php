<?php
/**
 * @version		$Id$
 * @package		Joomla.Site
 * @subpackage	com_content
 * @copyright	Copyright (C) 2005 - 2009 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT.DS.'helpers');

// If the page class is defined, wrap the whole output in a div.
$pageClass = $this->params->get('pageclass_sfx');
$curLevel = 0;
$difLevel = 0;
?>

<div class="jcategories-list<?php echo $pageClass;?>">

<?php if ($this->params->get('show_page_title', 1)) : ?>
<h2>
	<?php echo $this->escape($this->params->get('page_title')); ?>
</h2>
<?php endif; ?>

<?php if (!empty($this->items)) : ?>

<?php foreach ($this->items as &$item) : 
	$difLevel = $item->level - $curLevel;
	if ($difLevel < 0) :
		for ($i = 0, $n = -($difLevel); $i < $n; $i++) : 
			echo "</ol>";
		endfor; 
		$curLevel = $item->level;
	elseif ($difLevel > 0) :
		for ($i = 0, $n = $difLevel; $i < $n; $i++) : ?> 
			<ol>
		<?php endfor; 
		$curLevel = $item->level;
	endif;
	?>
	
	<li>
		<span class="jitem-title"><a href="<?php echo ContentRoute::category('index.php?option=com_content&view=category&id='.$this->escape($item->slug));?>">
			<?php echo $this->escape($item->title); ?></a>
		</span>
		<?php if ($item->description) : ?>
			<div class="jdescription">
				<?php echo $item->description; ?>
			</div>
		<?php endif; ?>
	</li>
	
	<?php endforeach; ?>
</ol>
<?php endif; ?>

</div>

