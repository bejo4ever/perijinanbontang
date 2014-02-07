<style>
	.checked{
		background-image:url(../assets/images/icons/check.png) !important;
		margin:auto;
	}
	.unchecked{
		background-image:url(../assets/images/icons/forward.png) !important;
	}
</style>
<h4>IZIN LINGKUNGAN</h4>
<hr>
<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var in_lingkungan_componentItemTitle="Ijin Lingkungan";
		var in_lingkungan_dataStore;
		var lingkungan_syaratDataStore;
		var in_lingkungan_shorcut;
		var in_lingkungan_contextMenu;
		var in_lingkungan_gridSearchField;
		var in_lingkungan_gridPanel;
		var in_lingkungan_formPanel;
		var in_lingkungan_formWindow;
		var in_lingkungan_searchPanel;
		var in_lingkungan_searchWindow;
		
		var ID_PEMOHONField;
		var NPWPDField;
		var NAMA_PERUSAHAANField;
		var NO_AKTEField;
		var BENTUK_PERUSAHAANField;
		var ALAMAT_PERUSAHAANField;
		var ID_KOTAField;
		var ID_KECAMATANField;
		var ID_KELURAHANField;
		var NAMA_KEGIATANField;
		var JENIS_USAHAField;
		var ALAMAT_LOKASIField;
		var ID_KELURAHAN_LOKASIField;
		var ID_KECAMATAN_LOKASIField;
		var STATUS_LOKASIField;
		var LUAS_USAHAField;
		var LUAS_BAHANField;
		var LUAS_BANGUNANField;
		var LUAS_RUANG_USAHAField;
		var KAPASITASField;
		var IZIN_SKTRField;
		var IZIN_LOKASIField;
		var ID_IJIN_LINGKUNGANField;
		var ID_IJIN_LINGKUNGAN_INTIField;
		var NO_REGField;
		var NO_SKField;
		var NAMA_DIREKTURField;
		var JENIS_PERMOHONANField;
		var TGL_PERMOHONANField;
		var TGL_AWALField;
		var TGL_AKHIRField;
		var STATUSField;
		var STATUS_SURVEYField;
				
		var ID_IJIN_LINGKUNGAN_INTISearchField;
		var NO_REGSearchField;
		var NO_SKSearchField;
		var NAMA_DIREKTURSearchField;
		var JENIS_PERMOHONANSearchField;
		var TGL_PERMOHONANSearchField;
		var TGL_AWALSearchField;
		var TGL_AKHIRSearchField;
		var STATUSSearchField;
		var STATUS_SURVEYSearchField;
				
		var in_lingkungan_dbTask = 'CREATE';
		var in_lingkungan_dbTaskMessage = 'Tambah';
		var in_lingkungan_dbPermission = 'CRUD';
		var in_lingkungan_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function in_lingkungan_switchToGrid(){
			in_lingkungan_formPanel.setDisabled(true);
			in_lingkungan_gridPanel.setDisabled(false);
			in_lingkungan_formWindow.hide();
		}
		
		function in_lingkungan_switchToForm(){
			in_lingkungan_gridPanel.setDisabled(true);
			in_lingkungan_formPanel.setDisabled(false);
			in_lingkungan_formWindow.show();
		}
		
		function in_lingkungan_confirmAdd(){
			in_lingkungan_dbTask = 'CREATE';
			in_lingkungan_dbTaskMessage = 'created';
			in_lingkungan_resetForm();
			in_lingkungan_switchToForm();
		}
		
		function in_lingkungan_confirmUpdate(){
			if(in_lingkungan_gridPanel.selModel.getCount() == 1) {
				in_lingkungan_dbTask = 'UPDATE';
				in_lingkungan_dbTaskMessage = 'updated';
				in_lingkungan_switchToForm();
				in_lingkungan_setForm();
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
		
		function in_lingkungan_confirmDelete(){
			if(in_lingkungan_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, in_lingkungan_delete);
			}else if(in_lingkungan_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, in_lingkungan_delete);
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
		
		function in_lingkungan_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(in_lingkungan_dbPermission)==false && pattC.test(in_lingkungan_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(in_lingkungan_confirmFormValid()){
					var ID_IJIN_LINGKUNGANValue = '';
					var ID_IJIN_LINGKUNGAN_INTIValue = '';
					var NO_REGValue = '';
					var NO_SKValue = '';
					var NAMA_DIREKTURValue = '';
					var JENIS_PERMOHONANValue = '';
					var TGL_PERMOHONANValue = '';
					var TGL_AWALValue = '';
					var TGL_AKHIRValue = '';
					var STATUSValue = '';
					var STATUS_SURVEYValue = '';
					var ID_PEMOHONValue = '';
					var NPWPDValue = '';
					var NAMA_PERUSAHAANValue = '';
					var NO_AKTEValue = '';
					var BENTUK_PERUSAHAANValue = '';
					var ALAMAT_PERUSAHAANValue = '';
					var ID_KOTAValue = '';
					var ID_KECAMATANValue = '';
					var ID_KELURAHANValue = '';
					var NAMA_KEGIATANValue = '';
					var JENIS_USAHAValue = '';
					var ALAMAT_LOKASIValue = '';
					var ID_KELURAHAN_LOKASIValue = '';
					var ID_KECAMATAN_LOKASIValue = '';
					var STATUS_LOKASIValue = '';
					var LUAS_USAHAValue = '';
					var LUAS_BAHANValue = '';
					var LUAS_BANGUNANValue = '';
					var LUAS_RUANG_USAHAValue = '';
					var KAPASITASValue = '';
					var IZIN_SKTRValue = '';
					var IZIN_LOKASIValue = '';
					
					var array_lingkungan_keterangan=new Array();
					if(lingkungan_syaratDataStore.getCount() > 0){
						for(var i=0;i<lingkungan_syaratDataStore.getCount();i++){
							array_lingkungan_keterangan.push(lingkungan_syaratDataStore.getAt(i).data.KETERANGAN);
						}
					}					
					var encoded_array_lingkungan_keterangan = Ext.encode(array_lingkungan_keterangan);
					
					ID_IJIN_LINGKUNGANValue = ID_IJIN_LINGKUNGANField.getValue();
					ID_IJIN_LINGKUNGAN_INTIValue = ID_IJIN_LINGKUNGAN_INTIField.getValue();
					NO_REGValue = NO_REGField.getValue();
					NO_SKValue = NO_SKField.getValue();
					NAMA_DIREKTURValue = NAMA_DIREKTURField.getValue();
					JENIS_PERMOHONANValue = JENIS_PERMOHONANField.getValue();
					TGL_PERMOHONANValue = TGL_PERMOHONANField.getValue();
					TGL_AWALValue = TGL_AWALField.getValue();
					TGL_AKHIRValue = TGL_AKHIRField.getValue();
					STATUSValue = STATUSField.getValue();
					STATUS_SURVEYValue = STATUS_SURVEYField.getValue();
					ID_PEMOHONValue = ID_PEMOHONField.getValue();
					NPWPDValue = NPWPDField.getValue();
					NAMA_PERUSAHAANValue = NAMA_PERUSAHAANField.getValue();
					NO_AKTEValue = NO_AKTEField.getValue();
					BENTUK_PERUSAHAANValue = BENTUK_PERUSAHAANField.getValue();
					ALAMAT_PERUSAHAANValue = ALAMAT_PERUSAHAANField.getValue();
					ID_KOTAValue = ID_KOTAField.getValue();
					ID_KECAMATANValue = ID_KECAMATANField.getValue();
					ID_KELURAHANValue = ID_KELURAHANField.getValue();
					NAMA_KEGIATANValue = NAMA_KEGIATANField.getValue();
					JENIS_USAHAValue = JENIS_USAHAField.getValue();
					ALAMAT_LOKASIValue = ALAMAT_LOKASIField.getValue();
					ID_KELURAHAN_LOKASIValue = ID_KELURAHAN_LOKASIField.getValue();
					ID_KECAMATAN_LOKASIValue = ID_KECAMATAN_LOKASIField.getValue();
					STATUS_LOKASIValue = STATUS_LOKASIField.getValue();
					LUAS_USAHAValue = LUAS_USAHAField.getValue();
					LUAS_BAHANValue = LUAS_BAHANField.getValue();
					LUAS_BANGUNANValue = LUAS_BANGUNANField.getValue();
					LUAS_RUANG_USAHAValue = LUAS_RUANG_USAHAField.getValue();
					KAPASITASValue = KAPASITASField.getValue();
					IZIN_SKTRValue = IZIN_SKTRField.getValue();
					IZIN_LOKASIValue = IZIN_LOKASIField.getValue();
					pemohon_idValue = pemohon_idField.getValue();
					pemohon_namaValue = pemohon_namaField.getValue();
					pemohon_alamatValue = pemohon_alamatField.getValue();
					pemohon_telpValue = pemohon_telpField.getValue();
					pemohon_hpValue = pemohon_hpField.getValue();
					pemohon_rtValue = pemohon_rtField.getValue();
					pemohon_rwValue = pemohon_rwField.getValue();
					pemohon_kelValue = pemohon_kelField.getValue();
					pemohon_kecValue = pemohon_kecField.getValue();
					pemohon_kotaValue = pemohon_kotaField.getValue();
					pemohon_nikValue = pemohon_nikField.getValue();
					pemohon_wnValue = pemohon_wnField.getValue();
					pemohon_pekerjaanValue = pemohon_pekerjaanField.getValue();
					pemohon_tempatlahirValue = pemohon_tempatlahirField.getValue();
					pemohon_tanggallahirValue = pemohon_tanggallahirField.getValue();
					RETRIBUSIValue = RETRIBUSIField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_ijin_lingkungan/switchAction',
						params: {							
							ID_IJIN_LINGKUNGAN : ID_IJIN_LINGKUNGANValue,
							ID_IJIN_LINGKUNGAN_INTI : ID_IJIN_LINGKUNGAN_INTIValue,
							NO_REG : NO_REGValue,
							NO_SK : NO_SKValue,
							NAMA_DIREKTUR : NAMA_DIREKTURValue,
							JENIS_PERMOHONAN : JENIS_PERMOHONANValue,
							TGL_PERMOHONAN : TGL_PERMOHONANValue,
							TGL_AWAL : TGL_AWALValue,
							TGL_AKHIR : TGL_AKHIRValue,
							STATUS : STATUSValue,
							STATUS_SURVEY : STATUS_SURVEYValue,
							ID_PEMOHON : ID_PEMOHONValue,
							NPWPD : NPWPDValue,
							NAMA_PERUSAHAAN : NAMA_PERUSAHAANValue,
							NO_AKTE : NO_AKTEValue,
							BENTUK_PERUSAHAAN : BENTUK_PERUSAHAANValue,
							ALAMAT_PERUSAHAAN : ALAMAT_PERUSAHAANValue,
							ID_KOTA : ID_KOTAValue,
							ID_KECAMATAN : ID_KECAMATANValue,
							ID_KELURAHAN : ID_KELURAHANValue,
							NAMA_KEGIATAN : NAMA_KEGIATANValue,
							JENIS_USAHA : JENIS_USAHAValue,
							ALAMAT_LOKASI : ALAMAT_LOKASIValue,
							ID_KELURAHAN_LOKASI : ID_KELURAHAN_LOKASIValue,
							ID_KECAMATAN_LOKASI : ID_KECAMATAN_LOKASIValue,
							STATUS_LOKASI : STATUS_LOKASIValue,
							LUAS_USAHA : LUAS_USAHAValue,
							LUAS_BAHAN : LUAS_BAHANValue,
							LUAS_BANGUNAN : LUAS_BANGUNANValue,
							LUAS_RUANG_USAHA : LUAS_RUANG_USAHAValue,
							KAPASITAS : KAPASITASValue,
							IZIN_SKTR : IZIN_SKTRValue,
							IZIN_LOKASI : IZIN_LOKASIValue,
							KETERANGAN : encoded_array_lingkungan_keterangan,
							pemohon_id : pemohon_idValue,
							pemohon_nama : pemohon_namaValue,
							pemohon_alamat : pemohon_alamatValue,
							pemohon_telp : pemohon_telpValue,
							pemohon_hp : pemohon_hpValue,
							pemohon_rt : pemohon_rtValue,
							pemohon_rw : pemohon_rwValue,
							pemohon_kel : pemohon_kelValue,
							pemohon_kec : pemohon_kecValue,
							pemohon_kota : pemohon_kotaValue,
							pemohon_nik : pemohon_nikValue,
							pemohon_wn : pemohon_wnValue,
							pemohon_pekerjaan : pemohon_pekerjaanValue,
							pemohon_tempatlahir : pemohon_tempatlahirValue,
							pemohon_tanggallahir : pemohon_tanggallahirValue,
							RETRIBUSI : RETRIBUSIValue,
							action : in_lingkungan_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.show({
										title : globalSuccessSaveTitle,
										msg : globalSuccessSave,
										buttons : Ext.MessageBox.OK,
										animEl : 'save',
										// icon : Ext.MessageBox.WARNING,
										fn : function(btn){
											$('html, body').animate({scrollTop: 0}, 500);
										}
									});
									lingkungan_syaratDataStore.reload();
									in_lingkungan_dataStore.reload();
									in_lingkungan_resetForm();
									in_lingkungan_switchToGrid();
									in_lingkungan_gridPanel.getSelectionModel().deselectAll();
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
		
		function in_lingkungan_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(in_lingkungan_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = in_lingkungan_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< in_lingkungan_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.ID_IJIN_LINGKUNGAN);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_ijin_lingkungan/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									in_lingkungan_dataStore.reload();
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
		
		function in_lingkungan_refresh(){
			in_lingkungan_dbListAction = "GETLIST";
			in_lingkungan_gridSearchField.reset();
			in_lingkungan_searchPanel.getForm().reset();
			in_lingkungan_dataStore.proxy.extraParams = { action : 'GETLIST' };
			in_lingkungan_dataStore.proxy.extraParams.query = "";
			in_lingkungan_dataStore.currentPage = 1;
			in_lingkungan_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function in_lingkungan_confirmFormValid(){
			return in_lingkungan_formPanel.getForm().isValid();
		}
		
		function in_lingkungan_resetForm(){
			in_lingkungan_dbTask = 'CREATE';
			in_lingkungan_dbTaskMessage = 'create';
			in_lingkungan_formPanel.getForm().reset();
			ID_IJIN_LINGKUNGANField.setValue(0);
		}
		
		function in_lingkungan_setForm(){
			in_lingkungan_dbTask = 'UPDATE';
            in_lingkungan_dbTaskMessage = 'update';
			
			var record = in_lingkungan_gridPanel.getSelectionModel().getSelection()[0];
			ID_IJIN_LINGKUNGANField.setValue(record.data.ID_IJIN_LINGKUNGAN);
			ID_IJIN_LINGKUNGAN_INTIField.setValue(record.data.ID_IJIN_LINGKUNGAN_INTI);
			NO_REGField.setValue(record.data.NO_REG);
			NO_SKField.setValue(record.data.NO_SK);
			NAMA_DIREKTURField.setValue(record.data.NAMA_DIREKTUR);
			JENIS_PERMOHONANField.setValue(record.data.JENIS_PERMOHONAN);
			TGL_PERMOHONANField.setValue(record.data.TGL_PERMOHONAN);
			TGL_AWALField.setValue(record.data.TGL_AWAL);
			TGL_AKHIRField.setValue(record.data.TGL_AKHIR);
			STATUSField.setValue(record.data.STATUS);
			STATUS_SURVEYField.setValue(record.data.STATUS_SURVEY);
			NPWPDField.setValue(record.data.NPWPD);
			NAMA_PERUSAHAANField.setValue(record.data.NAMA_PERUSAHAAN);
			NO_AKTEField.setValue(record.data.NO_AKTE);
			BENTUK_PERUSAHAANField.setValue(record.data.BENTUK_PERUSAHAAN);
			ALAMAT_PERUSAHAANField.setValue(record.data.ALAMAT_PERUSAHAAN);
			ID_KOTAField.setValue(record.data.ID_KOTA);
			ID_KECAMATANField.setValue(record.data.ID_KECAMATAN);
			ID_KELURAHANField.setValue(record.data.ID_KELURAHAN);
			NAMA_KEGIATANField.setValue(record.data.NAMA_KEGIATAN);
			JENIS_USAHAField.setValue(record.data.JENIS_USAHA);
			ALAMAT_LOKASIField.setValue(record.data.ALAMAT_LOKASI);
			ID_KELURAHAN_LOKASIField.setValue(record.data.ID_KELURAHAN_LOKASI);
			ID_KECAMATAN_LOKASIField.setValue(record.data.ID_KECAMATAN_LOKASI);
			STATUS_LOKASIField.setValue(record.data.STATUS_LOKASI);
			LUAS_USAHAField.setValue(record.data.LUAS_USAHA);
			LUAS_BAHANField.setValue(record.data.LUAS_BAHAN);
			LUAS_BANGUNANField.setValue(record.data.LUAS_BANGUNAN);
			LUAS_RUANG_USAHAField.setValue(record.data.LUAS_RUANG_USAHA);
			KAPASITASField.setValue(record.data.KAPASITAS);
			IZIN_SKTRField.setValue(record.data.IZIN_SKTR);
			IZIN_LOKASIField.setValue(record.data.IZIN_LOKASI);
			pemohon_namaField.setValue(record.data.pemohon_nama);
			pemohon_idField.setValue(record.data.pemohon_id);
			pemohon_alamatField.setValue(record.data.pemohon_alamat);
			pemohon_telpField.setValue(record.data.pemohon_telp);
			pemohon_rtField.setValue(record.data.pemohon_rt);
			pemohon_rwField.setValue(record.data.pemohon_rw);
			pemohon_kelField.setValue(record.data.pemohon_kel);
			pemohon_kecField.setValue(record.data.pemohon_kec);
			pemohon_kotaField.setValue(record.data.pemohon_kota);
			pemohon_hpField.setValue(record.data.pemohon_hp);
			pemohon_wnField.setValue(record.data.pemohon_wn);
			pemohon_nikField.setValue(record.data.pemohon_nik);
			pemohon_pekerjaanField.setValue(record.data.pemohon_pekerjaan);
			pemohon_tempatlahirField.setValue(record.data.pemohon_tempatlahir);
			pemohon_tanggallahirField.setValue(record.data.pemohon_tanggallahir);
			RETRIBUSIField.setValue(record.data.RETRIBUSI);
			if(record.data.RETRIBUSI != 0){
				RETRIBUSI_STATUSField.setValue({ s_retribusi : ['1'] });
			}else{
				RETRIBUSI_STATUSField.setValue({ s_retribusi : ['0'] });
			}
			lingkungan_syaratDataStore.proxy.extraParams = { 
				lingkungan_id : record.data.ID_IJIN_LINGKUNGAN,
				currentAction : 'update',
				action : 'GETSYARAT'
			};
			lingkungan_syaratDataStore.load();
		}
		
		function in_lingkungan_showSearchWindow(){
			in_lingkungan_searchWindow.show();
		}
		
		function in_lingkungan_search(){
			in_lingkungan_gridSearchField.reset();
			
			var ID_IJIN_LINGKUNGAN_INTIValue = '';
			var NO_REGValue = '';
			var NO_SKValue = '';
			var NAMA_DIREKTURValue = '';
			var JENIS_PERMOHONANValue = '';
			var TGL_PERMOHONANValue = '';
			var TGL_AWALValue = '';
			var TGL_AKHIRValue = '';
			var STATUSValue = '';
			var STATUS_SURVEYValue = '';
						
			ID_IJIN_LINGKUNGAN_INTIValue = ID_IJIN_LINGKUNGAN_INTISearchField.getValue();
			NO_REGValue = NO_REGSearchField.getValue();
			NO_SKValue = NO_SKSearchField.getValue();
			NAMA_DIREKTURValue = NAMA_DIREKTURSearchField.getValue();
			JENIS_PERMOHONANValue = JENIS_PERMOHONANSearchField.getValue();
			TGL_PERMOHONANValue = TGL_PERMOHONANSearchField.getValue();
			TGL_AWALValue = TGL_AWALSearchField.getValue();
			TGL_AKHIRValue = TGL_AKHIRSearchField.getValue();
			STATUSValue = STATUSSearchField.getValue();
			STATUS_SURVEYValue = STATUS_SURVEYSearchField.getValue();
			in_lingkungan_dbListAction = "SEARCH";
			in_lingkungan_dataStore.proxy.extraParams = { 
				ID_IJIN_LINGKUNGAN_INTI : ID_IJIN_LINGKUNGAN_INTIValue,
				NO_REG : NO_REGValue,
				NO_SK : NO_SKValue,
				NAMA_DIREKTUR : NAMA_DIREKTURValue,
				JENIS_PERMOHONAN : JENIS_PERMOHONANValue,
				TGL_PERMOHONAN : TGL_PERMOHONANValue,
				TGL_AWAL : TGL_AWALValue,
				TGL_AKHIR : TGL_AKHIRValue,
				STATUS : STATUSValue,
				STATUS_SURVEY : STATUS_SURVEYValue,
				action : 'SEARCH'
			};
			in_lingkungan_dataStore.currentPage = 1;
			in_lingkungan_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function in_lingkungan_printExcel(outputType){
			var searchText = "";
			var ID_IJIN_LINGKUNGAN_INTIValue = '';
			var NO_REGValue = '';
			var NO_SKValue = '';
			var NAMA_DIREKTURValue = '';
			var JENIS_PERMOHONANValue = '';
			var TGL_PERMOHONANValue = '';
			var TGL_AWALValue = '';
			var TGL_AKHIRValue = '';
			var STATUSValue = '';
			var STATUS_SURVEYValue = '';
			
			if(in_lingkungan_dataStore.proxy.extraParams.query!==null){searchText = in_lingkungan_dataStore.proxy.extraParams.query;}
			if(in_lingkungan_dataStore.proxy.extraParams.ID_IJIN_LINGKUNGAN_INTI!==null){ID_IJIN_LINGKUNGAN_INTIValue = in_lingkungan_dataStore.proxy.extraParams.ID_IJIN_LINGKUNGAN_INTI;}
			if(in_lingkungan_dataStore.proxy.extraParams.NO_REG!==null){NO_REGValue = in_lingkungan_dataStore.proxy.extraParams.NO_REG;}
			if(in_lingkungan_dataStore.proxy.extraParams.NO_SK!==null){NO_SKValue = in_lingkungan_dataStore.proxy.extraParams.NO_SK;}
			if(in_lingkungan_dataStore.proxy.extraParams.NAMA_DIREKTUR!==null){NAMA_DIREKTURValue = in_lingkungan_dataStore.proxy.extraParams.NAMA_DIREKTUR;}
			if(in_lingkungan_dataStore.proxy.extraParams.JENIS_PERMOHONAN!==null){JENIS_PERMOHONANValue = in_lingkungan_dataStore.proxy.extraParams.JENIS_PERMOHONAN;}
			if(in_lingkungan_dataStore.proxy.extraParams.TGL_PERMOHONAN!==null){TGL_PERMOHONANValue = in_lingkungan_dataStore.proxy.extraParams.TGL_PERMOHONAN;}
			if(in_lingkungan_dataStore.proxy.extraParams.TGL_AWAL!==null){TGL_AWALValue = in_lingkungan_dataStore.proxy.extraParams.TGL_AWAL;}
			if(in_lingkungan_dataStore.proxy.extraParams.TGL_AKHIR!==null){TGL_AKHIRValue = in_lingkungan_dataStore.proxy.extraParams.TGL_AKHIR;}
			if(in_lingkungan_dataStore.proxy.extraParams.STATUS!==null){STATUSValue = in_lingkungan_dataStore.proxy.extraParams.STATUS;}
			if(in_lingkungan_dataStore.proxy.extraParams.STATUS_SURVEY!==null){STATUS_SURVEYValue = in_lingkungan_dataStore.proxy.extraParams.STATUS_SURVEY;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_ijin_lingkungan/switchAction',
				params : {
					action : outputType,
					query : searchText,
					ID_IJIN_LINGKUNGAN_INTI : ID_IJIN_LINGKUNGAN_INTIValue,
					NO_REG : NO_REGValue,
					NO_SK : NO_SKValue,
					NAMA_DIREKTUR : NAMA_DIREKTURValue,
					JENIS_PERMOHONAN : JENIS_PERMOHONANValue,
					TGL_PERMOHONAN : TGL_PERMOHONANValue,
					TGL_AWAL : TGL_AWALValue,
					TGL_AKHIR : TGL_AKHIRValue,
					STATUS : STATUSValue,
					STATUS_SURVEY : STATUS_SURVEYValue,
					currentAction : in_lingkungan_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/ijin_lingkungan_list.xls');
							}else{
								window.open('./print/ijin_lingkungan_list.html','in_lingkunganlist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		in_lingkungan_dataStore = Ext.create('Ext.data.Store',{
			id : 'in_lingkungan_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_ijin_lingkungan/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'ID_IJIN_LINGKUNGAN'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'ID_IJIN_LINGKUNGAN', type : 'int', mapping : 'ID_IJIN_LINGKUNGAN' },
				{ name : 'ID_IJIN_LINGKUNGAN_INTI', type : 'int', mapping : 'ID_IJIN_LINGKUNGAN_INTI' },
				{ name : 'NO_REG', type : 'string', mapping : 'NO_REG' },
				{ name : 'NO_SK', type : 'string', mapping : 'NO_SK' },
				{ name : 'NAMA_DIREKTUR', type : 'string', mapping : 'NAMA_DIREKTUR' },
				{ name : 'JENIS_PERMOHONAN', type : 'string', mapping : 'JENIS_PERMOHONAN' },
				{ name : 'TGL_PERMOHONAN', type : 'date', dateFormat : 'Y-m-d', mapping : 'TGL_PERMOHONAN' },
				{ name : 'TGL_AWAL', type : 'date', dateFormat : 'Y-m-d', mapping : 'TGL_AWAL' },
				{ name : 'TGL_AKHIR', type : 'date', dateFormat : 'Y-m-d', mapping : 'TGL_AKHIR' },
				{ name : 'STATUS', type : 'string', mapping : 'STATUS' },
				{ name : 'STATUS_SURVEY', type : 'string', mapping : 'STATUS_SURVEY' },
				{ name : 'ID_PEMOHON', type : 'int', mapping : 'ID_PEMOHON' },
				{ name : 'NPWPD', type : 'string', mapping : 'NPWPD' },
				{ name : 'NAMA_PERUSAHAAN', type : 'string', mapping : 'NAMA_PERUSAHAAN' },
				{ name : 'NO_AKTE', type : 'string', mapping : 'NO_AKTE' },
				{ name : 'BENTUK_PERUSAHAAN', type : 'int', mapping : 'BENTUK_PERUSAHAAN' },
				{ name : 'ALAMAT_PERUSAHAAN', type : 'string', mapping : 'ALAMAT_PERUSAHAAN' },
				{ name : 'ID_KOTA', type : 'int', mapping : 'ID_KOTA' },
				{ name : 'ID_KECAMATAN', type : 'int', mapping : 'ID_KECAMATAN' },
				{ name : 'ID_KELURAHAN', type : 'int', mapping : 'ID_KELURAHAN' },
				{ name : 'NAMA_KEGIATAN', type : 'string', mapping : 'NAMA_KEGIATAN' },
				{ name : 'JENIS_USAHA', type : 'string', mapping : 'JENIS_USAHA' },
				{ name : 'ALAMAT_LOKASI', type : 'string', mapping : 'ALAMAT_LOKASI' },
				{ name : 'ID_KELURAHAN_LOKASI', type : 'int', mapping : 'ID_KELURAHAN_LOKASI' },
				{ name : 'ID_KECAMATAN_LOKASI', type : 'int', mapping : 'ID_KECAMATAN_LOKASI' },
				{ name : 'STATUS_LOKASI', type : 'int', mapping : 'STATUS_LOKASI' },
				{ name : 'LUAS_USAHA', type : 'float', mapping : 'LUAS_USAHA' },
				{ name : 'LUAS_BAHAN', type : 'float', mapping : 'LUAS_BAHAN' },
				{ name : 'LUAS_BANGUNAN', type : 'float', mapping : 'LUAS_BANGUNAN' },
				{ name : 'LUAS_RUANG_USAHA', type : 'float', mapping : 'LUAS_RUANG_USAHA' },
				{ name : 'RETRIBUSI', type : 'float', mapping : 'RETRIBUSI' },
				{ name : 'KAPASITAS', type : 'float', mapping : 'KAPASITAS' },
				{ name : 'IZIN_SKTR', type : 'int', mapping : 'IZIN_SKTR' },
				{ name : 'IZIN_LOKASI', type : 'int', mapping : 'IZIN_LOKASI' },
				{ name : 'pemohon_nama', type : 'string', mapping : 'pemohon_nama' },
				{ name : 'pemohon_alamat', type : 'string', mapping : 'pemohon_alamat' },
				{ name : 'pemohon_telp', type : 'string', mapping : 'pemohon_telp' },
				{ name : 'pemohon_npwp', type : 'string', mapping : 'pemohon_npwp' },
				{ name : 'pemohon_rt', type : 'int', mapping : 'pemohon_rt' },
				{ name : 'pemohon_rw', type : 'int', mapping : 'pemohon_rw' },
				{ name : 'pemohon_kel', type : 'string', mapping : 'pemohon_kel' },
				{ name : 'pemohon_kec', type : 'string', mapping : 'pemohon_kec' },
				{ name : 'pemohon_kota', type : 'string', mapping : 'pemohon_kota' },
				{ name : 'pemohon_nik', type : 'string', mapping : 'pemohon_nik' },
				{ name : 'pemohon_stra', type : 'string', mapping : 'pemohon_stra' },
				{ name : 'pemohon_surattugas', type : 'string', mapping : 'pemohon_surattugas' },
				{ name : 'pemohon_pekerjaan', type : 'string', mapping : 'pemohon_pekerjaan' },
				{ name : 'pemohon_tempatlahir', type : 'string', mapping : 'pemohon_tempatlahir' },
				{ name : 'pemohon_tanggallahir', type : 'date', dateFormat : 'Y-m-d', mapping : 'pemohon_tanggallahir' },
				{ name : 'pemohon_user_id', type : 'int', mapping : 'pemohon_user_id' },
				{ name : 'pemohon_pendidikan', type : 'string', mapping : 'pemohon_pendidikan' },
				{ name : 'pemohon_tahunlulus', type : 'int', mapping : 'pemohon_tahunlulus' },
				{ name : 'pemohon_wn', type : 'string', mapping : 'pemohon_wn' },
				{ name : 'pemohon_hp', type : 'string', mapping : 'pemohon_hp' },
				{ name : 'pemohon_id', type : 'string', mapping : 'pemohon_id' },
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		in_lingkungan_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						in_lingkungan_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						in_lingkungan_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						in_lingkungan_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						in_lingkungan_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						in_lingkungan_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						in_lingkungan_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						in_lingkungan_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						in_lingkungan_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var in_lingkungan_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : in_lingkungan_confirmAdd
		});
		var in_lingkungan_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : in_lingkungan_confirmUpdate
		});
		var in_lingkungan_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : in_lingkungan_confirmDelete
		});
		var in_lingkungan_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : in_lingkungan_refresh
		});
		var in_lingkungan_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : in_lingkungan_showSearchWindow
		});
		var in_lingkungan_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				in_lingkungan_printExcel('PRINT');
			}
		});
		var in_lingkungan_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				in_lingkungan_printExcel('EXCEL');
			}
		});
		
		var in_lingkungan_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : in_lingkungan_confirmUpdate
		});
		var in_lingkungan_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : in_lingkungan_confirmDelete
		});
		var in_lingkungan_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : in_lingkungan_refresh
		});
		in_lingkungan_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'in_lingkungan_contextMenu',
			items: [
				in_lingkungan_contextMenuEdit,in_lingkungan_contextMenuDelete,'-',in_lingkungan_contextMenuRefresh
			]
		});
		
		in_lingkungan_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : in_lingkungan_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						in_lingkungan_dataStore.proxy.extraParams = { action : 'GETLIST'};
						in_lingkungan_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		
		/* Start ContextMenu For Action Column */
		var lingkungan_bp_printCM = Ext.create('Ext.menu.Item',{
			text : 'Bukti Penerimaan',
			tooltip : 'Cetak Bukti Penerimaan',
			handler : function(){
				var record = in_lingkungan_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_ijin_lingkungan/switchAction',
					params: {
						ID_IJIN_LINGKUNGAN : record.get('ID_IJIN_LINGKUNGAN'),
						action : 'CETAKBP'
					},success : function(){
						window.open('<?php echo base_url("print/lingkungan_bp.html")?>');
					}
				});
			}
		});
		var lingkungan_lk_printCM = Ext.create('Ext.menu.Item',{
			text : 'Lembar Kontrol',
			tooltip : 'Cetak Lembar Kontrol',
			handler : function(){
				var record = in_lingkungan_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_ijin_lingkungan/switchAction',
					params: {
						ID_IJIN_LINGKUNGAN : record.get('ID_IJIN_LINGKUNGAN'),
						action : 'CETAKLK'
					},success : function(){
						window.open('<?php echo base_url("print/lingkungan_lk.html")?>');
					}
				});
			}
		});
		var lingkungan_sk_printCM = Ext.create('Ext.menu.Item',{
			text : 'Lembar SK',
			tooltip : 'Cetak Lembar SK',
			handler : function(){
				var record = in_lingkungan_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_ijin_lingkungan/switchAction',
					params: {
						ID_IJIN_LINGKUNGAN : record.get('ID_IJIN_LINGKUNGAN'),
						action : 'CETAKSK'
					},success : function(){
						window.open('<?php echo base_url("print/lingkungan_sk.html")?>');
					}
				});
			}
		});
		var lingkungan_ba_printCM = Ext.create('Ext.menu.Item',{
			text : 'Lembar Berita Acara',
			tooltip : 'Cetak Lembar Berita Acara',
			handler : function(){
				var record = in_lingkungan_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_ijin_lingkungan/switchAction',
					params: {
						ID_IJIN_LINGKUNGAN : record.get('ID_IJIN_LINGKUNGAN'),
						action : 'CETAKBA'
					},success : function(){
						window.open('<?php echo base_url("print/lingkungan_ba.html")?>');
					}
				});
			}
		});
		var lingkungan_printContextMenu = Ext.create('Ext.menu.Menu',{
			items: [
				<?php echo ($_SESSION["IDHAK"] == 2) ? ("lingkungan_bp_printCM") : ("lingkungan_bp_printCM,lingkungan_lk_printCM,lingkungan_sk_printCM,lingkungan_ba_printCM")?>
			]
		});
		function lingkungan_ubahProses(proses){
			var record = in_lingkungan_gridPanel.getSelectionModel().getSelection()[0];
			Ext.Ajax.request({
				waitMsg: 'Please wait...',
				url: 'c_ijin_lingkungan/switchAction',
				params: {
					lingkungan_id : record.get('ID_IJIN_LINGKUNGAN'),
					no_sk : record.get('NO_SK'),
					proses : proses,
					action : 'UBAHPROSES'
				},success : function(){
					in_lingkungan_dataStore.reload();
				}
			});
		}
		var lingkungan_prosesContextMenu = Ext.create('Ext.menu.Menu',{
			items: [
				{
					text : 'Selesai, belum diambil',
					tooltip : 'Ubah Menjadi Selesai, belum diambil',
					handler : function(){
						lingkungan_ubahProses('Selesai, belum diambil');
					}
				},
				{
					text : 'Selesai, sudah diambil',
					tooltip : 'Ubah Menjadi Selesai, sudah diambil',
					handler : function(){
						lingkungan_ubahProses('Selesai, sudah diambil');
					}
				},
				{
					text : 'Ditolak',
					tooltip : 'Ubah Menjadi Ditolak',
					handler : function(){
						lingkungan_ubahProses('Ditolak');
					}
				}
			]
		});
		/*----------------end----------------*/
		
		in_lingkungan_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'in_lingkungan_gridPanel',
			constrain : true,
			store : in_lingkungan_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'in_lingkunganGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						in_lingkungan_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : in_lingkungan_shorcut,
			columns : [
				{
					text : 'Jenis Permohonan',
					dataIndex : 'JENIS_PERMOHONAN',
					width : 100,
					sortable : false,
					renderer : function(value){
								if(value == 1){
									return 'Baru';
								}else{
									return 'Perpanjangan';
								}
							}
				},
				{
					text : 'No. SK',
					dataIndex : 'NO_SK',
					width : 100,
					sortable : false
				},
				{
					text : 'Nama Pemohon',
					dataIndex : 'pemohon_nama',
					width : 120,
					sortable : false
				},
				{
					text : 'Alamat Pemohon',
					dataIndex : 'pemohon_alamat',
					width : 100,
					sortable : false
				},
				{
					text : 'No. Telp.',
					dataIndex : 'pemohon_telp',
					width : 100,
					sortable : false
				},
				{
					text : 'Lama Proses',
					dataIndex : 'lama_proses',
					width : 100,
					sortable : false
				},
				{
					text : 'Status Berkas',
					dataIndex : 'STATUS',
					width : 150,
					sortable : false,
					renderer : function(value){
							if(value == 1){
								return 'Disetujui, sudah diambil';
							}else if (value == 2){
								return 'Disetujui, belum diambil';
							} else if (value == null || value == ""){
								return '-';
							} else {
								return 'Ditolak';
							}
						}
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
							lingkungan_printContextMenu.showAt(e.getXY());
							return false;
						}
					}]
				},{
					xtype:'actioncolumn',
					text : 'Action',
					width:50,
					items: [{
						iconCls: 'icon16x16-edit',
						tooltip: 'Ubah Data',
						handler: function(grid, rowIndex){
							grid.getSelectionModel().select(rowIndex);
							in_lingkungan_confirmUpdate();
						}
					},{
						iconCls: 'icon16x16-delete',
						tooltip: 'Hapus Data',
						handler: function(grid, rowIndex){
							grid.getSelectionModel().select(rowIndex);
							in_lingkungan_confirmDelete();
						}
					}],
					<?php echo ($_SESSION["IDHAK"] == 2) ? ("hidden:true") : ("")?>
				},{
					xtype:'actioncolumn',
					width:100,
					text : 'Status Berkas',
					items: [{
						iconCls : 'checked',
						tooltip : 'Ubah Status',
						handler: function(grid, rowIndex, colIndex, node, e) {
							e.stopEvent();
							lingkungan_prosesContextMenu.showAt(e.getXY());
							return false;
						}
					}],
					<?php echo ($_SESSION["IDHAK"] == 2) ? ("hidden:true") : ("")?>
				}
							
			],
			tbar : [
				in_lingkungan_addButton,
				// in_lingkungan_editButton,
				// in_lingkungan_deleteButton,
				in_lingkungan_gridSearchField,
				// in_lingkungan_searchButton,
				in_lingkungan_refreshButton,
				in_lingkungan_printButton,
				in_lingkungan_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : in_lingkungan_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					in_lingkungan_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		ID_IJIN_LINGKUNGANField = Ext.create('Ext.form.NumberField',{
			id : 'ID_IJIN_LINGKUNGANField',
			name : 'ID_IJIN_LINGKUNGAN',
			fieldLabel : 'ID_IJIN_LINGKUNGAN<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		ID_IJIN_LINGKUNGAN_INTIField = Ext.create('Ext.form.NumberField',{
			id : 'ID_IJIN_LINGKUNGAN_INTIField',
			name : 'ID_IJIN_LINGKUNGAN_INTI',
			fieldLabel : 'ID_IJIN_LINGKUNGAN_INTI',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		NO_REGField = Ext.create('Ext.form.TextField',{
			id : 'NO_REGField',
			name : 'NO_REG',
			fieldLabel : 'NO_REG',
			maxLength : 50
		});
		NO_SKField = Ext.create('Ext.form.TextField',{
			id : 'NO_SKField',
			name : 'NO_SK',
			fieldLabel : 'NO_SK',
			maxLength : 50
		});
		var RETRIBUSI_STATUSField = Ext.create('Ext.form.RadioGroup',{
			fieldLabel : 'Retribusi ',
			vertical : false,
			items : [
				{ boxLabel : 'Gratis', name : 's_retribusi', inputValue : '0', checked : true},
				{ boxLabel : 'Bayar', name : 's_retribusi', inputValue : '1'}
			],
			listeners : {
				change : function(com, newval, oldval, e){
					if(newval.s_retribusi == 1){
						RETRIBUSIField.show();
					}else{
						RETRIBUSIField.hide();
					}
				}
			}
		});
		RETRIBUSIField = Ext.create('Ext.form.TextField',{
			id : 'RETRIBUSIField',
			name : 'RETRIBUSI',
			fieldLabel : 'Retribusi',
			maxLength : 50
		});
		NAMA_DIREKTURField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_DIREKTURField',
			name : 'NAMA_DIREKTUR',
			fieldLabel : 'NAMA_DIREKTUR',
			maxLength : 50
		});
		// JENIS_PERMOHONANField = Ext.create('Ext.form.NumberField',{
			// id : 'JENIS_PERMOHONANField',
			// name : 'JENIS_PERMOHONAN',
			// fieldLabel : 'JENIS_PERMOHONAN',
			// allowNegatife : false,
			// blankText : '0',
			// allowDecimals : false,
			// maskRe : /([0-9]+)$/});
		// NO_SK_LAMAField = Ext.create('Ext.form.TextField',{
			// id : 'NO_SK_LAMAField',
			// name : 'NO_SK_LAMA',
			// fieldLabel : 'No. SK Lama',
			// maxLength : 50,
			// hidden:true
		// });
		JENIS_PERMOHONANField = Ext.create('Ext.form.ComboBox',{
			id : 'JENIS_PERMOHONANField',
			name : 'JENIS_PERMOHONAN',
			fieldLabel : 'Jenis Permohonan',
			allowBlank : false,
			store : new Ext.data.ArrayStore({
				fields : ['jenis_id', 'jenis'],
				data : [['1','Baru'],['0','Perpanjangan']]
			}),
			displayField : 'jenis',
			valueField : 'jenis_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true,
			listeners : {
				select : function(cmb, rec){
					if(cmb.getValue() == '0'){
						NO_SK_LAMAField.show();
						// pemohon_nikField.disable();
						// pemohon_namaField.disable();
						// pemohon_tempatlahirField.disable();
						// pemohon_tanggallahirField.disable();
						// pemohon_pekerjaanField.disable();
						// pemohon_wnField.disable();
						// pemohon_alamatField.disable();
						// pemohon_rtField.disable();
						// pemohon_rwField.disable();
						// pemohon_kelField.disable();
						// pemohon_kecField.disable();
						// pemohon_kotaField.disable();
						// pemohon_telpField.disable();						
						// pemohon_hpField.disable();	
						// pemohon_namaField.disable();
						// pemohon_alamatField.disable();
						// pemohon_telpField.disable();
					}else{
						NO_SK_LAMAField.hide();
						// pemohon_nikField.enable();
						// pemohon_namaField.enable();
						// pemohon_tempatlahirField.enable();
						// pemohon_tanggallahirField.enable();
						// pemohon_pekerjaanField.enable();
						// pemohon_wnField.enable();
						// pemohon_alamatField.enable();
						// pemohon_rtField.enable();
						// pemohon_rwField.enable();
						// pemohon_kelField.enable();
						// pemohon_kecField.enable();
						// pemohon_kotaField.enable();
						// pemohon_telpField.enable();						
						// pemohon_hpField.enable();
					}
				}
			}
		});
		TGL_PERMOHONANField = Ext.create('Ext.form.TextField',{
			id : 'TGL_PERMOHONANField',
			name : 'TGL_PERMOHONAN',
			fieldLabel : 'TGL_PERMOHONAN',
			maxLength : 0
		});
		TGL_AWALField = Ext.create('Ext.form.TextField',{
			id : 'TGL_AWALField',
			name : 'TGL_AWAL',
			fieldLabel : 'TGL_AWAL',
			maxLength : 0
		});
		TGL_AKHIRField = Ext.create('Ext.form.Date',{
			id : 'TGL_AKHIRField',
			name : 'TGL_AKHIR',
			format:'d-m-Y',
			fieldLabel : 'Masa Berlaku',
			maxLength : 10
		});
		// STATUSField = Ext.create('Ext.form.NumberField',{
			// id : 'STATUSField',
			// name : 'STATUS',
			// fieldLabel : 'STATUS',
			// allowNegatife : false,
			// blankText : '0',
			// allowDecimals : false,
			// maskRe : /([0-9]+)$/});
		// STATUS_SURVEYField = Ext.create('Ext.form.NumberField',{
			// id : 'STATUS_SURVEYField',
			// name : 'STATUS_SURVEY',
			// fieldLabel : 'STATUS_SURVEY',
			// allowNegatife : false,
			// blankText : '0',
			// allowDecimals : false,
			// maskRe : /([0-9]+)$/});
		STATUSField = Ext.create('Ext.form.ComboBox',{
			id : 'STATUSField',
			name : 'STATUS',
			fieldLabel : 'Status Permohonan',
			store : new Ext.data.ArrayStore({
				fields : ['status_id', 'status'],
				data : [['1','Diterima'],['0','Ditolak']]
			}),
			displayField : 'status',
			valueField : 'status_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true
		});
		STATUS_SURVEYField = Ext.create('Ext.form.ComboBox',{
			id : 'STATUS_SURVEYField',
			name : 'STATUS_SURVEY',
			fieldLabel : 'Hasil Survey',
			store : new Ext.data.ArrayStore({
				fields : ['survey_id', 'survey'],
				data : [['1','Lolos Survey'],['0','Tidak Lolos Survey']]
			}),
			displayField : 'survey',
			valueField : 'survey_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true
		});
		ID_PEMOHONField = Ext.create('Ext.form.NumberField',{
			id : 'ID_PEMOHONField',
			name : 'ID_PEMOHON',
			fieldLabel : 'ID_PEMOHON',
			allowNegatife : false,
			blankText : '0',
			hidden:false,
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		NPWPDField = Ext.create('Ext.form.TextField',{
			id : 'NPWPDField',
			name : 'NPWPD',
			fieldLabel : 'NPWP / NPWPD',
			maxLength : 50
		});
		NAMA_PERUSAHAANField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_PERUSAHAANField',
			name : 'NAMA_PERUSAHAAN',
			fieldLabel : 'Nama Perusahaan',
			maxLength : 50
		});
		NO_AKTEField = Ext.create('Ext.form.TextField',{
			id : 'NO_AKTEField',
			name : 'NO_AKTE',
			fieldLabel : 'No. Akte Pendirian',
			maxLength : 50
		});
		BENTUK_PERUSAHAANField = Ext.create('Ext.form.ComboBox',{
			id : 'BENTUK_PERUSAHAANField',
			name : 'BENTUK_PERUSAHAAN',
			fieldLabel : 'Bentuk Perusahaan',
			allowBlank : false,
			store : new Ext.data.ArrayStore({
				fields : ['bentuk_id', 'bentuk'],
				data : [[1,'PT'],[2,'CV'],[3,'Firma'],[4,'Koperasi'],[5,'Perusahaan Perseorangan / UD'],[6,'Lainnya']]
			}),
			displayField : 'bentuk',
			valueField : 'bentuk_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true,
		});
		ALAMAT_PERUSAHAANField = Ext.create('Ext.form.TextField',{
			id : 'ALAMAT_PERUSAHAANField',
			name : 'ALAMAT_PERUSAHAAN',
			fieldLabel : 'Alamat',
			maxLength : 100
		});
		ID_KOTAField = Ext.create('Ext.form.NumberField',{
			id : 'ID_KOTAField',
			name : 'ID_KOTA',
			fieldLabel : 'Kota',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		ID_KECAMATANField = Ext.create('Ext.form.NumberField',{
			id : 'ID_KECAMATANField',
			name : 'ID_KECAMATAN',
			fieldLabel : 'Kecamatan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		ID_KELURAHANField = Ext.create('Ext.form.NumberField',{
			id : 'ID_KELURAHANField',
			name : 'ID_KELURAHAN',
			fieldLabel : 'Kelurahan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		NAMA_KEGIATANField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_KEGIATANField',
			name : 'NAMA_KEGIATAN',
			fieldLabel : 'Nama Kegiatan',
			maxLength : 50
		});
		JENIS_USAHAField = Ext.create('Ext.form.TextField',{
			id : 'JENIS_USAHAField',
			name : 'JENIS_USAHA',
			fieldLabel : 'Jenis Usaha',
			maxLength : 50
		});
		ALAMAT_LOKASIField = Ext.create('Ext.form.TextField',{
			id : 'ALAMAT_LOKASIField',
			name : 'ALAMAT_LOKASI',
			fieldLabel : 'Alamat',
			maxLength : 100
		});
		ID_KELURAHAN_LOKASIField = Ext.create('Ext.form.NumberField',{
			id : 'ID_KELURAHAN_LOKASIField',
			name : 'ID_KELURAHAN_LOKASI',
			fieldLabel : 'Kelurahan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		ID_KECAMATAN_LOKASIField = Ext.create('Ext.form.NumberField',{
			id : 'ID_KECAMATAN_LOKASIField',
			name : 'ID_KECAMATAN_LOKASI',
			fieldLabel : 'Kecamatan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		STATUS_LOKASIField = Ext.create('Ext.form.ComboBox',{
			id : 'STATUS_LOKASIField',
			name : 'STATUS_LOKASI',
			fieldLabel : 'Status Lokasi Kegiatan',
			allowBlank : false,
			store : new Ext.data.ArrayStore({
				fields : ['status_lokasi_id', 'status_lokasi'],
				data : [[1,'Milik Sendiri'],[2,'Kontrak'],[3,'Sewa'],[4,'Lainnya']]
			}),
			displayField : 'status_lokasi',
			valueField : 'status_lokasi_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true,
		});
		LUAS_USAHAField = Ext.create('Ext.form.TextField',{
			id : 'LUAS_USAHAField',
			name : 'LUAS_USAHA',
			fieldLabel : 'Luas Usaha',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		LUAS_BAHANField = Ext.create('Ext.form.TextField',{
			id : 'LUAS_BAHANField',
			name : 'LUAS_BAHAN',
			fieldLabel : 'Luas Bahan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		LUAS_BANGUNANField = Ext.create('Ext.form.TextField',{
			id : 'LUAS_BANGUNANField',
			name : 'LUAS_BANGUNAN',
			fieldLabel : 'Luas Bangunan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		LUAS_RUANG_USAHAField = Ext.create('Ext.form.TextField',{
			id : 'LUAS_RUANG_USAHAField',
			name : 'LUAS_RUANG_USAHA',
			fieldLabel : 'Luas Ruang Usaha',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		KAPASITASField = Ext.create('Ext.form.TextField',{
			id : 'KAPASITASField',
			name : 'KAPASITAS',
			fieldLabel : 'Kapasitas',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		// IZIN_SKTRField = Ext.create('Ext.form.NumberField',{
			// id : 'IZIN_SKTRField',
			// name : 'IZIN_SKTR',
			// fieldLabel : 'Izin SKTR',
			// allowNegatife : false,
			// blankText : '0',
			// allowDecimals : false,
			// maskRe : /([0-9]+)$/});
		IZIN_SKTRField = Ext.create('Ext.form.ComboBox',{
			id : 'IZIN_SKTRField',
			name : 'IZIN_SKTR',
			fieldLabel : 'Izin SKTR',
			allowBlank : false,
			store : new Ext.data.ArrayStore({
				fields : ['sktr_id', 'sktr'],
				data : [[1,'Ada'],[0,'Tidak Ada']]
			}),
			displayField : 'sktr',
			valueField : 'sktr_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true,
		});
		// IZIN_LOKASIField = Ext.create('Ext.form.NumberField',{
			// id : 'IZIN_LOKASIField',
			// name : 'IZIN_LOKASI',
			// fieldLabel : 'Izin Lokasi',
			// allowNegatife : false,
			// blankText : '0',
			// allowDecimals : false,
			// maskRe : /([0-9]+)$/});
		IZIN_LOKASIField = Ext.create('Ext.form.ComboBox',{
			id : 'IZIN_LOKASIField',
			name : 'IZIN_LOKASI',
			fieldLabel : 'Izin Lokasi',
			allowBlank : false,
			store : new Ext.data.ArrayStore({
				fields : ['lokasi_id', 'lokasi'],
				data : [[1,'Ada'],[0,'Tidak Ada']]
			}),
			displayField : 'lokasi',
			valueField : 'lokasi_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true,
		});
		NO_SK_LAMAField = Ext.create('Ext.form.ComboBox',{
			name : 'NO_SK_LAMA',
			fieldLabel : 'SK Lama',
			hidden:true,
			store : Ext.create('Ext.data.Store',{
				pageSize : globalPageSize,
				proxy : Ext.create('Ext.data.HttpProxy',{
					url : 'c_ijin_lingkungan/switchAction',
					reader : {
						type : 'json', root : 'results', rootProperty : 'results', totalProperty : 'total', idProperty : 'ID_IJIN_LINGKUNGAN'
					},
					actionMethods : { read : 'POST' },
					extraParams : { action : 'SEARCH' }
				}),
				fields : [
					{ name : 'ID_IJIN_LINGKUNGAN', type : 'int', mapping : 'ID_IJIN_LINGKUNGAN' },
					{ name : 'ID_IJIN_LINGKUNGAN_INTI', type : 'int', mapping : 'ID_IJIN_LINGKUNGAN_INTI' },
					{ name : 'NO_REG', type : 'string', mapping : 'NO_REG' },
					{ name : 'NO_SK', type : 'string', mapping : 'NO_SK' },
					{ name : 'NAMA_DIREKTUR', type : 'string', mapping : 'NAMA_DIREKTUR' },
					{ name : 'JENIS_PERMOHONAN', type : 'int', mapping : 'JENIS_PERMOHONAN' },
					{ name : 'TGL_PERMOHONAN', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'TGL_PERMOHONAN' },
					{ name : 'TGL_AWAL', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'TGL_AWAL' },
					{ name : 'TGL_AKHIR', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'TGL_AKHIR' },
					{ name : 'STATUS', type : 'string', mapping : 'STATUS' },
					{ name : 'STATUS_SURVEY', type : 'string', mapping : 'STATUS_SURVEY' },
					{ name : 'ID_PEMOHON', type : 'int', mapping : 'ID_PEMOHON' },
					{ name : 'NPWPD', type : 'string', mapping : 'NPWPD' },
					{ name : 'NAMA_PERUSAHAAN', type : 'string', mapping : 'NAMA_PERUSAHAAN' },
					{ name : 'NO_AKTE', type : 'string', mapping : 'NO_AKTE' },
					{ name : 'BENTUK_PERUSAHAAN', type : 'int', mapping : 'BENTUK_PERUSAHAAN' },
					{ name : 'ALAMAT_PERUSAHAAN', type : 'string', mapping : 'ALAMAT_PERUSAHAAN' },
					{ name : 'ID_KOTA', type : 'int', mapping : 'ID_KOTA' },
					{ name : 'ID_KECAMATAN', type : 'int', mapping : 'ID_KECAMATAN' },
					{ name : 'ID_KELURAHAN', type : 'int', mapping : 'ID_KELURAHAN' },
					{ name : 'NAMA_KEGIATAN', type : 'string', mapping : 'NAMA_KEGIATAN' },
					{ name : 'JENIS_USAHA', type : 'string', mapping : 'JENIS_USAHA' },
					{ name : 'ALAMAT_LOKASI', type : 'string', mapping : 'ALAMAT_LOKASI' },
					{ name : 'ID_KELURAHAN_LOKASI', type : 'int', mapping : 'ID_KELURAHAN_LOKASI' },
					{ name : 'ID_KECAMATAN_LOKASI', type : 'int', mapping : 'ID_KECAMATAN_LOKASI' },
					{ name : 'STATUS_LOKASI', type : 'int', mapping : 'STATUS_LOKASI' },
					{ name : 'LUAS_USAHA', type : 'float', mapping : 'LUAS_USAHA' },
					{ name : 'LUAS_BAHAN', type : 'float', mapping : 'LUAS_BAHAN' },
					{ name : 'LUAS_BANGUNAN', type : 'float', mapping : 'LUAS_BANGUNAN' },
					{ name : 'LUAS_RUANG_USAHA', type : 'float', mapping : 'LUAS_RUANG_USAHA' },
					{ name : 'KAPASITAS', type : 'float', mapping : 'KAPASITAS' },
					{ name : 'IZIN_SKTR', type : 'int', mapping : 'IZIN_SKTR' },
					{ name : 'IZIN_LOKASI', type : 'int', mapping : 'IZIN_LOKASI' },
					{ name : 'pemohon_nama', type : 'string', mapping : 'pemohon_nama' },
					{ name : 'pemohon_alamat', type : 'string', mapping : 'pemohon_alamat' },
					{ name : 'pemohon_telp', type : 'string', mapping : 'pemohon_telp' },
					{ name : 'pemohon_npwp', type : 'string', mapping : 'pemohon_npwp' },
					{ name : 'pemohon_rt', type : 'int', mapping : 'pemohon_rt' },
					{ name : 'pemohon_rw', type : 'int', mapping : 'pemohon_rw' },
					{ name : 'pemohon_kel', type : 'string', mapping : 'pemohon_kel' },
					{ name : 'pemohon_kec', type : 'string', mapping : 'pemohon_kec' },
					{ name : 'pemohon_kota', type : 'string', mapping : 'pemohon_kota' },
					{ name : 'pemohon_nik', type : 'string', mapping : 'pemohon_nik' },
					{ name : 'pemohon_stra', type : 'string', mapping : 'pemohon_stra' },
					{ name : 'pemohon_surattugas', type : 'string', mapping : 'pemohon_surattugas' },
					{ name : 'pemohon_pekerjaan', type : 'string', mapping : 'pemohon_pekerjaan' },
					{ name : 'pemohon_tempatlahir', type : 'string', mapping : 'pemohon_tempatlahir' },
					{ name : 'pemohon_tanggallahir', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'pemohon_tanggallahir' },
					{ name : 'pemohon_user_id', type : 'int', mapping : 'pemohon_user_id' },
					{ name : 'pemohon_pendidikan', type : 'string', mapping : 'pemohon_pendidikan' },
					{ name : 'pemohon_tahunlulus', type : 'int', mapping : 'pemohon_tahunlulus' },
					{ name : 'pemohon_wn', type : 'string', mapping : 'pemohon_wn' },
					{ name : 'pemohon_hp', type : 'string', mapping : 'pemohon_hp' },
					{ name : 'pemohon_id', type : 'string', mapping : 'pemohon_id' },
				]
			}),
			displayField : 'NO_SK',
			valueField : 'ID_IJIN_LINGKUNGAN',
			queryMode : 'remote',
			triggerAction : 'query',
			repeatTriggerClick : true,
			minChars : 100,
			triggerCls : 'x-form-search-trigger',
			forceSelection : false,
			onTriggerClick: function(event){
				var store = NO_SK_LAMAField.getStore();
				var val = NO_SK_LAMAField.getRawValue();
				store.proxy.extraParams = {action : 'SEARCH',NO_SK : val};
				store.load();
				NO_SK_LAMAField.expand();
				NO_SK_LAMAField.fireEvent("ontriggerclick", this, event);
			},  
			tpl: Ext.create('Ext.XTemplate',
				'<tpl for=".">',
					'<div class="x-boundlist-item">No. SK : {NO_SK}<br>NPWP / NPWPD : {NPWPD}<br>Nama Perusahaan : {NAMA_PERUSAHAAN}<br>Alamat Perusahaan : {ALAMAT_PERUSAHAAN}</div>',
				'</tpl>'
			),
			listeners : {
				select : function(cmb, record){
					var rec=record[0];
					NPWPDField.setValue(rec.get('NPWPD'));
					NAMA_PERUSAHAANField.setValue(rec.get('NAMA_PERUSAHAAN'));
					NO_AKTEField.setValue(rec.get('NO_AKTE'));
					BENTUK_PERUSAHAANField.setValue(rec.get('BENTUK_PERUSAHAAN'));
					ALAMAT_PERUSAHAANField.setValue(rec.get('ALAMAT_PERUSAHAAN'));
					ID_KOTAField.setValue(rec.get('ID_KOTA'));
					ID_KECAMATANField.setValue(rec.get('ID_KECAMATAN'));
					ID_KELURAHANField.setValue(rec.get('ID_KELURAHAN'));
					NAMA_KEGIATANField.setValue(rec.get('NAMA_KEGIATAN'));
					JENIS_USAHAField.setValue(rec.get('JENIS_USAHA'));
					ALAMAT_LOKASIField.setValue(rec.get('ALAMAT_LOKASI'));
					ID_KELURAHAN_LOKASIField.setValue(rec.get('ID_KELURAHAN_LOKASI'));
					ID_KECAMATAN_LOKASIField.setValue(rec.get('ID_KECAMATAN_LOKASI'));
					STATUS_LOKASIField.setValue(rec.get('STATUS_LOKASI'));
					LUAS_USAHAField.setValue(rec.get('LUAS_USAHA'));
					LUAS_BAHANField.setValue(rec.get('LUAS_BAHAN'));
					LUAS_BANGUNANField.setValue(rec.get('LUAS_BANGUNAN'));
					LUAS_RUANG_USAHAField.setValue(rec.get('LUAS_RUANG_USAHA'));
					KAPASITASField.setValue(rec.get('KAPASITAS'));
					IZIN_SKTRField.setValue(rec.get('IZIN_SKTR'));
					IZIN_LOKASIField.setValue(rec.get('IZIN_LOKASI'));
				}
			}
		});
		var pemohon_nikField = Ext.create('Ext.form.ComboBox',{
			name : 'pemohon_nikField',
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
					{ name : 'pemohon_wn', type : 'int', mapping : 'pemohon_wn' },
					{ name : 'pemohon_kota', type : 'int', mapping : 'pemohon_kota' },
					{ name : 'pemohon_hp', type : 'int', mapping : 'pemohon_hp' },
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
				var store = pemohon_nikField.getStore();
				var val = pemohon_nikField.getRawValue();
				store.proxy.extraParams = {action : 'SEARCH',pemohon_nik : val};
				store.load();
				pemohon_nikField.expand();
				pemohon_nikField.fireEvent("ontriggerclick", this, event);
			},  
			tpl: Ext.create('Ext.XTemplate',
				'<tpl for=".">',
					'<div class="x-boundlist-item">NIK : {pemohon_nik}<br>Nama : {pemohon_nama}<br>Alamat : {pemohon_alamat}<br>Telp : {pemohon_telp}<br></div>',
				'</tpl>'
			),
			listeners : {
				select : function(cmb, record){
					var rec=record[0];
					pemohon_nikField.setValue(rec.get('pemohon_nik'));
					pemohon_idField.setValue(rec.get('pemohon_id'));
					pemohon_namaField.setValue(rec.get('pemohon_nama'));
					pemohon_alamatField.setValue(rec.get('pemohon_alamat'));
					pemohon_telpField.setValue(rec.get('pemohon_telp'));
					pemohon_tempatlahirField.setValue(rec.get('pemohon_tempatlahir'));
					pemohon_tanggallahirField.setValue(rec.get('pemohon_tanggallahir'));
					pemohon_pekerjaanField.setValue(rec.get('pemohon_pekerjaan'));
					pemohon_wnField.setValue(rec.get('pemohon_wn'));
					pemohon_rtField.setValue(rec.get('pemohon_rt'));
					pemohon_rwField.setValue(rec.get('pemohon_rw'));
					pemohon_kelField.setValue(rec.get('pemohon_kel'));
					pemohon_kecField.setValue(rec.get('pemohon_kec'));
					pemohon_kotaField.setValue(rec.get('pemohon_kota'));
					pemohon_hpField.setValue(rec.get('pemohon_hp'));
				}
			}
		});
		/*Data Pemohon*/
		pemohon_pekerjaanField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_pekerjaanField',
			name : 'pemohon_pekerjaan',
			fieldLabel : 'Pekerjaan',
			maxLength : 50
		});
		// pemohon_nikField = Ext.create('Ext.form.TextField',{
			// id : 'pemohon_nikField',
			// name : 'pemohon_nik',
			// fieldLabel : 'NIK',
			// maxLength : 20
		// });
		pemohon_namaField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_namaField',
			name : 'pemohon_nama',
			fieldLabel : 'Nama Lengkap',
			maxLength : 50
		});
		pemohon_idField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_idField',
			name : 'pemohon_id',
			fieldLabel : '',
			maxLength : 50,
			hidden:true
		});
		pemohon_alamatField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_alamatField',
			name : 'pemohon_alamat',
			fieldLabel : 'Alamat',
			maxLength : 100
		});
		pemohon_telpField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_telpField',
			name : 'pemohon_telp',
			fieldLabel : 'Telp',
			maxLength : 20
		});
		pemohon_hpField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_hpField',
			name : 'pemohon_hp',
			fieldLabel : 'HP',
			maxLength : 20
		});
		pemohon_rtField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_rtField',
			name : 'pemohon_rt',
			fieldLabel : 'RT',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		pemohon_rwField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_rwField',
			name : 'pemohon_rw',
			fieldLabel : 'RW',
			allowNegatife : false,
			//blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		pemohon_kelField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_kelField',
			name : 'pemohon_kel',
			fieldLabel : 'Kelurahan',
			maxLength : 50
		});
		pemohon_kecField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_kecField',
			name : 'pemohon_kec',
			fieldLabel : 'Kecamatan',
			maxLength : 50
		});
		pemohon_kotaField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_kotaField',
			name : 'pemohon_kota',
			fieldLabel : 'Kota',
			maxLength : 50
		});
		pemohon_wnField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_wnField',
			name : 'pemohon_wn',
			fieldLabel : 'Kewarganegaraan',
			maxLength : 50
		});
		pemohon_tempatlahirField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_tempatlahirField',
			name : 'pemohon_tempatlahir',
			fieldLabel : 'Tempat Lahir',
			maxLength : 50
		});
		pemohon_tanggallahirField = Ext.create('Ext.form.Date',{
			id : 'pemohon_tanggallahirField',
			name : 'pemohon_tanggallahir',
			fieldLabel : 'Tanggal Lahir',
			maxLength : 10
		});
		/*End Data Pemohon*/
		var in_lingkungan_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : in_lingkungan_save
		});
		var in_lingkungan_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				in_lingkungan_resetForm();
				in_lingkungan_switchToGrid();
				$('html, body').animate({scrollTop: 0}, 500);
			}
		});
		
		/*Get Syarat*/
		lingkungan_syaratDataStore = Ext.create('Ext.data.Store',{
			id : 'lingkungan_syaratDataStore',
			pageSize : globalPageSize,
			autoLoad : true,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_ijin_lingkungan/switchAction',
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
				{ name : 'ID_IJIN', type : 'int', mapping : 'ID_IJIN' },
				{ name : 'ID_SYARAT', type : 'int', mapping : 'ID_SYARAT' },
				{ name : 'NAMA_SYARAT', type : 'string', mapping : 'NAMA_SYARAT' },
				{ name : 'KETERANGAN', type : 'string', mapping : 'KETERANGAN' }
				]
		});
		var lingkungan_syaratGridEditor = new Ext.grid.plugin.CellEditing({
			clicksToEdit: 1
		});
		lingkungan_syaratGrid = Ext.create('Ext.grid.Panel',{
			id : 'lingkungan_syaratDataStore',
			store : lingkungan_syaratDataStore,
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
					text : 'ID_IJIN',
					dataIndex : 'ID_IJIN',
					width : 100,
					hidden : true,
					sortable : false
				},
				{
					text : 'ID_SYARAT',
					dataIndex : 'ID_SYARAT',
					width : 100,
					hidden : true,
					sortable : false
				},
				{
					text : 'Nama Syarat',
					dataIndex : 'NAMA_SYARAT',
					width : 300,
					sortable : false
				},{
					text : 'Keterangan',
					dataIndex : 'KETERANGAN',
					width : 200,
					sortable : false,
					editor: 'textfield',
					flex : 1
				}
			]
		});
		/*End Syarat*/
		
		in_lingkungan_formPanel = Ext.create('Ext.form.Panel', {
			// disabled : true,
			// fieldDefaults: {
				// msgTarget: 'side'
			// },
			// layout : {
				// type : 'vbox',
				// align : 'stretch',
				// padding : 5
			// },
			disabled : true,
			frame : true,
			layout : {
				type : 'form',
				padding : 5
			},
			items: [
				{
					xtype : 'fieldset',
					title : 'Permohonan Ijin Lingkungan',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						JENIS_PERMOHONANField,
						NO_SK_LAMAField
						]
				},{
					xtype : 'fieldset',
					title : '1. Data Permohon',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						pemohon_nikField,
						pemohon_namaField,
						pemohon_tempatlahirField,
						pemohon_tanggallahirField,
						pemohon_pekerjaanField,
						pemohon_wnField,
						pemohon_alamatField,
						pemohon_rtField,
						pemohon_rwField,
						pemohon_kelField,
						pemohon_kecField,
						pemohon_kotaField,
						pemohon_telpField,						
						pemohon_hpField,						
						]
				},{
					xtype : 'fieldset',
					title : '2. Data Perusahaan',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						NPWPDField,
						NAMA_PERUSAHAANField,
						NO_AKTEField,
						BENTUK_PERUSAHAANField,
						ALAMAT_PERUSAHAANField,
						ID_KOTAField,
						ID_KECAMATANField,
						ID_KELURAHANField
						]
				},{
					xtype : 'fieldset',
					title : '3. Data Lokasi',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						NAMA_KEGIATANField,
						JENIS_USAHAField,
						ALAMAT_LOKASIField,
						ID_KELURAHAN_LOKASIField,
						ID_KECAMATAN_LOKASIField,
						STATUS_LOKASIField,
						LUAS_USAHAField,
						LUAS_BAHANField,
						LUAS_BANGUNANField,
						LUAS_RUANG_USAHAField,
						KAPASITASField,
						IZIN_SKTRField,
						IZIN_LOKASIField,
						<?//php echo ($_SESSION["IDHAK"] == 2) ? ("") : ("STATUSField,"); ?>
						<?php echo ($_SESSION["IDHAK"] == 2) ? ("") : ("STATUS_SURVEYField,"); ?>
						<?php echo ($_SESSION["IDHAK"] == 2) ? ("") : ("TGL_AKHIRField,"); ?>
						<?php echo ($_SESSION["IDHAK"] == 2) ? ("") : ("RETRIBUSI_STATUSField,"); ?>
						<?php echo ($_SESSION["IDHAK"] == 2) ? ("") : ("RETRIBUSIField,"); ?>
						]
				},{
					xtype : 'fieldset',
					title : '4. Data Kelengkapan',
					columnWidth : 0.5,
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						lingkungan_syaratGrid
					]
				},{
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [in_lingkungan_saveButton,in_lingkungan_cancelButton]
		});
		in_lingkungan_formWindow = Ext.create('Ext.window.Window',{
			id : 'in_lingkungan_formWindow',
			renderTo : 'in_lingkunganSaveWindow',
			title : globalFormAddEditTitle + ' ' + in_lingkungan_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [in_lingkungan_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		ID_IJIN_LINGKUNGAN_INTISearchField = Ext.create('Ext.form.NumberField',{
			id : 'ID_IJIN_LINGKUNGAN_INTISearchField',
			name : 'ID_IJIN_LINGKUNGAN_INTI',
			fieldLabel : 'ID_IJIN_LINGKUNGAN_INTI',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		NO_REGSearchField = Ext.create('Ext.form.TextField',{
			id : 'NO_REGSearchField',
			name : 'NO_REG',
			fieldLabel : 'NO_REG',
			maxLength : 50
		
		});
		NO_SKSearchField = Ext.create('Ext.form.TextField',{
			id : 'NO_SKSearchField',
			name : 'NO_SK',
			fieldLabel : 'NO_SK',
			maxLength : 50
		
		});
		NAMA_DIREKTURSearchField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_DIREKTURSearchField',
			name : 'NAMA_DIREKTUR',
			fieldLabel : 'NAMA_DIREKTUR',
			maxLength : 50
		
		});
		JENIS_PERMOHONANSearchField = Ext.create('Ext.form.NumberField',{
			id : 'JENIS_PERMOHONANSearchField',
			name : 'JENIS_PERMOHONAN',
			fieldLabel : 'JENIS_PERMOHONAN',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		TGL_PERMOHONANSearchField = Ext.create('Ext.form.TextField',{
			id : 'TGL_PERMOHONANSearchField',
			name : 'TGL_PERMOHONAN',
			fieldLabel : 'TGL_PERMOHONAN',
			maxLength : 0
		
		});
		TGL_AWALSearchField = Ext.create('Ext.form.TextField',{
			id : 'TGL_AWALSearchField',
			name : 'TGL_AWAL',
			fieldLabel : 'TGL_AWAL',
			maxLength : 0
		
		});
		TGL_AKHIRSearchField = Ext.create('Ext.form.TextField',{
			id : 'TGL_AKHIRSearchField',
			name : 'TGL_AKHIR',
			fieldLabel : 'TGL_AKHIR',
			maxLength : 0
		
		});
		STATUSSearchField = Ext.create('Ext.form.NumberField',{
			id : 'STATUSSearchField',
			name : 'STATUS',
			fieldLabel : 'STATUS',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		STATUS_SURVEYSearchField = Ext.create('Ext.form.NumberField',{
			id : 'STATUS_SURVEYSearchField',
			name : 'STATUS_SURVEY',
			fieldLabel : 'STATUS_SURVEY',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		var in_lingkungan_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : in_lingkungan_search
		});
		var in_lingkungan_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				in_lingkungan_searchWindow.hide();
			}
		});
		in_lingkungan_searchPanel = Ext.create('Ext.form.Panel', {
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
						ID_IJIN_LINGKUNGAN_INTISearchField,
						NO_REGSearchField,
						NO_SKSearchField,
						NAMA_DIREKTURSearchField,
						JENIS_PERMOHONANSearchField,
						TGL_PERMOHONANSearchField,
						TGL_AWALSearchField,
						TGL_AKHIRSearchField,
						STATUSSearchField,
						STATUS_SURVEYSearchField,
						]
				}],
			buttons : [in_lingkungan_searchingButton,in_lingkungan_cancelSearchButton]
		});
		in_lingkungan_searchWindow = Ext.create('Ext.window.Window',{
			id : 'in_lingkungan_searchWindow',
			renderTo : 'in_lingkunganSearchWindow',
			title : globalFormSearchTitle + ' ' + in_lingkungan_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [in_lingkungan_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="in_lingkunganSaveWindow"></div>
<div id="in_lingkunganSearchWindow"></div>
<div class="span12" id="in_lingkunganGrid"></div>