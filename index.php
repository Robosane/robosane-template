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
$doc->addStyleSheet('templates/'.$this->template.'/css/bootstrap.css');
$doc->addStyleSheet('templates/'.$this->template.'/css/robosane.css');

// Add current user information
$user = JFactory::getUser();

// Add JavaScript Frameworks
JHtml::_('jquery.framework');
//$doc->addScript('templates/' .$this->template. '/js/jquery.js');
JHtml::_('bootstrap.framework');
//$doc->addScript('templates/' .$this->template. '/js/bootstrap.js');
$doc->addScript('templates/' .$this->template. '/js/template.js');

if ($this->countModules('position-7')) {
  $span = "col-md-9";
} elseif (!$this->countModules('position-7')) {
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
    <?php // Twitter cards!
    if ( $this->params->get('twittercards') == "1" ) {
      if ($menu->getActive() == $menu->getDefault($lang->getTag())) {
	      //echo 'This is the front page';
        echo '<meta name="twitter:card" content="summary" />';
        echo '<meta name="twitter:site" content="' . $this->params->get('twitter_sitename') . '" />';
        echo '<meta name="twitter:title" content="' . $this->params->get('twitter_default-title') . '" />';
        echo '<meta name="twitter:description" content="' . $this->params->get('twitter_default-desc') . '" />';
        echo '<meta name="twitter:image" content="' . $this->params->get('twitter_default-img') . '" />';
      }
      else {
        //echo 'This is not the front page';
      	echo '<meta name="twitter:card" content="summary" />';
        echo '<meta name="twitter:site" content="' . $this->params->get('twitter_sitename') . '" />';
        try {
          $input = JFactory::getApplication()->input;
          $id = $input->getInt('id'); //get the article ID
          $article = JTable::getInstance('content');
          $article->load($id);

          echo '<meta name="twitter:title" content="' . $article->get('title') . '" />'; // display the article title
          echo '<meta name="twitter:description" content="' . str_replace(array('\'', '"'), '', strip_tags($article->get('introtext'))) . '" />'; // also 'fulltext' might work
        } catch (Exception $e) {
          echo '<meta name="twitter:title" content="' . $this->params->get('twitter_default-title') . '" />';
          echo '<meta name="twitter:description" content="' . $this->params->get('twitter_default-desc') . '" />';
        }
      }
    } // end twitter cards
    ?>

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
                <div style="display:block; position: fixed;">
                <a href="<?php echo $this->baseurl; ?>">
                  <!-- Generated Site logo -->
                  <img src="<?php echo $this->params->get('siteLogo');?>" width="60px" height="auto"></img>
                </a>
                </div>
                <a class="topnav navbar-brand" style="padding-left: 80px; text-transform: lowercase;" href="<?php echo $this->baseurl; ?>">
                  <?php echo $this->params->get('sitename');?>
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <!-- Generated (Menu/Navigation position: "navigation") -->
              <jdoc:include type="modules" name="position-1" style="none" />
              <!-- Not Generated -->
            </div>
        </div>
    </nav>

<!-- Image Header -->
<?php if ($this->countModules('position-0')) : ?>
  <div class="intro-header" id="intro-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="intro-message">
<!-- This should be a module position: `header` -->
            <jdoc:include type="modules" name="position-0" style="none" />
<!-- No longer under the demonizing control of Joomla -->
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
      <jdoc:include type="modules" name="position-3" style="xhtml" />
      <jdoc:include type="message" />
      <jdoc:include type="component" />
      <jdoc:include type="modules" name="position-2" style="none" />
<!-- Not generated -->
    </div>
<?php if ($this->countModules('position-7')) : ?>
    <div class="col-md-3" style="left: 0px;">
<!-- Right column module position -->
      <jdoc:include type="modules" name="position-7" style="well" />
<!-- Close right column -->
    </div>
<?php endif; ?>
  </div>
</div>

<!-- Image background footer -->
<?php if ($this->countModules('position-15')) : ?>
  <div class="banner">
    <div class="container">
      <div class="row">
<!-- Stuff Generated by Joomla for position `footer-image` -->
        <jdoc:include type="modules" name="position-15" style="none" />
<!-- Again free from Joomla's oppressive grasp. -->
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
