<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.robosane
 *
 * @copyright   Copyright (C) Ben Klein, Robosane
 * @license     Mozilla Public License Version 2.0
 */

defined('JPATH_BASE') or die;

JLoader::register('TagsHelperRoute', JPATH_BASE . '/components/com_tags/helpers/route.php');

?>
<?php if (!empty($displayData)) : ?>
        <div class="tags">
                <?php foreach ($displayData as $i => $tag) : ?>
                        <?php if (in_array($tag->access, JAccess::getAuthorisedViewLevels(JFactory::getUser()->get('id')))) : ?>
                                <?php $tagParams = new JRegistry($tag->params); ?>
                                <?php $link_class = $tagParams->get('tag_link_class', 'label label-info'); ?>
                                <span class="tag-<?php echo $tag->tag_id; ?> tag-list<?php echo $i ?>">
                                        <a href="<?php echo JRoute::_(TagsHelperRoute::getTagRoute($tag->tag_id . '-' . $tag->alias)) ?>" class="<?php echo $link_class; ?>">
                                                <?php echo $this->escape($tag->title); ?>
                                        </a>
                                </span>&nbsp;
                        <?php endif; ?>
                <?php endforeach; ?>
        </div>
<?php endif; ?>
