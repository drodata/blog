<?php

// this contains the application parameters that can be maintained via GUI
return array(
	// this is displayed in the header section
	'title'=>'My Yii Blog',
	// this is used in error pages
	'adminEmail'=>'webmaster@example.com',
	// number of posts displayed per page
	'postsPerPage'=>10,
	// maximum number of comments that can be displayed in recent comments portlet
	'recentCommentCount'=>10,
	// maximum number of tags that can be displayed in tag cloud portlet
	'tagCloudCount'=>20,
	// whether post comments need to be approved before published
	'commentNeedApproval'=>true,
	// the copyright information displayed in the footer section
	'copyrightInfo'=>'Copyright &copy; 2009 by My Company.',
	'version' => 'V0.0.1-4',

	'androMediaBaseDir' => '/home/ts/www/media/andro',
	'essayItemNumber' => 20,

	// flash messages
	'flashSaved' => '数据已保存',
	'flashUpdated' => '修改已保存',
	'flashDeleted' => '数据已删除',
);
