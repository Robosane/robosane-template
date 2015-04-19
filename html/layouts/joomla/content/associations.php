<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.robostar
 *
 * @copyright   Copyright (C) Ben Klein
 * @license     GNU General Public License version 3 or later; see LICENSE.txt
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
