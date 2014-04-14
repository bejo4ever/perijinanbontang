<style>
	.checked{
		background-image:url(../assets/images/icons/check.png) !important;
		margin:auto;
	}
</style>
<h4>SURAT KETERANGAN KESESUAIAN TATA RUANG</h4>
<hr>
<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var tr_componentItemTitle="Tata Ruang";
		var tr_dataStore;
		var sktr_det_syaratDataStore;
		
		var tr_shorcut;
		var tr_contextMenu;
		var tr_gridSearchField;
		var tr_gridPanel;
		var tr_formPanel;
		var tr_formWindow;
		var tr_searchPanel;
		var tr_searchWindow;
		
		var ID_SKTRField;
		var ID_SKTR_INTIField;
		var ID_USERField;
		var JENIS_PERMOHONANField;
		var NO_SKField;
		var HAK_MILIKField;
		var NAMA_PEMILIKField;
		var NO_SURAT_TANAHField;
		var FUNGSIField;
		var ALAMAT_BANGUNANField;
		var TINGGI_BANGUNANField;
		var LUAS_PERSILField;
		var LUAS_BANGUNANField;
		var BATAS_KIRIField;
		var BATAS_KANANField;
		var BATAS_DEPANField;
		var BATAS_BELAKANGField;
		var TGL_PERMOHONANField;
		var STATUS_SURVEYField;
				
		var tr_dbTask = 'CREATE';
		var tr_dbTaskMessage = 'Tambah';
		var tr_dbPermission = 'CRUD';
		var tr_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function tr_switchToGrid(){
			tr_formPanel.setDisabled(true);
			tr_gridPanel.setDisabled(false);
			tr_formWindow.hide();
		}
		
		function tr_switchToForm(){
			tr_gridPanel.setDisabled(true);
			tr_formPanel.setDisabled(false);
			tr_formWindow.show();
		}
		
		function tr_confirmAdd(){
			tr_dbTask = 'CREATE';
			tr_dbTaskMessage = 'created';
			tr_resetForm();
			tr_switchToForm();
			sktr_det_syaratDataStore.proxy.extraParams = {
				currentAction : 'create',
				action : 'GETSYARAT'
			};
			sktr_det_syaratDataStore.load();
		}
		
		function tr_confirmUpdate(){
			if(tr_gridPanel.selModel.getCount() == 1) {
				tr_dbTask = 'UPDATE';
				tr_dbTaskMessage = 'updated';
				tr_switchToForm();
				tr_setForm();
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
		
		function tr_confirmDelete(){
			if(tr_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, tr_delete);
			}else if(tr_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, tr_delete);
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
		
		function tr_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(tr_dbPermission)==false && pattC.test(tr_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(tr_confirmFormValid()){
					var array_sktr_keterangan=new Array();
					if(sktr_det_syaratDataStore.getCount() > 0){
						for(var i=0;i<sktr_det_syaratDataStore.getCount();i++){
							array_sktr_keterangan.push(sktr_det_syaratDataStore.getAt(i).data.KETERANGAN);
						}
					}					
					
					var params = tr_formPanel.getForm().getValues();
					params.ijin_id = 28;
					params.action = tr_dbTask;
					params.KETERANGAN = array_sktr_keterangan;
					params = Ext.encode(params);
					
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_sktr/switchAction',
						params: {							
							params : params,
							action : tr_dbTask
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
									sktr_det_syaratDataStore.reload();
									tr_dataStore.reload();
									tr_resetForm();
									tr_switchToGrid();
									tr_gridPanel.getSelectionModel().deselectAll();
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
		
		function tr_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(tr_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = tr_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< tr_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.ID_SKTR);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_sktr/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									tr_dataStore.reload();
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
		
		function tr_refresh(){
			tr_dbListAction = "GETLIST";
			tr_gridSearchField.reset();
			tr_dataStore.proxy.extraParams = { action : 'GETLIST' };
			tr_dataStore.proxy.extraParams.query = "";
			tr_dataStore.currentPage = 1;
			tr_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function tr_confirmFormValid(){
			return tr_formPanel.getForm().isValid();
		}
		
		function tr_resetForm(){
			tr_dbTask = 'CREATE';
			tr_dbTaskMessage = 'create';
			tr_formPanel.getForm().reset();
			// ID_SKTRField.setValue(0);
		}
		
		function tr_setForm(){
			tr_dbTask = 'UPDATE';
            tr_dbTaskMessage = 'update';
			
			var record = tr_gridPanel.getSelectionModel().getSelection()[0];
			tr_formPanel.loadRecord(record);
			ID_SKTRField.setValue(record.data.ID_SKTR);
			JENIS_PERMOHONANField.setValue(record.data.JENIS_PERMOHONAN);
			/* pemohon_idField.setValue(record.data.pemohon_id);
			pemohon_nikField.setValue(record.data.pemohon_nik);
			pemohon_namaField.setValue(record.data.pemohon_nama);
			pemohon_telpField.setValue(record.data.pemohon_telp);
			pemohon_alamatField.setValue(record.data.pemohon_alamat);
			HAK_MILIKField.setValue(record.data.HAK_MILIK);
			NAMA_PEMILIKField.setValue(record.data.NAMA_PEMILIK);
			NO_SURAT_TANAHField.setValue(record.data.NO_SURAT_TANAH);
			FUNGSIField.setValue(record.data.FUNGSI);
			ALAMAT_BANGUNANField.setValue(record.data.ALAMAT_BANGUNAN);
			TINGGI_BANGUNANField.setValue(record.data.TINGGI_BANGUNAN);
			LUAS_PERSILField.setValue(record.data.LUAS_PERSIL);
			LUAS_BANGUNANField.setValue(record.data.LUAS_BANGUNAN);
			BATAS_KIRIField.setValue(record.data.BATAS_KIRI);
			BATAS_KANANField.setValue(record.data.BATAS_KANAN);
			BATAS_DEPANField.setValue(record.data.BATAS_DEPAN);
			BATAS_BELAKANGField.setValue(record.data.BATAS_BELAKANG);
			TGL_PERMOHONANField.setValue(record.data.TGL_PERMOHONAN);
			TGL_BERAKHIRField.setValue(record.data.TGL_BERAKHIR);
			STATUSField.setValue(record.data.STATUS);
			STATUS_SURVEYField.setValue(record.data.STATUS_SURVEY);
			RETRIBUSIField.setValue(record.data.RETRIBUSI); */
			if(record.data.RETRIBUSI != 0){
				RETRIBUSI_STATUSField.setValue({ s_retribusi : ['1'] });
			}else{
				RETRIBUSI_STATUSField.setValue({ s_retribusi : ['0'] });
			}
			sktr_det_syaratDataStore.proxy.extraParams = { 
				sktr_id : record.data.ID_SKTR,
				currentAction : 'update',
				action : 'GETSYARAT'
			};
			sktr_det_syaratDataStore.load();
		}
		
		function tr_showSearchWindow(){
			tr_searchWindow.show();
		}
		
		function tr_printExcel(outputType){
			var searchText = "";
			
			if(tr_dataStore.proxy.extraParams.query!==null){searchText = tr_dataStore.proxy.extraParams.query;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_sktr/switchAction',
				params : {
					action : outputType,
					query : searchText,
					currentAction : tr_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								document.location='<?php echo base_url(); ?>/print/sktr_list.xls';
							}else{
								window.open('<?php echo base_url(); ?>/print/sktr_list.html','trlist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		tr_dataStore = Ext.create('Ext.data.Store',{
			id : 'tr_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_sktr/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'ID_SKTR'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'ID_SKTR', type : 'int', mapping : 'ID_SKTR' },
				{ name : 'TINGGI_BANGUNAN', type : 'float', mapping : 'TINGGI_BANGUNAN' },
				{ name : 'LUAS_PERSIL', type : 'float', mapping : 'LUAS_PERSIL' },
				{ name : 'LUAS_BANGUNAN', type : 'float', mapping : 'LUAS_BANGUNAN' },
				{ name : 'FUNGSI', type : 'string', mapping : 'FUNGSI' },
				{ name : 'ALAMAT_BANGUNAN', type : 'string', mapping : 'ALAMAT_BANGUNAN' },
				{ name : 'JENIS_PERMOHONAN', type : 'int', mapping : 'JENIS_PERMOHONAN' },
				{ name : 'NO_SK', type : 'string', mapping : 'NO_SK' },
				{ name : 'HAK_MILIK', type : 'int', mapping : 'HAK_MILIK' },
				{ name : 'NAMA_PEMILIK', type : 'string', mapping : 'NAMA_PEMILIK' },
				{ name : 'NO_SURAT_TANAH', type : 'string', mapping : 'NO_SURAT_TANAH' },
				{ name : 'BATAS_KIRI', type : 'string', mapping : 'BATAS_KIRI' },
				{ name : 'BATAS_KANAN', type : 'string', mapping : 'BATAS_KANAN' },
				{ name : 'BATAS_DEPAN', type : 'string', mapping : 'BATAS_DEPAN' },
				{ name : 'BATAS_BELAKANG', type : 'string', mapping : 'BATAS_BELAKANG' },
				{ name : 'TGL_PERMOHONAN', type : 'date', dateFormat : 'Y-m-d', mapping : 'TGL_PERMOHONAN' },
				{ name : 'TGL_BERAKHIR', type : 'date', dateFormat : 'Y-m-d', mapping : 'TGL_BERAKHIR' },
				{ name : 'STATUS', type : 'int', mapping : 'STATUS' },
				{ name : 'STATUS_SURVEY', type : 'int', mapping : 'STATUS_SURVEY' },
				{ name : 'RETRIBUSI', type : 'float', mapping : 'RETRIBUSI' },
				{ name : 'lama_proses', type : 'string', mapping : 'lama_proses' },
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
		tr_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						tr_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						tr_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						tr_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						tr_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						tr_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						tr_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						tr_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						tr_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var tr_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : tr_confirmAdd
		});
		var tr_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : tr_confirmUpdate
		});
		var tr_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : tr_confirmDelete
		});
		var tr_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : tr_refresh
		});
		var tr_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : tr_showSearchWindow
		});
		var tr_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				tr_printExcel('PRINT');
			}
		});
		var tr_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				tr_printExcel('EXCEL');
			}
		});
		
		var tr_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : tr_confirmUpdate
		});
		var tr_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : tr_confirmDelete
		});
		var tr_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : tr_refresh
		});
		tr_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'tr_contextMenu',
			items: [
				tr_contextMenuEdit,tr_contextMenuDelete,'-',tr_contextMenuRefresh
			]
		});
		
		/* Start ContextMenu For Action Column */
		var sktr_bp_printCM = Ext.create('Ext.menu.Item',{
			text : 'Bukti Penerimaan',
			tooltip : 'Cetak Bukti Penerimaan',
			handler : function(){
				var record = tr_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_sktr/switchAction',
					params: {
						ID_SKTR : record.get('ID_SKTR'),
						action : 'CETAKBP'
					},success : function(){
						window.open('<?php echo base_url("print/sktr_bp.html"); ?>');
					}
				});
			}
		});
		var sktr_lk_printCM = Ext.create('Ext.menu.Item',{
			text : 'Lembar Kontrol',
			tooltip : 'Cetak Lembar Kontrol',
			handler : function(){
				var record = tr_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_sktr/switchAction',
					params: {
						ID_SKTR : record.get('ID_SKTR'),
						action : 'CETAKLK'
					},success : function(){
						window.open('<? echo base_url("print/sktr_lk.html"); ?>');
					}
				});
			}
		});
		var stkr_sppl_printCM = Ext.create('Ext.menu.Item',{
			text : 'SKTR',
			tooltip : 'Cetak SKTR',
			handler : function(){
				var record = tr_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_sktr/switchAction',
					params: {
						ID_SKTR : record.get('ID_SKTR'),
						action : 'CETAKSKTR'
					},success : function(){
						window.open('<? echo base_url("print/sktr_sk.html"); ?>');
					}
				});
			}
		});
		var sktr_printContextMenu = Ext.create('Ext.menu.Menu',{
			items: [
				<?php echo ($_SESSION["IDHAK"] == 2) ? ("sktr_bp_printCM") : ("sktr_bp_printCM,sktr_lk_printCM,stkr_sppl_printCM"); ?>
			]
		});
		function sktr_ubahProses(proses){
			var record = tr_gridPanel.getSelectionModel().getSelection()[0];
			Ext.Ajax.request({
				waitMsg: 'Please wait...',
				url: 'c_sktr/switchAction',
				params: {
					sktr_id : record.get('ID_SKTR'),
					no_sk : record.get('NO_SK'),
					proses : proses,
					action : 'UBAHPROSES'
				},success : function(){
					tr_dataStore.reload();
				}
			});
		}
		var sktr_prosesContextMenu = Ext.create('Ext.menu.Menu',{
			items: [
				{
					text : 'Selesai, belum diambil',
					tooltip : 'Ubah Menjadi Selesai, belum diambil',
					handler : function(){
						sktr_ubahProses('Selesai, belum diambil');
					}
				},
				{
					text : 'Selesai, sudah diambil',
					tooltip : 'Ubah Menjadi Selesai, sudah diambil',
					handler : function(){
						sktr_ubahProses('Selesai, sudah diambil');
					}
				},
				{
					text : 'Ditolak',
					tooltip : 'Ubah Menjadi Ditolak',
					handler : function(){
						sktr_ubahProses('Ditolak');
					}
				}
			]
		});
		/*----------------end----------------*/
		
		tr_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			width: 150,
			store : tr_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						tr_dataStore.proxy.extraParams = { action : 'GETLIST'};
						tr_det_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
		});
		tr_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'tr_gridPanel',
			constrain : true,
			store : tr_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'trGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						tr_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : tr_shorcut,
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
							} else if (value == 0){
								return 'Ditolak';
							} else {
								return '-';
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
							sktr_printContextMenu.showAt(e.getXY());
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
							tr_confirmUpdate();
						}
					},{
						iconCls: 'icon16x16-delete',
						tooltip: 'Hapus Data',
						handler: function(grid, rowIndex){
							grid.getSelectionModel().select(rowIndex);
							tr_confirmDelete();
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
							sktr_prosesContextMenu.showAt(e.getXY());
							return false;
						}
					}],
					<?php echo ($_SESSION["IDHAK"] == 2) ? ("hidden:true") : (""); ?>
				}
							
			],
			tbar : [
				tr_addButton,
				//tr_editButton,
				//tr_deleteButton,
				tr_gridSearchField,
				// tr_searchButton,
				tr_refreshButton,
				tr_printButton,
				tr_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : tr_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					tr_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		ID_SKTRField = Ext.create('Ext.form.NumberField',{
			id : 'ID_SKTRField',
			name : 'permohonan_id',
			fieldLabel : 'ID_SKTR<font color=red>*</font>',
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
			fieldLabel : 'Nomor SK',
			maxLength : 50
		});
		NO_SK_LAMAField = Ext.create('Ext.form.ComboBox',{
			name : 'NO_SK_LAMA',
			fieldLabel : 'SK Lama',
			hidden:true,
			store : Ext.create('Ext.data.Store',{
				pageSize : globalPageSize,
				proxy : Ext.create('Ext.data.HttpProxy',{
					url : 'c_sktr/switchAction',
					reader : {
						type : 'json', root : 'results', rootProperty : 'results', totalProperty : 'total', idProperty : 'ID_SKTR'
					},
					actionMethods : { read : 'POST' },
					extraParams : { action : 'SEARCH' }
				}),
				fields : [
					{ name : 'NO_SK', type : 'string', mapping : 'NO_SK' },
					{ name : 'NAMA_PEMILIK', type : 'string', mapping : 'NAMA_PEMILIK' },
					{ name : 'NO_SURAT_TANAH', type : 'string', mapping : 'NO_SURAT_TANAH' },
					{ name : 'FUNGSI', type : 'string', mapping : 'FUNGSI' },
					{ name : 'ALAMAT_BANGUNAN', type : 'string', mapping : 'ALAMAT_BANGUNAN' },
					{ name : 'HAK_MILIK', type : 'int', mapping : 'HAK_MILIK' },
					{ name : 'NAMA_PEMILIK', type : 'string', mapping : 'NAMA_PEMILIK' },
					{ name : 'NO_SURAT_TANAH', type : 'string', mapping : 'NO_SURAT_TANAH' },
					{ name : 'BATAS_KIRI', type : 'string', mapping : 'BATAS_KIRI' },
					{ name : 'BATAS_KANAN', type : 'string', mapping : 'BATAS_KANAN' },
					{ name : 'BATAS_DEPAN', type : 'string', mapping : 'BATAS_DEPAN' },
					{ name : 'BATAS_BELAKANG', type : 'string', mapping : 'BATAS_BELAKANG' },
					{ name : 'TINGGI_BANGUNAN', type : 'string', mapping : 'TINGGI_BANGUNAN' },
					{ name : 'LUAS_PERSIL', type : 'string', mapping : 'LUAS_PERSIL' },
					{ name : 'LUAS_BANGUNAN', type : 'string', mapping : 'LUAS_BANGUNAN' }
				]
			}),
			displayField : 'NO_SK',
			valueField : 'ID_SKTR',
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
					'<div class="x-boundlist-item">No. SK : {NO_SK}<br>Nama Pemilik : {NAMA_PEMILIK}<br>No. Surat Tanah : {NO_SURAT_TANAH}<br>Fungsi : {FUNGSI}<br>Alamat Bangunan : {ALAMAT_BANGUNAN}<br></div>',
				'</tpl>'
			),
			listeners : {
				select : function(cmb, record){
					var rec=record[0];
					HAK_MILIKField.setValue(rec.get('HAK_MILIK'));
					NAMA_PEMILIKField.setValue(rec.get('NAMA_PEMILIK'));
					NO_SURAT_TANAHField.setValue(rec.get('NO_SURAT_TANAH'));
					ALAMAT_BANGUNANField.setValue(rec.get('ALAMAT_BANGUNAN'));
					FUNGSIField.setValue(rec.get('FUNGSI'));
					TINGGI_BANGUNANField.setValue(rec.get('TINGGI_BANGUNAN'));
					LUAS_PERSILField.setValue(rec.get('LUAS_PERSIL'));
					LUAS_BANGUNANField.setValue(rec.get('LUAS_BANGUNAN'));
					BATAS_KIRIField.setValue(rec.get('BATAS_KIRI'));
					BATAS_KANANField.setValue(rec.get('BATAS_KANAN'));
					BATAS_DEPANField.setValue(rec.get('BATAS_DEPAN'));
					BATAS_BELAKANGField.setValue(rec.get('BATAS_BELAKANG'));
				}
			}
		});
		
		/* START DATA PEMOHON */
		var tr_det_pemohon_idField = Ext.create('Ext.form.Hidden',{
			name : 'pemohon_id'
		});
		var tr_det_pemohon_namaField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_nama',
			fieldLabel : 'Nama',
			maxLength : 50
		});
		var tr_det_pemohon_alamatField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_alamat',
			fieldLabel : 'Alamat',
			maxLength : 100
		});
		var tr_det_pemohon_telpField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_telp',
			fieldLabel : 'Telp',
			maxLength : 20,
			maskRe : /([0-9]+)$/
		});
		var tr_det_pemohon_npwpField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_npwp',
			fieldLabel : 'NPWP',
			maxLength : 50
		});
		var tr_det_pemohon_rtField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_rt',
			fieldLabel : 'RT',
			maskRe : /([0-9]+)$/
		});
		var tr_det_pemohon_rwField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_rw',
			fieldLabel : 'RW',
			maskRe : /([0-9]+)$/
		});
		var tr_det_pemohon_kelField = Ext.create('Ext.form.ComboBox',{
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
		var tr_det_pemohon_kecField = Ext.create('Ext.form.ComboBox',{
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
		var tr_det_pemohon_nikField = Ext.create('Ext.form.ComboBox',{
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
				var store = tr_det_pemohon_nikField.getStore();
				var val = tr_det_pemohon_nikField.getRawValue();
				store.proxy.extraParams = {action : 'GETLIST',query : val};
				store.load();
				tr_det_pemohon_nikField.expand();
				tr_det_pemohon_nikField.fireEvent("ontriggerclick", this, event);
			},  
			tpl: Ext.create('Ext.XTemplate',
				'<tpl for=".">',
					'<div class="x-boundlist-item">NIK : {pemohon_nik}<br>Nama : {pemohon_nama}<br>Alamat : {pemohon_alamat}<br>Telp : {pemohon_telp}<br></div>',
				'</tpl>'
			),
			listeners : {
				select : function(cmb, record){
					var rec=record[0];
					tr_det_pemohon_idField.setValue(rec.get('pemohon_id'));
					tr_det_pemohon_nikField.setValue(rec.get('pemohon_nik'));
					tr_det_pemohon_namaField.setValue(rec.get('pemohon_nama'));
					tr_det_pemohon_alamatField.setValue(rec.get('pemohon_alamat'));
					tr_det_pemohon_telpField.setValue(rec.get('pemohon_telp'));
					tr_det_pemohon_npwpField.setValue(rec.get('pemohon_npwp'));
					tr_det_pemohon_rtField.setValue(rec.get('pemohon_rt'));
					tr_det_pemohon_rwField.setValue(rec.get('pemohon_rw'));
					tr_det_pemohon_kelField.setValue(rec.get('pemohon_kel'));
					tr_det_pemohon_kecField.setValue(rec.get('pemohon_kec'));
					tr_det_pemohon_straField.setValue(rec.get('pemohon_stra'));
					tr_det_pemohon_surattugasField.setValue(rec.get('pemohon_surattugas'));
					tr_det_pemohon_pekerjaanField.setValue(rec.get('pemohon_pekerjaan'));
					tr_det_pemohon_tempatlahirField.setValue(rec.get('pemohon_tempatlahir'));
					tr_det_pemohon_tanggallahirField.setValue(rec.get('pemohon_tanggallahir'));
					tr_det_pemohon_user_idField.setValue(rec.get('pemohon_user_id'));
					tr_det_pemohon_pendidikanField.setValue(rec.get('pemohon_pendidikan'));
					tr_det_pemohon_tahunlulusField.setValue(rec.get('pemohon_tahunlulus'));
				}
			}
		});
		var tr_det_pemohon_straField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_stra',
			fieldLabel : 'STRA',
			hidden : true,
			maxLength : 50
		});
		var tr_det_pemohon_surattugasField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_surattugas',
			fieldLabel : 'Surat Tugas',
			hidden : true,
			maxLength : 50
		});
		var tr_det_pemohon_pekerjaanField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_pekerjaan',
			fieldLabel : 'Pekerjaan',
			maxLength : 50
		});
		var tr_det_pemohon_tempatlahirField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_tempatlahir',
			fieldLabel : 'Tempat Lahir',
			maxLength : 50
		});
		var tr_det_pemohon_tanggallahirField = Ext.create('Ext.form.field.Date',{
			name : 'pemohon_tanggallahir',
			fieldLabel : 'Tanggal Lahir',
			format : 'd-m-Y'
		});
		var tr_det_pemohon_user_idField = Ext.create('Ext.form.Hidden',{
			name : 'pemohon_user_id',
		});
		var tr_det_pemohon_pendidikanField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_pendidikan',
			fieldLabel : 'Pendidikan',
			maxLength : 50
		});
		var tr_det_pemohon_tahunlulusField = Ext.create('Ext.form.TextField',{
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
		HAK_MILIKField = Ext.create('Ext.form.ComboBox',{
			id : 'HAK_MILIKField',
			name : 'HAK_MILIK',
			fieldLabel : 'Hak Milik',
			store : new Ext.data.ArrayStore({
				fields : ['hak_id', 'hak'],
				data : [[1,'Sertifikat'],[0,'PPAT']]
			}),
			displayField : 'hak',
			valueField : 'hak_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true
		});
		NAMA_PEMILIKField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_PEMILIKField',
			name : 'NAMA_PEMILIK',
			fieldLabel : 'Nama Pemilik',
			maxLength : 50
		});
		NO_SURAT_TANAHField = Ext.create('Ext.form.TextField',{
			id : 'NO_SURAT_TANAHField',
			name : 'NO_SURAT_TANAH',
			fieldLabel : 'No Surat Tanah',
			maxLength : 100
		});
		BATAS_KIRIField = Ext.create('Ext.form.TextField',{
			id : 'BATAS_KIRIField',
			name : 'BATAS_KIRI',
			fieldLabel : 'Batas Kiri',
			maxLength : 100
		});
		BATAS_KANANField = Ext.create('Ext.form.TextField',{
			id : 'BATAS_KANANField',
			name : 'BATAS_KANAN',
			fieldLabel : 'Batas Kanan',
			maxLength : 100
		});
		BATAS_DEPANField = Ext.create('Ext.form.TextField',{
			id : 'BATAS_DEPANField',
			name : 'BATAS_DEPAN',
			fieldLabel : 'Batas Depan',
			maxLength : 100
		});
		BATAS_BELAKANGField = Ext.create('Ext.form.TextField',{
			id : 'BATAS_BELAKANGField',
			name : 'BATAS_BELAKANG',
			fieldLabel : 'Batas Belakang',
			maxLength : 100
		});
		FUNGSIField = Ext.create('Ext.form.TextField',{
			id : 'FUNGSIField',
			name : 'FUNGSI',
			fieldLabel : 'Fungsi',
			maxLength : 100
		});
		ALAMAT_BANGUNANField = Ext.create('Ext.form.TextField',{
			id : 'ALAMAT_BANGUNANField',
			name : 'ALAMAT_BANGUNAN',
			fieldLabel : 'Alamat Bangunan',
			maxLength : 100
		});
		TINGGI_BANGUNANField = Ext.create('Ext.form.TextField',{
			id : 'TINGGI_BANGUNANField',
			name : 'TINGGI_BANGUNAN',
			fieldLabel : 'Tinggi Bangunan',
			maxLength : 100
		});
		LUAS_PERSILField = Ext.create('Ext.form.TextField',{
			id : 'LUAS_PERSILField',
			name : 'LUAS_PERSIL',
			fieldLabel : 'Luas Persil',
			maxLength : 100
		});
		LUAS_BANGUNANField = Ext.create('Ext.form.TextField',{
			id : 'LUAS_BANGUNANField',
			name : 'LUAS_BANGUNAN',
			fieldLabel : 'Luas Bangunan',
			maxLength : 100
		});
		TGL_PERMOHONANField = Ext.create('Ext.form.Date',{
			id : 'TGL_PERMOHONANField',
			name : 'permohonan_tanggal',
			format : 'd-m-Y',
			fieldLabel : 'Tanggal Permohonan',
			maxLength : 20
		});
		TGL_BERAKHIRField = Ext.create('Ext.form.Date',{
			id : 'TGL_BERAKHIRField',
			name : 'permohonan_kadaluarsa',
			format : 'd-m-Y',
			fieldLabel : 'Masa Berlaku',
			maxLength : 20
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
			forceSelection : true
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
			value : 0
		});
		tr_det_retibusiTanggalField = Ext.create('Ext.form.field.Date',{
			name : 'permohonan_retribusi_tanggal',
			fieldLabel : 'Tanggal',
			format : 'd-m-Y',
			hidden : true,
			value : new Date('<?php echo date('Y-m-d').'T'.date('H:i:s'); ?>')
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
			forceSelection : true
		});
		var tr_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : tr_save
		});
		var tr_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				tr_resetForm();
				tr_switchToGrid();
				$('html, body').animate({scrollTop: 0}, 500);
			}
		});
		/*Get Syarat*/
		sktr_det_syaratDataStore = Ext.create('Ext.data.Store',{
			id : 'sktr_det_syaratDataStore',
			pageSize : globalPageSize,
			autoLoad : true,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_sktr/switchAction',
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
		var sktr_syaratGridEditor = new Ext.grid.plugin.CellEditing({
			clicksToEdit: 1
		});
		sktr_syaratGrid = Ext.create('Ext.grid.Panel',{
			id : 'sktr_det_syaratDataStore',
			store : sktr_det_syaratDataStore,
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
		tr_formPanel = Ext.create('Ext.form.Panel', {
			disabled : true,
			frame : true,
			layout : {
				type : 'form',
				padding : 5
			},
			// defaultType : 'textfield',
			defaults : {anchor : '95%'},
			items: [
				{
					xtype : 'fieldset',
					title : 'SKTR',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						JENIS_PERMOHONANField,
						TGL_PERMOHONANField,
						ID_SKTRField,
						NO_SK_LAMAField
											]
				},{
					
					xtype : 'fieldset',
					title : '1. Data Pemohon',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						tr_det_pemohon_idField,
						tr_det_pemohon_nikField,
						tr_det_pemohon_namaField,
						tr_det_pemohon_alamatField,
						tr_det_pemohon_telpField,
						tr_det_pemohon_npwpField,
						tr_det_pemohon_rtField,
						tr_det_pemohon_rwField,
						tr_det_pemohon_kelField,
						tr_det_pemohon_kecField,
						tr_det_pemohon_straField,
						tr_det_pemohon_surattugasField,
						tr_det_pemohon_pekerjaanField,
						tr_det_pemohon_tempatlahirField,
						tr_det_pemohon_tanggallahirField,
						tr_det_pemohon_user_idField,
						tr_det_pemohon_pendidikanField,
						tr_det_pemohon_tahunlulusField
											]
				},{
					
					xtype : 'fieldset',
					title : '2. Data Perijinan',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						HAK_MILIKField,
						NAMA_PEMILIKField,
						NO_SURAT_TANAHField,
						ALAMAT_BANGUNANField,
						FUNGSIField,
						TINGGI_BANGUNANField,
						LUAS_PERSILField,
						LUAS_BANGUNANField,
						BATAS_KIRIField,
						BATAS_KANANField,
						BATAS_DEPANField,
						BATAS_BELAKANGField,
						<?php echo ($_SESSION['IDHAK'] == 2) ? ("") : ("TGL_BERAKHIRField,"); ?>
						<?php echo ($_SESSION['IDHAK'] == 2) ? ("") : ("STATUS_SURVEYField,"); ?>
						<?php echo ($_SESSION['IDHAK'] == 2) ? ("") : ("STATUSField,"); ?>
						<?php echo ($_SESSION["IDHAK"] == 2) ? ("") : ("RETRIBUSI_STATUSField,"); ?>
						<?php echo ($_SESSION["IDHAK"] == 2) ? ("") : ("RETRIBUSIField,"); ?>
						<?php echo ($_SESSION["IDHAK"] == 2) ? ("") : ("tr_det_retibusiTanggalField,"); ?>
							]
				},{
					xtype : 'fieldset',
					title : '3. Data Usaha',
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
				},{
					xtype : 'fieldset',
					title : '4. Data Kelengkapan',
					columnWidth : 0.5,
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						sktr_syaratGrid
					]
				},{
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [tr_saveButton,tr_cancelButton]
		});
		tr_formWindow = Ext.create('Ext.window.Window',{
			id : 'tr_formWindow',
			renderTo : 'trSaveWindow',
			title : globalFormAddEditTitle + ' ' + tr_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [tr_formPanel]
		});
/* End FormPanel declaration */
});
</script>
<div id="trSaveWindow"></div>
<div id="trSearchWindow"></div>
<div class="span12" id="trGrid"></div>