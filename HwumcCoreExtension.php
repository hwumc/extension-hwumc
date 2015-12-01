<?php
// check for invalid entry point
if(!defined("HMS")) die("Invalid entry point");

class HwumcCoreExtension extends Extension
{
	public function getExtensionInformation()
	{
		return array(
			"name" => "HWUMC Core",
			"gitviewer" => "https://phabricator.stwalkerster.co.uk/rSFHWUMC",
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
        Hooks::register( "PostRunPage", array("HwumcCoreHooks","postRunPage"));
	}
	

}