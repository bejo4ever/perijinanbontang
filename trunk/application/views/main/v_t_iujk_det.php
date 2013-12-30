<style>
	.checked{
		background-image:url(../assets/images/icons/check.png) !important;
	}
</style>
<h4>IZIN USAHA JASA KONSTRUKSI</h4>
<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var iujk_det_componentItemTitle="Ijin Usaha Jasa Konstruksi";
		var iujk_det_dataStore;
		
		var iujk_det_shorcut;
		var iujk_det_contextMenu;
		var iujk_det_gridSearchField;
		var iujk_det_gridPanel;
		var iujk_det_formPanel;
		var iujk_det_formWindow;
		var iujk_det_searchPanel;
		var iujk_det_searchWindow;
		
		var det_iujk_idField;
		var det_iujk_iujk_idField;
		var det_iujk_jenisField;
		var det_iujk_tanggalField;
		var det_iujk_namaField;
		var det_iujk_nomorregField;
		var det_iujk_rekomnomorField;
		var det_iujk_rekomtanggalField;
		var det_iujk_berlakuField;
		var det_iujk_kadaluarsaField;
		var det_iujk_pj1Field;
		var det_iujk_pj2Field;
		var det_iujk_pj3Field;
		var det_iujk_pjteknisField;
		var det_iujk_pjtbuField;
		var det_iujk_surveylulusField;
		
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
				
		var det_iujk_iujk_idSearchField;
		var det_iujk_jenisSearchField;
		var det_iujk_tanggalSearchField;
		var det_iujk_namaSearchField;
		var det_iujk_nomorregSearchField;
		var det_iujk_rekomnomorSearchField;
		var det_iujk_rekomtanggalSearchField;
		var det_iujk_berlakuSearchField;
		var det_iujk_kadaluarsaSearchField;
		var det_iujk_pj1SearchField;
		var det_iujk_pj2SearchField;
		var det_iujk_pj3SearchField;
		var det_iujk_pjteknisSearchField;
		var det_iujk_pjtbuSearchField;
		var det_iujk_surveylulusSearchField;
				
		var iujk_det_dbTask = 'CREATE';
		var iujk_det_dbTaskMessage = 'Tambah';
		var iujk_det_dbPermission = 'CRUD';
		var iujk_det_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function iujk_det_switchToGrid(){
			iujk_det_formPanel.setDisabled(true);
			iujk_det_gridPanel.setDisabled(false);
			iujk_det_formWindow.hide();
		}
		
		function iujk_det_switchToForm(){
			iujk_det_gridPanel.setDisabled(true);
			iujk_det_formPanel.setDisabled(false);
			iujk_det_formWindow.show();
		}
		
		function iujk_det_confirmAdd(){
			iujk_det_dbTask = 'CREATE';
			iujk_det_dbTaskMessage = 'created';
			iujk_det_resetForm();
			iujk_det_syaratDataStore.proxy.extraParams = { 
				currentAction : 'create',
				action : 'GETSYARAT'
			};
			iujk_det_syaratDataStore.load();
			iujk_det_switchToForm();
		}
		
		function iujk_det_confirmUpdate(){
			if(iujk_det_gridPanel.selModel.getCount() == 1) {
				iujk_det_dbTask = 'UPDATE';
				iujk_det_dbTaskMessage = 'updated';
				iujk_det_switchToForm();
				iujk_det_setForm();
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
		
		function iujk_det_confirmDelete(){
			if(iujk_det_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, iujk_det_delete);
			}else if(iujk_det_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, iujk_det_delete);
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
		
		function iujk_det_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(iujk_det_dbPermission)==false && pattC.test(iujk_det_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(iujk_det_confirmFormValid()){
					var det_iujk_idValue = '';
					var det_iujk_iujk_idValue = '';
					var det_iujk_jenisValue = '';
					var det_iujk_tanggalValue = '';
					var det_iujk_namaValue = '';
					var det_iujk_nomorregValue = '';
					var det_iujk_rekomnomorValue = '';
					var det_iujk_rekomtanggalValue = '';
					var det_iujk_berlakuValue = '';
					var det_iujk_kadaluarsaValue = '';
					var det_iujk_pj1Value = '';
					var det_iujk_pj2Value = '';
					var det_iujk_pj3Value = '';
					var det_iujk_pjteknisValue = '';
					var det_iujk_pjtbuValue = '';
					var det_iujk_surveylulusValue = '';
					
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
										
					det_iujk_idValue = det_iujk_idField.getValue();
					det_iujk_iujk_idValue = det_iujk_iujk_idField.getValue();
					det_iujk_jenisValue = det_iujk_jenisField.getValue();
					det_iujk_tanggalValue = det_iujk_tanggalField.getValue();
					det_iujk_namaValue = det_iujk_namaField.getValue();
					det_iujk_nomorregValue = det_iujk_nomorregField.getValue();
					det_iujk_rekomnomorValue = det_iujk_rekomnomorField.getValue();
					det_iujk_rekomtanggalValue = det_iujk_rekomtanggalField.getValue();
					det_iujk_berlakuValue = det_iujk_berlakuField.getValue();
					det_iujk_kadaluarsaValue = det_iujk_kadaluarsaField.getValue();
					det_iujk_pj1Value = det_iujk_pj1Field.getValue();
					det_iujk_pj2Value = det_iujk_pj2Field.getValue();
					det_iujk_pj3Value = det_iujk_pj3Field.getValue();
					det_iujk_pjteknisValue = det_iujk_pjteknisField.getValue();
					det_iujk_pjtbuValue = det_iujk_pjtbuField.getValue();
					det_iujk_surveylulusValue = det_iujk_surveylulusField.getValue();
					
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
					
					var pemohon_idValue = iujk_det_pemohon_idField.getValue();
					var pemohon_namaValue = iujk_det_pemohon_namaField.getValue();
					var pemohon_alamatValue = iujk_det_pemohon_alamatField.getValue();
					var pemohon_telpValue = iujk_det_pemohon_telpField.getValue();
					var pemohon_npwpValue = iujk_det_pemohon_npwpField.getValue();
					var pemohon_rtValue = iujk_det_pemohon_rtField.getValue();
					var pemohon_rwValue = iujk_det_pemohon_rwField.getValue();
					var pemohon_kelValue = iujk_det_pemohon_kelField.getValue();
					var pemohon_kecValue = iujk_det_pemohon_kecField.getValue();
					var pemohon_nikValue = iujk_det_pemohon_nikField.getValue();
					var pemohon_straValue = iujk_det_pemohon_straField.getValue();
					var pemohon_surattugasValue = iujk_det_pemohon_surattugasField.getValue();
					var pemohon_pekerjaanValue = iujk_det_pemohon_pekerjaanField.getValue();
					var pemohon_tempatlahirValue = iujk_det_pemohon_tempatlahirField.getValue();
					var pemohon_tanggallahirValue = iujk_det_pemohon_tanggallahirField.getValue();
					var pemohon_user_idValue = iujk_det_pemohon_user_idField.getValue();
					var pemohon_pendidikanValue = iujk_det_pemohon_pendidikanField.getValue();
					var pemohon_tahunlulusValue = iujk_det_pemohon_tahunlulusField.getValue();
					var array_iujk_cek_id=new Array();
					var array_iujk_cek_syarat_id=new Array();
					var array_iujk_cek_status=new Array();
					var array_iujk_cek_keterangan=new Array();
					
					if(iujk_det_syaratDataStore.getCount() > 0){
						for(var i=0;i<iujk_det_syaratDataStore.getCount();i++){
							array_iujk_cek_id.push(iujk_det_syaratDataStore.getAt(i).data.iujk_cek_id);
							array_iujk_cek_syarat_id.push(iujk_det_syaratDataStore.getAt(i).data.iujk_cek_syarat_id);
							array_iujk_cek_status.push(iujk_det_syaratDataStore.getAt(i).data.iujk_cek_status);
							array_iujk_cek_keterangan.push(iujk_det_syaratDataStore.getAt(i).data.iujk_cek_keterangan);
						}
					}
					
					var encoded_iujk_cek_id = Ext.encode(array_iujk_cek_id);
					var encoded_iujk_cek_syarat_id = Ext.encode(array_iujk_cek_syarat_id);
					var encoded_iujk_cek_status = Ext.encode(array_iujk_cek_status);
					var encoded_iujk_cek_keterangan = Ext.encode(array_iujk_cek_keterangan);
					
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_t_iujk_det/switchAction',
						params: {							
							det_iujk_id : det_iujk_idValue,
							det_iujk_iujk_id : det_iujk_iujk_idValue,
							det_iujk_jenis : det_iujk_jenisValue,
							det_iujk_tanggal : det_iujk_tanggalValue,
							det_iujk_nama : det_iujk_namaValue,
							det_iujk_nomorreg : det_iujk_nomorregValue,
							det_iujk_rekomnomor : det_iujk_rekomnomorValue,
							det_iujk_rekomtanggal : det_iujk_rekomtanggalValue,
							det_iujk_berlaku : det_iujk_berlakuValue,
							det_iujk_kadaluarsa : det_iujk_kadaluarsaValue,
							det_iujk_pj1 : det_iujk_pj1Value,
							det_iujk_pj2 : det_iujk_pj2Value,
							det_iujk_pj3 : det_iujk_pj3Value,
							det_iujk_pjteknis : det_iujk_pjteknisValue,
							det_iujk_pjtbu : det_iujk_pjtbuValue,
							det_iujk_surveylulus : det_iujk_surveylulusValue,
							
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
							iujk_npwp : iujk_npwpValue,pemohon_id : pemohon_idValue,
							
							iujk_cek_id : encoded_iujk_cek_id,
							iujk_cek_syarat_id : encoded_iujk_cek_syarat_id,
							iujk_cek_status : encoded_iujk_cek_status,
							iujk_cek_keterangan : encoded_iujk_cek_keterangan,
							
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
							
							action : iujk_det_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									iujk_det_dataStore.reload();
									iujk_det_resetForm();
									iujk_det_switchToGrid();
									iujk_det_gridPanel.getSelectionModel().deselectAll();
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
		
		function iujk_det_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(iujk_det_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = iujk_det_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< iujk_det_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.det_iujk_id);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_t_iujk_det/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									iujk_det_dataStore.reload();
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
		
		function iujk_det_refresh(){
			iujk_det_dbListAction = "GETLIST";
			iujk_det_gridSearchField.reset();
			iujk_det_searchPanel.getForm().reset();
			iujk_det_dataStore.proxy.extraParams = { action : 'GETLIST' };
			iujk_det_dataStore.proxy.extraParams.query = "";
			iujk_det_dataStore.currentPage = 1;
			iujk_det_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function iujk_det_confirmFormValid(){
			return iujk_det_formPanel.getForm().isValid();
		}
		
		function iujk_det_resetForm(){
			iujk_det_dbTask = 'CREATE';
			iujk_det_dbTaskMessage = 'create';
			iujk_det_formPanel.getForm().reset();
			det_iujk_idField.setValue(0);
			window.scrollTo(0,0);
		}
		
		function iujk_det_setForm(){
			iujk_det_dbTask = 'UPDATE';
            iujk_det_dbTaskMessage = 'update';
			
			var record = iujk_det_gridPanel.getSelectionModel().getSelection()[0];
			det_iujk_idField.setValue(record.data.det_iujk_id);
			det_iujk_iujk_idField.setValue(record.data.det_iujk_iujk_id);
			det_iujk_jenisField.setValue(record.data.det_iujk_jenis);
			det_iujk_tanggalField.setValue(record.data.det_iujk_tanggal);
			det_iujk_namaField.setValue(record.data.det_iujk_nama);
			det_iujk_nomorregField.setValue(record.data.det_iujk_nomorreg);
			det_iujk_rekomnomorField.setValue(record.data.det_iujk_rekomnomor);
			det_iujk_rekomtanggalField.setValue(record.data.det_iujk_rekomtanggal);
			det_iujk_berlakuField.setValue(record.data.det_iujk_berlaku);
			det_iujk_kadaluarsaField.setValue(record.data.det_iujk_kadaluarsa);
			det_iujk_pj1Field.setValue(record.data.det_iujk_pj1);
			det_iujk_pj2Field.setValue(record.data.det_iujk_pj2);
			det_iujk_pj3Field.setValue(record.data.det_iujk_pj3);
			det_iujk_pjteknisField.setValue(record.data.det_iujk_pjteknis);
			det_iujk_pjtbuField.setValue(record.data.det_iujk_pjtbu);
			det_iujk_surveylulusField.setValue(record.data.det_iujk_surveylulus);
			
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
			iujk_det_pemohon_idField.setValue(record.data.pemohon_id);
			iujk_det_pemohon_namaField.setValue(record.data.pemohon_nama);
			iujk_det_pemohon_alamatField.setValue(record.data.pemohon_alamat);
			iujk_det_pemohon_telpField.setValue(record.data.pemohon_telp);
			iujk_det_pemohon_npwpField.setValue(record.data.pemohon_npwp);
			iujk_det_pemohon_rtField.setValue(record.data.pemohon_rt);
			iujk_det_pemohon_rwField.setValue(record.data.pemohon_rw);
			iujk_det_pemohon_kelField.setValue(record.data.pemohon_kel);
			iujk_det_pemohon_kecField.setValue(record.data.pemohon_kec);
			iujk_det_pemohon_nikField.setValue(record.data.pemohon_nik);
			iujk_det_pemohon_straField.setValue(record.data.pemohon_stra);
			iujk_det_pemohon_surattugasField.setValue(record.data.pemohon_surattugas);
			iujk_det_pemohon_pekerjaanField.setValue(record.data.pemohon_pekerjaan);
			iujk_det_pemohon_tempatlahirField.setValue(record.data.pemohon_tempatlahir);
			iujk_det_pemohon_tanggallahirField.setValue(record.data.pemohon_tanggallahir);
			iujk_det_pemohon_user_idField.setValue(record.data.pemohon_user_id);
			iujk_det_pemohon_pendidikanField.setValue(record.data.pemohon_pendidikan);
			iujk_det_pemohon_tahunlulusField.setValue(record.data.pemohon_tahunlulus);
			
			iujk_det_syaratDataStore.proxy.extraParams = { 
				iujk_id : record.data.det_iujk_iujk_id,
				iujk_det_id : record.data.det_iujk_id,
				currentAction : 'update',
				action : 'GETSYARAT'
			};
			iujk_det_syaratDataStore.load();
		}
		
		function iujk_det_showSearchWindow(){
			iujk_det_searchWindow.show();
		}
		
		function iujk_det_search(){
			iujk_det_gridSearchField.reset();
			
			var det_iujk_iujk_idValue = '';
			var det_iujk_jenisValue = '';
			var det_iujk_tanggalValue = '';
			var det_iujk_namaValue = '';
			var det_iujk_nomorregValue = '';
			var det_iujk_rekomnomorValue = '';
			var det_iujk_rekomtanggalValue = '';
			var det_iujk_berlakuValue = '';
			var det_iujk_kadaluarsaValue = '';
			var det_iujk_pj1Value = '';
			var det_iujk_pj2Value = '';
			var det_iujk_pj3Value = '';
			var det_iujk_pjteknisValue = '';
			var det_iujk_pjtbuValue = '';
			var det_iujk_surveylulusValue = '';
						
			det_iujk_iujk_idValue = det_iujk_iujk_idSearchField.getValue();
			det_iujk_jenisValue = det_iujk_jenisSearchField.getValue();
			det_iujk_tanggalValue = det_iujk_tanggalSearchField.getValue();
			det_iujk_namaValue = det_iujk_namaSearchField.getValue();
			det_iujk_nomorregValue = det_iujk_nomorregSearchField.getValue();
			det_iujk_rekomnomorValue = det_iujk_rekomnomorSearchField.getValue();
			det_iujk_rekomtanggalValue = det_iujk_rekomtanggalSearchField.getValue();
			det_iujk_berlakuValue = det_iujk_berlakuSearchField.getValue();
			det_iujk_kadaluarsaValue = det_iujk_kadaluarsaSearchField.getValue();
			det_iujk_pj1Value = det_iujk_pj1SearchField.getValue();
			det_iujk_pj2Value = det_iujk_pj2SearchField.getValue();
			det_iujk_pj3Value = det_iujk_pj3SearchField.getValue();
			det_iujk_pjteknisValue = det_iujk_pjteknisSearchField.getValue();
			det_iujk_pjtbuValue = det_iujk_pjtbuSearchField.getValue();
			det_iujk_surveylulusValue = det_iujk_surveylulusSearchField.getValue();
			iujk_det_dbListAction = "SEARCH";
			iujk_det_dataStore.proxy.extraParams = { 
				det_iujk_iujk_id : det_iujk_iujk_idValue,
				det_iujk_jenis : det_iujk_jenisValue,
				det_iujk_tanggal : det_iujk_tanggalValue,
				det_iujk_nama : det_iujk_namaValue,
				det_iujk_nomorreg : det_iujk_nomorregValue,
				det_iujk_rekomnomor : det_iujk_rekomnomorValue,
				det_iujk_rekomtanggal : det_iujk_rekomtanggalValue,
				det_iujk_berlaku : det_iujk_berlakuValue,
				det_iujk_kadaluarsa : det_iujk_kadaluarsaValue,
				det_iujk_pj1 : det_iujk_pj1Value,
				det_iujk_pj2 : det_iujk_pj2Value,
				det_iujk_pj3 : det_iujk_pj3Value,
				det_iujk_pjteknis : det_iujk_pjteknisValue,
				det_iujk_pjtbu : det_iujk_pjtbuValue,
				det_iujk_surveylulus : det_iujk_surveylulusValue,
				action : 'SEARCH'
			};
			iujk_det_dataStore.currentPage = 1;
			iujk_det_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function iujk_det_printExcel(outputType){
			var searchText = "";
			var det_iujk_iujk_idValue = '';
			var det_iujk_jenisValue = '';
			var det_iujk_tanggalValue = '';
			var det_iujk_namaValue = '';
			var det_iujk_nomorregValue = '';
			var det_iujk_rekomnomorValue = '';
			var det_iujk_rekomtanggalValue = '';
			var det_iujk_berlakuValue = '';
			var det_iujk_kadaluarsaValue = '';
			var det_iujk_pj1Value = '';
			var det_iujk_pj2Value = '';
			var det_iujk_pj3Value = '';
			var det_iujk_pjteknisValue = '';
			var det_iujk_pjtbuValue = '';
			var det_iujk_surveylulusValue = '';
			
			if(iujk_det_dataStore.proxy.extraParams.query!==null){searchText = iujk_det_dataStore.proxy.extraParams.query;}
			if(iujk_det_dataStore.proxy.extraParams.det_iujk_iujk_id!==null){det_iujk_iujk_idValue = iujk_det_dataStore.proxy.extraParams.det_iujk_iujk_id;}
			if(iujk_det_dataStore.proxy.extraParams.det_iujk_jenis!==null){det_iujk_jenisValue = iujk_det_dataStore.proxy.extraParams.det_iujk_jenis;}
			if(iujk_det_dataStore.proxy.extraParams.det_iujk_tanggal!==null){det_iujk_tanggalValue = iujk_det_dataStore.proxy.extraParams.det_iujk_tanggal;}
			if(iujk_det_dataStore.proxy.extraParams.det_iujk_nama!==null){det_iujk_namaValue = iujk_det_dataStore.proxy.extraParams.det_iujk_nama;}
			if(iujk_det_dataStore.proxy.extraParams.det_iujk_nomorreg!==null){det_iujk_nomorregValue = iujk_det_dataStore.proxy.extraParams.det_iujk_nomorreg;}
			if(iujk_det_dataStore.proxy.extraParams.det_iujk_rekomnomor!==null){det_iujk_rekomnomorValue = iujk_det_dataStore.proxy.extraParams.det_iujk_rekomnomor;}
			if(iujk_det_dataStore.proxy.extraParams.det_iujk_rekomtanggal!==null){det_iujk_rekomtanggalValue = iujk_det_dataStore.proxy.extraParams.det_iujk_rekomtanggal;}
			if(iujk_det_dataStore.proxy.extraParams.det_iujk_berlaku!==null){det_iujk_berlakuValue = iujk_det_dataStore.proxy.extraParams.det_iujk_berlaku;}
			if(iujk_det_dataStore.proxy.extraParams.det_iujk_kadaluarsa!==null){det_iujk_kadaluarsaValue = iujk_det_dataStore.proxy.extraParams.det_iujk_kadaluarsa;}
			if(iujk_det_dataStore.proxy.extraParams.det_iujk_pj1!==null){det_iujk_pj1Value = iujk_det_dataStore.proxy.extraParams.det_iujk_pj1;}
			if(iujk_det_dataStore.proxy.extraParams.det_iujk_pj2!==null){det_iujk_pj2Value = iujk_det_dataStore.proxy.extraParams.det_iujk_pj2;}
			if(iujk_det_dataStore.proxy.extraParams.det_iujk_pj3!==null){det_iujk_pj3Value = iujk_det_dataStore.proxy.extraParams.det_iujk_pj3;}
			if(iujk_det_dataStore.proxy.extraParams.det_iujk_pjteknis!==null){det_iujk_pjteknisValue = iujk_det_dataStore.proxy.extraParams.det_iujk_pjteknis;}
			if(iujk_det_dataStore.proxy.extraParams.det_iujk_pjtbu!==null){det_iujk_pjtbuValue = iujk_det_dataStore.proxy.extraParams.det_iujk_pjtbu;}
			if(iujk_det_dataStore.proxy.extraParams.det_iujk_surveylulus!==null){det_iujk_surveylulusValue = iujk_det_dataStore.proxy.extraParams.det_iujk_surveylulus;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_t_iujk_det/switchAction',
				params : {
					action : outputType,
					query : searchText,
					det_iujk_iujk_id : det_iujk_iujk_idValue,
					det_iujk_jenis : det_iujk_jenisValue,
					det_iujk_tanggal : det_iujk_tanggalValue,
					det_iujk_nama : det_iujk_namaValue,
					det_iujk_nomorreg : det_iujk_nomorregValue,
					det_iujk_rekomnomor : det_iujk_rekomnomorValue,
					det_iujk_rekomtanggal : det_iujk_rekomtanggalValue,
					det_iujk_berlaku : det_iujk_berlakuValue,
					det_iujk_kadaluarsa : det_iujk_kadaluarsaValue,
					det_iujk_pj1 : det_iujk_pj1Value,
					det_iujk_pj2 : det_iujk_pj2Value,
					det_iujk_pj3 : det_iujk_pj3Value,
					det_iujk_pjteknis : det_iujk_pjteknisValue,
					det_iujk_pjtbu : det_iujk_pjtbuValue,
					det_iujk_surveylulus : det_iujk_surveylulusValue,
					currentAction : iujk_det_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/t_iujk_det_list.xls');
							}else{
								window.open('./print/t_iujk_det_list.html','iujk_detlist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		iujk_det_dataStore = Ext.create('Ext.data.Store',{
			id : 'iujk_det_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_iujk_det/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'det_iujk_id'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'det_iujk_id', type : 'int', mapping : 'det_iujk_id' },
				{ name : 'det_iujk_iujk_id', type : 'int', mapping : 'det_iujk_iujk_id' },
				{ name : 'det_iujk_jenis', type : 'int', mapping : 'det_iujk_jenis' },
				{ name : 'det_iujk_tanggal', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_iujk_tanggal' },
				{ name : 'det_iujk_nama', type : 'string', mapping : 'det_iujk_nama' },
				{ name : 'det_iujk_nomorreg', type : 'string', mapping : 'det_iujk_nomorreg' },
				{ name : 'det_iujk_rekomnomor', type : 'string', mapping : 'det_iujk_rekomnomor' },
				{ name : 'det_iujk_rekomtanggal', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_iujk_rekomtanggal' },
				{ name : 'det_iujk_berlaku', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_iujk_berlaku' },
				{ name : 'det_iujk_kadaluarsa', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_iujk_kadaluarsa' },
				{ name : 'det_iujk_pj1', type : 'string', mapping : 'det_iujk_pj1' },
				{ name : 'det_iujk_pj2', type : 'string', mapping : 'det_iujk_pj2' },
				{ name : 'det_iujk_pj3', type : 'string', mapping : 'det_iujk_pj3' },
				{ name : 'det_iujk_pjteknis', type : 'string', mapping : 'det_iujk_pjteknis' },
				{ name : 'det_iujk_pjtbu', type : 'string', mapping : 'det_iujk_pjtbu' },
				{ name : 'det_iujk_surveylulus', type : 'int', mapping : 'det_iujk_surveylulus' },
				
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
				{ name : 'det_iujk_proses', type : 'string', mapping : 'det_iujk_proses' },
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
				{ name : 'det_iujk_proses', type : 'string', mapping : 'det_iujk_proses' },
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		iujk_det_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						iujk_det_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						iujk_det_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						iujk_det_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						iujk_det_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						iujk_det_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						iujk_det_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						iujk_det_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						iujk_det_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var iujk_det_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : iujk_det_confirmAdd
		});
		var iujk_det_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : iujk_det_confirmUpdate
		});
		var iujk_det_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : iujk_det_confirmDelete
		});
		var iujk_det_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : iujk_det_refresh
		});
		var iujk_det_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : iujk_det_showSearchWindow
		});
		var iujk_det_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				iujk_det_printExcel('PRINT');
			}
		});
		var iujk_det_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				iujk_det_printExcel('EXCEL');
			}
		});
		
		var iujk_det_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : iujk_det_confirmUpdate
		});
		var iujk_det_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : iujk_det_confirmDelete
		});
		var iujk_det_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : iujk_det_refresh
		});
		iujk_det_contextMenu = Ext.create('Ext.menu.Menu',{
			items: [
				iujk_det_contextMenuEdit,iujk_det_contextMenuDelete,'-',iujk_det_contextMenuRefresh
			]
		});
		
		iujk_det_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : iujk_det_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						iujk_det_dataStore.proxy.extraParams = { action : 'GETLIST'};
						iujk_det_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		/* Start ContextMenu For Action Column */
		var iujk_det_bp_printCM = Ext.create('Ext.menu.Item',{
			text : 'Bukti Penerimaan',
			tooltip : 'Cetak Bukti Penerimaan',
			handler : function(){
				var record = iujk_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_iujk_det/switchAction',
					params: {
						iujkdet_id : record.get('det_iujk_id'),
						action : 'CETAKBP'
					},success : function(){
						window.open('../print/iujk_buktipenerimaan.html');
					}
				});
			}
		});
		var iujk_det_sk_printCM = Ext.create('Ext.menu.Item',{
			text : 'Surat Keputusan',
			tooltip : 'Cetak Surat Keputusan',
			handler : function(){
				var record = iujk_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_iujk_det/switchAction',
					params: {
						iujkdet_id : record.get('det_iujk_id'),
						action : 'CETAKSK'
					},success : function(){
						window.open('../print/iujk_sk.html');
					}
				});
			}
		});
		var iujk_det_rekom_printCM = Ext.create('Ext.menu.Item',{
			text : 'Rekomendasi',
			tooltip : 'Cetak Surat Rekomendasi',
			handler : function(){
				var record = iujk_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_iujk_det/switchAction',
					params: {
						iujkdet_id : record.get('det_iujk_id'),
						action : 'CETAKREKOMENDASI'
					},success : function(){
						window.open('../print/iujk_rekomendasi.html');
					}
				});
			}
		});
		var iujk_det_lk_printCM = Ext.create('Ext.menu.Item',{
			text : 'Lembar Kontrol',
			tooltip : 'Cetak Lembar Kontrol',
			handler : function(){
				var record = iujk_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_iujk_det/switchAction',
					params: {
						iujkdet_id : record.get('det_iujk_id'),
						action : 'CETAKLEMBARKONTROL'
					},success : function(){
						window.open('../print/iujk_lembarkontrol.html');
					}
				});
			}
		});
		var iujk_det_printContextMenu = Ext.create('Ext.menu.Menu',{
			items: [
				iujk_det_bp_printCM,iujk_det_lk_printCM,iujk_det_rekom_printCM,iujk_det_sk_printCM
			]
		});
		function iujk_det_ubahProses(proses){
			var record = iujk_det_gridPanel.getSelectionModel().getSelection()[0];
			Ext.Ajax.request({
				waitMsg: 'Please wait...',
				url: 'c_t_iujk_det/switchAction',
				params: {
					iujkdet_id : record.get('det_iujk_id'),
					iujkdet_nosk : record.get('det_iujk_sk'),
					proses : proses,
					action : 'UBAHPROSES'
				},success : function(){
					iujk_det_dataStore.reload();
				}
			});
		}
		
		var iujk_det_prosesContextMenu = Ext.create('Ext.menu.Menu',{
			items: [
				{
					text : 'Selesai, belum diambil',
					tooltip : 'Ubah Menjadi Selesai, belum diambil',
					handler : function(){
						iujk_det_ubahProses('Selesai, belum diambil');
					}
				},
				{
					text : 'Selesai, sudah diambil',
					tooltip : 'Ubah Menjadi Selesai, sudah diambil',
					handler : function(){
						iujk_det_ubahProses('Selesai, sudah diambil');
					}
				},
				{
					text : 'Ditolak',
					tooltip : 'Ubah Menjadi Ditolak',
					handler : function(){
						iujk_det_ubahProses('Ditolak');
					}
				}
			]
		});
		
		/* End ContextMenu For Action Column */
		iujk_det_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'iujk_det_gridPanel',
			constrain : true,
			store : iujk_det_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'iujk_detGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : {forceFit:true},
			multiSelect : true,
			keys : iujk_det_shorcut,
			columns : [
				{
					text : 'Id',
					dataIndex : 'det_iujk_iujk_id',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'Jenis',
					dataIndex : 'det_iujk_jenis',
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
					dataIndex : 'det_iujk_tanggal',
					width : 100,
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
					text : 'Perusahaan',
					dataIndex : 'iujk_perusahaan',
					width : 150,
					sortable : false
				},
				{
					text : 'Nomor Rekomendasi',
					dataIndex : 'det_iujk_rekomnomor',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'Tanggal Rekomendasi',
					dataIndex : 'det_iujk_rekomtanggal',
					width : 100,
					sortable : false,
					renderer : Ext.util.Format.dateRenderer('d-m-Y'),
					hidden : true
				},
				{
					text : 'Tgl Berlaku',
					dataIndex : 'det_iujk_berlaku',
					width : 100,
					sortable : false,
					renderer : Ext.util.Format.dateRenderer('d-m-Y'),
					hidden : true
				},
				{
					text : 'Tgl Kadaluarsa',
					dataIndex : 'det_iujk_kadaluarsa',
					width : 100,
					sortable : false,
					renderer : Ext.util.Format.dateRenderer('d-m-Y'),
					hidden : true
				},
				{
					text : 'Penanggung Jawab 1',
					dataIndex : 'det_iujk_pj1',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'Penanggung Jawab 2',
					dataIndex : 'det_iujk_pj2',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'Penanggung Jawab 3',
					dataIndex : 'det_iujk_pj3',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'Penanggung Jawab Teknis',
					dataIndex : 'det_iujk_pjteknis',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'NO. PJT -BU',
					dataIndex : 'det_iujk_pjtbu',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'Lulus Survey',
					dataIndex : 'det_iujk_surveylulus',
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
					dataIndex : 'det_iujk_proses',
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
							iujk_det_printContextMenu.showAt(e.getXY());
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
							iujk_det_confirmUpdate();
						}
					},{
						iconCls: 'icon16x16-delete',
						tooltip: 'Hapus Data',
						handler: function(grid, rowIndex){
							grid.getSelectionModel().select(rowIndex);
							iujk_det_confirmDelete();
						}
					}]
				},
				{
					xtype:'actioncolumn',
					text : 'Proses',
					width:30,
					items: [{
						iconCls : 'checked',
						tooltip : 'Ubah Status',
						handler: function(grid, rowIndex, colIndex, node, e) {
							e.stopEvent();
							iujk_det_prosesContextMenu.showAt(e.getXY());
							return false;
						}
					}]
				}
			],
			tbar : [
				iujk_det_addButton,
				iujk_det_gridSearchField,
				iujk_det_refreshButton,
				iujk_det_printButton,
				iujk_det_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : iujk_det_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					iujk_det_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		det_iujk_idField = Ext.create('Ext.form.NumberField',{
			id : 'det_iujk_idField',
			name : 'det_iujk_id',
			fieldLabel : 'Id <font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		det_iujk_iujk_idField = Ext.create('Ext.form.NumberField',{
			id : 'det_iujk_iujk_idField',
			name : 'det_iujk_iujk_id',
			fieldLabel : 'Id ',
			allowNegatife : false,
			blankText : '0',
			hidden : true,
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		det_iujk_jenisField = Ext.create('Ext.form.ComboBox',{
			id : 'det_iujk_jenisField',
			name : 'det_iujk_jenis',
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
						// det_iujk_sklamaField.show();
					}else{
						// det_iujk_sklamaField.hide();
					}
				}
			}
		});
		det_iujk_tanggalField = Ext.create('Ext.form.field.Date',{
			id : 'det_iujk_tanggalField',
			name : 'det_iujk_tanggal',
			fieldLabel : 'Tanggal',
			format : 'd-m-Y',
			maxValue : new Date('<?php echo date('Y-m-d').'T'.date('H:i:s'); ?>')
		});
		det_iujk_namaField = Ext.create('Ext.form.TextField',{
			id : 'det_iujk_namaField',
			name : 'det_iujk_nama',
			fieldLabel : 'Nama',
			maxLength : 50
		});
		det_iujk_nomorregField = Ext.create('Ext.form.TextField',{
			id : 'det_iujk_nomorregField',
			name : 'det_iujk_nomorreg',
			fieldLabel : 'Nomor Reg',
			maxLength : 50
		});
		det_iujk_rekomnomorField = Ext.create('Ext.form.TextField',{
			id : 'det_iujk_rekomnomorField',
			name : 'det_iujk_rekomnomor',
			fieldLabel : 'Nomor Rekom',
			maxLength : 255
		});
		det_iujk_rekomtanggalField = Ext.create('Ext.form.field.Date',{
			id : 'det_iujk_rekomtanggalField',
			name : 'det_iujk_rekomtanggal',
			fieldLabel : 'Tanggal Rekom',
			format : 'd-m-Y',
			maxValue : new Date('<?php echo date('Y-m-d').'T'.date('H:i:s'); ?>')
		});
		det_iujk_berlakuField = Ext.create('Ext.form.field.Date',{
			id : 'det_iujk_berlakuField',
			name : 'det_iujk_berlaku',
			fieldLabel : 'Tanggal Berlaku',
			format : 'd-m-Y'
		});
		det_iujk_kadaluarsaField = Ext.create('Ext.form.field.Date',{
			id : 'det_iujk_kadaluarsaField',
			name : 'det_iujk_kadaluarsa',
			fieldLabel : 'Tanggal Kadaluarsa',
			format : 'd-m-Y',
			minValue : new Date('<?php echo date('Y-m-d').'T'.date('H:i:s'); ?>')
		});
		det_iujk_pj1Field = Ext.create('Ext.form.TextField',{
			id : 'det_iujk_pj1Field',
			name : 'det_iujk_pj1',
			fieldLabel : 'Penanggung Jawab 1',
			maxLength : 50
		});
		det_iujk_pj2Field = Ext.create('Ext.form.TextField',{
			id : 'det_iujk_pj2Field',
			name : 'det_iujk_pj2',
			fieldLabel : 'Penanggung Jawab 2',
			maxLength : 50
		});
		det_iujk_pj3Field = Ext.create('Ext.form.TextField',{
			id : 'det_iujk_pj3Field',
			name : 'det_iujk_pj3',
			fieldLabel : 'Penanggung Jawab 3',
			maxLength : 50
		});
		det_iujk_pjteknisField = Ext.create('Ext.form.TextField',{
			id : 'det_iujk_pjteknisField',
			name : 'det_iujk_pjteknis',
			fieldLabel : 'Penanggung Jawab Teknis',
			maxLength : 50
		});
		det_iujk_pjtbuField = Ext.create('Ext.form.TextField',{
			id : 'det_iujk_pjtbuField',
			name : 'det_iujk_pjtbu',
			fieldLabel : 'No. PJT - BU',
			maxLength : 50
		});
		det_iujk_surveylulusField = Ext.create('Ext.form.ComboBox',{
			id : 'det_iujk_surveylulusField',
			name : 'det_iujk_surveylulus',
			fieldLabel : 'Lulus Survey ?',
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
		/* field IUJK */
		iujk_perusahaanField = Ext.create('Ext.form.TextField',{
			id : 'iujk_perusahaanField',
			name : 'iujk_perusahaan',
			fieldLabel : 'Nama Perusahaan',
			maxLength : 50
		});
		iujk_alamatField = Ext.create('Ext.form.TextField',{
			id : 'iujk_alamatField',
			name : 'iujk_alamat',
			fieldLabel : 'Alamat',
			maxLength : 100
		});
		iujk_direkturField = Ext.create('Ext.form.TextField',{
			id : 'iujk_direkturField',
			name : 'iujk_direktur',
			fieldLabel : 'Direktur',
			maxLength : 50
		});
		iujk_golonganField = Ext.create('Ext.form.TextField',{
			id : 'iujk_golonganField',
			name : 'iujk_golongan',
			fieldLabel : 'Golongan',
			maxLength : 50
		});
		iujk_kualifikasiField = Ext.create('Ext.form.TextField',{
			id : 'iujk_kualifikasiField',
			name : 'iujk_kualifikasi',
			fieldLabel : 'Kualifikasi',
			maxLength : 50
		});
		iujk_bidangusahaField = Ext.create('Ext.form.TextField',{
			id : 'iujk_bidangusahaField',
			name : 'iujk_bidangusaha',
			fieldLabel : 'Bidang Usaha',
			maxLength : 50
		});
		iujk_rtField = Ext.create('Ext.form.TextField',{
			id : 'iujk_rtField',
			name : 'iujk_rt',
			fieldLabel : 'RT',
			maskRe : /([0-9]+)$/
		});
		iujk_rwField = Ext.create('Ext.form.TextField',{
			id : 'iujk_rwField',
			name : 'iujk_rw',
			fieldLabel : 'RW',
			maskRe : /([0-9]+)$/
		});
		iujk_kelurahanField = Ext.create('Ext.form.TextField',{
			id : 'iujk_kelurahanField',
			name : 'iujk_kelurahan',
			fieldLabel : 'Kelurahan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/
		});
		iujk_kotaField = Ext.create('Ext.form.TextField',{
			id : 'iujk_kotaField',
			name : 'iujk_kota',
			fieldLabel : 'Kota',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/
		});
		iujk_propinsiField = Ext.create('Ext.form.TextField',{
			id : 'iujk_propinsiField',
			name : 'iujk_propinsi',
			fieldLabel : 'Propinsi',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/
		});
		iujk_teleponField = Ext.create('Ext.form.TextField',{
			id : 'iujk_teleponField',
			name : 'iujk_telepon',
			fieldLabel : 'Telepon',
			maxLength : 20
		});
		iujk_kodeposField = Ext.create('Ext.form.TextField',{
			id : 'iujk_kodeposField',
			name : 'iujk_kodepos',
			fieldLabel : 'Kodepos',
			maxLength : 7
		});
		iujk_faxField = Ext.create('Ext.form.TextField',{
			id : 'iujk_faxField',
			name : 'iujk_fax',
			fieldLabel : 'Fax',
			maxLength : 20
		});
		iujk_npwpField = Ext.create('Ext.form.TextField',{
			id : 'iujk_npwpField',
			name : 'iujk_npwp',
			fieldLabel : 'NPWP',
			maxLength : 50
		});
		/* end field IUJK */
		
		iujk_det_syaratDataStore = Ext.create('Ext.data.Store',{
			id : 'iujk_det_syaratDataStore',
			pageSize : globalPageSize,
			autoLoad : true,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_iujk_det/switchAction',
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
				{ name : 'iujk_cek_id', type : 'int', mapping : 'iujk_cek_id' },
				{ name : 'iujk_cek_syarat_id', type : 'int', mapping : 'iujk_cek_syarat_id' },
				{ name : 'iujk_cek_iujkdet_id', type : 'int', mapping : 'iujk_cek_iujkdet_id' },
				{ name : 'iujk_cek_iujk_id', type : 'int', mapping : 'iujk_cek_iujk_id' },
				{ name : 'iujk_cek_status', type : 'boolean', mapping : 'iujk_cek_status' },
				{ name : 'iujk_cek_keterangan', type : 'string', mapping : 'iujk_cek_keterangan' },
				{ name : 'iujk_cek_syarat_nama', type : 'string', mapping : 'iujk_cek_syarat_nama' }
				]
		});
		var det_iujk_syaratGridEditor = new Ext.grid.plugin.CellEditing({
			clicksToEdit: 1
		});
		/* START DATA PEMOHON */
		var iujk_det_pemohon_idField = Ext.create('Ext.form.Hidden',{
			name : 'pemohon_id'
		});
		var iujk_det_pemohon_namaField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_nama',
			fieldLabel : 'Nama',
			maxLength : 50
		});
		var iujk_det_pemohon_alamatField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_alamat',
			fieldLabel : 'Alamat',
			maxLength : 100
		});
		var iujk_det_pemohon_telpField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_telp',
			fieldLabel : 'Telp',
			maxLength : 20,
			maskRe : /([0-9]+)$/
		});
		var iujk_det_pemohon_npwpField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_npwp',
			fieldLabel : 'NPWP',
			maxLength : 50
		});
		var iujk_det_pemohon_rtField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_rt',
			fieldLabel : 'RT',
			maskRe : /([0-9]+)$/
		});
		var iujk_det_pemohon_rwField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_rw',
			fieldLabel : 'RW',
			maskRe : /([0-9]+)$/
		});
		var iujk_det_pemohon_kelField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_kel',
			fieldLabel : 'Kelurahan',
			maxLength : 50
		});
		var iujk_det_pemohon_kecField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_kec',
			fieldLabel : 'Kecamatan',
			maxLength : 50
		});
		var iujk_det_pemohon_nikField = Ext.create('Ext.form.ComboBox',{
			name : 'iujk_det_pemohon_nik',
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
				var store = iujk_det_pemohon_nikField.getStore();
				var val = iujk_det_pemohon_nikField.getRawValue();
				store.proxy.extraParams = {action : 'SEARCH',pemohon_nik : val};
				store.load();
				iujk_det_pemohon_nikField.expand();
				iujk_det_pemohon_nikField.fireEvent("ontriggerclick", this, event);
			},  
			tpl: Ext.create('Ext.XTemplate',
				'<tpl for=".">',
					'<div class="x-boundlist-item">NIK : {pemohon_nik}<br>Nama : {pemohon_nama}<br>Alamat : {pemohon_alamat}<br>Telp : {pemohon_telp}<br></div>',
				'</tpl>'
			),
			listeners : {
				select : function(cmb, record){
					var rec=record[0];
					iujk_det_pemohon_idField.setValue(rec.get('pemohon_id'));
					iujk_det_pemohon_nikField.setValue(rec.get('pemohon_nik'));
					iujk_det_pemohon_namaField.setValue(rec.get('pemohon_nama'));
					iujk_det_pemohon_alamatField.setValue(rec.get('pemohon_alamat'));
					iujk_det_pemohon_telpField.setValue(rec.get('pemohon_telp'));
					iujk_det_pemohon_npwpField.setValue(rec.get('pemohon_npwp'));
					iujk_det_pemohon_rtField.setValue(rec.get('pemohon_rt'));
					iujk_det_pemohon_rwField.setValue(rec.get('pemohon_rw'));
					iujk_det_pemohon_kelField.setValue(rec.get('pemohon_kel'));
					iujk_det_pemohon_kecField.setValue(rec.get('pemohon_kec'));
					iujk_det_pemohon_straField.setValue(rec.get('pemohon_stra'));
					iujk_det_pemohon_surattugasField.setValue(rec.get('pemohon_surattugas'));
					iujk_det_pemohon_pekerjaanField.setValue(rec.get('pemohon_pekerjaan'));
					iujk_det_pemohon_tempatlahirField.setValue(rec.get('pemohon_tempatlahir'));
					iujk_det_pemohon_tanggallahirField.setValue(rec.get('pemohon_tanggallahir'));
					iujk_det_pemohon_user_idField.setValue(rec.get('pemohon_user_id'));
					iujk_det_pemohon_pendidikanField.setValue(rec.get('pemohon_pendidikan'));
					iujk_det_pemohon_tahunlulusField.setValue(rec.get('pemohon_tahunlulus'));
				}
			}
		});
		var iujk_det_pemohon_straField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_stra',
			fieldLabel : 'STRA',
			maxLength : 50
		});
		var iujk_det_pemohon_surattugasField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_surattugas',
			fieldLabel : 'Surat Tugas',
			maxLength : 50
		});
		var iujk_det_pemohon_pekerjaanField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_pekerjaan',
			fieldLabel : 'Pekerjaan',
			maxLength : 50
		});
		var iujk_det_pemohon_tempatlahirField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_tempatlahir',
			fieldLabel : 'Tempat Lahir',
			maxLength : 50
		});
		var iujk_det_pemohon_tanggallahirField = Ext.create('Ext.form.field.Date',{
			name : 'pemohon_tanggallahir',
			fieldLabel : 'Tanggal Lahir',
			format : 'd-m-Y'
		});
		var iujk_det_pemohon_user_idField = Ext.create('Ext.form.Hidden',{
			name : 'pemohon_user_id',
		});
		var iujk_det_pemohon_pendidikanField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_pendidikan',
			fieldLabel : 'Pendidikan',
			maxLength : 50
		});
		var iujk_det_pemohon_tahunlulusField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_tahunlulus',
			fieldLabel : 'Tahun Lulus',
			maxLength : 4,
			maskRe : /([0-9]+)$/
		});
		/* END DATA PEMOHON */
		det_iujk_syaratGrid = Ext.create('Ext.grid.Panel',{
			id : 'det_iujk_syaratGrid',
			store : iujk_det_syaratDataStore,
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
					dataIndex : 'iujk_cek_id',
					width : 100,
					hidden : true,
					sortable : false
				},
				{
					text : 'Syarat',
					dataIndex : 'iujk_cek_syarat_nama',
					width : 150,
					sortable : false
				},
				{
					xtype: 'checkcolumn',
					text: 'Ada?',
					dataIndex: 'iujk_cek_status',
					width: 55,
					stopSelection: false,
					hidden : true
				},
				{
					text : 'Keterangan',
					dataIndex : 'iujk_cek_keterangan',
					width : 100,
					sortable : false,
					editor: 'textfield',
					flex : 1
				}
			]
		});
		var iujk_det_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : iujk_det_save
		});
		var iujk_det_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				iujk_det_resetForm();
				iujk_det_switchToGrid();
			}
		});
		iujk_det_formPanel = Ext.create('Ext.form.Panel', {
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
						{
							xtype : 'fieldset',
							title : '1. Data Permohonan',
							checkboxToggle : false,
							collapsible : false,
							layout :'form',
							items : [
								det_iujk_idField,
								det_iujk_iujk_idField,
								det_iujk_jenisField,
								det_iujk_tanggalField
							]
						},
						{
							xtype : 'fieldset',
							title : '2. Data Pemohon ',
							checkboxToggle : false,
							collapsible : false,
							layout :'form',
							items : [
								iujk_det_pemohon_idField,
								iujk_det_pemohon_nikField,
								iujk_det_pemohon_namaField,
								iujk_det_pemohon_alamatField,
								iujk_det_pemohon_telpField,
								iujk_det_pemohon_npwpField,
								iujk_det_pemohon_rtField,
								iujk_det_pemohon_rwField,
								iujk_det_pemohon_kelField,
								iujk_det_pemohon_kecField,
								iujk_det_pemohon_straField,
								iujk_det_pemohon_surattugasField,
								iujk_det_pemohon_pekerjaanField,
								iujk_det_pemohon_tempatlahirField,
								iujk_det_pemohon_tanggallahirField,
								iujk_det_pemohon_user_idField,
								iujk_det_pemohon_pendidikanField,
								iujk_det_pemohon_tahunlulusField
							]
						},
						{
							xtype : 'fieldset',
							title : '3. Data Perusahaan',
							checkboxToggle : false,
							collapsible : false,
							layout :'form',
							items : [
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
								det_iujk_pj1Field,
								det_iujk_pj2Field,
								det_iujk_pj3Field,
								det_iujk_pjteknisField,
								det_iujk_pjtbuField
							]
						},
						{
							xtype : 'fieldset',
							title : '4. Data Ceklist',
							checkboxToggle : false,
							collapsible : false,
							layout :'form',
							items : [
								det_iujk_syaratGrid
							]
						},
						{
							xtype : 'fieldset',
							title : '5. Data Pendukung',
							checkboxToggle : false,
							collapsible : false,
							layout :'form',
							items : [
								det_iujk_nomorregField,
								det_iujk_rekomnomorField,
								det_iujk_rekomtanggalField,
								det_iujk_berlakuField,
								det_iujk_kadaluarsaField,
								det_iujk_surveylulusField,
							]
						},
						Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })
					]
				}
			],
			buttons : [iujk_det_saveButton,iujk_det_cancelButton]
		});
		iujk_det_formWindow = Ext.create('Ext.window.Window',{
			id : 'iujk_det_formWindow',
			renderTo : 'iujk_detSaveWindow',
			title : globalFormAddEditTitle + ' ' + iujk_det_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [iujk_det_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		det_iujk_iujk_idSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_iujk_iujk_idSearchField',
			name : 'det_iujk_iujk_id',
			fieldLabel : 'det_iujk_iujk_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_iujk_jenisSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_iujk_jenisSearchField',
			name : 'det_iujk_jenis',
			fieldLabel : 'det_iujk_jenis',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_iujk_tanggalSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_iujk_tanggalSearchField',
			name : 'det_iujk_tanggal',
			fieldLabel : 'det_iujk_tanggal',
			maxLength : 0
		
		});
		det_iujk_namaSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_iujk_namaSearchField',
			name : 'det_iujk_nama',
			fieldLabel : 'det_iujk_nama',
			maxLength : 50
		
		});
		det_iujk_nomorregSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_iujk_nomorregSearchField',
			name : 'det_iujk_nomorreg',
			fieldLabel : 'det_iujk_nomorreg',
			maxLength : 50
		
		});
		det_iujk_rekomnomorSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_iujk_rekomnomorSearchField',
			name : 'det_iujk_rekomnomor',
			fieldLabel : 'det_iujk_rekomnomor',
			maxLength : 255
		
		});
		det_iujk_rekomtanggalSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_iujk_rekomtanggalSearchField',
			name : 'det_iujk_rekomtanggal',
			fieldLabel : 'det_iujk_rekomtanggal',
			maxLength : 0
		
		});
		det_iujk_berlakuSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_iujk_berlakuSearchField',
			name : 'det_iujk_berlaku',
			fieldLabel : 'det_iujk_berlaku',
			maxLength : 0
		
		});
		det_iujk_kadaluarsaSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_iujk_kadaluarsaSearchField',
			name : 'det_iujk_kadaluarsa',
			fieldLabel : 'det_iujk_kadaluarsa',
			maxLength : 0
		
		});
		det_iujk_pj1SearchField = Ext.create('Ext.form.TextField',{
			id : 'det_iujk_pj1SearchField',
			name : 'det_iujk_pj1',
			fieldLabel : 'det_iujk_pj1',
			maxLength : 50
		
		});
		det_iujk_pj2SearchField = Ext.create('Ext.form.TextField',{
			id : 'det_iujk_pj2SearchField',
			name : 'det_iujk_pj2',
			fieldLabel : 'det_iujk_pj2',
			maxLength : 50
		
		});
		det_iujk_pj3SearchField = Ext.create('Ext.form.TextField',{
			id : 'det_iujk_pj3SearchField',
			name : 'det_iujk_pj3',
			fieldLabel : 'det_iujk_pj3',
			maxLength : 50
		
		});
		det_iujk_pjteknisSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_iujk_pjteknisSearchField',
			name : 'det_iujk_pjteknis',
			fieldLabel : 'det_iujk_pjteknis',
			maxLength : 50
		
		});
		det_iujk_pjtbuSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_iujk_pjtbuSearchField',
			name : 'det_iujk_pjtbu',
			fieldLabel : 'det_iujk_pjtbu',
			maxLength : 50
		
		});
		det_iujk_surveylulusSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_iujk_surveylulusSearchField',
			name : 'det_iujk_surveylulus',
			fieldLabel : 'det_iujk_surveylulus',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		var iujk_det_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : iujk_det_search
		});
		var iujk_det_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				iujk_det_searchWindow.hide();
			}
		});
		iujk_det_searchPanel = Ext.create('Ext.form.Panel', {
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
						det_iujk_iujk_idSearchField,
						det_iujk_jenisSearchField,
						det_iujk_tanggalSearchField,
						det_iujk_namaSearchField,
						det_iujk_nomorregSearchField,
						det_iujk_rekomnomorSearchField,
						det_iujk_rekomtanggalSearchField,
						det_iujk_berlakuSearchField,
						det_iujk_kadaluarsaSearchField,
						det_iujk_pj1SearchField,
						det_iujk_pj2SearchField,
						det_iujk_pj3SearchField,
						det_iujk_pjteknisSearchField,
						det_iujk_pjtbuSearchField,
						det_iujk_surveylulusSearchField,
						]
				}],
			buttons : [iujk_det_searchingButton,iujk_det_cancelSearchButton]
		});
		iujk_det_searchWindow = Ext.create('Ext.window.Window',{
			id : 'iujk_det_searchWindow',
			renderTo : 'iujk_detSearchWindow',
			title : globalFormSearchTitle + ' ' + iujk_det_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [iujk_det_searchPanel]
		});
		<?php if(@$_SESSION['IDHAK'] == 2){ ?>
			iujk_det_lk_printCM.hide();
			iujk_det_rekom_printCM.hide();
			iujk_det_sk_printCM.hide();
			iujk_det_gridPanel.columns[18].setVisible(false);
			iujk_det_gridPanel.columns[19].setVisible(false);
		<?php } ?>
/* End SearchPanel declaration */
});
</script>
<div id="iujk_detSaveWindow"></div>
<div id="iujk_detSearchWindow"></div>
<div class="span12" id="iujk_detGrid"></div>