<div id="Monitoraggio_Days_On_custom1a230bfb115cce0a0a087e487a278aaa"></div>
<div id="vkendo" class="k-content" style="display:none;">
           

            <script>
                  {literal}

              jQuery(document).ready(function() {
               var cond1="{/literal}{$cond1}{literal}";
                    var kURL="module=evvtApps&action=evvtAppsAjax&file=getMonitoraggio_Days_On_custom1a230bfb115cce0a0a087e487a278aaa&condit="+cond1;


                    var element = jQuery("#Monitoraggio_Days_On_custom1a230bfb115cce0a0a087e487a278aaa").kendoGrid({        dataBound: function (e) {

                CollapseAllRows();

            }  ,
                        dataSource: new kendo.data.DataSource({  
                            type: "json",
                                    transport: {
                                    read: {
                                        url: "index.php?"+kURL,
                                        dataType: "json"
                                    },
                                     parameterMap: function(options, operation) {
                                    if (operation !== "read" && options.models) {
                                        return {models: kendo.stringify(options.models)};
                                    }
                                }

                        },
                     
                           // pageSize: 20,
                            batch:true,
      

                                schema: {
                                model: {
                                    id: "projectid",
                                                                                
                                    fields: {/literal}{$field}{literal},
                                    }
                                },
                                               {/literal}
                                {if $grp neq 0}
                                 {literal}
                                group: {/literal}{$group}{literal}, {/literal}
                                                                {/if}
                                {if $agg neq 0} {literal}
                                aggregate: {/literal}{$aggregate}
                                                                                                {/if}
{literal}


                        }),
                        height: 500,
                        sortable: true,
                       // pageable: true,
                       filterable:true,
                         groupable:true,
                        editable: "popup",
                        columns: {/literal}{$column}{literal},
                      });
            });
                 function nonFlatFields(container, options) {
                    jQuery("<input />")
                        .appendTo(container)
			.kendoAutoComplete({
                        minLength: 2,
                        dataSource: {
                       
                        }
                    });
                    }
                    function CollapseAllRows() {

                                var grid = $("#Monitoraggio_Days_On_custom1a230bfb115cce0a0a087e487a278aaa").data("kendoGrid");

                                grid.tbody.find(">tr.k-grouping-row").each(

                                    function (e) {

                                        grid.collapseRow(this);

                                    });

                            }
                 {/literal}
            </script>
            <style scoped="scoped">
                {literal}
                .employee-details ul
                {
                    list-style:none;
                    font-style:italic;
                    margin-bottom: 20px;
                }
		.k-autocomplete {
                	width: 135px;
                    vertical-align: middle;
                }
                .employee-details label
                {
                    display:inline-block;
                    width:90px;
                    font-style:normal;
                    font-weight:bold;
                }
                {/literal}
            </style>
        </div>
