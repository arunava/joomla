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

jimport('joomla.application.component.view');

/**
 * HTML View class for the Projects component
 *
 * @package		Joomla.Site
 * @subpackage	com_projects
 * @since		1.6
 */
class ProjectsViewPortfolios extends JView
{
	protected $items;
	protected $portfolio;
	protected $state;
	protected $params;
	protected $pagination;
	protected $canDo;
	protected $user;
	
	/**
	 * Display View
	 * @param $tpl
	 */
	function display($tpl = null)
	{
		$app		= JFactory::getApplication();
		$model 		= $this->getModel('Portfolios');
		$bc 		= $app->getPathway();
			
		// Get some data from the models
		$this->state		= $this->get('State');
		$this->items		= $model->getItems();
		$this->pagination	= $model->getPagination();
		$this->params		= $app->getParams();
		$this->user 		= JFactory::getUser();
		$this->portfolio	= $model->getParent();
		$this->canDo		= ProjectsHelper::getActions(
			$app->getUserState('portfolio.id'), 
			$app->getUserState('project.id'),
			$this->portfolio);
		
		$this->params->set('is.root', ($this->portfolio->level == 0));	
			
		$c = count($this->items);
		for($i = 0; $i < $c;$i++) {
				$this->items[$i]->description = JHtml::_('content.prepare', $this->items[$i]->description);
		}

		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
			return JError::raiseError(500, implode("\n", $errors));
		}
		
		// Display
		$this->loadLinks();
		$this->addToolbar();
		parent::display($tpl);
	}
	

	protected function loadLinks()
	{
		$this->links = array(
			'project' => 'index.php?option=com_projects&view=project&id=',
			'projects' => 'index.php?option=com_projects&view=projects&id=',
			'portfolios' => 'index.php?option=com_projects&view=portfolios&id='
		);
	}
	
	public function getLink($key, $append=''){
		return JRoute::_($this->links[$key].$append);
	}
	
	protected function addToolbar() 
	{
		$this->loadHelper('toolbar');
		
		if($this->canDo->get('core.create')){
			//ToolBar::addNew('portfolio.add');
		}
		
		if(!$this->params->get('is.root')){
			$title = $this->portfolio->get('title');
			
		}else {
			$title = JText::_('COM_PROJECTS_PORTFOLIOS_VIEW_DEFAULT_TITLE');
		}
		ToolBar::title($title, 'categories');
		ToolBar::back();
		
		$app = JFactory::getApplication();
		$bc = $app->getPathway();
		$bc->addItem($title, $this->getLink('portfolios', $this->portfolio->id));
		
		echo ToolBar::render();
	}
}