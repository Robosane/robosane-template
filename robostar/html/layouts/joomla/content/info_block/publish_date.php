<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.robostar
 *
 * @copyright   Copyright (C) Ben Klein
 * @license     GNU General Public License version 3 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;
?>
                        <dd class="published">
                                <span class="icon-calendar"></span> <?php echo JText::sprintf('COM_CONTENT_PUBLISHED_DATE_ON', JHtml::_('date', $displayData['item']->publish_up, JText::_('DATE_FORMAT_LC3'))); ?>
                        </dd>
