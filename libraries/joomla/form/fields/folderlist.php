<?php
/**
 * @version		$Id$
 * @package		Joomla.Framework
 * @subpackage	Form
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

jimport('joomla.html.html');
jimport('joomla.form.formfield');
JLoader::register('JFormFieldList', dirname(__FILE__).'/list.php');

/**
 * Supports an HTML select list of folder
 *
 * @package		Joomla.Framework
 * @subpackage	Form
 * @since		1.6
 */
class JFormFieldFolderList extends JFormFieldList
{

	/**
	 * The field type.
	 *
	 * @var		string
	 */
	public $type = 'FolderList';

	/**
	 * Method to get a list of options for a list input.
	 *
	 * @return	array		An array of JHtml options.
	 */
	protected function getOptions()
	{
		jimport('joomla.filesystem.folder');

		// path to folders directory
		$path = JPATH_ROOT . '/' . $this->_element->attributes()->directory;
		$filter = (string)$this->_element->attributes()->filter;
		$exclude = (string)$this->_element->attributes()->exclude;
		$folders = JFolder::folders($path, $filter);

		// Prepare return value
		$options = array();

		// Add basic options
		if (!(string)$this->_element->attributes()->hide_none)
		{
			$options[] = JHtml::_('select.option', '-1', JText::_('JOption_Do_Not_Use'));
		}
		if (!(string)$this->_element->attributes()->hide_default)
		{
			$options[] = JHtml::_('select.option', '', JText::_('JOption_Use_Default'));
		}

		// Iterate over folders
		if (is_array($folders))
		{
			foreach($folders as $folder)
			{
				if ($exclude)
				{
					if (preg_match(chr(1) . $exclude . chr(1), $folder))
					{
						continue;
					}
				}
				$options[] = JHtml::_('select.option', $folder, $folder);
			}
		}
		// Merge any additional options in the XML definition.
		$options = array_merge(parent::getOptions(), $options);
		return $options;
	}
}
