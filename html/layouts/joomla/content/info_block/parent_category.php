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
                        <dd class="parent-category-name">
                                <?php $title = $this->escape($displayData['item']->parent_title);
                                $url = '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($displayData['item']->parent_slug)).'">'.$title.'</a>';?>
                                <?php if ($displayData['params']->get('link_parent_category') && !empty($displayData['item']->parent_slug)) : ?>
                                        <?php echo JText::sprintf('COM_CONTENT_PARENT', $url); ?>
                                <?php else : ?>
                                        <?php echo JText::sprintf('COM_CONTENT_PARENT', $title); ?>
                                <?php endif; ?>
                        </dd>
