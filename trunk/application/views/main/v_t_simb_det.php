<style>
	.checked{
		background-image:url(../assets/images/icons/check.png) !important;
	}
</style>
<h4>IZIN MINUMAN BERALKOHOL</h4>
<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var simb_det_componentItemTitle="Izin Minuman Beralkohol";
		var simb_det_dataStore;
		
		var simb_det_shorcut;
		var simb_det_contextMenu;
		var simb_det_gridSearchField;
		var simb_det_gridPanel;
		var simb_det_formPanel;
		var simb_det_formWindow;
		var simb_det_searchPanel;
		var simb_det_searchWindow;
		
		var det_simb_idField;
		var det_simb_simb_idField;
		var det_simb_jenisField;
		var det_simb_tanggalField;
		var det_simb_pemohon_idField;
		var det_simb_nomorregField;
		var det_simb_prosesField;
		var det_simb_skField;
		var det_simb_berlakuField;
		var det_simb_kadaluarsaField;
		var det_simb_penerimaField;
		var det_simb_tanggalterimaField;
		var det_simb_keteranganField;
		var simb_per_npwpSearchField;
		var simb_per_namaSearchField;
		var simb_per_aktaSearchField;
		var simb_per_bentukSearchField;
		var simb_per_alamatSearchField;
		var simb_per_kelSearchField;
		var simb_per_kecSearchField;
		var simb_per_kotaSearchField;
		var simb_per_telpSearchField;
		var simb_jenisSearchField;
		var simb_statusSearchField;
		var simb_jenisusahaSearchField;
		var simb_panjangSearchField;
		var simb_lebarSearchField;
		var simb_alamatSearchField;
		var simb_kelSearchField;
		var simb_kecSearchField;
		var simb_bentukSearchField;
		var simb_lokasiSearchField;
		var simb_gangguanSearchField;
		var simb_batasutaraSearchField;
		var simb_batastimurSearchField;
		var simb_batasselatanSearchField;
		var simb_batasbaratSearchField;
				
		var det_simb_simb_idSearchField;
		var det_simb_jenisSearchField;
		var det_simb_tanggalSearchField;
		var det_simb_pemohon_idSearchField;
		var det_simb_nomorregSearchField;
		var det_simb_prosesSearchField;
		var det_simb_skSearchField;
		var det_simb_berlakuSearchField;
		var det_simb_kadaluarsaSearchField;
		var det_simb_penerimaSearchField;
		var det_simb_tanggalterimaSearchField;
		var det_simb_keteranganSearchField;
				
		var simb_det_dbTask = 'CREATE';
		var simb_det_dbTaskMessage = 'Tambah';
		var simb_det_dbPermission = 'CRUD';
		var simb_det_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function simb_det_switchToGrid(){
			simb_det_formPanel.setDisabled(true);
			simb_det_gridPanel.setDisabled(false);
			simb_det_formWindow.hide();
		}
		
		function simb_det_switchToForm(){
			simb_det_gridPanel.setDisabled(true);
			simb_det_formPanel.setDisabled(false);
			simb_det_formWindow.show();
		}
		
		function simb_det_confirmAdd(){
			simb_det_dbTask = 'CREATE';
			simb_det_dbTaskMessage = 'created';
			simb_det_resetForm();
			simb_det_syaratDataStore.proxy.extraParams = { 
				currentAction : 'create',
				action : 'GETSYARAT'
			};
			simb_det_syaratDataStore.load();
			simb_det_switchToForm();
		}
		
		function simb_det_confirmUpdate(){
			if(simb_det_gridPanel.selModel.getCount() == 1) {
				simb_det_dbTask = 'UPDATE';
				simb_det_dbTaskMessage = 'updated';
				simb_det_switchToForm();
				simb_det_setForm();
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
		
		function simb_det_confirmDelete(){
			if(simb_det_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, simb_det_delete);
			}else if(simb_det_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, simb_det_delete);
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
		
		function simb_det_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(simb_det_dbPermission)==false && pattC.test(simb_det_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(simb_det_confirmFormValid()){
					var det_simb_idValue = '';
					var det_simb_simb_idValue = '';
					var det_simb_jenisValue = '';
					var det_simb_tanggalValue = '';
					var det_simb_pemohon_idValue = '';
					var det_simb_nomorregValue = '';
					var det_simb_prosesValue = '';
					var det_simb_skValue = '';
					var det_simb_berlakuValue = '';
					var det_simb_kadaluarsaValue = '';
					var det_simb_penerimaValue = '';
					var det_simb_tanggalterimaValue = '';
					var det_simb_keteranganValue = '';
					var simb_per_npwpValue = '';
					var simb_per_namaValue = '';
					var simb_per_aktaValue = '';
					var simb_per_bentukValue = '';
					var simb_per_alamatValue = '';
					var simb_per_kelValue = '';
					var simb_per_kecValue = '';
					var simb_per_kotaValue = '';
					var simb_per_telpValue = '';
					var simb_jenisValue = '';
					var simb_statusValue = '';
					var simb_jenisusahaValue = '';
					var simb_panjangValue = '';
					var simb_lebarValue = '';
					var simb_alamatValue = '';
					var simb_kelValue = '';
					var simb_kecValue = '';
					var simb_bentukValue = '';
					var simb_lokasiValue = '';
					var simb_gangguanValue = '';
					var simb_batasutaraValue = '';
					var simb_batastimurValue = '';
					var simb_batasselatanValue = '';
					var simb_batasbaratValue = '';
										
					det_simb_idValue = det_simb_idField.getValue();
					det_simb_simb_idValue = det_simb_simb_idField.getValue();
					det_simb_jenisValue = det_simb_jenisField.getValue();
					det_simb_tanggalValue = det_simb_tanggalField.getValue();
					det_simb_pemohon_idValue = det_simb_pemohon_idField.getValue();
					det_simb_nomorregValue = det_simb_nomorregField.getValue();
					det_simb_prosesValue = det_simb_prosesField.getValue();
					det_simb_skValue = det_simb_skField.getValue();
					det_simb_berlakuValue = det_simb_berlakuField.getValue();
					det_simb_kadaluarsaValue = det_simb_kadaluarsaField.getValue();
					det_simb_penerimaValue = det_simb_penerimaField.getValue();
					det_simb_tanggalterimaValue = det_simb_tanggalterimaField.getValue();
					det_simb_keteranganValue = det_simb_keteranganField.getValue();
					simb_per_npwpValue = simb_per_npwpField.getValue();
					simb_per_namaValue = simb_per_namaField.getValue();
					simb_per_aktaValue = simb_per_aktaField.getValue();
					simb_per_bentukValue = simb_per_bentukField.getValue();
					simb_per_alamatValue = simb_per_alamatField.getValue();
					simb_per_kelValue = simb_per_kelField.getValue();
					simb_per_kecValue = simb_per_kecField.getValue();
					simb_per_kotaValue = simb_per_kotaField.getValue();
					simb_per_telpValue = simb_per_telpField.getValue();
					simb_jenisValue = simb_jenisField.getValue();
					simb_statusValue = simb_statusField.getValue();
					simb_jenisusahaValue = simb_jenisusahaField.getValue();
					simb_panjangValue = simb_panjangField.getValue();
					simb_lebarValue = simb_lebarField.getValue();
					simb_alamatValue = simb_alamatField.getValue();
					simb_kelValue = simb_kelField.getValue();
					simb_kecValue = simb_kecField.getValue();
					simb_bentukValue = simb_bentukField.getValue();
					simb_lokasiValue = simb_lokasiField.getValue();
					simb_gangguanValue = simb_gangguanField.getValue();
					simb_batasutaraValue = simb_batasutaraField.getValue();
					simb_batastimurValue = simb_batastimurField.getValue();
					simb_batasselatanValue = simb_batasselatanField.getValue();
					simb_batasbaratValue = simb_batasbaratField.getValue();
					
					var pemohon_idValue = simb_det_pemohon_idField.getValue();
					var pemohon_namaValue = simb_det_pemohon_namaField.getValue();
					var pemohon_alamatValue = simb_det_pemohon_alamatField.getValue();
					var pemohon_telpValue = simb_det_pemohon_telpField.getValue();
					var pemohon_npwpValue = simb_det_pemohon_npwpField.getValue();
					var pemohon_rtValue = simb_det_pemohon_rtField.getValue();
					var pemohon_rwValue = simb_det_pemohon_rwField.getValue();
					var pemohon_kelValue = simb_det_pemohon_kelField.getValue();
					var pemohon_kecValue = simb_det_pemohon_kecField.getValue();
					var pemohon_nikValue = simb_det_pemohon_nikField.getValue();
					var pemohon_straValue = simb_det_pemohon_straField.getValue();
					var pemohon_surattugasValue = simb_det_pemohon_surattugasField.getValue();
					var pemohon_pekerjaanValue = simb_det_pemohon_pekerjaanField.getValue();
					var pemohon_tempatlahirValue = simb_det_pemohon_tempatlahirField.getValue();
					var pemohon_tanggallahirValue = simb_det_pemohon_tanggallahirField.getValue();
					var pemohon_user_idValue = simb_det_pemohon_user_idField.getValue();
					var pemohon_pendidikanValue = simb_det_pemohon_pendidikanField.getValue();
					var pemohon_tahunlulusValue = simb_det_pemohon_tahunlulusField.getValue();
					var array_simb_cek_id=new Array();
					var array_simb_cek_syarat_id=new Array();
					var array_simb_cek_status=new Array();
					var array_simb_cek_keterangan=new Array();
					
					if(simb_det_syaratDataStore.getCount() > 0){
						for(var i=0;i<simb_det_syaratDataStore.getCount();i++){
							array_simb_cek_id.push(simb_det_syaratDataStore.getAt(i).data.simb_cek_id);
							array_simb_cek_syarat_id.push(simb_det_syaratDataStore.getAt(i).data.simb_cek_syarat_id);
							array_simb_cek_status.push(simb_det_syaratDataStore.getAt(i).data.simb_cek_status);
							array_simb_cek_keterangan.push(simb_det_syaratDataStore.getAt(i).data.simb_cek_keterangan);
						}
					}
					
					var encoded_simb_cek_id = Ext.encode(array_simb_cek_id);
					var encoded_simb_cek_syarat_id = Ext.encode(array_simb_cek_syarat_id);
					var encoded_simb_cek_status = Ext.encode(array_simb_cek_status);
					var encoded_simb_cek_keterangan = Ext.encode(array_simb_cek_keterangan);
					var det_simb_retribusiValue = simb_det_retibusiNilaiField.getValue();
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_t_simb_det/switchAction',
						params: {							
							det_simb_id : det_simb_idValue,
							det_simb_simb_id : det_simb_simb_idValue,
							det_simb_jenis : det_simb_jenisValue,
							det_simb_tanggal : det_simb_tanggalValue,
							det_simb_pemohon_id : det_simb_pemohon_idValue,
							det_simb_nomorreg : det_simb_nomorregValue,
							det_simb_proses : det_simb_prosesValue,
							det_simb_sk : det_simb_skValue,
							det_simb_berlaku : det_simb_berlakuValue,
							det_simb_kadaluarsa : det_simb_kadaluarsaValue,
							det_simb_penerima : det_simb_penerimaValue,
							det_simb_tanggalterima : det_simb_tanggalterimaValue,
							det_simb_keterangan : det_simb_keteranganValue,
							simb_per_npwp : simb_per_npwpValue,
							simb_per_nama : simb_per_namaValue,
							simb_per_akta : simb_per_aktaValue,
							simb_per_bentuk : simb_per_bentukValue,
							simb_per_alamat : simb_per_alamatValue,
							simb_per_kel : simb_per_kelValue,
							simb_per_kec : simb_per_kecValue,
							simb_per_kota : simb_per_kotaValue,
							simb_per_telp : simb_per_telpValue,
							simb_jenis : simb_jenisValue,
							simb_status : simb_statusValue,
							simb_jenisusaha : simb_jenisusahaValue,
							simb_panjang : simb_panjangValue,
							simb_lebar : simb_lebarValue,
							simb_alamat : simb_alamatValue,
							simb_kel : simb_kelValue,
							simb_kec : simb_kecValue,
							simb_bentuk : simb_bentukValue,
							simb_lokasi : simb_lokasiValue,
							simb_gangguan : simb_gangguanValue,
							simb_batasutara : simb_batasutaraValue,
							simb_batastimur : simb_batastimurValue,
							simb_batasselatan : simb_batasselatanValue,
							simb_batasbarat : simb_batasbaratValue,
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
							simb_cek_id : encoded_simb_cek_id,
							simb_cek_syarat_id : encoded_simb_cek_syarat_id,
							simb_cek_status : encoded_simb_cek_status,
							simb_cek_keterangan : encoded_simb_cek_keterangan,
							det_simb_retribusi : det_simb_retribusiValue,
							action : simb_det_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									simb_det_dataStore.reload();
									simb_det_resetForm();
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave, function(){
										window.scrollTo(0,0);
									});
									simb_det_switchToGrid();
									simb_det_gridPanel.getSelectionModel().deselectAll();
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
		
		function simb_det_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(simb_det_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = simb_det_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< simb_det_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.det_simb_id);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_t_simb_det/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									simb_det_dataStore.reload();
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
		
		function simb_det_refresh(){
			simb_det_dbListAction = "GETLIST";
			simb_det_gridSearchField.reset();
			simb_det_searchPanel.getForm().reset();
			simb_det_dataStore.proxy.extraParams = { action : 'GETLIST' };
			simb_det_dataStore.proxy.extraParams.query = "";
			simb_det_dataStore.currentPage = 1;
			simb_det_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function simb_det_confirmFormValid(){
			return simb_det_formPanel.getForm().isValid();
		}
		
		function simb_det_resetForm(){
			simb_det_dbTask = 'CREATE';
			simb_det_dbTaskMessage = 'create';
			simb_det_formPanel.getForm().reset();
			det_simb_idField.setValue(0);
			window.scrollTo(0,0);
		}
		
		function simb_det_setForm(){
			simb_det_dbTask = 'UPDATE';
            simb_det_dbTaskMessage = 'update';
			
			var record = simb_det_gridPanel.getSelectionModel().getSelection()[0];
			det_simb_idField.setValue(record.data.det_simb_id);
			det_simb_simb_idField.setValue(record.data.det_simb_simb_id);
			det_simb_jenisField.setValue(record.data.det_simb_jenis);
			det_simb_tanggalField.setValue(record.data.det_simb_tanggal);
			det_simb_pemohon_idField.setValue(record.data.det_simb_pemohon_id);
			det_simb_nomorregField.setValue(record.data.det_simb_nomorreg);
			det_simb_prosesField.setValue(record.data.det_simb_proses);
			det_simb_skField.setValue(record.data.det_simb_sk);
			det_simb_berlakuField.setValue(record.data.det_simb_berlaku);
			det_simb_kadaluarsaField.setValue(record.data.det_simb_kadaluarsa);
			det_simb_penerimaField.setValue(record.data.det_simb_penerima);
			det_simb_tanggalterimaField.setValue(record.data.det_simb_tanggalterima);
			det_simb_keteranganField.setValue(record.data.det_simb_keterangan);
			simb_per_npwpField.setValue(record.data.simb_per_npwp);
			simb_per_namaField.setValue(record.data.simb_per_nama);
			simb_per_aktaField.setValue(record.data.simb_per_akta);
			simb_per_bentukField.setValue(record.data.simb_per_bentuk);
			simb_per_alamatField.setValue(record.data.simb_per_alamat);
			simb_per_kelField.setValue(record.data.simb_per_kel);
			simb_per_kecField.setValue(record.data.simb_per_kec);
			simb_per_kotaField.setValue(record.data.simb_per_kota);
			simb_per_telpField.setValue(record.data.simb_per_telp);
			simb_jenisField.setValue(record.data.simb_jenis);
			simb_statusField.setValue(record.data.simb_status);
			simb_jenisusahaField.setValue(record.data.simb_jenisusaha);
			simb_panjangField.setValue(record.data.simb_panjang);
			simb_lebarField.setValue(record.data.simb_lebar);
			simb_alamatField.setValue(record.data.simb_alamat);
			simb_kelField.setValue(record.data.simb_kel);
			simb_kecField.setValue(record.data.simb_kec);
			simb_bentukField.setValue(record.data.simb_bentuk);
			simb_lokasiField.setValue(record.data.simb_lokasi);
			simb_gangguanField.setValue(record.data.simb_gangguan);
			simb_batasutaraField.setValue(record.data.simb_batasutara);
			simb_batastimurField.setValue(record.data.simb_batastimur);
			simb_batasselatanField.setValue(record.data.simb_batasselatan);
			simb_batasbaratField.setValue(record.data.simb_batasbarat);
			
			if(record.data.det_simb_retribusi != 0){
				simb_det_retribusiField.setValue({ simb_retribusi : ['1'] });
			}else{
				simb_det_retribusiField.setValue({ simb_retribusi : ['0'] });
			}
			simb_det_retibusiNilaiField.setValue(record.data.det_simb_retribusi);
			
			simb_det_pemohon_idField.setValue(record.data.pemohon_id);
			simb_det_pemohon_namaField.setValue(record.data.pemohon_nama);
			simb_det_pemohon_alamatField.setValue(record.data.pemohon_alamat);
			simb_det_pemohon_telpField.setValue(record.data.pemohon_telp);
			simb_det_pemohon_npwpField.setValue(record.data.pemohon_npwp);
			simb_det_pemohon_rtField.setValue(record.data.pemohon_rt);
			simb_det_pemohon_rwField.setValue(record.data.pemohon_rw);
			simb_det_pemohon_kelField.setValue(record.data.pemohon_kel);
			simb_det_pemohon_kecField.setValue(record.data.pemohon_kec);
			simb_det_pemohon_nikField.setValue(record.data.pemohon_nik);
			simb_det_pemohon_straField.setValue(record.data.pemohon_stra);
			simb_det_pemohon_surattugasField.setValue(record.data.pemohon_surattugas);
			simb_det_pemohon_pekerjaanField.setValue(record.data.pemohon_pekerjaan);
			simb_det_pemohon_tempatlahirField.setValue(record.data.pemohon_tempatlahir);
			simb_det_pemohon_tanggallahirField.setValue(record.data.pemohon_tanggallahir);
			simb_det_pemohon_user_idField.setValue(record.data.pemohon_user_id);
			simb_det_pemohon_pendidikanField.setValue(record.data.pemohon_pendidikan);
			simb_det_pemohon_tahunlulusField.setValue(record.data.pemohon_tahunlulus);
			
			simb_det_syaratDataStore.proxy.extraParams = { 
				simb_id : record.data.det_simb_simb_id,
				simb_det_id : record.data.det_simb_id,
				currentAction : 'update',
				action : 'GETSYARAT'
			};
			simb_det_syaratDataStore.load();
		}
		
		function simb_det_showSearchWindow(){
			simb_det_searchWindow.show();
		}
		
		function simb_det_search(){
			simb_det_gridSearchField.reset();
			
			var det_simb_simb_idValue = '';
			var det_simb_jenisValue = '';
			var det_simb_tanggalValue = '';
			var det_simb_pemohon_idValue = '';
			var det_simb_nomorregValue = '';
			var det_simb_prosesValue = '';
			var det_simb_skValue = '';
			var det_simb_berlakuValue = '';
			var det_simb_kadaluarsaValue = '';
			var det_simb_penerimaValue = '';
			var det_simb_tanggalterimaValue = '';
			var det_simb_keteranganValue = '';
						
			det_simb_simb_idValue = det_simb_simb_idSearchField.getValue();
			det_simb_jenisValue = det_simb_jenisSearchField.getValue();
			det_simb_tanggalValue = det_simb_tanggalSearchField.getValue();
			det_simb_pemohon_idValue = det_simb_pemohon_idSearchField.getValue();
			det_simb_nomorregValue = det_simb_nomorregSearchField.getValue();
			det_simb_prosesValue = det_simb_prosesSearchField.getValue();
			det_simb_skValue = det_simb_skSearchField.getValue();
			det_simb_berlakuValue = det_simb_berlakuSearchField.getValue();
			det_simb_kadaluarsaValue = det_simb_kadaluarsaSearchField.getValue();
			det_simb_penerimaValue = det_simb_penerimaSearchField.getValue();
			det_simb_tanggalterimaValue = det_simb_tanggalterimaSearchField.getValue();
			det_simb_keteranganValue = det_simb_keteranganSearchField.getValue();
			simb_det_dbListAction = "SEARCH";
			simb_det_dataStore.proxy.extraParams = { 
				det_simb_simb_id : det_simb_simb_idValue,
				det_simb_jenis : det_simb_jenisValue,
				det_simb_tanggal : det_simb_tanggalValue,
				det_simb_pemohon_id : det_simb_pemohon_idValue,
				det_simb_nomorreg : det_simb_nomorregValue,
				det_simb_proses : det_simb_prosesValue,
				det_simb_sk : det_simb_skValue,
				det_simb_berlaku : det_simb_berlakuValue,
				det_simb_kadaluarsa : det_simb_kadaluarsaValue,
				det_simb_penerima : det_simb_penerimaValue,
				det_simb_tanggalterima : det_simb_tanggalterimaValue,
				det_simb_keterangan : det_simb_keteranganValue,
				action : 'SEARCH'
			};
			simb_det_dataStore.currentPage = 1;
			simb_det_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function simb_det_printExcel(outputType){
			var searchText = "";
			var det_simb_simb_idValue = '';
			var det_simb_jenisValue = '';
			var det_simb_tanggalValue = '';
			var det_simb_pemohon_idValue = '';
			var det_simb_nomorregValue = '';
			var det_simb_prosesValue = '';
			var det_simb_skValue = '';
			var det_simb_berlakuValue = '';
			var det_simb_kadaluarsaValue = '';
			var det_simb_penerimaValue = '';
			var det_simb_tanggalterimaValue = '';
			var det_simb_keteranganValue = '';
			
			if(simb_det_dataStore.proxy.extraParams.query!==null){searchText = simb_det_dataStore.proxy.extraParams.query;}
			if(simb_det_dataStore.proxy.extraParams.det_simb_simb_id!==null){det_simb_simb_idValue = simb_det_dataStore.proxy.extraParams.det_simb_simb_id;}
			if(simb_det_dataStore.proxy.extraParams.det_simb_jenis!==null){det_simb_jenisValue = simb_det_dataStore.proxy.extraParams.det_simb_jenis;}
			if(simb_det_dataStore.proxy.extraParams.det_simb_tanggal!==null){det_simb_tanggalValue = simb_det_dataStore.proxy.extraParams.det_simb_tanggal;}
			if(simb_det_dataStore.proxy.extraParams.det_simb_pemohon_id!==null){det_simb_pemohon_idValue = simb_det_dataStore.proxy.extraParams.det_simb_pemohon_id;}
			if(simb_det_dataStore.proxy.extraParams.det_simb_nomorreg!==null){det_simb_nomorregValue = simb_det_dataStore.proxy.extraParams.det_simb_nomorreg;}
			if(simb_det_dataStore.proxy.extraParams.det_simb_proses!==null){det_simb_prosesValue = simb_det_dataStore.proxy.extraParams.det_simb_proses;}
			if(simb_det_dataStore.proxy.extraParams.det_simb_sk!==null){det_simb_skValue = simb_det_dataStore.proxy.extraParams.det_simb_sk;}
			if(simb_det_dataStore.proxy.extraParams.det_simb_berlaku!==null){det_simb_berlakuValue = simb_det_dataStore.proxy.extraParams.det_simb_berlaku;}
			if(simb_det_dataStore.proxy.extraParams.det_simb_kadaluarsa!==null){det_simb_kadaluarsaValue = simb_det_dataStore.proxy.extraParams.det_simb_kadaluarsa;}
			if(simb_det_dataStore.proxy.extraParams.det_simb_penerima!==null){det_simb_penerimaValue = simb_det_dataStore.proxy.extraParams.det_simb_penerima;}
			if(simb_det_dataStore.proxy.extraParams.det_simb_tanggalterima!==null){det_simb_tanggalterimaValue = simb_det_dataStore.proxy.extraParams.det_simb_tanggalterima;}
			if(simb_det_dataStore.proxy.extraParams.det_simb_keterangan!==null){det_simb_keteranganValue = simb_det_dataStore.proxy.extraParams.det_simb_keterangan;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_t_simb_det/switchAction',
				params : {
					action : outputType,
					query : searchText,
					det_simb_simb_id : det_simb_simb_idValue,
					det_simb_jenis : det_simb_jenisValue,
					det_simb_tanggal : det_simb_tanggalValue,
					det_simb_pemohon_id : det_simb_pemohon_idValue,
					det_simb_nomorreg : det_simb_nomorregValue,
					det_simb_proses : det_simb_prosesValue,
					det_simb_sk : det_simb_skValue,
					det_simb_berlaku : det_simb_berlakuValue,
					det_simb_kadaluarsa : det_simb_kadaluarsaValue,
					det_simb_penerima : det_simb_penerimaValue,
					det_simb_tanggalterima : det_simb_tanggalterimaValue,
					det_simb_keterangan : det_simb_keteranganValue,
					currentAction : simb_det_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('../print/t_simb_det_list.xls');
							}else{
								window.open('../print/t_simb_det_list.html','simb_detlist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		simb_det_dataStore = Ext.create('Ext.data.Store',{
			id : 'simb_det_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_simb_det/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'det_simb_id'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'det_simb_id', type : 'int', mapping : 'det_simb_id' },
				{ name : 'det_simb_simb_id', type : 'string', mapping : 'det_simb_simb_id' },
				{ name : 'det_simb_jenis', type : 'int', mapping : 'det_simb_jenis' },
				{ name : 'det_simb_tanggal', type : 'string', mapping : 'det_simb_tanggal' },
				{ name : 'det_simb_pemohon_id', type : 'int', mapping : 'det_simb_pemohon_id' },
				{ name : 'det_simb_nomorreg', type : 'string', mapping : 'det_simb_nomorreg' },
				{ name : 'det_simb_proses', type : 'string', mapping : 'det_simb_proses' },
				{ name : 'lamaproses', type : 'string', mapping : 'lamaproses' },
				{ name : 'det_simb_sk', type : 'string', mapping : 'det_simb_sk' },
				{ name : 'det_simb_berlaku', type : 'string', mapping : 'det_simb_berlaku' },
				{ name : 'det_simb_kadaluarsa', type : 'string', mapping : 'det_simb_kadaluarsa' },
				{ name : 'det_simb_penerima', type : 'string', mapping : 'det_simb_penerima' },
				{ name : 'det_simb_tanggalterima', type : 'string', mapping : 'det_simb_tanggalterima' },
				{ name : 'det_simb_keterangan', type : 'string', mapping : 'det_simb_keterangan' },
				{ name : 'simb_per_npwp', type : 'string', mapping : 'simb_per_npwp' },
				{ name : 'simb_per_nama', type : 'string', mapping : 'simb_per_nama' },
				{ name : 'simb_per_akta', type : 'string', mapping : 'simb_per_akta' },
				{ name : 'simb_per_bentuk', type : 'int', mapping : 'simb_per_bentuk' },
				{ name : 'simb_per_alamat', type : 'string', mapping : 'simb_per_alamat' },
				{ name : 'simb_per_kel', type : 'string', mapping : 'simb_per_kel' },
				{ name : 'simb_per_kec', type : 'string', mapping : 'simb_per_kec' },
				{ name : 'simb_per_kota', type : 'string', mapping : 'simb_per_kota' },
				{ name : 'simb_per_telp', type : 'string', mapping : 'simb_per_telp' },
				{ name : 'simb_jenis', type : 'string', mapping : 'simb_jenis' },
				{ name : 'simb_status', type : 'int', mapping : 'simb_status' },
				{ name : 'simb_jenisusaha', type : 'string', mapping : 'simb_jenisusaha' },
				{ name : 'simb_panjang', type : 'int', mapping : 'simb_panjang' },
				{ name : 'simb_lebar', type : 'int', mapping : 'simb_lebar' },
				{ name : 'simb_alamat', type : 'string', mapping : 'simb_alamat' },
				{ name : 'simb_kel', type : 'string', mapping : 'simb_kel' },
				{ name : 'simb_kec', type : 'string', mapping : 'simb_kec' },
				{ name : 'simb_bentuk', type : 'int', mapping : 'simb_bentuk' },
				{ name : 'simb_lokasi', type : 'int', mapping : 'simb_lokasi' },
				{ name : 'simb_gangguan', type : 'int', mapping : 'simb_gangguan' },
				{ name : 'simb_batasutara', type : 'string', mapping : 'simb_batasutara' },
				{ name : 'simb_batastimur', type : 'string', mapping : 'simb_batastimur' },
				{ name : 'simb_batasselatan', type : 'string', mapping : 'simb_batasselatan' },
				{ name : 'simb_batasbarat', type : 'string', mapping : 'simb_batasbarat' },
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
				{ name : 'det_simb_retribusi', type : 'int', mapping : 'det_simb_retribusi' }
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		simb_det_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						simb_det_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						simb_det_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						simb_det_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						simb_det_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						simb_det_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						simb_det_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						simb_det_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						simb_det_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var simb_det_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : simb_det_confirmAdd
		});
		var simb_det_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : simb_det_confirmUpdate
		});
		var simb_det_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : simb_det_confirmDelete
		});
		var simb_det_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : simb_det_refresh
		});
		var simb_det_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : simb_det_showSearchWindow
		});
		var simb_det_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				simb_det_printExcel('PRINT');
			}
		});
		var simb_det_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				simb_det_printExcel('EXCEL');
			}
		});
		
		var simb_det_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : simb_det_confirmUpdate
		});
		var simb_det_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : simb_det_confirmDelete
		});
		var simb_det_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : simb_det_refresh
		});
		simb_det_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'simb_det_contextMenu',
			items: [
				simb_det_contextMenuEdit,simb_det_contextMenuDelete,'-',simb_det_contextMenuRefresh
			]
		});
		
		var simb_det_bp_printCM = Ext.create('Ext.menu.Item',{
			text : 'Bukti Penerimaan',
			tooltip : 'Cetak Bukti Penerimaan',
			handler : function(){
				var record = simb_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_simb_det/switchAction',
					params: {
						simbdet_id : record.get('det_simb_id'),
						action : 'CETAKBP'
					},success : function(){
						window.open('../print/simb_buktipenerimaan.html');
					}
				});
			}
		});
		var simb_det_sk_printCM = Ext.create('Ext.menu.Item',{
			text : 'Surat Keputusan',
			tooltip : 'Cetak Surat Keputusan',
			handler : function(){
				var record = simb_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_simb_det/switchAction',
					params: {
						simbdet_id : record.get('det_simb_id'),
						action : 'CETAKSK'
					},success : function(response){
						var result = response.responseText;
						switch(result){
							case 'success':
								window.open('../print/simb_sk.html');
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
		var simb_det_bap_printCM = Ext.create('Ext.menu.Item',{
			text : 'Rekomendasi',
			tooltip : 'Cetak Rekomendasi',
			handler : function(){
				var record = simb_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_simb_det/switchAction',
					params: {
						simbdet_id : record.get('det_simb_id'),
						action : 'CETAKREKOMENDASI'
					},success : function(){
						window.open('../print/simb_rekomendasi.html');
					}
				});
			}
		});
		var simb_det_lk_printCM = Ext.create('Ext.menu.Item',{
			text : 'Lembar Kontrol',
			tooltip : 'Cetak Lembar Kontrol',
			handler : function(){
				var record = simb_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_simb_det/switchAction',
					params: {
						simbdet_id : record.get('det_simb_id'),
						action : 'CETAKLEMBARKONTROL'
					},success : function(){
						window.open('../print/simb_lembarkontrol.html');
					}
				});
			}
		});
		var simb_det_printContextMenu = Ext.create('Ext.menu.Menu',{
			items: [
				simb_det_bp_printCM,simb_det_lk_printCM,simb_det_bap_printCM,simb_det_sk_printCM
			]
		});
		function simb_det_ubahProses(proses){
			var record = simb_det_gridPanel.getSelectionModel().getSelection()[0];
			Ext.Ajax.request({
				waitMsg: 'Please wait...',
				url: 'c_t_simb_det/switchAction',
				params: {
					simbdet_id : record.get('det_simb_id'),
					simbdet_nosk : record.get('det_simb_sk'),
					proses : proses,
					action : 'UBAHPROSES'
				},success : function(){
					simb_det_dataStore.reload();
				}
			});
		}
		
		var simb_det_prosesContextMenu = Ext.create('Ext.menu.Menu',{
			items: [
				{
					text : 'Selesai, belum diambil',
					tooltip : 'Ubah Menjadi Selesai, belum diambil',
					handler : function(){
						simb_det_ubahProses('Selesai, belum diambil');
					}
				},
				{
					text : 'Selesai, sudah diambil',
					tooltip : 'Ubah Menjadi Selesai, sudah diambil',
					handler : function(){
						simb_det_ubahProses('Selesai, sudah diambil');
					}
				},
				{
					text : 'Ditolak',
					tooltip : 'Ubah Menjadi Ditolak',
					handler : function(){
						simb_det_ubahProses('Ditolak');
					}
				}
			]
		});
		simb_det_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : simb_det_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						simb_det_dataStore.proxy.extraParams = { action : 'GETLIST'};
						simb_det_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		simb_det_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'simb_det_gridPanel',
			constrain : true,
			store : simb_det_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'simb_detGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						simb_det_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : simb_det_shorcut,
			columns : [
				{
					text : 'Jenis Permohonan',
					dataIndex : 'det_simb_jenis',
					width : 100,
					sortable : false,
					renderer : function(value){
						if(value == 1){
							return 'BARU';
						}else{
							return 'PERPANJANGAN';
						}
					}
				},
				{
					text : 'Tanggal',
					dataIndex : 'det_simb_tanggal',
					width : 100,
					sortable : false,
					renderer : Ext.util.Format.dateRenderer('d-m-Y')
				},
				{
					text : 'Pemohon',
					dataIndex : 'pemohon_nama',
					width : 200,
					sortable : false
				},
				{
					text : 'Alamat',
					dataIndex : 'pemohon_alamat',
					width : 100,
					flex : 1,
					sortable : false
				},
				{
					text : 'Telp',
					dataIndex : 'pemohon_telp',
					width : 100,
					sortable : false
				},
				{
					text : 'Perusahaan',
					dataIndex : 'simb_per_nama',
					width : 100,
					sortable : false
				},
				{
					text : 'Nomor SK',
					dataIndex : 'det_simb_sk',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'Berlaku',
					dataIndex : 'det_simb_berlaku',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'Kadaluarsa',
					dataIndex : 'det_simb_kadaluarsa',
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
					dataIndex : 'det_simb_proses',
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
							simb_det_confirmUpdate();
						}
					},{
						iconCls: 'icon16x16-delete',
						tooltip: 'Hapus Data',
						handler: function(grid, rowIndex){
							grid.getSelectionModel().select(rowIndex);
							simb_det_confirmDelete();
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
							simb_det_prosesContextMenu.showAt(e.getXY());
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
							simb_det_printContextMenu.showAt(e.getXY());
							return false;
						}
					}]
				}
			],
			tbar : [
				simb_det_addButton,
				simb_det_gridSearchField,
				simb_det_refreshButton,
				simb_det_printButton,
				simb_det_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : simb_det_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					simb_det_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		det_simb_idField = Ext.create('Ext.form.NumberField',{
			id : 'det_simb_idField',
			name : 'det_simb_id',
			fieldLabel : 'Id <font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		det_simb_simb_idField = Ext.create('Ext.form.TextField',{
			id : 'det_simb_simb_idField',
			name : 'det_simb_simb_id',
			fieldLabel : 'det_simb_simb_id',
			hidden : true,
			maxLength : 255
		});
		det_simb_jenisField = Ext.create('Ext.form.ComboBox',{
			id : 'det_simb_jenisField',
			name : 'det_simb_jenis',
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
						det_simb_sklamaField.show();
					}else{
						det_simb_sklamaField.hide();
					}
				}
			}
		});
		det_simb_sklamaField = Ext.create('Ext.form.ComboBox',{
			name : 'det_simb_sklamaField',
			fieldLabel : 'Nomor SK Lama',
			store : simb_det_dataStore,
			displayField : 'det_simb_sk',
			valueField : 'det_simb_simb_id',
			queryMode : 'remote',
			triggerAction : 'query',
			repeatTriggerClick : true,
			minChars : 100,
			triggerCls : 'x-form-search-trigger',
			forceSelection : false,
			hidden : true,
			onTriggerClick: function(event){
				var store = det_simb_sklamaField.getStore();
				var val = det_simb_sklamaField.getRawValue();
				store.proxy.extraParams = {action : 'SEARCH',det_simb_sk : val};
				store.load();
				det_simb_sklamaField.expand();
				det_simb_sklamaField.fireEvent("ontriggerclick", this, event);
			},  
			tpl: Ext.create('Ext.XTemplate',
				'<tpl for=".">',
					'<div class="x-boundlist-item">SK : {det_simb_sk}<br>Nama Praktek : {simb_nama}<br>Alamat : {simb_alamat}<br></div>',
				'</tpl>'
			),
			listeners : {
				select : function(cmb, record){
					var rec=record[0];
					// simb_det_pemohon_idField.setValue(rec.get('pemohon_id'));
				}
			}
		});
		det_simb_tanggalField = Ext.create('Ext.form.field.Date',{
			id : 'det_simb_tanggalField',
			name : 'det_simb_tanggal',
			fieldLabel : 'Tanggal <font color=red>*</font>',
			format : 'd-m-Y',
			disabled : true,
			value : new Date('<?php echo date('Y-m-d').'T'.date('H:i:s'); ?>')
		});
		det_simb_pemohon_idField = Ext.create('Ext.form.NumberField',{
			id : 'det_simb_pemohon_idField',
			name : 'det_simb_pemohon_id',
			fieldLabel : 'det_simb_pemohon_id',
			allowNegatife : false,
			blankText : '0',
			hidden : true,
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		det_simb_nomorregField = Ext.create('Ext.form.TextField',{
			id : 'det_simb_nomorregField',
			name : 'det_simb_nomorreg',
			fieldLabel : 'det_simb_nomorreg',
			hidden : true,
			maxLength : 255
		});
		det_simb_prosesField = Ext.create('Ext.form.TextField',{
			id : 'det_simb_prosesField',
			name : 'det_simb_proses',
			fieldLabel : 'det_simb_proses',
			hidden : true,
			maxLength : 255
		});
		det_simb_skField = Ext.create('Ext.form.TextField',{
			id : 'det_simb_skField',
			name : 'det_simb_sk',
			fieldLabel : 'det_simb_sk',
			hidden : true,
			maxLength : 255
		});
		det_simb_berlakuField = Ext.create('Ext.form.field.Date',{
			id : 'det_simb_berlakuField',
			name : 'det_simb_berlaku',
			fieldLabel : 'Berlaku',
			hidden : true,
			format : 'd-m-Y'
		});
		det_simb_kadaluarsaField = Ext.create('Ext.form.field.Date',{
			id : 'det_simb_kadaluarsaField',
			name : 'det_simb_kadaluarsa',
			fieldLabel : 'Kadaluarsa',
			format : 'd-m-Y'
		});
		det_simb_penerimaField = Ext.create('Ext.form.TextField',{
			id : 'det_simb_penerimaField',
			name : 'det_simb_penerima',
			fieldLabel : 'Penerima',
			maxLength : 255
		});
		det_simb_tanggalterimaField = Ext.create('Ext.form.field.Date',{
			id : 'det_simb_tanggalterimaField',
			name : 'det_simb_tanggalterima',
			fieldLabel : 'Tanggal Terima',
			format : 'd-m-Y'
		});
		det_simb_keteranganField = Ext.create('Ext.form.TextArea',{
			id : 'det_simb_keteranganField',
			name : 'det_simb_keterangan',
			fieldLabel : 'Keterangan',
			maxLength : 255
		});
		
		simb_per_npwpField = Ext.create('Ext.form.TextField',{
			id : 'simb_per_npwpField',
			name : 'simb_per_npwp',
			fieldLabel : 'NPWP/NPWPD',
			maxLength : 50
		});
		simb_per_namaField = Ext.create('Ext.form.TextField',{
			id : 'simb_per_namaField',
			name : 'simb_per_nama',
			fieldLabel : 'Nama Perusahaan',
			maxLength : 50
		});
		simb_per_aktaField = Ext.create('Ext.form.TextField',{
			id : 'simb_per_aktaField',
			name : 'simb_per_akta',
			fieldLabel : 'Akta Pendirian',
			maxLength : 50
		});
		simb_per_bentukField = Ext.create('Ext.form.ComboBox',{
			id : 'simb_per_bentukField',
			name : 'simb_per_bentuk',
			fieldLabel : 'Bentuk Perusahaan',
			store : new Ext.data.ArrayStore({
				fields : ['bentuk_id', 'bentuk_nama'],
				data : [[1,'PT'],[2,'BUMN'],[3,'KOPERASI'],[4,'CV'],[5,'PERSEKUTUAN FIRMA'],[6,'PERUSAHAAN PERORANGAN']]
			}),
			displayField : 'bentuk_nama',
			valueField : 'bentuk_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true
		});
		simb_per_alamatField = Ext.create('Ext.form.TextField',{
			id : 'simb_per_alamatField',
			name : 'simb_per_alamat',
			fieldLabel : 'Alamat',
			maxLength : 200
		});
		simb_per_kelField = Ext.create('Ext.form.TextField',{
			id : 'simb_per_kelField',
			name : 'simb_per_kel',
			fieldLabel : 'Kelurahan',
			maxLength : 50
		});
		simb_per_kecField = Ext.create('Ext.form.TextField',{
			id : 'simb_per_kecField',
			name : 'simb_per_kec',
			fieldLabel : 'Kecamatan',
			maxLength : 50
		});
		simb_per_kotaField = Ext.create('Ext.form.TextField',{
			id : 'simb_per_kotaField',
			name : 'simb_per_kota',
			fieldLabel : 'Kota',
			maxLength : 50
		});
		simb_per_telpField = Ext.create('Ext.form.TextField',{
			id : 'simb_per_telpField',
			name : 'simb_per_telp',
			fieldLabel : 'Telepon',
			maxLength : 20
		});
		simb_jenisField = Ext.create('Ext.form.TextField',{
			id : 'simb_jenisField',
			name : 'simb_jenis',
			fieldLabel : 'Jenis Perusahaan',
			maxLength : 50
		});
		simb_statusField = Ext.create('Ext.form.ComboBox',{
			id : 'simb_statusField',
			name : 'simb_status',
			fieldLabel : 'Status Tempat Usaha',
			store : new Ext.data.ArrayStore({
				fields : ['status_id', 'status_nama'],
				data : [[1,'MILIK SENDIRI'],[2,'SEWA'],[3,'KONTRAK'],[4,'LAINNYA']]
			}),
			displayField : 'status_nama',
			valueField : 'status_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true
		});
		simb_jenisusahaField = Ext.create('Ext.form.TextField',{
			id : 'simb_jenisusahaField',
			name : 'simb_jenisusaha',
			fieldLabel : 'Jenis Usaha',
			maxLength : 50
		});
		simb_panjangField = Ext.create('Ext.form.TextField',{
			id : 'simb_panjangField',
			name : 'simb_panjang',
			fieldLabel : 'Panjang Tempat Usaha',
			maskRe : /([0-9]+)$/
		});
		simb_lebarField = Ext.create('Ext.form.TextField',{
			id : 'simb_lebarField',
			name : 'simb_lebar',
			fieldLabel : 'Lebar Tempat Usaha',
			maskRe : /([0-9]+)$/
		});
		simb_alamatField = Ext.create('Ext.form.TextField',{
			id : 'simb_alamatField',
			name : 'simb_alamat',
			fieldLabel : 'Alamat',
			maxLength : 100
		});
		simb_kelField = Ext.create('Ext.form.TextField',{
			id : 'simb_kelField',
			name : 'simb_kel',
			fieldLabel : 'Kelurahan',
			maxLength : 50
		});
		simb_kecField = Ext.create('Ext.form.TextField',{
			id : 'simb_kecField',
			name : 'simb_kec',
			fieldLabel : 'Kecamatan',
			maxLength : 50
		});
		simb_bentukField = Ext.create('Ext.form.ComboBox',{
			id : 'simb_bentukField',
			name : 'simb_bentuk',
			fieldLabel : 'Bentuk',
			store : new Ext.data.ArrayStore({
				fields : ['bentuk_id', 'bentuk_nama'],
				data : [[1,'PERMANEN'],[2,'SEMI PERMANEN']]
			}),
			displayField : 'bentuk_nama',
			valueField : 'bentuk_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true
		});
		simb_lokasiField = Ext.create('Ext.form.ComboBox',{
			id : 'simb_lokasiField',
			name : 'simb_lokasi',
			fieldLabel : 'Indeks Lokasi',
			store : new Ext.data.ArrayStore({
				fields : ['lokasi_id', 'lokasi_nama'],
				data : [[1,'KAWASAN INDUSTRI'],[2,'ZONA INDUSTRI'],[3,'KAWASAN CAMPURAN']]
			}),
			displayField : 'lokasi_nama',
			valueField : 'lokasi_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true
		});
		simb_gangguanField = Ext.create('Ext.form.ComboBox',{
			id : 'simb_gangguanField',
			name : 'simb_gangguan',
			fieldLabel : 'Indeks Gangguan',
			store : new Ext.data.ArrayStore({
				fields : ['gangguan_id', 'gangguan_nama'],
				data : [[1,'BESAR'],[2,'SEDANG'],[3,'KECIL']]
			}),
			displayField : 'gangguan_nama',
			valueField : 'gangguan_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true
		});
		simb_batasutaraField = Ext.create('Ext.form.TextField',{
			id : 'simb_batasutaraField',
			name : 'simb_batasutara',
			fieldLabel : 'Batas Utara',
			maxLength : 100
		});
		simb_batastimurField = Ext.create('Ext.form.TextField',{
			id : 'simb_batastimurField',
			name : 'simb_batastimur',
			fieldLabel : 'Batas Timur',
			maxLength : 100
		});
		simb_batasselatanField = Ext.create('Ext.form.TextField',{
			id : 'simb_batasselatanField',
			name : 'simb_batasselatan',
			fieldLabel : 'Batas Selatan',
			maxLength : 100
		});
		simb_batasbaratField = Ext.create('Ext.form.TextField',{
			id : 'simb_batasbaratField',
			name : 'simb_batasbarat',
			fieldLabel : 'Batas Barat',
			maxLength : 100
		});
		var simb_det_pemohon_idField = Ext.create('Ext.form.Hidden',{
			name : 'pemohon_id'
		});
		var simb_det_pemohon_namaField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_nama',
			fieldLabel : 'Nama',
			maxLength : 50
		});
		var simb_det_pemohon_alamatField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_alamat',
			fieldLabel : 'Alamat',
			maxLength : 100
		});
		var simb_det_pemohon_telpField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_telp',
			fieldLabel : 'Telp',
			maxLength : 20,
			maskRe : /([0-9]+)$/
		});
		var simb_det_pemohon_npwpField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_npwp',
			fieldLabel : 'NPWP',
			maxLength : 50
		});
		var simb_det_pemohon_rtField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_rt',
			fieldLabel : 'RT',
			maskRe : /([0-9]+)$/
		});
		var simb_det_pemohon_rwField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_rw',
			fieldLabel : 'RW',
			maskRe : /([0-9]+)$/
		});
		var simb_det_pemohon_kelField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_kel',
			fieldLabel : 'Kelurahan',
			maxLength : 50
		});
		var simb_det_pemohon_kecField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_kec',
			fieldLabel : 'Kecamatan',
			maxLength : 50
		});
		var simb_det_pemohon_nikField = Ext.create('Ext.form.ComboBox',{
			name : 'simb_det_pemohon_nik',
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
				var store = simb_det_pemohon_nikField.getStore();
				var val = simb_det_pemohon_nikField.getRawValue();
				store.proxy.extraParams = {action : 'SEARCH',pemohon_nik : val};
				store.load();
				simb_det_pemohon_nikField.expand();
				simb_det_pemohon_nikField.fireEvent("ontriggerclick", this, event);
			},  
			tpl: Ext.create('Ext.XTemplate',
				'<tpl for=".">',
					'<div class="x-boundlist-item">NIK : {pemohon_nik}<br>Nama : {pemohon_nama}<br>Alamat : {pemohon_alamat}<br>Telp : {pemohon_telp}<br></div>',
				'</tpl>'
			),
			listeners : {
				select : function(cmb, record){
					var rec=record[0];
					simb_det_pemohon_idField.setValue(rec.get('pemohon_id'));
					simb_det_pemohon_nikField.setValue(rec.get('pemohon_nik'));
					simb_det_pemohon_namaField.setValue(rec.get('pemohon_nama'));
					simb_det_pemohon_alamatField.setValue(rec.get('pemohon_alamat'));
					simb_det_pemohon_telpField.setValue(rec.get('pemohon_telp'));
					simb_det_pemohon_npwpField.setValue(rec.get('pemohon_npwp'));
					simb_det_pemohon_rtField.setValue(rec.get('pemohon_rt'));
					simb_det_pemohon_rwField.setValue(rec.get('pemohon_rw'));
					simb_det_pemohon_kelField.setValue(rec.get('pemohon_kel'));
					simb_det_pemohon_kecField.setValue(rec.get('pemohon_kec'));
					simb_det_pemohon_straField.setValue(rec.get('pemohon_stra'));
					simb_det_pemohon_surattugasField.setValue(rec.get('pemohon_surattugas'));
					simb_det_pemohon_pekerjaanField.setValue(rec.get('pemohon_pekerjaan'));
					simb_det_pemohon_tempatlahirField.setValue(rec.get('pemohon_tempatlahir'));
					simb_det_pemohon_tanggallahirField.setValue(rec.get('pemohon_tanggallahir'));
					simb_det_pemohon_user_idField.setValue(rec.get('pemohon_user_id'));
					simb_det_pemohon_pendidikanField.setValue(rec.get('pemohon_pendidikan'));
					simb_det_pemohon_tahunlulusField.setValue(rec.get('pemohon_tahunlulus'));
				}
			}
		});
		var simb_det_pemohon_straField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_stra',
			fieldLabel : 'STRA',
			hidden : true,
			maxLength : 50
		});
		var simb_det_pemohon_surattugasField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_surattugas',
			fieldLabel : 'Surat Tugas',
			hidden : true,
			maxLength : 50
		});
		var simb_det_pemohon_pekerjaanField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_pekerjaan',
			fieldLabel : 'Pekerjaan',
			maxLength : 50
		});
		var simb_det_pemohon_tempatlahirField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_tempatlahir',
			fieldLabel : 'Tempat Lahir',
			maxLength : 50
		});
		var simb_det_pemohon_tanggallahirField = Ext.create('Ext.form.field.Date',{
			name : 'pemohon_tanggallahir',
			fieldLabel : 'Tanggal Lahir',
			format : 'd-m-Y'
		});
		var simb_det_pemohon_user_idField = Ext.create('Ext.form.Hidden',{
			name : 'pemohon_user_id',
		});
		var simb_det_pemohon_pendidikanField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_pendidikan',
			fieldLabel : 'Pendidikan',
			maxLength : 50
		});
		var simb_det_pemohon_tahunlulusField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_tahunlulus',
			fieldLabel : 'Tahun Lulus',
			maxLength : 4,
			maskRe : /([0-9]+)$/
		});
		
		simb_det_syaratDataStore = Ext.create('Ext.data.Store',{
			id : 'simb_det_syaratDataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_simb_det/switchAction',
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
				{ name : 'simb_cek_id', type : 'int', mapping : 'simb_cek_id' },
				{ name : 'simb_cek_syarat_id', type : 'int', mapping : 'simb_cek_syarat_id' },
				{ name : 'simb_cek_simbdet_id', type : 'int', mapping : 'simb_cek_simbdet_id' },
				{ name : 'simb_cek_simb_id', type : 'int', mapping : 'simb_cek_simb_id' },
				{ name : 'simb_cek_status', type : 'boolean', mapping : 'simb_cek_status' },
				{ name : 'simb_cek_keterangan', type : 'string', mapping : 'simb_cek_keterangan' },
				{ name : 'simb_cek_syarat_nama', type : 'string', mapping : 'simb_cek_syarat_nama' }
				]
		});
		var det_simb_syaratGridEditor = new Ext.grid.plugin.CellEditing({
			clicksToEdit: 1
		});
		det_simb_syaratGrid = Ext.create('Ext.grid.Panel',{
			id : 'det_simb_syaratGrid',
			store : simb_det_syaratDataStore,
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
					dataIndex : 'simb_cek_id',
					width : 100,
					hidden : true,
					hideable: false,
					sortable : false
				},
				{
					text : 'Syarat',
					dataIndex : 'simb_cek_syarat_nama',
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
					dataIndex: 'simb_cek_status',
					width: 55,
					stopSelection: false
				},
				{
					text : 'Keterangan',
					dataIndex : 'simb_cek_keterangan',
					width : 100,
					sortable : false,
					editor: 'textfield',
					flex : 1
				}
			]
		});
		var simb_det_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : simb_det_save
		});
		var simb_det_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				simb_det_resetForm();
				simb_det_switchToGrid();
			}
		});
		
		var simb_det_pendukungfieldset = Ext.create('Ext.form.FieldSet',{
			title : '5. Data Pendukung',
			checkboxToggle : false,
			collapsible : false,
			layout :'form',
			items : [
				simb_jenisField,
				simb_statusField,
				simb_jenisusahaField,
				simb_panjangField,
				simb_lebarField,
				simb_alamatField,
				simb_kelField,
				simb_kecField,
				simb_bentukField,
				simb_lokasiField,
				simb_gangguanField,
				simb_batasutaraField,
				simb_batastimurField,
				simb_batasselatanField,
				simb_batasbaratField,
				det_simb_skField,
				det_simb_berlakuField,
				det_simb_penerimaField,
				det_simb_tanggalterimaField,
				det_simb_keteranganField,
				det_simb_kadaluarsaField,
			]
		});
		/* START DATA RETRIBUSI */
		var simb_det_retribusiField = Ext.create('Ext.form.RadioGroup',{
			fieldLabel : 'Retribusi ',
			vertical : false,
			items : [
				{ boxLabel : 'Gratis', name : 'simb_retribusi', inputValue : '0', checked : true},
				{ boxLabel : 'Bayar', name : 'simb_retribusi', inputValue : '1'}
			],
			listeners : {
				change : function(com, newval, oldval, e){
					if(newval.simb_retribusi == 1){
						simb_det_retibusiNilaiField.show();
					}else{
						simb_det_retibusiNilaiField.hide();
					}
				}
			}
		});
		var simb_det_retibusiNilaiField = Ext.create('Ext.form.TextField',{
			name : 'simb_det_retibusiNilai',
			fieldLabel : 'Nominal Retribusi ',
			maxLength : 100,
			hidden : true,
			value : 0
		});
		var simb_det_retribusifieldset = Ext.create('Ext.form.FieldSet',{
			title : '6. Data Retribusi',
			columnWidth : 0.5,
			checkboxToggle : false,
			collapsible : false,
			layout :'form',
			items : [
				simb_det_retribusiField,
				simb_det_retibusiNilaiField
			]
		});
		/* END DATA RETRIBUSI */
		simb_det_formPanel = Ext.create('Ext.form.Panel', {
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
						det_simb_idField,
						det_simb_simb_idField,
						det_simb_jenisField,
						det_simb_tanggalField,
						det_simb_pemohon_idField,
						det_simb_nomorregField,
						det_simb_prosesField,
					]
				},
				{
					xtype : 'fieldset',
					title : '2. Data Pemohon',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						simb_det_pemohon_idField,
						simb_det_pemohon_nikField,
						simb_det_pemohon_namaField,
						simb_det_pemohon_alamatField,
						simb_det_pemohon_telpField,
						simb_det_pemohon_npwpField,
						simb_det_pemohon_rtField,
						simb_det_pemohon_rwField,
						simb_det_pemohon_kelField,
						simb_det_pemohon_kecField,
						simb_det_pemohon_straField,
						simb_det_pemohon_surattugasField,
						simb_det_pemohon_pekerjaanField,
						simb_det_pemohon_tempatlahirField,
						simb_det_pemohon_tanggallahirField,
						simb_det_pemohon_user_idField,
						simb_det_pemohon_pendidikanField,
						simb_det_pemohon_tahunlulusField
					]
				},
				{
					xtype : 'fieldset',
					title : '3. Data Perusahaan',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						simb_per_npwpField,
						simb_per_namaField,
						simb_per_aktaField,
						simb_per_bentukField,
						simb_per_alamatField,
						simb_per_kelField,
						simb_per_kecField,
						simb_per_kotaField,
						simb_per_telpField,
					]
				},
				{
					xtype : 'fieldset',
					title : '4. Data Ceklist',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						det_simb_syaratGrid
					]
				},
				simb_det_pendukungfieldset, simb_det_retribusifieldset,
				Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })
			],
			buttons : [simb_det_saveButton,simb_det_cancelButton]
		});
		simb_det_formWindow = Ext.create('Ext.window.Window',{
			id : 'simb_det_formWindow',
			renderTo : 'simb_detSaveWindow',
			title : globalFormAddEditTitle + ' ' + simb_det_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [simb_det_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		det_simb_simb_idSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_simb_simb_idSearchField',
			name : 'det_simb_simb_id',
			fieldLabel : 'det_simb_simb_id',
			maxLength : 255
		
		});
		det_simb_jenisSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_simb_jenisSearchField',
			name : 'det_simb_jenis',
			fieldLabel : 'det_simb_jenis',
			maxLength : 255
		
		});
		det_simb_tanggalSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_simb_tanggalSearchField',
			name : 'det_simb_tanggal',
			fieldLabel : 'det_simb_tanggal',
			maxLength : 255
		
		});
		det_simb_pemohon_idSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_simb_pemohon_idSearchField',
			name : 'det_simb_pemohon_id',
			fieldLabel : 'det_simb_pemohon_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_simb_nomorregSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_simb_nomorregSearchField',
			name : 'det_simb_nomorreg',
			fieldLabel : 'det_simb_nomorreg',
			maxLength : 255
		
		});
		det_simb_prosesSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_simb_prosesSearchField',
			name : 'det_simb_proses',
			fieldLabel : 'det_simb_proses',
			maxLength : 255
		
		});
		det_simb_skSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_simb_skSearchField',
			name : 'det_simb_sk',
			fieldLabel : 'det_simb_sk',
			maxLength : 255
		
		});
		det_simb_berlakuSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_simb_berlakuSearchField',
			name : 'det_simb_berlaku',
			fieldLabel : 'det_simb_berlaku',
			maxLength : 255
		
		});
		det_simb_kadaluarsaSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_simb_kadaluarsaSearchField',
			name : 'det_simb_kadaluarsa',
			fieldLabel : 'det_simb_kadaluarsa',
			maxLength : 255
		
		});
		det_simb_penerimaSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_simb_penerimaSearchField',
			name : 'det_simb_penerima',
			fieldLabel : 'det_simb_penerima',
			maxLength : 255
		
		});
		det_simb_tanggalterimaSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_simb_tanggalterimaSearchField',
			name : 'det_simb_tanggalterima',
			fieldLabel : 'det_simb_tanggalterima',
			maxLength : 255
		
		});
		det_simb_keteranganSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_simb_keteranganSearchField',
			name : 'det_simb_keterangan',
			fieldLabel : 'det_simb_keterangan',
			maxLength : 255
		
		});
		var simb_det_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : simb_det_search
		});
		var simb_det_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				simb_det_searchWindow.hide();
			}
		});
		simb_det_searchPanel = Ext.create('Ext.form.Panel', {
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
						det_simb_simb_idSearchField,
						det_simb_jenisSearchField,
						det_simb_tanggalSearchField,
						det_simb_pemohon_idSearchField,
						det_simb_nomorregSearchField,
						det_simb_prosesSearchField,
						det_simb_skSearchField,
						det_simb_berlakuSearchField,
						det_simb_kadaluarsaSearchField,
						det_simb_penerimaSearchField,
						det_simb_tanggalterimaSearchField,
						det_simb_keteranganSearchField,
						]
				}],
			buttons : [simb_det_searchingButton,simb_det_cancelSearchButton]
		});
		simb_det_searchWindow = Ext.create('Ext.window.Window',{
			id : 'simb_det_searchWindow',
			renderTo : 'simb_detSearchWindow',
			title : globalFormSearchTitle + ' ' + simb_det_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [simb_det_searchPanel]
		});
/* End SearchPanel declaration */
	<?php if(@$_SESSION['IDHAK'] == 2){ ?>
		simb_det_lk_printCM.hide();
		simb_det_bap_printCM.hide();
		simb_det_sk_printCM.hide();
		simb_det_pendukungfieldset.hide();
		simb_det_gridPanel.columns[11].setVisible(false);
		simb_det_gridPanel.columns[12].setVisible(false);
	<?php } ?>
});
</script>
<div id="simb_detSaveWindow"></div>
<div id="simb_detSearchWindow"></div>
<div class="span12" id="simb_detGrid"></div>