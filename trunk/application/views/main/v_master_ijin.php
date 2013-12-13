<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var ster_ijin_componentItemTitle="STER_IJIN";
		var ster_ijin_dataStore;
		
		var ster_ijin_shorcut;
		var ster_ijin_contextMenu;
		var ster_ijin_gridSearchField;
		var ster_ijin_gridPanel;
		var ster_ijin_formPanel;
		var ster_ijin_formWindow;
		var ster_ijin_searchPanel;
		var ster_ijin_searchWindow;
		
		var ID_IJINField;
		var NAMA_IJINField;
		var NAMA_PEJABATField;
		var NIP_PEJABATField;
		var JABATANField;
		var PANGKATField;
		var ATASNAMAField;
				
		var NAMA_IJINSearchField;
		var NAMA_PEJABATSearchField;
		var NIP_PEJABATSearchField;
		var JABATANSearchField;
		var PANGKATSearchField;
		var ATASNAMASearchField;
				
		var ster_ijin_dbTask = 'CREATE';
		var ster_ijin_dbTaskMessage = 'Tambah';
		var ster_ijin_dbPermission = 'CRUD';
		var ster_ijin_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function ster_ijin_switchToGrid(){
			ster_ijin_formPanel.setDisabled(true);
			ster_ijin_gridPanel.setDisabled(false);
			ster_ijin_formWindow.hide();
		}
		
		function ster_ijin_switchToForm(){
			ster_ijin_gridPanel.setDisabled(true);
			ster_ijin_formPanel.setDisabled(false);
			ster_ijin_formWindow.show();
		}
		
		function ster_ijin_confirmAdd(){
			ster_ijin_dbTask = 'CREATE';
			ster_ijin_dbTaskMessage = 'created';
			ster_ijin_resetForm();
			ster_ijin_switchToForm();
		}
		
		function ster_ijin_confirmUpdate(){
			if(ster_ijin_gridPanel.selModel.getCount() == 1) {
				ster_ijin_dbTask = 'UPDATE';
				ster_ijin_dbTaskMessage = 'updated';
				ster_ijin_switchToForm();
				ster_ijin_setForm();
			}else{
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalNoSelection,
					buttons : Ext.MessageBox.OK,
					animEl : 'save',
					icon : Ext.MessageBox.WARNING
				});
			}
		}
		
		function ster_ijin_confirmDelete(){
			if(ster_ijin_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, ster_ijin_delete);
			}else if(ster_ijin_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, ster_ijin_delete);
			}else{
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalNoSelection,
					buttons : Ext.MessageBox.OK,
					animEl : 'save',
					icon : Ext.MessageBox.WARNING
				});
			}
		}
		
		function ster_ijin_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(ster_ijin_dbPermission)==false && pattC.test(ster_ijin_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(ster_ijin_confirmFormValid()){
					var ID_IJINValue = '';
					var NAMA_IJINValue = '';
					var NAMA_PEJABATValue = '';
					var NIP_PEJABATValue = '';
					var JABATANValue = '';
					var PANGKATValue = '';
					var ATASNAMAValue = '';
										
					ID_IJINValue = ID_IJINField.getValue();
					NAMA_IJINValue = NAMA_IJINField.getValue();
					NAMA_PEJABATValue = NAMA_PEJABATField.getValue();
					NIP_PEJABATValue = NIP_PEJABATField.getValue();
					JABATANValue = JABATANField.getValue();
					PANGKATValue = PANGKATField.getValue();
					ATASNAMAValue = ATASNAMAField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_master_ijin/switchAction',
						params: {							
							ID_IJIN : ID_IJINValue,
							NAMA_IJIN : NAMA_IJINValue,
							NAMA_PEJABAT : NAMA_PEJABATValue,
							NIP_PEJABAT : NIP_PEJABATValue,
							JABATAN : JABATANValue,
							PANGKAT : PANGKATValue,
							ATASNAMA : ATASNAMAValue,
							action : ster_ijin_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									ster_ijin_dataStore.reload();
									ster_ijin_resetForm();
									ster_ijin_switchToGrid();
									ster_ijin_gridPanel.getSelectionModel().deselectAll();
									break;
								case 'duplicateCode':
									Ext.MessageBox.show({
										title : 'Warning',
										msg : globalFailedDuplicateCode,
										buttons : Ext.MessageBox.OK,
										animEl : 'save',
										icon : Ext.MessageBox.WARNING
									});
									break;
								case 'sessionExpired':
									Ext.MessageBox.show({
										title : 'Warning',
										msg : globalSessionExpiredMessage,
										buttons : Ext.MessageBox.OK,
										animEl : 'save',
										icon : Ext.MessageBox.WARNING,
										fn : function(btn){
											window.location="index.php";
										}
									});
									break;
								default:
									Ext.MessageBox.show({
										title : 'Warning',
										msg : globalFailedSave,
										buttons : Ext.MessageBox.OK,
										animEl : 'save',
										icon : Ext.MessageBox.WARNING
									});
									break;
							}
						},
						failure: function(response){
							ajaxWaitMessage.hide();
							var result=response.responseText;
							Ext.MessageBox.show({
								title : 'Error',
								msg : globalFailedConnection,
								buttons : Ext.MessageBox.OK,
								animEl : 'database',
								icon : Ext.MessageBox.ERROR
							});
						}
					});
				}else{
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalInvalidForm,
						buttons : Ext.MessageBox.OK,
						animEl : 'save',
						icon : Ext.MessageBox.WARNING
					});
				}
			}
		}
		
		function ster_ijin_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(ster_ijin_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = ster_ijin_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< ster_ijin_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.ID_IJIN);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_master_ijin/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									ster_ijin_dataStore.reload();
									break;
								default:
									Ext.MessageBox.show({
										title : 'Warning',
										msg : globalFailedDelete,
										buttons : Ext.MessageBox.OK,
										animEl : 'save',
										icon : Ext.MessageBox.WARNING
									});
									break;
							}
						},
						failure: function(response){
							ajaxWaitMessage.hide();
							var result=response.responseText;
							Ext.MessageBox.show({
								title : 'Error',
								msg : globalFailedConnection,
								buttons : Ext.MessageBox.OK,
								animEl : 'database',
								icon : Ext.MessageBox.ERROR
							});
						}
					});
				}
			}
		}
		
		function ster_ijin_refresh(){
			ster_ijin_dbListAction = "GETLIST";
			ster_ijin_gridSearchField.reset();
			ster_ijin_searchPanel.getForm().reset();
			ster_ijin_dataStore.proxy.extraParams = { action : 'GETLIST' };
			ster_ijin_dataStore.proxy.extraParams.query = "";
			ster_ijin_dataStore.currentPage = 1;
			ster_ijin_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function ster_ijin_confirmFormValid(){
			return ster_ijin_formPanel.getForm().isValid();
		}
		
		function ster_ijin_resetForm(){
			ster_ijin_dbTask = 'CREATE';
			ster_ijin_dbTaskMessage = 'create';
			ster_ijin_formPanel.getForm().reset();
			ID_IJINField.setValue(0);
		}
		
		function ster_ijin_setForm(){
			ster_ijin_dbTask = 'UPDATE';
            ster_ijin_dbTaskMessage = 'update';
			
			var record = ster_ijin_gridPanel.getSelectionModel().getSelection()[0];
			ID_IJINField.setValue(record.data.ID_IJIN);
			NAMA_IJINField.setValue(record.data.NAMA_IJIN);
			NAMA_PEJABATField.setValue(record.data.NAMA_PEJABAT);
			NIP_PEJABATField.setValue(record.data.NIP_PEJABAT);
			JABATANField.setValue(record.data.JABATAN);
			PANGKATField.setValue(record.data.PANGKAT);
			ATASNAMAField.setValue(record.data.ATASNAMA);
					}
		
		function ster_ijin_showSearchWindow(){
			ster_ijin_searchWindow.show();
		}
		
		function ster_ijin_search(){
			ster_ijin_gridSearchField.reset();
			
			var NAMA_IJINValue = '';
			var NAMA_PEJABATValue = '';
			var NIP_PEJABATValue = '';
			var JABATANValue = '';
			var PANGKATValue = '';
			var ATASNAMAValue = '';
						
			NAMA_IJINValue = NAMA_IJINSearchField.getValue();
			NAMA_PEJABATValue = NAMA_PEJABATSearchField.getValue();
			NIP_PEJABATValue = NIP_PEJABATSearchField.getValue();
			JABATANValue = JABATANSearchField.getValue();
			PANGKATValue = PANGKATSearchField.getValue();
			ATASNAMAValue = ATASNAMASearchField.getValue();
			ster_ijin_dbListAction = "SEARCH";
			ster_ijin_dataStore.proxy.extraParams = { 
				NAMA_IJIN : NAMA_IJINValue,
				NAMA_PEJABAT : NAMA_PEJABATValue,
				NIP_PEJABAT : NIP_PEJABATValue,
				JABATAN : JABATANValue,
				PANGKAT : PANGKATValue,
				ATASNAMA : ATASNAMAValue,
				action : 'SEARCH'
			};
			ster_ijin_dataStore.currentPage = 1;
			ster_ijin_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function ster_ijin_printExcel(outputType){
			var searchText = "";
			var NAMA_IJINValue = '';
			var NAMA_PEJABATValue = '';
			var NIP_PEJABATValue = '';
			var JABATANValue = '';
			var PANGKATValue = '';
			var ATASNAMAValue = '';
			
			if(ster_ijin_dataStore.proxy.extraParams.query!==null){searchText = ster_ijin_dataStore.proxy.extraParams.query;}
			if(ster_ijin_dataStore.proxy.extraParams.NAMA_IJIN!==null){NAMA_IJINValue = ster_ijin_dataStore.proxy.extraParams.NAMA_IJIN;}
			if(ster_ijin_dataStore.proxy.extraParams.NAMA_PEJABAT!==null){NAMA_PEJABATValue = ster_ijin_dataStore.proxy.extraParams.NAMA_PEJABAT;}
			if(ster_ijin_dataStore.proxy.extraParams.NIP_PEJABAT!==null){NIP_PEJABATValue = ster_ijin_dataStore.proxy.extraParams.NIP_PEJABAT;}
			if(ster_ijin_dataStore.proxy.extraParams.JABATAN!==null){JABATANValue = ster_ijin_dataStore.proxy.extraParams.JABATAN;}
			if(ster_ijin_dataStore.proxy.extraParams.PANGKAT!==null){PANGKATValue = ster_ijin_dataStore.proxy.extraParams.PANGKAT;}
			if(ster_ijin_dataStore.proxy.extraParams.ATASNAMA!==null){ATASNAMAValue = ster_ijin_dataStore.proxy.extraParams.ATASNAMA;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_master_ijin/switchAction',
				params : {
					action : outputType,
					query : searchText,
					NAMA_IJIN : NAMA_IJINValue,
					NAMA_PEJABAT : NAMA_PEJABATValue,
					NIP_PEJABAT : NIP_PEJABATValue,
					JABATAN : JABATANValue,
					PANGKAT : PANGKATValue,
					ATASNAMA : ATASNAMAValue,
					currentAction : ster_ijin_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/master_ijin_list.xls');
							}else{
								window.open('./print/master_ijin_list.html','ster_ijinlist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
							}
						break;
						default:
							Ext.MessageBox.show({
							title : 'Warning',
							msg : globalFailedPrint,
							buttons : Ext.MessageBox.OK,
							animEl : 'save',
							icon : Ext.MessageBox.WARNING
						});
						break;
					}
				},
				failure: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					Ext.MessageBox.show({
						title : 'Error',
						msg : globalFailedConnection,
						buttons : Ext.MessageBox.OK,
						animEl : 'database',
						icon : Ext.MessageBox.ERROR
					});
				}
			});
		}
/* End function declaration */
/* Start DataStore declaration */
		ster_ijin_dataStore = Ext.create('Ext.data.Store',{
			id : 'ster_ijin_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_master_ijin/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'ID_IJIN'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'ID_IJIN', type : 'int', mapping : 'ID_IJIN' },
				{ name : 'NAMA_IJIN', type : 'string', mapping : 'NAMA_IJIN' },
				{ name : 'NAMA_PEJABAT', type : 'string', mapping : 'NAMA_PEJABAT' },
				{ name : 'NIP_PEJABAT', type : 'string', mapping : 'NIP_PEJABAT' },
				{ name : 'JABATAN', type : 'string', mapping : 'JABATAN' },
				{ name : 'PANGKAT', type : 'string', mapping : 'PANGKAT' },
				{ name : 'ATASNAMA', type : 'string', mapping : 'ATASNAMA' },
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		ster_ijin_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						ster_ijin_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						ster_ijin_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						ster_ijin_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						ster_ijin_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						ster_ijin_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						ster_ijin_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						ster_ijin_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						ster_ijin_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var ster_ijin_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : ster_ijin_confirmAdd
		});
		var ster_ijin_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : ster_ijin_confirmUpdate
		});
		var ster_ijin_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : ster_ijin_confirmDelete
		});
		var ster_ijin_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : ster_ijin_refresh
		});
		var ster_ijin_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : ster_ijin_showSearchWindow
		});
		var ster_ijin_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				ster_ijin_printExcel('PRINT');
			}
		});
		var ster_ijin_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				ster_ijin_printExcel('EXCEL');
			}
		});
		
		var ster_ijin_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : ster_ijin_confirmUpdate
		});
		var ster_ijin_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : ster_ijin_confirmDelete
		});
		var ster_ijin_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : ster_ijin_refresh
		});
		ster_ijin_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'ster_ijin_contextMenu',
			items: [
				ster_ijin_contextMenuEdit,ster_ijin_contextMenuDelete,'-',ster_ijin_contextMenuRefresh
			]
		});
		
		ster_ijin_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : ster_ijin_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						ster_ijin_dataStore.proxy.extraParams = { action : 'GETLIST'};
						ster_ijin_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		ster_ijin_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'ster_ijin_gridPanel',
			constrain : true,
			store : ster_ijin_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'ster_ijinGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						ster_ijin_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : ster_ijin_shorcut,
			columns : [
				{
					text : 'NAMA_IJIN',
					dataIndex : 'NAMA_IJIN',
					width : 100,
					sortable : false
				},
				{
					text : 'NAMA_PEJABAT',
					dataIndex : 'NAMA_PEJABAT',
					width : 100,
					sortable : false
				},
				{
					text : 'NIP_PEJABAT',
					dataIndex : 'NIP_PEJABAT',
					width : 100,
					sortable : false
				},
				{
					text : 'JABATAN',
					dataIndex : 'JABATAN',
					width : 100,
					sortable : false
				},
				{
					text : 'PANGKAT',
					dataIndex : 'PANGKAT',
					width : 100,
					sortable : false
				},
				{
					text : 'ATASNAMA',
					dataIndex : 'ATASNAMA',
					width : 100,
					sortable : false
				},
							
			],
			tbar : [
				ster_ijin_addButton,
				ster_ijin_editButton,
				ster_ijin_deleteButton,
				ster_ijin_gridSearchField,
				ster_ijin_searchButton,
				ster_ijin_refreshButton,
				ster_ijin_printButton,
				ster_ijin_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : ster_ijin_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					ster_ijin_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		ID_IJINField = Ext.create('Ext.form.NumberField',{
			id : 'ID_IJINField',
			name : 'ID_IJIN',
			fieldLabel : 'ID_IJIN<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		NAMA_IJINField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_IJINField',
			name : 'NAMA_IJIN',
			fieldLabel : 'NAMA_IJIN',
			maxLength : 100
		});
		NAMA_PEJABATField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_PEJABATField',
			name : 'NAMA_PEJABAT',
			fieldLabel : 'NAMA_PEJABAT',
			maxLength : 255
		});
		NIP_PEJABATField = Ext.create('Ext.form.TextField',{
			id : 'NIP_PEJABATField',
			name : 'NIP_PEJABAT',
			fieldLabel : 'NIP_PEJABAT',
			maxLength : 255
		});
		JABATANField = Ext.create('Ext.form.TextField',{
			id : 'JABATANField',
			name : 'JABATAN',
			fieldLabel : 'JABATAN',
			maxLength : 255
		});
		PANGKATField = Ext.create('Ext.form.TextField',{
			id : 'PANGKATField',
			name : 'PANGKAT',
			fieldLabel : 'PANGKAT',
			maxLength : 255
		});
		ATASNAMAField = Ext.create('Ext.form.TextField',{
			id : 'ATASNAMAField',
			name : 'ATASNAMA',
			fieldLabel : 'ATASNAMA',
			maxLength : 255
		});
		var ster_ijin_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : ster_ijin_save
		});
		var ster_ijin_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				ster_ijin_resetForm();
				ster_ijin_switchToGrid();
			}
		});
		ster_ijin_formPanel = Ext.create('Ext.form.Panel', {
			disabled : true,
			fieldDefaults: {
				msgTarget: 'side'
			},
			layout : {
				type : 'vbox',
				align : 'stretch',
				padding : 5
			},
			items: [
				{
					xtype : 'container',
					layout : 'hbox',
					style : {borderWidth :'0px'},
					defaultType : 'textfield',
					defaults : {anchor : '95%'},
					layout : 'anchor',
					flex : 2,
					items : [
						ID_IJINField,
						NAMA_IJINField,
						NAMA_PEJABATField,
						NIP_PEJABATField,
						JABATANField,
						PANGKATField,
						ATASNAMAField,
											]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [ster_ijin_saveButton,ster_ijin_cancelButton]
		});
		ster_ijin_formWindow = Ext.create('Ext.window.Window',{
			id : 'ster_ijin_formWindow',
			renderTo : 'ster_ijinSaveWindow',
			title : globalFormAddEditTitle + ' ' + ster_ijin_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [ster_ijin_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		NAMA_IJINSearchField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_IJINSearchField',
			name : 'NAMA_IJIN',
			fieldLabel : 'NAMA_IJIN',
			maxLength : 100
		
		});
		NAMA_PEJABATSearchField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_PEJABATSearchField',
			name : 'NAMA_PEJABAT',
			fieldLabel : 'NAMA_PEJABAT',
			maxLength : 255
		
		});
		NIP_PEJABATSearchField = Ext.create('Ext.form.TextField',{
			id : 'NIP_PEJABATSearchField',
			name : 'NIP_PEJABAT',
			fieldLabel : 'NIP_PEJABAT',
			maxLength : 255
		
		});
		JABATANSearchField = Ext.create('Ext.form.TextField',{
			id : 'JABATANSearchField',
			name : 'JABATAN',
			fieldLabel : 'JABATAN',
			maxLength : 255
		
		});
		PANGKATSearchField = Ext.create('Ext.form.TextField',{
			id : 'PANGKATSearchField',
			name : 'PANGKAT',
			fieldLabel : 'PANGKAT',
			maxLength : 255
		
		});
		ATASNAMASearchField = Ext.create('Ext.form.TextField',{
			id : 'ATASNAMASearchField',
			name : 'ATASNAMA',
			fieldLabel : 'ATASNAMA',
			maxLength : 255
		
		});
		var ster_ijin_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : ster_ijin_search
		});
		var ster_ijin_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				ster_ijin_searchWindow.hide();
			}
		});
		ster_ijin_searchPanel = Ext.create('Ext.form.Panel', {
			layout : {
				type : 'vbox',
				align : 'stretch',
				padding : 5
			},
			items: [
				{
					xtype : 'container',
					layout : 'hbox',
					style : {borderWidth :'0px'},
					defaultType : 'textfield',
					defaults : {anchor : '95%'},
					layout : 'anchor',
					flex : 2,
					items : [
						NAMA_IJINSearchField,
						NAMA_PEJABATSearchField,
						NIP_PEJABATSearchField,
						JABATANSearchField,
						PANGKATSearchField,
						ATASNAMASearchField,
						]
				}],
			buttons : [ster_ijin_searchingButton,ster_ijin_cancelSearchButton]
		});
		ster_ijin_searchWindow = Ext.create('Ext.window.Window',{
			id : 'ster_ijin_searchWindow',
			renderTo : 'ster_ijinSearchWindow',
			title : globalFormSearchTitle + ' ' + ster_ijin_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [ster_ijin_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="ster_ijinSaveWindow"></div>
<div id="ster_ijinSearchWindow"></div>
<div class="span12" id="ster_ijinGrid"></div>