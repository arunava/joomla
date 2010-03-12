<?php
/**
 * @version		$Id$
 * @package		Joomla.FunctionalTest
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

require_once 'PHPUnit/Extensions/SeleniumTestCase.php';

class SeleniumJoomlaTestCase extends PHPUnit_Extensions_SeleniumTestCase
{
	public $cfg; // configuration so tests can get at the fields

	public function setUp()
	{
		$cfg = new SeleniumConfig();
		$this->cfg = $cfg; // save current configuration
		$this->setBrowser($cfg->browser);
		$this->setBrowserUrl($cfg->host.$cfg->path);
		if(isset($cfg->selhost)) {
			$this->setHost($cfg->selhost);
		}
		echo ".\n".'Starting '.get_class($this).".\n";
	}

	function doAdminLogin()
	{
		echo "Logging in to back end.\n";
		$cfg = new SeleniumConfig();
		$this->type("mod-login-username", $cfg->username);
		$this->type("mod-login-password", $cfg->password);
		$this->click("link=Log in");
		$this->waitForPageToLoad("30000");
	}

	function doAdminLogout()
	{
		echo "Logging out of back end.\n";
		$this->click("link=Logout");
		$this->waitForPageToLoad("30000");
	}

	function gotoAdmin()
	{
		echo "Browsing to back end.\n";
		$cfg = new SeleniumConfig();
		$this->open($cfg->path . "administrator");
		$this->waitForPageToLoad("30000");
	}

	function gotoSite()
	{
		echo "Browsing to font end.\n";
		$cfg = new SeleniumConfig();
		$this->open($cfg->path);
		$this->waitForPageToLoad("30000");		
	}

	function doFrontEndLogin()
	{
		echo "Logging in to front end.\n";
		$this->type("modlgn_username", "admin");
		$this->type("modlgn_passwd", "password");
		$this->click("Submit");
		$this->waitForPageToLoad("30000");
	}

	function setTinyText($text)
	{
		$this->selectFrame("text_ifr");
		$this->type("tinymce", $text);
		$this->selectFrame("relative=top");
	}

	function doFrontEndLogout()
	{
		echo "Logging out of front end.\n";
		$this->click("Submit");
		$this->waitForPageToLoad("30000");
	}
	
	function createUser($name, $userName, $password = 'password', $email = 'testuser@test.com', $group = 'Manager') {
		$this->click("link=User Manager");
		$this->waitForPageToLoad("30000");
		echo("Add new user named " . $name . " in Group=" . $group . "\n");
		$this->click("//li[@id='toolbar-new']/a/span");
		$this->waitForPageToLoad("30000");
		$this->type("jform_name", $name);
		$this->type("jform_username", $userName);
		$this->type("jform_password", $password);
		$this->type("jform_password2", $password);
		$this->type("jform_email", $email);
		
		// Set group 
		switch ($group)
		{
			case 'Manager' :
				$this->click("1group_6");
				break;

			case 'Administrator' :
				$this->click("1group_7");
				break;

			case 'Super Users' :
				$this->click("1group_8");
				break;

			case 'Park Rangers' :
				$this->click("1group_9");
				break;

			case 'Registered' :
				$this->click("1group_2");
				break;

			case 'Author' :
				$this->click("1group_3");
				break;

			case 'Editor' :
				$this->click("1group_4");
				break;
				
			case 'Publisher' :
				$this->click("1group_5");
				break;

			default:
				$this->click("1group_6");
				break;
		}
		
		$this->click("link=Save & Close");
		$this->waitForPageToLoad("30000");
		echo "New user created\n";
				
	}
	
	function deleteTestUsers($partialName = 'My Test User')
	{
		echo "Browse to User Manager.\n";
	    $this->click("link=User Manager");
	    $this->waitForPageToLoad("30000");
	    
	    echo "Filter on user name\n";
	    $this->type("filter_search", $partialName);
	    $this->click("//button[@type='submit']");
	    $this->waitForPageToLoad("30000");
	  
	    echo "Delete all users in view.\n";
	    $this->click("toggle");
	    echo("Delete new user.\n");    
	    $this->click("link=Delete");
	    $this->waitForPageToLoad("30000");
	    try {
	    	$this->assertTrue($this->isTextPresent("item(s) successfully deleted."));
	    } catch (PHPUnit_Framework_AssertionFailedError $e) {
	    	array_push($this->verificationErrors, $e->toString());
	    }
	}
	
	function createGroup($groupName,$groupParent = 'Public')
  	{	
		$this->click("link=Groups");
	    $this->waitForPageToLoad("30000");
	    echo "Create new group ".$groupName.".\n";
	    $this->click("link=New");
	    $this->waitForPageToLoad("30000");
	    $this->type("jform_title", $groupName);
	    switch ($groupParent)
		{
			case 'Public' :
	    	$this->select("jformparent_id", "value=1");	   
				break;

			case 'Manager' :
	    	$this->select("jformparent_id", "value=6");	   
				break;

			case 'Administrator' :
	    	$this->select("jformparent_id", "value=7");	   
				break;

			case 'Super Users' :
	    	$this->select("jformparent_id", "value=8");	   
				break;

			case 'Registered' :
	    	$this->select("jformparent_id", "value=2");	   
				break;

			case 'Author' :
	    	$this->select("jformparent_id", "value=3");	   
				break;

			case 'Editor' :
	    	$this->select("jformparent_id", "value=4");	   
				break;
				
			case 'Publisher' :
	    	$this->select("jformparent_id", "value=5");	   
				break;

			default:
	    	$this->select("jformparent_id", "value=1");	   
				break;
		}    
	    $this->click("link=Save & Close");
	    $this->waitForPageToLoad("30000");
	    try {
	        $this->assertTrue($this->isTextPresent("Item successfully saved."));
	        echo "Creation of ".$groupName." succeeded.\n";
	    } catch (PHPUnit_Framework_AssertionFailedError $e) {
	        array_push($this->verificationErrors, $e->toString());
    	}
  	}

	function deleteGroup($partialName = 'test')
	{
		echo "Browse to User Manager: Groups.\n";
		$this->click("link=Groups");
	    $this->waitForPageToLoad("30000");
	    
	    echo "Filter on ".$partialName.".\n";
	    $this->type("filter_search", $partialName);
	    $this->click("//button[@type='submit']");
	    $this->waitForPageToLoad("30000");
	  
	    echo "Delete all users in view.\n";
	    $this->click("toggle");
	    echo("Delete new user.\n");    
//	    $this->click("//li[@id='toolbar-delete']/a");
    	$this->click("link=Trash");
	    $this->waitForPageToLoad("30000");
	    try {
	    	$this->assertTrue($this->isTextPresent("item(s) successfully deleted."));
	    	 echo "Deletion of group(s) containing ".$partialName." succeeded.\n";
	    } catch (PHPUnit_Framework_AssertionFailedError $e) {
	    	array_push($this->verificationErrors, $e->toString());
	    }
	}
	
	/**
	 * Tests for the presence of a Go button and clicks it if present.
	 * Used for the hathor accessible template when filtering on lists in back end.
	 *
	 * @since	1.6
	 */
	function clickGo() {
		if ($this->isElementPresent("filter-go")) {
			$this->click("filter-go");
		}
	}

}
