<?php
// check for invalid entry point
if(!defined("HMS")) die("Invalid entry point");

class HwumcExtension extends Extension
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
	
	}
	
	protected function registerHooks()
	{
	
	}
	

}