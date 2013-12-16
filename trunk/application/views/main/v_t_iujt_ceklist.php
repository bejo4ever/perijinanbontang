<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var iujt_ceklist_componentItemTitle="IUJT_CEKLIST";
		var iujt_ceklist_dataStore;
		
		var iujt_ceklist_shorcut;
		var iujt_ceklist_contextMenu;
		var iujt_ceklist_gridSearchField;
		var iujt_ceklist_gridPanel;
		var iujt_ceklist_formPanel;
		var iujt_ceklist_formWindow;
		var iujt_ceklist_searchPanel;
		var iujt_ceklist_searchWindow;
		
		var iujt_cek_idField;
		var iujt_cek_iujt_idField;
		var iujt_cek_iujtdet_idField;
		var iujt_cek_syarat_idField;
		var iujt_cek_statusField;
				
		var iujt_cek_iujt_idSearchField;
		var iujt_cek_iujtdet_idSearchField;
		var iujt_cek_syarat_idSearchField;
		var iujt_cek_statusSearchField;
				
		var iujt_ceklist_dbTask = 'CREATE';
		var iujt_ceklist_dbTaskMessage = 'Tambah';
		var iujt_ceklist_dbPermission = 'CRUD';
		var iujt_ceklist_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function iujt_ceklist_switchToGrid(){
			iujt_ceklist_formPanel.setDisabled(true);
			iujt_ceklist_gridPanel.setDisabled(false);
			iujt_ceklist_formWindow.hide();
		}
		
		function iujt_ceklist_switchToForm(){
			iujt_ceklist_gridPanel.setDisabled(true);
			iujt_ceklist_formPanel.setDisabled(false);
			iujt_ceklist_formWindow.show();
		}
		
		function iujt_ceklist_confirmAdd(){
			iujt_ceklist_dbTask = 'CREATE';
			iujt_ceklist_dbTaskMessage = 'created';
			iujt_ceklist_resetForm();
			iujt_ceklist_switchToForm();
		}
		
		function iujt_ceklist_confirmUpdate(){
			if(iujt_ceklist_gridPanel.selModel.getCount() == 1) {
				iujt_ceklist_dbTask = 'UPDATE';
				iujt_ceklist_dbTaskMessage = 'updated';
				iujt_ceklist_switchToForm();
				iujt_ceklist_setForm();
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
		
		function iujt_ceklist_confirmDelete(){
			if(iujt_ceklist_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, iujt_ceklist_delete);
			}else if(iujt_ceklist_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, iujt_ceklist_delete);
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
		
		function iujt_ceklist_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(iujt_ceklist_dbPermission)==false && pattC.test(iujt_ceklist_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(iujt_ceklist_confirmFormValid()){
					var iujt_cek_idValue = '';
					var iujt_cek_iujt_idValue = '';
					var iujt_cek_iujtdet_idValue = '';
					var iujt_cek_syarat_idValue = '';
					var iujt_cek_statusValue = '';
										
					iujt_cek_idValue = iujt_cek_idField.getValue();
					iujt_cek_iujt_idValue = iujt_cek_iujt_idField.getValue();
					iujt_cek_iujtdet_idValue = iujt_cek_iujtdet_idField.getValue();
					iujt_cek_syarat_idValue = iujt_cek_syarat_idField.getValue();
					iujt_cek_statusValue = iujt_cek_statusField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_t_iujt_ceklist/switchAction',
						params: {							
							iujt_cek_id : iujt_cek_idValue,
							iujt_cek_iujt_id : iujt_cek_iujt_idValue,
							iujt_cek_iujtdet_id : iujt_cek_iujtdet_idValue,
							iujt_cek_syarat_id : iujt_cek_syarat_idValue,
							iujt_cek_status : iujt_cek_statusValue,
							action : iujt_ceklist_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									iujt_ceklist_dataStore.reload();
									iujt_ceklist_resetForm();
									iujt_ceklist_switchToGrid();
									iujt_ceklist_gridPanel.getSelectionModel().deselectAll();
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
		
		function iujt_ceklist_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(iujt_ceklist_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = iujt_ceklist_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< iujt_ceklist_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.iujt_cek_id);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_t_iujt_ceklist/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									iujt_ceklist_dataStore.reload();
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
		
		function iujt_ceklist_refresh(){
			iujt_ceklist_dbListAction = "GETLIST";
			iujt_ceklist_gridSearchField.reset();
			iujt_ceklist_searchPanel.getForm().reset();
			iujt_ceklist_dataStore.proxy.extraParams = { action : 'GETLIST' };
			iujt_ceklist_dataStore.proxy.extraParams.query = "";
			iujt_ceklist_dataStore.currentPage = 1;
			iujt_ceklist_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function iujt_ceklist_confirmFormValid(){
			return iujt_ceklist_formPanel.getForm().isValid();
		}
		
		function iujt_ceklist_resetForm(){
			iujt_ceklist_dbTask = 'CREATE';
			iujt_ceklist_dbTaskMessage = 'create';
			iujt_ceklist_formPanel.getForm().reset();
			iujt_cek_idField.setValue(0);
		}
		
		function iujt_ceklist_setForm(){
			iujt_ceklist_dbTask = 'UPDATE';
            iujt_ceklist_dbTaskMessage = 'update';
			
			var record = iujt_ceklist_gridPanel.getSelectionModel().getSelection()[0];
			iujt_cek_idField.setValue(record.data.iujt_cek_id);
			iujt_cek_iujt_idField.setValue(record.data.iujt_cek_iujt_id);
			iujt_cek_iujtdet_idField.setValue(record.data.iujt_cek_iujtdet_id);
			iujt_cek_syarat_idField.setValue(record.data.iujt_cek_syarat_id);
			iujt_cek_statusField.setValue(record.data.iujt_cek_status);
					}
		
		function iujt_ceklist_showSearchWindow(){
			iujt_ceklist_searchWindow.show();
		}
		
		function iujt_ceklist_search(){
			iujt_ceklist_gridSearchField.reset();
			
			var iujt_cek_iujt_idValue = '';
			var iujt_cek_iujtdet_idValue = '';
			var iujt_cek_syarat_idValue = '';
			var iujt_cek_statusValue = '';
						
			iujt_cek_iujt_idValue = iujt_cek_iujt_idSearchField.getValue();
			iujt_cek_iujtdet_idValue = iujt_cek_iujtdet_idSearchField.getValue();
			iujt_cek_syarat_idValue = iujt_cek_syarat_idSearchField.getValue();
			iujt_cek_statusValue = iujt_cek_statusSearchField.getValue();
			iujt_ceklist_dbListAction = "SEARCH";
			iujt_ceklist_dataStore.proxy.extraParams = { 
				iujt_cek_iujt_id : iujt_cek_iujt_idValue,
				iujt_cek_iujtdet_id : iujt_cek_iujtdet_idValue,
				iujt_cek_syarat_id : iujt_cek_syarat_idValue,
				iujt_cek_status : iujt_cek_statusValue,
				action : 'SEARCH'
			};
			iujt_ceklist_dataStore.currentPage = 1;
			iujt_ceklist_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function iujt_ceklist_printExcel(outputType){
			var searchText = "";
			var iujt_cek_iujt_idValue = '';
			var iujt_cek_iujtdet_idValue = '';
			var iujt_cek_syarat_idValue = '';
			var iujt_cek_statusValue = '';
			
			if(iujt_ceklist_dataStore.proxy.extraParams.query!==null){searchText = iujt_ceklist_dataStore.proxy.extraParams.query;}
			if(iujt_ceklist_dataStore.proxy.extraParams.iujt_cek_iujt_id!==null){iujt_cek_iujt_idValue = iujt_ceklist_dataStore.proxy.extraParams.iujt_cek_iujt_id;}
			if(iujt_ceklist_dataStore.proxy.extraParams.iujt_cek_iujtdet_id!==null){iujt_cek_iujtdet_idValue = iujt_ceklist_dataStore.proxy.extraParams.iujt_cek_iujtdet_id;}
			if(iujt_ceklist_dataStore.proxy.extraParams.iujt_cek_syarat_id!==null){iujt_cek_syarat_idValue = iujt_ceklist_dataStore.proxy.extraParams.iujt_cek_syarat_id;}
			if(iujt_ceklist_dataStore.proxy.extraParams.iujt_cek_status!==null){iujt_cek_statusValue = iujt_ceklist_dataStore.proxy.extraParams.iujt_cek_status;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_t_iujt_ceklist/switchAction',
				params : {
					action : outputType,
					query : searchText,
					iujt_cek_iujt_id : iujt_cek_iujt_idValue,
					iujt_cek_iujtdet_id : iujt_cek_iujtdet_idValue,
					iujt_cek_syarat_id : iujt_cek_syarat_idValue,
					iujt_cek_status : iujt_cek_statusValue,
					currentAction : iujt_ceklist_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/t_iujt_ceklist_list.xls');
							}else{
								window.open('./print/t_iujt_ceklist_list.html','iujt_ceklistlist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		iujt_ceklist_dataStore = Ext.create('Ext.data.Store',{
			id : 'iujt_ceklist_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_iujt_ceklist/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'iujt_cek_id'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'iujt_cek_id', type : 'int', mapping : 'iujt_cek_id' },
				{ name : 'iujt_cek_iujt_id', type : 'int', mapping : 'iujt_cek_iujt_id' },
				{ name : 'iujt_cek_iujtdet_id', type : 'int', mapping : 'iujt_cek_iujtdet_id' },
				{ name : 'iujt_cek_syarat_id', type : 'int', mapping : 'iujt_cek_syarat_id' },
				{ name : 'iujt_cek_status', type : 'int', mapping : 'iujt_cek_status' },
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		iujt_ceklist_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						iujt_ceklist_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						iujt_ceklist_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						iujt_ceklist_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						iujt_ceklist_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						iujt_ceklist_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						iujt_ceklist_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						iujt_ceklist_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						iujt_ceklist_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var iujt_ceklist_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : iujt_ceklist_confirmAdd
		});
		var iujt_ceklist_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : iujt_ceklist_confirmUpdate
		});
		var iujt_ceklist_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : iujt_ceklist_confirmDelete
		});
		var iujt_ceklist_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : iujt_ceklist_refresh
		});
		var iujt_ceklist_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : iujt_ceklist_showSearchWindow
		});
		var iujt_ceklist_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				iujt_ceklist_printExcel('PRINT');
			}
		});
		var iujt_ceklist_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				iujt_ceklist_printExcel('EXCEL');
			}
		});
		
		var iujt_ceklist_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : iujt_ceklist_confirmUpdate
		});
		var iujt_ceklist_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : iujt_ceklist_confirmDelete
		});
		var iujt_ceklist_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : iujt_ceklist_refresh
		});
		iujt_ceklist_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'iujt_ceklist_contextMenu',
			items: [
				iujt_ceklist_contextMenuEdit,iujt_ceklist_contextMenuDelete,'-',iujt_ceklist_contextMenuRefresh
			]
		});
		
		iujt_ceklist_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : iujt_ceklist_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						iujt_ceklist_dataStore.proxy.extraParams = { action : 'GETLIST'};
						iujt_ceklist_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		iujt_ceklist_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'iujt_ceklist_gridPanel',
			constrain : true,
			store : iujt_ceklist_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'iujt_ceklistGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						iujt_ceklist_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : iujt_ceklist_shorcut,
			columns : [
				{
					text : 'iujt_cek_iujt_id',
					dataIndex : 'iujt_cek_iujt_id',
					width : 100,
					sortable : false
				},
				{
					text : 'iujt_cek_iujtdet_id',
					dataIndex : 'iujt_cek_iujtdet_id',
					width : 100,
					sortable : false
				},
				{
					text : 'iujt_cek_syarat_id',
					dataIndex : 'iujt_cek_syarat_id',
					width : 100,
					sortable : false
				},
				{
					text : 'iujt_cek_status',
					dataIndex : 'iujt_cek_status',
					width : 100,
					sortable : false
				},
							
			],
			tbar : [
				iujt_ceklist_addButton,
				iujt_ceklist_editButton,
				iujt_ceklist_deleteButton,
				iujt_ceklist_gridSearchField,
				iujt_ceklist_searchButton,
				iujt_ceklist_refreshButton,
				iujt_ceklist_printButton,
				iujt_ceklist_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : iujt_ceklist_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					iujt_ceklist_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		iujt_cek_idField = Ext.create('Ext.form.NumberField',{
			id : 'iujt_cek_idField',
			name : 'iujt_cek_id',
			fieldLabel : 'iujt_cek_id<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		iujt_cek_iujt_idField = Ext.create('Ext.form.NumberField',{
			id : 'iujt_cek_iujt_idField',
			name : 'iujt_cek_iujt_id',
			fieldLabel : 'iujt_cek_iujt_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		iujt_cek_iujtdet_idField = Ext.create('Ext.form.NumberField',{
			id : 'iujt_cek_iujtdet_idField',
			name : 'iujt_cek_iujtdet_id',
			fieldLabel : 'iujt_cek_iujtdet_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		iujt_cek_syarat_idField = Ext.create('Ext.form.NumberField',{
			id : 'iujt_cek_syarat_idField',
			name : 'iujt_cek_syarat_id',
			fieldLabel : 'iujt_cek_syarat_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		iujt_cek_statusField = Ext.create('Ext.form.NumberField',{
			id : 'iujt_cek_statusField',
			name : 'iujt_cek_status',
			fieldLabel : 'iujt_cek_status',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		var iujt_ceklist_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : iujt_ceklist_save
		});
		var iujt_ceklist_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				iujt_ceklist_resetForm();
				iujt_ceklist_switchToGrid();
			}
		});
		iujt_ceklist_formPanel = Ext.create('Ext.form.Panel', {
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
						iujt_cek_idField,
						iujt_cek_iujt_idField,
						iujt_cek_iujtdet_idField,
						iujt_cek_syarat_idField,
						iujt_cek_statusField,
											]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [iujt_ceklist_saveButton,iujt_ceklist_cancelButton]
		});
		iujt_ceklist_formWindow = Ext.create('Ext.window.Window',{
			id : 'iujt_ceklist_formWindow',
			renderTo : 'iujt_ceklistSaveWindow',
			title : globalFormAddEditTitle + ' ' + iujt_ceklist_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [iujt_ceklist_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		iujt_cek_iujt_idSearchField = Ext.create('Ext.form.NumberField',{
			id : 'iujt_cek_iujt_idSearchField',
			name : 'iujt_cek_iujt_id',
			fieldLabel : 'iujt_cek_iujt_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		iujt_cek_iujtdet_idSearchField = Ext.create('Ext.form.NumberField',{
			id : 'iujt_cek_iujtdet_idSearchField',
			name : 'iujt_cek_iujtdet_id',
			fieldLabel : 'iujt_cek_iujtdet_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		iujt_cek_syarat_idSearchField = Ext.create('Ext.form.NumberField',{
			id : 'iujt_cek_syarat_idSearchField',
			name : 'iujt_cek_syarat_id',
			fieldLabel : 'iujt_cek_syarat_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		iujt_cek_statusSearchField = Ext.create('Ext.form.NumberField',{
			id : 'iujt_cek_statusSearchField',
			name : 'iujt_cek_status',
			fieldLabel : 'iujt_cek_status',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		var iujt_ceklist_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : iujt_ceklist_search
		});
		var iujt_ceklist_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				iujt_ceklist_searchWindow.hide();
			}
		});
		iujt_ceklist_searchPanel = Ext.create('Ext.form.Panel', {
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
						iujt_cek_iujt_idSearchField,
						iujt_cek_iujtdet_idSearchField,
						iujt_cek_syarat_idSearchField,
						iujt_cek_statusSearchField,
						]
				}],
			buttons : [iujt_ceklist_searchingButton,iujt_ceklist_cancelSearchButton]
		});
		iujt_ceklist_searchWindow = Ext.create('Ext.window.Window',{
			id : 'iujt_ceklist_searchWindow',
			renderTo : 'iujt_ceklistSearchWindow',
			title : globalFormSearchTitle + ' ' + iujt_ceklist_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [iujt_ceklist_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="iujt_ceklistSaveWindow"></div>
<div id="iujt_ceklistSearchWindow"></div>
<div class="span12" id="iujt_ceklistGrid"></div>