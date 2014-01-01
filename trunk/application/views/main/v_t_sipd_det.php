<style>
	.checked{
		background-image:url(../assets/images/icons/check.png) !important;
	}
</style>
<h4>IZIN PRAKTEK DOKTER</h4>
<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var sipd_det_componentItemTitle="Izin Praktek Dokter";
		var sipd_det_dataStore;
		
		var sipd_det_shorcut;
		var sipd_det_contextMenu;
		var sipd_det_gridSearchField;
		var sipd_det_gridPanel;
		var sipd_det_formPanel;
		var sipd_det_formWindow;
		var sipd_det_searchPanel;
		var sipd_det_searchWindow;
		
		var det_sipd_idField;
		var det_sipd_sipd_idField;
		var det_sipd_jenisField;
		var det_sipd_sklamaField;
		var det_sipd_tanggalField;
		var det_sipd_pemohon_idField;
		var det_sipd_nomorregField;
		var det_sipd_prosesField;
		var det_sipd_skField;
		var det_sipd_skurutField;
		var det_sipd_berlakuField;
		var det_sipd_kadaluarsaField;
		var det_sipd_terimaField;
		var det_sipd_terimatanggalField;
		var det_sipd_kelengkapanField;
		var det_sipd_bapField;
		var det_sipd_keputusanField;
		var det_sipd_baptanggalField;
		var det_sipd_sipField;
		var det_sipd_nropField;
		var det_sipd_strField;
		var det_sipd_kompetensiField;
		
		var sipd_namaField;
		var sipd_alamatField;
		var sipd_telpField;
		var sipd_urutanField;
		var sipd_jenisdokterField;
		
		var det_sipd_sipd_idSearchField;
		var det_sipd_jenisSearchField;
		var det_sipd_tanggalSearchField;
		var det_sipd_pemohon_idSearchField;
		var det_sipd_nomorregSearchField;
		var det_sipd_prosesSearchField;
		var det_sipd_skSearchField;
		var det_sipd_skurutSearchField;
		var det_sipd_berlakuSearchField;
		var det_sipd_kadaluarsaSearchField;
		var det_sipd_terimaSearchField;
		var det_sipd_terimatanggalSearchField;
		var det_sipd_kelengkapanSearchField;
		var det_sipd_bapSearchField;
		var det_sipd_keputusanSearchField;
		var det_sipd_baptanggalSearchField;
		var det_sipd_sipSearchField;
		var det_sipd_nropSearchField;
		var det_sipd_strSearchField;
		var det_sipd_kompetensiSearchField;
				
		var sipd_det_dbTask = 'CREATE';
		var sipd_det_dbTaskMessage = 'Tambah';
		var sipd_det_dbPermission = 'CRUD';
		var sipd_det_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function sipd_det_switchToGrid(){
			sipd_det_formPanel.setDisabled(true);
			sipd_det_gridPanel.setDisabled(false);
			sipd_det_formWindow.hide();
		}
		
		function sipd_det_switchToForm(){
			sipd_det_gridPanel.setDisabled(true);
			sipd_det_formPanel.setDisabled(false);
			sipd_det_formWindow.show();
		}
		
		function sipd_det_confirmAdd(){
			sipd_det_dbTask = 'CREATE';
			sipd_det_dbTaskMessage = 'created';
			sipd_det_resetForm();
			sipd_det_syaratDataStore.proxy.extraParams = { 
				currentAction : 'create',
				action : 'GETSYARAT'
			};
			sipd_det_syaratDataStore.load();
			sipd_det_switchToForm();
		}
		
		function sipd_det_confirmUpdate(){
			if(sipd_det_gridPanel.selModel.getCount() == 1) {
				sipd_det_dbTask = 'UPDATE';
				sipd_det_dbTaskMessage = 'updated';
				sipd_det_switchToForm();
				sipd_det_setForm();
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
		
		function sipd_det_confirmDelete(){
			if(sipd_det_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, sipd_det_delete);
			}else if(sipd_det_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, sipd_det_delete);
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
		
		function sipd_det_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(sipd_det_dbPermission)==false && pattC.test(sipd_det_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(sipd_det_confirmFormValid()){
					var det_sipd_idValue = '';
					var det_sipd_sipd_idValue = '';
					var det_sipd_jenisValue = '';
					var det_sipd_lamaValue = '';
					var det_sipd_tanggalValue = '';
					var det_sipd_pemohon_idValue = '';
					var det_sipd_nomorregValue = '';
					var det_sipd_prosesValue = '';
					var det_sipd_skValue = '';
					var det_sipd_skurutValue = '';
					var det_sipd_berlakuValue = '';
					var det_sipd_kadaluarsaValue = '';
					var det_sipd_terimaValue = '';
					var det_sipd_terimatanggalValue = '';
					var det_sipd_kelengkapanValue = '';
					var det_sipd_bapValue = '';
					var det_sipd_keputusanValue = '';
					var det_sipd_baptanggalValue = '';
					var det_sipd_sipValue = '';
					var det_sipd_nropValue = '';
					var det_sipd_strValue = '';
					var det_sipd_kompetensiValue = '';
					
					var sipd_namaValue = '';
					var sipd_alamatValue = '';
					var sipd_telpValue = '';
					var sipd_urutanValue = '';
					var sipd_jenisdokterValue = '';
										
					det_sipd_idValue = det_sipd_idField.getValue();
					det_sipd_sipd_idValue = det_sipd_sipd_idField.getValue();
					det_sipd_jenisValue = det_sipd_jenisField.getValue();
					det_sipd_lamaValue = det_sipd_sklamaField.getValue();
					det_sipd_tanggalValue = det_sipd_tanggalField.getValue();
					det_sipd_pemohon_idValue = det_sipd_pemohon_idField.getValue();
					det_sipd_nomorregValue = det_sipd_nomorregField.getValue();
					det_sipd_prosesValue = det_sipd_prosesField.getValue();
					det_sipd_skValue = det_sipd_skField.getValue();
					det_sipd_skurutValue = det_sipd_skurutField.getValue();
					det_sipd_berlakuValue = det_sipd_berlakuField.getValue();
					det_sipd_kadaluarsaValue = det_sipd_kadaluarsaField.getValue();
					det_sipd_terimaValue = det_sipd_terimaField.getValue();
					det_sipd_terimatanggalValue = det_sipd_terimatanggalField.getValue();
					det_sipd_kelengkapanValue = det_sipd_kelengkapanField.getValue();
					det_sipd_bapValue = det_sipd_bapField.getValue();
					det_sipd_keputusanValue = det_sipd_keputusanField.getValue();
					det_sipd_baptanggalValue = det_sipd_baptanggalField.getValue();
					det_sipd_sipValue = det_sipd_sipField.getValue();
					det_sipd_nropValue = det_sipd_nropField.getValue();
					det_sipd_strValue = det_sipd_strField.getValue();
					det_sipd_kompetensiValue = det_sipd_kompetensiField.getValue();
					
					sipd_namaValue = sipd_namaField.getValue();
					sipd_alamatValue = sipd_alamatField.getValue();
					sipd_telpValue = sipd_telpField.getValue();
					sipd_urutanValue = sipd_urutanField.getValue();
					sipd_jenisdokterValue = sipd_jenisdokterField.getValue();
					
					var array_sipd_cek_id=new Array();
					var array_sipd_cek_syarat_id=new Array();
					var array_sipd_cek_status=new Array();
					var array_sipd_cek_keterangan=new Array();
					
					if(sipd_det_syaratDataStore.getCount() > 0){
						for(var i=0;i<sipd_det_syaratDataStore.getCount();i++){
							array_sipd_cek_id.push(sipd_det_syaratDataStore.getAt(i).data.sipd_cek_id);
							array_sipd_cek_syarat_id.push(sipd_det_syaratDataStore.getAt(i).data.sipd_cek_syarat_id);
							array_sipd_cek_status.push(sipd_det_syaratDataStore.getAt(i).data.sipd_cek_status);
							array_sipd_cek_keterangan.push(sipd_det_syaratDataStore.getAt(i).data.sipd_cek_keterangan);
						}
					}
					
					var encoded_sipd_cek_id = Ext.encode(array_sipd_cek_id);
					var encoded_sipd_cek_syarat_id = Ext.encode(array_sipd_cek_syarat_id);
					var encoded_sipd_cek_status = Ext.encode(array_sipd_cek_status);
					var encoded_sipd_cek_keterangan = Ext.encode(array_sipd_cek_keterangan);
					
					var pemohon_idValue = sipd_det_pemohon_idField.getValue();
					var pemohon_namaValue = sipd_det_pemohon_namaField.getValue();
					var pemohon_alamatValue = sipd_det_pemohon_alamatField.getValue();
					var pemohon_telpValue = sipd_det_pemohon_telpField.getValue();
					var pemohon_npwpValue = sipd_det_pemohon_npwpField.getValue();
					var pemohon_rtValue = sipd_det_pemohon_rtField.getValue();
					var pemohon_rwValue = sipd_det_pemohon_rwField.getValue();
					var pemohon_kelValue = sipd_det_pemohon_kelField.getValue();
					var pemohon_kecValue = sipd_det_pemohon_kecField.getValue();
					var pemohon_nikValue = sipd_det_pemohon_nikField.getValue();
					var pemohon_straValue = sipd_det_pemohon_straField.getValue();
					var pemohon_surattugasValue = sipd_det_pemohon_surattugasField.getValue();
					var pemohon_pekerjaanValue = sipd_det_pemohon_pekerjaanField.getValue();
					var pemohon_tempatlahirValue = sipd_det_pemohon_tempatlahirField.getValue();
					var pemohon_tanggallahirValue = sipd_det_pemohon_tanggallahirField.getValue();
					var pemohon_user_idValue = sipd_det_pemohon_user_idField.getValue();
					var pemohon_pendidikanValue = sipd_det_pemohon_pendidikanField.getValue();
					var pemohon_tahunlulusValue = sipd_det_pemohon_tahunlulusField.getValue();
					
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_t_sipd_det/switchAction',
						params: {							
							det_sipd_id : det_sipd_idValue,
							det_sipd_sipd_id : det_sipd_sipd_idValue,
							det_sipd_jenis : det_sipd_jenisValue,
							det_sipd_lama : det_sipd_lamaValue,
							det_sipd_tanggal : det_sipd_tanggalValue,
							det_sipd_pemohon_id : det_sipd_pemohon_idValue,
							det_sipd_nomorreg : det_sipd_nomorregValue,
							det_sipd_proses : det_sipd_prosesValue,
							det_sipd_sk : det_sipd_skValue,
							det_sipd_skurut : det_sipd_skurutValue,
							det_sipd_berlaku : det_sipd_berlakuValue,
							det_sipd_kadaluarsa : det_sipd_kadaluarsaValue,
							det_sipd_terima : det_sipd_terimaValue,
							det_sipd_terimatanggal : det_sipd_terimatanggalValue,
							det_sipd_kelengkapan : det_sipd_kelengkapanValue,
							det_sipd_bap : det_sipd_bapValue,
							det_sipd_keputusan : det_sipd_keputusanValue,
							det_sipd_baptanggal : det_sipd_baptanggalValue,
							det_sipd_sip : det_sipd_sipValue,
							det_sipd_nrop : det_sipd_nropValue,
							det_sipd_str : det_sipd_strValue,
							det_sipd_kompetensi : det_sipd_kompetensiValue,
							sipd_nama : sipd_namaValue,
							sipd_alamat : sipd_alamatValue,
							sipd_telp : sipd_telpValue,
							sipd_urutan : sipd_urutanValue,
							sipd_jenisdokter : sipd_jenisdokterValue,
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
							action : sipd_det_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									sipd_det_dataStore.reload();
									sipd_det_resetForm();
									sipd_det_switchToGrid();
									sipd_det_gridPanel.getSelectionModel().deselectAll();
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
		
		function sipd_det_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(sipd_det_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = sipd_det_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< sipd_det_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.det_sipd_id);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_t_sipd_det/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									sipd_det_dataStore.reload();
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
		
		function sipd_det_refresh(){
			sipd_det_dbListAction = "GETLIST";
			sipd_det_gridSearchField.reset();
			sipd_det_searchPanel.getForm().reset();
			sipd_det_dataStore.proxy.extraParams = { action : 'GETLIST' };
			sipd_det_dataStore.proxy.extraParams.query = "";
			sipd_det_dataStore.currentPage = 1;
			sipd_det_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function sipd_det_confirmFormValid(){
			return sipd_det_formPanel.getForm().isValid();
		}
		
		function sipd_det_resetForm(){
			sipd_det_dbTask = 'CREATE';
			sipd_det_dbTaskMessage = 'create';
			sipd_det_formPanel.getForm().reset();
			det_sipd_idField.setValue(0);
		}
		
		function sipd_det_setForm(){
			sipd_det_dbTask = 'UPDATE';
            sipd_det_dbTaskMessage = 'update';
			
			var record = sipd_det_gridPanel.getSelectionModel().getSelection()[0];
			det_sipd_idField.setValue(record.data.det_sipd_id);
			det_sipd_sipd_idField.setValue(record.data.det_sipd_sipd_id);
			det_sipd_jenisField.setValue(record.data.det_sipd_jenis);
			det_sipd_tanggalField.setValue(record.data.det_sipd_tanggal);
			det_sipd_pemohon_idField.setValue(record.data.det_sipd_pemohon_id);
			det_sipd_nomorregField.setValue(record.data.det_sipd_nomorreg);
			det_sipd_prosesField.setValue(record.data.det_sipd_proses);
			det_sipd_skField.setValue(record.data.det_sipd_sk);
			det_sipd_skurutField.setValue(record.data.det_sipd_skurut);
			det_sipd_berlakuField.setValue(record.data.det_sipd_berlaku);
			det_sipd_kadaluarsaField.setValue(record.data.det_sipd_kadaluarsa);
			det_sipd_terimaField.setValue(record.data.det_sipd_terima);
			det_sipd_terimatanggalField.setValue(record.data.det_sipd_terimatanggal);
			det_sipd_kelengkapanField.setValue(record.data.det_sipd_kelengkapan);
			det_sipd_bapField.setValue(record.data.det_sipd_bap);
			det_sipd_keputusanField.setValue(record.data.det_sipd_keputusan);
			det_sipd_baptanggalField.setValue(record.data.det_sipd_baptanggal);
			det_sipd_sipField.setValue(record.data.det_sipd_sip);
			det_sipd_nropField.setValue(record.data.det_sipd_nrop);
			det_sipd_strField.setValue(record.data.det_sipd_str);
			det_sipd_kompetensiField.setValue(record.data.det_sipd_kompetensi);
			
			sipd_namaField.setValue(record.data.sipd_nama);
			sipd_alamatField.setValue(record.data.sipd_alamat);
			sipd_telpField.setValue(record.data.sipd_telp);
			sipd_urutanField.setValue(record.data.sipd_urutan);
			sipd_jenisdokterField.setValue(record.data.sipd_jenisdokter);
			
			sipd_det_syaratDataStore.proxy.extraParams = { 
				sipd_id : record.data.det_sipd_sipd_id,
				sipd_det_id : record.data.det_sipd_id,
				currentAction : 'update',
				action : 'GETSYARAT'
			};
			sipd_det_syaratDataStore.load();
		}
		
		function sipd_det_showSearchWindow(){
			sipd_det_searchWindow.show();
		}
		
		function sipd_det_search(){
			sipd_det_gridSearchField.reset();
			
			var det_sipd_sipd_idValue = '';
			var det_sipd_jenisValue = '';
			var det_sipd_tanggalValue = '';
			var det_sipd_pemohon_idValue = '';
			var det_sipd_nomorregValue = '';
			var det_sipd_prosesValue = '';
			var det_sipd_skValue = '';
			var det_sipd_skurutValue = '';
			var det_sipd_berlakuValue = '';
			var det_sipd_kadaluarsaValue = '';
			var det_sipd_terimaValue = '';
			var det_sipd_terimatanggalValue = '';
			var det_sipd_kelengkapanValue = '';
			var det_sipd_bapValue = '';
			var det_sipd_keputusanValue = '';
			var det_sipd_baptanggalValue = '';
			var det_sipd_sipValue = '';
			var det_sipd_nropValue = '';
			var det_sipd_strValue = '';
			var det_sipd_kompetensiValue = '';
						
			det_sipd_sipd_idValue = det_sipd_sipd_idSearchField.getValue();
			det_sipd_jenisValue = det_sipd_jenisSearchField.getValue();
			det_sipd_tanggalValue = det_sipd_tanggalSearchField.getValue();
			det_sipd_pemohon_idValue = det_sipd_pemohon_idSearchField.getValue();
			det_sipd_nomorregValue = det_sipd_nomorregSearchField.getValue();
			det_sipd_prosesValue = det_sipd_prosesSearchField.getValue();
			det_sipd_skValue = det_sipd_skSearchField.getValue();
			det_sipd_skurutValue = det_sipd_skurutSearchField.getValue();
			det_sipd_berlakuValue = det_sipd_berlakuSearchField.getValue();
			det_sipd_kadaluarsaValue = det_sipd_kadaluarsaSearchField.getValue();
			det_sipd_terimaValue = det_sipd_terimaSearchField.getValue();
			det_sipd_terimatanggalValue = det_sipd_terimatanggalSearchField.getValue();
			det_sipd_kelengkapanValue = det_sipd_kelengkapanSearchField.getValue();
			det_sipd_bapValue = det_sipd_bapSearchField.getValue();
			det_sipd_keputusanValue = det_sipd_keputusanSearchField.getValue();
			det_sipd_baptanggalValue = det_sipd_baptanggalSearchField.getValue();
			det_sipd_sipValue = det_sipd_sipSearchField.getValue();
			det_sipd_nropValue = det_sipd_nropSearchField.getValue();
			det_sipd_strValue = det_sipd_strSearchField.getValue();
			det_sipd_kompetensiValue = det_sipd_kompetensiSearchField.getValue();
			sipd_det_dbListAction = "SEARCH";
			sipd_det_dataStore.proxy.extraParams = { 
				det_sipd_sipd_id : det_sipd_sipd_idValue,
				det_sipd_jenis : det_sipd_jenisValue,
				det_sipd_tanggal : det_sipd_tanggalValue,
				det_sipd_pemohon_id : det_sipd_pemohon_idValue,
				det_sipd_nomorreg : det_sipd_nomorregValue,
				det_sipd_proses : det_sipd_prosesValue,
				det_sipd_sk : det_sipd_skValue,
				det_sipd_skurut : det_sipd_skurutValue,
				det_sipd_berlaku : det_sipd_berlakuValue,
				det_sipd_kadaluarsa : det_sipd_kadaluarsaValue,
				det_sipd_terima : det_sipd_terimaValue,
				det_sipd_terimatanggal : det_sipd_terimatanggalValue,
				det_sipd_kelengkapan : det_sipd_kelengkapanValue,
				det_sipd_bap : det_sipd_bapValue,
				det_sipd_keputusan : det_sipd_keputusanValue,
				det_sipd_baptanggal : det_sipd_baptanggalValue,
				det_sipd_sip : det_sipd_sipValue,
				det_sipd_nrop : det_sipd_nropValue,
				det_sipd_str : det_sipd_strValue,
				det_sipd_kompetensi : det_sipd_kompetensiValue,
				action : 'SEARCH'
			};
			sipd_det_dataStore.currentPage = 1;
			sipd_det_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function sipd_det_printExcel(outputType){
			var searchText = "";
			var det_sipd_sipd_idValue = '';
			var det_sipd_jenisValue = '';
			var det_sipd_tanggalValue = '';
			var det_sipd_pemohon_idValue = '';
			var det_sipd_nomorregValue = '';
			var det_sipd_prosesValue = '';
			var det_sipd_skValue = '';
			var det_sipd_skurutValue = '';
			var det_sipd_berlakuValue = '';
			var det_sipd_kadaluarsaValue = '';
			var det_sipd_terimaValue = '';
			var det_sipd_terimatanggalValue = '';
			var det_sipd_kelengkapanValue = '';
			var det_sipd_bapValue = '';
			var det_sipd_keputusanValue = '';
			var det_sipd_baptanggalValue = '';
			var det_sipd_sipValue = '';
			var det_sipd_nropValue = '';
			var det_sipd_strValue = '';
			var det_sipd_kompetensiValue = '';
			
			if(sipd_det_dataStore.proxy.extraParams.query!==null){searchText = sipd_det_dataStore.proxy.extraParams.query;}
			if(sipd_det_dataStore.proxy.extraParams.det_sipd_sipd_id!==null){det_sipd_sipd_idValue = sipd_det_dataStore.proxy.extraParams.det_sipd_sipd_id;}
			if(sipd_det_dataStore.proxy.extraParams.det_sipd_jenis!==null){det_sipd_jenisValue = sipd_det_dataStore.proxy.extraParams.det_sipd_jenis;}
			if(sipd_det_dataStore.proxy.extraParams.det_sipd_tanggal!==null){det_sipd_tanggalValue = sipd_det_dataStore.proxy.extraParams.det_sipd_tanggal;}
			if(sipd_det_dataStore.proxy.extraParams.det_sipd_pemohon_id!==null){det_sipd_pemohon_idValue = sipd_det_dataStore.proxy.extraParams.det_sipd_pemohon_id;}
			if(sipd_det_dataStore.proxy.extraParams.det_sipd_nomorreg!==null){det_sipd_nomorregValue = sipd_det_dataStore.proxy.extraParams.det_sipd_nomorreg;}
			if(sipd_det_dataStore.proxy.extraParams.det_sipd_proses!==null){det_sipd_prosesValue = sipd_det_dataStore.proxy.extraParams.det_sipd_proses;}
			if(sipd_det_dataStore.proxy.extraParams.det_sipd_sk!==null){det_sipd_skValue = sipd_det_dataStore.proxy.extraParams.det_sipd_sk;}
			if(sipd_det_dataStore.proxy.extraParams.det_sipd_skurut!==null){det_sipd_skurutValue = sipd_det_dataStore.proxy.extraParams.det_sipd_skurut;}
			if(sipd_det_dataStore.proxy.extraParams.det_sipd_berlaku!==null){det_sipd_berlakuValue = sipd_det_dataStore.proxy.extraParams.det_sipd_berlaku;}
			if(sipd_det_dataStore.proxy.extraParams.det_sipd_kadaluarsa!==null){det_sipd_kadaluarsaValue = sipd_det_dataStore.proxy.extraParams.det_sipd_kadaluarsa;}
			if(sipd_det_dataStore.proxy.extraParams.det_sipd_terima!==null){det_sipd_terimaValue = sipd_det_dataStore.proxy.extraParams.det_sipd_terima;}
			if(sipd_det_dataStore.proxy.extraParams.det_sipd_terimatanggal!==null){det_sipd_terimatanggalValue = sipd_det_dataStore.proxy.extraParams.det_sipd_terimatanggal;}
			if(sipd_det_dataStore.proxy.extraParams.det_sipd_kelengkapan!==null){det_sipd_kelengkapanValue = sipd_det_dataStore.proxy.extraParams.det_sipd_kelengkapan;}
			if(sipd_det_dataStore.proxy.extraParams.det_sipd_bap!==null){det_sipd_bapValue = sipd_det_dataStore.proxy.extraParams.det_sipd_bap;}
			if(sipd_det_dataStore.proxy.extraParams.det_sipd_keputusan!==null){det_sipd_keputusanValue = sipd_det_dataStore.proxy.extraParams.det_sipd_keputusan;}
			if(sipd_det_dataStore.proxy.extraParams.det_sipd_baptanggal!==null){det_sipd_baptanggalValue = sipd_det_dataStore.proxy.extraParams.det_sipd_baptanggal;}
			if(sipd_det_dataStore.proxy.extraParams.det_sipd_sip!==null){det_sipd_sipValue = sipd_det_dataStore.proxy.extraParams.det_sipd_sip;}
			if(sipd_det_dataStore.proxy.extraParams.det_sipd_nrop!==null){det_sipd_nropValue = sipd_det_dataStore.proxy.extraParams.det_sipd_nrop;}
			if(sipd_det_dataStore.proxy.extraParams.det_sipd_str!==null){det_sipd_strValue = sipd_det_dataStore.proxy.extraParams.det_sipd_str;}
			if(sipd_det_dataStore.proxy.extraParams.det_sipd_kompetensi!==null){det_sipd_kompetensiValue = sipd_det_dataStore.proxy.extraParams.det_sipd_kompetensi;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_t_sipd_det/switchAction',
				params : {
					action : outputType,
					query : searchText,
					det_sipd_sipd_id : det_sipd_sipd_idValue,
					det_sipd_jenis : det_sipd_jenisValue,
					det_sipd_tanggal : det_sipd_tanggalValue,
					det_sipd_pemohon_id : det_sipd_pemohon_idValue,
					det_sipd_nomorreg : det_sipd_nomorregValue,
					det_sipd_proses : det_sipd_prosesValue,
					det_sipd_sk : det_sipd_skValue,
					det_sipd_skurut : det_sipd_skurutValue,
					det_sipd_berlaku : det_sipd_berlakuValue,
					det_sipd_kadaluarsa : det_sipd_kadaluarsaValue,
					det_sipd_terima : det_sipd_terimaValue,
					det_sipd_terimatanggal : det_sipd_terimatanggalValue,
					det_sipd_kelengkapan : det_sipd_kelengkapanValue,
					det_sipd_bap : det_sipd_bapValue,
					det_sipd_keputusan : det_sipd_keputusanValue,
					det_sipd_baptanggal : det_sipd_baptanggalValue,
					det_sipd_sip : det_sipd_sipValue,
					det_sipd_nrop : det_sipd_nropValue,
					det_sipd_str : det_sipd_strValue,
					det_sipd_kompetensi : det_sipd_kompetensiValue,
					currentAction : sipd_det_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/t_sipd_det_list.xls');
							}else{
								window.open('./print/t_sipd_det_list.html','sipd_detlist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		sipd_det_dataStore = Ext.create('Ext.data.Store',{
			id : 'sipd_det_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_sipd_det/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'det_sipd_id'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'det_sipd_id', type : 'int', mapping : 'det_sipd_id' },
				{ name : 'det_sipd_sipd_id', type : 'int', mapping : 'det_sipd_sipd_id' },
				{ name : 'det_sipd_jenis', type : 'int', mapping : 'det_sipd_jenis' },
				{ name : 'det_sipd_tanggal', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_sipd_tanggal' },
				{ name : 'det_sipd_pemohon_id', type : 'int', mapping : 'det_sipd_pemohon_id' },
				{ name : 'det_sipd_nomorreg', type : 'string', mapping : 'det_sipd_nomorreg' },
				{ name : 'det_sipd_proses', type : 'string', mapping : 'det_sipd_proses' },
				{ name : 'det_sipd_sk', type : 'string', mapping : 'det_sipd_sk' },
				{ name : 'det_sipd_skurut', type : 'int', mapping : 'det_sipd_skurut' },
				{ name : 'det_sipd_berlaku', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_sipd_berlaku' },
				{ name : 'det_sipd_kadaluarsa', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_sipd_kadaluarsa' },
				{ name : 'det_sipd_terima', type : 'string', mapping : 'det_sipd_terima' },
				{ name : 'det_sipd_terimatanggal', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_sipd_terimatanggal' },
				{ name : 'det_sipd_kelengkapan', type : 'int', mapping : 'det_sipd_kelengkapan' },
				{ name : 'det_sipd_bap', type : 'string', mapping : 'det_sipd_bap' },
				{ name : 'det_sipd_keputusan', type : 'int', mapping : 'det_sipd_keputusan' },
				{ name : 'det_sipd_baptanggal', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_sipd_baptanggal' },
				{ name : 'det_sipd_sip', type : 'string', mapping : 'det_sipd_sip' },
				{ name : 'det_sipd_nrop', type : 'string', mapping : 'det_sipd_nrop' },
				{ name : 'det_sipd_str', type : 'string', mapping : 'det_sipd_str' },
				{ name : 'det_sipd_kompetensi', type : 'string', mapping : 'det_sipd_kompetensi' },
				{ name : 'sipd_nama', type : 'string', mapping : 'sipd_nama' },
				{ name : 'sipd_alamat', type : 'string', mapping : 'sipd_alamat' },
				{ name : 'sipd_telp', type : 'string', mapping : 'sipd_telp' },
				{ name : 'sipd_urutan', type : 'int', mapping : 'sipd_urutan' },
				{ name : 'sipd_jenisdokter', type : 'string', mapping : 'sipd_jenisdokter' },
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
		sipd_det_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						sipd_det_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						sipd_det_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						sipd_det_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						sipd_det_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						sipd_det_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						sipd_det_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						sipd_det_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						sipd_det_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var sipd_det_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : sipd_det_confirmAdd
		});
		var sipd_det_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : sipd_det_confirmUpdate
		});
		var sipd_det_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : sipd_det_confirmDelete
		});
		var sipd_det_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : sipd_det_refresh
		});
		var sipd_det_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : sipd_det_showSearchWindow
		});
		var sipd_det_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				sipd_det_printExcel('PRINT');
			}
		});
		var sipd_det_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				sipd_det_printExcel('EXCEL');
			}
		});
		
		var sipd_det_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : sipd_det_confirmUpdate
		});
		var sipd_det_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : sipd_det_confirmDelete
		});
		var sipd_det_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : sipd_det_refresh
		});
		sipd_det_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'sipd_det_contextMenu',
			items: [
				sipd_det_contextMenuEdit,sipd_det_contextMenuDelete,'-',sipd_det_contextMenuRefresh
			]
		});
		var sipd_det_bp_printCM = Ext.create('Ext.menu.Item',{
			text : 'Bukti Penerimaan',
			tooltip : 'Cetak Bukti Penerimaan',
			handler : function(){
				var record = sipd_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_sipd_det/switchAction',
					params: {
						sipddet_id : record.get('det_sipd_id'),
						action : 'CETAKBP'
					},success : function(){
						window.open('../print/sipd_buktipenerimaan.html');
					}
				});
			}
		});
		var sipd_det_sk_printCM = Ext.create('Ext.menu.Item',{
			text : 'Surat Keputusan',
			tooltip : 'Cetak Surat Keputusan',
			handler : function(){
				var record = sipd_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_sipd_det/switchAction',
					params: {
						sipddet_id : record.get('det_sipd_id'),
						action : 'CETAKSK'
					},success : function(response){
						var result = response.responseText;
						switch(result){
							case 'success':
								window.open('../print/sipd_sk.html');
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
		var sipd_det_bap_printCM = Ext.create('Ext.menu.Item',{
			text : 'Berita Acara Pemeriksaan',
			tooltip : 'Cetak Berita Acara Pemeriksaan',
			handler : function(){
				var record = sipd_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_sipd_det/switchAction',
					params: {
						sipddet_id : record.get('det_sipd_id'),
						action : 'CETAKLEMBARKONTROL'
					},success : function(){
						window.open('../print/sipd_lembarkontrol.html');
					}
				});
			}
		});
		var sipd_det_lk_printCM = Ext.create('Ext.menu.Item',{
			text : 'Lembar Kontrol',
			tooltip : 'Cetak Lembar Kontrol',
			handler : function(){
				var record = sipd_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_sipd_det/switchAction',
					params: {
						sipddet_id : record.get('det_sipd_id'),
						action : 'CETAKLEMBARKONTROL'
					},success : function(){
						window.open('../print/sipd_lembarkontrol.html');
					}
				});
			}
		});
		var sipd_det_printContextMenu = Ext.create('Ext.menu.Menu',{
			items: [
				sipd_det_bp_printCM,sipd_det_lk_printCM,sipd_det_bap_printCM,sipd_det_sk_printCM
			]
		});
		function sipd_det_ubahProses(proses){
			var record = sipd_det_gridPanel.getSelectionModel().getSelection()[0];
			Ext.Ajax.request({
				waitMsg: 'Please wait...',
				url: 'c_t_sipd_det/switchAction',
				params: {
					sipddet_id : record.get('det_sipd_id'),
					sipddet_nosk : record.get('det_sipd_sk'),
					proses : proses,
					action : 'UBAHPROSES'
				},success : function(){
					sipd_det_dataStore.reload();
				}
			});
		}
		
		var sipd_det_prosesContextMenu = Ext.create('Ext.menu.Menu',{
			items: [
				{
					text : 'Selesai, belum diambil',
					tooltip : 'Ubah Menjadi Selesai, belum diambil',
					handler : function(){
						sipd_det_ubahProses('Selesai, belum diambil');
					}
				},
				{
					text : 'Selesai, sudah diambil',
					tooltip : 'Ubah Menjadi Selesai, sudah diambil',
					handler : function(){
						sipd_det_ubahProses('Selesai, sudah diambil');
					}
				},
				{
					text : 'Ditolak',
					tooltip : 'Ubah Menjadi Ditolak',
					handler : function(){
						sipd_det_ubahProses('Ditolak');
					}
				}
			]
		});
		
		sipd_det_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : sipd_det_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						sipd_det_dataStore.proxy.extraParams = { action : 'GETLIST'};
						sipd_det_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		sipd_det_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'sipd_det_gridPanel',
			constrain : true,
			store : sipd_det_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'sipd_detGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						sipd_det_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : sipd_det_shorcut,
			columns : [
				{
					text : 'Id SIPD',
					dataIndex : 'det_sipd_sipd_id',
					width : 100,
					sortable : false,
					hidden : true,
					hideable : false
				},
				{
					text : 'Jenis',
					dataIndex : 'det_sipd_jenis',
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
					dataIndex : 'det_sipd_tanggal',
					width : 100,
					sortable : false,
					renderer : Ext.util.Format.dateRenderer('d-m-Y')
				},
				{
					text : 'Pemohon',
					dataIndex : 'pemohon_nama',
					width : 100,
					sortable : false
				},
				{
					text : 'Alamat',
					dataIndex : 'pemohon_alamat',
					width : 100,
					sortable : false
				},
				{
					text : 'Telp',
					dataIndex : 'pemohon_telp',
					width : 100,
					sortable : false
				},
				{
					text : 'Status',
					dataIndex : 'det_sipd_proses',
					width : 100,
					sortable : false
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
							sipd_det_confirmUpdate();
						}
					},{
						iconCls: 'icon16x16-delete',
						tooltip: 'Hapus Data',
						handler: function(grid, rowIndex){
							grid.getSelectionModel().select(rowIndex);
							sipd_det_confirmDelete();
						}
					}]
				},
				{
					xtype:'actioncolumn',
					text : 'Proses',
					width:50,
					items: [{
						iconCls : 'checked',
						tooltip : 'Ubah Status',
						handler: function(grid, rowIndex, colIndex, node, e) {
							e.stopEvent();
							sipd_det_prosesContextMenu.showAt(e.getXY());
							return false;
						}
					}]
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
							sipd_det_printContextMenu.showAt(e.getXY());
							return false;
						}
					}]
				}
			],
			tbar : [
				sipd_det_addButton,
				sipd_det_gridSearchField,
				sipd_det_searchButton,
				sipd_det_refreshButton,
				sipd_det_printButton,
				sipd_det_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : sipd_det_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					sipd_det_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		det_sipd_idField = Ext.create('Ext.form.NumberField',{
			id : 'det_sipd_idField',
			name : 'det_sipd_id',
			fieldLabel : 'det_sipd_id<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		det_sipd_sipd_idField = Ext.create('Ext.form.NumberField',{
			id : 'det_sipd_sipd_idField',
			name : 'det_sipd_sipd_id',
			fieldLabel : 'det_sipd_sipd_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		det_sipd_jenisField = Ext.create('Ext.form.ComboBox',{
			id : 'det_sipd_jenisField',
			name : 'det_sipd_jenis',
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
						det_sipd_sklamaField.show();
					}else{
						det_sipd_sklamaField.hide();
					}
				}
			}
		});
		
		det_sipd_sklamaField = Ext.create('Ext.form.ComboBox',{
			name : 'det_sipd_sklamaField',
			fieldLabel : 'Nomor SK Lama',
			store : sipd_det_dataStore,
			displayField : 'det_sipd_sk',
			valueField : 'det_sipd_sipd_id',
			queryMode : 'remote',
			triggerAction : 'query',
			repeatTriggerClick : true,
			minChars : 100,
			triggerCls : 'x-form-search-trigger',
			forceSelection : false,
			hidden : true,
			onTriggerClick: function(event){
				var store = det_sipd_sklamaField.getStore();
				var val = det_sipd_sklamaField.getRawValue();
				store.proxy.extraParams = {action : 'SEARCH',det_sipd_sk : val};
				store.load();
				det_sipd_sklamaField.expand();
				det_sipd_sklamaField.fireEvent("ontriggerclick", this, event);
			},  
			tpl: Ext.create('Ext.XTemplate',
				'<tpl for=".">',
					'<div class="x-boundlist-item">SK : {det_sipd_sk}<br>Nama Usaha : {sipd_usaha}<br>Alamat : {sipd_alamat}<br></div>',
				'</tpl>'
			),
			listeners : {
				select : function(cmb, record){
					var rec=record[0];
					console.log(rec);
					// sipd_det_pemohon_idField.setValue(rec.get('pemohon_id'));
				}
			}
		});
		det_sipd_tanggalField = Ext.create('Ext.form.field.Date',{
			id : 'det_sipd_tanggalField',
			name : 'det_sipd_tanggal',
			fieldLabel : 'Tanggal <font color=red>*</font>',
			format : 'd-m-Y',
			disabled : true,
			value : new Date('<?php echo date('Y-m-d').'T'.date('H:i:s'); ?>')
		});
		det_sipd_pemohon_idField = Ext.create('Ext.form.NumberField',{
			id : 'det_sipd_pemohon_idField',
			name : 'det_sipd_pemohon_id',
			fieldLabel : 'det_sipd_pemohon_id',
			allowNegatife : false,
			blankText : '0',
			hidden : true,
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		det_sipd_nomorregField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_nomorregField',
			name : 'det_sipd_nomorreg',
			fieldLabel : 'det_sipd_nomorreg',
			maxLength : 50,
			hidden : true
		});
		det_sipd_prosesField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_prosesField',
			name : 'det_sipd_proses',
			fieldLabel : 'det_sipd_proses',
			maxLength : 50,
			hidden : true
		});
		det_sipd_skField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_skField',
			name : 'det_sipd_sk',
			fieldLabel : 'det_sipd_sk',
			maxLength : 50,
			hidden : true
		});
		det_sipd_skurutField = Ext.create('Ext.form.NumberField',{
			id : 'det_sipd_skurutField',
			name : 'det_sipd_skurut',
			fieldLabel : 'det_sipd_skurut',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/,
			hidden : true
		});
		det_sipd_berlakuField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_berlakuField',
			name : 'det_sipd_berlaku',
			fieldLabel : 'det_sipd_berlaku',
			maxLength : 0,
			hidden : true
		});
		det_sipd_kadaluarsaField = Ext.create('Ext.form.field.Date',{
			id : 'det_sipd_kadaluarsaField',
			name : 'det_sipd_kadaluarsa',
			fieldLabel : 'Kadaluarsa',
			format : 'd-m-Y'
		});
		det_sipd_terimaField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_terimaField',
			name : 'det_sipd_terima',
			fieldLabel : 'Penerima',
			maxLength : 50
		});
		det_sipd_terimatanggalField = Ext.create('Ext.form.field.Date',{
			id : 'det_sipd_terimatanggalField',
			name : 'det_sipd_terimatanggal',
			fieldLabel : 'Tanggal Terima',
			format : 'd-m-Y'
		});
		det_sipd_kelengkapanField = Ext.create('Ext.form.ComboBox',{
			id : 'det_sipd_kelengkapanField',
			name : 'det_sipd_kelengkapan',
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
		det_sipd_bapField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_bapField',
			name : 'det_sipd_bap',
			fieldLabel : 'Bap',
			maxLength : 50
		});
		det_sipd_keputusanField = Ext.create('Ext.form.ComboBox',{
			id : 'det_sipd_keputusanField',
			name : 'det_sipd_keputusan',
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
		det_sipd_baptanggalField = Ext.create('Ext.form.field.Date',{
			id : 'det_sipd_baptanggalField',
			name : 'det_sipd_baptanggal',
			fieldLabel : 'Tanggal BAP',
			format : 'd-m-Y'
		});
		det_sipd_sipField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_sipField',
			name : 'det_sipd_sip',
			fieldLabel : 'No. SIP',
			maxLength : 50
		});
		det_sipd_nropField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_nropField',
			name : 'det_sipd_nrop',
			fieldLabel : 'Nomor OP',
			maxLength : 50
		});
		det_sipd_strField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_strField',
			name : 'det_sipd_str',
			fieldLabel : 'Nomor STR',
			maxLength : 50
		});
		det_sipd_kompetensiField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_kompetensiField',
			name : 'det_sipd_kompetensi',
			fieldLabel : 'Kompetensi',
			maxLength : 50
		});
		
		sipd_namaField = Ext.create('Ext.form.TextField',{
			id : 'sipd_namaField',
			name : 'sipd_nama',
			fieldLabel : 'Nama',
			maxLength : 50
		});
		sipd_alamatField = Ext.create('Ext.form.TextField',{
			id : 'sipd_alamatField',
			name : 'sipd_alamat',
			fieldLabel : 'Alamat',
			maxLength : 100
		});
		sipd_telpField = Ext.create('Ext.form.TextField',{
			id : 'sipd_telpField',
			name : 'sipd_telp',
			fieldLabel : 'Telp',
			maxLength : 20
		});
		sipd_urutanField = Ext.create('Ext.form.NumberField',{
			id : 'sipd_urutanField',
			name : 'sipd_urutan',
			fieldLabel : 'Praktek ke-',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		sipd_jenisdokterField = Ext.create('Ext.form.TextField',{
			id : 'sipd_jenisdokterField',
			name : 'sipd_jenisdokter',
			fieldLabel : 'Jenis Dokter',
			maxLength : 50
		});
		
		/* START DATA PEMOHON */
		var sipd_det_pemohon_idField = Ext.create('Ext.form.Hidden',{
			name : 'pemohon_id'
		});
		var sipd_det_pemohon_namaField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_nama',
			fieldLabel : 'Nama',
			maxLength : 50
		});
		var sipd_det_pemohon_alamatField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_alamat',
			fieldLabel : 'Alamat',
			maxLength : 100
		});
		var sipd_det_pemohon_telpField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_telp',
			fieldLabel : 'Telp',
			maxLength : 20,
			maskRe : /([0-9]+)$/
		});
		var sipd_det_pemohon_npwpField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_npwp',
			fieldLabel : 'NPWP',
			maxLength : 50
		});
		var sipd_det_pemohon_rtField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_rt',
			fieldLabel : 'RT',
			maskRe : /([0-9]+)$/
		});
		var sipd_det_pemohon_rwField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_rw',
			fieldLabel : 'RW',
			maskRe : /([0-9]+)$/
		});
		var sipd_det_pemohon_kelField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_kel',
			fieldLabel : 'Kelurahan',
			maxLength : 50
		});
		var sipd_det_pemohon_kecField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_kec',
			fieldLabel : 'Kecamatan',
			maxLength : 50
		});
		var sipd_det_pemohon_nikField = Ext.create('Ext.form.ComboBox',{
			name : 'sipd_det_pemohon_nik',
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
				var store = sipd_det_pemohon_nikField.getStore();
				var val = sipd_det_pemohon_nikField.getRawValue();
				store.proxy.extraParams = {action : 'SEARCH',pemohon_nik : val};
				store.load();
				sipd_det_pemohon_nikField.expand();
				sipd_det_pemohon_nikField.fireEvent("ontriggerclick", this, event);
			},  
			tpl: Ext.create('Ext.XTemplate',
				'<tpl for=".">',
					'<div class="x-boundlist-item">NIK : {pemohon_nik}<br>Nama : {pemohon_nama}<br>Alamat : {pemohon_alamat}<br>Telp : {pemohon_telp}<br></div>',
				'</tpl>'
			),
			listeners : {
				select : function(cmb, record){
					var rec=record[0];
					sipd_det_pemohon_idField.setValue(rec.get('pemohon_id'));
					sipd_det_pemohon_nikField.setValue(rec.get('pemohon_nik'));
					sipd_det_pemohon_namaField.setValue(rec.get('pemohon_nama'));
					sipd_det_pemohon_alamatField.setValue(rec.get('pemohon_alamat'));
					sipd_det_pemohon_telpField.setValue(rec.get('pemohon_telp'));
					sipd_det_pemohon_npwpField.setValue(rec.get('pemohon_npwp'));
					sipd_det_pemohon_rtField.setValue(rec.get('pemohon_rt'));
					sipd_det_pemohon_rwField.setValue(rec.get('pemohon_rw'));
					sipd_det_pemohon_kelField.setValue(rec.get('pemohon_kel'));
					sipd_det_pemohon_kecField.setValue(rec.get('pemohon_kec'));
					sipd_det_pemohon_straField.setValue(rec.get('pemohon_stra'));
					sipd_det_pemohon_surattugasField.setValue(rec.get('pemohon_surattugas'));
					sipd_det_pemohon_pekerjaanField.setValue(rec.get('pemohon_pekerjaan'));
					sipd_det_pemohon_tempatlahirField.setValue(rec.get('pemohon_tempatlahir'));
					sipd_det_pemohon_tanggallahirField.setValue(rec.get('pemohon_tanggallahir'));
					sipd_det_pemohon_user_idField.setValue(rec.get('pemohon_user_id'));
					sipd_det_pemohon_pendidikanField.setValue(rec.get('pemohon_pendidikan'));
					sipd_det_pemohon_tahunlulusField.setValue(rec.get('pemohon_tahunlulus'));
				}
			}
		});
		var sipd_det_pemohon_straField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_stra',
			fieldLabel : 'STRA',
			hidden : true,
			maxLength : 50
		});
		var sipd_det_pemohon_surattugasField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_surattugas',
			fieldLabel : 'Surat Tugas',
			hidden : true,
			maxLength : 50
		});
		var sipd_det_pemohon_pekerjaanField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_pekerjaan',
			fieldLabel : 'Pekerjaan',
			maxLength : 50
		});
		var sipd_det_pemohon_tempatlahirField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_tempatlahir',
			fieldLabel : 'Tempat Lahir',
			maxLength : 50
		});
		var sipd_det_pemohon_tanggallahirField = Ext.create('Ext.form.field.Date',{
			name : 'pemohon_tanggallahir',
			fieldLabel : 'Tanggal Lahir',
			format : 'd-m-Y'
		});
		var sipd_det_pemohon_user_idField = Ext.create('Ext.form.Hidden',{
			name : 'pemohon_user_id',
		});
		var sipd_det_pemohon_pendidikanField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_pendidikan',
			fieldLabel : 'Pendidikan',
			maxLength : 50
		});
		var sipd_det_pemohon_tahunlulusField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_tahunlulus',
			fieldLabel : 'Tahun Lulus',
			maxLength : 4,
			maskRe : /([0-9]+)$/
		});
		sipd_det_syaratDataStore = Ext.create('Ext.data.Store',{
			id : 'sipd_det_syaratDataStore',
			pageSize : globalPageSize,
			autoLoad : true,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_sipd_det/switchAction',
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
				{ name : 'sipd_cek_id', type : 'int', mapping : 'sipd_cek_id' },
				{ name : 'sipd_cek_syarat_id', type : 'int', mapping : 'sipd_cek_syarat_id' },
				{ name : 'sipd_cek_sipddet_id', type : 'int', mapping : 'sipd_cek_sipddet_id' },
				{ name : 'sipd_cek_sipd_id', type : 'int', mapping : 'sipd_cek_sipd_id' },
				{ name : 'sipd_cek_status', type : 'boolean', mapping : 'sipd_cek_status' },
				{ name : 'sipd_cek_keterangan', type : 'string', mapping : 'sipd_cek_keterangan' },
				{ name : 'sipd_cek_syarat_nama', type : 'string', mapping : 'sipd_cek_syarat_nama' }
				]
		});
		var det_sipd_syaratGridEditor = new Ext.grid.plugin.CellEditing({
			clicksToEdit: 1
		});
		det_sipd_syaratGrid = Ext.create('Ext.grid.Panel',{
			id : 'det_sipd_syaratGrid',
			store : sipd_det_syaratDataStore,
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
					dataIndex : 'sipd_cek_id',
					width : 100,
					hidden : true,
					hideable: false,
					sortable : false
				},
				{
					text : 'Syarat',
					dataIndex : 'sipd_cek_syarat_nama',
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
					dataIndex: 'sipd_cek_status',
					width: 55,
					stopSelection: false
				},
				{
					text : 'Keterangan',
					dataIndex : 'sipd_cek_keterangan',
					width : 100,
					sortable : false,
					editor: 'textfield',
					flex : 1
				}
			]
		});
		var sipd_det_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : sipd_det_save
		});
		var sipd_det_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				sipd_det_resetForm();
				sipd_det_switchToGrid();
			}
		});
		sipd_det_formPanel = Ext.create('Ext.form.Panel', {
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
								det_sipd_idField,
								det_sipd_sipd_idField,
								det_sipd_jenisField,
								det_sipd_sklamaField,
								det_sipd_tanggalField
							]
						},{
							xtype : 'fieldset',
							title : '2. Data Pemohon',
							checkboxToggle : false,
							collapsible : false,
							layout :'form',
							items : [
								sipd_det_pemohon_idField,
								sipd_det_pemohon_nikField,
								sipd_det_pemohon_namaField,
								sipd_det_pemohon_alamatField,
								sipd_det_pemohon_telpField,
								sipd_det_pemohon_npwpField,
								sipd_det_pemohon_rtField,
								sipd_det_pemohon_rwField,
								sipd_det_pemohon_kelField,
								sipd_det_pemohon_kecField,
								sipd_det_pemohon_straField,
								sipd_det_pemohon_surattugasField,
								sipd_det_pemohon_pekerjaanField,
								sipd_det_pemohon_tempatlahirField,
								sipd_det_pemohon_tanggallahirField,
								sipd_det_pemohon_user_idField,
								sipd_det_pemohon_pendidikanField,
								sipd_det_pemohon_tahunlulusField
							]
						},{
							xtype : 'fieldset',
							title : '3. Data Praktek',
							columnWidth : 0.5,
							checkboxToggle : false,
							collapsible : false,
							layout :'form',
							items : [
								sipd_namaField,
								sipd_alamatField,
								sipd_telpField,
								sipd_urutanField,
								sipd_jenisdokterField,
								det_sipd_kompetensiField,
								det_sipd_strField,
								det_sipd_nropField,
								det_sipd_sipField,
							]
						},{
							xtype : 'fieldset',
							title : '4. Data Syarat',
							columnWidth : 0.5,
							checkboxToggle : false,
							collapsible : false,
							layout :'form',
							items : [
								det_sipd_syaratGrid
							]
						},{
							xtype : 'fieldset',
							title : '4. Data Pendukung',
							columnWidth : 0.5,
							checkboxToggle : false,
							collapsible : false,
							layout :'form',
							items : [
								det_sipd_nomorregField,
								det_sipd_prosesField,
								det_sipd_skField,
								det_sipd_skurutField,
								det_sipd_berlakuField,
								det_sipd_terimaField,
								det_sipd_terimatanggalField,
								det_sipd_kelengkapanField,
								det_sipd_bapField,
								det_sipd_keputusanField,
								det_sipd_baptanggalField,
								det_sipd_kadaluarsaField
							]
						}
					]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [sipd_det_saveButton,sipd_det_cancelButton]
		});
		sipd_det_formWindow = Ext.create('Ext.window.Window',{
			id : 'sipd_det_formWindow',
			renderTo : 'sipd_detSaveWindow',
			title : globalFormAddEditTitle + ' ' + sipd_det_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [sipd_det_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		det_sipd_sipd_idSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_sipd_sipd_idSearchField',
			name : 'det_sipd_sipd_id',
			fieldLabel : 'det_sipd_sipd_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_sipd_jenisSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_sipd_jenisSearchField',
			name : 'det_sipd_jenis',
			fieldLabel : 'det_sipd_jenis',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_sipd_tanggalSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_tanggalSearchField',
			name : 'det_sipd_tanggal',
			fieldLabel : 'det_sipd_tanggal',
			maxLength : 0
		
		});
		det_sipd_pemohon_idSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_sipd_pemohon_idSearchField',
			name : 'det_sipd_pemohon_id',
			fieldLabel : 'det_sipd_pemohon_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_sipd_nomorregSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_nomorregSearchField',
			name : 'det_sipd_nomorreg',
			fieldLabel : 'det_sipd_nomorreg',
			maxLength : 50
		
		});
		det_sipd_prosesSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_prosesSearchField',
			name : 'det_sipd_proses',
			fieldLabel : 'det_sipd_proses',
			maxLength : 50
		
		});
		det_sipd_skSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_skSearchField',
			name : 'det_sipd_sk',
			fieldLabel : 'det_sipd_sk',
			maxLength : 50
		
		});
		det_sipd_skurutSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_sipd_skurutSearchField',
			name : 'det_sipd_skurut',
			fieldLabel : 'det_sipd_skurut',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_sipd_berlakuSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_berlakuSearchField',
			name : 'det_sipd_berlaku',
			fieldLabel : 'det_sipd_berlaku',
			maxLength : 0
		
		});
		det_sipd_kadaluarsaSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_kadaluarsaSearchField',
			name : 'det_sipd_kadaluarsa',
			fieldLabel : 'det_sipd_kadaluarsa',
			maxLength : 0
		
		});
		det_sipd_terimaSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_terimaSearchField',
			name : 'det_sipd_terima',
			fieldLabel : 'det_sipd_terima',
			maxLength : 50
		
		});
		det_sipd_terimatanggalSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_terimatanggalSearchField',
			name : 'det_sipd_terimatanggal',
			fieldLabel : 'det_sipd_terimatanggal',
			maxLength : 0
		
		});
		det_sipd_kelengkapanSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_sipd_kelengkapanSearchField',
			name : 'det_sipd_kelengkapan',
			fieldLabel : 'det_sipd_kelengkapan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_sipd_bapSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_bapSearchField',
			name : 'det_sipd_bap',
			fieldLabel : 'det_sipd_bap',
			maxLength : 50
		
		});
		det_sipd_keputusanSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_sipd_keputusanSearchField',
			name : 'det_sipd_keputusan',
			fieldLabel : 'det_sipd_keputusan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_sipd_baptanggalSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_baptanggalSearchField',
			name : 'det_sipd_baptanggal',
			fieldLabel : 'det_sipd_baptanggal',
			maxLength : 0
		
		});
		det_sipd_sipSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_sipSearchField',
			name : 'det_sipd_sip',
			fieldLabel : 'det_sipd_sip',
			maxLength : 50
		
		});
		det_sipd_nropSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_nropSearchField',
			name : 'det_sipd_nrop',
			fieldLabel : 'det_sipd_nrop',
			maxLength : 50
		
		});
		det_sipd_strSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_strSearchField',
			name : 'det_sipd_str',
			fieldLabel : 'det_sipd_str',
			maxLength : 50
		
		});
		det_sipd_kompetensiSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_kompetensiSearchField',
			name : 'det_sipd_kompetensi',
			fieldLabel : 'det_sipd_kompetensi',
			maxLength : 50
		
		});
		var sipd_det_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : sipd_det_search
		});
		var sipd_det_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				sipd_det_searchWindow.hide();
			}
		});
		sipd_det_searchPanel = Ext.create('Ext.form.Panel', {
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
						det_sipd_sipd_idSearchField,
						det_sipd_jenisSearchField,
						det_sipd_tanggalSearchField,
						det_sipd_pemohon_idSearchField,
						det_sipd_nomorregSearchField,
						det_sipd_prosesSearchField,
						det_sipd_skSearchField,
						det_sipd_skurutSearchField,
						det_sipd_berlakuSearchField,
						det_sipd_kadaluarsaSearchField,
						det_sipd_terimaSearchField,
						det_sipd_terimatanggalSearchField,
						det_sipd_kelengkapanSearchField,
						det_sipd_bapSearchField,
						det_sipd_keputusanSearchField,
						det_sipd_baptanggalSearchField,
						det_sipd_sipSearchField,
						det_sipd_nropSearchField,
						det_sipd_strSearchField,
						det_sipd_kompetensiSearchField,
						]
				}],
			buttons : [sipd_det_searchingButton,sipd_det_cancelSearchButton]
		});
		sipd_det_searchWindow = Ext.create('Ext.window.Window',{
			id : 'sipd_det_searchWindow',
			renderTo : 'sipd_detSearchWindow',
			title : globalFormSearchTitle + ' ' + sipd_det_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [sipd_det_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="sipd_detSaveWindow"></div>
<div id="sipd_detSearchWindow"></div>
<div class="span12" id="sipd_detGrid"></div>