<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var idam_det_componentItemTitle="IDAM_DET";
		var idam_det_dataStore;
		
		var idam_det_shorcut;
		var idam_det_contextMenu;
		var idam_det_gridSearchField;
		var idam_det_gridPanel;
		var idam_det_formPanel;
		var idam_det_formWindow;
		var idam_det_searchPanel;
		var idam_det_searchWindow;
		
		var det_idam_idField;
		var det_idam_idam_idField;
		var det_idam_namaField;
		var det_idam_alamatField;
		var det_idam_telpField;
		var det_idam_tempatlahirField;
		var det_idam_tanggallahirField;
		var det_idam_pendidikanField;
		var det_idam_tahunlulusField;
				
		var det_idam_idam_idSearchField;
		var det_idam_namaSearchField;
		var det_idam_alamatSearchField;
		var det_idam_telpSearchField;
		var det_idam_tempatlahirSearchField;
		var det_idam_tanggallahirSearchField;
		var det_idam_pendidikanSearchField;
		var det_idam_tahunlulusSearchField;
				
		var idam_det_dbTask = 'CREATE';
		var idam_det_dbTaskMessage = 'Tambah';
		var idam_det_dbPermission = 'CRUD';
		var idam_det_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function idam_det_switchToGrid(){
			idam_det_formPanel.setDisabled(true);
			idam_det_gridPanel.setDisabled(false);
			idam_det_formWindow.hide();
		}
		
		function idam_det_switchToForm(){
			idam_det_gridPanel.setDisabled(true);
			idam_det_formPanel.setDisabled(false);
			idam_det_formWindow.show();
		}
		
		function idam_det_confirmAdd(){
			idam_det_dbTask = 'CREATE';
			idam_det_dbTaskMessage = 'created';
			idam_det_resetForm();
			idam_det_switchToForm();
		}
		
		function idam_det_confirmUpdate(){
			if(idam_det_gridPanel.selModel.getCount() == 1) {
				idam_det_dbTask = 'UPDATE';
				idam_det_dbTaskMessage = 'updated';
				idam_det_switchToForm();
				idam_det_setForm();
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
		
		function idam_det_confirmDelete(){
			if(idam_det_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, idam_det_delete);
			}else if(idam_det_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, idam_det_delete);
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
		
		function idam_det_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(idam_det_dbPermission)==false && pattC.test(idam_det_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(idam_det_confirmFormValid()){
					var det_idam_idValue = '';
					var det_idam_idam_idValue = '';
					var det_idam_namaValue = '';
					var det_idam_alamatValue = '';
					var det_idam_telpValue = '';
					var det_idam_tempatlahirValue = '';
					var det_idam_tanggallahirValue = '';
					var det_idam_pendidikanValue = '';
					var det_idam_tahunlulusValue = '';
										
					det_idam_idValue = det_idam_idField.getValue();
					det_idam_idam_idValue = det_idam_idam_idField.getValue();
					det_idam_namaValue = det_idam_namaField.getValue();
					det_idam_alamatValue = det_idam_alamatField.getValue();
					det_idam_telpValue = det_idam_telpField.getValue();
					det_idam_tempatlahirValue = det_idam_tempatlahirField.getValue();
					det_idam_tanggallahirValue = det_idam_tanggallahirField.getValue();
					det_idam_pendidikanValue = det_idam_pendidikanField.getValue();
					det_idam_tahunlulusValue = det_idam_tahunlulusField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_t_idam_det/switchAction',
						params: {							
							det_idam_id : det_idam_idValue,
							det_idam_idam_id : det_idam_idam_idValue,
							det_idam_nama : det_idam_namaValue,
							det_idam_alamat : det_idam_alamatValue,
							det_idam_telp : det_idam_telpValue,
							det_idam_tempatlahir : det_idam_tempatlahirValue,
							det_idam_tanggallahir : det_idam_tanggallahirValue,
							det_idam_pendidikan : det_idam_pendidikanValue,
							det_idam_tahunlulus : det_idam_tahunlulusValue,
							action : idam_det_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									idam_det_dataStore.reload();
									idam_det_resetForm();
									idam_det_switchToGrid();
									idam_det_gridPanel.getSelectionModel().deselectAll();
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
		
		function idam_det_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(idam_det_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = idam_det_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< idam_det_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.det_idam_id);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_t_idam_det/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									idam_det_dataStore.reload();
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
		
		function idam_det_refresh(){
			idam_det_dbListAction = "GETLIST";
			idam_det_gridSearchField.reset();
			idam_det_searchPanel.getForm().reset();
			idam_det_dataStore.proxy.extraParams = { action : 'GETLIST' };
			idam_det_dataStore.proxy.extraParams.query = "";
			idam_det_dataStore.currentPage = 1;
			idam_det_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function idam_det_confirmFormValid(){
			return idam_det_formPanel.getForm().isValid();
		}
		
		function idam_det_resetForm(){
			idam_det_dbTask = 'CREATE';
			idam_det_dbTaskMessage = 'create';
			idam_det_formPanel.getForm().reset();
			det_idam_idField.setValue(0);
		}
		
		function idam_det_setForm(){
			idam_det_dbTask = 'UPDATE';
            idam_det_dbTaskMessage = 'update';
			
			var record = idam_det_gridPanel.getSelectionModel().getSelection()[0];
			det_idam_idField.setValue(record.data.det_idam_id);
			det_idam_idam_idField.setValue(record.data.det_idam_idam_id);
			det_idam_namaField.setValue(record.data.det_idam_nama);
			det_idam_alamatField.setValue(record.data.det_idam_alamat);
			det_idam_telpField.setValue(record.data.det_idam_telp);
			det_idam_tempatlahirField.setValue(record.data.det_idam_tempatlahir);
			det_idam_tanggallahirField.setValue(record.data.det_idam_tanggallahir);
			det_idam_pendidikanField.setValue(record.data.det_idam_pendidikan);
			det_idam_tahunlulusField.setValue(record.data.det_idam_tahunlulus);
					}
		
		function idam_det_showSearchWindow(){
			idam_det_searchWindow.show();
		}
		
		function idam_det_search(){
			idam_det_gridSearchField.reset();
			
			var det_idam_idam_idValue = '';
			var det_idam_namaValue = '';
			var det_idam_alamatValue = '';
			var det_idam_telpValue = '';
			var det_idam_tempatlahirValue = '';
			var det_idam_tanggallahirValue = '';
			var det_idam_pendidikanValue = '';
			var det_idam_tahunlulusValue = '';
						
			det_idam_idam_idValue = det_idam_idam_idSearchField.getValue();
			det_idam_namaValue = det_idam_namaSearchField.getValue();
			det_idam_alamatValue = det_idam_alamatSearchField.getValue();
			det_idam_telpValue = det_idam_telpSearchField.getValue();
			det_idam_tempatlahirValue = det_idam_tempatlahirSearchField.getValue();
			det_idam_tanggallahirValue = det_idam_tanggallahirSearchField.getValue();
			det_idam_pendidikanValue = det_idam_pendidikanSearchField.getValue();
			det_idam_tahunlulusValue = det_idam_tahunlulusSearchField.getValue();
			idam_det_dbListAction = "SEARCH";
			idam_det_dataStore.proxy.extraParams = { 
				det_idam_idam_id : det_idam_idam_idValue,
				det_idam_nama : det_idam_namaValue,
				det_idam_alamat : det_idam_alamatValue,
				det_idam_telp : det_idam_telpValue,
				det_idam_tempatlahir : det_idam_tempatlahirValue,
				det_idam_tanggallahir : det_idam_tanggallahirValue,
				det_idam_pendidikan : det_idam_pendidikanValue,
				det_idam_tahunlulus : det_idam_tahunlulusValue,
				action : 'SEARCH'
			};
			idam_det_dataStore.currentPage = 1;
			idam_det_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function idam_det_printExcel(outputType){
			var searchText = "";
			var det_idam_idam_idValue = '';
			var det_idam_namaValue = '';
			var det_idam_alamatValue = '';
			var det_idam_telpValue = '';
			var det_idam_tempatlahirValue = '';
			var det_idam_tanggallahirValue = '';
			var det_idam_pendidikanValue = '';
			var det_idam_tahunlulusValue = '';
			
			if(idam_det_dataStore.proxy.extraParams.query!==null){searchText = idam_det_dataStore.proxy.extraParams.query;}
			if(idam_det_dataStore.proxy.extraParams.det_idam_idam_id!==null){det_idam_idam_idValue = idam_det_dataStore.proxy.extraParams.det_idam_idam_id;}
			if(idam_det_dataStore.proxy.extraParams.det_idam_nama!==null){det_idam_namaValue = idam_det_dataStore.proxy.extraParams.det_idam_nama;}
			if(idam_det_dataStore.proxy.extraParams.det_idam_alamat!==null){det_idam_alamatValue = idam_det_dataStore.proxy.extraParams.det_idam_alamat;}
			if(idam_det_dataStore.proxy.extraParams.det_idam_telp!==null){det_idam_telpValue = idam_det_dataStore.proxy.extraParams.det_idam_telp;}
			if(idam_det_dataStore.proxy.extraParams.det_idam_tempatlahir!==null){det_idam_tempatlahirValue = idam_det_dataStore.proxy.extraParams.det_idam_tempatlahir;}
			if(idam_det_dataStore.proxy.extraParams.det_idam_tanggallahir!==null){det_idam_tanggallahirValue = idam_det_dataStore.proxy.extraParams.det_idam_tanggallahir;}
			if(idam_det_dataStore.proxy.extraParams.det_idam_pendidikan!==null){det_idam_pendidikanValue = idam_det_dataStore.proxy.extraParams.det_idam_pendidikan;}
			if(idam_det_dataStore.proxy.extraParams.det_idam_tahunlulus!==null){det_idam_tahunlulusValue = idam_det_dataStore.proxy.extraParams.det_idam_tahunlulus;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_t_idam_det/switchAction',
				params : {
					action : outputType,
					query : searchText,
					det_idam_idam_id : det_idam_idam_idValue,
					det_idam_nama : det_idam_namaValue,
					det_idam_alamat : det_idam_alamatValue,
					det_idam_telp : det_idam_telpValue,
					det_idam_tempatlahir : det_idam_tempatlahirValue,
					det_idam_tanggallahir : det_idam_tanggallahirValue,
					det_idam_pendidikan : det_idam_pendidikanValue,
					det_idam_tahunlulus : det_idam_tahunlulusValue,
					currentAction : idam_det_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/t_idam_det_list.xls');
							}else{
								window.open('./print/t_idam_det_list.html','idam_detlist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		idam_det_dataStore = Ext.create('Ext.data.Store',{
			id : 'idam_det_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_idam_det/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'det_idam_id'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'det_idam_id', type : 'int', mapping : 'det_idam_id' },
				{ name : 'det_idam_idam_id', type : 'int', mapping : 'det_idam_idam_id' },
				{ name : 'det_idam_nama', type : 'string', mapping : 'det_idam_nama' },
				{ name : 'det_idam_alamat', type : 'string', mapping : 'det_idam_alamat' },
				{ name : 'det_idam_telp', type : 'string', mapping : 'det_idam_telp' },
				{ name : 'det_idam_tempatlahir', type : 'string', mapping : 'det_idam_tempatlahir' },
				{ name : 'det_idam_tanggallahir', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'det_idam_tanggallahir' },
				{ name : 'det_idam_pendidikan', type : 'string', mapping : 'det_idam_pendidikan' },
				{ name : 'det_idam_tahunlulus', type : 'int', mapping : 'det_idam_tahunlulus' },
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		idam_det_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						idam_det_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						idam_det_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						idam_det_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						idam_det_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						idam_det_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						idam_det_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						idam_det_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						idam_det_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var idam_det_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : idam_det_confirmAdd
		});
		var idam_det_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : idam_det_confirmUpdate
		});
		var idam_det_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : idam_det_confirmDelete
		});
		var idam_det_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : idam_det_refresh
		});
		var idam_det_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : idam_det_showSearchWindow
		});
		var idam_det_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				idam_det_printExcel('PRINT');
			}
		});
		var idam_det_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				idam_det_printExcel('EXCEL');
			}
		});
		
		var idam_det_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : idam_det_confirmUpdate
		});
		var idam_det_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : idam_det_confirmDelete
		});
		var idam_det_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : idam_det_refresh
		});
		idam_det_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'idam_det_contextMenu',
			items: [
				idam_det_contextMenuEdit,idam_det_contextMenuDelete,'-',idam_det_contextMenuRefresh
			]
		});
		
		idam_det_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : idam_det_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						idam_det_dataStore.proxy.extraParams = { action : 'GETLIST'};
						idam_det_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		idam_det_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'idam_det_gridPanel',
			constrain : true,
			store : idam_det_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'idam_detGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						idam_det_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : idam_det_shorcut,
			columns : [
				{
					text : 'det_idam_idam_id',
					dataIndex : 'det_idam_idam_id',
					width : 100,
					sortable : false
				},
				{
					text : 'det_idam_nama',
					dataIndex : 'det_idam_nama',
					width : 100,
					sortable : false
				},
				{
					text : 'det_idam_alamat',
					dataIndex : 'det_idam_alamat',
					width : 100,
					sortable : false
				},
				{
					text : 'det_idam_telp',
					dataIndex : 'det_idam_telp',
					width : 100,
					sortable : false
				},
				{
					text : 'det_idam_tempatlahir',
					dataIndex : 'det_idam_tempatlahir',
					width : 100,
					sortable : false
				},
				{
					text : 'det_idam_tanggallahir',
					dataIndex : 'det_idam_tanggallahir',
					width : 100,
					sortable : false
				},
				{
					text : 'det_idam_pendidikan',
					dataIndex : 'det_idam_pendidikan',
					width : 100,
					sortable : false
				},
				{
					text : 'det_idam_tahunlulus',
					dataIndex : 'det_idam_tahunlulus',
					width : 100,
					sortable : false
				},
							
			],
			tbar : [
				idam_det_addButton,
				idam_det_editButton,
				idam_det_deleteButton,
				idam_det_gridSearchField,
				idam_det_searchButton,
				idam_det_refreshButton,
				idam_det_printButton,
				idam_det_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : idam_det_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					idam_det_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		det_idam_idField = Ext.create('Ext.form.NumberField',{
			id : 'det_idam_idField',
			name : 'det_idam_id',
			fieldLabel : 'det_idam_id<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		det_idam_idam_idField = Ext.create('Ext.form.NumberField',{
			id : 'det_idam_idam_idField',
			name : 'det_idam_idam_id',
			fieldLabel : 'det_idam_idam_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		det_idam_namaField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_namaField',
			name : 'det_idam_nama',
			fieldLabel : 'det_idam_nama',
			maxLength : 50
		});
		det_idam_alamatField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_alamatField',
			name : 'det_idam_alamat',
			fieldLabel : 'det_idam_alamat',
			maxLength : 100
		});
		det_idam_telpField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_telpField',
			name : 'det_idam_telp',
			fieldLabel : 'det_idam_telp',
			maxLength : 20
		});
		det_idam_tempatlahirField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_tempatlahirField',
			name : 'det_idam_tempatlahir',
			fieldLabel : 'det_idam_tempatlahir',
			maxLength : 100
		});
		det_idam_tanggallahirField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_tanggallahirField',
			name : 'det_idam_tanggallahir',
			fieldLabel : 'det_idam_tanggallahir',
			maxLength : 0
		});
		det_idam_pendidikanField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_pendidikanField',
			name : 'det_idam_pendidikan',
			fieldLabel : 'det_idam_pendidikan',
			maxLength : 100
		});
		det_idam_tahunlulusField = Ext.create('Ext.form.NumberField',{
			id : 'det_idam_tahunlulusField',
			name : 'det_idam_tahunlulus',
			fieldLabel : 'det_idam_tahunlulus',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		var idam_det_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : idam_det_save
		});
		var idam_det_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				idam_det_resetForm();
				idam_det_switchToGrid();
			}
		});
		idam_det_formPanel = Ext.create('Ext.form.Panel', {
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
						det_idam_idField,
						det_idam_idam_idField,
						det_idam_namaField,
						det_idam_alamatField,
						det_idam_telpField,
						det_idam_tempatlahirField,
						det_idam_tanggallahirField,
						det_idam_pendidikanField,
						det_idam_tahunlulusField,
											]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [idam_det_saveButton,idam_det_cancelButton]
		});
		idam_det_formWindow = Ext.create('Ext.window.Window',{
			id : 'idam_det_formWindow',
			renderTo : 'idam_detSaveWindow',
			title : globalFormAddEditTitle + ' ' + idam_det_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [idam_det_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		det_idam_idam_idSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_idam_idam_idSearchField',
			name : 'det_idam_idam_id',
			fieldLabel : 'det_idam_idam_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_idam_namaSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_namaSearchField',
			name : 'det_idam_nama',
			fieldLabel : 'det_idam_nama',
			maxLength : 50
		
		});
		det_idam_alamatSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_alamatSearchField',
			name : 'det_idam_alamat',
			fieldLabel : 'det_idam_alamat',
			maxLength : 100
		
		});
		det_idam_telpSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_telpSearchField',
			name : 'det_idam_telp',
			fieldLabel : 'det_idam_telp',
			maxLength : 20
		
		});
		det_idam_tempatlahirSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_tempatlahirSearchField',
			name : 'det_idam_tempatlahir',
			fieldLabel : 'det_idam_tempatlahir',
			maxLength : 100
		
		});
		det_idam_tanggallahirSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_tanggallahirSearchField',
			name : 'det_idam_tanggallahir',
			fieldLabel : 'det_idam_tanggallahir',
			maxLength : 0
		
		});
		det_idam_pendidikanSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_pendidikanSearchField',
			name : 'det_idam_pendidikan',
			fieldLabel : 'det_idam_pendidikan',
			maxLength : 100
		
		});
		det_idam_tahunlulusSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_idam_tahunlulusSearchField',
			name : 'det_idam_tahunlulus',
			fieldLabel : 'det_idam_tahunlulus',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		var idam_det_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : idam_det_search
		});
		var idam_det_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				idam_det_searchWindow.hide();
			}
		});
		idam_det_searchPanel = Ext.create('Ext.form.Panel', {
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
						det_idam_idam_idSearchField,
						det_idam_namaSearchField,
						det_idam_alamatSearchField,
						det_idam_telpSearchField,
						det_idam_tempatlahirSearchField,
						det_idam_tanggallahirSearchField,
						det_idam_pendidikanSearchField,
						det_idam_tahunlulusSearchField,
						]
				}],
			buttons : [idam_det_searchingButton,idam_det_cancelSearchButton]
		});
		idam_det_searchWindow = Ext.create('Ext.window.Window',{
			id : 'idam_det_searchWindow',
			renderTo : 'idam_detSearchWindow',
			title : globalFormSearchTitle + ' ' + idam_det_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [idam_det_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="idam_detSaveWindow"></div>
<div id="idam_detSearchWindow"></div>
<div class="span12" id="idam_detGrid"></div>