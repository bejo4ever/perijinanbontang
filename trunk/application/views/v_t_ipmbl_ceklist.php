<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var ipmbl_ceklist_componentItemTitle="IPMBL_CEKLIST";
		var ipmbl_ceklist_dataStore;
		
		var ipmbl_ceklist_shorcut;
		var ipmbl_ceklist_contextMenu;
		var ipmbl_ceklist_gridSearchField;
		var ipmbl_ceklist_gridPanel;
		var ipmbl_ceklist_formPanel;
		var ipmbl_ceklist_formWindow;
		var ipmbl_ceklist_searchPanel;
		var ipmbl_ceklist_searchWindow;
		
		var ipmbl_cek_idField;
		var ipmbl_cek_syarat_idField;
		var ipmbl_cek_ipmbldet_idField;
		var ipmbl_cek_ipmbl_idField;
		var ipmbl_cek_statusField;
		var ipmbl_cek_keteranganField;
				
		var ipmbl_cek_syarat_idSearchField;
		var ipmbl_cek_ipmbldet_idSearchField;
		var ipmbl_cek_ipmbl_idSearchField;
		var ipmbl_cek_statusSearchField;
		var ipmbl_cek_keteranganSearchField;
				
		var ipmbl_ceklist_dbTask = 'CREATE';
		var ipmbl_ceklist_dbTaskMessage = 'Tambah';
		var ipmbl_ceklist_dbPermission = 'CRUD';
		var ipmbl_ceklist_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function ipmbl_ceklist_switchToGrid(){
			ipmbl_ceklist_formPanel.setDisabled(true);
			ipmbl_ceklist_gridPanel.setDisabled(false);
			ipmbl_ceklist_formWindow.hide();
		}
		
		function ipmbl_ceklist_switchToForm(){
			ipmbl_ceklist_gridPanel.setDisabled(true);
			ipmbl_ceklist_formPanel.setDisabled(false);
			ipmbl_ceklist_formWindow.show();
		}
		
		function ipmbl_ceklist_confirmAdd(){
			ipmbl_ceklist_dbTask = 'CREATE';
			ipmbl_ceklist_dbTaskMessage = 'created';
			ipmbl_ceklist_resetForm();
			ipmbl_ceklist_switchToForm();
		}
		
		function ipmbl_ceklist_confirmUpdate(){
			if(ipmbl_ceklist_gridPanel.selModel.getCount() == 1) {
				ipmbl_ceklist_dbTask = 'UPDATE';
				ipmbl_ceklist_dbTaskMessage = 'updated';
				ipmbl_ceklist_switchToForm();
				ipmbl_ceklist_setForm();
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
		
		function ipmbl_ceklist_confirmDelete(){
			if(ipmbl_ceklist_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, ipmbl_ceklist_delete);
			}else if(ipmbl_ceklist_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, ipmbl_ceklist_delete);
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
		
		function ipmbl_ceklist_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(ipmbl_ceklist_dbPermission)==false && pattC.test(ipmbl_ceklist_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(ipmbl_ceklist_confirmFormValid()){
					var ipmbl_cek_idValue = '';
					var ipmbl_cek_syarat_idValue = '';
					var ipmbl_cek_ipmbldet_idValue = '';
					var ipmbl_cek_ipmbl_idValue = '';
					var ipmbl_cek_statusValue = '';
					var ipmbl_cek_keteranganValue = '';
										
					ipmbl_cek_idValue = ipmbl_cek_idField.getValue();
					ipmbl_cek_syarat_idValue = ipmbl_cek_syarat_idField.getValue();
					ipmbl_cek_ipmbldet_idValue = ipmbl_cek_ipmbldet_idField.getValue();
					ipmbl_cek_ipmbl_idValue = ipmbl_cek_ipmbl_idField.getValue();
					ipmbl_cek_statusValue = ipmbl_cek_statusField.getValue();
					ipmbl_cek_keteranganValue = ipmbl_cek_keteranganField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_t_ipmbl_ceklist/switchAction',
						params: {							
							ipmbl_cek_id : ipmbl_cek_idValue,
							ipmbl_cek_syarat_id : ipmbl_cek_syarat_idValue,
							ipmbl_cek_ipmbldet_id : ipmbl_cek_ipmbldet_idValue,
							ipmbl_cek_ipmbl_id : ipmbl_cek_ipmbl_idValue,
							ipmbl_cek_status : ipmbl_cek_statusValue,
							ipmbl_cek_keterangan : ipmbl_cek_keteranganValue,
							action : ipmbl_ceklist_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									ipmbl_ceklist_dataStore.reload();
									ipmbl_ceklist_resetForm();
									ipmbl_ceklist_switchToGrid();
									ipmbl_ceklist_gridPanel.getSelectionModel().deselectAll();
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
		
		function ipmbl_ceklist_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(ipmbl_ceklist_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = ipmbl_ceklist_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< ipmbl_ceklist_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.ipmbl_cek_id);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_t_ipmbl_ceklist/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									ipmbl_ceklist_dataStore.reload();
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
		
		function ipmbl_ceklist_refresh(){
			ipmbl_ceklist_dbListAction = "GETLIST";
			ipmbl_ceklist_gridSearchField.reset();
			ipmbl_ceklist_searchPanel.getForm().reset();
			ipmbl_ceklist_dataStore.proxy.extraParams = { action : 'GETLIST' };
			ipmbl_ceklist_dataStore.proxy.extraParams.query = "";
			ipmbl_ceklist_dataStore.currentPage = 1;
			ipmbl_ceklist_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function ipmbl_ceklist_confirmFormValid(){
			return ipmbl_ceklist_formPanel.getForm().isValid();
		}
		
		function ipmbl_ceklist_resetForm(){
			ipmbl_ceklist_dbTask = 'CREATE';
			ipmbl_ceklist_dbTaskMessage = 'create';
			ipmbl_ceklist_formPanel.getForm().reset();
			ipmbl_cek_idField.setValue(0);
		}
		
		function ipmbl_ceklist_setForm(){
			ipmbl_ceklist_dbTask = 'UPDATE';
            ipmbl_ceklist_dbTaskMessage = 'update';
			
			var record = ipmbl_ceklist_gridPanel.getSelectionModel().getSelection()[0];
			ipmbl_cek_idField.setValue(record.data.ipmbl_cek_id);
			ipmbl_cek_syarat_idField.setValue(record.data.ipmbl_cek_syarat_id);
			ipmbl_cek_ipmbldet_idField.setValue(record.data.ipmbl_cek_ipmbldet_id);
			ipmbl_cek_ipmbl_idField.setValue(record.data.ipmbl_cek_ipmbl_id);
			ipmbl_cek_statusField.setValue(record.data.ipmbl_cek_status);
			ipmbl_cek_keteranganField.setValue(record.data.ipmbl_cek_keterangan);
					}
		
		function ipmbl_ceklist_showSearchWindow(){
			ipmbl_ceklist_searchWindow.show();
		}
		
		function ipmbl_ceklist_search(){
			ipmbl_ceklist_gridSearchField.reset();
			
			var ipmbl_cek_syarat_idValue = '';
			var ipmbl_cek_ipmbldet_idValue = '';
			var ipmbl_cek_ipmbl_idValue = '';
			var ipmbl_cek_statusValue = '';
			var ipmbl_cek_keteranganValue = '';
						
			ipmbl_cek_syarat_idValue = ipmbl_cek_syarat_idSearchField.getValue();
			ipmbl_cek_ipmbldet_idValue = ipmbl_cek_ipmbldet_idSearchField.getValue();
			ipmbl_cek_ipmbl_idValue = ipmbl_cek_ipmbl_idSearchField.getValue();
			ipmbl_cek_statusValue = ipmbl_cek_statusSearchField.getValue();
			ipmbl_cek_keteranganValue = ipmbl_cek_keteranganSearchField.getValue();
			ipmbl_ceklist_dbListAction = "SEARCH";
			ipmbl_ceklist_dataStore.proxy.extraParams = { 
				ipmbl_cek_syarat_id : ipmbl_cek_syarat_idValue,
				ipmbl_cek_ipmbldet_id : ipmbl_cek_ipmbldet_idValue,
				ipmbl_cek_ipmbl_id : ipmbl_cek_ipmbl_idValue,
				ipmbl_cek_status : ipmbl_cek_statusValue,
				ipmbl_cek_keterangan : ipmbl_cek_keteranganValue,
				action : 'SEARCH'
			};
			ipmbl_ceklist_dataStore.currentPage = 1;
			ipmbl_ceklist_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function ipmbl_ceklist_printExcel(outputType){
			var searchText = "";
			var ipmbl_cek_syarat_idValue = '';
			var ipmbl_cek_ipmbldet_idValue = '';
			var ipmbl_cek_ipmbl_idValue = '';
			var ipmbl_cek_statusValue = '';
			var ipmbl_cek_keteranganValue = '';
			
			if(ipmbl_ceklist_dataStore.proxy.extraParams.query!==null){searchText = ipmbl_ceklist_dataStore.proxy.extraParams.query;}
			if(ipmbl_ceklist_dataStore.proxy.extraParams.ipmbl_cek_syarat_id!==null){ipmbl_cek_syarat_idValue = ipmbl_ceklist_dataStore.proxy.extraParams.ipmbl_cek_syarat_id;}
			if(ipmbl_ceklist_dataStore.proxy.extraParams.ipmbl_cek_ipmbldet_id!==null){ipmbl_cek_ipmbldet_idValue = ipmbl_ceklist_dataStore.proxy.extraParams.ipmbl_cek_ipmbldet_id;}
			if(ipmbl_ceklist_dataStore.proxy.extraParams.ipmbl_cek_ipmbl_id!==null){ipmbl_cek_ipmbl_idValue = ipmbl_ceklist_dataStore.proxy.extraParams.ipmbl_cek_ipmbl_id;}
			if(ipmbl_ceklist_dataStore.proxy.extraParams.ipmbl_cek_status!==null){ipmbl_cek_statusValue = ipmbl_ceklist_dataStore.proxy.extraParams.ipmbl_cek_status;}
			if(ipmbl_ceklist_dataStore.proxy.extraParams.ipmbl_cek_keterangan!==null){ipmbl_cek_keteranganValue = ipmbl_ceklist_dataStore.proxy.extraParams.ipmbl_cek_keterangan;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_t_ipmbl_ceklist/switchAction',
				params : {
					action : outputType,
					query : searchText,
					ipmbl_cek_syarat_id : ipmbl_cek_syarat_idValue,
					ipmbl_cek_ipmbldet_id : ipmbl_cek_ipmbldet_idValue,
					ipmbl_cek_ipmbl_id : ipmbl_cek_ipmbl_idValue,
					ipmbl_cek_status : ipmbl_cek_statusValue,
					ipmbl_cek_keterangan : ipmbl_cek_keteranganValue,
					currentAction : ipmbl_ceklist_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/t_ipmbl_ceklist_list.xls');
							}else{
								window.open('./print/t_ipmbl_ceklist_list.html','ipmbl_ceklistlist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		ipmbl_ceklist_dataStore = Ext.create('Ext.data.Store',{
			id : 'ipmbl_ceklist_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_ipmbl_ceklist/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'ipmbl_cek_id'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'ipmbl_cek_id', type : 'int', mapping : 'ipmbl_cek_id' },
				{ name : 'ipmbl_cek_syarat_id', type : 'int', mapping : 'ipmbl_cek_syarat_id' },
				{ name : 'ipmbl_cek_ipmbldet_id', type : 'int', mapping : 'ipmbl_cek_ipmbldet_id' },
				{ name : 'ipmbl_cek_ipmbl_id', type : 'int', mapping : 'ipmbl_cek_ipmbl_id' },
				{ name : 'ipmbl_cek_status', type : 'int', mapping : 'ipmbl_cek_status' },
				{ name : 'ipmbl_cek_keterangan', type : 'string', mapping : 'ipmbl_cek_keterangan' },
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		ipmbl_ceklist_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						ipmbl_ceklist_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						ipmbl_ceklist_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						ipmbl_ceklist_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						ipmbl_ceklist_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						ipmbl_ceklist_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						ipmbl_ceklist_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						ipmbl_ceklist_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						ipmbl_ceklist_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var ipmbl_ceklist_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : ipmbl_ceklist_confirmAdd
		});
		var ipmbl_ceklist_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : ipmbl_ceklist_confirmUpdate
		});
		var ipmbl_ceklist_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : ipmbl_ceklist_confirmDelete
		});
		var ipmbl_ceklist_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : ipmbl_ceklist_refresh
		});
		var ipmbl_ceklist_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : ipmbl_ceklist_showSearchWindow
		});
		var ipmbl_ceklist_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				ipmbl_ceklist_printExcel('PRINT');
			}
		});
		var ipmbl_ceklist_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				ipmbl_ceklist_printExcel('EXCEL');
			}
		});
		
		var ipmbl_ceklist_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : ipmbl_ceklist_confirmUpdate
		});
		var ipmbl_ceklist_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : ipmbl_ceklist_confirmDelete
		});
		var ipmbl_ceklist_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : ipmbl_ceklist_refresh
		});
		ipmbl_ceklist_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'ipmbl_ceklist_contextMenu',
			items: [
				ipmbl_ceklist_contextMenuEdit,ipmbl_ceklist_contextMenuDelete,'-',ipmbl_ceklist_contextMenuRefresh
			]
		});
		
		ipmbl_ceklist_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : ipmbl_ceklist_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						ipmbl_ceklist_dataStore.proxy.extraParams = { action : 'GETLIST'};
						ipmbl_ceklist_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		ipmbl_ceklist_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'ipmbl_ceklist_gridPanel',
			constrain : true,
			store : ipmbl_ceklist_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'ipmbl_ceklistGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						ipmbl_ceklist_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : ipmbl_ceklist_shorcut,
			columns : [
				{
					text : 'ipmbl_cek_syarat_id',
					dataIndex : 'ipmbl_cek_syarat_id',
					width : 100,
					sortable : false
				},
				{
					text : 'ipmbl_cek_ipmbldet_id',
					dataIndex : 'ipmbl_cek_ipmbldet_id',
					width : 100,
					sortable : false
				},
				{
					text : 'ipmbl_cek_ipmbl_id',
					dataIndex : 'ipmbl_cek_ipmbl_id',
					width : 100,
					sortable : false
				},
				{
					text : 'ipmbl_cek_status',
					dataIndex : 'ipmbl_cek_status',
					width : 100,
					sortable : false
				},
				{
					text : 'ipmbl_cek_keterangan',
					dataIndex : 'ipmbl_cek_keterangan',
					width : 100,
					sortable : false
				},
							
			],
			tbar : [
				ipmbl_ceklist_addButton,
				ipmbl_ceklist_editButton,
				ipmbl_ceklist_deleteButton,
				ipmbl_ceklist_gridSearchField,
				ipmbl_ceklist_searchButton,
				ipmbl_ceklist_refreshButton,
				ipmbl_ceklist_printButton,
				ipmbl_ceklist_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : ipmbl_ceklist_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					ipmbl_ceklist_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		ipmbl_cek_idField = Ext.create('Ext.form.NumberField',{
			id : 'ipmbl_cek_idField',
			name : 'ipmbl_cek_id',
			fieldLabel : 'ipmbl_cek_id<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		ipmbl_cek_syarat_idField = Ext.create('Ext.form.NumberField',{
			id : 'ipmbl_cek_syarat_idField',
			name : 'ipmbl_cek_syarat_id',
			fieldLabel : 'ipmbl_cek_syarat_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		ipmbl_cek_ipmbldet_idField = Ext.create('Ext.form.NumberField',{
			id : 'ipmbl_cek_ipmbldet_idField',
			name : 'ipmbl_cek_ipmbldet_id',
			fieldLabel : 'ipmbl_cek_ipmbldet_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		ipmbl_cek_ipmbl_idField = Ext.create('Ext.form.NumberField',{
			id : 'ipmbl_cek_ipmbl_idField',
			name : 'ipmbl_cek_ipmbl_id',
			fieldLabel : 'ipmbl_cek_ipmbl_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		ipmbl_cek_statusField = Ext.create('Ext.form.NumberField',{
			id : 'ipmbl_cek_statusField',
			name : 'ipmbl_cek_status',
			fieldLabel : 'ipmbl_cek_status',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		ipmbl_cek_keteranganField = Ext.create('Ext.form.TextField',{
			id : 'ipmbl_cek_keteranganField',
			name : 'ipmbl_cek_keterangan',
			fieldLabel : 'ipmbl_cek_keterangan',
			maxLength : 255
		});
		var ipmbl_ceklist_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : ipmbl_ceklist_save
		});
		var ipmbl_ceklist_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				ipmbl_ceklist_resetForm();
				ipmbl_ceklist_switchToGrid();
			}
		});
		ipmbl_ceklist_formPanel = Ext.create('Ext.form.Panel', {
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
						ipmbl_cek_idField,
						ipmbl_cek_syarat_idField,
						ipmbl_cek_ipmbldet_idField,
						ipmbl_cek_ipmbl_idField,
						ipmbl_cek_statusField,
						ipmbl_cek_keteranganField,
											]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [ipmbl_ceklist_saveButton,ipmbl_ceklist_cancelButton]
		});
		ipmbl_ceklist_formWindow = Ext.create('Ext.window.Window',{
			id : 'ipmbl_ceklist_formWindow',
			renderTo : 'ipmbl_ceklistSaveWindow',
			title : globalFormAddEditTitle + ' ' + ipmbl_ceklist_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [ipmbl_ceklist_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		ipmbl_cek_syarat_idSearchField = Ext.create('Ext.form.NumberField',{
			id : 'ipmbl_cek_syarat_idSearchField',
			name : 'ipmbl_cek_syarat_id',
			fieldLabel : 'ipmbl_cek_syarat_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		ipmbl_cek_ipmbldet_idSearchField = Ext.create('Ext.form.NumberField',{
			id : 'ipmbl_cek_ipmbldet_idSearchField',
			name : 'ipmbl_cek_ipmbldet_id',
			fieldLabel : 'ipmbl_cek_ipmbldet_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		ipmbl_cek_ipmbl_idSearchField = Ext.create('Ext.form.NumberField',{
			id : 'ipmbl_cek_ipmbl_idSearchField',
			name : 'ipmbl_cek_ipmbl_id',
			fieldLabel : 'ipmbl_cek_ipmbl_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		ipmbl_cek_statusSearchField = Ext.create('Ext.form.NumberField',{
			id : 'ipmbl_cek_statusSearchField',
			name : 'ipmbl_cek_status',
			fieldLabel : 'ipmbl_cek_status',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		ipmbl_cek_keteranganSearchField = Ext.create('Ext.form.TextField',{
			id : 'ipmbl_cek_keteranganSearchField',
			name : 'ipmbl_cek_keterangan',
			fieldLabel : 'ipmbl_cek_keterangan',
			maxLength : 255
		
		});
		var ipmbl_ceklist_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : ipmbl_ceklist_search
		});
		var ipmbl_ceklist_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				ipmbl_ceklist_searchWindow.hide();
			}
		});
		ipmbl_ceklist_searchPanel = Ext.create('Ext.form.Panel', {
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
						ipmbl_cek_syarat_idSearchField,
						ipmbl_cek_ipmbldet_idSearchField,
						ipmbl_cek_ipmbl_idSearchField,
						ipmbl_cek_statusSearchField,
						ipmbl_cek_keteranganSearchField,
						]
				}],
			buttons : [ipmbl_ceklist_searchingButton,ipmbl_ceklist_cancelSearchButton]
		});
		ipmbl_ceklist_searchWindow = Ext.create('Ext.window.Window',{
			id : 'ipmbl_ceklist_searchWindow',
			renderTo : 'ipmbl_ceklistSearchWindow',
			title : globalFormSearchTitle + ' ' + ipmbl_ceklist_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [ipmbl_ceklist_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="ipmbl_ceklistSaveWindow"></div>
<div id="ipmbl_ceklistSearchWindow"></div>
<div class="span12" id="ipmbl_ceklistGrid"></div>