<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var iujk_componentItemTitle="IUJK";
		var iujk_dataStore;
		
		var iujk_shorcut;
		var iujk_contextMenu;
		var iujk_gridSearchField;
		var iujk_gridPanel;
		var iujk_formPanel;
		var iujk_formWindow;
		var iujk_searchPanel;
		var iujk_searchWindow;
		
		var iujk_idField;
		var iujk_perusahaanField;
		var iujk_alamatField;
		var iujk_direkturField;
		var iujk_golonganField;
		var iujk_kualifikasiField;
		var iujk_bidangusahaField;
		var iujk_rtField;
		var iujk_rwField;
		var iujk_kelurahanField;
		var iujk_kotaField;
		var iujk_propinsiField;
		var iujk_teleponField;
		var iujk_kodeposField;
		var iujk_faxField;
		var iujk_npwpField;
				
		var iujk_perusahaanSearchField;
		var iujk_alamatSearchField;
		var iujk_direkturSearchField;
		var iujk_golonganSearchField;
		var iujk_kualifikasiSearchField;
		var iujk_bidangusahaSearchField;
		var iujk_rtSearchField;
		var iujk_rwSearchField;
		var iujk_kelurahanSearchField;
		var iujk_kotaSearchField;
		var iujk_propinsiSearchField;
		var iujk_teleponSearchField;
		var iujk_kodeposSearchField;
		var iujk_faxSearchField;
		var iujk_npwpSearchField;
				
		var iujk_dbTask = 'CREATE';
		var iujk_dbTaskMessage = 'Tambah';
		var iujk_dbPermission = 'CRUD';
		var iujk_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function iujk_switchToGrid(){
			iujk_formPanel.setDisabled(true);
			iujk_gridPanel.setDisabled(false);
			iujk_formWindow.hide();
		}
		
		function iujk_switchToForm(){
			iujk_gridPanel.setDisabled(true);
			iujk_formPanel.setDisabled(false);
			iujk_formWindow.show();
		}
		
		function iujk_confirmAdd(){
			iujk_dbTask = 'CREATE';
			iujk_dbTaskMessage = 'created';
			iujk_resetForm();
			iujk_switchToForm();
		}
		
		function iujk_confirmUpdate(){
			if(iujk_gridPanel.selModel.getCount() == 1) {
				iujk_dbTask = 'UPDATE';
				iujk_dbTaskMessage = 'updated';
				iujk_switchToForm();
				iujk_setForm();
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
		
		function iujk_confirmDelete(){
			if(iujk_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, iujk_delete);
			}else if(iujk_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, iujk_delete);
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
		
		function iujk_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(iujk_dbPermission)==false && pattC.test(iujk_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(iujk_confirmFormValid()){
					var iujk_idValue = '';
					var iujk_perusahaanValue = '';
					var iujk_alamatValue = '';
					var iujk_direkturValue = '';
					var iujk_golonganValue = '';
					var iujk_kualifikasiValue = '';
					var iujk_bidangusahaValue = '';
					var iujk_rtValue = '';
					var iujk_rwValue = '';
					var iujk_kelurahanValue = '';
					var iujk_kotaValue = '';
					var iujk_propinsiValue = '';
					var iujk_teleponValue = '';
					var iujk_kodeposValue = '';
					var iujk_faxValue = '';
					var iujk_npwpValue = '';
										
					iujk_idValue = iujk_idField.getValue();
					iujk_perusahaanValue = iujk_perusahaanField.getValue();
					iujk_alamatValue = iujk_alamatField.getValue();
					iujk_direkturValue = iujk_direkturField.getValue();
					iujk_golonganValue = iujk_golonganField.getValue();
					iujk_kualifikasiValue = iujk_kualifikasiField.getValue();
					iujk_bidangusahaValue = iujk_bidangusahaField.getValue();
					iujk_rtValue = iujk_rtField.getValue();
					iujk_rwValue = iujk_rwField.getValue();
					iujk_kelurahanValue = iujk_kelurahanField.getValue();
					iujk_kotaValue = iujk_kotaField.getValue();
					iujk_propinsiValue = iujk_propinsiField.getValue();
					iujk_teleponValue = iujk_teleponField.getValue();
					iujk_kodeposValue = iujk_kodeposField.getValue();
					iujk_faxValue = iujk_faxField.getValue();
					iujk_npwpValue = iujk_npwpField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_t_iujk/switchAction',
						params: {							
							iujk_id : iujk_idValue,
							iujk_perusahaan : iujk_perusahaanValue,
							iujk_alamat : iujk_alamatValue,
							iujk_direktur : iujk_direkturValue,
							iujk_golongan : iujk_golonganValue,
							iujk_kualifikasi : iujk_kualifikasiValue,
							iujk_bidangusaha : iujk_bidangusahaValue,
							iujk_rt : iujk_rtValue,
							iujk_rw : iujk_rwValue,
							iujk_kelurahan : iujk_kelurahanValue,
							iujk_kota : iujk_kotaValue,
							iujk_propinsi : iujk_propinsiValue,
							iujk_telepon : iujk_teleponValue,
							iujk_kodepos : iujk_kodeposValue,
							iujk_fax : iujk_faxValue,
							iujk_npwp : iujk_npwpValue,
							action : iujk_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									iujk_dataStore.reload();
									iujk_resetForm();
									iujk_switchToGrid();
									iujk_gridPanel.getSelectionModel().deselectAll();
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
		
		function iujk_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(iujk_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = iujk_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< iujk_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.iujk_id);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_t_iujk/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									iujk_dataStore.reload();
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
		
		function iujk_refresh(){
			iujk_dbListAction = "GETLIST";
			iujk_gridSearchField.reset();
			iujk_searchPanel.getForm().reset();
			iujk_dataStore.proxy.extraParams = { action : 'GETLIST' };
			iujk_dataStore.proxy.extraParams.query = "";
			iujk_dataStore.currentPage = 1;
			iujk_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function iujk_confirmFormValid(){
			return iujk_formPanel.getForm().isValid();
		}
		
		function iujk_resetForm(){
			iujk_dbTask = 'CREATE';
			iujk_dbTaskMessage = 'create';
			iujk_formPanel.getForm().reset();
			iujk_idField.setValue(0);
		}
		
		function iujk_setForm(){
			iujk_dbTask = 'UPDATE';
            iujk_dbTaskMessage = 'update';
			
			var record = iujk_gridPanel.getSelectionModel().getSelection()[0];
			iujk_idField.setValue(record.data.iujk_id);
			iujk_perusahaanField.setValue(record.data.iujk_perusahaan);
			iujk_alamatField.setValue(record.data.iujk_alamat);
			iujk_direkturField.setValue(record.data.iujk_direktur);
			iujk_golonganField.setValue(record.data.iujk_golongan);
			iujk_kualifikasiField.setValue(record.data.iujk_kualifikasi);
			iujk_bidangusahaField.setValue(record.data.iujk_bidangusaha);
			iujk_rtField.setValue(record.data.iujk_rt);
			iujk_rwField.setValue(record.data.iujk_rw);
			iujk_kelurahanField.setValue(record.data.iujk_kelurahan);
			iujk_kotaField.setValue(record.data.iujk_kota);
			iujk_propinsiField.setValue(record.data.iujk_propinsi);
			iujk_teleponField.setValue(record.data.iujk_telepon);
			iujk_kodeposField.setValue(record.data.iujk_kodepos);
			iujk_faxField.setValue(record.data.iujk_fax);
			iujk_npwpField.setValue(record.data.iujk_npwp);
					}
		
		function iujk_showSearchWindow(){
			iujk_searchWindow.show();
		}
		
		function iujk_search(){
			iujk_gridSearchField.reset();
			
			var iujk_perusahaanValue = '';
			var iujk_alamatValue = '';
			var iujk_direkturValue = '';
			var iujk_golonganValue = '';
			var iujk_kualifikasiValue = '';
			var iujk_bidangusahaValue = '';
			var iujk_rtValue = '';
			var iujk_rwValue = '';
			var iujk_kelurahanValue = '';
			var iujk_kotaValue = '';
			var iujk_propinsiValue = '';
			var iujk_teleponValue = '';
			var iujk_kodeposValue = '';
			var iujk_faxValue = '';
			var iujk_npwpValue = '';
						
			iujk_perusahaanValue = iujk_perusahaanSearchField.getValue();
			iujk_alamatValue = iujk_alamatSearchField.getValue();
			iujk_direkturValue = iujk_direkturSearchField.getValue();
			iujk_golonganValue = iujk_golonganSearchField.getValue();
			iujk_kualifikasiValue = iujk_kualifikasiSearchField.getValue();
			iujk_bidangusahaValue = iujk_bidangusahaSearchField.getValue();
			iujk_rtValue = iujk_rtSearchField.getValue();
			iujk_rwValue = iujk_rwSearchField.getValue();
			iujk_kelurahanValue = iujk_kelurahanSearchField.getValue();
			iujk_kotaValue = iujk_kotaSearchField.getValue();
			iujk_propinsiValue = iujk_propinsiSearchField.getValue();
			iujk_teleponValue = iujk_teleponSearchField.getValue();
			iujk_kodeposValue = iujk_kodeposSearchField.getValue();
			iujk_faxValue = iujk_faxSearchField.getValue();
			iujk_npwpValue = iujk_npwpSearchField.getValue();
			iujk_dbListAction = "SEARCH";
			iujk_dataStore.proxy.extraParams = { 
				iujk_perusahaan : iujk_perusahaanValue,
				iujk_alamat : iujk_alamatValue,
				iujk_direktur : iujk_direkturValue,
				iujk_golongan : iujk_golonganValue,
				iujk_kualifikasi : iujk_kualifikasiValue,
				iujk_bidangusaha : iujk_bidangusahaValue,
				iujk_rt : iujk_rtValue,
				iujk_rw : iujk_rwValue,
				iujk_kelurahan : iujk_kelurahanValue,
				iujk_kota : iujk_kotaValue,
				iujk_propinsi : iujk_propinsiValue,
				iujk_telepon : iujk_teleponValue,
				iujk_kodepos : iujk_kodeposValue,
				iujk_fax : iujk_faxValue,
				iujk_npwp : iujk_npwpValue,
				action : 'SEARCH'
			};
			iujk_dataStore.currentPage = 1;
			iujk_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function iujk_printExcel(outputType){
			var searchText = "";
			var iujk_perusahaanValue = '';
			var iujk_alamatValue = '';
			var iujk_direkturValue = '';
			var iujk_golonganValue = '';
			var iujk_kualifikasiValue = '';
			var iujk_bidangusahaValue = '';
			var iujk_rtValue = '';
			var iujk_rwValue = '';
			var iujk_kelurahanValue = '';
			var iujk_kotaValue = '';
			var iujk_propinsiValue = '';
			var iujk_teleponValue = '';
			var iujk_kodeposValue = '';
			var iujk_faxValue = '';
			var iujk_npwpValue = '';
			
			if(iujk_dataStore.proxy.extraParams.query!==null){searchText = iujk_dataStore.proxy.extraParams.query;}
			if(iujk_dataStore.proxy.extraParams.iujk_perusahaan!==null){iujk_perusahaanValue = iujk_dataStore.proxy.extraParams.iujk_perusahaan;}
			if(iujk_dataStore.proxy.extraParams.iujk_alamat!==null){iujk_alamatValue = iujk_dataStore.proxy.extraParams.iujk_alamat;}
			if(iujk_dataStore.proxy.extraParams.iujk_direktur!==null){iujk_direkturValue = iujk_dataStore.proxy.extraParams.iujk_direktur;}
			if(iujk_dataStore.proxy.extraParams.iujk_golongan!==null){iujk_golonganValue = iujk_dataStore.proxy.extraParams.iujk_golongan;}
			if(iujk_dataStore.proxy.extraParams.iujk_kualifikasi!==null){iujk_kualifikasiValue = iujk_dataStore.proxy.extraParams.iujk_kualifikasi;}
			if(iujk_dataStore.proxy.extraParams.iujk_bidangusaha!==null){iujk_bidangusahaValue = iujk_dataStore.proxy.extraParams.iujk_bidangusaha;}
			if(iujk_dataStore.proxy.extraParams.iujk_rt!==null){iujk_rtValue = iujk_dataStore.proxy.extraParams.iujk_rt;}
			if(iujk_dataStore.proxy.extraParams.iujk_rw!==null){iujk_rwValue = iujk_dataStore.proxy.extraParams.iujk_rw;}
			if(iujk_dataStore.proxy.extraParams.iujk_kelurahan!==null){iujk_kelurahanValue = iujk_dataStore.proxy.extraParams.iujk_kelurahan;}
			if(iujk_dataStore.proxy.extraParams.iujk_kota!==null){iujk_kotaValue = iujk_dataStore.proxy.extraParams.iujk_kota;}
			if(iujk_dataStore.proxy.extraParams.iujk_propinsi!==null){iujk_propinsiValue = iujk_dataStore.proxy.extraParams.iujk_propinsi;}
			if(iujk_dataStore.proxy.extraParams.iujk_telepon!==null){iujk_teleponValue = iujk_dataStore.proxy.extraParams.iujk_telepon;}
			if(iujk_dataStore.proxy.extraParams.iujk_kodepos!==null){iujk_kodeposValue = iujk_dataStore.proxy.extraParams.iujk_kodepos;}
			if(iujk_dataStore.proxy.extraParams.iujk_fax!==null){iujk_faxValue = iujk_dataStore.proxy.extraParams.iujk_fax;}
			if(iujk_dataStore.proxy.extraParams.iujk_npwp!==null){iujk_npwpValue = iujk_dataStore.proxy.extraParams.iujk_npwp;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_t_iujk/switchAction',
				params : {
					action : outputType,
					query : searchText,
					iujk_perusahaan : iujk_perusahaanValue,
					iujk_alamat : iujk_alamatValue,
					iujk_direktur : iujk_direkturValue,
					iujk_golongan : iujk_golonganValue,
					iujk_kualifikasi : iujk_kualifikasiValue,
					iujk_bidangusaha : iujk_bidangusahaValue,
					iujk_rt : iujk_rtValue,
					iujk_rw : iujk_rwValue,
					iujk_kelurahan : iujk_kelurahanValue,
					iujk_kota : iujk_kotaValue,
					iujk_propinsi : iujk_propinsiValue,
					iujk_telepon : iujk_teleponValue,
					iujk_kodepos : iujk_kodeposValue,
					iujk_fax : iujk_faxValue,
					iujk_npwp : iujk_npwpValue,
					currentAction : iujk_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/t_iujk_list.xls');
							}else{
								window.open('./print/t_iujk_list.html','iujklist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		iujk_dataStore = Ext.create('Ext.data.Store',{
			id : 'iujk_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_iujk/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'iujk_id'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'iujk_id', type : 'int', mapping : 'iujk_id' },
				{ name : 'iujk_perusahaan', type : 'string', mapping : 'iujk_perusahaan' },
				{ name : 'iujk_alamat', type : 'string', mapping : 'iujk_alamat' },
				{ name : 'iujk_direktur', type : 'string', mapping : 'iujk_direktur' },
				{ name : 'iujk_golongan', type : 'string', mapping : 'iujk_golongan' },
				{ name : 'iujk_kualifikasi', type : 'string', mapping : 'iujk_kualifikasi' },
				{ name : 'iujk_bidangusaha', type : 'string', mapping : 'iujk_bidangusaha' },
				{ name : 'iujk_rt', type : 'int', mapping : 'iujk_rt' },
				{ name : 'iujk_rw', type : 'int', mapping : 'iujk_rw' },
				{ name : 'iujk_kelurahan', type : 'int', mapping : 'iujk_kelurahan' },
				{ name : 'iujk_kota', type : 'int', mapping : 'iujk_kota' },
				{ name : 'iujk_propinsi', type : 'int', mapping : 'iujk_propinsi' },
				{ name : 'iujk_telepon', type : 'string', mapping : 'iujk_telepon' },
				{ name : 'iujk_kodepos', type : 'string', mapping : 'iujk_kodepos' },
				{ name : 'iujk_fax', type : 'string', mapping : 'iujk_fax' },
				{ name : 'iujk_npwp', type : 'string', mapping : 'iujk_npwp' },
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		iujk_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						iujk_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						iujk_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						iujk_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						iujk_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						iujk_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						iujk_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						iujk_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						iujk_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var iujk_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : iujk_confirmAdd
		});
		var iujk_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : iujk_confirmUpdate
		});
		var iujk_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : iujk_confirmDelete
		});
		var iujk_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : iujk_refresh
		});
		var iujk_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : iujk_showSearchWindow
		});
		var iujk_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				iujk_printExcel('PRINT');
			}
		});
		var iujk_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				iujk_printExcel('EXCEL');
			}
		});
		
		var iujk_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : iujk_confirmUpdate
		});
		var iujk_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : iujk_confirmDelete
		});
		var iujk_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : iujk_refresh
		});
		iujk_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'iujk_contextMenu',
			items: [
				iujk_contextMenuEdit,iujk_contextMenuDelete,'-',iujk_contextMenuRefresh
			]
		});
		
		iujk_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : iujk_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						iujk_dataStore.proxy.extraParams = { action : 'GETLIST'};
						iujk_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		iujk_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'iujk_gridPanel',
			constrain : true,
			store : iujk_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'iujkGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						iujk_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : iujk_shorcut,
			columns : [
				{
					text : 'iujk_perusahaan',
					dataIndex : 'iujk_perusahaan',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_alamat',
					dataIndex : 'iujk_alamat',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_direktur',
					dataIndex : 'iujk_direktur',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_golongan',
					dataIndex : 'iujk_golongan',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_kualifikasi',
					dataIndex : 'iujk_kualifikasi',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_bidangusaha',
					dataIndex : 'iujk_bidangusaha',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_rt',
					dataIndex : 'iujk_rt',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_rw',
					dataIndex : 'iujk_rw',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_kelurahan',
					dataIndex : 'iujk_kelurahan',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_kota',
					dataIndex : 'iujk_kota',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_propinsi',
					dataIndex : 'iujk_propinsi',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_telepon',
					dataIndex : 'iujk_telepon',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_kodepos',
					dataIndex : 'iujk_kodepos',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_fax',
					dataIndex : 'iujk_fax',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_npwp',
					dataIndex : 'iujk_npwp',
					width : 100,
					sortable : false
				},
							
			],
			tbar : [
				iujk_addButton,
				iujk_editButton,
				iujk_deleteButton,
				iujk_gridSearchField,
				iujk_searchButton,
				iujk_refreshButton,
				iujk_printButton,
				iujk_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : iujk_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					iujk_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		iujk_idField = Ext.create('Ext.form.NumberField',{
			id : 'iujk_idField',
			name : 'iujk_id',
			fieldLabel : 'iujk_id<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		iujk_perusahaanField = Ext.create('Ext.form.TextField',{
			id : 'iujk_perusahaanField',
			name : 'iujk_perusahaan',
			fieldLabel : 'iujk_perusahaan',
			maxLength : 50
		});
		iujk_alamatField = Ext.create('Ext.form.TextField',{
			id : 'iujk_alamatField',
			name : 'iujk_alamat',
			fieldLabel : 'iujk_alamat',
			maxLength : 100
		});
		iujk_direkturField = Ext.create('Ext.form.TextField',{
			id : 'iujk_direkturField',
			name : 'iujk_direktur',
			fieldLabel : 'iujk_direktur',
			maxLength : 50
		});
		iujk_golonganField = Ext.create('Ext.form.TextField',{
			id : 'iujk_golonganField',
			name : 'iujk_golongan',
			fieldLabel : 'iujk_golongan',
			maxLength : 50
		});
		iujk_kualifikasiField = Ext.create('Ext.form.TextField',{
			id : 'iujk_kualifikasiField',
			name : 'iujk_kualifikasi',
			fieldLabel : 'iujk_kualifikasi',
			maxLength : 50
		});
		iujk_bidangusahaField = Ext.create('Ext.form.TextField',{
			id : 'iujk_bidangusahaField',
			name : 'iujk_bidangusaha',
			fieldLabel : 'iujk_bidangusaha',
			maxLength : 50
		});
		iujk_rtField = Ext.create('Ext.form.NumberField',{
			id : 'iujk_rtField',
			name : 'iujk_rt',
			fieldLabel : 'iujk_rt',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		iujk_rwField = Ext.create('Ext.form.NumberField',{
			id : 'iujk_rwField',
			name : 'iujk_rw',
			fieldLabel : 'iujk_rw',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		iujk_kelurahanField = Ext.create('Ext.form.NumberField',{
			id : 'iujk_kelurahanField',
			name : 'iujk_kelurahan',
			fieldLabel : 'iujk_kelurahan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		iujk_kotaField = Ext.create('Ext.form.NumberField',{
			id : 'iujk_kotaField',
			name : 'iujk_kota',
			fieldLabel : 'iujk_kota',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		iujk_propinsiField = Ext.create('Ext.form.NumberField',{
			id : 'iujk_propinsiField',
			name : 'iujk_propinsi',
			fieldLabel : 'iujk_propinsi',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		iujk_teleponField = Ext.create('Ext.form.TextField',{
			id : 'iujk_teleponField',
			name : 'iujk_telepon',
			fieldLabel : 'iujk_telepon',
			maxLength : 20
		});
		iujk_kodeposField = Ext.create('Ext.form.TextField',{
			id : 'iujk_kodeposField',
			name : 'iujk_kodepos',
			fieldLabel : 'iujk_kodepos',
			maxLength : 7
		});
		iujk_faxField = Ext.create('Ext.form.TextField',{
			id : 'iujk_faxField',
			name : 'iujk_fax',
			fieldLabel : 'iujk_fax',
			maxLength : 20
		});
		iujk_npwpField = Ext.create('Ext.form.TextField',{
			id : 'iujk_npwpField',
			name : 'iujk_npwp',
			fieldLabel : 'iujk_npwp',
			maxLength : 50
		});
		var iujk_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : iujk_save
		});
		var iujk_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				iujk_resetForm();
				iujk_switchToGrid();
			}
		});
		iujk_formPanel = Ext.create('Ext.form.Panel', {
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
						iujk_idField,
						iujk_perusahaanField,
						iujk_alamatField,
						iujk_direkturField,
						iujk_golonganField,
						iujk_kualifikasiField,
						iujk_bidangusahaField,
						iujk_rtField,
						iujk_rwField,
						iujk_kelurahanField,
						iujk_kotaField,
						iujk_propinsiField,
						iujk_teleponField,
						iujk_kodeposField,
						iujk_faxField,
						iujk_npwpField,
											]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [iujk_saveButton,iujk_cancelButton]
		});
		iujk_formWindow = Ext.create('Ext.window.Window',{
			id : 'iujk_formWindow',
			renderTo : 'iujkSaveWindow',
			title : globalFormAddEditTitle + ' ' + iujk_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [iujk_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		iujk_perusahaanSearchField = Ext.create('Ext.form.TextField',{
			id : 'iujk_perusahaanSearchField',
			name : 'iujk_perusahaan',
			fieldLabel : 'iujk_perusahaan',
			maxLength : 50
		
		});
		iujk_alamatSearchField = Ext.create('Ext.form.TextField',{
			id : 'iujk_alamatSearchField',
			name : 'iujk_alamat',
			fieldLabel : 'iujk_alamat',
			maxLength : 100
		
		});
		iujk_direkturSearchField = Ext.create('Ext.form.TextField',{
			id : 'iujk_direkturSearchField',
			name : 'iujk_direktur',
			fieldLabel : 'iujk_direktur',
			maxLength : 50
		
		});
		iujk_golonganSearchField = Ext.create('Ext.form.TextField',{
			id : 'iujk_golonganSearchField',
			name : 'iujk_golongan',
			fieldLabel : 'iujk_golongan',
			maxLength : 50
		
		});
		iujk_kualifikasiSearchField = Ext.create('Ext.form.TextField',{
			id : 'iujk_kualifikasiSearchField',
			name : 'iujk_kualifikasi',
			fieldLabel : 'iujk_kualifikasi',
			maxLength : 50
		
		});
		iujk_bidangusahaSearchField = Ext.create('Ext.form.TextField',{
			id : 'iujk_bidangusahaSearchField',
			name : 'iujk_bidangusaha',
			fieldLabel : 'iujk_bidangusaha',
			maxLength : 50
		
		});
		iujk_rtSearchField = Ext.create('Ext.form.NumberField',{
			id : 'iujk_rtSearchField',
			name : 'iujk_rt',
			fieldLabel : 'iujk_rt',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		iujk_rwSearchField = Ext.create('Ext.form.NumberField',{
			id : 'iujk_rwSearchField',
			name : 'iujk_rw',
			fieldLabel : 'iujk_rw',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		iujk_kelurahanSearchField = Ext.create('Ext.form.NumberField',{
			id : 'iujk_kelurahanSearchField',
			name : 'iujk_kelurahan',
			fieldLabel : 'iujk_kelurahan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		iujk_kotaSearchField = Ext.create('Ext.form.NumberField',{
			id : 'iujk_kotaSearchField',
			name : 'iujk_kota',
			fieldLabel : 'iujk_kota',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		iujk_propinsiSearchField = Ext.create('Ext.form.NumberField',{
			id : 'iujk_propinsiSearchField',
			name : 'iujk_propinsi',
			fieldLabel : 'iujk_propinsi',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		iujk_teleponSearchField = Ext.create('Ext.form.TextField',{
			id : 'iujk_teleponSearchField',
			name : 'iujk_telepon',
			fieldLabel : 'iujk_telepon',
			maxLength : 20
		
		});
		iujk_kodeposSearchField = Ext.create('Ext.form.TextField',{
			id : 'iujk_kodeposSearchField',
			name : 'iujk_kodepos',
			fieldLabel : 'iujk_kodepos',
			maxLength : 7
		
		});
		iujk_faxSearchField = Ext.create('Ext.form.TextField',{
			id : 'iujk_faxSearchField',
			name : 'iujk_fax',
			fieldLabel : 'iujk_fax',
			maxLength : 20
		
		});
		iujk_npwpSearchField = Ext.create('Ext.form.TextField',{
			id : 'iujk_npwpSearchField',
			name : 'iujk_npwp',
			fieldLabel : 'iujk_npwp',
			maxLength : 50
		
		});
		var iujk_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : iujk_search
		});
		var iujk_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				iujk_searchWindow.hide();
			}
		});
		iujk_searchPanel = Ext.create('Ext.form.Panel', {
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
						iujk_perusahaanSearchField,
						iujk_alamatSearchField,
						iujk_direkturSearchField,
						iujk_golonganSearchField,
						iujk_kualifikasiSearchField,
						iujk_bidangusahaSearchField,
						iujk_rtSearchField,
						iujk_rwSearchField,
						iujk_kelurahanSearchField,
						iujk_kotaSearchField,
						iujk_propinsiSearchField,
						iujk_teleponSearchField,
						iujk_kodeposSearchField,
						iujk_faxSearchField,
						iujk_npwpSearchField,
						]
				}],
			buttons : [iujk_searchingButton,iujk_cancelSearchButton]
		});
		iujk_searchWindow = Ext.create('Ext.window.Window',{
			id : 'iujk_searchWindow',
			renderTo : 'iujkSearchWindow',
			title : globalFormSearchTitle + ' ' + iujk_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [iujk_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="iujkSaveWindow"></div>
<div id="iujkSearchWindow"></div>
<div class="span12" id="iujkGrid"></div>