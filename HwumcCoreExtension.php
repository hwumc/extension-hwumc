<?php
// check for invalid entry point
if(!defined("HMS")) die("Invalid entry point");

class HwumcCoreExtension extends Extension
{
	public function getExtensionInformation()
	{
		return array(
			"name" => "HWUMC Core",
			"gitviewer" => "https://gerrit.stwalkerster.co.uk/gitweb?p=siteframework/extensions/hwumc-core.git;a=tree;h=",
			"description" => "HWUMC core",
			"filepath" => dirname(__FILE__),
		);
	}
	
	protected function autoload( $class )
	{
        $files = array(
            "HwumcCoreHooks" => "HwumcCoreHooks.php",
        );
		
		return array_key_exists($class, $files) ? $files[$class] : null;
	}
	
	protected function registerHooks()
	{
        Hooks::register( "BuildPageSearchPaths", array("HwumcCoreHooks","buildPageSearchPaths"));
        Hooks::register( "PostSetupSmarty", array("HwumcCoreHooks","smartySetup"));
	}
	

}