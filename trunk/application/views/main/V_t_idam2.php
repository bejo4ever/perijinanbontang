<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var componentItemTitle="IDAM";
		var idam_dataStore;
		
		var idam_shorcut;
		var idam_contextMenu;
		var idam_gridSearchField;
		var idam_gridPanel;
		var idam_formPanel;
		var idam_formWindow;
		var idam_searchPanel;
		var idam_searchWindow;
		
		var idam_idField;
		var idam_jenisField;
		var idam_tanggalField;
		var idam_statusField;
		var idam_keteranganField;
		var idam_bapField;
		var idam_baptanggalField;
		var idam_kelengkapanField;
		var idam_terimaField;
		var idam_terimatanggalField;
		var idam_usahaField;
		var idam_jenisusahaField;
		var idam_alamatField;
		var idam_sertifikatpkpField;
		var idam_nomorijinField;
		var idam_nomorurutField;
		var idam_berlakuField;
		var idam_kadaluarsaField;
				
		var idam_jenisSearchField;
		var idam_tanggalSearchField;
		var idam_statusSearchField;
		var idam_keteranganSearchField;
		var idam_bapSearchField;
		var idam_baptanggalSearchField;
		var idam_kelengkapanSearchField;
		var idam_terimaSearchField;
		var idam_terimatanggalSearchField;
		var idam_usahaSearchField;
		var idam_jenisusahaSearchField;
		var idam_alamatSearchField;
		var idam_sertifikatpkpSearchField;
		var idam_nomorijinSearchField;
		var idam_nomorurutSearchField;
		var idam_berlakuSearchField;
		var idam_kadaluarsaSearchField;
				
		var idam_dbTask = 'CREATE';
		var idam_dbTaskMessage = 'Tambah';
		var idam_dbPermission = 'CRUD';
		var idam_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start permission declaration */
		function idam_setPermission(){
			Ext.Ajax.request({
				url : 'c_public_function/getUsergroupAccessByMenuKode',
				params : {menu_kode : 'T_IDAM'},
				success : function(response){
					idam_dbPermission = response.responseText;
					
					var pattC = new RegExp("C");
					var pattU = new RegExp("U");
					var pattD = new RegExp("D");

					if(pattC.test(idam_dbPermission)==false){
						idam_addButton.setVisible(false);
					}else{
						idam_addButton.setVisible(true);
					}

					if(pattU.test(idam_dbPermission)==false){
						idam_editButton.setVisible(false);
					}else{
						idam_editButton.setVisible(true);
					}

					if(pattD.test(idam_dbPermission)==false){
						idam_deleteButton.setVisible(false);
					}else{
						idam_deleteButton.setVisible(true);
					}

					if(pattC.test(idam_dbPermission)==false && pattU.test(idam_dbPermission)==false){
						idam_saveButton.setVisible(false);
					}else{
						idam_saveButton.setVisible(true);
					}
				}
			});
		}
/* End permission declaration */
/* Start function declaration */
		function idam_switchToGrid(){
			idam_formPanel.setDisabled(true);
			idam_gridPanel.setDisabled(false);
			idam_formWindow.hide();
		}
		
		function idam_switchToForm(){
			idam_gridPanel.setDisabled(true);
			idam_formPanel.setDisabled(false);
			idam_formWindow.show();
		}
		
		function idam_confirmAdd(){
			idam_dbTask = 'CREATE';
			idam_dbTaskMessage = 'created';
			idam_resetForm();
			idam_switchToForm();
		}
		
		function idam_confirmUpdate(){
			if(idam_gridPanel.selModel.getCount() == 1) {
				idam_dbTask = 'UPDATE';
				idam_dbTaskMessage = 'updated';
				idam_switchToForm();
				idam_setForm();
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
		
		function idam_confirmDelete(){
			if(idam_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, idam_delete);
			}else if(idam_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, idam_delete);
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
		
		function idam_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(idam_dbPermission)==false && pattC.test(idam_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(idam_confirmFormValid()){
					var idam_idValue = '';
					var idam_jenisValue = '';
					var idam_tanggalValue = '';
					var idam_statusValue = '';
					var idam_keteranganValue = '';
					var idam_bapValue = '';
					var idam_baptanggalValue = '';
					var idam_kelengkapanValue = '';
					var idam_terimaValue = '';
					var idam_terimatanggalValue = '';
					var idam_usahaValue = '';
					var idam_jenisusahaValue = '';
					var idam_alamatValue = '';
					var idam_sertifikatpkpValue = '';
					var idam_nomorijinValue = '';
					var idam_nomorurutValue = '';
					var idam_berlakuValue = '';
					var idam_kadaluarsaValue = '';
										
					idam_idValue = idam_idField.getValue();
					idam_jenisValue = idam_jenisField.getValue();
					idam_tanggalValue = idam_tanggalField.getValue();
					idam_statusValue = idam_statusField.getValue();
					idam_keteranganValue = idam_keteranganField.getValue();
					idam_bapValue = idam_bapField.getValue();
					idam_baptanggalValue = idam_baptanggalField.getValue();
					idam_kelengkapanValue = idam_kelengkapanField.getValue();
					idam_terimaValue = idam_terimaField.getValue();
					idam_terimatanggalValue = idam_terimatanggalField.getValue();
					idam_usahaValue = idam_usahaField.getValue();
					idam_jenisusahaValue = idam_jenisusahaField.getValue();
					idam_alamatValue = idam_alamatField.getValue();
					idam_sertifikatpkpValue = idam_sertifikatpkpField.getValue();
					idam_nomorijinValue = idam_nomorijinField.getValue();
					idam_nomorurutValue = idam_nomorurutField.getValue();
					idam_berlakuValue = idam_berlakuField.getValue();
					idam_kadaluarsaValue = idam_kadaluarsaField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_t_idam/switchAction',
						params: {							
							idam_id : idam_idValue,
							idam_jenis : idam_jenisValue,
							idam_tanggal : idam_tanggalValue,
							idam_status : idam_statusValue,
							idam_keterangan : idam_keteranganValue,
							idam_bap : idam_bapValue,
							idam_baptanggal : idam_baptanggalValue,
							idam_kelengkapan : idam_kelengkapanValue,
							idam_terima : idam_terimaValue,
							idam_terimatanggal : idam_terimatanggalValue,
							idam_usaha : idam_usahaValue,
							idam_jenisusaha : idam_jenisusahaValue,
							idam_alamat : idam_alamatValue,
							idam_sertifikatpkp : idam_sertifikatpkpValue,
							idam_nomorijin : idam_nomorijinValue,
							idam_nomorurut : idam_nomorurutValue,
							idam_berlaku : idam_berlakuValue,
							idam_kadaluarsa : idam_kadaluarsaValue,
							action : idam_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									idam_dataStore.reload();
									idam_resetForm();
									idam_switchToGrid();
									idam_gridPanel.getSelectionModel().deselectAll();
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
		
		function idam_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(idam_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = idam_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< idam_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.idam_id);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_t_idam/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									idam_dataStore.reload();
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
		
		function idam_refresh(){
			idam_dbListAction = "GETLIST";
			idam_gridSearchField.reset();
			idam_searchPanel.getForm().reset();
			idam_dataStore.proxy.extraParams = { action : 'GETLIST' };
			idam_dataStore.proxy.extraParams.query = "";
			idam_dataStore.currentPage = 1;
			idam_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function idam_confirmFormValid(){
			return idam_formPanel.getForm().isValid();
		}
		
		function idam_resetForm(){
			idam_dbTask = 'CREATE';
			idam_dbTaskMessage = 'create';
			idam_formPanel.getForm().reset();
			idam_idField.setValue(0);
		}
		
		function idam_setForm(){
			idam_dbTask = 'UPDATE';
            idam_dbTaskMessage = 'update';
			
			var record = idam_gridPanel.getSelectionModel().getSelection()[0];
			idam_idField.setValue(record.data.idam_id);
			idam_jenisField.setValue(record.data.idam_jenis);
			idam_tanggalField.setValue(record.data.idam_tanggal);
			idam_statusField.setValue(record.data.idam_status);
			idam_keteranganField.setValue(record.data.idam_keterangan);
			idam_bapField.setValue(record.data.idam_bap);
			idam_baptanggalField.setValue(record.data.idam_baptanggal);
			idam_kelengkapanField.setValue(record.data.idam_kelengkapan);
			idam_terimaField.setValue(record.data.idam_terima);
			idam_terimatanggalField.setValue(record.data.idam_terimatanggal);
			idam_usahaField.setValue(record.data.idam_usaha);
			idam_jenisusahaField.setValue(record.data.idam_jenisusaha);
			idam_alamatField.setValue(record.data.idam_alamat);
			idam_sertifikatpkpField.setValue(record.data.idam_sertifikatpkp);
			idam_nomorijinField.setValue(record.data.idam_nomorijin);
			idam_nomorurutField.setValue(record.data.idam_nomorurut);
			idam_berlakuField.setValue(record.data.idam_berlaku);
			idam_kadaluarsaField.setValue(record.data.idam_kadaluarsa);
					}
		
		function idam_showSearchWindow(){
			idam_searchWindow.show();
		}
		
		function idam_search(){
			idam_gridSearchField.reset();
			
			var idam_jenisValue = '';
			var idam_tanggalValue = '';
			var idam_statusValue = '';
			var idam_keteranganValue = '';
			var idam_bapValue = '';
			var idam_baptanggalValue = '';
			var idam_kelengkapanValue = '';
			var idam_terimaValue = '';
			var idam_terimatanggalValue = '';
			var idam_usahaValue = '';
			var idam_jenisusahaValue = '';
			var idam_alamatValue = '';
			var idam_sertifikatpkpValue = '';
			var idam_nomorijinValue = '';
			var idam_nomorurutValue = '';
			var idam_berlakuValue = '';
			var idam_kadaluarsaValue = '';
						
			idam_jenisValue = idam_jenisSearchField.getValue();
			idam_tanggalValue = idam_tanggalSearchField.getValue();
			idam_statusValue = idam_statusSearchField.getValue();
			idam_keteranganValue = idam_keteranganSearchField.getValue();
			idam_bapValue = idam_bapSearchField.getValue();
			idam_baptanggalValue = idam_baptanggalSearchField.getValue();
			idam_kelengkapanValue = idam_kelengkapanSearchField.getValue();
			idam_terimaValue = idam_terimaSearchField.getValue();
			idam_terimatanggalValue = idam_terimatanggalSearchField.getValue();
			idam_usahaValue = idam_usahaSearchField.getValue();
			idam_jenisusahaValue = idam_jenisusahaSearchField.getValue();
			idam_alamatValue = idam_alamatSearchField.getValue();
			idam_sertifikatpkpValue = idam_sertifikatpkpSearchField.getValue();
			idam_nomorijinValue = idam_nomorijinSearchField.getValue();
			idam_nomorurutValue = idam_nomorurutSearchField.getValue();
			idam_berlakuValue = idam_berlakuSearchField.getValue();
			idam_kadaluarsaValue = idam_kadaluarsaSearchField.getValue();
			idam_dbListAction = "SEARCH";
			idam_dataStore.proxy.extraParams = { 
				idam_jenis : idam_jenisValue,
				idam_tanggal : idam_tanggalValue,
				idam_status : idam_statusValue,
				idam_keterangan : idam_keteranganValue,
				idam_bap : idam_bapValue,
				idam_baptanggal : idam_baptanggalValue,
				idam_kelengkapan : idam_kelengkapanValue,
				idam_terima : idam_terimaValue,
				idam_terimatanggal : idam_terimatanggalValue,
				idam_usaha : idam_usahaValue,
				idam_jenisusaha : idam_jenisusahaValue,
				idam_alamat : idam_alamatValue,
				idam_sertifikatpkp : idam_sertifikatpkpValue,
				idam_nomorijin : idam_nomorijinValue,
				idam_nomorurut : idam_nomorurutValue,
				idam_berlaku : idam_berlakuValue,
				idam_kadaluarsa : idam_kadaluarsaValue,
				action : 'SEARCH'
			};
			idam_dataStore.currentPage = 1;
			idam_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function idam_printExcel(outputType){
			var searchText = "";
			var idam_jenisValue = '';
			var idam_tanggalValue = '';
			var idam_statusValue = '';
			var idam_keteranganValue = '';
			var idam_bapValue = '';
			var idam_baptanggalValue = '';
			var idam_kelengkapanValue = '';
			var idam_terimaValue = '';
			var idam_terimatanggalValue = '';
			var idam_usahaValue = '';
			var idam_jenisusahaValue = '';
			var idam_alamatValue = '';
			var idam_sertifikatpkpValue = '';
			var idam_nomorijinValue = '';
			var idam_nomorurutValue = '';
			var idam_berlakuValue = '';
			var idam_kadaluarsaValue = '';
			
			if(idam_dataStore.proxy.extraParams.query!==null){searchText = idam_dataStore.proxy.extraParams.query;}
			if(idam_dataStore.proxy.extraParams.idam_jenis!==null){idam_jenisValue = idam_dataStore.proxy.extraParams.idam_jenis;}
			if(idam_dataStore.proxy.extraParams.idam_tanggal!==null){idam_tanggalValue = idam_dataStore.proxy.extraParams.idam_tanggal;}
			if(idam_dataStore.proxy.extraParams.idam_status!==null){idam_statusValue = idam_dataStore.proxy.extraParams.idam_status;}
			if(idam_dataStore.proxy.extraParams.idam_keterangan!==null){idam_keteranganValue = idam_dataStore.proxy.extraParams.idam_keterangan;}
			if(idam_dataStore.proxy.extraParams.idam_bap!==null){idam_bapValue = idam_dataStore.proxy.extraParams.idam_bap;}
			if(idam_dataStore.proxy.extraParams.idam_baptanggal!==null){idam_baptanggalValue = idam_dataStore.proxy.extraParams.idam_baptanggal;}
			if(idam_dataStore.proxy.extraParams.idam_kelengkapan!==null){idam_kelengkapanValue = idam_dataStore.proxy.extraParams.idam_kelengkapan;}
			if(idam_dataStore.proxy.extraParams.idam_terima!==null){idam_terimaValue = idam_dataStore.proxy.extraParams.idam_terima;}
			if(idam_dataStore.proxy.extraParams.idam_terimatanggal!==null){idam_terimatanggalValue = idam_dataStore.proxy.extraParams.idam_terimatanggal;}
			if(idam_dataStore.proxy.extraParams.idam_usaha!==null){idam_usahaValue = idam_dataStore.proxy.extraParams.idam_usaha;}
			if(idam_dataStore.proxy.extraParams.idam_jenisusaha!==null){idam_jenisusahaValue = idam_dataStore.proxy.extraParams.idam_jenisusaha;}
			if(idam_dataStore.proxy.extraParams.idam_alamat!==null){idam_alamatValue = idam_dataStore.proxy.extraParams.idam_alamat;}
			if(idam_dataStore.proxy.extraParams.idam_sertifikatpkp!==null){idam_sertifikatpkpValue = idam_dataStore.proxy.extraParams.idam_sertifikatpkp;}
			if(idam_dataStore.proxy.extraParams.idam_nomorijin!==null){idam_nomorijinValue = idam_dataStore.proxy.extraParams.idam_nomorijin;}
			if(idam_dataStore.proxy.extraParams.idam_nomorurut!==null){idam_nomorurutValue = idam_dataStore.proxy.extraParams.idam_nomorurut;}
			if(idam_dataStore.proxy.extraParams.idam_berlaku!==null){idam_berlakuValue = idam_dataStore.proxy.extraParams.idam_berlaku;}
			if(idam_dataStore.proxy.extraParams.idam_kadaluarsa!==null){idam_kadaluarsaValue = idam_dataStore.proxy.extraParams.idam_kadaluarsa;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_t_idam/switchAction',
				params : {
					action : outputType,
					query : searchText,
					idam_jenis : idam_jenisValue,
					idam_tanggal : idam_tanggalValue,
					idam_status : idam_statusValue,
					idam_keterangan : idam_keteranganValue,
					idam_bap : idam_bapValue,
					idam_baptanggal : idam_baptanggalValue,
					idam_kelengkapan : idam_kelengkapanValue,
					idam_terima : idam_terimaValue,
					idam_terimatanggal : idam_terimatanggalValue,
					idam_usaha : idam_usahaValue,
					idam_jenisusaha : idam_jenisusahaValue,
					idam_alamat : idam_alamatValue,
					idam_sertifikatpkp : idam_sertifikatpkpValue,
					idam_nomorijin : idam_nomorijinValue,
					idam_nomorurut : idam_nomorurutValue,
					idam_berlaku : idam_berlakuValue,
					idam_kadaluarsa : idam_kadaluarsaValue,
					currentAction : idam_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/t_idam_list.xls');
							}else{
								window.open('./print/t_idam_list.html','idamlist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		idam_dataStore = Ext.create('Ext.data.Store',{
			id : 'idam_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_idam/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'idam_id'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'idam_id', type : 'int', mapping : 'idam_id' },
				{ name : 'idam_jenis', type : 'int', mapping : 'idam_jenis' },
				{ name : 'idam_tanggal', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'idam_tanggal' },
				{ name : 'idam_status', type : 'string', mapping : 'idam_status' },
				{ name : 'idam_keterangan', type : 'string', mapping : 'idam_keterangan' },
				{ name : 'idam_bap', type : 'string', mapping : 'idam_bap' },
				{ name : 'idam_baptanggal', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'idam_baptanggal' },
				{ name : 'idam_kelengkapan', type : 'int', mapping : 'idam_kelengkapan' },
				{ name : 'idam_terima', type : 'string', mapping : 'idam_terima' },
				{ name : 'idam_terimatanggal', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'idam_terimatanggal' },
				{ name : 'idam_usaha', type : 'string', mapping : 'idam_usaha' },
				{ name : 'idam_jenisusaha', type : 'string', mapping : 'idam_jenisusaha' },
				{ name : 'idam_alamat', type : 'string', mapping : 'idam_alamat' },
				{ name : 'idam_sertifikatpkp', type : 'string', mapping : 'idam_sertifikatpkp' },
				{ name : 'idam_nomorijin', type : 'string', mapping : 'idam_nomorijin' },
				{ name : 'idam_nomorurut', type : 'int', mapping : 'idam_nomorurut' },
				{ name : 'idam_berlaku', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'idam_berlaku' },
				{ name : 'idam_kadaluarsa', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'idam_kadaluarsa' },
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		idam_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						idam_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						idam_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						idam_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						idam_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						idam_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						idam_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						idam_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						idam_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var idam_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : idam_confirmAdd
		});
		var idam_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : idam_confirmUpdate
		});
		var idam_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : idam_confirmDelete
		});
		var idam_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : idam_refresh
		});
		var idam_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : idam_showSearchWindow
		});
		var idam_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				idam_printExcel('PRINT');
			}
		});
		var idam_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				idam_printExcel('EXCEL');
			}
		});
		
		var idam_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : idam_confirmUpdate
		});
		var idam_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : idam_confirmDelete
		});
		var idam_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : idam_refresh
		});
		idam_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'idam_contextMenu',
			items: [
				idam_contextMenuEdit,idam_contextMenuDelete,'-',idam_contextMenuRefresh
			]
		});
		
		idam_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : idam_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						idam_dataStore.proxy.extraParams = { action : 'GETLIST'};
						idam_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		idam_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'idam_gridPanel',
			constrain : true,
			store : idam_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'idamGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						idam_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : idam_shorcut,
			columns : [
				{
					text : 'idam_jenis',
					dataIndex : 'idam_jenis',
					width : 100,
					sortable : false
				},
				{
					text : 'idam_tanggal',
					dataIndex : 'idam_tanggal',
					width : 100,
					sortable : false
				},
				{
					text : 'idam_status',
					dataIndex : 'idam_status',
					width : 100,
					sortable : false
				},
				{
					text : 'idam_keterangan',
					dataIndex : 'idam_keterangan',
					width : 100,
					sortable : false
				},
				{
					text : 'idam_bap',
					dataIndex : 'idam_bap',
					width : 100,
					sortable : false
				},
				{
					text : 'idam_baptanggal',
					dataIndex : 'idam_baptanggal',
					width : 100,
					sortable : false
				},
				{
					text : 'idam_kelengkapan',
					dataIndex : 'idam_kelengkapan',
					width : 100,
					sortable : false
				},
				{
					text : 'idam_terima',
					dataIndex : 'idam_terima',
					width : 100,
					sortable : false
				},
				{
					text : 'idam_terimatanggal',
					dataIndex : 'idam_terimatanggal',
					width : 100,
					sortable : false
				},
				{
					text : 'idam_usaha',
					dataIndex : 'idam_usaha',
					width : 100,
					sortable : false
				},
				{
					text : 'idam_jenisusaha',
					dataIndex : 'idam_jenisusaha',
					width : 100,
					sortable : false
				},
				{
					text : 'idam_alamat',
					dataIndex : 'idam_alamat',
					width : 100,
					sortable : false
				},
				{
					text : 'idam_sertifikatpkp',
					dataIndex : 'idam_sertifikatpkp',
					width : 100,
					sortable : false
				},
				{
					text : 'idam_nomorijin',
					dataIndex : 'idam_nomorijin',
					width : 100,
					sortable : false
				},
				{
					text : 'idam_nomorurut',
					dataIndex : 'idam_nomorurut',
					width : 100,
					sortable : false
				},
				{
					text : 'idam_berlaku',
					dataIndex : 'idam_berlaku',
					width : 100,
					sortable : false
				},
				{
					text : 'idam_kadaluarsa',
					dataIndex : 'idam_kadaluarsa',
					width : 100,
					sortable : false
				},
							
			],
			tbar : [
				idam_addButton,
				idam_editButton,
				idam_deleteButton,
				idam_gridSearchField,
				idam_searchButton,
				idam_refreshButton,
				idam_printButton,
				idam_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : idam_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					idam_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		idam_idField = Ext.create('Ext.form.NumberField',{
			id : 'idam_idField',
			name : 'idam_id',
			fieldLabel : 'idam_id<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		idam_jenisField = Ext.create('Ext.form.NumberField',{
			id : 'idam_jenisField',
			name : 'idam_jenis',
			fieldLabel : 'idam_jenis<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		idam_tanggalField = Ext.create('Ext.form.TextField',{
			id : 'idam_tanggalField',
			name : 'idam_tanggal',
			fieldLabel : 'idam_tanggal<font color=red>*</font>',
			allowBlank : false,
			maxLength : 0
		});
		idam_statusField = Ext.create('Ext.form.TextField',{
			id : 'idam_statusField',
			name : 'idam_status',
			fieldLabel : 'idam_status',
			maxLength : 50
		});
		idam_keteranganField = Ext.create('Ext.form.TextField',{
			id : 'idam_keteranganField',
			name : 'idam_keterangan',
			fieldLabel : 'idam_keterangan',
			maxLength : 255
		});
		idam_bapField = Ext.create('Ext.form.TextField',{
			id : 'idam_bapField',
			name : 'idam_bap',
			fieldLabel : 'idam_bap',
			maxLength : 50
		});
		idam_baptanggalField = Ext.create('Ext.form.TextField',{
			id : 'idam_baptanggalField',
			name : 'idam_baptanggal',
			fieldLabel : 'idam_baptanggal',
			maxLength : 0
		});
		idam_kelengkapanField = Ext.create('Ext.form.NumberField',{
			id : 'idam_kelengkapanField',
			name : 'idam_kelengkapan',
			fieldLabel : 'idam_kelengkapan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		idam_terimaField = Ext.create('Ext.form.TextField',{
			id : 'idam_terimaField',
			name : 'idam_terima',
			fieldLabel : 'idam_terima',
			maxLength : 50
		});
		idam_terimatanggalField = Ext.create('Ext.form.TextField',{
			id : 'idam_terimatanggalField',
			name : 'idam_terimatanggal',
			fieldLabel : 'idam_terimatanggal',
			maxLength : 0
		});
		idam_usahaField = Ext.create('Ext.form.TextField',{
			id : 'idam_usahaField',
			name : 'idam_usaha',
			fieldLabel : 'idam_usaha',
			maxLength : 50
		});
		idam_jenisusahaField = Ext.create('Ext.form.TextField',{
			id : 'idam_jenisusahaField',
			name : 'idam_jenisusaha',
			fieldLabel : 'idam_jenisusaha',
			maxLength : 50
		});
		idam_alamatField = Ext.create('Ext.form.TextField',{
			id : 'idam_alamatField',
			name : 'idam_alamat',
			fieldLabel : 'idam_alamat',
			maxLength : 100
		});
		idam_sertifikatpkpField = Ext.create('Ext.form.TextField',{
			id : 'idam_sertifikatpkpField',
			name : 'idam_sertifikatpkp',
			fieldLabel : 'idam_sertifikatpkp',
			maxLength : 50
		});
		idam_nomorijinField = Ext.create('Ext.form.TextField',{
			id : 'idam_nomorijinField',
			name : 'idam_nomorijin',
			fieldLabel : 'idam_nomorijin',
			maxLength : 50
		});
		idam_nomorurutField = Ext.create('Ext.form.NumberField',{
			id : 'idam_nomorurutField',
			name : 'idam_nomorurut',
			fieldLabel : 'idam_nomorurut',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		idam_berlakuField = Ext.create('Ext.form.TextField',{
			id : 'idam_berlakuField',
			name : 'idam_berlaku',
			fieldLabel : 'idam_berlaku',
			maxLength : 0
		});
		idam_kadaluarsaField = Ext.create('Ext.form.TextField',{
			id : 'idam_kadaluarsaField',
			name : 'idam_kadaluarsa',
			fieldLabel : 'idam_kadaluarsa',
			maxLength : 0
		});
		var idam_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : idam_save
		});
		var idam_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				idam_resetForm();
				idam_switchToGrid();
			}
		});
		idam_formPanel = Ext.create('Ext.form.Panel', {
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
						idam_idField,
						idam_jenisField,
						idam_tanggalField,
						idam_statusField,
						idam_keteranganField,
						idam_bapField,
						idam_baptanggalField,
						idam_kelengkapanField,
						idam_terimaField,
						idam_terimatanggalField,
						idam_usahaField,
						idam_jenisusahaField,
						idam_alamatField,
						idam_sertifikatpkpField,
						idam_nomorijinField,
						idam_nomorurutField,
						idam_berlakuField,
						idam_kadaluarsaField
					]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [idam_saveButton,idam_cancelButton]
		});
		idam_formWindow = Ext.create('Ext.window.Window',{
			id : 'idam_formWindow',
			renderTo : 'idamSaveWindow',
			title : globalFormAddEditTitle + ' ' + componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [idam_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		idam_jenisSearchField = Ext.create('Ext.form.NumberField',{
			id : 'idam_jenisSearchField',
			name : 'idam_jenis',
			fieldLabel : 'idam_jenis',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		idam_tanggalSearchField = Ext.create('Ext.form.TextField',{
			id : 'idam_tanggalSearchField',
			name : 'idam_tanggal',
			fieldLabel : 'idam_tanggal',
			maxLength : 0
		
		});
		idam_statusSearchField = Ext.create('Ext.form.TextField',{
			id : 'idam_statusSearchField',
			name : 'idam_status',
			fieldLabel : 'idam_status',
			maxLength : 50
		
		});
		idam_keteranganSearchField = Ext.create('Ext.form.TextField',{
			id : 'idam_keteranganSearchField',
			name : 'idam_keterangan',
			fieldLabel : 'idam_keterangan',
			maxLength : 255
		
		});
		idam_bapSearchField = Ext.create('Ext.form.TextField',{
			id : 'idam_bapSearchField',
			name : 'idam_bap',
			fieldLabel : 'idam_bap',
			maxLength : 50
		
		});
		idam_baptanggalSearchField = Ext.create('Ext.form.TextField',{
			id : 'idam_baptanggalSearchField',
			name : 'idam_baptanggal',
			fieldLabel : 'idam_baptanggal',
			maxLength : 0
		
		});
		idam_kelengkapanSearchField = Ext.create('Ext.form.NumberField',{
			id : 'idam_kelengkapanSearchField',
			name : 'idam_kelengkapan',
			fieldLabel : 'idam_kelengkapan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		idam_terimaSearchField = Ext.create('Ext.form.TextField',{
			id : 'idam_terimaSearchField',
			name : 'idam_terima',
			fieldLabel : 'idam_terima',
			maxLength : 50
		
		});
		idam_terimatanggalSearchField = Ext.create('Ext.form.TextField',{
			id : 'idam_terimatanggalSearchField',
			name : 'idam_terimatanggal',
			fieldLabel : 'idam_terimatanggal',
			maxLength : 0
		
		});
		idam_usahaSearchField = Ext.create('Ext.form.TextField',{
			id : 'idam_usahaSearchField',
			name : 'idam_usaha',
			fieldLabel : 'idam_usaha',
			maxLength : 50
		
		});
		idam_jenisusahaSearchField = Ext.create('Ext.form.TextField',{
			id : 'idam_jenisusahaSearchField',
			name : 'idam_jenisusaha',
			fieldLabel : 'idam_jenisusaha',
			maxLength : 50
		
		});
		idam_alamatSearchField = Ext.create('Ext.form.TextField',{
			id : 'idam_alamatSearchField',
			name : 'idam_alamat',
			fieldLabel : 'idam_alamat',
			maxLength : 100
		
		});
		idam_sertifikatpkpSearchField = Ext.create('Ext.form.TextField',{
			id : 'idam_sertifikatpkpSearchField',
			name : 'idam_sertifikatpkp',
			fieldLabel : 'idam_sertifikatpkp',
			maxLength : 50
		
		});
		idam_nomorijinSearchField = Ext.create('Ext.form.TextField',{
			id : 'idam_nomorijinSearchField',
			name : 'idam_nomorijin',
			fieldLabel : 'idam_nomorijin',
			maxLength : 50
		
		});
		idam_nomorurutSearchField = Ext.create('Ext.form.NumberField',{
			id : 'idam_nomorurutSearchField',
			name : 'idam_nomorurut',
			fieldLabel : 'idam_nomorurut',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		idam_berlakuSearchField = Ext.create('Ext.form.TextField',{
			id : 'idam_berlakuSearchField',
			name : 'idam_berlaku',
			fieldLabel : 'idam_berlaku',
			maxLength : 0
		
		});
		idam_kadaluarsaSearchField = Ext.create('Ext.form.TextField',{
			id : 'idam_kadaluarsaSearchField',
			name : 'idam_kadaluarsa',
			fieldLabel : 'idam_kadaluarsa',
			maxLength : 0
		
		});
		var idam_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : idam_search
		});
		var idam_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				idam_searchWindow.hide();
			}
		});
		idam_searchPanel = Ext.create('Ext.form.Panel', {
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
						idam_jenisSearchField,
						idam_tanggalSearchField,
						idam_statusSearchField,
						idam_keteranganSearchField,
						idam_bapSearchField,
						idam_baptanggalSearchField,
						idam_kelengkapanSearchField,
						idam_terimaSearchField,
						idam_terimatanggalSearchField,
						idam_usahaSearchField,
						idam_jenisusahaSearchField,
						idam_alamatSearchField,
						idam_sertifikatpkpSearchField,
						idam_nomorijinSearchField,
						idam_nomorurutSearchField,
						idam_berlakuSearchField,
						idam_kadaluarsaSearchField
					]
				}],
			buttons : [idam_searchingButton,idam_cancelSearchButton]
		});
		idam_searchWindow = Ext.create('Ext.window.Window',{
			id : 'idam_searchWindow',
			renderTo : 'idamSearchWindow',
			title : globalFormSearchTitle + ' ' + componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [idam_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="idamSaveWindow"></div>
<div id="idamSearchWindow"></div>
<div class="span12" id="idamGrid"></div>