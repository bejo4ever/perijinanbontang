<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var in_lokasi_componentItemTitle="IN_LOKASI";
		var in_lokasi_dataStore;
		var lokasi_syaratDataStore;
		
		var in_lokasi_shorcut;
		var in_lokasi_contextMenu;
		var in_lokasi_gridSearchField;
		var in_lokasi_gridPanel;
		var in_lokasi_formPanel;
		var in_lokasi_formWindow;
		var in_lokasi_searchPanel;
		var in_lokasi_searchWindow;
		
		var ID_IJIN_LOKASIField;
		var ID_PEMOHONField;
		var NO_SKField;
		var NO_SK_LAMAField;
		var NPWPDField;
		var NO_AKTAField;
		var BENTUK_PERUSAHAANField;
		var ALAMATField;
		var RTField;
		var RWField;
		var ID_KELURAHANField;
		var ID_KECAMATANField;
		var ID_KOTAField;
		var TELPField;
		var FUNGSIField;
		var STATUS_TANAHField;
		var KETERANGAN_TANAHField;
		var LUAS_LOKASIField;
		var ALAMAT_LOKASIField;
		var ID_KELURAHAN_LOKASIField;
		var ID_KECAMATAN_LOKASIField;
				
		var ID_PEMOHONSearchField;
		var NO_SKSearchField;
		var NO_SK_LAMASearchField;
		var NPWPDSearchField;
		var NO_AKTASearchField;
		var BENTUK_PERUSAHAANSearchField;
		var ALAMATSearchField;
		var RTSearchField;
		var RWSearchField;
		var ID_KELURAHANSearchField;
		var ID_KECAMATANSearchField;
		var ID_KOTASearchField;
		var TELPSearchField;
		var FUNGSISearchField;
		var STATUS_TANAHSearchField;
		var KETERANGAN_TANAHSearchField;
		var LUAS_LOKASISearchField;
		var ALAMAT_LOKASISearchField;
		var ID_KELURAHAN_LOKASISearchField;
		var ID_KECAMATAN_LOKASISearchField;
				
		var in_lokasi_dbTask = 'CREATE';
		var in_lokasi_dbTaskMessage = 'Tambah';
		var in_lokasi_dbPermission = 'CRUD';
		var in_lokasi_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function in_lokasi_switchToGrid(){
			in_lokasi_formPanel.setDisabled(true);
			in_lokasi_gridPanel.setDisabled(false);
			in_lokasi_formWindow.hide();
		}
		
		function in_lokasi_switchToForm(){
			in_lokasi_gridPanel.setDisabled(true);
			in_lokasi_formPanel.setDisabled(false);
			in_lokasi_formWindow.show();
		}
		
		function in_lokasi_confirmAdd(){
			in_lokasi_dbTask = 'CREATE';
			in_lokasi_dbTaskMessage = 'created';
			in_lokasi_resetForm();
			in_lokasi_switchToForm();
		}
		
		function in_lokasi_confirmUpdate(){
			if(in_lokasi_gridPanel.selModel.getCount() == 1) {
				in_lokasi_dbTask = 'UPDATE';
				in_lokasi_dbTaskMessage = 'updated';
				in_lokasi_switchToForm();
				in_lokasi_setForm();
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
		
		function in_lokasi_confirmDelete(){
			if(in_lokasi_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, in_lokasi_delete);
			}else if(in_lokasi_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, in_lokasi_delete);
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
		
		function in_lokasi_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(in_lokasi_dbPermission)==false && pattC.test(in_lokasi_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(in_lokasi_confirmFormValid()){
					var ID_IJIN_LOKASIValue = '';
					var ID_PEMOHONValue = '';
					var NO_SKValue = '';
					var NO_SK_LAMAValue = '';
					var NPWPDValue = '';
					var NO_AKTAValue = '';
					var BENTUK_PERUSAHAANValue = '';
					var ALAMATValue = '';
					var RTValue = '';
					var RWValue = '';
					var ID_KELURAHANValue = '';
					var ID_KECAMATANValue = '';
					var ID_KOTAValue = '';
					var TELPValue = '';
					var FUNGSIValue = '';
					var STATUS_TANAHValue = '';
					var KETERANGAN_TANAHValue = '';
					var LUAS_LOKASIValue = '';
					var ALAMAT_LOKASIValue = '';
					var ID_KELURAHAN_LOKASIValue = '';
					var ID_KECAMATAN_LOKASIValue = '';
					
					var array_lokasi_keterangan=new Array();
					if(lokasi_syaratDataStore.getCount() > 0){
						for(var i=0;i<lokasi_syaratDataStore.getCount();i++){
							array_lokasi_keterangan.push(lokasi_syaratDataStore.getAt(i).data.KETERANGAN);
						}
					}					
					var encoded_array_lokasi_keterangan = Ext.encode(array_lokasi_keterangan);
					
					ID_IJIN_LOKASIValue = ID_IJIN_LOKASIField.getValue();
					ID_PEMOHONValue = ID_PEMOHONField.getValue();
					JENIS_PERMOHONANValue = JENIS_PERMOHONANField.getValue();
					NAMA_PERUSAHAANValue = NAMA_PERUSAHAANField.getValue();
					NO_SKValue = NO_SKField.getValue();
					NO_SK_LAMAValue = NO_SK_LAMAField.getValue();
					NPWPDValue = NPWPDField.getValue();
					NO_AKTAValue = NO_AKTAField.getValue();
					BENTUK_PERUSAHAANValue = BENTUK_PERUSAHAANField.getValue();
					ALAMATValue = ALAMATField.getValue();
					RTValue = RTField.getValue();
					RWValue = RWField.getValue();
					ID_KELURAHANValue = ID_KELURAHANField.getValue();
					ID_KECAMATANValue = ID_KECAMATANField.getValue();
					ID_KOTAValue = ID_KOTAField.getValue();
					TELPValue = TELPField.getValue();
					FUNGSIValue = FUNGSIField.getValue();
					STATUS_TANAHValue = STATUS_TANAHField.getValue();
					KETERANGAN_TANAHValue = KETERANGAN_TANAHField.getValue();
					LUAS_LOKASIValue = LUAS_LOKASIField.getValue();
					ALAMAT_LOKASIValue = ALAMAT_LOKASIField.getValue();
					ID_KELURAHAN_LOKASIValue = ID_KELURAHAN_LOKASIField.getValue();
					ID_KECAMATAN_LOKASIValue = ID_KECAMATAN_LOKASIField.getValue();
					
					/*Data Pemohon*/
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
					pemohon_pekerjaanValue = pemohon_pekerjaanField.getValue();
					pemohon_tempatlahirValue = pemohon_tempatlahirField.getValue();
					pemohon_tanggallahirValue = pemohon_tanggallahirField.getValue();
					/*End Data Pemohon*/
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_ijin_lokasi/switchAction',
						params: {							
							ID_IJIN_LOKASI : ID_IJIN_LOKASIValue,
							ID_PEMOHON : ID_PEMOHONValue,
							JENIS_PERMOHONAN : JENIS_PERMOHONANValue,
							NAMA_PERUSAHAAN : NAMA_PERUSAHAANValue,
							NO_SK : NO_SKValue,
							NO_SK_LAMA : NO_SK_LAMAValue,
							NPWPD : NPWPDValue,
							NO_AKTA : NO_AKTAValue,
							BENTUK_PERUSAHAAN : BENTUK_PERUSAHAANValue,
							ALAMAT : ALAMATValue,
							RT : RTValue,
							RW : RWValue,
							ID_KELURAHAN : ID_KELURAHANValue,
							ID_KECAMATAN : ID_KECAMATANValue,
							ID_KOTA : ID_KOTAValue,
							TELP : TELPValue,
							FUNGSI : FUNGSIValue,
							STATUS_TANAH : STATUS_TANAHValue,
							KETERANGAN_TANAH : KETERANGAN_TANAHValue,
							LUAS_LOKASI : LUAS_LOKASIValue,
							ALAMAT_LOKASI : ALAMAT_LOKASIValue,
							ID_KELURAHAN_LOKASI : ID_KELURAHAN_LOKASIValue,
							ID_KECAMATAN_LOKASI : ID_KECAMATAN_LOKASIValue,
							/*Data Pemohon*/
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
							pemohon_pekerjaan : pemohon_pekerjaanValue,
							pemohon_tempatlahir : pemohon_tempatlahirValue,
							pemohon_tanggallahir : pemohon_tanggallahirValue,
							/*End Data Pemohon*/
							KETERANGAN : encoded_array_lokasi_keterangan,
							action : in_lokasi_dbTask
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
									in_lokasi_dataStore.reload();
									in_lokasi_resetForm();
									in_lokasi_switchToGrid();
									in_lokasi_gridPanel.getSelectionModel().deselectAll();
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
		
		function in_lokasi_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(in_lokasi_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = in_lokasi_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< in_lokasi_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.ID_IJIN_LOKASI);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_ijin_lokasi/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									in_lokasi_dataStore.reload();
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
		
		function in_lokasi_refresh(){
			in_lokasi_dbListAction = "GETLIST";
			in_lokasi_gridSearchField.reset();
			in_lokasi_searchPanel.getForm().reset();
			in_lokasi_dataStore.proxy.extraParams = { action : 'GETLIST' };
			in_lokasi_dataStore.proxy.extraParams.query = "";
			in_lokasi_dataStore.currentPage = 1;
			in_lokasi_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function in_lokasi_confirmFormValid(){
			return in_lokasi_formPanel.getForm().isValid();
		}
		
		function in_lokasi_resetForm(){
			in_lokasi_dbTask = 'CREATE';
			in_lokasi_dbTaskMessage = 'create';
			in_lokasi_formPanel.getForm().reset();
			ID_IJIN_LOKASIField.setValue(0);
		}
		
		function in_lokasi_setForm(){
			in_lokasi_dbTask = 'UPDATE';
            in_lokasi_dbTaskMessage = 'update';
			
			var record = in_lokasi_gridPanel.getSelectionModel().getSelection()[0];
			ID_IJIN_LOKASIField.setValue(record.data.ID_IJIN_LOKASI);
			ID_PEMOHONField.setValue(record.data.ID_PEMOHON);
			JENIS_PERMOHONANField.setValue(record.data.JENIS_PERMOHONAN);
			NAMA_PERUSAHAANField.setValue(record.data.NAMA_PERUSAHAAN);
			NO_SKField.setValue(record.data.NO_SK);
			NO_SK_LAMAField.setValue(record.data.NO_SK_LAMA);
			NPWPDField.setValue(record.data.NPWPD);
			NO_AKTAField.setValue(record.data.NO_AKTA);
			BENTUK_PERUSAHAANField.setValue(record.data.BENTUK_PERUSAHAAN);
			ALAMATField.setValue(record.data.ALAMAT);
			RTField.setValue(record.data.RT);
			RWField.setValue(record.data.RW);
			ID_KELURAHANField.setValue(record.data.ID_KELURAHAN);
			ID_KECAMATANField.setValue(record.data.ID_KECAMATAN);
			ID_KOTAField.setValue(record.data.ID_KOTA);
			TELPField.setValue(record.data.TELP);
			FUNGSIField.setValue(record.data.FUNGSI);
			STATUS_TANAHField.setValue(record.data.STATUS_TANAH);
			KETERANGAN_TANAHField.setValue(record.data.KETERANGAN_TANAH);
			LUAS_LOKASIField.setValue(record.data.LUAS_LOKASI);
			ALAMAT_LOKASIField.setValue(record.data.ALAMAT_LOKASI);
			ID_KELURAHAN_LOKASIField.setValue(record.data.ID_KELURAHAN_LOKASI);
			ID_KECAMATAN_LOKASIField.setValue(record.data.ID_KECAMATAN_LOKASI);
			/*Data Pemohon*/
			pemohon_namaField.setValue(record.data.pemohon_nama);
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
			lokasi_syaratDataStore.proxy.extraParams = { 
				lokasi_id : record.data.ID_IJIN_LOKASI,
				currentAction : 'update',
				action : 'GETSYARAT'
			};
			lokasi_syaratDataStore.load();
			/*End Data Pemohon*/
		}
		
		function in_lokasi_showSearchWindow(){
			in_lokasi_searchWindow.show();
		}
		
		function in_lokasi_search(){
			in_lokasi_gridSearchField.reset();
			
			var ID_PEMOHONValue = '';
			var NO_SKValue = '';
			var NO_SK_LAMAValue = '';
			var NPWPDValue = '';
			var NO_AKTAValue = '';
			var BENTUK_PERUSAHAANValue = '';
			var ALAMATValue = '';
			var RTValue = '';
			var RWValue = '';
			var ID_KELURAHANValue = '';
			var ID_KECAMATANValue = '';
			var ID_KOTAValue = '';
			var TELPValue = '';
			var FUNGSIValue = '';
			var STATUS_TANAHValue = '';
			var KETERANGAN_TANAHValue = '';
			var LUAS_LOKASIValue = '';
			var ALAMAT_LOKASIValue = '';
			var ID_KELURAHAN_LOKASIValue = '';
			var ID_KECAMATAN_LOKASIValue = '';
						
			ID_PEMOHONValue = ID_PEMOHONSearchField.getValue();
			NO_SKValue = NO_SKSearchField.getValue();
			NO_SK_LAMAValue = NO_SK_LAMASearchField.getValue();
			NPWPDValue = NPWPDSearchField.getValue();
			NO_AKTAValue = NO_AKTASearchField.getValue();
			BENTUK_PERUSAHAANValue = BENTUK_PERUSAHAANSearchField.getValue();
			ALAMATValue = ALAMATSearchField.getValue();
			RTValue = RTSearchField.getValue();
			RWValue = RWSearchField.getValue();
			ID_KELURAHANValue = ID_KELURAHANSearchField.getValue();
			ID_KECAMATANValue = ID_KECAMATANSearchField.getValue();
			ID_KOTAValue = ID_KOTASearchField.getValue();
			TELPValue = TELPSearchField.getValue();
			FUNGSIValue = FUNGSISearchField.getValue();
			STATUS_TANAHValue = STATUS_TANAHSearchField.getValue();
			KETERANGAN_TANAHValue = KETERANGAN_TANAHSearchField.getValue();
			LUAS_LOKASIValue = LUAS_LOKASISearchField.getValue();
			ALAMAT_LOKASIValue = ALAMAT_LOKASISearchField.getValue();
			ID_KELURAHAN_LOKASIValue = ID_KELURAHAN_LOKASISearchField.getValue();
			ID_KECAMATAN_LOKASIValue = ID_KECAMATAN_LOKASISearchField.getValue();
			in_lokasi_dbListAction = "SEARCH";
			in_lokasi_dataStore.proxy.extraParams = { 
				ID_PEMOHON : ID_PEMOHONValue,
				NO_SK : NO_SKValue,
				NO_SK_LAMA : NO_SK_LAMAValue,
				NPWPD : NPWPDValue,
				NO_AKTA : NO_AKTAValue,
				BENTUK_PERUSAHAAN : BENTUK_PERUSAHAANValue,
				ALAMAT : ALAMATValue,
				RT : RTValue,
				RW : RWValue,
				ID_KELURAHAN : ID_KELURAHANValue,
				ID_KECAMATAN : ID_KECAMATANValue,
				ID_KOTA : ID_KOTAValue,
				TELP : TELPValue,
				FUNGSI : FUNGSIValue,
				STATUS_TANAH : STATUS_TANAHValue,
				KETERANGAN_TANAH : KETERANGAN_TANAHValue,
				LUAS_LOKASI : LUAS_LOKASIValue,
				ALAMAT_LOKASI : ALAMAT_LOKASIValue,
				ID_KELURAHAN_LOKASI : ID_KELURAHAN_LOKASIValue,
				ID_KECAMATAN_LOKASI : ID_KECAMATAN_LOKASIValue,
				action : 'SEARCH'
			};
			in_lokasi_dataStore.currentPage = 1;
			in_lokasi_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function in_lokasi_printExcel(outputType){
			var searchText = "";
			var ID_PEMOHONValue = '';
			var NO_SKValue = '';
			var NO_SK_LAMAValue = '';
			var NPWPDValue = '';
			var NO_AKTAValue = '';
			var BENTUK_PERUSAHAANValue = '';
			var ALAMATValue = '';
			var RTValue = '';
			var RWValue = '';
			var ID_KELURAHANValue = '';
			var ID_KECAMATANValue = '';
			var ID_KOTAValue = '';
			var TELPValue = '';
			var FUNGSIValue = '';
			var STATUS_TANAHValue = '';
			var KETERANGAN_TANAHValue = '';
			var LUAS_LOKASIValue = '';
			var ALAMAT_LOKASIValue = '';
			var ID_KELURAHAN_LOKASIValue = '';
			var ID_KECAMATAN_LOKASIValue = '';
			
			if(in_lokasi_dataStore.proxy.extraParams.query!==null){searchText = in_lokasi_dataStore.proxy.extraParams.query;}
			if(in_lokasi_dataStore.proxy.extraParams.ID_PEMOHON!==null){ID_PEMOHONValue = in_lokasi_dataStore.proxy.extraParams.ID_PEMOHON;}
			if(in_lokasi_dataStore.proxy.extraParams.NO_SK!==null){NO_SKValue = in_lokasi_dataStore.proxy.extraParams.NO_SK;}
			if(in_lokasi_dataStore.proxy.extraParams.NO_SK_LAMA!==null){NO_SK_LAMAValue = in_lokasi_dataStore.proxy.extraParams.NO_SK_LAMA;}
			if(in_lokasi_dataStore.proxy.extraParams.NPWPD!==null){NPWPDValue = in_lokasi_dataStore.proxy.extraParams.NPWPD;}
			if(in_lokasi_dataStore.proxy.extraParams.NO_AKTA!==null){NO_AKTAValue = in_lokasi_dataStore.proxy.extraParams.NO_AKTA;}
			if(in_lokasi_dataStore.proxy.extraParams.BENTUK_PERUSAHAAN!==null){BENTUK_PERUSAHAANValue = in_lokasi_dataStore.proxy.extraParams.BENTUK_PERUSAHAAN;}
			if(in_lokasi_dataStore.proxy.extraParams.ALAMAT!==null){ALAMATValue = in_lokasi_dataStore.proxy.extraParams.ALAMAT;}
			if(in_lokasi_dataStore.proxy.extraParams.RT!==null){RTValue = in_lokasi_dataStore.proxy.extraParams.RT;}
			if(in_lokasi_dataStore.proxy.extraParams.RW!==null){RWValue = in_lokasi_dataStore.proxy.extraParams.RW;}
			if(in_lokasi_dataStore.proxy.extraParams.ID_KELURAHAN!==null){ID_KELURAHANValue = in_lokasi_dataStore.proxy.extraParams.ID_KELURAHAN;}
			if(in_lokasi_dataStore.proxy.extraParams.ID_KECAMATAN!==null){ID_KECAMATANValue = in_lokasi_dataStore.proxy.extraParams.ID_KECAMATAN;}
			if(in_lokasi_dataStore.proxy.extraParams.ID_KOTA!==null){ID_KOTAValue = in_lokasi_dataStore.proxy.extraParams.ID_KOTA;}
			if(in_lokasi_dataStore.proxy.extraParams.TELP!==null){TELPValue = in_lokasi_dataStore.proxy.extraParams.TELP;}
			if(in_lokasi_dataStore.proxy.extraParams.FUNGSI!==null){FUNGSIValue = in_lokasi_dataStore.proxy.extraParams.FUNGSI;}
			if(in_lokasi_dataStore.proxy.extraParams.STATUS_TANAH!==null){STATUS_TANAHValue = in_lokasi_dataStore.proxy.extraParams.STATUS_TANAH;}
			if(in_lokasi_dataStore.proxy.extraParams.KETERANGAN_TANAH!==null){KETERANGAN_TANAHValue = in_lokasi_dataStore.proxy.extraParams.KETERANGAN_TANAH;}
			if(in_lokasi_dataStore.proxy.extraParams.LUAS_LOKASI!==null){LUAS_LOKASIValue = in_lokasi_dataStore.proxy.extraParams.LUAS_LOKASI;}
			if(in_lokasi_dataStore.proxy.extraParams.ALAMAT_LOKASI!==null){ALAMAT_LOKASIValue = in_lokasi_dataStore.proxy.extraParams.ALAMAT_LOKASI;}
			if(in_lokasi_dataStore.proxy.extraParams.ID_KELURAHAN_LOKASI!==null){ID_KELURAHAN_LOKASIValue = in_lokasi_dataStore.proxy.extraParams.ID_KELURAHAN_LOKASI;}
			if(in_lokasi_dataStore.proxy.extraParams.ID_KECAMATAN_LOKASI!==null){ID_KECAMATAN_LOKASIValue = in_lokasi_dataStore.proxy.extraParams.ID_KECAMATAN_LOKASI;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_ijin_lokasi/switchAction',
				params : {
					action : outputType,
					query : searchText,
					ID_PEMOHON : ID_PEMOHONValue,
					NO_SK : NO_SKValue,
					NO_SK_LAMA : NO_SK_LAMAValue,
					NPWPD : NPWPDValue,
					NO_AKTA : NO_AKTAValue,
					BENTUK_PERUSAHAAN : BENTUK_PERUSAHAANValue,
					ALAMAT : ALAMATValue,
					RT : RTValue,
					RW : RWValue,
					ID_KELURAHAN : ID_KELURAHANValue,
					ID_KECAMATAN : ID_KECAMATANValue,
					ID_KOTA : ID_KOTAValue,
					TELP : TELPValue,
					FUNGSI : FUNGSIValue,
					STATUS_TANAH : STATUS_TANAHValue,
					KETERANGAN_TANAH : KETERANGAN_TANAHValue,
					LUAS_LOKASI : LUAS_LOKASIValue,
					ALAMAT_LOKASI : ALAMAT_LOKASIValue,
					ID_KELURAHAN_LOKASI : ID_KELURAHAN_LOKASIValue,
					ID_KECAMATAN_LOKASI : ID_KECAMATAN_LOKASIValue,
					currentAction : in_lokasi_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/ijin_lokasi_list.xls');
							}else{
								window.open('./print/ijin_lokasi_list.html','in_lokasilist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		in_lokasi_dataStore = Ext.create('Ext.data.Store',{
			id : 'in_lokasi_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_ijin_lokasi/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'ID_IJIN_LOKASI'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'ID_IJIN_LOKASI', type : 'int', mapping : 'ID_IJIN_LOKASI' },
				{ name : 'ID_PEMOHON', type : 'int', mapping : 'ID_PEMOHON' },
				{ name : 'NO_SK', type : 'string', mapping : 'NO_SK' },
				{ name : 'NO_SK_LAMA', type : 'string', mapping : 'NO_SK_LAMA' },
				{ name : 'NPWPD', type : 'string', mapping : 'NPWPD' },
				{ name : 'NO_AKTA', type : 'string', mapping : 'NO_AKTA' },
				{ name : 'BENTUK_PERUSAHAAN', type : 'string', mapping : 'BENTUK_PERUSAHAAN' },
				{ name : 'ALAMAT', type : 'string', mapping : 'ALAMAT' },
				{ name : 'RT', type : 'int', mapping : 'RT' },
				{ name : 'RW', type : 'int', mapping : 'RW' },
				{ name : 'ID_KELURAHAN', type : 'int', mapping : 'ID_KELURAHAN' },
				{ name : 'ID_KECAMATAN', type : 'int', mapping : 'ID_KECAMATAN' },
				{ name : 'ID_KOTA', type : 'int', mapping : 'ID_KOTA' },
				{ name : 'TELP', type : 'string', mapping : 'TELP' },
				{ name : 'FUNGSI', type : 'string', mapping : 'FUNGSI' },
				{ name : 'STATUS_TANAH', type : 'int', mapping : 'STATUS_TANAH' },
				{ name : 'KETERANGAN_TANAH', type : 'string', mapping : 'KETERANGAN_TANAH' },
				{ name : 'LUAS_LOKASI', type : 'float', mapping : 'LUAS_LOKASI' },
				{ name : 'ALAMAT_LOKASI', type : 'string', mapping : 'ALAMAT_LOKASI' },
				{ name : 'ID_KELURAHAN_LOKASI', type : 'int', mapping : 'ID_KELURAHAN_LOKASI' },
				{ name : 'ID_KECAMATAN_LOKASI', type : 'int', mapping : 'ID_KECAMATAN_LOKASI' },
				/*Data Pemohon*/
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
				/*End Data Pemohon*/
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		in_lokasi_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						in_lokasi_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						in_lokasi_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						in_lokasi_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						in_lokasi_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						in_lokasi_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						in_lokasi_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						in_lokasi_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						in_lokasi_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var in_lokasi_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : in_lokasi_confirmAdd
		});
		var in_lokasi_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : in_lokasi_confirmUpdate
		});
		var in_lokasi_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : in_lokasi_confirmDelete
		});
		var in_lokasi_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : in_lokasi_refresh
		});
		var in_lokasi_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : in_lokasi_showSearchWindow
		});
		var in_lokasi_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				in_lokasi_printExcel('PRINT');
			}
		});
		var in_lokasi_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				in_lokasi_printExcel('EXCEL');
			}
		});
		
		var in_lokasi_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : in_lokasi_confirmUpdate
		});
		var in_lokasi_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : in_lokasi_confirmDelete
		});
		var in_lokasi_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : in_lokasi_refresh
		});
		in_lokasi_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'in_lokasi_contextMenu',
			items: [
				in_lokasi_contextMenuEdit,in_lokasi_contextMenuDelete,'-',in_lokasi_contextMenuRefresh
			]
		});
		
		in_lokasi_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : in_lokasi_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						in_lokasi_dataStore.proxy.extraParams = { action : 'GETLIST'};
						in_lokasi_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		/* Start ContextMenu For Action Column */
		var lokasi_bp_printCM = Ext.create('Ext.menu.Item',{
			text : 'Bukti Penerimaan',
			tooltip : 'Cetak Bukti Penerimaan',
			handler : function(){
				var record = pl_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_sppl/switchAction',
					params: {
						ID_IJIN_LOKASI : record.get('ID_IJIN_LOKASI'),
						action : 'CETAKBP'
					},success : function(){
						window.open('<?php echo base_url("index.php/c_sppl/cetak_bp/")?>' + record.get('ID_IJIN_LOKASI'));
					}
				});
			}
		});
		var lokasi_lk_printCM = Ext.create('Ext.menu.Item',{
			text : 'Lembar Kontrol',
			tooltip : 'Cetak Lembar Kontrol',
			handler : function(){
				var record = tr_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_sppl/switchAction',
					params: {
						ID_SKTR : record.get('ID_SKTR'),
						action : 'CETAKLK'
					},success : function(){
						window.open('../print/idam_sk.html');
					}
				});
			}
		});
		var lokasi_printCM = Ext.create('Ext.menu.Item',{
			text : 'TRAYEK',
			tooltip : 'Cetak SKTR',
			handler : function(){
				var record = tr_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_sppl/switchAction',
					params: {
						ID_SKTR : record.get('ID_SKTR'),
						action : 'CETAKSKTR'
					},success : function(){
						window.open('../print/idam_lembarkontrol.html');
					}
				});
			}
		});
		var lokasi_printContextMenu = Ext.create('Ext.menu.Menu',{
			items: [
				<?php echo ($_SESSION["IDHAK"] == 2) ? ("lokasi_bp_printCM") : ("lokasi_bp_printCM,lokasi_lk_printCM,lokasi_sppl_printCM")?>
			]
		});
		function lokasi_ubahProses(proses){
			var record = in_lokasi_gridPanel.getSelectionModel().getSelection()[0];
			Ext.Ajax.request({
				waitMsg: 'Please wait...',
				url: 'c_sppl/switchAction',
				params: {
					sppl_id : record.get('ID_LINGKUNGAN'),
					proses : proses,
					action : 'UBAHPROSES'
				},success : function(){
					in_lokasi_dataStore.reload();
				}
			});
		}
		var lokasi_prosesContextMenu = Ext.create('Ext.menu.Menu',{
			items: [
				{
					text : 'Selesai, belum diambil',
					tooltip : 'Ubah Menjadi Selesai, belum diambil',
					handler : function(){
						lokasi_ubahProses('Selesai, belum diambil');
					}
				},
				{
					text : 'Selesai, sudah diambil',
					tooltip : 'Ubah Menjadi Selesai, sudah diambil',
					handler : function(){
						lokasi_ubahProses('Selesai, sudah diambil');
					}
				},
				{
					text : 'Ditolak',
					tooltip : 'Ubah Menjadi Ditolak',
					handler : function(){
						lokasi_ubahProses('Ditolak');
					}
				}
			]
		});
		/*----------------end----------------*/
		in_lokasi_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'in_lokasi_gridPanel',
			constrain : true,
			store : in_lokasi_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'in_lokasiGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						in_lokasi_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : in_lokasi_shorcut,
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
							lokasi_printContextMenu.showAt(e.getXY());
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
							in_lokasi_confirmUpdate();
						}
					},{
						iconCls: 'icon16x16-delete',
						tooltip: 'Hapus Data',
						handler: function(grid, rowIndex){
							grid.getSelectionModel().select(rowIndex);
							in_lokasi_confirmDelete();
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
							lokasi_prosesContextMenu.showAt(e.getXY());
							return false;
						}
					}],
					<?php echo ($_SESSION["IDHAK"] == 2) ? ("hidden:true") : ("")?>
				}
							
			],
			tbar : [
				in_lokasi_addButton,
				// in_lokasi_editButton,
				// in_lokasi_deleteButton,
				in_lokasi_gridSearchField,
				// in_lokasi_searchButton,
				in_lokasi_refreshButton,
				in_lokasi_printButton,
				in_lokasi_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : in_lokasi_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					in_lokasi_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */

/*Get Syarat*/
		lokasi_syaratDataStore = Ext.create('Ext.data.Store',{
			id : 'lokasi_syaratDataStore',
			pageSize : globalPageSize,
			autoLoad : true,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_ijin_lokasi/switchAction',
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
		var lokasi_syaratGridEditor = new Ext.grid.plugin.CellEditing({
			clicksToEdit: 1
		});
		lokasi_syaratGrid = Ext.create('Ext.grid.Panel',{
			id : 'lokasi_syaratDataStore',
			store : lokasi_syaratDataStore,
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

/* Start FormPanel declaration */
		ID_IJIN_LOKASIField = Ext.create('Ext.form.NumberField',{
			id : 'ID_IJIN_LOKASIField',
			name : 'ID_IJIN_LOKASI',
			fieldLabel : 'ID_IJIN_LOKASI<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		ID_PEMOHONField = Ext.create('Ext.form.NumberField',{
			id : 'ID_PEMOHONField',
			name : 'ID_PEMOHON',
			fieldLabel : 'ID_PEMOHON',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		NO_SKField = Ext.create('Ext.form.TextField',{
			id : 'NO_SKField',
			name : 'NO_SK',
			fieldLabel : 'No. SK',
			hidden : true,
			maxLength : 50
		});
		NO_SK_LAMAField = Ext.create('Ext.form.TextField',{
			id : 'NO_SK_LAMAField',
			name : 'NO_SK_LAMA',
			fieldLabel : 'No. SK Lama',
			maxLength : 50,
			hidden : true
		});
		NPWPDField = Ext.create('Ext.form.TextField',{
			id : 'NPWPDField',
			name : 'NPWPD',
			fieldLabel : 'NPWPD',
			maxLength : 50
		});
		NAMA_PERUSAHAANField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_PERUSAHAANField',
			name : 'NAMA_PERUSAHAAN',
			fieldLabel : 'Nama Perusahaan',
			maxLength : 50
		});
		NO_AKTAField = Ext.create('Ext.form.TextField',{
			id : 'NO_AKTAField',
			name : 'NO_AKTA',
			fieldLabel : 'No. Akta',
			maxLength : 50
		});
		BENTUK_PERUSAHAANField = Ext.create('Ext.form.TextField',{
			id : 'BENTUK_PERUSAHAANField',
			name : 'BENTUK_PERUSAHAAN',
			fieldLabel : 'Bentuk Perusahaan',
			maxLength : 50
		});
		ALAMATField = Ext.create('Ext.form.TextField',{
			id : 'ALAMATField',
			name : 'ALAMAT',
			fieldLabel : 'Alamat',
			maxLength : 100
		});
		RTField = Ext.create('Ext.form.TextField',{
			id : 'RTField',
			name : 'RT',
			fieldLabel : 'RT',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		RWField = Ext.create('Ext.form.TextField',{
			id : 'RWField',
			name : 'RW',
			fieldLabel : 'RW',
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
		ID_KECAMATANField = Ext.create('Ext.form.NumberField',{
			id : 'ID_KECAMATANField',
			name : 'ID_KECAMATAN',
			fieldLabel : 'Kecamatan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		ID_KOTAField = Ext.create('Ext.form.NumberField',{
			id : 'ID_KOTAField',
			name : 'ID_KOTA',
			fieldLabel : 'Kota',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		TELPField = Ext.create('Ext.form.TextField',{
			id : 'TELPField',
			name : 'TELP',
			fieldLabel : 'Telp.',
			maxLength : 20
		});
		FUNGSIField = Ext.create('Ext.form.TextField',{
			id : 'FUNGSIField',
			name : 'FUNGSI',
			fieldLabel : 'Fungsi',
			maxLength : 50
		});
		JENIS_PERMOHONANField = Ext.create('Ext.form.ComboBox',{
			id : 'JENIS_PERMOHONANField',
			name : 'JENIS_PERMOHONAN',
			fieldLabel : 'Jenis Permohonan',
			allowBlank : false,
			store : new Ext.data.ArrayStore({
				fields : ['jenis_id', 'jenis'],
				data : [[1,'Baru'],[2,'Perpanjang']]
			}),
			displayField : 'jenis',
			valueField : 'jenis_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true,
			listeners : {
				select : function(cmb, rec){
					if(cmb.getValue() == '2'){
						NO_SK_LAMAField.show();
						pemohon_nikField.disable();
						pemohon_namaField.disable();
						pemohon_tempatlahirField.disable();
						pemohon_tanggallahirField.disable();
						pemohon_pekerjaanField.disable();
						pemohon_alamatField.disable();
						pemohon_rtField.disable();
						pemohon_rwField.disable();
						pemohon_kelField.disable();
						pemohon_kecField.disable();
						pemohon_kotaField.disable();
						pemohon_telpField.disable();						
						pemohon_hpField.disable();	
					}else{
						NO_SK_LAMAField.hide();
						pemohon_nikField.enable();
						pemohon_namaField.enable();
						pemohon_tempatlahirField.enable();
						pemohon_tanggallahirField.enable();
						pemohon_pekerjaanField.enable();
						pemohon_alamatField.enable();
						pemohon_rtField.enable();
						pemohon_rwField.enable();
						pemohon_kelField.enable();
						pemohon_kecField.enable();
						pemohon_kotaField.enable();
						pemohon_telpField.enable();						
						pemohon_hpField.enable();
					}
				}
			}
		});
		STATUS_TANAHField = Ext.create('Ext.form.ComboBox',{
			id : 'STATUS_TANAHField',
			name : 'STATUS_TANAH',
			fieldLabel : 'Status Tanah',
			allowBlank : false,
			store : new Ext.data.ArrayStore({
				fields : ['status_lokasi_id', 'status_lokasi'],
				data : [[1,'Milik Sendiri'],[2,'Sewa'],[3,'Kontrak'],[4,'Akta Jual Beli'],[5,'Lainnya']]
			}),
			displayField : 'status_lokasi',
			valueField : 'status_lokasi_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true,
			listeners : {
				select : function(cmb, rec){
					if(cmb.getValue() == '5'){
						KETERANGAN_TANAHField.show();
					}else{
						KETERANGAN_TANAHField.hide();
					}
				}
			}
		});
		KETERANGAN_TANAHField = Ext.create('Ext.form.TextField',{
			id : 'KETERANGAN_TANAHField',
			name : 'KETERANGAN_TANAH',
			fieldLabel : 'Keterangan Tanah',
			maxLength : 50,
			hidden:true			
		});
		LUAS_LOKASIField = Ext.create('Ext.form.TextField',{
			id : 'LUAS_LOKASIField',
			name : 'LUAS_LOKASI',
			fieldLabel : 'Luas Lokasi',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		ALAMAT_LOKASIField = Ext.create('Ext.form.TextField',{
			id : 'ALAMAT_LOKASIField',
			name : 'ALAMAT_LOKASI',
			fieldLabel : 'Alamat Lokasi',
			maxLength : 100
		});
		
		/*Data Pemohon*/
		pemohon_pekerjaanField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_pekerjaanField',
			name : 'pemohon_pekerjaan',
			fieldLabel : 'Pekerjaan',
			maxLength : 50
		});
		pemohon_nikField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_nikField',
			name : 'pemohon_nik',
			fieldLabel : 'NIK',
			maxLength : 20
		});
		pemohon_namaField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_namaField',
			name : 'pemohon_nama',
			fieldLabel : 'Nama Lengkap',
			maxLength : 50
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
		var in_lokasi_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : in_lokasi_save
		});
		var in_lokasi_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				in_lokasi_resetForm();
				in_lokasi_switchToGrid();
				$('html, body').animate({scrollTop: 0}, 500);
			}
		});
		in_lokasi_formPanel = Ext.create('Ext.form.Panel', {
			disabled : true,
			frame : true,
			layout : {
				type : 'form',
				padding : 5
			},
			items: [
				{
					xtype : 'fieldset',
					title : 'Permohonan Ijin Lokasi',
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
						NO_AKTAField,
						BENTUK_PERUSAHAANField,
						ALAMATField,
						RTField,
						RWField,
						ID_KELURAHANField,
						ID_KECAMATANField,
						ID_KOTAField,
						TELPField
											]
				},{
					xtype : 'fieldset',
					title : '3. Data Ijin Lokasi',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						FUNGSIField,
						STATUS_TANAHField,
						KETERANGAN_TANAHField,
						LUAS_LOKASIField,
						ALAMAT_LOKASIField,
						ID_KELURAHAN_LOKASIField,
						ID_KECAMATAN_LOKASIField,
											]
				},{
					xtype : 'fieldset',
					title : '4. Data Kelengkapan',
					columnWidth : 0.5,
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						lokasi_syaratGrid
					]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [in_lokasi_saveButton,in_lokasi_cancelButton]
		});
		in_lokasi_formWindow = Ext.create('Ext.window.Window',{
			id : 'in_lokasi_formWindow',
			renderTo : 'in_lokasiSaveWindow',
			title : globalFormAddEditTitle + ' ' + in_lokasi_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [in_lokasi_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		ID_PEMOHONSearchField = Ext.create('Ext.form.NumberField',{
			id : 'ID_PEMOHONSearchField',
			name : 'ID_PEMOHON',
			fieldLabel : 'ID_PEMOHON',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		NO_SKSearchField = Ext.create('Ext.form.TextField',{
			id : 'NO_SKSearchField',
			name : 'NO_SK',
			fieldLabel : 'NO_SK',
			maxLength : 50
		
		});
		NO_SK_LAMASearchField = Ext.create('Ext.form.TextField',{
			id : 'NO_SK_LAMASearchField',
			name : 'NO_SK_LAMA',
			fieldLabel : 'NO_SK_LAMA',
			maxLength : 50
		
		});
		NPWPDSearchField = Ext.create('Ext.form.TextField',{
			id : 'NPWPDSearchField',
			name : 'NPWPD',
			fieldLabel : 'NPWPD',
			maxLength : 50
		
		});
		NO_AKTASearchField = Ext.create('Ext.form.TextField',{
			id : 'NO_AKTASearchField',
			name : 'NO_AKTA',
			fieldLabel : 'NO_AKTA',
			maxLength : 50
		
		});
		BENTUK_PERUSAHAANSearchField = Ext.create('Ext.form.TextField',{
			id : 'BENTUK_PERUSAHAANSearchField',
			name : 'BENTUK_PERUSAHAAN',
			fieldLabel : 'BENTUK_PERUSAHAAN',
			maxLength : 50
		
		});
		ALAMATSearchField = Ext.create('Ext.form.TextField',{
			id : 'ALAMATSearchField',
			name : 'ALAMAT',
			fieldLabel : 'ALAMAT',
			maxLength : 100
		
		});
		RTSearchField = Ext.create('Ext.form.NumberField',{
			id : 'RTSearchField',
			name : 'RT',
			fieldLabel : 'RT',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		RWSearchField = Ext.create('Ext.form.NumberField',{
			id : 'RWSearchField',
			name : 'RW',
			fieldLabel : 'RW',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		ID_KELURAHANSearchField = Ext.create('Ext.form.NumberField',{
			id : 'ID_KELURAHANSearchField',
			name : 'ID_KELURAHAN',
			fieldLabel : 'ID_KELURAHAN',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		ID_KECAMATANSearchField = Ext.create('Ext.form.NumberField',{
			id : 'ID_KECAMATANSearchField',
			name : 'ID_KECAMATAN',
			fieldLabel : 'ID_KECAMATAN',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		ID_KOTASearchField = Ext.create('Ext.form.NumberField',{
			id : 'ID_KOTASearchField',
			name : 'ID_KOTA',
			fieldLabel : 'ID_KOTA',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		TELPSearchField = Ext.create('Ext.form.TextField',{
			id : 'TELPSearchField',
			name : 'TELP',
			fieldLabel : 'TELP',
			maxLength : 20
		
		});
		FUNGSISearchField = Ext.create('Ext.form.TextField',{
			id : 'FUNGSISearchField',
			name : 'FUNGSI',
			fieldLabel : 'FUNGSI',
			maxLength : 50
		
		});
		STATUS_TANAHSearchField = Ext.create('Ext.form.NumberField',{
			id : 'STATUS_TANAHSearchField',
			name : 'STATUS_TANAH',
			fieldLabel : 'STATUS_TANAH',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		KETERANGAN_TANAHSearchField = Ext.create('Ext.form.TextField',{
			id : 'KETERANGAN_TANAHSearchField',
			name : 'KETERANGAN_TANAH',
			fieldLabel : 'KETERANGAN_TANAH',
			maxLength : 50
		
		});
		LUAS_LOKASISearchField = Ext.create('Ext.form.NumberField',{
			id : 'LUAS_LOKASISearchField',
			name : 'LUAS_LOKASI',
			fieldLabel : 'LUAS_LOKASI',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		ALAMAT_LOKASISearchField = Ext.create('Ext.form.TextField',{
			id : 'ALAMAT_LOKASISearchField',
			name : 'ALAMAT_LOKASI',
			fieldLabel : 'ALAMAT_LOKASI',
			maxLength : 100
		
		});
		ID_KELURAHAN_LOKASISearchField = Ext.create('Ext.form.NumberField',{
			id : 'ID_KELURAHAN_LOKASISearchField',
			name : 'ID_KELURAHAN_LOKASI',
			fieldLabel : 'ID_KELURAHAN_LOKASI',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		ID_KECAMATAN_LOKASISearchField = Ext.create('Ext.form.NumberField',{
			id : 'ID_KECAMATAN_LOKASISearchField',
			name : 'ID_KECAMATAN_LOKASI',
			fieldLabel : 'ID_KECAMATAN_LOKASI',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		var in_lokasi_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : in_lokasi_search
		});
		var in_lokasi_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				in_lokasi_searchWindow.hide();
			}
		});
		in_lokasi_searchPanel = Ext.create('Ext.form.Panel', {
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
						ID_PEMOHONSearchField,
						NO_SKSearchField,
						NO_SK_LAMASearchField,
						NPWPDSearchField,
						NO_AKTASearchField,
						BENTUK_PERUSAHAANSearchField,
						ALAMATSearchField,
						RTSearchField,
						RWSearchField,
						ID_KELURAHANSearchField,
						ID_KECAMATANSearchField,
						ID_KOTASearchField,
						TELPSearchField,
						FUNGSISearchField,
						STATUS_TANAHSearchField,
						KETERANGAN_TANAHSearchField,
						LUAS_LOKASISearchField,
						ALAMAT_LOKASISearchField,
						ID_KELURAHAN_LOKASISearchField,
						ID_KECAMATAN_LOKASISearchField,
						]
				}],
			buttons : [in_lokasi_searchingButton,in_lokasi_cancelSearchButton]
		});
		in_lokasi_searchWindow = Ext.create('Ext.window.Window',{
			id : 'in_lokasi_searchWindow',
			renderTo : 'in_lokasiSearchWindow',
			title : globalFormSearchTitle + ' ' + in_lokasi_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [in_lokasi_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="in_lokasiSaveWindow"></div>
<div id="in_lokasiSearchWindow"></div>
<div class="span12" id="in_lokasiGrid"></div>