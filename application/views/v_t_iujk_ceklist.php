<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var iujk_ceklist_componentItemTitle="IUJK_CEKLIST";
		var iujk_ceklist_dataStore;
		
		var iujk_ceklist_shorcut;
		var iujk_ceklist_contextMenu;
		var iujk_ceklist_gridSearchField;
		var iujk_ceklist_gridPanel;
		var iujk_ceklist_formPanel;
		var iujk_ceklist_formWindow;
		var iujk_ceklist_searchPanel;
		var iujk_ceklist_searchWindow;
		
		var iujk_cek_idField;
		var iujk_cek_syarat_idField;
		var iujk_cek_iujkdet_idField;
		var iujk_cek_iujk_idField;
		var iujk_cek_statusField;
		var iujk_cek_keteranganField;
				
		var iujk_cek_syarat_idSearchField;
		var iujk_cek_iujkdet_idSearchField;
		var iujk_cek_iujk_idSearchField;
		var iujk_cek_statusSearchField;
		var iujk_cek_keteranganSearchField;
				
		var iujk_ceklist_dbTask = 'CREATE';
		var iujk_ceklist_dbTaskMessage = 'Tambah';
		var iujk_ceklist_dbPermission = 'CRUD';
		var iujk_ceklist_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function iujk_ceklist_switchToGrid(){
			iujk_ceklist_formPanel.setDisabled(true);
			iujk_ceklist_gridPanel.setDisabled(false);
			iujk_ceklist_formWindow.hide();
		}
		
		function iujk_ceklist_switchToForm(){
			iujk_ceklist_gridPanel.setDisabled(true);
			iujk_ceklist_formPanel.setDisabled(false);
			iujk_ceklist_formWindow.show();
		}
		
		function iujk_ceklist_confirmAdd(){
			iujk_ceklist_dbTask = 'CREATE';
			iujk_ceklist_dbTaskMessage = 'created';
			iujk_ceklist_resetForm();
			iujk_ceklist_switchToForm();
		}
		
		function iujk_ceklist_confirmUpdate(){
			if(iujk_ceklist_gridPanel.selModel.getCount() == 1) {
				iujk_ceklist_dbTask = 'UPDATE';
				iujk_ceklist_dbTaskMessage = 'updated';
				iujk_ceklist_switchToForm();
				iujk_ceklist_setForm();
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
		
		function iujk_ceklist_confirmDelete(){
			if(iujk_ceklist_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, iujk_ceklist_delete);
			}else if(iujk_ceklist_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, iujk_ceklist_delete);
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
		
		function iujk_ceklist_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(iujk_ceklist_dbPermission)==false && pattC.test(iujk_ceklist_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(iujk_ceklist_confirmFormValid()){
					var iujk_cek_idValue = '';
					var iujk_cek_syarat_idValue = '';
					var iujk_cek_iujkdet_idValue = '';
					var iujk_cek_iujk_idValue = '';
					var iujk_cek_statusValue = '';
					var iujk_cek_keteranganValue = '';
										
					iujk_cek_idValue = iujk_cek_idField.getValue();
					iujk_cek_syarat_idValue = iujk_cek_syarat_idField.getValue();
					iujk_cek_iujkdet_idValue = iujk_cek_iujkdet_idField.getValue();
					iujk_cek_iujk_idValue = iujk_cek_iujk_idField.getValue();
					iujk_cek_statusValue = iujk_cek_statusField.getValue();
					iujk_cek_keteranganValue = iujk_cek_keteranganField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_t_iujk_ceklist/switchAction',
						params: {							
							iujk_cek_id : iujk_cek_idValue,
							iujk_cek_syarat_id : iujk_cek_syarat_idValue,
							iujk_cek_iujkdet_id : iujk_cek_iujkdet_idValue,
							iujk_cek_iujk_id : iujk_cek_iujk_idValue,
							iujk_cek_status : iujk_cek_statusValue,
							iujk_cek_keterangan : iujk_cek_keteranganValue,
							action : iujk_ceklist_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									iujk_ceklist_dataStore.reload();
									iujk_ceklist_resetForm();
									iujk_ceklist_switchToGrid();
									iujk_ceklist_gridPanel.getSelectionModel().deselectAll();
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
		
		function iujk_ceklist_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(iujk_ceklist_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = iujk_ceklist_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< iujk_ceklist_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.iujk_cek_id);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_t_iujk_ceklist/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									iujk_ceklist_dataStore.reload();
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
		
		function iujk_ceklist_refresh(){
			iujk_ceklist_dbListAction = "GETLIST";
			iujk_ceklist_gridSearchField.reset();
			iujk_ceklist_searchPanel.getForm().reset();
			iujk_ceklist_dataStore.proxy.extraParams = { action : 'GETLIST' };
			iujk_ceklist_dataStore.proxy.extraParams.query = "";
			iujk_ceklist_dataStore.currentPage = 1;
			iujk_ceklist_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function iujk_ceklist_confirmFormValid(){
			return iujk_ceklist_formPanel.getForm().isValid();
		}
		
		function iujk_ceklist_resetForm(){
			iujk_ceklist_dbTask = 'CREATE';
			iujk_ceklist_dbTaskMessage = 'create';
			iujk_ceklist_formPanel.getForm().reset();
			iujk_cek_idField.setValue(0);
		}
		
		function iujk_ceklist_setForm(){
			iujk_ceklist_dbTask = 'UPDATE';
            iujk_ceklist_dbTaskMessage = 'update';
			
			var record = iujk_ceklist_gridPanel.getSelectionModel().getSelection()[0];
			iujk_cek_idField.setValue(record.data.iujk_cek_id);
			iujk_cek_syarat_idField.setValue(record.data.iujk_cek_syarat_id);
			iujk_cek_iujkdet_idField.setValue(record.data.iujk_cek_iujkdet_id);
			iujk_cek_iujk_idField.setValue(record.data.iujk_cek_iujk_id);
			iujk_cek_statusField.setValue(record.data.iujk_cek_status);
			iujk_cek_keteranganField.setValue(record.data.iujk_cek_keterangan);
					}
		
		function iujk_ceklist_showSearchWindow(){
			iujk_ceklist_searchWindow.show();
		}
		
		function iujk_ceklist_search(){
			iujk_ceklist_gridSearchField.reset();
			
			var iujk_cek_syarat_idValue = '';
			var iujk_cek_iujkdet_idValue = '';
			var iujk_cek_iujk_idValue = '';
			var iujk_cek_statusValue = '';
			var iujk_cek_keteranganValue = '';
						
			iujk_cek_syarat_idValue = iujk_cek_syarat_idSearchField.getValue();
			iujk_cek_iujkdet_idValue = iujk_cek_iujkdet_idSearchField.getValue();
			iujk_cek_iujk_idValue = iujk_cek_iujk_idSearchField.getValue();
			iujk_cek_statusValue = iujk_cek_statusSearchField.getValue();
			iujk_cek_keteranganValue = iujk_cek_keteranganSearchField.getValue();
			iujk_ceklist_dbListAction = "SEARCH";
			iujk_ceklist_dataStore.proxy.extraParams = { 
				iujk_cek_syarat_id : iujk_cek_syarat_idValue,
				iujk_cek_iujkdet_id : iujk_cek_iujkdet_idValue,
				iujk_cek_iujk_id : iujk_cek_iujk_idValue,
				iujk_cek_status : iujk_cek_statusValue,
				iujk_cek_keterangan : iujk_cek_keteranganValue,
				action : 'SEARCH'
			};
			iujk_ceklist_dataStore.currentPage = 1;
			iujk_ceklist_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function iujk_ceklist_printExcel(outputType){
			var searchText = "";
			var iujk_cek_syarat_idValue = '';
			var iujk_cek_iujkdet_idValue = '';
			var iujk_cek_iujk_idValue = '';
			var iujk_cek_statusValue = '';
			var iujk_cek_keteranganValue = '';
			
			if(iujk_ceklist_dataStore.proxy.extraParams.query!==null){searchText = iujk_ceklist_dataStore.proxy.extraParams.query;}
			if(iujk_ceklist_dataStore.proxy.extraParams.iujk_cek_syarat_id!==null){iujk_cek_syarat_idValue = iujk_ceklist_dataStore.proxy.extraParams.iujk_cek_syarat_id;}
			if(iujk_ceklist_dataStore.proxy.extraParams.iujk_cek_iujkdet_id!==null){iujk_cek_iujkdet_idValue = iujk_ceklist_dataStore.proxy.extraParams.iujk_cek_iujkdet_id;}
			if(iujk_ceklist_dataStore.proxy.extraParams.iujk_cek_iujk_id!==null){iujk_cek_iujk_idValue = iujk_ceklist_dataStore.proxy.extraParams.iujk_cek_iujk_id;}
			if(iujk_ceklist_dataStore.proxy.extraParams.iujk_cek_status!==null){iujk_cek_statusValue = iujk_ceklist_dataStore.proxy.extraParams.iujk_cek_status;}
			if(iujk_ceklist_dataStore.proxy.extraParams.iujk_cek_keterangan!==null){iujk_cek_keteranganValue = iujk_ceklist_dataStore.proxy.extraParams.iujk_cek_keterangan;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_t_iujk_ceklist/switchAction',
				params : {
					action : outputType,
					query : searchText,
					iujk_cek_syarat_id : iujk_cek_syarat_idValue,
					iujk_cek_iujkdet_id : iujk_cek_iujkdet_idValue,
					iujk_cek_iujk_id : iujk_cek_iujk_idValue,
					iujk_cek_status : iujk_cek_statusValue,
					iujk_cek_keterangan : iujk_cek_keteranganValue,
					currentAction : iujk_ceklist_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/t_iujk_ceklist_list.xls');
							}else{
								window.open('./print/t_iujk_ceklist_list.html','iujk_ceklistlist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		iujk_ceklist_dataStore = Ext.create('Ext.data.Store',{
			id : 'iujk_ceklist_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_iujk_ceklist/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'iujk_cek_id'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'iujk_cek_id', type : 'int', mapping : 'iujk_cek_id' },
				{ name : 'iujk_cek_syarat_id', type : 'int', mapping : 'iujk_cek_syarat_id' },
				{ name : 'iujk_cek_iujkdet_id', type : 'int', mapping : 'iujk_cek_iujkdet_id' },
				{ name : 'iujk_cek_iujk_id', type : 'int', mapping : 'iujk_cek_iujk_id' },
				{ name : 'iujk_cek_status', type : 'int', mapping : 'iujk_cek_status' },
				{ name : 'iujk_cek_keterangan', type : 'string', mapping : 'iujk_cek_keterangan' },
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		iujk_ceklist_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						iujk_ceklist_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						iujk_ceklist_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						iujk_ceklist_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						iujk_ceklist_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						iujk_ceklist_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						iujk_ceklist_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						iujk_ceklist_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						iujk_ceklist_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var iujk_ceklist_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : iujk_ceklist_confirmAdd
		});
		var iujk_ceklist_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : iujk_ceklist_confirmUpdate
		});
		var iujk_ceklist_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : iujk_ceklist_confirmDelete
		});
		var iujk_ceklist_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : iujk_ceklist_refresh
		});
		var iujk_ceklist_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : iujk_ceklist_showSearchWindow
		});
		var iujk_ceklist_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				iujk_ceklist_printExcel('PRINT');
			}
		});
		var iujk_ceklist_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				iujk_ceklist_printExcel('EXCEL');
			}
		});
		
		var iujk_ceklist_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : iujk_ceklist_confirmUpdate
		});
		var iujk_ceklist_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : iujk_ceklist_confirmDelete
		});
		var iujk_ceklist_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : iujk_ceklist_refresh
		});
		iujk_ceklist_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'iujk_ceklist_contextMenu',
			items: [
				iujk_ceklist_contextMenuEdit,iujk_ceklist_contextMenuDelete,'-',iujk_ceklist_contextMenuRefresh
			]
		});
		
		iujk_ceklist_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : iujk_ceklist_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						iujk_ceklist_dataStore.proxy.extraParams = { action : 'GETLIST'};
						iujk_ceklist_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		iujk_ceklist_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'iujk_ceklist_gridPanel',
			constrain : true,
			store : iujk_ceklist_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'iujk_ceklistGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						iujk_ceklist_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : iujk_ceklist_shorcut,
			columns : [
				{
					text : 'iujk_cek_syarat_id',
					dataIndex : 'iujk_cek_syarat_id',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_cek_iujkdet_id',
					dataIndex : 'iujk_cek_iujkdet_id',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_cek_iujk_id',
					dataIndex : 'iujk_cek_iujk_id',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_cek_status',
					dataIndex : 'iujk_cek_status',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_cek_keterangan',
					dataIndex : 'iujk_cek_keterangan',
					width : 100,
					sortable : false
				},
							
			],
			tbar : [
				iujk_ceklist_addButton,
				iujk_ceklist_editButton,
				iujk_ceklist_deleteButton,
				iujk_ceklist_gridSearchField,
				iujk_ceklist_searchButton,
				iujk_ceklist_refreshButton,
				iujk_ceklist_printButton,
				iujk_ceklist_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : iujk_ceklist_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					iujk_ceklist_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		iujk_cek_idField = Ext.create('Ext.form.NumberField',{
			id : 'iujk_cek_idField',
			name : 'iujk_cek_id',
			fieldLabel : 'iujk_cek_id<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		iujk_cek_syarat_idField = Ext.create('Ext.form.NumberField',{
			id : 'iujk_cek_syarat_idField',
			name : 'iujk_cek_syarat_id',
			fieldLabel : 'iujk_cek_syarat_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		iujk_cek_iujkdet_idField = Ext.create('Ext.form.NumberField',{
			id : 'iujk_cek_iujkdet_idField',
			name : 'iujk_cek_iujkdet_id',
			fieldLabel : 'iujk_cek_iujkdet_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		iujk_cek_iujk_idField = Ext.create('Ext.form.NumberField',{
			id : 'iujk_cek_iujk_idField',
			name : 'iujk_cek_iujk_id',
			fieldLabel : 'iujk_cek_iujk_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		iujk_cek_statusField = Ext.create('Ext.form.NumberField',{
			id : 'iujk_cek_statusField',
			name : 'iujk_cek_status',
			fieldLabel : 'iujk_cek_status',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		iujk_cek_keteranganField = Ext.create('Ext.form.TextField',{
			id : 'iujk_cek_keteranganField',
			name : 'iujk_cek_keterangan',
			fieldLabel : 'iujk_cek_keterangan',
			maxLength : 255
		});
		var iujk_ceklist_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : iujk_ceklist_save
		});
		var iujk_ceklist_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				iujk_ceklist_resetForm();
				iujk_ceklist_switchToGrid();
			}
		});
		iujk_ceklist_formPanel = Ext.create('Ext.form.Panel', {
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
						iujk_cek_idField,
						iujk_cek_syarat_idField,
						iujk_cek_iujkdet_idField,
						iujk_cek_iujk_idField,
						iujk_cek_statusField,
						iujk_cek_keteranganField,
											]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [iujk_ceklist_saveButton,iujk_ceklist_cancelButton]
		});
		iujk_ceklist_formWindow = Ext.create('Ext.window.Window',{
			id : 'iujk_ceklist_formWindow',
			renderTo : 'iujk_ceklistSaveWindow',
			title : globalFormAddEditTitle + ' ' + iujk_ceklist_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [iujk_ceklist_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		iujk_cek_syarat_idSearchField = Ext.create('Ext.form.NumberField',{
			id : 'iujk_cek_syarat_idSearchField',
			name : 'iujk_cek_syarat_id',
			fieldLabel : 'iujk_cek_syarat_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		iujk_cek_iujkdet_idSearchField = Ext.create('Ext.form.NumberField',{
			id : 'iujk_cek_iujkdet_idSearchField',
			name : 'iujk_cek_iujkdet_id',
			fieldLabel : 'iujk_cek_iujkdet_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		iujk_cek_iujk_idSearchField = Ext.create('Ext.form.NumberField',{
			id : 'iujk_cek_iujk_idSearchField',
			name : 'iujk_cek_iujk_id',
			fieldLabel : 'iujk_cek_iujk_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		iujk_cek_statusSearchField = Ext.create('Ext.form.NumberField',{
			id : 'iujk_cek_statusSearchField',
			name : 'iujk_cek_status',
			fieldLabel : 'iujk_cek_status',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		iujk_cek_keteranganSearchField = Ext.create('Ext.form.TextField',{
			id : 'iujk_cek_keteranganSearchField',
			name : 'iujk_cek_keterangan',
			fieldLabel : 'iujk_cek_keterangan',
			maxLength : 255
		
		});
		var iujk_ceklist_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : iujk_ceklist_search
		});
		var iujk_ceklist_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				iujk_ceklist_searchWindow.hide();
			}
		});
		iujk_ceklist_searchPanel = Ext.create('Ext.form.Panel', {
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
						iujk_cek_syarat_idSearchField,
						iujk_cek_iujkdet_idSearchField,
						iujk_cek_iujk_idSearchField,
						iujk_cek_statusSearchField,
						iujk_cek_keteranganSearchField,
						]
				}],
			buttons : [iujk_ceklist_searchingButton,iujk_ceklist_cancelSearchButton]
		});
		iujk_ceklist_searchWindow = Ext.create('Ext.window.Window',{
			id : 'iujk_ceklist_searchWindow',
			renderTo : 'iujk_ceklistSearchWindow',
			title : globalFormSearchTitle + ' ' + iujk_ceklist_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [iujk_ceklist_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="iujk_ceklistSaveWindow"></div>
<div id="iujk_ceklistSearchWindow"></div>
<div class="span12" id="iujk_ceklistGrid"></div>