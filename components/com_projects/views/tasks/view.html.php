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
class ProjectsViewTasks extends JView {

    protected $items;
    protected $project;
    protected $state;
    protected $maxLevel;
    protected $params;
    protected $pagination;
    protected $canDo;
    protected $type;

    /**
     * Display View
     * @param $tpl
     */
    function display($tpl = null) {
        $app = JFactory::getApplication();
        $model = $this->getModel();
	
        // Get some data from the models
        $this->items = $model->getItems();
        $this->state = $this->get('State');
        $this->project = $model->getProject();
        $this->type = $model->getType();
        $this->pagination = $model->getPagination();
        $this->params = $app->getParams();
        $this->canDo = ProjectsHelperACL::getActions(
                        $app->getUserState('portfolio.id'),
                        $app->getUserState('project.id'),
                        $this->project);

        $layout = $this->getLayout();
        switch ($layout) {
            default:
                $layout = 'default';
                
                // Access
                if (!$this->canDo->get($this->type.'.view') && !$this->params->get('show_'.$this->type.'s')) {
                    return JError::raiseError(403, JText::_('JERROR_ALERTNOAUTHOR'));
                }
                
                // Get project
                if (empty($this->project)) {
                    return JError::raiseError(404, JText::_('JERROR_LAYOUT_REQUESTED_RESOURCE_WAS_NOT_FOUND'));
                }
                break;
        }
		$this->setLayout($layout);
		
        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            return JError::raiseError(500, implode("\n", $errors));
        }

        // add 'home page' of our component breadcrumb
        $bc = $app->getPathway();
        $bc->addItem($this->project->title, 'index.php?option=com_projects&view=project&id=' . $this->project->id);
        $bc->addItem(JText::_('COM_PROJECTS_TASKS'));
 

        // TMLP
        $this->addToolbar();
        parent::display($tpl);
    }

    protected function addToolbar() {
        $this->loadHelper('toolbar');
        
        switch ($this->state->get('type')) {
            case 3:
                $icon = 'archive';
        		if ($this->canDo->get('ticket.edit')) {
                    ToolBar::custom('tasks.publish', 'publish', 'apply', JText::_('COM_PROJECTS_STATE_APPROVED'));
                    ToolBar::custom('tasks.unpublish', 'unpublish', 'unpublish', JText::_('COM_PROJECTS_STATE_DENIED'));
                    ToolBar::spacer();
                }
                break;

            	
            case 1:    	
            case 2:
            default:	
                $icon = 'archive';
                if ($this->canDo->get('task.edit')) {
                    ToolBar::custom('tasks.archive', 'checkin', 'checkin', JText::_('COM_PROJECTS_STATE_FINISHED'));
                    ToolBar::custom('tasks.publish', 'notice', 'notice', JText::_('COM_PROJECTS_STATE_PENDING'));
                    ToolBar::spacer();
                }
                break;
        }

        if ($this->canDo->get($this->type . '.create')) {
            ToolBar::addNew('task.add');
        }
        if ($this->canDo->get($this->type . '.edit')) {
            ToolBar::editList('task.edit');
        }
        if ($this->canDo->get($this->type . '.delete')) {
            ToolBar::deleteList('COM_PROJECTS_CONFIRM_'.$this->type.'S_DELETE', 'tasks.delete');
        }
        
        $title = JText::sprintf('COM_PROJECTS_TASKS_LIST_'.$this->type.'S_TITLE', $this->project->title);
        ToolBar::title($title, $icon);
        if ($this->params->get('show_back_button')) {
            ToolBar::spacer();
            ToolBar::back(ProjectsHelper::getLink('project', $this->project->id));
        }
        
        echo ToolBar::render();
    }

    
    /**
     * Method to get the link from a number of type of an item
     * @param $type Number of the type of an item
     * @param $add String to add to the URI
     * 
     * @return URI for the item
     */
    public function getTypeLink($type, $add=''){
    	return $type == 3 ? ProjectsHelper::getLink('ticket', $add) :
    					ProjectsHelper::getLink('task', $add);
    }
}
