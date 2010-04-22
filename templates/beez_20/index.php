<?php
/**
 * @author      Angie Radtke <a.radtke@derauftritt.de>
 * @copyright   Copyright (C) 2005 - 2008 Open Source Matters. All rights reserved.
 * @license     GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

defined('_JEXEC') or die('Restricted access');

// check modules
$showRightColumn = ($this->countModules('position-3') or $this->countModules('position-6') or   $this->countModules('position-8'));
$showbottom=($this->countModules('position-9') or  $this->countModules('position-10') or   $this->countModules('position-11'));
$showleft=($this->countModules('position-4') or   $this->countModules('position-7') or $this->countModules('position-5'));


 if ($showRightColumn==0 and $showleft==0)
 {
         $showno=0;


 }

JHTML::_( 'behavior.mootools' );

// get params
$color = $this->params->get('templatecolor');
$logo =  $this->params->get('logo');
$navposition=$this->params->get('navposition');
$app = JFactory::getApplication();
$templateparams =$app->getTemplate(true)->params;
?>

<?php
// // load language file
$lang =& JFactory::getLanguage();
$lang->load('tpl_beez', JPATH_SITE); ?>

<?php if(!$templateparams->get('html5', 0)): ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php else: ?>
<!DOCTYPE html>
<?php endif; ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
        <jdoc:include type="head" />
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/beez_20/css/template.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/beez_20/css/position.css" type="text/css" media="screen,projection" />
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/beez_20/css/layout.css" type="text/css" media="screen,projection" />
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/beez_20/css/print.css" type="text/css" media="Print" />
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/beez_20/css/general.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/beez_20/css/<?php echo $color; ?>.css" type="text/css" />
        <?php if($this->direction == 'rtl') : ?>
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/beez_20/css/template_rtl.css" type="text/css" />
        <?php endif; ?>
        <!--[if lte IE 6]>
                <link href="<?php echo $this->baseurl ?>/templates/beez_20/css/ieonly.css" rel="stylesheet" type="text/css" />
        <![endif]-->
        <!--[if IE 7]>
                <link href="<?php echo $this->baseurl ?>/templates/beez_20/css/ie7only.css" rel="stylesheet" type="text/css" />
        <![endif]-->
        <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/beez_20/javascript/md_stylechanger.js"></script>
        <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/beez_20/javascript/hide.js"></script>
        <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/beez_20/javascript/html5.js"></script>


        <script type="text/javascript">

//       read params.ini

        var big ='<?php echo $this->params->get('wrapperLarge');?>%';
        var small='<?php echo $this->params->get('wrapperSmall'); ?>%';
        var altopen='<?php echo JText::_('ALTOPEN'); ?>';
        var altclose='<?php echo JText::_('ALTCLOSE'); ?>';
        var bildauf='<?php echo $this->baseurl ?>/templates/beez_20/images/plus.png';
        var bildzu='<?php echo $this->baseurl ?>/templates/beez_20/images/minus.png';
        var rightopen='<?php echo JText::_('TEXTRIGHTOPEN'); ?>';
        var rightclose='<?php echo JText::_('TEXTRIGHTCLOSE'); ?>';
        </script>

</head>

<body>
<div id="all">
        <div id="back">
                <?php if(!$templateparams->get('html5', 0)): ?>
                        <div id="header">
                <?php else: ?>
                        <header id="header">
                <?php endif; ?>
                                <div class="logoheader">
                                        <h1 id="logo">Beez 2.0
                                        <?php if ($logo != '-1' ): ?>
                                                <img src="<?php echo $this->baseurl ?>/images/<?php echo $logo; ?>"  alt="<?php echo JText::_('Logo Beez'); ?>" />
                                        <?php endif;?>
                                                <span class="header1"><?php echo JText::_('YOUR SITE DESCRIPTION'); ?></span>
                                        </h1>
                                </div><!-- end logoheader -->

                          <ul class="skiplinks">
                                        <li><a href="#main" class="u2"><?php echo JText::_('SKIP TO CONTENT'); ?></a></li>
                                        <li><a href="#nav" class="u2"><?php echo JText::_('JUMP TO MAIN NAVIGATION AND LOGIN'); ?></a></li>
                                       <?php if($showRightColumn ):?>
                                       <li><a href="#additional" class="u2"><?php echo JText::_('JUMP TO ADDITIONAL INFORMATION'); ?></a></li>
                                       <?php endif; ?>
                                </ul>
                                <h2 class="unseen">
                                        <?php echo JText::_('NAV_VIEW_SEARCH'); ?>
                                </h2>
                                <h3 class="unseen"><?php echo JText::_('NAVIGATION'); ?></h3>
                                        <jdoc:include type="modules" name="position-1" />
                                <div id="line">
                                        <div id="fontsize">
                                                <script type="text/javascript">
                                                //<![CDATA[
                                                document.write('<h3><?php echo JText::_('FONTSIZE:'); ?></h3><p class="fontsize">');
                                                document.write('<a href="index.php" title="<?php echo JText::_('INCREASE SIZE'); ?>" onclick="changeFontSize(2); return false;" class="larger"><?php echo JText::_('bigger'); ?></a><span class="unseen">&nbsp;</span>');
                                                document.write('<a href="index.php" title="<?php echo JText::_('REVERT STYLES TO DEFAULT'); ?>" onclick="revertStyles(); return false;" class="reset"><?php echo JText::_('reset'); ?></a> ');
                                                document.write('<a href="index.php" title="<?php echo JText::_('DECREASE SIZE'); ?>" onclick="changeFontSize(-2); return false;" class="smaller"><?php echo JText::_('smaller'); ?></a><span class="unseen">&nbsp;</span></p>');
                                                //]]>
                                                </script>
                                        </div>
                                        <h3 class="unseen"><?php echo JText::_('SEARCH'); ?></h3>
                                                <jdoc:include type="modules" name="searchload" />
                                </div>

                <?php if(!$templateparams->get('html5', 0)): ?>
                        </div><!-- end header -->
                <?php else: ?>
                        </header><!-- end header -->
                <?php endif; ?>


                        <div id="<?php echo $showRightColumn ? 'contentarea2' : 'contentarea'; ?>">
                                        <div id="breadcrumbs">
                                                <p>
                                                        <?php echo JText::_('YOU ARE HERE:'); ?>
                                                        <jdoc:include type="modules" name="position-2" />
                                                </p>
                                        </div>


                                <?php if($navposition=='left' AND $showleft) : ?>
                                        <?php if(!$this->params->get('html5', 0)): ?>
                                                <div class="left1 <?php if ($showRightColumn==NULL){ echo 'leftbigger';} ?>" id="nav">
                                        <?php else: ?>
                                                <nav class="left1 <?php if ($showRightColumn==NULL){ echo 'leftbigger';} ?>" id="nav">
                                        <?php endif; ?>
                                                                        <jdoc:include type="modules" name="position-7" style="beezDivision" headerLevel="3" />

                                                        <jdoc:include type="modules" name="position-4" style="beezHide" headerLevel="3" state="0 " />
                                                        <jdoc:include type="modules" name="position-5" style="beezTabs" headerLevel="2"  id="3" />

                                        <?php if(!$this->params->get('html5', 0)): ?>
                                                </div><!-- end navi -->
                                        <?php else: ?>
                                                </nav>
                                        <?php endif; ?>
                                        <?php endif; ?>

                                <div id="<?php echo $showRightColumn ? 'wrapper' : 'wrapper2'; ?>" <?php if  (isset($showno)){echo 'class="shownocolumns"';}?>>

                                <div id="main">


      <?php if ($this->countModules('position-12')): ?>
                              <div id="top"><jdoc:include type="modules" name="position-12"   />
                              </div>
                              <?php endif; ?>
                                        <?php if ($this->getBuffer('message')) : ?>
                                                <div class="error">
                                                        <h2>
                                                        <?php echo JText::_('Message'); ?>
                                                        </h2>
                                                        <jdoc:include type="message" />
                                                </div>
                                        <?php endif; ?>

                                        <jdoc:include type="component" />
                                </div><!-- end main -->
                                </div><!-- end wrapper -->



                                <?php if ($showRightColumn) : ?>
                                        <h2 class="unseen">
                                                <?php echo JText::_('ADDITIONAL INFORMATION'); ?>
                                        </h2>
                                        <div id="close">
                                                <a href="#" onclick="auf('right')">
                                                        <span id="bild">
                                                                <?php echo JText::_('TEXTRIGHTOPEN'); ?>

                                                        </span>
                                                </a>
                                        </div>
                                <?php if(!$templateparams->get('html5', 0)): ?>
                                        <div id="right">
                                <?php else: ?>
                                        <aside id="right">
                                <?php endif; ?>
                                 <a name="additional"></a>
                                  <jdoc:include type="modules" name="position-6" style="beezDivision" headerLevel="3"/>
                                  <jdoc:include type="modules" name="position-8" style="beezDivision" headerLevel="3"  />
                                  <jdoc:include type="modules" name="position-3" style="beezDivision" headerLevel="3"  />



                                <?php if(!$templateparams->get('html5', 0)): ?>
                                        </div><!-- end right -->
                                <?php else: ?>
                                        </aside>
                                <?php endif; ?>
                                <?php endif; ?>

                                     <?php if($navposition=='center' AND $showleft) : ?>


                                        <?php if(!$this->params->get('html5', 0)): ?>
                                                <div class="left <?php if ($showRightColumn==NULL){ echo 'leftbigger';} ?>" id="nav" >
                                        <?php else: ?>
                                                <nav class="left <?php if ($showRightColumn==NULL){ echo 'leftbigger';} ?>" id="nav">
                                        <?php endif; ?>
                                         <jdoc:include type="modules" name="position-7"  style="beezDivision" headerLevel="3" />
                                         <jdoc:include type="modules" name="position-4" style="beezHide" headerLevel="3" state="0 " />
                                         <jdoc:include type="modules" name="position-5" style="beezTabs" headerLevel="2"  id="3" />

                                        <?php if(!$templateparams->get('html5', 0)): ?>
                                                </div><!-- end navi -->
                                        <?php else: ?>
                                                </nav>
                                        <?php endif; ?>
                                <?php endif; ?>

                                <div class="wrap"></div>

                </div> <!-- end contentarea -->



</div><!-- back -->
</div><!-- all -->
<div id="footer-outer">
<div id="footer-inner">

<?php if ($showbottom) : ?>
                 <div id="bottom">
                     <div class="box box1"> <jdoc:include type="modules" name="position-9" style="beezDivision" headerlevel="3" /></div>
                     <div class="box box2"> <jdoc:include type="modules" name="position-10" style="beezDivision" headerlevel="3" /></div>
                     <div class="box box3"> <jdoc:include type="modules" name="position-11" style="beezDivision" headerlevel="3" /></div>
                 </div>
                 <?php endif ; ?>

                <jdoc:include type="modules" name="debug" />

 </div>
 <div id="footer-sub">
     <?php if(!$templateparams->get('html5', 0)): ?>
                        <div id="footer">
                <?php else: ?>
                        <footer id="footer">
                <?php endif; ?>

                                <jdoc:include type="modules" name="position-14" />

                        <p>
                                <?php echo JText::_('Powered by');?> <a href="http://www.joomla.org/">Joomla!</a>
                        </p>
                <?php if(!$templateparams->get('html5', 0)): ?>
                        </div><!-- end footer -->
                <?php else: ?>
                        </footer>

                <?php endif; ?>
</div> </div>
</body>
</html>