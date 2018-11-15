<?php

	function lang($phrase) {

		static $lang = array(

			// Navbar Links

			'HOME_ADMIN' 	=> 'موقعي',
			'HOME' 			=> 'موقعي',
			'LATEST' 	    => 'الأحدث',
			'POPULAR' 		=> 'الاكثر مشاهدة',
			'BLOG' 		    => 'مدونتي',
			'CONTACT_US' 	=> 'اتصل بنا',
			'ABOUT_US'		=> 'عنا',
			'STATISTICS' 	=> 'الاحصائيات',
			'LOGS' 			=> 'Logs',
			'POSTS' 		=> 'البوستات',	
			'LOGIN' 		=> 'دخول',
			'SIGNUP' 		=> 'تسجيل',
			'LOGOUT' 		=> 'خروج',
			'ADMIN' 		=> 'أدمن',
			'SEARCH_HEAD' 	=> 'إبحث في موقعي',
			'SEARCH_FOR' 	=> 'أدخل كلمات البحث:',
            'SEARCH' 	    => 'إبحث',
            'MOCKUPS'       => 'التصاميم',
            'PSDS'          => 'PSDs',
            'UI_KITS'       => 'واجهة المستخدم',
            'WEBSITES'      => 'المواقع',
            'ICONS'         => 'ايقونات',
            'VECTORS'       => 'محاور',
            'ILLUSTRATOR'   => 'برامج',
            'SKETCH'        => 'رسوم',
            'OTHERS'        => 'أخري',

            // Download Page
            'DOWNLOAD_BUTTON_TEXT'          => 'إضغط هنا للتحميل',
            'DOWNLOAD_WAITING_TEXT'         => 'انتظر ثواني حتي يتم التحميل.',
            'DOWNLOAD_WAITING_COUNTER_TEXT' => 'انتظر 5 ثواني.',

            // TITLES OR PAGES
            'LATEST_DOWNLOADS_TITLE'        => 'الأكثر تحميلا',
            'LATEST_DOWNLOADS_CONTENT'      => 'المحتوي.',

            // Messages
            'NO_CONTENT'        => 'لا يوجد محتوي حاليا.',
            'NO_MORE_DOWNLOADS_TO_LOAD' => 'لا يوجد تحميلات اخري.',
            'TAGS' => 'الكلمات الدلالية:',
            'COPYRIGHT' => 'جميع الحقوق محفوظة لسنة',

            // Single
            'EDIT'                  => 'تعديل',
            'NEXT'                  => 'التالي',
            'PREV'                  => 'السابق',
            'ONE_COMMENT'           => 'تعليق واحد',
            'ZERO_COMMENT'          => 'لا يوجد تعليقات',
            'MANY_COMMENTS'         => '% تعليقات',
            'SHARE_ON_TWITTER'      => 'مشاركة علي تويتر',
            'DISABLED_COMMENTS'     => 'التعليقات غير مفعلة',
            'SHARE_ON_FACEBOOK'     => 'مشاركة علي فيس بوك',
            'SHARE_ON_GOOGLE_PLUS'  => 'مشاركة علي غوغل بلاس',
            'SEE_ALSO'              => 'شاهد ايضا',
            'DESCRIPTION'           => 'التفاصيل',
            'DOWNLOAD'              => 'تحميل',
            'LIKE'                  => 'إعجاب',
            'ADDED_ON'              => 'تم النشر في ',
            'NO_NAME'               => 'لا يوجد اسم',
            'NO_BIO'                => 'لا توجد سيرة للناشر',
            'POSTS'                 => 'المنشورات',
            'COMMENTS'              => 'التعليقات',
            'ADD_COMMENT'           => 'إضافة تعليق',
            'REPLY_TO'              => 'رد علي [ %s ]' ,

		);

		return $lang[$phrase];

	}
?>