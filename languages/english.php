<?php

	function lang($phrase) {

		static $lang = array(

			// Navbar Links

			'HOME_ADMIN' 	=> 'Home',
			'HOME' 			=> 'Home',
			'LATEST' 	    => 'Latest',
			'POPULAR' 		=> 'Popular',
			'BLOG' 		    => 'Blog',
			'CONTACT_US' 	=> 'Contact',
			'ABOUT_US'		=> 'About',
			'STATISTICS' 	=> 'Statistics',
			'LOGS' 			=> 'Logs',
			'POSTS' 		=> 'Posts',	
			'LOGIN' 		=> 'Login',
			'SIGNUP' 		=> 'Signup',
			'LOGOUT' 		=> 'Logout',
			'ADMIN' 		=> 'Admin',
		);

		return $lang[$phrase];

	}
?>