<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.robosane
 *
 * @copyright   Copyright (C) Ben Klein, Robosane
 * @license     Mozilla Public License Version 2.0
 */

defined('_JEXEC') or die;

?>
<div class="categories-list<?php echo $displayData->pageclass_sfx;?>">
<?php if ($displayData->params->get('show_page_heading')) : ?>
<h1>
        <?php echo $displayData->escape($displayData->params->get('page_heading')); ?>
</h1>
<?php endif; ?>

<?php if ($displayData->params->get('show_base_description')) : ?>
        <?php //If there is a description in the menu parameters use that; ?>
                <?php if($displayData->params->get('categories_description')) : ?>
                        <div class="category-desc base-desc">
                        <?php echo JHtml::_('content.prepare', $displayData->params->get('categories_description'), '',  $displayData->get('extension') . '.categories'); ?>
                        </div>
                <?php else : ?>
                        <?php //Otherwise get one from the database if it exists. ?>
                        <?php  if ($displayData->parent->description) : ?>
                                <div class="category-desc base-desc">
                                        <?php echo JHtml::_('content.prepare', $displayData->parent->description, '', $displayData->parent->extension . '.categories'); ?>
                                </div>
                        <?php endif; ?>
                <?php endif; ?>
        <?php endif; ?>
