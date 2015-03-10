<?php
/*************************************************************************************************
 * Copyright 2015 JPL TSolucio, S.L. -- This file is a part of TSOLUCIO coreBOS Customizations.
 * Licensed under the vtiger CRM Public License Version 1.1 (the "License"); you may not use this
 * file except in compliance with the License. You can redistribute it and/or modify it
 * under the terms of the License. JPL TSolucio, S.L. reserves all rights not expressly
 * granted by the License. coreBOS distributed by JPL TSolucio S.L. is distributed in
 * the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied
 * warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. Unless required by
 * applicable law or agreed to in writing, software distributed under the License is
 * distributed on an "AS IS" BASIS, WITHOUT ANY WARRANTIES OR CONDITIONS OF ANY KIND,
 * either express or implied. See the License for the specific language governing
 * permissions and limitations under the License. You may obtain a copy of the License
 * at <http://corebos.org/documentation/doku.php?id=en:devel:vpl11>
 *************************************************************************************************
 *  Version      : 1.0
 *  Author       : JPL TSolucio, S. L.
 *************************************************************************************************/
require_once('modules/com_vtiger_workflow/VTSimpleTemplate.inc');
class VTSimpleTemplateOnData extends VTSimpleTemplate {

	function render($entityCache, $modulename, $data){
		$this->cache = $entityCache;
		$this->parent = $this;
		$this->data = $data;
		$this->moduleName = $modulename;
		return $this->parseTemplate();
	}

	/**
	 * Get the data from the entity object as an array.
	 *
	 * @return An array representation of the module data.
	 */
	function getData(){
		return $this->data;
	}

	function get($fieldName){
		return $this->data[$fieldName];
	}

	public static function cbgetWSEntityId($entityName) {
		global $adb,$log;
		$wsrs=$adb->pquery('select id from vtiger_ws_entity where name=?',array($entityName));
		if ($wsrs and $adb->num_rows($wsrs)==1) {
			$wsid = $adb->query_result($wsrs,0,0);
		} else {
			$wsid = 0;
		}
		return $wsid.'x';
	}
}
?>