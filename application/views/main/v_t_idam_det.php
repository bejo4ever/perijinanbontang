<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var idam_det_componentItemTitle="Izin Depo Air Minum";
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
		var det_idam_jenisField;
		var det_idam_tanggalField;
		var det_idam_namaField;
		var det_idam_alamatField;
		var det_idam_telpField;
		var det_idam_tempatlahirField;
		var det_idam_tanggallahirField;
		var det_idam_pendidikanField;
		var det_idam_tahunlulusField;
		var det_idam_namausahaField;
		var det_idam_jenisusahaField;
		var det_idam_alamatusahaField;
		var det_idam_nospkpField;
		var det_idam_statusField;
		var det_idam_keteranganField;
		var det_idam_bapField;
		var det_idam_baptanggalField;
		var det_idam_kelengkapanField;
		var det_idam_terimaField;
		var det_idam_terimatanggalField;
		var det_idam_skField;
		var det_idam_skurutField;
		var det_idam_berlakuField;
		var det_idam_kadaluarsaField;
		var det_idam_nomorregField;
				
		var det_idam_idam_idSearchField;
		var det_idam_jenisSearchField;
		var det_idam_tanggalSearchField;
		var det_idam_namaSearchField;
		var det_idam_alamatSearchField;
		var det_idam_telpSearchField;
		var det_idam_tempatlahirSearchField;
		var det_idam_tanggallahirSearchField;
		var det_idam_pendidikanSearchField;
		var det_idam_tahunlulusSearchField;
		var det_idam_statusSearchField;
		var det_idam_keteranganSearchField;
		var det_idam_bapSearchField;
		var det_idam_baptanggalSearchField;
		var det_idam_kelengkapanSearchField;
		var det_idam_terimaSearchField;
		var det_idam_terimatanggalSearchField;
		var det_idam_skSearchField;
		var det_idam_skurutSearchField;
		var det_idam_berlakuSearchField;
		var det_idam_kadaluarsaSearchField;
		var det_idam_nomorregSearchField;
				
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
					var det_idam_jenisValue = '';
					var det_idam_tanggalValue = '';
					var det_idam_namaValue = '';
					var det_idam_alamatValue = '';
					var det_idam_telpValue = '';
					var det_idam_tempatlahirValue = '';
					var det_idam_tanggallahirValue = '';
					var det_idam_pendidikanValue = '';
					var det_idam_tahunlulusValue = '';
					var det_idam_namausahaValue = '';
					var det_idam_jenisusahaValue = '';
					var det_idam_alamatusahaValue = '';
					var det_idam_nospkpValue = '';
					var det_idam_statusValue = '';
					var det_idam_keteranganValue = '';
					var det_idam_bapValue = '';
					var det_idam_baptanggalValue = '';
					var det_idam_kelengkapanValue = '';
					var det_idam_terimaValue = '';
					var det_idam_terimatanggalValue = '';
					var det_idam_skValue = '';
					var det_idam_skurutValue = '';
					var det_idam_berlakuValue = '';
					var det_idam_kadaluarsaValue = '';
					var det_idam_nomorregValue = '';
										
					det_idam_idValue = det_idam_idField.getValue();
					det_idam_idam_idValue = det_idam_idam_idField.getValue();
					det_idam_jenisValue = det_idam_jenisField.getValue();
					det_idam_tanggalValue = det_idam_tanggalField.getValue();
					det_idam_namaValue = det_idam_namaField.getValue();
					det_idam_alamatValue = det_idam_alamatField.getValue();
					det_idam_telpValue = det_idam_telpField.getValue();
					det_idam_tempatlahirValue = det_idam_tempatlahirField.getValue();
					det_idam_tanggallahirValue = det_idam_tanggallahirField.getValue();
					det_idam_pendidikanValue = det_idam_pendidikanField.getValue();
					det_idam_tahunlulusValue = det_idam_tahunlulusField.getValue();
					det_idam_namausahaValue = det_idam_namausahaField.getValue();
					det_idam_jenisusahaValue = det_idam_jenisusahaField.getValue();
					det_idam_alamatusahaValue = det_idam_alamatusahaField.getValue();
					det_idam_nospkpValue = det_idam_nospkpField.getValue();
					det_idam_statusValue = det_idam_statusField.getValue();
					det_idam_keteranganValue = det_idam_keteranganField.getValue();
					det_idam_bapValue = det_idam_bapField.getValue();
					det_idam_baptanggalValue = det_idam_baptanggalField.getValue();
					det_idam_kelengkapanValue = det_idam_kelengkapanField.getValue();
					det_idam_terimaValue = det_idam_terimaField.getValue();
					det_idam_terimatanggalValue = det_idam_terimatanggalField.getValue();
					det_idam_skValue = det_idam_skField.getValue();
					det_idam_skurutValue = det_idam_skurutField.getValue();
					det_idam_berlakuValue = det_idam_berlakuField.getValue();
					det_idam_kadaluarsaValue = det_idam_kadaluarsaField.getValue();
					det_idam_nomorregValue = det_idam_nomorregField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_t_idam_det/switchAction',
						params: {							
							det_idam_id : det_idam_idValue,
							det_idam_idam_id : det_idam_idam_idValue,
							det_idam_jenis : det_idam_jenisValue,
							det_idam_tanggal : det_idam_tanggalValue,
							det_idam_nama : det_idam_namaValue,
							det_idam_alamat : det_idam_alamatValue,
							det_idam_telp : det_idam_telpValue,
							det_idam_tempatlahir : det_idam_tempatlahirValue,
							det_idam_tanggallahir : det_idam_tanggallahirValue,
							det_idam_pendidikan : det_idam_pendidikanValue,
							det_idam_tahunlulus : det_idam_tahunlulusValue,
							det_idam_namausaha : det_idam_namausahaValue,
							det_idam_jenisusaha : det_idam_jenisusahaValue,
							det_idam_alamatusaha : det_idam_alamatusahaValue,
							det_idam_nospkp : det_idam_nospkpValue,
							det_idam_status : det_idam_statusValue,
							det_idam_keterangan : det_idam_keteranganValue,
							det_idam_bap : det_idam_bapValue,
							det_idam_baptanggal : det_idam_baptanggalValue,
							det_idam_kelengkapan : det_idam_kelengkapanValue,
							det_idam_terima : det_idam_terimaValue,
							det_idam_terimatanggal : det_idam_terimatanggalValue,
							det_idam_sk : det_idam_skValue,
							det_idam_skurut : det_idam_skurutValue,
							det_idam_berlaku : det_idam_berlakuValue,
							det_idam_kadaluarsa : det_idam_kadaluarsaValue,
							det_idam_nomorreg : det_idam_nomorregValue,
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
			det_idam_jenisField.setValue(record.data.det_idam_jenis);
			det_idam_tanggalField.setValue(record.data.det_idam_tanggal);
			det_idam_namaField.setValue(record.data.det_idam_nama);
			det_idam_alamatField.setValue(record.data.det_idam_alamat);
			det_idam_telpField.setValue(record.data.det_idam_telp);
			det_idam_tempatlahirField.setValue(record.data.det_idam_tempatlahir);
			det_idam_tanggallahirField.setValue(record.data.det_idam_tanggallahir);
			det_idam_pendidikanField.setValue(record.data.det_idam_pendidikan);
			det_idam_tahunlulusField.setValue(record.data.det_idam_tahunlulus);
			det_idam_namausahaField.setValue(record.data.det_idam_namausaha);
			det_idam_jenisusahaField.setValue(record.data.det_idam_jenisusaha);
			det_idam_alamatusahaField.setValue(record.data.det_idam_alamatusaha);
			det_idam_nospkpField.setValue(record.data.det_idam_nospkp);
			det_idam_statusField.setValue(record.data.det_idam_status);
			det_idam_keteranganField.setValue(record.data.det_idam_keterangan);
			det_idam_bapField.setValue(record.data.det_idam_bap);
			det_idam_baptanggalField.setValue(record.data.det_idam_baptanggal);
			det_idam_kelengkapanField.setValue(record.data.det_idam_kelengkapan);
			det_idam_terimaField.setValue(record.data.det_idam_terima);
			det_idam_terimatanggalField.setValue(record.data.det_idam_terimatanggal);
			det_idam_skField.setValue(record.data.det_idam_sk);
			det_idam_skurutField.setValue(record.data.det_idam_skurut);
			det_idam_berlakuField.setValue(record.data.det_idam_berlaku);
			det_idam_kadaluarsaField.setValue(record.data.det_idam_kadaluarsa);
			det_idam_nomorregField.setValue(record.data.det_idam_nomorreg);
					}
		
		function idam_det_showSearchWindow(){
			idam_det_searchWindow.show();
		}
		
		function idam_det_search(){
			idam_det_gridSearchField.reset();
			
			var det_idam_idam_idValue = '';
			var det_idam_jenisValue = '';
			var det_idam_tanggalValue = '';
			var det_idam_namaValue = '';
			var det_idam_alamatValue = '';
			var det_idam_telpValue = '';
			var det_idam_tempatlahirValue = '';
			var det_idam_tanggallahirValue = '';
			var det_idam_pendidikanValue = '';
			var det_idam_tahunlulusValue = '';
			var det_idam_statusValue = '';
			var det_idam_keteranganValue = '';
			var det_idam_bapValue = '';
			var det_idam_baptanggalValue = '';
			var det_idam_kelengkapanValue = '';
			var det_idam_terimaValue = '';
			var det_idam_terimatanggalValue = '';
			var det_idam_skValue = '';
			var det_idam_skurutValue = '';
			var det_idam_berlakuValue = '';
			var det_idam_kadaluarsaValue = '';
			var det_idam_nomorregValue = '';
						
			det_idam_idam_idValue = det_idam_idam_idSearchField.getValue();
			det_idam_jenisValue = det_idam_jenisSearchField.getValue();
			det_idam_tanggalValue = det_idam_tanggalSearchField.getValue();
			det_idam_namaValue = det_idam_namaSearchField.getValue();
			det_idam_alamatValue = det_idam_alamatSearchField.getValue();
			det_idam_telpValue = det_idam_telpSearchField.getValue();
			det_idam_tempatlahirValue = det_idam_tempatlahirSearchField.getValue();
			det_idam_tanggallahirValue = det_idam_tanggallahirSearchField.getValue();
			det_idam_pendidikanValue = det_idam_pendidikanSearchField.getValue();
			det_idam_tahunlulusValue = det_idam_tahunlulusSearchField.getValue();
			det_idam_statusValue = det_idam_statusSearchField.getValue();
			det_idam_keteranganValue = det_idam_keteranganSearchField.getValue();
			det_idam_bapValue = det_idam_bapSearchField.getValue();
			det_idam_baptanggalValue = det_idam_baptanggalSearchField.getValue();
			det_idam_kelengkapanValue = det_idam_kelengkapanSearchField.getValue();
			det_idam_terimaValue = det_idam_terimaSearchField.getValue();
			det_idam_terimatanggalValue = det_idam_terimatanggalSearchField.getValue();
			det_idam_skValue = det_idam_skSearchField.getValue();
			det_idam_skurutValue = det_idam_skurutSearchField.getValue();
			det_idam_berlakuValue = det_idam_berlakuSearchField.getValue();
			det_idam_kadaluarsaValue = det_idam_kadaluarsaSearchField.getValue();
			det_idam_nomorregValue = det_idam_nomorregSearchField.getValue();
			idam_det_dbListAction = "SEARCH";
			idam_det_dataStore.proxy.extraParams = { 
				det_idam_idam_id : det_idam_idam_idValue,
				det_idam_jenis : det_idam_jenisValue,
				det_idam_tanggal : det_idam_tanggalValue,
				det_idam_nama : det_idam_namaValue,
				det_idam_alamat : det_idam_alamatValue,
				det_idam_telp : det_idam_telpValue,
				det_idam_tempatlahir : det_idam_tempatlahirValue,
				det_idam_tanggallahir : det_idam_tanggallahirValue,
				det_idam_pendidikan : det_idam_pendidikanValue,
				det_idam_tahunlulus : det_idam_tahunlulusValue,
				det_idam_status : det_idam_statusValue,
				det_idam_keterangan : det_idam_keteranganValue,
				det_idam_bap : det_idam_bapValue,
				det_idam_baptanggal : det_idam_baptanggalValue,
				det_idam_kelengkapan : det_idam_kelengkapanValue,
				det_idam_terima : det_idam_terimaValue,
				det_idam_terimatanggal : det_idam_terimatanggalValue,
				det_idam_sk : det_idam_skValue,
				det_idam_skurut : det_idam_skurutValue,
				det_idam_berlaku : det_idam_berlakuValue,
				det_idam_kadaluarsa : det_idam_kadaluarsaValue,
				det_idam_nomorreg : det_idam_nomorregValue,
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
			var det_idam_jenisValue = '';
			var det_idam_tanggalValue = '';
			var det_idam_namaValue = '';
			var det_idam_alamatValue = '';
			var det_idam_telpValue = '';
			var det_idam_tempatlahirValue = '';
			var det_idam_tanggallahirValue = '';
			var det_idam_pendidikanValue = '';
			var det_idam_tahunlulusValue = '';
			var det_idam_statusValue = '';
			var det_idam_keteranganValue = '';
			var det_idam_bapValue = '';
			var det_idam_baptanggalValue = '';
			var det_idam_kelengkapanValue = '';
			var det_idam_terimaValue = '';
			var det_idam_terimatanggalValue = '';
			var det_idam_skValue = '';
			var det_idam_skurutValue = '';
			var det_idam_berlakuValue = '';
			var det_idam_kadaluarsaValue = '';
			var det_idam_nomorregValue = '';
			
			if(idam_det_dataStore.proxy.extraParams.query!==null){searchText = idam_det_dataStore.proxy.extraParams.query;}
			if(idam_det_dataStore.proxy.extraParams.det_idam_idam_id!==null){det_idam_idam_idValue = idam_det_dataStore.proxy.extraParams.det_idam_idam_id;}
			if(idam_det_dataStore.proxy.extraParams.det_idam_jenis!==null){det_idam_jenisValue = idam_det_dataStore.proxy.extraParams.det_idam_jenis;}
			if(idam_det_dataStore.proxy.extraParams.det_idam_tanggal!==null){det_idam_tanggalValue = idam_det_dataStore.proxy.extraParams.det_idam_tanggal;}
			if(idam_det_dataStore.proxy.extraParams.det_idam_nama!==null){det_idam_namaValue = idam_det_dataStore.proxy.extraParams.det_idam_nama;}
			if(idam_det_dataStore.proxy.extraParams.det_idam_alamat!==null){det_idam_alamatValue = idam_det_dataStore.proxy.extraParams.det_idam_alamat;}
			if(idam_det_dataStore.proxy.extraParams.det_idam_telp!==null){det_idam_telpValue = idam_det_dataStore.proxy.extraParams.det_idam_telp;}
			if(idam_det_dataStore.proxy.extraParams.det_idam_tempatlahir!==null){det_idam_tempatlahirValue = idam_det_dataStore.proxy.extraParams.det_idam_tempatlahir;}
			if(idam_det_dataStore.proxy.extraParams.det_idam_tanggallahir!==null){det_idam_tanggallahirValue = idam_det_dataStore.proxy.extraParams.det_idam_tanggallahir;}
			if(idam_det_dataStore.proxy.extraParams.det_idam_pendidikan!==null){det_idam_pendidikanValue = idam_det_dataStore.proxy.extraParams.det_idam_pendidikan;}
			if(idam_det_dataStore.proxy.extraParams.det_idam_tahunlulus!==null){det_idam_tahunlulusValue = idam_det_dataStore.proxy.extraParams.det_idam_tahunlulus;}
			if(idam_det_dataStore.proxy.extraParams.det_idam_status!==null){det_idam_statusValue = idam_det_dataStore.proxy.extraParams.det_idam_status;}
			if(idam_det_dataStore.proxy.extraParams.det_idam_keterangan!==null){det_idam_keteranganValue = idam_det_dataStore.proxy.extraParams.det_idam_keterangan;}
			if(idam_det_dataStore.proxy.extraParams.det_idam_bap!==null){det_idam_bapValue = idam_det_dataStore.proxy.extraParams.det_idam_bap;}
			if(idam_det_dataStore.proxy.extraParams.det_idam_baptanggal!==null){det_idam_baptanggalValue = idam_det_dataStore.proxy.extraParams.det_idam_baptanggal;}
			if(idam_det_dataStore.proxy.extraParams.det_idam_kelengkapan!==null){det_idam_kelengkapanValue = idam_det_dataStore.proxy.extraParams.det_idam_kelengkapan;}
			if(idam_det_dataStore.proxy.extraParams.det_idam_terima!==null){det_idam_terimaValue = idam_det_dataStore.proxy.extraParams.det_idam_terima;}
			if(idam_det_dataStore.proxy.extraParams.det_idam_terimatanggal!==null){det_idam_terimatanggalValue = idam_det_dataStore.proxy.extraParams.det_idam_terimatanggal;}
			if(idam_det_dataStore.proxy.extraParams.det_idam_sk!==null){det_idam_skValue = idam_det_dataStore.proxy.extraParams.det_idam_sk;}
			if(idam_det_dataStore.proxy.extraParams.det_idam_skurut!==null){det_idam_skurutValue = idam_det_dataStore.proxy.extraParams.det_idam_skurut;}
			if(idam_det_dataStore.proxy.extraParams.det_idam_berlaku!==null){det_idam_berlakuValue = idam_det_dataStore.proxy.extraParams.det_idam_berlaku;}
			if(idam_det_dataStore.proxy.extraParams.det_idam_kadaluarsa!==null){det_idam_kadaluarsaValue = idam_det_dataStore.proxy.extraParams.det_idam_kadaluarsa;}
			if(idam_det_dataStore.proxy.extraParams.det_idam_nomorreg!==null){det_idam_nomorregValue = idam_det_dataStore.proxy.extraParams.det_idam_nomorreg;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_t_idam_det/switchAction',
				params : {
					action : outputType,
					query : searchText,
					det_idam_idam_id : det_idam_idam_idValue,
					det_idam_jenis : det_idam_jenisValue,
					det_idam_tanggal : det_idam_tanggalValue,
					det_idam_nama : det_idam_namaValue,
					det_idam_alamat : det_idam_alamatValue,
					det_idam_telp : det_idam_telpValue,
					det_idam_tempatlahir : det_idam_tempatlahirValue,
					det_idam_tanggallahir : det_idam_tanggallahirValue,
					det_idam_pendidikan : det_idam_pendidikanValue,
					det_idam_tahunlulus : det_idam_tahunlulusValue,
					det_idam_status : det_idam_statusValue,
					det_idam_keterangan : det_idam_keteranganValue,
					det_idam_bap : det_idam_bapValue,
					det_idam_baptanggal : det_idam_baptanggalValue,
					det_idam_kelengkapan : det_idam_kelengkapanValue,
					det_idam_terima : det_idam_terimaValue,
					det_idam_terimatanggal : det_idam_terimatanggalValue,
					det_idam_sk : det_idam_skValue,
					det_idam_skurut : det_idam_skurutValue,
					det_idam_berlaku : det_idam_berlakuValue,
					det_idam_kadaluarsa : det_idam_kadaluarsaValue,
					det_idam_nomorreg : det_idam_nomorregValue,
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
				{ name : 'det_idam_jenis', type : 'int', mapping : 'det_idam_jenis' },
				{ name : 'det_idam_tanggal', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'det_idam_tanggal' },
				{ name : 'det_idam_nama', type : 'string', mapping : 'det_idam_nama' },
				{ name : 'det_idam_alamat', type : 'string', mapping : 'det_idam_alamat' },
				{ name : 'det_idam_telp', type : 'string', mapping : 'det_idam_telp' },
				{ name : 'det_idam_tempatlahir', type : 'string', mapping : 'det_idam_tempatlahir' },
				{ name : 'det_idam_tanggallahir', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'det_idam_tanggallahir' },
				{ name : 'det_idam_pendidikan', type : 'string', mapping : 'det_idam_pendidikan' },
				{ name : 'det_idam_tahunlulus', type : 'int', mapping : 'det_idam_tahunlulus' },
				{ name : 'det_idam_status', type : 'string', mapping : 'det_idam_status' },
				{ name : 'det_idam_keterangan', type : 'string', mapping : 'det_idam_keterangan' },
				{ name : 'det_idam_bap', type : 'string', mapping : 'det_idam_bap' },
				{ name : 'det_idam_baptanggal', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'det_idam_baptanggal' },
				{ name : 'det_idam_kelengkapan', type : 'int', mapping : 'det_idam_kelengkapan' },
				{ name : 'det_idam_terima', type : 'string', mapping : 'det_idam_terima' },
				{ name : 'det_idam_terimatanggal', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'det_idam_terimatanggal' },
				{ name : 'det_idam_sk', type : 'string', mapping : 'det_idam_sk' },
				{ name : 'det_idam_skurut', type : 'int', mapping : 'det_idam_skurut' },
				{ name : 'det_idam_berlaku', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'det_idam_berlaku' },
				{ name : 'det_idam_kadaluarsa', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'det_idam_kadaluarsa' },
				{ name : 'det_idam_nomorreg', type : 'string', mapping : 'det_idam_nomorreg' },
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
					text : 'Id Idam',
					dataIndex : 'det_idam_idam_id',
					width : 100,
					hidden : true,
					sortable : false
				},
				{
					text : 'Jenis',
					dataIndex : 'det_idam_jenis',
					width : 100,
					sortable : false
				},
				{
					text : 'Tanggal',
					dataIndex : 'det_idam_tanggal',
					width : 100,
					sortable : false
				},
				{
					text : 'Nama Pemohon',
					dataIndex : 'det_idam_nama',
					width : 100,
					sortable : false
				},
				{
					text : 'Alamat',
					dataIndex : 'det_idam_alamat',
					width : 100,
					sortable : false
				},
				{
					text : 'No. Telp',
					dataIndex : 'det_idam_telp',
					width : 100,
					sortable : false
				},
				{
					text : 'Tempat Lahir',
					dataIndex : 'det_idam_tempatlahir',
					width : 100,
					sortable : false
				},
				{
					text : 'Tanggal Lahir',
					dataIndex : 'det_idam_tanggallahir',
					width : 100,
					sortable : false
				},
				{
					text : 'Pendidikan',
					dataIndex : 'det_idam_pendidikan',
					width : 100,
					sortable : false
				},
				{
					text : 'Tahun Lulus',
					dataIndex : 'det_idam_tahunlulus',
					width : 100,
					sortable : false
				},
				{
					text : 'Status',
					dataIndex : 'det_idam_status',
					width : 100,
					sortable : false
				},
				{
					text : 'Keterangan',
					dataIndex : 'det_idam_keterangan',
					width : 100,
					sortable : false
				},
				{
					text : 'BAP',
					dataIndex : 'det_idam_bap',
					width : 100,
					sortable : false
				},
				{
					text : 'Tanggal BAP',
					dataIndex : 'det_idam_baptanggal',
					width : 100,
					sortable : false
				},
				{
					text : 'Kelengkapan Berkas',
					dataIndex : 'det_idam_kelengkapan',
					width : 100,
					sortable : false
				},
				{
					text : 'Penerima Berkas',
					dataIndex : 'det_idam_terima',
					width : 100,
					sortable : false
				},
				{
					text : 'Tanggal Terima',
					dataIndex : 'det_idam_terimatanggal',
					width : 100,
					sortable : false
				},
				{
					text : 'Nomor SK',
					dataIndex : 'det_idam_sk',
					width : 100,
					sortable : false
				},
				{
					text : 'No. Urut SK',
					dataIndex : 'det_idam_skurut',
					width : 100,
					sortable : false
				},
				{
					text : 'Tanggal Berlaku',
					dataIndex : 'det_idam_berlaku',
					width : 100,
					sortable : false
				},
				{
					text : 'Tanggal Kadaluarsa',
					dataIndex : 'det_idam_kadaluarsa',
					width : 100,
					sortable : false
				},
				{
					text : 'Nomor Reg',
					dataIndex : 'det_idam_nomorreg',
					width : 100,
					sortable : false
				}
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
			fieldLabel : 'Id<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		det_idam_idam_idField = Ext.create('Ext.form.NumberField',{
			id : 'det_idam_idam_idField',
			name : 'det_idam_idam_id',
			fieldLabel : 'Id Idam',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/
		});
		det_idam_jenisField = Ext.create('Ext.form.ComboBox',{
			id : 'det_idam_jenisField',
			name : 'det_idam_jenis',
			fieldLabel : 'Jenis Permohonan',
			store : new Ext.data.ArrayStore({
				fields : ['jenispermohonan_id', 'jenispermohonan_nama'],
				data : [['1','BARU'],['2','PERPANJANGAN']]
			}),
			displayField : 'jenispermohonan_nama',
			valueField : 'jenispermohonan_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true,
			listeners : {
				select : function(cmb, rec){
					if(cmb.getValue() == '2'){
						det_idam_sklamaField.show();
					}else{
						det_idam_sklamaField.hide();
					}
				}
			}
		});
		det_idam_sklamaField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_sklamaField',
			name : 'det_idam_sklama',
			fieldLabel : 'Nomor SK Lama',
			hidden : true,
			maxLength : 50
		});
		det_idam_tanggalField = Ext.create('Ext.form.field.Date',{
			id : 'det_idam_tanggalField',
			name : 'det_idam_tanggal',
			fieldLabel : 'Tanggal Permohonan <font color=red>*</font>',
			format : 'd-m-Y',
			maxValue : new Date('<?php echo date('Y-m-d').'T'.date('H:i:s'); ?>'),
			value : new Date('<?php echo date('Y-m-d').'T'.date('H:i:s'); ?>')
		});
		det_idam_namaField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_namaField',
			name : 'det_idam_nama',
			fieldLabel : 'Nama Pemohon',
			maxLength : 50
		});
		det_idam_alamatField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_alamatField',
			name : 'det_idam_alamat',
			fieldLabel : 'Alamat',
			maxLength : 100
		});
		det_idam_telpField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_telpField',
			name : 'det_idam_telp',
			fieldLabel : 'No. Telp',
			maxLength : 20
		});
		det_idam_tempatlahirField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_tempatlahirField',
			name : 'det_idam_tempatlahir',
			fieldLabel : 'Tempat Lahir',
			maxLength : 100
		});
		det_idam_tanggallahirField = Ext.create('Ext.form.field.Date',{
			id : 'det_idam_tanggallahirField',
			name : 'det_idam_tanggallahir',
			fieldLabel : 'Tanggal Lahir',
			format : 'd-m-Y',
			maxValue : new Date('<?php echo date('Y-m-d').'T'.date('H:i:s'); ?>')
		});
		det_idam_pendidikanField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_pendidikanField',
			name : 'det_idam_pendidikan',
			fieldLabel : 'Pendidikan',
			maxLength : 100
		});
		det_idam_tahunlulusField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_tahunlulusField',
			name : 'det_idam_tahunlulus',
			fieldLabel : 'Tahun Lulus',
			maxLength : 4,
			maskRe : /([0-9]+)$/
		});
		det_idam_namausahaField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_namausahaField',
			name : 'det_idam_namausaha',
			fieldLabel : 'Nama Usaha',
			maxLength : 50
		});
		det_idam_jenisusahaField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_jenisusahaField',
			name : 'det_idam_jenisusaha',
			fieldLabel : 'Jenis Usaha',
			maxLength : 50
		});
		det_idam_alamatusahaField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_alamatusahaField',
			name : 'det_idam_alamatusaha',
			fieldLabel : 'Alamat Usaha',
			maxLength : 100
		});
		det_idam_nospkpField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_nospkpField',
			name : 'det_idam_nospkp',
			fieldLabel : 'Nomor SPKP',
			maxLength : 50
		});
		det_idam_statusField = Ext.create('Ext.form.ComboBox',{
			id : 'det_idam_statusField',
			name : 'det_idam_status',
			fieldLabel : 'Status',
			store : new Ext.data.ArrayStore({
				fields : ['status_id', 'status_nama'],
				data : [['1','DISETUJUI'],['2','DITOLAK'],['3','DITANGGUHKAN']]
			}),
			displayField : 'status_nama',
			valueField : 'status_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true
		});
		det_idam_keteranganField = Ext.create('Ext.form.TextArea',{
			id : 'det_idam_keteranganField',
			name : 'det_idam_keterangan',
			fieldLabel : 'Keterangan',
			maxLength : 255
		});
		det_idam_bapField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_bapField',
			name : 'det_idam_bap',
			fieldLabel : 'Nomor BAP',
			maxLength : 50
		});
		det_idam_baptanggalField = Ext.create('Ext.form.field.Date',{
			id : 'det_idam_baptanggalField',
			name : 'det_idam_baptanggal',
			fieldLabel : 'Tanggal BAP',
			format : 'd-m-Y',
			maxValue : new Date('<?php echo date('Y-m-d').'T'.date('H:i:s'); ?>')
		});
		det_idam_kelengkapanField = Ext.create('Ext.form.ComboBox',{
			id : 'det_idam_kelengkapanField',
			name : 'det_idam_kelengkapan',
			fieldLabel : 'Kelengkapan',
			store : new Ext.data.ArrayStore({
				fields : ['kelengkapan_id', 'kelengkapan_nama'],
				data : [['1','LENGKAP'],['2','TIDAK LENGKAP']]
			}),
			displayField : 'kelengkapan_nama',
			valueField : 'kelengkapan_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true
		});
		det_idam_terimaField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_terimaField',
			name : 'det_idam_terima',
			fieldLabel : 'Penerima',
			maxLength : 50
		});
		det_idam_terimatanggalField = Ext.create('Ext.form.field.Date',{
			id : 'det_idam_terimatanggalField',
			name : 'det_idam_terimatanggal',
			fieldLabel : 'Tanggal Terima',
			format : 'd-m-Y',
			maxValue : new Date('<?php echo date('Y-m-d').'T'.date('H:i:s'); ?>')
		});
		det_idam_skField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_skField',
			name : 'det_idam_sk',
			fieldLabel : 'Nomor SK',
			maxLength : 255
		});
		det_idam_skurutField = Ext.create('Ext.form.NumberField',{
			id : 'det_idam_skurutField',
			name : 'det_idam_skurut',
			fieldLabel : 'No. Urut',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/
		});
		det_idam_berlakuField = Ext.create('Ext.form.field.Date',{
			id : 'det_idam_berlakuField',
			name : 'det_idam_berlaku',
			fieldLabel : 'Tanggal Berlaku',
			format : 'd-m-Y'
		});
		det_idam_kadaluarsaField = Ext.create('Ext.form.field.Date',{
			id : 'det_idam_kadaluarsaField',
			name : 'det_idam_kadaluarsa',
			fieldLabel : 'Tanggal Kadaluarsa',
			format : 'd-m-Y',
			minValue : new Date('<?php echo date('Y-m-d').'T'.date('H:i:s'); ?>')
		});
		det_idam_nomorregField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_nomorregField',
			name : 'det_idam_nomorreg',
			fieldLabel : 'Nomor Reg',
			maxLength : 50
		});
		idam_det_syaratDataStore = Ext.create('Ext.data.Store',{
			id : 'idam_det_syaratDataStore',
			pageSize : globalPageSize,
			autoLoad : true,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_idam_det/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETSYARAT'
				}
			}),
			fields : [
				{ name : 'idam_cek_id', type : 'int', mapping : 'idam_cek_id' },
				{ name : 'idam_cek_syarat_id', type : 'int', mapping : 'idam_cek_syarat_id' },
				{ name : 'idam_cek_idamdet_id', type : 'int', mapping : 'idam_cek_idamdet_id' },
				{ name : 'idam_cek_idam_id', type : 'int', mapping : 'idam_cek_idam_id' },
				{ name : 'idam_cek_status', type : 'boolean', mapping : 'idam_cek_status' },
				{ name : 'idam_cek_keterangan', type : 'string', mapping : 'idam_cek_keterangan' },
				{ name : 'idam_cek_syarat_nama', type : 'string', mapping : 'idam_cek_syarat_nama' }
				]
		});
		var det_idam_syaratGridEditor = new Ext.grid.plugin.CellEditing({
			clicksToEdit: 1
		});
		det_idam_syaratGrid = Ext.create('Ext.grid.Panel',{
			id : 'det_idam_syaratGrid',
			store : idam_det_syaratDataStore,
			loadMask : true,
			width : '95%',
			plugins : [
				Ext.create('Ext.grid.plugin.CellEditing', {
					clicksToEdit: 1
				})
			],
			selType: 'cellmodel',
			columns : [
				{
					text : 'Id',
					dataIndex : 'idam_cek_id',
					width : 100,
					hidden : true,
					sortable : false
				},
				{
					text : 'Syarat',
					dataIndex : 'idam_cek_syarat_nama',
					width : 100,
					sortable : false
				},
				{
					xtype: 'checkcolumn',
					text: 'Ada?',
					dataIndex: 'idam_cek_status',
					width: 55,
					stopSelection: false
				},
				{
					text : 'Keterangan',
					dataIndex : 'idam_cek_keterangan',
					width : 100,
					sortable : false,
					editor: 'textfield'
				}
			]
		});
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
			frame : true,
			layout : {
				type : 'form',
				padding : 5
			},
			defaultType : 'textfield',
			defaults : {anchor : '95%'},
			items: [
				{
					xtype : 'fieldset',
					title : '1. Data Permohonan',
					checkboxToggle : true,
					collapsible : true,
					layout :'form',
					items : [
						det_idam_idField,
						det_idam_idam_idField,
						det_idam_jenisField,
						det_idam_sklamaField,
						det_idam_tanggalField
					]
				},{
					xtype : 'fieldset',
					title : '2. Data Pemohon',
					checkboxToggle : true,
					collapsible : true,
					layout :'form',
					items : [
						det_idam_namaField,
						det_idam_alamatField,
						det_idam_telpField,
						det_idam_tempatlahirField,
						det_idam_tanggallahirField,
						det_idam_pendidikanField,
						det_idam_tahunlulusField
					]
				},{
					xtype : 'fieldset',
					title : '3. Data Usaha',
					columnWidth : 0.5,
					checkboxToggle : true,
					collapsible : true,
					layout :'form',
					items : [
						det_idam_namausahaField,
						det_idam_jenisusahaField,
						det_idam_alamatusahaField,
						det_idam_nospkpField
					]
				},{
					xtype : 'fieldset',
					title : '4. Data Kelengkapan',
					columnWidth : 0.5,
					checkboxToggle : true,
					collapsible : true,
					layout :'form',
					items : [
						det_idam_syaratGrid
					]
				},{
					xtype : 'fieldset',
					title : '5. Data Pendukung',
					columnWidth : 0.5,
					checkboxToggle : true,
					collapsible : true,
					layout :'form',
					items : [
						det_idam_statusField,
						det_idam_keteranganField,
						det_idam_bapField,
						det_idam_baptanggalField,
						det_idam_kelengkapanField,
						det_idam_terimaField,
						det_idam_terimatanggalField,
						det_idam_skField,
						det_idam_skurutField,
						det_idam_berlakuField,
						det_idam_kadaluarsaField,
						det_idam_nomorregField
					]
				},
				Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })
			],
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
			fieldLabel : 'Id Idam',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_idam_jenisSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_idam_jenisSearchField',
			name : 'det_idam_jenis',
			fieldLabel : 'Jenis',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_idam_tanggalSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_tanggalSearchField',
			name : 'det_idam_tanggal',
			fieldLabel : 'Tanggal',
			maxLength : 0
		
		});
		det_idam_namaSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_namaSearchField',
			name : 'det_idam_nama',
			fieldLabel : 'Nama',
			maxLength : 50
		
		});
		det_idam_alamatSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_alamatSearchField',
			name : 'det_idam_alamat',
			fieldLabel : 'Alamat',
			maxLength : 100
		
		});
		det_idam_telpSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_telpSearchField',
			name : 'det_idam_telp',
			fieldLabel : 'Telp',
			maxLength : 20
		
		});
		det_idam_tempatlahirSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_tempatlahirSearchField',
			name : 'det_idam_tempatlahir',
			fieldLabel : 'Tempat Lahir',
			maxLength : 100
		
		});
		det_idam_tanggallahirSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_tanggallahirSearchField',
			name : 'det_idam_tanggallahir',
			fieldLabel : 'Tanggal Lahir',
			maxLength : 0
		
		});
		det_idam_pendidikanSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_pendidikanSearchField',
			name : 'det_idam_pendidikan',
			fieldLabel : 'Pendidikan',
			maxLength : 100
		
		});
		det_idam_tahunlulusSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_idam_tahunlulusSearchField',
			name : 'det_idam_tahunlulus',
			fieldLabel : 'Tahun Lulus',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_idam_statusSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_statusSearchField',
			name : 'det_idam_status',
			fieldLabel : 'Status',
			maxLength : 50
		
		});
		det_idam_keteranganSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_keteranganSearchField',
			name : 'det_idam_keterangan',
			fieldLabel : 'Keterangan',
			maxLength : 255
		
		});
		det_idam_bapSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_bapSearchField',
			name : 'det_idam_bap',
			fieldLabel : 'BAP',
			maxLength : 50
		
		});
		det_idam_baptanggalSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_baptanggalSearchField',
			name : 'det_idam_baptanggal',
			fieldLabel : 'Tanggal BAP',
			maxLength : 0
		
		});
		det_idam_kelengkapanSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_idam_kelengkapanSearchField',
			name : 'det_idam_kelengkapan',
			fieldLabel : 'Kelengkapan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_idam_terimaSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_terimaSearchField',
			name : 'det_idam_terima',
			fieldLabel : 'Penerima',
			maxLength : 50
		
		});
		det_idam_terimatanggalSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_terimatanggalSearchField',
			name : 'det_idam_terimatanggal',
			fieldLabel : 'Tanggal Terima',
			maxLength : 0
		
		});
		det_idam_skSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_skSearchField',
			name : 'det_idam_sk',
			fieldLabel : 'SK',
			maxLength : 255
		
		});
		det_idam_skurutSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_idam_skurutSearchField',
			name : 'det_idam_skurut',
			fieldLabel : 'No. Urut SK',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_idam_berlakuSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_berlakuSearchField',
			name : 'det_idam_berlaku',
			fieldLabel : 'Tanggal Berlaku',
			maxLength : 0
		
		});
		det_idam_kadaluarsaSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_kadaluarsaSearchField',
			name : 'det_idam_kadaluarsa',
			fieldLabel : 'Tanggal Kadaluarsa',
			maxLength : 0
		
		});
		det_idam_nomorregSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_nomorregSearchField',
			name : 'det_idam_nomorreg',
			fieldLabel : 'Nomor Reg',
			maxLength : 50
		
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
						det_idam_jenisSearchField,
						det_idam_tanggalSearchField,
						det_idam_namaSearchField,
						det_idam_alamatSearchField,
						det_idam_telpSearchField,
						det_idam_tempatlahirSearchField,
						det_idam_tanggallahirSearchField,
						det_idam_pendidikanSearchField,
						det_idam_tahunlulusSearchField,
						det_idam_statusSearchField,
						det_idam_keteranganSearchField,
						det_idam_bapSearchField,
						det_idam_baptanggalSearchField,
						det_idam_kelengkapanSearchField,
						det_idam_terimaSearchField,
						det_idam_terimatanggalSearchField,
						det_idam_skSearchField,
						det_idam_skurutSearchField,
						det_idam_berlakuSearchField,
						det_idam_kadaluarsaSearchField,
						det_idam_nomorregSearchField,
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