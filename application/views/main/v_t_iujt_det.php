<style>
	.checked{
		background-image:url(../assets/images/icons/check.png) !important;
	}
</style>
<h4 class="container">IZIN USAHA JASA TITIPAN</h4>
<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var iujt_det_componentItemTitle="Izin Usaha Jasa Titipan";
		var iujt_det_dataStore;
		
		var iujt_det_shorcut;
		var iujt_det_contextMenu;
		var iujt_det_gridSearchField;
		var iujt_det_gridPanel;
		var iujt_det_formPanel;
		var iujt_det_formWindow;
		var iujt_det_searchPanel;
		var iujt_det_searchWindow;
		
		var det_iujt_idField;
		var det_iujt_iujt_idField;
		var det_iujt_jenisField;
		var det_iujt_sklamaField;
		var det_iujt_namaField;
		var det_iujt_npwpField;
		var det_iujt_alamatField;
		var det_iujt_skField;
		var det_iujt_norekomField;
		var det_iujt_berlakuField;
		var det_iujt_tglrekomField;
		var det_iujt_kadaluarsaField;
		var det_iujt_surveylulusField;
		var det_iujt_tanggalField;
		var det_iujt_nopermohonanField;
		var det_iujt_cekpetugasField;
		var det_iujt_cektanggalField;
		var det_iujt_ceknipField;
		var det_iujt_catatanField;
		var iujt_usahaField;
		var iujt_alamatusahaField;
		var iujt_statusperusahaanField;
		var iujt_penanggungjawabField;
		
		var iujt_det_dbTask = 'CREATE';
		var iujt_det_dbTaskMessage = 'Tambah';
		var iujt_det_dbPermission = 'CRUD';
		var iujt_det_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function iujt_det_switchToGrid(){
			iujt_det_formPanel.setDisabled(true);
			iujt_det_gridPanel.setDisabled(false);
			iujt_det_formWindow.hide();
		}
		
		function iujt_det_switchToForm(){
			iujt_det_gridPanel.setDisabled(true);
			iujt_det_formPanel.setDisabled(false);
			iujt_det_formWindow.show();
		}
		
		function iujt_det_confirmAdd(){
			iujt_det_dbTask = 'CREATE';
			iujt_det_dbTaskMessage = 'created';
			iujt_det_resetForm();
			iujt_det_syaratDataStore.proxy.extraParams = { 
				currentAction : 'create',
				action : 'GETSYARAT'
			};
			iujt_det_syaratDataStore.load();
			iujt_det_switchToForm();
		}
		
		function iujt_det_confirmUpdate(){
			if(iujt_det_gridPanel.selModel.getCount() == 1) {
				iujt_det_dbTask = 'UPDATE';
				iujt_det_dbTaskMessage = 'updated';
				iujt_det_switchToForm();
				iujt_det_setForm();
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
		
		function iujt_det_confirmDelete(){
			if(iujt_det_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, iujt_det_delete);
			}else if(iujt_det_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, iujt_det_delete);
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
		
		function iujt_det_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(iujt_det_dbPermission)==false && pattC.test(iujt_det_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(iujt_det_confirmFormValid()){
					var array_iujt_cek_id=new Array();
					var array_iujt_cek_syarat_id=new Array();
					var array_iujt_cek_status=new Array();
					var array_iujt_cek_keterangan=new Array();
					
					if(iujt_det_syaratDataStore.getCount() > 0){
						for(var i=0;i<iujt_det_syaratDataStore.getCount();i++){
							array_iujt_cek_id.push(iujt_det_syaratDataStore.getAt(i).data.iujt_cek_id);
							array_iujt_cek_syarat_id.push(iujt_det_syaratDataStore.getAt(i).data.iujt_cek_syarat_id);
							array_iujt_cek_status.push(iujt_det_syaratDataStore.getAt(i).data.iujt_cek_status);
							array_iujt_cek_keterangan.push(iujt_det_syaratDataStore.getAt(i).data.iujt_cek_keterangan);
						}
					}
					var params = iujt_det_formPanel.getForm().getValues();
					params.ijin_id = 24;
					params.action = iujt_det_dbTask;
					params.iujt_cek_id = array_iujt_cek_id;
					params.iujt_cek_syarat_id = array_iujt_cek_syarat_id;
					params.iujt_cek_status = array_iujt_cek_status;
					params.iujt_cek_keterangan = array_iujt_cek_keterangan;
					params.iujt_statusperusahaan_nama = perusahaan_sperusahaan_idField.getRawValue();
					
					params = Ext.encode(params);
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_t_iujt_det/switchAction',
						params: {
							action : iujt_det_dbTask,
							params : params
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									iujt_det_dataStore.reload();
									iujt_det_resetForm();
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave, function(){
										window.scrollTo(0,0);
									});
									iujt_det_switchToGrid();
									iujt_det_gridPanel.getSelectionModel().deselectAll();
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
		
		function iujt_det_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(iujt_det_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = iujt_det_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< iujt_det_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.det_iujt_id);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_t_iujt_det/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									iujt_det_dataStore.reload();
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
		
		function iujt_det_refresh(){
			iujt_det_dbListAction = "GETLIST";
			iujt_det_gridSearchField.reset();
			iujt_det_dataStore.proxy.extraParams = { action : 'GETLIST' };
			iujt_det_dataStore.proxy.extraParams.query = "";
			iujt_det_dataStore.currentPage = 1;
			iujt_det_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function iujt_det_confirmFormValid(){
			return iujt_det_formPanel.getForm().isValid();
		}
		
		function iujt_det_resetForm(){
			iujt_det_dbTask = 'CREATE';
			iujt_det_dbTaskMessage = 'create';
			iujt_det_formPanel.getForm().reset();
			det_iujt_idField.setValue(0);
			window.scrollTo(0,0);
		}
		
		function iujt_det_setForm(){
			iujt_det_dbTask = 'UPDATE';
            iujt_det_dbTaskMessage = 'update';
			
			var record = iujt_det_gridPanel.getSelectionModel().getSelection()[0];
			iujt_det_formPanel.loadRecord(record);
			det_iujt_idField.setValue(record.data.det_iujt_id);
			det_iujt_iujt_idField.setValue(record.data.det_iujt_iujt_id);
			det_iujt_jenisField.setValue(record.data.det_iujt_jenis);
			det_iujt_tanggalField.setValue(record.data.det_iujt_tanggal);
			if(record.data.det_iujt_retribusi != 0){
				iujt_det_retribusiField.setValue({ iujt_retribusi : ['1'] });
			}else{
				iujt_det_retribusiField.setValue({ iujt_retribusi : ['0'] });
			}
			iujt_det_retibusiNilaiField.setValue(record.data.det_iujt_retribusi);
			iujt_det_syaratDataStore.proxy.extraParams = { 
				iujt_id : record.data.det_iujt_iujt_id,
				iujt_det_id : record.data.det_iujt_id,
				currentAction : 'update',
				action : 'GETSYARAT'
			};
			iujt_det_syaratDataStore.load();
		}
		
		function iujt_det_showSearchWindow(){
			iujt_det_searchWindow.show();
		}
		
		function iujt_det_printExcel(outputType){
			var searchText = "";
			if(iujt_det_dataStore.proxy.extraParams.query!==null){searchText = iujt_det_dataStore.proxy.extraParams.query;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_t_iujt_det/switchAction',
				params : {
					action : outputType,
					query : searchText,
					currentAction : iujt_det_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('../print/t_iujt_det_list.xls');
							}else{
								window.open('../print/t_iujt_det_list.html','iujt_detlist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		iujt_det_dataStore = Ext.create('Ext.data.Store',{
			id : 'iujt_det_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_iujt_det/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'det_iujt_id'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'det_iujt_id', type : 'int', mapping : 'det_iujt_id' },
				{ name : 'det_iujt_iujt_id', type : 'int', mapping : 'det_iujt_iujt_id' },
				{ name : 'det_iujt_jenis', type : 'int', mapping : 'det_iujt_jenis' },
				{ name : 'det_iujt_jenis_nama', type : 'string', mapping : 'det_iujt_jenis_nama' },
				{ name : 'det_iujt_nama', type : 'string', mapping : 'det_iujt_nama' },
				{ name : 'det_iujt_npwp', type : 'string', mapping : 'det_iujt_npwp' },
				{ name : 'det_iujt_alamat', type : 'string', mapping : 'det_iujt_alamat' },
				{ name : 'det_iujt_sk', type : 'string', mapping : 'det_iujt_sk' },
				{ name : 'det_iujt_norekom', type : 'string', mapping : 'det_iujt_norekom' },
				{ name : 'det_iujt_berlaku', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_iujt_berlaku' },
				{ name : 'det_iujt_tglrekom', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_iujt_tglrekom' },
				{ name : 'det_iujt_kadaluarsa', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_iujt_kadaluarsa' },
				{ name : 'det_iujt_surveylulus', type : 'int', mapping : 'det_iujt_surveylulus' },
				{ name : 'det_iujt_tanggal', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_iujt_tanggal' },
				{ name : 'det_iujt_nopermohonan', type : 'string', mapping : 'det_iujt_nopermohonan' },
				{ name : 'det_iujt_cekpetugas', type : 'string', mapping : 'det_iujt_cekpetugas' },
				{ name : 'det_iujt_cektanggal', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_iujt_cektanggal' },
				{ name : 'det_iujt_ceknip', type : 'string', mapping : 'det_iujt_ceknip' },
				{ name : 'det_iujt_catatan', type : 'string', mapping : 'det_iujt_catatan' },
				{ name : 'det_iujt_proses', type : 'string', mapping : 'det_iujt_proses' },
				{ name : 'lamaproses', type : 'string', mapping : 'lamaproses' },
				{ name : 'det_iujt_retribusi', type : 'int', mapping : 'det_iujt_retribusi' },
				{ name : 'permohonan_id', type : 'int', mapping : 'permohonan_id' },
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
				{ name : 'iujt_usaha', type : 'string', mapping : 'iujt_usaha' },
				{ name : 'iujt_alamatusaha', type : 'string', mapping : 'iujt_alamatusaha' },
				{ name : 'iujt_statusperusahaan', type : 'string', mapping : 'iujt_statusperusahaan' },
				{ name : 'iujt_penanggungjawab', type : 'string', mapping : 'iujt_penanggungjawab' },
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
		iujt_det_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						iujt_det_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						iujt_det_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						iujt_det_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						iujt_det_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						iujt_det_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						iujt_det_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						iujt_det_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						iujt_det_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var iujt_det_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : iujt_det_confirmAdd
		});
		var iujt_det_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : iujt_det_confirmUpdate
		});
		var iujt_det_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : iujt_det_confirmDelete
		});
		var iujt_det_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : iujt_det_refresh
		});
		var iujt_det_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : iujt_det_showSearchWindow
		});
		var iujt_det_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				iujt_det_printExcel('PRINT');
			}
		});
		var iujt_det_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				iujt_det_printExcel('EXCEL');
			}
		});
		
		var iujt_det_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : iujt_det_confirmUpdate
		});
		var iujt_det_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : iujt_det_confirmDelete
		});
		var iujt_det_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : iujt_det_refresh
		});
		iujt_det_contextMenu = Ext.create('Ext.menu.Menu',{
			items: [
				iujt_det_contextMenuEdit,iujt_det_contextMenuDelete,'-',iujt_det_contextMenuRefresh
			]
		});
		
		iujt_det_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : iujt_det_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						iujt_det_dataStore.proxy.extraParams = { action : 'GETLIST'};
						iujt_det_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		/* Start ContextMenu For Action Column */
		var iujt_det_bp_printCM = Ext.create('Ext.menu.Item',{
			text : 'Bukti Penerimaan',
			tooltip : 'Cetak Bukti Penerimaan',
			handler : function(){
				var record = iujt_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_iujt_det/switchAction',
					params: {
						iujtdet_id : record.get('det_iujt_id'),
						action : 'CETAKBP'
					},success : function(){
						window.open('../print/iujt_buktipenerimaan.html');
					}
				});
			}
		});
		var iujt_det_sk_printCM = Ext.create('Ext.menu.Item',{
			text : 'Surat Keputusan',
			tooltip : 'Cetak Surat Keputusan',
			handler : function(){
				var record = iujt_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_iujt_det/switchAction',
					params: {
						iujtdet_id : record.get('det_iujt_id'),
						action : 'CETAKSK'
					},success : function(response){
						var result = response.responseText;
						switch(result){
							case 'success':
								window.open('../print/iujt_sk.html');
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
		var iujt_det_rekom_printCM = Ext.create('Ext.menu.Item',{
			text : 'Rekomendasi',
			tooltip : 'Cetak Surat Rekomendasi',
			handler : function(){
				var record = iujt_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_iujt_det/switchAction',
					params: {
						iujtdet_id : record.get('det_iujt_id'),
						action : 'REKOMENDASI'
					},success : function(){
						window.open('../print/iujt_rekom.html');
					}
				});
			}
		});
		var iujt_det_lk_printCM = Ext.create('Ext.menu.Item',{
			text : 'Lembar Kontrol',
			tooltip : 'Cetak Lembar Kontrol',
			handler : function(){
				var record = iujt_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_iujt_det/switchAction',
					params: {
						iujtdet_id : record.get('det_iujt_id'),
						action : 'CETAKLEMBARKONTROL'
					},success : function(){
						window.open('../print/iujt_lembarkontrol.html');
					}
				});
			}
		});
		var iujt_det_printContextMenu = Ext.create('Ext.menu.Menu',{
			items: [
				iujt_det_bp_printCM,iujt_det_lk_printCM,iujt_det_rekom_printCM,iujt_det_sk_printCM
			]
		});
		function iujt_det_ubahProses(proses){
			var record = iujt_det_gridPanel.getSelectionModel().getSelection()[0];
			Ext.Ajax.request({
				waitMsg: 'Please wait...',
				url: 'c_t_iujt_det/switchAction',
				params: {
					iujtdet_id : record.get('det_iujt_id'),
					iujtdet_nosk : record.get('det_iujt_sk'),
					proses : proses,
					action : 'UBAHPROSES'
				},success : function(){
					iujt_det_dataStore.reload();
				}
			});
		}
		
		var iujt_det_prosesContextMenu = Ext.create('Ext.menu.Menu',{
			items: [
				{
					text : 'Selesai, belum diambil',
					tooltip : 'Ubah Menjadi Selesai, belum diambil',
					handler : function(){
						iujt_det_ubahProses('Selesai, belum diambil');
					}
				},
				{
					text : 'Selesai, sudah diambil',
					tooltip : 'Ubah Menjadi Selesai, sudah diambil',
					handler : function(){
						iujt_det_ubahProses('Selesai, sudah diambil');
					}
				},
				{
					text : 'Ditolak',
					tooltip : 'Ubah Menjadi Ditolak',
					handler : function(){
						iujt_det_ubahProses('Ditolak');
					}
				}
			]
		});
		
		/* End ContextMenu For Action Column */
		iujt_det_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'iujt_det_gridPanel',
			constrain : true,
			store : iujt_det_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'iujt_detGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : {forceFit:true},
			multiSelect : true,
			keys : iujt_det_shorcut,
			columns : [
				{
					text : 'Jenis',
					dataIndex : 'det_iujt_jenis_nama',
					width : 100,
					sortable : false
				},
				{
					text : 'Tanggal',
					dataIndex : 'det_iujt_tanggal',
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
					text : 'NPWP',
					dataIndex : 'pemohon_npwp',
					width : 100,
					sortable : false,
					hidden : true
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
					width : 100,
					sortable : false
				},
				{
					text : 'Usaha',
					dataIndex : 'iujt_usaha',
					width : 150,
					sortable : false
				},
				{
					text : 'Nomor SK',
					dataIndex : 'det_iujt_sk',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'Tgl Berlaku',
					dataIndex : 'det_iujt_berlaku',
					width : 100,
					sortable : false,
					renderer : Ext.util.Format.dateRenderer('d-m-Y'),
					hidden : true
				},
				{
					text : 'Tgl Kadaluarsa',
					dataIndex : 'det_iujt_kadaluarsa',
					width : 100,
					sortable : false,
					renderer : Ext.util.Format.dateRenderer('d-m-Y'),
					hidden : true
				},
				{
					text : 'Lama Proses',
					dataIndex : 'lamaproses',
					width : 90,
					sortable : false
				},
				{
					text : 'Status',
					dataIndex : 'det_iujt_proses',
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
							iujt_det_confirmUpdate();
						}
					},{
						iconCls: 'icon16x16-delete',
						tooltip: 'Hapus Data',
						handler: function(grid, rowIndex){
							grid.getSelectionModel().select(rowIndex);
							iujt_det_confirmDelete();
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
							iujt_det_prosesContextMenu.showAt(e.getXY());
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
							iujt_det_printContextMenu.showAt(e.getXY());
							return false;
						}
					}]
				}
			],
			tbar : [
				iujt_det_addButton,
				iujt_det_gridSearchField,
				iujt_det_refreshButton,
				iujt_det_printButton,
				iujt_det_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : iujt_det_dataStore,
				displayInfo : true
			})/*,
			listeners : {
				afterrender : function(){
					iujt_det_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}*/
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		det_iujt_idField = Ext.create('Ext.form.NumberField',{
			name : 'det_iujt_id',
			fieldLabel : 'Id <font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/
		});
		det_iujt_iujt_idField = Ext.create('Ext.form.NumberField',{
			name : 'det_iujt_iujt_id',
			fieldLabel : 'Id',
			allowNegatife : false,
			blankText : '0',
			hidden : true,
			allowDecimals : false,
			maskRe : /([0-9]+)$/
		});
		permohonan_idField = Ext.create('Ext.form.NumberField',{
			name : 'permohonan_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/
		});
		det_iujt_jenisField = Ext.create('Ext.form.ComboBox',{
			name : 'permohonan_jenis',
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
						det_iujt_sklamaField.show();
					}else{
						det_iujt_sklamaField.hide();
					}
				}
			}
		});
		det_iujt_sklamaField = Ext.create('Ext.form.ComboBox',{
			name : 'det_iujt_lama',
			fieldLabel : 'Nomor SK Lama',
			store : iujt_det_dataStore,
			displayField : 'det_iujt_sk',
			valueField : 'det_iujt_iujt_id',
			queryMode : 'remote',
			triggerAction : 'query',
			repeatTriggerClick : true,
			minChars : 100,
			triggerCls : 'x-form-search-trigger',
			forceSelection : false,
			hidden : true,
			onTriggerClick: function(event){
				var store = det_iujt_sklamaField.getStore();
				var val = det_iujt_sklamaField.getRawValue();
				store.proxy.extraParams = {action : 'SEARCH',det_iujt_sk : val};
				store.load();
				det_iujt_sklamaField.expand();
				det_iujt_sklamaField.fireEvent("ontriggerclick", this, event);
			},  
			tpl: Ext.create('Ext.XTemplate',
				'<tpl for=".">',
					'<div class="x-boundlist-item">SK : {det_iujt_sk}<br>Nama Usaha : {iujt_usaha}<br>Alamat : {iujt_alamatusaha}<br></div>',
				'</tpl>'
			),
			listeners : {
				select : function(cmb, record){
					var rec=record[0];
					iujt_det_pemohon_idField.setValue(rec.get('pemohon_id'));
					iujt_det_pemohon_nikField.setValue(rec.get('pemohon_nik'));
					iujt_det_pemohon_namaField.setValue(rec.get('pemohon_nama'));
					iujt_det_pemohon_alamatField.setValue(rec.get('pemohon_alamat'));
					iujt_det_pemohon_telpField.setValue(rec.get('pemohon_telp'));
					iujt_det_pemohon_npwpField.setValue(rec.get('pemohon_npwp'));
					iujt_det_pemohon_rtField.setValue(rec.get('pemohon_rt'));
					iujt_det_pemohon_rwField.setValue(rec.get('pemohon_rw'));
					iujt_det_pemohon_kelField.setValue(rec.get('pemohon_kel'));
					iujt_det_pemohon_kecField.setValue(rec.get('pemohon_kec'));
					iujt_det_pemohon_straField.setValue(rec.get('pemohon_stra'));
					iujt_det_pemohon_surattugasField.setValue(rec.get('pemohon_surattugas'));
					iujt_det_pemohon_pekerjaanField.setValue(rec.get('pemohon_pekerjaan'));
					iujt_det_pemohon_tempatlahirField.setValue(rec.get('pemohon_tempatlahir'));
					iujt_det_pemohon_tanggallahirField.setValue(rec.get('pemohon_tanggallahir'));
					iujt_det_pemohon_user_idField.setValue(rec.get('pemohon_user_id'));
					iujt_det_pemohon_pendidikanField.setValue(rec.get('pemohon_pendidikan'));
					iujt_det_pemohon_tahunlulusField.setValue(rec.get('pemohon_tahunlulus'));
					iujt_usahaField.setValue(rec.get('iujt_usaha'));
					iujt_alamatusahaField.setValue(rec.get('iujt_alamatusaha'));
					iujt_statusperusahaanField.setValue(rec.get('iujt_statusperusahaan'));
					iujt_penanggungjawabField.setValue(rec.get('iujt_penanggungjawab'));
				}
			}
		});
		det_iujt_namaField = Ext.create('Ext.form.TextField',{
			name : 'det_iujt_nama',
			fieldLabel : 'Nama',
			maxLength : 50
		});
		det_iujt_npwpField = Ext.create('Ext.form.TextField',{
			name : 'det_iujt_npwp',
			fieldLabel : 'NPWP',
			maxLength : 50
		});
		det_iujt_alamatField = Ext.create('Ext.form.TextField',{
			name : 'det_iujt_alamat',
			fieldLabel : 'Alamat',
			maxLength : 100
		});
		det_iujt_skField = Ext.create('Ext.form.TextField',{
			name : 'det_iujt_sk',
			fieldLabel : 'Nomor SK',
			maxLength : 50,
			hidden : true
		});
		det_iujt_norekomField = Ext.create('Ext.form.TextField',{
			name : 'det_iujt_norekom',
			fieldLabel : 'Nomor Rekom',
			maxLength : 50
		});
		det_iujt_berlakuField = Ext.create('Ext.form.field.Date',{
			name : 'det_iujt_berlaku',
			fieldLabel : 'Tanggal Berlaku',
			format : 'd-m-Y',
			hidden : true
		});
		det_iujt_tglrekomField = Ext.create('Ext.form.field.Date',{
			name : 'det_iujt_tglrekom',
			fieldLabel : 'Tanggal Rekom',
			format : 'd-m-Y'
		});
		det_iujt_kadaluarsaField = Ext.create('Ext.form.field.Date',{
			name : 'permohonan_kadaluarsa',
			fieldLabel : 'Kadaluarsa',
			format : 'd-m-Y'
		});
		det_iujt_surveylulusField = Ext.create('Ext.form.ComboBox',{
			name : 'det_iujt_surveylulus',
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
		det_iujt_tanggalField = Ext.create('Ext.form.field.Date',{
			name : 'permohonan_tanggal',
			fieldLabel : 'Tanggal <font color=red>*</font>',
			format : 'd-m-Y',
			readOnly : true,
			value : new Date('<?php echo date('Y-m-d').'T'.date('H:i:s'); ?>')
		});
		det_iujt_nopermohonanField = Ext.create('Ext.form.TextField',{
			name : 'det_iujt_nopermohonan',
			fieldLabel : 'Nomor Permohonan',
			maxLength : 50
		});
		det_iujt_cekpetugasField = Ext.create('Ext.form.TextField',{
			name : 'det_iujt_cekpetugas',
			fieldLabel : 'Petugas Cek',
			maxLength : 50
		});
		det_iujt_cektanggalField = Ext.create('Ext.form.field.Date',{
			name : 'det_iujt_cektanggal',
			fieldLabel : 'Tanggal Cek',
			format : 'd-m-Y'
		});
		det_iujt_ceknipField = Ext.create('Ext.form.TextField',{
			name : 'det_iujt_ceknip',
			fieldLabel : 'NIP Petugas',
			maxLength : 50
		});
		det_iujt_catatanField = Ext.create('Ext.form.TextArea',{
			name : 'det_iujt_catatan',
			fieldLabel : 'Catatan',
			maxLength : 65535
		});
		iujt_usahaField = Ext.create('Ext.form.TextField',{
			name : 'iujt_usaha',
			fieldLabel : 'Usaha',
			maxLength : 50
		});
		iujt_alamatusahaField = Ext.create('Ext.form.TextField',{
			name : 'iujt_alamatusaha',
			fieldLabel : 'Alamat',
			maxLength : 50
		});
		iujt_statusperusahaanField = Ext.create('Ext.form.TextField',{
			name : 'iujt_statusperusahaan',
			fieldLabel : 'Status',
			maxLength : 50
		});
		iujt_penanggungjawabField = Ext.create('Ext.form.TextField',{
			name : 'iujt_penanggungjawab',
			fieldLabel : 'Penanggung Jawab',
			maxLength : 50
		});
		iujt_det_syaratDataStore = Ext.create('Ext.data.Store',{
			pageSize : globalPageSize,
			autoLoad : true,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_iujt_det/switchAction',
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
				{ name : 'iujt_cek_id', type : 'int', mapping : 'iujt_cek_id' },
				{ name : 'iujt_cek_syarat_id', type : 'int', mapping : 'iujt_cek_syarat_id' },
				{ name : 'iujt_cek_iujtdet_id', type : 'int', mapping : 'iujt_cek_iujtdet_id' },
				{ name : 'iujt_cek_iujt_id', type : 'int', mapping : 'iujt_cek_iujt_id' },
				{ name : 'iujt_cek_status', type : 'boolean', mapping : 'iujt_cek_status' },
				{ name : 'iujt_cek_keterangan', type : 'string', mapping : 'iujt_cek_keterangan' },
				{ name : 'iujt_cek_syarat_nama', type : 'string', mapping : 'iujt_cek_syarat_nama' }
				]
		});
		var det_iujt_syaratGridEditor = new Ext.grid.plugin.CellEditing({
			clicksToEdit: 1
		});
		/* START DATA PEMOHON */
		var iujt_det_pemohon_idField = Ext.create('Ext.form.Hidden',{
			name : 'pemohon_id'
		});
		var iujt_det_pemohon_namaField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_nama',
			fieldLabel : 'Nama',
			maxLength : 50
		});
		var iujt_det_pemohon_alamatField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_alamat',
			fieldLabel : 'Alamat',
			maxLength : 100
		});
		var iujt_det_pemohon_telpField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_telp',
			fieldLabel : 'Telp',
			maxLength : 20,
			maskRe : /([0-9]+)$/
		});
		var iujt_det_pemohon_npwpField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_npwp',
			fieldLabel : 'NPWP',
			maxLength : 50
		});
		var iujt_det_pemohon_rtField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_rt',
			fieldLabel : 'RT',
			maskRe : /([0-9]+)$/
		});
		var iujt_det_pemohon_rwField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_rw',
			fieldLabel : 'RW',
			maskRe : /([0-9]+)$/
		});
		var iujt_det_pemohon_kelField = Ext.create('Ext.form.ComboBox',{
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
		var iujt_det_pemohon_kecField = Ext.create('Ext.form.ComboBox',{
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
		var iujt_det_pemohon_nikField = Ext.create('Ext.form.ComboBox',{
			name : 'pemohon_nik',
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
				var store = iujt_det_pemohon_nikField.getStore();
				var val = iujt_det_pemohon_nikField.getRawValue();
				store.proxy.extraParams = {action : 'SEARCH',pemohon_nik : val};
				store.load();
				iujt_det_pemohon_nikField.expand();
				iujt_det_pemohon_nikField.fireEvent("ontriggerclick", this, event);
			},  
			tpl: Ext.create('Ext.XTemplate',
				'<tpl for=".">',
					'<div class="x-boundlist-item">NIK : {pemohon_nik}<br>Nama : {pemohon_nama}<br>Alamat : {pemohon_alamat}<br>Telp : {pemohon_telp}<br></div>',
				'</tpl>'
			),
			listeners : {
				select : function(cmb, record){
					var rec=record[0];
					iujt_det_pemohon_idField.setValue(rec.get('pemohon_id'));
					iujt_det_pemohon_nikField.setValue(rec.get('pemohon_nik'));
					iujt_det_pemohon_namaField.setValue(rec.get('pemohon_nama'));
					iujt_det_pemohon_alamatField.setValue(rec.get('pemohon_alamat'));
					iujt_det_pemohon_telpField.setValue(rec.get('pemohon_telp'));
					iujt_det_pemohon_npwpField.setValue(rec.get('pemohon_npwp'));
					iujt_det_pemohon_rtField.setValue(rec.get('pemohon_rt'));
					iujt_det_pemohon_rwField.setValue(rec.get('pemohon_rw'));
					iujt_det_pemohon_kelField.setValue(rec.get('pemohon_kel'));
					iujt_det_pemohon_kecField.setValue(rec.get('pemohon_kec'));
					iujt_det_pemohon_straField.setValue(rec.get('pemohon_stra'));
					iujt_det_pemohon_surattugasField.setValue(rec.get('pemohon_surattugas'));
					iujt_det_pemohon_pekerjaanField.setValue(rec.get('pemohon_pekerjaan'));
					iujt_det_pemohon_tempatlahirField.setValue(rec.get('pemohon_tempatlahir'));
					iujt_det_pemohon_tanggallahirField.setValue(rec.get('pemohon_tanggallahir'));
					iujt_det_pemohon_user_idField.setValue(rec.get('pemohon_user_id'));
					iujt_det_pemohon_pendidikanField.setValue(rec.get('pemohon_pendidikan'));
					iujt_det_pemohon_tahunlulusField.setValue(rec.get('pemohon_tahunlulus'));
				}
			}
		});
		var iujt_det_pemohon_straField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_stra',
			fieldLabel : 'STRA',
			maxLength : 50
		});
		var iujt_det_pemohon_surattugasField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_surattugas',
			fieldLabel : 'Surat Tugas',
			maxLength : 50
		});
		var iujt_det_pemohon_pekerjaanField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_pekerjaan',
			fieldLabel : 'Pekerjaan',
			maxLength : 50
		});
		var iujt_det_pemohon_tempatlahirField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_tempatlahir',
			fieldLabel : 'Tempat Lahir',
			maxLength : 50
		});
		var iujt_det_pemohon_tanggallahirField = Ext.create('Ext.form.field.Date',{
			name : 'pemohon_tanggallahir',
			fieldLabel : 'Tanggal Lahir',
			format : 'd-m-Y'
		});
		var iujt_det_pemohon_user_idField = Ext.create('Ext.form.Hidden',{
			name : 'pemohon_user_id',
		});
		var iujt_det_pemohon_pendidikanField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_pendidikan',
			fieldLabel : 'Pendidikan',
			maxLength : 50
		});
		var iujt_det_pemohon_tahunlulusField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_tahunlulus',
			fieldLabel : 'Tahun Lulus',
			maxLength : 4,
			maskRe : /([0-9]+)$/
		});
		/* END DATA PEMOHON */
		det_iujt_syaratGrid = Ext.create('Ext.grid.Panel',{
			id : 'det_iujt_syaratGrid',
			store : iujt_det_syaratDataStore,
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
					dataIndex : 'iujt_cek_id',
					width : 100,
					hidden : true,
					hideable : false,
					sortable : false
				},
				{
					text : 'Syarat',
					dataIndex : 'iujt_cek_syarat_nama',
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
					dataIndex: 'iujt_cek_status',
					width: 55,
					stopSelection: false
				},
				{
					text : 'Keterangan',
					dataIndex : 'iujt_cek_keterangan',
					width : 100,
					sortable : false,
					editor: 'textfield',
					flex : 1
				}
			]
		});
		var iujt_det_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : iujt_det_save
		});
		var iujt_det_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				iujt_det_resetForm();
				iujt_det_switchToGrid();
			}
		});
		var iujt_det_pendukungfieldset = Ext.create('Ext.form.FieldSet',{
			title : '5. Data Pendukung',
			checkboxToggle : false,
			collapsible : false,
			layout :'form',
			items : [
				det_iujt_norekomField,
				det_iujt_tglrekomField,
				det_iujt_skField,
				det_iujt_berlakuField,
				det_iujt_surveylulusField,
				det_iujt_nopermohonanField,
				det_iujt_cekpetugasField,
				det_iujt_cektanggalField,
				det_iujt_ceknipField,
				det_iujt_catatanField,
				det_iujt_kadaluarsaField
			]
		});
		/* START DATA RETRIBUSI */
		var iujt_det_retribusiField = Ext.create('Ext.form.RadioGroup',{
			fieldLabel : 'Retribusi ',
			vertical : false,
			items : [
				{ boxLabel : 'Gratis', name : 'iujt_retribusi', inputValue : '0', checked : true},
				{ boxLabel : 'Bayar', name : 'iujt_retribusi', inputValue : '1'}
			],
			listeners : {
				change : function(com, newval, oldval, e){
					if(newval.iujt_retribusi == 1){
						iujt_det_retibusiNilaiField.show();
					}else{
						iujt_det_retibusiNilaiField.hide();
					}
				}
			}
		});
		var iujt_det_retibusiNilaiField = Ext.create('Ext.form.TextField',{
			name : 'permohonan_retribusi',
			fieldLabel : 'Nominal Retribusi ',
			maxLength : 100,
			hidden : true,
			value : 0
		});
		iujt_det_retibusiTanggalField = Ext.create('Ext.form.field.Date',{
			name : 'permohonan_retribusi_tanggal',
			fieldLabel : 'Tanggal',
			format : 'd-m-Y',
			hidden : true,
			value : new Date('<?php echo date('Y-m-d').'T'.date('H:i:s'); ?>')
		});
		var iujt_det_retribusifieldset = Ext.create('Ext.form.FieldSet',{
			title : '6. Data Retribusi',
			columnWidth : 0.5,
			checkboxToggle : false,
			collapsible : false,
			layout :'form',
			items : [
				iujt_det_retribusiField,
				iujt_det_retibusiNilaiField,
				iujt_det_retibusiTanggalField
			]
		});
		/* END DATA RETRIBUSI */
		
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
		iujt_det_formPanel = Ext.create('Ext.form.Panel', {
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
						det_iujt_idField,
						det_iujt_iujt_idField,
						permohonan_idField,
						det_iujt_jenisField,
						det_iujt_sklamaField,
						det_iujt_tanggalField
					]
				},
				{
					xtype : 'fieldset',
					title : '2. Data Pemohon',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						iujt_det_pemohon_idField,
						iujt_det_pemohon_nikField,
						iujt_det_pemohon_namaField,
						iujt_det_pemohon_alamatField,
						iujt_det_pemohon_telpField,
						iujt_det_pemohon_npwpField,
						iujt_det_pemohon_rtField,
						iujt_det_pemohon_rwField,
						iujt_det_pemohon_kelField,
						iujt_det_pemohon_kecField,
						iujt_det_pemohon_straField,
						iujt_det_pemohon_surattugasField,
						iujt_det_pemohon_pekerjaanField,
						iujt_det_pemohon_tempatlahirField,
						iujt_det_pemohon_tanggallahirField,
						iujt_det_pemohon_user_idField,
						iujt_det_pemohon_pendidikanField,
						iujt_det_pemohon_tahunlulusField
					]
				},
				{
					xtype : 'fieldset',
					title : '3. Data Perusahaan',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						/* iujt_usahaField,
						iujt_alamatusahaField,
						iujt_statusperusahaanField, */
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
						iujt_penanggungjawabField
					]
				},
				{
					xtype : 'fieldset',
					title : '4. Data Ceklist',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						det_iujt_syaratGrid
					]
				},
				iujt_det_pendukungfieldset,iujt_det_retribusifieldset,
				Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })
			],
			buttons : [iujt_det_saveButton,iujt_det_cancelButton]
		});
		iujt_det_formWindow = Ext.create('Ext.window.Window',{
			id : 'iujt_det_formWindow',
			renderTo : 'iujt_detSaveWindow',
			title : globalFormAddEditTitle + ' ' + iujt_det_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [iujt_det_formPanel]
		});
/* End FormPanel declaration */
	<?php if(@$_SESSION['IDHAK'] == 2){ ?>
		iujt_det_lk_printCM.hide();
		iujt_det_rekom_printCM.hide();
		iujt_det_sk_printCM.hide();
		iujt_det_pendukungfieldset.hide();
		iujt_det_gridPanel.columns[12].setVisible(false);
		iujt_det_gridPanel.columns[13].setVisible(false);
	<?php } ?>
});
</script>
<div id="iujt_detSaveWindow"></div>
<div class="container col-md-12" id="iujt_detGrid"></div>