<!DOCTYPE html>
<!--[if !IE]><!-->
<html lang="en-GB">
    <!--<![endif]-->
    <!--[if IE 6 ]>
       <html lang="en-GB" class="ie ie6">
          <![endif]-->
    <!--[if IE 7 ]>
          <html lang="en-GB" class="ie ie7">
             <![endif]-->
    <!--[if IE 8 ]>
             <html lang="en-GB" class="ie ie8">
                <![endif]-->
    <head>

<style>.async-hide { opacity: 0 !important} </style>
        
        <!--[if lte IE 6]></base><![endif]-->
        <title> <?php echo $page_title; ?> || ইসলামী গ্রন্থাগার ও গবেষণা কেন্দ্র </title>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta name="description" content="ANNUR LIBRARY">
        
        <meta name=keywords content="ANNUR LIBRARY">
        
        <link rel="icon" href="<?php echo base_url() ?>template/front/images/favicon.ico">
        <link rel="apple-touch-icon" href="<?php echo base_url(); ?>template/fornt//icons/apple-touch-icon-precomposed.png">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>template/front/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>template/front/css/bootstrap-theme.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>template/front/css/bootstrap.offcanvas.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>template/front/css/jquery-ui.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>template/front/css/owl.carousel.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>template/front/css/morph.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>template/front/css/main.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>template/front/css/timeline.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>template/front/css/footer.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>template/front/css/menu.css"/>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <script src="<?php echo base_url()?>template/back/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>template/front/js/jquery-ui.min.js"/></script>
        <script type="text/javascript" src="<?php echo base_url() ?>template/front/js/bootstrap.min.js"/></script>
        <script type="text/javascript" src="<?php echo base_url() ?>template/front/js/modernizr.custom.js"/></script>
</head>
<body class=" LandingPage no-sidebar" dir="ltr">
    <?php include 'menu.php';?>
    <div class="main side-collapse-container" role="main" style="margin-bottom: 0px !important">
		<?php 
		if($page_name!='home'){
		?>
		<div style="width:20%;border 1px solid #ddd;float: left;margin-top: 30px;padding-left: 15px;">
			<?php 
				include 'left_column.php';
			?>
		</div>
		<?php }?>
		<div style="width:<?php if($page_name!='home'){echo '80%';}else {echo '100%';}?>;border 1px solid #ddd;float: left;">
			<?php include $page_name.'.php';?>
		</div>
        <div style="clear: both;"></div>
        
        <?php include 'footer.php';?>
    </div>
    <?php include 'includes_bottom.php';?>
    <!--[if lt IE 9]>
    <script src="<?php echo base_url() ?>template/front///html5shiv.googlecode.com/svn/trunk/html5.js" /></script>
    <![endif]-->
    <!--[if lt IE 10]>
    <script type="text/javascript" src="<?php echo base_url() ?>template/front//javascript/html5shiv.js" /></script>
    <script type="text/javascript" src="<?php echo base_url() ?>template/front//javascript/respond.js" /></script>
    <![endif]-->
<script language="javascript">
document.onmousedown=disableclick;
status="Right Click Disabled";
Function disableclick(e)
{
  if(event.button==2)
   {
     alert(status);
     return false;  
   }
}
</script>
</body>  
</html>