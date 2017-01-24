<?php

class App_Bootstrap {
	public static function Init () {
		// patch core to use extended debug class
		MvcCoreExt_Tracy::$Editor = 'NotepadPP';
		MvcCore::GetInstance()->SetDebugClass(MvcCoreExt_Tracy::class);

		// use this line only if you want to pack application without JS/CSS/fonts/images
		// inside package and you want to have all those files placed on hard drive manualy
		// you can use this variant in modes PHP_PRESERVE_PACKAGE, PHP_PRESERVE_HDD and PHP_STRICT_HDD
		//MvcCoreExt_ViewHelpers_Assets::SetAssetUrlCompletion(FALSE);

		// add another view helper namespace
		MvcCore_View::AddHelpersClassBases('MvcCoreExt_ViewHelpers');
		
		// set up application routes with custom names:
		MvcCore_Router::GetInstance()->SetRoutes(array(
			'home'		=> array(
				'pattern'		=> "#^/$#",
				'reverse'		=> '/',
				'controller'	=> 'Default',
				'action'		=> 'Home',
			),
		));
	}
}