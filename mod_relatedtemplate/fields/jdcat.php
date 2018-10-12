<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

JFormHelper::loadFieldClass('list');

class JFormFieldJdcat extends JFormFieldList {

	protected $type = 'jdcat';

	public function getOptions() {
                $app = JFactory::getApplication();
                $db = JFactory::getDbo();
                $query = $db->getQuery(true);
                $query->select('title,extension')->from('`#__categories`');
                $query->where($db->quoteName('extension')." = ".$db->quote("com_jdtemplates"));
			    $rows = $db->setQuery($query)->loadObjectlist();
				
				foreach($rows as $row){
                    $tag[] = $row->title;
                }
                // Merge any additional options in the XML definition.
		$options = array_merge(parent::getOptions(), $tag);
                return $options;
				
	}
}