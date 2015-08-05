<?php
/**
 * Terebinth Component
 *
 * Copyright (c) 2013 Nicholas Wheeler
 *
 * @license GNU / GPL 
 *   
**/


// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * Terebinthes View
 */
class TerebinthViewTerebinthes extends JView
{
	/**
	 * Terebinthes view display method
	 * @return void
	 */
	function display($tpl = null) 
	{
		// Get data from the model
		$items = $this->get('Items');
		$pagination = $this->get('Pagination');

    // ACL support
    $this->canDo = Terebinth::getActions();

		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		// Assign data to the view
		$this->items = $items;
		$this->pagination = $pagination;


		// Set the toolbar
		$this->addToolBar();

		// Display the template
		parent::display($tpl);

		// Set the document
		$this->setDocument();
	}

	/**
	 * Setting the toolbar
	 */
	protected function addToolBar() 
	{
		JToolBarHelper::title(JText::_('COM_TEREBINTH_MANAGER_TEREBINTHES'), 'terebinth');
    if ($this->canDo->get('core.delete'))
    {
		  JToolBarHelper::deleteList('', 'terebinthes.delete', 'JTOOLBAR_DELETE');
    }
    if ($this->canDo->get('core.edit'))
    {
    	JToolBarHelper::editListX('terebinth.edit');
    }
    if ($this->canDo->get('core.create'))
    {
		  JToolBarHelper::addNewX('terebinth.add');
    }
    if ($this->canDo->get('core.admin'))
    {
      JToolBarHelper::divider();
      JToolBarHelper::preferences('com_terebinth');
    }
	}
	/**
	 * Method to set up the document properties
	 *
	 * @return void
	 */
	protected function setDocument() 
	{
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('COM_TEREBINTH_ADMINISTRATION'));
	}
}
