<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.robosane
 *
 * @copyright   Copyright (C) Ben Klein, Robosane
 * @license     Mozilla Public License Version 2.0
 */

defined('_JEXEC') or die;

// Getting params from template
$params = JFactory::getApplication()->getTemplate(true)->params;

$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$this->language = $doc->language;
$this->direction = $doc->direction;

$menu = $app->getMenu();
$lang = JFactory::getLanguage();

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->getCfg('sitename');

// Add Stylesheets
$doc->addStyleSheet($this->baseurl .'templates/' .$this->template .'/css/bootstrap.min.css');
$doc->addStyleSheet($this->baseurl .'templates/' .$this->template .'/css/robosane-ed24.css');

// Add current user information
$user = JFactory::getUser();

// Add JavaScript Frameworks
JHtml::_('jquery.framework');
//$doc->addScript('templates/' .$this->template. '/js/jquery.js');
JHtml::_('bootstrap.framework');
//$doc->addScript('templates/' .$this->template. '/js/bootstrap.js');
$doc->addScript($this->baseurl .'templates/' .$this->template .'/js/template.js');

if ($this->countModules('position-column-right')) {
  $span = "col-md-9";
} elseif (!$this->countModules('position-column-right')) {
  $span = "col-md-12";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <jdoc:include type="head" />

    <!-- CSS for changing header background -->
    <style>
    #intro-header {
        padding-top: 50px; /* If you're making other pages, make sure there is 50px of padding to make sure the navbar doesn't overlap content! */
        padding-bottom: 50px;
        text-align: center;
        color: #f8f8f8;
        background: url(/<?php echo $this->params->get('headerBackground');?>) no-repeat center center; /* Get from setting `headerBackground` */
        background-size: cover;
    }
    .banner {
        padding: 100px 0;
        color: #f8f8f8;
        background: url(/<?php echo $this->params->get('footerImage');?>) no-repeat center center; /* Get from setting `footerImage` */
        background-size: cover;
    }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div style="display:block; position: fixed;z-index: 1;">
                <a href="<?php echo $this->baseurl; ?>">
                  <!-- Generated Site logo -->
                  <img src="<?php echo $this->params->get('siteLogo');?>" width="60px" height="auto"></img>
                </a>
                </div>
                <a class="topnav navbar-brand" style="padding-left: 80px;" href="<?php echo $this->baseurl; ?>">
                  <?php echo $this->params->get('sitename');?>
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <!-- Generated (Menu/Navigation position) -->
              <jdoc:include type="modules" name="position-topnav" style="none" />
              <!-- Not Generated -->
            </div>
        </div>
    </nav>

<!-- Image Header -->
<?php if ($this->countModules('position-splash-intro')) : ?>
  <div class="intro-header" id="intro-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="intro-message">
<!-- This should be a module position -->
            <jdoc:include type="modules" name="position-splash-intro" style="none" />
<!-- Done with splash include. -->
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>

<div class="content-section-a">
  <div class="container">
    <div class="<?php echo $span;?>">
<!-- Begin Joomla primary Article/News whatever kind of content. -->
      <jdoc:include type="modules" name="position-content-before" style="xhtml" />
      <jdoc:include type="message" />
      <jdoc:include type="component" />
      <jdoc:include type="modules" name="position-content-breadcrumbs" style="none" />
<!-- Not generated -->
    </div>
<?php if ($this->countModules('position-column-right')) : ?>
    <div class="col-md-3" style="left: 0px;">
<!-- Right column module position -->
      <jdoc:include type="modules" name="position-column-right" style="well" />
<!-- Close right column -->
    </div>
<?php endif; ?>
  </div>
</div>

<!-- Image background footer -->
<?php if ($this->countModules('position-splash-footer')) : ?>
  <div class="banner">
    <div class="container">
      <div class="row">
<!-- Stuff Generated by Joomla for position -->
        <jdoc:include type="modules" name="position-splash-footer" style="none" />
<!-- Generated. -->
      </div>
    </div>
  </div>
<?php endif; ?>

<!-- Footer -->
<?php if ($this->countModules('footer')) : ?>
  <footer>
      <div class="container">
<!-- And yet again trapped in position `footer` -->
        <jdoc:include type="modules" name="footer" style="none" />
<!-- Free, at last -->
      </div>
  </footer>
<?php endif; ?>

<!-- Goodbye World -->
</body>
</html>
