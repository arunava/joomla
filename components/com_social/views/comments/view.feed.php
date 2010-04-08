<?php
/**
 * @version		$Id$
 * @package		JXtended.Comments
 * @subpackage	com_social
 * @copyright	Copyright (C) 2008 - 2009 JXtended, LLC. All rights reserved.
 * @license		GNU General Public License <http://www.gnu.org/copyleft/gpl.html>
 * @link		http://jxtended.com
 */

defined('_JEXEC') or die('Invalid Request.');

jimport('joomla.application.component.view');

/**
 * Social feed view class for the Social package.
 *
 * @package		JXtended.Comments
 * @subpackage	com_social
 * @version		1.0
 */
class SocialViewComments extends JView
{
	/**
	 * Display the view
	 *
	 * @return	void
	 * @since	1.6
	 */
	function display($tpl = null)
	{
		$app = &JFactory::getApplication();

		// get some variables from the model
		$state		= $this->get('State');
		$comments	= &$this->get('Items');

		if ($state->get('filter.thread_id')) {
			// setup some basic document information
			$this->document->link = JRoute::_($comments[0]->page_route);
			$this->document->setTitle( $comments[0]->page_title.' - '.JText::_('SOCIAL_Comments'));
			$this->document->setDescription(JText::sprintf('SOCIAL_Thread_Desc', $comments[0]->page_title));
		} else {
			// setup some basic document information
			$this->document->link = JURI::base(true);
			$this->document->setTitle( $app->getCfg('sitename').' - '.JText::_('SOCIAL_Comments'));
			$this->document->setDescription(JText::sprintf('SOCIAL_Thread_Desc', $app->getCfg('sitename')));
		}


		// import library dependencies
		jx('jx.html.bbcode');

		// instantiate bbcode parser object
		$parser = &JBBCode::getInstance(array(
			'smiley_path' => JPATH_ROOT.'/media/jxtended/img/smilies/default',
			'smiley_url' => JURI::base().'media/jxtended/img/smilies/default'
		));

		// Setup the display name for the comment.
		$params = & JComponentHelper::getParams('com_social');
		$_name = $params->get('show_name_as', 0) ? 'user_login_name' : 'user_name';

		// iterate over the comments to add to the feed
		foreach ($comments as $comment)
		{
			$item				= new JFeedItem();
			$item->title		= strip_tags((!empty($comment->$_name)) ? $comment->$_name : $comment->name);
			$item->link			= JRoute::_($comment->page_route).'#comment-'.$comment->id;
			$item->description	= $parser->parse($comment->body);
			$item->date			= $comment->created_date;

			// loads item info into rss array
			$this->document->addItem($item);
		}

	}
}