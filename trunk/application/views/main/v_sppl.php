<style>
	.checked{
		background-image:url(../assets/images/icons/check.png) !important;
		margin:auto;
	}
</style>
<h4>SURAT PERNYATAAN KESANGGUPAN PENGELOLAAN DAN PEMANTAUAN LINGKUNGAN HIDUP</h4>
<hr>
<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var pl_componentItemTitle="SPPL";
		var pl_dataStore;
		var sppl_syaratDataStore;
		
		var pl_shorcut;
		var pl_contextMenu;
		var pl_gridSearchField;
		var pl_gridPanel;
		var pl_formPanel;
		var pl_formWindow;
		var pl_searchPanel;
		var pl_searchWindow;
		
		var ID_SPPLField;
		var ID_USERField;
		var NO_SKField;
		var NAMA_USAHAField;
		var PENANGGUNG_JAWABField;
		var NO_TELPField;
		var JENIS_USAHAField;
		var ALAMAT_USAHAField;
		var STATUS_LAHANField;
		var NO_AKTAField;
		var TANGGALField;
		var LUAS_LAHANField;
		var LUAS_TAPAK_BANGUNANField;
		var LUAS_KEGIATANField;
		var LUAS_PARKIRField;
		
		var pl_dbTask = 'CREATE';
		var pl_dbTaskMessage = 'Tambah';
		var pl_dbPermission = 'CRUD';
		var pl_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function pl_switchToGrid(){
			pl_formPanel.setDisabled(true);
			pl_gridPanel.setDisabled(false);
			pl_formWindow.hide();
		}
		
		function pl_switchToForm(){
			pl_gridPanel.setDisabled(true);
			pl_formPanel.setDisabled(false);
			pl_formWindow.show();
		}
		
		function pl_confirmAdd(){
			pl_dbTask = 'CREATE';
			pl_dbTaskMessage = 'created';
			pl_resetForm();
			pl_switchToForm();
			sppl_syaratDataStore.proxy.extraParams = {
				currentAction : 'create',
				action : 'GETSYARAT'
			};
			sppl_syaratDataStore.load();
		}
		
		function pl_confirmUpdate(){
			if(pl_gridPanel.selModel.getCount() == 1) {
				pl_dbTask = 'UPDATE';
				pl_dbTaskMessage = 'updated';
				pl_switchToForm();
				pl_setForm();
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
		
		function pl_confirmDelete(){
			if(pl_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, pl_delete);
			}else if(pl_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, pl_delete);
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
		
		function pl_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(pl_dbPermission)==false && pattC.test(pl_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(pl_confirmFormValid()){
					var array_sppl_keterangan=new Array();
					if(sppl_syaratDataStore.getCount() > 0){
						for(var i=0;i<sppl_syaratDataStore.getCount();i++){
							array_sppl_keterangan.push(sppl_syaratDataStore.getAt(i).data.KETERANGAN);
						}
					}
					
					var params = pl_formPanel.getForm().getValues();
					params.ijin_id = 28;
					params.JENIS_USAHA=perusahaan_jusaha_idField.getRawValue();
					params.STATUS_LAHAN=perusahaan_stempat_idField.getRawValue();
					params.action = pl_dbTask;
					params.KETERANGAN = array_sppl_keterangan;
					params = Ext.encode(params);
					
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_sppl/switchAction',
						params: {							
							params : params,
							action : pl_dbTask
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
									sppl_syaratDataStore.reload();
									pl_dataStore.reload();
									pl_resetForm();
									pl_switchToGrid();
									pl_gridPanel.getSelectionModel().deselectAll();
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
		
		function pl_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(pl_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = pl_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< pl_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.ID_SPPL);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_sppl/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									pl_dataStore.reload();
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
		
		function pl_refresh(){
			pl_dbListAction = "GETLIST";
			pl_gridSearchField.reset();
			pl_dataStore.proxy.extraParams = { action : 'GETLIST' };
			pl_dataStore.proxy.extraParams.query = "";
			pl_dataStore.currentPage = 1;
			pl_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function pl_confirmFormValid(){
			return pl_formPanel.getForm().isValid();
		}
		
		function pl_resetForm(){
			pl_dbTask = 'CREATE';
			pl_dbTaskMessage = 'create';
			pl_formPanel.getForm().reset();
			ID_SPPLField.setValue(0);
		}
		
		function pl_setForm(){
			pl_dbTask = 'UPDATE';
            pl_dbTaskMessage = 'update';
			
			var record = pl_gridPanel.getSelectionModel().getSelection()[0];
			pl_formPanel.loadRecord(record);
			ID_SKTRField.setValue(record.data.ID_SKTR);
			JENIS_PERMOHONANField.setValue(record.data.JENIS_PERMOHONAN);
			/* pemohon_idField.setValue(record.data.pemohon_id);
			pemohon_nikField.setValue(record.data.pemohon_nik);
			pemohon_namaField.setValue(record.data.pemohon_nama);
			pemohon_telpField.setValue(record.data.pemohon_telp);
			pemohon_alamatField.setValue(record.data.pemohon_alamat);
			ID_SPPLField.setValue(record.data.ID_SPPL);
			ID_USERField.setValue(record.data.ID_USER);
			NO_SKField.setValue(record.data.NO_SK);
			NAMA_USAHAField.setValue(record.data.NAMA_USAHA);
			PENANGGUNG_JAWABField.setValue(record.data.PENANGGUNG_JAWAB);
			NO_TELPField.setValue(record.data.NO_TELP);
			JENIS_USAHAField.setValue(record.data.JENIS_USAHA);
			ALAMAT_USAHAField.setValue(record.data.ALAMAT_USAHA);
			STATUS_LAHANField.setValue(record.data.STATUS_LAHAN);
			NO_AKTAField.setValue(record.data.NO_AKTA);
			MULAI_KEGIATANField.setValue(record.data.MULAI_KEGIATAN);
			TANGGALField.setValue(record.data.TANGGAL);
			LUAS_LAHANField.setValue(record.data.LUAS_LAHAN);
			LUAS_TAPAK_BANGUNANField.setValue(record.data.LUAS_TAPAK_BANGUNAN);
			LUAS_KEGIATANField.setValue(record.data.LUAS_KEGIATAN);
			LUAS_PARKIRField.setValue(record.data.LUAS_PARKIR);
			STATUSField.setValue(record.data.STATUS);
			STATUS_SURVEYField.setValue(record.data.STATUS_SURVEY);
			TGL_BERAKHIRField.setValue(record.data.TGL_BERAKHIR);
			RETRIBUSIField.setValue(record.data.RETRIBUSI); */
			if(record.data.RETRIBUSI != 0){
				RETRIBUSI_STATUSField.setValue({ s_retribusi : ['1'] });
			}else{
				RETRIBUSI_STATUSField.setValue({ s_retribusi : ['0'] });
			}
			sppl_syaratDataStore.proxy.extraParams = { 
				sppl_id : record.data.ID_SPPL,
				currentAction : 'update',
				action : 'GETSYARAT'
			};
			sppl_syaratDataStore.load();
		}
		
		function pl_showSearchWindow(){
			pl_searchWindow.show();
		}
		
		function pl_search(){
			pl_gridSearchField.reset();
			
			var ID_USERValue = '';
			var NO_SKValue = '';
			var NAMA_USAHAValue = '';
			var PENANGGUNG_JAWABValue = '';
			var NO_TELPValue = '';
			var JENIS_USAHAValue = '';
			var ALAMAT_USAHAValue = '';
			var STATUS_LAHANValue = '';
			var NO_AKTAValue = '';
			var TANGGALValue = '';
			var LUAS_LAHANValue = '';
			var LUAS_TAPAK_BANGUNANValue = '';
			var LUAS_KEGIATANValue = '';
			var LUAS_PARKIRValue = '';
						
			ID_USERValue = ID_USERSearchField.getValue();
			NO_SKValue = NO_SKSearchField.getValue();
			NAMA_USAHAValue = NAMA_USAHASearchField.getValue();
			PENANGGUNG_JAWABValue = PENANGGUNG_JAWABSearchField.getValue();
			NO_TELPValue = NO_TELPSearchField.getValue();
			JENIS_USAHAValue = JENIS_USAHASearchField.getValue();
			ALAMAT_USAHAValue = ALAMAT_USAHASearchField.getValue();
			STATUS_LAHANValue = STATUS_LAHANSearchField.getValue();
			NO_AKTAValue = NO_AKTASearchField.getValue();
			TANGGALValue = TANGGALSearchField.getValue();
			LUAS_LAHANValue = LUAS_LAHANSearchField.getValue();
			LUAS_TAPAK_BANGUNANValue = LUAS_TAPAK_BANGUNANSearchField.getValue();
			LUAS_KEGIATANValue = LUAS_KEGIATANSearchField.getValue();
			LUAS_PARKIRValue = LUAS_PARKIRSearchField.getValue();
			pl_dbListAction = "SEARCH";
			pl_dataStore.proxy.extraParams = { 
				ID_USER : ID_USERValue,
				NO_SK : NO_SKValue,
				NAMA_USAHA : NAMA_USAHAValue,
				PENANGGUNG_JAWAB : PENANGGUNG_JAWABValue,
				NO_TELP : NO_TELPValue,
				JENIS_USAHA : JENIS_USAHAValue,
				ALAMAT_USAHA : ALAMAT_USAHAValue,
				STATUS_LAHAN : STATUS_LAHANValue,
				NO_AKTA : NO_AKTAValue,
				TANGGAL : TANGGALValue,
				LUAS_LAHAN : LUAS_LAHANValue,
				LUAS_TAPAK_BANGUNAN : LUAS_TAPAK_BANGUNANValue,
				LUAS_KEGIATAN : LUAS_KEGIATANValue,
				LUAS_PARKIR : LUAS_PARKIRValue,
				action : 'SEARCH'
			};
			pl_dataStore.currentPage = 1;
			pl_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function pl_printExcel(outputType){
			var searchText = "";
			var ID_USERValue = '';
			var NO_SKValue = '';
			var NAMA_USAHAValue = '';
			var PENANGGUNG_JAWABValue = '';
			var NO_TELPValue = '';
			var JENIS_USAHAValue = '';
			var ALAMAT_USAHAValue = '';
			var STATUS_LAHANValue = '';
			var NO_AKTAValue = '';
			var TANGGALValue = '';
			var LUAS_LAHANValue = '';
			var LUAS_TAPAK_BANGUNANValue = '';
			var LUAS_KEGIATANValue = '';
			var LUAS_PARKIRValue = '';
			
			if(pl_dataStore.proxy.extraParams.query!==null){searchText = pl_dataStore.proxy.extraParams.query;}
			if(pl_dataStore.proxy.extraParams.ID_USER!==null){ID_USERValue = pl_dataStore.proxy.extraParams.ID_USER;}
			if(pl_dataStore.proxy.extraParams.NO_SK!==null){NO_SKValue = pl_dataStore.proxy.extraParams.NO_SK;}
			if(pl_dataStore.proxy.extraParams.NAMA_USAHA!==null){NAMA_USAHAValue = pl_dataStore.proxy.extraParams.NAMA_USAHA;}
			if(pl_dataStore.proxy.extraParams.PENANGGUNG_JAWAB!==null){PENANGGUNG_JAWABValue = pl_dataStore.proxy.extraParams.PENANGGUNG_JAWAB;}
			if(pl_dataStore.proxy.extraParams.NO_TELP!==null){NO_TELPValue = pl_dataStore.proxy.extraParams.NO_TELP;}
			if(pl_dataStore.proxy.extraParams.JENIS_USAHA!==null){JENIS_USAHAValue = pl_dataStore.proxy.extraParams.JENIS_USAHA;}
			if(pl_dataStore.proxy.extraParams.ALAMAT_USAHA!==null){ALAMAT_USAHAValue = pl_dataStore.proxy.extraParams.ALAMAT_USAHA;}
			if(pl_dataStore.proxy.extraParams.STATUS_LAHAN!==null){STATUS_LAHANValue = pl_dataStore.proxy.extraParams.STATUS_LAHAN;}
			if(pl_dataStore.proxy.extraParams.NO_AKTA!==null){NO_AKTAValue = pl_dataStore.proxy.extraParams.NO_AKTA;}
			if(pl_dataStore.proxy.extraParams.TANGGAL!==null){TANGGALValue = pl_dataStore.proxy.extraParams.TANGGAL;}
			if(pl_dataStore.proxy.extraParams.LUAS_LAHAN!==null){LUAS_LAHANValue = pl_dataStore.proxy.extraParams.LUAS_LAHAN;}
			if(pl_dataStore.proxy.extraParams.LUAS_TAPAK_BANGUNAN!==null){LUAS_TAPAK_BANGUNANValue = pl_dataStore.proxy.extraParams.LUAS_TAPAK_BANGUNAN;}
			if(pl_dataStore.proxy.extraParams.LUAS_KEGIATAN!==null){LUAS_KEGIATANValue = pl_dataStore.proxy.extraParams.LUAS_KEGIATAN;}
			if(pl_dataStore.proxy.extraParams.LUAS_PARKIR!==null){LUAS_PARKIRValue = pl_dataStore.proxy.extraParams.LUAS_PARKIR;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_sppl/switchAction',
				params : {
					action : outputType,
					query : searchText,
					ID_USER : ID_USERValue,
					NO_SK : NO_SKValue,
					NAMA_USAHA : NAMA_USAHAValue,
					PENANGGUNG_JAWAB : PENANGGUNG_JAWABValue,
					NO_TELP : NO_TELPValue,
					JENIS_USAHA : JENIS_USAHAValue,
					ALAMAT_USAHA : ALAMAT_USAHAValue,
					STATUS_LAHAN : STATUS_LAHANValue,
					NO_AKTA : NO_AKTAValue,
					TANGGAL : TANGGALValue,
					LUAS_LAHAN : LUAS_LAHANValue,
					LUAS_TAPAK_BANGUNAN : LUAS_TAPAK_BANGUNANValue,
					LUAS_KEGIATAN : LUAS_KEGIATANValue,
					LUAS_PARKIR : LUAS_PARKIRValue,
					currentAction : pl_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/sppl_list.xls');
							}else{
								window.open('./print/sppl_list.html','pllist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		pl_dataStore = Ext.create('Ext.data.Store',{
			id : 'pl_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_sppl/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'ID_SPPL'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'ID_SPPL', type : 'int', mapping : 'ID_SPPL' },
				{ name : 'JENIS_PERMOHONAN', type : 'int', mapping : 'JENIS_PERMOHONAN' },
				{ name : 'lama_proses', type : 'string', mapping : 'lama_proses' },
				{ name : 'NO_SK', type : 'string', mapping : 'NO_SK' },
				{ name : 'NAMA_USAHA', type : 'string', mapping : 'NAMA_USAHA' },
				{ name : 'PENANGGUNG_JAWAB', type : 'string', mapping : 'PENANGGUNG_JAWAB' },
				{ name : 'NO_TELP', type : 'string', mapping : 'NO_TELP' },
				{ name : 'JENIS_USAHA', type : 'string', mapping : 'JENIS_USAHA' },
				{ name : 'ALAMAT_USAHA', type : 'string', mapping : 'ALAMAT_USAHA' },
				{ name : 'STATUS_LAHAN', type : 'int', mapping : 'STATUS_LAHAN' },
				{ name : 'STATUS', type : 'int', mapping : 'STATUS' },
				{ name : 'STATUS_SURVEY', type : 'int', mapping : 'STATUS_SURVEY' },
				{ name : 'NO_AKTA', type : 'string', mapping : 'NO_AKTA' },
				{ name : 'TANGGAL', type : 'date', dateFormat : 'Y-m-d', mapping : 'TANGGAL' },
				{ name : 'TGL_BERAKHIR', type : 'date', dateFormat : 'Y-m-d', mapping : 'TGL_BERAKHIR' },
				{ name : 'TGL_BERLAKU', type : 'date', dateFormat : 'Y-m-d', mapping : 'TGL_BERLAKU' },
				{ name : 'MULAI_KEGIATAN', type : 'date', dateFormat : 'Y-m-d', mapping : 'MULAI_KEGIATAN' },
				{ name : 'LUAS_LAHAN', type : 'float', mapping : 'LUAS_LAHAN' },
				{ name : 'LUAS_TAPAK_BANGUNAN', type : 'float', mapping : 'LUAS_TAPAK_BANGUNAN' },
				{ name : 'LUAS_KEGIATAN', type : 'float', mapping : 'LUAS_KEGIATAN' },
				{ name : 'LUAS_PARKIR', type : 'float', mapping : 'LUAS_PARKIR' },
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
		pl_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						pl_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						pl_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						pl_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						pl_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						pl_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						pl_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						pl_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						pl_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var pl_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : pl_confirmAdd
		});
		var pl_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : pl_confirmUpdate
		});
		var pl_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : pl_confirmDelete
		});
		var pl_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : pl_refresh
		});
		var pl_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : pl_showSearchWindow
		});
		var pl_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				pl_printExcel('PRINT');
			}
		});
		var pl_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				pl_printExcel('EXCEL');
			}
		});
		
		var pl_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : pl_confirmUpdate
		});
		var pl_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : pl_confirmDelete
		});
		var pl_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : pl_refresh
		});
		pl_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'pl_contextMenu',
			items: [
				pl_contextMenuEdit,pl_contextMenuDelete,'-',pl_contextMenuRefresh
			]
		});
		
		/* Start ContextMenu For Action Column */
		var sppl_bp_printCM = Ext.create('Ext.menu.Item',{
			text : 'Bukti Penerimaan',
			tooltip : 'Cetak Bukti Penerimaan',
			handler : function(){
				var record = pl_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_sppl/switchAction',
					params: {
						ID_SPPL : record.get('ID_SPPL'),
						action : 'CETAKBP'
					},success : function(){
						window.open('<?php echo base_url("print/sppl_bp.html/")?>');
					}
				});
			}
		});
		var sppl_lk_printCM = Ext.create('Ext.menu.Item',{
			text : 'Lembar Kontrol',
			tooltip : 'Cetak Lembar Kontrol',
			handler : function(){
				var record = pl_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_sppl/switchAction',
					params: {
						ID_SPPL : record.get('ID_SPPL'),
						action : 'CETAKLK'
					},success : function(){
						window.open('<?php echo base_url("print/sppl_lk.html/")?>');
					}
				});
			}
		});
		var stkr_sppl_printCM = Ext.create('Ext.menu.Item',{
			text : 'SPPL',
			tooltip : 'Cetak SPPL',
			handler : function(){
				var record = pl_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_sppl/switchAction',
					params: {
						ID_SPPL : record.get('ID_SPPL'),
						action : 'CETAKSPPL'
					},success : function(){
						window.open('<?php echo base_url("print/sppl_sk.html/")?>');
					}
				});
			}
		});
		var sppl_printContextMenu = Ext.create('Ext.menu.Menu',{
			items: [
				<?php echo ($_SESSION["IDHAK"] == 2) ? ("sppl_bp_printCM") : ("sppl_bp_printCM,sppl_lk_printCM,stkr_sppl_printCM")?>
			]
		});
		function sppl_ubahProses(proses){
			var record = pl_gridPanel.getSelectionModel().getSelection()[0];
			Ext.Ajax.request({
				waitMsg: 'Please wait...',
				url: 'c_sppl/switchAction',
				params: {
					sppl_id : record.get('ID_SPPL'),
					proses : proses,
					no_sk : record.get('NO_SK'),
					action : 'UBAHPROSES'
				},success : function(){
					pl_dataStore.reload();
				}
			});
		}
		var sppl_prosesContextMenu = Ext.create('Ext.menu.Menu',{
			items: [
				{
					text : 'Selesai, belum diambil',
					tooltip : 'Ubah Menjadi Selesai, belum diambil',
					handler : function(){
						sppl_ubahProses('Selesai, belum diambil');
					}
				},
				{
					text : 'Selesai, sudah diambil',
					tooltip : 'Ubah Menjadi Selesai, sudah diambil',
					handler : function(){
						sppl_ubahProses('Selesai, sudah diambil');
					}
				},
				{
					text : 'Ditolak',
					tooltip : 'Ubah Menjadi Ditolak',
					handler : function(){
						sppl_ubahProses('Ditolak');
					}
				}
			]
		});
		/*----------------end----------------*/
		
		pl_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : pl_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						pl_dataStore.proxy.extraParams = { action : 'GETLIST'};
						pl_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		pl_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'pl_gridPanel',
			constrain : true,
			store : pl_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'plGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						pl_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : pl_shorcut,
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
							sppl_printContextMenu.showAt(e.getXY());
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
							pl_confirmUpdate();
						}
					},{
						iconCls: 'icon16x16-delete',
						tooltip: 'Hapus Data',
						handler: function(grid, rowIndex){
							grid.getSelectionModel().select(rowIndex);
							pl_confirmDelete();
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
							sppl_prosesContextMenu.showAt(e.getXY());
							return false;
						}
					}],
					<?php echo ($_SESSION["IDHAK"] == 2) ? ("hidden:true") : ("")?>
				}
							
			],
			tbar : [
				pl_addButton,
				// pl_editButton,
				// pl_deleteButton,
				pl_gridSearchField,
				// pl_searchButton,
				pl_refreshButton,
				pl_printButton,
				pl_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : pl_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					pl_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		ID_SPPLField = Ext.create('Ext.form.NumberField',{
			id : 'ID_SPPLField',
			name : 'permohonan_id',
			fieldLabel : 'ID_SPPL<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		ID_USERField = Ext.create('Ext.form.NumberField',{
			id : 'ID_USERField',
			name : 'ID_USER',
			fieldLabel : 'ID_USER',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden:true,
			maskRe : /([0-9]+)$/});
		NO_SKField = Ext.create('Ext.form.TextField',{
			id : 'NO_SKField',
			name : 'NO_SK',
			fieldLabel : 'No. SK',
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
		NO_SK_LAMAField = Ext.create('Ext.form.ComboBox',{
			name : 'NO_SK_LAMA',
			fieldLabel : 'SK Lama',
			hidden:true,
			store : Ext.create('Ext.data.Store',{
				pageSize : globalPageSize,
				proxy : Ext.create('Ext.data.HttpProxy',{
					url : 'c_sppl/switchAction',
					reader : {
						type : 'json', root : 'results', rootProperty : 'results', totalProperty : 'total', idProperty : 'ID_SPPL'
					},
					actionMethods : { read : 'POST' },
					extraParams : { action : 'SEARCH' }
				}),
				fields : [
					{ name : 'ID_SPPL', type : 'int', mapping : 'ID_SPPL' },
					{ name : 'JENIS_PERMOHONAN', type : 'int', mapping : 'JENIS_PERMOHONAN' },
					{ name : 'pemohon_nama', type : 'string', mapping : 'pemohon_nama' },
					{ name : 'pemohon_alamat', type : 'string', mapping : 'pemohon_alamat' },
					{ name : 'pemohon_telp', type : 'string', mapping : 'pemohon_telp' },
					{ name : 'lama_proses', type : 'string', mapping : 'lama_proses' },
					{ name : 'NO_SK', type : 'string', mapping : 'NO_SK' },
					{ name : 'NAMA_USAHA', type : 'string', mapping : 'NAMA_USAHA' },
					{ name : 'PENANGGUNG_JAWAB', type : 'string', mapping : 'PENANGGUNG_JAWAB' },
					{ name : 'NO_TELP', type : 'string', mapping : 'NO_TELP' },
					{ name : 'JENIS_USAHA', type : 'string', mapping : 'JENIS_USAHA' },
					{ name : 'ALAMAT_USAHA', type : 'string', mapping : 'ALAMAT_USAHA' },
					{ name : 'STATUS_LAHAN', type : 'int', mapping : 'STATUS_LAHAN' },
					{ name : 'NO_AKTA', type : 'string', mapping : 'NO_AKTA' },
					{ name : 'TANGGAL', type : 'string', mapping : 'TANGGAL' },
					{ name : 'MULAI_KEGIATAN', type : 'string', mapping : 'MULAI_KEGIATAN' },
					{ name : 'LUAS_LAHAN', type : 'float', mapping : 'LUAS_LAHAN' },
					{ name : 'LUAS_TAPAK_BANGUNAN', type : 'float', mapping : 'LUAS_TAPAK_BANGUNAN' },
					{ name : 'LUAS_KEGIATAN', type : 'float', mapping : 'LUAS_KEGIATAN' },
					{ name : 'LUAS_PARKIR', type : 'float', mapping : 'LUAS_PARKIR' },
					{ name : 'STATUS', type : 'int', mapping : 'STATUS' },
					{ name : 'STATUS_SURVEY', type : 'int', mapping : 'STATUS_SURVEY' },
					{ name : 'TGL_BERAKHIR', type : 'date', dateFormat : 'Y-m-d', mapping : 'TGL_BERAKHIR' },
				]
			}),
			displayField : 'NO_SK',
			valueField : 'ID_SPPL',
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
					'<div class="x-boundlist-item">No. SK : {NO_SK}<br>Nama Usaha : {NAMA_USAHA}<br>Penanggung Jawab : {PENANGGUNG_JAWAB}<br>Jenis Usaha : {JENIS_USAHA}<br>Alamat Usaha : {ALAMAT_USAHA}<br></div>',
				'</tpl>'
			),
			listeners : {
				select : function(cmb, record){
					var rec=record[0];
					NAMA_USAHAField.setValue(rec.get('NAMA_USAHA'));
					PENANGGUNG_JAWABField.setValue(rec.get('PENANGGUNG_JAWAB'));
					NO_TELPField.setValue(rec.get('NO_TELP'));
					JENIS_USAHAField.setValue(rec.get('JENIS_USAHA'));
					ALAMAT_USAHAField.setValue(rec.get('ALAMAT_USAHA'));
					STATUS_LAHANField.setValue(rec.get('STATUS_LAHAN'));
					NO_AKTAField.setValue(rec.get('NO_AKTA'));
					TANGGALField.setValue(rec.get('TANGGAL'));
					MULAI_KEGIATANField.setValue(rec.get('MULAI_KEGIATAN'));
					LUAS_LAHANField.setValue(rec.get('LUAS_LAHAN'));
					LUAS_TAPAK_BANGUNANField.setValue(rec.get('LUAS_TAPAK_BANGUNAN'));
					LUAS_KEGIATANField.setValue(rec.get('LUAS_KEGIATAN'));
					LUAS_PARKIRField.setValue(rec.get('LUAS_PARKIR'));	
				}
			}
		});
		var TGL_BERAKHIRField = Ext.create('Ext.form.Date',{
			id : 'TGL_BERAKHIRField',
			name : 'permohonan_kadaluarsa',
			format : 'd-m-Y',
			fieldLabel : 'Masa Berlaku',
			maxLength : 20
		});
		var STATUSField = Ext.create('Ext.form.ComboBox',{
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
			forceSelection : true
		});
		var STATUS_SURVEYField = Ext.create('Ext.form.ComboBox',{
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
			forceSelection : true
		});
		NAMA_USAHAField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_USAHAField',
			name : 'NAMA_USAHA',
			fieldLabel : 'Nama Usaha',
			maxLength : 50
		});
		PENANGGUNG_JAWABField = Ext.create('Ext.form.TextField',{
			id : 'PENANGGUNG_JAWABField',
			name : 'PENANGGUNG_JAWAB',
			fieldLabel : 'Penangung Jawab',
			maxLength : 50
		});
		NO_TELPField = Ext.create('Ext.form.TextField',{
			id : 'NO_TELPField',
			name : 'NO_TELP',
			fieldLabel : 'No. Telp.',
			maxLength : 20
		});
		JENIS_USAHAField = Ext.create('Ext.form.TextField',{
			id : 'JENIS_USAHAField',
			name : 'JENIS_USAHA',
			fieldLabel : 'Jenis Usaha',
			maxLength : 100
		});
		ALAMAT_USAHAField = Ext.create('Ext.form.TextField',{
			id : 'ALAMAT_USAHAField',
			name : 'ALAMAT_USAHA',
			fieldLabel : 'Alamat Usaha',
			maxLength : 100
		});
		STATUS_LAHANField = Ext.create('Ext.form.ComboBox',{
			id : 'STATUS_LAHANField',
			name : 'STATUS_LAHAN',
			fieldLabel : 'Status Lahan',
			store : new Ext.data.ArrayStore({
				fields : ['status_id', 'status'],
				data : [[1,'Sertifikat'],[0,'PPAT']]
			}),
			displayField : 'status',
			valueField : 'status_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true
		});
		JENIS_PERMOHONANField = Ext.create('Ext.form.ComboBox',{
			id : 'JENIS_PERMOHONANField',
			name : 'permohonan_jenis',
			fieldLabel : 'Jenis Permohonan',
			allowBlank : false,
			store : new Ext.data.ArrayStore({
				fields : ['jenis_id', 'jenis'],
				data : [[1,'Baru'],[0,'Perubahan']]
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
						// pemohon_namaField.disable();
						// pemohon_alamatField.disable();
						// pemohon_telpField.disable();
					}else{
						NO_SK_LAMAField.hide();
						// pemohon_namaField.enable();
						// pemohon_alamatField.enable();
						// pemohon_telpField.enable();
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
		NO_AKTAField = Ext.create('Ext.form.TextField',{
			id : 'NO_AKTAField',
			name : 'NO_AKTA',
			fieldLabel : 'No Akta',
			maxLength : 100
		});
		TANGGALField = Ext.create('Ext.form.Date',{
			id : 'TANGGALField',
			name : 'TANGGAL',
			format : 'd-m-Y',
			fieldLabel : 'Tanggal Akta',
			maxLength : 20
		});
		MULAI_KEGIATANField = Ext.create('Ext.form.Date',{
			id : 'MULAI_KEGIATANField',
			name : 'MULAI_KEGIATAN',
			format : 'd-m-Y',
			fieldLabel : 'Mulai Kegiatan',
			maxLength : 20
		});
		LUAS_LAHANField = Ext.create('Ext.form.TextField',{
			id : 'LUAS_LAHANField',
			name : 'LUAS_LAHAN',
			fieldLabel : 'Luas Lahan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		LUAS_TAPAK_BANGUNANField = Ext.create('Ext.form.TextField',{
			id : 'LUAS_TAPAK_BANGUNANField',
			name : 'LUAS_TAPAK_BANGUNAN',
			fieldLabel : 'Luas Tapak Bangunan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		LUAS_KEGIATANField = Ext.create('Ext.form.TextField',{
			id : 'LUAS_KEGIATANField',
			name : 'LUAS_KEGIATAN',
			fieldLabel : 'Luas Kegiatan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		LUAS_PARKIRField = Ext.create('Ext.form.TextField',{
			id : 'LUAS_PARKIRField',
			name : 'LUAS_PARKIR',
			fieldLabel : 'Luas Parkir',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		var pl_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : pl_save
		});
		var pl_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				pl_resetForm();
				pl_switchToGrid();
				$('html, body').animate({scrollTop: 0}, 500);
			}
		});
		/*Get Syarat*/
		sppl_syaratDataStore = Ext.create('Ext.data.Store',{
			id : 'sppl_syaratDataStore',
			pageSize : globalPageSize,
			autoLoad : true,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_sppl/switchAction',
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
		var sppl_syaratGridEditor = new Ext.grid.plugin.CellEditing({
			clicksToEdit: 1
		});
		sppl_syaratGrid = Ext.create('Ext.grid.Panel',{
			id : 'sppl_syaratDataStore',
			store : sppl_syaratDataStore,
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
		/* START DATA PEMOHON */
		var pl_det_pemohon_idField = Ext.create('Ext.form.Hidden',{
			name : 'pemohon_id'
		});
		var pl_det_pemohon_namaField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_nama',
			fieldLabel : 'Nama',
			maxLength : 50
		});
		var pl_det_pemohon_alamatField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_alamat',
			fieldLabel : 'Alamat',
			maxLength : 100
		});
		var pl_det_pemohon_telpField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_telp',
			fieldLabel : 'Telp',
			maxLength : 20,
			maskRe : /([0-9]+)$/
		});
		var pl_det_pemohon_npwpField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_npwp',
			fieldLabel : 'NPWP',
			maxLength : 50
		});
		var pl_det_pemohon_rtField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_rt',
			fieldLabel : 'RT',
			maskRe : /([0-9]+)$/
		});
		var pl_det_pemohon_rwField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_rw',
			fieldLabel : 'RW',
			maskRe : /([0-9]+)$/
		});
		var pl_det_pemohon_kelField = Ext.create('Ext.form.ComboBox',{
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
		var pl_det_pemohon_kecField = Ext.create('Ext.form.ComboBox',{
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
		var pl_det_pemohon_nikField = Ext.create('Ext.form.ComboBox',{
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
				var store = pl_det_pemohon_nikField.getStore();
				var val = pl_det_pemohon_nikField.getRawValue();
				store.proxy.extraParams = {action : 'GETLIST',query : val};
				store.load();
				pl_det_pemohon_nikField.expand();
				pl_det_pemohon_nikField.fireEvent("ontriggerclick", this, event);
			},  
			tpl: Ext.create('Ext.XTemplate',
				'<tpl for=".">',
					'<div class="x-boundlist-item">NIK : {pemohon_nik}<br>Nama : {pemohon_nama}<br>Alamat : {pemohon_alamat}<br>Telp : {pemohon_telp}<br></div>',
				'</tpl>'
			),
			listeners : {
				select : function(cmb, record){
					var rec=record[0];
					pl_det_pemohon_idField.setValue(rec.get('pemohon_id'));
					pl_det_pemohon_nikField.setValue(rec.get('pemohon_nik'));
					pl_det_pemohon_namaField.setValue(rec.get('pemohon_nama'));
					pl_det_pemohon_alamatField.setValue(rec.get('pemohon_alamat'));
					pl_det_pemohon_telpField.setValue(rec.get('pemohon_telp'));
					pl_det_pemohon_npwpField.setValue(rec.get('pemohon_npwp'));
					pl_det_pemohon_rtField.setValue(rec.get('pemohon_rt'));
					pl_det_pemohon_rwField.setValue(rec.get('pemohon_rw'));
					pl_det_pemohon_kelField.setValue(rec.get('pemohon_kel'));
					pl_det_pemohon_kecField.setValue(rec.get('pemohon_kec'));
					pl_det_pemohon_straField.setValue(rec.get('pemohon_stra'));
					pl_det_pemohon_surattugasField.setValue(rec.get('pemohon_surattugas'));
					pl_det_pemohon_pekerjaanField.setValue(rec.get('pemohon_pekerjaan'));
					pl_det_pemohon_tempatlahirField.setValue(rec.get('pemohon_tempatlahir'));
					pl_det_pemohon_tanggallahirField.setValue(rec.get('pemohon_tanggallahir'));
					pl_det_pemohon_user_idField.setValue(rec.get('pemohon_user_id'));
					pl_det_pemohon_pendidikanField.setValue(rec.get('pemohon_pendidikan'));
					pl_det_pemohon_tahunlulusField.setValue(rec.get('pemohon_tahunlulus'));
				}
			}
		});
		var pl_det_pemohon_straField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_stra',
			fieldLabel : 'STRA',
			hidden : true,
			maxLength : 50
		});
		var pl_det_pemohon_surattugasField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_surattugas',
			fieldLabel : 'Surat Tugas',
			hidden : true,
			maxLength : 50
		});
		var pl_det_pemohon_pekerjaanField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_pekerjaan',
			fieldLabel : 'Pekerjaan',
			maxLength : 50
		});
		var pl_det_pemohon_tempatlahirField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_tempatlahir',
			fieldLabel : 'Tempat Lahir',
			maxLength : 50
		});
		var pl_det_pemohon_tanggallahirField = Ext.create('Ext.form.field.Date',{
			name : 'pemohon_tanggallahir',
			fieldLabel : 'Tanggal Lahir',
			format : 'd-m-Y'
		});
		var pl_det_pemohon_user_idField = Ext.create('Ext.form.Hidden',{
			name : 'pemohon_user_id',
		});
		var pl_det_pemohon_pendidikanField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_pendidikan',
			fieldLabel : 'Pendidikan',
			maxLength : 50
		});
		var pl_det_pemohon_tahunlulusField = Ext.create('Ext.form.TextField',{
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
		pl_formPanel = Ext.create('Ext.form.Panel', {
			disabled : true,
			frame : true,
			layout : {
				type : 'form',
				padding : 5
			},
			items: [
				{
					xtype : 'fieldset',
					title : 'Perijinan SPPL',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						ID_SPPLField,
						JENIS_PERMOHONANField,
						TGL_PERMOHONANField,
						NO_SK_LAMAField
					]
				},{
					xtype : 'fieldset',
					title : '1. Data Permohon',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						pl_det_pemohon_idField,
						pl_det_pemohon_nikField,
						pl_det_pemohon_namaField,
						pl_det_pemohon_alamatField,
						pl_det_pemohon_telpField,
						pl_det_pemohon_npwpField,
						pl_det_pemohon_rtField,
						pl_det_pemohon_rwField,
						pl_det_pemohon_kelField,
						pl_det_pemohon_kecField,
						pl_det_pemohon_straField,
						pl_det_pemohon_surattugasField,
						pl_det_pemohon_pekerjaanField,
						pl_det_pemohon_tempatlahirField,
						pl_det_pemohon_tanggallahirField,
						pl_det_pemohon_user_idField,
						pl_det_pemohon_pendidikanField,
						pl_det_pemohon_tahunlulusField
				]
				},{
					xtype : 'fieldset',
					title : '2. Data Perusahaan',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						/* NAMA_USAHAField,
						PENANGGUNG_JAWABField,
						NO_TELPField,
						JENIS_USAHAField,
						ALAMAT_USAHAField,
						STATUS_LAHANField,
						NO_AKTAField,
						TANGGALField,
						MULAI_KEGIATANField, */
						perusahaan_idField,
						perusahaan_npwpField,
						perusahaan_namaField,
						PENANGGUNG_JAWABField,
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
						MULAI_KEGIATANField
				]
				},{
					xtype : 'fieldset',
					title : '3. Data Permohonan',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						LUAS_LAHANField,
						LUAS_TAPAK_BANGUNANField,
						LUAS_KEGIATANField,
						LUAS_PARKIRField,
						<?php echo ($_SESSION['IDHAK'] == 2) ? ("") : ("TGL_BERAKHIRField,"); ?>
						<?php echo ($_SESSION['IDHAK'] == 2) ? ("") : ("STATUS_SURVEYField,"); ?>
						<?php echo ($_SESSION['IDHAK'] == 2) ? ("") : ("STATUSField,"); ?>
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
						sppl_syaratGrid
					]
				},{
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [pl_saveButton,pl_cancelButton]
		});
		pl_formWindow = Ext.create('Ext.window.Window',{
			id : 'pl_formWindow',
			renderTo : 'plSaveWindow',
			title : globalFormAddEditTitle + ' ' + pl_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [pl_formPanel]
		});
/* End FormP
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		ID_USERSearchField = Ext.create('Ext.form.NumberField',{
			id : 'ID_USERSearchField',
			name : 'ID_USER',
			fieldLabel : 'ID_USER',
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
		NAMA_USAHASearchField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_USAHASearchField',
			name : 'NAMA_USAHA',
			fieldLabel : 'NAMA_USAHA',
			maxLength : 50
		
		});
		PENANGGUNG_JAWABSearchField = Ext.create('Ext.form.TextField',{
			id : 'PENANGGUNG_JAWABSearchField',
			name : 'PENANGGUNG_JAWAB',
			fieldLabel : 'PENANGGUNG_JAWAB',
			maxLength : 50
		
		});
		NO_TELPSearchField = Ext.create('Ext.form.TextField',{
			id : 'NO_TELPSearchField',
			name : 'NO_TELP',
			fieldLabel : 'NO_TELP',
			maxLength : 20
		
		});
		JENIS_USAHASearchField = Ext.create('Ext.form.TextField',{
			id : 'JENIS_USAHASearchField',
			name : 'JENIS_USAHA',
			fieldLabel : 'JENIS_USAHA',
			maxLength : 100
		
		});
		ALAMAT_USAHASearchField = Ext.create('Ext.form.TextField',{
			id : 'ALAMAT_USAHASearchField',
			name : 'ALAMAT_USAHA',
			fieldLabel : 'ALAMAT_USAHA',
			maxLength : 100
		
		});
		STATUS_LAHANSearchField = Ext.create('Ext.form.NumberField',{
			id : 'STATUS_LAHANSearchField',
			name : 'STATUS_LAHAN',
			fieldLabel : 'STATUS_LAHAN',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		NO_AKTASearchField = Ext.create('Ext.form.TextField',{
			id : 'NO_AKTASearchField',
			name : 'NO_AKTA',
			fieldLabel : 'NO_AKTA',
			maxLength : 100
		
		});
		TANGGALSearchField = Ext.create('Ext.form.TextField',{
			id : 'TANGGALSearchField',
			name : 'TANGGAL',
			fieldLabel : 'TANGGAL',
			maxLength : 0
		
		});
		LUAS_LAHANSearchField = Ext.create('Ext.form.NumberField',{
			id : 'LUAS_LAHANSearchField',
			name : 'LUAS_LAHAN',
			fieldLabel : 'LUAS_LAHAN',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		LUAS_TAPAK_BANGUNANSearchField = Ext.create('Ext.form.NumberField',{
			id : 'LUAS_TAPAK_BANGUNANSearchField',
			name : 'LUAS_TAPAK_BANGUNAN',
			fieldLabel : 'LUAS_TAPAK_BANGUNAN',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		LUAS_KEGIATANSearchField = Ext.create('Ext.form.NumberField',{
			id : 'LUAS_KEGIATANSearchField',
			name : 'LUAS_KEGIATAN',
			fieldLabel : 'LUAS_KEGIATAN',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		LUAS_PARKIRSearchField = Ext.create('Ext.form.NumberField',{
			id : 'LUAS_PARKIRSearchField',
			name : 'LUAS_PARKIR',
			fieldLabel : 'LUAS_PARKIR',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		var pl_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : pl_search
		});
		var pl_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				pl_searchWindow.hide();
			}
		});
		pl_searchPanel = Ext.create('Ext.form.Panel', {
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
						ID_USERSearchField,
						NO_SKSearchField,
						NAMA_USAHASearchField,
						PENANGGUNG_JAWABSearchField,
						NO_TELPSearchField,
						JENIS_USAHASearchField,
						ALAMAT_USAHASearchField,
						STATUS_LAHANSearchField,
						NO_AKTASearchField,
						TANGGALSearchField,
						LUAS_LAHANSearchField,
						LUAS_TAPAK_BANGUNANSearchField,
						LUAS_KEGIATANSearchField,
						LUAS_PARKIRSearchField,
						]
				}],
			buttons : [pl_searchingButton,pl_cancelSearchButton]
		});
		pl_searchWindow = Ext.create('Ext.window.Window',{
			id : 'pl_searchWindow',
			renderTo : 'plSearchWindow',
			title : globalFormSearchTitle + ' ' + pl_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [pl_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="plSaveWindow"></div>
<div id="plSearchWindow"></div>
<div class="span12" id="plGrid"></div>