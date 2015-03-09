<?php
/**
 * Robosan3 Template by Ben Klein
 * Mockup template and style choices influenced by designer Preston Gull
 *
 * @copyright   Copyright (C) Ben Klein
 * @license     All rights reserved. (For now.)
 */

defined('_JEXEC') or die;

// Getting params from template
$params = JFactory::getApplication()->getTemplate(true)->params;

$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$this->language = $doc->language;
$this->direction = $doc->direction;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->getCfg('sitename');

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');
$doc->addScript('templates/' .$this->template. '/js/template.js');

// Add Stylesheets
$doc->addStyleSheet('templates/'.$this->template.'/css/main.css');

// Load optional RTL Bootstrap CSS
JHtml::_('bootstrap.loadCss', false, $this->direction);

// Add current user information
$user = JFactory::getUser();

// Adjusting content width
if ($this->countModules('position-7') && $this->countModules('position-8'))
{
        $span = "span6";
}
elseif ($this->countModules('position-7') && !$this->countModules('position-8'))
{
        $span = "span9";
}
elseif (!$this->countModules('position-7') && $this->countModules('position-8'))
{
        $span = "span9";
}
else
{
        $span = "span12";
}

// Logo file or site title param
if ($this->params->get('logoFile'))
{
        $logo = '<img src="'. JUri::root() . $this->params->get('logoFile') .'" alt="'. $sitename .'" />';
}
elseif ($this->params->get('sitetitle'))
{
        $logo = '<span class="site-title" title="'. $sitename .'">'. htmlspecialchars($this->params->get('sitetitle')) .'</span>';
}
else
{
        $logo = '<span class="site-title" title="'. $sitename .'">'. $sitename .'</span>';
}
?>

<DOCTYPE html>
<html  xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

</head>
<body class="site">





</body>
</html>
