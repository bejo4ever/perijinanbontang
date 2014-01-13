<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var simb_ceklist_componentItemTitle="SIMB_CEKLIST";
		var simb_ceklist_dataStore;
		
		var simb_ceklist_shorcut;
		var simb_ceklist_contextMenu;
		var simb_ceklist_gridSearchField;
		var simb_ceklist_gridPanel;
		var simb_ceklist_formPanel;
		var simb_ceklist_formWindow;
		var simb_ceklist_searchPanel;
		var simb_ceklist_searchWindow;
		
		var simb_cek_idField;
		var simb_cek_simb_idField;
		var simb_cek_simbdet_idField;
		var simb_cek_syarat_idField;
		var simb_cek_statusField;
		var simb_cek_keteranganField;
				
		var simb_cek_simb_idSearchField;
		var simb_cek_simbdet_idSearchField;
		var simb_cek_syarat_idSearchField;
		var simb_cek_statusSearchField;
		var simb_cek_keteranganSearchField;
				
		var simb_ceklist_dbTask = 'CREATE';
		var simb_ceklist_dbTaskMessage = 'Tambah';
		var simb_ceklist_dbPermission = 'CRUD';
		var simb_ceklist_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function simb_ceklist_switchToGrid(){
			simb_ceklist_formPanel.setDisabled(true);
			simb_ceklist_gridPanel.setDisabled(false);
			simb_ceklist_formWindow.hide();
		}
		
		function simb_ceklist_switchToForm(){
			simb_ceklist_gridPanel.setDisabled(true);
			simb_ceklist_formPanel.setDisabled(false);
			simb_ceklist_formWindow.show();
		}
		
		function simb_ceklist_confirmAdd(){
			simb_ceklist_dbTask = 'CREATE';
			simb_ceklist_dbTaskMessage = 'created';
			simb_ceklist_resetForm();
			simb_ceklist_switchToForm();
		}
		
		function simb_ceklist_confirmUpdate(){
			if(simb_ceklist_gridPanel.selModel.getCount() == 1) {
				simb_ceklist_dbTask = 'UPDATE';
				simb_ceklist_dbTaskMessage = 'updated';
				simb_ceklist_switchToForm();
				simb_ceklist_setForm();
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
		
		function simb_ceklist_confirmDelete(){
			if(simb_ceklist_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, simb_ceklist_delete);
			}else if(simb_ceklist_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, simb_ceklist_delete);
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
		
		function simb_ceklist_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(simb_ceklist_dbPermission)==false && pattC.test(simb_ceklist_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(simb_ceklist_confirmFormValid()){
					var simb_cek_idValue = '';
					var simb_cek_simb_idValue = '';
					var simb_cek_simbdet_idValue = '';
					var simb_cek_syarat_idValue = '';
					var simb_cek_statusValue = '';
					var simb_cek_keteranganValue = '';
										
					simb_cek_idValue = simb_cek_idField.getValue();
					simb_cek_simb_idValue = simb_cek_simb_idField.getValue();
					simb_cek_simbdet_idValue = simb_cek_simbdet_idField.getValue();
					simb_cek_syarat_idValue = simb_cek_syarat_idField.getValue();
					simb_cek_statusValue = simb_cek_statusField.getValue();
					simb_cek_keteranganValue = simb_cek_keteranganField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_t_simb_ceklist/switchAction',
						params: {							
							simb_cek_id : simb_cek_idValue,
							simb_cek_simb_id : simb_cek_simb_idValue,
							simb_cek_simbdet_id : simb_cek_simbdet_idValue,
							simb_cek_syarat_id : simb_cek_syarat_idValue,
							simb_cek_status : simb_cek_statusValue,
							simb_cek_keterangan : simb_cek_keteranganValue,
							action : simb_ceklist_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									simb_ceklist_dataStore.reload();
									simb_ceklist_resetForm();
									simb_ceklist_switchToGrid();
									simb_ceklist_gridPanel.getSelectionModel().deselectAll();
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
		
		function simb_ceklist_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(simb_ceklist_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = simb_ceklist_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< simb_ceklist_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.simb_cek_id);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_t_simb_ceklist/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									simb_ceklist_dataStore.reload();
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
		
		function simb_ceklist_refresh(){
			simb_ceklist_dbListAction = "GETLIST";
			simb_ceklist_gridSearchField.reset();
			simb_ceklist_searchPanel.getForm().reset();
			simb_ceklist_dataStore.proxy.extraParams = { action : 'GETLIST' };
			simb_ceklist_dataStore.proxy.extraParams.query = "";
			simb_ceklist_dataStore.currentPage = 1;
			simb_ceklist_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function simb_ceklist_confirmFormValid(){
			return simb_ceklist_formPanel.getForm().isValid();
		}
		
		function simb_ceklist_resetForm(){
			simb_ceklist_dbTask = 'CREATE';
			simb_ceklist_dbTaskMessage = 'create';
			simb_ceklist_formPanel.getForm().reset();
			simb_cek_idField.setValue(0);
		}
		
		function simb_ceklist_setForm(){
			simb_ceklist_dbTask = 'UPDATE';
            simb_ceklist_dbTaskMessage = 'update';
			
			var record = simb_ceklist_gridPanel.getSelectionModel().getSelection()[0];
			simb_cek_idField.setValue(record.data.simb_cek_id);
			simb_cek_simb_idField.setValue(record.data.simb_cek_simb_id);
			simb_cek_simbdet_idField.setValue(record.data.simb_cek_simbdet_id);
			simb_cek_syarat_idField.setValue(record.data.simb_cek_syarat_id);
			simb_cek_statusField.setValue(record.data.simb_cek_status);
			simb_cek_keteranganField.setValue(record.data.simb_cek_keterangan);
					}
		
		function simb_ceklist_showSearchWindow(){
			simb_ceklist_searchWindow.show();
		}
		
		function simb_ceklist_search(){
			simb_ceklist_gridSearchField.reset();
			
			var simb_cek_simb_idValue = '';
			var simb_cek_simbdet_idValue = '';
			var simb_cek_syarat_idValue = '';
			var simb_cek_statusValue = '';
			var simb_cek_keteranganValue = '';
						
			simb_cek_simb_idValue = simb_cek_simb_idSearchField.getValue();
			simb_cek_simbdet_idValue = simb_cek_simbdet_idSearchField.getValue();
			simb_cek_syarat_idValue = simb_cek_syarat_idSearchField.getValue();
			simb_cek_statusValue = simb_cek_statusSearchField.getValue();
			simb_cek_keteranganValue = simb_cek_keteranganSearchField.getValue();
			simb_ceklist_dbListAction = "SEARCH";
			simb_ceklist_dataStore.proxy.extraParams = { 
				simb_cek_simb_id : simb_cek_simb_idValue,
				simb_cek_simbdet_id : simb_cek_simbdet_idValue,
				simb_cek_syarat_id : simb_cek_syarat_idValue,
				simb_cek_status : simb_cek_statusValue,
				simb_cek_keterangan : simb_cek_keteranganValue,
				action : 'SEARCH'
			};
			simb_ceklist_dataStore.currentPage = 1;
			simb_ceklist_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function simb_ceklist_printExcel(outputType){
			var searchText = "";
			var simb_cek_simb_idValue = '';
			var simb_cek_simbdet_idValue = '';
			var simb_cek_syarat_idValue = '';
			var simb_cek_statusValue = '';
			var simb_cek_keteranganValue = '';
			
			if(simb_ceklist_dataStore.proxy.extraParams.query!==null){searchText = simb_ceklist_dataStore.proxy.extraParams.query;}
			if(simb_ceklist_dataStore.proxy.extraParams.simb_cek_simb_id!==null){simb_cek_simb_idValue = simb_ceklist_dataStore.proxy.extraParams.simb_cek_simb_id;}
			if(simb_ceklist_dataStore.proxy.extraParams.simb_cek_simbdet_id!==null){simb_cek_simbdet_idValue = simb_ceklist_dataStore.proxy.extraParams.simb_cek_simbdet_id;}
			if(simb_ceklist_dataStore.proxy.extraParams.simb_cek_syarat_id!==null){simb_cek_syarat_idValue = simb_ceklist_dataStore.proxy.extraParams.simb_cek_syarat_id;}
			if(simb_ceklist_dataStore.proxy.extraParams.simb_cek_status!==null){simb_cek_statusValue = simb_ceklist_dataStore.proxy.extraParams.simb_cek_status;}
			if(simb_ceklist_dataStore.proxy.extraParams.simb_cek_keterangan!==null){simb_cek_keteranganValue = simb_ceklist_dataStore.proxy.extraParams.simb_cek_keterangan;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_t_simb_ceklist/switchAction',
				params : {
					action : outputType,
					query : searchText,
					simb_cek_simb_id : simb_cek_simb_idValue,
					simb_cek_simbdet_id : simb_cek_simbdet_idValue,
					simb_cek_syarat_id : simb_cek_syarat_idValue,
					simb_cek_status : simb_cek_statusValue,
					simb_cek_keterangan : simb_cek_keteranganValue,
					currentAction : simb_ceklist_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/t_simb_ceklist_list.xls');
							}else{
								window.open('./print/t_simb_ceklist_list.html','simb_ceklistlist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		simb_ceklist_dataStore = Ext.create('Ext.data.Store',{
			id : 'simb_ceklist_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_simb_ceklist/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'simb_cek_id'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'simb_cek_id', type : 'int', mapping : 'simb_cek_id' },
				{ name : 'simb_cek_simb_id', type : 'int', mapping : 'simb_cek_simb_id' },
				{ name : 'simb_cek_simbdet_id', type : 'int', mapping : 'simb_cek_simbdet_id' },
				{ name : 'simb_cek_syarat_id', type : 'int', mapping : 'simb_cek_syarat_id' },
				{ name : 'simb_cek_status', type : 'int', mapping : 'simb_cek_status' },
				{ name : 'simb_cek_keterangan', type : 'string', mapping : 'simb_cek_keterangan' },
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		simb_ceklist_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						simb_ceklist_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						simb_ceklist_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						simb_ceklist_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						simb_ceklist_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						simb_ceklist_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						simb_ceklist_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						simb_ceklist_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						simb_ceklist_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var simb_ceklist_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : simb_ceklist_confirmAdd
		});
		var simb_ceklist_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : simb_ceklist_confirmUpdate
		});
		var simb_ceklist_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : simb_ceklist_confirmDelete
		});
		var simb_ceklist_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : simb_ceklist_refresh
		});
		var simb_ceklist_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : simb_ceklist_showSearchWindow
		});
		var simb_ceklist_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				simb_ceklist_printExcel('PRINT');
			}
		});
		var simb_ceklist_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				simb_ceklist_printExcel('EXCEL');
			}
		});
		
		var simb_ceklist_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : simb_ceklist_confirmUpdate
		});
		var simb_ceklist_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : simb_ceklist_confirmDelete
		});
		var simb_ceklist_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : simb_ceklist_refresh
		});
		simb_ceklist_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'simb_ceklist_contextMenu',
			items: [
				simb_ceklist_contextMenuEdit,simb_ceklist_contextMenuDelete,'-',simb_ceklist_contextMenuRefresh
			]
		});
		
		simb_ceklist_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : simb_ceklist_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						simb_ceklist_dataStore.proxy.extraParams = { action : 'GETLIST'};
						simb_ceklist_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		simb_ceklist_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'simb_ceklist_gridPanel',
			constrain : true,
			store : simb_ceklist_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'simb_ceklistGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						simb_ceklist_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : simb_ceklist_shorcut,
			columns : [
				{
					text : 'simb_cek_simb_id',
					dataIndex : 'simb_cek_simb_id',
					width : 100,
					sortable : false
				},
				{
					text : 'simb_cek_simbdet_id',
					dataIndex : 'simb_cek_simbdet_id',
					width : 100,
					sortable : false
				},
				{
					text : 'simb_cek_syarat_id',
					dataIndex : 'simb_cek_syarat_id',
					width : 100,
					sortable : false
				},
				{
					text : 'simb_cek_status',
					dataIndex : 'simb_cek_status',
					width : 100,
					sortable : false
				},
				{
					text : 'simb_cek_keterangan',
					dataIndex : 'simb_cek_keterangan',
					width : 100,
					sortable : false
				},
							
			],
			tbar : [
				simb_ceklist_addButton,
				simb_ceklist_editButton,
				simb_ceklist_deleteButton,
				simb_ceklist_gridSearchField,
				simb_ceklist_searchButton,
				simb_ceklist_refreshButton,
				simb_ceklist_printButton,
				simb_ceklist_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : simb_ceklist_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					simb_ceklist_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		simb_cek_idField = Ext.create('Ext.form.NumberField',{
			id : 'simb_cek_idField',
			name : 'simb_cek_id',
			fieldLabel : 'simb_cek_id<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		simb_cek_simb_idField = Ext.create('Ext.form.NumberField',{
			id : 'simb_cek_simb_idField',
			name : 'simb_cek_simb_id',
			fieldLabel : 'simb_cek_simb_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		simb_cek_simbdet_idField = Ext.create('Ext.form.NumberField',{
			id : 'simb_cek_simbdet_idField',
			name : 'simb_cek_simbdet_id',
			fieldLabel : 'simb_cek_simbdet_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		simb_cek_syarat_idField = Ext.create('Ext.form.NumberField',{
			id : 'simb_cek_syarat_idField',
			name : 'simb_cek_syarat_id',
			fieldLabel : 'simb_cek_syarat_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		simb_cek_statusField = Ext.create('Ext.form.NumberField',{
			id : 'simb_cek_statusField',
			name : 'simb_cek_status',
			fieldLabel : 'simb_cek_status',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		simb_cek_keteranganField = Ext.create('Ext.form.TextField',{
			id : 'simb_cek_keteranganField',
			name : 'simb_cek_keterangan',
			fieldLabel : 'simb_cek_keterangan',
			maxLength : 255
		});
		var simb_ceklist_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : simb_ceklist_save
		});
		var simb_ceklist_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				simb_ceklist_resetForm();
				simb_ceklist_switchToGrid();
			}
		});
		simb_ceklist_formPanel = Ext.create('Ext.form.Panel', {
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
						simb_cek_idField,
						simb_cek_simb_idField,
						simb_cek_simbdet_idField,
						simb_cek_syarat_idField,
						simb_cek_statusField,
						simb_cek_keteranganField,
											]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [simb_ceklist_saveButton,simb_ceklist_cancelButton]
		});
		simb_ceklist_formWindow = Ext.create('Ext.window.Window',{
			id : 'simb_ceklist_formWindow',
			renderTo : 'simb_ceklistSaveWindow',
			title : globalFormAddEditTitle + ' ' + simb_ceklist_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [simb_ceklist_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		simb_cek_simb_idSearchField = Ext.create('Ext.form.NumberField',{
			id : 'simb_cek_simb_idSearchField',
			name : 'simb_cek_simb_id',
			fieldLabel : 'simb_cek_simb_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		simb_cek_simbdet_idSearchField = Ext.create('Ext.form.NumberField',{
			id : 'simb_cek_simbdet_idSearchField',
			name : 'simb_cek_simbdet_id',
			fieldLabel : 'simb_cek_simbdet_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		simb_cek_syarat_idSearchField = Ext.create('Ext.form.NumberField',{
			id : 'simb_cek_syarat_idSearchField',
			name : 'simb_cek_syarat_id',
			fieldLabel : 'simb_cek_syarat_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		simb_cek_statusSearchField = Ext.create('Ext.form.NumberField',{
			id : 'simb_cek_statusSearchField',
			name : 'simb_cek_status',
			fieldLabel : 'simb_cek_status',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		simb_cek_keteranganSearchField = Ext.create('Ext.form.TextField',{
			id : 'simb_cek_keteranganSearchField',
			name : 'simb_cek_keterangan',
			fieldLabel : 'simb_cek_keterangan',
			maxLength : 255
		
		});
		var simb_ceklist_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : simb_ceklist_search
		});
		var simb_ceklist_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				simb_ceklist_searchWindow.hide();
			}
		});
		simb_ceklist_searchPanel = Ext.create('Ext.form.Panel', {
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
						simb_cek_simb_idSearchField,
						simb_cek_simbdet_idSearchField,
						simb_cek_syarat_idSearchField,
						simb_cek_statusSearchField,
						simb_cek_keteranganSearchField,
						]
				}],
			buttons : [simb_ceklist_searchingButton,simb_ceklist_cancelSearchButton]
		});
		simb_ceklist_searchWindow = Ext.create('Ext.window.Window',{
			id : 'simb_ceklist_searchWindow',
			renderTo : 'simb_ceklistSearchWindow',
			title : globalFormSearchTitle + ' ' + simb_ceklist_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [simb_ceklist_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="simb_ceklistSaveWindow"></div>
<div id="simb_ceklistSearchWindow"></div>
<div class="span12" id="simb_ceklistGrid"></div>