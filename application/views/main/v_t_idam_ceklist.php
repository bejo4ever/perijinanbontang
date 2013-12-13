<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var idam_ceklist_componentItemTitle="IDAM_CEKLIST";
		var idam_ceklist_dataStore;
		
		var idam_ceklist_shorcut;
		var idam_ceklist_contextMenu;
		var idam_ceklist_gridSearchField;
		var idam_ceklist_gridPanel;
		var idam_ceklist_formPanel;
		var idam_ceklist_formWindow;
		var idam_ceklist_searchPanel;
		var idam_ceklist_searchWindow;
		
		var idam_cek_idField;
		var idam_cek_syarat_idField;
		var idam_cek_idamdet_idField;
		var idam_cek_idam_idField;
		var idam_cek_statusField;
		var idam_cek_keteranganField;
				
		var idam_cek_syarat_idSearchField;
		var idam_cek_idamdet_idSearchField;
		var idam_cek_idam_idSearchField;
		var idam_cek_statusSearchField;
		var idam_cek_keteranganSearchField;
				
		var idam_ceklist_dbTask = 'CREATE';
		var idam_ceklist_dbTaskMessage = 'Tambah';
		var idam_ceklist_dbPermission = 'CRUD';
		var idam_ceklist_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function idam_ceklist_switchToGrid(){
			idam_ceklist_formPanel.setDisabled(true);
			idam_ceklist_gridPanel.setDisabled(false);
			idam_ceklist_formWindow.hide();
		}
		
		function idam_ceklist_switchToForm(){
			idam_ceklist_gridPanel.setDisabled(true);
			idam_ceklist_formPanel.setDisabled(false);
			idam_ceklist_formWindow.show();
		}
		
		function idam_ceklist_confirmAdd(){
			idam_ceklist_dbTask = 'CREATE';
			idam_ceklist_dbTaskMessage = 'created';
			idam_ceklist_resetForm();
			idam_ceklist_switchToForm();
		}
		
		function idam_ceklist_confirmUpdate(){
			if(idam_ceklist_gridPanel.selModel.getCount() == 1) {
				idam_ceklist_dbTask = 'UPDATE';
				idam_ceklist_dbTaskMessage = 'updated';
				idam_ceklist_switchToForm();
				idam_ceklist_setForm();
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
		
		function idam_ceklist_confirmDelete(){
			if(idam_ceklist_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, idam_ceklist_delete);
			}else if(idam_ceklist_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, idam_ceklist_delete);
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
		
		function idam_ceklist_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(idam_ceklist_dbPermission)==false && pattC.test(idam_ceklist_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(idam_ceklist_confirmFormValid()){
					var idam_cek_idValue = '';
					var idam_cek_syarat_idValue = '';
					var idam_cek_idamdet_idValue = '';
					var idam_cek_idam_idValue = '';
					var idam_cek_statusValue = '';
					var idam_cek_keteranganValue = '';
										
					idam_cek_idValue = idam_cek_idField.getValue();
					idam_cek_syarat_idValue = idam_cek_syarat_idField.getValue();
					idam_cek_idamdet_idValue = idam_cek_idamdet_idField.getValue();
					idam_cek_idam_idValue = idam_cek_idam_idField.getValue();
					idam_cek_statusValue = idam_cek_statusField.getValue();
					idam_cek_keteranganValue = idam_cek_keteranganField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_t_idam_ceklist/switchAction',
						params: {							
							idam_cek_id : idam_cek_idValue,
							idam_cek_syarat_id : idam_cek_syarat_idValue,
							idam_cek_idamdet_id : idam_cek_idamdet_idValue,
							idam_cek_idam_id : idam_cek_idam_idValue,
							idam_cek_status : idam_cek_statusValue,
							idam_cek_keterangan : idam_cek_keteranganValue,
							action : idam_ceklist_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									idam_ceklist_dataStore.reload();
									idam_ceklist_resetForm();
									idam_ceklist_switchToGrid();
									idam_ceklist_gridPanel.getSelectionModel().deselectAll();
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
		
		function idam_ceklist_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(idam_ceklist_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = idam_ceklist_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< idam_ceklist_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.idam_cek_id);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_t_idam_ceklist/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									idam_ceklist_dataStore.reload();
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
		
		function idam_ceklist_refresh(){
			idam_ceklist_dbListAction = "GETLIST";
			idam_ceklist_gridSearchField.reset();
			idam_ceklist_searchPanel.getForm().reset();
			idam_ceklist_dataStore.proxy.extraParams = { action : 'GETLIST' };
			idam_ceklist_dataStore.proxy.extraParams.query = "";
			idam_ceklist_dataStore.currentPage = 1;
			idam_ceklist_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function idam_ceklist_confirmFormValid(){
			return idam_ceklist_formPanel.getForm().isValid();
		}
		
		function idam_ceklist_resetForm(){
			idam_ceklist_dbTask = 'CREATE';
			idam_ceklist_dbTaskMessage = 'create';
			idam_ceklist_formPanel.getForm().reset();
			idam_cek_idField.setValue(0);
		}
		
		function idam_ceklist_setForm(){
			idam_ceklist_dbTask = 'UPDATE';
            idam_ceklist_dbTaskMessage = 'update';
			
			var record = idam_ceklist_gridPanel.getSelectionModel().getSelection()[0];
			idam_cek_idField.setValue(record.data.idam_cek_id);
			idam_cek_syarat_idField.setValue(record.data.idam_cek_syarat_id);
			idam_cek_idamdet_idField.setValue(record.data.idam_cek_idamdet_id);
			idam_cek_idam_idField.setValue(record.data.idam_cek_idam_id);
			idam_cek_statusField.setValue(record.data.idam_cek_status);
			idam_cek_keteranganField.setValue(record.data.idam_cek_keterangan);
					}
		
		function idam_ceklist_showSearchWindow(){
			idam_ceklist_searchWindow.show();
		}
		
		function idam_ceklist_search(){
			idam_ceklist_gridSearchField.reset();
			
			var idam_cek_syarat_idValue = '';
			var idam_cek_idamdet_idValue = '';
			var idam_cek_idam_idValue = '';
			var idam_cek_statusValue = '';
			var idam_cek_keteranganValue = '';
						
			idam_cek_syarat_idValue = idam_cek_syarat_idSearchField.getValue();
			idam_cek_idamdet_idValue = idam_cek_idamdet_idSearchField.getValue();
			idam_cek_idam_idValue = idam_cek_idam_idSearchField.getValue();
			idam_cek_statusValue = idam_cek_statusSearchField.getValue();
			idam_cek_keteranganValue = idam_cek_keteranganSearchField.getValue();
			idam_ceklist_dbListAction = "SEARCH";
			idam_ceklist_dataStore.proxy.extraParams = { 
				idam_cek_syarat_id : idam_cek_syarat_idValue,
				idam_cek_idamdet_id : idam_cek_idamdet_idValue,
				idam_cek_idam_id : idam_cek_idam_idValue,
				idam_cek_status : idam_cek_statusValue,
				idam_cek_keterangan : idam_cek_keteranganValue,
				action : 'SEARCH'
			};
			idam_ceklist_dataStore.currentPage = 1;
			idam_ceklist_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function idam_ceklist_printExcel(outputType){
			var searchText = "";
			var idam_cek_syarat_idValue = '';
			var idam_cek_idamdet_idValue = '';
			var idam_cek_idam_idValue = '';
			var idam_cek_statusValue = '';
			var idam_cek_keteranganValue = '';
			
			if(idam_ceklist_dataStore.proxy.extraParams.query!==null){searchText = idam_ceklist_dataStore.proxy.extraParams.query;}
			if(idam_ceklist_dataStore.proxy.extraParams.idam_cek_syarat_id!==null){idam_cek_syarat_idValue = idam_ceklist_dataStore.proxy.extraParams.idam_cek_syarat_id;}
			if(idam_ceklist_dataStore.proxy.extraParams.idam_cek_idamdet_id!==null){idam_cek_idamdet_idValue = idam_ceklist_dataStore.proxy.extraParams.idam_cek_idamdet_id;}
			if(idam_ceklist_dataStore.proxy.extraParams.idam_cek_idam_id!==null){idam_cek_idam_idValue = idam_ceklist_dataStore.proxy.extraParams.idam_cek_idam_id;}
			if(idam_ceklist_dataStore.proxy.extraParams.idam_cek_status!==null){idam_cek_statusValue = idam_ceklist_dataStore.proxy.extraParams.idam_cek_status;}
			if(idam_ceklist_dataStore.proxy.extraParams.idam_cek_keterangan!==null){idam_cek_keteranganValue = idam_ceklist_dataStore.proxy.extraParams.idam_cek_keterangan;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_t_idam_ceklist/switchAction',
				params : {
					action : outputType,
					query : searchText,
					idam_cek_syarat_id : idam_cek_syarat_idValue,
					idam_cek_idamdet_id : idam_cek_idamdet_idValue,
					idam_cek_idam_id : idam_cek_idam_idValue,
					idam_cek_status : idam_cek_statusValue,
					idam_cek_keterangan : idam_cek_keteranganValue,
					currentAction : idam_ceklist_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/t_idam_ceklist_list.xls');
							}else{
								window.open('./print/t_idam_ceklist_list.html','idam_ceklistlist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		idam_ceklist_dataStore = Ext.create('Ext.data.Store',{
			id : 'idam_ceklist_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_idam_ceklist/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'idam_cek_id'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'idam_cek_id', type : 'int', mapping : 'idam_cek_id' },
				{ name : 'idam_cek_syarat_id', type : 'int', mapping : 'idam_cek_syarat_id' },
				{ name : 'idam_cek_idamdet_id', type : 'int', mapping : 'idam_cek_idamdet_id' },
				{ name : 'idam_cek_idam_id', type : 'int', mapping : 'idam_cek_idam_id' },
				{ name : 'idam_cek_status', type : 'int', mapping : 'idam_cek_status' },
				{ name : 'idam_cek_keterangan', type : 'string', mapping : 'idam_cek_keterangan' },
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		idam_ceklist_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						idam_ceklist_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						idam_ceklist_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						idam_ceklist_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						idam_ceklist_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						idam_ceklist_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						idam_ceklist_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						idam_ceklist_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						idam_ceklist_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var idam_ceklist_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : idam_ceklist_confirmAdd
		});
		var idam_ceklist_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : idam_ceklist_confirmUpdate
		});
		var idam_ceklist_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : idam_ceklist_confirmDelete
		});
		var idam_ceklist_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : idam_ceklist_refresh
		});
		var idam_ceklist_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : idam_ceklist_showSearchWindow
		});
		var idam_ceklist_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				idam_ceklist_printExcel('PRINT');
			}
		});
		var idam_ceklist_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				idam_ceklist_printExcel('EXCEL');
			}
		});
		
		var idam_ceklist_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : idam_ceklist_confirmUpdate
		});
		var idam_ceklist_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : idam_ceklist_confirmDelete
		});
		var idam_ceklist_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : idam_ceklist_refresh
		});
		idam_ceklist_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'idam_ceklist_contextMenu',
			items: [
				idam_ceklist_contextMenuEdit,idam_ceklist_contextMenuDelete,'-',idam_ceklist_contextMenuRefresh
			]
		});
		
		idam_ceklist_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : idam_ceklist_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						idam_ceklist_dataStore.proxy.extraParams = { action : 'GETLIST'};
						idam_ceklist_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		idam_ceklist_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'idam_ceklist_gridPanel',
			constrain : true,
			store : idam_ceklist_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'idam_ceklistGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						idam_ceklist_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : idam_ceklist_shorcut,
			columns : [
				{
					text : 'idam_cek_syarat_id',
					dataIndex : 'idam_cek_syarat_id',
					width : 100,
					sortable : false
				},
				{
					text : 'idam_cek_idamdet_id',
					dataIndex : 'idam_cek_idamdet_id',
					width : 100,
					sortable : false
				},
				{
					text : 'idam_cek_idam_id',
					dataIndex : 'idam_cek_idam_id',
					width : 100,
					sortable : false
				},
				{
					text : 'idam_cek_status',
					dataIndex : 'idam_cek_status',
					width : 100,
					sortable : false
				},
				{
					text : 'idam_cek_keterangan',
					dataIndex : 'idam_cek_keterangan',
					width : 100,
					sortable : false
				},
							
			],
			tbar : [
				idam_ceklist_addButton,
				idam_ceklist_editButton,
				idam_ceklist_deleteButton,
				idam_ceklist_gridSearchField,
				idam_ceklist_searchButton,
				idam_ceklist_refreshButton,
				idam_ceklist_printButton,
				idam_ceklist_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : idam_ceklist_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					idam_ceklist_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		idam_cek_idField = Ext.create('Ext.form.NumberField',{
			id : 'idam_cek_idField',
			name : 'idam_cek_id',
			fieldLabel : 'idam_cek_id<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		idam_cek_syarat_idField = Ext.create('Ext.form.NumberField',{
			id : 'idam_cek_syarat_idField',
			name : 'idam_cek_syarat_id',
			fieldLabel : 'idam_cek_syarat_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		idam_cek_idamdet_idField = Ext.create('Ext.form.NumberField',{
			id : 'idam_cek_idamdet_idField',
			name : 'idam_cek_idamdet_id',
			fieldLabel : 'idam_cek_idamdet_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		idam_cek_idam_idField = Ext.create('Ext.form.NumberField',{
			id : 'idam_cek_idam_idField',
			name : 'idam_cek_idam_id',
			fieldLabel : 'idam_cek_idam_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		idam_cek_statusField = Ext.create('Ext.form.NumberField',{
			id : 'idam_cek_statusField',
			name : 'idam_cek_status',
			fieldLabel : 'idam_cek_status',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		idam_cek_keteranganField = Ext.create('Ext.form.TextField',{
			id : 'idam_cek_keteranganField',
			name : 'idam_cek_keterangan',
			fieldLabel : 'idam_cek_keterangan',
			maxLength : 255
		});
		var idam_ceklist_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : idam_ceklist_save
		});
		var idam_ceklist_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				idam_ceklist_resetForm();
				idam_ceklist_switchToGrid();
			}
		});
		idam_ceklist_formPanel = Ext.create('Ext.form.Panel', {
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
						idam_cek_idField,
						idam_cek_syarat_idField,
						idam_cek_idamdet_idField,
						idam_cek_idam_idField,
						idam_cek_statusField,
						idam_cek_keteranganField,
											]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [idam_ceklist_saveButton,idam_ceklist_cancelButton]
		});
		idam_ceklist_formWindow = Ext.create('Ext.window.Window',{
			id : 'idam_ceklist_formWindow',
			renderTo : 'idam_ceklistSaveWindow',
			title : globalFormAddEditTitle + ' ' + idam_ceklist_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [idam_ceklist_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		idam_cek_syarat_idSearchField = Ext.create('Ext.form.NumberField',{
			id : 'idam_cek_syarat_idSearchField',
			name : 'idam_cek_syarat_id',
			fieldLabel : 'idam_cek_syarat_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		idam_cek_idamdet_idSearchField = Ext.create('Ext.form.NumberField',{
			id : 'idam_cek_idamdet_idSearchField',
			name : 'idam_cek_idamdet_id',
			fieldLabel : 'idam_cek_idamdet_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		idam_cek_idam_idSearchField = Ext.create('Ext.form.NumberField',{
			id : 'idam_cek_idam_idSearchField',
			name : 'idam_cek_idam_id',
			fieldLabel : 'idam_cek_idam_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		idam_cek_statusSearchField = Ext.create('Ext.form.NumberField',{
			id : 'idam_cek_statusSearchField',
			name : 'idam_cek_status',
			fieldLabel : 'idam_cek_status',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		idam_cek_keteranganSearchField = Ext.create('Ext.form.TextField',{
			id : 'idam_cek_keteranganSearchField',
			name : 'idam_cek_keterangan',
			fieldLabel : 'idam_cek_keterangan',
			maxLength : 255
		
		});
		var idam_ceklist_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : idam_ceklist_search
		});
		var idam_ceklist_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				idam_ceklist_searchWindow.hide();
			}
		});
		idam_ceklist_searchPanel = Ext.create('Ext.form.Panel', {
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
						idam_cek_syarat_idSearchField,
						idam_cek_idamdet_idSearchField,
						idam_cek_idam_idSearchField,
						idam_cek_statusSearchField,
						idam_cek_keteranganSearchField,
						]
				}],
			buttons : [idam_ceklist_searchingButton,idam_ceklist_cancelSearchButton]
		});
		idam_ceklist_searchWindow = Ext.create('Ext.window.Window',{
			id : 'idam_ceklist_searchWindow',
			renderTo : 'idam_ceklistSearchWindow',
			title : globalFormSearchTitle + ' ' + idam_ceklist_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [idam_ceklist_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="idam_ceklistSaveWindow"></div>
<div id="idam_ceklistSearchWindow"></div>
<div class="span12" id="idam_ceklistGrid"></div>