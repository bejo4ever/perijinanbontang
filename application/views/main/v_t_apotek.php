<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var apotek_componentItemTitle="APOTEK";
		var apotek_dataStore;
		
		var apotek_shorcut;
		var apotek_contextMenu;
		var apotek_gridSearchField;
		var apotek_gridPanel;
		var apotek_formPanel;
		var apotek_formWindow;
		var apotek_searchPanel;
		var apotek_searchWindow;
		
		var apotek_idField;
		var apotek_namaField;
		var apotek_alamatField;
		var apotek_telpField;
		var apotek_kelField;
		var apotek_kecField;
		var apotek_kepemilikanField;
		var apotek_pemilikField;
		var apotek_pemilikalamatField;
		var apotek_pemiliknpwpField;
		var apotek_siupField;
				
		var apotek_namaSearchField;
		var apotek_alamatSearchField;
		var apotek_telpSearchField;
		var apotek_kelSearchField;
		var apotek_kecSearchField;
		var apotek_kepemilikanSearchField;
		var apotek_pemilikSearchField;
		var apotek_pemilikalamatSearchField;
		var apotek_pemiliknpwpSearchField;
		var apotek_siupSearchField;
				
		var apotek_dbTask = 'CREATE';
		var apotek_dbTaskMessage = 'Tambah';
		var apotek_dbPermission = 'CRUD';
		var apotek_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function apotek_switchToGrid(){
			apotek_formPanel.setDisabled(true);
			apotek_gridPanel.setDisabled(false);
			apotek_formWindow.hide();
		}
		
		function apotek_switchToForm(){
			apotek_gridPanel.setDisabled(true);
			apotek_formPanel.setDisabled(false);
			apotek_formWindow.show();
		}
		
		function apotek_confirmAdd(){
			apotek_dbTask = 'CREATE';
			apotek_dbTaskMessage = 'created';
			apotek_resetForm();
			apotek_switchToForm();
		}
		
		function apotek_confirmUpdate(){
			if(apotek_gridPanel.selModel.getCount() == 1) {
				apotek_dbTask = 'UPDATE';
				apotek_dbTaskMessage = 'updated';
				apotek_switchToForm();
				apotek_setForm();
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
		
		function apotek_confirmDelete(){
			if(apotek_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, apotek_delete);
			}else if(apotek_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, apotek_delete);
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
		
		function apotek_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(apotek_dbPermission)==false && pattC.test(apotek_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(apotek_confirmFormValid()){
					var apotek_idValue = '';
					var apotek_namaValue = '';
					var apotek_alamatValue = '';
					var apotek_telpValue = '';
					var apotek_kelValue = '';
					var apotek_kecValue = '';
					var apotek_kepemilikanValue = '';
					var apotek_pemilikValue = '';
					var apotek_pemilikalamatValue = '';
					var apotek_pemiliknpwpValue = '';
					var apotek_siupValue = '';
										
					apotek_idValue = apotek_idField.getValue();
					apotek_namaValue = apotek_namaField.getValue();
					apotek_alamatValue = apotek_alamatField.getValue();
					apotek_telpValue = apotek_telpField.getValue();
					apotek_kelValue = apotek_kelField.getValue();
					apotek_kecValue = apotek_kecField.getValue();
					apotek_kepemilikanValue = apotek_kepemilikanField.getValue();
					apotek_pemilikValue = apotek_pemilikField.getValue();
					apotek_pemilikalamatValue = apotek_pemilikalamatField.getValue();
					apotek_pemiliknpwpValue = apotek_pemiliknpwpField.getValue();
					apotek_siupValue = apotek_siupField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_t_apotek/switchAction',
						params: {							
							apotek_id : apotek_idValue,
							apotek_nama : apotek_namaValue,
							apotek_alamat : apotek_alamatValue,
							apotek_telp : apotek_telpValue,
							apotek_kel : apotek_kelValue,
							apotek_kec : apotek_kecValue,
							apotek_kepemilikan : apotek_kepemilikanValue,
							apotek_pemilik : apotek_pemilikValue,
							apotek_pemilikalamat : apotek_pemilikalamatValue,
							apotek_pemiliknpwp : apotek_pemiliknpwpValue,
							apotek_siup : apotek_siupValue,
							action : apotek_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									apotek_dataStore.reload();
									apotek_resetForm();
									apotek_switchToGrid();
									apotek_gridPanel.getSelectionModel().deselectAll();
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
		
		function apotek_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(apotek_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = apotek_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< apotek_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.apotek_id);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_t_apotek/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									apotek_dataStore.reload();
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
		
		function apotek_refresh(){
			apotek_dbListAction = "GETLIST";
			apotek_gridSearchField.reset();
			apotek_searchPanel.getForm().reset();
			apotek_dataStore.proxy.extraParams = { action : 'GETLIST' };
			apotek_dataStore.proxy.extraParams.query = "";
			apotek_dataStore.currentPage = 1;
			apotek_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function apotek_confirmFormValid(){
			return apotek_formPanel.getForm().isValid();
		}
		
		function apotek_resetForm(){
			apotek_dbTask = 'CREATE';
			apotek_dbTaskMessage = 'create';
			apotek_formPanel.getForm().reset();
			apotek_idField.setValue(0);
		}
		
		function apotek_setForm(){
			apotek_dbTask = 'UPDATE';
            apotek_dbTaskMessage = 'update';
			
			var record = apotek_gridPanel.getSelectionModel().getSelection()[0];
			apotek_idField.setValue(record.data.apotek_id);
			apotek_namaField.setValue(record.data.apotek_nama);
			apotek_alamatField.setValue(record.data.apotek_alamat);
			apotek_telpField.setValue(record.data.apotek_telp);
			apotek_kelField.setValue(record.data.apotek_kel);
			apotek_kecField.setValue(record.data.apotek_kec);
			apotek_kepemilikanField.setValue(record.data.apotek_kepemilikan);
			apotek_pemilikField.setValue(record.data.apotek_pemilik);
			apotek_pemilikalamatField.setValue(record.data.apotek_pemilikalamat);
			apotek_pemiliknpwpField.setValue(record.data.apotek_pemiliknpwp);
			apotek_siupField.setValue(record.data.apotek_siup);
					}
		
		function apotek_showSearchWindow(){
			apotek_searchWindow.show();
		}
		
		function apotek_search(){
			apotek_gridSearchField.reset();
			
			var apotek_namaValue = '';
			var apotek_alamatValue = '';
			var apotek_telpValue = '';
			var apotek_kelValue = '';
			var apotek_kecValue = '';
			var apotek_kepemilikanValue = '';
			var apotek_pemilikValue = '';
			var apotek_pemilikalamatValue = '';
			var apotek_pemiliknpwpValue = '';
			var apotek_siupValue = '';
						
			apotek_namaValue = apotek_namaSearchField.getValue();
			apotek_alamatValue = apotek_alamatSearchField.getValue();
			apotek_telpValue = apotek_telpSearchField.getValue();
			apotek_kelValue = apotek_kelSearchField.getValue();
			apotek_kecValue = apotek_kecSearchField.getValue();
			apotek_kepemilikanValue = apotek_kepemilikanSearchField.getValue();
			apotek_pemilikValue = apotek_pemilikSearchField.getValue();
			apotek_pemilikalamatValue = apotek_pemilikalamatSearchField.getValue();
			apotek_pemiliknpwpValue = apotek_pemiliknpwpSearchField.getValue();
			apotek_siupValue = apotek_siupSearchField.getValue();
			apotek_dbListAction = "SEARCH";
			apotek_dataStore.proxy.extraParams = { 
				apotek_nama : apotek_namaValue,
				apotek_alamat : apotek_alamatValue,
				apotek_telp : apotek_telpValue,
				apotek_kel : apotek_kelValue,
				apotek_kec : apotek_kecValue,
				apotek_kepemilikan : apotek_kepemilikanValue,
				apotek_pemilik : apotek_pemilikValue,
				apotek_pemilikalamat : apotek_pemilikalamatValue,
				apotek_pemiliknpwp : apotek_pemiliknpwpValue,
				apotek_siup : apotek_siupValue,
				action : 'SEARCH'
			};
			apotek_dataStore.currentPage = 1;
			apotek_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function apotek_printExcel(outputType){
			var searchText = "";
			var apotek_namaValue = '';
			var apotek_alamatValue = '';
			var apotek_telpValue = '';
			var apotek_kelValue = '';
			var apotek_kecValue = '';
			var apotek_kepemilikanValue = '';
			var apotek_pemilikValue = '';
			var apotek_pemilikalamatValue = '';
			var apotek_pemiliknpwpValue = '';
			var apotek_siupValue = '';
			
			if(apotek_dataStore.proxy.extraParams.query!==null){searchText = apotek_dataStore.proxy.extraParams.query;}
			if(apotek_dataStore.proxy.extraParams.apotek_nama!==null){apotek_namaValue = apotek_dataStore.proxy.extraParams.apotek_nama;}
			if(apotek_dataStore.proxy.extraParams.apotek_alamat!==null){apotek_alamatValue = apotek_dataStore.proxy.extraParams.apotek_alamat;}
			if(apotek_dataStore.proxy.extraParams.apotek_telp!==null){apotek_telpValue = apotek_dataStore.proxy.extraParams.apotek_telp;}
			if(apotek_dataStore.proxy.extraParams.apotek_kel!==null){apotek_kelValue = apotek_dataStore.proxy.extraParams.apotek_kel;}
			if(apotek_dataStore.proxy.extraParams.apotek_kec!==null){apotek_kecValue = apotek_dataStore.proxy.extraParams.apotek_kec;}
			if(apotek_dataStore.proxy.extraParams.apotek_kepemilikan!==null){apotek_kepemilikanValue = apotek_dataStore.proxy.extraParams.apotek_kepemilikan;}
			if(apotek_dataStore.proxy.extraParams.apotek_pemilik!==null){apotek_pemilikValue = apotek_dataStore.proxy.extraParams.apotek_pemilik;}
			if(apotek_dataStore.proxy.extraParams.apotek_pemilikalamat!==null){apotek_pemilikalamatValue = apotek_dataStore.proxy.extraParams.apotek_pemilikalamat;}
			if(apotek_dataStore.proxy.extraParams.apotek_pemiliknpwp!==null){apotek_pemiliknpwpValue = apotek_dataStore.proxy.extraParams.apotek_pemiliknpwp;}
			if(apotek_dataStore.proxy.extraParams.apotek_siup!==null){apotek_siupValue = apotek_dataStore.proxy.extraParams.apotek_siup;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_t_apotek/switchAction',
				params : {
					action : outputType,
					query : searchText,
					apotek_nama : apotek_namaValue,
					apotek_alamat : apotek_alamatValue,
					apotek_telp : apotek_telpValue,
					apotek_kel : apotek_kelValue,
					apotek_kec : apotek_kecValue,
					apotek_kepemilikan : apotek_kepemilikanValue,
					apotek_pemilik : apotek_pemilikValue,
					apotek_pemilikalamat : apotek_pemilikalamatValue,
					apotek_pemiliknpwp : apotek_pemiliknpwpValue,
					apotek_siup : apotek_siupValue,
					currentAction : apotek_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/t_apotek_list.xls');
							}else{
								window.open('./print/t_apotek_list.html','apoteklist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		apotek_dataStore = Ext.create('Ext.data.Store',{
			id : 'apotek_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_apotek/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'apotek_id'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'apotek_id', type : 'int', mapping : 'apotek_id' },
				{ name : 'apotek_nama', type : 'string', mapping : 'apotek_nama' },
				{ name : 'apotek_alamat', type : 'string', mapping : 'apotek_alamat' },
				{ name : 'apotek_telp', type : 'string', mapping : 'apotek_telp' },
				{ name : 'apotek_kel', type : 'string', mapping : 'apotek_kel' },
				{ name : 'apotek_kec', type : 'string', mapping : 'apotek_kec' },
				{ name : 'apotek_kepemilikan', type : 'int', mapping : 'apotek_kepemilikan' },
				{ name : 'apotek_pemilik', type : 'string', mapping : 'apotek_pemilik' },
				{ name : 'apotek_pemilikalamat', type : 'string', mapping : 'apotek_pemilikalamat' },
				{ name : 'apotek_pemiliknpwp', type : 'string', mapping : 'apotek_pemiliknpwp' },
				{ name : 'apotek_siup', type : 'string', mapping : 'apotek_siup' },
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		apotek_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						apotek_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						apotek_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						apotek_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						apotek_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						apotek_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						apotek_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						apotek_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						apotek_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var apotek_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : apotek_confirmAdd
		});
		var apotek_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : apotek_confirmUpdate
		});
		var apotek_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : apotek_confirmDelete
		});
		var apotek_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : apotek_refresh
		});
		var apotek_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : apotek_showSearchWindow
		});
		var apotek_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				apotek_printExcel('PRINT');
			}
		});
		var apotek_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				apotek_printExcel('EXCEL');
			}
		});
		
		var apotek_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : apotek_confirmUpdate
		});
		var apotek_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : apotek_confirmDelete
		});
		var apotek_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : apotek_refresh
		});
		apotek_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'apotek_contextMenu',
			items: [
				apotek_contextMenuEdit,apotek_contextMenuDelete,'-',apotek_contextMenuRefresh
			]
		});
		
		apotek_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : apotek_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						apotek_dataStore.proxy.extraParams = { action : 'GETLIST'};
						apotek_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		apotek_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'apotek_gridPanel',
			constrain : true,
			store : apotek_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'apotekGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						apotek_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : apotek_shorcut,
			columns : [
				{
					text : 'apotek_nama',
					dataIndex : 'apotek_nama',
					width : 100,
					sortable : false
				},
				{
					text : 'apotek_alamat',
					dataIndex : 'apotek_alamat',
					width : 100,
					sortable : false
				},
				{
					text : 'apotek_telp',
					dataIndex : 'apotek_telp',
					width : 100,
					sortable : false
				},
				{
					text : 'apotek_kel',
					dataIndex : 'apotek_kel',
					width : 100,
					sortable : false
				},
				{
					text : 'apotek_kec',
					dataIndex : 'apotek_kec',
					width : 100,
					sortable : false
				},
				{
					text : 'apotek_kepemilikan',
					dataIndex : 'apotek_kepemilikan',
					width : 100,
					sortable : false
				},
				{
					text : 'apotek_pemilik',
					dataIndex : 'apotek_pemilik',
					width : 100,
					sortable : false
				},
				{
					text : 'apotek_pemilikalamat',
					dataIndex : 'apotek_pemilikalamat',
					width : 100,
					sortable : false
				},
				{
					text : 'apotek_pemiliknpwp',
					dataIndex : 'apotek_pemiliknpwp',
					width : 100,
					sortable : false
				},
				{
					text : 'apotek_siup',
					dataIndex : 'apotek_siup',
					width : 100,
					sortable : false
				},
							
			],
			tbar : [
				apotek_addButton,
				apotek_editButton,
				apotek_deleteButton,
				apotek_gridSearchField,
				apotek_searchButton,
				apotek_refreshButton,
				apotek_printButton,
				apotek_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : apotek_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					apotek_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		apotek_idField = Ext.create('Ext.form.NumberField',{
			id : 'apotek_idField',
			name : 'apotek_id',
			fieldLabel : 'apotek_id<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		apotek_namaField = Ext.create('Ext.form.TextField',{
			id : 'apotek_namaField',
			name : 'apotek_nama',
			fieldLabel : 'apotek_nama',
			maxLength : 50
		});
		apotek_alamatField = Ext.create('Ext.form.TextField',{
			id : 'apotek_alamatField',
			name : 'apotek_alamat',
			fieldLabel : 'apotek_alamat',
			maxLength : 100
		});
		apotek_telpField = Ext.create('Ext.form.TextField',{
			id : 'apotek_telpField',
			name : 'apotek_telp',
			fieldLabel : 'apotek_telp',
			maxLength : 20
		});
		apotek_kelField = Ext.create('Ext.form.TextField',{
			id : 'apotek_kelField',
			name : 'apotek_kel',
			fieldLabel : 'apotek_kel',
			maxLength : 50
		});
		apotek_kecField = Ext.create('Ext.form.TextField',{
			id : 'apotek_kecField',
			name : 'apotek_kec',
			fieldLabel : 'apotek_kec',
			maxLength : 50
		});
		apotek_kepemilikanField = Ext.create('Ext.form.NumberField',{
			id : 'apotek_kepemilikanField',
			name : 'apotek_kepemilikan',
			fieldLabel : 'apotek_kepemilikan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		apotek_pemilikField = Ext.create('Ext.form.TextField',{
			id : 'apotek_pemilikField',
			name : 'apotek_pemilik',
			fieldLabel : 'apotek_pemilik',
			maxLength : 50
		});
		apotek_pemilikalamatField = Ext.create('Ext.form.TextField',{
			id : 'apotek_pemilikalamatField',
			name : 'apotek_pemilikalamat',
			fieldLabel : 'apotek_pemilikalamat',
			maxLength : 100
		});
		apotek_pemiliknpwpField = Ext.create('Ext.form.TextField',{
			id : 'apotek_pemiliknpwpField',
			name : 'apotek_pemiliknpwp',
			fieldLabel : 'apotek_pemiliknpwp',
			maxLength : 50
		});
		apotek_siupField = Ext.create('Ext.form.TextField',{
			id : 'apotek_siupField',
			name : 'apotek_siup',
			fieldLabel : 'apotek_siup',
			maxLength : 50
		});
		var apotek_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : apotek_save
		});
		var apotek_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				apotek_resetForm();
				apotek_switchToGrid();
			}
		});
		apotek_formPanel = Ext.create('Ext.form.Panel', {
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
						apotek_idField,
						apotek_namaField,
						apotek_alamatField,
						apotek_telpField,
						apotek_kelField,
						apotek_kecField,
						apotek_kepemilikanField,
						apotek_pemilikField,
						apotek_pemilikalamatField,
						apotek_pemiliknpwpField,
						apotek_siupField,
											]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [apotek_saveButton,apotek_cancelButton]
		});
		apotek_formWindow = Ext.create('Ext.window.Window',{
			id : 'apotek_formWindow',
			renderTo : 'apotekSaveWindow',
			title : globalFormAddEditTitle + ' ' + apotek_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [apotek_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		apotek_namaSearchField = Ext.create('Ext.form.TextField',{
			id : 'apotek_namaSearchField',
			name : 'apotek_nama',
			fieldLabel : 'apotek_nama',
			maxLength : 50
		
		});
		apotek_alamatSearchField = Ext.create('Ext.form.TextField',{
			id : 'apotek_alamatSearchField',
			name : 'apotek_alamat',
			fieldLabel : 'apotek_alamat',
			maxLength : 100
		
		});
		apotek_telpSearchField = Ext.create('Ext.form.TextField',{
			id : 'apotek_telpSearchField',
			name : 'apotek_telp',
			fieldLabel : 'apotek_telp',
			maxLength : 20
		
		});
		apotek_kelSearchField = Ext.create('Ext.form.TextField',{
			id : 'apotek_kelSearchField',
			name : 'apotek_kel',
			fieldLabel : 'apotek_kel',
			maxLength : 50
		
		});
		apotek_kecSearchField = Ext.create('Ext.form.TextField',{
			id : 'apotek_kecSearchField',
			name : 'apotek_kec',
			fieldLabel : 'apotek_kec',
			maxLength : 50
		
		});
		apotek_kepemilikanSearchField = Ext.create('Ext.form.NumberField',{
			id : 'apotek_kepemilikanSearchField',
			name : 'apotek_kepemilikan',
			fieldLabel : 'apotek_kepemilikan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		apotek_pemilikSearchField = Ext.create('Ext.form.TextField',{
			id : 'apotek_pemilikSearchField',
			name : 'apotek_pemilik',
			fieldLabel : 'apotek_pemilik',
			maxLength : 50
		
		});
		apotek_pemilikalamatSearchField = Ext.create('Ext.form.TextField',{
			id : 'apotek_pemilikalamatSearchField',
			name : 'apotek_pemilikalamat',
			fieldLabel : 'apotek_pemilikalamat',
			maxLength : 100
		
		});
		apotek_pemiliknpwpSearchField = Ext.create('Ext.form.TextField',{
			id : 'apotek_pemiliknpwpSearchField',
			name : 'apotek_pemiliknpwp',
			fieldLabel : 'apotek_pemiliknpwp',
			maxLength : 50
		
		});
		apotek_siupSearchField = Ext.create('Ext.form.TextField',{
			id : 'apotek_siupSearchField',
			name : 'apotek_siup',
			fieldLabel : 'apotek_siup',
			maxLength : 50
		
		});
		var apotek_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : apotek_search
		});
		var apotek_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				apotek_searchWindow.hide();
			}
		});
		apotek_searchPanel = Ext.create('Ext.form.Panel', {
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
						apotek_namaSearchField,
						apotek_alamatSearchField,
						apotek_telpSearchField,
						apotek_kelSearchField,
						apotek_kecSearchField,
						apotek_kepemilikanSearchField,
						apotek_pemilikSearchField,
						apotek_pemilikalamatSearchField,
						apotek_pemiliknpwpSearchField,
						apotek_siupSearchField,
						]
				}],
			buttons : [apotek_searchingButton,apotek_cancelSearchButton]
		});
		apotek_searchWindow = Ext.create('Ext.window.Window',{
			id : 'apotek_searchWindow',
			renderTo : 'apotekSearchWindow',
			title : globalFormSearchTitle + ' ' + apotek_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [apotek_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="apotekSaveWindow"></div>
<div id="apotekSearchWindow"></div>
<div class="span12" id="apotekGrid"></div>