<style>
	.checked{
		background-image:url(../assets/images/icons/check.png) !important;
	}
</style>
<h4>IZIN APOTEK</h4>
<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var apotek_det_componentItemTitle="Izin Apotek";
		var apotek_det_dataStore;
		
		var apotek_det_shorcut;
		var apotek_det_contextMenu;
		var apotek_det_gridSearchField;
		var apotek_det_gridPanel;
		var apotek_det_formPanel;
		var apotek_det_formWindow;
		var apotek_det_searchPanel;
		var apotek_det_searchWindow;
		
		var det_apotek_idField;
		var det_apotek_apotek_idField;
		var det_apotek_jenisField;
		var det_apotek_sklamaField;
		var det_apotek_surveylulusField;
		var det_apotek_namaField;
		var det_apotek_alamatField;
		var det_apotek_telpField;
		var det_apotek_spField;
		var det_apotek_ktpField;
		var det_apotek_tempatlahirField;
		var det_apotek_tanggallahirField;
		var det_apotek_pekerjaanField;
		var det_apotek_npwpField;
		var det_apotek_straField;
		var det_apotek_pendidikanField;
		var det_apotek_tahunlulusField;
		var det_apotek_terimaField;
		var det_apotek_terimatanggalField;
		var det_apotek_tanggalField;
		var det_apotek_kelengkapanField;
		var det_apotek_bapField;
		var det_apotek_skField;
		var det_apotek_baptanggalField;
		var det_apotek_berlakuField;
		var det_apotek_kadaluarsaField;
		var det_apotek_keputusanField;
		var det_apotek_keteranganField;
		var det_apotek_jarakField;
		var det_apotek_rracikField;
		var det_apotek_radminField;
		var det_apotek_rkerjaField;
		var det_apotek_rtungguField;
		var det_apotek_rwcField;
		var det_apotek_airField;
		var det_apotek_listrikField;
		var det_apotek_apkField;
		var det_apotek_apkukuranField;
		var det_apotek_jendelaField;
		var det_apotek_limbahField;
		var det_apotek_baksampahField;
		var det_apotek_parkirField;
		var det_apotek_papannamaField;
		var det_apotek_pengelolaField;
		var det_apotek_pendampingField;
		var det_apotek_asistenField;
		var det_apotek_luasField;
		var det_apotek_statustanahField;
		var det_apotek_sewalamaField;
		var det_apotek_sewaawalField;
		var det_apotek_sewaakhirField;
		var det_apotek_shnomorField;
		var det_apotek_shtahunField;
		var det_apotek_shgssuField;
		var det_apotek_shtanggalField;
		var det_apotek_shanField;
		var det_apotek_aktanoField;
		var det_apotek_aktatahunField;
		var det_apotek_aktanotarisField;
		var det_apotek_aktaanField;
		var det_apotek_ckutipanField;
		var det_apotek_ckecField;
		var det_apotek_ctanggalField;
		var det_apotek_cpetokField;
		var det_apotek_cpersilField;
		var det_apotek_ckelasField;
		var det_apotek_canField;
		var det_apotek_sppihak1Field;
		var det_apotek_sppihak2Field;
		var det_apotek_spnomorField;
		var det_apotek_sptanggalField;
		var det_apotek_notarisField;
		
		var apotek_namaField;
		var apotek_alamatField;
		var apotek_telpField;
		var apotek_kelField;
		var apotek_kecField;
		var apotek_kepemilikanField;
		var apotek_pemilikField;
		var apotek_pemilikalamatField;
		var apotek_pemiliknpwpField;
		var apotek_siupField;
				
		var det_apotek_apotek_idSearchField;
		var det_apotek_jenisSearchField;
		var det_apotek_surveylulusSearchField;
		var det_apotek_namaSearchField;
		var det_apotek_alamatSearchField;
		var det_apotek_telpSearchField;
		var det_apotek_spSearchField;
		var det_apotek_ktpSearchField;
		var det_apotek_tempatlahirSearchField;
		var det_apotek_tanggallahirSearchField;
		var det_apotek_pekerjaanSearchField;
		var det_apotek_npwpSearchField;
		var det_apotek_straSearchField;
		var det_apotek_pendidikanSearchField;
		var det_apotek_tahunlulusSearchField;
		var det_apotek_terimaSearchField;
		var det_apotek_terimatanggalSearchField;
		var det_apotek_kelengkapanSearchField;
		var det_apotek_bapSearchField;
		var det_apotek_baptanggalSearchField;
		var det_apotek_keputusanSearchField;
		var det_apotek_keteranganSearchField;
		var det_apotek_jarakSearchField;
		var det_apotek_rracikSearchField;
		var det_apotek_radminSearchField;
		var det_apotek_rkerjaSearchField;
		var det_apotek_rtungguSearchField;
		var det_apotek_rwcSearchField;
		var det_apotek_airSearchField;
		var det_apotek_listrikSearchField;
		var det_apotek_apkSearchField;
		var det_apotek_apkukuranSearchField;
		var det_apotek_jendelaSearchField;
		var det_apotek_limbahSearchField;
		var det_apotek_baksampahSearchField;
		var det_apotek_parkirSearchField;
		var det_apotek_papannamaSearchField;
		var det_apotek_pengelolaSearchField;
		var det_apotek_pendampingSearchField;
		var det_apotek_asistenSearchField;
		var det_apotek_luasSearchField;
		var det_apotek_statustanahSearchField;
		var det_apotek_sewalamaSearchField;
		var det_apotek_sewaawalSearchField;
		var det_apotek_sewaakhirSearchField;
		var det_apotek_shnomorSearchField;
		var det_apotek_shtahunSearchField;
		var det_apotek_shgssuSearchField;
		var det_apotek_shtanggalSearchField;
		var det_apotek_shanSearchField;
		var det_apotek_aktanoSearchField;
		var det_apotek_aktatahunSearchField;
		var det_apotek_aktanotarisSearchField;
		var det_apotek_aktaanSearchField;
		var det_apotek_ckutipanSearchField;
		var det_apotek_ckecSearchField;
		var det_apotek_ctanggalSearchField;
		var det_apotek_cpetokSearchField;
		var det_apotek_cpersilSearchField;
		var det_apotek_ckelasSearchField;
		var det_apotek_canSearchField;
		var det_apotek_sppihak1SearchField;
		var det_apotek_sppihak2SearchField;
		var det_apotek_spnomorSearchField;
		var det_apotek_sptanggalSearchField;
		var det_apotek_notarisSearchField;
				
		var apotek_det_dbTask = 'CREATE';
		var apotek_det_dbTaskMessage = 'Tambah';
		var apotek_det_dbPermission = 'CRUD';
		var apotek_det_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function apotek_det_switchToGrid(){
			apotek_det_formPanel.setDisabled(true);
			apotek_det_gridPanel.setDisabled(false);
			apotek_det_formWindow.hide();
		}
		
		function apotek_det_switchToForm(){
			apotek_det_gridPanel.setDisabled(true);
			apotek_det_formPanel.setDisabled(false);
			apotek_det_formWindow.show();
		}
		
		function apotek_det_confirmAdd(){
			apotek_det_dbTask = 'CREATE';
			apotek_det_dbTaskMessage = 'created';
			apotek_det_resetForm();
			apotek_det_syaratDataStore.proxy.extraParams = { 
				currentAction : 'create',
				action : 'GETSYARAT'
			};
			apotek_det_syaratDataStore.load();
			apotek_det_perlengkapanDataStore.proxy.extraParams = { 
				currentAction : 'create',
				action : 'GETPERLENGKAPAN'
			};
			apotek_det_perlengkapanDataStore.load();
			apotek_det_switchToForm();
		}
		
		function apotek_det_confirmUpdate(){
			if(apotek_det_gridPanel.selModel.getCount() == 1) {
				apotek_det_dbTask = 'UPDATE';
				apotek_det_dbTaskMessage = 'updated';
				apotek_det_switchToForm();
				apotek_det_setForm();
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
		
		function apotek_det_confirmDelete(){
			if(apotek_det_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, apotek_det_delete);
			}else if(apotek_det_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, apotek_det_delete);
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
		
		function apotek_det_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(apotek_det_dbPermission)==false && pattC.test(apotek_det_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(apotek_det_confirmFormValid()){
					var det_apotek_idValue = '';
					var det_apotek_apotek_idValue = '';
					var det_apotek_jenisValue = '';
					var det_apotek_lamaValue = '';
					var det_apotek_surveylulusValue = '';
					var det_apotek_namaValue = '';
					var det_apotek_alamatValue = '';
					var det_apotek_telpValue = '';
					var det_apotek_spValue = '';
					var det_apotek_ktpValue = '';
					var det_apotek_tempatlahirValue = '';
					var det_apotek_tanggallahirValue = '';
					var det_apotek_pekerjaanValue = '';
					var det_apotek_npwpValue = '';
					var det_apotek_straValue = '';
					var det_apotek_pendidikanValue = '';
					var det_apotek_tahunlulusValue = '';
					var det_apotek_terimaValue = '';
					var det_apotek_terimatanggalValue = '';
					var det_apotek_tanggalValue = '';
					var det_apotek_kelengkapanValue = '';
					var det_apotek_bapValue = '';
					var det_apotek_skValue = '';
					var det_apotek_baptanggalValue = '';
					var det_apotek_berlakuValue = '';
					var det_apotek_kadaluarsaValue = '';
					var det_apotek_keputusanValue = '';
					var det_apotek_keteranganValue = '';
					var det_apotek_jarakValue = '';
					var det_apotek_rracikValue = '';
					var det_apotek_radminValue = '';
					var det_apotek_rkerjaValue = '';
					var det_apotek_rtungguValue = '';
					var det_apotek_rwcValue = '';
					var det_apotek_airValue = '';
					var det_apotek_listrikValue = '';
					var det_apotek_apkValue = '';
					var det_apotek_apkukuranValue = '';
					var det_apotek_jendelaValue = '';
					var det_apotek_limbahValue = '';
					var det_apotek_baksampahValue = '';
					var det_apotek_parkirValue = '';
					var det_apotek_papannamaValue = '';
					var det_apotek_pengelolaValue = '';
					var det_apotek_pendampingValue = '';
					var det_apotek_asistenValue = '';
					var det_apotek_luasValue = '';
					var det_apotek_statustanahValue = '';
					var det_apotek_sewalamaValue = '';
					var det_apotek_sewaawalValue = '';
					var det_apotek_sewaakhirValue = '';
					var det_apotek_shnomorValue = '';
					var det_apotek_shtahunValue = '';
					var det_apotek_shgssuValue = '';
					var det_apotek_shtanggalValue = '';
					var det_apotek_shanValue = '';
					var det_apotek_aktanoValue = '';
					var det_apotek_aktatahunValue = '';
					var det_apotek_aktanotarisValue = '';
					var det_apotek_aktaanValue = '';
					var det_apotek_ckutipanValue = '';
					var det_apotek_ckecValue = '';
					var det_apotek_ctanggalValue = '';
					var det_apotek_cpetokValue = '';
					var det_apotek_cpersilValue = '';
					var det_apotek_ckelasValue = '';
					var det_apotek_canValue = '';
					var det_apotek_sppihak1Value = '';
					var det_apotek_sppihak2Value = '';
					var det_apotek_spnomorValue = '';
					var det_apotek_sptanggalValue = '';
					var det_apotek_notarisValue = '';
					
					var apotek_namaValue = '';
					var apotek_alamatValue = '';
					var apotek_telpValue = '';
					var apotek_kelValue = '';
					var apotek_kecValue = '';
					var apotek_kepemilikanValue = '';
					var apotek_pemilikValue = '';
					var apotek_pemilikalamatValue = '';
					var apotek_pemiliknpwpValue = '';
					var apotek_siupValue = '';
										
					det_apotek_idValue = det_apotek_idField.getValue();
					det_apotek_apotek_idValue = det_apotek_apotek_idField.getValue();
					det_apotek_jenisValue = det_apotek_jenisField.getValue();
					det_apotek_lamaValue = det_apotek_sklamaField.getValue();
					det_apotek_surveylulusValue = det_apotek_surveylulusField.getValue();
					det_apotek_namaValue = det_apotek_namaField.getValue();
					det_apotek_alamatValue = det_apotek_alamatField.getValue();
					det_apotek_telpValue = det_apotek_telpField.getValue();
					det_apotek_spValue = det_apotek_spField.getValue();
					det_apotek_ktpValue = det_apotek_ktpField.getValue();
					det_apotek_tempatlahirValue = det_apotek_tempatlahirField.getValue();
					det_apotek_tanggallahirValue = det_apotek_tanggallahirField.getValue();
					det_apotek_pekerjaanValue = det_apotek_pekerjaanField.getValue();
					det_apotek_npwpValue = det_apotek_npwpField.getValue();
					det_apotek_straValue = det_apotek_straField.getValue();
					det_apotek_pendidikanValue = det_apotek_pendidikanField.getValue();
					det_apotek_tahunlulusValue = det_apotek_tahunlulusField.getValue();
					det_apotek_terimaValue = det_apotek_terimaField.getValue();
					det_apotek_terimatanggalValue = det_apotek_terimatanggalField.getValue();
					det_apotek_tanggalValue = det_apotek_tanggalField.getValue();
					det_apotek_kelengkapanValue = det_apotek_kelengkapanField.getValue();
					det_apotek_bapValue = det_apotek_bapField.getValue();
					det_apotek_skValue = det_apotek_skField.getValue();
					det_apotek_baptanggalValue = det_apotek_baptanggalField.getValue();
					det_apotek_berlakuValue = det_apotek_berlakuField.getValue();
					det_apotek_kadaluarsaValue = det_apotek_kadaluarsaField.getValue();
					det_apotek_keputusanValue = det_apotek_keputusanField.getValue();
					det_apotek_keteranganValue = det_apotek_keteranganField.getValue();
					det_apotek_jarakValue = det_apotek_jarakField.getValue();
					det_apotek_rracikValue = det_apotek_rracikField.getValue();
					det_apotek_radminValue = det_apotek_radminField.getValue();
					det_apotek_rkerjaValue = det_apotek_rkerjaField.getValue();
					det_apotek_rtungguValue = det_apotek_rtungguField.getValue();
					det_apotek_rwcValue = det_apotek_rwcField.getValue();
					det_apotek_airValue = det_apotek_airField.getValue();
					det_apotek_listrikValue = det_apotek_listrikField.getValue();
					det_apotek_apkValue = det_apotek_apkField.getValue();
					det_apotek_apkukuranValue = det_apotek_apkukuranField.getValue();
					det_apotek_jendelaValue = det_apotek_jendelaField.getValue();
					det_apotek_limbahValue = det_apotek_limbahField.getValue();
					det_apotek_baksampahValue = det_apotek_baksampahField.getValue();
					det_apotek_parkirValue = det_apotek_parkirField.getValue();
					det_apotek_papannamaValue = det_apotek_papannamaField.getValue();
					det_apotek_pengelolaValue = det_apotek_pengelolaField.getValue();
					det_apotek_pendampingValue = det_apotek_pendampingField.getValue();
					det_apotek_asistenValue = det_apotek_asistenField.getValue();
					det_apotek_luasValue = det_apotek_luasField.getValue();
					det_apotek_statustanahValue = det_apotek_statustanahField.getValue();
					det_apotek_sewalamaValue = det_apotek_sewalamaField.getValue();
					det_apotek_sewaawalValue = det_apotek_sewaawalField.getValue();
					det_apotek_sewaakhirValue = det_apotek_sewaakhirField.getValue();
					det_apotek_shnomorValue = det_apotek_shnomorField.getValue();
					det_apotek_shtahunValue = det_apotek_shtahunField.getValue();
					det_apotek_shgssuValue = det_apotek_shgssuField.getValue();
					det_apotek_shtanggalValue = det_apotek_shtanggalField.getValue();
					det_apotek_shanValue = det_apotek_shanField.getValue();
					det_apotek_aktanoValue = det_apotek_aktanoField.getValue();
					det_apotek_aktatahunValue = det_apotek_aktatahunField.getValue();
					det_apotek_aktanotarisValue = det_apotek_aktanotarisField.getValue();
					det_apotek_aktaanValue = det_apotek_aktaanField.getValue();
					det_apotek_ckutipanValue = det_apotek_ckutipanField.getValue();
					det_apotek_ckecValue = det_apotek_ckecField.getValue();
					det_apotek_ctanggalValue = det_apotek_ctanggalField.getValue();
					det_apotek_cpetokValue = det_apotek_cpetokField.getValue();
					det_apotek_cpersilValue = det_apotek_cpersilField.getValue();
					det_apotek_ckelasValue = det_apotek_ckelasField.getValue();
					det_apotek_canValue = det_apotek_canField.getValue();
					det_apotek_sppihak1Value = det_apotek_sppihak1Field.getValue();
					det_apotek_sppihak2Value = det_apotek_sppihak2Field.getValue();
					det_apotek_spnomorValue = det_apotek_spnomorField.getValue();
					det_apotek_sptanggalValue = det_apotek_sptanggalField.getValue();
					det_apotek_notarisValue = det_apotek_notarisField.getValue();
					
					apotek_namaValue = apotek_namaField.getValue();
					apotek_alamatValue = apotek_alamatField.getValue();
					apotek_telpValue = apotek_telpField.getValue();
					apotek_kelValue = apotek_kelField.getValue();
					apotek_kecValue = apotek_kecField.getValue();
					apotek_kepemilikanValue = apotek_kepemilikanField.getValue();
					apotek_pemilikValue = apotek_pemilikField.getValue();
					apotek_pemilikalamatValue = apotek_pemilikalamatField.getValue();
					apotek_pemiliknpwpValue = apotek_pemiliknpwpField.getValue();
					apotek_siupValue = apotek_siupField.getValue();
					
					var pemohon_idValue = apotek_det_pemohon_idField.getValue();
					var pemohon_namaValue = apotek_det_pemohon_namaField.getValue();
					var pemohon_alamatValue = apotek_det_pemohon_alamatField.getValue();
					var pemohon_telpValue = apotek_det_pemohon_telpField.getValue();
					var pemohon_npwpValue = apotek_det_pemohon_npwpField.getValue();
					var pemohon_rtValue = apotek_det_pemohon_rtField.getValue();
					var pemohon_rwValue = apotek_det_pemohon_rwField.getValue();
					var pemohon_kelValue = apotek_det_pemohon_kelField.getValue();
					var pemohon_kecValue = apotek_det_pemohon_kecField.getValue();
					var pemohon_nikValue = apotek_det_pemohon_nikField.getValue();
					var pemohon_straValue = apotek_det_pemohon_straField.getValue();
					var pemohon_surattugasValue = apotek_det_pemohon_surattugasField.getValue();
					var pemohon_pekerjaanValue = apotek_det_pemohon_pekerjaanField.getValue();
					var pemohon_tempatlahirValue = apotek_det_pemohon_tempatlahirField.getValue();
					var pemohon_tanggallahirValue = apotek_det_pemohon_tanggallahirField.getValue();
					var pemohon_user_idValue = apotek_det_pemohon_user_idField.getValue();
					var pemohon_pendidikanValue = apotek_det_pemohon_pendidikanField.getValue();
					var pemohon_tahunlulusValue = apotek_det_pemohon_tahunlulusField.getValue();
					
					var array_apotek_cek_id=new Array();
					var array_apotek_cek_syarat_id=new Array();
					var array_apotek_cek_status=new Array();
					var array_apotek_cek_keterangan=new Array();
					
					if(apotek_det_syaratDataStore.getCount() > 0){
						for(var i=0;i<apotek_det_syaratDataStore.getCount();i++){
							array_apotek_cek_id.push(apotek_det_syaratDataStore.getAt(i).data.apotek_cek_id);
							array_apotek_cek_syarat_id.push(apotek_det_syaratDataStore.getAt(i).data.apotek_cek_syarat_id);
							array_apotek_cek_status.push(apotek_det_syaratDataStore.getAt(i).data.apotek_cek_status);
							array_apotek_cek_keterangan.push(apotek_det_syaratDataStore.getAt(i).data.apotek_cek_keterangan);
						}
					}
					
					var encoded_apotek_cek_id = Ext.encode(array_apotek_cek_id);
					var encoded_apotek_cek_syarat_id = Ext.encode(array_apotek_cek_syarat_id);
					var encoded_apotek_cek_status = Ext.encode(array_apotek_cek_status);
					var encoded_apotek_cek_keterangan = Ext.encode(array_apotek_cek_keterangan);
					
					var array_apotek_ket_id=new Array();
					var array_apotek_ket_perlengkapanid=new Array();
					var array_apotek_ket_status=new Array();
					var array_apotek_ket_jumlah=new Array();
					
					if(apotek_det_perlengkapanDataStore.getCount() > 0){
						for(var i=0;i<apotek_det_perlengkapanDataStore.getCount();i++){
							array_apotek_ket_id.push(apotek_det_perlengkapanDataStore.getAt(i).data.apotek_ket_id);
							array_apotek_ket_perlengkapanid.push(apotek_det_perlengkapanDataStore.getAt(i).data.apotek_ket_perlengkapanid);
							array_apotek_ket_status.push(apotek_det_perlengkapanDataStore.getAt(i).data.apotek_ket_status);
							array_apotek_ket_jumlah.push(apotek_det_perlengkapanDataStore.getAt(i).data.apotek_ket_jumlah);
						}
					}
					
					var encoded_apotek_ket_id = Ext.encode(array_apotek_ket_id);
					var encoded_apotek_ket_perlengkapanid = Ext.encode(array_apotek_ket_perlengkapanid);
					var encoded_apotek_ket_status = Ext.encode(array_apotek_ket_status);
					var encoded_apotek_ket_jumlah = Ext.encode(array_apotek_ket_jumlah);
					
					var asisten_id = [];
					var asisten_nama = [];
					var asisten_sik = [];
					var asisten_lulus = [];
					var asisten_alamat = [];
					
					if(det_apotek_asisten_dataStore.getCount() > 0){
						for(var i=0;i<det_apotek_asisten_dataStore.getCount();i++){
							asisten_id.push(det_apotek_asisten_dataStore.getAt(i).data.asisten_id);
							asisten_nama.push(det_apotek_asisten_dataStore.getAt(i).data.asisten_nama);
							asisten_sik.push(det_apotek_asisten_dataStore.getAt(i).data.asisten_sik);
							asisten_lulus.push(det_apotek_asisten_dataStore.getAt(i).data.asisten_lulus);
							asisten_alamat.push(det_apotek_asisten_dataStore.getAt(i).data.asisten_alamat);
						}
					}
					var encoded_asisten_id = Ext.encode(asisten_id);
					var encoded_asisten_nama = Ext.encode(asisten_nama);
					var encoded_asisten_sik = Ext.encode(asisten_sik);
					var encoded_asisten_lulus = Ext.encode(asisten_lulus);
					var encoded_asisten_alamat = Ext.encode(asisten_alamat);
					
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_t_apotek_det/switchAction',
						params: {							
							det_apotek_id : det_apotek_idValue,
							det_apotek_apotek_id : det_apotek_apotek_idValue,
							det_apotek_jenis : det_apotek_jenisValue,
							det_apotek_lama : det_apotek_lamaValue,
							det_apotek_surveylulus : det_apotek_surveylulusValue,
							det_apotek_nama : det_apotek_namaValue,
							det_apotek_alamat : det_apotek_alamatValue,
							det_apotek_telp : det_apotek_telpValue,
							det_apotek_sp : det_apotek_spValue,
							det_apotek_ktp : det_apotek_ktpValue,
							det_apotek_tempatlahir : det_apotek_tempatlahirValue,
							det_apotek_tanggallahir : det_apotek_tanggallahirValue,
							det_apotek_pekerjaan : det_apotek_pekerjaanValue,
							det_apotek_npwp : det_apotek_npwpValue,
							det_apotek_stra : det_apotek_straValue,
							det_apotek_pendidikan : det_apotek_pendidikanValue,
							det_apotek_tahunlulus : det_apotek_tahunlulusValue,
							det_apotek_terima : det_apotek_terimaValue,
							det_apotek_terimatanggal : det_apotek_terimatanggalValue,
							det_apotek_tanggal : det_apotek_tanggalValue,
							det_apotek_kelengkapan : det_apotek_kelengkapanValue,
							det_apotek_bap : det_apotek_bapValue,
							det_apotek_sk : det_apotek_skValue,
							det_apotek_baptanggal : det_apotek_baptanggalValue,
							det_apotek_berlaku : det_apotek_berlakuValue,
							det_apotek_kadaluarsa : det_apotek_kadaluarsaValue,
							det_apotek_keputusan : det_apotek_keputusanValue,
							det_apotek_keterangan : det_apotek_keteranganValue,
							det_apotek_jarak : det_apotek_jarakValue,
							det_apotek_rracik : det_apotek_rracikValue,
							det_apotek_radmin : det_apotek_radminValue,
							det_apotek_rkerja : det_apotek_rkerjaValue,
							det_apotek_rtunggu : det_apotek_rtungguValue,
							det_apotek_rwc : det_apotek_rwcValue,
							det_apotek_air : det_apotek_airValue,
							det_apotek_listrik : det_apotek_listrikValue,
							det_apotek_apk : det_apotek_apkValue,
							det_apotek_apkukuran : det_apotek_apkukuranValue,
							det_apotek_jendela : det_apotek_jendelaValue,
							det_apotek_limbah : det_apotek_limbahValue,
							det_apotek_baksampah : det_apotek_baksampahValue,
							det_apotek_parkir : det_apotek_parkirValue,
							det_apotek_papannama : det_apotek_papannamaValue,
							det_apotek_pengelola : det_apotek_pengelolaValue,
							det_apotek_pendamping : det_apotek_pendampingValue,
							det_apotek_asisten : det_apotek_asistenValue,
							det_apotek_luas : det_apotek_luasValue,
							det_apotek_statustanah : det_apotek_statustanahValue,
							det_apotek_sewalama : det_apotek_sewalamaValue,
							det_apotek_sewaawal : det_apotek_sewaawalValue,
							det_apotek_sewaakhir : det_apotek_sewaakhirValue,
							det_apotek_shnomor : det_apotek_shnomorValue,
							det_apotek_shtahun : det_apotek_shtahunValue,
							det_apotek_shgssu : det_apotek_shgssuValue,
							det_apotek_shtanggal : det_apotek_shtanggalValue,
							det_apotek_shan : det_apotek_shanValue,
							det_apotek_aktano : det_apotek_aktanoValue,
							det_apotek_aktatahun : det_apotek_aktatahunValue,
							det_apotek_aktanotaris : det_apotek_aktanotarisValue,
							det_apotek_aktaan : det_apotek_aktaanValue,
							det_apotek_ckutipan : det_apotek_ckutipanValue,
							det_apotek_ckec : det_apotek_ckecValue,
							det_apotek_ctanggal : det_apotek_ctanggalValue,
							det_apotek_cpetok : det_apotek_cpetokValue,
							det_apotek_cpersil : det_apotek_cpersilValue,
							det_apotek_ckelas : det_apotek_ckelasValue,
							det_apotek_can : det_apotek_canValue,
							det_apotek_sppihak1 : det_apotek_sppihak1Value,
							det_apotek_sppihak2 : det_apotek_sppihak2Value,
							det_apotek_spnomor : det_apotek_spnomorValue,
							det_apotek_sptanggal : det_apotek_sptanggalValue,
							det_apotek_notaris : det_apotek_notarisValue,
							apotek_cek_id : encoded_apotek_cek_id,
							apotek_cek_syarat_id : encoded_apotek_cek_syarat_id,
							apotek_cek_status : encoded_apotek_cek_status,
							apotek_cek_keterangan : encoded_apotek_cek_keterangan,
							apotek_ket_id : encoded_apotek_ket_id,
							apotek_ket_perlengkapanid : encoded_apotek_ket_perlengkapanid,
							apotek_ket_status : encoded_apotek_ket_status,
							apotek_ket_jumlah : encoded_apotek_ket_jumlah,
							asisten_id : encoded_asisten_id,
							asisten_nama : encoded_asisten_nama,
							asisten_sik : encoded_asisten_sik,
							asisten_lulus : encoded_asisten_lulus,
							asisten_alamat : encoded_asisten_alamat,
							
							apotek_nama : apotek_namaValue,
							apotek_alamat : apotek_alamatValue,
							apotek_telp : apotek_telpValue,
							apotek_kel : apotek_kelValue,
							apotek_kec : apotek_kecValue,
							apotek_kepemilikan : apotek_kepemilikanValue,
							apotek_pemilik : apotek_pemilikValue,
							apotek_pemilikalamat : apotek_pemilikalamatValue,
							apotek_pemiliknpwp : apotek_pemiliknpwpValue,
							apotek_siup : apotek_siupValue,pemohon_id : pemohon_idValue,
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
							
							
							action : apotek_det_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									apotek_det_dataStore.reload();
									apotek_det_resetForm();
									apotek_det_switchToGrid();
									apotek_det_gridPanel.getSelectionModel().deselectAll();
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
		
		function apotek_det_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(apotek_det_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = apotek_det_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< apotek_det_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.det_apotek_id);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_t_apotek_det/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									apotek_det_dataStore.reload();
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
		
		function apotek_det_refresh(){
			apotek_det_dbListAction = "GETLIST";
			apotek_det_gridSearchField.reset();
			apotek_det_searchPanel.getForm().reset();
			apotek_det_dataStore.proxy.extraParams = { action : 'GETLIST' };
			apotek_det_dataStore.proxy.extraParams.query = "";
			apotek_det_dataStore.currentPage = 1;
			apotek_det_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function apotek_det_confirmFormValid(){
			return apotek_det_formPanel.getForm().isValid();
		}
		
		function apotek_det_resetForm(){
			apotek_det_dbTask = 'CREATE';
			apotek_det_dbTaskMessage = 'create';
			apotek_det_formPanel.getForm().reset();
			det_apotek_idField.setValue(0);
			window.scrollTo(0,0);
		}
		
		function apotek_det_setForm(){
			apotek_det_dbTask = 'UPDATE';
            apotek_det_dbTaskMessage = 'update';
			
			var record = apotek_det_gridPanel.getSelectionModel().getSelection()[0];
			det_apotek_idField.setValue(record.data.det_apotek_id);
			det_apotek_apotek_idField.setValue(record.data.det_apotek_apotek_id);
			det_apotek_jenisField.setValue(record.data.det_apotek_jenis);
			det_apotek_surveylulusField.setValue(record.data.det_apotek_surveylulus);
			det_apotek_namaField.setValue(record.data.det_apotek_nama);
			det_apotek_alamatField.setValue(record.data.det_apotek_alamat);
			det_apotek_telpField.setValue(record.data.det_apotek_telp);
			det_apotek_spField.setValue(record.data.det_apotek_sp);
			det_apotek_ktpField.setValue(record.data.det_apotek_ktp);
			det_apotek_tempatlahirField.setValue(record.data.det_apotek_tempatlahir);
			det_apotek_tanggallahirField.setValue(record.data.det_apotek_tanggallahir);
			det_apotek_pekerjaanField.setValue(record.data.det_apotek_pekerjaan);
			det_apotek_npwpField.setValue(record.data.det_apotek_npwp);
			det_apotek_straField.setValue(record.data.det_apotek_stra);
			det_apotek_pendidikanField.setValue(record.data.det_apotek_pendidikan);
			det_apotek_tahunlulusField.setValue(record.data.det_apotek_tahunlulus);
			det_apotek_terimaField.setValue(record.data.det_apotek_terima);
			det_apotek_terimatanggalField.setValue(record.data.det_apotek_terimatanggal);
			det_apotek_tanggalField.setValue(record.data.det_apotek_tanggal);
			det_apotek_kelengkapanField.setValue(record.data.det_apotek_kelengkapan);
			det_apotek_bapField.setValue(record.data.det_apotek_bap);
			det_apotek_skField.setValue(record.data.det_apotek_sk);
			det_apotek_baptanggalField.setValue(record.data.det_apotek_baptanggal);
			det_apotek_berlakuField.setValue(record.data.det_apotek_berlaku);
			det_apotek_kadaluarsaField.setValue(record.data.det_apotek_kadaluarsa);
			det_apotek_keputusanField.setValue(record.data.det_apotek_keputusan);
			det_apotek_keteranganField.setValue(record.data.det_apotek_keterangan);
			det_apotek_jarakField.setValue(record.data.det_apotek_jarak);
			det_apotek_rracikField.setValue(record.data.det_apotek_rracik);
			det_apotek_radminField.setValue(record.data.det_apotek_radmin);
			det_apotek_rkerjaField.setValue(record.data.det_apotek_rkerja);
			det_apotek_rtungguField.setValue(record.data.det_apotek_rtunggu);
			det_apotek_rwcField.setValue(record.data.det_apotek_rwc);
			det_apotek_airField.setValue(record.data.det_apotek_air);
			det_apotek_listrikField.setValue(record.data.det_apotek_listrik);
			det_apotek_apkField.setValue(record.data.det_apotek_apk);
			det_apotek_apkukuranField.setValue(record.data.det_apotek_apkukuran);
			det_apotek_jendelaField.setValue(record.data.det_apotek_jendela);
			det_apotek_limbahField.setValue(record.data.det_apotek_limbah);
			det_apotek_baksampahField.setValue(record.data.det_apotek_baksampah);
			det_apotek_parkirField.setValue(record.data.det_apotek_parkir);
			det_apotek_papannamaField.setValue(record.data.det_apotek_papannama);
			det_apotek_pengelolaField.setValue(record.data.det_apotek_pengelola);
			det_apotek_pendampingField.setValue(record.data.det_apotek_pendamping);
			det_apotek_asistenField.setValue(record.data.det_apotek_asisten);
			det_apotek_luasField.setValue(record.data.det_apotek_luas);
			det_apotek_statustanahField.setValue(record.data.det_apotek_statustanah);
			det_apotek_sewalamaField.setValue(record.data.det_apotek_sewalama);
			det_apotek_sewaawalField.setValue(record.data.det_apotek_sewaawal);
			det_apotek_sewaakhirField.setValue(record.data.det_apotek_sewaakhir);
			det_apotek_shnomorField.setValue(record.data.det_apotek_shnomor);
			det_apotek_shtahunField.setValue(record.data.det_apotek_shtahun);
			det_apotek_shgssuField.setValue(record.data.det_apotek_shgssu);
			det_apotek_shtanggalField.setValue(record.data.det_apotek_shtanggal);
			det_apotek_shanField.setValue(record.data.det_apotek_shan);
			det_apotek_aktanoField.setValue(record.data.det_apotek_aktano);
			det_apotek_aktatahunField.setValue(record.data.det_apotek_aktatahun);
			det_apotek_aktanotarisField.setValue(record.data.det_apotek_aktanotaris);
			det_apotek_aktaanField.setValue(record.data.det_apotek_aktaan);
			det_apotek_ckutipanField.setValue(record.data.det_apotek_ckutipan);
			det_apotek_ckecField.setValue(record.data.det_apotek_ckec);
			det_apotek_ctanggalField.setValue(record.data.det_apotek_ctanggal);
			det_apotek_cpetokField.setValue(record.data.det_apotek_cpetok);
			det_apotek_cpersilField.setValue(record.data.det_apotek_cpersil);
			det_apotek_ckelasField.setValue(record.data.det_apotek_ckelas);
			det_apotek_canField.setValue(record.data.det_apotek_can);
			det_apotek_sppihak1Field.setValue(record.data.det_apotek_sppihak1);
			det_apotek_sppihak2Field.setValue(record.data.det_apotek_sppihak2);
			det_apotek_spnomorField.setValue(record.data.det_apotek_spnomor);
			det_apotek_sptanggalField.setValue(record.data.det_apotek_sptanggal);
			det_apotek_notarisField.setValue(record.data.det_apotek_notaris);
			
			apotek_namaField.setValue(record.data.apotek_nama);
			apotek_alamatField.setValue(record.data.apotek_alamat);
			apotek_telpField.setValue(record.data.apotek_telp);
			apotek_kelField.setValue(record.data.apotek_kel);
			apotek_kecField.setValue(record.data.apotek_kec);
			apotek_kepemilikanField.setValue(record.data.apotek_kepemilikan);
			apotek_pemilikField.setValue(record.data.apotek_pemilik);
			apotek_pemilikalamatField.setValue(record.data.apotek_pemilikalamat);
			apotek_pemiliknpwpField.setValue(record.data.apotek_pemiliknpwp);
			apotek_siupField.setValue(record.data.apotek_siup);
			apotek_det_pemohon_idField.setValue(record.data.pemohon_id);
			apotek_det_pemohon_namaField.setValue(record.data.pemohon_nama);
			apotek_det_pemohon_alamatField.setValue(record.data.pemohon_alamat);
			apotek_det_pemohon_telpField.setValue(record.data.pemohon_telp);
			apotek_det_pemohon_npwpField.setValue(record.data.pemohon_npwp);
			apotek_det_pemohon_rtField.setValue(record.data.pemohon_rt);
			apotek_det_pemohon_rwField.setValue(record.data.pemohon_rw);
			apotek_det_pemohon_kelField.setValue(record.data.pemohon_kel);
			apotek_det_pemohon_kecField.setValue(record.data.pemohon_kec);
			apotek_det_pemohon_nikField.setValue(record.data.pemohon_nik);
			apotek_det_pemohon_straField.setValue(record.data.pemohon_stra);
			apotek_det_pemohon_surattugasField.setValue(record.data.pemohon_surattugas);
			apotek_det_pemohon_pekerjaanField.setValue(record.data.pemohon_pekerjaan);
			apotek_det_pemohon_tempatlahirField.setValue(record.data.pemohon_tempatlahir);
			apotek_det_pemohon_tanggallahirField.setValue(record.data.pemohon_tanggallahir);
			apotek_det_pemohon_user_idField.setValue(record.data.pemohon_user_id);
			apotek_det_pemohon_pendidikanField.setValue(record.data.pemohon_pendidikan);
			apotek_det_pemohon_tahunlulusField.setValue(record.data.pemohon_tahunlulus);
			
			apotek_det_syaratDataStore.proxy.extraParams = { 
				apotek_id : record.data.det_apotek_apotek_id,
				apotek_det_id : record.data.det_apotek_id,
				currentAction : 'update',
				action : 'GETSYARAT'
			};
			apotek_det_syaratDataStore.load();
			apotek_det_perlengkapanDataStore.proxy.extraParams = { 
				apotek_id : record.data.det_apotek_apotek_id,
				apotek_det_id : record.data.det_apotek_id,
				currentAction : 'update',
				action : 'GETPERLENGKAPAN'
			};
			apotek_det_perlengkapanDataStore.load();
			det_apotek_asisten_dataStore.proxy.extraParams = { 
				apotek_id : record.data.det_apotek_apotek_id,
				apotek_det_id : record.data.det_apotek_id,
				currentAction : 'update',
				action : 'GETASISTEN'
			};
			det_apotek_asisten_dataStore.load();
		}
		
		function apotek_det_showSearchWindow(){
			apotek_det_searchWindow.show();
		}
		
		function apotek_det_search(){
			apotek_det_gridSearchField.reset();
			
			var det_apotek_apotek_idValue = '';
			var det_apotek_jenisValue = '';
			var det_apotek_surveylulusValue = '';
			var det_apotek_namaValue = '';
			var det_apotek_alamatValue = '';
			var det_apotek_telpValue = '';
			var det_apotek_spValue = '';
			var det_apotek_ktpValue = '';
			var det_apotek_tempatlahirValue = '';
			var det_apotek_tanggallahirValue = '';
			var det_apotek_pekerjaanValue = '';
			var det_apotek_npwpValue = '';
			var det_apotek_straValue = '';
			var det_apotek_pendidikanValue = '';
			var det_apotek_tahunlulusValue = '';
			var det_apotek_terimaValue = '';
			var det_apotek_terimatanggalValue = '';
			var det_apotek_kelengkapanValue = '';
			var det_apotek_bapValue = '';
			var det_apotek_baptanggalValue = '';
			var det_apotek_keputusanValue = '';
			var det_apotek_keteranganValue = '';
			var det_apotek_jarakValue = '';
			var det_apotek_rracikValue = '';
			var det_apotek_radminValue = '';
			var det_apotek_rkerjaValue = '';
			var det_apotek_rtungguValue = '';
			var det_apotek_rwcValue = '';
			var det_apotek_airValue = '';
			var det_apotek_listrikValue = '';
			var det_apotek_apkValue = '';
			var det_apotek_apkukuranValue = '';
			var det_apotek_jendelaValue = '';
			var det_apotek_limbahValue = '';
			var det_apotek_baksampahValue = '';
			var det_apotek_parkirValue = '';
			var det_apotek_papannamaValue = '';
			var det_apotek_pengelolaValue = '';
			var det_apotek_pendampingValue = '';
			var det_apotek_asistenValue = '';
			var det_apotek_luasValue = '';
			var det_apotek_statustanahValue = '';
			var det_apotek_sewalamaValue = '';
			var det_apotek_sewaawalValue = '';
			var det_apotek_sewaakhirValue = '';
			var det_apotek_shnomorValue = '';
			var det_apotek_shtahunValue = '';
			var det_apotek_shgssuValue = '';
			var det_apotek_shtanggalValue = '';
			var det_apotek_shanValue = '';
			var det_apotek_aktanoValue = '';
			var det_apotek_aktatahunValue = '';
			var det_apotek_aktanotarisValue = '';
			var det_apotek_aktaanValue = '';
			var det_apotek_ckutipanValue = '';
			var det_apotek_ckecValue = '';
			var det_apotek_ctanggalValue = '';
			var det_apotek_cpetokValue = '';
			var det_apotek_cpersilValue = '';
			var det_apotek_ckelasValue = '';
			var det_apotek_canValue = '';
			var det_apotek_sppihak1Value = '';
			var det_apotek_sppihak2Value = '';
			var det_apotek_spnomorValue = '';
			var det_apotek_sptanggalValue = '';
			var det_apotek_notarisValue = '';
						
			det_apotek_apotek_idValue = det_apotek_apotek_idSearchField.getValue();
			det_apotek_jenisValue = det_apotek_jenisSearchField.getValue();
			det_apotek_surveylulusValue = det_apotek_surveylulusSearchField.getValue();
			det_apotek_namaValue = det_apotek_namaSearchField.getValue();
			det_apotek_alamatValue = det_apotek_alamatSearchField.getValue();
			det_apotek_telpValue = det_apotek_telpSearchField.getValue();
			det_apotek_spValue = det_apotek_spSearchField.getValue();
			det_apotek_ktpValue = det_apotek_ktpSearchField.getValue();
			det_apotek_tempatlahirValue = det_apotek_tempatlahirSearchField.getValue();
			det_apotek_tanggallahirValue = det_apotek_tanggallahirSearchField.getValue();
			det_apotek_pekerjaanValue = det_apotek_pekerjaanSearchField.getValue();
			det_apotek_npwpValue = det_apotek_npwpSearchField.getValue();
			det_apotek_straValue = det_apotek_straSearchField.getValue();
			det_apotek_pendidikanValue = det_apotek_pendidikanSearchField.getValue();
			det_apotek_tahunlulusValue = det_apotek_tahunlulusSearchField.getValue();
			det_apotek_terimaValue = det_apotek_terimaSearchField.getValue();
			det_apotek_terimatanggalValue = det_apotek_terimatanggalSearchField.getValue();
			det_apotek_kelengkapanValue = det_apotek_kelengkapanSearchField.getValue();
			det_apotek_bapValue = det_apotek_bapSearchField.getValue();
			det_apotek_baptanggalValue = det_apotek_baptanggalSearchField.getValue();
			det_apotek_keputusanValue = det_apotek_keputusanSearchField.getValue();
			det_apotek_keteranganValue = det_apotek_keteranganSearchField.getValue();
			det_apotek_jarakValue = det_apotek_jarakSearchField.getValue();
			det_apotek_rracikValue = det_apotek_rracikSearchField.getValue();
			det_apotek_radminValue = det_apotek_radminSearchField.getValue();
			det_apotek_rkerjaValue = det_apotek_rkerjaSearchField.getValue();
			det_apotek_rtungguValue = det_apotek_rtungguSearchField.getValue();
			det_apotek_rwcValue = det_apotek_rwcSearchField.getValue();
			det_apotek_airValue = det_apotek_airSearchField.getValue();
			det_apotek_listrikValue = det_apotek_listrikSearchField.getValue();
			det_apotek_apkValue = det_apotek_apkSearchField.getValue();
			det_apotek_apkukuranValue = det_apotek_apkukuranSearchField.getValue();
			det_apotek_jendelaValue = det_apotek_jendelaSearchField.getValue();
			det_apotek_limbahValue = det_apotek_limbahSearchField.getValue();
			det_apotek_baksampahValue = det_apotek_baksampahSearchField.getValue();
			det_apotek_parkirValue = det_apotek_parkirSearchField.getValue();
			det_apotek_papannamaValue = det_apotek_papannamaSearchField.getValue();
			det_apotek_pengelolaValue = det_apotek_pengelolaSearchField.getValue();
			det_apotek_pendampingValue = det_apotek_pendampingSearchField.getValue();
			det_apotek_asistenValue = det_apotek_asistenSearchField.getValue();
			det_apotek_luasValue = det_apotek_luasSearchField.getValue();
			det_apotek_statustanahValue = det_apotek_statustanahSearchField.getValue();
			det_apotek_sewalamaValue = det_apotek_sewalamaSearchField.getValue();
			det_apotek_sewaawalValue = det_apotek_sewaawalSearchField.getValue();
			det_apotek_sewaakhirValue = det_apotek_sewaakhirSearchField.getValue();
			det_apotek_shnomorValue = det_apotek_shnomorSearchField.getValue();
			det_apotek_shtahunValue = det_apotek_shtahunSearchField.getValue();
			det_apotek_shgssuValue = det_apotek_shgssuSearchField.getValue();
			det_apotek_shtanggalValue = det_apotek_shtanggalSearchField.getValue();
			det_apotek_shanValue = det_apotek_shanSearchField.getValue();
			det_apotek_aktanoValue = det_apotek_aktanoSearchField.getValue();
			det_apotek_aktatahunValue = det_apotek_aktatahunSearchField.getValue();
			det_apotek_aktanotarisValue = det_apotek_aktanotarisSearchField.getValue();
			det_apotek_aktaanValue = det_apotek_aktaanSearchField.getValue();
			det_apotek_ckutipanValue = det_apotek_ckutipanSearchField.getValue();
			det_apotek_ckecValue = det_apotek_ckecSearchField.getValue();
			det_apotek_ctanggalValue = det_apotek_ctanggalSearchField.getValue();
			det_apotek_cpetokValue = det_apotek_cpetokSearchField.getValue();
			det_apotek_cpersilValue = det_apotek_cpersilSearchField.getValue();
			det_apotek_ckelasValue = det_apotek_ckelasSearchField.getValue();
			det_apotek_canValue = det_apotek_canSearchField.getValue();
			det_apotek_sppihak1Value = det_apotek_sppihak1SearchField.getValue();
			det_apotek_sppihak2Value = det_apotek_sppihak2SearchField.getValue();
			det_apotek_spnomorValue = det_apotek_spnomorSearchField.getValue();
			det_apotek_sptanggalValue = det_apotek_sptanggalSearchField.getValue();
			det_apotek_notarisValue = det_apotek_notarisSearchField.getValue();
			apotek_det_dbListAction = "SEARCH";
			apotek_det_dataStore.proxy.extraParams = { 
				det_apotek_apotek_id : det_apotek_apotek_idValue,
				det_apotek_jenis : det_apotek_jenisValue,
				det_apotek_surveylulus : det_apotek_surveylulusValue,
				det_apotek_nama : det_apotek_namaValue,
				det_apotek_alamat : det_apotek_alamatValue,
				det_apotek_telp : det_apotek_telpValue,
				det_apotek_sp : det_apotek_spValue,
				det_apotek_ktp : det_apotek_ktpValue,
				det_apotek_tempatlahir : det_apotek_tempatlahirValue,
				det_apotek_tanggallahir : det_apotek_tanggallahirValue,
				det_apotek_pekerjaan : det_apotek_pekerjaanValue,
				det_apotek_npwp : det_apotek_npwpValue,
				det_apotek_stra : det_apotek_straValue,
				det_apotek_pendidikan : det_apotek_pendidikanValue,
				det_apotek_tahunlulus : det_apotek_tahunlulusValue,
				det_apotek_terima : det_apotek_terimaValue,
				det_apotek_terimatanggal : det_apotek_terimatanggalValue,
				det_apotek_kelengkapan : det_apotek_kelengkapanValue,
				det_apotek_bap : det_apotek_bapValue,
				det_apotek_baptanggal : det_apotek_baptanggalValue,
				det_apotek_keputusan : det_apotek_keputusanValue,
				det_apotek_keterangan : det_apotek_keteranganValue,
				det_apotek_jarak : det_apotek_jarakValue,
				det_apotek_rracik : det_apotek_rracikValue,
				det_apotek_radmin : det_apotek_radminValue,
				det_apotek_rkerja : det_apotek_rkerjaValue,
				det_apotek_rtunggu : det_apotek_rtungguValue,
				det_apotek_rwc : det_apotek_rwcValue,
				det_apotek_air : det_apotek_airValue,
				det_apotek_listrik : det_apotek_listrikValue,
				det_apotek_apk : det_apotek_apkValue,
				det_apotek_apkukuran : det_apotek_apkukuranValue,
				det_apotek_jendela : det_apotek_jendelaValue,
				det_apotek_limbah : det_apotek_limbahValue,
				det_apotek_baksampah : det_apotek_baksampahValue,
				det_apotek_parkir : det_apotek_parkirValue,
				det_apotek_papannama : det_apotek_papannamaValue,
				det_apotek_pengelola : det_apotek_pengelolaValue,
				det_apotek_pendamping : det_apotek_pendampingValue,
				det_apotek_asisten : det_apotek_asistenValue,
				det_apotek_luas : det_apotek_luasValue,
				det_apotek_statustanah : det_apotek_statustanahValue,
				det_apotek_sewalama : det_apotek_sewalamaValue,
				det_apotek_sewaawal : det_apotek_sewaawalValue,
				det_apotek_sewaakhir : det_apotek_sewaakhirValue,
				det_apotek_shnomor : det_apotek_shnomorValue,
				det_apotek_shtahun : det_apotek_shtahunValue,
				det_apotek_shgssu : det_apotek_shgssuValue,
				det_apotek_shtanggal : det_apotek_shtanggalValue,
				det_apotek_shan : det_apotek_shanValue,
				det_apotek_aktano : det_apotek_aktanoValue,
				det_apotek_aktatahun : det_apotek_aktatahunValue,
				det_apotek_aktanotaris : det_apotek_aktanotarisValue,
				det_apotek_aktaan : det_apotek_aktaanValue,
				det_apotek_ckutipan : det_apotek_ckutipanValue,
				det_apotek_ckec : det_apotek_ckecValue,
				det_apotek_ctanggal : det_apotek_ctanggalValue,
				det_apotek_cpetok : det_apotek_cpetokValue,
				det_apotek_cpersil : det_apotek_cpersilValue,
				det_apotek_ckelas : det_apotek_ckelasValue,
				det_apotek_can : det_apotek_canValue,
				det_apotek_sppihak1 : det_apotek_sppihak1Value,
				det_apotek_sppihak2 : det_apotek_sppihak2Value,
				det_apotek_spnomor : det_apotek_spnomorValue,
				det_apotek_sptanggal : det_apotek_sptanggalValue,
				det_apotek_notaris : det_apotek_notarisValue,
				action : 'SEARCH'
			};
			apotek_det_dataStore.currentPage = 1;
			apotek_det_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function apotek_det_printExcel(outputType){
			var searchText = "";
			var det_apotek_apotek_idValue = '';
			var det_apotek_jenisValue = '';
			var det_apotek_surveylulusValue = '';
			var det_apotek_namaValue = '';
			var det_apotek_alamatValue = '';
			var det_apotek_telpValue = '';
			var det_apotek_spValue = '';
			var det_apotek_ktpValue = '';
			var det_apotek_tempatlahirValue = '';
			var det_apotek_tanggallahirValue = '';
			var det_apotek_pekerjaanValue = '';
			var det_apotek_npwpValue = '';
			var det_apotek_straValue = '';
			var det_apotek_pendidikanValue = '';
			var det_apotek_tahunlulusValue = '';
			var det_apotek_terimaValue = '';
			var det_apotek_terimatanggalValue = '';
			var det_apotek_kelengkapanValue = '';
			var det_apotek_bapValue = '';
			var det_apotek_baptanggalValue = '';
			var det_apotek_keputusanValue = '';
			var det_apotek_keteranganValue = '';
			var det_apotek_jarakValue = '';
			var det_apotek_rracikValue = '';
			var det_apotek_radminValue = '';
			var det_apotek_rkerjaValue = '';
			var det_apotek_rtungguValue = '';
			var det_apotek_rwcValue = '';
			var det_apotek_airValue = '';
			var det_apotek_listrikValue = '';
			var det_apotek_apkValue = '';
			var det_apotek_apkukuranValue = '';
			var det_apotek_jendelaValue = '';
			var det_apotek_limbahValue = '';
			var det_apotek_baksampahValue = '';
			var det_apotek_parkirValue = '';
			var det_apotek_papannamaValue = '';
			var det_apotek_pengelolaValue = '';
			var det_apotek_pendampingValue = '';
			var det_apotek_asistenValue = '';
			var det_apotek_luasValue = '';
			var det_apotek_statustanahValue = '';
			var det_apotek_sewalamaValue = '';
			var det_apotek_sewaawalValue = '';
			var det_apotek_sewaakhirValue = '';
			var det_apotek_shnomorValue = '';
			var det_apotek_shtahunValue = '';
			var det_apotek_shgssuValue = '';
			var det_apotek_shtanggalValue = '';
			var det_apotek_shanValue = '';
			var det_apotek_aktanoValue = '';
			var det_apotek_aktatahunValue = '';
			var det_apotek_aktanotarisValue = '';
			var det_apotek_aktaanValue = '';
			var det_apotek_ckutipanValue = '';
			var det_apotek_ckecValue = '';
			var det_apotek_ctanggalValue = '';
			var det_apotek_cpetokValue = '';
			var det_apotek_cpersilValue = '';
			var det_apotek_ckelasValue = '';
			var det_apotek_canValue = '';
			var det_apotek_sppihak1Value = '';
			var det_apotek_sppihak2Value = '';
			var det_apotek_spnomorValue = '';
			var det_apotek_sptanggalValue = '';
			var det_apotek_notarisValue = '';
			
			if(apotek_det_dataStore.proxy.extraParams.query!==null){searchText = apotek_det_dataStore.proxy.extraParams.query;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_apotek_id!==null){det_apotek_apotek_idValue = apotek_det_dataStore.proxy.extraParams.det_apotek_apotek_id;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_jenis!==null){det_apotek_jenisValue = apotek_det_dataStore.proxy.extraParams.det_apotek_jenis;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_surveylulus!==null){det_apotek_surveylulusValue = apotek_det_dataStore.proxy.extraParams.det_apotek_surveylulus;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_nama!==null){det_apotek_namaValue = apotek_det_dataStore.proxy.extraParams.det_apotek_nama;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_alamat!==null){det_apotek_alamatValue = apotek_det_dataStore.proxy.extraParams.det_apotek_alamat;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_telp!==null){det_apotek_telpValue = apotek_det_dataStore.proxy.extraParams.det_apotek_telp;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_sp!==null){det_apotek_spValue = apotek_det_dataStore.proxy.extraParams.det_apotek_sp;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_ktp!==null){det_apotek_ktpValue = apotek_det_dataStore.proxy.extraParams.det_apotek_ktp;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_tempatlahir!==null){det_apotek_tempatlahirValue = apotek_det_dataStore.proxy.extraParams.det_apotek_tempatlahir;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_tanggallahir!==null){det_apotek_tanggallahirValue = apotek_det_dataStore.proxy.extraParams.det_apotek_tanggallahir;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_pekerjaan!==null){det_apotek_pekerjaanValue = apotek_det_dataStore.proxy.extraParams.det_apotek_pekerjaan;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_npwp!==null){det_apotek_npwpValue = apotek_det_dataStore.proxy.extraParams.det_apotek_npwp;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_stra!==null){det_apotek_straValue = apotek_det_dataStore.proxy.extraParams.det_apotek_stra;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_pendidikan!==null){det_apotek_pendidikanValue = apotek_det_dataStore.proxy.extraParams.det_apotek_pendidikan;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_tahunlulus!==null){det_apotek_tahunlulusValue = apotek_det_dataStore.proxy.extraParams.det_apotek_tahunlulus;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_terima!==null){det_apotek_terimaValue = apotek_det_dataStore.proxy.extraParams.det_apotek_terima;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_terimatanggal!==null){det_apotek_terimatanggalValue = apotek_det_dataStore.proxy.extraParams.det_apotek_terimatanggal;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_kelengkapan!==null){det_apotek_kelengkapanValue = apotek_det_dataStore.proxy.extraParams.det_apotek_kelengkapan;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_bap!==null){det_apotek_bapValue = apotek_det_dataStore.proxy.extraParams.det_apotek_bap;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_baptanggal!==null){det_apotek_baptanggalValue = apotek_det_dataStore.proxy.extraParams.det_apotek_baptanggal;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_keputusan!==null){det_apotek_keputusanValue = apotek_det_dataStore.proxy.extraParams.det_apotek_keputusan;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_keterangan!==null){det_apotek_keteranganValue = apotek_det_dataStore.proxy.extraParams.det_apotek_keterangan;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_jarak!==null){det_apotek_jarakValue = apotek_det_dataStore.proxy.extraParams.det_apotek_jarak;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_rracik!==null){det_apotek_rracikValue = apotek_det_dataStore.proxy.extraParams.det_apotek_rracik;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_radmin!==null){det_apotek_radminValue = apotek_det_dataStore.proxy.extraParams.det_apotek_radmin;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_rkerja!==null){det_apotek_rkerjaValue = apotek_det_dataStore.proxy.extraParams.det_apotek_rkerja;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_rtunggu!==null){det_apotek_rtungguValue = apotek_det_dataStore.proxy.extraParams.det_apotek_rtunggu;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_rwc!==null){det_apotek_rwcValue = apotek_det_dataStore.proxy.extraParams.det_apotek_rwc;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_air!==null){det_apotek_airValue = apotek_det_dataStore.proxy.extraParams.det_apotek_air;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_listrik!==null){det_apotek_listrikValue = apotek_det_dataStore.proxy.extraParams.det_apotek_listrik;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_apk!==null){det_apotek_apkValue = apotek_det_dataStore.proxy.extraParams.det_apotek_apk;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_apkukuran!==null){det_apotek_apkukuranValue = apotek_det_dataStore.proxy.extraParams.det_apotek_apkukuran;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_jendela!==null){det_apotek_jendelaValue = apotek_det_dataStore.proxy.extraParams.det_apotek_jendela;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_limbah!==null){det_apotek_limbahValue = apotek_det_dataStore.proxy.extraParams.det_apotek_limbah;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_baksampah!==null){det_apotek_baksampahValue = apotek_det_dataStore.proxy.extraParams.det_apotek_baksampah;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_parkir!==null){det_apotek_parkirValue = apotek_det_dataStore.proxy.extraParams.det_apotek_parkir;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_papannama!==null){det_apotek_papannamaValue = apotek_det_dataStore.proxy.extraParams.det_apotek_papannama;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_pengelola!==null){det_apotek_pengelolaValue = apotek_det_dataStore.proxy.extraParams.det_apotek_pengelola;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_pendamping!==null){det_apotek_pendampingValue = apotek_det_dataStore.proxy.extraParams.det_apotek_pendamping;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_asisten!==null){det_apotek_asistenValue = apotek_det_dataStore.proxy.extraParams.det_apotek_asisten;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_luas!==null){det_apotek_luasValue = apotek_det_dataStore.proxy.extraParams.det_apotek_luas;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_statustanah!==null){det_apotek_statustanahValue = apotek_det_dataStore.proxy.extraParams.det_apotek_statustanah;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_sewalama!==null){det_apotek_sewalamaValue = apotek_det_dataStore.proxy.extraParams.det_apotek_sewalama;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_sewaawal!==null){det_apotek_sewaawalValue = apotek_det_dataStore.proxy.extraParams.det_apotek_sewaawal;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_sewaakhir!==null){det_apotek_sewaakhirValue = apotek_det_dataStore.proxy.extraParams.det_apotek_sewaakhir;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_shnomor!==null){det_apotek_shnomorValue = apotek_det_dataStore.proxy.extraParams.det_apotek_shnomor;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_shtahun!==null){det_apotek_shtahunValue = apotek_det_dataStore.proxy.extraParams.det_apotek_shtahun;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_shgssu!==null){det_apotek_shgssuValue = apotek_det_dataStore.proxy.extraParams.det_apotek_shgssu;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_shtanggal!==null){det_apotek_shtanggalValue = apotek_det_dataStore.proxy.extraParams.det_apotek_shtanggal;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_shan!==null){det_apotek_shanValue = apotek_det_dataStore.proxy.extraParams.det_apotek_shan;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_aktano!==null){det_apotek_aktanoValue = apotek_det_dataStore.proxy.extraParams.det_apotek_aktano;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_aktatahun!==null){det_apotek_aktatahunValue = apotek_det_dataStore.proxy.extraParams.det_apotek_aktatahun;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_aktanotaris!==null){det_apotek_aktanotarisValue = apotek_det_dataStore.proxy.extraParams.det_apotek_aktanotaris;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_aktaan!==null){det_apotek_aktaanValue = apotek_det_dataStore.proxy.extraParams.det_apotek_aktaan;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_ckutipan!==null){det_apotek_ckutipanValue = apotek_det_dataStore.proxy.extraParams.det_apotek_ckutipan;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_ckec!==null){det_apotek_ckecValue = apotek_det_dataStore.proxy.extraParams.det_apotek_ckec;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_ctanggal!==null){det_apotek_ctanggalValue = apotek_det_dataStore.proxy.extraParams.det_apotek_ctanggal;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_cpetok!==null){det_apotek_cpetokValue = apotek_det_dataStore.proxy.extraParams.det_apotek_cpetok;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_cpersil!==null){det_apotek_cpersilValue = apotek_det_dataStore.proxy.extraParams.det_apotek_cpersil;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_ckelas!==null){det_apotek_ckelasValue = apotek_det_dataStore.proxy.extraParams.det_apotek_ckelas;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_can!==null){det_apotek_canValue = apotek_det_dataStore.proxy.extraParams.det_apotek_can;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_sppihak1!==null){det_apotek_sppihak1Value = apotek_det_dataStore.proxy.extraParams.det_apotek_sppihak1;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_sppihak2!==null){det_apotek_sppihak2Value = apotek_det_dataStore.proxy.extraParams.det_apotek_sppihak2;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_spnomor!==null){det_apotek_spnomorValue = apotek_det_dataStore.proxy.extraParams.det_apotek_spnomor;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_sptanggal!==null){det_apotek_sptanggalValue = apotek_det_dataStore.proxy.extraParams.det_apotek_sptanggal;}
			if(apotek_det_dataStore.proxy.extraParams.det_apotek_notaris!==null){det_apotek_notarisValue = apotek_det_dataStore.proxy.extraParams.det_apotek_notaris;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_t_apotek_det/switchAction',
				params : {
					action : outputType,
					query : searchText,
					det_apotek_apotek_id : det_apotek_apotek_idValue,
					det_apotek_jenis : det_apotek_jenisValue,
					det_apotek_surveylulus : det_apotek_surveylulusValue,
					det_apotek_nama : det_apotek_namaValue,
					det_apotek_alamat : det_apotek_alamatValue,
					det_apotek_telp : det_apotek_telpValue,
					det_apotek_sp : det_apotek_spValue,
					det_apotek_ktp : det_apotek_ktpValue,
					det_apotek_tempatlahir : det_apotek_tempatlahirValue,
					det_apotek_tanggallahir : det_apotek_tanggallahirValue,
					det_apotek_pekerjaan : det_apotek_pekerjaanValue,
					det_apotek_npwp : det_apotek_npwpValue,
					det_apotek_stra : det_apotek_straValue,
					det_apotek_pendidikan : det_apotek_pendidikanValue,
					det_apotek_tahunlulus : det_apotek_tahunlulusValue,
					det_apotek_terima : det_apotek_terimaValue,
					det_apotek_terimatanggal : det_apotek_terimatanggalValue,
					det_apotek_kelengkapan : det_apotek_kelengkapanValue,
					det_apotek_bap : det_apotek_bapValue,
					det_apotek_baptanggal : det_apotek_baptanggalValue,
					det_apotek_keputusan : det_apotek_keputusanValue,
					det_apotek_keterangan : det_apotek_keteranganValue,
					det_apotek_jarak : det_apotek_jarakValue,
					det_apotek_rracik : det_apotek_rracikValue,
					det_apotek_radmin : det_apotek_radminValue,
					det_apotek_rkerja : det_apotek_rkerjaValue,
					det_apotek_rtunggu : det_apotek_rtungguValue,
					det_apotek_rwc : det_apotek_rwcValue,
					det_apotek_air : det_apotek_airValue,
					det_apotek_listrik : det_apotek_listrikValue,
					det_apotek_apk : det_apotek_apkValue,
					det_apotek_apkukuran : det_apotek_apkukuranValue,
					det_apotek_jendela : det_apotek_jendelaValue,
					det_apotek_limbah : det_apotek_limbahValue,
					det_apotek_baksampah : det_apotek_baksampahValue,
					det_apotek_parkir : det_apotek_parkirValue,
					det_apotek_papannama : det_apotek_papannamaValue,
					det_apotek_pengelola : det_apotek_pengelolaValue,
					det_apotek_pendamping : det_apotek_pendampingValue,
					det_apotek_asisten : det_apotek_asistenValue,
					det_apotek_luas : det_apotek_luasValue,
					det_apotek_statustanah : det_apotek_statustanahValue,
					det_apotek_sewalama : det_apotek_sewalamaValue,
					det_apotek_sewaawal : det_apotek_sewaawalValue,
					det_apotek_sewaakhir : det_apotek_sewaakhirValue,
					det_apotek_shnomor : det_apotek_shnomorValue,
					det_apotek_shtahun : det_apotek_shtahunValue,
					det_apotek_shgssu : det_apotek_shgssuValue,
					det_apotek_shtanggal : det_apotek_shtanggalValue,
					det_apotek_shan : det_apotek_shanValue,
					det_apotek_aktano : det_apotek_aktanoValue,
					det_apotek_aktatahun : det_apotek_aktatahunValue,
					det_apotek_aktanotaris : det_apotek_aktanotarisValue,
					det_apotek_aktaan : det_apotek_aktaanValue,
					det_apotek_ckutipan : det_apotek_ckutipanValue,
					det_apotek_ckec : det_apotek_ckecValue,
					det_apotek_ctanggal : det_apotek_ctanggalValue,
					det_apotek_cpetok : det_apotek_cpetokValue,
					det_apotek_cpersil : det_apotek_cpersilValue,
					det_apotek_ckelas : det_apotek_ckelasValue,
					det_apotek_can : det_apotek_canValue,
					det_apotek_sppihak1 : det_apotek_sppihak1Value,
					det_apotek_sppihak2 : det_apotek_sppihak2Value,
					det_apotek_spnomor : det_apotek_spnomorValue,
					det_apotek_sptanggal : det_apotek_sptanggalValue,
					det_apotek_notaris : det_apotek_notarisValue,
					currentAction : apotek_det_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/t_apotek_det_list.xls');
							}else{
								window.open('./print/t_apotek_det_list.html','apotek_detlist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		apotek_det_dataStore = Ext.create('Ext.data.Store',{
			id : 'apotek_det_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_apotek_det/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'det_apotek_id'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'det_apotek_id', type : 'int', mapping : 'det_apotek_id' },
				{ name : 'det_apotek_apotek_id', type : 'int', mapping : 'det_apotek_apotek_id' },
				{ name : 'det_apotek_jenis', type : 'int', mapping : 'det_apotek_jenis' },
				{ name : 'det_apotek_tanggal', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_apotek_tanggal' },
				{ name : 'det_apotek_surveylulus', type : 'int', mapping : 'det_apotek_surveylulus' },
				{ name : 'det_apotek_nama', type : 'string', mapping : 'det_apotek_nama' },
				{ name : 'det_apotek_alamat', type : 'string', mapping : 'det_apotek_alamat' },
				{ name : 'det_apotek_telp', type : 'string', mapping : 'det_apotek_telp' },
				{ name : 'det_apotek_sp', type : 'string', mapping : 'det_apotek_sp' },
				{ name : 'det_apotek_ktp', type : 'string', mapping : 'det_apotek_ktp' },
				{ name : 'det_apotek_tempatlahir', type : 'string', mapping : 'det_apotek_tempatlahir' },
				{ name : 'det_apotek_tanggallahir', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_apotek_tanggallahir' },
				{ name : 'det_apotek_pekerjaan', type : 'string', mapping : 'det_apotek_pekerjaan' },
				{ name : 'det_apotek_npwp', type : 'string', mapping : 'det_apotek_npwp' },
				{ name : 'det_apotek_stra', type : 'string', mapping : 'det_apotek_stra' },
				{ name : 'det_apotek_pendidikan', type : 'string', mapping : 'det_apotek_pendidikan' },
				{ name : 'det_apotek_tahunlulus', type : 'int', mapping : 'det_apotek_tahunlulus' },
				{ name : 'det_apotek_terima', type : 'string', mapping : 'det_apotek_terima' },
				{ name : 'det_apotek_terimatanggal', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_apotek_terimatanggal' },
				{ name : 'det_apotek_kelengkapan', type : 'int', mapping : 'det_apotek_kelengkapan' },
				{ name : 'det_apotek_bap', type : 'string', mapping : 'det_apotek_bap' },
				{ name : 'det_apotek_sk', type : 'string', mapping : 'det_apotek_sk' },
				{ name : 'det_apotek_baptanggal', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_apotek_baptanggal' },
				{ name : 'det_apotek_berlaku', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_apotek_berlaku' },
				{ name : 'det_apotek_kadaluarsa', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_apotek_kadaluarsa' },
				{ name : 'det_apotek_keputusan', type : 'int', mapping : 'det_apotek_keputusan' },
				{ name : 'det_apotek_keterangan', type : 'string', mapping : 'det_apotek_keterangan' },
				{ name : 'det_apotek_jarak', type : 'int', mapping : 'det_apotek_jarak' },
				{ name : 'det_apotek_rracik', type : 'int', mapping : 'det_apotek_rracik' },
				{ name : 'det_apotek_radmin', type : 'int', mapping : 'det_apotek_radmin' },
				{ name : 'det_apotek_rkerja', type : 'int', mapping : 'det_apotek_rkerja' },
				{ name : 'det_apotek_rtunggu', type : 'int', mapping : 'det_apotek_rtunggu' },
				{ name : 'det_apotek_rwc', type : 'int', mapping : 'det_apotek_rwc' },
				{ name : 'det_apotek_air', type : 'string', mapping : 'det_apotek_air' },
				{ name : 'det_apotek_listrik', type : 'string', mapping : 'det_apotek_listrik' },
				{ name : 'det_apotek_apk', type : 'int', mapping : 'det_apotek_apk' },
				{ name : 'det_apotek_apkukuran', type : 'string', mapping : 'det_apotek_apkukuran' },
				{ name : 'det_apotek_jendela', type : 'int', mapping : 'det_apotek_jendela' },
				{ name : 'det_apotek_limbah', type : 'int', mapping : 'det_apotek_limbah' },
				{ name : 'det_apotek_baksampah', type : 'int', mapping : 'det_apotek_baksampah' },
				{ name : 'det_apotek_parkir', type : 'int', mapping : 'det_apotek_parkir' },
				{ name : 'det_apotek_papannama', type : 'int', mapping : 'det_apotek_papannama' },
				{ name : 'det_apotek_pengelola', type : 'int', mapping : 'det_apotek_pengelola' },
				{ name : 'det_apotek_pendamping', type : 'int', mapping : 'det_apotek_pendamping' },
				{ name : 'det_apotek_asisten', type : 'int', mapping : 'det_apotek_asisten' },
				{ name : 'det_apotek_luas', type : 'int', mapping : 'det_apotek_luas' },
				{ name : 'det_apotek_statustanah', type : 'int', mapping : 'det_apotek_statustanah' },
				{ name : 'det_apotek_sewalama', type : 'int', mapping : 'det_apotek_sewalama' },
				{ name : 'det_apotek_sewaawal', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_apotek_sewaawal' },
				{ name : 'det_apotek_sewaakhir', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_apotek_sewaakhir' },
				{ name : 'det_apotek_shnomor', type : 'string', mapping : 'det_apotek_shnomor' },
				{ name : 'det_apotek_shtahun', type : 'int', mapping : 'det_apotek_shtahun' },
				{ name : 'det_apotek_shgssu', type : 'string', mapping : 'det_apotek_shgssu' },
				{ name : 'det_apotek_shtanggal', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_apotek_shtanggal' },
				{ name : 'det_apotek_shan', type : 'string', mapping : 'det_apotek_shan' },
				{ name : 'det_apotek_aktano', type : 'string', mapping : 'det_apotek_aktano' },
				{ name : 'det_apotek_aktatahun', type : 'int', mapping : 'det_apotek_aktatahun' },
				{ name : 'det_apotek_aktanotaris', type : 'string', mapping : 'det_apotek_aktanotaris' },
				{ name : 'det_apotek_aktaan', type : 'string', mapping : 'det_apotek_aktaan' },
				{ name : 'det_apotek_ckutipan', type : 'string', mapping : 'det_apotek_ckutipan' },
				{ name : 'det_apotek_ckec', type : 'string', mapping : 'det_apotek_ckec' },
				{ name : 'det_apotek_ctanggal', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_apotek_ctanggal' },
				{ name : 'det_apotek_cpetok', type : 'string', mapping : 'det_apotek_cpetok' },
				{ name : 'det_apotek_cpersil', type : 'string', mapping : 'det_apotek_cpersil' },
				{ name : 'det_apotek_ckelas', type : 'string', mapping : 'det_apotek_ckelas' },
				{ name : 'det_apotek_can', type : 'string', mapping : 'det_apotek_can' },
				{ name : 'det_apotek_sppihak1', type : 'string', mapping : 'det_apotek_sppihak1' },
				{ name : 'det_apotek_sppihak2', type : 'string', mapping : 'det_apotek_sppihak2' },
				{ name : 'det_apotek_spnomor', type : 'string', mapping : 'det_apotek_spnomor' },
				{ name : 'det_apotek_sptanggal', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_apotek_sptanggal' },
				{ name : 'det_apotek_notaris', type : 'string', mapping : 'det_apotek_notaris' },
				
				{ name : 'apotek_nama', type : 'string', mapping : 'apotek_nama' },
				{ name : 'apotek_alamat', type : 'string', mapping : 'apotek_alamat' },
				{ name : 'apotek_telp', type : 'string', mapping : 'apotek_telp' },
				{ name : 'apotek_kel', type : 'string', mapping : 'apotek_kel' },
				{ name : 'apotek_kec', type : 'string', mapping : 'apotek_kec' },
				{ name : 'apotek_kepemilikan', type : 'int', mapping : 'apotek_kepemilikan' },
				{ name : 'apotek_pemilik', type : 'string', mapping : 'apotek_pemilik' },
				{ name : 'apotek_pemilikalamat', type : 'string', mapping : 'apotek_pemilikalamat' },
				{ name : 'apotek_pemiliknpwp', type : 'string', mapping : 'apotek_pemiliknpwp' },
				{ name : 'apotek_siup', type : 'string', mapping : 'apotek_siup' },
				{ name : 'det_apotek_proses', type : 'string', mapping : 'det_apotek_proses' },
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
				{ name : 'det_apotek_proses', type : 'string', mapping : 'det_apotek_proses' },
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		apotek_det_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						apotek_det_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						apotek_det_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						apotek_det_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						apotek_det_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						apotek_det_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						apotek_det_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						apotek_det_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						apotek_det_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var apotek_det_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : apotek_det_confirmAdd
		});
		var apotek_det_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : apotek_det_confirmUpdate
		});
		var apotek_det_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : apotek_det_confirmDelete
		});
		var apotek_det_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : apotek_det_refresh
		});
		var apotek_det_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : apotek_det_showSearchWindow
		});
		var apotek_det_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				apotek_det_printExcel('PRINT');
			}
		});
		var apotek_det_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				apotek_det_printExcel('EXCEL');
			}
		});
		
		var apotek_det_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : apotek_det_confirmUpdate
		});
		var apotek_det_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : apotek_det_confirmDelete
		});
		var apotek_det_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : apotek_det_refresh
		});
		apotek_det_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'apotek_det_contextMenu',
			items: [
				apotek_det_contextMenuEdit,apotek_det_contextMenuDelete,'-',apotek_det_contextMenuRefresh
			]
		});
		
		apotek_det_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : apotek_det_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						apotek_det_dataStore.proxy.extraParams = { action : 'GETLIST'};
						apotek_det_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		/* Start ContextMenu For Action Column */
		var apotek_det_bp_printCM = Ext.create('Ext.menu.Item',{
			text : 'Bukti Penerimaan',
			tooltip : 'Cetak Bukti Penerimaan',
			handler : function(){
				var record = apotek_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_apotek_det/switchAction',
					params: {
						apotekdet_id : record.get('det_apotek_id'),
						action : 'CETAKBP'
					},success : function(){
						window.open('../print/apotek_buktipenerimaan.html');
					}
				});
			}
		});
		var apotek_det_sk_printCM = Ext.create('Ext.menu.Item',{
			text : 'Surat Keputusan',
			tooltip : 'Cetak Surat Keputusan',
			handler : function(){
				var record = apotek_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_apotek_det/switchAction',
					params: {
						apotekdet_id : record.get('det_apotek_id'),
						action : 'CETAKSK'
					},success : function(response){
						var result = response.responseText;
						switch(result){
							case 'success':
								window.open('../print/apotek_sk.html');
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
		var apotek_det_si_printCM = Ext.create('Ext.menu.Item',{
			text : 'Surat Ijin',
			tooltip : 'Cetak Surat Ijin',
			handler : function(){
				var record = apotek_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_apotek_det/switchAction',
					params: {
						apotekdet_id : record.get('det_apotek_id'),
						action : 'CETAKSI'
					},success : function(response){
						var result = response.responseText;
						switch(result){
							case 'success':
								window.open('../print/apotek_si.html');
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
		var apotek_det_bap_printCM = Ext.create('Ext.menu.Item',{
			text : 'Berita Acara Penerimaan',
			tooltip : 'Cetak Berita Acara Pemeriksaan',
			handler : function(){
				var record = apotek_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_apotek_det/switchAction',
					params: {
						apotekdet_id : record.get('det_apotek_id'),
						action : 'CETAKLEMBARKONTROL'
					},success : function(){
						window.open('../print/apotek_lembarkontrol.html');
					}
				});
			}
		});
		var apotek_det_lk_printCM = Ext.create('Ext.menu.Item',{
			text : 'Lembar Kontrol',
			tooltip : 'Cetak Lembar Kontrol',
			handler : function(){
				var record = apotek_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_apotek_det/switchAction',
					params: {
						apotekdet_id : record.get('det_apotek_id'),
						action : 'CETAKLEMBARKONTROL'
					},success : function(){
						window.open('../print/apotek_lembarkontrol.html');
					}
				});
			}
		});
		var apotek_det_lampiran_printCM = Ext.create('Ext.menu.Item',{
			text : 'Lampiran',
			tooltip : 'Cetak Lampiran',
			hidden : true,
			handler : function(){
				var record = apotek_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_apotek_det/switchAction',
					params: {
						apotekdet_id : record.get('det_apotek_id'),
						action : 'CETAKLAMPIRAN'
					},success : function(){
						window.open('../print/apotek_lampiran.html');
					}
				});
			}
		});
		var apotek_det_printContextMenu = Ext.create('Ext.menu.Menu',{
			items: [
				apotek_det_bp_printCM,apotek_det_lampiran_printCM,apotek_det_lk_printCM,apotek_det_bap_printCM,apotek_det_si_printCM,apotek_det_sk_printCM
			]
		});
		function apotek_det_ubahProses(proses){
			var record = apotek_det_gridPanel.getSelectionModel().getSelection()[0];
			Ext.Ajax.request({
				waitMsg: 'Please wait...',
				url: 'c_t_apotek_det/switchAction',
				params: {
					apotekdet_id : record.get('det_apotek_id'),
					apotekdet_nosk : record.get('det_apotek_sk'),
					proses : proses,
					action : 'UBAHPROSES'
				},success : function(){
					apotek_det_dataStore.reload();
				}
			});
		}
		
		var apotek_det_prosesContextMenu = Ext.create('Ext.menu.Menu',{
			items: [
				{
					text : 'Selesai, belum diambil',
					tooltip : 'Ubah Menjadi Selesai, belum diambil',
					handler : function(){
						apotek_det_ubahProses('Selesai, belum diambil');
					}
				},
				{
					text : 'Selesai, sudah diambil',
					tooltip : 'Ubah Menjadi Selesai, sudah diambil',
					handler : function(){
						apotek_det_ubahProses('Selesai, sudah diambil');
					}
				},
				{
					text : 'Ditolak',
					tooltip : 'Ubah Menjadi Ditolak',
					handler : function(){
						apotek_det_ubahProses('Ditolak');
					}
				}
			]
		});
		
		/* End ContextMenu For Action Column */
		apotek_det_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'apotek_det_gridPanel',
			constrain : true,
			store : apotek_det_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'apotek_detGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : {forceFit:true},
			multiSelect : true,
			keys : apotek_det_shorcut,
			columns : [
				{
					text : 'Jenis',
					dataIndex : 'det_apotek_jenis',
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
					dataIndex : 'det_apotek_tanggal',
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
					text : 'Alamat',
					dataIndex : 'pemohon_alamat',
					width : 100,
					sortable : false,
					flex : 1
				},
				{
					text : 'Telp',
					dataIndex : 'pemohon_telp',
					width : 100,
					sortable : false
				},
				{
					text : 'Surat Penugasan',
					dataIndex : 'pemohon_surattugas',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'NIK',
					dataIndex : 'pemohon_nik',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'Tempat Lahir',
					dataIndex : 'det_apotek_tempatlahir',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'Tgl Lahir',
					dataIndex : 'det_apotek_tanggallahir',
					width : 100,
					hidden : true,
					sortable : false,
					renderer : Ext.util.Format.dateRenderer('d-m-Y')
				},
				{
					text : 'NPWP',
					dataIndex : 'det_apotek_npwp',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'STRA',
					dataIndex : 'det_apotek_stra',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'Pendidikan',
					dataIndex : 'det_apotek_pendidikan',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'Tahun Lulus',
					dataIndex : 'det_apotek_tahunlulus',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'Nama Apotek',
					dataIndex : 'apotek_nama',
					width : 150,
					sortable : false
				},
				{
					text : 'Nomor SK',
					dataIndex : 'det_apotek_sk',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'Tanggal Berlaku',
					dataIndex : 'det_apotek_berlaku',
					width : 100,
					sortable : false,
					renderer : Ext.util.Format.dateRenderer('d-m-Y'),
					hidden : true
				},
				{
					text : 'Tanggal Kadaluarsa',
					dataIndex : 'det_apotek_kadaluarsa',
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
					dataIndex : 'det_apotek_proses',
					width : 125,
					sortable : false
				},
				{
					xtype:'actioncolumn',
					text : 'Action',
					width:50,
					hideable : false,
					items: [{
						iconCls: 'icon16x16-edit',
						tooltip: 'Ubah Data',
						handler: function(grid, rowIndex){
							grid.getSelectionModel().select(rowIndex);
							apotek_det_confirmUpdate();
						}
					},{
						iconCls: 'icon16x16-delete',
						tooltip: 'Hapus Data',
						handler: function(grid, rowIndex){
							grid.getSelectionModel().select(rowIndex);
							apotek_det_confirmDelete();
						}
					}]
				},
				{
					xtype:'actioncolumn',
					text : 'Proses',
					width:30,
					hideable : false,
					items: [{
						iconCls : 'checked',
						tooltip : 'Ubah Status',
						handler: function(grid, rowIndex, colIndex, node, e) {
							e.stopEvent();
							apotek_det_prosesContextMenu.showAt(e.getXY());
							return false;
						}
					}]
				},
				{
					xtype:'actioncolumn',
					text : 'Cetak',
					width:50,
					hideable : false,
					items: [{
						iconCls: 'icon16x16-print',
						tooltip: 'Cetak Dokumen',
						handler: function(grid, rowIndex, colIndex, node, e) {
							e.stopEvent();
							apotek_det_printContextMenu.showAt(e.getXY());
							return false;
						}
					}]
				}
			],
			tbar : [
				apotek_det_addButton,
				apotek_det_gridSearchField,
				apotek_det_refreshButton,
				apotek_det_printButton,
				apotek_det_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : apotek_det_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					apotek_det_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		det_apotek_idField = Ext.create('Ext.form.NumberField',{
			id : 'det_apotek_idField',
			name : 'det_apotek_id',
			fieldLabel : 'Id <font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		det_apotek_apotek_idField = Ext.create('Ext.form.NumberField',{
			id : 'det_apotek_apotek_idField',
			name : 'det_apotek_apotek_id',
			fieldLabel : 'Id',
			hidden : true,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		det_apotek_jenisField = Ext.create('Ext.form.ComboBox',{
			id : 'det_apotek_jenisField',
			name : 'det_apotek_jenis',
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
						det_apotek_sklamaField.show();
					}else{
						det_apotek_sklamaField.hide();
					}
				}
			}
		});
		det_apotek_sklamaField = Ext.create('Ext.form.ComboBox',{
			name : 'det_apotek_sklamaField',
			fieldLabel : 'Nomor SK Lama',
			store : apotek_det_dataStore,
			displayField : 'det_apotek_sk',
			valueField : 'det_apotek_apotek_id',
			queryMode : 'remote',
			triggerAction : 'query',
			repeatTriggerClick : true,
			minChars : 100,
			triggerCls : 'x-form-search-trigger',
			forceSelection : false,
			hidden : true,
			onTriggerClick: function(event){
				var store = det_apotek_sklamaField.getStore();
				var val = det_apotek_sklamaField.getRawValue();
				store.proxy.extraParams = {action : 'SEARCH',det_apotek_sk : val};
				store.load();
				det_apotek_sklamaField.expand();
				det_apotek_sklamaField.fireEvent("ontriggerclick", this, event);
			},  
			tpl: Ext.create('Ext.XTemplate',
				'<tpl for=".">',
					'<div class="x-boundlist-item">SK : {det_apotek_sk}<br>Nama Apotek : {apotek_nama}<br>Alamat : {apotek_alamat}<br></div>',
				'</tpl>'
			),
			listeners : {
				select : function(cmb, record){
					var rec=record[0];
					apotek_det_pemohon_idField.setValue(rec.get('pemohon_id'));
					apotek_det_pemohon_nikField.setValue(rec.get('pemohon_nik'));
					apotek_det_pemohon_namaField.setValue(rec.get('pemohon_nama'));
					apotek_det_pemohon_alamatField.setValue(rec.get('pemohon_alamat'));
					apotek_det_pemohon_telpField.setValue(rec.get('pemohon_telp'));
					apotek_det_pemohon_npwpField.setValue(rec.get('pemohon_npwp'));
					apotek_det_pemohon_rtField.setValue(rec.get('pemohon_rt'));
					apotek_det_pemohon_rwField.setValue(rec.get('pemohon_rw'));
					apotek_det_pemohon_kelField.setValue(rec.get('pemohon_kel'));
					apotek_det_pemohon_kecField.setValue(rec.get('pemohon_kec'));
					apotek_det_pemohon_straField.setValue(rec.get('pemohon_stra'));
					apotek_det_pemohon_surattugasField.setValue(rec.get('pemohon_surattugas'));
					apotek_det_pemohon_pekerjaanField.setValue(rec.get('pemohon_pekerjaan'));
					apotek_det_pemohon_tempatlahirField.setValue(rec.get('pemohon_tempatlahir'));
					apotek_det_pemohon_tanggallahirField.setValue(rec.get('pemohon_tanggallahir'));
					apotek_det_pemohon_user_idField.setValue(rec.get('pemohon_user_id'));
					apotek_det_pemohon_pendidikanField.setValue(rec.get('pemohon_pendidikan'));
					apotek_det_pemohon_tahunlulusField.setValue(rec.get('pemohon_tahunlulus'));
					
					apotek_namaField.setValue(rec.get('apotek_nama'));
					apotek_alamatField.setValue(rec.get('apotek_alamat'));
					apotek_telpField.setValue(rec.get('apotek_telp'));
					apotek_kelField.setValue(rec.get('apotek_kel'));
					apotek_kecField.setValue(rec.get('apotek_kec'));
					apotek_kepemilikanField.setValue(rec.get('apotek_kepemilikan'));
					apotek_pemilikField.setValue(rec.get('apotek_pemilik'));
					apotek_pemilikalamatField.setValue(rec.get('apotek_pemilikalamat'));
					apotek_pemiliknpwpField.setValue(rec.get('apotek_pemiliknpwp'));
					apotek_siupField.setValue(rec.get('apotek_siup'));
					det_apotek_jarakField.setValue(rec.get('det_apotek_jarak'));
					det_apotek_rracikField.setValue(rec.get('det_apotek_rracik'));
					det_apotek_radminField.setValue(rec.get('det_apotek_radmin'));
					det_apotek_rkerjaField.setValue(rec.get('det_apotek_rkerja'));
					det_apotek_rtungguField.setValue(rec.get('det_apotek_rtunggu'));
					det_apotek_rwcField.setValue(rec.get('det_apotek_rwc'));
					det_apotek_airField.setValue(rec.get('det_apotek_air'));
					det_apotek_listrikField.setValue(rec.get('det_apotek_listrik'));
					det_apotek_apkField.setValue(rec.get('det_apotek_apk'));
					det_apotek_apkukuranField.setValue(rec.get('det_apotek_apkukuran'));
					det_apotek_jendelaField.setValue(rec.get('det_apotek_jendela'));
					det_apotek_limbahField.setValue(rec.get('det_apotek_limbah'));
					det_apotek_baksampahField.setValue(rec.get('det_apotek_baksampah'));
					det_apotek_parkirField.setValue(rec.get('det_apotek_parkir'));
					det_apotek_papannamaField.setValue(rec.get('det_apotek_papannama'));
					det_apotek_pengelolaField.setValue(rec.get('det_apotek_pengelola'));
					det_apotek_pendampingField.setValue(rec.get('det_apotek_pendamping'));
					det_apotek_asistenField.setValue(rec.get('det_apotek_asisten'));
					det_apotek_luasField.setValue(rec.get('det_apotek_luas'));
					det_apotek_statustanahField.setValue(rec.get('det_apotek_statustanah'));
					det_apotek_sewalamaField.setValue(rec.get('det_apotek_sewalama'));
					det_apotek_sewaawalField.setValue(rec.get('det_apotek_sewaawal'));
					det_apotek_sewaakhirField.setValue(rec.get('det_apotek_sewaakhir'));
					det_apotek_shnomorField.setValue(rec.get('det_apotek_shnomor'));
					det_apotek_shtahunField.setValue(rec.get('det_apotek_shtahun'));
					det_apotek_shgssuField.setValue(rec.get('det_apotek_shgssu'));
					det_apotek_shtanggalField.setValue(rec.get('det_apotek_shtanggal'));
					det_apotek_shanField.setValue(rec.get('det_apotek_shan'));
					det_apotek_aktanoField.setValue(rec.get('det_apotek_aktano'));
					det_apotek_aktatahunField.setValue(rec.get('det_apotek_aktatahun'));
					det_apotek_aktanotarisField.setValue(rec.get('det_apotek_aktanotaris'));
					det_apotek_aktaanField.setValue(rec.get('det_apotek_aktaan'));
					det_apotek_ckutipanField.setValue(rec.get('det_apotek_ckutipan'));
					det_apotek_ckecField.setValue(rec.get('det_apotek_ckec'));
					det_apotek_ctanggalField.setValue(rec.get('det_apotek_ctanggal'));
					det_apotek_cpetokField.setValue(rec.get('det_apotek_cpetok'));
					det_apotek_cpersilField.setValue(rec.get('det_apotek_cpersil'));
					det_apotek_ckelasField.setValue(rec.get('det_apotek_ckelas'));
					det_apotek_canField.setValue(rec.get('det_apotek_can'));
					det_apotek_sppihak1Field.setValue(rec.get('det_apotek_sppihak1'));
					det_apotek_sppihak2Field.setValue(rec.get('det_apotek_sppihak2'));
					det_apotek_spnomorField.setValue(rec.get('det_apotek_spnomor'));
					det_apotek_sptanggalField.setValue(rec.get('det_apotek_sptanggal'));
					det_apotek_notarisField.setValue(rec.get('det_apotek_notaris'));
				}
			}
		});
		det_apotek_surveylulusField = Ext.create('Ext.form.ComboBox',{
			id : 'det_apotek_surveylulusField',
			name : 'det_apotek_surveylulus',
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
		det_apotek_namaField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_namaField',
			name : 'det_apotek_nama',
			fieldLabel : 'Nama',
			maxLength : 50
		});
		det_apotek_alamatField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_alamatField',
			name : 'det_apotek_alamat',
			fieldLabel : 'Alamat',
			maxLength : 50
		});
		det_apotek_telpField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_telpField',
			name : 'det_apotek_telp',
			fieldLabel : 'Telp',
			maxLength : 20
		});
		det_apotek_spField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_spField',
			name : 'det_apotek_sp',
			fieldLabel : 'Surat Penugasan',
			maxLength : 50
		});
		det_apotek_ktpField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_ktpField',
			name : 'det_apotek_ktp',
			fieldLabel : 'NIK',
			maxLength : 20
		});
		det_apotek_tempatlahirField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_tempatlahirField',
			name : 'det_apotek_tempatlahir',
			fieldLabel : 'Tempat Lahir',
			maxLength : 50
		});
		det_apotek_tanggallahirField = Ext.create('Ext.form.field.Date',{
			id : 'det_apotek_tanggallahirField',
			name : 'det_apotek_tanggallahir',
			fieldLabel : 'Tanggal Lahir',
			format : 'd-m-Y'
		});
		det_apotek_pekerjaanField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_pekerjaanField',
			name : 'det_apotek_pekerjaan',
			fieldLabel : 'Pekerjaan',
			maxLength : 50
		});
		det_apotek_npwpField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_npwpField',
			name : 'det_apotek_npwp',
			fieldLabel : 'NPWP',
			maxLength : 50
		});
		det_apotek_straField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_straField',
			name : 'det_apotek_stra',
			fieldLabel : 'STRA',
			maxLength : 50
		});
		det_apotek_pendidikanField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_pendidikanField',
			name : 'det_apotek_pendidikan',
			fieldLabel : 'Pendidikan',
			maxLength : 20
		});
		det_apotek_tahunlulusField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_tahunlulusField',
			name : 'det_apotek_tahunlulus',
			fieldLabel : 'Tahun Lulus',
			maskRe : /([0-9]+)$/
		});
		det_apotek_terimaField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_terimaField',
			name : 'det_apotek_terima',
			fieldLabel : 'Penerima Berkas',
			maxLength : 50
		});
		det_apotek_terimatanggalField = Ext.create('Ext.form.field.Date',{
			id : 'det_apotek_terimatanggalField',
			name : 'det_apotek_terimatanggal',
			fieldLabel : 'Tanggal Terima',
			format : 'd-m-Y'
		});
		det_apotek_tanggalField = Ext.create('Ext.form.field.Date',{
			id : 'det_apotek_tanggalField',
			name : 'det_apotek_tanggal',
			fieldLabel : 'Tanggal',
			format : 'd-m-Y',
			disabled : true,
			value : new Date('<?php echo date('Y-m-d').'T'.date('H:i:s'); ?>')
		});
		det_apotek_kelengkapanField = Ext.create('Ext.form.ComboBox',{
			id : 'det_apotek_kelengkapanField',
			name : 'det_apotek_kelengkapan',
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
		det_apotek_bapField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_bapField',
			name : 'det_apotek_bap',
			fieldLabel : 'BAP',
			maxLength : 50
		});
		det_apotek_skField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_skField',
			name : 'det_apotek_sk',
			fieldLabel : 'Nomor SK',
			maxLength : 50,
			hidden : true
		});
		det_apotek_baptanggalField = Ext.create('Ext.form.field.Date',{
			id : 'det_apotek_baptanggalField',
			name : 'det_apotek_baptanggal',
			fieldLabel : 'Tanggal BAP',
			format : 'd-m-Y'
		});
		det_apotek_berlakuField = Ext.create('Ext.form.field.Date',{
			id : 'det_apotek_berlakuField',
			name : 'det_apotek_berlaku',
			fieldLabel : 'Tanggal Berlaku',
			format : 'd-m-Y',
			hidden : true
		});
		det_apotek_kadaluarsaField = Ext.create('Ext.form.field.Date',{
			id : 'det_apotek_kadaluarsaField',
			name : 'det_apotek_kadaluarsa',
			fieldLabel : 'Tanggal Kadaluarsa',
			format : 'd-m-Y'
		});
		det_apotek_keputusanField = Ext.create('Ext.form.ComboBox',{
			id : 'det_apotek_keputusanField',
			name : 'det_apotek_keputusan',
			fieldLabel : 'Keputusan',
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
		det_apotek_keteranganField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_keteranganField',
			name : 'det_apotek_keterangan',
			fieldLabel : 'Keterangan',
			maxLength : 255
		});
		det_apotek_jarakField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_jarakField',
			name : 'det_apotek_jarak',
			fieldLabel : 'Jarak apotek terdekat',
			maskRe : /([0-9]+)$/
		});
		det_apotek_rracikField = Ext.create('Ext.form.ComboBox',{
			id : 'det_apotek_rracikField',
			name : 'det_apotek_rracik',
			fieldLabel : 'Ruang Racik',
			store : new Ext.data.ArrayStore({
				fields : ['status_id', 'status_nama'],
				data : [[1,'ADA'],[2,'TIDAK ADA']]
			}),
			displayField : 'status_nama',
			valueField : 'status_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true
		});
		det_apotek_radminField = Ext.create('Ext.form.ComboBox',{
			id : 'det_apotek_radminField',
			name : 'det_apotek_radmin',
			fieldLabel : 'Ruang Admin',
			store : new Ext.data.ArrayStore({
				fields : ['status_id', 'status_nama'],
				data : [[1,'ADA'],[2,'TIDAK ADA']]
			}),
			displayField : 'status_nama',
			valueField : 'status_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true
		});
		det_apotek_rkerjaField = Ext.create('Ext.form.ComboBox',{
			id : 'det_apotek_rkerjaField',
			name : 'det_apotek_rkerja',
			fieldLabel : 'Ruang Kerja',
			store : new Ext.data.ArrayStore({
				fields : ['status_id', 'status_nama'],
				data : [[1,'ADA'],[2,'TIDAK ADA']]
			}),
			displayField : 'status_nama',
			valueField : 'status_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true
		});
		det_apotek_rtungguField = Ext.create('Ext.form.ComboBox',{
			id : 'det_apotek_rtungguField',
			name : 'det_apotek_rtunggu',
			fieldLabel : 'Ruang Tunggu',
			store : new Ext.data.ArrayStore({
				fields : ['status_id', 'status_nama'],
				data : [[1,'ADA'],[2,'TIDAK ADA']]
			}),
			displayField : 'status_nama',
			valueField : 'status_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true
		});
		det_apotek_rwcField = Ext.create('Ext.form.ComboBox',{
			id : 'det_apotek_rwcField',
			name : 'det_apotek_rwc',
			fieldLabel : 'Kamar Mandi',
			store : new Ext.data.ArrayStore({
				fields : ['status_id', 'status_nama'],
				data : [[1,'ADA'],[2,'TIDAK ADA']]
			}),
			displayField : 'status_nama',
			valueField : 'status_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true
		});
		det_apotek_airField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_airField',
			name : 'det_apotek_air',
			fieldLabel : 'Sumber Air',
			maxLength : 20
		});
		det_apotek_listrikField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_listrikField',
			name : 'det_apotek_listrik',
			fieldLabel : 'Penerangan',
			maxLength : 20
		});
		det_apotek_apkField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_apkField',
			name : 'det_apotek_apk',
			fieldLabel : 'Jumlah Alat Pemadam kebakaran',
			maskRe : /([0-9]+)$/
		});
		det_apotek_apkukuranField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_apkukuranField',
			name : 'det_apotek_apkukuran',
			fieldLabel : 'Ukuran Alat Pemadam',
			maxLength : 20
		});
		det_apotek_jendelaField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_jendelaField',
			name : 'det_apotek_jendela',
			fieldLabel : 'Jumlah Jendela',
			maskRe : /([0-9]+)$/
		});
		det_apotek_limbahField = Ext.create('Ext.form.ComboBox',{
			id : 'det_apotek_limbahField',
			name : 'det_apotek_limbah',
			fieldLabel : 'Pembuangan Limbah',
			store : new Ext.data.ArrayStore({
				fields : ['status_id', 'status_nama'],
				data : [[1,'ADA'],[2,'TIDAK ADA']]
			}),
			displayField : 'status_nama',
			valueField : 'status_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true
		});
		det_apotek_baksampahField = Ext.create('Ext.form.ComboBox',{
			id : 'det_apotek_baksampahField',
			name : 'det_apotek_baksampah',
			fieldLabel : 'Bak Sampah',
			store : new Ext.data.ArrayStore({
				fields : ['status_id', 'status_nama'],
				data : [[1,'ADA'],[2,'TIDAK ADA']]
			}),
			displayField : 'status_nama',
			valueField : 'status_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true
		});
		det_apotek_parkirField = Ext.create('Ext.form.ComboBox',{
			id : 'det_apotek_parkirField',
			name : 'det_apotek_parkir',
			fieldLabel : 'Tempat Parkir',
			store : new Ext.data.ArrayStore({
				fields : ['status_id', 'status_nama'],
				data : [[1,'ADA'],[2,'TIDAK ADA']]
			}),
			displayField : 'status_nama',
			valueField : 'status_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true
		});
		det_apotek_papannamaField = Ext.create('Ext.form.ComboBox',{
			id : 'det_apotek_papannamaField',
			name : 'det_apotek_papannama',
			fieldLabel : 'Papan Nama',
			store : new Ext.data.ArrayStore({
				fields : ['status_id', 'status_nama'],
				data : [[1,'ADA'],[2,'TIDAK ADA']]
			}),
			displayField : 'status_nama',
			valueField : 'status_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true
		});
		det_apotek_pengelolaField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_pengelolaField',
			name : 'det_apotek_pengelola',
			fieldLabel : 'Jumlah Apoteker Pengelola',
			maskRe : /([0-9]+)$/
		});
		det_apotek_pendampingField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_pendampingField',
			name : 'det_apotek_pendamping',
			fieldLabel : 'Jumlah Pendamping',
			maskRe : /([0-9]+)$/
		});
		det_apotek_asistenField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_asistenField',
			name : 'det_apotek_asisten',
			fieldLabel : 'Jumlah Asisten',
			maskRe : /([0-9]+)$/
		});
		det_apotek_luasField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_luasField',
			name : 'det_apotek_luas',
			fieldLabel : 'Luas',
			maskRe : /([0-9]+)$/
		});
		det_apotek_statustanahField = Ext.create('Ext.form.ComboBox',{
			id : 'det_apotek_statustanahField',
			name : 'det_apotek_statustanah',
			fieldLabel : 'Status Tanah',
			store : new Ext.data.ArrayStore({
				fields : ['status_id', 'status_nama'],
				data : [[1,'Hak Milik'],[2,'Hak Pakai'],[3,'Hak Guna Bangunan'],[4,'Hak Milik Adat/Tanah Yayasan'],[5,'Tanah Negara'],[6,'Sewa']]
			}),
			displayField : 'status_nama',
			valueField : 'status_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true
		});
		det_apotek_sewalamaField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_sewalamaField',
			name : 'det_apotek_sewalama',
			fieldLabel : 'Lama Sewa',
			maskRe : /([0-9]+)$/
		});
		det_apotek_sewaawalField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_sewaawalField',
			name : 'det_apotek_sewaawal',
			fieldLabel : 'det_apotek_sewaawal',
			maxLength : 0
		});
		det_apotek_sewaawalField = Ext.create('Ext.form.field.Date',{
			id : 'det_apotek_sewaawalField',
			name : 'det_apotek_sewaawal',
			fieldLabel : 'Awal Sewa',
			format : 'd-m-Y'
		});
		det_apotek_sewaakhirField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_sewaakhirField',
			name : 'det_apotek_sewaakhir',
			fieldLabel : 'det_apotek_sewaakhir',
			maxLength : 0
		});
		det_apotek_sewaakhirField = Ext.create('Ext.form.field.Date',{
			id : 'det_apotek_sewaakhirField',
			name : 'det_apotek_sewaakhir',
			fieldLabel : 'Akhir Sewa',
			format : 'd-m-Y'
		});
		det_apotek_shnomorField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_shnomorField',
			name : 'det_apotek_shnomor',
			fieldLabel : 'No. Sertifikat',
			maxLength : 50
		});
		det_apotek_shtahunField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_shtahunField',
			name : 'det_apotek_shtahun',
			fieldLabel : 'Tahun',
			maskRe : /([0-9]+)$/
		});
		det_apotek_shgssuField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_shgssuField',
			name : 'det_apotek_shgssu',
			fieldLabel : 'GS/SU No.',
			maxLength : 50
		});
		det_apotek_shtanggalField = Ext.create('Ext.form.field.Date',{
			id : 'det_apotek_shtanggalField',
			name : 'det_apotek_shtanggal',
			fieldLabel : 'Tanggal',
			format : 'd-m-Y'
		});
		det_apotek_shanField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_shanField',
			name : 'det_apotek_shan',
			fieldLabel : 'Atas Nama',
			maxLength : 50
		});
		det_apotek_aktanoField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_aktanoField',
			name : 'det_apotek_aktano',
			fieldLabel : 'Nomor Akta',
			maxLength : 50
		});
		det_apotek_aktatahunField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_aktatahunField',
			name : 'det_apotek_aktatahun',
			fieldLabel : 'Tahun',
			maskRe : /([0-9]+)$/
		});
		det_apotek_aktanotarisField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_aktanotarisField',
			name : 'det_apotek_aktanotaris',
			fieldLabel : 'Notaris',
			maxLength : 50
		});
		det_apotek_aktaanField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_aktaanField',
			name : 'det_apotek_aktaan',
			fieldLabel : 'Atas Nama',
			maxLength : 50
		});
		det_apotek_ckutipanField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_ckutipanField',
			name : 'det_apotek_ckutipan',
			fieldLabel : 'Kutipan Letter C',
			maxLength : 255
		});
		det_apotek_ckecField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_ckecField',
			name : 'det_apotek_ckec',
			fieldLabel : 'Kecamatan',
			maxLength : 50
		});
		det_apotek_ctanggalField = Ext.create('Ext.form.field.Date',{
			id : 'det_apotek_ctanggalField',
			name : 'det_apotek_ctanggal',
			fieldLabel : 'Tanggal',
			format : 'd-m-Y'
		});
		det_apotek_cpetokField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_cpetokField',
			name : 'det_apotek_cpetok',
			fieldLabel : 'Petok',
			maxLength : 50
		});
		det_apotek_cpersilField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_cpersilField',
			name : 'det_apotek_cpersil',
			fieldLabel : 'Persil',
			maxLength : 50
		});
		det_apotek_ckelasField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_ckelasField',
			name : 'det_apotek_ckelas',
			fieldLabel : 'Kelas',
			maxLength : 50
		});
		det_apotek_canField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_canField',
			name : 'det_apotek_can',
			fieldLabel : 'Atas Nama',
			maxLength : 50
		});
		det_apotek_sppihak1Field = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_sppihak1Field',
			name : 'det_apotek_sppihak1',
			fieldLabel : 'Pihak Pertama',
			maxLength : 50
		});
		det_apotek_sppihak2Field = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_sppihak2Field',
			name : 'det_apotek_sppihak2',
			fieldLabel : 'Pihak Kedua',
			maxLength : 50
		});
		det_apotek_spnomorField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_spnomorField',
			name : 'det_apotek_spnomor',
			fieldLabel : 'Nomor Perjanjian',
			maxLength : 50
		});
		det_apotek_sptanggalField = Ext.create('Ext.form.field.Date',{
			id : 'det_apotek_sptanggalField',
			name : 'det_apotek_sptanggal',
			fieldLabel : 'Tanggal',
			format : 'd-m-Y'
		});
		det_apotek_notarisField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_notarisField',
			name : 'det_apotek_notaris',
			fieldLabel : 'Notaris',
			maxLength : 50
		});
		
		/* field apotek */
		
		apotek_namaField = Ext.create('Ext.form.TextField',{
			id : 'apotek_namaField',
			name : 'apotek_nama',
			fieldLabel : 'Nama',
			maxLength : 50
		});
		apotek_alamatField = Ext.create('Ext.form.TextField',{
			id : 'apotek_alamatField',
			name : 'apotek_alamat',
			fieldLabel : 'Alamat',
			maxLength : 100
		});
		apotek_telpField = Ext.create('Ext.form.TextField',{
			id : 'apotek_telpField',
			name : 'apotek_telp',
			fieldLabel : 'Telp',
			maxLength : 20,
			maskRe : /([0-9]+)$/
		});
		apotek_kelField = Ext.create('Ext.form.TextField',{
			id : 'apotek_kelField',
			name : 'apotek_kel',
			fieldLabel : 'Kelurahan',
			maxLength : 50
		});
		apotek_kecField = Ext.create('Ext.form.TextField',{
			id : 'apotek_kecField',
			name : 'apotek_kec',
			fieldLabel : 'Kecamatan',
			maxLength : 50
		});
		apotek_kepemilikanField = Ext.create('Ext.form.ComboBox',{
			id : 'apotek_kepemilikanField',
			name : 'apotek_kepemilikan',
			fieldLabel : 'Kepemilikan',
			store : new Ext.data.ArrayStore({
				fields : ['kepemilikan_id', 'kepemilikan_nama'],
				data : [[1,'MILIK SENDIRI'],[2,'KEPEMILIKAN ORANG LAIN']]
			}),
			displayField : 'kepemilikan_nama',
			valueField : 'kepemilikan_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true
		});
		apotek_pemilikField = Ext.create('Ext.form.TextField',{
			id : 'apotek_pemilikField',
			name : 'apotek_pemilik',
			fieldLabel : 'Pemilik',
			maxLength : 50
		});
		apotek_pemilikalamatField = Ext.create('Ext.form.TextField',{
			id : 'apotek_pemilikalamatField',
			name : 'apotek_pemilikalamat',
			fieldLabel : 'Alamat',
			maxLength : 100
		});
		apotek_pemiliknpwpField = Ext.create('Ext.form.TextField',{
			id : 'apotek_pemiliknpwpField',
			name : 'apotek_pemiliknpwp',
			fieldLabel : 'NPWP Pemilik',
			maxLength : 50
		});
		apotek_siupField = Ext.create('Ext.form.TextField',{
			id : 'apotek_siupField',
			name : 'apotek_siup',
			fieldLabel : 'SIUP',
			maxLength : 50
		});
		/* end field apotek */
		
		apotek_det_syaratDataStore = Ext.create('Ext.data.Store',{
			id : 'apotek_det_syaratDataStore',
			pageSize : globalPageSize,
			autoLoad : true,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_apotek_det/switchAction',
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
				{ name : 'apotek_cek_id', type : 'int', mapping : 'apotek_cek_id' },
				{ name : 'apotek_cek_syarat_id', type : 'int', mapping : 'apotek_cek_syarat_id' },
				{ name : 'apotek_cek_apotekdet_id', type : 'int', mapping : 'apotek_cek_apotekdet_id' },
				{ name : 'apotek_cek_apotek_id', type : 'int', mapping : 'apotek_cek_apotek_id' },
				{ name : 'apotek_cek_status', type : 'boolean', mapping : 'apotek_cek_status' },
				{ name : 'apotek_cek_keterangan', type : 'string', mapping : 'apotek_cek_keterangan' },
				{ name : 'apotek_cek_syarat_nama', type : 'string', mapping : 'apotek_cek_syarat_nama' }
				]
		});
		var det_apotek_syaratGridEditor = new Ext.grid.plugin.CellEditing({
			clicksToEdit: 1
		});
		det_apotek_syaratGrid = Ext.create('Ext.grid.Panel',{
			id : 'det_apotek_syaratGrid',
			store : apotek_det_syaratDataStore,
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
					dataIndex : 'apotek_cek_id',
					width : 100,
					hidden : true,
					hideable : false,
					sortable : false
				},
				{
					text : 'Syarat',
					dataIndex : 'apotek_cek_syarat_nama',
					width : 200,
					sortable : false,
					editor : {
						xtype : 'textfield',
						readOnly : true
					}
				},
				{
					xtype: 'checkcolumn',
					text: 'Ada?',
					dataIndex: 'apotek_cek_status',
					width: 55,
					stopSelection: false
				},
				{
					text : 'Keterangan',
					dataIndex : 'apotek_cek_keterangan',
					width : 100,
					sortable : false,
					editor: 'textfield',
					flex : 1
				}
			]
		});
		apotek_det_perlengkapanDataStore = Ext.create('Ext.data.Store',{
			id : 'apotek_det_perlengkapanDataStore',
			pageSize : globalPageSize,
			autoLoad : true,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_apotek_det/switchAction',
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
					action : 'GETPERLENGKAPAN'
				}
			}),
			fields : [
				{ name : 'apotek_ket_id', type : 'int', mapping : 'apotek_ket_id' },
				{ name : 'apotek_ket_perlengkapanid', type : 'int', mapping : 'apotek_ket_perlengkapanid' },
				{ name : 'apotek_ket_perlengkapannama', type : 'string', mapping : 'apotek_ket_perlengkapannama' },
				{ name : 'apotek_ket_status', type : 'boolean', mapping : 'apotek_ket_status' },
				{ name : 'apotek_ket_jumlah', type : 'int', mapping : 'apotek_ket_jumlah' }
				]
		});
		var det_apotek_perlengkapanGridEditor = new Ext.grid.plugin.CellEditing({
			clicksToEdit: 1
		});
		det_apotek_perlengkapanGrid = Ext.create('Ext.grid.Panel',{
			id : 'det_apotek_perlengkapanGrid',
			store : apotek_det_perlengkapanDataStore,
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
					text : 'Perlengkapan',
					dataIndex : 'apotek_ket_perlengkapannama',
					width : 250,
					sortable : false,
					editor : {
						xtype : 'textfield',
						readOnly : true
					}
				},
				{
					xtype: 'checkcolumn',
					text: 'Ada?',
					dataIndex: 'apotek_ket_status',
					width: 55,
					stopSelection: false
				},
				{
					text : 'Jumlah',
					dataIndex : 'apotek_ket_jumlah',
					width : 100,
					sortable : false,
					editor: 'textfield',
					flex : 1
				}
			]
		});
		
		/* START asisten DOKUMEN */
		var det_apotek_asisten_dataStore = Ext.create('Ext.data.Store',{
			id : 'apotek_det_asistenDataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_apotek_det/switchAction',
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
					action : 'GETASISTEN'
				}
			}),
			fields : [
				{ name : 'asisten_id', type : 'int', mapping : 'asisten_id' },
				{ name : 'asisten_nama', type : 'string', mapping : 'asisten_nama' },
				{ name : 'asisten_sik', type : 'string', mapping : 'asisten_sik' },
				{ name : 'asisten_lulus', type : 'string', mapping : 'asisten_lulus' },
				{ name : 'asisten_alamat', type : 'string', mapping : 'asisten_alamat' }
			]
		});
		function det_apotek_asisten_addHandler(){
			det_apotek_asisten_roleRowEditor.cancelEdit();
			var data_det_apotekDetail = {
				asisten_id : 0,
				asisten_nama : '',
				asisten_sik : '',
				asisten_lulus : '',
				asisten_alamat : ''
			};
			det_apotek_asisten_dataStore.insert(0, data_det_apotekDetail);
			det_apotek_asisten_roleRowEditor.startEdit(0, 0);
		}
		function det_apotek_asisten_deleteHandler(){
			var sm = det_apotek_asisten_gridPanel.getSelectionModel();
			det_apotek_asisten_roleRowEditor.cancelEdit();
			det_apotek_asisten_dataStore.remove(sm.getSelection());
			if (det_apotek_asisten_dataStore.getCount() > 0) {
				sm.select(0);
			}
		}
		det_apotek_asisten_addEditor = Ext.create('Ext.Button',{
			text: globalAddButtonTitle,
			iconCls: 'icon16x16-add',
			handler : det_apotek_asisten_addHandler
		});
		det_apotek_asisten_deleteEditor = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : det_apotek_asisten_deleteHandler
		});
		var det_apotek_asisten_roleRowEditor = Ext.create('Ext.grid.plugin.RowEditing', {
			clicksToMoveEditor : 1,
			autoCancel : false
		});
		det_apotek_asisten_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'det_apotek_asisten_gridPanel',
			title : 'Data Asisten',
			constrain : true,
			store : det_apotek_asisten_dataStore,
			loadMask : true,
			height : 150,
			plugins: [det_apotek_asisten_roleRowEditor],
            enableColLock : false,
			selModel : Ext.selection.Model(),
			multiSelect : false,
			tbar: [det_apotek_asisten_addEditor,det_apotek_asisten_deleteEditor],
			columns : [
				{
					text : 'Nama',
					dataIndex : 'asisten_nama',
					width : 100,
					sortable : false,
					editor : Ext.create('Ext.form.TextField',{
						maxLength : 50
					})
				},
				{
					text : 'Nomor SIK',
					dataIndex: 'asisten_sik',
					width: 100,
					sortable : false,
					editor : Ext.create('Ext.form.TextField',{
						maxLength : 50
					})
				},
				{
					text : 'Tahun Lulus',
					dataIndex: 'asisten_lulus',
					width: 70,
					sortable : false,
					editor : Ext.create('Ext.form.TextField',{
						maxLength : 50
					})
				},
				{
					text : 'Alamat',
					dataIndex: 'asisten_alamat',
					width: 200,
					sortable : false,
					flex : 1,
					editor : Ext.create('Ext.form.TextField',{
						maxLength : 50
					})
				}
			]
		});
		
		/* END asisten DOKUMEN */
		var apotek_det_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : apotek_det_save
		});
		var apotek_det_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				apotek_det_resetForm();
				apotek_det_switchToGrid();
			}
		});
		/* START DATA PEMOHON */
		var apotek_det_pemohon_idField = Ext.create('Ext.form.Hidden',{
			name : 'pemohon_id'
		});
		var apotek_det_pemohon_namaField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_nama',
			fieldLabel : 'Nama',
			maxLength : 50
		});
		var apotek_det_pemohon_alamatField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_alamat',
			fieldLabel : 'Alamat',
			maxLength : 100
		});
		var apotek_det_pemohon_telpField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_telp',
			fieldLabel : 'Telp',
			maxLength : 20,
			maskRe : /([0-9]+)$/
		});
		var apotek_det_pemohon_npwpField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_npwp',
			fieldLabel : 'NPWP',
			maxLength : 50
		});
		var apotek_det_pemohon_rtField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_rt',
			fieldLabel : 'RT',
			maskRe : /([0-9]+)$/
		});
		var apotek_det_pemohon_rwField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_rw',
			fieldLabel : 'RW',
			maskRe : /([0-9]+)$/
		});
		var apotek_det_pemohon_kelField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_kel',
			fieldLabel : 'Kelurahan',
			maxLength : 50
		});
		var apotek_det_pemohon_kecField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_kec',
			fieldLabel : 'Kecamatan',
			maxLength : 50
		});
		var apotek_det_pemohon_nikField = Ext.create('Ext.form.ComboBox',{
			name : 'apotek_det_pemohon_nik',
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
				var store = apotek_det_pemohon_nikField.getStore();
				var val = apotek_det_pemohon_nikField.getRawValue();
				store.proxy.extraParams = {action : 'SEARCH',pemohon_nik : val};
				store.load();
				apotek_det_pemohon_nikField.expand();
				apotek_det_pemohon_nikField.fireEvent("ontriggerclick", this, event);
			},  
			tpl: Ext.create('Ext.XTemplate',
				'<tpl for=".">',
					'<div class="x-boundlist-item">NIK : {pemohon_nik}<br>Nama : {pemohon_nama}<br>Alamat : {pemohon_alamat}<br>Telp : {pemohon_telp}<br></div>',
				'</tpl>'
			),
			listeners : {
				select : function(cmb, record){
					var rec=record[0];
					apotek_det_pemohon_idField.setValue(rec.get('pemohon_id'));
					apotek_det_pemohon_nikField.setValue(rec.get('pemohon_nik'));
					apotek_det_pemohon_namaField.setValue(rec.get('pemohon_nama'));
					apotek_det_pemohon_alamatField.setValue(rec.get('pemohon_alamat'));
					apotek_det_pemohon_telpField.setValue(rec.get('pemohon_telp'));
					apotek_det_pemohon_npwpField.setValue(rec.get('pemohon_npwp'));
					apotek_det_pemohon_rtField.setValue(rec.get('pemohon_rt'));
					apotek_det_pemohon_rwField.setValue(rec.get('pemohon_rw'));
					apotek_det_pemohon_kelField.setValue(rec.get('pemohon_kel'));
					apotek_det_pemohon_kecField.setValue(rec.get('pemohon_kec'));
					apotek_det_pemohon_straField.setValue(rec.get('pemohon_stra'));
					apotek_det_pemohon_surattugasField.setValue(rec.get('pemohon_surattugas'));
					apotek_det_pemohon_pekerjaanField.setValue(rec.get('pemohon_pekerjaan'));
					apotek_det_pemohon_tempatlahirField.setValue(rec.get('pemohon_tempatlahir'));
					apotek_det_pemohon_tanggallahirField.setValue(rec.get('pemohon_tanggallahir'));
					apotek_det_pemohon_user_idField.setValue(rec.get('pemohon_user_id'));
					apotek_det_pemohon_pendidikanField.setValue(rec.get('pemohon_pendidikan'));
					apotek_det_pemohon_tahunlulusField.setValue(rec.get('pemohon_tahunlulus'));
				}
			}
		});
		var apotek_det_pemohon_straField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_stra',
			fieldLabel : 'STRA',
			maxLength : 50
		});
		var apotek_det_pemohon_surattugasField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_surattugas',
			fieldLabel : 'Surat Tugas',
			maxLength : 50
		});
		var apotek_det_pemohon_pekerjaanField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_pekerjaan',
			fieldLabel : 'Pekerjaan',
			maxLength : 50
		});
		var apotek_det_pemohon_tempatlahirField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_tempatlahir',
			fieldLabel : 'Tempat Lahir',
			maxLength : 50
		});
		var apotek_det_pemohon_tanggallahirField = Ext.create('Ext.form.field.Date',{
			name : 'pemohon_tanggallahir',
			fieldLabel : 'Tanggal Lahir',
			format : 'd-m-Y'
		});
		var apotek_det_pemohon_user_idField = Ext.create('Ext.form.Hidden',{
			name : 'pemohon_user_id',
		});
		var apotek_det_pemohon_pendidikanField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_pendidikan',
			fieldLabel : 'Pendidikan',
			maxLength : 50
		});
		var apotek_det_pemohon_tahunlulusField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_tahunlulus',
			fieldLabel : 'Tahun Lulus',
			maxLength : 4,
			maskRe : /([0-9]+)$/
		});
		var ipmbl_det_pendukungfieldset = Ext.create('Ext.form.FieldSet',{
			title : '8. Data Pendukung',
			checkboxToggle : false,
			collapsible : false,
			layout :'form',
			items : [
				det_apotek_surveylulusField,
				det_apotek_terimaField,
				det_apotek_terimatanggalField,
				det_apotek_kelengkapanField,
				det_apotek_bapField,
				det_apotek_baptanggalField,
				det_apotek_keputusanField,
				det_apotek_keteranganField,
				det_apotek_skField,
				det_apotek_berlakuField,
				det_apotek_kadaluarsaField
			]
		});
		/* END DATA PEMOHON */
		apotek_det_formPanel = Ext.create('Ext.form.Panel', {
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
								det_apotek_idField,
								det_apotek_apotek_idField,
								det_apotek_jenisField,
								det_apotek_sklamaField,
								det_apotek_tanggalField
							]
						},
						{
							xtype : 'fieldset',
							title : '2. Data Pemohon',
							checkboxToggle : false,
							collapsible : false,
							layout :'form',
							items : [
								apotek_det_pemohon_idField,
								apotek_det_pemohon_nikField,
								apotek_det_pemohon_namaField,
								apotek_det_pemohon_alamatField,
								apotek_det_pemohon_telpField,
								apotek_det_pemohon_npwpField,
								apotek_det_pemohon_rtField,
								apotek_det_pemohon_rwField,
								apotek_det_pemohon_kelField,
								apotek_det_pemohon_kecField,
								apotek_det_pemohon_straField,
								apotek_det_pemohon_surattugasField,
								apotek_det_pemohon_pekerjaanField,
								apotek_det_pemohon_tempatlahirField,
								apotek_det_pemohon_tanggallahirField,
								apotek_det_pemohon_user_idField,
								apotek_det_pemohon_pendidikanField,
								apotek_det_pemohon_tahunlulusField
							]
						},
						{
							xtype : 'fieldset',
							title : '3. Data Apotek',
							checkboxToggle : false,
							collapsible : false,
							layout :'form',
							items : [
								apotek_namaField,
								apotek_alamatField,
								apotek_telpField,
								apotek_kelField,
								apotek_kecField,
								apotek_kepemilikanField,
								apotek_pemilikField,
								apotek_pemilikalamatField,
								apotek_pemiliknpwpField,
								apotek_siupField,
								det_apotek_jarakField,
								det_apotek_rracikField,
								det_apotek_radminField,
								det_apotek_rkerjaField,
								det_apotek_rtungguField,
								det_apotek_rwcField,
								det_apotek_airField,
								det_apotek_listrikField,
								det_apotek_apkField,
								det_apotek_apkukuranField,
								det_apotek_jendelaField,
								det_apotek_limbahField,
								det_apotek_baksampahField,
								det_apotek_parkirField,
								det_apotek_papannamaField,
								det_apotek_pengelolaField,
								det_apotek_pendampingField,
								det_apotek_asistenField,
							]
						},
						{
							xtype : 'fieldset',
							title : '4. Data Perlengkapan Apotek',
							checkboxToggle : false,
							collapsible : false,
							layout :'form',
							items : [
								det_apotek_perlengkapanGrid
							]
						},
						{
							xtype : 'fieldset',
							title : '5. Data Bangunan',
							checkboxToggle : false,
							collapsible : false,
							layout :'form',
							items : [
								det_apotek_luasField,
								det_apotek_statustanahField,
								det_apotek_sewalamaField,
								det_apotek_sewaawalField,
								det_apotek_sewaakhirField,
								det_apotek_shnomorField,
								det_apotek_shtahunField,
								det_apotek_shgssuField,
								det_apotek_shtanggalField,
								det_apotek_shanField,
								det_apotek_aktanoField,
								det_apotek_aktatahunField,
								det_apotek_aktanotarisField,
								det_apotek_aktaanField,
								det_apotek_ckutipanField,
								det_apotek_ckecField,
								det_apotek_ctanggalField,
								det_apotek_cpetokField,
								det_apotek_cpersilField,
								det_apotek_ckelasField,
								det_apotek_canField,
								det_apotek_sppihak1Field,
								det_apotek_sppihak2Field,
								det_apotek_spnomorField,
								det_apotek_sptanggalField,
								det_apotek_notarisField,
							]
						},
						{
							xtype : 'fieldset',
							title : '6. Data Ceklist',
							checkboxToggle : false,
							collapsible : false,
							layout :'form',
							items : [
								det_apotek_syaratGrid
							]
						},
						{
							xtype : 'fieldset',
							title : '7. Data Asisten',
							checkboxToggle : false,
							collapsible : false,
							layout :'form',
							items : [
								det_apotek_asisten_gridPanel
							]
						},
						ipmbl_det_pendukungfieldset,
						Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })
					],
				}
			],
			buttons : [apotek_det_saveButton,apotek_det_cancelButton]
		});
		apotek_det_formWindow = Ext.create('Ext.window.Window',{
			id : 'apotek_det_formWindow',
			renderTo : 'apotek_detSaveWindow',
			title : globalFormAddEditTitle + ' ' + apotek_det_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [apotek_det_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		det_apotek_apotek_idSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_apotek_apotek_idSearchField',
			name : 'det_apotek_apotek_id',
			fieldLabel : 'det_apotek_apotek_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_apotek_jenisSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_apotek_jenisSearchField',
			name : 'det_apotek_jenis',
			fieldLabel : 'det_apotek_jenis',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_apotek_surveylulusSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_apotek_surveylulusSearchField',
			name : 'det_apotek_surveylulus',
			fieldLabel : 'det_apotek_surveylulus',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_apotek_namaSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_namaSearchField',
			name : 'det_apotek_nama',
			fieldLabel : 'det_apotek_nama',
			maxLength : 50
		
		});
		det_apotek_alamatSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_alamatSearchField',
			name : 'det_apotek_alamat',
			fieldLabel : 'det_apotek_alamat',
			maxLength : 50
		
		});
		det_apotek_telpSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_telpSearchField',
			name : 'det_apotek_telp',
			fieldLabel : 'det_apotek_telp',
			maxLength : 20
		
		});
		det_apotek_spSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_spSearchField',
			name : 'det_apotek_sp',
			fieldLabel : 'det_apotek_sp',
			maxLength : 50
		
		});
		det_apotek_ktpSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_ktpSearchField',
			name : 'det_apotek_ktp',
			fieldLabel : 'det_apotek_ktp',
			maxLength : 20
		
		});
		det_apotek_tempatlahirSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_tempatlahirSearchField',
			name : 'det_apotek_tempatlahir',
			fieldLabel : 'det_apotek_tempatlahir',
			maxLength : 50
		
		});
		det_apotek_tanggallahirSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_tanggallahirSearchField',
			name : 'det_apotek_tanggallahir',
			fieldLabel : 'det_apotek_tanggallahir',
			maxLength : 0
		
		});
		det_apotek_pekerjaanSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_pekerjaanSearchField',
			name : 'det_apotek_pekerjaan',
			fieldLabel : 'det_apotek_pekerjaan',
			maxLength : 50
		
		});
		det_apotek_npwpSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_npwpSearchField',
			name : 'det_apotek_npwp',
			fieldLabel : 'det_apotek_npwp',
			maxLength : 50
		
		});
		det_apotek_straSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_straSearchField',
			name : 'det_apotek_stra',
			fieldLabel : 'det_apotek_stra',
			maxLength : 50
		
		});
		det_apotek_pendidikanSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_pendidikanSearchField',
			name : 'det_apotek_pendidikan',
			fieldLabel : 'det_apotek_pendidikan',
			maxLength : 20
		
		});
		det_apotek_tahunlulusSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_apotek_tahunlulusSearchField',
			name : 'det_apotek_tahunlulus',
			fieldLabel : 'det_apotek_tahunlulus',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_apotek_terimaSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_terimaSearchField',
			name : 'det_apotek_terima',
			fieldLabel : 'det_apotek_terima',
			maxLength : 50
		
		});
		det_apotek_terimatanggalSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_terimatanggalSearchField',
			name : 'det_apotek_terimatanggal',
			fieldLabel : 'det_apotek_terimatanggal',
			maxLength : 0
		
		});
		det_apotek_kelengkapanSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_apotek_kelengkapanSearchField',
			name : 'det_apotek_kelengkapan',
			fieldLabel : 'det_apotek_kelengkapan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_apotek_bapSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_bapSearchField',
			name : 'det_apotek_bap',
			fieldLabel : 'det_apotek_bap',
			maxLength : 50
		
		});
		det_apotek_baptanggalSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_baptanggalSearchField',
			name : 'det_apotek_baptanggal',
			fieldLabel : 'det_apotek_baptanggal',
			maxLength : 0
		
		});
		det_apotek_keputusanSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_apotek_keputusanSearchField',
			name : 'det_apotek_keputusan',
			fieldLabel : 'det_apotek_keputusan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_apotek_keteranganSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_keteranganSearchField',
			name : 'det_apotek_keterangan',
			fieldLabel : 'det_apotek_keterangan',
			maxLength : 255
		
		});
		det_apotek_jarakSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_apotek_jarakSearchField',
			name : 'det_apotek_jarak',
			fieldLabel : 'det_apotek_jarak',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_apotek_rracikSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_apotek_rracikSearchField',
			name : 'det_apotek_rracik',
			fieldLabel : 'det_apotek_rracik',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_apotek_radminSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_apotek_radminSearchField',
			name : 'det_apotek_radmin',
			fieldLabel : 'det_apotek_radmin',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_apotek_rkerjaSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_apotek_rkerjaSearchField',
			name : 'det_apotek_rkerja',
			fieldLabel : 'det_apotek_rkerja',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_apotek_rtungguSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_apotek_rtungguSearchField',
			name : 'det_apotek_rtunggu',
			fieldLabel : 'det_apotek_rtunggu',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_apotek_rwcSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_apotek_rwcSearchField',
			name : 'det_apotek_rwc',
			fieldLabel : 'det_apotek_rwc',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_apotek_airSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_airSearchField',
			name : 'det_apotek_air',
			fieldLabel : 'det_apotek_air',
			maxLength : 20
		
		});
		det_apotek_listrikSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_listrikSearchField',
			name : 'det_apotek_listrik',
			fieldLabel : 'det_apotek_listrik',
			maxLength : 20
		
		});
		det_apotek_apkSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_apotek_apkSearchField',
			name : 'det_apotek_apk',
			fieldLabel : 'det_apotek_apk',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_apotek_apkukuranSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_apkukuranSearchField',
			name : 'det_apotek_apkukuran',
			fieldLabel : 'det_apotek_apkukuran',
			maxLength : 20
		
		});
		det_apotek_jendelaSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_apotek_jendelaSearchField',
			name : 'det_apotek_jendela',
			fieldLabel : 'det_apotek_jendela',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_apotek_limbahSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_apotek_limbahSearchField',
			name : 'det_apotek_limbah',
			fieldLabel : 'det_apotek_limbah',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_apotek_baksampahSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_apotek_baksampahSearchField',
			name : 'det_apotek_baksampah',
			fieldLabel : 'det_apotek_baksampah',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_apotek_parkirSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_apotek_parkirSearchField',
			name : 'det_apotek_parkir',
			fieldLabel : 'det_apotek_parkir',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_apotek_papannamaSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_apotek_papannamaSearchField',
			name : 'det_apotek_papannama',
			fieldLabel : 'det_apotek_papannama',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_apotek_pengelolaSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_apotek_pengelolaSearchField',
			name : 'det_apotek_pengelola',
			fieldLabel : 'det_apotek_pengelola',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_apotek_pendampingSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_apotek_pendampingSearchField',
			name : 'det_apotek_pendamping',
			fieldLabel : 'det_apotek_pendamping',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_apotek_asistenSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_apotek_asistenSearchField',
			name : 'det_apotek_asisten',
			fieldLabel : 'det_apotek_asisten',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_apotek_luasSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_apotek_luasSearchField',
			name : 'det_apotek_luas',
			fieldLabel : 'det_apotek_luas',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_apotek_statustanahSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_apotek_statustanahSearchField',
			name : 'det_apotek_statustanah',
			fieldLabel : 'det_apotek_statustanah',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_apotek_sewalamaSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_apotek_sewalamaSearchField',
			name : 'det_apotek_sewalama',
			fieldLabel : 'det_apotek_sewalama',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_apotek_sewaawalSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_sewaawalSearchField',
			name : 'det_apotek_sewaawal',
			fieldLabel : 'det_apotek_sewaawal',
			maxLength : 0
		
		});
		det_apotek_sewaakhirSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_sewaakhirSearchField',
			name : 'det_apotek_sewaakhir',
			fieldLabel : 'det_apotek_sewaakhir',
			maxLength : 0
		
		});
		det_apotek_shnomorSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_shnomorSearchField',
			name : 'det_apotek_shnomor',
			fieldLabel : 'det_apotek_shnomor',
			maxLength : 50
		
		});
		det_apotek_shtahunSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_apotek_shtahunSearchField',
			name : 'det_apotek_shtahun',
			fieldLabel : 'det_apotek_shtahun',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_apotek_shgssuSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_shgssuSearchField',
			name : 'det_apotek_shgssu',
			fieldLabel : 'det_apotek_shgssu',
			maxLength : 50
		
		});
		det_apotek_shtanggalSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_shtanggalSearchField',
			name : 'det_apotek_shtanggal',
			fieldLabel : 'det_apotek_shtanggal',
			maxLength : 0
		
		});
		det_apotek_shanSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_shanSearchField',
			name : 'det_apotek_shan',
			fieldLabel : 'det_apotek_shan',
			maxLength : 50
		
		});
		det_apotek_aktanoSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_aktanoSearchField',
			name : 'det_apotek_aktano',
			fieldLabel : 'det_apotek_aktano',
			maxLength : 50
		
		});
		det_apotek_aktatahunSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_apotek_aktatahunSearchField',
			name : 'det_apotek_aktatahun',
			fieldLabel : 'det_apotek_aktatahun',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_apotek_aktanotarisSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_aktanotarisSearchField',
			name : 'det_apotek_aktanotaris',
			fieldLabel : 'det_apotek_aktanotaris',
			maxLength : 50
		
		});
		det_apotek_aktaanSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_aktaanSearchField',
			name : 'det_apotek_aktaan',
			fieldLabel : 'det_apotek_aktaan',
			maxLength : 50
		
		});
		det_apotek_ckutipanSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_ckutipanSearchField',
			name : 'det_apotek_ckutipan',
			fieldLabel : 'det_apotek_ckutipan',
			maxLength : 255
		
		});
		det_apotek_ckecSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_ckecSearchField',
			name : 'det_apotek_ckec',
			fieldLabel : 'det_apotek_ckec',
			maxLength : 50
		
		});
		det_apotek_ctanggalSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_ctanggalSearchField',
			name : 'det_apotek_ctanggal',
			fieldLabel : 'det_apotek_ctanggal',
			maxLength : 0
		
		});
		det_apotek_cpetokSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_cpetokSearchField',
			name : 'det_apotek_cpetok',
			fieldLabel : 'det_apotek_cpetok',
			maxLength : 50
		
		});
		det_apotek_cpersilSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_cpersilSearchField',
			name : 'det_apotek_cpersil',
			fieldLabel : 'det_apotek_cpersil',
			maxLength : 50
		
		});
		det_apotek_ckelasSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_ckelasSearchField',
			name : 'det_apotek_ckelas',
			fieldLabel : 'det_apotek_ckelas',
			maxLength : 50
		
		});
		det_apotek_canSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_canSearchField',
			name : 'det_apotek_can',
			fieldLabel : 'det_apotek_can',
			maxLength : 50
		
		});
		det_apotek_sppihak1SearchField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_sppihak1SearchField',
			name : 'det_apotek_sppihak1',
			fieldLabel : 'det_apotek_sppihak1',
			maxLength : 50
		
		});
		det_apotek_sppihak2SearchField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_sppihak2SearchField',
			name : 'det_apotek_sppihak2',
			fieldLabel : 'det_apotek_sppihak2',
			maxLength : 50
		
		});
		det_apotek_spnomorSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_spnomorSearchField',
			name : 'det_apotek_spnomor',
			fieldLabel : 'det_apotek_spnomor',
			maxLength : 50
		
		});
		det_apotek_sptanggalSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_sptanggalSearchField',
			name : 'det_apotek_sptanggal',
			fieldLabel : 'det_apotek_sptanggal',
			maxLength : 0
		
		});
		det_apotek_notarisSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_apotek_notarisSearchField',
			name : 'det_apotek_notaris',
			fieldLabel : 'det_apotek_notaris',
			maxLength : 50
		
		});
		var apotek_det_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : apotek_det_search
		});
		var apotek_det_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				apotek_det_searchWindow.hide();
			}
		});
		apotek_det_searchPanel = Ext.create('Ext.form.Panel', {
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
						det_apotek_apotek_idSearchField,
						det_apotek_jenisSearchField,
						det_apotek_surveylulusSearchField,
						det_apotek_namaSearchField,
						det_apotek_alamatSearchField,
						det_apotek_telpSearchField,
						det_apotek_spSearchField,
						det_apotek_ktpSearchField,
						det_apotek_tempatlahirSearchField,
						det_apotek_tanggallahirSearchField,
						det_apotek_pekerjaanSearchField,
						det_apotek_npwpSearchField,
						det_apotek_straSearchField,
						det_apotek_pendidikanSearchField,
						det_apotek_tahunlulusSearchField,
						det_apotek_terimaSearchField,
						det_apotek_terimatanggalSearchField,
						det_apotek_kelengkapanSearchField,
						det_apotek_bapSearchField,
						det_apotek_baptanggalSearchField,
						det_apotek_keputusanSearchField,
						det_apotek_keteranganSearchField,
						det_apotek_jarakSearchField,
						det_apotek_rracikSearchField,
						det_apotek_radminSearchField,
						det_apotek_rkerjaSearchField,
						det_apotek_rtungguSearchField,
						det_apotek_rwcSearchField,
						det_apotek_airSearchField,
						det_apotek_listrikSearchField,
						det_apotek_apkSearchField,
						det_apotek_apkukuranSearchField,
						det_apotek_jendelaSearchField,
						det_apotek_limbahSearchField,
						det_apotek_baksampahSearchField,
						det_apotek_parkirSearchField,
						det_apotek_papannamaSearchField,
						det_apotek_pengelolaSearchField,
						det_apotek_pendampingSearchField,
						det_apotek_asistenSearchField,
						det_apotek_luasSearchField,
						det_apotek_statustanahSearchField,
						det_apotek_sewalamaSearchField,
						det_apotek_sewaawalSearchField,
						det_apotek_sewaakhirSearchField,
						det_apotek_shnomorSearchField,
						det_apotek_shtahunSearchField,
						det_apotek_shgssuSearchField,
						det_apotek_shtanggalSearchField,
						det_apotek_shanSearchField,
						det_apotek_aktanoSearchField,
						det_apotek_aktatahunSearchField,
						det_apotek_aktanotarisSearchField,
						det_apotek_aktaanSearchField,
						det_apotek_ckutipanSearchField,
						det_apotek_ckecSearchField,
						det_apotek_ctanggalSearchField,
						det_apotek_cpetokSearchField,
						det_apotek_cpersilSearchField,
						det_apotek_ckelasSearchField,
						det_apotek_canSearchField,
						det_apotek_sppihak1SearchField,
						det_apotek_sppihak2SearchField,
						det_apotek_spnomorSearchField,
						det_apotek_sptanggalSearchField,
						det_apotek_notarisSearchField,
						]
				}],
			buttons : [apotek_det_searchingButton,apotek_det_cancelSearchButton]
		});
		apotek_det_searchWindow = Ext.create('Ext.window.Window',{
			id : 'apotek_det_searchWindow',
			renderTo : 'apotek_detSearchWindow',
			title : globalFormSearchTitle + ' ' + apotek_det_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [apotek_det_searchPanel]
		});
		<?php if(@$_SESSION['IDHAK'] == 2){ ?>
			apotek_det_lk_printCM.hide();
			apotek_det_bap_printCM.hide();
			apotek_det_si_printCM.hide();
			apotek_det_sk_printCM.hide();
			ipmbl_det_pendukungfieldset.hide();
			apotek_det_gridPanel.columns[19].setVisible(false);
			apotek_det_gridPanel.columns[20].setVisible(false);
		<?php } ?>
/* End SearchPanel declaration */
});
</script>
<div id="apotek_detSaveWindow"></div>
<div id="apotek_detSearchWindow"></div>
<div class="span12" id="apotek_detGrid"></div>