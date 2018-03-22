<?php 
defined('_JEXEC') or die ('Restricted access');
$app	= JFactory::getApplication();
$doc = JFactory::getDocument();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
<jdoc:include type="head" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php global $template_path;
$template_path = JURI::base() . 'templates/' . $app->getTemplate(); ?>
<?php JLoader::import( 'joomla.version' );
$version = new JVersion();
if (version_compare( $version->RELEASE, "2.5", "<=")) {
if(JFactory::getApplication()->get('jquery') !== true) {
$document = JFactory::getDocument();
$headData = $this->getHeadData();
reset($headData['scripts']);
$newHeadData = $headData['scripts'];
$jquery = array(JURI::base() .'/templates/' . $this->template . '/js/jquery.js' => array('mime' => 'text/javascript', 'defer' => FALSE, 'async' => FALSE));
$newHeadData = $jquery + $newHeadData;
$headData['scripts'] = $newHeadData;
$this->setHeadData($headData);
$doc->addScript(JURI::base() .'/templates/' . $this->template . '/js/jui/bootstrap.min.js', 'text/javascript');
}
} else {
JHtml::_('jquery.framework');
JHtml::_('bootstrap.framework');
} ?>
<?php
if (version_compare( $version->RELEASE, "2.5", "<")) {
JHtml::_('jquery.ui');
}
$doc = JFactory::getDocument();
$doc->addScript(JURI::base() .'/templates/' . $this->template . '/js/jui/jquery-ui-1.9.2.custom.min.js', 'text/javascript');
$doc->addStyleSheet('templates/'.$this->template.'/css/bootstrap.css');
$doc->addStyleSheet('templates/'.$this->template.'/css/template.css');
$style = $this->params->get('custom_css');
if (($style || $style == Null) && !empty($style)) {
 $doc->addStyleDeclaration($style);
}
?>
<?php
$doc->addScript($template_path.'/js/totop.js');
$doc->addScript($template_path.'/js/Customjs.js');
$doc->addScript($template_path.'/js/tt_slideshow.js');
?>
<?php $str = JURI::base(); ?>
<style type="text/css">
@media only screen and (min-width : 1025px) {
<?php $bg = $this->params->get('header_background');
if(!empty($bg)){ ?>
header#ttr_header{
background: url('<?php echo $str.$this->params->get('header_background');?>') no-repeat
<?php 
$stretch = "";
$stretch_option = $this->params->get('header_stretch');
if($stretch_option == "Uniform"){
$stretch = "/ contain";
}else if($stretch_option == "Uniform to fill"){
$stretch = "/ cover";
}
else {
$stretch = " / 100% 100% ";
}
echo $this->params->get('header_horizontal_alignment') ." " . $this->params->get('header_vertical_alignment'). $stretch ."!important; }";
} ?>
.ttr_title_style, header .ttr_title_style a, header .ttr_title_style a:link, header .ttr_title_style a:visited, header .ttr_title_style a:hover {
font-size:<?php echo $this->params->get('Site_Title_FontSize'); ?>px;
color:<?php echo $this->params->get('site_title_color');?>;
}
.ttr_slogan_style {
font-size:<?php echo $this->params->get('Site_Slogan_FontSize'); ?>px;
color:<?php echo $this->params->get('site_slogan_color');?>;
}
h1.ttr_block_heading, h2.ttr_block_heading, h3.ttr_block_heading, h4.ttr_block_heading, h5.ttr_block_heading, h6.ttr_block_heading, p.ttr_block_heading {
font-size:<?php echo $this->params->get('block_heading_font_size'); ?>px;
color:<?php echo $this->params->get('block_heading_color');?>;
}
h1.ttr_verticalmenu_heading, h2.ttr_verticalmenu_heading, h3.ttr_verticalmenu_heading, h4.ttr_verticalmenu_heading, h5.ttr_verticalmenu_heading, h6.ttr_verticalmenu_heading, p.ttr_verticalmenu_heading {
font-size:<?php echo $this->params->get('sidebar_menu_font_size'); ?>px;
color:<?php echo $this->params->get('sidebar_menu_heading_color');?>;
}
#ttr_copyright a {
font-size:<?php echo $this->params->get('Copyright_FontSize'); ?>px;
color:<?php echo $this->params->get('footer_copyright_color');?>;
}
#ttr_footer_designed_by_links{
font-size:<?php echo $this->params->get('Designed_By_FontSize'); ?>px;
color:<?php echo $this->params->get('footer_designed_by_color');?>;
}
#ttr_footer_designed_by_links a, #ttr_footer_designed_by_links a:link, #ttr_footer_designed_by_links a:visited, #ttr_footer_designed_by_links a:hover {
font-size:<?php echo $this->params->get('Designed_By_Link_FontSize'); ?>px;
color:<?php echo $this->params->get('footer_designed_by_link_color');?>;
}
}
</style>
<?php
$doc->addStyleSheet($this->baseurl.'/templates/system/css/system.css');
?>
<!--[if lte IE 8]>
<link rel="stylesheet"  href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/menuie.css" type="text/css"/>
<link rel="stylesheet"  href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/vmenuie.css" type="text/css"/>
<![endif]-->
<!--[if IE 7]>
<style type="text/css" media="screen">
#ttr_vmenu_items  li.ttr_vmenu_items_parent {display:inline;}
</style>
<![endif]-->
<!--[if lt IE 9]>
<script type="text/javascript" src="<?php echo $template_path?>/js/html5shiv.js">
</script>
<script type="text/javascript" src="<?php echo $template_path?>/js/respond.min.js">
</script>
<![endif]-->
</head>
<body>
<div class="totopshow">
<a href="#" class="back-to-top"><img alt="Back to Top" src="<?php echo $template_path?>/images/gototop.png"/></a>
</div>
<div id="ttr_page" class="container">
<div class="ttr_banner_menu">
<?php
if(  $this->countModules('MAModulePosition00')||  $this->countModules('MAModulePosition01')||  $this->countModules('MAModulePosition02')||  $this->countModules('MAModulePosition03')):
?>
<div class="ttr_banner_menu_inner_above0">
<?php
$showcolumn= $this->countModules('MAModulePosition00');
?>
<?php if($showcolumn): ?>
<div class="cell1 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="menuabovecolumn1">
<jdoc:include type="modules" name="MAModulePosition00" style="<?php if(($this->params->get('mamoduleposition00') == 'block') || ($this->params->get('mamoduleposition00') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell1 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('MAModulePosition01');
?>
<?php if($showcolumn): ?>
<div class="cell2 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="menuabovecolumn2">
<jdoc:include type="modules" name="MAModulePosition01" style="<?php if(($this->params->get('mamoduleposition01') == 'block') || ($this->params->get('mamoduleposition01') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell2 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-sm-block visible-md-block visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('MAModulePosition02');
?>
<?php if($showcolumn): ?>
<div class="cell3 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="menuabovecolumn3">
<jdoc:include type="modules" name="MAModulePosition02" style="<?php if(($this->params->get('mamoduleposition02') == 'block') || ($this->params->get('mamoduleposition02') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell3 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('MAModulePosition03');
?>
<?php if($showcolumn): ?>
<div class="cell4 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="menuabovecolumn4">
<jdoc:include type="modules" name="MAModulePosition03" style="<?php if(($this->params->get('mamoduleposition03') == 'block') || ($this->params->get('mamoduleposition03') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell4 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-lg-block visible-sm-block visible-md-block visible-xs-block">
</div>
</div>
<div class="clearfix"></div>
<?php endif; ?>
</div>
<div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
<?php if ($this->countModules('Menu')):?>
<nav id="ttr_menu" class="navbar-default navbar">
<div id="ttr_menu_inner_in">
<div class="menuforeground">
</div>
<div class="ttr_menushape1">
<div class="html_content"><p><span style="font-weight:500;font-size:2.143em;color:rgba(255,255,255,1);">Web canons</span></p></div>
</div>
<div id="navigationmenu">
<div class="navbar-header">
<button id="nav-expander" data-target=".nav-menu" data-toggle="collapse" class="navbar-toggle" type="button">
<span class="sr-only">
</span>
<span class="icon-bar">
</span>
<span class="icon-bar">
</span>
<span class="icon-bar">
</span>
</button>
</div>
<div class="menu-center collapse navbar-collapse nav-menu">
<jdoc:include type="modules" name="Menu" style="none"/>
</div>
</div>
</div>
</nav>
<?php endif; ?>
<div class="ttr_banner_menu">
<?php
if(  $this->countModules('MBModulePosition00')||  $this->countModules('MBModulePosition01')||  $this->countModules('MBModulePosition02')||  $this->countModules('MBModulePosition03')):
?>
<div class="ttr_banner_menu_inner_below0">
<?php
$showcolumn= $this->countModules('MBModulePosition00');
?>
<?php if($showcolumn): ?>
<div class="cell1 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="menubelowcolumn1">
<jdoc:include type="modules" name="MBModulePosition00" style="<?php if(($this->params->get('mbmoduleposition00') == 'block') || ($this->params->get('mbmoduleposition00') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell1 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('MBModulePosition01');
?>
<?php if($showcolumn): ?>
<div class="cell2 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="menubelowcolumn2">
<jdoc:include type="modules" name="MBModulePosition01" style="<?php if(($this->params->get('mbmoduleposition01') == 'block') || ($this->params->get('mbmoduleposition01') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell2 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-sm-block visible-md-block visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('MBModulePosition02');
?>
<?php if($showcolumn): ?>
<div class="cell3 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="menubelowcolumn3">
<jdoc:include type="modules" name="MBModulePosition02" style="<?php if(($this->params->get('mbmoduleposition02') == 'block') || ($this->params->get('mbmoduleposition02') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell3 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('MBModulePosition03');
?>
<?php if($showcolumn): ?>
<div class="cell4 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="menubelowcolumn4">
<jdoc:include type="modules" name="MBModulePosition03" style="<?php if(($this->params->get('mbmoduleposition03') == 'block') || ($this->params->get('mbmoduleposition03') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell4 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-lg-block visible-sm-block visible-md-block visible-xs-block">
</div>
</div>
<div class="clearfix"></div>
<?php endif; ?>
</div>
<div class="ttr_banner_slideshow">
<?php
if(  $this->countModules('SAModulePosition00')||  $this->countModules('SAModulePosition01')||  $this->countModules('SAModulePosition02')||  $this->countModules('SAModulePosition03')):
?>
<div class="ttr_banner_slideshow_inner_above0">
<?php
$showcolumn= $this->countModules('SAModulePosition00');
?>
<?php if($showcolumn): ?>
<div class="cell1 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="slideshowabovecolumn1">
<jdoc:include type="modules" name="SAModulePosition00" style="<?php if(($this->params->get('samoduleposition00') == 'block') || ($this->params->get('samoduleposition00') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell1 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('SAModulePosition01');
?>
<?php if($showcolumn): ?>
<div class="cell2 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="slideshowabovecolumn2">
<jdoc:include type="modules" name="SAModulePosition01" style="<?php if(($this->params->get('samoduleposition01') == 'block') || ($this->params->get('samoduleposition01') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell2 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-sm-block visible-md-block visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('SAModulePosition02');
?>
<?php if($showcolumn): ?>
<div class="cell3 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="slideshowabovecolumn3">
<jdoc:include type="modules" name="SAModulePosition02" style="<?php if(($this->params->get('samoduleposition02') == 'block') || ($this->params->get('samoduleposition02') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell3 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('SAModulePosition03');
?>
<?php if($showcolumn): ?>
<div class="cell4 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="slideshowabovecolumn4">
<jdoc:include type="modules" name="SAModulePosition03" style="<?php if(($this->params->get('samoduleposition03') == 'block') || ($this->params->get('samoduleposition03') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell4 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-lg-block visible-sm-block visible-md-block visible-xs-block">
</div>
</div>
<div class="clearfix"></div>
<?php endif; ?>
</div>
<?php
$str = JURI::base();
for( $i=0 ; $i<3 ; $i++ ){
if ($this->params->get('slideshow_image_' . $i)):
$style='#Slide'.$i.'{'
.'background:url('.$str.$this->params->get('slideshow_image_' . $i).')'
.'no-repeat center !important;}';
$doc->addStyleDeclaration($style);
endif;
}?>
<?php function slideshow() {
global $template_path;
 ?>
<div class="ttr_slideshow">
<div id="ttr_slideshow_inner">
<ul>
<li id="Slide0" class="ttr_slide" data-slideEffect="Fade">
<a href="http://templatetoaster.com/"></a>
<div class="ttr_slideshow_last">
<div class="ttr_slideshowshape01" data-effect="Fade" data-begintime="0" data-duration="1" data-easing="linear" data-slide="None">
<div class="html_content"><p style="margin:0em 0em 0em 0em;text-align:Center;line-height: normal;"><span style="font-weight:700;font-size:5.714em;color:rgba(255,255,255,1);">WE CREATE THE WEB</span></p><p style="margin:0.14em 0em 0em 0.57em;text-align:Center;line-height: normal;"><span style="font-size:1.143em;color:rgba(255,255,255,1);">Nullam dignissim convallis est.Quisque aliquam. Donec faucibus. Nunc iaculis suscipit dui.Nam sit amet sem. Aliquam libero nisi, imperdiet at, tincidunt nec, gravida vehicula, nisl.Praesent mattis, massa quis luctus fermentum, turpis mi volutpat justo, eu volutpat enim diam eget metus.Maecenas ornare tortor.</span></p><p style="margin:0.14em 0em 0em 0.57em;text-align:Center;line-height: normal;"><br /></p><p style="margin:0.14em 0em 0em 0.57em;text-align:Center;line-height: normal;"><span><a HREF="#" target="_self" class="btn btn-md btn-default">ABOUT 7EVEN CANONS</a></span></p></div>
</div>
</div>
</li>
<li id="Slide1" class="ttr_slide" data-slideEffect="Fade">
<a href="http://templatetoaster.com/"></a>
<div class="ttr_slideshow_last">
<div class="ttr_slideshowshape11" data-effect="Fade" data-begintime="0" data-duration="1" data-easing="linear" data-slide="None">
<div class="html_content"><p style="margin:0em 0em 0em 0em;text-align:Center;line-height: normal;"><span style="font-weight:700;font-size:5.714em;color:rgba(255,255,255,1);">WE LOVE WHAT WE DO</span></p><p style="margin:0.14em 0em 0em 0.57em;text-align:Center;line-height: normal;"><span style="font-size:1.143em;color:rgba(255,255,255,1);">Nullam dignissim convallis est.Quisque aliquam. Donec faucibus. Nunc iaculis suscipit dui.Nam sit amet sem. Aliquam libero nisi, imperdiet at, tincidunt nec, gravida vehicula, nisl.Praesent mattis, massa quis luctus fermentum, turpis mi volutpat justo, eu volutpat enim diam eget metus.Maecenas ornare tortor.</span></p><p style="margin:0.14em 0em 0em 0.57em;text-align:Center;line-height: normal;"><br /></p><p style="margin:0.14em 0em 0em 0.57em;text-align:Center;line-height: normal;"><span><a HREF="#" target="_self" class="btn btn-md btn-default">ABOUT 7EVEN CANONS</a></span></p></div>
</div>
</div>
</li>
<li id="Slide2" class="ttr_slide" data-slideEffect="Fade">
<a href="http://templatetoaster.com/"></a>
<div class="ttr_slideshow_last">
<div class="ttr_slideshowshape21" data-effect="None" data-begintime="0" data-duration="1" data-easing="linear" data-slide="None">
<div class="html_content"><p style="margin:0em 0em 0em 0em;text-align:Center;line-height: normal;"><span style="font-weight:700;font-size:5.714em;color:rgba(255,255,255,1);">THINKERS &amp; DESIGNERS</span></p><p style="margin:0.14em 0em 0em 0.57em;text-align:Center;line-height: normal;"><span style="font-size:1.143em;color:rgba(255,255,255,1);">Nullam dignissim convallis est.Quisque aliquam. Donec faucibus. Nunc iaculis suscipit dui.Nam sit amet sem. Aliquam libero nisi, imperdiet at, tincidunt nec, gravida vehicula, nisl.Praesent mattis, massa quis luctus fermentum, turpis mi volutpat justo, eu volutpat enim diam eget metus.Maecenas ornare tortor.</span></p><p style="margin:0.14em 0em 0em 0.57em;text-align:Center;line-height: normal;"><br /></p><p style="margin:0.14em 0em 0em 0.57em;text-align:Center;line-height: normal;"><span><a HREF="#" target="_self" class="btn btn-md btn-default">ABOUT 7EVEN CANONS</a></span></p></div>
</div>
</div>
</li>
</ul>
</div>
<?php  } 
 $menu = $app->getMenu(); 
 $template   = $app->getTemplate(true); 
 $params     = $template->params; 
 $is_slide   = $params->get('enable_slide','1'); 
 if ($is_slide) { 
 slideshow(); ?> 
<div class="ttr_slideshow_in">
<div class="ttr_slideshow_last">
<div id="nav"></div>
</div>
</div>
</div>
<?php } else { 
 if ($menu->getActive() == $menu->getDefault()) {
 slideshow(); ?>
<div class="ttr_slideshow_in">
<div class="ttr_slideshow_last">
<div id="nav"></div>
</div>
</div>
</div>
<?php  }} ?>
<div class="ttr_banner_slideshow">
<?php
if(  $this->countModules('SBModulePosition00')||  $this->countModules('SBModulePosition01')||  $this->countModules('SBModulePosition02')||  $this->countModules('SBModulePosition03')):
?>
<div class="ttr_banner_slideshow_inner_below0">
<?php
$showcolumn= $this->countModules('SBModulePosition00');
?>
<?php if($showcolumn): ?>
<div class="cell1 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="slideshowbelowcolumn1">
<jdoc:include type="modules" name="SBModulePosition00" style="<?php if(($this->params->get('sbmoduleposition00') == 'block') || ($this->params->get('sbmoduleposition00') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell1 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('SBModulePosition01');
?>
<?php if($showcolumn): ?>
<div class="cell2 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="slideshowbelowcolumn2">
<jdoc:include type="modules" name="SBModulePosition01" style="<?php if(($this->params->get('sbmoduleposition01') == 'block') || ($this->params->get('sbmoduleposition01') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell2 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-sm-block visible-md-block visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('SBModulePosition02');
?>
<?php if($showcolumn): ?>
<div class="cell3 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="slideshowbelowcolumn3">
<jdoc:include type="modules" name="SBModulePosition02" style="<?php if(($this->params->get('sbmoduleposition02') == 'block') || ($this->params->get('sbmoduleposition02') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell3 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('SBModulePosition03');
?>
<?php if($showcolumn): ?>
<div class="cell4 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="slideshowbelowcolumn4">
<jdoc:include type="modules" name="SBModulePosition03" style="<?php if(($this->params->get('sbmoduleposition03') == 'block') || ($this->params->get('sbmoduleposition03') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell4 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-lg-block visible-sm-block visible-md-block visible-xs-block">
</div>
</div>
<div class="clearfix"></div>
<?php endif; ?>
</div>
<div id="ttr_content_and_sidebar_container">
<div id="ttr_content">
<div id="ttr_content_margin">
<div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
<?php
if(  $this->countModules('CAModulePosition00')||  $this->countModules('CAModulePosition01')||  $this->countModules('CAModulePosition02')||  $this->countModules('CAModulePosition03')):
?>
<div class="contenttopcolumn0">
<?php
$showcolumn= $this->countModules('CAModulePosition00');
?>
<?php if($showcolumn): ?>
<div class="cell1 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="topcolumn1">
<jdoc:include type="modules" name="CAModulePosition00" style="<?php if(($this->params->get('camoduleposition00') == 'block') || ($this->params->get('camoduleposition00') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell1 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('CAModulePosition01');
?>
<?php if($showcolumn): ?>
<div class="cell2 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="topcolumn2">
<jdoc:include type="modules" name="CAModulePosition01" style="<?php if(($this->params->get('camoduleposition01') == 'block') || ($this->params->get('camoduleposition01') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell2 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-sm-block visible-md-block visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('CAModulePosition02');
?>
<?php if($showcolumn): ?>
<div class="cell3 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="topcolumn3">
<jdoc:include type="modules" name="CAModulePosition02" style="<?php if(($this->params->get('camoduleposition02') == 'block') || ($this->params->get('camoduleposition02') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell3 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('CAModulePosition03');
?>
<?php if($showcolumn): ?>
<div class="cell4 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="topcolumn4">
<jdoc:include type="modules" name="CAModulePosition03" style="<?php if(($this->params->get('camoduleposition03') == 'block') || ($this->params->get('camoduleposition03') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell4 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-lg-block visible-sm-block visible-md-block visible-xs-block">
</div>
</div>
<div class="clearfix"></div>
<?php endif; ?>
<jdoc:include type="message" style="width:100%;"/>
<jdoc:include type="component" />
<?php
if(  $this->countModules('CBModulePosition00')||  $this->countModules('CBModulePosition01')||  $this->countModules('CBModulePosition02')||  $this->countModules('CBModulePosition03')):
?>
<div class="contentbottomcolumn0">
<?php
$showcolumn= $this->countModules('CBModulePosition00');
?>
<?php if($showcolumn): ?>
<div class="cell1 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="bottomcolumn1">
<jdoc:include type="modules" name="CBModulePosition00" style="<?php if(($this->params->get('cbmoduleposition00') == 'block') || ($this->params->get('cbmoduleposition00') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell1 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('CBModulePosition01');
?>
<?php if($showcolumn): ?>
<div class="cell2 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="bottomcolumn2">
<jdoc:include type="modules" name="CBModulePosition01" style="<?php if(($this->params->get('cbmoduleposition01') == 'block') || ($this->params->get('cbmoduleposition01') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell2 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-sm-block visible-md-block visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('CBModulePosition02');
?>
<?php if($showcolumn): ?>
<div class="cell3 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="bottomcolumn3">
<jdoc:include type="modules" name="CBModulePosition02" style="<?php if(($this->params->get('cbmoduleposition02') == 'block') || ($this->params->get('cbmoduleposition02') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell3 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('CBModulePosition03');
?>
<?php if($showcolumn): ?>
<div class="cell4 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="bottomcolumn4">
<jdoc:include type="modules" name="CBModulePosition03" style="<?php if(($this->params->get('cbmoduleposition03') == 'block') || ($this->params->get('cbmoduleposition03') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell4 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-lg-block visible-sm-block visible-md-block visible-xs-block">
</div>
</div>
<div class="clearfix"></div>
<?php endif; ?>
<div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
</div>
</div>
<div style="clear:both;">
</div>
</div>
<div class="footer-widget-area">
<div class="footer-widget-area_inner">
<?php
if(  $this->countModules('FAModulePosition00')||  $this->countModules('FAModulePosition01')||  $this->countModules('FAModulePosition02')||  $this->countModules('FAModulePosition03')):
?>
<div class="ttr_footer-widget-area_inner_above0">
<?php
$showcolumn= $this->countModules('FAModulePosition00');
?>
<?php if($showcolumn): ?>
<div class="cell1 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="footerabovecolumn1">
<jdoc:include type="modules" name="FAModulePosition00" style="<?php if(($this->params->get('famoduleposition00') == 'block') || ($this->params->get('famoduleposition00') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell1 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('FAModulePosition01');
?>
<?php if($showcolumn): ?>
<div class="cell2 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="footerabovecolumn2">
<jdoc:include type="modules" name="FAModulePosition01" style="<?php if(($this->params->get('famoduleposition01') == 'block') || ($this->params->get('famoduleposition01') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell2 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-sm-block visible-md-block visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('FAModulePosition02');
?>
<?php if($showcolumn): ?>
<div class="cell3 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="footerabovecolumn3">
<jdoc:include type="modules" name="FAModulePosition02" style="<?php if(($this->params->get('famoduleposition02') == 'block') || ($this->params->get('famoduleposition02') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell3 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('FAModulePosition03');
?>
<?php if($showcolumn): ?>
<div class="cell4 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="footerabovecolumn4">
<jdoc:include type="modules" name="FAModulePosition03" style="<?php if(($this->params->get('famoduleposition03') == 'block') || ($this->params->get('famoduleposition03') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell4 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-lg-block visible-sm-block visible-md-block visible-xs-block">
</div>
</div>
<div class="clearfix"></div>
<?php endif; ?>
</div>
</div>
<div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
<footer id="ttr_footer">
<div id="ttr_footer_top_for_widgets">
<div class="ttr_footer_top_for_widgets_inner">
<?php 
if($this->countModules('LeftFooterArea') || $this->countModules('CenterFooterArea') || $this->countModules('RightFooterArea')):
?>
<div class="footer-widget-area_fixed">
<div style="margin:0 auto;">
<?php if($this->countModules('LeftFooterArea')): ?>
<div id="first" class="widget-area col-lg-4 col-md-4 col-sm-4 col-xs-12">
<jdoc:include type="modules" name="LeftFooterArea" style="<?php if(($this->params->get('leftfooterarea') == 'block') || ($this->params->get('leftfooterarea') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
<div class="clearfix visible-xs"></div>
<?php else: ?>
<div id="first" class="widget-area  col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
&nbsp;
</div>
<div class="clearfix visible-xs"></div>
<?php endif; ?>
<?php if($this->countModules('CenterFooterArea')): ?>
<div id="second" class="widget-area  col-lg-4 col-md-4 col-sm-4 col-xs-12">
<jdoc:include type="modules" name="CenterFooterArea" style="<?php if(($this->params->get('centerfooterarea') == 'block') || ($this->params->get('centerfooterarea') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
<div class="clearfix visible-xs"></div>
<?php else: ?>
<div id="second" class="widget-area  col-lg-4 col-md-4 col-sm-4 col-xs-12">
&nbsp;
</div>
<div class="clearfix visible-xs"></div>
<?php endif; ?>
<?php if($this->countModules('RightFooterArea')): ?>
<div id="third" class="widget-area  col-lg-4 col-md-4 col-sm-4 col-xs-12">
<jdoc:include type="modules" name="RightFooterArea" style="<?php if(($this->params->get('rightfooterarea') == 'block') || ($this->params->get('rightfooterarea') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
<div class="clearfix visible-lg visible-md visible-sm visible-xs"></div>
<?php else: ?>
<div id="third" class="widget-area  col-lg-4 col-md-4 col-sm-4 col-xs-12">
&nbsp;
</div>
<div class="clearfix visible-lg visible-md visible-sm visible-xs"></div>
<?php endif; ?>
</div>
</div>
<?php endif; ?>
</div>
</div>
<div class="ttr_footer_bottom_footer">
<div class="ttr_footer_bottom_footer_inner">
<?php if (($this->params->get('enable_Designed_By')) || ($this->params->get('enable_Designed_By') == Null)): ?>
<div id="ttr_footer_designed_by_links">
<a <?php if ($this->params->get('Designed_By')): ?> href="<?php echo $this->params->get('Designed_By');?>"<?php else: ?> href="<?php echo $app->getCfg('live_site');?>"<?php endif; ?> >
Joomla Template
</a>
<span id="ttr_footer_designed_by">
Designed With TemplateToaster
</span>
</div>
<?php endif; ?>
</div>
</div>
</footer>
<div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
<div class="footer-widget-area">
<div class="footer-widget-area_inner">
<?php
if(  $this->countModules('FBModulePosition00')||  $this->countModules('FBModulePosition01')||  $this->countModules('FBModulePosition02')||  $this->countModules('FBModulePosition03')):
?>
<div class="ttr_footer-widget-area_inner_below0">
<?php
$showcolumn= $this->countModules('FBModulePosition00');
?>
<?php if($showcolumn): ?>
<div class="cell1 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="footerbelowcolumn1">
<jdoc:include type="modules" name="FBModulePosition00" style="<?php if(($this->params->get('fbmoduleposition00') == 'block') || ($this->params->get('fbmoduleposition00') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell1 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('FBModulePosition01');
?>
<?php if($showcolumn): ?>
<div class="cell2 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="footerbelowcolumn2">
<jdoc:include type="modules" name="FBModulePosition01" style="<?php if(($this->params->get('fbmoduleposition01') == 'block') || ($this->params->get('fbmoduleposition01') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell2 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-sm-block visible-md-block visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('FBModulePosition02');
?>
<?php if($showcolumn): ?>
<div class="cell3 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="footerbelowcolumn3">
<jdoc:include type="modules" name="FBModulePosition02" style="<?php if(($this->params->get('fbmoduleposition02') == 'block') || ($this->params->get('fbmoduleposition02') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell3 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('FBModulePosition03');
?>
<?php if($showcolumn): ?>
<div class="cell4 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="footerbelowcolumn4">
<jdoc:include type="modules" name="FBModulePosition03" style="<?php if(($this->params->get('fbmoduleposition03') == 'block') || ($this->params->get('fbmoduleposition03') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell4 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-lg-block visible-sm-block visible-md-block visible-xs-block">
</div>
</div>
<div class="clearfix"></div>
<?php endif; ?>
</div>
</div>
</div>
<?php if ($this->countModules('debug')){ ?>
<jdoc:include type="modules" name="debug" style="<?php if(($this->params->get('debug') == 'block') || ($this->params->get('debug') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
<?php } ?>
<script type="text/javascript">
WebFontConfig = {
google: { families: [ 'Hind','Hind:500'] }
};
(function() {
var wf = document.createElement('script');
wf.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://ajax.googleapis.com/ajax/libs/webfont/1.0.31/webfont.js';
wf.type = 'text/javascript';
wf.async = 'true';
var s = document.getElementsByTagName('script')[0];
s.parentNode.insertBefore(wf, s);
})();
</script>
</body>
</html>
