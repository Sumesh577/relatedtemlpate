<?php



/**

 * @package		JD Related Template

 * @author		JoomDev

 * @copyright	Copyright (C) 2018 Joomdev, Inc. All rights reserved.

 * @license    GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

 */

defined('_JEXEC') or die;



class modJdRetaltedtemplateHelper {



   function  getall($id,$templateCategory,$limit){

	   

	  // Get a db connection.

	  $db = JFactory::getDbo();



	  // Create a new query object.

	  $query = $db->getQuery(true);



  		// Check user is SuperAdmin.

	  $user = JFactory::getUser();

		

	  $tags_query="SELECT tags FROM `#__jdtemplates_template` where id=".$id."  and category_type = $templateCategory and access = 1   order by id desc";

	  $db->setQuery($tags_query);



	  $tags_result = $db->loadObjectList();

		if(!empty($tags_result)){

			if($user->get('isRoot')){

				foreach($tags_result as $tag){

					$query= "SELECT *  FROM `#__jdtemplates_template` WHERE tags in(".$tag->tags.") and category_type = ".$templateCategory." and access = 6 or access = 1  order by id desc limit ".$limit."";

				}

			}else{

				foreach($tags_result as $tag){

					$query= "SELECT *  FROM `#__jdtemplates_template` WHERE tags in(".$tag->tags.") and category_type = ".$templateCategory." and access = 1  order by id desc limit ".$limit."";

				}

			}

			$db->setQuery($query);


			$results = $db->loadObjectList();

		}

			

	

	

	if($results){

	   return $results;

	}else{

	   return false;

	}

	

	//echo "<pre>";

	// echo count($results);

	/// print_r($results);

   }



}