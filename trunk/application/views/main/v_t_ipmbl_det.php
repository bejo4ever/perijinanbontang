<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var ipmbl_det_componentItemTitle="Izin Pengambilan Mineral Bukan Logam dan Batuan";
		var ipmbl_det_dataStore;
		
		var ipmbl_det_shorcut;
		var ipmbl_det_contextMenu;
		var ipmbl_det_gridSearchField;
		var ipmbl_det_gridPanel;
		var ipmbl_det_formPanel;
		var ipmbl_det_formWindow;
		var ipmbl_det_searchPanel;
		var ipmbl_det_searchWindow;
		
		var det_ipmbl_idField;
		var det_ipmbl_ipmbl_idField;
		var det_ipmbl_jenisField;
		var det_ipmbl_tanggalField;
		var det_ipmbl_namaField;
		var det_ipmbl_alamatField;
		var det_ipmbl_kelurahanField;
		var det_ipmbl_kecamatanField;
		var det_ipmbl_kotaField;
		var det_ipmbl_telpField;
		var det_ipmbl_nomoragendaField;
		var det_ipmbl_berkasmasukField;
		var det_ipmbl_surveytanggalField;
		var det_ipmbl_surveylulusField;
		var det_ipmbl_statusField;
		var det_ipmbl_surveypetugasField;
		var det_ipmbl_surveydinasField;
		var det_ipmbl_surveynipField;
		var det_ipmbl_surveypendapatField;
		var det_ipmbl_rekomblField;
		var det_ipmbl_rekomblhtanggalField;
		var det_ipmbl_rekomkelField;
		var det_ipmbl_rekomkeltanggalField;
		var det_ipmbl_rekomkecField;
		var det_ipmbl_rekomkectanggalField;
		var det_ipmbl_skField;
		var det_ipmbl_kadaluarsaField;
		var det_ipmbl_berlakuField;
				
		var det_ipmbl_ipmbl_idSearchField;
		var det_ipmbl_jenisSearchField;
		var det_ipmbl_tanggalSearchField;
		var det_ipmbl_namaSearchField;
		var det_ipmbl_alamatSearchField;
		var det_ipmbl_kelurahanSearchField;
		var det_ipmbl_kecamatanSearchField;
		var det_ipmbl_kotaSearchField;
		var det_ipmbl_telpSearchField;
		var det_ipmbl_nomoragendaSearchField;
		var det_ipmbl_berkasmasukSearchField;
		var det_ipmbl_surveytanggalSearchField;
		var det_ipmbl_surveylulusSearchField;
		var det_ipmbl_statusSearchField;
		var det_ipmbl_surveypetugasSearchField;
		var det_ipmbl_surveydinasSearchField;
		var det_ipmbl_surveynipSearchField;
		var det_ipmbl_surveypendapatSearchField;
		var det_ipmbl_rekomblSearchField;
		var det_ipmbl_rekomblhtanggalSearchField;
		var det_ipmbl_rekomkelSearchField;
		var det_ipmbl_rekomkeltanggalSearchField;
		var det_ipmbl_rekomkecSearchField;
		var det_ipmbl_rekomkectanggalSearchField;
		var det_ipmbl_skSearchField;
		var det_ipmbl_kadaluarsaSearchField;
		var det_ipmbl_berlakuSearchField;
				
		var ipmbl_det_dbTask = 'CREATE';
		var ipmbl_det_dbTaskMessage = 'Tambah';
		var ipmbl_det_dbPermission = 'CRUD';
		var ipmbl_det_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function ipmbl_det_switchToGrid(){
			ipmbl_det_formPanel.setDisabled(true);
			ipmbl_det_gridPanel.setDisabled(false);
			ipmbl_det_formWindow.hide();
		}
		
		function ipmbl_det_switchToForm(){
			ipmbl_det_gridPanel.setDisabled(true);
			ipmbl_det_formPanel.setDisabled(false);
			ipmbl_det_formWindow.show();
		}
		
		function ipmbl_det_confirmAdd(){
			ipmbl_det_dbTask = 'CREATE';
			ipmbl_det_dbTaskMessage = 'created';
			ipmbl_det_resetForm();
			ipmbl_det_switchToForm();
		}
		
		function ipmbl_det_confirmUpdate(){
			if(ipmbl_det_gridPanel.selModel.getCount() == 1) {
				ipmbl_det_dbTask = 'UPDATE';
				ipmbl_det_dbTaskMessage = 'updated';
				ipmbl_det_switchToForm();
				ipmbl_det_setForm();
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
		
		function ipmbl_det_confirmDelete(){
			if(ipmbl_det_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, ipmbl_det_delete);
			}else if(ipmbl_det_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, ipmbl_det_delete);
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
		
		function ipmbl_det_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(ipmbl_det_dbPermission)==false && pattC.test(ipmbl_det_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(ipmbl_det_confirmFormValid()){
					var det_ipmbl_idValue = '';
					var det_ipmbl_ipmbl_idValue = '';
					var det_ipmbl_jenisValue = '';
					var det_ipmbl_tanggalValue = '';
					var det_ipmbl_namaValue = '';
					var det_ipmbl_alamatValue = '';
					var det_ipmbl_kelurahanValue = '';
					var det_ipmbl_kecamatanValue = '';
					var det_ipmbl_kotaValue = '';
					var det_ipmbl_telpValue = '';
					var det_ipmbl_nomoragendaValue = '';
					var det_ipmbl_berkasmasukValue = '';
					var det_ipmbl_surveytanggalValue = '';
					var det_ipmbl_surveylulusValue = '';
					var det_ipmbl_statusValue = '';
					var det_ipmbl_surveypetugasValue = '';
					var det_ipmbl_surveydinasValue = '';
					var det_ipmbl_surveynipValue = '';
					var det_ipmbl_surveypendapatValue = '';
					var det_ipmbl_rekomblValue = '';
					var det_ipmbl_rekomblhtanggalValue = '';
					var det_ipmbl_rekomkelValue = '';
					var det_ipmbl_rekomkeltanggalValue = '';
					var det_ipmbl_rekomkecValue = '';
					var det_ipmbl_rekomkectanggalValue = '';
					var det_ipmbl_skValue = '';
					var det_ipmbl_kadaluarsaValue = '';
					var det_ipmbl_berlakuValue = '';
										
					det_ipmbl_idValue = det_ipmbl_idField.getValue();
					det_ipmbl_ipmbl_idValue = det_ipmbl_ipmbl_idField.getValue();
					det_ipmbl_jenisValue = det_ipmbl_jenisField.getValue();
					det_ipmbl_tanggalValue = det_ipmbl_tanggalField.getValue();
					det_ipmbl_namaValue = det_ipmbl_namaField.getValue();
					det_ipmbl_alamatValue = det_ipmbl_alamatField.getValue();
					det_ipmbl_kelurahanValue = det_ipmbl_kelurahanField.getValue();
					det_ipmbl_kecamatanValue = det_ipmbl_kecamatanField.getValue();
					det_ipmbl_kotaValue = det_ipmbl_kotaField.getValue();
					det_ipmbl_telpValue = det_ipmbl_telpField.getValue();
					det_ipmbl_nomoragendaValue = det_ipmbl_nomoragendaField.getValue();
					det_ipmbl_berkasmasukValue = det_ipmbl_berkasmasukField.getValue();
					det_ipmbl_surveytanggalValue = det_ipmbl_surveytanggalField.getValue();
					det_ipmbl_surveylulusValue = det_ipmbl_surveylulusField.getValue();
					det_ipmbl_statusValue = det_ipmbl_statusField.getValue();
					det_ipmbl_surveypetugasValue = det_ipmbl_surveypetugasField.getValue();
					det_ipmbl_surveydinasValue = det_ipmbl_surveydinasField.getValue();
					det_ipmbl_surveynipValue = det_ipmbl_surveynipField.getValue();
					det_ipmbl_surveypendapatValue = det_ipmbl_surveypendapatField.getValue();
					det_ipmbl_rekomblValue = det_ipmbl_rekomblField.getValue();
					det_ipmbl_rekomblhtanggalValue = det_ipmbl_rekomblhtanggalField.getValue();
					det_ipmbl_rekomkelValue = det_ipmbl_rekomkelField.getValue();
					det_ipmbl_rekomkeltanggalValue = det_ipmbl_rekomkeltanggalField.getValue();
					det_ipmbl_rekomkecValue = det_ipmbl_rekomkecField.getValue();
					det_ipmbl_rekomkectanggalValue = det_ipmbl_rekomkectanggalField.getValue();
					det_ipmbl_skValue = det_ipmbl_skField.getValue();
					det_ipmbl_kadaluarsaValue = det_ipmbl_kadaluarsaField.getValue();
					det_ipmbl_berlakuValue = det_ipmbl_berlakuField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_t_ipmbl_det/switchAction',
						params: {							
							det_ipmbl_id : det_ipmbl_idValue,
							det_ipmbl_ipmbl_id : det_ipmbl_ipmbl_idValue,
							det_ipmbl_jenis : det_ipmbl_jenisValue,
							det_ipmbl_tanggal : det_ipmbl_tanggalValue,
							det_ipmbl_nama : det_ipmbl_namaValue,
							det_ipmbl_alamat : det_ipmbl_alamatValue,
							det_ipmbl_kelurahan : det_ipmbl_kelurahanValue,
							det_ipmbl_kecamatan : det_ipmbl_kecamatanValue,
							det_ipmbl_kota : det_ipmbl_kotaValue,
							det_ipmbl_telp : det_ipmbl_telpValue,
							det_ipmbl_nomoragenda : det_ipmbl_nomoragendaValue,
							det_ipmbl_berkasmasuk : det_ipmbl_berkasmasukValue,
							det_ipmbl_surveytanggal : det_ipmbl_surveytanggalValue,
							det_ipmbl_surveylulus : det_ipmbl_surveylulusValue,
							det_ipmbl_status : det_ipmbl_statusValue,
							det_ipmbl_surveypetugas : det_ipmbl_surveypetugasValue,
							det_ipmbl_surveydinas : det_ipmbl_surveydinasValue,
							det_ipmbl_surveynip : det_ipmbl_surveynipValue,
							det_ipmbl_surveypendapat : det_ipmbl_surveypendapatValue,
							det_ipmbl_rekombl : det_ipmbl_rekomblValue,
							det_ipmbl_rekomblhtanggal : det_ipmbl_rekomblhtanggalValue,
							det_ipmbl_rekomkel : det_ipmbl_rekomkelValue,
							det_ipmbl_rekomkeltanggal : det_ipmbl_rekomkeltanggalValue,
							det_ipmbl_rekomkec : det_ipmbl_rekomkecValue,
							det_ipmbl_rekomkectanggal : det_ipmbl_rekomkectanggalValue,
							det_ipmbl_sk : det_ipmbl_skValue,
							det_ipmbl_kadaluarsa : det_ipmbl_kadaluarsaValue,
							det_ipmbl_berlaku : det_ipmbl_berlakuValue,
							action : ipmbl_det_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									ipmbl_det_dataStore.reload();
									ipmbl_det_resetForm();
									ipmbl_det_switchToGrid();
									ipmbl_det_gridPanel.getSelectionModel().deselectAll();
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
		
		function ipmbl_det_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(ipmbl_det_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = ipmbl_det_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< ipmbl_det_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.det_ipmbl_id);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_t_ipmbl_det/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									ipmbl_det_dataStore.reload();
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
		
		function ipmbl_det_refresh(){
			ipmbl_det_dbListAction = "GETLIST";
			ipmbl_det_gridSearchField.reset();
			ipmbl_det_searchPanel.getForm().reset();
			ipmbl_det_dataStore.proxy.extraParams = { action : 'GETLIST' };
			ipmbl_det_dataStore.proxy.extraParams.query = "";
			ipmbl_det_dataStore.currentPage = 1;
			ipmbl_det_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function ipmbl_det_confirmFormValid(){
			return ipmbl_det_formPanel.getForm().isValid();
		}
		
		function ipmbl_det_resetForm(){
			ipmbl_det_dbTask = 'CREATE';
			ipmbl_det_dbTaskMessage = 'create';
			ipmbl_det_formPanel.getForm().reset();
			det_ipmbl_idField.setValue(0);
		}
		
		function ipmbl_det_setForm(){
			ipmbl_det_dbTask = 'UPDATE';
            ipmbl_det_dbTaskMessage = 'update';
			
			var record = ipmbl_det_gridPanel.getSelectionModel().getSelection()[0];
			det_ipmbl_idField.setValue(record.data.det_ipmbl_id);
			det_ipmbl_ipmbl_idField.setValue(record.data.det_ipmbl_ipmbl_id);
			det_ipmbl_jenisField.setValue(record.data.det_ipmbl_jenis);
			det_ipmbl_tanggalField.setValue(record.data.det_ipmbl_tanggal);
			det_ipmbl_namaField.setValue(record.data.det_ipmbl_nama);
			det_ipmbl_alamatField.setValue(record.data.det_ipmbl_alamat);
			det_ipmbl_kelurahanField.setValue(record.data.det_ipmbl_kelurahan);
			det_ipmbl_kecamatanField.setValue(record.data.det_ipmbl_kecamatan);
			det_ipmbl_kotaField.setValue(record.data.det_ipmbl_kota);
			det_ipmbl_telpField.setValue(record.data.det_ipmbl_telp);
			det_ipmbl_nomoragendaField.setValue(record.data.det_ipmbl_nomoragenda);
			det_ipmbl_berkasmasukField.setValue(record.data.det_ipmbl_berkasmasuk);
			det_ipmbl_surveytanggalField.setValue(record.data.det_ipmbl_surveytanggal);
			det_ipmbl_surveylulusField.setValue(record.data.det_ipmbl_surveylulus);
			det_ipmbl_statusField.setValue(record.data.det_ipmbl_status);
			det_ipmbl_surveypetugasField.setValue(record.data.det_ipmbl_surveypetugas);
			det_ipmbl_surveydinasField.setValue(record.data.det_ipmbl_surveydinas);
			det_ipmbl_surveynipField.setValue(record.data.det_ipmbl_surveynip);
			det_ipmbl_surveypendapatField.setValue(record.data.det_ipmbl_surveypendapat);
			det_ipmbl_rekomblField.setValue(record.data.det_ipmbl_rekombl);
			det_ipmbl_rekomblhtanggalField.setValue(record.data.det_ipmbl_rekomblhtanggal);
			det_ipmbl_rekomkelField.setValue(record.data.det_ipmbl_rekomkel);
			det_ipmbl_rekomkeltanggalField.setValue(record.data.det_ipmbl_rekomkeltanggal);
			det_ipmbl_rekomkecField.setValue(record.data.det_ipmbl_rekomkec);
			det_ipmbl_rekomkectanggalField.setValue(record.data.det_ipmbl_rekomkectanggal);
			det_ipmbl_skField.setValue(record.data.det_ipmbl_sk);
			det_ipmbl_kadaluarsaField.setValue(record.data.det_ipmbl_kadaluarsa);
			det_ipmbl_berlakuField.setValue(record.data.det_ipmbl_berlaku);
					}
		
		function ipmbl_det_showSearchWindow(){
			ipmbl_det_searchWindow.show();
		}
		
		function ipmbl_det_search(){
			ipmbl_det_gridSearchField.reset();
			
			var det_ipmbl_ipmbl_idValue = '';
			var det_ipmbl_jenisValue = '';
			var det_ipmbl_tanggalValue = '';
			var det_ipmbl_namaValue = '';
			var det_ipmbl_alamatValue = '';
			var det_ipmbl_kelurahanValue = '';
			var det_ipmbl_kecamatanValue = '';
			var det_ipmbl_kotaValue = '';
			var det_ipmbl_telpValue = '';
			var det_ipmbl_nomoragendaValue = '';
			var det_ipmbl_berkasmasukValue = '';
			var det_ipmbl_surveytanggalValue = '';
			var det_ipmbl_surveylulusValue = '';
			var det_ipmbl_statusValue = '';
			var det_ipmbl_surveypetugasValue = '';
			var det_ipmbl_surveydinasValue = '';
			var det_ipmbl_surveynipValue = '';
			var det_ipmbl_surveypendapatValue = '';
			var det_ipmbl_rekomblValue = '';
			var det_ipmbl_rekomblhtanggalValue = '';
			var det_ipmbl_rekomkelValue = '';
			var det_ipmbl_rekomkeltanggalValue = '';
			var det_ipmbl_rekomkecValue = '';
			var det_ipmbl_rekomkectanggalValue = '';
			var det_ipmbl_skValue = '';
			var det_ipmbl_kadaluarsaValue = '';
			var det_ipmbl_berlakuValue = '';
						
			det_ipmbl_ipmbl_idValue = det_ipmbl_ipmbl_idSearchField.getValue();
			det_ipmbl_jenisValue = det_ipmbl_jenisSearchField.getValue();
			det_ipmbl_tanggalValue = det_ipmbl_tanggalSearchField.getValue();
			det_ipmbl_namaValue = det_ipmbl_namaSearchField.getValue();
			det_ipmbl_alamatValue = det_ipmbl_alamatSearchField.getValue();
			det_ipmbl_kelurahanValue = det_ipmbl_kelurahanSearchField.getValue();
			det_ipmbl_kecamatanValue = det_ipmbl_kecamatanSearchField.getValue();
			det_ipmbl_kotaValue = det_ipmbl_kotaSearchField.getValue();
			det_ipmbl_telpValue = det_ipmbl_telpSearchField.getValue();
			det_ipmbl_nomoragendaValue = det_ipmbl_nomoragendaSearchField.getValue();
			det_ipmbl_berkasmasukValue = det_ipmbl_berkasmasukSearchField.getValue();
			det_ipmbl_surveytanggalValue = det_ipmbl_surveytanggalSearchField.getValue();
			det_ipmbl_surveylulusValue = det_ipmbl_surveylulusSearchField.getValue();
			det_ipmbl_statusValue = det_ipmbl_statusSearchField.getValue();
			det_ipmbl_surveypetugasValue = det_ipmbl_surveypetugasSearchField.getValue();
			det_ipmbl_surveydinasValue = det_ipmbl_surveydinasSearchField.getValue();
			det_ipmbl_surveynipValue = det_ipmbl_surveynipSearchField.getValue();
			det_ipmbl_surveypendapatValue = det_ipmbl_surveypendapatSearchField.getValue();
			det_ipmbl_rekomblValue = det_ipmbl_rekomblSearchField.getValue();
			det_ipmbl_rekomblhtanggalValue = det_ipmbl_rekomblhtanggalSearchField.getValue();
			det_ipmbl_rekomkelValue = det_ipmbl_rekomkelSearchField.getValue();
			det_ipmbl_rekomkeltanggalValue = det_ipmbl_rekomkeltanggalSearchField.getValue();
			det_ipmbl_rekomkecValue = det_ipmbl_rekomkecSearchField.getValue();
			det_ipmbl_rekomkectanggalValue = det_ipmbl_rekomkectanggalSearchField.getValue();
			det_ipmbl_skValue = det_ipmbl_skSearchField.getValue();
			det_ipmbl_kadaluarsaValue = det_ipmbl_kadaluarsaSearchField.getValue();
			det_ipmbl_berlakuValue = det_ipmbl_berlakuSearchField.getValue();
			ipmbl_det_dbListAction = "SEARCH";
			ipmbl_det_dataStore.proxy.extraParams = { 
				det_ipmbl_ipmbl_id : det_ipmbl_ipmbl_idValue,
				det_ipmbl_jenis : det_ipmbl_jenisValue,
				det_ipmbl_tanggal : det_ipmbl_tanggalValue,
				det_ipmbl_nama : det_ipmbl_namaValue,
				det_ipmbl_alamat : det_ipmbl_alamatValue,
				det_ipmbl_kelurahan : det_ipmbl_kelurahanValue,
				det_ipmbl_kecamatan : det_ipmbl_kecamatanValue,
				det_ipmbl_kota : det_ipmbl_kotaValue,
				det_ipmbl_telp : det_ipmbl_telpValue,
				det_ipmbl_nomoragenda : det_ipmbl_nomoragendaValue,
				det_ipmbl_berkasmasuk : det_ipmbl_berkasmasukValue,
				det_ipmbl_surveytanggal : det_ipmbl_surveytanggalValue,
				det_ipmbl_surveylulus : det_ipmbl_surveylulusValue,
				det_ipmbl_status : det_ipmbl_statusValue,
				det_ipmbl_surveypetugas : det_ipmbl_surveypetugasValue,
				det_ipmbl_surveydinas : det_ipmbl_surveydinasValue,
				det_ipmbl_surveynip : det_ipmbl_surveynipValue,
				det_ipmbl_surveypendapat : det_ipmbl_surveypendapatValue,
				det_ipmbl_rekombl : det_ipmbl_rekomblValue,
				det_ipmbl_rekomblhtanggal : det_ipmbl_rekomblhtanggalValue,
				det_ipmbl_rekomkel : det_ipmbl_rekomkelValue,
				det_ipmbl_rekomkeltanggal : det_ipmbl_rekomkeltanggalValue,
				det_ipmbl_rekomkec : det_ipmbl_rekomkecValue,
				det_ipmbl_rekomkectanggal : det_ipmbl_rekomkectanggalValue,
				det_ipmbl_sk : det_ipmbl_skValue,
				det_ipmbl_kadaluarsa : det_ipmbl_kadaluarsaValue,
				det_ipmbl_berlaku : det_ipmbl_berlakuValue,
				action : 'SEARCH'
			};
			ipmbl_det_dataStore.currentPage = 1;
			ipmbl_det_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function ipmbl_det_printExcel(outputType){
			var searchText = "";
			var det_ipmbl_ipmbl_idValue = '';
			var det_ipmbl_jenisValue = '';
			var det_ipmbl_tanggalValue = '';
			var det_ipmbl_namaValue = '';
			var det_ipmbl_alamatValue = '';
			var det_ipmbl_kelurahanValue = '';
			var det_ipmbl_kecamatanValue = '';
			var det_ipmbl_kotaValue = '';
			var det_ipmbl_telpValue = '';
			var det_ipmbl_nomoragendaValue = '';
			var det_ipmbl_berkasmasukValue = '';
			var det_ipmbl_surveytanggalValue = '';
			var det_ipmbl_surveylulusValue = '';
			var det_ipmbl_statusValue = '';
			var det_ipmbl_surveypetugasValue = '';
			var det_ipmbl_surveydinasValue = '';
			var det_ipmbl_surveynipValue = '';
			var det_ipmbl_surveypendapatValue = '';
			var det_ipmbl_rekomblValue = '';
			var det_ipmbl_rekomblhtanggalValue = '';
			var det_ipmbl_rekomkelValue = '';
			var det_ipmbl_rekomkeltanggalValue = '';
			var det_ipmbl_rekomkecValue = '';
			var det_ipmbl_rekomkectanggalValue = '';
			var det_ipmbl_skValue = '';
			var det_ipmbl_kadaluarsaValue = '';
			var det_ipmbl_berlakuValue = '';
			
			if(ipmbl_det_dataStore.proxy.extraParams.query!==null){searchText = ipmbl_det_dataStore.proxy.extraParams.query;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_ipmbl_id!==null){det_ipmbl_ipmbl_idValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_ipmbl_id;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_jenis!==null){det_ipmbl_jenisValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_jenis;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_tanggal!==null){det_ipmbl_tanggalValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_tanggal;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_nama!==null){det_ipmbl_namaValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_nama;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_alamat!==null){det_ipmbl_alamatValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_alamat;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_kelurahan!==null){det_ipmbl_kelurahanValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_kelurahan;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_kecamatan!==null){det_ipmbl_kecamatanValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_kecamatan;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_kota!==null){det_ipmbl_kotaValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_kota;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_telp!==null){det_ipmbl_telpValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_telp;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_nomoragenda!==null){det_ipmbl_nomoragendaValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_nomoragenda;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_berkasmasuk!==null){det_ipmbl_berkasmasukValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_berkasmasuk;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_surveytanggal!==null){det_ipmbl_surveytanggalValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_surveytanggal;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_surveylulus!==null){det_ipmbl_surveylulusValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_surveylulus;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_status!==null){det_ipmbl_statusValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_status;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_surveypetugas!==null){det_ipmbl_surveypetugasValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_surveypetugas;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_surveydinas!==null){det_ipmbl_surveydinasValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_surveydinas;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_surveynip!==null){det_ipmbl_surveynipValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_surveynip;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_surveypendapat!==null){det_ipmbl_surveypendapatValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_surveypendapat;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_rekombl!==null){det_ipmbl_rekomblValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_rekombl;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_rekomblhtanggal!==null){det_ipmbl_rekomblhtanggalValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_rekomblhtanggal;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_rekomkel!==null){det_ipmbl_rekomkelValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_rekomkel;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_rekomkeltanggal!==null){det_ipmbl_rekomkeltanggalValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_rekomkeltanggal;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_rekomkec!==null){det_ipmbl_rekomkecValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_rekomkec;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_rekomkectanggal!==null){det_ipmbl_rekomkectanggalValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_rekomkectanggal;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_sk!==null){det_ipmbl_skValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_sk;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_kadaluarsa!==null){det_ipmbl_kadaluarsaValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_kadaluarsa;}
			if(ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_berlaku!==null){det_ipmbl_berlakuValue = ipmbl_det_dataStore.proxy.extraParams.det_ipmbl_berlaku;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_t_ipmbl_det/switchAction',
				params : {
					action : outputType,
					query : searchText,
					det_ipmbl_ipmbl_id : det_ipmbl_ipmbl_idValue,
					det_ipmbl_jenis : det_ipmbl_jenisValue,
					det_ipmbl_tanggal : det_ipmbl_tanggalValue,
					det_ipmbl_nama : det_ipmbl_namaValue,
					det_ipmbl_alamat : det_ipmbl_alamatValue,
					det_ipmbl_kelurahan : det_ipmbl_kelurahanValue,
					det_ipmbl_kecamatan : det_ipmbl_kecamatanValue,
					det_ipmbl_kota : det_ipmbl_kotaValue,
					det_ipmbl_telp : det_ipmbl_telpValue,
					det_ipmbl_nomoragenda : det_ipmbl_nomoragendaValue,
					det_ipmbl_berkasmasuk : det_ipmbl_berkasmasukValue,
					det_ipmbl_surveytanggal : det_ipmbl_surveytanggalValue,
					det_ipmbl_surveylulus : det_ipmbl_surveylulusValue,
					det_ipmbl_status : det_ipmbl_statusValue,
					det_ipmbl_surveypetugas : det_ipmbl_surveypetugasValue,
					det_ipmbl_surveydinas : det_ipmbl_surveydinasValue,
					det_ipmbl_surveynip : det_ipmbl_surveynipValue,
					det_ipmbl_surveypendapat : det_ipmbl_surveypendapatValue,
					det_ipmbl_rekombl : det_ipmbl_rekomblValue,
					det_ipmbl_rekomblhtanggal : det_ipmbl_rekomblhtanggalValue,
					det_ipmbl_rekomkel : det_ipmbl_rekomkelValue,
					det_ipmbl_rekomkeltanggal : det_ipmbl_rekomkeltanggalValue,
					det_ipmbl_rekomkec : det_ipmbl_rekomkecValue,
					det_ipmbl_rekomkectanggal : det_ipmbl_rekomkectanggalValue,
					det_ipmbl_sk : det_ipmbl_skValue,
					det_ipmbl_kadaluarsa : det_ipmbl_kadaluarsaValue,
					det_ipmbl_berlaku : det_ipmbl_berlakuValue,
					currentAction : ipmbl_det_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/t_ipmbl_det_list.xls');
							}else{
								window.open('./print/t_ipmbl_det_list.html','ipmbl_detlist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		ipmbl_det_dataStore = Ext.create('Ext.data.Store',{
			id : 'ipmbl_det_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_ipmbl_det/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'det_ipmbl_id'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'det_ipmbl_id', type : 'int', mapping : 'det_ipmbl_id' },
				{ name : 'det_ipmbl_ipmbl_id', type : 'int', mapping : 'det_ipmbl_ipmbl_id' },
				{ name : 'det_ipmbl_jenis', type : 'int', mapping : 'det_ipmbl_jenis' },
				{ name : 'det_ipmbl_tanggal', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'det_ipmbl_tanggal' },
				{ name : 'det_ipmbl_nama', type : 'string', mapping : 'det_ipmbl_nama' },
				{ name : 'det_ipmbl_alamat', type : 'string', mapping : 'det_ipmbl_alamat' },
				{ name : 'det_ipmbl_kelurahan', type : 'int', mapping : 'det_ipmbl_kelurahan' },
				{ name : 'det_ipmbl_kecamatan', type : 'int', mapping : 'det_ipmbl_kecamatan' },
				{ name : 'det_ipmbl_kota', type : 'int', mapping : 'det_ipmbl_kota' },
				{ name : 'det_ipmbl_telp', type : 'string', mapping : 'det_ipmbl_telp' },
				{ name : 'det_ipmbl_nomoragenda', type : 'int', mapping : 'det_ipmbl_nomoragenda' },
				{ name : 'det_ipmbl_berkasmasuk', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'det_ipmbl_berkasmasuk' },
				{ name : 'det_ipmbl_surveytanggal', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'det_ipmbl_surveytanggal' },
				{ name : 'det_ipmbl_surveylulus', type : 'string', mapping : 'det_ipmbl_surveylulus' },
				{ name : 'det_ipmbl_status', type : 'string', mapping : 'det_ipmbl_status' },
				{ name : 'det_ipmbl_surveypetugas', type : 'string', mapping : 'det_ipmbl_surveypetugas' },
				{ name : 'det_ipmbl_surveydinas', type : 'string', mapping : 'det_ipmbl_surveydinas' },
				{ name : 'det_ipmbl_surveynip', type : 'string', mapping : 'det_ipmbl_surveynip' },
				{ name : 'det_ipmbl_surveypendapat', type : 'string', mapping : 'det_ipmbl_surveypendapat' },
				{ name : 'det_ipmbl_rekombl', type : 'string', mapping : 'det_ipmbl_rekombl' },
				{ name : 'det_ipmbl_rekomblhtanggal', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'det_ipmbl_rekomblhtanggal' },
				{ name : 'det_ipmbl_rekomkel', type : 'string', mapping : 'det_ipmbl_rekomkel' },
				{ name : 'det_ipmbl_rekomkeltanggal', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'det_ipmbl_rekomkeltanggal' },
				{ name : 'det_ipmbl_rekomkec', type : 'string', mapping : 'det_ipmbl_rekomkec' },
				{ name : 'det_ipmbl_rekomkectanggal', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'det_ipmbl_rekomkectanggal' },
				{ name : 'det_ipmbl_sk', type : 'string', mapping : 'det_ipmbl_sk' },
				{ name : 'det_ipmbl_kadaluarsa', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'det_ipmbl_kadaluarsa' },
				{ name : 'det_ipmbl_berlaku', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'det_ipmbl_berlaku' },
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		ipmbl_det_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						ipmbl_det_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						ipmbl_det_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						ipmbl_det_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						ipmbl_det_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						ipmbl_det_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						ipmbl_det_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						ipmbl_det_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						ipmbl_det_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var ipmbl_det_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : ipmbl_det_confirmAdd
		});
		var ipmbl_det_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : ipmbl_det_confirmUpdate
		});
		var ipmbl_det_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : ipmbl_det_confirmDelete
		});
		var ipmbl_det_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : ipmbl_det_refresh
		});
		var ipmbl_det_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : ipmbl_det_showSearchWindow
		});
		var ipmbl_det_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				ipmbl_det_printExcel('PRINT');
			}
		});
		var ipmbl_det_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				ipmbl_det_printExcel('EXCEL');
			}
		});
		
		var ipmbl_det_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : ipmbl_det_confirmUpdate
		});
		var ipmbl_det_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : ipmbl_det_confirmDelete
		});
		var ipmbl_det_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : ipmbl_det_refresh
		});
		ipmbl_det_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'ipmbl_det_contextMenu',
			items: [
				ipmbl_det_contextMenuEdit,ipmbl_det_contextMenuDelete,'-',ipmbl_det_contextMenuRefresh
			]
		});
		
		ipmbl_det_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : ipmbl_det_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						ipmbl_det_dataStore.proxy.extraParams = { action : 'GETLIST'};
						ipmbl_det_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		ipmbl_det_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'ipmbl_det_gridPanel',
			constrain : true,
			store : ipmbl_det_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'ipmbl_detGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						ipmbl_det_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : ipmbl_det_shorcut,
			columns : [
				{
					text : 'Id Ipmbl',
					dataIndex : 'det_ipmbl_ipmbl_id',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'Jenis',
					dataIndex : 'det_ipmbl_jenis',
					width : 100,
					sortable : false
				},
				{
					text : 'Tanggal',
					dataIndex : 'det_ipmbl_tanggal',
					width : 100,
					sortable : false,
					renderer : Ext.util.Format.dateRenderer('d-m-Y')
				},
				{
					text : 'Nama',
					dataIndex : 'det_ipmbl_nama',
					width : 100,
					sortable : false
				},
				{
					text : 'Alamat',
					dataIndex : 'det_ipmbl_alamat',
					width : 100,
					sortable : false
				},
				{
					text : 'Kelurahan',
					dataIndex : 'det_ipmbl_kelurahan',
					width : 100,
					sortable : false
				},
				{
					text : 'Kecamatan',
					dataIndex : 'det_ipmbl_kecamatan',
					width : 100,
					sortable : false
				},
				{
					text : 'Kota',
					dataIndex : 'det_ipmbl_kota',
					width : 100,
					sortable : false
				},
				{
					text : 'Telp',
					dataIndex : 'det_ipmbl_telp',
					width : 100,
					sortable : false
				},
				{
					text : 'Nomor Agenda',
					dataIndex : 'det_ipmbl_nomoragenda',
					width : 100,
					sortable : false
				},
				{
					text : 'Tgl Masuk Berkas',
					dataIndex : 'det_ipmbl_berkasmasuk',
					width : 100,
					sortable : false,
					renderer : Ext.util.Format.dateRenderer('d-m-Y')
				},
				{
					text : 'Tgl Survey',
					dataIndex : 'det_ipmbl_surveytanggal',
					width : 100,
					sortable : false,
					renderer : Ext.util.Format.dateRenderer('d-m-Y')
				},
				{
					text : 'Lulus survey',
					dataIndex : 'det_ipmbl_surveylulus',
					width : 100,
					sortable : false
				},
				{
					text : 'Status',
					dataIndex : 'det_ipmbl_status',
					width : 100,
					sortable : false
				},
				{
					text : 'Petugas Survey',
					dataIndex : 'det_ipmbl_surveypetugas',
					width : 100,
					sortable : false
				},
				{
					text : 'Dinas',
					dataIndex : 'det_ipmbl_surveydinas',
					width : 100,
					sortable : false
				},
				{
					text : 'NIP',
					dataIndex : 'det_ipmbl_surveynip',
					width : 100,
					sortable : false
				},
				{
					text : 'Pendapat',
					dataIndex : 'det_ipmbl_surveypendapat',
					width : 100,
					sortable : false
				},
				{
					text : 'Rekomendasi BLH',
					dataIndex : 'det_ipmbl_rekombl',
					width : 100,
					sortable : false
				},
				{
					text : 'Tanggal',
					dataIndex : 'det_ipmbl_rekomblhtanggal',
					width : 100,
					sortable : false,
					renderer : Ext.util.Format.dateRenderer('d-m-Y')
				},
				{
					text : 'Rekomendasi Kelurahan',
					dataIndex : 'det_ipmbl_rekomkel',
					width : 100,
					sortable : false
				},
				{
					text : 'Tanggal',
					dataIndex : 'det_ipmbl_rekomkeltanggal',
					width : 100,
					sortable : false,
					renderer : Ext.util.Format.dateRenderer('d-m-Y')
				},
				{
					text : 'Rekomendasi Kecamatan',
					dataIndex : 'det_ipmbl_rekomkec',
					width : 100,
					sortable : false
				},
				{
					text : 'Tanggal',
					dataIndex : 'det_ipmbl_rekomkectanggal',
					width : 100,
					sortable : false,
					renderer : Ext.util.Format.dateRenderer('d-m-Y')
				},
				{
					text : 'Nomor SK',
					dataIndex : 'det_ipmbl_sk',
					width : 100,
					sortable : false
				},
				{
					text : 'Kadaluarsa',
					dataIndex : 'det_ipmbl_kadaluarsa',
					width : 100,
					sortable : false,
					renderer : Ext.util.Format.dateRenderer('d-m-Y')
				},
				{
					text : 'Berlaku',
					dataIndex : 'det_ipmbl_berlaku',
					width : 100,
					sortable : false,
					renderer : Ext.util.Format.dateRenderer('d-m-Y')
				}
			],
			tbar : [
				ipmbl_det_addButton,
				ipmbl_det_editButton,
				ipmbl_det_deleteButton,
				ipmbl_det_gridSearchField,
				ipmbl_det_searchButton,
				ipmbl_det_refreshButton,
				ipmbl_det_printButton,
				ipmbl_det_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : ipmbl_det_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					ipmbl_det_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		det_ipmbl_idField = Ext.create('Ext.form.NumberField',{
			id : 'det_ipmbl_idField',
			name : 'det_ipmbl_id',
			fieldLabel : 'Id <font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		det_ipmbl_ipmbl_idField = Ext.create('Ext.form.NumberField',{
			id : 'det_ipmbl_ipmbl_idField',
			name : 'det_ipmbl_ipmbl_id',
			fieldLabel : 'Id',
			allowNegatife : false,
			blankText : '0',
			hidden : true,
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		det_ipmbl_jenisField = Ext.create('Ext.form.ComboBox',{
			id : 'det_ipmbl_jenisField',
			name : 'det_ipmbl_jenis',
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
						// det_idam_sklamaField.show();
					}else{
						// det_idam_sklamaField.hide();
					}
				}
			}
		});
		det_ipmbl_tanggalField = Ext.create('Ext.form.field.Date',{
			id : 'det_ipmbl_tanggalField',
			name : 'det_ipmbl_tanggal',
			fieldLabel : 'Tanggal <font color=red>*</font>',
			format : 'd-m-Y',
			maxValue : new Date('<?php echo date('Y-m-d').'T'.date('H:i:s'); ?>'),
			value : new Date('<?php echo date('Y-m-d').'T'.date('H:i:s'); ?>')
		});
		det_ipmbl_namaField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_namaField',
			name : 'det_ipmbl_nama',
			fieldLabel : 'Nama',
			maxLength : 50
		});
		det_ipmbl_alamatField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_alamatField',
			name : 'det_ipmbl_alamat',
			fieldLabel : 'Alamat',
			maxLength : 100
		});
		det_ipmbl_kelurahanField = Ext.create('Ext.form.NumberField',{
			id : 'det_ipmbl_kelurahanField',
			name : 'det_ipmbl_kelurahan',
			fieldLabel : 'Kelurahan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/
		});
		det_ipmbl_kecamatanField = Ext.create('Ext.form.NumberField',{
			id : 'det_ipmbl_kecamatanField',
			name : 'det_ipmbl_kecamatan',
			fieldLabel : 'Kecamatan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		det_ipmbl_kotaField = Ext.create('Ext.form.NumberField',{
			id : 'det_ipmbl_kotaField',
			name : 'det_ipmbl_kota',
			fieldLabel : 'Kota',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		det_ipmbl_telpField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_telpField',
			name : 'det_ipmbl_telp',
			fieldLabel : 'Telp',
			maxLength : 20,
			maskRe : /([0-9]+)$/
		});
		det_ipmbl_nomoragendaField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_nomoragendaField',
			name : 'det_ipmbl_nomoragenda',
			fieldLabel : 'Nomor Agenda',
			blankText : '1',
			maskRe : /([0-9]+)$/
		});
		det_ipmbl_berkasmasukField = Ext.create('Ext.form.field.Date',{
			id : 'det_ipmbl_berkasmasukField',
			name : 'det_ipmbl_berkasmasuk',
			fieldLabel : 'Tgl Masuk Berkas',
			format : 'd-m-Y',
			maxValue : new Date('<?php echo date('Y-m-d').'T'.date('H:i:s'); ?>')
		});
		det_ipmbl_surveytanggalField = Ext.create('Ext.form.field.Date',{
			id : 'det_ipmbl_surveytanggalField',
			name : 'det_ipmbl_surveytanggal',
			fieldLabel : 'Tgl Survey',
			format : 'd-m-Y',
			maxValue : new Date('<?php echo date('Y-m-d').'T'.date('H:i:s'); ?>')
		});
		det_ipmbl_surveylulusField = Ext.create('Ext.form.ComboBox',{
			id : 'det_ipmbl_surveylulusField',
			name : 'det_ipmbl_surveylulus',
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
		det_ipmbl_statusField = Ext.create('Ext.form.ComboBox',{
			id : 'det_ipmbl_statusField',
			name : 'det_ipmbl_status',
			fieldLabel : 'Status',
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
		det_ipmbl_surveypetugasField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_surveypetugasField',
			name : 'det_ipmbl_surveypetugas',
			fieldLabel : 'Petugas',
			maxLength : 50
		});
		det_ipmbl_surveydinasField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_surveydinasField',
			name : 'det_ipmbl_surveydinas',
			fieldLabel : 'Asal Dinas',
			maxLength : 50
		});
		det_ipmbl_surveynipField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_surveynipField',
			name : 'det_ipmbl_surveynip',
			fieldLabel : 'NIP Petugas',
			maxLength : 50
		});
		det_ipmbl_surveypendapatField = Ext.create('Ext.form.TextArea',{
			id : 'det_ipmbl_surveypendapatField',
			name : 'det_ipmbl_surveypendapat',
			fieldLabel : 'Pendapat',
			maxLength : 65535
		});
		det_ipmbl_rekomblField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_rekomblField',
			name : 'det_ipmbl_rekombl',
			fieldLabel : 'Rekom BLH',
			maxLength : 50
		});
		det_ipmbl_rekomblhtanggalField = Ext.create('Ext.form.field.Date',{
			id : 'det_ipmbl_rekomblhtanggalField',
			name : 'det_ipmbl_rekomblhtanggal',
			fieldLabel : 'Tanggal',
			format : 'd-m-Y',
			maxValue : new Date('<?php echo date('Y-m-d').'T'.date('H:i:s'); ?>')
		});
		det_ipmbl_rekomkelField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_rekomkelField',
			name : 'det_ipmbl_rekomkel',
			fieldLabel : 'Rekom Kel.',
			maxLength : 50
		});
		det_ipmbl_rekomkeltanggalField = Ext.create('Ext.form.field.Date',{
			id : 'det_ipmbl_rekomkeltanggalField',
			name : 'det_ipmbl_rekomkeltanggal',
			fieldLabel : 'Tanggal',
			format : 'd-m-Y',
			maxValue : new Date('<?php echo date('Y-m-d').'T'.date('H:i:s'); ?>')
		});
		det_ipmbl_rekomkecField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_rekomkecField',
			name : 'det_ipmbl_rekomkec',
			fieldLabel : 'Rekom Kec.',
			maxLength : 50
		});
		det_ipmbl_rekomkectanggalField = Ext.create('Ext.form.field.Date',{
			id : 'det_ipmbl_rekomkectanggalField',
			name : 'det_ipmbl_rekomkectanggal',
			fieldLabel : 'Tanggal',
			format : 'd-m-Y',
			maxValue : new Date('<?php echo date('Y-m-d').'T'.date('H:i:s'); ?>')
		});
		det_ipmbl_skField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_skField',
			name : 'det_ipmbl_sk',
			fieldLabel : 'Nomor SK',
			maxLength : 50
		});
		det_ipmbl_kadaluarsaField = Ext.create('Ext.form.field.Date',{
			id : 'det_ipmbl_kadaluarsaField',
			name : 'det_ipmbl_kadaluarsa',
			fieldLabel : 'Tgl Kadaluarsa',
			format : 'd-m-Y',
			minValue : new Date('<?php echo date('Y-m-d').'T'.date('H:i:s'); ?>')
		});
		det_ipmbl_berlakuField = Ext.create('Ext.form.field.Date',{
			id : 'det_ipmbl_berlakuField',
			name : 'det_ipmbl_berlaku',
			fieldLabel : 'Tgl Berlaku',
			format : 'd-m-Y'
		});
		var ipmbl_det_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : ipmbl_det_save
		});
		var ipmbl_det_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				ipmbl_det_resetForm();
				ipmbl_det_switchToGrid();
			}
		});
		ipmbl_det_formPanel = Ext.create('Ext.form.Panel', {
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
						det_ipmbl_idField,
						det_ipmbl_ipmbl_idField,
						det_ipmbl_jenisField,
						det_ipmbl_tanggalField,
						det_ipmbl_namaField,
						det_ipmbl_alamatField,
						det_ipmbl_kelurahanField,
						det_ipmbl_kecamatanField,
						det_ipmbl_kotaField,
						det_ipmbl_telpField,
						det_ipmbl_nomoragendaField,
						det_ipmbl_berkasmasukField,
						det_ipmbl_surveytanggalField,
						det_ipmbl_surveylulusField,
						det_ipmbl_statusField,
						det_ipmbl_surveypetugasField,
						det_ipmbl_surveydinasField,
						det_ipmbl_surveynipField,
						det_ipmbl_surveypendapatField,
						det_ipmbl_rekomblField,
						det_ipmbl_rekomblhtanggalField,
						det_ipmbl_rekomkelField,
						det_ipmbl_rekomkeltanggalField,
						det_ipmbl_rekomkecField,
						det_ipmbl_rekomkectanggalField,
						det_ipmbl_skField,
						det_ipmbl_kadaluarsaField,
						det_ipmbl_berlakuField,
											]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [ipmbl_det_saveButton,ipmbl_det_cancelButton]
		});
		ipmbl_det_formWindow = Ext.create('Ext.window.Window',{
			id : 'ipmbl_det_formWindow',
			renderTo : 'ipmbl_detSaveWindow',
			title : globalFormAddEditTitle + ' ' + ipmbl_det_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [ipmbl_det_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		det_ipmbl_ipmbl_idSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_ipmbl_ipmbl_idSearchField',
			name : 'det_ipmbl_ipmbl_id',
			fieldLabel : 'Id',
			allowNegatife : false,
			hidden : true,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_ipmbl_jenisSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_ipmbl_jenisSearchField',
			name : 'det_ipmbl_jenis',
			fieldLabel : 'Jenis',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_ipmbl_tanggalSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_tanggalSearchField',
			name : 'det_ipmbl_tanggal',
			fieldLabel : 'Tanggal',
			maxLength : 0
		
		});
		det_ipmbl_namaSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_namaSearchField',
			name : 'det_ipmbl_nama',
			fieldLabel : 'Nama',
			maxLength : 50
		
		});
		det_ipmbl_alamatSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_alamatSearchField',
			name : 'det_ipmbl_alamat',
			fieldLabel : 'Alamat',
			maxLength : 100
		
		});
		det_ipmbl_kelurahanSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_ipmbl_kelurahanSearchField',
			name : 'det_ipmbl_kelurahan',
			fieldLabel : 'Kelurahan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_ipmbl_kecamatanSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_ipmbl_kecamatanSearchField',
			name : 'det_ipmbl_kecamatan',
			fieldLabel : 'Kecamatan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_ipmbl_kotaSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_ipmbl_kotaSearchField',
			name : 'det_ipmbl_kota',
			fieldLabel : 'Kota',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_ipmbl_telpSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_telpSearchField',
			name : 'det_ipmbl_telp',
			fieldLabel : 'Telp',
			maxLength : 20
		
		});
		det_ipmbl_nomoragendaSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_ipmbl_nomoragendaSearchField',
			name : 'det_ipmbl_nomoragenda',
			fieldLabel : 'No. Agenda',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_ipmbl_berkasmasukSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_berkasmasukSearchField',
			name : 'det_ipmbl_berkasmasuk',
			fieldLabel : 'Tgl Masuk Berkas',
			maxLength : 0
		
		});
		det_ipmbl_surveytanggalSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_surveytanggalSearchField',
			name : 'det_ipmbl_surveytanggal',
			fieldLabel : 'Tgl Survey',
			maxLength : 0
		
		});
		det_ipmbl_surveylulusSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_surveylulusSearchField',
			name : 'det_ipmbl_surveylulus',
			fieldLabel : 'Lulus/Tidak',
			maxLength : 255
		
		});
		det_ipmbl_statusSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_statusSearchField',
			name : 'det_ipmbl_status',
			fieldLabel : 'Status',
			maxLength : 255
		
		});
		det_ipmbl_surveypetugasSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_surveypetugasSearchField',
			name : 'det_ipmbl_surveypetugas',
			fieldLabel : 'Petugas Survey',
			maxLength : 50
		
		});
		det_ipmbl_surveydinasSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_surveydinasSearchField',
			name : 'det_ipmbl_surveydinas',
			fieldLabel : 'Asal Dinas',
			maxLength : 50
		
		});
		det_ipmbl_surveynipSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_surveynipSearchField',
			name : 'det_ipmbl_surveynip',
			fieldLabel : 'NIP Petugas',
			maxLength : 50
		
		});
		det_ipmbl_surveypendapatSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_surveypendapatSearchField',
			name : 'det_ipmbl_surveypendapat',
			fieldLabel : 'Pendapat',
			maxLength : 65535
		
		});
		det_ipmbl_rekomblSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_rekomblSearchField',
			name : 'det_ipmbl_rekombl',
			fieldLabel : 'Rekomendasi BLH',
			maxLength : 50
		
		});
		det_ipmbl_rekomblhtanggalSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_rekomblhtanggalSearchField',
			name : 'det_ipmbl_rekomblhtanggal',
			fieldLabel : 'Tanggal',
			maxLength : 0
		
		});
		det_ipmbl_rekomkelSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_rekomkelSearchField',
			name : 'det_ipmbl_rekomkel',
			fieldLabel : 'Rekomendasi Kel.',
			maxLength : 50
		
		});
		det_ipmbl_rekomkeltanggalSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_rekomkeltanggalSearchField',
			name : 'det_ipmbl_rekomkeltanggal',
			fieldLabel : 'Tanggal',
			maxLength : 0
		
		});
		det_ipmbl_rekomkecSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_rekomkecSearchField',
			name : 'det_ipmbl_rekomkec',
			fieldLabel : 'Rekomendasi Kec.',
			maxLength : 50
		
		});
		det_ipmbl_rekomkectanggalSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_rekomkectanggalSearchField',
			name : 'det_ipmbl_rekomkectanggal',
			fieldLabel : 'Tanggal',
			maxLength : 0
		
		});
		det_ipmbl_skSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_skSearchField',
			name : 'det_ipmbl_sk',
			fieldLabel : 'Nomor SK',
			maxLength : 50
		
		});
		det_ipmbl_kadaluarsaSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_kadaluarsaSearchField',
			name : 'det_ipmbl_kadaluarsa',
			fieldLabel : 'Tgl Kadaluarsa',
			maxLength : 0
		
		});
		det_ipmbl_berlakuSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_ipmbl_berlakuSearchField',
			name : 'det_ipmbl_berlaku',
			fieldLabel : 'Tgl Berlaku',
			maxLength : 0
		
		});
		var ipmbl_det_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : ipmbl_det_search
		});
		var ipmbl_det_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				ipmbl_det_searchWindow.hide();
			}
		});
		ipmbl_det_searchPanel = Ext.create('Ext.form.Panel', {
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
						det_ipmbl_ipmbl_idSearchField,
						det_ipmbl_jenisSearchField,
						det_ipmbl_tanggalSearchField,
						det_ipmbl_namaSearchField,
						det_ipmbl_alamatSearchField,
						det_ipmbl_kelurahanSearchField,
						det_ipmbl_kecamatanSearchField,
						det_ipmbl_kotaSearchField,
						det_ipmbl_telpSearchField,
						det_ipmbl_nomoragendaSearchField,
						det_ipmbl_berkasmasukSearchField,
						det_ipmbl_surveytanggalSearchField,
						det_ipmbl_surveylulusSearchField,
						det_ipmbl_statusSearchField,
						det_ipmbl_surveypetugasSearchField,
						det_ipmbl_surveydinasSearchField,
						det_ipmbl_surveynipSearchField,
						det_ipmbl_surveypendapatSearchField,
						det_ipmbl_rekomblSearchField,
						det_ipmbl_rekomblhtanggalSearchField,
						det_ipmbl_rekomkelSearchField,
						det_ipmbl_rekomkeltanggalSearchField,
						det_ipmbl_rekomkecSearchField,
						det_ipmbl_rekomkectanggalSearchField,
						det_ipmbl_skSearchField,
						det_ipmbl_kadaluarsaSearchField,
						det_ipmbl_berlakuSearchField,
						]
				}],
			buttons : [ipmbl_det_searchingButton,ipmbl_det_cancelSearchButton]
		});
		ipmbl_det_searchWindow = Ext.create('Ext.window.Window',{
			id : 'ipmbl_det_searchWindow',
			renderTo : 'ipmbl_detSearchWindow',
			title : globalFormSearchTitle + ' ' + ipmbl_det_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [ipmbl_det_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="ipmbl_detSaveWindow"></div>
<div id="ipmbl_detSearchWindow"></div>
<div class="span12" id="ipmbl_detGrid"></div>