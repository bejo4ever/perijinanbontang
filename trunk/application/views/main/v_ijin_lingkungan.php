<style>
	.checked{
		background-image:url(../assets/images/icons/check.png) !important;
		margin:auto;
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
					var array_lingkungan_keterangan=new Array();
					if(lingkungan_syaratDataStore.getCount() > 0){
						for(var i=0;i<lingkungan_syaratDataStore.getCount();i++){
							array_lingkungan_keterangan.push(lingkungan_syaratDataStore.getAt(i).data.KETERANGAN);
						}
					}
					
					var params = in_lingkungan_formPanel.getForm().getValues();
					params.ID_KOTA=perusahaan_bentuk_idField.getRawValue();
					params.JENIS_USAHA=perusahaan_kabkota_idField.getRawValue();
					params.JENIS_USAHA=perusahaan_kecamatan_idField.getRawValue();
					params.JENIS_USAHA=perusahaan_desa_idField.getRawValue();
					params.ijin_id = 28;
					params.action = in_lingkungan_dbTask;
					params.KETERANGAN = array_lingkungan_keterangan;
					params = Ext.encode(params);
					
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_ijin_lingkungan/switchAction',
						params: {							
							params : params,
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
			in_lingkungan_formPanel.loadRecord(record);
			ID_SKTRField.setValue(record.data.ID_SKTR);
			JENIS_PERMOHONANField.setValue(record.data.JENIS_PERMOHONAN);
			/* ID_IJIN_LINGKUNGANField.setValue(record.data.ID_IJIN_LINGKUNGAN);
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
			RETRIBUSIField.setValue(record.data.RETRIBUSI); */
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
				{ name : 'pemohon_tahunlulus', type : 'int', mapping : 'pemohon_tahunlulus' },
				{ name : 'perusahaan_id', type : 'int', mapping : 'perusahaan_id' },
				{ name : 'perusahaan_npwp', type : 'string', mapping : 'perusahaan_npwp' },
				{ name : 'perusahaan_nama', type : 'string', mapping : 'perusahaan_nama' },
				{ name : 'perusahaan_noakta', type : 'string', mapping : 'perusahaan_noakta' },
				{ name : 'perusahaan_notaris', type : 'string', mapping : 'perusahaan_notaris' },
				{ name : 'perusahaan_tglakta', type : 'date', dateFormat : 'Y-m-d', mapping : 'perusahaan_tglakta' },
				{ name : 'perusahaan_bentuk_id', type : 'int', mapping : 'perusahaan_bentuk_id' },
				{ name : 'perusahaan_kualifikasi_id', type : 'int', mapping : 'perusahaan_kualifikasi_id' },
				{ name : 'perusahaan_alamat', type : 'string', mapping : 'perusahaan_alamat' },
				{ name : 'perusahaan_rt', type : 'int', mapping : 'perusahaan_rt' },
				{ name : 'perusahaan_rw', type : 'int', mapping : 'perusahaan_rw' },
				{ name : 'perusahaan_propinsi_id', type : 'int', mapping : 'perusahaan_propinsi_id' },
				{ name : 'perusahaan_kabkota_id', type : 'int', mapping : 'perusahaan_kabkota_id' },
				{ name : 'perusahaan_kecamatan_id', type : 'int', mapping : 'perusahaan_kecamatan_id' },
				{ name : 'perusahaan_desa_id', type : 'int', mapping : 'perusahaan_desa_id' },
				{ name : 'perusahaan_kodepos', type : 'string', mapping : 'perusahaan_kodepos' },
				{ name : 'perusahaan_telp', type : 'string', mapping : 'perusahaan_telp' },
				{ name : 'perusahaan_fax', type : 'string', mapping : 'perusahaan_fax' },
				{ name : 'perusahaan_stempat_id', type : 'int', mapping : 'perusahaan_stempat_id' },
				{ name : 'perusahaan_sperusahaan_id', type : 'int', mapping : 'perusahaan_sperusahaan_id' },
				{ name : 'perusahaan_usaha', type : 'string', mapping : 'perusahaan_usaha' },
				{ name : 'perusahaan_butara', type : 'string', mapping : 'perusahaan_butara' },
				{ name : 'perusahaan_bselatan', type : 'string', mapping : 'perusahaan_bselatan' },
				{ name : 'perusahaan_btimur', type : 'string', mapping : 'perusahaan_btimur' },
				{ name : 'perusahaan_bbarat', type : 'string', mapping : 'perusahaan_bbarat' },
				{ name : 'perusahaan_modal', type : 'float', mapping : 'perusahaan_modal' },
				{ name : 'perusahaan_merk', type : 'int', mapping : 'perusahaan_merk' },
				{ name : 'perusahaan_jusaha_id', type : 'int', mapping : 'perusahaan_jusaha_id' }
				]
		});
		kelurahan_dataStore = Ext.create('Ext.data.Store',{
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_public_function/get_kelurahan',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'id'
				},
				actionMethods : {
					read : 'POST'
				}
			}),
			fields : [
				{ name : 'id', type : 'int', mapping : 'id' },
				{ name : 'desa', type : 'string', mapping : 'desa' }
			]
		});
		kecamatan_dataStore = Ext.create('Ext.data.Store',{
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_public_function/get_kecamatan',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'id'
				},
				actionMethods : {
					read : 'POST'
				}
			}),
			fields : [
				{ name : 'id', type : 'int', mapping : 'id' },
				{ name : 'kecamatan', type : 'string', mapping : 'kecamatan' }
			]
		});
		kabkota_dataStore = Ext.create('Ext.data.Store',{
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_public_function/get_kabkota',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'id'
				},
				actionMethods : {
					read : 'POST'
				}
			}),
			fields : [
				{ name : 'id', type : 'int', mapping : 'id' },
				{ name : 'kabkota', type : 'string', mapping : 'kabkota' }
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
			name : 'permohonan_id',
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
			name : 'permohonan_retribusi',
			fieldLabel : 'Retribusi',
			maxLength : 50
		});
		retibusiTanggalField = Ext.create('Ext.form.field.Date',{
			name : 'permohonan_retribusi_tanggal',
			fieldLabel : 'Tanggal',
			format : 'd-m-Y',
			hidden : true,
			value : new Date('<?php echo date('Y-m-d').'T'.date('H:i:s'); ?>')
		});
		NAMA_DIREKTURField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_DIREKTURField',
			name : 'NAMA_DIREKTUR',
			fieldLabel : 'NAMA_DIREKTUR',
			maxLength : 50
		});
		JENIS_PERMOHONANField = Ext.create('Ext.form.ComboBox',{
			id : 'JENIS_PERMOHONANField',
			name : 'permohonan_jenis',
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
					}else{
						NO_SK_LAMAField.hide();
					}
				}
			}
		});
		TGL_PERMOHONANField = Ext.create('Ext.form.TextField',{
			id : 'TGL_PERMOHONANField',
			name : 'permohonan_tanggal',
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
			name : 'permohonan_kadaluarsa',
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
		/* ID_KOTAField = Ext.create('Ext.form.TextField',{
			id : 'ID_KOTAField',
			name : 'ID_KOTA',
			fieldLabel : 'Kota',
			// allowNegatife : false,
			// blankText : '0',
			// allowDecimals : false,
			// maskRe : /([0-9]+)$/
			maxLength : 50
			});
		ID_KECAMATANField = Ext.create('Ext.form.TextField',{
			id : 'ID_KECAMATANField',
			name : 'ID_KECAMATAN',
			fieldLabel : 'Kecamatan',
			// allowNegatife : false,
			// blankText : '0',
			// allowDecimals : false,
			// maskRe : /([0-9]+)$/
			maxLength : 50
			});
		ID_KELURAHANField = Ext.create('Ext.form.TextField',{
			id : 'ID_KELURAHANField',
			name : 'ID_KELURAHAN',
			fieldLabel : 'Kelurahan',
			// allowNegatife : false,
			// blankText : '0',
			// allowDecimals : false,
			// maskRe : /([0-9]+)$/
			maxLength : 50
			}); */
		var ID_KELURAHANField = Ext.create('Ext.form.ComboBox',{
			name : 'ID_KELURAHAN',
			fieldLabel : 'Kelurahan',
			store : kelurahan_dataStore,
			displayField : 'desa',
			valueField : 'id',
			triggerAction : 'all',
			queryMode : 'local',
			listeners : {
				afterrender : function(){
					kelurahan_dataStore.load();
				}
			}
		});
		var ID_KECAMATANField = Ext.create('Ext.form.ComboBox',{
			name : 'ID_KECAMATAN',
			fieldLabel : 'Kecamatan',
			store : kecamatan_dataStore,
			displayField : 'kecamatan',
			valueField : 'id',
			triggerAction : 'all',
			queryMode : 'local',
			listeners : {
				afterrender : function(){
					kecamatan_dataStore.load();
				}
			}
		});
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
				fields : ['skin_lingkungan_id', 'sktr'],
				data : [[1,'Ada'],[0,'Tidak Ada']]
			}),
			displayField : 'sktr',
			valueField : 'skin_lingkungan_id',
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
		/* START DATA PEMOHON */
		var in_lingkungan_det_pemohon_idField = Ext.create('Ext.form.Hidden',{
			name : 'pemohon_id'
		});
		var in_lingkungan_det_pemohon_namaField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_nama',
			fieldLabel : 'Nama',
			maxLength : 50
		});
		var in_lingkungan_det_pemohon_alamatField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_alamat',
			fieldLabel : 'Alamat',
			maxLength : 100
		});
		var in_lingkungan_det_pemohon_telpField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_telp',
			fieldLabel : 'Telp',
			maxLength : 20,
			maskRe : /([0-9]+)$/
		});
		var in_lingkungan_det_pemohon_npwpField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_npwp',
			fieldLabel : 'NPWP',
			maxLength : 50
		});
		var in_lingkungan_det_pemohon_rtField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_rt',
			fieldLabel : 'RT',
			maskRe : /([0-9]+)$/
		});
		var in_lingkungan_det_pemohon_rwField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_rw',
			fieldLabel : 'RW',
			maskRe : /([0-9]+)$/
		});
		var in_lingkungan_det_pemohon_kelField = Ext.create('Ext.form.ComboBox',{
			name : 'pemohon_kel',
			fieldLabel : 'Kelurahan',
			store : kelurahan_dataStore,
			displayField : 'desa',
			valueField : 'id',
			triggerAction : 'all',
			queryMode : 'local',
			listeners : {
				afterrender : function(){
					kelurahan_dataStore.load();
				}
			}
		});
		var in_lingkungan_det_pemohon_kecField = Ext.create('Ext.form.ComboBox',{
			name : 'pemohon_kec',
			fieldLabel : 'Kecamatan',
			store : kecamatan_dataStore,
			displayField : 'kecamatan',
			valueField : 'id',
			triggerAction : 'all',
			queryMode : 'local',
			listeners : {
				afterrender : function(){
					kecamatan_dataStore.load();
				}
			}
		});
		var in_lingkungan_det_pemohon_nikField = Ext.create('Ext.form.ComboBox',{
			name : 'pemohon_nik',
			fieldLabel : 'NIK',
			pageSize : 15,
			store : Ext.create('Ext.data.Store',{
				pageSize : globalPageSize,
				proxy : Ext.create('Ext.data.HttpProxy',{
					url : 'c_m_pemohon/switchAction',
					reader : {
						type : 'json', root : 'results', rootProperty : 'results', totalProperty : 'total', idProperty : 'pemohon_id'
					},
					actionMethods : { read : 'POST' },
					extraParams : { action : 'GETLIST' }
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
				var store = in_lingkungan_det_pemohon_nikField.getStore();
				var val = in_lingkungan_det_pemohon_nikField.getRawValue();
				store.proxy.extraParams = {action : 'GETLIST',query : val};
				store.load();
				in_lingkungan_det_pemohon_nikField.expand();
				in_lingkungan_det_pemohon_nikField.fireEvent("ontriggerclick", this, event);
			},  
			tpl: Ext.create('Ext.XTemplate',
				'<tpl for=".">',
					'<div class="x-boundlist-item">NIK : {pemohon_nik}<br>Nama : {pemohon_nama}<br>Alamat : {pemohon_alamat}<br>Telp : {pemohon_telp}<br></div>',
				'</tpl>'
			),
			listeners : {
				select : function(cmb, record){
					var rec=record[0];
					in_lingkungan_det_pemohon_idField.setValue(rec.get('pemohon_id'));
					in_lingkungan_det_pemohon_nikField.setValue(rec.get('pemohon_nik'));
					in_lingkungan_det_pemohon_namaField.setValue(rec.get('pemohon_nama'));
					in_lingkungan_det_pemohon_alamatField.setValue(rec.get('pemohon_alamat'));
					in_lingkungan_det_pemohon_telpField.setValue(rec.get('pemohon_telp'));
					in_lingkungan_det_pemohon_npwpField.setValue(rec.get('pemohon_npwp'));
					in_lingkungan_det_pemohon_rtField.setValue(rec.get('pemohon_rt'));
					in_lingkungan_det_pemohon_rwField.setValue(rec.get('pemohon_rw'));
					in_lingkungan_det_pemohon_kelField.setValue(rec.get('pemohon_kel'));
					in_lingkungan_det_pemohon_kecField.setValue(rec.get('pemohon_kec'));
					in_lingkungan_det_pemohon_straField.setValue(rec.get('pemohon_stra'));
					in_lingkungan_det_pemohon_surattugasField.setValue(rec.get('pemohon_surattugas'));
					in_lingkungan_det_pemohon_pekerjaanField.setValue(rec.get('pemohon_pekerjaan'));
					in_lingkungan_det_pemohon_tempatlahirField.setValue(rec.get('pemohon_tempatlahir'));
					in_lingkungan_det_pemohon_tanggallahirField.setValue(rec.get('pemohon_tanggallahir'));
					in_lingkungan_det_pemohon_user_idField.setValue(rec.get('pemohon_user_id'));
					in_lingkungan_det_pemohon_pendidikanField.setValue(rec.get('pemohon_pendidikan'));
					in_lingkungan_det_pemohon_tahunlulusField.setValue(rec.get('pemohon_tahunlulus'));
				}
			}
		});
		var in_lingkungan_det_pemohon_straField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_stra',
			fieldLabel : 'STRA',
			hidden : true,
			maxLength : 50
		});
		var in_lingkungan_det_pemohon_surattugasField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_surattugas',
			fieldLabel : 'Surat Tugas',
			hidden : true,
			maxLength : 50
		});
		var in_lingkungan_det_pemohon_pekerjaanField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_pekerjaan',
			fieldLabel : 'Pekerjaan',
			maxLength : 50
		});
		var in_lingkungan_det_pemohon_tempatlahirField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_tempatlahir',
			fieldLabel : 'Tempat Lahir',
			maxLength : 50
		});
		var in_lingkungan_det_pemohon_tanggallahirField = Ext.create('Ext.form.field.Date',{
			name : 'pemohon_tanggallahir',
			fieldLabel : 'Tanggal Lahir',
			format : 'd-m-Y'
		});
		var in_lingkungan_det_pemohon_user_idField = Ext.create('Ext.form.Hidden',{
			name : 'pemohon_user_id',
		});
		var in_lingkungan_det_pemohon_pendidikanField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_pendidikan',
			fieldLabel : 'Pendidikan',
			maxLength : 50
		});
		var in_lingkungan_det_pemohon_tahunlulusField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_tahunlulus',
			fieldLabel : 'Tahun Lulus',
			maxLength : 4,
			maskRe : /([0-9]+)$/
		});
		
		/* START DATA PERUSAHAAN */
		perusahaan_idField = Ext.create('Ext.form.TextField',{
			name : 'perusahaan_id',
			hidden : true
		});
		perusahaan_npwpField = Ext.create('Ext.form.ComboBox',{
			name : 'perusahaan_npwp',
			fieldLabel : 'NPWP/NPWPD',
			pageSize : 15,
			store : Ext.create('Ext.data.Store',{
				pageSize : globalPageSize,
				proxy : Ext.create('Ext.data.HttpProxy',{
					url : 'c_perusahaan/switchAction',
					reader : {
						type : 'json', root : 'results', rootProperty : 'results', totalProperty : 'total', idProperty : 'id'
					},
					actionMethods : { read : 'POST' },
					extraParams : { action : 'GETLIST' }
				}),
				fields : [
					{ name : 'id', type : 'int', mapping : 'id' },
					{ name : 'npwp', type : 'string', mapping : 'npwp' },
					{ name : 'nama', type : 'string', mapping : 'nama' },
					{ name : 'noakta', type : 'string', mapping : 'noakta' },
					{ name : 'notaris', type : 'string', mapping : 'notaris' },
					{ name : 'tglakta', type : 'date',dateFormat : 'Y-m-d', mapping : 'tglakta' },
					{ name : 'bentuk_id', type : 'int', mapping : 'bentuk_id' },
					{ name : 'kualifikasi_id', type : 'int', mapping : 'kualifikasi_id' },
					{ name : 'alamat', type : 'string', mapping : 'alamat' },
					{ name : 'rt', type : 'int', mapping : 'rt' },
					{ name : 'rw', type : 'int', mapping : 'rw' },
					{ name : 'propinsi_id', type : 'int', mapping : 'propinsi_id' },
					{ name : 'kabkota_id', type : 'int', mapping : 'kabkota_id' },
					{ name : 'kecamatan_id', type : 'int', mapping : 'kecamatan_id' },
					{ name : 'desa_id', type : 'int', mapping : 'desa_id' },
					{ name : 'kodepos', type : 'string', mapping : 'kodepos' },
					{ name : 'telp', type : 'string', mapping : 'telp' },
					{ name : 'fax', type : 'string', mapping : 'fax' },
					{ name : 'stempat_id', type : 'int', mapping : 'stempat_id' },
					{ name : 'sperusahaan_id', type : 'int', mapping : 'sperusahaan_id' },
					{ name : 'usaha', type : 'string', mapping : 'usaha' },
					{ name : 'butara', type : 'string', mapping : 'butara' },
					{ name : 'bselatan', type : 'string', mapping : 'bselatan' },
					{ name : 'btimur', type : 'string', mapping : 'btimur' },
					{ name : 'bbarat', type : 'string', mapping : 'bbarat' },
					{ name : 'modal', type : 'float', mapping : 'modal' },
					{ name : 'merk', type : 'int', mapping : 'merk' },
					{ name : 'jusaha_id', type : 'int', mapping : 'jusaha_id' }
				]
			}),
			displayField : 'npwp',
			valueField : 'id',
			queryMode : 'remote',
			triggerAction : 'query',
			repeatTriggerClick : true,
			minChars : 100,
			triggerCls : 'x-form-search-trigger',
			forceSelection : false,
			onTriggerClick: function(event){
				var store = perusahaan_npwpField.getStore();
				var val = perusahaan_npwpField.getRawValue();
				store.proxy.extraParams = {action : 'GETLIST',query : val};
				store.load();
				perusahaan_npwpField.expand();
				perusahaan_npwpField.fireEvent("ontriggerclick", this, event);
			},  
			tpl: Ext.create('Ext.XTemplate',
				'<tpl for=".">',
					'<div class="x-boundlist-item">NPWP : {npwp}<br>Nama : {nama}<br>Alamat : {alamat}</div>',
				'</tpl>'
			),
			listeners : {
				select : function(cmb, record){
					var rec=record[0];
					perusahaan_idField.setValue(rec.get('id'));
					perusahaan_npwpField.setValue(rec.get('npwp'));
					perusahaan_namaField.setValue(rec.get('nama'));
					perusahaan_noaktaField.setValue(rec.get('noakta'));
					perusahaan_notarisField.setValue(rec.get('notaris'));
					perusahaan_tglaktaField.setValue(rec.get('tglakta'));
					perusahaan_bentuk_idField.setValue(rec.get('bentuk_id'));
					perusahaan_kualifikasi_idField.setValue(rec.get('kualifikasi_id'));
					perusahaan_alamatField.setValue(rec.get('alamat'));
					perusahaan_rtField.setValue(rec.get('rt'));
					perusahaan_rwField.setValue(rec.get('rw'));
					perusahaan_propinsi_idField.setValue(rec.get('propinsi_id'));
					perusahaan_kabkota_idField.setValue(rec.get('kabkota_id'));
					perusahaan_desa_idField.setValue(rec.get('desa_id'));
					perusahaan_kecamatan_idField.setValue(rec.get('kecamatan_id'));
					perusahaan_kodeposField.setValue(rec.get('kodepos'));
					perusahaan_telpField.setValue(rec.get('telp'));
					perusahaan_faxField.setValue(rec.get('fax'));
					perusahaan_stempat_idField.setValue(rec.get('stempat_id'));
					perusahaan_sperusahaan_idField.setValue(rec.get('sperusahaan_id'));
					perusahaan_usahaField.setValue(rec.get('usaha'));
					perusahaan_butaraField.setValue(rec.get('butara'));
					perusahaan_bselatanField.setValue(rec.get('bselatan'));
					perusahaan_btimurField.setValue(rec.get('btimur'));
					perusahaan_bbaratField.setValue(rec.get('bbarat'));
					perusahaan_modalField.setValue(rec.get('modal'));
					perusahaan_merkField.setValue(rec.get('merk'));
					perusahaan_jusaha_idField.setValue(rec.get('jusaha_id'));
				}
			}
		});
		perusahaan_namaField = Ext.create('Ext.form.TextField',{
			name : 'perusahaan_nama',
			fieldLabel : 'Nama',
			maxLength : 100
		});
		perusahaan_noaktaField = Ext.create('Ext.form.TextField',{
			name : 'perusahaan_noakta',
			fieldLabel : 'No. Akta',
			maxLength : 100
		});
		perusahaan_notarisField = Ext.create('Ext.form.TextField',{
			name : 'perusahaan_notaris',
			fieldLabel : 'Notaris',
			maxLength : 100
		});
		perusahaan_tglaktaField = Ext.create('Ext.form.field.Date',{
			name : 'perusahaan_tglakta',
			fieldLabel : 'Tgl Akta',
			format : 'd-m-Y',
			value : new Date('<?php echo date('Y-m-d').'T'.date('H:i:s'); ?>')
		});
		perusahaan_bentuk_idField = Ext.create('Ext.form.ComboBox',{
			name : 'perusahaan_bentuk_id',
			fieldLabel : 'Bentuk',
			store : Ext.create('Ext.data.Store',{
				pageSize : globalPageSize,
				proxy : Ext.create('Ext.data.HttpProxy',{
					url : 'c_public_function/get_bentuk_perusahaan',
					reader : {
						type : 'json',
						root : 'results',
						rootProperty : 'results',
						totalProperty : 'total',
						idProperty : 'id'
					},
					actionMethods : {
						read : 'POST'
					}
				}),
				fields : [
					{ name : 'id', type : 'int', mapping : 'id' },
					{ name : 'nama', type : 'string', mapping : 'nama' }
				]
			}),
			displayField : 'nama',
			valueField : 'id',
			triggerAction : 'all',
			queryMode : 'local',
			listeners : {
				afterrender : function(){
					perusahaan_bentuk_idField.getStore().load();
				}
			}
		});
		perusahaan_kualifikasi_idField = Ext.create('Ext.form.ComboBox',{
			name : 'perusahaan_kualifikasi_id',
			fieldLabel : 'Kualifikasi',
			store : Ext.create('Ext.data.Store',{
				pageSize : globalPageSize,
				proxy : Ext.create('Ext.data.HttpProxy',{
					url : 'c_public_function/get_kualifikasi',
					reader : {
						type : 'json',
						root : 'results',
						rootProperty : 'results',
						totalProperty : 'total',
						idProperty : 'id'
					},
					actionMethods : {
						read : 'POST'
					}
				}),
				fields : [
					{ name : 'id', type : 'int', mapping : 'id' },
					{ name : 'kualifikasi', type : 'string', mapping : 'kualifikasi' }
				]
			}),
			displayField : 'kualifikasi',
			valueField : 'id',
			triggerAction : 'all',
			queryMode : 'local',
			listeners : {
				afterrender : function(){
					perusahaan_kualifikasi_idField.getStore().load();
				}
			}
		});
		perusahaan_alamatField = Ext.create('Ext.form.TextField',{
			name : 'perusahaan_alamat',
			fieldLabel : 'Alamat',
			maxLength : 100
		});
		perusahaan_rtField = Ext.create('Ext.form.TextField',{
			name : 'perusahaan_rt',
			fieldLabel : 'RT',
			maxLength : 10
		});
		perusahaan_rwField = Ext.create('Ext.form.TextField',{
			name : 'perusahaan_rw',
			fieldLabel : 'RW',
			maxLength : 10
		});
		perusahaan_propinsi_idField = Ext.create('Ext.form.ComboBox',{
			name : 'perusahaan_propinsi_id',
			fieldLabel : 'Propinsi',
			store : Ext.create('Ext.data.Store',{
				pageSize : globalPageSize,
				proxy : Ext.create('Ext.data.HttpProxy',{
					url : 'c_public_function/get_propinsi',
					reader : {
						type : 'json',
						root : 'results',
						rootProperty : 'results',
						totalProperty : 'total',
						idProperty : 'id'
					},
					actionMethods : {
						read : 'POST'
					}
				}),
				fields : [
					{ name : 'id', type : 'int', mapping : 'id' },
					{ name : 'propinsi', type : 'string', mapping : 'propinsi' }
				]
			}),
			displayField : 'propinsi',
			valueField : 'id',
			triggerAction : 'all',
			queryMode : 'local',
			listeners : {
				afterrender : function(){
					perusahaan_propinsi_idField.getStore().load();
				}
			}
		});
		perusahaan_kabkota_idField = Ext.create('Ext.form.ComboBox',{
			name : 'perusahaan_kabkota_id',
			fieldLabel : 'Kota',
			store : Ext.create('Ext.data.Store',{
				pageSize : globalPageSize,
				proxy : Ext.create('Ext.data.HttpProxy',{
					url : 'c_public_function/get_kabkota',
					reader : {
						type : 'json',
						root : 'results',
						rootProperty : 'results',
						totalProperty : 'total',
						idProperty : 'id'
					},
					actionMethods : {
						read : 'POST'
					}
				}),
				fields : [
					{ name : 'id', type : 'int', mapping : 'id' },
					{ name : 'kabkota', type : 'string', mapping : 'kabkota' }
				]
			}),
			displayField : 'kabkota',
			valueField : 'id',
			triggerAction : 'all',
			queryMode : 'local',
			listeners : {
				afterrender : function(){
					perusahaan_kabkota_idField.getStore().load();
				}
			}
		});
		perusahaan_desa_idField = Ext.create('Ext.form.ComboBox',{
			name : 'perusahaan_desa_id',
			fieldLabel : 'Desa',
			store : kelurahan_dataStore,
			displayField : 'desa',
			valueField : 'id',
			triggerAction : 'all',
			queryMode : 'local'
		});
		perusahaan_kecamatan_idField = Ext.create('Ext.form.ComboBox',{
			name : 'perusahaan_kecamatan_id',
			fieldLabel : 'Kecamatan',
			store : kecamatan_dataStore,
			displayField : 'kecamatan',
			valueField : 'id',
			triggerAction : 'all',
			queryMode : 'local'
		});
		perusahaan_kodeposField = Ext.create('Ext.form.TextField',{
			name : 'perusahaan_kodepos',
			fieldLabel : 'Kodepos',
			maxLength : 20
		});
		perusahaan_telpField = Ext.create('Ext.form.TextField',{
			name : 'perusahaan_telp',
			fieldLabel : 'Telp',
			maxLength : 50
		});
		perusahaan_faxField = Ext.create('Ext.form.TextField',{
			name : 'perusahaan_fax',
			fieldLabel : 'Fax',
			maxLength : 50
		});
		perusahaan_stempat_idField = Ext.create('Ext.form.ComboBox',{
			name : 'perusahaan_stempat_id',
			fieldLabel : 'Status Tempat',
			store : Ext.create('Ext.data.Store',{
				pageSize : globalPageSize,
				proxy : Ext.create('Ext.data.HttpProxy',{
					url : 'c_public_function/get_status_tempat',
					reader : {
						type : 'json',
						root : 'results',
						rootProperty : 'results',
						totalProperty : 'total',
						idProperty : 'id'
					},
					actionMethods : {
						read : 'POST'
					}
				}),
				fields : [
					{ name : 'id', type : 'int', mapping : 'id' },
					{ name : 'status', type : 'string', mapping : 'status' }
				]
			}),
			displayField : 'status',
			valueField : 'id',
			triggerAction : 'all',
			queryMode : 'local',
			listeners : {
				afterrender : function(){
					perusahaan_stempat_idField.getStore().load();
				}
			}
		});
		perusahaan_sperusahaan_idField = Ext.create('Ext.form.ComboBox',{
			name : 'perusahaan_sperusahaan_id',
			fieldLabel : 'Status Usaha',
			store : Ext.create('Ext.data.Store',{
				pageSize : globalPageSize,
				proxy : Ext.create('Ext.data.HttpProxy',{
					url : 'c_public_function/get_status_usaha',
					reader : {
						type : 'json',
						root : 'results',
						rootProperty : 'results',
						totalProperty : 'total',
						idProperty : 'id'
					},
					actionMethods : {
						read : 'POST'
					}
				}),
				fields : [
					{ name : 'id', type : 'int', mapping : 'id' },
					{ name : 'status', type : 'string', mapping : 'status' }
				]
			}),
			displayField : 'status',
			valueField : 'id',
			triggerAction : 'all',
			queryMode : 'local',
			listeners : {
				afterrender : function(){
					perusahaan_sperusahaan_idField.getStore().load();
				}
			}
		});
		perusahaan_usahaField = Ext.create('Ext.form.TextField',{
			name : 'perusahaan_usaha',
			fieldLabel : 'Usaha',
			maxLength : 100
		});
		perusahaan_butaraField = Ext.create('Ext.form.TextField',{
			name : 'perusahaan_butara',
			fieldLabel : 'Batas Utara',
			maxLength : 100
		});
		perusahaan_bselatanField = Ext.create('Ext.form.TextField',{
			name : 'perusahaan_bselatan',
			fieldLabel : 'Batas Selatan',
			maxLength : 100
		});
		perusahaan_btimurField = Ext.create('Ext.form.TextField',{
			name : 'perusahaan_btimur',
			fieldLabel : 'Batas Timur',
			maxLength : 100
		});
		perusahaan_bbaratField = Ext.create('Ext.form.TextField',{
			name : 'perusahaan_bbarat',
			fieldLabel : 'Batas Barat',
			maxLength : 100
		});
		perusahaan_modalField = Ext.create('Ext.form.TextField',{
			name : 'perusahaan_modal',
			fieldLabel : 'Modal',
			maxLength : 50
		});
		perusahaan_merkField = Ext.create('Ext.form.ComboBox',{
			name : 'perusahaan_merk',
			fieldLabel : 'Merk',
			store : Ext.create('Ext.data.Store',{
				pageSize : globalPageSize,
				proxy : Ext.create('Ext.data.HttpProxy',{
					url : 'c_public_function/get_merk',
					reader : {
						type : 'json',
						root : 'results',
						rootProperty : 'results',
						totalProperty : 'total',
						idProperty : 'id'
					},
					actionMethods : {
						read : 'POST'
					}
				}),
				fields : [
					{ name : 'id', type : 'int', mapping : 'id' },
					{ name : 'merk', type : 'string', mapping : 'merk' }
				]
			}),
			displayField : 'merk',
			valueField : 'id',
			triggerAction : 'all',
			queryMode : 'local',
			listeners : {
				afterrender : function(){
					perusahaan_merkField.getStore().load();
				}
			}
		});
		perusahaan_jusaha_idField = Ext.create('Ext.form.ComboBox',{
			name : 'perusahaan_jusaha_id',
			fieldLabel : 'Jenis Usaha',
			store : Ext.create('Ext.data.Store',{
				pageSize : globalPageSize,
				proxy : Ext.create('Ext.data.HttpProxy',{
					url : 'c_public_function/get_jenis_usaha',
					reader : {
						type : 'json',
						root : 'results',
						rootProperty : 'results',
						totalProperty : 'total',
						idProperty : 'id'
					},
					actionMethods : {
						read : 'POST'
					}
				}),
				fields : [
					{ name : 'id', type : 'int', mapping : 'id' },
					{ name : 'usaha', type : 'string', mapping : 'usaha' }
				]
			}),
			displayField : 'usaha',
			valueField : 'id',
			triggerAction : 'all',
			queryMode : 'local',
			listeners : {
				afterrender : function(){
					perusahaan_jusaha_idField.getStore().load();
				}
			}
		});
		/* END DATA PERUSAHAAN */
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
						ID_IJIN_LINGKUNGAN_INTIField,
						ID_IJIN_LINGKUNGANField,
						JENIS_PERMOHONANField,
						TGL_PERMOHONANField,
						NO_SK_LAMAField
						]
				},{
					xtype : 'fieldset',
					title : '1. Data Pemohon',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						in_lingkungan_det_pemohon_idField,
						in_lingkungan_det_pemohon_nikField,
						in_lingkungan_det_pemohon_namaField,
						in_lingkungan_det_pemohon_alamatField,
						in_lingkungan_det_pemohon_telpField,
						in_lingkungan_det_pemohon_npwpField,
						in_lingkungan_det_pemohon_rtField,
						in_lingkungan_det_pemohon_rwField,
						in_lingkungan_det_pemohon_kelField,
						in_lingkungan_det_pemohon_kecField,
						in_lingkungan_det_pemohon_straField,
						in_lingkungan_det_pemohon_surattugasField,
						in_lingkungan_det_pemohon_pekerjaanField,
						in_lingkungan_det_pemohon_tempatlahirField,
						in_lingkungan_det_pemohon_tanggallahirField,
						in_lingkungan_det_pemohon_user_idField,
						in_lingkungan_det_pemohon_pendidikanField,
						in_lingkungan_det_pemohon_tahunlulusField					
						]
				},{
					xtype : 'fieldset',
					title : '2. Data Perusahaan',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						/* NPWPDField,
						NAMA_PERUSAHAANField,
						NO_AKTEField,
						BENTUK_PERUSAHAANField,
						ALAMAT_PERUSAHAANField,
						ID_KOTAField,
						ID_KECAMATANField,
						ID_KELURAHANField */
						perusahaan_idField,
						perusahaan_npwpField,
						perusahaan_namaField,
						perusahaan_noaktaField,
						perusahaan_notarisField,
						perusahaan_tglaktaField,
						perusahaan_bentuk_idField,
						perusahaan_kualifikasi_idField,
						perusahaan_alamatField,
						perusahaan_rtField,
						perusahaan_rwField,
						perusahaan_propinsi_idField,
						perusahaan_kabkota_idField,
						perusahaan_kecamatan_idField,
						perusahaan_desa_idField,
						perusahaan_kodeposField,
						perusahaan_telpField,
						perusahaan_faxField,
						perusahaan_stempat_idField,
						perusahaan_sperusahaan_idField,
						perusahaan_usahaField,
						perusahaan_butaraField,
						perusahaan_bselatanField,
						perusahaan_btimurField,
						perusahaan_bbaratField,
						perusahaan_modalField,
						perusahaan_merkField,
						perusahaan_jusaha_idField,
						NAMA_DIREKTURField
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
						<?php echo ($_SESSION["IDHAK"] == 2) ? ("") : ("STATUSField,"); ?>
						<?php echo ($_SESSION["IDHAK"] == 2) ? ("") : ("STATUS_SURVEYField,"); ?>
						<?php echo ($_SESSION["IDHAK"] == 2) ? ("") : ("TGL_AKHIRField,"); ?>
						<?php echo ($_SESSION["IDHAK"] == 2) ? ("") : ("RETRIBUSI_STATUSField,"); ?>
						<?php echo ($_SESSION["IDHAK"] == 2) ? ("") : ("RETRIBUSIField,"); ?>
						<?php echo ($_SESSION["IDHAK"] == 2) ? ("") : ("retibusiTanggalField,"); ?>
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