<?php
/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/
global $current_user, $currentModule;

checkFileAccessForInclusion("modules/$currentModule/$currentModule.php");
require_once("modules/$currentModule/$currentModule.php");

$focus = new $currentModule();
setObjectValuesFromRequest($focus);

$mode = $_REQUEST['mode'];
$record=$_REQUEST['record'];
if($mode) $focus->mode = $mode;
if($record)$focus->id  = $record;

if($_REQUEST['assigntype'] == 'U') {
	$focus->column_fields['assigned_user_id'] = $_REQUEST['assigned_user_id'];
} elseif($_REQUEST['assigntype'] == 'T') {
	$focus->column_fields['assigned_user_id'] = $_REQUEST['assigned_group_id'];
}
$found = false;
$mandatory = $focus->column_fields['mandatory'];
if($mandatory == 'on'){
			$defaul_check = $focus->column_fields['default_check'];
			if($defaul_check == 'on') $def = 1;
			else $def = 0;
			$blocked = $focus->column_fields['blocked'];
			if($blocked == 'on') $bloc = 1;
			else $bloc = 0;
			$modules = $focus->column_fields['module_list'];
			$modulelist=array();
			$modulelist = explode(',',$modules);
			$inmodule = $focus->column_fields['in_module_list'];
			$existmod = $adb->pquery("Select module_list from vtiger_globalvariable left join vtiger_crmentity on vtiger_crmentity.crmid=vtiger_globalvariable.globalvariableid where gvname=? and deleted=0 and mandatory=1",array($focus->column_fields['gvname']));
			$num = $adb->num_rows($existmod);
			$existmodul= array();
			for($j=0;$j<$num;$j++){
				$module_list = explode(",",$adb->query_result($existmod,$j,'module_list'));
				$existmodul = array_merge($existmodul,$module_list);
			}
			$existmodules = array_unique($existmodul);
				foreach($modulelist as $listmod){
					if($inmodule == 'on'){
						if(in_array($listmod,$existmodules)){
						$found = true;			
						$already_exist = 1;
						return header("Location: index.php?module=GlobalVariable&action=EditView&return_action=DetailView&value=".$focus->column_fields['value']."&gvname=".$focus->column_fields['gvname']."&module_list=".$focus->column_fields['module_list']."&mandatory=1&in_module_list=1&already_exist=".$already_exist."&default_check=".$def."&blocked=".$bloc."&category=".$focus->column_fields['category']."");	
					}	
					}else {
							$all_modules=vtws_getModuleNameList();
							$other_modules=array_diff($all_modules,$modulelist);
							$modtranslated = array();
							for($k=0;$k<count($other_modules);$k++){
								$modtranslated[]=getTranslatedString($other_modules[$k]); 
							}
							if(in_array($listmod,$modtranslated)){
								$found = true;
								$already_exist=1;
								return header("Location: index.php?module=GlobalVariable&action=EditView&return_action=DetailView&value=".$focus->column_fields['value']."&gvname=".$focus->column_fields['gvname']."&module_list=".$focus->column_fields['module_list']."&mandatory=1&in_module_list=0&already_exist=".$already_exist."&default_check=".$def."&blocked=".$bloc."&category=".$focus->column_fields['category']."");
				 			}
						}
		
				}	
}
if($found == false)
$focus->save($currentModule);

$return_id = $focus->id;

$search = vtlib_purify($_REQUEST['search_url']);

$parenttab = getParentTab();
if($_REQUEST['return_module'] != '') {
	$return_module = vtlib_purify($_REQUEST['return_module']);
} else {
	$return_module = $currentModule;
}

if($_REQUEST['return_action'] != '') {
	$return_action = vtlib_purify($_REQUEST['return_action']);
} else {
	$return_action = "DetailView";
}

if($_REQUEST['return_id'] != '') {
	$return_id = vtlib_purify($_REQUEST['return_id']);
}

header("Location: index.php?action=$return_action&module=$return_module&record=$return_id&parenttab=$parenttab&start=".vtlib_purify($_REQUEST['pagenumber']).$search);

?>