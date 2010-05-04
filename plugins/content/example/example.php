<?php
/**
 * @version		$Id$
 * @package		Joomla
 * @subpackage	Content
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.plugin.plugin');

/**
 * Example Content Plugin
 *
 * @package		Joomla
 * @subpackage	Content
 * @since		1.5
 */
class plgContentExample extends JPlugin
{
	/**
	 * Example prepare content method
	 *
	 * Method is called by the view
	 *
	 * @param	string	The context of the content being passed to the plugin.
	 * @param	object	The article object.  Note $article->text is also available
	 * @param	object	The article params
	 * @param	int		The 'page' number
	 * @since	1.6
	 */
	function onContentPrepare($context, &$article, &$params, $limitstart)
	{
		$app = JFactory::getApplication();
	}

	/**
	 * Example after display title method
	 *
	 * Method is called by the view and the results are imploded and displayed in a placeholder
	 *
	 * @param	string		The context for the content passed to the plugin.
	 * @param	object		The article object.  Note $article->text is also available
	 * @param	object		The article params
	 * @param	int			The 'page' number
	 * @return	string
	 * @since	1.6
	 */
	function onContentAfterTitle($context, &$article, &$params, $limitstart)
	{
		$app = JFactory::getApplication();

		return '';
	}

	/**
	 * Example before display content method
	 *
	 * Method is called by the view and the results are imploded and displayed in a placeholder
	 *
	 * @param	string		The context for the content passed to the plugin.
	 * @param	object		The article object.  Note $article->text is also available
	 * @param	object		The article params
	 * @param	int			The 'page' number
	 * @return	string
	 * @since	1.6
	 */
	function onContentBeforeDisplay($context, &$article, &$params, $limitstart)
	{
		$app = JFactory::getApplication();

		return '';
	}

	/**
	 * Example after display content method
	 *
	 * Method is called by the view and the results are imploded and displayed in a placeholder
	 *
	 * @param	string		The context for the content passed to the plugin.
	 * @param	object		The article object.  Note $article->text is also available
	 * @param	object		The article params
	 * @param	int			The 'page' number
	 * @return	string
	 * @since	1.6
	 */
	function onContentAfterDisplay($context, &$article, &$params, $limitstart)
	{
		$app = JFactory::getApplication();

		return '';
	}

	/**
	 * Example before save content method
	 *
	 * Method is called right before content is saved into the database.
	 * Article object is passed by reference, so any changes will be saved!
	 * NOTE:  Returning false will abort the save with an error.
	 *	You can set the error by calling $article->setError($message)
	 *
	 * @param	string		The context of the content passed to the plugin.
	 * @param	object		A JTableContent object
	 * @param	bool		If the content is just about to be created
	 * @return	bool		If false, abort the save
	 * @since	1.6
	 */
	function onContentBeforeSave($context, &$article, $isNew)
	{
		$app = JFactory::getApplication();

		return true;
	}

	/**
	 * Example after save content method
	 * Article is passed by reference, but after the save, so no changes will be saved.
	 * Method is called right after the content is saved
	 *
	 * @param	string		The context of the content passed to the plugin (added in 1.6)
	 * @param	object		A JTableContent object
	 * @param	bool		If the content is just about to be created
	 * @since	1.6
	 */
	function onContentAfterSave($context, &$article, $isNew)
	{
		$app = JFactory::getApplication();

		return true;
	}
}