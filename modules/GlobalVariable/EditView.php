<?php
/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/

require_once 'modules/Vtiger/EditView.php';

$already_exist = vtlib_purify($_REQUEST['already_exist']);
if($focus->mode == 'edit') {
	$smarty->assign("ALREADYEXIST",$already_exist);
	$smarty->display('salesEditView.tpl');
} else {
	$smarty->assign("ALREADYEXIST",$already_exist);
	$smarty->display('CreateView.tpl');
}

?>