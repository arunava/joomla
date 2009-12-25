<?php
/**
 * @version		$Id$
 * @package		Joomla.Site
 * @subpackage	mod_whosonline
 * @copyright	Copyright (C) 2005 - 2009 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

class modWhosonlineHelper
{
	// show online count
	function getOnlineCount() {
	    $db		  = &JFactory::getDbo();
		$sessions = null;
		// calculate number of guests and users
		$result      = array();
		$user_array  = 0;
		$guest_array = 0;

		$query = 'SELECT guest, usertype, client_id' .
					' FROM #__session' .
					' WHERE client_id = 0';
		$db->setQuery($query);
		$sessions = $db->loadObjectList();

		if ($db->getErrorNum()) {
			JError::raiseWarning(500, $db->stderr());
		}

		if (count($sessions)) {
		    foreach ($sessions as $session) {
			    // if guest increase guest count by 1
				if ($session->guest == 1 && !$session->usertype) {
				    $guest_array ++;
				}
				// if member increase member count by 1
				if ($session->guest == 0) {
					$user_array ++;
				}
			}
		}

		$result['user']  = $user_array;
		$result['guest'] = $guest_array;

		return $result;
	}

	// show online member names
	function getOnlineUserNames() {
	    $db		= &JFactory::getDbo();
		$result	= null;
		$query = new JQuery;
		$query->select('a.username, a.time, a.userid, a.usertype, a.client_id');
		$query->from('#__session AS a');
		$query->where('a.userid != 0');
		//$query->order('userid');
		//$query->from('#__contact_details A');
		//$query->join('LEFT', '#__contact_details');
		//$query->where('a.userid = user_id');
	//	$query = 'SELECT DISTINCT username, time, userid, usertype, client_id'
	//			. ' FROM #__session AS a'
	//			. ' WHERE userid != 0'
	//			. $and
	//			. ' ORDER BY userid'
	//			;
		$db->setQuery($query);
		$result = $db->loadObjectList();
		if ($db->getErrorNum()) {
			JError::raiseWarning(500, $db->stderr());
		}

		return $result;
	}
}
