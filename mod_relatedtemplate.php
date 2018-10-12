<?php
/**
 * @package		JD Related Template
 * @author		JoomDev
 * @copyright	Copyright (C) 2018 Joomdev, Inc. All rights reserved.
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

// No direct access

defined('_JEXEC') or die;

// Include the syndicate functions only once

require_once dirname(__FILE__) . '/helper.php';

$layout = $params->get('layout', 'default');

require JModuleHelper::getLayoutPath('mod_relatedtemplate', $layout);

