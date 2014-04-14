<style>
	.checked{
		background-image:url(../assets/images/icons/check.png) !important;
		margin:auto;
	}
</style>
<h4>REKOMENDASI PEMBONGKARAN TROTOAR</h4>
<hr>
<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var otoar_componentItemTitle="Izin Bongkar Trotoar";
		var otoar_dataStore;
		var otoar_syaratDataStore;
		
		var otoar_shorcut;
		var otoar_contextMenu;
		var otoar_gridSearchField;
		var otoar_gridPanel;
		var otoar_formPanel;
		var otoar_formWindow;
		var otoar_searchPanel;
		var otoar_searchWindow;
		
		var ID_TROTOARField;
		var ID_PEMOHONField;
		var JENIS_PERMOHONANField;
		var NO_SKField;
		var NO_SK_LAMAField;
		var NAMA_PERUSAHAANField;
		var ALAMATField;
		var PERUNTUKANField;
		var ALAMAT_LOKASIField;
		var TGL_PERMOHONANField;
		var TGL_BERLAKUField;
		var TGL_BERAKHIRField;
		var STATUSField;
		var STATUS_SURVEYField;
		
		var otoar_dbTask = 'CREATE';
		var otoar_dbTaskMessage = 'Tambah';
		var otoar_dbPermission = 'CRUD';
		var otoar_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function otoar_switchToGrid(){
			otoar_formPanel.setDisabled(true);
			otoar_gridPanel.setDisabled(false);
			otoar_formWindow.hide();
		}
		
		function otoar_switchToForm(){
			otoar_gridPanel.setDisabled(true);
			otoar_formPanel.setDisabled(false);
			otoar_formWindow.show();
		}
		
		function otoar_confirmAdd(){
			otoar_dbTask = 'CREATE';
			otoar_dbTaskMessage = 'created';
			otoar_resetForm();
			otoar_switchToForm();
		}
		
		function otoar_confirmUpdate(){
			if(otoar_gridPanel.selModel.getCount() == 1) {
				otoar_dbTask = 'UPDATE';
				otoar_dbTaskMessage = 'updated';
				otoar_switchToForm();
				otoar_setForm();
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
		
		function otoar_confirmDelete(){
			if(otoar_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, otoar_delete);
			}else if(otoar_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, otoar_delete);
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
		
		function otoar_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(otoar_dbPermission)==false && pattC.test(otoar_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(otoar_confirmFormValid()){
					var array_otoar_keterangan=new Array();
					if(otoar_syaratDataStore.getCount() > 0){
						for(var i=0;i<otoar_syaratDataStore.getCount();i++){
							array_otoar_keterangan.push(otoar_syaratDataStore.getAt(i).data.KETERANGAN);
						}
					}
					
					var params = otoar_formPanel.getForm().getValues();
					params.ijin_id = 28;
					params.action = otoar_dbTask;
					params.KETERANGAN = array_otoar_keterangan;
					params = Ext.encode(params);
					
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_trotoar/switchAction',
						params: {							
							params : params,
							action : otoar_dbTask
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
										fn : function(btn){
											$('html, body').animate({scrollTop: 0}, 500);
										}
									});
									otoar_dataStore.reload();
									otoar_resetForm();
									otoar_switchToGrid();
									otoar_gridPanel.getSelectionModel().deselectAll();
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
		
		function otoar_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(otoar_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = otoar_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< otoar_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.ID_TROTOAR);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_trotoar/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									otoar_dataStore.reload();
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
		
		function otoar_refresh(){
			otoar_dbListAction = "GETLIST";
			otoar_gridSearchField.reset();
			otoar_dataStore.proxy.extraParams = { action : 'GETLIST' };
			otoar_dataStore.proxy.extraParams.query = "";
			otoar_dataStore.currentPage = 1;
			otoar_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function otoar_confirmFormValid(){
			return otoar_formPanel.getForm().isValid();
		}
		
		function otoar_resetForm(){
			otoar_dbTask = 'CREATE';
			otoar_dbTaskMessage = 'create';
			otoar_formPanel.getForm().reset();
			ID_TROTOARField.setValue(0);
		}
		
		function otoar_setForm(){
			otoar_dbTask = 'UPDATE';
            otoar_dbTaskMessage = 'update';
			
			var record = otoar_gridPanel.getSelectionModel().getSelection()[0];
			otoar_formPanel.loadRecord(record);
			ID_SKTRField.setValue(record.data.ID_SKTR);
			JENIS_PERMOHONANField.setValue(record.data.JENIS_PERMOHONAN);
			/* ID_TROTOARField.setValue(record.data.ID_TROTOAR);
			ID_PEMOHONField.setValue(record.data.ID_PEMOHON);
			JENIS_PERMOHONANField.setValue(record.data.JENIS_PERMOHONAN);
			NO_SKField.setValue(record.data.NO_SK);
			NO_SK_LAMAField.setValue(record.data.NO_SK_LAMA);
			NAMA_PERUSAHAANField.setValue(record.data.NAMA_PERUSAHAAN);
			ALAMATField.setValue(record.data.ALAMAT);
			PERUNTUKANField.setValue(record.data.PERUNTUKAN);
			ALAMAT_LOKASIField.setValue(record.data.ALAMAT_LOKASI);
			TGL_PERMOHONANField.setValue(record.data.TGL_PERMOHONAN);
			TGL_BERLAKUField.setValue(record.data.TGL_BERLAKU);
			TGL_BERAKHIRField.setValue(record.data.TGL_BERAKHIR);
			STATUSField.setValue(record.data.STATUS);
			STATUS_SURVEYField.setValue(record.data.STATUS_SURVEY);
			pemohon_idField.setValue(record.data.pemohon_id);
			pemohon_nikField.setValue(record.data.pemohon_nik);
			pemohon_namaField.setValue(record.data.pemohon_nama);
			pemohon_telpField.setValue(record.data.pemohon_telp);
			pemohon_alamatField.setValue(record.data.pemohon_alamat);
			RETRIBUSIField.setValue(record.data.RETRIBUSI); */
			if(record.data.RETRIBUSI != 0){
				RETRIBUSI_STATUSField.setValue({ s_retribusi : ['1'] });
			}else{
				RETRIBUSI_STATUSField.setValue({ s_retribusi : ['0'] });
			}
			otoar_syaratDataStore.proxy.extraParams = { 
				trotoar_id : record.data.ID_TROTOAR,
				currentAction : 'update',
				action : 'GETSYARAT'
			};
			otoar_syaratDataStore.load();
		}
		
		function otoar_showSearchWindow(){
			otoar_searchWindow.show();
		}
		
		function otoar_search(){
			otoar_gridSearchField.reset();
			
			var ID_PEMOHONValue = '';
			var JENIS_PERMOHONANValue = '';
			var NO_SKValue = '';
			var NO_SK_LAMAValue = '';
			var NAMA_PERUSAHAANValue = '';
			var ALAMATValue = '';
			var PERUNTUKANValue = '';
			var ALAMAT_LOKASIValue = '';
			var TGL_PERMOHONANValue = '';
			var TGL_BERLAKUValue = '';
			var TGL_BERAKHIRValue = '';
			var STATUSValue = '';
			var STATUS_SURVEYValue = '';
						
			ID_PEMOHONValue = ID_PEMOHONSearchField.getValue();
			JENIS_PERMOHONANValue = JENIS_PERMOHONANSearchField.getValue();
			NO_SKValue = NO_SKSearchField.getValue();
			NO_SK_LAMAValue = NO_SK_LAMASearchField.getValue();
			NAMA_PERUSAHAANValue = NAMA_PERUSAHAANSearchField.getValue();
			ALAMATValue = ALAMATSearchField.getValue();
			PERUNTUKANValue = PERUNTUKANSearchField.getValue();
			ALAMAT_LOKASIValue = ALAMAT_LOKASISearchField.getValue();
			TGL_PERMOHONANValue = TGL_PERMOHONANSearchField.getValue();
			TGL_BERLAKUValue = TGL_BERLAKUSearchField.getValue();
			TGL_BERAKHIRValue = TGL_BERAKHIRSearchField.getValue();
			STATUSValue = STATUSSearchField.getValue();
			STATUS_SURVEYValue = STATUS_SURVEYSearchField.getValue();
			otoar_dbListAction = "SEARCH";
			otoar_dataStore.proxy.extraParams = { 
				ID_PEMOHON : ID_PEMOHONValue,
				JENIS_PERMOHONAN : JENIS_PERMOHONANValue,
				NO_SK : NO_SKValue,
				NO_SK_LAMA : NO_SK_LAMAValue,
				NAMA_PERUSAHAAN : NAMA_PERUSAHAANValue,
				ALAMAT : ALAMATValue,
				PERUNTUKAN : PERUNTUKANValue,
				ALAMAT_LOKASI : ALAMAT_LOKASIValue,
				TGL_PERMOHONAN : TGL_PERMOHONANValue,
				TGL_BERLAKU : TGL_BERLAKUValue,
				TGL_BERAKHIR : TGL_BERAKHIRValue,
				STATUS : STATUSValue,
				STATUS_SURVEY : STATUS_SURVEYValue,
				action : 'SEARCH'
			};
			otoar_dataStore.currentPage = 1;
			otoar_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function otoar_printExcel(outputType){
			var searchText = "";
			var ID_PEMOHONValue = '';
			var JENIS_PERMOHONANValue = '';
			var NO_SKValue = '';
			var NO_SK_LAMAValue = '';
			var NAMA_PERUSAHAANValue = '';
			var ALAMATValue = '';
			var PERUNTUKANValue = '';
			var ALAMAT_LOKASIValue = '';
			var TGL_PERMOHONANValue = '';
			var TGL_BERLAKUValue = '';
			var TGL_BERAKHIRValue = '';
			var STATUSValue = '';
			var STATUS_SURVEYValue = '';
			
			if(otoar_dataStore.proxy.extraParams.query!==null){searchText = otoar_dataStore.proxy.extraParams.query;}
			if(otoar_dataStore.proxy.extraParams.ID_PEMOHON!==null){ID_PEMOHONValue = otoar_dataStore.proxy.extraParams.ID_PEMOHON;}
			if(otoar_dataStore.proxy.extraParams.JENIS_PERMOHONAN!==null){JENIS_PERMOHONANValue = otoar_dataStore.proxy.extraParams.JENIS_PERMOHONAN;}
			if(otoar_dataStore.proxy.extraParams.NO_SK!==null){NO_SKValue = otoar_dataStore.proxy.extraParams.NO_SK;}
			if(otoar_dataStore.proxy.extraParams.NO_SK_LAMA!==null){NO_SK_LAMAValue = otoar_dataStore.proxy.extraParams.NO_SK_LAMA;}
			if(otoar_dataStore.proxy.extraParams.NAMA_PERUSAHAAN!==null){NAMA_PERUSAHAANValue = otoar_dataStore.proxy.extraParams.NAMA_PERUSAHAAN;}
			if(otoar_dataStore.proxy.extraParams.ALAMAT!==null){ALAMATValue = otoar_dataStore.proxy.extraParams.ALAMAT;}
			if(otoar_dataStore.proxy.extraParams.PERUNTUKAN!==null){PERUNTUKANValue = otoar_dataStore.proxy.extraParams.PERUNTUKAN;}
			if(otoar_dataStore.proxy.extraParams.ALAMAT_LOKASI!==null){ALAMAT_LOKASIValue = otoar_dataStore.proxy.extraParams.ALAMAT_LOKASI;}
			if(otoar_dataStore.proxy.extraParams.TGL_PERMOHONAN!==null){TGL_PERMOHONANValue = otoar_dataStore.proxy.extraParams.TGL_PERMOHONAN;}
			if(otoar_dataStore.proxy.extraParams.TGL_BERLAKU!==null){TGL_BERLAKUValue = otoar_dataStore.proxy.extraParams.TGL_BERLAKU;}
			if(otoar_dataStore.proxy.extraParams.TGL_BERAKHIR!==null){TGL_BERAKHIRValue = otoar_dataStore.proxy.extraParams.TGL_BERAKHIR;}
			if(otoar_dataStore.proxy.extraParams.STATUS!==null){STATUSValue = otoar_dataStore.proxy.extraParams.STATUS;}
			if(otoar_dataStore.proxy.extraParams.STATUS_SURVEY!==null){STATUS_SURVEYValue = otoar_dataStore.proxy.extraParams.STATUS_SURVEY;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_trotoar/switchAction',
				params : {
					action : outputType,
					query : searchText,
					ID_PEMOHON : ID_PEMOHONValue,
					JENIS_PERMOHONAN : JENIS_PERMOHONANValue,
					NO_SK : NO_SKValue,
					NO_SK_LAMA : NO_SK_LAMAValue,
					NAMA_PERUSAHAAN : NAMA_PERUSAHAANValue,
					ALAMAT : ALAMATValue,
					PERUNTUKAN : PERUNTUKANValue,
					ALAMAT_LOKASI : ALAMAT_LOKASIValue,
					TGL_PERMOHONAN : TGL_PERMOHONANValue,
					TGL_BERLAKU : TGL_BERLAKUValue,
					TGL_BERAKHIR : TGL_BERAKHIRValue,
					STATUS : STATUSValue,
					STATUS_SURVEY : STATUS_SURVEYValue,
					currentAction : otoar_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/trotoar_list.xls');
							}else{
								window.open('./print/trotoar_list.html','otoarlist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		otoar_dataStore = Ext.create('Ext.data.Store',{
			id : 'otoar_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_trotoar/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'ID_TROTOAR'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'ID_TROTOAR', type : 'int', mapping : 'ID_TROTOAR' },
				{ name : 'ID_PEMOHON', type : 'int', mapping : 'ID_PEMOHON' },
				{ name : 'JENIS_PERMOHONAN', type : 'int', mapping : 'JENIS_PERMOHONAN' },
				{ name : 'NO_SK', type : 'string', mapping : 'NO_SK' },
				{ name : 'NO_SK_LAMA', type : 'string', mapping : 'NO_SK_LAMA' },
				{ name : 'NAMA_PERUSAHAAN', type : 'string', mapping : 'NAMA_PERUSAHAAN' },
				{ name : 'ALAMAT', type : 'string', mapping : 'ALAMAT' },
				{ name : 'PERUNTUKAN', type : 'string', mapping : 'PERUNTUKAN' },
				{ name : 'ALAMAT_LOKASI', type : 'string', mapping : 'ALAMAT_LOKASI' },
				{ name : 'TGL_PERMOHONAN', type : 'date', dateFormat : 'Y-m-d', mapping : 'TGL_PERMOHONAN' },
				{ name : 'TGL_BERLAKU', type : 'date', dateFormat : 'Y-m-d', mapping : 'TGL_BERLAKU' },
				{ name : 'TGL_BERAKHIR', type : 'date', dateFormat : 'Y-m-d', mapping : 'TGL_BERAKHIR' },
				{ name : 'STATUS', type : 'int', mapping : 'STATUS' },
				{ name : 'STATUS_SURVEY', type : 'int', mapping : 'STATUS_SURVEY' },
				{ name : 'RETRIBUSI', type : 'float', mapping : 'RETRIBUSI' },
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
/* End DataStore declaration */
/* Start Shorcut Declaration */
		otoar_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						otoar_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						otoar_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						otoar_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						otoar_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						otoar_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						otoar_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						otoar_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						otoar_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var otoar_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : otoar_confirmAdd
		});
		var otoar_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : otoar_confirmUpdate
		});
		var otoar_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : otoar_confirmDelete
		});
		var otoar_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : otoar_refresh
		});
		var otoar_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : otoar_showSearchWindow
		});
		var otoar_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				otoar_printExcel('PRINT');
			}
		});
		var otoar_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				otoar_printExcel('EXCEL');
			}
		});
		
		var otoar_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : otoar_confirmUpdate
		});
		var otoar_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : otoar_confirmDelete
		});
		var otoar_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : otoar_refresh
		});
		otoar_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'otoar_contextMenu',
			items: [
				otoar_contextMenuEdit,otoar_contextMenuDelete,'-',otoar_contextMenuRefresh
			]
		});
		
		otoar_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : otoar_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						otoar_dataStore.proxy.extraParams = { action : 'GETLIST'};
						otoar_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		/*Pilihan Cetak*/
			var otoar_bp_printCM = Ext.create('Ext.menu.Item',{
			text : 'Bukti Penerimaan',
			tooltip : 'Cetak Bukti Penerimaan',
			handler : function(){
				var record = otoar_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_trotoar/switchAction',
					params: {
						ID_TROTOAR : record.get('ID_TROTOAR'),
						action : 'CETAKBP'
					},success : function(){
						window.open('<?php echo base_url() ?>print/trotoar_bp.html');
					}
				});
			}
			});
			var otoar_lk_printCM = Ext.create('Ext.menu.Item',{
				text : 'Lembar Kontrol',
				tooltip : 'Cetak Lembar Kontrol',
				handler : function(){
					var record = otoar_gridPanel.getSelectionModel().getSelection()[0];
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_trotoar/switchAction',
						params: {
							ID_TROTOAR : record.get('ID_TROTOAR'),
							action : 'CETAKLK'
						},success : function(){
							window.open('<?php echo base_url() ?>print/trotoar_lk.html');
						}
					});
				}
			});
			var otoar_sk_printCM = Ext.create('Ext.menu.Item',{
				text : 'Lembar SK',
				tooltip : 'Cetak Lembar SK',
				handler : function(){
					var record = otoar_gridPanel.getSelectionModel().getSelection()[0];
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_trotoar/switchAction',
						params: {
							ID_TROTOAR : record.get('ID_TROTOAR'),
							action : 'CETAKSK'
						},success : function(){
							window.open('<?php echo base_url() ?>print/trotoar_sk.html');
						}
					});
				}
			});
			var otoar_printContextMenu = Ext.create('Ext.menu.Menu',{
				items: [
					<?php echo ($_SESSION["IDHAK"] == 2) ? ("otoar_bp_printCM") : ("otoar_bp_printCM,otoar_lk_printCM,otoar_sk_printCM"); ?>
				]
			});
			function otoar_ubahProses(proses){
				var record = otoar_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_trotoar/switchAction',
					params: {
						trotoar_id : record.get('ID_TROTOAR'),
						proses : proses,
						no_sk : record.get('NO_SK'),
						action : 'UBAHPROSES'
					},success : function(){
						otoar_dataStore.reload();
					}
				});
			}
			var otoar_prosesContextMenu = Ext.create('Ext.menu.Menu',{
				items: [
					{
						text : 'Selesai, belum diambil',
						tooltip : 'Ubah Menjadi Selesai, belum diambil',
						handler : function(){
							otoar_ubahProses('Selesai, belum diambil');
						}
					},
					{
						text : 'Selesai, sudah diambil',
						tooltip : 'Ubah Menjadi Selesai, sudah diambil',
						handler : function(){
							otoar_ubahProses('Selesai, sudah diambil');
						}
					},
					{
						text : 'Ditolak',
						tooltip : 'Ubah Menjadi Ditolak',
						handler : function(){
							otoar_ubahProses('Ditolak');
						}
					}
				]
			});
			/*End Pilihan Cetak*/
		otoar_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'otoar_gridPanel',
			constrain : true,
			store : otoar_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'otoarGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						otoar_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : otoar_shorcut,
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
							otoar_printContextMenu.showAt(e.getXY());
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
							otoar_confirmUpdate();
						}
					},{
						iconCls: 'icon16x16-delete',
						tooltip: 'Hapus Data',
						handler: function(grid, rowIndex){
							grid.getSelectionModel().select(rowIndex);
							otoar_confirmDelete();
						}
					}],
					<?php echo ($_SESSION["IDHAK"] == 2) ? ("hidden:true") : (""); ?>
				},{
					xtype:'actioncolumn',
					width:100,
					text : 'Status Berkas',
					items: [{
						iconCls : 'checked',
						tooltip : 'Ubah Status',
						handler: function(grid, rowIndex, colIndex, node, e) {
							e.stopEvent();
							otoar_prosesContextMenu.showAt(e.getXY());
							return false;
						}
					}],
					<?php echo ($_SESSION["IDHAK"] == 2) ? ("hidden:true") : (""); ?>
				}
							
			],
			tbar : [
				otoar_addButton,
				// otoar_editButton,
				// otoar_deleteButton,
				otoar_gridSearchField,
				// otoar_searchButton,
				otoar_refreshButton,
				otoar_printButton,
				otoar_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : otoar_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					otoar_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
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
			fieldLabel : 'Nilai Retribusi',
			maxLength : 50,
			hidden : true,
		});
		retibusiTanggalField = Ext.create('Ext.form.field.Date',{
			name : 'permohonan_retribusi_tanggal',
			fieldLabel : 'Tanggal',
			format : 'd-m-Y',
			hidden : true,
			value : new Date('<?php echo date('Y-m-d').'T'.date('H:i:s'); ?>')
		});
		ID_TROTOARField = Ext.create('Ext.form.NumberField',{
			id : 'ID_TROTOARField',
			name : 'permohonan_id',
			fieldLabel : 'ID_TROTOAR<font color=red>*</font>',
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
		JENIS_PERMOHONANField = Ext.create('Ext.form.ComboBox',{
			id : 'JENIS_PERMOHONANField',
			name : 'permohonan_jenis',
			fieldLabel : 'Jenis Permohonan',
			store : new Ext.data.ArrayStore({
				fields : ['jenis_id', 'jenis'],
				data : [[1,'Baru'],[2,'Perpanjangan']]
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
					}else{
						NO_SK_LAMAField.hide();
					}
				}
			}
		});
		NO_SKField = Ext.create('Ext.form.TextField',{
			id : 'NO_SKField',
			name : 'NO_SK',
			fieldLabel : 'No SK',
			maxLength : 50
		});
		NO_SK_LAMAField = Ext.create('Ext.form.ComboBox',{
			name : 'NO_SK_LAMA',
			fieldLabel : 'No SK Lama',
			hidden:true,
			store : Ext.create('Ext.data.Store',{
				pageSize : globalPageSize,
				proxy : Ext.create('Ext.data.HttpProxy',{
					url : 'c_trotoar/switchAction',
					reader : {
						type : 'json', root : 'results', rootProperty : 'results', totalProperty : 'total', idProperty : 'ID_TROTOAR'
					},
					actionMethods : { read : 'POST' },
					extraParams : { action : 'SEARCH' }
				}),
				fields : [
					{ name : 'ID_TROTOAR', type : 'int', mapping : 'ID_TROTOAR' },
					{ name : 'ID_PEMOHON', type : 'int', mapping : 'ID_PEMOHON' },
					{ name : 'JENIS_PERMOHONAN', type : 'int', mapping : 'JENIS_PERMOHONAN' },
					{ name : 'NO_SK', type : 'string', mapping : 'NO_SK' },
					{ name : 'NO_SK_LAMA', type : 'string', mapping : 'NO_SK_LAMA' },
					{ name : 'NAMA_PERUSAHAAN', type : 'string', mapping : 'NAMA_PERUSAHAAN' },
					{ name : 'ALAMAT', type : 'string', mapping : 'ALAMAT' },
					{ name : 'PERUNTUKAN', type : 'string', mapping : 'PERUNTUKAN' },
					{ name : 'ALAMAT_LOKASI', type : 'string', mapping : 'ALAMAT_LOKASI' },
					{ name : 'TGL_PERMOHONAN', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'TGL_PERMOHONAN' },
					{ name : 'TGL_BERLAKU', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'TGL_BERLAKU' },
					{ name : 'TGL_BERAKHIR', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'TGL_BERAKHIR' },
					{ name : 'STATUS', type : 'int', mapping : 'STATUS' },
					{ name : 'STATUS_SURVEY', type : 'int', mapping : 'STATUS_SURVEY' },
					{ name : 'pemohon_id', type : 'int', mapping : 'pemohon_id' },
					{ name : 'pemohon_nama', type : 'string', mapping : 'pemohon_nama' },
					{ name : 'pemohon_alamat', type : 'string', mapping : 'pemohon_alamat' },
					{ name : 'pemohon_telp', type : 'string', mapping : 'pemohon_telp' },
					{ name : 'pemohon_nik', type : 'string', mapping : 'pemohon_nik' },
				]
			}),
			displayField : 'NO_SK',
			valueField : 'ID_TROTOAR',
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
					'<div class="x-boundlist-item">No. SK : {NO_SK}<br>Nama Perusahaan : {NAMA_PERUSAHAAN}<br>Alamat : {ALAMAT}<br>Alamat Lokasi : {ALAMAT_LOKASI}<br>Fungsi : {PERUNTUKAN}</div>',
				'</tpl>'
			),
			listeners : {
				select : function(cmb, record){
					var rec=record[0];
					NAMA_PERUSAHAANField.setValue(rec.get('NAMA_PERUSAHAAN'));
					ALAMATField.setValue(rec.get('ALAMAT'));
					PERUNTUKANField.setValue(rec.get('PERUNTUKAN'));
					ALAMAT_LOKASIField.setValue(rec.get('ALAMAT_LOKASI'));
					pemohon_nikField.setValue(rec.get('pemohon_nik'));
					pemohon_idField.setValue(rec.get('pemohon_id'));
					pemohon_namaField.setValue(rec.get('pemohon_nama'));
					pemohon_alamatField.setValue(rec.get('pemohon_alamat'));
					pemohon_telpField.setValue(rec.get('pemohon_telp'));
				}
			}
		});
		NAMA_PERUSAHAANField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_PERUSAHAANField',
			name : 'NAMA_PERUSAHAAN',
			fieldLabel : 'Nama Perusahaan',
			maxLength : 50
		});
		ALAMATField = Ext.create('Ext.form.TextField',{
			id : 'ALAMATField',
			name : 'ALAMAT',
			fieldLabel : 'Alamat',
			maxLength : 100
		});
		PERUNTUKANField = Ext.create('Ext.form.TextField',{
			id : 'PERUNTUKANField',
			name : 'PERUNTUKAN',
			fieldLabel : 'Fungsi',
			maxLength : 50
		});
		ALAMAT_LOKASIField = Ext.create('Ext.form.TextField',{
			id : 'ALAMAT_LOKASIField',
			name : 'ALAMAT_LOKASI',
			fieldLabel : 'Alamat Lokasi',
			maxLength : 100
		});
		TGL_PERMOHONANField = Ext.create('Ext.form.TextField',{
			id : 'TGL_PERMOHONANField',
			name : 'permohonan_tanggal',
			fieldLabel : 'Tanggal Permohonan',
			maxLength : 0,
			hidden : true
		});
		TGL_BERLAKUField = Ext.create('Ext.form.TextField',{
			id : 'TGL_BERLAKUField',
			name : 'TGL_BERLAKU',
			fieldLabel : 'TGL_BERLAKU',
			maxLength : 0,
			hidden : true
		});
		TGL_BERAKHIRField = Ext.create('Ext.form.Date',{
			id : 'TGL_BERAKHIRField',
			name : 'permohonan_kadaluarsa',
			fieldLabel : 'Masa Berlaku',
			format:'d-m-Y',
			maxLength : 10,
			<?php echo ($_SESSION["IDHAK"] == 2) ? ("hidden:true") : (""); ?>
		});
		STATUSField = Ext.create('Ext.form.ComboBox',{
			id : 'STATUSField',
			name : 'STATUS',
			fieldLabel : 'Status Permohonan',
			store : new Ext.data.ArrayStore({
				fields : ['status_id', 'status'],
				data : [[1,'Diterima'],[0,'Ditolak']]
			}),
			displayField : 'status',
			valueField : 'status_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true,
			<?php echo ($_SESSION["IDHAK"] == 2) ? ("hidden:true") : (""); ?>
		});
		STATUS_SURVEYField = Ext.create('Ext.form.ComboBox',{
			id : 'STATUS_SURVEYField',
			name : 'STATUS_SURVEY',
			fieldLabel : 'Hasil Survey',
			store : new Ext.data.ArrayStore({
				fields : ['survey_id', 'survey'],
				data : [[1,'Lolos Survey'],[0,'Tidak Lolos Survey']]
			}),
			displayField : 'survey',
			valueField : 'survey_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true,
			<?php echo ($_SESSION["IDHAK"] == 2) ? ("hidden:true") : (""); ?>
		});
		/* START DATA PEMOHON */
		var otoar_det_pemohon_idField = Ext.create('Ext.form.Hidden',{
			name : 'pemohon_id'
		});
		var otoar_det_pemohon_namaField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_nama',
			fieldLabel : 'Nama',
			maxLength : 50
		});
		var otoar_det_pemohon_alamatField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_alamat',
			fieldLabel : 'Alamat',
			maxLength : 100
		});
		var otoar_det_pemohon_telpField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_telp',
			fieldLabel : 'Telp',
			maxLength : 20,
			maskRe : /([0-9]+)$/
		});
		var otoar_det_pemohon_npwpField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_npwp',
			fieldLabel : 'NPWP',
			maxLength : 50
		});
		var otoar_det_pemohon_rtField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_rt',
			fieldLabel : 'RT',
			maskRe : /([0-9]+)$/
		});
		var otoar_det_pemohon_rwField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_rw',
			fieldLabel : 'RW',
			maskRe : /([0-9]+)$/
		});
		var otoar_det_pemohon_kelField = Ext.create('Ext.form.ComboBox',{
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
		var otoar_det_pemohon_kecField = Ext.create('Ext.form.ComboBox',{
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
		var otoar_det_pemohon_nikField = Ext.create('Ext.form.ComboBox',{
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
				var store = otoar_det_pemohon_nikField.getStore();
				var val = otoar_det_pemohon_nikField.getRawValue();
				store.proxy.extraParams = {action : 'GETLIST',query : val};
				store.load();
				otoar_det_pemohon_nikField.expand();
				otoar_det_pemohon_nikField.fireEvent("ontriggerclick", this, event);
			},  
			tpl: Ext.create('Ext.XTemplate',
				'<tpl for=".">',
					'<div class="x-boundlist-item">NIK : {pemohon_nik}<br>Nama : {pemohon_nama}<br>Alamat : {pemohon_alamat}<br>Telp : {pemohon_telp}<br></div>',
				'</tpl>'
			),
			listeners : {
				select : function(cmb, record){
					var rec=record[0];
					otoar_det_pemohon_idField.setValue(rec.get('pemohon_id'));
					otoar_det_pemohon_nikField.setValue(rec.get('pemohon_nik'));
					otoar_det_pemohon_namaField.setValue(rec.get('pemohon_nama'));
					otoar_det_pemohon_alamatField.setValue(rec.get('pemohon_alamat'));
					otoar_det_pemohon_telpField.setValue(rec.get('pemohon_telp'));
					otoar_det_pemohon_npwpField.setValue(rec.get('pemohon_npwp'));
					otoar_det_pemohon_rtField.setValue(rec.get('pemohon_rt'));
					otoar_det_pemohon_rwField.setValue(rec.get('pemohon_rw'));
					otoar_det_pemohon_kelField.setValue(rec.get('pemohon_kel'));
					otoar_det_pemohon_kecField.setValue(rec.get('pemohon_kec'));
					otoar_det_pemohon_straField.setValue(rec.get('pemohon_stra'));
					otoar_det_pemohon_surattugasField.setValue(rec.get('pemohon_surattugas'));
					otoar_det_pemohon_pekerjaanField.setValue(rec.get('pemohon_pekerjaan'));
					otoar_det_pemohon_tempatlahirField.setValue(rec.get('pemohon_tempatlahir'));
					otoar_det_pemohon_tanggallahirField.setValue(rec.get('pemohon_tanggallahir'));
					otoar_det_pemohon_user_idField.setValue(rec.get('pemohon_user_id'));
					otoar_det_pemohon_pendidikanField.setValue(rec.get('pemohon_pendidikan'));
					otoar_det_pemohon_tahunlulusField.setValue(rec.get('pemohon_tahunlulus'));
				}
			}
		});
		var otoar_det_pemohon_straField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_stra',
			fieldLabel : 'STRA',
			hidden : true,
			maxLength : 50
		});
		var otoar_det_pemohon_surattugasField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_surattugas',
			fieldLabel : 'Surat Tugas',
			hidden : true,
			maxLength : 50
		});
		var otoar_det_pemohon_pekerjaanField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_pekerjaan',
			fieldLabel : 'Pekerjaan',
			maxLength : 50
		});
		var otoar_det_pemohon_tempatlahirField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_tempatlahir',
			fieldLabel : 'Tempat Lahir',
			maxLength : 50
		});
		var otoar_det_pemohon_tanggallahirField = Ext.create('Ext.form.field.Date',{
			name : 'pemohon_tanggallahir',
			fieldLabel : 'Tanggal Lahir',
			format : 'd-m-Y'
		});
		var otoar_det_pemohon_user_idField = Ext.create('Ext.form.Hidden',{
			name : 'pemohon_user_id',
		});
		var otoar_det_pemohon_pendidikanField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_pendidikan',
			fieldLabel : 'Pendidikan',
			maxLength : 50
		});
		var otoar_det_pemohon_tahunlulusField = Ext.create('Ext.form.TextField',{
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
		var otoar_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : otoar_save
		});
		var otoar_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				otoar_resetForm();
				otoar_switchToGrid();
				$('html, body').animate({scrollTop: 0}, 500);
			}
		});
		/*Get Syarat*/
		otoar_syaratDataStore = Ext.create('Ext.data.Store',{
			id : 'otoar_syaratDataStore',
			pageSize : globalPageSize,
			autoLoad : true,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_trotoar/switchAction',
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
		var otoar_syaratGridEditor = new Ext.grid.plugin.CellEditing({
			clicksToEdit: 1
		});
		otoar_syaratGrid = Ext.create('Ext.grid.Panel',{
			id : 'otoar_syaratDataStore',
			store : otoar_syaratDataStore,
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
				},
				{
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
		otoar_formPanel = Ext.create('Ext.form.Panel', {
			disabled : true,
			frame : true,
			layout : {
				type : 'form',
				padding : 5
			},
			defaults : {anchor : '95%'},
			items: [
				{
					xtype : 'fieldset',
					title : 'Trotoar',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						ID_TROTOARField,
						ID_PEMOHONField,
						JENIS_PERMOHONANField,
						TGL_PERMOHONANField,
						NO_SK_LAMAField,
						]
				}, {
					xtype : 'fieldset',
					title : '1. Data Pemohon',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						otoar_det_pemohon_idField,
						otoar_det_pemohon_nikField,
						otoar_det_pemohon_namaField,
						otoar_det_pemohon_alamatField,
						otoar_det_pemohon_telpField,
						otoar_det_pemohon_npwpField,
						otoar_det_pemohon_rtField,
						otoar_det_pemohon_rwField,
						otoar_det_pemohon_kelField,
						otoar_det_pemohon_kecField,
						otoar_det_pemohon_straField,
						otoar_det_pemohon_surattugasField,
						otoar_det_pemohon_pekerjaanField,
						otoar_det_pemohon_tempatlahirField,
						otoar_det_pemohon_tanggallahirField,
						otoar_det_pemohon_user_idField,
						otoar_det_pemohon_pendidikanField,
						otoar_det_pemohon_tahunlulusField
						]
				},{
					xtype : 'fieldset',
					title : '2. Data Perusahaan',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
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
						perusahaan_jusaha_idField
						]
				}, {
					xtype : 'fieldset',
					title : '3. Data Perijinan',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						// NO_SKField,
						/* NAMA_PERUSAHAANField,
						ALAMATField,
						PERUNTUKANField,
						ALAMAT_LOKASIField, */
						// TGL_PERMOHONANField,
						// TGL_BERLAKUField,
						// STATUS_SURVEYField,
						// STATUSField,
						// TGL_BERAKHIRField,
						ALAMAT_LOKASIField,
						PERUNTUKANField,
						<?php echo ($_SESSION['IDHAK'] == 2) ? ("") : ("TGL_BERAKHIRField,"); ?>
						<?php echo ($_SESSION['IDHAK'] == 2) ? ("") : ("STATUS_SURVEYField,"); ?>
						<?php echo ($_SESSION['IDHAK'] == 2) ? ("") : ("STATUSField,"); ?>
						<?php echo ($_SESSION["IDHAK"] == 2) ? ("") : ("RETRIBUSI_STATUSField,"); ?>
						<?php echo ($_SESSION["IDHAK"] == 2) ? ("") : ("RETRIBUSIField,"); ?>
						<?php echo ($_SESSION["IDHAK"] == 2) ? ("") : ("retibusiTanggalField,"); ?>
					]
				}, {
					xtype : 'fieldset',
					title : '3. Data Kelengkapan',
					columnWidth : 0.5,
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						otoar_syaratGrid
					]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [otoar_saveButton,otoar_cancelButton]
		});
		otoar_formWindow = Ext.create('Ext.window.Window',{
			id : 'otoar_formWindow',
			renderTo : 'otoarSaveWindow',
			title : globalFormAddEditTitle + ' ' + otoar_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [otoar_formPanel]
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
		JENIS_PERMOHONANSearchField = Ext.create('Ext.form.NumberField',{
			id : 'JENIS_PERMOHONANSearchField',
			name : 'JENIS_PERMOHONAN',
			fieldLabel : 'JENIS_PERMOHONAN',
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
		NAMA_PERUSAHAANSearchField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_PERUSAHAANSearchField',
			name : 'NAMA_PERUSAHAAN',
			fieldLabel : 'NAMA_PERUSAHAAN',
			maxLength : 50
		
		});
		ALAMATSearchField = Ext.create('Ext.form.TextField',{
			id : 'ALAMATSearchField',
			name : 'ALAMAT',
			fieldLabel : 'ALAMAT',
			maxLength : 100
		
		});
		PERUNTUKANSearchField = Ext.create('Ext.form.TextField',{
			id : 'PERUNTUKANSearchField',
			name : 'PERUNTUKAN',
			fieldLabel : 'PERUNTUKAN',
			maxLength : 50
		
		});
		ALAMAT_LOKASISearchField = Ext.create('Ext.form.TextField',{
			id : 'ALAMAT_LOKASISearchField',
			name : 'ALAMAT_LOKASI',
			fieldLabel : 'ALAMAT_LOKASI',
			maxLength : 100
		
		});
		TGL_PERMOHONANSearchField = Ext.create('Ext.form.TextField',{
			id : 'TGL_PERMOHONANSearchField',
			name : 'TGL_PERMOHONAN',
			fieldLabel : 'TGL_PERMOHONAN',
			maxLength : 0
		
		});
		TGL_BERLAKUSearchField = Ext.create('Ext.form.TextField',{
			id : 'TGL_BERLAKUSearchField',
			name : 'TGL_BERLAKU',
			fieldLabel : 'TGL_BERLAKU',
			maxLength : 0
		
		});
		TGL_BERAKHIRSearchField = Ext.create('Ext.form.TextField',{
			id : 'TGL_BERAKHIRSearchField',
			name : 'TGL_BERAKHIR',
			fieldLabel : 'TGL_BERAKHIR',
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
		var otoar_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : otoar_search
		});
		var otoar_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				otoar_searchWindow.hide();
			}
		});
		otoar_searchPanel = Ext.create('Ext.form.Panel', {
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
						JENIS_PERMOHONANSearchField,
						NO_SKSearchField,
						NO_SK_LAMASearchField,
						NAMA_PERUSAHAANSearchField,
						ALAMATSearchField,
						PERUNTUKANSearchField,
						ALAMAT_LOKASISearchField,
						TGL_PERMOHONANSearchField,
						TGL_BERLAKUSearchField,
						TGL_BERAKHIRSearchField,
						STATUSSearchField,
						STATUS_SURVEYSearchField,
						]
				}],
			buttons : [otoar_searchingButton,otoar_cancelSearchButton]
		});
		otoar_searchWindow = Ext.create('Ext.window.Window',{
			id : 'otoar_searchWindow',
			renderTo : 'otoarSearchWindow',
			title : globalFormSearchTitle + ' ' + otoar_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [otoar_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="otoarSaveWindow"></div>
<div id="otoarSearchWindow"></div>
<div class="span12" id="otoarGrid"></div>