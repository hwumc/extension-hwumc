<?php
// check for invalid entry point
if(!defined("HMS")) die("Invalid entry point");

class HwumcCoreHooks
{
	public static function buildPageSearchPaths($args)
	{
        $paths = $args[0];
        $paths[] = dirname(__FILE__) . "/Page/";
		return $paths;
	}
    
    public static function smartySetup($args)
    {
        $smarty = $args[0];
        
        $smarty->addTemplateDir(dirname(__FILE__) . "/Templates/");
        
        return $smarty;
    }    
    
    public static function postRunPage($args)
    {
        if( User::getLoggedIn()->isAllowed("jira-report-bug"))
        {
            global $cGlobalScripts;
            $cGlobalScripts[] = "https://jira.stwalkerster.co.uk/s/en_US458jis-1988229788/6105/3/1.4.0-m3/_/download/batch/com.atlassian.jira.collector.plugin.jira-issue-collector-plugin:issuecollector/com.atlassian.jira.collector.plugin.jira-issue-collector-plugin:issuecollector.js?collectorId=c3e920f8";
        }
        
        return true;
    }
}