<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var sipd_ceklist_componentItemTitle="SIPD_CEKLIST";
		var sipd_ceklist_dataStore;
		
		var sipd_ceklist_shorcut;
		var sipd_ceklist_contextMenu;
		var sipd_ceklist_gridSearchField;
		var sipd_ceklist_gridPanel;
		var sipd_ceklist_formPanel;
		var sipd_ceklist_formWindow;
		var sipd_ceklist_searchPanel;
		var sipd_ceklist_searchWindow;
		
		var sipd_cek_idField;
		var sipd_cek_syarat_idField;
		var sipd_cek_sipd_idField;
		var sipd_cek_sipddet_idField;
		var sipd_cek_statusField;
		var sipd_cek_keteranganField;
				
		var sipd_cek_syarat_idSearchField;
		var sipd_cek_sipd_idSearchField;
		var sipd_cek_sipddet_idSearchField;
		var sipd_cek_statusSearchField;
		var sipd_cek_keteranganSearchField;
				
		var sipd_ceklist_dbTask = 'CREATE';
		var sipd_ceklist_dbTaskMessage = 'Tambah';
		var sipd_ceklist_dbPermission = 'CRUD';
		var sipd_ceklist_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function sipd_ceklist_switchToGrid(){
			sipd_ceklist_formPanel.setDisabled(true);
			sipd_ceklist_gridPanel.setDisabled(false);
			sipd_ceklist_formWindow.hide();
		}
		
		function sipd_ceklist_switchToForm(){
			sipd_ceklist_gridPanel.setDisabled(true);
			sipd_ceklist_formPanel.setDisabled(false);
			sipd_ceklist_formWindow.show();
		}
		
		function sipd_ceklist_confirmAdd(){
			sipd_ceklist_dbTask = 'CREATE';
			sipd_ceklist_dbTaskMessage = 'created';
			sipd_ceklist_resetForm();
			sipd_ceklist_switchToForm();
		}
		
		function sipd_ceklist_confirmUpdate(){
			if(sipd_ceklist_gridPanel.selModel.getCount() == 1) {
				sipd_ceklist_dbTask = 'UPDATE';
				sipd_ceklist_dbTaskMessage = 'updated';
				sipd_ceklist_switchToForm();
				sipd_ceklist_setForm();
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
		
		function sipd_ceklist_confirmDelete(){
			if(sipd_ceklist_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, sipd_ceklist_delete);
			}else if(sipd_ceklist_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, sipd_ceklist_delete);
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
		
		function sipd_ceklist_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(sipd_ceklist_dbPermission)==false && pattC.test(sipd_ceklist_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(sipd_ceklist_confirmFormValid()){
					var sipd_cek_idValue = '';
					var sipd_cek_syarat_idValue = '';
					var sipd_cek_sipd_idValue = '';
					var sipd_cek_sipddet_idValue = '';
					var sipd_cek_statusValue = '';
					var sipd_cek_keteranganValue = '';
										
					sipd_cek_idValue = sipd_cek_idField.getValue();
					sipd_cek_syarat_idValue = sipd_cek_syarat_idField.getValue();
					sipd_cek_sipd_idValue = sipd_cek_sipd_idField.getValue();
					sipd_cek_sipddet_idValue = sipd_cek_sipddet_idField.getValue();
					sipd_cek_statusValue = sipd_cek_statusField.getValue();
					sipd_cek_keteranganValue = sipd_cek_keteranganField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_t_sipd_ceklist/switchAction',
						params: {							
							sipd_cek_id : sipd_cek_idValue,
							sipd_cek_syarat_id : sipd_cek_syarat_idValue,
							sipd_cek_sipd_id : sipd_cek_sipd_idValue,
							sipd_cek_sipddet_id : sipd_cek_sipddet_idValue,
							sipd_cek_status : sipd_cek_statusValue,
							sipd_cek_keterangan : sipd_cek_keteranganValue,
							action : sipd_ceklist_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									sipd_ceklist_dataStore.reload();
									sipd_ceklist_resetForm();
									sipd_ceklist_switchToGrid();
									sipd_ceklist_gridPanel.getSelectionModel().deselectAll();
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
		
		function sipd_ceklist_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(sipd_ceklist_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = sipd_ceklist_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< sipd_ceklist_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.sipd_cek_id);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_t_sipd_ceklist/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									sipd_ceklist_dataStore.reload();
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
		
		function sipd_ceklist_refresh(){
			sipd_ceklist_dbListAction = "GETLIST";
			sipd_ceklist_gridSearchField.reset();
			sipd_ceklist_searchPanel.getForm().reset();
			sipd_ceklist_dataStore.proxy.extraParams = { action : 'GETLIST' };
			sipd_ceklist_dataStore.proxy.extraParams.query = "";
			sipd_ceklist_dataStore.currentPage = 1;
			sipd_ceklist_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function sipd_ceklist_confirmFormValid(){
			return sipd_ceklist_formPanel.getForm().isValid();
		}
		
		function sipd_ceklist_resetForm(){
			sipd_ceklist_dbTask = 'CREATE';
			sipd_ceklist_dbTaskMessage = 'create';
			sipd_ceklist_formPanel.getForm().reset();
			sipd_cek_idField.setValue(0);
		}
		
		function sipd_ceklist_setForm(){
			sipd_ceklist_dbTask = 'UPDATE';
            sipd_ceklist_dbTaskMessage = 'update';
			
			var record = sipd_ceklist_gridPanel.getSelectionModel().getSelection()[0];
			sipd_cek_idField.setValue(record.data.sipd_cek_id);
			sipd_cek_syarat_idField.setValue(record.data.sipd_cek_syarat_id);
			sipd_cek_sipd_idField.setValue(record.data.sipd_cek_sipd_id);
			sipd_cek_sipddet_idField.setValue(record.data.sipd_cek_sipddet_id);
			sipd_cek_statusField.setValue(record.data.sipd_cek_status);
			sipd_cek_keteranganField.setValue(record.data.sipd_cek_keterangan);
					}
		
		function sipd_ceklist_showSearchWindow(){
			sipd_ceklist_searchWindow.show();
		}
		
		function sipd_ceklist_search(){
			sipd_ceklist_gridSearchField.reset();
			
			var sipd_cek_syarat_idValue = '';
			var sipd_cek_sipd_idValue = '';
			var sipd_cek_sipddet_idValue = '';
			var sipd_cek_statusValue = '';
			var sipd_cek_keteranganValue = '';
						
			sipd_cek_syarat_idValue = sipd_cek_syarat_idSearchField.getValue();
			sipd_cek_sipd_idValue = sipd_cek_sipd_idSearchField.getValue();
			sipd_cek_sipddet_idValue = sipd_cek_sipddet_idSearchField.getValue();
			sipd_cek_statusValue = sipd_cek_statusSearchField.getValue();
			sipd_cek_keteranganValue = sipd_cek_keteranganSearchField.getValue();
			sipd_ceklist_dbListAction = "SEARCH";
			sipd_ceklist_dataStore.proxy.extraParams = { 
				sipd_cek_syarat_id : sipd_cek_syarat_idValue,
				sipd_cek_sipd_id : sipd_cek_sipd_idValue,
				sipd_cek_sipddet_id : sipd_cek_sipddet_idValue,
				sipd_cek_status : sipd_cek_statusValue,
				sipd_cek_keterangan : sipd_cek_keteranganValue,
				action : 'SEARCH'
			};
			sipd_ceklist_dataStore.currentPage = 1;
			sipd_ceklist_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function sipd_ceklist_printExcel(outputType){
			var searchText = "";
			var sipd_cek_syarat_idValue = '';
			var sipd_cek_sipd_idValue = '';
			var sipd_cek_sipddet_idValue = '';
			var sipd_cek_statusValue = '';
			var sipd_cek_keteranganValue = '';
			
			if(sipd_ceklist_dataStore.proxy.extraParams.query!==null){searchText = sipd_ceklist_dataStore.proxy.extraParams.query;}
			if(sipd_ceklist_dataStore.proxy.extraParams.sipd_cek_syarat_id!==null){sipd_cek_syarat_idValue = sipd_ceklist_dataStore.proxy.extraParams.sipd_cek_syarat_id;}
			if(sipd_ceklist_dataStore.proxy.extraParams.sipd_cek_sipd_id!==null){sipd_cek_sipd_idValue = sipd_ceklist_dataStore.proxy.extraParams.sipd_cek_sipd_id;}
			if(sipd_ceklist_dataStore.proxy.extraParams.sipd_cek_sipddet_id!==null){sipd_cek_sipddet_idValue = sipd_ceklist_dataStore.proxy.extraParams.sipd_cek_sipddet_id;}
			if(sipd_ceklist_dataStore.proxy.extraParams.sipd_cek_status!==null){sipd_cek_statusValue = sipd_ceklist_dataStore.proxy.extraParams.sipd_cek_status;}
			if(sipd_ceklist_dataStore.proxy.extraParams.sipd_cek_keterangan!==null){sipd_cek_keteranganValue = sipd_ceklist_dataStore.proxy.extraParams.sipd_cek_keterangan;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_t_sipd_ceklist/switchAction',
				params : {
					action : outputType,
					query : searchText,
					sipd_cek_syarat_id : sipd_cek_syarat_idValue,
					sipd_cek_sipd_id : sipd_cek_sipd_idValue,
					sipd_cek_sipddet_id : sipd_cek_sipddet_idValue,
					sipd_cek_status : sipd_cek_statusValue,
					sipd_cek_keterangan : sipd_cek_keteranganValue,
					currentAction : sipd_ceklist_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/t_sipd_ceklist_list.xls');
							}else{
								window.open('./print/t_sipd_ceklist_list.html','sipd_ceklistlist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		sipd_ceklist_dataStore = Ext.create('Ext.data.Store',{
			id : 'sipd_ceklist_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_sipd_ceklist/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'sipd_cek_id'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'sipd_cek_id', type : 'int', mapping : 'sipd_cek_id' },
				{ name : 'sipd_cek_syarat_id', type : 'int', mapping : 'sipd_cek_syarat_id' },
				{ name : 'sipd_cek_sipd_id', type : 'int', mapping : 'sipd_cek_sipd_id' },
				{ name : 'sipd_cek_sipddet_id', type : 'int', mapping : 'sipd_cek_sipddet_id' },
				{ name : 'sipd_cek_status', type : 'int', mapping : 'sipd_cek_status' },
				{ name : 'sipd_cek_keterangan', type : 'string', mapping : 'sipd_cek_keterangan' },
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		sipd_ceklist_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						sipd_ceklist_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						sipd_ceklist_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						sipd_ceklist_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						sipd_ceklist_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						sipd_ceklist_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						sipd_ceklist_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						sipd_ceklist_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						sipd_ceklist_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var sipd_ceklist_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : sipd_ceklist_confirmAdd
		});
		var sipd_ceklist_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : sipd_ceklist_confirmUpdate
		});
		var sipd_ceklist_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : sipd_ceklist_confirmDelete
		});
		var sipd_ceklist_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : sipd_ceklist_refresh
		});
		var sipd_ceklist_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : sipd_ceklist_showSearchWindow
		});
		var sipd_ceklist_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				sipd_ceklist_printExcel('PRINT');
			}
		});
		var sipd_ceklist_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				sipd_ceklist_printExcel('EXCEL');
			}
		});
		
		var sipd_ceklist_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : sipd_ceklist_confirmUpdate
		});
		var sipd_ceklist_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : sipd_ceklist_confirmDelete
		});
		var sipd_ceklist_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : sipd_ceklist_refresh
		});
		sipd_ceklist_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'sipd_ceklist_contextMenu',
			items: [
				sipd_ceklist_contextMenuEdit,sipd_ceklist_contextMenuDelete,'-',sipd_ceklist_contextMenuRefresh
			]
		});
		
		sipd_ceklist_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : sipd_ceklist_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						sipd_ceklist_dataStore.proxy.extraParams = { action : 'GETLIST'};
						sipd_ceklist_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		sipd_ceklist_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'sipd_ceklist_gridPanel',
			constrain : true,
			store : sipd_ceklist_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'sipd_ceklistGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						sipd_ceklist_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : sipd_ceklist_shorcut,
			columns : [
				{
					text : 'sipd_cek_syarat_id',
					dataIndex : 'sipd_cek_syarat_id',
					width : 100,
					sortable : false
				},
				{
					text : 'sipd_cek_sipd_id',
					dataIndex : 'sipd_cek_sipd_id',
					width : 100,
					sortable : false
				},
				{
					text : 'sipd_cek_sipddet_id',
					dataIndex : 'sipd_cek_sipddet_id',
					width : 100,
					sortable : false
				},
				{
					text : 'sipd_cek_status',
					dataIndex : 'sipd_cek_status',
					width : 100,
					sortable : false
				},
				{
					text : 'sipd_cek_keterangan',
					dataIndex : 'sipd_cek_keterangan',
					width : 100,
					sortable : false
				},
							
			],
			tbar : [
				sipd_ceklist_addButton,
				sipd_ceklist_editButton,
				sipd_ceklist_deleteButton,
				sipd_ceklist_gridSearchField,
				sipd_ceklist_searchButton,
				sipd_ceklist_refreshButton,
				sipd_ceklist_printButton,
				sipd_ceklist_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : sipd_ceklist_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					sipd_ceklist_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		sipd_cek_idField = Ext.create('Ext.form.NumberField',{
			id : 'sipd_cek_idField',
			name : 'sipd_cek_id',
			fieldLabel : 'sipd_cek_id<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		sipd_cek_syarat_idField = Ext.create('Ext.form.NumberField',{
			id : 'sipd_cek_syarat_idField',
			name : 'sipd_cek_syarat_id',
			fieldLabel : 'sipd_cek_syarat_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		sipd_cek_sipd_idField = Ext.create('Ext.form.NumberField',{
			id : 'sipd_cek_sipd_idField',
			name : 'sipd_cek_sipd_id',
			fieldLabel : 'sipd_cek_sipd_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		sipd_cek_sipddet_idField = Ext.create('Ext.form.NumberField',{
			id : 'sipd_cek_sipddet_idField',
			name : 'sipd_cek_sipddet_id',
			fieldLabel : 'sipd_cek_sipddet_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		sipd_cek_statusField = Ext.create('Ext.form.NumberField',{
			id : 'sipd_cek_statusField',
			name : 'sipd_cek_status',
			fieldLabel : 'sipd_cek_status',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		sipd_cek_keteranganField = Ext.create('Ext.form.TextField',{
			id : 'sipd_cek_keteranganField',
			name : 'sipd_cek_keterangan',
			fieldLabel : 'sipd_cek_keterangan',
			maxLength : 255
		});
		var sipd_ceklist_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : sipd_ceklist_save
		});
		var sipd_ceklist_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				sipd_ceklist_resetForm();
				sipd_ceklist_switchToGrid();
			}
		});
		sipd_ceklist_formPanel = Ext.create('Ext.form.Panel', {
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
						sipd_cek_idField,
						sipd_cek_syarat_idField,
						sipd_cek_sipd_idField,
						sipd_cek_sipddet_idField,
						sipd_cek_statusField,
						sipd_cek_keteranganField,
											]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [sipd_ceklist_saveButton,sipd_ceklist_cancelButton]
		});
		sipd_ceklist_formWindow = Ext.create('Ext.window.Window',{
			id : 'sipd_ceklist_formWindow',
			renderTo : 'sipd_ceklistSaveWindow',
			title : globalFormAddEditTitle + ' ' + sipd_ceklist_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [sipd_ceklist_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		sipd_cek_syarat_idSearchField = Ext.create('Ext.form.NumberField',{
			id : 'sipd_cek_syarat_idSearchField',
			name : 'sipd_cek_syarat_id',
			fieldLabel : 'sipd_cek_syarat_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		sipd_cek_sipd_idSearchField = Ext.create('Ext.form.NumberField',{
			id : 'sipd_cek_sipd_idSearchField',
			name : 'sipd_cek_sipd_id',
			fieldLabel : 'sipd_cek_sipd_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		sipd_cek_sipddet_idSearchField = Ext.create('Ext.form.NumberField',{
			id : 'sipd_cek_sipddet_idSearchField',
			name : 'sipd_cek_sipddet_id',
			fieldLabel : 'sipd_cek_sipddet_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		sipd_cek_statusSearchField = Ext.create('Ext.form.NumberField',{
			id : 'sipd_cek_statusSearchField',
			name : 'sipd_cek_status',
			fieldLabel : 'sipd_cek_status',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		sipd_cek_keteranganSearchField = Ext.create('Ext.form.TextField',{
			id : 'sipd_cek_keteranganSearchField',
			name : 'sipd_cek_keterangan',
			fieldLabel : 'sipd_cek_keterangan',
			maxLength : 255
		
		});
		var sipd_ceklist_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : sipd_ceklist_search
		});
		var sipd_ceklist_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				sipd_ceklist_searchWindow.hide();
			}
		});
		sipd_ceklist_searchPanel = Ext.create('Ext.form.Panel', {
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
						sipd_cek_syarat_idSearchField,
						sipd_cek_sipd_idSearchField,
						sipd_cek_sipddet_idSearchField,
						sipd_cek_statusSearchField,
						sipd_cek_keteranganSearchField,
						]
				}],
			buttons : [sipd_ceklist_searchingButton,sipd_ceklist_cancelSearchButton]
		});
		sipd_ceklist_searchWindow = Ext.create('Ext.window.Window',{
			id : 'sipd_ceklist_searchWindow',
			renderTo : 'sipd_ceklistSearchWindow',
			title : globalFormSearchTitle + ' ' + sipd_ceklist_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [sipd_ceklist_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="sipd_ceklistSaveWindow"></div>
<div id="sipd_ceklistSearchWindow"></div>
<div class="span12" id="sipd_ceklistGrid"></div>