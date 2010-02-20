<?php
/**
 * @version		$Id$
 * @package		Joomla.Site
 * @subpackage	com_users
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

jimport('joomla.application.component.modelform');
jimport('joomla.event.dispatcher');
/**
 * Resend model class for Users.
 *
 * @package		Joomla.Site
 * @subpackage	com_users
 * @version		1.6
 */
class UsersModelResend extends JModelForm
{
	protected function _populateState()
	{
		// Get the application object.
		$app	= &JFactory::getApplication();
		$params	= &$app->getParams('com_users');

		// Load the parameters.
		$this->setState('params', $params);
	}

	/**
	 * Method to get the activation link resend request form.
	 *
	 * @access	public
	 * @return	object	JForm object on success, JException on failure.
	 * @since	1.6
	 */
	function &getForm()
	{
		// Get the form.
		$form = parent::getForm('resend', 'com_users.resend', array('array' => 'jform', 'event' => 'onPrepareForm'));

		// Check for an error.
		if (JError::isError($form)) {
			$this->setError($form->getMessage());
			return false;
		}

		// Get the dispatcher and load the users plugins.
		$dispatcher	= &JDispatcher::getInstance();
		JPluginHelper::importPlugin('users');

		// Trigger the form preparation event.
		$results = $dispatcher->trigger('onPrepareUserResendRequestForm', array(&$form));

		// Check for errors encountered while preparing the form.
		if (count($results) && in_array(false, $results, true)) {
			$this->setError($dispatcher->getError());
			return false;
		}

		return $form;

	/**
	 * Method to start the activation link resend process
	 *
	 * @access	public
	 * @return
	 * @since	1.6
	 */
	function processResendRequest($data)
	{
		$params	= &$app->getParams('com_users');

		// Get the form.
		$form = &$this->getResendForm();

		// Check for an error.
		if (JError::isError($form)) {
			return $form;
		}

		// Validate the data.
		$data = $this->validate($form, $data);

		// Check the validator results.
		if (JError::isError($data) || $data === false) {
			return $data;
		}

		// Find the user id for the given e-mail address.
		$db		= $this->getDbo();
		$query	= $db->getQuery(true);
		$query->select('*');
		$query->from('`#__users`');
		$query->where('`email` = '.$db->Quote($data['email']));

		// Get the user id.
		$db->setQuery((string) $query);
		$user = $db->loadObject();

		// Check for an error.
		if ($db->getErrorNum()) {
			return new JException(JText::sprintf('USERS_DATABASE_ERROR', $db->getErrorMsg()), 500);
		}

		// Check for a user.
		if (empty($user)) {
			$this->setError(JText::_('USERS_USER_NOT_FOUND'));
			return false;
		}

		// Make sure the user isn't already activated
		if ($user->get('activate') == null) {
			$this-setError(JText::_('USERS_USER_ALREADY_ACTIVATED'));
			return false;
		}

		// Make sure the user isn't awaiting administrator's approval
		if ($params->get('useradminactivation') && $user->getParam('emailVerified')) {
			$this-setError(JText::_('USERS_USER_AWAITING_ACTIVATION'));
			return false;
		}

		$config	= &JFactory::getConfig();

		// Assemble the activation link.
		$link	= 'index.php?option=com_users&task=registration.activate&token='.$user->get('activate');

		// Put together the e-mail template data.
		$data = JArrayHelper::fromObject($user);
		$data['fromname']	= $config->getValue('fromname');
		$data['mailfrom']	= $config->getValue('mailfrom');
		$data['sitename']	= $config->getValue('sitename');
		$data['link_text']	= JRoute::_($link, false);
		$data['link_html']	= JRoute::_($link, true);


		// Load the mail template.
		jimport('joomla.utilities.simpletemplate');
		$template = new JSimpleTemplate();

		if (!$template->load('users.username.remind.request')) {
			return new JException(JText::_('USERS_REMIND_MAIL_TEMPLATE_NOT_FOUND'), 500);
		}

		// Push in the email template variables.
		$template->bind($data);

		// Get the email information.
		$toEmail	= $user->email;
		$subject	= $template->getTitle();
		$message	= $template->getHtml();

		// Send the password reset request e-mail.
		$return = JUtility::sendMail($data['mailfrom'], $data['fromname'], $toEmail, $subject, $message);

		// Check for an error.
		if ($return !== true) {
			return new JException(JText::_('USERS_MAIL_FAILED'), 500);
		}

		return true;
	}