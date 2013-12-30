<style>
	.checked{
		background-image:url(../assets/images/icons/check.png) !important;
	}
	.unchecked{
		background-image:url(../assets/images/icons/forward.png) !important;
	}
</style>
<h4>IZIN DEPO AIR MINUM</h4>
<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var idam_det_componentItemTitle="Izin Depo Air Minum";
		var idam_det_dataStore;
		var idam_det_syaratDataStore;
		
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
			idam_det_syaratDataStore.proxy.extraParams = { 
				currentAction : 'create',
				action : 'GETSYARAT'
			};
			idam_det_syaratDataStore.load();
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
					var det_idam_lamaValue = '';
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
					var det_idam_berlakuValue = '';
					var det_idam_kadaluarsaValue = '';
					var det_idam_nomorregValue = '';
										
					det_idam_idValue = det_idam_idField.getValue();
					det_idam_idam_idValue = det_idam_idam_idField.getValue();
					det_idam_jenisValue = det_idam_jenisField.getValue();
					det_idam_lamaValue = det_idam_sklamaField.getValue();
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
					det_idam_berlakuValue = det_idam_berlakuField.getValue();
					det_idam_kadaluarsaValue = det_idam_kadaluarsaField.getValue();
					det_idam_nomorregValue = det_idam_nomorregField.getValue();
					
					var array_idam_cek_id=new Array();
					var array_idam_cek_syarat_id=new Array();
					var array_idam_cek_status=new Array();
					var array_idam_cek_keterangan=new Array();
					
					if(idam_det_syaratDataStore.getCount() > 0){
						for(var i=0;i<idam_det_syaratDataStore.getCount();i++){
							array_idam_cek_id.push(idam_det_syaratDataStore.getAt(i).data.idam_cek_id);
							array_idam_cek_syarat_id.push(idam_det_syaratDataStore.getAt(i).data.idam_cek_syarat_id);
							array_idam_cek_status.push(idam_det_syaratDataStore.getAt(i).data.idam_cek_status);
							array_idam_cek_keterangan.push(idam_det_syaratDataStore.getAt(i).data.idam_cek_keterangan);
						}
					}
					
					var encoded_idam_cek_id = Ext.encode(array_idam_cek_id);
					var encoded_idam_cek_syarat_id = Ext.encode(array_idam_cek_syarat_id);
					var encoded_idam_cek_status = Ext.encode(array_idam_cek_status);
					var encoded_idam_cek_keterangan = Ext.encode(array_idam_cek_keterangan);
					
					var pemohon_idValue = idam_det_pemohon_idField.getValue();
					var pemohon_namaValue = idam_det_pemohon_namaField.getValue();
					var pemohon_alamatValue = idam_det_pemohon_alamatField.getValue();
					var pemohon_telpValue = idam_det_pemohon_telpField.getValue();
					var pemohon_npwpValue = idam_det_pemohon_npwpField.getValue();
					var pemohon_rtValue = idam_det_pemohon_rtField.getValue();
					var pemohon_rwValue = idam_det_pemohon_rwField.getValue();
					var pemohon_kelValue = idam_det_pemohon_kelField.getValue();
					var pemohon_kecValue = idam_det_pemohon_kecField.getValue();
					var pemohon_nikValue = idam_det_pemohon_nikField.getValue();
					var pemohon_straValue = idam_det_pemohon_straField.getValue();
					var pemohon_surattugasValue = idam_det_pemohon_surattugasField.getValue();
					var pemohon_pekerjaanValue = idam_det_pemohon_pekerjaanField.getValue();
					var pemohon_tempatlahirValue = idam_det_pemohon_tempatlahirField.getValue();
					var pemohon_tanggallahirValue = idam_det_pemohon_tanggallahirField.getValue();
					var pemohon_user_idValue = idam_det_pemohon_user_idField.getValue();
					var pemohon_pendidikanValue = idam_det_pemohon_pendidikanField.getValue();
					var pemohon_tahunlulusValue = idam_det_pemohon_tahunlulusField.getValue();
					
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_t_idam_det/switchAction',
						params: {							
							det_idam_id : det_idam_idValue,
							det_idam_idam_id : det_idam_idam_idValue,
							det_idam_jenis : det_idam_jenisValue,
							det_idam_lama : det_idam_lamaValue,
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
							det_idam_berlaku : det_idam_berlakuValue,
							det_idam_kadaluarsa : det_idam_kadaluarsaValue,
							det_idam_nomorreg : det_idam_nomorregValue,
							idam_cek_id : encoded_idam_cek_id,
							idam_cek_syarat_id : encoded_idam_cek_syarat_id,
							idam_cek_status : encoded_idam_cek_status,
							idam_cek_keterangan : encoded_idam_cek_keterangan,
							pemohon_id : pemohon_idValue,
							pemohon_nama : pemohon_namaValue,
							pemohon_alamat : pemohon_alamatValue,
							pemohon_telp : pemohon_telpValue,
							pemohon_npwp : pemohon_npwpValue,
							pemohon_rt : pemohon_rtValue,
							pemohon_rw : pemohon_rwValue,
							pemohon_kel : pemohon_kelValue,
							pemohon_kec : pemohon_kecValue,
							pemohon_nik : pemohon_nikValue,
							pemohon_stra : pemohon_straValue,
							pemohon_surattugas : pemohon_surattugasValue,
							pemohon_pekerjaan : pemohon_pekerjaanValue,
							pemohon_tempatlahir : pemohon_tempatlahirValue,
							pemohon_tanggallahir : pemohon_tanggallahirValue,
							pemohon_user_id : pemohon_user_idValue,
							pemohon_pendidikan : pemohon_pendidikanValue,
							pemohon_tahunlulus : pemohon_tahunlulusValue,
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
			window.scrollTo(0,0);
			det_idam_jenisField.enable();
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
			det_idam_berlakuField.setValue(record.data.det_idam_berlaku);
			det_idam_kadaluarsaField.setValue(record.data.det_idam_kadaluarsa);
			det_idam_nomorregField.setValue(record.data.det_idam_nomorreg);
			
			det_idam_namausahaField.setValue(record.data.idam_usaha);
			det_idam_jenisusahaField.setValue(record.data.idam_jenisusaha);
			det_idam_alamatusahaField.setValue(record.data.idam_alamat);
			det_idam_nospkpField.setValue(record.data.idam_sertifikatpkp);
			
			idam_det_pemohon_idField.setValue(record.data.pemohon_id);
			idam_det_pemohon_namaField.setValue(record.data.pemohon_nama);
			idam_det_pemohon_alamatField.setValue(record.data.pemohon_alamat);
			idam_det_pemohon_telpField.setValue(record.data.pemohon_telp);
			idam_det_pemohon_npwpField.setValue(record.data.pemohon_npwp);
			idam_det_pemohon_rtField.setValue(record.data.pemohon_rt);
			idam_det_pemohon_rwField.setValue(record.data.pemohon_rw);
			idam_det_pemohon_kelField.setValue(record.data.pemohon_kel);
			idam_det_pemohon_kecField.setValue(record.data.pemohon_kec);
			idam_det_pemohon_nikField.setValue(record.data.pemohon_nik);
			idam_det_pemohon_straField.setValue(record.data.pemohon_stra);
			idam_det_pemohon_surattugasField.setValue(record.data.pemohon_surattugas);
			idam_det_pemohon_pekerjaanField.setValue(record.data.pemohon_pekerjaan);
			idam_det_pemohon_tempatlahirField.setValue(record.data.pemohon_tempatlahir);
			idam_det_pemohon_tanggallahirField.setValue(record.data.pemohon_tanggallahir);
			idam_det_pemohon_user_idField.setValue(record.data.pemohon_user_id);
			idam_det_pemohon_pendidikanField.setValue(record.data.pemohon_pendidikan);
			idam_det_pemohon_tahunlulusField.setValue(record.data.pemohon_tahunlulus);
			
			idam_det_syaratDataStore.proxy.extraParams = { 
				idam_id : record.data.det_idam_idam_id,
				idam_det_id : record.data.det_idam_id,
				currentAction : 'update',
				action : 'GETSYARAT'
			};
			idam_det_syaratDataStore.load();
			det_idam_jenisField.disable();
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
				{ name : 'det_idam_jenis_nama', type : 'string', mapping : 'det_idam_jenis_nama' },
				{ name : 'det_idam_tanggal', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_idam_tanggal' },
				{ name : 'det_idam_status', type : 'int', mapping : 'det_idam_status' },
				{ name : 'det_idam_keterangan', type : 'string', mapping : 'det_idam_keterangan' },
				{ name : 'det_idam_bap', type : 'string', mapping : 'det_idam_bap' },
				{ name : 'det_idam_baptanggal', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_idam_baptanggal' },
				{ name : 'det_idam_kelengkapan', type : 'int', mapping : 'det_idam_kelengkapan' },
				{ name : 'det_idam_terima', type : 'string', mapping : 'det_idam_terima' },
				{ name : 'det_idam_terimatanggal', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_idam_terimatanggal' },
				{ name : 'det_idam_sk', type : 'string', mapping : 'det_idam_sk' },
				{ name : 'det_idam_berlaku', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_idam_berlaku' },
				{ name : 'det_idam_kadaluarsa', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_idam_kadaluarsa' },
				{ name : 'det_idam_nomorreg', type : 'string', mapping : 'det_idam_nomorreg' },
				{ name : 'det_idam_lulussurvey', type : 'int', mapping : 'det_idam_lulussurvey' },
				{ name : 'det_idam_proses', type : 'string', mapping : 'det_idam_proses' },
				{ name : 'idam_usaha', type : 'string', mapping : 'idam_usaha' },
				{ name : 'idam_jenisusaha', type : 'string', mapping : 'idam_jenisusaha' },
				{ name : 'idam_alamat', type : 'string', mapping : 'idam_alamat' },
				{ name : 'idam_sertifikatpkp', type : 'string', mapping : 'idam_sertifikatpkp' },
				{ name : 'lamaproses', type : 'string', mapping : 'lamaproses' },
				{ name : 'pemohon_id', type : 'int', mapping : 'pemohon_id' },
				{ name : 'pemohon_nama', type : 'string', mapping : 'pemohon_nama' },
				{ name : 'pemohon_alamat', type : 'string', mapping : 'pemohon_alamat' },
				{ name : 'pemohon_telp', type : 'string', mapping : 'pemohon_telp' },
				{ name : 'pemohon_npwp', type : 'string', mapping : 'pemohon_npwp' },
				{ name : 'pemohon_rt', type : 'int', mapping : 'pemohon_rt' },
				{ name : 'pemohon_rw', type : 'int', mapping : 'pemohon_rw' },
				{ name : 'pemohon_kel', type : 'string', mapping : 'pemohon_kel' },
				{ name : 'pemohon_kec', type : 'string', mapping : 'pemohon_kec' },
				{ name : 'pemohon_nik', type : 'string', mapping : 'pemohon_nik' },
				{ name : 'pemohon_stra', type : 'string', mapping : 'pemohon_stra' },
				{ name : 'pemohon_surattugas', type : 'string', mapping : 'pemohon_surattugas' },
				{ name : 'pemohon_pekerjaan', type : 'string', mapping : 'pemohon_pekerjaan' },
				{ name : 'pemohon_tempatlahir', type : 'string', mapping : 'pemohon_tempatlahir' },
				{ name : 'pemohon_tanggallahir', type : 'date', dateFormat : 'Y-m-d', mapping : 'pemohon_tanggallahir' },
				{ name : 'pemohon_user_id', type : 'int', mapping : 'pemohon_user_id' },
				{ name : 'pemohon_pendidikan', type : 'string', mapping : 'pemohon_pendidikan' },
				{ name : 'pemohon_tahunlulus', type : 'int', mapping : 'pemohon_tahunlulus' },
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
		/* Start ContextMenu For Action Column */
		var idam_det_bp_printCM = Ext.create('Ext.menu.Item',{
			text : 'Bukti Penerimaan',
			tooltip : 'Cetak Bukti Penerimaan',
			handler : function(){
				var record = idam_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_idam_det/switchAction',
					params: {
						idamdet_id : record.get('det_idam_id'),
						action : 'CETAKBP'
					},success : function(){
						window.open('../print/idam_buktipenerimaan.html');
					}
				});
			}
		});
		var idam_det_sk_printCM = Ext.create('Ext.menu.Item',{
			text : 'Surat Keputusan',
			tooltip : 'Cetak Surat Keputusan',
			handler : function(){
				var record = idam_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_idam_det/switchAction',
					params: {
						idamdet_id : record.get('det_idam_id'),
						action : 'CETAKSK'
					},success : function(response){
						var result = response.responseText;
						switch(result){
							case 'success':
								window.open('../print/idam_sk.html');
								break;
							case 'nosk':
								Ext.MessageBox.alert('Warning.','Nomor SK Belum ditetapkan.');
								break;
							case 'notglkadaluarsa':
								Ext.MessageBox.alert('Warning.','Tanggal kadaluarsa belum ditetapkan.');
								break;
							default:
								Ext.MessageBox.show({
									title : 'Warning',
									msg : 'Cetak gagal',
									buttons : Ext.MessageBox.OK,
									animEl : 'save',
									icon : Ext.MessageBox.WARNING
								});
							break;
						}
					}
				});
			}
		});
		var idam_det_bap_printCM = Ext.create('Ext.menu.Item',{
			text : 'Berita Acara Pemeriksaan',
			tooltip : 'Cetak Berita Acara Pemeriksaan',
			handler : function(){
				var record = idam_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_idam_det/switchAction',
					params: {
						idamdet_id : record.get('det_idam_id'),
						action : 'CETAKLEMBARKONTROL'
					},success : function(){
						window.open('../print/idam_lembarkontrol.html');
					}
				});
			}
		});
		var idam_det_lk_printCM = Ext.create('Ext.menu.Item',{
			text : 'Lembar Kontrol',
			tooltip : 'Cetak Lembar Kontrol',
			handler : function(){
				var record = idam_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_idam_det/switchAction',
					params: {
						idamdet_id : record.get('det_idam_id'),
						action : 'CETAKLEMBARKONTROL'
					},success : function(){
						window.open('../print/idam_lembarkontrol.html');
					}
				});
			}
		});
		var idam_det_printContextMenu = Ext.create('Ext.menu.Menu',{
			items: [
				idam_det_bp_printCM,idam_det_lk_printCM,idam_det_bap_printCM,idam_det_sk_printCM
			]
		});
		
		function idam_det_ubahProses(proses){
			var record = idam_det_gridPanel.getSelectionModel().getSelection()[0];
			Ext.Ajax.request({
				waitMsg: 'Please wait...',
				url: 'c_t_idam_det/switchAction',
				params: {
					idamdet_id : record.get('det_idam_id'),
					idamdet_nosk : record.get('det_idam_sk'),
					proses : proses,
					action : 'UBAHPROSES'
				},success : function(){
					idam_det_dataStore.reload();
				}
			});
		}
		
		var idam_det_prosesContextMenu = Ext.create('Ext.menu.Menu',{
			items: [
				{
					text : 'Selesai, belum diambil',
					tooltip : 'Ubah Menjadi Selesai, belum diambil',
					handler : function(){
						idam_det_ubahProses('Selesai, belum diambil');
					}
				},
				{
					text : 'Selesai, sudah diambil',
					tooltip : 'Ubah Menjadi Selesai, sudah diambil',
					handler : function(){
						idam_det_ubahProses('Selesai, sudah diambil');
					}
				},
				{
					text : 'Ditolak',
					tooltip : 'Ubah Menjadi Ditolak',
					handler : function(){
						idam_det_ubahProses('Ditolak');
					}
				}
			]
		});
		
		/* End ContextMenu For Action Column */
		idam_det_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'idam_det_gridPanel',
			constrain : true,
			store : idam_det_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'idam_detGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			multiSelect : true,
			keys : idam_det_shorcut,
			columns : [
				{
					text : 'Id Idam',
					dataIndex : 'det_idam_idam_id',
					width : 100,
					hidden : true,
					hideable: false,
					sortable : false
				},
				{
					text : 'Jenis',
					dataIndex : 'det_idam_jenis_nama',
					width : 100,
					sortable : false
				},
				{
					text : 'Tanggal',
					dataIndex : 'det_idam_tanggal',
					width : 80,
					sortable : false,
					renderer : Ext.util.Format.dateRenderer('d-m-Y')
				},
				{
					text : 'Nama Pemohon',
					dataIndex : 'pemohon_nama',
					width : 150,
					sortable : false
				},
				{
					text : 'Alamat',
					dataIndex : 'pemohon_alamat',
					width : 200,
					sortable : false
				},
				{
					text : 'No. Telp',
					dataIndex : 'pemohon_telp',
					width : 100,
					sortable : false
				},
				{
					text : 'Tempat Lahir',
					dataIndex : 'pemohon_tempatlahir',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'Tanggal Lahir',
					dataIndex : 'pemohon_tanggallahir',
					width : 100,
					sortable : false,
					renderer : Ext.util.Format.dateRenderer('d-m-Y'),
					hidden : true
				},
				{
					text : 'Pendidikan',
					dataIndex : 'pemohon_pendidikan',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'Tahun Lulus',
					dataIndex : 'pemohon_tahunlulus',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'Status',
					dataIndex : 'det_idam_status',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'Keterangan',
					dataIndex : 'det_idam_keterangan',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'BAP',
					dataIndex : 'det_idam_bap',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'Tanggal BAP',
					dataIndex : 'det_idam_baptanggal',
					width : 100,
					sortable : false,
					renderer : Ext.util.Format.dateRenderer('d-m-Y'),
					hidden : true
				},
				{
					text : 'Kelengkapan Berkas',
					dataIndex : 'det_idam_kelengkapan',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'Penerima Berkas',
					dataIndex : 'det_idam_terima',
					width : 180,
					hidden : true,
					sortable : false
				},
				{
					text : 'Tanggal Terima',
					dataIndex : 'det_idam_terimatanggal',
					width : 100,
					sortable : false,
					renderer : Ext.util.Format.dateRenderer('d-m-Y'),
					hidden : true
				},
				{
					text : 'Nomor SK',
					dataIndex : 'det_idam_sk',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'Tanggal Berlaku',
					dataIndex : 'det_idam_berlaku',
					width : 100,
					sortable : false,
					renderer : Ext.util.Format.dateRenderer('d-m-Y'),
					hidden : true
				},
				{
					text : 'Tanggal Kadaluarsa',
					dataIndex : 'det_idam_kadaluarsa',
					width : 100,
					sortable : false,
					renderer : Ext.util.Format.dateRenderer('d-m-Y'),
					hidden : true
				},
				{
					text : 'Nomor Reg',
					dataIndex : 'det_idam_nomorreg',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'Lama Proses',
					dataIndex : 'lamaproses',
					width : 100,
					sortable : false
				},
				{
					text : 'Status',
					dataIndex : 'det_idam_proses',
					width : 125,
					sortable : false
				},
				{
					xtype:'actioncolumn',
					text : 'Action',
					width:50,
					hideable: false,
					items: [{
						iconCls: 'icon16x16-edit',
						tooltip: 'Ubah Data',
						handler: function(grid, rowIndex){
							grid.getSelectionModel().select(rowIndex);
							idam_det_confirmUpdate();
						}
					},{
						iconCls: 'icon16x16-delete',
						tooltip: 'Hapus Data',
						handler: function(grid, rowIndex){
							grid.getSelectionModel().select(rowIndex);
							idam_det_confirmDelete();
						}
					}]
				},
				{
					xtype:'actioncolumn',
					width:50,
					text : 'Proses',
					hideable: false,
					items: [{
						iconCls : 'checked',
						tooltip : 'Ubah Status',
						handler: function(grid, rowIndex, colIndex, node, e) {
							e.stopEvent();
							idam_det_prosesContextMenu.showAt(e.getXY());
							return false;
						}
					}]
				},
				{
					xtype:'actioncolumn',
					text : 'Cetak',
					width:50,
					hideable: false,
					items: [{
						iconCls: 'icon16x16-print',
						tooltip: 'Cetak Dokumen',
						handler: function(grid, rowIndex, colIndex, node, e) {
							e.stopEvent();
							idam_det_printContextMenu.showAt(e.getXY());
							return false;
						}
					}]
				}
			],
			tbar : [
				idam_det_addButton,
				idam_det_gridSearchField,
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
			fieldLabel : 'Jenis',
			store : new Ext.data.ArrayStore({
				fields : ['jenispermohonan_id', 'jenispermohonan_nama'],
				data : [[1,'BARU'],[2,'PERPANJANGAN']]
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
						det_idam_namausahaField.disable();
						det_idam_jenisusahaField.disable();
						det_idam_alamatusahaField.disable();
						det_idam_nospkpField.disable();
					}else{
						det_idam_sklamaField.hide();
						det_idam_namausahaField.enable();
						det_idam_jenisusahaField.enable();
						det_idam_alamatusahaField.enable();
						det_idam_nospkpField.enable();
					}
				}
			}
		});
		det_idam_sklamaField = Ext.create('Ext.form.ComboBox',{
			name : 'det_idam_sklamaField',
			fieldLabel : 'Nomor SK Lama',
			store : idam_det_dataStore,
			displayField : 'det_idam_sk',
			valueField : 'det_idam_idam_id',
			queryMode : 'remote',
			triggerAction : 'query',
			repeatTriggerClick : true,
			minChars : 100,
			triggerCls : 'x-form-search-trigger',
			forceSelection : false,
			hidden : true,
			onTriggerClick: function(event){
				var store = det_idam_sklamaField.getStore();
				var val = det_idam_sklamaField.getRawValue();
				store.proxy.extraParams = {action : 'SEARCH',det_idam_sk : val};
				store.load();
				det_idam_sklamaField.expand();
				det_idam_sklamaField.fireEvent("ontriggerclick", this, event);
			},  
			tpl: Ext.create('Ext.XTemplate',
				'<tpl for=".">',
					'<div class="x-boundlist-item">SK : {det_idam_sk}<br>Nama Usaha : {idam_usaha}<br>Alamat : {idam_alamat}<br></div>',
				'</tpl>'
			),
			listeners : {
				select : function(cmb, record){
					var rec=record[0];
					idam_det_pemohon_idField.setValue(rec.get('pemohon_id'));
					idam_det_pemohon_nikField.setValue(rec.get('pemohon_nik'));
					idam_det_pemohon_namaField.setValue(rec.get('pemohon_nama'));
					idam_det_pemohon_alamatField.setValue(rec.get('pemohon_alamat'));
					idam_det_pemohon_telpField.setValue(rec.get('pemohon_telp'));
					idam_det_pemohon_npwpField.setValue(rec.get('pemohon_npwp'));
					idam_det_pemohon_rtField.setValue(rec.get('pemohon_rt'));
					idam_det_pemohon_rwField.setValue(rec.get('pemohon_rw'));
					idam_det_pemohon_kelField.setValue(rec.get('pemohon_kel'));
					idam_det_pemohon_kecField.setValue(rec.get('pemohon_kec'));
					idam_det_pemohon_straField.setValue(rec.get('pemohon_stra'));
					idam_det_pemohon_surattugasField.setValue(rec.get('pemohon_surattugas'));
					idam_det_pemohon_pekerjaanField.setValue(rec.get('pemohon_pekerjaan'));
					idam_det_pemohon_tempatlahirField.setValue(rec.get('pemohon_tempatlahir'));
					idam_det_pemohon_tanggallahirField.setValue(rec.get('pemohon_tanggallahir'));
					idam_det_pemohon_user_idField.setValue(rec.get('pemohon_user_id'));
					idam_det_pemohon_pendidikanField.setValue(rec.get('pemohon_pendidikan'));
					idam_det_pemohon_tahunlulusField.setValue(rec.get('pemohon_tahunlulus'));
					det_idam_namausahaField.setValue(rec.get('idam_usaha'));
					det_idam_jenisusahaField.setValue(rec.get('idam_jenisusaha'));
					det_idam_alamatusahaField.setValue(rec.get('idam_alamat'));
					det_idam_nospkpField.setValue(rec.get('idam_sertifikatpkp'));
				}
			}
		});
		det_idam_tanggalField = Ext.create('Ext.form.field.Date',{
			id : 'det_idam_tanggalField',
			name : 'det_idam_tanggal',
			fieldLabel : 'Tanggal <font color=red>*</font>',
			format : 'd-m-Y',
			disabled : true,
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
			format : 'd-m-Y'
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
				data : [[1,'DISETUJUI'],[2,'DITOLAK'],[3,'DITANGGUHKAN']]
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
			format : 'd-m-Y'
		});
		det_idam_kelengkapanField = Ext.create('Ext.form.ComboBox',{
			id : 'det_idam_kelengkapanField',
			name : 'det_idam_kelengkapan',
			fieldLabel : 'Kelengkapan',
			store : new Ext.data.ArrayStore({
				fields : ['kelengkapan_id', 'kelengkapan_nama'],
				data : [[1,'LENGKAP'],[2,'TIDAK LENGKAP']]
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
			format : 'd-m-Y'
		});
		det_idam_skField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_skField',
			name : 'det_idam_sk',
			fieldLabel : 'Nomor SK',
			maxLength : 255,
			hidden : true
		});
		det_idam_berlakuField = Ext.create('Ext.form.field.Date',{
			id : 'det_idam_berlakuField',
			name : 'det_idam_berlaku',
			fieldLabel : 'Tanggal Berlaku',
			format : 'd-m-Y',
			hidden : true
		});
		det_idam_kadaluarsaField = Ext.create('Ext.form.field.Date',{
			id : 'det_idam_kadaluarsaField',
			name : 'det_idam_kadaluarsa',
			fieldLabel : 'Kadaluarsa',
			format : 'd-m-Y'
		});
		det_idam_nomorregField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_nomorregField',
			name : 'det_idam_nomorreg',
			fieldLabel : 'Nomor Reg',
			maxLength : 50,
			hidden : true
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
			width : '100%',
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
					hideable: false,
					sortable : false
				},
				{
					text : 'Syarat',
					dataIndex : 'idam_cek_syarat_nama',
					width : 300,
					sortable : false,
					editor : {
						xtype : 'textfield',
						readOnly : true
					}
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
					editor: 'textfield',
					flex : 1
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
		/* START DATA PEMOHON */
		var idam_det_pemohon_idField = Ext.create('Ext.form.Hidden',{
			name : 'pemohon_id'
		});
		var idam_det_pemohon_namaField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_nama',
			fieldLabel : 'Nama',
			maxLength : 50
		});
		var idam_det_pemohon_alamatField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_alamat',
			fieldLabel : 'Alamat',
			maxLength : 100
		});
		var idam_det_pemohon_telpField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_telp',
			fieldLabel : 'Telp',
			maxLength : 20,
			maskRe : /([0-9]+)$/
		});
		var idam_det_pemohon_npwpField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_npwp',
			fieldLabel : 'NPWP',
			maxLength : 50
		});
		var idam_det_pemohon_rtField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_rt',
			fieldLabel : 'RT',
			maskRe : /([0-9]+)$/
		});
		var idam_det_pemohon_rwField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_rw',
			fieldLabel : 'RW',
			maskRe : /([0-9]+)$/
		});
		var idam_det_pemohon_kelField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_kel',
			fieldLabel : 'Kelurahan',
			maxLength : 50
		});
		var idam_det_pemohon_kecField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_kec',
			fieldLabel : 'Kecamatan',
			maxLength : 50
		});
		var idam_det_pemohon_nikField = Ext.create('Ext.form.ComboBox',{
			name : 'idam_det_pemohon_nik',
			fieldLabel : 'NIK',
			store : Ext.create('Ext.data.Store',{
				pageSize : globalPageSize,
				proxy : Ext.create('Ext.data.HttpProxy',{
					url : 'c_m_pemohon/switchAction',
					reader : {
						type : 'json', root : 'results', rootProperty : 'results', totalProperty : 'total', idProperty : 'pemohon_id'
					},
					actionMethods : { read : 'POST' },
					extraParams : { action : 'SEARCH' }
				}),
				fields : [
					{ name : 'pemohon_id', type : 'int', mapping : 'pemohon_id' },
					{ name : 'pemohon_nama', type : 'string', mapping : 'pemohon_nama' },
					{ name : 'pemohon_alamat', type : 'string', mapping : 'pemohon_alamat' },
					{ name : 'pemohon_telp', type : 'string', mapping : 'pemohon_telp' },
					{ name : 'pemohon_npwp', type : 'string', mapping : 'pemohon_npwp' },
					{ name : 'pemohon_rt', type : 'int', mapping : 'pemohon_rt' },
					{ name : 'pemohon_rw', type : 'int', mapping : 'pemohon_rw' },
					{ name : 'pemohon_kel', type : 'string', mapping : 'pemohon_kel' },
					{ name : 'pemohon_kec', type : 'string', mapping : 'pemohon_kec' },
					{ name : 'pemohon_nik', type : 'string', mapping : 'pemohon_nik' },
					{ name : 'pemohon_stra', type : 'string', mapping : 'pemohon_stra' },
					{ name : 'pemohon_surattugas', type : 'string', mapping : 'pemohon_surattugas' },
					{ name : 'pemohon_pekerjaan', type : 'string', mapping : 'pemohon_pekerjaan' },
					{ name : 'pemohon_tempatlahir', type : 'string', mapping : 'pemohon_tempatlahir' },
					{ name : 'pemohon_tanggallahir', type : 'date', dateFormat : 'Y-m-d', mapping : 'pemohon_tanggallahir' },
					{ name : 'pemohon_user_id', type : 'int', mapping : 'pemohon_user_id' },
					{ name : 'pemohon_pendidikan', type : 'string', mapping : 'pemohon_pendidikan' },
					{ name : 'pemohon_tahunlulus', type : 'int', mapping : 'pemohon_tahunlulus' },
				]
			}),
			displayField : 'pemohon_nik',
			valueField : 'pemohon_id',
			queryMode : 'remote',
			triggerAction : 'query',
			repeatTriggerClick : true,
			minChars : 100,
			triggerCls : 'x-form-search-trigger',
			forceSelection : false,
			onTriggerClick: function(event){
				var store = idam_det_pemohon_nikField.getStore();
				var val = idam_det_pemohon_nikField.getRawValue();
				store.proxy.extraParams = {action : 'SEARCH',pemohon_nik : val};
				store.load();
				idam_det_pemohon_nikField.expand();
				idam_det_pemohon_nikField.fireEvent("ontriggerclick", this, event);
			},  
			tpl: Ext.create('Ext.XTemplate',
				'<tpl for=".">',
					'<div class="x-boundlist-item">NIK : {pemohon_nik}<br>Nama : {pemohon_nama}<br>Alamat : {pemohon_alamat}<br>Telp : {pemohon_telp}<br></div>',
				'</tpl>'
			),
			listeners : {
				select : function(cmb, record){
					var rec=record[0];
					idam_det_pemohon_idField.setValue(rec.get('pemohon_id'));
					idam_det_pemohon_nikField.setValue(rec.get('pemohon_nik'));
					idam_det_pemohon_namaField.setValue(rec.get('pemohon_nama'));
					idam_det_pemohon_alamatField.setValue(rec.get('pemohon_alamat'));
					idam_det_pemohon_telpField.setValue(rec.get('pemohon_telp'));
					idam_det_pemohon_npwpField.setValue(rec.get('pemohon_npwp'));
					idam_det_pemohon_rtField.setValue(rec.get('pemohon_rt'));
					idam_det_pemohon_rwField.setValue(rec.get('pemohon_rw'));
					idam_det_pemohon_kelField.setValue(rec.get('pemohon_kel'));
					idam_det_pemohon_kecField.setValue(rec.get('pemohon_kec'));
					idam_det_pemohon_straField.setValue(rec.get('pemohon_stra'));
					idam_det_pemohon_surattugasField.setValue(rec.get('pemohon_surattugas'));
					idam_det_pemohon_pekerjaanField.setValue(rec.get('pemohon_pekerjaan'));
					idam_det_pemohon_tempatlahirField.setValue(rec.get('pemohon_tempatlahir'));
					idam_det_pemohon_tanggallahirField.setValue(rec.get('pemohon_tanggallahir'));
					idam_det_pemohon_user_idField.setValue(rec.get('pemohon_user_id'));
					idam_det_pemohon_pendidikanField.setValue(rec.get('pemohon_pendidikan'));
					idam_det_pemohon_tahunlulusField.setValue(rec.get('pemohon_tahunlulus'));
				}
			}
		});
		var idam_det_pemohon_straField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_stra',
			fieldLabel : 'STRA',
			hidden : true,
			maxLength : 50
		});
		var idam_det_pemohon_surattugasField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_surattugas',
			fieldLabel : 'Surat Tugas',
			hidden : true,
			maxLength : 50
		});
		var idam_det_pemohon_pekerjaanField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_pekerjaan',
			fieldLabel : 'Pekerjaan',
			maxLength : 50
		});
		var idam_det_pemohon_tempatlahirField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_tempatlahir',
			fieldLabel : 'Tempat Lahir',
			maxLength : 50
		});
		var idam_det_pemohon_tanggallahirField = Ext.create('Ext.form.field.Date',{
			name : 'pemohon_tanggallahir',
			fieldLabel : 'Tanggal Lahir',
			format : 'd-m-Y'
		});
		var idam_det_pemohon_user_idField = Ext.create('Ext.form.Hidden',{
			name : 'pemohon_user_id',
		});
		var idam_det_pemohon_pendidikanField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_pendidikan',
			fieldLabel : 'Pendidikan',
			maxLength : 50
		});
		var idam_det_pemohon_tahunlulusField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_tahunlulus',
			fieldLabel : 'Tahun Lulus',
			maxLength : 4,
			maskRe : /([0-9]+)$/
		});
		var idam_det_pendukungfieldset = Ext.create('Ext.form.FieldSet',{
			title : '5. Data Pendukung',
			columnWidth : 0.5,
			checkboxToggle : false,
			collapsible : false,
			layout :'form',
			items : [
				det_idam_terimaField,
				det_idam_terimatanggalField,
				det_idam_kelengkapanField,
				det_idam_bapField,
				det_idam_baptanggalField,
				det_idam_statusField,
				det_idam_keteranganField,
				det_idam_skField,
				det_idam_berlakuField,
				det_idam_kadaluarsaField,
				det_idam_nomorregField
			]
		});
		/* END DATA PEMOHON */
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
					checkboxToggle : false,
					collapsible : false,
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
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						idam_det_pemohon_idField,
						idam_det_pemohon_nikField,
						idam_det_pemohon_namaField,
						idam_det_pemohon_alamatField,
						idam_det_pemohon_telpField,
						idam_det_pemohon_npwpField,
						idam_det_pemohon_rtField,
						idam_det_pemohon_rwField,
						idam_det_pemohon_kelField,
						idam_det_pemohon_kecField,
						idam_det_pemohon_straField,
						idam_det_pemohon_surattugasField,
						idam_det_pemohon_pekerjaanField,
						idam_det_pemohon_tempatlahirField,
						idam_det_pemohon_tanggallahirField,
						idam_det_pemohon_user_idField,
						idam_det_pemohon_pendidikanField,
						idam_det_pemohon_tahunlulusField
					]
				},{
					xtype : 'fieldset',
					title : '3. Data Usaha',
					columnWidth : 0.5,
					checkboxToggle : false,
					collapsible : false,
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
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						det_idam_syaratGrid
					]
				},idam_det_pendukungfieldset,
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
		det_idam_berlakuSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_berlakuSearchField',
			name : 'det_idam_berlaku',
			fieldLabel : 'Tanggal Berlaku',
			maxLength : 0
		
		});
		det_idam_kadaluarsaSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_idam_kadaluarsaSearchField',
			name : 'det_idam_kadaluarsa',
			fieldLabel : 'Kadaluarsa',
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
		<?php if(@$_SESSION['IDHAK'] == 2){ ?>
			idam_det_lk_printCM.hide();
			idam_det_bap_printCM.hide();
			idam_det_sk_printCM.hide();
			idam_det_pendukungfieldset.hide();
			idam_det_gridPanel.columns[23].setVisible(false);
			idam_det_gridPanel.columns[24].setVisible(false);
		<?php } ?>
/* End SearchPanel declaration */
});
</script>
<div id="idam_detSaveWindow"></div>
<div id="idam_detSearchWindow"></div>
<div class="col-md-12" id="idam_detGrid"></div>