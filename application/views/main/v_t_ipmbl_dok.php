<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var ipmbl_dok_componentItemTitle="IPMBL_DOK";
		var ipmbl_dok_dataStore;
		
		var ipmbl_dok_shorcut;
		var ipmbl_dok_contextMenu;
		var ipmbl_dok_gridSearchField;
		var ipmbl_dok_gridPanel;
		var ipmbl_dok_formPanel;
		var ipmbl_dok_formWindow;
		var ipmbl_dok_searchPanel;
		var ipmbl_dok_searchWindow;
		
		var dok_ipmbl_idField;
		var dok_ipmbl_penerimaField;
		var dok_ipmbl_jabatanField;
		var dok_ipmbl_tanggalField;
		var dok_ipmbl_keteranganField;
		var dok_ipmbl_ipmbl_idField;
		var dok_ipmbl_ipmbldet_idField;
				
		var dok_ipmbl_penerimaSearchField;
		var dok_ipmbl_jabatanSearchField;
		var dok_ipmbl_tanggalSearchField;
		var dok_ipmbl_keteranganSearchField;
		var dok_ipmbl_ipmbl_idSearchField;
		var dok_ipmbl_ipmbldet_idSearchField;
				
		var ipmbl_dok_dbTask = 'CREATE';
		var ipmbl_dok_dbTaskMessage = 'Tambah';
		var ipmbl_dok_dbPermission = 'CRUD';
		var ipmbl_dok_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function ipmbl_dok_switchToGrid(){
			ipmbl_dok_formPanel.setDisabled(true);
			ipmbl_dok_gridPanel.setDisabled(false);
			ipmbl_dok_formWindow.hide();
		}
		
		function ipmbl_dok_switchToForm(){
			ipmbl_dok_gridPanel.setDisabled(true);
			ipmbl_dok_formPanel.setDisabled(false);
			ipmbl_dok_formWindow.show();
		}
		
		function ipmbl_dok_confirmAdd(){
			ipmbl_dok_dbTask = 'CREATE';
			ipmbl_dok_dbTaskMessage = 'created';
			ipmbl_dok_resetForm();
			ipmbl_dok_switchToForm();
		}
		
		function ipmbl_dok_confirmUpdate(){
			if(ipmbl_dok_gridPanel.selModel.getCount() == 1) {
				ipmbl_dok_dbTask = 'UPDATE';
				ipmbl_dok_dbTaskMessage = 'updated';
				ipmbl_dok_switchToForm();
				ipmbl_dok_setForm();
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
		
		function ipmbl_dok_confirmDelete(){
			if(ipmbl_dok_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, ipmbl_dok_delete);
			}else if(ipmbl_dok_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, ipmbl_dok_delete);
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
		
		function ipmbl_dok_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(ipmbl_dok_dbPermission)==false && pattC.test(ipmbl_dok_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(ipmbl_dok_confirmFormValid()){
					var dok_ipmbl_idValue = '';
					var dok_ipmbl_penerimaValue = '';
					var dok_ipmbl_jabatanValue = '';
					var dok_ipmbl_tanggalValue = '';
					var dok_ipmbl_keteranganValue = '';
					var dok_ipmbl_ipmbl_idValue = '';
					var dok_ipmbl_ipmbldet_idValue = '';
										
					dok_ipmbl_idValue = dok_ipmbl_idField.getValue();
					dok_ipmbl_penerimaValue = dok_ipmbl_penerimaField.getValue();
					dok_ipmbl_jabatanValue = dok_ipmbl_jabatanField.getValue();
					dok_ipmbl_tanggalValue = dok_ipmbl_tanggalField.getValue();
					dok_ipmbl_keteranganValue = dok_ipmbl_keteranganField.getValue();
					dok_ipmbl_ipmbl_idValue = dok_ipmbl_ipmbl_idField.getValue();
					dok_ipmbl_ipmbldet_idValue = dok_ipmbl_ipmbldet_idField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_t_ipmbl_dok/switchAction',
						params: {							
							dok_ipmbl_id : dok_ipmbl_idValue,
							dok_ipmbl_penerima : dok_ipmbl_penerimaValue,
							dok_ipmbl_jabatan : dok_ipmbl_jabatanValue,
							dok_ipmbl_tanggal : dok_ipmbl_tanggalValue,
							dok_ipmbl_keterangan : dok_ipmbl_keteranganValue,
							dok_ipmbl_ipmbl_id : dok_ipmbl_ipmbl_idValue,
							dok_ipmbl_ipmbldet_id : dok_ipmbl_ipmbldet_idValue,
							action : ipmbl_dok_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									ipmbl_dok_dataStore.reload();
									ipmbl_dok_resetForm();
									ipmbl_dok_switchToGrid();
									ipmbl_dok_gridPanel.getSelectionModel().deselectAll();
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
		
		function ipmbl_dok_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(ipmbl_dok_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = ipmbl_dok_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< ipmbl_dok_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.dok_ipmbl_id);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_t_ipmbl_dok/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									ipmbl_dok_dataStore.reload();
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
		
		function ipmbl_dok_refresh(){
			ipmbl_dok_dbListAction = "GETLIST";
			ipmbl_dok_gridSearchField.reset();
			ipmbl_dok_searchPanel.getForm().reset();
			ipmbl_dok_dataStore.proxy.extraParams = { action : 'GETLIST' };
			ipmbl_dok_dataStore.proxy.extraParams.query = "";
			ipmbl_dok_dataStore.currentPage = 1;
			ipmbl_dok_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function ipmbl_dok_confirmFormValid(){
			return ipmbl_dok_formPanel.getForm().isValid();
		}
		
		function ipmbl_dok_resetForm(){
			ipmbl_dok_dbTask = 'CREATE';
			ipmbl_dok_dbTaskMessage = 'create';
			ipmbl_dok_formPanel.getForm().reset();
			dok_ipmbl_idField.setValue(0);
		}
		
		function ipmbl_dok_setForm(){
			ipmbl_dok_dbTask = 'UPDATE';
            ipmbl_dok_dbTaskMessage = 'update';
			
			var record = ipmbl_dok_gridPanel.getSelectionModel().getSelection()[0];
			dok_ipmbl_idField.setValue(record.data.dok_ipmbl_id);
			dok_ipmbl_penerimaField.setValue(record.data.dok_ipmbl_penerima);
			dok_ipmbl_jabatanField.setValue(record.data.dok_ipmbl_jabatan);
			dok_ipmbl_tanggalField.setValue(record.data.dok_ipmbl_tanggal);
			dok_ipmbl_keteranganField.setValue(record.data.dok_ipmbl_keterangan);
			dok_ipmbl_ipmbl_idField.setValue(record.data.dok_ipmbl_ipmbl_id);
			dok_ipmbl_ipmbldet_idField.setValue(record.data.dok_ipmbl_ipmbldet_id);
					}
		
		function ipmbl_dok_showSearchWindow(){
			ipmbl_dok_searchWindow.show();
		}
		
		function ipmbl_dok_search(){
			ipmbl_dok_gridSearchField.reset();
			
			var dok_ipmbl_penerimaValue = '';
			var dok_ipmbl_jabatanValue = '';
			var dok_ipmbl_tanggalValue = '';
			var dok_ipmbl_keteranganValue = '';
			var dok_ipmbl_ipmbl_idValue = '';
			var dok_ipmbl_ipmbldet_idValue = '';
						
			dok_ipmbl_penerimaValue = dok_ipmbl_penerimaSearchField.getValue();
			dok_ipmbl_jabatanValue = dok_ipmbl_jabatanSearchField.getValue();
			dok_ipmbl_tanggalValue = dok_ipmbl_tanggalSearchField.getValue();
			dok_ipmbl_keteranganValue = dok_ipmbl_keteranganSearchField.getValue();
			dok_ipmbl_ipmbl_idValue = dok_ipmbl_ipmbl_idSearchField.getValue();
			dok_ipmbl_ipmbldet_idValue = dok_ipmbl_ipmbldet_idSearchField.getValue();
			ipmbl_dok_dbListAction = "SEARCH";
			ipmbl_dok_dataStore.proxy.extraParams = { 
				dok_ipmbl_penerima : dok_ipmbl_penerimaValue,
				dok_ipmbl_jabatan : dok_ipmbl_jabatanValue,
				dok_ipmbl_tanggal : dok_ipmbl_tanggalValue,
				dok_ipmbl_keterangan : dok_ipmbl_keteranganValue,
				dok_ipmbl_ipmbl_id : dok_ipmbl_ipmbl_idValue,
				dok_ipmbl_ipmbldet_id : dok_ipmbl_ipmbldet_idValue,
				action : 'SEARCH'
			};
			ipmbl_dok_dataStore.currentPage = 1;
			ipmbl_dok_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function ipmbl_dok_printExcel(outputType){
			var searchText = "";
			var dok_ipmbl_penerimaValue = '';
			var dok_ipmbl_jabatanValue = '';
			var dok_ipmbl_tanggalValue = '';
			var dok_ipmbl_keteranganValue = '';
			var dok_ipmbl_ipmbl_idValue = '';
			var dok_ipmbl_ipmbldet_idValue = '';
			
			if(ipmbl_dok_dataStore.proxy.extraParams.query!==null){searchText = ipmbl_dok_dataStore.proxy.extraParams.query;}
			if(ipmbl_dok_dataStore.proxy.extraParams.dok_ipmbl_penerima!==null){dok_ipmbl_penerimaValue = ipmbl_dok_dataStore.proxy.extraParams.dok_ipmbl_penerima;}
			if(ipmbl_dok_dataStore.proxy.extraParams.dok_ipmbl_jabatan!==null){dok_ipmbl_jabatanValue = ipmbl_dok_dataStore.proxy.extraParams.dok_ipmbl_jabatan;}
			if(ipmbl_dok_dataStore.proxy.extraParams.dok_ipmbl_tanggal!==null){dok_ipmbl_tanggalValue = ipmbl_dok_dataStore.proxy.extraParams.dok_ipmbl_tanggal;}
			if(ipmbl_dok_dataStore.proxy.extraParams.dok_ipmbl_keterangan!==null){dok_ipmbl_keteranganValue = ipmbl_dok_dataStore.proxy.extraParams.dok_ipmbl_keterangan;}
			if(ipmbl_dok_dataStore.proxy.extraParams.dok_ipmbl_ipmbl_id!==null){dok_ipmbl_ipmbl_idValue = ipmbl_dok_dataStore.proxy.extraParams.dok_ipmbl_ipmbl_id;}
			if(ipmbl_dok_dataStore.proxy.extraParams.dok_ipmbl_ipmbldet_id!==null){dok_ipmbl_ipmbldet_idValue = ipmbl_dok_dataStore.proxy.extraParams.dok_ipmbl_ipmbldet_id;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_t_ipmbl_dok/switchAction',
				params : {
					action : outputType,
					query : searchText,
					dok_ipmbl_penerima : dok_ipmbl_penerimaValue,
					dok_ipmbl_jabatan : dok_ipmbl_jabatanValue,
					dok_ipmbl_tanggal : dok_ipmbl_tanggalValue,
					dok_ipmbl_keterangan : dok_ipmbl_keteranganValue,
					dok_ipmbl_ipmbl_id : dok_ipmbl_ipmbl_idValue,
					dok_ipmbl_ipmbldet_id : dok_ipmbl_ipmbldet_idValue,
					currentAction : ipmbl_dok_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/t_ipmbl_dok_list.xls');
							}else{
								window.open('./print/t_ipmbl_dok_list.html','ipmbl_doklist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		ipmbl_dok_dataStore = Ext.create('Ext.data.Store',{
			id : 'ipmbl_dok_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_ipmbl_dok/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'dok_ipmbl_id'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'dok_ipmbl_id', type : 'int', mapping : 'dok_ipmbl_id' },
				{ name : 'dok_ipmbl_penerima', type : 'string', mapping : 'dok_ipmbl_penerima' },
				{ name : 'dok_ipmbl_jabatan', type : 'string', mapping : 'dok_ipmbl_jabatan' },
				{ name : 'dok_ipmbl_tanggal', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'dok_ipmbl_tanggal' },
				{ name : 'dok_ipmbl_keterangan', type : 'string', mapping : 'dok_ipmbl_keterangan' },
				{ name : 'dok_ipmbl_ipmbl_id', type : 'int', mapping : 'dok_ipmbl_ipmbl_id' },
				{ name : 'dok_ipmbl_ipmbldet_id', type : 'int', mapping : 'dok_ipmbl_ipmbldet_id' },
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		ipmbl_dok_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						ipmbl_dok_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						ipmbl_dok_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						ipmbl_dok_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						ipmbl_dok_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						ipmbl_dok_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						ipmbl_dok_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						ipmbl_dok_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						ipmbl_dok_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var ipmbl_dok_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : ipmbl_dok_confirmAdd
		});
		var ipmbl_dok_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : ipmbl_dok_confirmUpdate
		});
		var ipmbl_dok_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : ipmbl_dok_confirmDelete
		});
		var ipmbl_dok_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : ipmbl_dok_refresh
		});
		var ipmbl_dok_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : ipmbl_dok_showSearchWindow
		});
		var ipmbl_dok_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				ipmbl_dok_printExcel('PRINT');
			}
		});
		var ipmbl_dok_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				ipmbl_dok_printExcel('EXCEL');
			}
		});
		
		var ipmbl_dok_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : ipmbl_dok_confirmUpdate
		});
		var ipmbl_dok_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : ipmbl_dok_confirmDelete
		});
		var ipmbl_dok_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : ipmbl_dok_refresh
		});
		ipmbl_dok_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'ipmbl_dok_contextMenu',
			items: [
				ipmbl_dok_contextMenuEdit,ipmbl_dok_contextMenuDelete,'-',ipmbl_dok_contextMenuRefresh
			]
		});
		
		ipmbl_dok_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : ipmbl_dok_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						ipmbl_dok_dataStore.proxy.extraParams = { action : 'GETLIST'};
						ipmbl_dok_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		ipmbl_dok_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'ipmbl_dok_gridPanel',
			constrain : true,
			store : ipmbl_dok_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'ipmbl_dokGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						ipmbl_dok_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : ipmbl_dok_shorcut,
			columns : [
				{
					text : 'dok_ipmbl_penerima',
					dataIndex : 'dok_ipmbl_penerima',
					width : 100,
					sortable : false
				},
				{
					text : 'dok_ipmbl_jabatan',
					dataIndex : 'dok_ipmbl_jabatan',
					width : 100,
					sortable : false
				},
				{
					text : 'dok_ipmbl_tanggal',
					dataIndex : 'dok_ipmbl_tanggal',
					width : 100,
					sortable : false
				},
				{
					text : 'dok_ipmbl_keterangan',
					dataIndex : 'dok_ipmbl_keterangan',
					width : 100,
					sortable : false
				},
				{
					text : 'dok_ipmbl_ipmbl_id',
					dataIndex : 'dok_ipmbl_ipmbl_id',
					width : 100,
					sortable : false
				},
				{
					text : 'dok_ipmbl_ipmbldet_id',
					dataIndex : 'dok_ipmbl_ipmbldet_id',
					width : 100,
					sortable : false
				},
							
			],
			tbar : [
				ipmbl_dok_addButton,
				ipmbl_dok_editButton,
				ipmbl_dok_deleteButton,
				ipmbl_dok_gridSearchField,
				ipmbl_dok_searchButton,
				ipmbl_dok_refreshButton,
				ipmbl_dok_printButton,
				ipmbl_dok_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : ipmbl_dok_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					ipmbl_dok_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		dok_ipmbl_idField = Ext.create('Ext.form.NumberField',{
			id : 'dok_ipmbl_idField',
			name : 'dok_ipmbl_id',
			fieldLabel : 'dok_ipmbl_id<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		dok_ipmbl_penerimaField = Ext.create('Ext.form.TextField',{
			id : 'dok_ipmbl_penerimaField',
			name : 'dok_ipmbl_penerima',
			fieldLabel : 'dok_ipmbl_penerima',
			maxLength : 50
		});
		dok_ipmbl_jabatanField = Ext.create('Ext.form.TextField',{
			id : 'dok_ipmbl_jabatanField',
			name : 'dok_ipmbl_jabatan',
			fieldLabel : 'dok_ipmbl_jabatan',
			maxLength : 50
		});
		dok_ipmbl_tanggalField = Ext.create('Ext.form.TextField',{
			id : 'dok_ipmbl_tanggalField',
			name : 'dok_ipmbl_tanggal',
			fieldLabel : 'dok_ipmbl_tanggal',
			maxLength : 0
		});
		dok_ipmbl_keteranganField = Ext.create('Ext.form.TextField',{
			id : 'dok_ipmbl_keteranganField',
			name : 'dok_ipmbl_keterangan',
			fieldLabel : 'dok_ipmbl_keterangan',
			maxLength : 50
		});
		dok_ipmbl_ipmbl_idField = Ext.create('Ext.form.NumberField',{
			id : 'dok_ipmbl_ipmbl_idField',
			name : 'dok_ipmbl_ipmbl_id',
			fieldLabel : 'dok_ipmbl_ipmbl_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		dok_ipmbl_ipmbldet_idField = Ext.create('Ext.form.NumberField',{
			id : 'dok_ipmbl_ipmbldet_idField',
			name : 'dok_ipmbl_ipmbldet_id',
			fieldLabel : 'dok_ipmbl_ipmbldet_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		var ipmbl_dok_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : ipmbl_dok_save
		});
		var ipmbl_dok_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				ipmbl_dok_resetForm();
				ipmbl_dok_switchToGrid();
			}
		});
		ipmbl_dok_formPanel = Ext.create('Ext.form.Panel', {
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
						dok_ipmbl_idField,
						dok_ipmbl_penerimaField,
						dok_ipmbl_jabatanField,
						dok_ipmbl_tanggalField,
						dok_ipmbl_keteranganField,
						dok_ipmbl_ipmbl_idField,
						dok_ipmbl_ipmbldet_idField,
											]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [ipmbl_dok_saveButton,ipmbl_dok_cancelButton]
		});
		ipmbl_dok_formWindow = Ext.create('Ext.window.Window',{
			id : 'ipmbl_dok_formWindow',
			renderTo : 'ipmbl_dokSaveWindow',
			title : globalFormAddEditTitle + ' ' + ipmbl_dok_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [ipmbl_dok_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		dok_ipmbl_penerimaSearchField = Ext.create('Ext.form.TextField',{
			id : 'dok_ipmbl_penerimaSearchField',
			name : 'dok_ipmbl_penerima',
			fieldLabel : 'dok_ipmbl_penerima',
			maxLength : 50
		
		});
		dok_ipmbl_jabatanSearchField = Ext.create('Ext.form.TextField',{
			id : 'dok_ipmbl_jabatanSearchField',
			name : 'dok_ipmbl_jabatan',
			fieldLabel : 'dok_ipmbl_jabatan',
			maxLength : 50
		
		});
		dok_ipmbl_tanggalSearchField = Ext.create('Ext.form.TextField',{
			id : 'dok_ipmbl_tanggalSearchField',
			name : 'dok_ipmbl_tanggal',
			fieldLabel : 'dok_ipmbl_tanggal',
			maxLength : 0
		
		});
		dok_ipmbl_keteranganSearchField = Ext.create('Ext.form.TextField',{
			id : 'dok_ipmbl_keteranganSearchField',
			name : 'dok_ipmbl_keterangan',
			fieldLabel : 'dok_ipmbl_keterangan',
			maxLength : 50
		
		});
		dok_ipmbl_ipmbl_idSearchField = Ext.create('Ext.form.NumberField',{
			id : 'dok_ipmbl_ipmbl_idSearchField',
			name : 'dok_ipmbl_ipmbl_id',
			fieldLabel : 'dok_ipmbl_ipmbl_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		dok_ipmbl_ipmbldet_idSearchField = Ext.create('Ext.form.NumberField',{
			id : 'dok_ipmbl_ipmbldet_idSearchField',
			name : 'dok_ipmbl_ipmbldet_id',
			fieldLabel : 'dok_ipmbl_ipmbldet_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		var ipmbl_dok_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : ipmbl_dok_search
		});
		var ipmbl_dok_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				ipmbl_dok_searchWindow.hide();
			}
		});
		ipmbl_dok_searchPanel = Ext.create('Ext.form.Panel', {
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
						dok_ipmbl_penerimaSearchField,
						dok_ipmbl_jabatanSearchField,
						dok_ipmbl_tanggalSearchField,
						dok_ipmbl_keteranganSearchField,
						dok_ipmbl_ipmbl_idSearchField,
						dok_ipmbl_ipmbldet_idSearchField,
						]
				}],
			buttons : [ipmbl_dok_searchingButton,ipmbl_dok_cancelSearchButton]
		});
		ipmbl_dok_searchWindow = Ext.create('Ext.window.Window',{
			id : 'ipmbl_dok_searchWindow',
			renderTo : 'ipmbl_dokSearchWindow',
			title : globalFormSearchTitle + ' ' + ipmbl_dok_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [ipmbl_dok_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="ipmbl_dokSaveWindow"></div>
<div id="ipmbl_dokSearchWindow"></div>
<div class="span12" id="ipmbl_dokGrid"></div>