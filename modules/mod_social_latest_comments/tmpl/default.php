<?php
/**
 * @version		$Id$
 * @package		JXtended.Comments
 * @subpackage	mod_social_latest
 * @copyright	Copyright (C) 2008 - 2009 JXtended, LLC. All rights reserved.
 * @license		GNU General Public License <http://www.gnu.org/copyleft/gpl.html>
 * @link		http://jxtended.com
 */

defined('_JEXEC') or die('Invalid Request.');

// If there are no items in the list, do not display anything.
if (empty($list)) {
	return;
}

// Setup the display name for the comment.
$_name = $params->get('show_name_as', 0) ? 'user_login_name' : 'user_name';

// Attach the comments stylesheet to the document head.
JHtml::stylesheet('social/comments.css', array(), true);
?>

<ol class="comments-list latest">
<?php
	foreach($list as $item) :
		$itemTitle = JText::sprintf('Comments_Re', !empty($item->subject) ? $item->subject : $item->page_title);
		$itemTitle = htmlspecialchars($itemTitle, ENT_QUOTES, 'UTF-8');
	?>
	<li>
		<h4>
			<a class="item" href="<?php echo JRoute::_($item->page_route); ?>#comment-<?php echo $item->id; ?>" title="<?php echo $itemTitle; ?>">
				<?php echo $itemTitle; ?></a>
		</h4>
		<small>
			<?php echo JText::sprintf('Comments_Comment_Posted_On', JHtml::date($item->created_date, $params->get('date_format')), htmlspecialchars((!empty($item->$_name)) ? $item->$_name : $item->name, ENT_QUOTES, 'UTF-8')); ?>
		</small>
<?php if ($params->get('show_comment_excerpt', 1)) : ?>
		<p class="excerpt">
			<?php echo htmlspecialchars(modCommentsLatestHelper::truncateBody($item->body, $params->get('max_excerpt_length', 50)), ENT_QUOTES, 'UTF-8'); ?>
		</p>
<?php endif; ?>
	</li>
<?php endforeach; ?>
</ol>
<?php if ($params->get('enable_comment_feeds', 1) && $params->get('show_feed_link', 1)) : ?>
<a class="comments-feed" href="<?php echo JRoute::_('index.php?option=com_comments&view=comments&format=feed'); ?>"><?php echo JText::_('Comments_Feed'); ?></a>
<?php endif; ?>