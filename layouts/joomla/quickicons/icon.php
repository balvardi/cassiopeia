<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

use Joomla\CMS\Language\Text;

$id      = empty($displayData['id']) ? '' : (' id="' . $displayData['id'] . '"');
$target  = empty($displayData['target']) ? '' : (' target="' . $displayData['target'] . '"');
$onclick = empty($displayData['onclick']) ? '' : (' onclick="' . $displayData['onclick'] . '"');
$size    = isset($displayData['amount']) ? 'small' : 'big';
$dataUrl = isset($displayData['ajaxurl']) ? 'data-url="' . $displayData['ajaxurl'] . '"' : '';

// The title for the link (a11y)
$title = empty($displayData['title']) ? '' : (' title="' . $this->escape($displayData['title']) . '"');

// The information
$text = empty($displayData['text']) ? '' : ('<span class="j-links-link">' . $displayData['text'] . '</span>');

$class = empty($displayData['class']) ? '' : (' class ="' . $this->escape($displayData['class']) . '"');

if (isset($displayData['name']))
{
	$add  = Text::plural($displayData['name'], 1);
	$name = Text::plural($displayData['name'], 2);
}
else
{
	$add  = '';
	$name = '';
}
?>

<li class="quickicon col mb-3 d-flex <?php echo !empty($displayData['linkadd']) ? 'flex-column' : ''; ?>">
    <a <?php echo $class; ?> href="<?php echo $displayData['link']; ?>"<?php echo $target . $onclick . $title; ?>>
		<?php if (isset($displayData['image'])): ?>
            <div class="quickicon-icon d-flex align-items-end <?php echo $size ?>">
                <div class="<?php echo $displayData['image']; ?>" aria-hidden="true"></div>
            </div>
		<?php endif; ?>
        <div class="quickicon-amount" <?php echo $dataUrl ?>>
			<?php if (isset($displayData['ajaxurl'])): ?>
                <span class="fa fa-spinner"></span>
			<?php elseif (isset($displayData['amount'])): ?>
				<?php echo $displayData['amount']; ?>
			<?php endif; ?>
        </div>
		<?php // Name indicates the component
		if (isset($displayData['name'])): ?>
            <div class="quickicon-name d-flex align-items-end"
                 data-name-singular="<?php echo $add ?>"
                 data-name-plural="<?php echo $name ?>">
				<?php echo htmlspecialchars($name); ?>
            </div>
		<?php endif; ?>
		<?php // Information or action from plugins
		if (isset($displayData['text'])): ?>
            <div class="quickicon-text d-flex align-items-center">
				<?php echo $text; ?>
            </div>
		<?php endif; ?>
    </a>
	<?php // Add the link to the edit-form
	if (!empty($displayData['linkadd'])): ?>
        <a class="btn-block text-center quickicon-linkadd j-links-link"
           href="<?php echo $displayData['linkadd']; ?>">
            <span class="fa fa-plus mr-2" aria-hidden="true"></span>
            <span class="sr-only"><?php echo Text::sprintf('MOD_QUICKICON_ADD_NEW', $add); ?></span>
            <span aria-hidden="true"><?php echo $add; ?></span>
        </a>
	<?php endif; ?>
</li>

