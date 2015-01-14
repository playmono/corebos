
<?php
/***********************************************************************************
 * The contents of this file are subject to the Evolutivo BPM License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  JPL TSolucio, S.L. Open Source
 * The Initial Developer of the Original Code is JPL TSolucio, S.L.
 * Portions created by JPL TSolucio, S.L. are Copyright (C) JPL TSolucio, S.L.
 * All Rights Reserved.
 ************************************************************************************/

// pie graph needs this, but we don't for this vtApp, so I put a stub


class Dealer extends vtApp {
	
	var $hasedit = true;
	var $hasrefresh = true;
	var $hassize = true;
	var $candelete = false;
	var $wwidth = 450;
	var $wheight = 450;

	public function getContent($lang) {
            require_once('Smarty_setup.php');
 global $adb,$current_user;

//$rows2=$adb->num_rows($query2);
$i=0;
//$select1="<SELECT id='filters' onchange='ispermit()'>";
//while($rows2=$adb->fetch_array($query2)){
//$select1.="<option value='".$rows2[2]."'>".$rows2[0]."</option>";

//$i++;
//}

//$i = 0;
$query2=$adb->query(" Select * from vtiger_project  limit 10
");
//echo $adb->query_result($query2,0,'projectid');
//echo $query2;
$query=$adb->query("SELECT  vtiger_project.lavorato,vtiger_project.dayson,vtiger_project.lavorato,vtiger_project.projectid,vtiger_project.progetto,vtiger_project.linktoaccountscontacts,vtiger_account.accountid,vtiger_project.project_id,e2.projectname AS proj,e3.accountname as proj2,vtiger_project.linktoaccountscontacts,vtiger_project.linktobuyer,vtiger_account.accountname,vtiger_crmentity.assigned_user_id, vtiger_project.projectname,vtiger_project.progetto,vtiger_project.project_no,vtiger_project.substatusproj,vtiger_crmentity.crmid, vtiger_crmentity.createdtime,vtiger_project.serial_number,vtiger_project.rma,vtiger_crmentity.smownerid,vtiger_users.id,vtiger_users.user_name
FROM vtiger_project 
LEFT JOIN vtiger_project AS e2 ON e2.projectid=vtiger_project.progetto
INNER JOIN vtiger_crmentity
ON vtiger_project.projectid=vtiger_crmentity.crmid 
LEFT JOIN vtiger_account
ON vtiger_project.linktoaccountscontacts=vtiger_account.accountid
LEFT JOIN vtiger_account AS e3 on e3.accountid=vtiger_project.linktobuyer
LEFT JOIN vtiger_users
ON vtiger_crmentity.smownerid=vtiger_users.id 
WHERE  vtiger_crmentity.deleted=0    limit 100
");

//$current_user->user_name;
//echo $user;

if ($current_user->is_admin=='off')
$query3=$adb->query("select vtiger_project.projectname AS 'Project_Project_Name', vtiger_project.linktobuyer AS 'Project_LBLGROUPBUYER', vtiger_project.rma AS 'Project_RMA', vtiger_project.startdate AS 'Project_Start_Date', vtiger_project.substatusproj AS 'Project_Substatus', vtiger_project.statopartech AS 'Project_Stato_parte_chiamata',vtiger_messages.msgdescription AS 'Messages_Message',vtiger_project.projectid AS 'dy',vtiger_accountRelProject1306.accountname AS 'tre',vtiger_accountRelProject1306.accountid AS 'kater',vtiger_messages.messagesid AS 'pese',vtiger_project.spar_associato from vtiger_project inner join vtiger_projectcf as vtiger_projectcf on vtiger_projectcf.projectid=vtiger_project.projectid
                inner join vtiger_crmentity on vtiger_crmentity.crmid=vtiger_project.projectid
                        left join vtiger_groups as vtiger_groupsProject on vtiger_groupsProject.groupid = vtiger_crmentity.smownerid
            left join vtiger_users as vtiger_usersProject on vtiger_usersProject.id = vtiger_crmentity.smownerid
                        left join vtiger_groups on vtiger_groups.groupid = vtiger_crmentity.smownerid
            left join vtiger_users on vtiger_users.id = vtiger_crmentity.smownerid left join vtiger_crmentity as vtiger_crmentityRelProject593 on vtiger_crmentityRelProject593.crmid = vtiger_project.linktoaccountscontacts and vtiger_crmentityRelProject593.deleted=0 left join vtiger_account as vtiger_accountRelProject593 on vtiger_accountRelProject593.accountid = vtiger_crmentityRelProject593.crmid left join vtiger_crmentity as vtiger_crmentityRelProject1253 on vtiger_crmentityRelProject1253.crmid = vtiger_project.products and vtiger_crmentityRelProject1253.deleted=0 left join vtiger_products as vtiger_productsRelProject1253 on vtiger_productsRelProject1253.productid = vtiger_crmentityRelProject1253.crmid left join vtiger_crmentity as vtiger_crmentityRelProject1306 on vtiger_crmentityRelProject1306.crmid = vtiger_project.linktobuyer and vtiger_crmentityRelProject1306.deleted=0 left join vtiger_account as vtiger_accountRelProject1306 on vtiger_accountRelProject1306.accountid = vtiger_crmentityRelProject1306.crmid left join vtiger_crmentity as vtiger_crmentityRelProject1490 on vtiger_crmentityRelProject1490.crmid = vtiger_project.linktocondition and vtiger_crmentityRelProject1490.deleted=0 left join vtiger_condition as vtiger_conditionRelProject1490 on vtiger_conditionRelProject1490.conditionid = vtiger_crmentityRelProject1490.crmid left join vtiger_crmentity as vtiger_crmentityRelProject1491 on vtiger_crmentityRelProject1491.crmid = vtiger_project.linktosymptom and vtiger_crmentityRelProject1491.deleted=0 left join vtiger_symptom as vtiger_symptomRelProject1491 on vtiger_symptomRelProject1491.symptomid = vtiger_crmentityRelProject1491.crmid left join vtiger_crmentity as vtiger_crmentityRelProject1600 on vtiger_crmentityRelProject1600.crmid = vtiger_project.progetto and vtiger_crmentityRelProject1600.deleted=0 left join vtiger_project as vtiger_projectRelProject1600 on vtiger_projectRelProject1600.projectid = vtiger_crmentityRelProject1600.crmid left join vtiger_crmentity as vtiger_crmentityRelProject2020 on vtiger_crmentityRelProject2020.crmid = vtiger_project.contacts and vtiger_crmentityRelProject2020.deleted=0 left join vtiger_contactdetails as vtiger_contactdetailsRelProject2020 on vtiger_contactdetailsRelProject2020.contactid = vtiger_crmentityRelProject2020.crmid left join vtiger_crmentity as vtiger_crmentityRelProject2201 on vtiger_crmentityRelProject2201.crmid = vtiger_project.distributor and vtiger_crmentityRelProject2201.deleted=0 left join vtiger_distributor as vtiger_distributorRelProject2201 on vtiger_distributorRelProject2201.distributorid = vtiger_crmentityRelProject2201.crmid left join vtiger_messages as vtiger_messagestmpMessages on  vtiger_messagestmpMessages.project = vtiger_project.projectid  LEFT JOIN vtiger_messages ON  vtiger_messages.messagesid = vtiger_messagestmpMessages.messagesid        left join vtiger_crmentity as vtiger_crmentityMessages on vtiger_crmentityMessages.crmid = vtiger_messages.messagesid AND vtiger_crmentityMessages.deleted=0
                                        left join vtiger_messagescf as vtiger_messagescf on vtiger_messagescf.messagesid=vtiger_messages.messagesid
                                        left join vtiger_groups as vtiger_groupsMessages on vtiger_groupsMessages.groupid = vtiger_crmentityMessages.smownerid
                            left join vtiger_users as vtiger_usersMessages on vtiger_usersMessages.id = vtiger_crmentityMessages.smownerid left join vtiger_crmentity as vtiger_crmentityRelMessages0 on vtiger_crmentityRelMessages0.crmid = vtiger_messages.project and vtiger_crmentityRelMessages0.deleted=0 left join vtiger_project as vtiger_projectRelMessages0 on vtiger_projectRelMessages0.projectid = vtiger_crmentityRelMessages0.crmid   WHERE vtiger_crmentity.deleted=0   and (( vtiger_project.progetto = '96221' or vtiger_project.progetto = '96984' )  and ( vtiger_project.projectstatus not like '%hold%' and vtiger_project.projectstatus not like '%arch%' and vtiger_project.projectstatus not like '%NSE%' )  and ( vtiger_project.substatusproj not like '%canc%' and vtiger_project.substatusproj not like '%clos%' ) and vtiger_project.spar_associato='$current_user->user_name')
 ");
else
    $query3=$adb->query("select vtiger_project.projectname AS 'Project_Project_Name', vtiger_project.linktobuyer AS 'Project_LBLGROUPBUYER', vtiger_project.rma AS 'Project_RMA', vtiger_project.startdate AS 'Project_Start_Date', vtiger_project.substatusproj AS 'Project_Substatus', vtiger_project.statopartech AS 'Project_Stato_parte_chiamata',vtiger_messages.msgdescription AS 'Messages_Message',vtiger_project.projectid AS 'dy',vtiger_accountRelProject1306.accountname AS 'tre',vtiger_accountRelProject1306.accountid AS 'kater',vtiger_messages.messagesid AS 'pese',vtiger_project.spar_associato from vtiger_project inner join vtiger_projectcf as vtiger_projectcf on vtiger_projectcf.projectid=vtiger_project.projectid
                inner join vtiger_crmentity on vtiger_crmentity.crmid=vtiger_project.projectid
                        left join vtiger_groups as vtiger_groupsProject on vtiger_groupsProject.groupid = vtiger_crmentity.smownerid
            left join vtiger_users as vtiger_usersProject on vtiger_usersProject.id = vtiger_crmentity.smownerid
                        left join vtiger_groups on vtiger_groups.groupid = vtiger_crmentity.smownerid
            left join vtiger_users on vtiger_users.id = vtiger_crmentity.smownerid left join vtiger_crmentity as vtiger_crmentityRelProject593 on vtiger_crmentityRelProject593.crmid = vtiger_project.linktoaccountscontacts and vtiger_crmentityRelProject593.deleted=0 left join vtiger_account as vtiger_accountRelProject593 on vtiger_accountRelProject593.accountid = vtiger_crmentityRelProject593.crmid left join vtiger_crmentity as vtiger_crmentityRelProject1253 on vtiger_crmentityRelProject1253.crmid = vtiger_project.products and vtiger_crmentityRelProject1253.deleted=0 left join vtiger_products as vtiger_productsRelProject1253 on vtiger_productsRelProject1253.productid = vtiger_crmentityRelProject1253.crmid left join vtiger_crmentity as vtiger_crmentityRelProject1306 on vtiger_crmentityRelProject1306.crmid = vtiger_project.linktobuyer and vtiger_crmentityRelProject1306.deleted=0 left join vtiger_account as vtiger_accountRelProject1306 on vtiger_accountRelProject1306.accountid = vtiger_crmentityRelProject1306.crmid left join vtiger_crmentity as vtiger_crmentityRelProject1490 on vtiger_crmentityRelProject1490.crmid = vtiger_project.linktocondition and vtiger_crmentityRelProject1490.deleted=0 left join vtiger_condition as vtiger_conditionRelProject1490 on vtiger_conditionRelProject1490.conditionid = vtiger_crmentityRelProject1490.crmid left join vtiger_crmentity as vtiger_crmentityRelProject1491 on vtiger_crmentityRelProject1491.crmid = vtiger_project.linktosymptom and vtiger_crmentityRelProject1491.deleted=0 left join vtiger_symptom as vtiger_symptomRelProject1491 on vtiger_symptomRelProject1491.symptomid = vtiger_crmentityRelProject1491.crmid left join vtiger_crmentity as vtiger_crmentityRelProject1600 on vtiger_crmentityRelProject1600.crmid = vtiger_project.progetto and vtiger_crmentityRelProject1600.deleted=0 left join vtiger_project as vtiger_projectRelProject1600 on vtiger_projectRelProject1600.projectid = vtiger_crmentityRelProject1600.crmid left join vtiger_crmentity as vtiger_crmentityRelProject2020 on vtiger_crmentityRelProject2020.crmid = vtiger_project.contacts and vtiger_crmentityRelProject2020.deleted=0 left join vtiger_contactdetails as vtiger_contactdetailsRelProject2020 on vtiger_contactdetailsRelProject2020.contactid = vtiger_crmentityRelProject2020.crmid left join vtiger_crmentity as vtiger_crmentityRelProject2201 on vtiger_crmentityRelProject2201.crmid = vtiger_project.distributor and vtiger_crmentityRelProject2201.deleted=0 left join vtiger_distributor as vtiger_distributorRelProject2201 on vtiger_distributorRelProject2201.distributorid = vtiger_crmentityRelProject2201.crmid left join vtiger_messages as vtiger_messagestmpMessages on  vtiger_messagestmpMessages.project = vtiger_project.projectid  LEFT JOIN vtiger_messages ON  vtiger_messages.messagesid = vtiger_messagestmpMessages.messagesid        left join vtiger_crmentity as vtiger_crmentityMessages on vtiger_crmentityMessages.crmid = vtiger_messages.messagesid AND vtiger_crmentityMessages.deleted=0
                                        left join vtiger_messagescf as vtiger_messagescf on vtiger_messagescf.messagesid=vtiger_messages.messagesid
                                        left join vtiger_groups as vtiger_groupsMessages on vtiger_groupsMessages.groupid = vtiger_crmentityMessages.smownerid
                            left join vtiger_users as vtiger_usersMessages on vtiger_usersMessages.id = vtiger_crmentityMessages.smownerid left join vtiger_crmentity as vtiger_crmentityRelMessages0 on vtiger_crmentityRelMessages0.crmid = vtiger_messages.project and vtiger_crmentityRelMessages0.deleted=0 left join vtiger_project as vtiger_projectRelMessages0 on vtiger_projectRelMessages0.projectid = vtiger_crmentityRelMessages0.crmid   WHERE vtiger_crmentity.deleted=0   and (( vtiger_project.progetto = '96221' or vtiger_project.progetto = '96984' )  and ( vtiger_project.projectstatus not like '%hold%' and vtiger_project.projectstatus not like '%arch%' and vtiger_project.projectstatus not like '%NSE%' )  and ( vtiger_project.substatusproj not like '%canc%' and vtiger_project.substatusproj not like '%clos%' ) )
 ");
    

$rows=$adb->num_rows($query3);
//echo '<br>'.$rows;
//echo '<br>'.$adb->query_result($query3,2,0);
//echo $adb->current_user;
//echo $current_user->user_name;
//echo 'heythere';
$data=array();
for($i=0;$i<$adb->num_rows($query3);$i++){
   
  $prova= $adb->query_result($query3,$i,'dy');
  //echo $prova;
  $query4=$adb->query("select vtiger_messages.messagecategory,vtiger_messages.name,vtiger_project.projectid,vtiger_project.spar_associato from vtiger_project join vtiger_messages on project=projectid
   join vtiger_crmentity on crmid=projectid where vtiger_messages.messagecategory like 'CLAIM OPEN%' and vtiger_project.projectid=$prova");
$query5=$adb->query("select vtiger_troubletickets.title,vtiger_troubletickets.status,vtiger_project.projectid from vtiger_troubletickets join vtiger_project on project=projectid
    join vtiger_crmentity on crmid=projectid where vtiger_troubletickets.status not like 'Closed' and vtiger_project.projectid=$prova");
    $data[$i]['id']=$i;
    $data[$i]['added4'] =$adb->query_result($query3,$i,0);
   $data[$i]['added8']=$adb->query_result($query3,$i,8);
   $data[$i]['added2']=$adb->query_result($query3,$i,2);
    $data[$i]['added9']=$adb->query_result($query3,$i,3);
  $data[$i]['added1']=$adb->query_result($query3,$i,4);
   $data[$i]['duration']=$adb->query_result($query3,$i,5);
   $data[$i]['added7']=$adb->query_result($query3,$i,6);
   $data[$i]['added10']=$adb->query_result($query3,$i,'dy');
   $data[$i]['added11']=$adb->query_result($query3,$i,10);
    $data[$i]['added77']=$adb->query_result($query5,$i,0);
     $data[$i]['added777']=$adb->query_result($query4,$i,1);
   //$data[$i]['added3']=$adb->query_result($query,$i,'proj');
  
    
  //  if ($rows['projectname']== NULL)
   /*     $asc2="-";
    else $asc2=$rows['projectname'];
    $data[$i]['added4']=$asc2;
    if ($rows['substatusproj']==NULL)
        $asc3="-";
    else $asc3=$rows['substatusproj'];
    $data[$i]['added5']=$asc3;
    $data[$i]['added6']=$rows['user_name'];
    if($rows['proj2'] == NULL)
        $asc="-";
            else $asc= $rows['proj2'];
        
        $data[$i]['added7']=$rows['accountname'];
    $data[$i]['added8']=$asc;
    $data[$i]['added9'] =$rows['project_id'];
    $data[$i]['added10']=$rows['progetto'];
    $data[$i]['added11'] =$rows['linktoaccountscontacts']; */ 
  
}

$select1.="</SELECT>";
$dataout=  json_encode($data);

$smarty = new vtigerCRM_Smarty;
$smarty->assign("selectContent", $select1);
$smarty->assign("data", $dataout);
$smarty->display("modules/evvtApps/index.tpl");
		
                
	}

	public function doResize($lang,$newWidth=0,$newHeight=0) {
		$this->evvtSaveWH($newWidth,$newHeight);
		return $this->getContent($lang);
	}

	public function evvtSaveWH($wwidth,$wheight) {
		global $adb,$current_user;
		$numrecs=$adb->getone('SELECT count(*) FROM vtiger_evvtappsuser WHERE appid='.$this->appid.' and userid='.$current_user->id);
		if ($numrecs==0) $this->evvtCreateUserApp();
		$adb->pquery("update vtiger_evvtappsuser set wwidth=?,wheight=? where appid=? and userid=?",
				array($wwidth,$wheight,$this->appid,$current_user->id));
	}

	private function getGraphValues($lang) {
		global $log, $adb, $current_user;
		//return '2::3::1::1::2::1';
		$closedstates="'Held'";
		$userlistString = $adb->getone("select users from evvtapp_accountschart where userid={$current_user->id}");
		if (!empty($userlistString)) {
		  $userlistString = implode(',', explode('::', $userlistString));
		  $userwhereString = "and acccrm.smownerid in ({$userlistString})";
		}
		$accounts=$adb->getone("select count(*)
		  from vtiger_crmentity acccrm
		  where deleted=0 and setype='Accounts' {$userwhereString}");
		if ($accounts==0) {
		  $acccitaf = 0;
		  $acccitan = 0;
		  $acccitaa = 0;
		}
		else {
		$acccitaf=$adb->getone("select count(distinct acccrm.crmid)
				from vtiger_activity
				inner join vtiger_seactivityrel on vtiger_seactivityrel.activityid = vtiger_activity.activityid
				inner join vtiger_crmentity as acccrm on acccrm.crmid=vtiger_seactivityrel.crmid
				inner join vtiger_crmentity as actcrm on actcrm.crmid=vtiger_activity.activityid				
				where acccrm.deleted=0 and actcrm.deleted=0 and vtiger_activity.activitytype!='Emails'
				and date_start > now()
				and (vtiger_activity.status is null or vtiger_activity.status not in ('Completed'))
				  and (vtiger_activity.eventstatus is null or vtiger_activity.eventstatus not in ('Held'))
				and acccrm.setype='Accounts' {$userwhereString}");
		$acccitaa=$adb->getone("select count(distinct acccrm.crmid)
				from vtiger_activity
				inner join vtiger_seactivityrel on vtiger_seactivityrel.activityid = vtiger_activity.activityid
				inner join vtiger_crmentity as acccrm on acccrm.crmid=vtiger_seactivityrel.crmid
				inner join vtiger_crmentity as actcrm on actcrm.crmid=vtiger_activity.activityid				
				where acccrm.deleted=0 and actcrm.deleted=0 and vtiger_activity.activitytype!='Emails'
				and date_start <= now()
				and (vtiger_activity.status is null or vtiger_activity.status not in ('Completed'))
				  and (vtiger_activity.eventstatus is null or vtiger_activity.eventstatus not in ('Held'))
				and acccrm.setype='Accounts' {$userwhereString}");
		$acccita=$adb->getone("select count(distinct acccrm.crmid)
				from vtiger_activity
				inner join vtiger_seactivityrel on vtiger_seactivityrel.activityid = vtiger_activity.activityid
				inner join vtiger_crmentity as acccrm on acccrm.crmid=vtiger_seactivityrel.crmid
				inner join vtiger_crmentity as actcrm on actcrm.crmid=vtiger_activity.activityid
				where acccrm.deleted=0 and actcrm.deleted=0 and vtiger_activity.activitytype!='Emails'
				and (vtiger_activity.status is null or vtiger_activity.status not in ('Completed'))
				and (vtiger_activity.eventstatus is null or vtiger_activity.eventstatus not in ('Held'))
				and acccrm.setype='Accounts' {$userwhereString}");
		$acccitaf=round($acccitaf*100/$accounts,2);
		$acccitan=round(($accounts-$acccita)*100/$accounts,2);
		$acccitaa=round($acccitaa*100/$accounts,2);
		}
		return array(0=>$acccitaf,1=>$acccitaa,2=>$acccitan);
	}

	private function getGraphLabels($lang) {
		//return 'Partner::Public Relations::Cold Call::Direct Mail::Employee::--None--';
		return array(
		0=>$this->getvtAppTranslatedString('CitasFuturo',$lang),
		1=>$this->getvtAppTranslatedString('CitasAtrasadas',$lang),
		2=>$this->getvtAppTranslatedString('SinCitas',$lang)
		);
	}

	private function getGraphTargets($lang) {
		//return 'tsolucio.com::linkedin.com::google.es::vtigerspain.com::wtbr.com::hello.com';
		return ' :: :: ';
	}
	
	public function postInstall() {
		global $adb;
		$adb->query('CREATE TABLE IF NOT EXISTS `evvtapp_accountschart` (
				`vtapppgid` int(11) NOT NULL AUTO_INCREMENT,
				`userid` int(11) NOT NULL,
				`users` varchar(250) NOT NULL,
				PRIMARY KEY (`vtapppgid`),
				UNIQUE KEY `userid` (`userid`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');
	}
	
	public function getEdit($lang) {
		global $app_strings,$current_user,$currentModule,$adb;
		$users = explode('::', $adb->getone("select users from evvtapp_accountschart where userid={$current_user->id}"));
		ob_start();
		?>
		<form name='pipeline_by_sales_stage' id='pipeline_by_sales_stage' action="index.php" method="post" >
		<input type="hidden" name="module" value="evvtApps">
		<input type="hidden" name="action" value="evvtAppsAjax">
		<input type="hidden" name="file" value="vtappaction">
		<input type="hidden" name="vtappaction" value="dovtAppMethod">
		<input type="hidden" name="vtappmethod" value="savepgvars">
		<input type="hidden" name="class" value="vtAppcomTSolucioDemoGraph1">
		<input type="hidden" name="appid" value="<?php echo $this->appid; ?>">
		<table cellpadding="2" border="0"><tbody>
		<tr>
		<td valign='top' nowrap><?php echo getTranslatedString('LBL_USERS','Dashboard');?></td>
		<?php if($is_admin==false && $profileGlobalPermission[2] == 1 && ($defaultOrgSharingPermission[getTabid('Potentials')] == 3 or $defaultOrgSharingPermission[getTabid('Potentials')] == 0)) { ?>
		<td valign='top'><select name="pbss_ids[]" multiple size='3'><?php echo get_select_options_with_id(get_user_array(FALSE, "Active", $current_user->id,'private'), $users); ?></select></td>
		<?php } else { ?>
		<td valign='top'><select name="pbss_ids[]" multiple size='3'><?php echo get_select_options_with_id(get_user_array(FALSE,"Active",$current_user->id), $users); ?></select></td>
		<?php } ?>
		</tr><tr>
		<td align="right"><br /> <input class="button" onclick="$.post('index.php', $('#pipeline_by_sales_stage').serialize());$('#vtappedit<?php echo $this->appid; ?>').data('kendoWindow').close()" type="button" title="<?php echo $app_strings['LBL_SELECT_BUTTON_TITLE']; ?>" accessKey="<?php echo $app_strings['LBL_SELECT_BUTTON_KEY']; ?>" value="<?php echo $app_strings['LBL_SELECT_BUTTON_LABEL']?>" /></td>
		</tr></table>
		</form>
		<?php
		$output=ob_get_contents();
		ob_end_clean();
		return $output;
	}
	
	public function savepgvars() {
		global $log,$current_user,$adb;
		$users=implode('::',$_REQUEST['pbss_ids']);
		$rdo=$adb->getOne('select count(*) from evvtapp_accountschart where userid='.$current_user->id);
		if ($rdo==0) {
			$adb->pquery('insert into evvtapp_accountschart 
			  (userid,users) values (?,?)',
			  array($current_user->id,$users));
		} else {
			$adb->pquery('update evvtapp_accountschart set
			  users=?
			  where userid=?',
			  array($users,$current_user->id));
		}
	}
}
?>
