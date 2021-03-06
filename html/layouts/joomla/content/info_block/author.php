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
                        <dd class="createdby">
                                <?php $author = $displayData['item']->author; ?>
                                <?php $author = ($displayData['item']->created_by_alias ? $displayData['item']->created_by_alias : $author); ?>
                                <?php if (!empty($displayData['item']->contactid ) && $displayData['params']->get('link_author') == true) : ?>
                                        <?php
                                        echo JText::sprintf('COM_CONTENT_WRITTEN_BY',
                                                JHtml::_('link', JRoute::_('index.php?option=com_contact&view=contact&id='.$displayData['item']->contactid), $author)
                                        ); ?>
                                <?php else :?>
                                        <?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', $author); ?>
                                <?php endif; ?>
                        </dd>
