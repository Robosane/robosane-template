<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.robosane
 *
 * @copyright   Copyright (C) Ben Klein, Robosane
 * @license     Mozilla Public License Version 2.0
 */

defined('JPATH_BASE') or die;

?>
                        <dd class="create">
                                        <span class="icon-calendar"></span>
                                        <?php echo JText::sprintf('COM_CONTENT_CREATED_DATE_ON', JHtml::_('date', $displayData['item']->created, JText::_('DATE_FORMAT_LC3'))); ?>
                        </dd>
