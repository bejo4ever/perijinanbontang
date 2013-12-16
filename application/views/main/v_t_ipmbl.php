<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var ipmbl_componentItemTitle="IPMBL";
		var ipmbl_dataStore;
		
		var ipmbl_shorcut;
		var ipmbl_contextMenu;
		var ipmbl_gridSearchField;
		var ipmbl_gridPanel;
		var ipmbl_formPanel;
		var ipmbl_formWindow;
		var ipmbl_searchPanel;
		var ipmbl_searchWindow;
		
		var ipmbl_idField;
		var ipmbl_luasField;
		var ipmbl_volumeField;
		var ipmbl_keperluanField;
		var ipmbl_alamatField;
		var ipmbl_kelurahanField;
		var ipmbl_kecamatanField;
		var ipmbl_statusField;
		var ipmbl_tanggalsurveyField;
		var ipmbl_usahaField;
		var ipmbl_alamatusahaField;
				
		var ipmbl_luasSearchField;
		var ipmbl_volumeSearchField;
		var ipmbl_keperluanSearchField;
		var ipmbl_alamatSearchField;
		var ipmbl_kelurahanSearchField;
		var ipmbl_kecamatanSearchField;
		var ipmbl_statusSearchField;
		var ipmbl_tanggalsurveySearchField;
		var ipmbl_usahaSearchField;
		var ipmbl_alamatusahaSearchField;
				
		var ipmbl_dbTask = 'CREATE';
		var ipmbl_dbTaskMessage = 'Tambah';
		var ipmbl_dbPermission = 'CRUD';
		var ipmbl_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function ipmbl_switchToGrid(){
			ipmbl_formPanel.setDisabled(true);
			ipmbl_gridPanel.setDisabled(false);
			ipmbl_formWindow.hide();
		}
		
		function ipmbl_switchToForm(){
			ipmbl_gridPanel.setDisabled(true);
			ipmbl_formPanel.setDisabled(false);
			ipmbl_formWindow.show();
		}
		
		function ipmbl_confirmAdd(){
			ipmbl_dbTask = 'CREATE';
			ipmbl_dbTaskMessage = 'created';
			ipmbl_resetForm();
			ipmbl_switchToForm();
		}
		
		function ipmbl_confirmUpdate(){
			if(ipmbl_gridPanel.selModel.getCount() == 1) {
				ipmbl_dbTask = 'UPDATE';
				ipmbl_dbTaskMessage = 'updated';
				ipmbl_switchToForm();
				ipmbl_setForm();
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
		
		function ipmbl_confirmDelete(){
			if(ipmbl_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, ipmbl_delete);
			}else if(ipmbl_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, ipmbl_delete);
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
		
		function ipmbl_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(ipmbl_dbPermission)==false && pattC.test(ipmbl_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(ipmbl_confirmFormValid()){
					var ipmbl_idValue = '';
					var ipmbl_luasValue = '';
					var ipmbl_volumeValue = '';
					var ipmbl_keperluanValue = '';
					var ipmbl_alamatValue = '';
					var ipmbl_kelurahanValue = '';
					var ipmbl_kecamatanValue = '';
					var ipmbl_statusValue = '';
					var ipmbl_tanggalsurveyValue = '';
					var ipmbl_usahaValue = '';
					var ipmbl_alamatusahaValue = '';
										
					ipmbl_idValue = ipmbl_idField.getValue();
					ipmbl_luasValue = ipmbl_luasField.getValue();
					ipmbl_volumeValue = ipmbl_volumeField.getValue();
					ipmbl_keperluanValue = ipmbl_keperluanField.getValue();
					ipmbl_alamatValue = ipmbl_alamatField.getValue();
					ipmbl_kelurahanValue = ipmbl_kelurahanField.getValue();
					ipmbl_kecamatanValue = ipmbl_kecamatanField.getValue();
					ipmbl_statusValue = ipmbl_statusField.getValue();
					ipmbl_tanggalsurveyValue = ipmbl_tanggalsurveyField.getValue();
					ipmbl_usahaValue = ipmbl_usahaField.getValue();
					ipmbl_alamatusahaValue = ipmbl_alamatusahaField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_t_ipmbl/switchAction',
						params: {							
							ipmbl_id : ipmbl_idValue,
							ipmbl_luas : ipmbl_luasValue,
							ipmbl_volume : ipmbl_volumeValue,
							ipmbl_keperluan : ipmbl_keperluanValue,
							ipmbl_alamat : ipmbl_alamatValue,
							ipmbl_kelurahan : ipmbl_kelurahanValue,
							ipmbl_kecamatan : ipmbl_kecamatanValue,
							ipmbl_status : ipmbl_statusValue,
							ipmbl_tanggalsurvey : ipmbl_tanggalsurveyValue,
							ipmbl_usaha : ipmbl_usahaValue,
							ipmbl_alamatusaha : ipmbl_alamatusahaValue,
							action : ipmbl_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									ipmbl_dataStore.reload();
									ipmbl_resetForm();
									ipmbl_switchToGrid();
									ipmbl_gridPanel.getSelectionModel().deselectAll();
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
		
		function ipmbl_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(ipmbl_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = ipmbl_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< ipmbl_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.ipmbl_id);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_t_ipmbl/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									ipmbl_dataStore.reload();
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
		
		function ipmbl_refresh(){
			ipmbl_dbListAction = "GETLIST";
			ipmbl_gridSearchField.reset();
			ipmbl_searchPanel.getForm().reset();
			ipmbl_dataStore.proxy.extraParams = { action : 'GETLIST' };
			ipmbl_dataStore.proxy.extraParams.query = "";
			ipmbl_dataStore.currentPage = 1;
			ipmbl_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function ipmbl_confirmFormValid(){
			return ipmbl_formPanel.getForm().isValid();
		}
		
		function ipmbl_resetForm(){
			ipmbl_dbTask = 'CREATE';
			ipmbl_dbTaskMessage = 'create';
			ipmbl_formPanel.getForm().reset();
			ipmbl_idField.setValue(0);
		}
		
		function ipmbl_setForm(){
			ipmbl_dbTask = 'UPDATE';
            ipmbl_dbTaskMessage = 'update';
			
			var record = ipmbl_gridPanel.getSelectionModel().getSelection()[0];
			ipmbl_idField.setValue(record.data.ipmbl_id);
			ipmbl_luasField.setValue(record.data.ipmbl_luas);
			ipmbl_volumeField.setValue(record.data.ipmbl_volume);
			ipmbl_keperluanField.setValue(record.data.ipmbl_keperluan);
			ipmbl_alamatField.setValue(record.data.ipmbl_alamat);
			ipmbl_kelurahanField.setValue(record.data.ipmbl_kelurahan);
			ipmbl_kecamatanField.setValue(record.data.ipmbl_kecamatan);
			ipmbl_statusField.setValue(record.data.ipmbl_status);
			ipmbl_tanggalsurveyField.setValue(record.data.ipmbl_tanggalsurvey);
			ipmbl_usahaField.setValue(record.data.ipmbl_usaha);
			ipmbl_alamatusahaField.setValue(record.data.ipmbl_alamatusaha);
					}
		
		function ipmbl_showSearchWindow(){
			ipmbl_searchWindow.show();
		}
		
		function ipmbl_search(){
			ipmbl_gridSearchField.reset();
			
			var ipmbl_luasValue = '';
			var ipmbl_volumeValue = '';
			var ipmbl_keperluanValue = '';
			var ipmbl_alamatValue = '';
			var ipmbl_kelurahanValue = '';
			var ipmbl_kecamatanValue = '';
			var ipmbl_statusValue = '';
			var ipmbl_tanggalsurveyValue = '';
			var ipmbl_usahaValue = '';
			var ipmbl_alamatusahaValue = '';
						
			ipmbl_luasValue = ipmbl_luasSearchField.getValue();
			ipmbl_volumeValue = ipmbl_volumeSearchField.getValue();
			ipmbl_keperluanValue = ipmbl_keperluanSearchField.getValue();
			ipmbl_alamatValue = ipmbl_alamatSearchField.getValue();
			ipmbl_kelurahanValue = ipmbl_kelurahanSearchField.getValue();
			ipmbl_kecamatanValue = ipmbl_kecamatanSearchField.getValue();
			ipmbl_statusValue = ipmbl_statusSearchField.getValue();
			ipmbl_tanggalsurveyValue = ipmbl_tanggalsurveySearchField.getValue();
			ipmbl_usahaValue = ipmbl_usahaSearchField.getValue();
			ipmbl_alamatusahaValue = ipmbl_alamatusahaSearchField.getValue();
			ipmbl_dbListAction = "SEARCH";
			ipmbl_dataStore.proxy.extraParams = { 
				ipmbl_luas : ipmbl_luasValue,
				ipmbl_volume : ipmbl_volumeValue,
				ipmbl_keperluan : ipmbl_keperluanValue,
				ipmbl_alamat : ipmbl_alamatValue,
				ipmbl_kelurahan : ipmbl_kelurahanValue,
				ipmbl_kecamatan : ipmbl_kecamatanValue,
				ipmbl_status : ipmbl_statusValue,
				ipmbl_tanggalsurvey : ipmbl_tanggalsurveyValue,
				ipmbl_usaha : ipmbl_usahaValue,
				ipmbl_alamatusaha : ipmbl_alamatusahaValue,
				action : 'SEARCH'
			};
			ipmbl_dataStore.currentPage = 1;
			ipmbl_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function ipmbl_printExcel(outputType){
			var searchText = "";
			var ipmbl_luasValue = '';
			var ipmbl_volumeValue = '';
			var ipmbl_keperluanValue = '';
			var ipmbl_alamatValue = '';
			var ipmbl_kelurahanValue = '';
			var ipmbl_kecamatanValue = '';
			var ipmbl_statusValue = '';
			var ipmbl_tanggalsurveyValue = '';
			var ipmbl_usahaValue = '';
			var ipmbl_alamatusahaValue = '';
			
			if(ipmbl_dataStore.proxy.extraParams.query!==null){searchText = ipmbl_dataStore.proxy.extraParams.query;}
			if(ipmbl_dataStore.proxy.extraParams.ipmbl_luas!==null){ipmbl_luasValue = ipmbl_dataStore.proxy.extraParams.ipmbl_luas;}
			if(ipmbl_dataStore.proxy.extraParams.ipmbl_volume!==null){ipmbl_volumeValue = ipmbl_dataStore.proxy.extraParams.ipmbl_volume;}
			if(ipmbl_dataStore.proxy.extraParams.ipmbl_keperluan!==null){ipmbl_keperluanValue = ipmbl_dataStore.proxy.extraParams.ipmbl_keperluan;}
			if(ipmbl_dataStore.proxy.extraParams.ipmbl_alamat!==null){ipmbl_alamatValue = ipmbl_dataStore.proxy.extraParams.ipmbl_alamat;}
			if(ipmbl_dataStore.proxy.extraParams.ipmbl_kelurahan!==null){ipmbl_kelurahanValue = ipmbl_dataStore.proxy.extraParams.ipmbl_kelurahan;}
			if(ipmbl_dataStore.proxy.extraParams.ipmbl_kecamatan!==null){ipmbl_kecamatanValue = ipmbl_dataStore.proxy.extraParams.ipmbl_kecamatan;}
			if(ipmbl_dataStore.proxy.extraParams.ipmbl_status!==null){ipmbl_statusValue = ipmbl_dataStore.proxy.extraParams.ipmbl_status;}
			if(ipmbl_dataStore.proxy.extraParams.ipmbl_tanggalsurvey!==null){ipmbl_tanggalsurveyValue = ipmbl_dataStore.proxy.extraParams.ipmbl_tanggalsurvey;}
			if(ipmbl_dataStore.proxy.extraParams.ipmbl_usaha!==null){ipmbl_usahaValue = ipmbl_dataStore.proxy.extraParams.ipmbl_usaha;}
			if(ipmbl_dataStore.proxy.extraParams.ipmbl_alamatusaha!==null){ipmbl_alamatusahaValue = ipmbl_dataStore.proxy.extraParams.ipmbl_alamatusaha;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_t_ipmbl/switchAction',
				params : {
					action : outputType,
					query : searchText,
					ipmbl_luas : ipmbl_luasValue,
					ipmbl_volume : ipmbl_volumeValue,
					ipmbl_keperluan : ipmbl_keperluanValue,
					ipmbl_alamat : ipmbl_alamatValue,
					ipmbl_kelurahan : ipmbl_kelurahanValue,
					ipmbl_kecamatan : ipmbl_kecamatanValue,
					ipmbl_status : ipmbl_statusValue,
					ipmbl_tanggalsurvey : ipmbl_tanggalsurveyValue,
					ipmbl_usaha : ipmbl_usahaValue,
					ipmbl_alamatusaha : ipmbl_alamatusahaValue,
					currentAction : ipmbl_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/t_ipmbl_list.xls');
							}else{
								window.open('./print/t_ipmbl_list.html','ipmbllist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		ipmbl_dataStore = Ext.create('Ext.data.Store',{
			id : 'ipmbl_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_ipmbl/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'ipmbl_id'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'ipmbl_id', type : 'int', mapping : 'ipmbl_id' },
				{ name : 'ipmbl_luas', type : 'float', mapping : 'ipmbl_luas' },
				{ name : 'ipmbl_volume', type : 'float', mapping : 'ipmbl_volume' },
				{ name : 'ipmbl_keperluan', type : 'string', mapping : 'ipmbl_keperluan' },
				{ name : 'ipmbl_alamat', type : 'string', mapping : 'ipmbl_alamat' },
				{ name : 'ipmbl_kelurahan', type : 'int', mapping : 'ipmbl_kelurahan' },
				{ name : 'ipmbl_kecamatan', type : 'int', mapping : 'ipmbl_kecamatan' },
				{ name : 'ipmbl_status', type : 'int', mapping : 'ipmbl_status' },
				{ name : 'ipmbl_tanggalsurvey', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'ipmbl_tanggalsurvey' },
				{ name : 'ipmbl_usaha', type : 'string', mapping : 'ipmbl_usaha' },
				{ name : 'ipmbl_alamatusaha', type : 'string', mapping : 'ipmbl_alamatusaha' },
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		ipmbl_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						ipmbl_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						ipmbl_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						ipmbl_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						ipmbl_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						ipmbl_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						ipmbl_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						ipmbl_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						ipmbl_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var ipmbl_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : ipmbl_confirmAdd
		});
		var ipmbl_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : ipmbl_confirmUpdate
		});
		var ipmbl_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : ipmbl_confirmDelete
		});
		var ipmbl_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : ipmbl_refresh
		});
		var ipmbl_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : ipmbl_showSearchWindow
		});
		var ipmbl_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				ipmbl_printExcel('PRINT');
			}
		});
		var ipmbl_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				ipmbl_printExcel('EXCEL');
			}
		});
		
		var ipmbl_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : ipmbl_confirmUpdate
		});
		var ipmbl_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : ipmbl_confirmDelete
		});
		var ipmbl_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : ipmbl_refresh
		});
		ipmbl_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'ipmbl_contextMenu',
			items: [
				ipmbl_contextMenuEdit,ipmbl_contextMenuDelete,'-',ipmbl_contextMenuRefresh
			]
		});
		
		ipmbl_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : ipmbl_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						ipmbl_dataStore.proxy.extraParams = { action : 'GETLIST'};
						ipmbl_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		ipmbl_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'ipmbl_gridPanel',
			constrain : true,
			store : ipmbl_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'ipmblGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						ipmbl_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : ipmbl_shorcut,
			columns : [
				{
					text : 'ipmbl_luas',
					dataIndex : 'ipmbl_luas',
					width : 100,
					sortable : false
				},
				{
					text : 'ipmbl_volume',
					dataIndex : 'ipmbl_volume',
					width : 100,
					sortable : false
				},
				{
					text : 'ipmbl_keperluan',
					dataIndex : 'ipmbl_keperluan',
					width : 100,
					sortable : false
				},
				{
					text : 'ipmbl_alamat',
					dataIndex : 'ipmbl_alamat',
					width : 100,
					sortable : false
				},
				{
					text : 'ipmbl_kelurahan',
					dataIndex : 'ipmbl_kelurahan',
					width : 100,
					sortable : false
				},
				{
					text : 'ipmbl_kecamatan',
					dataIndex : 'ipmbl_kecamatan',
					width : 100,
					sortable : false
				},
				{
					text : 'ipmbl_status',
					dataIndex : 'ipmbl_status',
					width : 100,
					sortable : false
				},
				{
					text : 'ipmbl_tanggalsurvey',
					dataIndex : 'ipmbl_tanggalsurvey',
					width : 100,
					sortable : false
				},
				{
					text : 'ipmbl_usaha',
					dataIndex : 'ipmbl_usaha',
					width : 100,
					sortable : false
				},
				{
					text : 'ipmbl_alamatusaha',
					dataIndex : 'ipmbl_alamatusaha',
					width : 100,
					sortable : false
				},
							
			],
			tbar : [
				ipmbl_addButton,
				ipmbl_editButton,
				ipmbl_deleteButton,
				ipmbl_gridSearchField,
				ipmbl_searchButton,
				ipmbl_refreshButton,
				ipmbl_printButton,
				ipmbl_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : ipmbl_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					ipmbl_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		ipmbl_idField = Ext.create('Ext.form.NumberField',{
			id : 'ipmbl_idField',
			name : 'ipmbl_id',
			fieldLabel : 'ipmbl_id<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		ipmbl_luasField = Ext.create('Ext.form.NumberField',{
			id : 'ipmbl_luasField',
			name : 'ipmbl_luas',
			fieldLabel : 'ipmbl_luas',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		ipmbl_volumeField = Ext.create('Ext.form.NumberField',{
			id : 'ipmbl_volumeField',
			name : 'ipmbl_volume',
			fieldLabel : 'ipmbl_volume',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		ipmbl_keperluanField = Ext.create('Ext.form.TextField',{
			id : 'ipmbl_keperluanField',
			name : 'ipmbl_keperluan',
			fieldLabel : 'ipmbl_keperluan',
			maxLength : 255
		});
		ipmbl_alamatField = Ext.create('Ext.form.TextField',{
			id : 'ipmbl_alamatField',
			name : 'ipmbl_alamat',
			fieldLabel : 'ipmbl_alamat',
			maxLength : 100
		});
		ipmbl_kelurahanField = Ext.create('Ext.form.NumberField',{
			id : 'ipmbl_kelurahanField',
			name : 'ipmbl_kelurahan',
			fieldLabel : 'ipmbl_kelurahan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		ipmbl_kecamatanField = Ext.create('Ext.form.NumberField',{
			id : 'ipmbl_kecamatanField',
			name : 'ipmbl_kecamatan',
			fieldLabel : 'ipmbl_kecamatan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		ipmbl_statusField = Ext.create('Ext.form.NumberField',{
			id : 'ipmbl_statusField',
			name : 'ipmbl_status',
			fieldLabel : 'ipmbl_status',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		ipmbl_tanggalsurveyField = Ext.create('Ext.form.TextField',{
			id : 'ipmbl_tanggalsurveyField',
			name : 'ipmbl_tanggalsurvey',
			fieldLabel : 'ipmbl_tanggalsurvey',
			maxLength : 0
		});
		ipmbl_usahaField = Ext.create('Ext.form.TextField',{
			id : 'ipmbl_usahaField',
			name : 'ipmbl_usaha',
			fieldLabel : 'ipmbl_usaha',
			maxLength : 50
		});
		ipmbl_alamatusahaField = Ext.create('Ext.form.TextField',{
			id : 'ipmbl_alamatusahaField',
			name : 'ipmbl_alamatusaha',
			fieldLabel : 'ipmbl_alamatusaha',
			maxLength : 100
		});
		var ipmbl_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : ipmbl_save
		});
		var ipmbl_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				ipmbl_resetForm();
				ipmbl_switchToGrid();
			}
		});
		ipmbl_formPanel = Ext.create('Ext.form.Panel', {
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
						ipmbl_idField,
						ipmbl_luasField,
						ipmbl_volumeField,
						ipmbl_keperluanField,
						ipmbl_alamatField,
						ipmbl_kelurahanField,
						ipmbl_kecamatanField,
						ipmbl_statusField,
						ipmbl_tanggalsurveyField,
						ipmbl_usahaField,
						ipmbl_alamatusahaField,
											]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [ipmbl_saveButton,ipmbl_cancelButton]
		});
		ipmbl_formWindow = Ext.create('Ext.window.Window',{
			id : 'ipmbl_formWindow',
			renderTo : 'ipmblSaveWindow',
			title : globalFormAddEditTitle + ' ' + ipmbl_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [ipmbl_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		ipmbl_luasSearchField = Ext.create('Ext.form.NumberField',{
			id : 'ipmbl_luasSearchField',
			name : 'ipmbl_luas',
			fieldLabel : 'ipmbl_luas',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		ipmbl_volumeSearchField = Ext.create('Ext.form.NumberField',{
			id : 'ipmbl_volumeSearchField',
			name : 'ipmbl_volume',
			fieldLabel : 'ipmbl_volume',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		ipmbl_keperluanSearchField = Ext.create('Ext.form.TextField',{
			id : 'ipmbl_keperluanSearchField',
			name : 'ipmbl_keperluan',
			fieldLabel : 'ipmbl_keperluan',
			maxLength : 255
		
		});
		ipmbl_alamatSearchField = Ext.create('Ext.form.TextField',{
			id : 'ipmbl_alamatSearchField',
			name : 'ipmbl_alamat',
			fieldLabel : 'ipmbl_alamat',
			maxLength : 100
		
		});
		ipmbl_kelurahanSearchField = Ext.create('Ext.form.NumberField',{
			id : 'ipmbl_kelurahanSearchField',
			name : 'ipmbl_kelurahan',
			fieldLabel : 'ipmbl_kelurahan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		ipmbl_kecamatanSearchField = Ext.create('Ext.form.NumberField',{
			id : 'ipmbl_kecamatanSearchField',
			name : 'ipmbl_kecamatan',
			fieldLabel : 'ipmbl_kecamatan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		ipmbl_statusSearchField = Ext.create('Ext.form.NumberField',{
			id : 'ipmbl_statusSearchField',
			name : 'ipmbl_status',
			fieldLabel : 'ipmbl_status',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		ipmbl_tanggalsurveySearchField = Ext.create('Ext.form.TextField',{
			id : 'ipmbl_tanggalsurveySearchField',
			name : 'ipmbl_tanggalsurvey',
			fieldLabel : 'ipmbl_tanggalsurvey',
			maxLength : 0
		
		});
		ipmbl_usahaSearchField = Ext.create('Ext.form.TextField',{
			id : 'ipmbl_usahaSearchField',
			name : 'ipmbl_usaha',
			fieldLabel : 'ipmbl_usaha',
			maxLength : 50
		
		});
		ipmbl_alamatusahaSearchField = Ext.create('Ext.form.TextField',{
			id : 'ipmbl_alamatusahaSearchField',
			name : 'ipmbl_alamatusaha',
			fieldLabel : 'ipmbl_alamatusaha',
			maxLength : 100
		
		});
		var ipmbl_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : ipmbl_search
		});
		var ipmbl_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				ipmbl_searchWindow.hide();
			}
		});
		ipmbl_searchPanel = Ext.create('Ext.form.Panel', {
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
						ipmbl_luasSearchField,
						ipmbl_volumeSearchField,
						ipmbl_keperluanSearchField,
						ipmbl_alamatSearchField,
						ipmbl_kelurahanSearchField,
						ipmbl_kecamatanSearchField,
						ipmbl_statusSearchField,
						ipmbl_tanggalsurveySearchField,
						ipmbl_usahaSearchField,
						ipmbl_alamatusahaSearchField,
						]
				}],
			buttons : [ipmbl_searchingButton,ipmbl_cancelSearchButton]
		});
		ipmbl_searchWindow = Ext.create('Ext.window.Window',{
			id : 'ipmbl_searchWindow',
			renderTo : 'ipmblSearchWindow',
			title : globalFormSearchTitle + ' ' + ipmbl_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [ipmbl_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="ipmblSaveWindow"></div>
<div id="ipmblSearchWindow"></div>
<div class="span12" id="ipmblGrid"></div>