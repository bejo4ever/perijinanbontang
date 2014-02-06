<style>
	.checked{
		background-image:url(../assets/images/icons/check.png) !important;
	}
</style>
<h4>IZIN PENGAMBILAN MINERAL BUKAN LOGAM DAN BATUAN</h4>
<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var ipmbl_det_componentItemTitle="Izin Pengambilan Mineral Bukan Logam dan Batuan";
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
		var det_ipmbl_jenisField;
		var det_ipmbl_sklamaField;
		var det_ipmbl_tanggalField;
		var det_ipmbl_namaField;
		var det_ipmbl_alamatField;
		var det_ipmbl_kelurahanField;
		var det_ipmbl_kecamatanField;
		var det_ipmbl_kotaField;
		var det_ipmbl_telpField;
		var det_ipmbl_nomoragendaField;
		var det_ipmbl_usahaField;
		var det_ipmbl_alamatusahaField;
		var det_ipmbl_kelurahanusahaField;
		var det_ipmbl_kecamatanusahaField;
		var det_ipmbl_luasField;
		var det_ipmbl_volumeField;
		var det_ipmbl_keperluanField;
		var det_ipmbl_lokasiField;
		var det_ipmbl_berkasmasukField;
		var det_ipmbl_surveytanggalField;
		var det_ipmbl_surveylulusField;
		var det_ipmbl_statusField;
		var det_ipmbl_surveypetugasField;
		var det_ipmbl_surveydinasField;
		var det_ipmbl_surveynipField;
		var det_ipmbl_surveypendapatField;
		var det_ipmbl_rekomblField;
		var det_ipmbl_rekomblhtanggalField;
		var det_ipmbl_rekomkelField;
		var det_ipmbl_rekomkeltanggalField;
		var det_ipmbl_rekomkecField;
		var det_ipmbl_rekomkectanggalField;
		var det_ipmbl_skField;
		var det_ipmbl_kadaluarsaField;
		var det_ipmbl_berlakuField;
				
		var det_ipmbl_ipmbl_idSearchField;
		var det_ipmbl_jenisSearchField;
		var det_ipmbl_tanggalSearchField;
		var det_ipmbl_namaSearchField;
		var det_ipmbl_alamatSearchField;
		var det_ipmbl_kelurahanSearchField;
		var det_ipmbl_kecamatanSearchField;
		var det_ipmbl_kotaSearchField;
		var det_ipmbl_telpSearchField;
		var det_ipmbl_nomoragendaSearchField;
		var det_ipmbl_berkasmasukSearchField;
		var det_ipmbl_surveytanggalSearchField;
		var det_ipmbl_surveylulusSearchField;
		var det_ipmbl_statusSearchField;
		var det_ipmbl_surveypetugasSearchField;
		var det_ipmbl_surveydinasSearchField;
		var det_ipmbl_surveynipSearchField;
		var det_ipmbl_surveypendapatSearchField;
		var det_ipmbl_rekomblSearchField;
		var det_ipmbl_rekomblhtanggalSearchField;
		var det_ipmbl_rekomkelSearchField;
		var det_ipmbl_rekomkeltanggalSearchField;
		var det_ipmbl_rekomkecSearchField;
		var det_ipmbl_rekomkectanggalSearchField;
		var det_ipmbl_skSearchField;
		var det_ipmbl_kadaluarsaSearchField;
		var det_ipmbl_berlakuSearchField;
				
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
			ipmbl_det_syaratDataStore.proxy.extraParams = { 
				currentAction : 'create',
				action : 'GETSYARAT'
			};
			ipmbl_det_syaratDataStore.load();
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
					var det_ipmbl_jenisValue = '';
					var det_ipmbl_lamaValue = '';
					var det_ipmbl_tanggalValue = '';
					var det_ipmbl_namaValue = '';
					var det_ipmbl_alamatValue = '';
					var det_ipmbl_kelurahanValue = '';
					var det_ipmbl_kecamatanValue = '';
					var det_ipmbl_kotaValue = '';
					var det_ipmbl_telpValue = '';
					var det_ipmbl_nomoragendaValue = '';
					var det_ipmbl_berkasmasukValue = '';
					var det_ipmbl_surveytanggalValue = '';
					var det_ipmbl_surveylulusValue = '';
					var det_ipmbl_statusValue = '';
					var det_ipmbl_surveypetugasValue = '';
					var det_ipmbl_surveydinasValue = '';
					var det_ipmbl_surveynipValue = '';
					var det_ipmbl_surveypendapatValue = '';
					var det_ipmbl_rekomblValue = '';
					var det_ipmbl_rekomblhtanggalValue = '';
					var det_ipmbl_rekomkelValue = '';
					var det_ipmbl_rekomkeltanggalValue = '';
					var det_ipmbl_rekomkecValue = '';
					var det_ipmbl_rekomkectanggalValue = '';
					var det_ipmbl_skValue = '';
					var det_ipmbl_kadaluarsaValue = '';
					var det_ipmbl_berlakuValue = '';
					var det_ipmbl_usahaValue = '';
					var det_ipmbl_alamatusahaValue = '';
					var det_ipmbl_kelurahanusahaValue = '';
					var det_ipmbl_kecamatanusahaValue = '';
					var det_ipmbl_luasValue = '';
					var det_ipmbl_volumeValue = '';
					var det_ipmbl_keperluanValue = '';
					var det_ipmbl_lokasiValue = '';
										
					det_ipmbl_idValue = det_ipmbl_idField.getValue();
					det_ipmbl_ipmbl_idValue = det_ipmbl_ipmbl_idField.getValue();
					det_ipmbl_jenisValue = det_ipmbl_jenisField.getValue();
					det_ipmbl_lamaValue = det_ipmbl_sklamaField.getValue();
					det_ipmbl_tanggalValue = det_ipmbl_tanggalField.getValue();
					det_ipmbl_namaValue = det_ipmbl_namaField.getValue();
					det_ipmbl_alamatValue = det_ipmbl_alamatField.getValue();
					det_ipmbl_kelurahanValue = det_ipmbl_kelurahanField.getValue();
					det_ipmbl_kecamatanValue = det_ipmbl_kecamatanField.getValue();
					det_ipmbl_kotaValue = det_ipmbl_kotaField.getValue();
					det_ipmbl_telpValue = det_ipmbl_telpField.getValue();
					det_ipmbl_nomoragendaValue = det_ipmbl_nomoragendaField.getValue();
					det_ipmbl_usahaValue = det_ipmbl_usahaField.getValue();
					det_ipmbl_alamatusahaValue = det_ipmbl_alamatusahaField.getValue();
					det_ipmbl_kelurahanusahaValue = det_ipmbl_kelurahanusahaField.getValue();
					det_ipmbl_kecamatanusahaValue = det_ipmbl_kecamatanusahaField.getValue();
					det_ipmbl_luasValue = det_ipmbl_luasField.getValue();
					det_ipmbl_volumeValue = det_ipmbl_volumeField.getValue();
					det_ipmbl_keperluanValue = det_ipmbl_keperluanField.getValue();
					det_ipmbl_lokasiValue = det_ipmbl_lokasiField.getValue();
					det_ipmbl_berkasmasukValue = det_ipmbl_berkasmasukField.getValue();
					det_ipmbl_surveytanggalValue = det_ipmbl_surveytanggalField.getValue();
					det_ipmbl_surveylulusValue = det_ipmbl_surveylulusField.getValue();
					det_ipmbl_statusValue = det_ipmbl_statusField.getValue();
					det_ipmbl_surveypetugasValue = det_ipmbl_surveypetugasField.getValue();
					det_ipmbl_surveydinasValue = det_ipmbl_surveydinasField.getValue();
					det_ipmbl_surveynipValue = det_ipmbl_surveynipField.getValue();
					det_ipmbl_surveypendapatValue = det_ipmbl_surveypendapatField.getValue();
					det_ipmbl_rekomblValue = det_ipmbl_rekomblField.getValue();
					det_ipmbl_rekomblhtanggalValue = det_ipmbl_rekomblhtanggalField.getValue();
					det_ipmbl_rekomkelValue = det_ipmbl_rekomkelField.getValue();
					det_ipmbl_rekomkeltanggalValue = det_ipmbl_rekomkeltanggalField.getValue();
					det_ipmbl_rekomkecValue = det_ipmbl_rekomkecField.getValue();
					det_ipmbl_rekomkectanggalValue = det_ipmbl_rekomkectanggalField.getValue();
					det_ipmbl_skValue = det_ipmbl_skField.getValue();
					det_ipmbl_kadaluarsaValue = det_ipmbl_kadaluarsaField.getValue();
					det_ipmbl_berlakuValue = det_ipmbl_berlakuField.getValue();
					
					var array_ipmbl_cek_id=new Array();
					var array_ipmbl_cek_syarat_id=new Array();
					var array_ipmbl_cek_status=new Array();
					var array_ipmbl_cek_keterangan=new Array();
					
					if(ipmbl_det_syaratDataStore.getCount() > 0){
						for(var i=0;i<ipmbl_det_syaratDataStore.getCount();i++){
							array_ipmbl_cek_id.push(ipmbl_det_syaratDataStore.getAt(i).data.ipmbl_cek_id);
							array_ipmbl_cek_syarat_id.push(ipmbl_det_syaratDataStore.getAt(i).data.ipmbl_cek_syarat_id);
							array_ipmbl_cek_status.push(ipmbl_det_syaratDataStore.getAt(i).data.ipmbl_cek_status);
							array_ipmbl_cek_keterangan.push(ipmbl_det_syaratDataStore.getAt(i).data.ipmbl_cek_keterangan);
						}
					}
					
					var encoded_ipmbl_cek_id = Ext.encode(array_ipmbl_cek_id);
					var encoded_ipmbl_cek_syarat_id = Ext.encode(array_ipmbl_cek_syarat_id);
					var encoded_ipmbl_cek_status = Ext.encode(array_ipmbl_cek_status);
					var encoded_ipmbl_cek_keterangan = Ext.encode(array_ipmbl_cek_keterangan);
					
					var dok_ipmbl_id = [];
					var dok_ipmbl_penerima = [];
					var dok_ipmbl_jabatan = [];
					var dok_ipmbl_tanggal = [];
					var dok_ipmbl_keterangan = [];
					
					if(det_ipmbl_riwayat_dataStore.getCount() > 0){
						for(var i=0;i<det_ipmbl_riwayat_dataStore.getCount();i++){
							dok_ipmbl_id.push(det_ipmbl_riwayat_dataStore.getAt(i).data.dok_ipmbl_id);
							dok_ipmbl_penerima.push(det_ipmbl_riwayat_dataStore.getAt(i).data.dok_ipmbl_penerima);
							dok_ipmbl_jabatan.push(det_ipmbl_riwayat_dataStore.getAt(i).data.dok_ipmbl_jabatan);
							dok_ipmbl_tanggal.push(det_ipmbl_riwayat_dataStore.getAt(i).data.dok_ipmbl_tanggal);
							dok_ipmbl_keterangan.push(det_ipmbl_riwayat_dataStore.getAt(i).data.dok_ipmbl_keterangan);
						}
					}
					var encoded_dok_ipmbl_id = Ext.encode(dok_ipmbl_id);
					var encoded_dok_ipmbl_penerima = Ext.encode(dok_ipmbl_penerima);
					var encoded_dok_ipmbl_jabatan = Ext.encode(dok_ipmbl_jabatan);
					var encoded_dok_ipmbl_tanggal = Ext.encode(dok_ipmbl_tanggal);
					var encoded_dok_ipmbl_keterangan = Ext.encode(dok_ipmbl_keterangan);
					
					var pemohon_idValue = ipmbl_det_pemohon_idField.getValue();
					var pemohon_namaValue = ipmbl_det_pemohon_namaField.getValue();
					var pemohon_alamatValue = ipmbl_det_pemohon_alamatField.getValue();
					var pemohon_telpValue = ipmbl_det_pemohon_telpField.getValue();
					var pemohon_npwpValue = ipmbl_det_pemohon_npwpField.getValue();
					var pemohon_rtValue = ipmbl_det_pemohon_rtField.getValue();
					var pemohon_rwValue = ipmbl_det_pemohon_rwField.getValue();
					var pemohon_kelValue = ipmbl_det_pemohon_kelField.getValue();
					var pemohon_kecValue = ipmbl_det_pemohon_kecField.getValue();
					var pemohon_nikValue = ipmbl_det_pemohon_nikField.getValue();
					var pemohon_straValue = ipmbl_det_pemohon_straField.getValue();
					var pemohon_surattugasValue = ipmbl_det_pemohon_surattugasField.getValue();
					var pemohon_pekerjaanValue = ipmbl_det_pemohon_pekerjaanField.getValue();
					var pemohon_tempatlahirValue = ipmbl_det_pemohon_tempatlahirField.getValue();
					var pemohon_tanggallahirValue = ipmbl_det_pemohon_tanggallahirField.getValue();
					var pemohon_user_idValue = ipmbl_det_pemohon_user_idField.getValue();
					var pemohon_pendidikanValue = ipmbl_det_pemohon_pendidikanField.getValue();
					var pemohon_tahunlulusValue = ipmbl_det_pemohon_tahunlulusField.getValue();
					var det_ipmbl_retribusiValue = ipmbl_det_retibusiNilaiField.getValue();
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_t_ipmbl_det/switchAction',
						params: {							
							det_ipmbl_id : det_ipmbl_idValue,
							det_ipmbl_ipmbl_id : det_ipmbl_ipmbl_idValue,
							det_ipmbl_jenis : det_ipmbl_jenisValue,
							det_ipmbl_lama : det_ipmbl_lamaValue,
							det_ipmbl_tanggal : det_ipmbl_tanggalValue,
							det_ipmbl_nama : det_ipmbl_namaValue,
							det_ipmbl_alamat : det_ipmbl_alamatValue,
							det_ipmbl_kelurahan : det_ipmbl_kelurahanValue,
							det_ipmbl_kecamatan : det_ipmbl_kecamatanValue,
							det_ipmbl_kota : det_ipmbl_kotaValue,
							det_ipmbl_telp : det_ipmbl_telpValue,
							det_ipmbl_nomoragenda : det_ipmbl_nomoragendaValue,
							det_ipmbl_usaha : det_ipmbl_usahaValue,
							det_ipmbl_alamatusaha : det_ipmbl_alamatusahaValue,
							det_ipmbl_kelurahanusaha : det_ipmbl_kelurahanusahaValue,
							det_ipmbl_kecamatanusaha : det_ipmbl_kecamatanusahaValue,
							det_ipmbl_luas : det_ipmbl_luasValue,
							det_ipmbl_volume : det_ipmbl_volumeValue,
							det_ipmbl_keperluan : det_ipmbl_keperluanValue,
							det_ipmbl_lokasi : det_ipmbl_lokasiValue,
							det_ipmbl_berkasmasuk : det_ipmbl_berkasmasukValue,
							det_ipmbl_surveytanggal : det_ipmbl_surveytanggalValue,
							det_ipmbl_surveylulus : det_ipmbl_surveylulusValue,
							det_ipmbl_status : det_ipmbl_statusValue,
							det_ipmbl_surveypetugas : det_ipmbl_surveypetugasValue,
							det_ipmbl_surveydinas : det_ipmbl_surveydinasValue,
							det_ipmbl_surveynip : det_ipmbl_surveynipValue,
							det_ipmbl_surveypendapat : det_ipmbl_surveypendapatValue,
							det_ipmbl_rekombl : det_ipmbl_rekomblValue,
							det_ipmbl_rekomblhtanggal : det_ipmbl_rekomblhtanggalValue,
							det_ipmbl_rekomkel : det_ipmbl_rekomkelValue,
							det_ipmbl_rekomkeltanggal : det_ipmbl_rekomkeltanggalValue,
							det_ipmbl_rekomkec : det_ipmbl_rekomkecValue,
							det_ipmbl_rekomkectanggal : det_ipmbl_rekomkectanggalValue,
							det_ipmbl_sk : det_ipmbl_skValue,
							det_ipmbl_kadaluarsa : det_ipmbl_kadaluarsaValue,
							det_ipmbl_berlaku : det_ipmbl_berlakuValue,
							ipmbl_cek_id : encoded_ipmbl_cek_id,
							ipmbl_cek_syarat_id : encoded_ipmbl_cek_syarat_id,
							ipmbl_cek_status : encoded_ipmbl_cek_status,
							ipmbl_cek_keterangan : encoded_ipmbl_cek_keterangan,
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
							dok_ipmbl_id : encoded_dok_ipmbl_id,
							dok_ipmbl_penerima : encoded_dok_ipmbl_penerima,
							dok_ipmbl_jabatan : encoded_dok_ipmbl_jabatan,
							dok_ipmbl_tanggal : encoded_dok_ipmbl_tanggal,
							dok_ipmbl_keterangan : encoded_dok_ipmbl_keterangan,
							det_ipmbl_retribusi : det_ipmbl_retribusiValue,
							action : ipmbl_det_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									ipmbl_det_dataStore.reload();
									ipmbl_det_resetForm();
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave, function(){
										window.scrollTo(0,0);
									});
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
											window.location="../index.php";
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
			window.scrollTo(0,0);
		}
		
		function ipmbl_det_setForm(){
			ipmbl_det_dbTask = 'UPDATE';
            ipmbl_det_dbTaskMessage = 'update';
			
			var record = ipmbl_det_gridPanel.getSelectionModel().getSelection()[0];
			det_ipmbl_idField.setValue(record.data.det_ipmbl_id);
			det_ipmbl_ipmbl_idField.setValue(record.data.det_ipmbl_ipmbl_id);
			det_ipmbl_jenisField.setValue(record.data.det_ipmbl_jenis);
			det_ipmbl_tanggalField.setValue(record.data.det_ipmbl_tanggal);
			det_ipmbl_namaField.setValue(record.data.det_ipmbl_nama);
			det_ipmbl_alamatField.setValue(record.data.det_ipmbl_alamat);
			det_ipmbl_kelurahanField.setValue(record.data.det_ipmbl_kelurahan);
			det_ipmbl_kecamatanField.setValue(record.data.det_ipmbl_kecamatan);
			det_ipmbl_kotaField.setValue(record.data.det_ipmbl_kota);
			det_ipmbl_telpField.setValue(record.data.det_ipmbl_telp);
			det_ipmbl_nomoragendaField.setValue(record.data.det_ipmbl_nomoragenda);
			det_ipmbl_usahaField.setValue(record.data.ipmbl_usaha);
			det_ipmbl_alamatusahaField.setValue(record.data.ipmbl_alamatusaha);
			det_ipmbl_kelurahanusahaField.setValue(record.data.ipmbl_kelurahan);
			det_ipmbl_kecamatanusahaField.setValue(record.data.ipmbl_kecamatan);
			det_ipmbl_luasField.setValue(record.data.ipmbl_luas);
			det_ipmbl_volumeField.setValue(record.data.ipmbl_volume);
			det_ipmbl_keperluanField.setValue(record.data.ipmbl_keperluan);
			det_ipmbl_lokasiField.setValue(record.data.ipmbl_lokasi);
			det_ipmbl_berkasmasukField.setValue(record.data.det_ipmbl_berkasmasuk);
			det_ipmbl_surveytanggalField.setValue(record.data.det_ipmbl_surveytanggal);
			det_ipmbl_surveylulusField.setValue(record.data.det_ipmbl_surveylulus);
			det_ipmbl_statusField.setValue(record.data.det_ipmbl_status);
			det_ipmbl_surveypetugasField.setValue(record.data.det_ipmbl_surveypetugas);
			det_ipmbl_surveydinasField.setValue(record.data.det_ipmbl_surveydinas);
			det_ipmbl_surveynipField.setValue(record.data.det_ipmbl_surveynip);
			det_ipmbl_surveypendapatField.setValue(record.data.det_ipmbl_surveypendapat);
			det_ipmbl_rekomblField.setValue(record.data.det_ipmbl_rekombl);
			det_ipmbl_rekomblhtanggalField.setValue(record.data.det_ipmbl_rekomblhtanggal);
			det_ipmbl_rekomkelField.setValue(record.data.det_ipmbl_rekomkel);
			det_ipmbl_rekomkeltanggalField.setValue(record.data.det_ipmbl_rekomkeltanggal);
			det_ipmbl_rekomkecField.setValue(record.data.det_ipmbl_rekomkec);
			det_ipmbl_rekomkectanggalField.setValue(record.data.det_ipmbl_rekomkectanggal);
			det_ipmbl_skField.setValue(record.data.det_ipmbl_sk);
			det_ipmbl_kadaluarsaField.setValue(record.data.det_ipmbl_kadaluarsa);
			det_ipmbl_berlakuField.setValue(record.data.det_ipmbl_berlaku);
			
			if(record.data.det_ipmbl_retribusi != 0){
				ipmbl_det_retribusiField.setValue({ ipmbl_retribusi : ['1'] });
			}else{
				ipmbl_det_retribusiField.setValue({ ipmbl_retribusi : ['0'] });
			}
			ipmbl_det_retibusiNilaiField.setValue(record.data.det_ipmbl_retribusi);
			
			ipmbl_det_pemohon_idField.setValue(record.data.pemohon_id);
			ipmbl_det_pemohon_namaField.setValue(record.data.pemohon_nama);
			ipmbl_det_pemohon_alamatField.setValue(record.data.pemohon_alamat);
			ipmbl_det_pemohon_telpField.setValue(record.data.pemohon_telp);
			ipmbl_det_pemohon_npwpField.setValue(record.data.pemohon_npwp);
			ipmbl_det_pemohon_rtField.setValue(record.data.pemohon_rt);
			ipmbl_det_pemohon_rwField.setValue(record.data.pemohon_rw);
			ipmbl_det_pemohon_kelField.setValue(record.data.pemohon_kel);
			ipmbl_det_pemohon_kecField.setValue(record.data.pemohon_kec);
			ipmbl_det_pemohon_nikField.setValue(record.data.pemohon_nik);
			ipmbl_det_pemohon_straField.setValue(record.data.pemohon_stra);
			ipmbl_det_pemohon_surattugasField.setValue(record.data.pemohon_surattugas);
			ipmbl_det_pemohon_pekerjaanField.setValue(record.data.pemohon_pekerjaan);
			ipmbl_det_pemohon_tempatlahirField.setValue(record.data.pemohon_tempatlahir);
			ipmbl_det_pemohon_tanggallahirField.setValue(record.data.pemohon_tanggallahir);
			ipmbl_det_pemohon_user_idField.setValue(record.data.pemohon_user_id);
			ipmbl_det_pemohon_pendidikanField.setValue(record.data.pemohon_pendidikan);
			ipmbl_det_pemohon_tahunlulusField.setValue(record.data.pemohon_tahunlulus);
			
			ipmbl_det_syaratDataStore.proxy.extraParams = { 
				ipmbl_id : record.data.det_ipmbl_ipmbl_id,
				ipmbl_det_id : record.data.det_ipmbl_id,
				currentAction : 'update',
				action : 'GETSYARAT'
			};
			ipmbl_det_syaratDataStore.load();
			det_ipmbl_riwayat_dataStore.proxy.extraParams = { 
				ipmbl_id : record.data.det_ipmbl_ipmbl_id,
				ipmbl_det_id : record.data.det_ipmbl_id,
				currentAction : 'update',
				action : 'GETRIWAYAT'
			};
			det_ipmbl_riwayat_dataStore.load();
			
		}
		
		function ipmbl_det_showSearchWindow(){
			ipmbl_det_searchWindow.show();
		}
		
		function ipmbl_det_search(){
			ipmbl_det_gridSearchField.reset();
			
			var det_ipmbl_ipmbl_idValue = '';
			var det_ipmbl_jenisValue = '';
			var det_ipmbl_tanggalValue = '';
			var det_ipmbl_namaValue = '';
			var det_ipmbl_alamatValue = '';
			var det_ipmbl_kelurahanValue = '';
			var det_ipmbl_kecamatanValue = '';
			var det_ipmbl_kotaValue = '';
			var det_ipmbl_telpValue = '';
			var det_ipmbl_nomoragendaValue = '';
			var det_ipmbl_berkasmasukValue = '';
			var det_ipmbl_surveytanggalValue = '';
			var det_ipmbl_surveylulusValue = '';
			var det_ipmbl_statusValue = '';
			var det_ipmbl_surveypetugasValue = '';
			var det_ipmbl_surveydinasValue = '';
			var det_ipmbl_surveynipValue = '';
			var det_ipmbl_surveypendapatValue = '';
			var det_ipmbl_rekomblValue = '';
			var det_ipmbl_rekomblhtanggalValue = '';
			var det_ipmbl_rekomkelValue = '';
			var det_ipmbl_rekomkeltanggalValue = '';
			var det_ipmbl_rekomkecValue = '';
			var det_ipmbl_rekomkectanggalValue = '';
			var det_ipmbl_skValue = '';
			var det_ipmbl_kadaluarsaValue = '';
			var det_ipmbl_berlakuValue = '';
						
			det_ipmbl_ipmbl_idValue = det_ipmbl_ipmbl_idSearchField.getValue();
			det_ipmbl_jenisValue = det_ipmbl_jenisSearchField.getValue();
			det_ipmbl_tanggalValue = det_ipmbl_tanggalSearchField.getValue();
			det_ipmbl_namaValue = det_ipmbl_namaSearchField.getValue();
			det_ipmbl_alamatValue = det_ipmbl_alamatSearchField.getValue();
			det_ipmbl_kelurahanValue = det_ipmbl_kelurahanSearchField.getValue();
			det_ipmbl_kecamatanValue = det_ipmbl_kecamatanSearchField.getValue();
			det_ipmbl_kotaValue = det_ipmbl_kotaSearchField.getValue();
			det_ipmbl_telpValue = det_ipmbl_telpSearchField.getValue();
			det_ipmbl_nomoragendaValue = det_ipmbl_nomoragendaSearchField.getValue();
			det_ipmbl_berkasmasukValue = det_ipmbl_berkasmasukSearchField.getValue();
			det_ipmbl_surveytanggalValue = det_ipmbl_surveytanggalSearchField.getValue();
			det_ipmbl_surveylulusValue = det_ipmbl_surveylulusSearchField.getValue();
			det_ipmbl_statusValue = det_ipmbl_statusSearchField.getValue();
			det_ipmbl_surveypetugasValue = det_ipmbl_surveypetugasSearchField.getValue();
			det_ipmbl_surveydinasValue = det_ipmbl_surveydinasSearchField.getValue();
			det_ipmbl_surveynipValue = det_ipmbl_surveynipSearchField.getValue();
			det_ipmbl_surveypendapatValue = det_ipmbl_surveypendapatSearchField.getValue();
			det_ipmbl_rekomblValue = det_ipmbl_rekomblSearchField.getValue();
			det_ipmbl_rekomblhtanggalValue = det_ipmbl_rekomblhtanggalSearchField.getValue();
			det_ipmbl_rekomkelValue = det_ipmbl_rekomkelSearchField.getValue();
			det_ipmbl_rekomkeltanggalValue = det_ipmbl_rekomkeltanggalSearchField.getValue();
			det_ipmbl_rekomkecValue = det_ipmbl_rekomkecSearchField.getValue();
			det_ipmbl_rekomkectanggalValue = det_ipmbl_rekomkectanggalSearchField.getValue();
			det_ipmbl_skValue = det_ipmbl_skSearchField.getValue();
			det_ipmbl_kadaluarsaValue = det_ipmbl_kadaluarsaSearchField.getValue();
			det_ipmbl_berlakuValue = det_ipmbl_berlakuSearchField.getValue();
			ipmbl_det_dbListAction = "SEARCH";
			ipmbl_det_dataStore.proxy.extraParams = { 
				det_ipmbl_ipmbl_id : det_ipmbl_ipmbl_idValue,
				det_ipmbl_jenis : det_ipmbl_jenisValue,
				det_ipmbl_tanggal : det_ipmbl_tanggalValue,
				det_ipmbl_nama : det_ipmbl_namaValue,
				det_ipmbl_alamat : det_ipmbl_alamatValue,
				det_ipmbl_kelurahan : det_ipmbl_kelurahanValue,
				det_ipmbl_kecamatan : det_ipmbl_kecamatanValue,
				det_ipmbl_kota : det_ipmbl_kotaValue,
				det_ipmbl_telp : det_ipmbl_telpValue,
				det_ipmbl_nomoragenda : det_ipmbl_nomoragendaValue,
				det_ipmbl_berkasmasuk : det_ipmbl_berkasmasukValue,
				det_ipmbl_surveytanggal : det_ipmbl_surveytanggalValue,
				det_ipmbl_surveylulus : det_ipmbl_surveylulusValue,
				det_ipmbl_status : det_ipmbl_statusValue,
				det_ipmbl_surveypetugas : det_ipmbl_surveypetugasValue,
				det_ipmbl_surveydinas : det_ipmbl_surveydinasValue,
				det_ipmbl_surveynip : det_ipmbl_surveynipValue,
				det_ipmbl_surveypendapat : det_ipmbl_surveypendapatValue,
				det_ipmbl_rekombl : det_ipmbl_rekomblValue,
				det_ipmbl_rekomblhtanggal : det_ipmbl_rekomblhtanggalValue,
				det_ipmbl_rekomkel : det_ipmbl_rekomkelValue,
				det_ipmbl_rekomkeltanggal : det_ipmbl_rekomkeltanggalValue,
				det_ipmbl_rekomkec : det_ipmbl_rekomkecValue,
				det_ipmbl_rekomkectanggal : det_ipmbl_rekomkectanggalValue,
				det_ipmbl_sk : det_ipmbl_skValue,
				det_ipmbl_kadaluarsa : det_ipmbl_kadaluarsaValue,
				det_ipmbl_berlaku : det_ipmbl_berlakuValue,
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
			var det_ipmbl_jenisValue = '';
			var det_ipmbl_tanggalValue = '';
			var det_ipmbl_namaValue = '';
			var det_ipmbl_alamatValue = '';
			var det_ipmbl_kelurahanValue = '';
			var det_ipmbl_kecamatanValue = '';
			var det_ipmbl_kotaValue = '';
			var det_ipmbl_telpValue = '';
			var det_ipmbl_nomoragendaValue = '';
			var det_ipmbl_berkasmasukValue = '';
			var det_ipmbl_surveytanggalValue = '';
			var det_ipmbl_surveylulusValue = '';
			var det_ipmbl_statusValue = '';
			var det_ipmbl_surveypetugasValue = '';
			var det_ipmbl_surveydinasValue = '';
			var det_ipmbl_surveynipValue = '';
			var det_ipmbl_surveypendapatValue = '';
			var det_ipmbl_rekomblValue = '';
			var det_ipmbl_rekomblhtanggalValue = '';
			var det_ipmbl_rekomkelValue = '';
			var det_ipmbl_rekomkeltanggalValue = '';
			var det_ipmbl_rekomkecValue = '';
			var det_ipmbl_rekomkectanggalValue = '';
			var det_ipmbl_skValue = '';
			var det_ipmbl_kadaluarsaValue = '';
			var det_ipmbl_berlakuValue = '';
			
			if(ipmbl_det_dataStore.proxy.extraParams.query!==null){searchText = ipmbl_det_dataStore.proxy.extraParams.query;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_ipmbl_id!==null){det_ipmbl_ipmbl_idValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_ipmbl_id;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_jenis!==null){det_ipmbl_jenisValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_jenis;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_tanggal!==null){det_ipmbl_tanggalValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_tanggal;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_nama!==null){det_ipmbl_namaValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_nama;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_alamat!==null){det_ipmbl_alamatValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_alamat;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_kelurahan!==null){det_ipmbl_kelurahanValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_kelurahan;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_kecamatan!==null){det_ipmbl_kecamatanValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_kecamatan;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_kota!==null){det_ipmbl_kotaValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_kota;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_telp!==null){det_ipmbl_telpValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_telp;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_nomoragenda!==null){det_ipmbl_nomoragendaValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_nomoragenda;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_berkasmasuk!==null){det_ipmbl_berkasmasukValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_berkasmasuk;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_surveytanggal!==null){det_ipmbl_surveytanggalValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_surveytanggal;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_surveylulus!==null){det_ipmbl_surveylulusValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_surveylulus;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_status!==null){det_ipmbl_statusValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_status;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_surveypetugas!==null){det_ipmbl_surveypetugasValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_surveypetugas;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_surveydinas!==null){det_ipmbl_surveydinasValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_surveydinas;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_surveynip!==null){det_ipmbl_surveynipValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_surveynip;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_surveypendapat!==null){det_ipmbl_surveypendapatValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_surveypendapat;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_rekombl!==null){det_ipmbl_rekomblValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_rekombl;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_rekomblhtanggal!==null){det_ipmbl_rekomblhtanggalValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_rekomblhtanggal;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_rekomkel!==null){det_ipmbl_rekomkelValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_rekomkel;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_rekomkeltanggal!==null){det_ipmbl_rekomkeltanggalValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_rekomkeltanggal;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_rekomkec!==null){det_ipmbl_rekomkecValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_rekomkec;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_rekomkectanggal!==null){det_ipmbl_rekomkectanggalValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_rekomkectanggal;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_sk!==null){det_ipmbl_skValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_sk;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_kadaluarsa!==null){det_ipmbl_kadaluarsaValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_kadaluarsa;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_berlaku!==null){det_ipmbl_berlakuValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_berlaku;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_t_ipmbl_det/switchAction',
				params : {
					action : outputType,
					query : searchText,
					det_ipmbl_ipmbl_id : det_ipmbl_ipmbl_idValue,
					det_ipmbl_jenis : det_ipmbl_jenisValue,
					det_ipmbl_tanggal : det_ipmbl_tanggalValue,
					det_ipmbl_nama : det_ipmbl_namaValue,
					det_ipmbl_alamat : det_ipmbl_alamatValue,
					det_ipmbl_kelurahan : det_ipmbl_kelurahanValue,
					det_ipmbl_kecamatan : det_ipmbl_kecamatanValue,
					det_ipmbl_kota : det_ipmbl_kotaValue,
					det_ipmbl_telp : det_ipmbl_telpValue,
					det_ipmbl_nomoragenda : det_ipmbl_nomoragendaValue,
					det_ipmbl_berkasmasuk : det_ipmbl_berkasmasukValue,
					det_ipmbl_surveytanggal : det_ipmbl_surveytanggalValue,
					det_ipmbl_surveylulus : det_ipmbl_surveylulusValue,
					det_ipmbl_status : det_ipmbl_statusValue,
					det_ipmbl_surveypetugas : det_ipmbl_surveypetugasValue,
					det_ipmbl_surveydinas : det_ipmbl_surveydinasValue,
					det_ipmbl_surveynip : det_ipmbl_surveynipValue,
					det_ipmbl_surveypendapat : det_ipmbl_surveypendapatValue,
					det_ipmbl_rekombl : det_ipmbl_rekomblValue,
					det_ipmbl_rekomblhtanggal : det_ipmbl_rekomblhtanggalValue,
					det_ipmbl_rekomkel : det_ipmbl_rekomkelValue,
					det_ipmbl_rekomkeltanggal : det_ipmbl_rekomkeltanggalValue,
					det_ipmbl_rekomkec : det_ipmbl_rekomkecValue,
					det_ipmbl_rekomkectanggal : det_ipmbl_rekomkectanggalValue,
					det_ipmbl_sk : det_ipmbl_skValue,
					det_ipmbl_kadaluarsa : det_ipmbl_kadaluarsaValue,
					det_ipmbl_berlaku : det_ipmbl_berlakuValue,
					currentAction : ipmbl_det_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('../print/t_ipmbl_det_list.xls');
							}else{
								window.open('../print/t_ipmbl_det_list.html','ipmbl_detlist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
				{ name : 'det_ipmbl_jenis', type : 'int', mapping : 'det_ipmbl_jenis' },
				{ name : 'det_ipmbl_jenis_nama', type : 'string', mapping : 'det_ipmbl_jenis_nama' },
				{ name : 'det_ipmbl_tanggal', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_ipmbl_tanggal' },
				{ name : 'det_ipmbl_nama', type : 'string', mapping : 'det_ipmbl_nama' },
				{ name : 'det_ipmbl_alamat', type : 'string', mapping : 'det_ipmbl_alamat' },
				{ name : 'det_ipmbl_kelurahan', type : 'int', mapping : 'det_ipmbl_kelurahan' },
				{ name : 'det_ipmbl_kecamatan', type : 'int', mapping : 'det_ipmbl_kecamatan' },
				{ name : 'det_ipmbl_kota', type : 'int', mapping : 'det_ipmbl_kota' },
				{ name : 'det_ipmbl_telp', type : 'string', mapping : 'det_ipmbl_telp' },
				{ name : 'det_ipmbl_nomoragenda', type : 'int', mapping : 'det_ipmbl_nomoragenda' },
				{ name : 'det_ipmbl_berkasmasuk', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_ipmbl_berkasmasuk' },
				{ name : 'det_ipmbl_surveytanggal', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_ipmbl_surveytanggal' },
				{ name : 'det_ipmbl_surveylulus', type : 'int', mapping : 'det_ipmbl_surveylulus' },
				{ name : 'det_ipmbl_status', type : 'int', mapping : 'det_ipmbl_status' },
				{ name : 'det_ipmbl_status_nama', type : 'string', mapping : 'det_ipmbl_status_nama' },
				{ name : 'det_ipmbl_surveypetugas', type : 'string', mapping : 'det_ipmbl_surveypetugas' },
				{ name : 'det_ipmbl_surveydinas', type : 'string', mapping : 'det_ipmbl_surveydinas' },
				{ name : 'det_ipmbl_surveynip', type : 'string', mapping : 'det_ipmbl_surveynip' },
				{ name : 'det_ipmbl_surveypendapat', type : 'string', mapping : 'det_ipmbl_surveypendapat' },
				{ name : 'det_ipmbl_rekombl', type : 'string', mapping : 'det_ipmbl_rekombl' },
				{ name : 'det_ipmbl_rekomblhtanggal', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_ipmbl_rekomblhtanggal' },
				{ name : 'det_ipmbl_rekomkel', type : 'string', mapping : 'det_ipmbl_rekomkel' },
				{ name : 'det_ipmbl_rekomkeltanggal', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_ipmbl_rekomkeltanggal' },
				{ name : 'det_ipmbl_rekomkec', type : 'string', mapping : 'det_ipmbl_rekomkec' },
				{ name : 'det_ipmbl_rekomkectanggal', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_ipmbl_rekomkectanggal' },
				{ name : 'det_ipmbl_sk', type : 'string', mapping : 'det_ipmbl_sk' },
				{ name : 'det_ipmbl_kadaluarsa', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_ipmbl_kadaluarsa' },
				{ name : 'det_ipmbl_berlaku', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_ipmbl_berlaku' },
				{ name : 'lamaproses', type : 'string', mapping : 'lamaproses' },
				{ name : 'det_ipmbl_proses', type : 'string', mapping : 'det_ipmbl_proses' },
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
				{ name : 'ipmbl_luas', type : 'float', mapping : 'ipmbl_luas' },
				{ name : 'ipmbl_volume', type : 'float', mapping : 'ipmbl_volume' },
				{ name : 'ipmbl_keperluan', type : 'string', mapping : 'ipmbl_keperluan' },
				{ name : 'ipmbl_lokasi', type : 'string', mapping : 'ipmbl_lokasi' },
				{ name : 'ipmbl_alamat', type : 'string', mapping : 'ipmbl_alamat' },
				{ name : 'ipmbl_kelurahan', type : 'string', mapping : 'ipmbl_kelurahan' },
				{ name : 'ipmbl_kecamatan', type : 'string', mapping : 'ipmbl_kecamatan' },
				{ name : 'ipmbl_status', type : 'int', mapping : 'ipmbl_status' },
				{ name : 'ipmbl_tanggalsurvey', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'ipmbl_tanggalsurvey' },
				{ name : 'ipmbl_usaha', type : 'string', mapping : 'ipmbl_usaha' },
				{ name : 'ipmbl_alamatusaha', type : 'string', mapping : 'ipmbl_alamatusaha' },
				{ name : 'det_ipmbl_retribusi', type : 'int', mapping : 'det_ipmbl_retribusi' }
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
		
		/* Start ContextMenu For Action Column */
		var ipmbl_det_bp_printCM = Ext.create('Ext.menu.Item',{
			text : 'Bukti Penerimaan',
			tooltip : 'Cetak Bukti Penerimaan',
			handler : function(){
				var record = ipmbl_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_ipmbl_det/switchAction',
					params: {
						ipmbldet_id : record.get('det_ipmbl_id'),
						action : 'CETAKBP'
					},success : function(){
						window.open('../print/ipmbl_buktipenerimaan.html');
					}
				});
			}
		});
		var ipmbl_det_sk_printCM = Ext.create('Ext.menu.Item',{
			text : 'Surat Keputusan',
			tooltip : 'Cetak Surat Keputusan',
			handler : function(){
				var record = ipmbl_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_ipmbl_det/switchAction',
					params: {
						ipmbldet_id : record.get('det_ipmbl_id'),
						action : 'CETAKSK'
					},success : function(response){
						var result = response.responseText;
						switch(result){
							case 'success':
								window.open('../print/ipmbl_sk.html');
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
		var ipmbl_det_bap_printCM = Ext.create('Ext.menu.Item',{
			text : 'Berita Acara Pemeriksaan',
			tooltip : 'Cetak Berita Acara Pemeriksaan',
			handler : function(){
				var record = ipmbl_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_ipmbl_det/switchAction',
					params: {
						ipmbldet_id : record.get('det_ipmbl_id'),
						action : 'CETAKBAP'
					},success : function(){
						window.open('../print/ipmbl_bap.html');
					}
				});
			}
		});
		var ipmbl_det_lk_printCM = Ext.create('Ext.menu.Item',{
			text : 'Lembar Kontrol',
			tooltip : 'Cetak Lembar Kontrol',
			handler : function(){
				var record = ipmbl_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_ipmbl_det/switchAction',
					params: {
						ipmbldet_id : record.get('det_ipmbl_id'),
						action : 'CETAKLEMBARKONTROL'
					},success : function(){
						window.open('../print/ipmbl_lembarkontrol.html');
					}
				});
			}
		});
		var ipmbl_det_printContextMenu = Ext.create('Ext.menu.Menu',{
			items: [
				ipmbl_det_bp_printCM,ipmbl_det_lk_printCM,ipmbl_det_bap_printCM,ipmbl_det_sk_printCM
			]
		});
		
		function ipmbl_det_ubahProses(proses){
			var record = ipmbl_det_gridPanel.getSelectionModel().getSelection()[0];
			Ext.Ajax.request({
				waitMsg: 'Please wait...',
				url: 'c_t_ipmbl_det/switchAction',
				params: {
					ipmbldet_id : record.get('det_ipmbl_id'),
					ipmbldet_nosk : record.get('det_ipmbl_sk'),
					proses : proses,
					action : 'UBAHPROSES'
				},success : function(){
					ipmbl_det_dataStore.reload();
				}
			});
		}
		
		var ipmbl_det_prosesContextMenu = Ext.create('Ext.menu.Menu',{
			items: [
				{
					text : 'Selesai, belum diambil',
					tooltip : 'Ubah Menjadi Selesai, belum diambil',
					handler : function(){
						ipmbl_det_ubahProses('Selesai, belum diambil');
					}
				},
				{
					text : 'Selesai, sudah diambil',
					tooltip : 'Ubah Menjadi Selesai, sudah diambil',
					handler : function(){
						ipmbl_det_ubahProses('Selesai, sudah diambil');
					}
				},
				{
					text : 'Ditolak',
					tooltip : 'Ubah Menjadi Ditolak',
					handler : function(){
						ipmbl_det_ubahProses('Ditolak');
					}
				}
			]
		});
		
		/* End ContextMenu For Action Column */
		ipmbl_det_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'ipmbl_det_gridPanel',
			constrain : true,
			store : ipmbl_det_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'ipmbl_detGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : {forceFit:true},
			multiSelect : true,
			keys : ipmbl_det_shorcut,
			columns : [
				{
					text : 'Jenis',
					dataIndex : 'det_ipmbl_jenis_nama',
					width : 100,
					sortable : false
				},
				{
					text : 'Tanggal',
					dataIndex : 'det_ipmbl_tanggal',
					width : 80,
					sortable : false,
					renderer : Ext.util.Format.dateRenderer('d-m-Y')
				},
				{
					text : 'Nama',
					dataIndex : 'pemohon_nama',
					width : 150,
					sortable : false
				},
				{
					text : 'Alamat',
					dataIndex : 'pemohon_alamat',
					width : 200,
					sortable : false,
					flex : 1
				},
				{
					text : 'Telp',
					dataIndex : 'pemohon_telp',
					width : 150,
					sortable : false
				},
				{
					text : 'Usaha',
					dataIndex : 'ipmbl_usaha',
					width : 150,
					sortable : false
				},
				{
					text : 'Nomor SK',
					dataIndex : 'det_ipmbl_sk',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'Kadaluarsa',
					dataIndex : 'det_ipmbl_kadaluarsa',
					width : 100,
					sortable : false,
					renderer : Ext.util.Format.dateRenderer('d-m-Y'),
					hidden : true
				},
				{
					text : 'Berlaku',
					dataIndex : 'det_ipmbl_berlaku',
					width : 100,
					sortable : false,
					renderer : Ext.util.Format.dateRenderer('d-m-Y'),
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
					dataIndex : 'det_ipmbl_proses',
					width : 125,
					sortable : false
				},
				{
					xtype:'actioncolumn',
					text : 'Action',
					hideable : false,
					width:50,
					items: [{
						iconCls: 'icon16x16-edit',
						tooltip: 'Ubah Data',
						handler: function(grid, rowIndex){
							grid.getSelectionModel().select(rowIndex);
							ipmbl_det_confirmUpdate();
						}
					},{
						iconCls: 'icon16x16-delete',
						tooltip: 'Hapus Data',
						handler: function(grid, rowIndex){
							grid.getSelectionModel().select(rowIndex);
							ipmbl_det_confirmDelete();
						}
					}]
				},
				{
					xtype:'actioncolumn',
					text : 'Proses',
					hideable : false,
					width:50,
					items: [{
						iconCls : 'checked',
						tooltip : 'Ubah Status',
						handler: function(grid, rowIndex, colIndex, node, e) {
							e.stopEvent();
							ipmbl_det_prosesContextMenu.showAt(e.getXY());
							return false;
						}
					}]
				},
				{
					xtype:'actioncolumn',
					text : 'Cetak',
					hideable : false,
					width:50,
					items: [{
						iconCls: 'icon16x16-print',
						tooltip: 'Cetak Dokumen',
						handler: function(grid, rowIndex, colIndex, node, e) {
							e.stopEvent();
							ipmbl_det_printContextMenu.showAt(e.getXY());
							return false;
						}
					}]
				}
			],
			tbar : [
				ipmbl_det_addButton,
				ipmbl_det_gridSearchField,
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
			fieldLabel : 'Id <font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		det_ipmbl_ipmbl_idField = Ext.create('Ext.form.NumberField',{
			id : 'det_ipmbl_ipmbl_idField',
			name : 'det_ipmbl_ipmbl_id',
			fieldLabel : 'Id',
			allowNegatife : false,
			blankText : '0',
			hidden : true,
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		det_ipmbl_jenisField = Ext.create('Ext.form.ComboBox',{
			id : 'det_ipmbl_jenisField',
			name : 'det_ipmbl_jenis',
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
						det_ipmbl_sklamaField.show();
					}else{
						det_ipmbl_sklamaField.hide();
					}
				}
			}
		});
		det_ipmbl_sklamaField = Ext.create('Ext.form.ComboBox',{
			name : 'det_ipmbl_sklamaField',
			fieldLabel : 'Nomor SK Lama',
			store : ipmbl_det_dataStore,
			displayField : 'det_ipmbl_sk',
			valueField : 'det_ipmbl_ipmbl_id',
			queryMode : 'remote',
			triggerAction : 'query',
			repeatTriggerClick : true,
			minChars : 100,
			triggerCls : 'x-form-search-trigger',
			forceSelection : false,
			hidden : true,
			onTriggerClick: function(event){
				var store = det_ipmbl_sklamaField.getStore();
				var val = det_ipmbl_sklamaField.getRawValue();
				store.proxy.extraParams = {action : 'SEARCH',det_ipmbl_sk : val};
				store.load();
				det_ipmbl_sklamaField.expand();
				det_ipmbl_sklamaField.fireEvent("ontriggerclick", this, event);
			},  
			tpl: Ext.create('Ext.XTemplate',
				'<tpl for=".">',
					'<div class="x-boundlist-item">SK : {det_ipmbl_sk}<br>Nama Usaha : {ipmbl_usaha}<br>Alamat : {ipmbl_alamatusaha}<br></div>',
				'</tpl>'
			),
			listeners : {
				select : function(cmb, record){
					var rec=record[0];
					ipmbl_det_pemohon_idField.setValue(rec.get('pemohon_id'));
					ipmbl_det_pemohon_nikField.setValue(rec.get('pemohon_nik'));
					ipmbl_det_pemohon_namaField.setValue(rec.get('pemohon_nama'));
					ipmbl_det_pemohon_alamatField.setValue(rec.get('pemohon_alamat'));
					ipmbl_det_pemohon_telpField.setValue(rec.get('pemohon_telp'));
					ipmbl_det_pemohon_npwpField.setValue(rec.get('pemohon_npwp'));
					ipmbl_det_pemohon_rtField.setValue(rec.get('pemohon_rt'));
					ipmbl_det_pemohon_rwField.setValue(rec.get('pemohon_rw'));
					ipmbl_det_pemohon_kelField.setValue(rec.get('pemohon_kel'));
					ipmbl_det_pemohon_kecField.setValue(rec.get('pemohon_kec'));
					ipmbl_det_pemohon_straField.setValue(rec.get('pemohon_stra'));
					ipmbl_det_pemohon_surattugasField.setValue(rec.get('pemohon_surattugas'));
					ipmbl_det_pemohon_pekerjaanField.setValue(rec.get('pemohon_pekerjaan'));
					ipmbl_det_pemohon_tempatlahirField.setValue(rec.get('pemohon_tempatlahir'));
					ipmbl_det_pemohon_tanggallahirField.setValue(rec.get('pemohon_tanggallahir'));
					ipmbl_det_pemohon_user_idField.setValue(rec.get('pemohon_user_id'));
					ipmbl_det_pemohon_pendidikanField.setValue(rec.get('pemohon_pendidikan'));
					ipmbl_det_pemohon_tahunlulusField.setValue(rec.get('pemohon_tahunlulus'));
					det_ipmbl_usahaField.setValue(rec.get('ipmbl_usaha'));
					det_ipmbl_alamatusahaField.setValue(rec.get('ipmbl_alamatusaha'));
					det_ipmbl_kelurahanusahaField.setValue(rec.get('ipmbl_kelurahan'));
					det_ipmbl_kecamatanusahaField.setValue(rec.get('ipmbl_kecamatan'));
					det_ipmbl_luasField.setValue(rec.get('ipmbl_luas'));
					det_ipmbl_volumeField.setValue(rec.get('ipmbl_volume'));
					det_ipmbl_keperluanField.setValue(rec.get('ipmbl_keperluan'));
					det_ipmbl_lokasiField.setValue(rec.get('ipmbl_lokasi'));
					det_ipmbl_rekomblField.setValue(rec.get('det_ipmbl_rekombl'));
					det_ipmbl_rekomblhtanggalField.setValue(rec.get('det_ipmbl_rekomblhtanggal'));
					det_ipmbl_rekomkelField.setValue(rec.get('det_ipmbl_rekomkel'));
					det_ipmbl_rekomkeltanggalField.setValue(rec.get('det_ipmbl_rekomkeltanggal'));
					det_ipmbl_rekomkecField.setValue(rec.get('det_ipmbl_rekomkec'));
					det_ipmbl_rekomkectanggalField.setValue(rec.get('det_ipmbl_rekomkectanggal'));
				}
			}
		});
		det_ipmbl_tanggalField = Ext.create('Ext.form.field.Date',{
			id : 'det_ipmbl_tanggalField',
			name : 'det_ipmbl_tanggal',
			fieldLabel : 'Tanggal <font color=red>*</font>',
			format : 'd-m-Y',
			disabled : true,
			value : new Date('<?php echo date('Y-m-d').'T'.date('H:i:s'); ?>')
		});
		det_ipmbl_namaField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_namaField',
			name : 'det_ipmbl_nama',
			fieldLabel : 'Nama',
			maxLength : 50
		});
		det_ipmbl_alamatField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_alamatField',
			name : 'det_ipmbl_alamat',
			fieldLabel : 'Alamat',
			maxLength : 100
		});
		det_ipmbl_kelurahanField = Ext.create('Ext.form.NumberField',{
			id : 'det_ipmbl_kelurahanField',
			name : 'det_ipmbl_kelurahan',
			fieldLabel : 'Kelurahan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/
		});
		det_ipmbl_kecamatanField = Ext.create('Ext.form.NumberField',{
			id : 'det_ipmbl_kecamatanField',
			name : 'det_ipmbl_kecamatan',
			fieldLabel : 'Kecamatan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		det_ipmbl_kotaField = Ext.create('Ext.form.NumberField',{
			id : 'det_ipmbl_kotaField',
			name : 'det_ipmbl_kota',
			fieldLabel : 'Kota',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		det_ipmbl_telpField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_telpField',
			name : 'det_ipmbl_telp',
			fieldLabel : 'Telp',
			maxLength : 20,
			maskRe : /([0-9]+)$/
		});
		det_ipmbl_nomoragendaField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_nomoragendaField',
			name : 'det_ipmbl_nomoragenda',
			fieldLabel : 'Nomor Agenda',
			blankText : '1',
			maskRe : /([0-9]+)$/
		});
		det_ipmbl_usahaField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_usahaField',
			name : 'det_ipmbl_usaha',
			fieldLabel : 'Nama Usaha',
			maxLength : 50
		});
		det_ipmbl_alamatusahaField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_alamatusahaField',
			name : 'det_ipmbl_alamatusaha',
			fieldLabel : 'Alamat Usaha',
			maxLength : 100
		});
		det_ipmbl_kelurahanusahaField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_kelurahanusahaField',
			name : 'det_ipmbl_kelurahanusaha',
			fieldLabel : 'Kelurahan',
			maxLength : 50
		});
		det_ipmbl_kecamatanusahaField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_kecamatanusahaField',
			name : 'det_ipmbl_kecamatanusaha',
			fieldLabel : 'Kecamatan',
			maxLength : 50
		});
		det_ipmbl_luasField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_luasField',
			name : 'det_ipmbl_luas',
			fieldLabel : 'Luas (m)',
			maskRe : /([0-9]+)$/
		});
		det_ipmbl_volumeField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_volumeField',
			name : 'det_ipmbl_volume',
			fieldLabel : 'Volume (m3)',
			maskRe : /([0-9]+)$/
		});
		det_ipmbl_keperluanField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_keperluanField',
			name : 'det_ipmbl_keperluan',
			fieldLabel : 'Keperluan',
			maxLength : 255
		});
		det_ipmbl_lokasiField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_lokasiField',
			name : 'det_ipmbl_lokasi',
			fieldLabel : 'Lokasi',
			maxLength : 100
		});
		det_ipmbl_berkasmasukField = Ext.create('Ext.form.field.Date',{
			id : 'det_ipmbl_berkasmasukField',
			name : 'det_ipmbl_berkasmasuk',
			fieldLabel : 'Tgl Masuk Berkas',
			format : 'd-m-Y'
		});
		det_ipmbl_surveytanggalField = Ext.create('Ext.form.field.Date',{
			id : 'det_ipmbl_surveytanggalField',
			name : 'det_ipmbl_surveytanggal',
			fieldLabel : 'Tgl Survey',
			format : 'd-m-Y'
		});
		det_ipmbl_surveylulusField = Ext.create('Ext.form.ComboBox',{
			id : 'det_ipmbl_surveylulusField',
			name : 'det_ipmbl_surveylulus',
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
		det_ipmbl_statusField = Ext.create('Ext.form.ComboBox',{
			id : 'det_ipmbl_statusField',
			name : 'det_ipmbl_status',
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
		det_ipmbl_surveypetugasField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_surveypetugasField',
			name : 'det_ipmbl_surveypetugas',
			fieldLabel : 'Petugas',
			maxLength : 50
		});
		det_ipmbl_surveydinasField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_surveydinasField',
			name : 'det_ipmbl_surveydinas',
			fieldLabel : 'Asal Dinas',
			maxLength : 50
		});
		det_ipmbl_surveynipField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_surveynipField',
			name : 'det_ipmbl_surveynip',
			fieldLabel : 'NIP Petugas',
			maxLength : 50
		});
		det_ipmbl_surveypendapatField = Ext.create('Ext.form.TextArea',{
			id : 'det_ipmbl_surveypendapatField',
			name : 'det_ipmbl_surveypendapat',
			fieldLabel : 'Pendapat',
			maxLength : 65535
		});
		det_ipmbl_rekomblField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_rekomblField',
			name : 'det_ipmbl_rekombl',
			fieldLabel : 'Rekom BLH',
			maxLength : 50
		});
		det_ipmbl_rekomblhtanggalField = Ext.create('Ext.form.field.Date',{
			id : 'det_ipmbl_rekomblhtanggalField',
			name : 'det_ipmbl_rekomblhtanggal',
			fieldLabel : 'Tanggal',
			format : 'd-m-Y'
		});
		det_ipmbl_rekomkelField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_rekomkelField',
			name : 'det_ipmbl_rekomkel',
			fieldLabel : 'Rekom Kel.',
			maxLength : 50
		});
		det_ipmbl_rekomkeltanggalField = Ext.create('Ext.form.field.Date',{
			id : 'det_ipmbl_rekomkeltanggalField',
			name : 'det_ipmbl_rekomkeltanggal',
			fieldLabel : 'Tanggal',
			format : 'd-m-Y'
		});
		det_ipmbl_rekomkecField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_rekomkecField',
			name : 'det_ipmbl_rekomkec',
			fieldLabel : 'Rekom Kec.',
			maxLength : 50
		});
		det_ipmbl_rekomkectanggalField = Ext.create('Ext.form.field.Date',{
			id : 'det_ipmbl_rekomkectanggalField',
			name : 'det_ipmbl_rekomkectanggal',
			fieldLabel : 'Tanggal',
			format : 'd-m-Y'
		});
		det_ipmbl_skField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_skField',
			name : 'det_ipmbl_sk',
			fieldLabel : 'Nomor SK',
			maxLength : 50,
			hidden : true
		});
		det_ipmbl_kadaluarsaField = Ext.create('Ext.form.field.Date',{
			id : 'det_ipmbl_kadaluarsaField',
			name : 'det_ipmbl_kadaluarsa',
			fieldLabel : 'Tgl Kadaluarsa',
			format : 'd-m-Y'
		});
		det_ipmbl_berlakuField = Ext.create('Ext.form.field.Date',{
			id : 'det_ipmbl_berlakuField',
			name : 'det_ipmbl_berlaku',
			fieldLabel : 'Tgl Berlaku',
			format : 'd-m-Y',
			hidden : true
		});
		ipmbl_det_syaratDataStore = Ext.create('Ext.data.Store',{
			id : 'ipmbl_det_syaratDataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_ipmbl_det/switchAction',
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
				{ name : 'ipmbl_cek_id', type : 'int', mapping : 'ipmbl_cek_id' },
				{ name : 'ipmbl_cek_syarat_id', type : 'int', mapping : 'ipmbl_cek_syarat_id' },
				{ name : 'ipmbl_cek_ipmbldet_id', type : 'int', mapping : 'ipmbl_cek_ipmbldet_id' },
				{ name : 'ipmbl_cek_ipmbl_id', type : 'int', mapping : 'ipmbl_cek_ipmbl_id' },
				{ name : 'ipmbl_cek_status', type : 'boolean', mapping : 'ipmbl_cek_status' },
				{ name : 'ipmbl_cek_keterangan', type : 'string', mapping : 'ipmbl_cek_keterangan' },
				{ name : 'ipmbl_cek_syarat_nama', type : 'string', mapping : 'ipmbl_cek_syarat_nama' }
				]
		});
		var det_ipmbl_syaratGridEditor = new Ext.grid.plugin.CellEditing({
			clicksToEdit: 1
		});
		det_ipmbl_syaratGrid = Ext.create('Ext.grid.Panel',{
			id : 'det_ipmbl_syaratGrid',
			store : ipmbl_det_syaratDataStore,
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
					dataIndex : 'ipmbl_cek_id',
					width : 100,
					hidden : true,
					hideable : false,
					sortable : false
				},
				{
					text : 'Syarat',
					dataIndex : 'ipmbl_cek_syarat_nama',
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
					dataIndex: 'ipmbl_cek_status',
					width: 55,
					hidden : true,
					hideable : false,
					stopSelection: false
				},
				{
					text : 'Keterangan',
					dataIndex : 'ipmbl_cek_keterangan',
					width : 100,
					sortable : false,
					editor: 'textfield',
					flex : 1
				}
			]
		});
		/* START RIWAYAT DOKUMEN */
		var det_ipmbl_riwayat_dataStore = Ext.create('Ext.data.Store',{
			id : 'ipmbl_det_riwayatDataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_ipmbl_det/switchAction',
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
					action : 'GETRIWAYAT'
				}
			}),
			fields : [
				{ name : 'dok_ipmbl_id', type : 'int', mapping : 'dok_ipmbl_id' },
				{ name : 'dok_ipmbl_penerima', type : 'string', mapping : 'dok_ipmbl_penerima' },
				{ name : 'dok_ipmbl_jabatan', type : 'string', mapping : 'dok_ipmbl_jabatan' },
				{ name : 'dok_ipmbl_tanggal', type : 'date',dateFormat : 'Y-m-d', mapping : 'dok_ipmbl_tanggal' },
				{ name : 'dok_ipmbl_keterangan', type : 'string', mapping : 'dok_ipmbl_keterangan' }
			]
		});
		function det_ipmbl_riwayat_addHandler(){
			det_ipmbl_riwayat_roleRowEditor.cancelEdit();
			var data_det_ipmblDetail = {
				riwayat_id : 0,
				riwayat_nama : '',
				riwayat_keterangan : '',
				riwayat_jumlah : 1,
				riwayat_aktif : 1
			};
			det_ipmbl_riwayat_dataStore.insert(0, data_det_ipmblDetail);
			det_ipmbl_riwayat_roleRowEditor.startEdit(0, 0);
		}
		function det_ipmbl_riwayat_deleteHandler(){
			var sm = det_ipmbl_riwayat_gridPanel.getSelectionModel();
			det_ipmbl_riwayat_roleRowEditor.cancelEdit();
			det_ipmbl_riwayat_dataStore.remove(sm.getSelection());
			if (det_ipmbl_riwayat_dataStore.getCount() > 0) {
				sm.select(0);
			}
		}
		det_ipmbl_riwayat_addEditor = Ext.create('Ext.Button',{
			text: globalAddButtonTitle,
			iconCls: 'icon16x16-add',
			handler : det_ipmbl_riwayat_addHandler
		});
		det_ipmbl_riwayat_deleteEditor = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : det_ipmbl_riwayat_deleteHandler
		});
		var det_ipmbl_riwayat_roleRowEditor = Ext.create('Ext.grid.plugin.RowEditing', {
			clicksToMoveEditor : 1,
			autoCancel : false
		});
		det_ipmbl_riwayat_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'det_ipmbl_riwayat_gridPanel',
			title : 'Data riwayat',
			constrain : true,
			store : det_ipmbl_riwayat_dataStore,
			loadMask : true,
			height : 200,
			width : '100%',
			plugins: [det_ipmbl_riwayat_roleRowEditor],
            enableColLock : false,
			selModel : Ext.selection.Model(),
			multiSelect : false,
			tbar: [det_ipmbl_riwayat_addEditor,det_ipmbl_riwayat_deleteEditor],
			columns : [
				{
					text : 'Penerima',
					dataIndex : 'dok_ipmbl_penerima',
					width : 100,
					sortable : false,
					editor : Ext.create('Ext.form.TextField',{
						maxLength : 50
					})
				},
				{
					text : 'Jabatan',
					dataIndex: 'dok_ipmbl_jabatan',
					width: 100,
					sortable : false,
					editor : Ext.create('Ext.form.TextField',{
						maxLength : 50
					})
				},
				{
					text : 'Tanggal',
					dataIndex: 'dok_ipmbl_tanggal',
					width: 80,
					sortable : false,
					renderer : Ext.util.Format.dateRenderer('d-m-Y'),
					editor : Ext.create('Ext.form.field.Date',{
						maxLength : 50
					})
				},
				{
					text : 'Keterangan',
					dataIndex: 'dok_ipmbl_keterangan',
					width: 200,
					sortable : false,
					flex : 1,
					editor : Ext.create('Ext.form.TextField',{
						maxLength : 50
					})
				}
			]
		});
		
		/* END RIWAYAT DOKUMEN */
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
		/* START DATA PEMOHON */
		var ipmbl_det_pemohon_idField = Ext.create('Ext.form.Hidden',{
			name : 'pemohon_id'
		});
		var ipmbl_det_pemohon_namaField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_nama',
			fieldLabel : 'Nama',
			maxLength : 50
		});
		var ipmbl_det_pemohon_alamatField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_alamat',
			fieldLabel : 'Alamat',
			maxLength : 100
		});
		var ipmbl_det_pemohon_telpField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_telp',
			fieldLabel : 'Telp',
			maxLength : 20,
			maskRe : /([0-9]+)$/
		});
		var ipmbl_det_pemohon_npwpField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_npwp',
			fieldLabel : 'NPWP',
			maxLength : 50
		});
		var ipmbl_det_pemohon_rtField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_rt',
			fieldLabel : 'RT',
			maskRe : /([0-9]+)$/
		});
		var ipmbl_det_pemohon_rwField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_rw',
			fieldLabel : 'RW',
			maskRe : /([0-9]+)$/
		});
		var ipmbl_det_pemohon_kelField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_kel',
			fieldLabel : 'Kelurahan',
			maxLength : 50
		});
		var ipmbl_det_pemohon_kecField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_kec',
			fieldLabel : 'Kecamatan',
			maxLength : 50
		});
		var ipmbl_det_pemohon_nikField = Ext.create('Ext.form.ComboBox',{
			name : 'ipmbl_det_pemohon_nik',
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
				var store = ipmbl_det_pemohon_nikField.getStore();
				var val = ipmbl_det_pemohon_nikField.getRawValue();
				store.proxy.extraParams = {action : 'SEARCH',pemohon_nik : val};
				store.load();
				ipmbl_det_pemohon_nikField.expand();
				ipmbl_det_pemohon_nikField.fireEvent("ontriggerclick", this, event);
			},  
			tpl: Ext.create('Ext.XTemplate',
				'<tpl for=".">',
					'<div class="x-boundlist-item">NIK : {pemohon_nik}<br>Nama : {pemohon_nama}<br>Alamat : {pemohon_alamat}<br>Telp : {pemohon_telp}<br></div>',
				'</tpl>'
			),
			listeners : {
				select : function(cmb, record){
					var rec=record[0];
					ipmbl_det_pemohon_idField.setValue(rec.get('pemohon_id'));
					ipmbl_det_pemohon_nikField.setValue(rec.get('pemohon_nik'));
					ipmbl_det_pemohon_namaField.setValue(rec.get('pemohon_nama'));
					ipmbl_det_pemohon_alamatField.setValue(rec.get('pemohon_alamat'));
					ipmbl_det_pemohon_telpField.setValue(rec.get('pemohon_telp'));
					ipmbl_det_pemohon_npwpField.setValue(rec.get('pemohon_npwp'));
					ipmbl_det_pemohon_rtField.setValue(rec.get('pemohon_rt'));
					ipmbl_det_pemohon_rwField.setValue(rec.get('pemohon_rw'));
					ipmbl_det_pemohon_kelField.setValue(rec.get('pemohon_kel'));
					ipmbl_det_pemohon_kecField.setValue(rec.get('pemohon_kec'));
					ipmbl_det_pemohon_straField.setValue(rec.get('pemohon_stra'));
					ipmbl_det_pemohon_surattugasField.setValue(rec.get('pemohon_surattugas'));
					ipmbl_det_pemohon_pekerjaanField.setValue(rec.get('pemohon_pekerjaan'));
					ipmbl_det_pemohon_tempatlahirField.setValue(rec.get('pemohon_tempatlahir'));
					ipmbl_det_pemohon_tanggallahirField.setValue(rec.get('pemohon_tanggallahir'));
					ipmbl_det_pemohon_user_idField.setValue(rec.get('pemohon_user_id'));
					ipmbl_det_pemohon_pendidikanField.setValue(rec.get('pemohon_pendidikan'));
					ipmbl_det_pemohon_tahunlulusField.setValue(rec.get('pemohon_tahunlulus'));
				}
			}
		});
		var ipmbl_det_pemohon_straField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_stra',
			fieldLabel : 'STRA',
			maxLength : 50,
			hidden : true
		});
		var ipmbl_det_pemohon_surattugasField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_surattugas',
			fieldLabel : 'Surat Tugas',
			maxLength : 50,
			hidden : true
		});
		var ipmbl_det_pemohon_pekerjaanField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_pekerjaan',
			fieldLabel : 'Pekerjaan',
			maxLength : 50
		});
		var ipmbl_det_pemohon_tempatlahirField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_tempatlahir',
			fieldLabel : 'Tempat Lahir',
			maxLength : 50
		});
		var ipmbl_det_pemohon_tanggallahirField = Ext.create('Ext.form.field.Date',{
			name : 'pemohon_tanggallahir',
			fieldLabel : 'Tanggal Lahir',
			format : 'd-m-Y'
		});
		var ipmbl_det_pemohon_user_idField = Ext.create('Ext.form.Hidden',{
			name : 'pemohon_user_id',
		});
		var ipmbl_det_pemohon_pendidikanField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_pendidikan',
			fieldLabel : 'Pendidikan',
			maxLength : 50
		});
		var ipmbl_det_pemohon_tahunlulusField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_tahunlulus',
			fieldLabel : 'Tahun Lulus',
			maxLength : 4,
			maskRe : /([0-9]+)$/
		});
		var ipmbl_det_pendukungfieldset = Ext.create('Ext.form.FieldSet',{
			title : '6. Data Pendukung',
			checkboxToggle : false,
			collapsible : false,
			layout :'form',
			items : [
				det_ipmbl_nomoragendaField,
				det_ipmbl_berkasmasukField,
				det_ipmbl_surveytanggalField,
				det_ipmbl_surveylulusField,
				det_ipmbl_statusField,
				det_ipmbl_surveypetugasField,
				det_ipmbl_surveydinasField,
				det_ipmbl_surveynipField,
				det_ipmbl_surveypendapatField,
				det_ipmbl_skField,
				det_ipmbl_berlakuField,
				det_ipmbl_kadaluarsaField
			]
		});
		var ipmbl_det_riwayatfieldset = Ext.create('Ext.form.FieldSet',{
			title : '4. Data Riwayat',
			checkboxToggle : false,
			collapsible : false,
			layout :'form',
			items : [
				det_ipmbl_riwayat_gridPanel
			]
		});
		/* END DATA PEMOHON */
		/* START DATA RETRIBUSI */
		var ipmbl_det_retribusiField = Ext.create('Ext.form.RadioGroup',{
			fieldLabel : 'Retribusi ',
			vertical : false,
			items : [
				{ boxLabel : 'Gratis', name : 'ipmbl_retribusi', inputValue : '0', checked : true},
				{ boxLabel : 'Bayar', name : 'ipmbl_retribusi', inputValue : '1'}
			],
			listeners : {
				change : function(com, newval, oldval, e){
					if(newval.ipmbl_retribusi == 1){
						ipmbl_det_retibusiNilaiField.show();
					}else{
						ipmbl_det_retibusiNilaiField.hide();
					}
				}
			}
		});
		var ipmbl_det_retibusiNilaiField = Ext.create('Ext.form.TextField',{
			name : 'ipmbl_det_retibusiNilai',
			fieldLabel : 'Nominal Retribusi ',
			maxLength : 100,
			hidden : true,
			value : 0
		});
		var ipmbl_det_retribusifieldset = Ext.create('Ext.form.FieldSet',{
			title : '6. Data Retribusi',
			columnWidth : 0.5,
			checkboxToggle : false,
			collapsible : false,
			layout :'form',
			items : [
				ipmbl_det_retribusiField,
				ipmbl_det_retibusiNilaiField
			]
		});
		/* END DATA RETRIBUSI */
		ipmbl_det_formPanel = Ext.create('Ext.form.Panel', {
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
					xtype : 'container',
					layout : 'hbox',
					style : {borderWidth :'0px'},
					defaultType : 'textfield',
					defaults : {anchor : '95%'},
					layout : 'anchor',
					flex : 2,
					items : [
						{
							xtype : 'fieldset',
							title : '1. Data Permohonan',
							checkboxToggle : false,
							collapsible : false,
							layout :'form',
							items : [								
								det_ipmbl_idField,
								det_ipmbl_ipmbl_idField,
								det_ipmbl_jenisField,
								det_ipmbl_sklamaField,
								det_ipmbl_tanggalField
							]
						},
						{
							xtype : 'fieldset',
							title : '2. Data Pemohon',
							checkboxToggle : false,
							collapsible : false,
							layout :'form',
							items : [
								ipmbl_det_pemohon_idField,
								ipmbl_det_pemohon_nikField,
								ipmbl_det_pemohon_namaField,
								ipmbl_det_pemohon_alamatField,
								ipmbl_det_pemohon_telpField,
								ipmbl_det_pemohon_npwpField,
								ipmbl_det_pemohon_rtField,
								ipmbl_det_pemohon_rwField,
								ipmbl_det_pemohon_kelField,
								ipmbl_det_pemohon_kecField,
								ipmbl_det_pemohon_straField,
								ipmbl_det_pemohon_surattugasField,
								ipmbl_det_pemohon_pekerjaanField,
								ipmbl_det_pemohon_tempatlahirField,
								ipmbl_det_pemohon_tanggallahirField,
								ipmbl_det_pemohon_user_idField,
								ipmbl_det_pemohon_pendidikanField,
								ipmbl_det_pemohon_tahunlulusField						
							]
						},
						{
							xtype : 'fieldset',
							title : '3. Data Perusahaan dan Keperluan',
							checkboxToggle : false,
							collapsible : false,
							layout :'form',
							items : [
								det_ipmbl_usahaField,
								det_ipmbl_alamatusahaField,
								det_ipmbl_kelurahanusahaField,
								det_ipmbl_kecamatanusahaField,
								det_ipmbl_luasField,
								det_ipmbl_volumeField,
								det_ipmbl_keperluanField,
								det_ipmbl_lokasiField
							]
						},
						{
							xtype : 'fieldset',
							title : '4. Data Ceklist',
							checkboxToggle : false,
							collapsible : false,
							layout :'form',
							items : [
								det_ipmbl_syaratGrid
							]
						},
						{
							xtype : 'fieldset',
							title : '5. Data Rekomendasi',
							checkboxToggle : false,
							collapsible : false,
							layout :'form',
							items : [
								det_ipmbl_rekomblField,
								det_ipmbl_rekomblhtanggalField,
								det_ipmbl_rekomkelField,
								det_ipmbl_rekomkeltanggalField,
								det_ipmbl_rekomkecField,
								det_ipmbl_rekomkectanggalField
							]
						},
						ipmbl_det_riwayatfieldset,ipmbl_det_pendukungfieldset,ipmbl_det_retribusifieldset,
						Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })
					]
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
			fieldLabel : 'Id',
			allowNegatife : false,
			hidden : true,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_ipmbl_jenisSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_ipmbl_jenisSearchField',
			name : 'det_ipmbl_jenis',
			fieldLabel : 'Jenis',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_ipmbl_tanggalSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_tanggalSearchField',
			name : 'det_ipmbl_tanggal',
			fieldLabel : 'Tanggal',
			maxLength : 0
		
		});
		det_ipmbl_namaSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_namaSearchField',
			name : 'det_ipmbl_nama',
			fieldLabel : 'Nama',
			maxLength : 50
		
		});
		det_ipmbl_alamatSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_alamatSearchField',
			name : 'det_ipmbl_alamat',
			fieldLabel : 'Alamat',
			maxLength : 100
		
		});
		det_ipmbl_kelurahanSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_ipmbl_kelurahanSearchField',
			name : 'det_ipmbl_kelurahan',
			fieldLabel : 'Kelurahan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_ipmbl_kecamatanSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_ipmbl_kecamatanSearchField',
			name : 'det_ipmbl_kecamatan',
			fieldLabel : 'Kecamatan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_ipmbl_kotaSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_ipmbl_kotaSearchField',
			name : 'det_ipmbl_kota',
			fieldLabel : 'Kota',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_ipmbl_telpSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_telpSearchField',
			name : 'det_ipmbl_telp',
			fieldLabel : 'Telp',
			maxLength : 20
		
		});
		det_ipmbl_nomoragendaSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_ipmbl_nomoragendaSearchField',
			name : 'det_ipmbl_nomoragenda',
			fieldLabel : 'No. Agenda',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_ipmbl_berkasmasukSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_berkasmasukSearchField',
			name : 'det_ipmbl_berkasmasuk',
			fieldLabel : 'Tgl Masuk Berkas',
			maxLength : 0
		
		});
		det_ipmbl_surveytanggalSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_surveytanggalSearchField',
			name : 'det_ipmbl_surveytanggal',
			fieldLabel : 'Tgl Survey',
			maxLength : 0
		
		});
		det_ipmbl_surveylulusSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_surveylulusSearchField',
			name : 'det_ipmbl_surveylulus',
			fieldLabel : 'Lulus/Tidak',
			maxLength : 255
		
		});
		det_ipmbl_statusSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_statusSearchField',
			name : 'det_ipmbl_status',
			fieldLabel : 'Status',
			maxLength : 255
		
		});
		det_ipmbl_surveypetugasSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_surveypetugasSearchField',
			name : 'det_ipmbl_surveypetugas',
			fieldLabel : 'Petugas Survey',
			maxLength : 50
		
		});
		det_ipmbl_surveydinasSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_surveydinasSearchField',
			name : 'det_ipmbl_surveydinas',
			fieldLabel : 'Asal Dinas',
			maxLength : 50
		
		});
		det_ipmbl_surveynipSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_surveynipSearchField',
			name : 'det_ipmbl_surveynip',
			fieldLabel : 'NIP Petugas',
			maxLength : 50
		
		});
		det_ipmbl_surveypendapatSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_surveypendapatSearchField',
			name : 'det_ipmbl_surveypendapat',
			fieldLabel : 'Pendapat',
			maxLength : 65535
		
		});
		det_ipmbl_rekomblSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_rekomblSearchField',
			name : 'det_ipmbl_rekombl',
			fieldLabel : 'Rekomendasi BLH',
			maxLength : 50
		
		});
		det_ipmbl_rekomblhtanggalSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_rekomblhtanggalSearchField',
			name : 'det_ipmbl_rekomblhtanggal',
			fieldLabel : 'Tanggal',
			maxLength : 0
		
		});
		det_ipmbl_rekomkelSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_rekomkelSearchField',
			name : 'det_ipmbl_rekomkel',
			fieldLabel : 'Rekomendasi Kel.',
			maxLength : 50
		
		});
		det_ipmbl_rekomkeltanggalSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_rekomkeltanggalSearchField',
			name : 'det_ipmbl_rekomkeltanggal',
			fieldLabel : 'Tanggal',
			maxLength : 0
		
		});
		det_ipmbl_rekomkecSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_rekomkecSearchField',
			name : 'det_ipmbl_rekomkec',
			fieldLabel : 'Rekomendasi Kec.',
			maxLength : 50
		
		});
		det_ipmbl_rekomkectanggalSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_rekomkectanggalSearchField',
			name : 'det_ipmbl_rekomkectanggal',
			fieldLabel : 'Tanggal',
			maxLength : 0
		
		});
		det_ipmbl_skSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_skSearchField',
			name : 'det_ipmbl_sk',
			fieldLabel : 'Nomor SK',
			maxLength : 50
		
		});
		det_ipmbl_kadaluarsaSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_kadaluarsaSearchField',
			name : 'det_ipmbl_kadaluarsa',
			fieldLabel : 'Tgl Kadaluarsa',
			maxLength : 0
		
		});
		det_ipmbl_berlakuSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_berlakuSearchField',
			name : 'det_ipmbl_berlaku',
			fieldLabel : 'Tgl Berlaku',
			maxLength : 0
		
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
						det_ipmbl_jenisSearchField,
						det_ipmbl_tanggalSearchField,
						det_ipmbl_namaSearchField,
						det_ipmbl_alamatSearchField,
						det_ipmbl_kelurahanSearchField,
						det_ipmbl_kecamatanSearchField,
						det_ipmbl_kotaSearchField,
						det_ipmbl_telpSearchField,
						det_ipmbl_nomoragendaSearchField,
						det_ipmbl_berkasmasukSearchField,
						det_ipmbl_surveytanggalSearchField,
						det_ipmbl_surveylulusSearchField,
						det_ipmbl_statusSearchField,
						det_ipmbl_surveypetugasSearchField,
						det_ipmbl_surveydinasSearchField,
						det_ipmbl_surveynipSearchField,
						det_ipmbl_surveypendapatSearchField,
						det_ipmbl_rekomblSearchField,
						det_ipmbl_rekomblhtanggalSearchField,
						det_ipmbl_rekomkelSearchField,
						det_ipmbl_rekomkeltanggalSearchField,
						det_ipmbl_rekomkecSearchField,
						det_ipmbl_rekomkectanggalSearchField,
						det_ipmbl_skSearchField,
						det_ipmbl_kadaluarsaSearchField,
						det_ipmbl_berlakuSearchField,
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
		<?php if(@$_SESSION['IDHAK'] == 2){ ?>
			ipmbl_det_lk_printCM.hide();
			ipmbl_det_bap_printCM.hide();
			ipmbl_det_sk_printCM.hide();
			ipmbl_det_pendukungfieldset.hide();
			ipmbl_det_riwayatfieldset.hide();
			ipmbl_det_gridPanel.columns[11].setVisible(false);
			ipmbl_det_gridPanel.columns[12].setVisible(false);
		<?php } ?>
/* End SearchPanel declaration */
});
</script>
<div id="ipmbl_detSaveWindow"></div>
<div id="ipmbl_detSearchWindow"></div>
<div class="span12" id="ipmbl_detGrid"></div>