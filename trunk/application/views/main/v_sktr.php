<style>
	.checked{
		background-image:url(../assets/images/icons/check.png) !important;
		margin:auto;
	}
	.unchecked{
		background-image:url(../assets/images/icons/forward.png) !important;
	}
</style>
<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var tr_componentItemTitle="TR";
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
		var pemohon_namaField;
		var pemohon_telpField;
		var pemohon_alamatField;
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
				
		var ID_SKTR_INTISearchField;
		var ID_USERSearchField;
		var JENIS_PERMOHONANSearchField;
		var NO_SKSearchField;
		var pemohon_namaSearchField;
		var pemohon_telpSearchField;
		var pemohon_alamatSearchField;
		var HAK_MILIKSearchField;
		var NAMA_PEMILIKSearchField;
		var NO_SURAT_TANAHSearchField;
		var BATAS_KIRISearchField;
		var BATAS_KANANSearchField;
		var BATAS_DEPANSearchField;
		var BATAS_BELAKANGSearchField;
		var TGL_PERMOHONANSearchField;
		var STATUSSearchField;
		var STATUS_SURVEYSearchField;
				
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
					var ID_SKTRValue = '';
					var ID_USERValue = '';
					var JENIS_PERMOHONANValue = '';
					var NO_SKValue = '';
					var pemohon_namaValue = '';
					var pemohon_telpValue = '';
					var pemohon_alamatValue = '';
					var HAK_MILIKValue = '';
					var NAMA_PEMILIKValue = '';
					var NO_SURAT_TANAHValue = '';
					var BATAS_KIRIValue = '';
					var BATAS_KANANValue = '';
					var BATAS_DEPANValue = '';
					var BATAS_BELAKANGValue = '';
					var TGL_PERMOHONANValue = '';
					var TGL_BERAKHIRValue = '';
					var FUNGSIValue = '';
					var ALAMAT_BANGUNANValue = '';
					var TINGGI_BANGUNANValue = '';
					var LUAS_PERSILValue = '';
					var LUAS_BANGUNANValue = '';
					var STATUSValue = '';
					var STATUS_SURVEYValue = '';
					var array_sktr_keterangan=new Array();
					if(sktr_det_syaratDataStore.getCount() > 0){
						for(var i=0;i<sktr_det_syaratDataStore.getCount();i++){
							array_sktr_keterangan.push(sktr_det_syaratDataStore.getAt(i).data.KETERANGAN);
						}
					}					
					var encoded_array_sktr_keterangan = Ext.encode(array_sktr_keterangan);
					ID_SKTRValue = ID_SKTRField.getValue();
					// ID_SKTR_INTIValue = ID_SKTR_INTIField.getValue();
					// ID_USERValue = ID_USERField.getValue();
					JENIS_PERMOHONANValue = JENIS_PERMOHONANField.getValue();
					NO_SKValue = NO_SKField.getValue();
					pemohon_namaValue = pemohon_namaField.getValue();
					pemohon_telpValue = pemohon_telpField.getValue();
					pemohon_alamatValue = pemohon_alamatField.getValue();
					pemohon_idValue = pemohon_idField.getValue();
					pemohon_nikValue = pemohon_nikField.getValue();
					HAK_MILIKValue = HAK_MILIKField.getValue();
					NAMA_PEMILIKValue = NAMA_PEMILIKField.getValue();
					NO_SURAT_TANAHValue = NO_SURAT_TANAHField.getValue();
					BATAS_KIRIValue = BATAS_KIRIField.getValue();
					BATAS_KANANValue = BATAS_KANANField.getValue();
					BATAS_DEPANValue = BATAS_DEPANField.getValue();
					BATAS_BELAKANGValue = BATAS_BELAKANGField.getValue();
					TGL_PERMOHONANValue = TGL_PERMOHONANField.getValue();
					TGL_BERAKHIRValue = TGL_BERAKHIRField.getValue();
					FUNGSIValue = FUNGSIField.getValue();
					ALAMAT_BANGUNANValue = ALAMAT_BANGUNANField.getValue();
					TINGGI_BANGUNANValue = TINGGI_BANGUNANField.getValue();
					LUAS_PERSILValue = LUAS_PERSILField.getValue();
					LUAS_BANGUNANValue = LUAS_BANGUNANField.getValue();
					STATUSValue = STATUSField.getValue();
					STATUS_SURVEYValue = STATUS_SURVEYField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_sktr/switchAction',
						params: {							
							ID_SKTR : ID_SKTRValue,
							JENIS_PERMOHONAN : JENIS_PERMOHONANValue,
							NO_SK : NO_SKValue,
							pemohon_nama : pemohon_namaValue,
							pemohon_telp : pemohon_telpValue,
							pemohon_alamat : pemohon_alamatValue,
							pemohon_id : pemohon_idValue,
							pemohon_nik : pemohon_nikValue,
							HAK_MILIK : HAK_MILIKValue,
							NAMA_PEMILIK : NAMA_PEMILIKValue,
							NO_SURAT_TANAH : NO_SURAT_TANAHValue,
							BATAS_KIRI : BATAS_KIRIValue,
							BATAS_KANAN : BATAS_KANANValue,
							BATAS_DEPAN : BATAS_DEPANValue,
							BATAS_BELAKANG : BATAS_BELAKANGValue,
							TGL_PERMOHONAN : TGL_PERMOHONANValue,
							TGL_BERAKHIR : TGL_BERAKHIRValue,
							STATUS : STATUSValue,
							FUNGSI : FUNGSIValue,
							ALAMAT_BANGUNAN : ALAMAT_BANGUNANValue,
							TINGGI_BANGUNAN : TINGGI_BANGUNANValue,
							LUAS_PERSIL : LUAS_PERSILValue,
							LUAS_BANGUNAN : LUAS_BANGUNANValue,
							KETERANGAN : encoded_array_sktr_keterangan,
							STATUS_SURVEY : STATUS_SURVEYValue,
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
										// icon : Ext.MessageBox.WARNING,
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
			tr_searchPanel.getForm().reset();
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
			ID_SKTRField.setValue(record.data.ID_SKTR);
			JENIS_PERMOHONANField.setValue(record.data.JENIS_PERMOHONAN);
			pemohon_idField.setValue(record.data.pemohon_id);
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
		
		function tr_search(){
			tr_gridSearchField.reset();
			
			var ID_SKTR_INTIValue = '';
			var ID_USERValue = '';
			var JENIS_PERMOHONANValue = '';
			var NO_SKValue = '';
			var pemohon_namaValue = '';
			var pemohon_telpValue = '';
			var pemohon_alamatValue = '';
			var HAK_MILIKValue = '';
			var NAMA_PEMILIKValue = '';
			var NO_SURAT_TANAHValue = '';
			var BATAS_KIRIValue = '';
			var BATAS_KANANValue = '';
			var BATAS_DEPANValue = '';
			var BATAS_BELAKANGValue = '';
			var TGL_PERMOHONANValue = '';
			var STATUSValue = '';
			var STATUS_SURVEYValue = '';
						
			ID_SKTR_INTIValue = ID_SKTR_INTISearchField.getValue();
			ID_USERValue = ID_USERSearchField.getValue();
			JENIS_PERMOHONANValue = JENIS_PERMOHONANSearchField.getValue();
			NO_SKValue = NO_SKSearchField.getValue();
			pemohon_namaValue = pemohon_namaSearchField.getValue();
			pemohon_telpValue = pemohon_telpSearchField.getValue();
			pemohon_alamatValue = pemohon_alamatSearchField.getValue();
			HAK_MILIKValue = HAK_MILIKSearchField.getValue();
			NAMA_PEMILIKValue = NAMA_PEMILIKSearchField.getValue();
			NO_SURAT_TANAHValue = NO_SURAT_TANAHSearchField.getValue();
			BATAS_KIRIValue = BATAS_KIRISearchField.getValue();
			BATAS_KANANValue = BATAS_KANANSearchField.getValue();
			BATAS_DEPANValue = BATAS_DEPANSearchField.getValue();
			BATAS_BELAKANGValue = BATAS_BELAKANGSearchField.getValue();
			TGL_PERMOHONANValue = TGL_PERMOHONANSearchField.getValue();
			STATUS_SURVEYValue	= STATUS_SURVEYSearchField.getValue();
			STATUSValue = STATUSSearchField.getValue();
			tr_dbListAction = "SEARCH";
			tr_dataStore.proxy.extraParams = { 
				ID_SKTR_INTI : ID_SKTR_INTIValue,
				ID_USER : ID_USERValue,
				JENIS_PERMOHONAN : JENIS_PERMOHONANValue,
				NO_SK : NO_SKValue,
				pemohon_nama : pemohon_namaValue,
				pemohon_telp : pemohon_telpValue,
				pemohon_alamat : pemohon_alamatValue,
				HAK_MILIK : HAK_MILIKValue,
				NAMA_PEMILIK : NAMA_PEMILIKValue,
				NO_SURAT_TANAH : NO_SURAT_TANAHValue,
				BATAS_KIRI : BATAS_KIRIValue,
				BATAS_KANAN : BATAS_KANANValue,
				BATAS_DEPAN : BATAS_DEPANValue,
				BATAS_BELAKANG : BATAS_BELAKANGValue,
				TGL_PERMOHONAN : TGL_PERMOHONANValue,
				STATUS : STATUSValue,
				STATUS_SURVEY : STATUS_SURVEYValue,
				action : 'SEARCH'
			};
			tr_dataStore.currentPage = 1;
			tr_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function tr_printExcel(outputType){
			var searchText = "";
			var ID_SKTR_INTIValue = '';
			var ID_USERValue = '';
			var JENIS_PERMOHONANValue = '';
			var NO_SKValue = '';
			var pemohon_namaValue = '';
			var pemohon_telpValue = '';
			var pemohon_alamatValue = '';
			var HAK_MILIKValue = '';
			var NAMA_PEMILIKValue = '';
			var NO_SURAT_TANAHValue = '';
			var BATAS_KIRIValue = '';
			var BATAS_KANANValue = '';
			var BATAS_DEPANValue = '';
			var BATAS_BELAKANGValue = '';
			var TGL_PERMOHONANValue = '';
			var STATUSValue = '';
			var STATUS_SURVEYValue = '';
			
			if(tr_dataStore.proxy.extraParams.query!==null){searchText = tr_dataStore.proxy.extraParams.query;}
			if(tr_dataStore.proxy.extraParams.ID_SKTR_INTI!==null){ID_SKTR_INTIValue = tr_dataStore.proxy.extraParams.ID_SKTR_INTI;}
			if(tr_dataStore.proxy.extraParams.ID_USER!==null){ID_USERValue = tr_dataStore.proxy.extraParams.ID_USER;}
			if(tr_dataStore.proxy.extraParams.JENIS_PERMOHONAN!==null){JENIS_PERMOHONANValue = tr_dataStore.proxy.extraParams.JENIS_PERMOHONAN;}
			if(tr_dataStore.proxy.extraParams.NO_SK!==null){NO_SKValue = tr_dataStore.proxy.extraParams.NO_SK;}
			if(tr_dataStore.proxy.extraParams.pemohon_nama!==null){pemohon_namaValue = tr_dataStore.proxy.extraParams.pemohon_nama;}
			if(tr_dataStore.proxy.extraParams.pemohon_telp!==null){pemohon_telpValue = tr_dataStore.proxy.extraParams.pemohon_telp;}
			if(tr_dataStore.proxy.extraParams.pemohon_alamat!==null){pemohon_alamatValue = tr_dataStore.proxy.extraParams.pemohon_alamat;}
			if(tr_dataStore.proxy.extraParams.HAK_MILIK!==null){HAK_MILIKValue = tr_dataStore.proxy.extraParams.HAK_MILIK;}
			if(tr_dataStore.proxy.extraParams.NAMA_PEMILIK!==null){NAMA_PEMILIKValue = tr_dataStore.proxy.extraParams.NAMA_PEMILIK;}
			if(tr_dataStore.proxy.extraParams.NO_SURAT_TANAH!==null){NO_SURAT_TANAHValue = tr_dataStore.proxy.extraParams.NO_SURAT_TANAH;}
			if(tr_dataStore.proxy.extraParams.BATAS_KIRI!==null){BATAS_KIRIValue = tr_dataStore.proxy.extraParams.BATAS_KIRI;}
			if(tr_dataStore.proxy.extraParams.BATAS_KANAN!==null){BATAS_KANANValue = tr_dataStore.proxy.extraParams.BATAS_KANAN;}
			if(tr_dataStore.proxy.extraParams.BATAS_DEPAN!==null){BATAS_DEPANValue = tr_dataStore.proxy.extraParams.BATAS_DEPAN;}
			if(tr_dataStore.proxy.extraParams.BATAS_BELAKANG!==null){BATAS_BELAKANGValue = tr_dataStore.proxy.extraParams.BATAS_BELAKANG;}
			if(tr_dataStore.proxy.extraParams.TGL_PERMOHONAN!==null){TGL_PERMOHONANValue = tr_dataStore.proxy.extraParams.TGL_PERMOHONAN;}
			if(tr_dataStore.proxy.extraParams.STATUS!==null){STATUSValue = tr_dataStore.proxy.extraParams.STATUS;}
			if(tr_dataStore.proxy.extraParams.STATUS_SURVEY!==null){STATUS_SURVEYValue = tr_dataStore.proxy.extraParams.STATUS_SURVEY;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_sktr/switchAction',
				params : {
					action : outputType,
					query : searchText,
					JENIS_PERMOHONAN : JENIS_PERMOHONANValue,
					NO_SK : NO_SKValue,
					pemohon_nama : pemohon_namaValue,
					pemohon_telp : pemohon_telpValue,
					pemohon_alamat : pemohon_alamatValue,
					HAK_MILIK : HAK_MILIKValue,
					NAMA_PEMILIK : NAMA_PEMILIKValue,
					NO_SURAT_TANAH : NO_SURAT_TANAHValue,
					BATAS_KIRI : BATAS_KIRIValue,
					BATAS_KANAN : BATAS_KANANValue,
					BATAS_DEPAN : BATAS_DEPANValue,
					BATAS_BELAKANG : BATAS_BELAKANGValue,
					TGL_PERMOHONAN : TGL_PERMOHONANValue,
					STATUS : STATUSValue,
					STATUS_SURVEY : STATUS_SURVEYValue,
					currentAction : tr_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/sktr_list.xls');
							}else{
								window.open('./print/sktr_list.html','trlist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
				{ name : 'pemohon_tahunlulus', type : 'int', mapping : 'pemohon_tahunlulus' }
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
						window.open('<?php echo base_url("index.php/c_sktr/printBP/"); ?>' + record.get('ID_SKTR'));
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
						window.open('../print/idam_sk.html');
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
						window.open('../print/idam_lembarkontrol.html');
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
						idam_det_dbListAction = 'GETLIST';
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
			name : 'ID_SKTR',
			fieldLabel : 'ID_SKTR<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		JENIS_PERMOHONANField = Ext.create('Ext.form.ComboBox',{
			id : 'JENIS_PERMOHONANField',
			name : 'JENIS_PERMOHONAN',
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
					{ name : 'pemohon_nik', type : 'string', mapping : 'pemohon_nik' },
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
				}
			}
		});
		pemohon_namaField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_namaField',
			name : 'pemohon_nama',
			fieldLabel : 'Nama Pemohon',
			maxLength : 50
		});
		pemohon_telpField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_telpField',
			name : 'pemohon_telp',
			fieldLabel : 'No. Telp',
			maxLength : 20
		});
		pemohon_alamatField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_alamatField',
			name : 'pemohon_alamat',
			fieldLabel : 'Alamat Pemohon',
			maxLength : 20
		});
		pemohon_idField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_idField',
			name : 'pemohon_id',
			fieldLabel : '',
			maxLength : 20,
			hidden:true
		});
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
			name : 'TGL_PERMOHONAN',
			format : 'd-m-Y',
			fieldLabel : 'Tanggal Permohonan',
			maxLength : 20
		});
		TGL_BERAKHIRField = Ext.create('Ext.form.Date',{
			id : 'TGL_BERAKHIRField',
			name : 'TGL_BERAKHIR',
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
						NO_SK_LAMAField
											]
				},{
					
					xtype : 'fieldset',
					title : '1. Data Pemohon',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						pemohon_idField,
						pemohon_nikField,
						pemohon_namaField,
						pemohon_telpField,
						pemohon_alamatField
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
							]
				},{
					xtype : 'fieldset',
					title : '3. Data Kelengkapan',
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
/* Start SearchPanel declaration */
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
		pemohon_namaSearchField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_namaSearchField',
			name : 'pemohon_nama',
			fieldLabel : 'pemohon_nama',
			maxLength : 50
		
		});
		pemohon_telpSearchField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_telpSearchField',
			name : 'pemohon_telp',
			fieldLabel : 'pemohon_telp',
			maxLength : 20
		
		});
		pemohon_alamatSearchField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_alamatSearchField',
			name : 'pemohon_alamat',
			fieldLabel : 'pemohon_alamat',
			maxLength : 20
		
		});
		HAK_MILIKSearchField = Ext.create('Ext.form.NumberField',{
			id : 'HAK_MILIKSearchField',
			name : 'HAK_MILIK',
			fieldLabel : 'HAK_MILIK',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		NAMA_PEMILIKSearchField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_PEMILIKSearchField',
			name : 'NAMA_PEMILIK',
			fieldLabel : 'NAMA_PEMILIK',
			maxLength : 50
		
		});
		NO_SURAT_TANAHSearchField = Ext.create('Ext.form.TextField',{
			id : 'NO_SURAT_TANAHSearchField',
			name : 'NO_SURAT_TANAH',
			fieldLabel : 'NO_SURAT_TANAH',
			maxLength : 100
		
		});
		BATAS_KIRISearchField = Ext.create('Ext.form.TextField',{
			id : 'BATAS_KIRISearchField',
			name : 'BATAS_KIRI',
			fieldLabel : 'BATAS_KIRI',
			maxLength : 100
		
		});
		BATAS_KANANSearchField = Ext.create('Ext.form.TextField',{
			id : 'BATAS_KANANSearchField',
			name : 'BATAS_KANAN',
			fieldLabel : 'BATAS_KANAN',
			maxLength : 100
		
		});
		BATAS_DEPANSearchField = Ext.create('Ext.form.TextField',{
			id : 'BATAS_DEPANSearchField',
			name : 'BATAS_DEPAN',
			fieldLabel : 'BATAS_DEPAN',
			maxLength : 100
		
		});
		BATAS_BELAKANGSearchField = Ext.create('Ext.form.TextField',{
			id : 'BATAS_BELAKANGSearchField',
			name : 'BATAS_BELAKANG',
			fieldLabel : 'BATAS_BELAKANG',
			maxLength : 100
		
		});
		TGL_PERMOHONANSearchField = Ext.create('Ext.form.TextField',{
			id : 'TGL_PERMOHONANSearchField',
			name : 'TGL_PERMOHONAN',
			fieldLabel : 'TGL_PERMOHONAN',
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
		var tr_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : tr_search
		});
		var tr_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				tr_searchWindow.hide();
			}
		});
		tr_searchPanel = Ext.create('Ext.form.Panel', {
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
						ID_SKTR_INTISearchField,
						ID_USERSearchField,
						JENIS_PERMOHONANSearchField,
						NO_SKSearchField,
						pemohon_namaSearchField,
						pemohon_telpSearchField,
						pemohon_alamatSearchField,
						HAK_MILIKSearchField,
						NAMA_PEMILIKSearchField,
						NO_SURAT_TANAHSearchField,
						BATAS_KIRISearchField,
						BATAS_KANANSearchField,
						BATAS_DEPANSearchField,
						BATAS_BELAKANGSearchField,
						TGL_PERMOHONANSearchField,
						STATUSSearchField,
						]
				}],
			buttons : [tr_searchingButton,tr_cancelSearchButton]
		});
		tr_searchWindow = Ext.create('Ext.window.Window',{
			id : 'tr_searchWindow',
			renderTo : 'trSearchWindow',
			title : globalFormSearchTitle + ' ' + tr_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [tr_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="trSaveWindow"></div>
<div id="trSearchWindow"></div>
<div class="span12" id="trGrid"></div>