<?php
/**
 * @version		$Id: test.php 15576 2010-03-25 12:43:26Z louis $
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

jimport('joomla.form.formfield');

/**
 * Form Field class for the Joomla Framework.
 *
 * @package		Joomla.Framework
 * @subpackage	Form
 * @since		1.6
 */
class JFormFieldTest extends JFormField
{
	/**
	 * The field type.
	 *
	 * @var		string
	 */
	protected $type = 'Test';

	/**
	 * Method to get the field input.
	 *
	 * @return	string		The field input.
	 */
	protected function getInput()
	{
		return 'Test';
	}
}
