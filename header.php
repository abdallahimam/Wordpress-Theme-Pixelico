<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pixelico
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> dir="rtl">
<div id="page" class="site">
	<header id="masthead">
		<div class="top-header-social">
			<div class="container-fluid">
				<div class="row justify-content-center">
					<div class="col-md-4 col-left">
						<p class="top-head-name">موقعي للتصميمات والتحميل</p>
					</div>
					<div class="col-md-8 col-sm-12 col-right">
						<ul class="social-top social">
							<li class="social-btn"><a href="http://facebook.com/" class="social-icon facebook" target="_self"><i class="fa fa-facebook"></i></a></li>
							<li class="social-btn"><a href="http://plus.google.com/" class="social-icon" target="_self"><i class="fa fa-google-plus"></i></a></li>
							<li class="social-btn"><a href="http://twitter.com/" class="social-icon" target="_self"><i class="fa fa-twitter"></i></a></li>
						</ul>
						<div class="top-bar">
							<ul>
								<li class="nav-item">
									<a href="<?php echo get_site_url(); ?>/latest" target="_self" style="">
										<i class="fa fa-calendar px-1"></i>
										<span><?php echo lang('LATEST'); ?></span>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?php echo get_site_url(); ?>/popular" target="_self" style="">
										<i class="fa fa-star px-1"></i>
										<span><?php echo lang('POPULAR'); ?></span>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?php echo get_site_url(); ?>/blog" target="_self" style="">
										<i class="fa fa-newspaper-o px-1"></i>
										<span><?php echo lang('BLOG'); ?></span>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?php echo get_site_url(); ?>/page/about" target="_self" style="">
										<i class="fa fa-question-circle px-1"></i>
										<span><?php echo lang('ABOUT_US'); ?></span>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?php echo get_site_url(); ?>/page/contact" target="_self" style="">
										<i class="fa fa-envelope px-1"></i>
										<span><?php echo lang('CONTACT_US'); ?></span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-header">
			<div class="container-fluid py-0 mb-2">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<a class="navbar-brand py-0 m-0 col" href="<?php echo get_site_url(); ?>"><img src="<?php echo get_template_directory_uri() . '/images/logo.png'; ?>" alt="<?php echo bloginfo('name') . ' Logo.' ?>" srcset=""></a>
				<div class="navbar-collapse collapse w-100 order-3 dual-collapse2 col" id="navbarTogglerDemo03">
					<ul class="navbar-nav mr-auto parent">
						<li class="nav-item">
							<a href="<?php echo get_site_url(); ?>" target="_self" class="nav-link">
								<span><?php echo lang('HOME'); ?></span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo get_site_url(); ?>/category/mockups" target="_self" style="" class="nav-link">
								<span><?php echo lang('MOCKUPS'); ?></span>
							</a>
						</li>
						<li class="nav-item dropdown">
							<a href="<?php echo get_site_url(); ?>/category/psds" id="navbarDropdownMenuLinkPSDs" class="nav-link dropdown-toggle" >
								<span><?php echo lang('PSDS'); ?></span>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLinkPSDs">
								<li class="dropdown-item">
									<a href="<?php echo get_site_url(); ?>/category/ui-kits">
										<span><?php echo lang('UI_KITS'); ?></span>
									</a>
								</li>
								<li class="dropdown-item">
									<a href="<?php echo get_site_url(); ?>/category/websites">
										<span><?php echo lang('WEBSITES'); ?></span>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a href="<?php echo get_site_url(); ?>/category/icons" target="_self" style="" class="nav-link">
								<span><?php echo lang('ICONS'); ?></span>
							</a>
						</li>
						<li class="nav-item dropdown">
							<a href="<?php echo get_site_url(); ?>/category/vectors" id="navbarDropdownMenuLinkVectors" class="nav-link dropdown-toggle">
								<span><?php echo lang('VECTORS'); ?></span>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLinkVectors">
								<li class="dropdown-item">
									<a href="<?php echo get_site_url(); ?>/category/illustrator">
									<span><?php echo lang('ILLUSTRATOR'); ?></span>
									</a>
								</li>
								<li class="dropdown-item">
									<a href="<?php echo get_site_url(); ?>/category/sketch">
									<span><?php echo lang('SKETCH'); ?></span>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a href="<?php echo get_site_url(); ?>/category/other" target="_self" style="" class="nav-link">
								<span><?php echo lang('OTHERS'); ?></span>
							</a>
						</li>
						<li class="nav-item text-right search-in-lg d-sm-none d-md-inline-block">
							<a href="#" class="nav-link search" data-toggle="modal" data-target="#modalSubscriptionForm"><i class="fa fa-search"></i></a>
						</li>
					</ul>
				</div>
				<div class="nav-item search-in-sm">
					<a href="#" class="nav-link search" data-toggle="modal" data-target="#modalSubscriptionForm"><i class="fa fa-search"></i></a>
				</div>
				<!--
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?php include_navbar_template_menu(); ?>
                </div>-->
			</div>
		</nav>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
		<div class="modal fade modal-background" id="modalSubscriptionForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<form method="get" id="searchform" action="<?php bloginfo('url'); ?>">
						<div class="modal-header text-center">
							<h4 class="modal-title w-100 font-weight-bold text-light"><?php echo lang('SEARCH_HEAD') ?></h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body mx-3">
							<div class="form-group">
								<input type="text" name="s" id="s" placeholder="<?php esc_attr_e( lang('SEARCH_FOR'), 'searchfor' ); ?>" class="form-control search rounded-0">
							</div>
						</div>
						<div class="modal-footer d-flex justify-content-end">
							<button class="btn btn-search submit" name="submit" id="searchsubmit" type="submit" value="<?php esc_attr_e( 'Submit', 'searchfor' ); ?>"><?php echo lang('SEARCH') ?> <i class="fa fa-search ml-1"></i></button>
						</div>
					</form>
				</div>
			</div>
		</div>