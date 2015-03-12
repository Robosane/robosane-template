<?php
/**
 * Robosan3 template for robosane.net
 *
 * @copyright   Copyright (C) Ben Klein
 * @license     GNU General Public License version 3 or later; see LICENSE.txt
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
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->getCfg('sitename');

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');
$doc->addScript('templates/' .$this->template. '/js/jquery.js');
$doc->addScript('templates/' .$this->template. '/js/template.js');
$doc->addScript('templates/' .$this->template. '/js/bootstrap.js');

// Add Stylesheets
$doc->addStyleSheet('templates/'.$this->template.'/css/bootstrap.css');
$doc->addStyleSheet('templates/'.$this->template.'/css/landing-page.css');

// Add current user information
$user = JFactory::getUser();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <jdoc:include type="head" />

    <!-- Custom Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <style>
    .intro-header {
        padding-top: 50px; /* If you're making other pages, make sure there is 50px of padding to make sure the navbar doesn't overlap content! */
        padding-bottom: 50px;
        text-align: center;
        color: #f8f8f8;
        background: url(<?php echo $this->params->get('headerBackground');?>) no-repeat center center; /* Get from setting `headerBackground` */
        background-size: cover;
    }
    .banner {
        padding: 100px 0;
        color: #f8f8f8;
        background: url(<?php echo $this->params->get('footerImage');?>) no-repeat center center; /* Get from setting `footerImage` */
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
                <div style="display:block; position: fixed;">
                <a href="<?php echo $this->baseurl; ?>">
<!-- Generated Site logo -->
                  <img src="<?php echo $this->params->get('siteLogo');?>" width="60px" height="auto"></img>
<!-- Maybe the href="/" should not be hard coded... -->
                </a>
                </div>
                <a class="topnav navbar-brand" style="padding-left: 80px; text-transform: lowercase;" href="<?php echo $this->baseurl; ?>">
<!-- Generated (Site Title) -->
<?php echo $this->params->get('sitename');?>
<!-- Twas only a string, nothing much -->
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<!-- Generated (Menu/Navigation position: "navigation") -->
<div class="subnav"><ul class="nav nav-pills menu"><li class="item-103 current active"><a href="/">News</a></li><li class="item-102 deeper dropdown parent"><a class="dropdown-toggle" data-toggle="dropdown" href="#">About Us <b class="caret"></b></a><ul class="dropdown-menu"><li class="item-225"><a href="/about-us/history">History</a></li><li class="item-226"><a href="/about-us/technology">Technology</a></li><li class="item-228"><a href="/about-us/about-us-sponsors">Sponsors</a></li><li class="item-323"><a href="/about-us/about-us-our-team">Our Team</a></li></ul></li><li class="item-145"><a href="/screens">Media</a></li><li class="item-143"><a href="/servers">Servers</a></li><li class="item-181"><a href="/kunena-2013-11-02">Forums</a></li></ul></div>
<!-- Not Generated -->
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <!-- Header -->
<?php if ($this->countModules('header')) : ?>
    <div class="intro-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
<!-- This should be a module position: `header` -->
                        <jdoc:include type="module" name="header" />
<!-- No longer under the demonizing control of Joomla -->
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="content-section-a">
  <div class="container">
    <div class="col-md-9">
<!-- Begin Joomla primary Article/News whatever kind of content. -->
      <jdoc:include type="modules" name="above-content" style="xhtml" />
      <jdoc:include type="message" />
      <jdoc:include type="component" />
      <jdoc:include type="modules" name="below-content" style="none" />
<!-- Not generated -->
    </div>
<?php if ($this->countModules('right-column')) : ?>
    <div class="col-md-3" style="left: 0px;">
<!-- Right column module position -->
      <jdoc:include type="modules" name="right-column" style="well" />
<!-- Close right column -->
    </div>
<?php endif; ?>
  </div>
</div>

<!-- Image background footer -->
<?php if ($this->countModules('footer-img')) : ?>
  <div class="banner">
    <div class="container">
      <div class="row">
<!-- Stuff Generated by Joomla for position `footer-image` -->
      <jdoc::include type="modules" name="footer-image" style="none" />
<!-- Again free from Joomla's oppressive grasp. -->
      </div>
    </div>
  </div>
<?php endif; ?>

<!-- Footer -->
    <footer>
        <div class="container">
<!-- And yet again trapped in position `footer` -->
            <jdoc:include type="modules" name="footer" style="none" />
<!-- Free, at last -->
        </div>
    </footer>
</body>
</html>
