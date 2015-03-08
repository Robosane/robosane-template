<?php
/**
 * RoboStar Template by Ben Klein
 * Template based from Protostar
 *
 * @copyright   Copyright (C) Ben Klein
 * @license     GNU General Public License version 3 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$class = ' class="first"';
JHtml::_('bootstrap.tooltip');

$item = $displayData->item;
$items = $displayData->get('items');
$params = $displayData->params;
$extension = $displayData->get('extension');
$className = substr($extension, 4);
// This will work for the core components but not necessarily for other components
// that may have different pluralisation rules.
if (substr($className, -1) == 's')
{
        $className = rtrim($className, 's');
}
