<?php
// check for invalid entry point
if(!defined("HMS")) die("Invalid entry point");

class PageDownloadSoftware extends PageBase
{

	public function __construct()
	{
		$this->mPageUseRight = "sysinfo-download";
		$this->mMenuGroup = "SystemInfo";
	}

	protected function runPage()
	{
        $this->mBasePage = "webmaster/download.tpl";
        
        global $cExtensions, $cFilePath;
        $extensions = array();
        $mainPath = str_replace("\\", "/", $cFilePath);
        foreach ($cExtensions as $k => $v)
        {
            $path = str_replace("\\", "/", $v);
            $extensions[$k] = str_replace($mainPath, "", $path);
        }
        
        $this->mSmarty->assign("extensions", $extensions);
   	}
}
