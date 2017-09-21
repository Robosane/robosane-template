<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.robosane
 *
 * @copyright   Copyright (C) Ben Klein, Robosane
 * @license     Mozilla Public License Version 2.0
 */

defined('JPATH_BASE') or die;

$items = $displayData;

if (!empty($items)) : ?>
        <ul class="item-associations">
                <?php foreach ($items as $id => $item) : ?>
                                <li>
                                        <?php echo $item->link; ?>
                                </li>
                <?php endforeach; ?>
        </ul>
<?php endif;
