<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.robosane
 *
 * @copyright   Copyright (C) Ben Klein, Robosane
 * @license     Mozilla Public License Version 2.0
 */

defined('_JEXEC') or die;

$app   = JFactory::getApplication();
$doc   = JFactory::getDocument();
$this->language = $doc->language;
$this->direction = $doc->direction;

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');

// Add Stylesheets
$doc->addStyleSheet('templates/'.$this->template.'/css/template.css');

// Load optional rtl Bootstrap css and Bootstrap bugfixes
JHtmlBootstrap::loadCss($includeMaincss = false, $this->direction);

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
<jdoc:include type="head" />
</head>
<body class="contentpane modal">
        <jdoc:include type="message" />
        <jdoc:include type="component" />
</body>
</html>
