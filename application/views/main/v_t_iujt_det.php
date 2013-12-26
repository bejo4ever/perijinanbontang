<style>
	.checked{
		background-image:url(../assets/images/icons/check.png) !important;
	}
	.unchecked{
		background-image:url(../assets/images/icons/forward.png) !important;
	}
</style>
<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var iujt_det_componentItemTitle="Izin Usaha Jasa Titipan";
		var iujt_det_dataStore;
		
		var iujt_det_shorcut;
		var iujt_det_contextMenu;
		var iujt_det_gridSearchField;
		var iujt_det_gridPanel;
		var iujt_det_formPanel;
		var iujt_det_formWindow;
		var iujt_det_searchPanel;
		var iujt_det_searchWindow;
		
		var det_iujt_idField;
		var det_iujt_iujt_idField;
		var det_iujt_jenisField;
		var det_iujt_sklamaField;
		var det_iujt_namaField;
		var det_iujt_npwpField;
		var det_iujt_alamatField;
		var det_iujt_skField;
		var det_iujt_norekomField;
		var det_iujt_berlakuField;
		var det_iujt_tglrekomField;
		var det_iujt_kadaluarsaField;
		var det_iujt_surveylulusField;
		var det_iujt_tanggalField;
		var det_iujt_nopermohonanField;
		var det_iujt_cekpetugasField;
		var det_iujt_cektanggalField;
		var det_iujt_ceknipField;
		var det_iujt_catatanField;
		var iujt_usahaField;
		var iujt_alamatusahaField;
		var iujt_statusperusahaanField;
		var iujt_penanggungjawabField;
				
		var det_iujt_iujt_idSearchField;
		var det_iujt_jenisSearchField;
		var det_iujt_namaSearchField;
		var det_iujt_npwpSearchField;
		var det_iujt_alamatSearchField;
		var det_iujt_skSearchField;
		var det_iujt_berlakuSearchField;
		var det_iujt_kadaluarsaSearchField;
		var det_iujt_surveylulusSearchField;
		var det_iujt_tanggalSearchField;
		var det_iujt_nopermohonanSearchField;
		var det_iujt_cekpetugasSearchField;
		var det_iujt_cektanggalSearchField;
		var det_iujt_ceknipSearchField;
		var det_iujt_catatanSearchField;
				
		var iujt_det_dbTask = 'CREATE';
		var iujt_det_dbTaskMessage = 'Tambah';
		var iujt_det_dbPermission = 'CRUD';
		var iujt_det_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function iujt_det_switchToGrid(){
			iujt_det_formPanel.setDisabled(true);
			iujt_det_gridPanel.setDisabled(false);
			iujt_det_formWindow.hide();
		}
		
		function iujt_det_switchToForm(){
			iujt_det_gridPanel.setDisabled(true);
			iujt_det_formPanel.setDisabled(false);
			iujt_det_formWindow.show();
		}
		
		function iujt_det_confirmAdd(){
			iujt_det_dbTask = 'CREATE';
			iujt_det_dbTaskMessage = 'created';
			iujt_det_resetForm();
			iujt_det_syaratDataStore.proxy.extraParams = { 
				currentAction : 'create',
				action : 'GETSYARAT'
			};
			iujt_det_syaratDataStore.load();
			iujt_det_switchToForm();
		}
		
		function iujt_det_confirmUpdate(){
			if(iujt_det_gridPanel.selModel.getCount() == 1) {
				iujt_det_dbTask = 'UPDATE';
				iujt_det_dbTaskMessage = 'updated';
				iujt_det_switchToForm();
				iujt_det_setForm();
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
		
		function iujt_det_confirmDelete(){
			if(iujt_det_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, iujt_det_delete);
			}else if(iujt_det_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, iujt_det_delete);
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
		
		function iujt_det_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(iujt_det_dbPermission)==false && pattC.test(iujt_det_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(iujt_det_confirmFormValid()){
					var det_iujt_idValue = '';
					var det_iujt_iujt_idValue = '';
					var det_iujt_jenisValue = '';
					var det_iujt_sklamaValue = '';
					var det_iujt_namaValue = '';
					var det_iujt_npwpValue = '';
					var det_iujt_alamatValue = '';
					var det_iujt_skValue = '';
					var det_iujt_norekomValue = '';
					var det_iujt_berlakuValue = '';
					var det_iujt_tglrekomValue = '';
					var det_iujt_kadaluarsaValue = '';
					var det_iujt_surveylulusValue = '';
					var det_iujt_tanggalValue = '';
					var det_iujt_nopermohonanValue = '';
					var det_iujt_cekpetugasValue = '';
					var det_iujt_cektanggalValue = '';
					var det_iujt_ceknipValue = '';
					var det_iujt_catatanValue = '';
					var iujt_usahaValue = '';
					var iujt_alamatusahaValue = '';
					var iujt_statusperusahaanValue = '';
					var iujt_penanggungjawabValue = '';
										
					det_iujt_idValue = det_iujt_idField.getValue();
					det_iujt_iujt_idValue = det_iujt_iujt_idField.getValue();
					det_iujt_jenisValue = det_iujt_jenisField.getValue();
					det_iujt_sklamaValue = det_iujt_sklamaField.getValue();
					det_iujt_namaValue = det_iujt_namaField.getValue();
					det_iujt_npwpValue = det_iujt_npwpField.getValue();
					det_iujt_alamatValue = det_iujt_alamatField.getValue();
					det_iujt_skValue = det_iujt_skField.getValue();
					det_iujt_norekomValue = det_iujt_norekomField.getValue();
					det_iujt_berlakuValue = det_iujt_berlakuField.getValue();
					det_iujt_tglrekomValue = det_iujt_tglrekomField.getValue();
					det_iujt_kadaluarsaValue = det_iujt_kadaluarsaField.getValue();
					det_iujt_surveylulusValue = det_iujt_surveylulusField.getValue();
					det_iujt_tanggalValue = det_iujt_tanggalField.getValue();
					det_iujt_nopermohonanValue = det_iujt_nopermohonanField.getValue();
					det_iujt_cekpetugasValue = det_iujt_cekpetugasField.getValue();
					det_iujt_cektanggalValue = det_iujt_cektanggalField.getValue();
					det_iujt_ceknipValue = det_iujt_ceknipField.getValue();
					det_iujt_catatanValue = det_iujt_catatanField.getValue();
					iujt_usahaValue = iujt_usahaField.getValue();
					iujt_alamatusahaValue = iujt_alamatusahaField.getValue();
					iujt_statusperusahaanValue = iujt_statusperusahaanField.getValue();
					iujt_penanggungjawabValue = iujt_penanggungjawabField.getValue();
					
					var array_iujt_cek_id=new Array();
					var array_iujt_cek_syarat_id=new Array();
					var array_iujt_cek_status=new Array();
					var array_iujt_cek_keterangan=new Array();
					
					if(iujt_det_syaratDataStore.getCount() > 0){
						for(var i=0;i<iujt_det_syaratDataStore.getCount();i++){
							array_iujt_cek_id.push(iujt_det_syaratDataStore.getAt(i).data.iujt_cek_id);
							array_iujt_cek_syarat_id.push(iujt_det_syaratDataStore.getAt(i).data.iujt_cek_syarat_id);
							array_iujt_cek_status.push(iujt_det_syaratDataStore.getAt(i).data.iujt_cek_status);
							array_iujt_cek_keterangan.push(iujt_det_syaratDataStore.getAt(i).data.iujt_cek_keterangan);
						}
					}
					
					var encoded_iujt_cek_id = Ext.encode(array_iujt_cek_id);
					var encoded_iujt_cek_syarat_id = Ext.encode(array_iujt_cek_syarat_id);
					var encoded_iujt_cek_status = Ext.encode(array_iujt_cek_status);
					var encoded_iujt_cek_keterangan = Ext.encode(array_iujt_cek_keterangan);

					var pemohon_idValue = iujt_det_pemohon_idField.getValue();
					var pemohon_namaValue = iujt_det_pemohon_namaField.getValue();
					var pemohon_alamatValue = iujt_det_pemohon_alamatField.getValue();
					var pemohon_telpValue = iujt_det_pemohon_telpField.getValue();
					var pemohon_npwpValue = iujt_det_pemohon_npwpField.getValue();
					var pemohon_rtValue = iujt_det_pemohon_rtField.getValue();
					var pemohon_rwValue = iujt_det_pemohon_rwField.getValue();
					var pemohon_kelValue = iujt_det_pemohon_kelField.getValue();
					var pemohon_kecValue = iujt_det_pemohon_kecField.getValue();
					var pemohon_nikValue = iujt_det_pemohon_nikField.getValue();
					var pemohon_straValue = iujt_det_pemohon_straField.getValue();
					var pemohon_surattugasValue = iujt_det_pemohon_surattugasField.getValue();
					var pemohon_pekerjaanValue = iujt_det_pemohon_pekerjaanField.getValue();
					var pemohon_tempatlahirValue = iujt_det_pemohon_tempatlahirField.getValue();
					var pemohon_tanggallahirValue = iujt_det_pemohon_tanggallahirField.getValue();
					var pemohon_user_idValue = iujt_det_pemohon_user_idField.getValue();
					var pemohon_pendidikanValue = iujt_det_pemohon_pendidikanField.getValue();
					var pemohon_tahunlulusValue = iujt_det_pemohon_tahunlulusField.getValue();
					
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_t_iujt_det/switchAction',
						params: {							
							det_iujt_id : det_iujt_idValue,
							det_iujt_iujt_id : det_iujt_iujt_idValue,
							det_iujt_jenis : det_iujt_jenisValue,
							det_iujt_sklama : det_iujt_sklamaValue,
							det_iujt_nama : det_iujt_namaValue,
							det_iujt_npwp : det_iujt_npwpValue,
							det_iujt_alamat : det_iujt_alamatValue,
							det_iujt_sk : det_iujt_skValue,
							det_iujt_norekom : det_iujt_norekomValue,
							det_iujt_berlaku : det_iujt_berlakuValue,
							det_iujt_tglrekom : det_iujt_tglrekomValue,
							det_iujt_kadaluarsa : det_iujt_kadaluarsaValue,
							det_iujt_surveylulus : det_iujt_surveylulusValue,
							det_iujt_tanggal : det_iujt_tanggalValue,
							det_iujt_nopermohonan : det_iujt_nopermohonanValue,
							det_iujt_cekpetugas : det_iujt_cekpetugasValue,
							det_iujt_cektanggal : det_iujt_cektanggalValue,
							det_iujt_ceknip : det_iujt_ceknipValue,
							det_iujt_catatan : det_iujt_catatanValue,
							iujt_usaha : iujt_usahaValue,
							iujt_alamatusaha : iujt_alamatusahaValue,
							iujt_statusperusahaan : iujt_statusperusahaanValue,
							iujt_penanggungjawab : iujt_penanggungjawabValue,
							iujt_cek_id : encoded_iujt_cek_id,
							iujt_cek_syarat_id : encoded_iujt_cek_syarat_id,
							iujt_cek_status : encoded_iujt_cek_status,
							iujt_cek_keterangan : encoded_iujt_cek_keterangan,pemohon_id : pemohon_idValue,
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
							
							action : iujt_det_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									iujt_det_dataStore.reload();
									iujt_det_resetForm();
									iujt_det_switchToGrid();
									iujt_det_gridPanel.getSelectionModel().deselectAll();
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
		
		function iujt_det_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(iujt_det_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = iujt_det_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< iujt_det_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.det_iujt_id);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_t_iujt_det/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									iujt_det_dataStore.reload();
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
		
		function iujt_det_refresh(){
			iujt_det_dbListAction = "GETLIST";
			iujt_det_gridSearchField.reset();
			iujt_det_searchPanel.getForm().reset();
			iujt_det_dataStore.proxy.extraParams = { action : 'GETLIST' };
			iujt_det_dataStore.proxy.extraParams.query = "";
			iujt_det_dataStore.currentPage = 1;
			iujt_det_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function iujt_det_confirmFormValid(){
			return iujt_det_formPanel.getForm().isValid();
		}
		
		function iujt_det_resetForm(){
			iujt_det_dbTask = 'CREATE';
			iujt_det_dbTaskMessage = 'create';
			iujt_det_formPanel.getForm().reset();
			det_iujt_idField.setValue(0);
			window.scrollTo(0,0);
		}
		
		function iujt_det_setForm(){
			iujt_det_dbTask = 'UPDATE';
            iujt_det_dbTaskMessage = 'update';
			
			var record = iujt_det_gridPanel.getSelectionModel().getSelection()[0];
			det_iujt_idField.setValue(record.data.det_iujt_id);
			det_iujt_iujt_idField.setValue(record.data.det_iujt_iujt_id);
			det_iujt_jenisField.setValue(record.data.det_iujt_jenis);
			det_iujt_namaField.setValue(record.data.det_iujt_nama);
			det_iujt_npwpField.setValue(record.data.det_iujt_npwp);
			det_iujt_alamatField.setValue(record.data.det_iujt_alamat);
			det_iujt_skField.setValue(record.data.det_iujt_sk);
			det_iujt_norekomField.setValue(record.data.det_iujt_norekom);
			det_iujt_berlakuField.setValue(record.data.det_iujt_berlaku);
			det_iujt_tglrekomField.setValue(record.data.det_iujt_tglrekom);
			det_iujt_kadaluarsaField.setValue(record.data.det_iujt_kadaluarsa);
			det_iujt_surveylulusField.setValue(record.data.det_iujt_surveylulus);
			det_iujt_tanggalField.setValue(record.data.det_iujt_tanggal);
			det_iujt_nopermohonanField.setValue(record.data.det_iujt_nopermohonan);
			det_iujt_cekpetugasField.setValue(record.data.det_iujt_cekpetugas);
			det_iujt_cektanggalField.setValue(record.data.det_iujt_cektanggal);
			det_iujt_ceknipField.setValue(record.data.det_iujt_ceknip);
			det_iujt_catatanField.setValue(record.data.det_iujt_catatan);
			
			iujt_usahaField.setValue(record.data.iujt_usaha);
			iujt_alamatusahaField.setValue(record.data.iujt_alamatusaha);
			iujt_statusperusahaanField.setValue(record.data.iujt_statusperusahaan);
			iujt_penanggungjawabField.setValue(record.data.iujt_penanggungjawab);
			iujt_det_pemohon_idField.setValue(record.data.pemohon_id);
			iujt_det_pemohon_namaField.setValue(record.data.pemohon_nama);
			iujt_det_pemohon_alamatField.setValue(record.data.pemohon_alamat);
			iujt_det_pemohon_telpField.setValue(record.data.pemohon_telp);
			iujt_det_pemohon_npwpField.setValue(record.data.pemohon_npwp);
			iujt_det_pemohon_rtField.setValue(record.data.pemohon_rt);
			iujt_det_pemohon_rwField.setValue(record.data.pemohon_rw);
			iujt_det_pemohon_kelField.setValue(record.data.pemohon_kel);
			iujt_det_pemohon_kecField.setValue(record.data.pemohon_kec);
			iujt_det_pemohon_nikField.setValue(record.data.pemohon_nik);
			iujt_det_pemohon_straField.setValue(record.data.pemohon_stra);
			iujt_det_pemohon_surattugasField.setValue(record.data.pemohon_surattugas);
			iujt_det_pemohon_pekerjaanField.setValue(record.data.pemohon_pekerjaan);
			iujt_det_pemohon_tempatlahirField.setValue(record.data.pemohon_tempatlahir);
			iujt_det_pemohon_tanggallahirField.setValue(record.data.pemohon_tanggallahir);
			iujt_det_pemohon_user_idField.setValue(record.data.pemohon_user_id);
			iujt_det_pemohon_pendidikanField.setValue(record.data.pemohon_pendidikan);
			iujt_det_pemohon_tahunlulusField.setValue(record.data.pemohon_tahunlulus);
			iujt_det_syaratDataStore.proxy.extraParams = { 
				iujt_id : record.data.det_iujt_iujt_id,
				iujt_det_id : record.data.det_iujt_id,
				currentAction : 'update',
				action : 'GETSYARAT'
			};
			iujt_det_syaratDataStore.load();
		}
		
		function iujt_det_showSearchWindow(){
			iujt_det_searchWindow.show();
		}
		
		function iujt_det_search(){
			iujt_det_gridSearchField.reset();
			
			var det_iujt_iujt_idValue = '';
			var det_iujt_jenisValue = '';
			var det_iujt_namaValue = '';
			var det_iujt_npwpValue = '';
			var det_iujt_alamatValue = '';
			var det_iujt_skValue = '';
			var det_iujt_berlakuValue = '';
			var det_iujt_kadaluarsaValue = '';
			var det_iujt_surveylulusValue = '';
			var det_iujt_tanggalValue = '';
			var det_iujt_nopermohonanValue = '';
			var det_iujt_cekpetugasValue = '';
			var det_iujt_cektanggalValue = '';
			var det_iujt_ceknipValue = '';
			var det_iujt_catatanValue = '';
						
			det_iujt_iujt_idValue = det_iujt_iujt_idSearchField.getValue();
			det_iujt_jenisValue = det_iujt_jenisSearchField.getValue();
			det_iujt_namaValue = det_iujt_namaSearchField.getValue();
			det_iujt_npwpValue = det_iujt_npwpSearchField.getValue();
			det_iujt_alamatValue = det_iujt_alamatSearchField.getValue();
			det_iujt_skValue = det_iujt_skSearchField.getValue();
			det_iujt_berlakuValue = det_iujt_berlakuSearchField.getValue();
			det_iujt_kadaluarsaValue = det_iujt_kadaluarsaSearchField.getValue();
			det_iujt_surveylulusValue = det_iujt_surveylulusSearchField.getValue();
			det_iujt_tanggalValue = det_iujt_tanggalSearchField.getValue();
			det_iujt_nopermohonanValue = det_iujt_nopermohonanSearchField.getValue();
			det_iujt_cekpetugasValue = det_iujt_cekpetugasSearchField.getValue();
			det_iujt_cektanggalValue = det_iujt_cektanggalSearchField.getValue();
			det_iujt_ceknipValue = det_iujt_ceknipSearchField.getValue();
			det_iujt_catatanValue = det_iujt_catatanSearchField.getValue();
			iujt_det_dbListAction = "SEARCH";
			iujt_det_dataStore.proxy.extraParams = { 
				det_iujt_iujt_id : det_iujt_iujt_idValue,
				det_iujt_jenis : det_iujt_jenisValue,
				det_iujt_nama : det_iujt_namaValue,
				det_iujt_npwp : det_iujt_npwpValue,
				det_iujt_alamat : det_iujt_alamatValue,
				det_iujt_sk : det_iujt_skValue,
				det_iujt_berlaku : det_iujt_berlakuValue,
				det_iujt_kadaluarsa : det_iujt_kadaluarsaValue,
				det_iujt_surveylulus : det_iujt_surveylulusValue,
				det_iujt_tanggal : det_iujt_tanggalValue,
				det_iujt_nopermohonan : det_iujt_nopermohonanValue,
				det_iujt_cekpetugas : det_iujt_cekpetugasValue,
				det_iujt_cektanggal : det_iujt_cektanggalValue,
				det_iujt_ceknip : det_iujt_ceknipValue,
				det_iujt_catatan : det_iujt_catatanValue,
				action : 'SEARCH'
			};
			iujt_det_dataStore.currentPage = 1;
			iujt_det_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function iujt_det_printExcel(outputType){
			var searchText = "";
			var det_iujt_iujt_idValue = '';
			var det_iujt_jenisValue = '';
			var det_iujt_namaValue = '';
			var det_iujt_npwpValue = '';
			var det_iujt_alamatValue = '';
			var det_iujt_skValue = '';
			var det_iujt_berlakuValue = '';
			var det_iujt_kadaluarsaValue = '';
			var det_iujt_surveylulusValue = '';
			var det_iujt_tanggalValue = '';
			var det_iujt_nopermohonanValue = '';
			var det_iujt_cekpetugasValue = '';
			var det_iujt_cektanggalValue = '';
			var det_iujt_ceknipValue = '';
			var det_iujt_catatanValue = '';
			
			if(iujt_det_dataStore.proxy.extraParams.query!==null){searchText = iujt_det_dataStore.proxy.extraParams.query;}
			if(iujt_det_dataStore.proxy.extraParams.det_iujt_iujt_id!==null){det_iujt_iujt_idValue = iujt_det_dataStore.proxy.extraParams.det_iujt_iujt_id;}
			if(iujt_det_dataStore.proxy.extraParams.det_iujt_jenis!==null){det_iujt_jenisValue = iujt_det_dataStore.proxy.extraParams.det_iujt_jenis;}
			if(iujt_det_dataStore.proxy.extraParams.det_iujt_nama!==null){det_iujt_namaValue = iujt_det_dataStore.proxy.extraParams.det_iujt_nama;}
			if(iujt_det_dataStore.proxy.extraParams.det_iujt_npwp!==null){det_iujt_npwpValue = iujt_det_dataStore.proxy.extraParams.det_iujt_npwp;}
			if(iujt_det_dataStore.proxy.extraParams.det_iujt_alamat!==null){det_iujt_alamatValue = iujt_det_dataStore.proxy.extraParams.det_iujt_alamat;}
			if(iujt_det_dataStore.proxy.extraParams.det_iujt_sk!==null){det_iujt_skValue = iujt_det_dataStore.proxy.extraParams.det_iujt_sk;}
			if(iujt_det_dataStore.proxy.extraParams.det_iujt_berlaku!==null){det_iujt_berlakuValue = iujt_det_dataStore.proxy.extraParams.det_iujt_berlaku;}
			if(iujt_det_dataStore.proxy.extraParams.det_iujt_kadaluarsa!==null){det_iujt_kadaluarsaValue = iujt_det_dataStore.proxy.extraParams.det_iujt_kadaluarsa;}
			if(iujt_det_dataStore.proxy.extraParams.det_iujt_surveylulus!==null){det_iujt_surveylulusValue = iujt_det_dataStore.proxy.extraParams.det_iujt_surveylulus;}
			if(iujt_det_dataStore.proxy.extraParams.det_iujt_tanggal!==null){det_iujt_tanggalValue = iujt_det_dataStore.proxy.extraParams.det_iujt_tanggal;}
			if(iujt_det_dataStore.proxy.extraParams.det_iujt_nopermohonan!==null){det_iujt_nopermohonanValue = iujt_det_dataStore.proxy.extraParams.det_iujt_nopermohonan;}
			if(iujt_det_dataStore.proxy.extraParams.det_iujt_cekpetugas!==null){det_iujt_cekpetugasValue = iujt_det_dataStore.proxy.extraParams.det_iujt_cekpetugas;}
			if(iujt_det_dataStore.proxy.extraParams.det_iujt_cektanggal!==null){det_iujt_cektanggalValue = iujt_det_dataStore.proxy.extraParams.det_iujt_cektanggal;}
			if(iujt_det_dataStore.proxy.extraParams.det_iujt_ceknip!==null){det_iujt_ceknipValue = iujt_det_dataStore.proxy.extraParams.det_iujt_ceknip;}
			if(iujt_det_dataStore.proxy.extraParams.det_iujt_catatan!==null){det_iujt_catatanValue = iujt_det_dataStore.proxy.extraParams.det_iujt_catatan;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_t_iujt_det/switchAction',
				params : {
					action : outputType,
					query : searchText,
					det_iujt_iujt_id : det_iujt_iujt_idValue,
					det_iujt_jenis : det_iujt_jenisValue,
					det_iujt_nama : det_iujt_namaValue,
					det_iujt_npwp : det_iujt_npwpValue,
					det_iujt_alamat : det_iujt_alamatValue,
					det_iujt_sk : det_iujt_skValue,
					det_iujt_berlaku : det_iujt_berlakuValue,
					det_iujt_kadaluarsa : det_iujt_kadaluarsaValue,
					det_iujt_surveylulus : det_iujt_surveylulusValue,
					det_iujt_tanggal : det_iujt_tanggalValue,
					det_iujt_nopermohonan : det_iujt_nopermohonanValue,
					det_iujt_cekpetugas : det_iujt_cekpetugasValue,
					det_iujt_cektanggal : det_iujt_cektanggalValue,
					det_iujt_ceknip : det_iujt_ceknipValue,
					det_iujt_catatan : det_iujt_catatanValue,
					currentAction : iujt_det_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/t_iujt_det_list.xls');
							}else{
								window.open('./print/t_iujt_det_list.html','iujt_detlist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		iujt_det_dataStore = Ext.create('Ext.data.Store',{
			id : 'iujt_det_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_iujt_det/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'det_iujt_id'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'det_iujt_id', type : 'int', mapping : 'det_iujt_id' },
				{ name : 'det_iujt_iujt_id', type : 'int', mapping : 'det_iujt_iujt_id' },
				{ name : 'det_iujt_jenis', type : 'int', mapping : 'det_iujt_jenis' },
				{ name : 'det_iujt_jenis_nama', type : 'string', mapping : 'det_iujt_jenis_nama' },
				{ name : 'det_iujt_nama', type : 'string', mapping : 'det_iujt_nama' },
				{ name : 'det_iujt_npwp', type : 'string', mapping : 'det_iujt_npwp' },
				{ name : 'det_iujt_alamat', type : 'string', mapping : 'det_iujt_alamat' },
				{ name : 'det_iujt_sk', type : 'string', mapping : 'det_iujt_sk' },
				{ name : 'det_iujt_norekom', type : 'string', mapping : 'det_iujt_norekom' },
				{ name : 'det_iujt_berlaku', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_iujt_berlaku' },
				{ name : 'det_iujt_tglrekom', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_iujt_tglrekom' },
				{ name : 'det_iujt_kadaluarsa', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_iujt_kadaluarsa' },
				{ name : 'det_iujt_surveylulus', type : 'int', mapping : 'det_iujt_surveylulus' },
				{ name : 'det_iujt_tanggal', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_iujt_tanggal' },
				{ name : 'det_iujt_nopermohonan', type : 'string', mapping : 'det_iujt_nopermohonan' },
				{ name : 'det_iujt_cekpetugas', type : 'string', mapping : 'det_iujt_cekpetugas' },
				{ name : 'det_iujt_cektanggal', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_iujt_cektanggal' },
				{ name : 'det_iujt_ceknip', type : 'string', mapping : 'det_iujt_ceknip' },
				{ name : 'det_iujt_catatan', type : 'string', mapping : 'det_iujt_catatan' },
				{ name : 'det_iujt_proses', type : 'string', mapping : 'det_iujt_proses' },
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
				{ name : 'iujt_usaha', type : 'string', mapping : 'iujt_usaha' },
				{ name : 'iujt_alamatusaha', type : 'string', mapping : 'iujt_alamatusaha' },
				{ name : 'iujt_statusperusahaan', type : 'string', mapping : 'iujt_statusperusahaan' },
				{ name : 'iujt_penanggungjawab', type : 'string', mapping : 'iujt_penanggungjawab' },
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		iujt_det_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						iujt_det_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						iujt_det_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						iujt_det_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						iujt_det_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						iujt_det_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						iujt_det_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						iujt_det_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						iujt_det_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var iujt_det_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : iujt_det_confirmAdd
		});
		var iujt_det_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : iujt_det_confirmUpdate
		});
		var iujt_det_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : iujt_det_confirmDelete
		});
		var iujt_det_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : iujt_det_refresh
		});
		var iujt_det_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : iujt_det_showSearchWindow
		});
		var iujt_det_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				iujt_det_printExcel('PRINT');
			}
		});
		var iujt_det_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				iujt_det_printExcel('EXCEL');
			}
		});
		
		var iujt_det_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : iujt_det_confirmUpdate
		});
		var iujt_det_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : iujt_det_confirmDelete
		});
		var iujt_det_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : iujt_det_refresh
		});
		iujt_det_contextMenu = Ext.create('Ext.menu.Menu',{
			items: [
				iujt_det_contextMenuEdit,iujt_det_contextMenuDelete,'-',iujt_det_contextMenuRefresh
			]
		});
		
		iujt_det_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : iujt_det_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						iujt_det_dataStore.proxy.extraParams = { action : 'GETLIST'};
						iujt_det_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		/* Start ContextMenu For Action Column */
		var iujt_det_bp_printCM = Ext.create('Ext.menu.Item',{
			text : 'Bukti Penerimaan',
			tooltip : 'Cetak Bukti Penerimaan',
			handler : function(){
				var record = iujt_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_iujt_det/switchAction',
					params: {
						iujtdet_id : record.get('det_iujt_id'),
						action : 'CETAKBP'
					},success : function(){
						window.open('../print/iujt_buktipenerimaan.html');
					}
				});
			}
		});
		var iujt_det_sk_printCM = Ext.create('Ext.menu.Item',{
			text : 'Surat Keputusan',
			tooltip : 'Cetak Surat Keputusan',
			handler : function(){
				var record = iujt_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_iujt_det/switchAction',
					params: {
						iujtdet_id : record.get('det_iujt_id'),
						action : 'CETAKSK'
					},success : function(){
						window.open('../print/iujt_sk.html');
					}
				});
			}
		});
		var iujt_det_rekom_printCM = Ext.create('Ext.menu.Item',{
			text : 'Rekomendasi',
			tooltip : 'Cetak Surat Rekomendasi',
			handler : function(){
				var record = iujt_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_iujt_det/switchAction',
					params: {
						iujtdet_id : record.get('det_iujt_id'),
						action : 'REKOMENDASI'
					},success : function(){
						window.open('../print/iujt_rekom.html');
					}
				});
			}
		});
		var iujt_det_lk_printCM = Ext.create('Ext.menu.Item',{
			text : 'Lembar Kontrol',
			tooltip : 'Cetak Lembar Kontrol',
			handler : function(){
				var record = iujt_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_iujt_det/switchAction',
					params: {
						iujtdet_id : record.get('det_iujt_id'),
						action : 'CETAKLEMBARKONTROL'
					},success : function(){
						window.open('../print/iujt_lembarkontrol.html');
					}
				});
			}
		});
		var iujt_det_printContextMenu = Ext.create('Ext.menu.Menu',{
			items: [
				iujt_det_bp_printCM,iujt_det_lk_printCM,iujt_det_rekom_printCM,iujt_det_sk_printCM
			]
		});
		function iujt_det_ubahProses(proses){
			var record = iujt_det_gridPanel.getSelectionModel().getSelection()[0];
			Ext.Ajax.request({
				waitMsg: 'Please wait...',
				url: 'c_t_iujt_det/switchAction',
				params: {
					iujtdet_id : record.get('det_iujt_id'),
					proses : proses,
					action : 'UBAHPROSES'
				},success : function(){
					iujt_det_dataStore.reload();
				}
			});
		}
		
		var iujt_det_prosesContextMenu = Ext.create('Ext.menu.Menu',{
			items: [
				{
					text : 'Selesai, belum diambil',
					tooltip : 'Ubah Menjadi Selesai, belum diambil',
					handler : function(){
						iujt_det_ubahProses('Selesai, belum diambil');
					}
				},
				{
					text : 'Selesai, sudah diambil',
					tooltip : 'Ubah Menjadi Selesai, sudah diambil',
					handler : function(){
						iujt_det_ubahProses('Selesai, sudah diambil');
					}
				},
				{
					text : 'Ditolak',
					tooltip : 'Ubah Menjadi Ditolak',
					handler : function(){
						iujt_det_ubahProses('Ditolak');
					}
				}
			]
		});
		
		/* End ContextMenu For Action Column */
		iujt_det_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'iujt_det_gridPanel',
			constrain : true,
			store : iujt_det_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'iujt_detGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : {forceFit:true},
			multiSelect : true,
			keys : iujt_det_shorcut,
			columns : [
				{
					text : 'ID IUJT',
					dataIndex : 'det_iujt_iujt_id',
					width : 100,
					hidden : true,
					sortable : false
				},
				{
					text : 'Jenis',
					dataIndex : 'det_iujt_jenis_nama',
					width : 100,
					sortable : false
				},
				{
					text : 'Tanggal',
					dataIndex : 'det_iujt_tanggal',
					width : 100,
					sortable : false,
					renderer : Ext.util.Format.dateRenderer('d-m-Y'),
					hidden : true
				},
				{
					text : 'Nama',
					dataIndex : 'pemohon_nama',
					width : 200,
					sortable : false
				},
				{
					text : 'NPWP',
					dataIndex : 'pemohon_npwp',
					width : 100,
					sortable : false
				},
				{
					text : 'Alamat',
					dataIndex : 'pemohon_alamat',
					width : 200,
					sortable : false
				},
				{
					text : 'Nomor Rekom',
					dataIndex : 'det_iujt_norekom',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'Tgl Rekom',
					dataIndex : 'det_iujt_tglrekom',
					width : 100,
					sortable : false,
					renderer : Ext.util.Format.dateRenderer('d-m-Y'),
					hidden : true
				},
				{
					text : 'Nomor SK',
					dataIndex : 'det_iujt_sk',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'Tgl Berlaku',
					dataIndex : 'det_iujt_berlaku',
					width : 100,
					sortable : false,
					renderer : Ext.util.Format.dateRenderer('d-m-Y'),
					hidden : true
				},
				{
					text : 'Tgl Kadaluarsa',
					dataIndex : 'det_iujt_kadaluarsa',
					width : 100,
					sortable : false,
					renderer : Ext.util.Format.dateRenderer('d-m-Y'),
					hidden : true
				},
				{
					text : 'Nomor Permohonan',
					dataIndex : 'det_iujt_nopermohonan',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'Petugas Cek',
					dataIndex : 'det_iujt_cekpetugas',
					width : 150,
					sortable : false,
					hidden : true
				},
				{
					text : 'Tanggal Cek',
					dataIndex : 'det_iujt_cektanggal',
					width : 100,
					sortable : false,
					renderer : Ext.util.Format.dateRenderer('d-m-Y'),
					hidden : true
				},
				{
					text : 'NIP Petugas',
					dataIndex : 'det_iujt_ceknip',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'Catatan',
					dataIndex : 'det_iujt_catatan',
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
					dataIndex : 'det_iujt_proses',
					width : 125,
					sortable : false
				},
				{
					xtype:'actioncolumn',
					text : 'Cetak',
					width:50,
					items: [{
						iconCls: 'icon16x16-print',
						tooltip: 'Cetak Dokumen',
						handler: function(grid, rowIndex, colIndex, node, e) {
							e.stopEvent();
							iujt_det_printContextMenu.showAt(e.getXY());
							return false;
						}
					}]
				},
				{
					xtype:'actioncolumn',
					text : 'Action',
					width:50,
					items: [{
						iconCls: 'icon16x16-edit',
						tooltip: 'Ubah Data',
						handler: function(grid, rowIndex){
							grid.getSelectionModel().select(rowIndex);
							iujt_det_confirmUpdate();
						}
					},{
						iconCls: 'icon16x16-delete',
						tooltip: 'Hapus Data',
						handler: function(grid, rowIndex){
							grid.getSelectionModel().select(rowIndex);
							iujt_det_confirmDelete();
						}
					}]
				},
				{
					xtype:'actioncolumn',
					width:50,
					items: [{
						iconCls : 'checked',
						tooltip : 'Ubah Status',
						handler: function(grid, rowIndex, colIndex, node, e) {
							e.stopEvent();
							iujt_det_prosesContextMenu.showAt(e.getXY());
							return false;
						}
					}]
				}
			],
			tbar : [
				iujt_det_addButton,
				iujt_det_gridSearchField,
				iujt_det_refreshButton,
				iujt_det_printButton,
				iujt_det_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : iujt_det_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					iujt_det_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		det_iujt_idField = Ext.create('Ext.form.NumberField',{
			id : 'det_iujt_idField',
			name : 'det_iujt_id',
			fieldLabel : 'Id <font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		det_iujt_iujt_idField = Ext.create('Ext.form.NumberField',{
			id : 'det_iujt_iujt_idField',
			name : 'det_iujt_iujt_id',
			fieldLabel : 'Id',
			allowNegatife : false,
			blankText : '0',
			hidden : true,
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		det_iujt_jenisField = Ext.create('Ext.form.ComboBox',{
			id : 'det_iujt_jenisField',
			name : 'det_iujt_jenis',
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
						det_iujt_sklamaField.show();
					}else{
						det_iujt_sklamaField.hide();
					}
				}
			}
		});
		det_iujt_sklamaField = Ext.create('Ext.form.TextField',{
			id : 'det_iujt_sklamaField',
			name : 'det_iujt_sklama',
			fieldLabel : 'Nomor SK Lama',
			hidden : true,
			maxLength : 50
		});
		det_iujt_namaField = Ext.create('Ext.form.TextField',{
			id : 'det_iujt_namaField',
			name : 'det_iujt_nama',
			fieldLabel : 'Nama',
			maxLength : 50
		});
		det_iujt_npwpField = Ext.create('Ext.form.TextField',{
			id : 'det_iujt_npwpField',
			name : 'det_iujt_npwp',
			fieldLabel : 'NPWP',
			maxLength : 50
		});
		det_iujt_alamatField = Ext.create('Ext.form.TextField',{
			id : 'det_iujt_alamatField',
			name : 'det_iujt_alamat',
			fieldLabel : 'Alamat',
			maxLength : 100
		});
		det_iujt_skField = Ext.create('Ext.form.TextField',{
			id : 'det_iujt_skField',
			name : 'det_iujt_sk',
			fieldLabel : 'Nomor SK',
			maxLength : 50
		});
		det_iujt_norekomField = Ext.create('Ext.form.TextField',{
			id : 'det_iujt_norekomField',
			name : 'det_iujt_norekom',
			fieldLabel : 'Nomor Rekom',
			maxLength : 50
		});
		det_iujt_berlakuField = Ext.create('Ext.form.field.Date',{
			id : 'det_iujt_berlakuField',
			name : 'det_iujt_berlaku',
			fieldLabel : 'Tanggal Berlaku',
			format : 'd-m-Y'
		});
		det_iujt_tglrekomField = Ext.create('Ext.form.field.Date',{
			id : 'det_iujt_tglrekomField',
			name : 'det_iujt_tglrekom',
			fieldLabel : 'Tanggal Rekom',
			format : 'd-m-Y'
		});
		det_iujt_kadaluarsaField = Ext.create('Ext.form.field.Date',{
			id : 'det_iujt_kadaluarsaField',
			name : 'det_iujt_kadaluarsa',
			fieldLabel : 'Kadaluarsa',
			format : 'd-m-Y',
			minValue : new Date('<?php echo date('Y-m-d').'T'.date('H:i:s'); ?>')
		});
		det_iujt_surveylulusField = Ext.create('Ext.form.ComboBox',{
			id : 'det_iujt_surveylulusField',
			name : 'det_iujt_surveylulus',
			fieldLabel : 'Lulus/Tidak',
			store : new Ext.data.ArrayStore({
				fields : ['lulus_id', 'lulus_nama'],
				data : [[1,'LULUS'],[2,'TIDAK LULUS']]
			}),
			displayField : 'lulus_nama',
			valueField : 'lulus_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true
		});
		det_iujt_tanggalField = Ext.create('Ext.form.field.Date',{
			id : 'det_iujt_tanggalField',
			name : 'det_iujt_tanggal',
			fieldLabel : 'Tanggal <font color=red>*</font>',
			format : 'd-m-Y',
			maxValue : new Date('<?php echo date('Y-m-d').'T'.date('H:i:s'); ?>'),
			value : new Date('<?php echo date('Y-m-d').'T'.date('H:i:s'); ?>')
		});
		det_iujt_nopermohonanField = Ext.create('Ext.form.TextField',{
			id : 'det_iujt_nopermohonanField',
			name : 'det_iujt_nopermohonan',
			fieldLabel : 'Nomor Permohonan',
			maxLength : 50
		});
		det_iujt_cekpetugasField = Ext.create('Ext.form.TextField',{
			id : 'det_iujt_cekpetugasField',
			name : 'det_iujt_cekpetugas',
			fieldLabel : 'Petugas Cek',
			maxLength : 50
		});
		det_iujt_cektanggalField = Ext.create('Ext.form.field.Date',{
			id : 'det_iujt_cektanggalField',
			name : 'det_iujt_cektanggal',
			fieldLabel : 'Tanggal Cek',
			format : 'd-m-Y',
			maxValue : new Date('<?php echo date('Y-m-d').'T'.date('H:i:s'); ?>')
		});
		det_iujt_ceknipField = Ext.create('Ext.form.TextField',{
			id : 'det_iujt_ceknipField',
			name : 'det_iujt_ceknip',
			fieldLabel : 'NIP Petugas',
			maxLength : 50
		});
		det_iujt_catatanField = Ext.create('Ext.form.TextArea',{
			id : 'det_iujt_catatanField',
			name : 'det_iujt_catatan',
			fieldLabel : 'Catatan',
			maxLength : 65535
		});
		iujt_usahaField = Ext.create('Ext.form.TextField',{
			id : 'iujt_usahaField',
			name : 'iujt_usaha',
			fieldLabel : 'Usaha',
			maxLength : 50
		});
		iujt_alamatusahaField = Ext.create('Ext.form.TextField',{
			id : 'iujt_alamatusahaField',
			name : 'iujt_alamatusaha',
			fieldLabel : 'Alamat',
			maxLength : 50
		});
		iujt_statusperusahaanField = Ext.create('Ext.form.TextField',{
			id : 'iujt_statusperusahaanField',
			name : 'iujt_statusperusahaan',
			fieldLabel : 'Status',
			maxLength : 50
		});
		iujt_penanggungjawabField = Ext.create('Ext.form.TextField',{
			id : 'iujt_penanggungjawabField',
			name : 'iujt_penanggungjawab',
			fieldLabel : 'Penanggung Jawab',
			maxLength : 50
		});
		iujt_det_syaratDataStore = Ext.create('Ext.data.Store',{
			id : 'iujt_det_syaratDataStore',
			pageSize : globalPageSize,
			autoLoad : true,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_iujt_det/switchAction',
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
				{ name : 'iujt_cek_id', type : 'int', mapping : 'iujt_cek_id' },
				{ name : 'iujt_cek_syarat_id', type : 'int', mapping : 'iujt_cek_syarat_id' },
				{ name : 'iujt_cek_iujtdet_id', type : 'int', mapping : 'iujt_cek_iujtdet_id' },
				{ name : 'iujt_cek_iujt_id', type : 'int', mapping : 'iujt_cek_iujt_id' },
				{ name : 'iujt_cek_status', type : 'boolean', mapping : 'iujt_cek_status' },
				{ name : 'iujt_cek_keterangan', type : 'string', mapping : 'iujt_cek_keterangan' },
				{ name : 'iujt_cek_syarat_nama', type : 'string', mapping : 'iujt_cek_syarat_nama' }
				]
		});
		var det_iujt_syaratGridEditor = new Ext.grid.plugin.CellEditing({
			clicksToEdit: 1
		});
		/* START DATA PEMOHON */
		var iujt_det_pemohon_idField = Ext.create('Ext.form.Hidden',{
			name : 'pemohon_id'
		});
		var iujt_det_pemohon_namaField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_nama',
			fieldLabel : 'Nama',
			maxLength : 50
		});
		var iujt_det_pemohon_alamatField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_alamat',
			fieldLabel : 'Alamat',
			maxLength : 100
		});
		var iujt_det_pemohon_telpField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_telp',
			fieldLabel : 'Telp',
			maxLength : 20,
			maskRe : /([0-9]+)$/
		});
		var iujt_det_pemohon_npwpField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_npwp',
			fieldLabel : 'NPWP',
			maxLength : 50
		});
		var iujt_det_pemohon_rtField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_rt',
			fieldLabel : 'RT',
			maskRe : /([0-9]+)$/
		});
		var iujt_det_pemohon_rwField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_rw',
			fieldLabel : 'RW',
			maskRe : /([0-9]+)$/
		});
		var iujt_det_pemohon_kelField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_kel',
			fieldLabel : 'Kelurahan',
			maxLength : 50
		});
		var iujt_det_pemohon_kecField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_kec',
			fieldLabel : 'Kecamatan',
			maxLength : 50
		});
		var iujt_det_pemohon_nikField = Ext.create('Ext.form.ComboBox',{
			name : 'iujt_det_pemohon_nik',
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
				var store = iujt_det_pemohon_nikField.getStore();
				var val = iujt_det_pemohon_nikField.getRawValue();
				store.proxy.extraParams = {action : 'SEARCH',pemohon_nik : val};
				store.load();
				iujt_det_pemohon_nikField.expand();
				iujt_det_pemohon_nikField.fireEvent("ontriggerclick", this, event);
			},  
			tpl: Ext.create('Ext.XTemplate',
				'<tpl for=".">',
					'<div class="x-boundlist-item">NIK : {pemohon_nik}<br>Nama : {pemohon_nama}<br>Alamat : {pemohon_alamat}<br>Telp : {pemohon_telp}<br></div>',
				'</tpl>'
			),
			listeners : {
				select : function(cmb, record){
					var rec=record[0];
					iujt_det_pemohon_idField.setValue(rec.get('pemohon_id'));
					iujt_det_pemohon_nikField.setValue(rec.get('pemohon_nik'));
					iujt_det_pemohon_namaField.setValue(rec.get('pemohon_nama'));
					iujt_det_pemohon_alamatField.setValue(rec.get('pemohon_alamat'));
					iujt_det_pemohon_telpField.setValue(rec.get('pemohon_telp'));
					iujt_det_pemohon_npwpField.setValue(rec.get('pemohon_npwp'));
					iujt_det_pemohon_rtField.setValue(rec.get('pemohon_rt'));
					iujt_det_pemohon_rwField.setValue(rec.get('pemohon_rw'));
					iujt_det_pemohon_kelField.setValue(rec.get('pemohon_kel'));
					iujt_det_pemohon_kecField.setValue(rec.get('pemohon_kec'));
					iujt_det_pemohon_straField.setValue(rec.get('pemohon_stra'));
					iujt_det_pemohon_surattugasField.setValue(rec.get('pemohon_surattugas'));
					iujt_det_pemohon_pekerjaanField.setValue(rec.get('pemohon_pekerjaan'));
					iujt_det_pemohon_tempatlahirField.setValue(rec.get('pemohon_tempatlahir'));
					iujt_det_pemohon_tanggallahirField.setValue(rec.get('pemohon_tanggallahir'));
					iujt_det_pemohon_user_idField.setValue(rec.get('pemohon_user_id'));
					iujt_det_pemohon_pendidikanField.setValue(rec.get('pemohon_pendidikan'));
					iujt_det_pemohon_tahunlulusField.setValue(rec.get('pemohon_tahunlulus'));
				}
			}
		});
		var iujt_det_pemohon_straField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_stra',
			fieldLabel : 'STRA',
			maxLength : 50
		});
		var iujt_det_pemohon_surattugasField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_surattugas',
			fieldLabel : 'Surat Tugas',
			maxLength : 50
		});
		var iujt_det_pemohon_pekerjaanField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_pekerjaan',
			fieldLabel : 'Pekerjaan',
			maxLength : 50
		});
		var iujt_det_pemohon_tempatlahirField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_tempatlahir',
			fieldLabel : 'Tempat Lahir',
			maxLength : 50
		});
		var iujt_det_pemohon_tanggallahirField = Ext.create('Ext.form.field.Date',{
			name : 'pemohon_tanggallahir',
			fieldLabel : 'Tanggal Lahir',
			format : 'd-m-Y'
		});
		var iujt_det_pemohon_user_idField = Ext.create('Ext.form.Hidden',{
			name : 'pemohon_user_id',
		});
		var iujt_det_pemohon_pendidikanField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_pendidikan',
			fieldLabel : 'Pendidikan',
			maxLength : 50
		});
		var iujt_det_pemohon_tahunlulusField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_tahunlulus',
			fieldLabel : 'Tahun Lulus',
			maxLength : 4,
			maskRe : /([0-9]+)$/
		});
		/* END DATA PEMOHON */
		det_iujt_syaratGrid = Ext.create('Ext.grid.Panel',{
			id : 'det_iujt_syaratGrid',
			store : iujt_det_syaratDataStore,
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
					dataIndex : 'iujt_cek_id',
					width : 100,
					hidden : true,
					sortable : false
				},
				{
					text : 'Syarat',
					dataIndex : 'iujt_cek_syarat_nama',
					width : 150,
					sortable : false
				},
				{
					xtype: 'checkcolumn',
					text: 'Ada?',
					dataIndex: 'iujt_cek_status',
					width: 55,
					stopSelection: false
				},
				{
					text : 'Keterangan',
					dataIndex : 'iujt_cek_keterangan',
					width : 100,
					sortable : false,
					editor: 'textfield',
					flex : 1
				}
			]
		});
		var iujt_det_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : iujt_det_save
		});
		var iujt_det_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				iujt_det_resetForm();
				iujt_det_switchToGrid();
			}
		});
		iujt_det_formPanel = Ext.create('Ext.form.Panel', {
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
						det_iujt_idField,
						det_iujt_iujt_idField,
						det_iujt_jenisField,
						det_iujt_tanggalField,
						det_iujt_sklamaField
					]
				},
				{
					xtype : 'fieldset',
					title : '2. Data Pemohon',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						iujt_det_pemohon_idField,
						iujt_det_pemohon_nikField,
						iujt_det_pemohon_namaField,
						iujt_det_pemohon_alamatField,
						iujt_det_pemohon_telpField,
						iujt_det_pemohon_npwpField,
						iujt_det_pemohon_rtField,
						iujt_det_pemohon_rwField,
						iujt_det_pemohon_kelField,
						iujt_det_pemohon_kecField,
						iujt_det_pemohon_straField,
						iujt_det_pemohon_surattugasField,
						iujt_det_pemohon_pekerjaanField,
						iujt_det_pemohon_tempatlahirField,
						iujt_det_pemohon_tanggallahirField,
						iujt_det_pemohon_user_idField,
						iujt_det_pemohon_pendidikanField,
						iujt_det_pemohon_tahunlulusField
					]
				},
				{
					xtype : 'fieldset',
					title : '3. Data Perusahaan',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						iujt_usahaField,
						iujt_alamatusahaField,
						iujt_statusperusahaanField,
						iujt_penanggungjawabField
					]
				},
				{
					xtype : 'fieldset',
					title : '4. Data Ceklist',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						det_iujt_syaratGrid
					]
				},
				{
					xtype : 'fieldset',
					title : '5. Data Pendukung',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						det_iujt_norekomField,
						det_iujt_tglrekomField,
						det_iujt_skField,
						det_iujt_berlakuField,
						det_iujt_kadaluarsaField,
						det_iujt_surveylulusField,
						det_iujt_nopermohonanField,
						det_iujt_cekpetugasField,
						det_iujt_cektanggalField,
						det_iujt_ceknipField,
						det_iujt_catatanField
					]
				}],
			buttons : [iujt_det_saveButton,iujt_det_cancelButton]
		});
		iujt_det_formWindow = Ext.create('Ext.window.Window',{
			id : 'iujt_det_formWindow',
			renderTo : 'iujt_detSaveWindow',
			title : globalFormAddEditTitle + ' ' + iujt_det_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [iujt_det_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		det_iujt_iujt_idSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_iujt_iujt_idSearchField',
			name : 'det_iujt_iujt_id',
			fieldLabel : 'Id',
			allowNegatife : false,
			hidden : true,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_iujt_jenisSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_iujt_jenisSearchField',
			name : 'det_iujt_jenis',
			fieldLabel : 'Jenis',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_iujt_namaSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_iujt_namaSearchField',
			name : 'det_iujt_nama',
			fieldLabel : 'Nama',
			maxLength : 50
		
		});
		det_iujt_npwpSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_iujt_npwpSearchField',
			name : 'det_iujt_npwp',
			fieldLabel : 'NPWP',
			maxLength : 50
		
		});
		det_iujt_alamatSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_iujt_alamatSearchField',
			name : 'det_iujt_alamat',
			fieldLabel : 'Alamat',
			maxLength : 100
		
		});
		det_iujt_skSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_iujt_skSearchField',
			name : 'det_iujt_sk',
			fieldLabel : 'Nomor SK',
			maxLength : 50
		
		});
		det_iujt_berlakuSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_iujt_berlakuSearchField',
			name : 'det_iujt_berlaku',
			fieldLabel : 'Tgl Berlaku',
			maxLength : 0
		
		});
		det_iujt_kadaluarsaSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_iujt_kadaluarsaSearchField',
			name : 'det_iujt_kadaluarsa',
			fieldLabel : 'Tgl Kadaluarsa',
			maxLength : 0
		
		});
		det_iujt_surveylulusSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_iujt_surveylulusSearchField',
			name : 'det_iujt_surveylulus',
			fieldLabel : 'Lulus Survey ?',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_iujt_tanggalSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_iujt_tanggalSearchField',
			name : 'det_iujt_tanggal',
			fieldLabel : 'Tanggal Survey',
			maxLength : 0
		
		});
		det_iujt_nopermohonanSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_iujt_nopermohonanSearchField',
			name : 'det_iujt_nopermohonan',
			fieldLabel : 'No. Permohonan',
			maxLength : 50
		
		});
		det_iujt_cekpetugasSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_iujt_cekpetugasSearchField',
			name : 'det_iujt_cekpetugas',
			fieldLabel : 'Petugas Cek',
			maxLength : 50
		
		});
		det_iujt_cektanggalSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_iujt_cektanggalSearchField',
			name : 'det_iujt_cektanggal',
			fieldLabel : 'Tanggal Cek',
			maxLength : 0
		
		});
		det_iujt_ceknipSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_iujt_ceknipSearchField',
			name : 'det_iujt_ceknip',
			fieldLabel : 'NIP Petugas',
			maxLength : 50
		
		});
		det_iujt_catatanSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_iujt_catatanSearchField',
			name : 'det_iujt_catatan',
			fieldLabel : 'Catatan',
			maxLength : 65535
		
		});
		var iujt_det_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : iujt_det_search
		});
		var iujt_det_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				iujt_det_searchWindow.hide();
			}
		});
		iujt_det_searchPanel = Ext.create('Ext.form.Panel', {
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
						det_iujt_iujt_idSearchField,
						det_iujt_jenisSearchField,
						det_iujt_namaSearchField,
						det_iujt_npwpSearchField,
						det_iujt_alamatSearchField,
						det_iujt_skSearchField,
						det_iujt_berlakuSearchField,
						det_iujt_kadaluarsaSearchField,
						det_iujt_surveylulusSearchField,
						det_iujt_tanggalSearchField,
						det_iujt_nopermohonanSearchField,
						det_iujt_cekpetugasSearchField,
						det_iujt_cektanggalSearchField,
						det_iujt_ceknipSearchField,
						det_iujt_catatanSearchField,
						]
				}],
			buttons : [iujt_det_searchingButton,iujt_det_cancelSearchButton]
		});
		iujt_det_searchWindow = Ext.create('Ext.window.Window',{
			id : 'iujt_det_searchWindow',
			renderTo : 'iujt_detSearchWindow',
			title : globalFormSearchTitle + ' ' + iujt_det_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [iujt_det_searchPanel]
		});
		<?php if(@$_SESSION['IDHAK'] == 2){ ?>
			iujt_det_lk_printCM.hide();
			iujt_det_rekom_printCM.hide();
			iujt_det_sk_printCM.hide();
			iujt_det_gridPanel.columns[19].setVisible(false);
			iujt_det_gridPanel.columns[20].setVisible(false);
		<?php } ?>
/* End SearchPanel declaration */
});
</script>
<div id="iujt_detSaveWindow"></div>
<div id="iujt_detSearchWindow"></div>
<div class="span12" id="iujt_detGrid"></div>