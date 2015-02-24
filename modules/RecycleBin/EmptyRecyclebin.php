<?php
/*********************************************************************************
 *** The contents of this file are subject to the vtiger CRM Public License Version 1.0
 ** ("License"); You may not use this file except in compliance with the License
 ** The Original Code is:  vtiger CRM Open Source
 ** The Initial Developer of the Original Code is vtiger.
 ** Portions created by vtiger are Copyright (C) vtiger.
 ** All Rights Reserved.
 **
 *********************************************************************************/

require_once('RecycleBinUtils.php');

global $adb,$log;
$allrec=vtlib_purify($_REQUEST['allrec']);
$idlist=vtlib_purify($_REQUEST['idlist']);
$excludedRecords=vtlib_purify($_REQUEST['excludedRecords']);
$selected_module = vtlib_purify($_REQUEST['selectmodule']);
$idlists = getSelectedRecordIds($_REQUEST,$selected_module,$idlist,$excludedRecords);

$id=array();
for($i=0;$i<count($idlists)-1;$i++) {
	$id[]=$idlists[$i];
}
require_once('data/CRMEntity.php');
$focus = CRMEntity::getInstance($selected_module);
if($allrec==1){
	$delcrm=$adb->pquery("DELETE FROM vtiger_crmentity WHERE deleted = 1 and setype=?",array($selected_module));
	$delrel = $adb->pquery("DELETE FROM vtiger_relatedlists_rb WHERE entityid in (".implode(',', $id).")",array());
		
	
}else{
	if(count($id)>0) {
		$delselcrm=$adb->pquery("DELETE FROM vtiger_crmentity WHERE deleted = 1 and crmid in (".implode(',', $id).")",array());
		$delselrel = $adb->pquery("DELETE FROM vtiger_relatedlists_rb WHERE entityid in (".implode(',', $id).")",array());
	}
}
header("Location: index.php?module=RecycleBin&action=RecycleBinAjax&file=index&parenttab=$parenttab&mode=ajax&selected_module=$selected_module");
?>

