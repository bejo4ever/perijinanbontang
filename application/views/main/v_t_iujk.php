<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var iujk_componentItemTitle="IUJK";
		var iujk_dataStore;
		
		var iujk_shorcut;
		var iujk_contextMenu;
		var iujk_gridSearchField;
		var iujk_gridPanel;
		var iujk_formPanel;
		var iujk_formWindow;
		var iujk_searchPanel;
		var iujk_searchWindow;
		
		var iujk_idField;
		var iujk_jenisField;
		var iujk_tanggalField;
		var iujk_statusField;
		var iujk_noformulirField;
		var iujk_nourutformulirField;
		var iujk_lampiranField;
		var iujk_rekomField;
		var iujk_rekomurutField;
		var iujk_rekomtanggalField;
		var iujk_perusahaanField;
		var iujk_alamatField;
		var iujk_direkturField;
		var iujk_golonganField;
		var iujk_kualifikasiField;
		var iujk_bidangusahaField;
		var iujk_kelurahanField;
		var iujk_rtField;
		var iujk_rwField;
		var iujk_kotaField;
		var iujk_propinsiField;
		var iujk_teleponField;
		var iujk_kodeposField;
		var iujk_faxField;
		var iujk_npwpField;
		var iujk_pjtbuField;
		var iujk_pjteknisField;
		var iujk_pj1Field;
		var iujk_pj2Field;
		var iujk_pj3Field;
		var iujk_berlakuField;
		var iujk_kadaluarsaField;
				
		var iujk_jenisSearchField;
		var iujk_tanggalSearchField;
		var iujk_statusSearchField;
		var iujk_noformulirSearchField;
		var iujk_nourutformulirSearchField;
		var iujk_lampiranSearchField;
		var iujk_rekomSearchField;
		var iujk_rekomurutSearchField;
		var iujk_rekomtanggalSearchField;
		var iujk_perusahaanSearchField;
		var iujk_alamatSearchField;
		var iujk_direkturSearchField;
		var iujk_golonganSearchField;
		var iujk_kualifikasiSearchField;
		var iujk_bidangusahaSearchField;
		var iujk_kelurahanSearchField;
		var iujk_rtSearchField;
		var iujk_rwSearchField;
		var iujk_kotaSearchField;
		var iujk_propinsiSearchField;
		var iujk_teleponSearchField;
		var iujk_kodeposSearchField;
		var iujk_faxSearchField;
		var iujk_npwpSearchField;
		var iujk_pjtbuSearchField;
		var iujk_pjteknisSearchField;
		var iujk_pj1SearchField;
		var iujk_pj2SearchField;
		var iujk_pj3SearchField;
		var iujk_berlakuSearchField;
		var iujk_kadaluarsaSearchField;
				
		var iujk_dbTask = 'CREATE';
		var iujk_dbTaskMessage = 'Tambah';
		var iujk_dbPermission = 'CRUD';
		var iujk_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function iujk_switchToGrid(){
			iujk_formPanel.setDisabled(true);
			iujk_gridPanel.setDisabled(false);
			iujk_formWindow.hide();
		}
		
		function iujk_switchToForm(){
			iujk_gridPanel.setDisabled(true);
			iujk_formPanel.setDisabled(false);
			iujk_formWindow.show();
		}
		
		function iujk_confirmAdd(){
			iujk_dbTask = 'CREATE';
			iujk_dbTaskMessage = 'created';
			iujk_resetForm();
			iujk_switchToForm();
		}
		
		function iujk_confirmUpdate(){
			if(iujk_gridPanel.selModel.getCount() == 1) {
				iujk_dbTask = 'UPDATE';
				iujk_dbTaskMessage = 'updated';
				iujk_switchToForm();
				iujk_setForm();
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
		
		function iujk_confirmDelete(){
			if(iujk_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, iujk_delete);
			}else if(iujk_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, iujk_delete);
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
		
		function iujk_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(iujk_dbPermission)==false && pattC.test(iujk_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(iujk_confirmFormValid()){
					var iujk_idValue = '';
					var iujk_jenisValue = '';
					var iujk_tanggalValue = '';
					var iujk_statusValue = '';
					var iujk_noformulirValue = '';
					var iujk_nourutformulirValue = '';
					var iujk_lampiranValue = '';
					var iujk_rekomValue = '';
					var iujk_rekomurutValue = '';
					var iujk_rekomtanggalValue = '';
					var iujk_perusahaanValue = '';
					var iujk_alamatValue = '';
					var iujk_direkturValue = '';
					var iujk_golonganValue = '';
					var iujk_kualifikasiValue = '';
					var iujk_bidangusahaValue = '';
					var iujk_kelurahanValue = '';
					var iujk_rtValue = '';
					var iujk_rwValue = '';
					var iujk_kotaValue = '';
					var iujk_propinsiValue = '';
					var iujk_teleponValue = '';
					var iujk_kodeposValue = '';
					var iujk_faxValue = '';
					var iujk_npwpValue = '';
					var iujk_pjtbuValue = '';
					var iujk_pjteknisValue = '';
					var iujk_pj1Value = '';
					var iujk_pj2Value = '';
					var iujk_pj3Value = '';
					var iujk_berlakuValue = '';
					var iujk_kadaluarsaValue = '';
										
					iujk_idValue = iujk_idField.getValue();
					iujk_jenisValue = iujk_jenisField.getValue();
					iujk_tanggalValue = iujk_tanggalField.getValue();
					iujk_statusValue = iujk_statusField.getValue();
					iujk_noformulirValue = iujk_noformulirField.getValue();
					iujk_nourutformulirValue = iujk_nourutformulirField.getValue();
					iujk_lampiranValue = iujk_lampiranField.getValue();
					iujk_rekomValue = iujk_rekomField.getValue();
					iujk_rekomurutValue = iujk_rekomurutField.getValue();
					iujk_rekomtanggalValue = iujk_rekomtanggalField.getValue();
					iujk_perusahaanValue = iujk_perusahaanField.getValue();
					iujk_alamatValue = iujk_alamatField.getValue();
					iujk_direkturValue = iujk_direkturField.getValue();
					iujk_golonganValue = iujk_golonganField.getValue();
					iujk_kualifikasiValue = iujk_kualifikasiField.getValue();
					iujk_bidangusahaValue = iujk_bidangusahaField.getValue();
					iujk_kelurahanValue = iujk_kelurahanField.getValue();
					iujk_rtValue = iujk_rtField.getValue();
					iujk_rwValue = iujk_rwField.getValue();
					iujk_kotaValue = iujk_kotaField.getValue();
					iujk_propinsiValue = iujk_propinsiField.getValue();
					iujk_teleponValue = iujk_teleponField.getValue();
					iujk_kodeposValue = iujk_kodeposField.getValue();
					iujk_faxValue = iujk_faxField.getValue();
					iujk_npwpValue = iujk_npwpField.getValue();
					iujk_pjtbuValue = iujk_pjtbuField.getValue();
					iujk_pjteknisValue = iujk_pjteknisField.getValue();
					iujk_pj1Value = iujk_pj1Field.getValue();
					iujk_pj2Value = iujk_pj2Field.getValue();
					iujk_pj3Value = iujk_pj3Field.getValue();
					iujk_berlakuValue = iujk_berlakuField.getValue();
					iujk_kadaluarsaValue = iujk_kadaluarsaField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_t_iujk/switchAction',
						params: {							
							iujk_id : iujk_idValue,
							iujk_jenis : iujk_jenisValue,
							iujk_tanggal : iujk_tanggalValue,
							iujk_status : iujk_statusValue,
							iujk_noformulir : iujk_noformulirValue,
							iujk_nourutformulir : iujk_nourutformulirValue,
							iujk_lampiran : iujk_lampiranValue,
							iujk_rekom : iujk_rekomValue,
							iujk_rekomurut : iujk_rekomurutValue,
							iujk_rekomtanggal : iujk_rekomtanggalValue,
							iujk_perusahaan : iujk_perusahaanValue,
							iujk_alamat : iujk_alamatValue,
							iujk_direktur : iujk_direkturValue,
							iujk_golongan : iujk_golonganValue,
							iujk_kualifikasi : iujk_kualifikasiValue,
							iujk_bidangusaha : iujk_bidangusahaValue,
							iujk_kelurahan : iujk_kelurahanValue,
							iujk_rt : iujk_rtValue,
							iujk_rw : iujk_rwValue,
							iujk_kota : iujk_kotaValue,
							iujk_propinsi : iujk_propinsiValue,
							iujk_telepon : iujk_teleponValue,
							iujk_kodepos : iujk_kodeposValue,
							iujk_fax : iujk_faxValue,
							iujk_npwp : iujk_npwpValue,
							iujk_pjtbu : iujk_pjtbuValue,
							iujk_pjteknis : iujk_pjteknisValue,
							iujk_pj1 : iujk_pj1Value,
							iujk_pj2 : iujk_pj2Value,
							iujk_pj3 : iujk_pj3Value,
							iujk_berlaku : iujk_berlakuValue,
							iujk_kadaluarsa : iujk_kadaluarsaValue,
							action : iujk_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									iujk_dataStore.reload();
									iujk_resetForm();
									iujk_switchToGrid();
									iujk_gridPanel.getSelectionModel().deselectAll();
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
		
		function iujk_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(iujk_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = iujk_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< iujk_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.iujk_id);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_t_iujk/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									iujk_dataStore.reload();
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
		
		function iujk_refresh(){
			iujk_dbListAction = "GETLIST";
			iujk_gridSearchField.reset();
			iujk_searchPanel.getForm().reset();
			iujk_dataStore.proxy.extraParams = { action : 'GETLIST' };
			iujk_dataStore.proxy.extraParams.query = "";
			iujk_dataStore.currentPage = 1;
			iujk_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function iujk_confirmFormValid(){
			return iujk_formPanel.getForm().isValid();
		}
		
		function iujk_resetForm(){
			iujk_dbTask = 'CREATE';
			iujk_dbTaskMessage = 'create';
			iujk_formPanel.getForm().reset();
			iujk_idField.setValue(0);
		}
		
		function iujk_setForm(){
			iujk_dbTask = 'UPDATE';
            iujk_dbTaskMessage = 'update';
			
			var record = iujk_gridPanel.getSelectionModel().getSelection()[0];
			iujk_idField.setValue(record.data.iujk_id);
			iujk_jenisField.setValue(record.data.iujk_jenis);
			iujk_tanggalField.setValue(record.data.iujk_tanggal);
			iujk_statusField.setValue(record.data.iujk_status);
			iujk_noformulirField.setValue(record.data.iujk_noformulir);
			iujk_nourutformulirField.setValue(record.data.iujk_nourutformulir);
			iujk_lampiranField.setValue(record.data.iujk_lampiran);
			iujk_rekomField.setValue(record.data.iujk_rekom);
			iujk_rekomurutField.setValue(record.data.iujk_rekomurut);
			iujk_rekomtanggalField.setValue(record.data.iujk_rekomtanggal);
			iujk_perusahaanField.setValue(record.data.iujk_perusahaan);
			iujk_alamatField.setValue(record.data.iujk_alamat);
			iujk_direkturField.setValue(record.data.iujk_direktur);
			iujk_golonganField.setValue(record.data.iujk_golongan);
			iujk_kualifikasiField.setValue(record.data.iujk_kualifikasi);
			iujk_bidangusahaField.setValue(record.data.iujk_bidangusaha);
			iujk_kelurahanField.setValue(record.data.iujk_kelurahan);
			iujk_rtField.setValue(record.data.iujk_rt);
			iujk_rwField.setValue(record.data.iujk_rw);
			iujk_kotaField.setValue(record.data.iujk_kota);
			iujk_propinsiField.setValue(record.data.iujk_propinsi);
			iujk_teleponField.setValue(record.data.iujk_telepon);
			iujk_kodeposField.setValue(record.data.iujk_kodepos);
			iujk_faxField.setValue(record.data.iujk_fax);
			iujk_npwpField.setValue(record.data.iujk_npwp);
			iujk_pjtbuField.setValue(record.data.iujk_pjtbu);
			iujk_pjteknisField.setValue(record.data.iujk_pjteknis);
			iujk_pj1Field.setValue(record.data.iujk_pj1);
			iujk_pj2Field.setValue(record.data.iujk_pj2);
			iujk_pj3Field.setValue(record.data.iujk_pj3);
			iujk_berlakuField.setValue(record.data.iujk_berlaku);
			iujk_kadaluarsaField.setValue(record.data.iujk_kadaluarsa);
					}
		
		function iujk_showSearchWindow(){
			iujk_searchWindow.show();
		}
		
		function iujk_search(){
			iujk_gridSearchField.reset();
			
			var iujk_jenisValue = '';
			var iujk_tanggalValue = '';
			var iujk_statusValue = '';
			var iujk_noformulirValue = '';
			var iujk_nourutformulirValue = '';
			var iujk_lampiranValue = '';
			var iujk_rekomValue = '';
			var iujk_rekomurutValue = '';
			var iujk_rekomtanggalValue = '';
			var iujk_perusahaanValue = '';
			var iujk_alamatValue = '';
			var iujk_direkturValue = '';
			var iujk_golonganValue = '';
			var iujk_kualifikasiValue = '';
			var iujk_bidangusahaValue = '';
			var iujk_kelurahanValue = '';
			var iujk_rtValue = '';
			var iujk_rwValue = '';
			var iujk_kotaValue = '';
			var iujk_propinsiValue = '';
			var iujk_teleponValue = '';
			var iujk_kodeposValue = '';
			var iujk_faxValue = '';
			var iujk_npwpValue = '';
			var iujk_pjtbuValue = '';
			var iujk_pjteknisValue = '';
			var iujk_pj1Value = '';
			var iujk_pj2Value = '';
			var iujk_pj3Value = '';
			var iujk_berlakuValue = '';
			var iujk_kadaluarsaValue = '';
						
			iujk_jenisValue = iujk_jenisSearchField.getValue();
			iujk_tanggalValue = iujk_tanggalSearchField.getValue();
			iujk_statusValue = iujk_statusSearchField.getValue();
			iujk_noformulirValue = iujk_noformulirSearchField.getValue();
			iujk_nourutformulirValue = iujk_nourutformulirSearchField.getValue();
			iujk_lampiranValue = iujk_lampiranSearchField.getValue();
			iujk_rekomValue = iujk_rekomSearchField.getValue();
			iujk_rekomurutValue = iujk_rekomurutSearchField.getValue();
			iujk_rekomtanggalValue = iujk_rekomtanggalSearchField.getValue();
			iujk_perusahaanValue = iujk_perusahaanSearchField.getValue();
			iujk_alamatValue = iujk_alamatSearchField.getValue();
			iujk_direkturValue = iujk_direkturSearchField.getValue();
			iujk_golonganValue = iujk_golonganSearchField.getValue();
			iujk_kualifikasiValue = iujk_kualifikasiSearchField.getValue();
			iujk_bidangusahaValue = iujk_bidangusahaSearchField.getValue();
			iujk_kelurahanValue = iujk_kelurahanSearchField.getValue();
			iujk_rtValue = iujk_rtSearchField.getValue();
			iujk_rwValue = iujk_rwSearchField.getValue();
			iujk_kotaValue = iujk_kotaSearchField.getValue();
			iujk_propinsiValue = iujk_propinsiSearchField.getValue();
			iujk_teleponValue = iujk_teleponSearchField.getValue();
			iujk_kodeposValue = iujk_kodeposSearchField.getValue();
			iujk_faxValue = iujk_faxSearchField.getValue();
			iujk_npwpValue = iujk_npwpSearchField.getValue();
			iujk_pjtbuValue = iujk_pjtbuSearchField.getValue();
			iujk_pjteknisValue = iujk_pjteknisSearchField.getValue();
			iujk_pj1Value = iujk_pj1SearchField.getValue();
			iujk_pj2Value = iujk_pj2SearchField.getValue();
			iujk_pj3Value = iujk_pj3SearchField.getValue();
			iujk_berlakuValue = iujk_berlakuSearchField.getValue();
			iujk_kadaluarsaValue = iujk_kadaluarsaSearchField.getValue();
			iujk_dbListAction = "SEARCH";
			iujk_dataStore.proxy.extraParams = { 
				iujk_jenis : iujk_jenisValue,
				iujk_tanggal : iujk_tanggalValue,
				iujk_status : iujk_statusValue,
				iujk_noformulir : iujk_noformulirValue,
				iujk_nourutformulir : iujk_nourutformulirValue,
				iujk_lampiran : iujk_lampiranValue,
				iujk_rekom : iujk_rekomValue,
				iujk_rekomurut : iujk_rekomurutValue,
				iujk_rekomtanggal : iujk_rekomtanggalValue,
				iujk_perusahaan : iujk_perusahaanValue,
				iujk_alamat : iujk_alamatValue,
				iujk_direktur : iujk_direkturValue,
				iujk_golongan : iujk_golonganValue,
				iujk_kualifikasi : iujk_kualifikasiValue,
				iujk_bidangusaha : iujk_bidangusahaValue,
				iujk_kelurahan : iujk_kelurahanValue,
				iujk_rt : iujk_rtValue,
				iujk_rw : iujk_rwValue,
				iujk_kota : iujk_kotaValue,
				iujk_propinsi : iujk_propinsiValue,
				iujk_telepon : iujk_teleponValue,
				iujk_kodepos : iujk_kodeposValue,
				iujk_fax : iujk_faxValue,
				iujk_npwp : iujk_npwpValue,
				iujk_pjtbu : iujk_pjtbuValue,
				iujk_pjteknis : iujk_pjteknisValue,
				iujk_pj1 : iujk_pj1Value,
				iujk_pj2 : iujk_pj2Value,
				iujk_pj3 : iujk_pj3Value,
				iujk_berlaku : iujk_berlakuValue,
				iujk_kadaluarsa : iujk_kadaluarsaValue,
				action : 'SEARCH'
			};
			iujk_dataStore.currentPage = 1;
			iujk_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function iujk_printExcel(outputType){
			var searchText = "";
			var iujk_jenisValue = '';
			var iujk_tanggalValue = '';
			var iujk_statusValue = '';
			var iujk_noformulirValue = '';
			var iujk_nourutformulirValue = '';
			var iujk_lampiranValue = '';
			var iujk_rekomValue = '';
			var iujk_rekomurutValue = '';
			var iujk_rekomtanggalValue = '';
			var iujk_perusahaanValue = '';
			var iujk_alamatValue = '';
			var iujk_direkturValue = '';
			var iujk_golonganValue = '';
			var iujk_kualifikasiValue = '';
			var iujk_bidangusahaValue = '';
			var iujk_kelurahanValue = '';
			var iujk_rtValue = '';
			var iujk_rwValue = '';
			var iujk_kotaValue = '';
			var iujk_propinsiValue = '';
			var iujk_teleponValue = '';
			var iujk_kodeposValue = '';
			var iujk_faxValue = '';
			var iujk_npwpValue = '';
			var iujk_pjtbuValue = '';
			var iujk_pjteknisValue = '';
			var iujk_pj1Value = '';
			var iujk_pj2Value = '';
			var iujk_pj3Value = '';
			var iujk_berlakuValue = '';
			var iujk_kadaluarsaValue = '';
			
			if(iujk_dataStore.proxy.extraParams.query!==null){searchText = iujk_dataStore.proxy.extraParams.query;}
			if(iujk_dataStore.proxy.extraParams.iujk_jenis!==null){iujk_jenisValue = iujk_dataStore.proxy.extraParams.iujk_jenis;}
			if(iujk_dataStore.proxy.extraParams.iujk_tanggal!==null){iujk_tanggalValue = iujk_dataStore.proxy.extraParams.iujk_tanggal;}
			if(iujk_dataStore.proxy.extraParams.iujk_status!==null){iujk_statusValue = iujk_dataStore.proxy.extraParams.iujk_status;}
			if(iujk_dataStore.proxy.extraParams.iujk_noformulir!==null){iujk_noformulirValue = iujk_dataStore.proxy.extraParams.iujk_noformulir;}
			if(iujk_dataStore.proxy.extraParams.iujk_nourutformulir!==null){iujk_nourutformulirValue = iujk_dataStore.proxy.extraParams.iujk_nourutformulir;}
			if(iujk_dataStore.proxy.extraParams.iujk_lampiran!==null){iujk_lampiranValue = iujk_dataStore.proxy.extraParams.iujk_lampiran;}
			if(iujk_dataStore.proxy.extraParams.iujk_rekom!==null){iujk_rekomValue = iujk_dataStore.proxy.extraParams.iujk_rekom;}
			if(iujk_dataStore.proxy.extraParams.iujk_rekomurut!==null){iujk_rekomurutValue = iujk_dataStore.proxy.extraParams.iujk_rekomurut;}
			if(iujk_dataStore.proxy.extraParams.iujk_rekomtanggal!==null){iujk_rekomtanggalValue = iujk_dataStore.proxy.extraParams.iujk_rekomtanggal;}
			if(iujk_dataStore.proxy.extraParams.iujk_perusahaan!==null){iujk_perusahaanValue = iujk_dataStore.proxy.extraParams.iujk_perusahaan;}
			if(iujk_dataStore.proxy.extraParams.iujk_alamat!==null){iujk_alamatValue = iujk_dataStore.proxy.extraParams.iujk_alamat;}
			if(iujk_dataStore.proxy.extraParams.iujk_direktur!==null){iujk_direkturValue = iujk_dataStore.proxy.extraParams.iujk_direktur;}
			if(iujk_dataStore.proxy.extraParams.iujk_golongan!==null){iujk_golonganValue = iujk_dataStore.proxy.extraParams.iujk_golongan;}
			if(iujk_dataStore.proxy.extraParams.iujk_kualifikasi!==null){iujk_kualifikasiValue = iujk_dataStore.proxy.extraParams.iujk_kualifikasi;}
			if(iujk_dataStore.proxy.extraParams.iujk_bidangusaha!==null){iujk_bidangusahaValue = iujk_dataStore.proxy.extraParams.iujk_bidangusaha;}
			if(iujk_dataStore.proxy.extraParams.iujk_kelurahan!==null){iujk_kelurahanValue = iujk_dataStore.proxy.extraParams.iujk_kelurahan;}
			if(iujk_dataStore.proxy.extraParams.iujk_rt!==null){iujk_rtValue = iujk_dataStore.proxy.extraParams.iujk_rt;}
			if(iujk_dataStore.proxy.extraParams.iujk_rw!==null){iujk_rwValue = iujk_dataStore.proxy.extraParams.iujk_rw;}
			if(iujk_dataStore.proxy.extraParams.iujk_kota!==null){iujk_kotaValue = iujk_dataStore.proxy.extraParams.iujk_kota;}
			if(iujk_dataStore.proxy.extraParams.iujk_propinsi!==null){iujk_propinsiValue = iujk_dataStore.proxy.extraParams.iujk_propinsi;}
			if(iujk_dataStore.proxy.extraParams.iujk_telepon!==null){iujk_teleponValue = iujk_dataStore.proxy.extraParams.iujk_telepon;}
			if(iujk_dataStore.proxy.extraParams.iujk_kodepos!==null){iujk_kodeposValue = iujk_dataStore.proxy.extraParams.iujk_kodepos;}
			if(iujk_dataStore.proxy.extraParams.iujk_fax!==null){iujk_faxValue = iujk_dataStore.proxy.extraParams.iujk_fax;}
			if(iujk_dataStore.proxy.extraParams.iujk_npwp!==null){iujk_npwpValue = iujk_dataStore.proxy.extraParams.iujk_npwp;}
			if(iujk_dataStore.proxy.extraParams.iujk_pjtbu!==null){iujk_pjtbuValue = iujk_dataStore.proxy.extraParams.iujk_pjtbu;}
			if(iujk_dataStore.proxy.extraParams.iujk_pjteknis!==null){iujk_pjteknisValue = iujk_dataStore.proxy.extraParams.iujk_pjteknis;}
			if(iujk_dataStore.proxy.extraParams.iujk_pj1!==null){iujk_pj1Value = iujk_dataStore.proxy.extraParams.iujk_pj1;}
			if(iujk_dataStore.proxy.extraParams.iujk_pj2!==null){iujk_pj2Value = iujk_dataStore.proxy.extraParams.iujk_pj2;}
			if(iujk_dataStore.proxy.extraParams.iujk_pj3!==null){iujk_pj3Value = iujk_dataStore.proxy.extraParams.iujk_pj3;}
			if(iujk_dataStore.proxy.extraParams.iujk_berlaku!==null){iujk_berlakuValue = iujk_dataStore.proxy.extraParams.iujk_berlaku;}
			if(iujk_dataStore.proxy.extraParams.iujk_kadaluarsa!==null){iujk_kadaluarsaValue = iujk_dataStore.proxy.extraParams.iujk_kadaluarsa;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_t_iujk/switchAction',
				params : {
					action : outputType,
					query : searchText,
					iujk_jenis : iujk_jenisValue,
					iujk_tanggal : iujk_tanggalValue,
					iujk_status : iujk_statusValue,
					iujk_noformulir : iujk_noformulirValue,
					iujk_nourutformulir : iujk_nourutformulirValue,
					iujk_lampiran : iujk_lampiranValue,
					iujk_rekom : iujk_rekomValue,
					iujk_rekomurut : iujk_rekomurutValue,
					iujk_rekomtanggal : iujk_rekomtanggalValue,
					iujk_perusahaan : iujk_perusahaanValue,
					iujk_alamat : iujk_alamatValue,
					iujk_direktur : iujk_direkturValue,
					iujk_golongan : iujk_golonganValue,
					iujk_kualifikasi : iujk_kualifikasiValue,
					iujk_bidangusaha : iujk_bidangusahaValue,
					iujk_kelurahan : iujk_kelurahanValue,
					iujk_rt : iujk_rtValue,
					iujk_rw : iujk_rwValue,
					iujk_kota : iujk_kotaValue,
					iujk_propinsi : iujk_propinsiValue,
					iujk_telepon : iujk_teleponValue,
					iujk_kodepos : iujk_kodeposValue,
					iujk_fax : iujk_faxValue,
					iujk_npwp : iujk_npwpValue,
					iujk_pjtbu : iujk_pjtbuValue,
					iujk_pjteknis : iujk_pjteknisValue,
					iujk_pj1 : iujk_pj1Value,
					iujk_pj2 : iujk_pj2Value,
					iujk_pj3 : iujk_pj3Value,
					iujk_berlaku : iujk_berlakuValue,
					iujk_kadaluarsa : iujk_kadaluarsaValue,
					currentAction : iujk_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/t_iujk_list.xls');
							}else{
								window.open('./print/t_iujk_list.html','iujklist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		iujk_dataStore = Ext.create('Ext.data.Store',{
			id : 'iujk_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_iujk/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'iujk_id'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'iujk_id', type : 'int', mapping : 'iujk_id' },
				{ name : 'iujk_jenis', type : 'int', mapping : 'iujk_jenis' },
				{ name : 'iujk_tanggal', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'iujk_tanggal' },
				{ name : 'iujk_status', type : 'string', mapping : 'iujk_status' },
				{ name : 'iujk_noformulir', type : 'string', mapping : 'iujk_noformulir' },
				{ name : 'iujk_nourutformulir', type : 'int', mapping : 'iujk_nourutformulir' },
				{ name : 'iujk_lampiran', type : 'int', mapping : 'iujk_lampiran' },
				{ name : 'iujk_rekom', type : 'string', mapping : 'iujk_rekom' },
				{ name : 'iujk_rekomurut', type : 'int', mapping : 'iujk_rekomurut' },
				{ name : 'iujk_rekomtanggal', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'iujk_rekomtanggal' },
				{ name : 'iujk_perusahaan', type : 'string', mapping : 'iujk_perusahaan' },
				{ name : 'iujk_alamat', type : 'string', mapping : 'iujk_alamat' },
				{ name : 'iujk_direktur', type : 'string', mapping : 'iujk_direktur' },
				{ name : 'iujk_golongan', type : 'string', mapping : 'iujk_golongan' },
				{ name : 'iujk_kualifikasi', type : 'string', mapping : 'iujk_kualifikasi' },
				{ name : 'iujk_bidangusaha', type : 'string', mapping : 'iujk_bidangusaha' },
				{ name : 'iujk_kelurahan', type : 'int', mapping : 'iujk_kelurahan' },
				{ name : 'iujk_rt', type : 'int', mapping : 'iujk_rt' },
				{ name : 'iujk_rw', type : 'int', mapping : 'iujk_rw' },
				{ name : 'iujk_kota', type : 'int', mapping : 'iujk_kota' },
				{ name : 'iujk_propinsi', type : 'int', mapping : 'iujk_propinsi' },
				{ name : 'iujk_telepon', type : 'string', mapping : 'iujk_telepon' },
				{ name : 'iujk_kodepos', type : 'string', mapping : 'iujk_kodepos' },
				{ name : 'iujk_fax', type : 'string', mapping : 'iujk_fax' },
				{ name : 'iujk_npwp', type : 'string', mapping : 'iujk_npwp' },
				{ name : 'iujk_pjtbu', type : 'string', mapping : 'iujk_pjtbu' },
				{ name : 'iujk_pjteknis', type : 'string', mapping : 'iujk_pjteknis' },
				{ name : 'iujk_pj1', type : 'string', mapping : 'iujk_pj1' },
				{ name : 'iujk_pj2', type : 'string', mapping : 'iujk_pj2' },
				{ name : 'iujk_pj3', type : 'string', mapping : 'iujk_pj3' },
				{ name : 'iujk_berlaku', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'iujk_berlaku' },
				{ name : 'iujk_kadaluarsa', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'iujk_kadaluarsa' },
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		iujk_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						iujk_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						iujk_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						iujk_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						iujk_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						iujk_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						iujk_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						iujk_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						iujk_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var iujk_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : iujk_confirmAdd
		});
		var iujk_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : iujk_confirmUpdate
		});
		var iujk_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : iujk_confirmDelete
		});
		var iujk_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : iujk_refresh
		});
		var iujk_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : iujk_showSearchWindow
		});
		var iujk_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				iujk_printExcel('PRINT');
			}
		});
		var iujk_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				iujk_printExcel('EXCEL');
			}
		});
		
		var iujk_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : iujk_confirmUpdate
		});
		var iujk_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : iujk_confirmDelete
		});
		var iujk_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : iujk_refresh
		});
		iujk_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'iujk_contextMenu',
			items: [
				iujk_contextMenuEdit,iujk_contextMenuDelete,'-',iujk_contextMenuRefresh
			]
		});
		
		iujk_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : iujk_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						iujk_dataStore.proxy.extraParams = { action : 'GETLIST'};
						iujk_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		iujk_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'iujk_gridPanel',
			constrain : true,
			store : iujk_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'iujkGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						iujk_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : iujk_shorcut,
			columns : [
				{
					text : 'iujk_jenis',
					dataIndex : 'iujk_jenis',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_tanggal',
					dataIndex : 'iujk_tanggal',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_status',
					dataIndex : 'iujk_status',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_noformulir',
					dataIndex : 'iujk_noformulir',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_nourutformulir',
					dataIndex : 'iujk_nourutformulir',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_lampiran',
					dataIndex : 'iujk_lampiran',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_rekom',
					dataIndex : 'iujk_rekom',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_rekomurut',
					dataIndex : 'iujk_rekomurut',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_rekomtanggal',
					dataIndex : 'iujk_rekomtanggal',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_perusahaan',
					dataIndex : 'iujk_perusahaan',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_alamat',
					dataIndex : 'iujk_alamat',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_direktur',
					dataIndex : 'iujk_direktur',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_golongan',
					dataIndex : 'iujk_golongan',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_kualifikasi',
					dataIndex : 'iujk_kualifikasi',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_bidangusaha',
					dataIndex : 'iujk_bidangusaha',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_kelurahan',
					dataIndex : 'iujk_kelurahan',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_rt',
					dataIndex : 'iujk_rt',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_rw',
					dataIndex : 'iujk_rw',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_kota',
					dataIndex : 'iujk_kota',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_propinsi',
					dataIndex : 'iujk_propinsi',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_telepon',
					dataIndex : 'iujk_telepon',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_kodepos',
					dataIndex : 'iujk_kodepos',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_fax',
					dataIndex : 'iujk_fax',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_npwp',
					dataIndex : 'iujk_npwp',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_pjtbu',
					dataIndex : 'iujk_pjtbu',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_pjteknis',
					dataIndex : 'iujk_pjteknis',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_pj1',
					dataIndex : 'iujk_pj1',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_pj2',
					dataIndex : 'iujk_pj2',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_pj3',
					dataIndex : 'iujk_pj3',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_berlaku',
					dataIndex : 'iujk_berlaku',
					width : 100,
					sortable : false
				},
				{
					text : 'iujk_kadaluarsa',
					dataIndex : 'iujk_kadaluarsa',
					width : 100,
					sortable : false
				},
							
			],
			tbar : [
				iujk_addButton,
				iujk_editButton,
				iujk_deleteButton,
				iujk_gridSearchField,
				iujk_searchButton,
				iujk_refreshButton,
				iujk_printButton,
				iujk_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : iujk_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					iujk_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		iujk_idField = Ext.create('Ext.form.NumberField',{
			id : 'iujk_idField',
			name : 'iujk_id',
			fieldLabel : 'iujk_id<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		iujk_jenisField = Ext.create('Ext.form.NumberField',{
			id : 'iujk_jenisField',
			name : 'iujk_jenis',
			fieldLabel : 'iujk_jenis<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		iujk_tanggalField = Ext.create('Ext.form.TextField',{
			id : 'iujk_tanggalField',
			name : 'iujk_tanggal',
			fieldLabel : 'iujk_tanggal<font color=red>*</font>',
			allowBlank : false,
			maxLength : 0
		});
		iujk_statusField = Ext.create('Ext.form.TextField',{
			id : 'iujk_statusField',
			name : 'iujk_status',
			fieldLabel : 'iujk_status',
			maxLength : 50
		});
		iujk_noformulirField = Ext.create('Ext.form.TextField',{
			id : 'iujk_noformulirField',
			name : 'iujk_noformulir',
			fieldLabel : 'iujk_noformulir',
			maxLength : 50
		});
		iujk_nourutformulirField = Ext.create('Ext.form.NumberField',{
			id : 'iujk_nourutformulirField',
			name : 'iujk_nourutformulir',
			fieldLabel : 'iujk_nourutformulir',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		iujk_lampiranField = Ext.create('Ext.form.NumberField',{
			id : 'iujk_lampiranField',
			name : 'iujk_lampiran',
			fieldLabel : 'iujk_lampiran',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		iujk_rekomField = Ext.create('Ext.form.TextField',{
			id : 'iujk_rekomField',
			name : 'iujk_rekom',
			fieldLabel : 'iujk_rekom',
			maxLength : 50
		});
		iujk_rekomurutField = Ext.create('Ext.form.NumberField',{
			id : 'iujk_rekomurutField',
			name : 'iujk_rekomurut',
			fieldLabel : 'iujk_rekomurut',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		iujk_rekomtanggalField = Ext.create('Ext.form.TextField',{
			id : 'iujk_rekomtanggalField',
			name : 'iujk_rekomtanggal',
			fieldLabel : 'iujk_rekomtanggal',
			maxLength : 0
		});
		iujk_perusahaanField = Ext.create('Ext.form.TextField',{
			id : 'iujk_perusahaanField',
			name : 'iujk_perusahaan',
			fieldLabel : 'iujk_perusahaan',
			maxLength : 50
		});
		iujk_alamatField = Ext.create('Ext.form.TextField',{
			id : 'iujk_alamatField',
			name : 'iujk_alamat',
			fieldLabel : 'iujk_alamat',
			maxLength : 100
		});
		iujk_direkturField = Ext.create('Ext.form.TextField',{
			id : 'iujk_direkturField',
			name : 'iujk_direktur',
			fieldLabel : 'iujk_direktur',
			maxLength : 50
		});
		iujk_golonganField = Ext.create('Ext.form.TextField',{
			id : 'iujk_golonganField',
			name : 'iujk_golongan',
			fieldLabel : 'iujk_golongan',
			maxLength : 50
		});
		iujk_kualifikasiField = Ext.create('Ext.form.TextField',{
			id : 'iujk_kualifikasiField',
			name : 'iujk_kualifikasi',
			fieldLabel : 'iujk_kualifikasi',
			maxLength : 50
		});
		iujk_bidangusahaField = Ext.create('Ext.form.TextField',{
			id : 'iujk_bidangusahaField',
			name : 'iujk_bidangusaha',
			fieldLabel : 'iujk_bidangusaha',
			maxLength : 50
		});
		iujk_kelurahanField = Ext.create('Ext.form.NumberField',{
			id : 'iujk_kelurahanField',
			name : 'iujk_kelurahan',
			fieldLabel : 'iujk_kelurahan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		iujk_rtField = Ext.create('Ext.form.NumberField',{
			id : 'iujk_rtField',
			name : 'iujk_rt',
			fieldLabel : 'iujk_rt',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		iujk_rwField = Ext.create('Ext.form.NumberField',{
			id : 'iujk_rwField',
			name : 'iujk_rw',
			fieldLabel : 'iujk_rw',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		iujk_kotaField = Ext.create('Ext.form.NumberField',{
			id : 'iujk_kotaField',
			name : 'iujk_kota',
			fieldLabel : 'iujk_kota',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		iujk_propinsiField = Ext.create('Ext.form.NumberField',{
			id : 'iujk_propinsiField',
			name : 'iujk_propinsi',
			fieldLabel : 'iujk_propinsi',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		iujk_teleponField = Ext.create('Ext.form.TextField',{
			id : 'iujk_teleponField',
			name : 'iujk_telepon',
			fieldLabel : 'iujk_telepon',
			maxLength : 20
		});
		iujk_kodeposField = Ext.create('Ext.form.TextField',{
			id : 'iujk_kodeposField',
			name : 'iujk_kodepos',
			fieldLabel : 'iujk_kodepos',
			maxLength : 7
		});
		iujk_faxField = Ext.create('Ext.form.TextField',{
			id : 'iujk_faxField',
			name : 'iujk_fax',
			fieldLabel : 'iujk_fax',
			maxLength : 20
		});
		iujk_npwpField = Ext.create('Ext.form.TextField',{
			id : 'iujk_npwpField',
			name : 'iujk_npwp',
			fieldLabel : 'iujk_npwp',
			maxLength : 50
		});
		iujk_pjtbuField = Ext.create('Ext.form.TextField',{
			id : 'iujk_pjtbuField',
			name : 'iujk_pjtbu',
			fieldLabel : 'iujk_pjtbu',
			maxLength : 50
		});
		iujk_pjteknisField = Ext.create('Ext.form.TextField',{
			id : 'iujk_pjteknisField',
			name : 'iujk_pjteknis',
			fieldLabel : 'iujk_pjteknis',
			maxLength : 50
		});
		iujk_pj1Field = Ext.create('Ext.form.TextField',{
			id : 'iujk_pj1Field',
			name : 'iujk_pj1',
			fieldLabel : 'iujk_pj1',
			maxLength : 50
		});
		iujk_pj2Field = Ext.create('Ext.form.TextField',{
			id : 'iujk_pj2Field',
			name : 'iujk_pj2',
			fieldLabel : 'iujk_pj2',
			maxLength : 50
		});
		iujk_pj3Field = Ext.create('Ext.form.TextField',{
			id : 'iujk_pj3Field',
			name : 'iujk_pj3',
			fieldLabel : 'iujk_pj3',
			maxLength : 50
		});
		iujk_berlakuField = Ext.create('Ext.form.TextField',{
			id : 'iujk_berlakuField',
			name : 'iujk_berlaku',
			fieldLabel : 'iujk_berlaku',
			maxLength : 0
		});
		iujk_kadaluarsaField = Ext.create('Ext.form.TextField',{
			id : 'iujk_kadaluarsaField',
			name : 'iujk_kadaluarsa',
			fieldLabel : 'iujk_kadaluarsa',
			maxLength : 0
		});
		var iujk_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : iujk_save
		});
		var iujk_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				iujk_resetForm();
				iujk_switchToGrid();
			}
		});
		iujk_formPanel = Ext.create('Ext.form.Panel', {
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
						iujk_idField,
						iujk_jenisField,
						iujk_tanggalField,
						iujk_statusField,
						iujk_noformulirField,
						iujk_nourutformulirField,
						iujk_lampiranField,
						iujk_rekomField,
						iujk_rekomurutField,
						iujk_rekomtanggalField,
						iujk_perusahaanField,
						iujk_alamatField,
						iujk_direkturField,
						iujk_golonganField,
						iujk_kualifikasiField,
						iujk_bidangusahaField,
						iujk_kelurahanField,
						iujk_rtField,
						iujk_rwField,
						iujk_kotaField,
						iujk_propinsiField,
						iujk_teleponField,
						iujk_kodeposField,
						iujk_faxField,
						iujk_npwpField,
						iujk_pjtbuField,
						iujk_pjteknisField,
						iujk_pj1Field,
						iujk_pj2Field,
						iujk_pj3Field,
						iujk_berlakuField,
						iujk_kadaluarsaField,
											]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [iujk_saveButton,iujk_cancelButton]
		});
		iujk_formWindow = Ext.create('Ext.window.Window',{
			id : 'iujk_formWindow',
			renderTo : 'iujkSaveWindow',
			title : globalFormAddEditTitle + ' ' + iujk_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [iujk_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		iujk_jenisSearchField = Ext.create('Ext.form.NumberField',{
			id : 'iujk_jenisSearchField',
			name : 'iujk_jenis',
			fieldLabel : 'iujk_jenis',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		iujk_tanggalSearchField = Ext.create('Ext.form.TextField',{
			id : 'iujk_tanggalSearchField',
			name : 'iujk_tanggal',
			fieldLabel : 'iujk_tanggal',
			maxLength : 0
		
		});
		iujk_statusSearchField = Ext.create('Ext.form.TextField',{
			id : 'iujk_statusSearchField',
			name : 'iujk_status',
			fieldLabel : 'iujk_status',
			maxLength : 50
		
		});
		iujk_noformulirSearchField = Ext.create('Ext.form.TextField',{
			id : 'iujk_noformulirSearchField',
			name : 'iujk_noformulir',
			fieldLabel : 'iujk_noformulir',
			maxLength : 50
		
		});
		iujk_nourutformulirSearchField = Ext.create('Ext.form.NumberField',{
			id : 'iujk_nourutformulirSearchField',
			name : 'iujk_nourutformulir',
			fieldLabel : 'iujk_nourutformulir',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		iujk_lampiranSearchField = Ext.create('Ext.form.NumberField',{
			id : 'iujk_lampiranSearchField',
			name : 'iujk_lampiran',
			fieldLabel : 'iujk_lampiran',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		iujk_rekomSearchField = Ext.create('Ext.form.TextField',{
			id : 'iujk_rekomSearchField',
			name : 'iujk_rekom',
			fieldLabel : 'iujk_rekom',
			maxLength : 50
		
		});
		iujk_rekomurutSearchField = Ext.create('Ext.form.NumberField',{
			id : 'iujk_rekomurutSearchField',
			name : 'iujk_rekomurut',
			fieldLabel : 'iujk_rekomurut',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		iujk_rekomtanggalSearchField = Ext.create('Ext.form.TextField',{
			id : 'iujk_rekomtanggalSearchField',
			name : 'iujk_rekomtanggal',
			fieldLabel : 'iujk_rekomtanggal',
			maxLength : 0
		
		});
		iujk_perusahaanSearchField = Ext.create('Ext.form.TextField',{
			id : 'iujk_perusahaanSearchField',
			name : 'iujk_perusahaan',
			fieldLabel : 'iujk_perusahaan',
			maxLength : 50
		
		});
		iujk_alamatSearchField = Ext.create('Ext.form.TextField',{
			id : 'iujk_alamatSearchField',
			name : 'iujk_alamat',
			fieldLabel : 'iujk_alamat',
			maxLength : 100
		
		});
		iujk_direkturSearchField = Ext.create('Ext.form.TextField',{
			id : 'iujk_direkturSearchField',
			name : 'iujk_direktur',
			fieldLabel : 'iujk_direktur',
			maxLength : 50
		
		});
		iujk_golonganSearchField = Ext.create('Ext.form.TextField',{
			id : 'iujk_golonganSearchField',
			name : 'iujk_golongan',
			fieldLabel : 'iujk_golongan',
			maxLength : 50
		
		});
		iujk_kualifikasiSearchField = Ext.create('Ext.form.TextField',{
			id : 'iujk_kualifikasiSearchField',
			name : 'iujk_kualifikasi',
			fieldLabel : 'iujk_kualifikasi',
			maxLength : 50
		
		});
		iujk_bidangusahaSearchField = Ext.create('Ext.form.TextField',{
			id : 'iujk_bidangusahaSearchField',
			name : 'iujk_bidangusaha',
			fieldLabel : 'iujk_bidangusaha',
			maxLength : 50
		
		});
		iujk_kelurahanSearchField = Ext.create('Ext.form.NumberField',{
			id : 'iujk_kelurahanSearchField',
			name : 'iujk_kelurahan',
			fieldLabel : 'iujk_kelurahan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		iujk_rtSearchField = Ext.create('Ext.form.NumberField',{
			id : 'iujk_rtSearchField',
			name : 'iujk_rt',
			fieldLabel : 'iujk_rt',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		iujk_rwSearchField = Ext.create('Ext.form.NumberField',{
			id : 'iujk_rwSearchField',
			name : 'iujk_rw',
			fieldLabel : 'iujk_rw',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		iujk_kotaSearchField = Ext.create('Ext.form.NumberField',{
			id : 'iujk_kotaSearchField',
			name : 'iujk_kota',
			fieldLabel : 'iujk_kota',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		iujk_propinsiSearchField = Ext.create('Ext.form.NumberField',{
			id : 'iujk_propinsiSearchField',
			name : 'iujk_propinsi',
			fieldLabel : 'iujk_propinsi',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		iujk_teleponSearchField = Ext.create('Ext.form.TextField',{
			id : 'iujk_teleponSearchField',
			name : 'iujk_telepon',
			fieldLabel : 'iujk_telepon',
			maxLength : 20
		
		});
		iujk_kodeposSearchField = Ext.create('Ext.form.TextField',{
			id : 'iujk_kodeposSearchField',
			name : 'iujk_kodepos',
			fieldLabel : 'iujk_kodepos',
			maxLength : 7
		
		});
		iujk_faxSearchField = Ext.create('Ext.form.TextField',{
			id : 'iujk_faxSearchField',
			name : 'iujk_fax',
			fieldLabel : 'iujk_fax',
			maxLength : 20
		
		});
		iujk_npwpSearchField = Ext.create('Ext.form.TextField',{
			id : 'iujk_npwpSearchField',
			name : 'iujk_npwp',
			fieldLabel : 'iujk_npwp',
			maxLength : 50
		
		});
		iujk_pjtbuSearchField = Ext.create('Ext.form.TextField',{
			id : 'iujk_pjtbuSearchField',
			name : 'iujk_pjtbu',
			fieldLabel : 'iujk_pjtbu',
			maxLength : 50
		
		});
		iujk_pjteknisSearchField = Ext.create('Ext.form.TextField',{
			id : 'iujk_pjteknisSearchField',
			name : 'iujk_pjteknis',
			fieldLabel : 'iujk_pjteknis',
			maxLength : 50
		
		});
		iujk_pj1SearchField = Ext.create('Ext.form.TextField',{
			id : 'iujk_pj1SearchField',
			name : 'iujk_pj1',
			fieldLabel : 'iujk_pj1',
			maxLength : 50
		
		});
		iujk_pj2SearchField = Ext.create('Ext.form.TextField',{
			id : 'iujk_pj2SearchField',
			name : 'iujk_pj2',
			fieldLabel : 'iujk_pj2',
			maxLength : 50
		
		});
		iujk_pj3SearchField = Ext.create('Ext.form.TextField',{
			id : 'iujk_pj3SearchField',
			name : 'iujk_pj3',
			fieldLabel : 'iujk_pj3',
			maxLength : 50
		
		});
		iujk_berlakuSearchField = Ext.create('Ext.form.TextField',{
			id : 'iujk_berlakuSearchField',
			name : 'iujk_berlaku',
			fieldLabel : 'iujk_berlaku',
			maxLength : 0
		
		});
		iujk_kadaluarsaSearchField = Ext.create('Ext.form.TextField',{
			id : 'iujk_kadaluarsaSearchField',
			name : 'iujk_kadaluarsa',
			fieldLabel : 'iujk_kadaluarsa',
			maxLength : 0
		
		});
		var iujk_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : iujk_search
		});
		var iujk_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				iujk_searchWindow.hide();
			}
		});
		iujk_searchPanel = Ext.create('Ext.form.Panel', {
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
						iujk_jenisSearchField,
						iujk_tanggalSearchField,
						iujk_statusSearchField,
						iujk_noformulirSearchField,
						iujk_nourutformulirSearchField,
						iujk_lampiranSearchField,
						iujk_rekomSearchField,
						iujk_rekomurutSearchField,
						iujk_rekomtanggalSearchField,
						iujk_perusahaanSearchField,
						iujk_alamatSearchField,
						iujk_direkturSearchField,
						iujk_golonganSearchField,
						iujk_kualifikasiSearchField,
						iujk_bidangusahaSearchField,
						iujk_kelurahanSearchField,
						iujk_rtSearchField,
						iujk_rwSearchField,
						iujk_kotaSearchField,
						iujk_propinsiSearchField,
						iujk_teleponSearchField,
						iujk_kodeposSearchField,
						iujk_faxSearchField,
						iujk_npwpSearchField,
						iujk_pjtbuSearchField,
						iujk_pjteknisSearchField,
						iujk_pj1SearchField,
						iujk_pj2SearchField,
						iujk_pj3SearchField,
						iujk_berlakuSearchField,
						iujk_kadaluarsaSearchField,
						]
				}],
			buttons : [iujk_searchingButton,iujk_cancelSearchButton]
		});
		iujk_searchWindow = Ext.create('Ext.window.Window',{
			id : 'iujk_searchWindow',
			renderTo : 'iujkSearchWindow',
			title : globalFormSearchTitle + ' ' + iujk_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [iujk_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="iujkSaveWindow"></div>
<div id="iujkSearchWindow"></div>
<div class="span12" id="iujkGrid"></div>