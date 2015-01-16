<?php 
    include_once("modules/Reports/Reports.php");
include("modules/Reports/ReportRun.php");
require('user_privileges/sharing_privileges_'.$current_user->id.'.php');
require('user_privileges/user_privileges_'.$current_user->id.'.php');
global $adb;
$fp = fopen('HR_SCORE__customcae3627b7f9b4c4ecaa7a404ecc10cb8.csv', 'a');
if("mv"=="none" || "mv"=="report"){
    $type="";
      $nu="a";
$reportid="";
$focus1=new ReportRun($reportid);
	$currencyfieldres = $adb->pquery("SELECT tabid, fieldlabel, uitype from vtiger_field WHERE uitype in (71,72,10)", array());
		if($currencyfieldres) {
			foreach($currencyfieldres as $currencyfieldrow) {
				$modprefixedlabel = getTabModuleName($currencyfieldrow['tabid'])." ".$currencyfieldrow['fieldlabel'];
				$modprefixedlabel = str_replace(' ','_',$modprefixedlabel);

				if($currencyfieldrow['uitype']!=10){
					if(!in_array($modprefixedlabel, $focus1->convert_currency) && !in_array($modprefixedlabel, $focus1->append_currency_symbol_to_value)) {
						$focus1->convert_currency[] = $modprefixedlabel;
					}
				} else {

					if(!in_array($modprefixedlabel, $focus1->ui10_fields)) {
						$focus1->ui10_fields[] = $modprefixedlabel;
					}
				}
			}
		}
$reportquery=$focus1->sGetSQLforReport($reportid,$nu);

        $rq=explode("from",$reportquery);
        if("0"=="1"){

           $f=explode(",",str_replace('select','',$rq[0]));
    $grp=explode(",",",,,,,,,,,,");
    $suba=explode(",",",,,,,,,,,,");

 $group=array();
  $k=0;
  $fld=explode(",","CAT,SOGLIE,soglieid,TengagementclienteHR,TpartrequestHR,TsentbyTekHR,TconfirmreceivHR,TrepairingHR,TripsenzapartiHR,TcloseHR,TclosewithoutpartHR");

for($j=0;$j<sizeof($suba);$j++){
 $in=key(preg_grep("/\b$fld[$j]\b/i", $f));


 $ff1=explode('AS',$f[$in]);
 $ff2=explode(' as ',$ff1[0]);
 $ff=$ff2[0];

if($grp[$j]==1) {$group[$k]=$ff;
$k++;}
    if($suba[$j]!='')
        $fields.=$suba[$j].'('.$ff.') as '.str_replace(".","",$fld[$j]).',';
    else $fields.=$ff.' as '.str_replace(".","",$fld[$j]).',';
}


$group2=implode(",",$group);
                $qr=strtolower("select $fields .id as primid FROM ".$rq[1]." group by $group2");
}
        else{
        $qr=strtolower($rq[0]." ,.id as primid FROM ".$rq[1]);}
            }
        
          else {
              $query1="show columns from mv_soglia_hr";
$checkf=explode(",","1,1,,1,1,1,1,1,1,1,1,1");

	$result1 = $adb->query($query1);
	$num_rows1=$adb->num_rows($result1);
        if($num_rows1!=0){
$j=0;

	for($i1=1;$i1<=$num_rows1;$i1++)
	{
         $f=$adb->query_result($result1,$i1-1);
         if($checkf[$i1-1]==1)  $fl[$i1-1]=$f." AS ".$f;
       if(substr($f,-2)=="id" && $j==0 ) {$fname=$f;
       $fname1=str_replace("id","",$fname);
       $tab=$adb->query("select * from vtiger_tab where name like \"$fname1\"");
       if($adb->num_rows($tab)!=0)
       $md1=$adb->query_result($tab,0,"name");
}
}}

             $fl=implode(",",$fl);
                $rq=explode("from","select $fl from mv_soglia_hr ");
              
   if("0"=="1"){

           $f=explode(",",str_replace('select','',$rq[0]));
    $grp=explode(",",",,,,,,,,,,");
    $suba=explode(",",",,,,,,,,,,");

 $group=array();
 $fld=explode(",","CAT,SOGLIE,soglieid,TengagementclienteHR,TpartrequestHR,TsentbyTekHR,TconfirmreceivHR,TrepairingHR,TripsenzapartiHR,TcloseHR,TclosewithoutpartHR");

for($j=0;$j<sizeof($suba);$j++){
 $in=key(preg_grep("/\b$fld[$j]\b/i", $f));


 $ff1=explode('AS',$f[$in]);
 $ff2=explode(' as ',$ff1[0]);
 $ff=$ff2[0];

if($grp[$j]==1) {$group[$k]=$ff;
$k++;}
if($checkf[$j]==1){
    if($suba[$j]!='')
        $fields.=$suba[$j].'('.$ff.') as '.str_replace(".","",$fld[$j]).',';
    else $fields.=$ff.' as '.str_replace(".","",$fld[$j]).',';}
}

$group2=implode(",",$group);
                $qr=strtolower("select $fields $fname as primid FROM ".$rq[1]." group by $group2");
}
  else{
        $qr=strtolower($rq[0]." ,$fname as primid FROM ".$rq[1]);}
            }
            if(""!="") $lim="Limit 0,";
        else $lim="";
              if($_REQUEST["condit"]!="") $co=$_REQUEST["condit"];
else $co="";
 if($is_admin==false && $profileGlobalPermission[2] == 1 && ($defaultOrgSharingPermission[getTabid("Accounts")] == 3 or $defaultOrgSharingPermission[getTabid("Accounts")] == 0))
		{           

			$users_combo = get_select_options_array(get_user_array(FALSE, "Active", $current_user->id,'private'), $current_user->id);
		}
		else
		{            

			$users_combo = get_select_options_array(get_user_array(FALSE, "Active", $current_user->id), $current_user->id);
		}

                 $u=Array();
                 $j=0;
                foreach($users_combo as $key_one=>$arr){
                       foreach($arr as $sel_value=>$value){
                   
                   $u[$j]=$key_one;
                   $j++;
                }} 
                $u=implode(",",$u);
                if($current_user->is_admin=='off')
                $condd="where soglieid in (select crmid from vtiger_crmentity where smownerid in ($u) and deleted=0)";
        else $condd='';
                $query=$adb->query($qr."  ".$co." ".$condd." ".$lim);          
        $count=$adb->num_rows($query);
$fld=explode(",","CAT,SOGLIE,soglieid,TengagementclienteHR,TpartrequestHR,TsentbyTekHR,TconfirmreceivHR,TrepairingHR,TripsenzapartiHR,TcloseHR,TclosewithoutpartHR");
    $ch=explode(",","");
 if($count!=0){ $i=0;
for($i1=0;$i1<$count;$i1++){

   $content[$i]["id"]=$adb->query_result($query,$i1,"primid");
              for($k=0;$k<sizeof($fld);$k++){
$name=strtolower($fld[$k]);
$namec=$fld[$k];
$j=$ch[$k];
              $name1=str_replace(".","",str_replace("_","",strtolower($fld[$k])));
           if(strstr($name,"Assigned_To")){ $u=$adb->pquery("select * from vtiger_users where id=?",array($adb->query_result($query,$i1,"$name")));
   if($adb->num_rows($u)!=0)
$us=getUsername($adb->query_result($query,$i1,"$name"));
  else {$us1=getGroupname($adb->query_result($query,$i1,"$name"));
          $us=$us1[0];
  }

   $content[$i]["$name1"]=$us;}
      else if (in_array($namec,$focus1->ui10_fields)) {


								$type = getSalesEntityType($adb->query_result($query,$i1,"$name"));
								$tmp =getEntityName($type,$adb->query_result($query,$i1,"$name"));
								if (is_array($tmp)){
									foreach($tmp as $key=>$val){
                                                                       if($val==null) $val="";
										  $content[$i]["$name1"] = $val;

										break;
									}
								}}
   else{
         if($adb->query_result($query,$i1,"$name")==null) $s="";
          else $s=$adb->query_result($query,$i1,"$name");
           $content[$i]["$name1"]=$s;}
       }
       if(""!="")
       $md1="";
         
       $content[$i]["url"]="index.php?module=$md1&action=DetailView&record=". $content[$i]["id"];
             fputcsv($fp, $content[$i],";");
      
      $i++; 
} 
       fclose($fp);
echo json_encode($content);}
else echo json_encode("");

?>