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
                        <dd class="category-name">
                                <?php $title = $this->escape($displayData['item']->category_title);
                                $url = '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($displayData['item']->catslug)).'">'.$title.'</a>';?>
                                <?php if ($displayData['params']->get('link_category') && $displayData['item']->catslug) : ?>
                                        <?php echo JText::sprintf('COM_CONTENT_CATEGORY', $url); ?>
                                <?php else : ?>
                                        <?php echo JText::sprintf('COM_CONTENT_CATEGORY', $title); ?>
                                <?php endif; ?>
                        </dd>
