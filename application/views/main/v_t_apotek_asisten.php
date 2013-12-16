<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var apotek_asisten_componentItemTitle="APOTEK_ASISTEN";
		var apotek_asisten_dataStore;
		
		var apotek_asisten_shorcut;
		var apotek_asisten_contextMenu;
		var apotek_asisten_gridSearchField;
		var apotek_asisten_gridPanel;
		var apotek_asisten_formPanel;
		var apotek_asisten_formWindow;
		var apotek_asisten_searchPanel;
		var apotek_asisten_searchWindow;
		
		var asisten_idField;
		var asisten_apotek_idField;
		var asisten_apotekdet_idField;
		var asisten_namaField;
		var asisten_sikField;
		var asisten_lulusField;
		var asisten_alamatField;
				
		var asisten_apotek_idSearchField;
		var asisten_apotekdet_idSearchField;
		var asisten_namaSearchField;
		var asisten_sikSearchField;
		var asisten_lulusSearchField;
		var asisten_alamatSearchField;
				
		var apotek_asisten_dbTask = 'CREATE';
		var apotek_asisten_dbTaskMessage = 'Tambah';
		var apotek_asisten_dbPermission = 'CRUD';
		var apotek_asisten_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function apotek_asisten_switchToGrid(){
			apotek_asisten_formPanel.setDisabled(true);
			apotek_asisten_gridPanel.setDisabled(false);
			apotek_asisten_formWindow.hide();
		}
		
		function apotek_asisten_switchToForm(){
			apotek_asisten_gridPanel.setDisabled(true);
			apotek_asisten_formPanel.setDisabled(false);
			apotek_asisten_formWindow.show();
		}
		
		function apotek_asisten_confirmAdd(){
			apotek_asisten_dbTask = 'CREATE';
			apotek_asisten_dbTaskMessage = 'created';
			apotek_asisten_resetForm();
			apotek_asisten_switchToForm();
		}
		
		function apotek_asisten_confirmUpdate(){
			if(apotek_asisten_gridPanel.selModel.getCount() == 1) {
				apotek_asisten_dbTask = 'UPDATE';
				apotek_asisten_dbTaskMessage = 'updated';
				apotek_asisten_switchToForm();
				apotek_asisten_setForm();
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
		
		function apotek_asisten_confirmDelete(){
			if(apotek_asisten_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, apotek_asisten_delete);
			}else if(apotek_asisten_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, apotek_asisten_delete);
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
		
		function apotek_asisten_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(apotek_asisten_dbPermission)==false && pattC.test(apotek_asisten_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(apotek_asisten_confirmFormValid()){
					var asisten_idValue = '';
					var asisten_apotek_idValue = '';
					var asisten_apotekdet_idValue = '';
					var asisten_namaValue = '';
					var asisten_sikValue = '';
					var asisten_lulusValue = '';
					var asisten_alamatValue = '';
										
					asisten_idValue = asisten_idField.getValue();
					asisten_apotek_idValue = asisten_apotek_idField.getValue();
					asisten_apotekdet_idValue = asisten_apotekdet_idField.getValue();
					asisten_namaValue = asisten_namaField.getValue();
					asisten_sikValue = asisten_sikField.getValue();
					asisten_lulusValue = asisten_lulusField.getValue();
					asisten_alamatValue = asisten_alamatField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_t_apotek_asisten/switchAction',
						params: {							
							asisten_id : asisten_idValue,
							asisten_apotek_id : asisten_apotek_idValue,
							asisten_apotekdet_id : asisten_apotekdet_idValue,
							asisten_nama : asisten_namaValue,
							asisten_sik : asisten_sikValue,
							asisten_lulus : asisten_lulusValue,
							asisten_alamat : asisten_alamatValue,
							action : apotek_asisten_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									apotek_asisten_dataStore.reload();
									apotek_asisten_resetForm();
									apotek_asisten_switchToGrid();
									apotek_asisten_gridPanel.getSelectionModel().deselectAll();
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
		
		function apotek_asisten_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(apotek_asisten_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = apotek_asisten_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< apotek_asisten_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.asisten_id);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_t_apotek_asisten/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									apotek_asisten_dataStore.reload();
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
		
		function apotek_asisten_refresh(){
			apotek_asisten_dbListAction = "GETLIST";
			apotek_asisten_gridSearchField.reset();
			apotek_asisten_searchPanel.getForm().reset();
			apotek_asisten_dataStore.proxy.extraParams = { action : 'GETLIST' };
			apotek_asisten_dataStore.proxy.extraParams.query = "";
			apotek_asisten_dataStore.currentPage = 1;
			apotek_asisten_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function apotek_asisten_confirmFormValid(){
			return apotek_asisten_formPanel.getForm().isValid();
		}
		
		function apotek_asisten_resetForm(){
			apotek_asisten_dbTask = 'CREATE';
			apotek_asisten_dbTaskMessage = 'create';
			apotek_asisten_formPanel.getForm().reset();
			asisten_idField.setValue(0);
		}
		
		function apotek_asisten_setForm(){
			apotek_asisten_dbTask = 'UPDATE';
            apotek_asisten_dbTaskMessage = 'update';
			
			var record = apotek_asisten_gridPanel.getSelectionModel().getSelection()[0];
			asisten_idField.setValue(record.data.asisten_id);
			asisten_apotek_idField.setValue(record.data.asisten_apotek_id);
			asisten_apotekdet_idField.setValue(record.data.asisten_apotekdet_id);
			asisten_namaField.setValue(record.data.asisten_nama);
			asisten_sikField.setValue(record.data.asisten_sik);
			asisten_lulusField.setValue(record.data.asisten_lulus);
			asisten_alamatField.setValue(record.data.asisten_alamat);
					}
		
		function apotek_asisten_showSearchWindow(){
			apotek_asisten_searchWindow.show();
		}
		
		function apotek_asisten_search(){
			apotek_asisten_gridSearchField.reset();
			
			var asisten_apotek_idValue = '';
			var asisten_apotekdet_idValue = '';
			var asisten_namaValue = '';
			var asisten_sikValue = '';
			var asisten_lulusValue = '';
			var asisten_alamatValue = '';
						
			asisten_apotek_idValue = asisten_apotek_idSearchField.getValue();
			asisten_apotekdet_idValue = asisten_apotekdet_idSearchField.getValue();
			asisten_namaValue = asisten_namaSearchField.getValue();
			asisten_sikValue = asisten_sikSearchField.getValue();
			asisten_lulusValue = asisten_lulusSearchField.getValue();
			asisten_alamatValue = asisten_alamatSearchField.getValue();
			apotek_asisten_dbListAction = "SEARCH";
			apotek_asisten_dataStore.proxy.extraParams = { 
				asisten_apotek_id : asisten_apotek_idValue,
				asisten_apotekdet_id : asisten_apotekdet_idValue,
				asisten_nama : asisten_namaValue,
				asisten_sik : asisten_sikValue,
				asisten_lulus : asisten_lulusValue,
				asisten_alamat : asisten_alamatValue,
				action : 'SEARCH'
			};
			apotek_asisten_dataStore.currentPage = 1;
			apotek_asisten_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function apotek_asisten_printExcel(outputType){
			var searchText = "";
			var asisten_apotek_idValue = '';
			var asisten_apotekdet_idValue = '';
			var asisten_namaValue = '';
			var asisten_sikValue = '';
			var asisten_lulusValue = '';
			var asisten_alamatValue = '';
			
			if(apotek_asisten_dataStore.proxy.extraParams.query!==null){searchText = apotek_asisten_dataStore.proxy.extraParams.query;}
			if(apotek_asisten_dataStore.proxy.extraParams.asisten_apotek_id!==null){asisten_apotek_idValue = apotek_asisten_dataStore.proxy.extraParams.asisten_apotek_id;}
			if(apotek_asisten_dataStore.proxy.extraParams.asisten_apotekdet_id!==null){asisten_apotekdet_idValue = apotek_asisten_dataStore.proxy.extraParams.asisten_apotekdet_id;}
			if(apotek_asisten_dataStore.proxy.extraParams.asisten_nama!==null){asisten_namaValue = apotek_asisten_dataStore.proxy.extraParams.asisten_nama;}
			if(apotek_asisten_dataStore.proxy.extraParams.asisten_sik!==null){asisten_sikValue = apotek_asisten_dataStore.proxy.extraParams.asisten_sik;}
			if(apotek_asisten_dataStore.proxy.extraParams.asisten_lulus!==null){asisten_lulusValue = apotek_asisten_dataStore.proxy.extraParams.asisten_lulus;}
			if(apotek_asisten_dataStore.proxy.extraParams.asisten_alamat!==null){asisten_alamatValue = apotek_asisten_dataStore.proxy.extraParams.asisten_alamat;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_t_apotek_asisten/switchAction',
				params : {
					action : outputType,
					query : searchText,
					asisten_apotek_id : asisten_apotek_idValue,
					asisten_apotekdet_id : asisten_apotekdet_idValue,
					asisten_nama : asisten_namaValue,
					asisten_sik : asisten_sikValue,
					asisten_lulus : asisten_lulusValue,
					asisten_alamat : asisten_alamatValue,
					currentAction : apotek_asisten_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/t_apotek_asisten_list.xls');
							}else{
								window.open('./print/t_apotek_asisten_list.html','apotek_asistenlist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		apotek_asisten_dataStore = Ext.create('Ext.data.Store',{
			id : 'apotek_asisten_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_apotek_asisten/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'asisten_id'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'asisten_id', type : 'int', mapping : 'asisten_id' },
				{ name : 'asisten_apotek_id', type : 'int', mapping : 'asisten_apotek_id' },
				{ name : 'asisten_apotekdet_id', type : 'int', mapping : 'asisten_apotekdet_id' },
				{ name : 'asisten_nama', type : 'string', mapping : 'asisten_nama' },
				{ name : 'asisten_sik', type : 'string', mapping : 'asisten_sik' },
				{ name : 'asisten_lulus', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'asisten_lulus' },
				{ name : 'asisten_alamat', type : 'string', mapping : 'asisten_alamat' },
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		apotek_asisten_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						apotek_asisten_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						apotek_asisten_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						apotek_asisten_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						apotek_asisten_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						apotek_asisten_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						apotek_asisten_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						apotek_asisten_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						apotek_asisten_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var apotek_asisten_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : apotek_asisten_confirmAdd
		});
		var apotek_asisten_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : apotek_asisten_confirmUpdate
		});
		var apotek_asisten_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : apotek_asisten_confirmDelete
		});
		var apotek_asisten_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : apotek_asisten_refresh
		});
		var apotek_asisten_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : apotek_asisten_showSearchWindow
		});
		var apotek_asisten_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				apotek_asisten_printExcel('PRINT');
			}
		});
		var apotek_asisten_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				apotek_asisten_printExcel('EXCEL');
			}
		});
		
		var apotek_asisten_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : apotek_asisten_confirmUpdate
		});
		var apotek_asisten_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : apotek_asisten_confirmDelete
		});
		var apotek_asisten_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : apotek_asisten_refresh
		});
		apotek_asisten_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'apotek_asisten_contextMenu',
			items: [
				apotek_asisten_contextMenuEdit,apotek_asisten_contextMenuDelete,'-',apotek_asisten_contextMenuRefresh
			]
		});
		
		apotek_asisten_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : apotek_asisten_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						apotek_asisten_dataStore.proxy.extraParams = { action : 'GETLIST'};
						apotek_asisten_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		apotek_asisten_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'apotek_asisten_gridPanel',
			constrain : true,
			store : apotek_asisten_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'apotek_asistenGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						apotek_asisten_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : apotek_asisten_shorcut,
			columns : [
				{
					text : 'asisten_apotek_id',
					dataIndex : 'asisten_apotek_id',
					width : 100,
					sortable : false
				},
				{
					text : 'asisten_apotekdet_id',
					dataIndex : 'asisten_apotekdet_id',
					width : 100,
					sortable : false
				},
				{
					text : 'asisten_nama',
					dataIndex : 'asisten_nama',
					width : 100,
					sortable : false
				},
				{
					text : 'asisten_sik',
					dataIndex : 'asisten_sik',
					width : 100,
					sortable : false
				},
				{
					text : 'asisten_lulus',
					dataIndex : 'asisten_lulus',
					width : 100,
					sortable : false
				},
				{
					text : 'asisten_alamat',
					dataIndex : 'asisten_alamat',
					width : 100,
					sortable : false
				},
							
			],
			tbar : [
				apotek_asisten_addButton,
				apotek_asisten_editButton,
				apotek_asisten_deleteButton,
				apotek_asisten_gridSearchField,
				apotek_asisten_searchButton,
				apotek_asisten_refreshButton,
				apotek_asisten_printButton,
				apotek_asisten_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : apotek_asisten_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					apotek_asisten_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		asisten_idField = Ext.create('Ext.form.NumberField',{
			id : 'asisten_idField',
			name : 'asisten_id',
			fieldLabel : 'asisten_id<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		asisten_apotek_idField = Ext.create('Ext.form.NumberField',{
			id : 'asisten_apotek_idField',
			name : 'asisten_apotek_id',
			fieldLabel : 'asisten_apotek_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		asisten_apotekdet_idField = Ext.create('Ext.form.NumberField',{
			id : 'asisten_apotekdet_idField',
			name : 'asisten_apotekdet_id',
			fieldLabel : 'asisten_apotekdet_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		asisten_namaField = Ext.create('Ext.form.TextField',{
			id : 'asisten_namaField',
			name : 'asisten_nama',
			fieldLabel : 'asisten_nama',
			maxLength : 50
		});
		asisten_sikField = Ext.create('Ext.form.TextField',{
			id : 'asisten_sikField',
			name : 'asisten_sik',
			fieldLabel : 'asisten_sik',
			maxLength : 50
		});
		asisten_lulusField = Ext.create('Ext.form.TextField',{
			id : 'asisten_lulusField',
			name : 'asisten_lulus',
			fieldLabel : 'asisten_lulus',
			maxLength : 0
		});
		asisten_alamatField = Ext.create('Ext.form.TextField',{
			id : 'asisten_alamatField',
			name : 'asisten_alamat',
			fieldLabel : 'asisten_alamat',
			maxLength : 100
		});
		var apotek_asisten_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : apotek_asisten_save
		});
		var apotek_asisten_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				apotek_asisten_resetForm();
				apotek_asisten_switchToGrid();
			}
		});
		apotek_asisten_formPanel = Ext.create('Ext.form.Panel', {
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
						asisten_idField,
						asisten_apotek_idField,
						asisten_apotekdet_idField,
						asisten_namaField,
						asisten_sikField,
						asisten_lulusField,
						asisten_alamatField,
											]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [apotek_asisten_saveButton,apotek_asisten_cancelButton]
		});
		apotek_asisten_formWindow = Ext.create('Ext.window.Window',{
			id : 'apotek_asisten_formWindow',
			renderTo : 'apotek_asistenSaveWindow',
			title : globalFormAddEditTitle + ' ' + apotek_asisten_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [apotek_asisten_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		asisten_apotek_idSearchField = Ext.create('Ext.form.NumberField',{
			id : 'asisten_apotek_idSearchField',
			name : 'asisten_apotek_id',
			fieldLabel : 'asisten_apotek_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		asisten_apotekdet_idSearchField = Ext.create('Ext.form.NumberField',{
			id : 'asisten_apotekdet_idSearchField',
			name : 'asisten_apotekdet_id',
			fieldLabel : 'asisten_apotekdet_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		asisten_namaSearchField = Ext.create('Ext.form.TextField',{
			id : 'asisten_namaSearchField',
			name : 'asisten_nama',
			fieldLabel : 'asisten_nama',
			maxLength : 50
		
		});
		asisten_sikSearchField = Ext.create('Ext.form.TextField',{
			id : 'asisten_sikSearchField',
			name : 'asisten_sik',
			fieldLabel : 'asisten_sik',
			maxLength : 50
		
		});
		asisten_lulusSearchField = Ext.create('Ext.form.TextField',{
			id : 'asisten_lulusSearchField',
			name : 'asisten_lulus',
			fieldLabel : 'asisten_lulus',
			maxLength : 0
		
		});
		asisten_alamatSearchField = Ext.create('Ext.form.TextField',{
			id : 'asisten_alamatSearchField',
			name : 'asisten_alamat',
			fieldLabel : 'asisten_alamat',
			maxLength : 100
		
		});
		var apotek_asisten_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : apotek_asisten_search
		});
		var apotek_asisten_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				apotek_asisten_searchWindow.hide();
			}
		});
		apotek_asisten_searchPanel = Ext.create('Ext.form.Panel', {
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
						asisten_apotek_idSearchField,
						asisten_apotekdet_idSearchField,
						asisten_namaSearchField,
						asisten_sikSearchField,
						asisten_lulusSearchField,
						asisten_alamatSearchField,
						]
				}],
			buttons : [apotek_asisten_searchingButton,apotek_asisten_cancelSearchButton]
		});
		apotek_asisten_searchWindow = Ext.create('Ext.window.Window',{
			id : 'apotek_asisten_searchWindow',
			renderTo : 'apotek_asistenSearchWindow',
			title : globalFormSearchTitle + ' ' + apotek_asisten_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [apotek_asisten_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="apotek_asistenSaveWindow"></div>
<div id="apotek_asistenSearchWindow"></div>
<div class="span12" id="apotek_asistenGrid"></div>