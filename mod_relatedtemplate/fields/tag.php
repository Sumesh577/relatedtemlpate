<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

JFormHelper::loadFieldClass('list');

class JFormFieldTag extends JFormFieldList {

	protected $type = 'tag';

	public function getOptions() {
                $app = JFactory::getApplication();
                $db = JFactory::getDbo();
                $query = $db->getQuery(true);
                $query->select('a.id')->from('`#__categories` AS a');
			    $rows = $db->setQuery($query)->loadObjectlist();
                foreach($rows as $row){
                    $tag[] = $row->id;
                }
                // Merge any additional options in the XML definition.
		$options = array_merge(parent::getOptions(), $tag);
                return $options;
	}
}