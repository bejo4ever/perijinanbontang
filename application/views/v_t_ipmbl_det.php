<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var ipmbl_det_componentItemTitle="IPMBL_DET";
		var ipmbl_det_dataStore;
		
		var ipmbl_det_shorcut;
		var ipmbl_det_contextMenu;
		var ipmbl_det_gridSearchField;
		var ipmbl_det_gridPanel;
		var ipmbl_det_formPanel;
		var ipmbl_det_formWindow;
		var ipmbl_det_searchPanel;
		var ipmbl_det_searchWindow;
		
		var det_ipmbl_idField;
		var det_ipmbl_ipmbl_idField;
		var det_ipmbl_namaField;
		var det_ipmbl_alamatField;
		var det_ipmbl_kelurahanField;
		var det_ipmbl_kecamatanField;
		var det_ipmbl_kotaField;
		var det_ipmbl_telpField;
		var det_ipmbl_namausahaField;
		var det_ipmbl_alamatusahaField;
		var det_ipmbl_namapimpinanField;
				
		var det_ipmbl_ipmbl_idSearchField;
		var det_ipmbl_namaSearchField;
		var det_ipmbl_alamatSearchField;
		var det_ipmbl_kelurahanSearchField;
		var det_ipmbl_kecamatanSearchField;
		var det_ipmbl_kotaSearchField;
		var det_ipmbl_telpSearchField;
		var det_ipmbl_namausahaSearchField;
		var det_ipmbl_alamatusahaSearchField;
		var det_ipmbl_namapimpinanSearchField;
				
		var ipmbl_det_dbTask = 'CREATE';
		var ipmbl_det_dbTaskMessage = 'Tambah';
		var ipmbl_det_dbPermission = 'CRUD';
		var ipmbl_det_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function ipmbl_det_switchToGrid(){
			ipmbl_det_formPanel.setDisabled(true);
			ipmbl_det_gridPanel.setDisabled(false);
			ipmbl_det_formWindow.hide();
		}
		
		function ipmbl_det_switchToForm(){
			ipmbl_det_gridPanel.setDisabled(true);
			ipmbl_det_formPanel.setDisabled(false);
			ipmbl_det_formWindow.show();
		}
		
		function ipmbl_det_confirmAdd(){
			ipmbl_det_dbTask = 'CREATE';
			ipmbl_det_dbTaskMessage = 'created';
			ipmbl_det_resetForm();
			ipmbl_det_switchToForm();
		}
		
		function ipmbl_det_confirmUpdate(){
			if(ipmbl_det_gridPanel.selModel.getCount() == 1) {
				ipmbl_det_dbTask = 'UPDATE';
				ipmbl_det_dbTaskMessage = 'updated';
				ipmbl_det_switchToForm();
				ipmbl_det_setForm();
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
		
		function ipmbl_det_confirmDelete(){
			if(ipmbl_det_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, ipmbl_det_delete);
			}else if(ipmbl_det_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, ipmbl_det_delete);
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
		
		function ipmbl_det_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(ipmbl_det_dbPermission)==false && pattC.test(ipmbl_det_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(ipmbl_det_confirmFormValid()){
					var det_ipmbl_idValue = '';
					var det_ipmbl_ipmbl_idValue = '';
					var det_ipmbl_namaValue = '';
					var det_ipmbl_alamatValue = '';
					var det_ipmbl_kelurahanValue = '';
					var det_ipmbl_kecamatanValue = '';
					var det_ipmbl_kotaValue = '';
					var det_ipmbl_telpValue = '';
					var det_ipmbl_namausahaValue = '';
					var det_ipmbl_alamatusahaValue = '';
					var det_ipmbl_namapimpinanValue = '';
										
					det_ipmbl_idValue = det_ipmbl_idField.getValue();
					det_ipmbl_ipmbl_idValue = det_ipmbl_ipmbl_idField.getValue();
					det_ipmbl_namaValue = det_ipmbl_namaField.getValue();
					det_ipmbl_alamatValue = det_ipmbl_alamatField.getValue();
					det_ipmbl_kelurahanValue = det_ipmbl_kelurahanField.getValue();
					det_ipmbl_kecamatanValue = det_ipmbl_kecamatanField.getValue();
					det_ipmbl_kotaValue = det_ipmbl_kotaField.getValue();
					det_ipmbl_telpValue = det_ipmbl_telpField.getValue();
					det_ipmbl_namausahaValue = det_ipmbl_namausahaField.getValue();
					det_ipmbl_alamatusahaValue = det_ipmbl_alamatusahaField.getValue();
					det_ipmbl_namapimpinanValue = det_ipmbl_namapimpinanField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_t_ipmbl_det/switchAction',
						params: {							
							det_ipmbl_id : det_ipmbl_idValue,
							det_ipmbl_ipmbl_id : det_ipmbl_ipmbl_idValue,
							det_ipmbl_nama : det_ipmbl_namaValue,
							det_ipmbl_alamat : det_ipmbl_alamatValue,
							det_ipmbl_kelurahan : det_ipmbl_kelurahanValue,
							det_ipmbl_kecamatan : det_ipmbl_kecamatanValue,
							det_ipmbl_kota : det_ipmbl_kotaValue,
							det_ipmbl_telp : det_ipmbl_telpValue,
							det_ipmbl_namausaha : det_ipmbl_namausahaValue,
							det_ipmbl_alamatusaha : det_ipmbl_alamatusahaValue,
							det_ipmbl_namapimpinan : det_ipmbl_namapimpinanValue,
							action : ipmbl_det_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									ipmbl_det_dataStore.reload();
									ipmbl_det_resetForm();
									ipmbl_det_switchToGrid();
									ipmbl_det_gridPanel.getSelectionModel().deselectAll();
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
		
		function ipmbl_det_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(ipmbl_det_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = ipmbl_det_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< ipmbl_det_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.det_ipmbl_id);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_t_ipmbl_det/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									ipmbl_det_dataStore.reload();
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
		
		function ipmbl_det_refresh(){
			ipmbl_det_dbListAction = "GETLIST";
			ipmbl_det_gridSearchField.reset();
			ipmbl_det_searchPanel.getForm().reset();
			ipmbl_det_dataStore.proxy.extraParams = { action : 'GETLIST' };
			ipmbl_det_dataStore.proxy.extraParams.query = "";
			ipmbl_det_dataStore.currentPage = 1;
			ipmbl_det_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function ipmbl_det_confirmFormValid(){
			return ipmbl_det_formPanel.getForm().isValid();
		}
		
		function ipmbl_det_resetForm(){
			ipmbl_det_dbTask = 'CREATE';
			ipmbl_det_dbTaskMessage = 'create';
			ipmbl_det_formPanel.getForm().reset();
			det_ipmbl_idField.setValue(0);
		}
		
		function ipmbl_det_setForm(){
			ipmbl_det_dbTask = 'UPDATE';
            ipmbl_det_dbTaskMessage = 'update';
			
			var record = ipmbl_det_gridPanel.getSelectionModel().getSelection()[0];
			det_ipmbl_idField.setValue(record.data.det_ipmbl_id);
			det_ipmbl_ipmbl_idField.setValue(record.data.det_ipmbl_ipmbl_id);
			det_ipmbl_namaField.setValue(record.data.det_ipmbl_nama);
			det_ipmbl_alamatField.setValue(record.data.det_ipmbl_alamat);
			det_ipmbl_kelurahanField.setValue(record.data.det_ipmbl_kelurahan);
			det_ipmbl_kecamatanField.setValue(record.data.det_ipmbl_kecamatan);
			det_ipmbl_kotaField.setValue(record.data.det_ipmbl_kota);
			det_ipmbl_telpField.setValue(record.data.det_ipmbl_telp);
			det_ipmbl_namausahaField.setValue(record.data.det_ipmbl_namausaha);
			det_ipmbl_alamatusahaField.setValue(record.data.det_ipmbl_alamatusaha);
			det_ipmbl_namapimpinanField.setValue(record.data.det_ipmbl_namapimpinan);
					}
		
		function ipmbl_det_showSearchWindow(){
			ipmbl_det_searchWindow.show();
		}
		
		function ipmbl_det_search(){
			ipmbl_det_gridSearchField.reset();
			
			var det_ipmbl_ipmbl_idValue = '';
			var det_ipmbl_namaValue = '';
			var det_ipmbl_alamatValue = '';
			var det_ipmbl_kelurahanValue = '';
			var det_ipmbl_kecamatanValue = '';
			var det_ipmbl_kotaValue = '';
			var det_ipmbl_telpValue = '';
			var det_ipmbl_namausahaValue = '';
			var det_ipmbl_alamatusahaValue = '';
			var det_ipmbl_namapimpinanValue = '';
						
			det_ipmbl_ipmbl_idValue = det_ipmbl_ipmbl_idSearchField.getValue();
			det_ipmbl_namaValue = det_ipmbl_namaSearchField.getValue();
			det_ipmbl_alamatValue = det_ipmbl_alamatSearchField.getValue();
			det_ipmbl_kelurahanValue = det_ipmbl_kelurahanSearchField.getValue();
			det_ipmbl_kecamatanValue = det_ipmbl_kecamatanSearchField.getValue();
			det_ipmbl_kotaValue = det_ipmbl_kotaSearchField.getValue();
			det_ipmbl_telpValue = det_ipmbl_telpSearchField.getValue();
			det_ipmbl_namausahaValue = det_ipmbl_namausahaSearchField.getValue();
			det_ipmbl_alamatusahaValue = det_ipmbl_alamatusahaSearchField.getValue();
			det_ipmbl_namapimpinanValue = det_ipmbl_namapimpinanSearchField.getValue();
			ipmbl_det_dbListAction = "SEARCH";
			ipmbl_det_dataStore.proxy.extraParams = { 
				det_ipmbl_ipmbl_id : det_ipmbl_ipmbl_idValue,
				det_ipmbl_nama : det_ipmbl_namaValue,
				det_ipmbl_alamat : det_ipmbl_alamatValue,
				det_ipmbl_kelurahan : det_ipmbl_kelurahanValue,
				det_ipmbl_kecamatan : det_ipmbl_kecamatanValue,
				det_ipmbl_kota : det_ipmbl_kotaValue,
				det_ipmbl_telp : det_ipmbl_telpValue,
				det_ipmbl_namausaha : det_ipmbl_namausahaValue,
				det_ipmbl_alamatusaha : det_ipmbl_alamatusahaValue,
				det_ipmbl_namapimpinan : det_ipmbl_namapimpinanValue,
				action : 'SEARCH'
			};
			ipmbl_det_dataStore.currentPage = 1;
			ipmbl_det_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function ipmbl_det_printExcel(outputType){
			var searchText = "";
			var det_ipmbl_ipmbl_idValue = '';
			var det_ipmbl_namaValue = '';
			var det_ipmbl_alamatValue = '';
			var det_ipmbl_kelurahanValue = '';
			var det_ipmbl_kecamatanValue = '';
			var det_ipmbl_kotaValue = '';
			var det_ipmbl_telpValue = '';
			var det_ipmbl_namausahaValue = '';
			var det_ipmbl_alamatusahaValue = '';
			var det_ipmbl_namapimpinanValue = '';
			
			if(ipmbl_det_dataStore.proxy.extraParams.query!==null){searchText = ipmbl_det_dataStore.proxy.extraParams.query;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_ipmbl_id!==null){det_ipmbl_ipmbl_idValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_ipmbl_id;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_nama!==null){det_ipmbl_namaValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_nama;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_alamat!==null){det_ipmbl_alamatValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_alamat;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_kelurahan!==null){det_ipmbl_kelurahanValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_kelurahan;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_kecamatan!==null){det_ipmbl_kecamatanValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_kecamatan;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_kota!==null){det_ipmbl_kotaValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_kota;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_telp!==null){det_ipmbl_telpValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_telp;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_namausaha!==null){det_ipmbl_namausahaValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_namausaha;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_alamatusaha!==null){det_ipmbl_alamatusahaValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_alamatusaha;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_namapimpinan!==null){det_ipmbl_namapimpinanValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_namapimpinan;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_t_ipmbl_det/switchAction',
				params : {
					action : outputType,
					query : searchText,
					det_ipmbl_ipmbl_id : det_ipmbl_ipmbl_idValue,
					det_ipmbl_nama : det_ipmbl_namaValue,
					det_ipmbl_alamat : det_ipmbl_alamatValue,
					det_ipmbl_kelurahan : det_ipmbl_kelurahanValue,
					det_ipmbl_kecamatan : det_ipmbl_kecamatanValue,
					det_ipmbl_kota : det_ipmbl_kotaValue,
					det_ipmbl_telp : det_ipmbl_telpValue,
					det_ipmbl_namausaha : det_ipmbl_namausahaValue,
					det_ipmbl_alamatusaha : det_ipmbl_alamatusahaValue,
					det_ipmbl_namapimpinan : det_ipmbl_namapimpinanValue,
					currentAction : ipmbl_det_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/t_ipmbl_det_list.xls');
							}else{
								window.open('./print/t_ipmbl_det_list.html','ipmbl_detlist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		ipmbl_det_dataStore = Ext.create('Ext.data.Store',{
			id : 'ipmbl_det_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_ipmbl_det/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'det_ipmbl_id'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'det_ipmbl_id', type : 'int', mapping : 'det_ipmbl_id' },
				{ name : 'det_ipmbl_ipmbl_id', type : 'int', mapping : 'det_ipmbl_ipmbl_id' },
				{ name : 'det_ipmbl_nama', type : 'string', mapping : 'det_ipmbl_nama' },
				{ name : 'det_ipmbl_alamat', type : 'string', mapping : 'det_ipmbl_alamat' },
				{ name : 'det_ipmbl_kelurahan', type : 'int', mapping : 'det_ipmbl_kelurahan' },
				{ name : 'det_ipmbl_kecamatan', type : 'int', mapping : 'det_ipmbl_kecamatan' },
				{ name : 'det_ipmbl_kota', type : 'int', mapping : 'det_ipmbl_kota' },
				{ name : 'det_ipmbl_telp', type : 'string', mapping : 'det_ipmbl_telp' },
				{ name : 'det_ipmbl_namausaha', type : 'string', mapping : 'det_ipmbl_namausaha' },
				{ name : 'det_ipmbl_alamatusaha', type : 'string', mapping : 'det_ipmbl_alamatusaha' },
				{ name : 'det_ipmbl_namapimpinan', type : 'string', mapping : 'det_ipmbl_namapimpinan' },
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		ipmbl_det_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						ipmbl_det_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						ipmbl_det_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						ipmbl_det_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						ipmbl_det_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						ipmbl_det_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						ipmbl_det_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						ipmbl_det_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						ipmbl_det_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var ipmbl_det_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : ipmbl_det_confirmAdd
		});
		var ipmbl_det_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : ipmbl_det_confirmUpdate
		});
		var ipmbl_det_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : ipmbl_det_confirmDelete
		});
		var ipmbl_det_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : ipmbl_det_refresh
		});
		var ipmbl_det_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : ipmbl_det_showSearchWindow
		});
		var ipmbl_det_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				ipmbl_det_printExcel('PRINT');
			}
		});
		var ipmbl_det_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				ipmbl_det_printExcel('EXCEL');
			}
		});
		
		var ipmbl_det_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : ipmbl_det_confirmUpdate
		});
		var ipmbl_det_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : ipmbl_det_confirmDelete
		});
		var ipmbl_det_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : ipmbl_det_refresh
		});
		ipmbl_det_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'ipmbl_det_contextMenu',
			items: [
				ipmbl_det_contextMenuEdit,ipmbl_det_contextMenuDelete,'-',ipmbl_det_contextMenuRefresh
			]
		});
		
		ipmbl_det_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : ipmbl_det_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						ipmbl_det_dataStore.proxy.extraParams = { action : 'GETLIST'};
						ipmbl_det_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		ipmbl_det_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'ipmbl_det_gridPanel',
			constrain : true,
			store : ipmbl_det_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'ipmbl_detGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						ipmbl_det_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : ipmbl_det_shorcut,
			columns : [
				{
					text : 'det_ipmbl_ipmbl_id',
					dataIndex : 'det_ipmbl_ipmbl_id',
					width : 100,
					sortable : false
				},
				{
					text : 'det_ipmbl_nama',
					dataIndex : 'det_ipmbl_nama',
					width : 100,
					sortable : false
				},
				{
					text : 'det_ipmbl_alamat',
					dataIndex : 'det_ipmbl_alamat',
					width : 100,
					sortable : false
				},
				{
					text : 'det_ipmbl_kelurahan',
					dataIndex : 'det_ipmbl_kelurahan',
					width : 100,
					sortable : false
				},
				{
					text : 'det_ipmbl_kecamatan',
					dataIndex : 'det_ipmbl_kecamatan',
					width : 100,
					sortable : false
				},
				{
					text : 'det_ipmbl_kota',
					dataIndex : 'det_ipmbl_kota',
					width : 100,
					sortable : false
				},
				{
					text : 'det_ipmbl_telp',
					dataIndex : 'det_ipmbl_telp',
					width : 100,
					sortable : false
				},
				{
					text : 'det_ipmbl_namausaha',
					dataIndex : 'det_ipmbl_namausaha',
					width : 100,
					sortable : false
				},
				{
					text : 'det_ipmbl_alamatusaha',
					dataIndex : 'det_ipmbl_alamatusaha',
					width : 100,
					sortable : false
				},
				{
					text : 'det_ipmbl_namapimpinan',
					dataIndex : 'det_ipmbl_namapimpinan',
					width : 100,
					sortable : false
				},
							
			],
			tbar : [
				ipmbl_det_addButton,
				ipmbl_det_editButton,
				ipmbl_det_deleteButton,
				ipmbl_det_gridSearchField,
				ipmbl_det_searchButton,
				ipmbl_det_refreshButton,
				ipmbl_det_printButton,
				ipmbl_det_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : ipmbl_det_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					ipmbl_det_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		det_ipmbl_idField = Ext.create('Ext.form.NumberField',{
			id : 'det_ipmbl_idField',
			name : 'det_ipmbl_id',
			fieldLabel : 'det_ipmbl_id<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		det_ipmbl_ipmbl_idField = Ext.create('Ext.form.NumberField',{
			id : 'det_ipmbl_ipmbl_idField',
			name : 'det_ipmbl_ipmbl_id',
			fieldLabel : 'det_ipmbl_ipmbl_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		det_ipmbl_namaField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_namaField',
			name : 'det_ipmbl_nama',
			fieldLabel : 'det_ipmbl_nama',
			maxLength : 50
		});
		det_ipmbl_alamatField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_alamatField',
			name : 'det_ipmbl_alamat',
			fieldLabel : 'det_ipmbl_alamat',
			maxLength : 100
		});
		det_ipmbl_kelurahanField = Ext.create('Ext.form.NumberField',{
			id : 'det_ipmbl_kelurahanField',
			name : 'det_ipmbl_kelurahan',
			fieldLabel : 'det_ipmbl_kelurahan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		det_ipmbl_kecamatanField = Ext.create('Ext.form.NumberField',{
			id : 'det_ipmbl_kecamatanField',
			name : 'det_ipmbl_kecamatan',
			fieldLabel : 'det_ipmbl_kecamatan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		det_ipmbl_kotaField = Ext.create('Ext.form.NumberField',{
			id : 'det_ipmbl_kotaField',
			name : 'det_ipmbl_kota',
			fieldLabel : 'det_ipmbl_kota',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		det_ipmbl_telpField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_telpField',
			name : 'det_ipmbl_telp',
			fieldLabel : 'det_ipmbl_telp',
			maxLength : 20
		});
		det_ipmbl_namausahaField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_namausahaField',
			name : 'det_ipmbl_namausaha',
			fieldLabel : 'det_ipmbl_namausaha',
			maxLength : 50
		});
		det_ipmbl_alamatusahaField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_alamatusahaField',
			name : 'det_ipmbl_alamatusaha',
			fieldLabel : 'det_ipmbl_alamatusaha',
			maxLength : 100
		});
		det_ipmbl_namapimpinanField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_namapimpinanField',
			name : 'det_ipmbl_namapimpinan',
			fieldLabel : 'det_ipmbl_namapimpinan',
			maxLength : 50
		});
		var ipmbl_det_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : ipmbl_det_save
		});
		var ipmbl_det_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				ipmbl_det_resetForm();
				ipmbl_det_switchToGrid();
			}
		});
		ipmbl_det_formPanel = Ext.create('Ext.form.Panel', {
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
						det_ipmbl_idField,
						det_ipmbl_ipmbl_idField,
						det_ipmbl_namaField,
						det_ipmbl_alamatField,
						det_ipmbl_kelurahanField,
						det_ipmbl_kecamatanField,
						det_ipmbl_kotaField,
						det_ipmbl_telpField,
						det_ipmbl_namausahaField,
						det_ipmbl_alamatusahaField,
						det_ipmbl_namapimpinanField,
											]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [ipmbl_det_saveButton,ipmbl_det_cancelButton]
		});
		ipmbl_det_formWindow = Ext.create('Ext.window.Window',{
			id : 'ipmbl_det_formWindow',
			renderTo : 'ipmbl_detSaveWindow',
			title : globalFormAddEditTitle + ' ' + ipmbl_det_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [ipmbl_det_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		det_ipmbl_ipmbl_idSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_ipmbl_ipmbl_idSearchField',
			name : 'det_ipmbl_ipmbl_id',
			fieldLabel : 'det_ipmbl_ipmbl_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_ipmbl_namaSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_namaSearchField',
			name : 'det_ipmbl_nama',
			fieldLabel : 'det_ipmbl_nama',
			maxLength : 50
		
		});
		det_ipmbl_alamatSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_alamatSearchField',
			name : 'det_ipmbl_alamat',
			fieldLabel : 'det_ipmbl_alamat',
			maxLength : 100
		
		});
		det_ipmbl_kelurahanSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_ipmbl_kelurahanSearchField',
			name : 'det_ipmbl_kelurahan',
			fieldLabel : 'det_ipmbl_kelurahan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_ipmbl_kecamatanSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_ipmbl_kecamatanSearchField',
			name : 'det_ipmbl_kecamatan',
			fieldLabel : 'det_ipmbl_kecamatan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_ipmbl_kotaSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_ipmbl_kotaSearchField',
			name : 'det_ipmbl_kota',
			fieldLabel : 'det_ipmbl_kota',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_ipmbl_telpSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_telpSearchField',
			name : 'det_ipmbl_telp',
			fieldLabel : 'det_ipmbl_telp',
			maxLength : 20
		
		});
		det_ipmbl_namausahaSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_namausahaSearchField',
			name : 'det_ipmbl_namausaha',
			fieldLabel : 'det_ipmbl_namausaha',
			maxLength : 50
		
		});
		det_ipmbl_alamatusahaSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_alamatusahaSearchField',
			name : 'det_ipmbl_alamatusaha',
			fieldLabel : 'det_ipmbl_alamatusaha',
			maxLength : 100
		
		});
		det_ipmbl_namapimpinanSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_namapimpinanSearchField',
			name : 'det_ipmbl_namapimpinan',
			fieldLabel : 'det_ipmbl_namapimpinan',
			maxLength : 50
		
		});
		var ipmbl_det_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : ipmbl_det_search
		});
		var ipmbl_det_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				ipmbl_det_searchWindow.hide();
			}
		});
		ipmbl_det_searchPanel = Ext.create('Ext.form.Panel', {
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
						det_ipmbl_ipmbl_idSearchField,
						det_ipmbl_namaSearchField,
						det_ipmbl_alamatSearchField,
						det_ipmbl_kelurahanSearchField,
						det_ipmbl_kecamatanSearchField,
						det_ipmbl_kotaSearchField,
						det_ipmbl_telpSearchField,
						det_ipmbl_namausahaSearchField,
						det_ipmbl_alamatusahaSearchField,
						det_ipmbl_namapimpinanSearchField,
						]
				}],
			buttons : [ipmbl_det_searchingButton,ipmbl_det_cancelSearchButton]
		});
		ipmbl_det_searchWindow = Ext.create('Ext.window.Window',{
			id : 'ipmbl_det_searchWindow',
			renderTo : 'ipmbl_detSearchWindow',
			title : globalFormSearchTitle + ' ' + ipmbl_det_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [ipmbl_det_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="ipmbl_detSaveWindow"></div>
<div id="ipmbl_detSearchWindow"></div>
<div class="span12" id="ipmbl_detGrid"></div>