<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var simb_componentItemTitle="SIMB";
		var simb_dataStore;
		
		var simb_shorcut;
		var simb_contextMenu;
		var simb_gridSearchField;
		var simb_gridPanel;
		var simb_formPanel;
		var simb_formWindow;
		var simb_searchPanel;
		var simb_searchWindow;
		
		var simb_idField;
		var simb_per_npwpField;
		var simb_per_namaField;
		var simb_per_aktaField;
		var simb_per_bentukField;
		var simb_per_alamatField;
		var simb_per_kelField;
		var simb_per_kecField;
		var simb_per_kotaField;
		var simb_per_telpField;
		var simb_jenisField;
		var simb_statusField;
		var simb_jenisusahaField;
		var simb_panjangField;
		var simb_lebarField;
		var simb_alamatField;
		var simb_kelField;
		var simb_kecField;
		var simb_bentukField;
		var simb_lokasiField;
		var simb_gangguanField;
		var simb_batasutaraField;
		var simb_batastimurField;
		var simb_batasselatanField;
		var simb_batasbaratField;
				
		var simb_per_npwpSearchField;
		var simb_per_namaSearchField;
		var simb_per_aktaSearchField;
		var simb_per_bentukSearchField;
		var simb_per_alamatSearchField;
		var simb_per_kelSearchField;
		var simb_per_kecSearchField;
		var simb_per_kotaSearchField;
		var simb_per_telpSearchField;
		var simb_jenisSearchField;
		var simb_statusSearchField;
		var simb_jenisusahaSearchField;
		var simb_panjangSearchField;
		var simb_lebarSearchField;
		var simb_alamatSearchField;
		var simb_kelSearchField;
		var simb_kecSearchField;
		var simb_bentukSearchField;
		var simb_lokasiSearchField;
		var simb_gangguanSearchField;
		var simb_batasutaraSearchField;
		var simb_batastimurSearchField;
		var simb_batasselatanSearchField;
		var simb_batasbaratSearchField;
				
		var simb_dbTask = 'CREATE';
		var simb_dbTaskMessage = 'Tambah';
		var simb_dbPermission = 'CRUD';
		var simb_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function simb_switchToGrid(){
			simb_formPanel.setDisabled(true);
			simb_gridPanel.setDisabled(false);
			simb_formWindow.hide();
		}
		
		function simb_switchToForm(){
			simb_gridPanel.setDisabled(true);
			simb_formPanel.setDisabled(false);
			simb_formWindow.show();
		}
		
		function simb_confirmAdd(){
			simb_dbTask = 'CREATE';
			simb_dbTaskMessage = 'created';
			simb_resetForm();
			simb_switchToForm();
		}
		
		function simb_confirmUpdate(){
			if(simb_gridPanel.selModel.getCount() == 1) {
				simb_dbTask = 'UPDATE';
				simb_dbTaskMessage = 'updated';
				simb_switchToForm();
				simb_setForm();
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
		
		function simb_confirmDelete(){
			if(simb_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, simb_delete);
			}else if(simb_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, simb_delete);
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
		
		function simb_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(simb_dbPermission)==false && pattC.test(simb_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(simb_confirmFormValid()){
					var simb_idValue = '';
					var simb_per_npwpValue = '';
					var simb_per_namaValue = '';
					var simb_per_aktaValue = '';
					var simb_per_bentukValue = '';
					var simb_per_alamatValue = '';
					var simb_per_kelValue = '';
					var simb_per_kecValue = '';
					var simb_per_kotaValue = '';
					var simb_per_telpValue = '';
					var simb_jenisValue = '';
					var simb_statusValue = '';
					var simb_jenisusahaValue = '';
					var simb_panjangValue = '';
					var simb_lebarValue = '';
					var simb_alamatValue = '';
					var simb_kelValue = '';
					var simb_kecValue = '';
					var simb_bentukValue = '';
					var simb_lokasiValue = '';
					var simb_gangguanValue = '';
					var simb_batasutaraValue = '';
					var simb_batastimurValue = '';
					var simb_batasselatanValue = '';
					var simb_batasbaratValue = '';
										
					simb_idValue = simb_idField.getValue();
					simb_per_npwpValue = simb_per_npwpField.getValue();
					simb_per_namaValue = simb_per_namaField.getValue();
					simb_per_aktaValue = simb_per_aktaField.getValue();
					simb_per_bentukValue = simb_per_bentukField.getValue();
					simb_per_alamatValue = simb_per_alamatField.getValue();
					simb_per_kelValue = simb_per_kelField.getValue();
					simb_per_kecValue = simb_per_kecField.getValue();
					simb_per_kotaValue = simb_per_kotaField.getValue();
					simb_per_telpValue = simb_per_telpField.getValue();
					simb_jenisValue = simb_jenisField.getValue();
					simb_statusValue = simb_statusField.getValue();
					simb_jenisusahaValue = simb_jenisusahaField.getValue();
					simb_panjangValue = simb_panjangField.getValue();
					simb_lebarValue = simb_lebarField.getValue();
					simb_alamatValue = simb_alamatField.getValue();
					simb_kelValue = simb_kelField.getValue();
					simb_kecValue = simb_kecField.getValue();
					simb_bentukValue = simb_bentukField.getValue();
					simb_lokasiValue = simb_lokasiField.getValue();
					simb_gangguanValue = simb_gangguanField.getValue();
					simb_batasutaraValue = simb_batasutaraField.getValue();
					simb_batastimurValue = simb_batastimurField.getValue();
					simb_batasselatanValue = simb_batasselatanField.getValue();
					simb_batasbaratValue = simb_batasbaratField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_t_simb/switchAction',
						params: {							
							simb_id : simb_idValue,
							simb_per_npwp : simb_per_npwpValue,
							simb_per_nama : simb_per_namaValue,
							simb_per_akta : simb_per_aktaValue,
							simb_per_bentuk : simb_per_bentukValue,
							simb_per_alamat : simb_per_alamatValue,
							simb_per_kel : simb_per_kelValue,
							simb_per_kec : simb_per_kecValue,
							simb_per_kota : simb_per_kotaValue,
							simb_per_telp : simb_per_telpValue,
							simb_jenis : simb_jenisValue,
							simb_status : simb_statusValue,
							simb_jenisusaha : simb_jenisusahaValue,
							simb_panjang : simb_panjangValue,
							simb_lebar : simb_lebarValue,
							simb_alamat : simb_alamatValue,
							simb_kel : simb_kelValue,
							simb_kec : simb_kecValue,
							simb_bentuk : simb_bentukValue,
							simb_lokasi : simb_lokasiValue,
							simb_gangguan : simb_gangguanValue,
							simb_batasutara : simb_batasutaraValue,
							simb_batastimur : simb_batastimurValue,
							simb_batasselatan : simb_batasselatanValue,
							simb_batasbarat : simb_batasbaratValue,
							action : simb_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									simb_dataStore.reload();
									simb_resetForm();
									simb_switchToGrid();
									simb_gridPanel.getSelectionModel().deselectAll();
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
		
		function simb_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(simb_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = simb_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< simb_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.simb_id);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_t_simb/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									simb_dataStore.reload();
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
		
		function simb_refresh(){
			simb_dbListAction = "GETLIST";
			simb_gridSearchField.reset();
			simb_searchPanel.getForm().reset();
			simb_dataStore.proxy.extraParams = { action : 'GETLIST' };
			simb_dataStore.proxy.extraParams.query = "";
			simb_dataStore.currentPage = 1;
			simb_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function simb_confirmFormValid(){
			return simb_formPanel.getForm().isValid();
		}
		
		function simb_resetForm(){
			simb_dbTask = 'CREATE';
			simb_dbTaskMessage = 'create';
			simb_formPanel.getForm().reset();
			simb_idField.setValue(0);
		}
		
		function simb_setForm(){
			simb_dbTask = 'UPDATE';
            simb_dbTaskMessage = 'update';
			
			var record = simb_gridPanel.getSelectionModel().getSelection()[0];
			simb_idField.setValue(record.data.simb_id);
			simb_per_npwpField.setValue(record.data.simb_per_npwp);
			simb_per_namaField.setValue(record.data.simb_per_nama);
			simb_per_aktaField.setValue(record.data.simb_per_akta);
			simb_per_bentukField.setValue(record.data.simb_per_bentuk);
			simb_per_alamatField.setValue(record.data.simb_per_alamat);
			simb_per_kelField.setValue(record.data.simb_per_kel);
			simb_per_kecField.setValue(record.data.simb_per_kec);
			simb_per_kotaField.setValue(record.data.simb_per_kota);
			simb_per_telpField.setValue(record.data.simb_per_telp);
			simb_jenisField.setValue(record.data.simb_jenis);
			simb_statusField.setValue(record.data.simb_status);
			simb_jenisusahaField.setValue(record.data.simb_jenisusaha);
			simb_panjangField.setValue(record.data.simb_panjang);
			simb_lebarField.setValue(record.data.simb_lebar);
			simb_alamatField.setValue(record.data.simb_alamat);
			simb_kelField.setValue(record.data.simb_kel);
			simb_kecField.setValue(record.data.simb_kec);
			simb_bentukField.setValue(record.data.simb_bentuk);
			simb_lokasiField.setValue(record.data.simb_lokasi);
			simb_gangguanField.setValue(record.data.simb_gangguan);
			simb_batasutaraField.setValue(record.data.simb_batasutara);
			simb_batastimurField.setValue(record.data.simb_batastimur);
			simb_batasselatanField.setValue(record.data.simb_batasselatan);
			simb_batasbaratField.setValue(record.data.simb_batasbarat);
					}
		
		function simb_showSearchWindow(){
			simb_searchWindow.show();
		}
		
		function simb_search(){
			simb_gridSearchField.reset();
			
			var simb_per_npwpValue = '';
			var simb_per_namaValue = '';
			var simb_per_aktaValue = '';
			var simb_per_bentukValue = '';
			var simb_per_alamatValue = '';
			var simb_per_kelValue = '';
			var simb_per_kecValue = '';
			var simb_per_kotaValue = '';
			var simb_per_telpValue = '';
			var simb_jenisValue = '';
			var simb_statusValue = '';
			var simb_jenisusahaValue = '';
			var simb_panjangValue = '';
			var simb_lebarValue = '';
			var simb_alamatValue = '';
			var simb_kelValue = '';
			var simb_kecValue = '';
			var simb_bentukValue = '';
			var simb_lokasiValue = '';
			var simb_gangguanValue = '';
			var simb_batasutaraValue = '';
			var simb_batastimurValue = '';
			var simb_batasselatanValue = '';
			var simb_batasbaratValue = '';
						
			simb_per_npwpValue = simb_per_npwpSearchField.getValue();
			simb_per_namaValue = simb_per_namaSearchField.getValue();
			simb_per_aktaValue = simb_per_aktaSearchField.getValue();
			simb_per_bentukValue = simb_per_bentukSearchField.getValue();
			simb_per_alamatValue = simb_per_alamatSearchField.getValue();
			simb_per_kelValue = simb_per_kelSearchField.getValue();
			simb_per_kecValue = simb_per_kecSearchField.getValue();
			simb_per_kotaValue = simb_per_kotaSearchField.getValue();
			simb_per_telpValue = simb_per_telpSearchField.getValue();
			simb_jenisValue = simb_jenisSearchField.getValue();
			simb_statusValue = simb_statusSearchField.getValue();
			simb_jenisusahaValue = simb_jenisusahaSearchField.getValue();
			simb_panjangValue = simb_panjangSearchField.getValue();
			simb_lebarValue = simb_lebarSearchField.getValue();
			simb_alamatValue = simb_alamatSearchField.getValue();
			simb_kelValue = simb_kelSearchField.getValue();
			simb_kecValue = simb_kecSearchField.getValue();
			simb_bentukValue = simb_bentukSearchField.getValue();
			simb_lokasiValue = simb_lokasiSearchField.getValue();
			simb_gangguanValue = simb_gangguanSearchField.getValue();
			simb_batasutaraValue = simb_batasutaraSearchField.getValue();
			simb_batastimurValue = simb_batastimurSearchField.getValue();
			simb_batasselatanValue = simb_batasselatanSearchField.getValue();
			simb_batasbaratValue = simb_batasbaratSearchField.getValue();
			simb_dbListAction = "SEARCH";
			simb_dataStore.proxy.extraParams = { 
				simb_per_npwp : simb_per_npwpValue,
				simb_per_nama : simb_per_namaValue,
				simb_per_akta : simb_per_aktaValue,
				simb_per_bentuk : simb_per_bentukValue,
				simb_per_alamat : simb_per_alamatValue,
				simb_per_kel : simb_per_kelValue,
				simb_per_kec : simb_per_kecValue,
				simb_per_kota : simb_per_kotaValue,
				simb_per_telp : simb_per_telpValue,
				simb_jenis : simb_jenisValue,
				simb_status : simb_statusValue,
				simb_jenisusaha : simb_jenisusahaValue,
				simb_panjang : simb_panjangValue,
				simb_lebar : simb_lebarValue,
				simb_alamat : simb_alamatValue,
				simb_kel : simb_kelValue,
				simb_kec : simb_kecValue,
				simb_bentuk : simb_bentukValue,
				simb_lokasi : simb_lokasiValue,
				simb_gangguan : simb_gangguanValue,
				simb_batasutara : simb_batasutaraValue,
				simb_batastimur : simb_batastimurValue,
				simb_batasselatan : simb_batasselatanValue,
				simb_batasbarat : simb_batasbaratValue,
				action : 'SEARCH'
			};
			simb_dataStore.currentPage = 1;
			simb_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function simb_printExcel(outputType){
			var searchText = "";
			var simb_per_npwpValue = '';
			var simb_per_namaValue = '';
			var simb_per_aktaValue = '';
			var simb_per_bentukValue = '';
			var simb_per_alamatValue = '';
			var simb_per_kelValue = '';
			var simb_per_kecValue = '';
			var simb_per_kotaValue = '';
			var simb_per_telpValue = '';
			var simb_jenisValue = '';
			var simb_statusValue = '';
			var simb_jenisusahaValue = '';
			var simb_panjangValue = '';
			var simb_lebarValue = '';
			var simb_alamatValue = '';
			var simb_kelValue = '';
			var simb_kecValue = '';
			var simb_bentukValue = '';
			var simb_lokasiValue = '';
			var simb_gangguanValue = '';
			var simb_batasutaraValue = '';
			var simb_batastimurValue = '';
			var simb_batasselatanValue = '';
			var simb_batasbaratValue = '';
			
			if(simb_dataStore.proxy.extraParams.query!==null){searchText = simb_dataStore.proxy.extraParams.query;}
			if(simb_dataStore.proxy.extraParams.simb_per_npwp!==null){simb_per_npwpValue = simb_dataStore.proxy.extraParams.simb_per_npwp;}
			if(simb_dataStore.proxy.extraParams.simb_per_nama!==null){simb_per_namaValue = simb_dataStore.proxy.extraParams.simb_per_nama;}
			if(simb_dataStore.proxy.extraParams.simb_per_akta!==null){simb_per_aktaValue = simb_dataStore.proxy.extraParams.simb_per_akta;}
			if(simb_dataStore.proxy.extraParams.simb_per_bentuk!==null){simb_per_bentukValue = simb_dataStore.proxy.extraParams.simb_per_bentuk;}
			if(simb_dataStore.proxy.extraParams.simb_per_alamat!==null){simb_per_alamatValue = simb_dataStore.proxy.extraParams.simb_per_alamat;}
			if(simb_dataStore.proxy.extraParams.simb_per_kel!==null){simb_per_kelValue = simb_dataStore.proxy.extraParams.simb_per_kel;}
			if(simb_dataStore.proxy.extraParams.simb_per_kec!==null){simb_per_kecValue = simb_dataStore.proxy.extraParams.simb_per_kec;}
			if(simb_dataStore.proxy.extraParams.simb_per_kota!==null){simb_per_kotaValue = simb_dataStore.proxy.extraParams.simb_per_kota;}
			if(simb_dataStore.proxy.extraParams.simb_per_telp!==null){simb_per_telpValue = simb_dataStore.proxy.extraParams.simb_per_telp;}
			if(simb_dataStore.proxy.extraParams.simb_jenis!==null){simb_jenisValue = simb_dataStore.proxy.extraParams.simb_jenis;}
			if(simb_dataStore.proxy.extraParams.simb_status!==null){simb_statusValue = simb_dataStore.proxy.extraParams.simb_status;}
			if(simb_dataStore.proxy.extraParams.simb_jenisusaha!==null){simb_jenisusahaValue = simb_dataStore.proxy.extraParams.simb_jenisusaha;}
			if(simb_dataStore.proxy.extraParams.simb_panjang!==null){simb_panjangValue = simb_dataStore.proxy.extraParams.simb_panjang;}
			if(simb_dataStore.proxy.extraParams.simb_lebar!==null){simb_lebarValue = simb_dataStore.proxy.extraParams.simb_lebar;}
			if(simb_dataStore.proxy.extraParams.simb_alamat!==null){simb_alamatValue = simb_dataStore.proxy.extraParams.simb_alamat;}
			if(simb_dataStore.proxy.extraParams.simb_kel!==null){simb_kelValue = simb_dataStore.proxy.extraParams.simb_kel;}
			if(simb_dataStore.proxy.extraParams.simb_kec!==null){simb_kecValue = simb_dataStore.proxy.extraParams.simb_kec;}
			if(simb_dataStore.proxy.extraParams.simb_bentuk!==null){simb_bentukValue = simb_dataStore.proxy.extraParams.simb_bentuk;}
			if(simb_dataStore.proxy.extraParams.simb_lokasi!==null){simb_lokasiValue = simb_dataStore.proxy.extraParams.simb_lokasi;}
			if(simb_dataStore.proxy.extraParams.simb_gangguan!==null){simb_gangguanValue = simb_dataStore.proxy.extraParams.simb_gangguan;}
			if(simb_dataStore.proxy.extraParams.simb_batasutara!==null){simb_batasutaraValue = simb_dataStore.proxy.extraParams.simb_batasutara;}
			if(simb_dataStore.proxy.extraParams.simb_batastimur!==null){simb_batastimurValue = simb_dataStore.proxy.extraParams.simb_batastimur;}
			if(simb_dataStore.proxy.extraParams.simb_batasselatan!==null){simb_batasselatanValue = simb_dataStore.proxy.extraParams.simb_batasselatan;}
			if(simb_dataStore.proxy.extraParams.simb_batasbarat!==null){simb_batasbaratValue = simb_dataStore.proxy.extraParams.simb_batasbarat;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_t_simb/switchAction',
				params : {
					action : outputType,
					query : searchText,
					simb_per_npwp : simb_per_npwpValue,
					simb_per_nama : simb_per_namaValue,
					simb_per_akta : simb_per_aktaValue,
					simb_per_bentuk : simb_per_bentukValue,
					simb_per_alamat : simb_per_alamatValue,
					simb_per_kel : simb_per_kelValue,
					simb_per_kec : simb_per_kecValue,
					simb_per_kota : simb_per_kotaValue,
					simb_per_telp : simb_per_telpValue,
					simb_jenis : simb_jenisValue,
					simb_status : simb_statusValue,
					simb_jenisusaha : simb_jenisusahaValue,
					simb_panjang : simb_panjangValue,
					simb_lebar : simb_lebarValue,
					simb_alamat : simb_alamatValue,
					simb_kel : simb_kelValue,
					simb_kec : simb_kecValue,
					simb_bentuk : simb_bentukValue,
					simb_lokasi : simb_lokasiValue,
					simb_gangguan : simb_gangguanValue,
					simb_batasutara : simb_batasutaraValue,
					simb_batastimur : simb_batastimurValue,
					simb_batasselatan : simb_batasselatanValue,
					simb_batasbarat : simb_batasbaratValue,
					currentAction : simb_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/t_simb_list.xls');
							}else{
								window.open('./print/t_simb_list.html','simblist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		simb_dataStore = Ext.create('Ext.data.Store',{
			id : 'simb_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_simb/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'simb_id'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'simb_id', type : 'int', mapping : 'simb_id' },
				{ name : 'simb_per_npwp', type : 'string', mapping : 'simb_per_npwp' },
				{ name : 'simb_per_nama', type : 'string', mapping : 'simb_per_nama' },
				{ name : 'simb_per_akta', type : 'string', mapping : 'simb_per_akta' },
				{ name : 'simb_per_bentuk', type : 'int', mapping : 'simb_per_bentuk' },
				{ name : 'simb_per_alamat', type : 'string', mapping : 'simb_per_alamat' },
				{ name : 'simb_per_kel', type : 'string', mapping : 'simb_per_kel' },
				{ name : 'simb_per_kec', type : 'string', mapping : 'simb_per_kec' },
				{ name : 'simb_per_kota', type : 'string', mapping : 'simb_per_kota' },
				{ name : 'simb_per_telp', type : 'string', mapping : 'simb_per_telp' },
				{ name : 'simb_jenis', type : 'string', mapping : 'simb_jenis' },
				{ name : 'simb_status', type : 'int', mapping : 'simb_status' },
				{ name : 'simb_jenisusaha', type : 'string', mapping : 'simb_jenisusaha' },
				{ name : 'simb_panjang', type : 'int', mapping : 'simb_panjang' },
				{ name : 'simb_lebar', type : 'int', mapping : 'simb_lebar' },
				{ name : 'simb_alamat', type : 'string', mapping : 'simb_alamat' },
				{ name : 'simb_kel', type : 'string', mapping : 'simb_kel' },
				{ name : 'simb_kec', type : 'string', mapping : 'simb_kec' },
				{ name : 'simb_bentuk', type : 'int', mapping : 'simb_bentuk' },
				{ name : 'simb_lokasi', type : 'int', mapping : 'simb_lokasi' },
				{ name : 'simb_gangguan', type : 'int', mapping : 'simb_gangguan' },
				{ name : 'simb_batasutara', type : 'string', mapping : 'simb_batasutara' },
				{ name : 'simb_batastimur', type : 'string', mapping : 'simb_batastimur' },
				{ name : 'simb_batasselatan', type : 'string', mapping : 'simb_batasselatan' },
				{ name : 'simb_batasbarat', type : 'string', mapping : 'simb_batasbarat' },
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		simb_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						simb_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						simb_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						simb_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						simb_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						simb_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						simb_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						simb_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						simb_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var simb_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : simb_confirmAdd
		});
		var simb_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : simb_confirmUpdate
		});
		var simb_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : simb_confirmDelete
		});
		var simb_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : simb_refresh
		});
		var simb_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : simb_showSearchWindow
		});
		var simb_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				simb_printExcel('PRINT');
			}
		});
		var simb_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				simb_printExcel('EXCEL');
			}
		});
		
		var simb_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : simb_confirmUpdate
		});
		var simb_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : simb_confirmDelete
		});
		var simb_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : simb_refresh
		});
		simb_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'simb_contextMenu',
			items: [
				simb_contextMenuEdit,simb_contextMenuDelete,'-',simb_contextMenuRefresh
			]
		});
		
		simb_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : simb_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						simb_dataStore.proxy.extraParams = { action : 'GETLIST'};
						simb_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		simb_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'simb_gridPanel',
			constrain : true,
			store : simb_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'simbGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						simb_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : simb_shorcut,
			columns : [
				{
					text : 'simb_per_npwp',
					dataIndex : 'simb_per_npwp',
					width : 100,
					sortable : false
				},
				{
					text : 'simb_per_nama',
					dataIndex : 'simb_per_nama',
					width : 100,
					sortable : false
				},
				{
					text : 'simb_per_akta',
					dataIndex : 'simb_per_akta',
					width : 100,
					sortable : false
				},
				{
					text : 'simb_per_bentuk',
					dataIndex : 'simb_per_bentuk',
					width : 100,
					sortable : false
				},
				{
					text : 'simb_per_alamat',
					dataIndex : 'simb_per_alamat',
					width : 100,
					sortable : false
				},
				{
					text : 'simb_per_kel',
					dataIndex : 'simb_per_kel',
					width : 100,
					sortable : false
				},
				{
					text : 'simb_per_kec',
					dataIndex : 'simb_per_kec',
					width : 100,
					sortable : false
				},
				{
					text : 'simb_per_kota',
					dataIndex : 'simb_per_kota',
					width : 100,
					sortable : false
				},
				{
					text : 'simb_per_telp',
					dataIndex : 'simb_per_telp',
					width : 100,
					sortable : false
				},
				{
					text : 'simb_jenis',
					dataIndex : 'simb_jenis',
					width : 100,
					sortable : false
				},
				{
					text : 'simb_status',
					dataIndex : 'simb_status',
					width : 100,
					sortable : false
				},
				{
					text : 'simb_jenisusaha',
					dataIndex : 'simb_jenisusaha',
					width : 100,
					sortable : false
				},
				{
					text : 'simb_panjang',
					dataIndex : 'simb_panjang',
					width : 100,
					sortable : false
				},
				{
					text : 'simb_lebar',
					dataIndex : 'simb_lebar',
					width : 100,
					sortable : false
				},
				{
					text : 'simb_alamat',
					dataIndex : 'simb_alamat',
					width : 100,
					sortable : false
				},
				{
					text : 'simb_kel',
					dataIndex : 'simb_kel',
					width : 100,
					sortable : false
				},
				{
					text : 'simb_kec',
					dataIndex : 'simb_kec',
					width : 100,
					sortable : false
				},
				{
					text : 'simb_bentuk',
					dataIndex : 'simb_bentuk',
					width : 100,
					sortable : false
				},
				{
					text : 'simb_lokasi',
					dataIndex : 'simb_lokasi',
					width : 100,
					sortable : false
				},
				{
					text : 'simb_gangguan',
					dataIndex : 'simb_gangguan',
					width : 100,
					sortable : false
				},
				{
					text : 'simb_batasutara',
					dataIndex : 'simb_batasutara',
					width : 100,
					sortable : false
				},
				{
					text : 'simb_batastimur',
					dataIndex : 'simb_batastimur',
					width : 100,
					sortable : false
				},
				{
					text : 'simb_batasselatan',
					dataIndex : 'simb_batasselatan',
					width : 100,
					sortable : false
				},
				{
					text : 'simb_batasbarat',
					dataIndex : 'simb_batasbarat',
					width : 100,
					sortable : false
				},
							
			],
			tbar : [
				simb_addButton,
				simb_editButton,
				simb_deleteButton,
				simb_gridSearchField,
				simb_searchButton,
				simb_refreshButton,
				simb_printButton,
				simb_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : simb_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					simb_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		simb_idField = Ext.create('Ext.form.NumberField',{
			id : 'simb_idField',
			name : 'simb_id',
			fieldLabel : 'simb_id<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		simb_per_npwpField = Ext.create('Ext.form.TextField',{
			id : 'simb_per_npwpField',
			name : 'simb_per_npwp',
			fieldLabel : 'simb_per_npwp',
			maxLength : 50
		});
		simb_per_namaField = Ext.create('Ext.form.TextField',{
			id : 'simb_per_namaField',
			name : 'simb_per_nama',
			fieldLabel : 'simb_per_nama',
			maxLength : 50
		});
		simb_per_aktaField = Ext.create('Ext.form.TextField',{
			id : 'simb_per_aktaField',
			name : 'simb_per_akta',
			fieldLabel : 'simb_per_akta',
			maxLength : 50
		});
		simb_per_bentukField = Ext.create('Ext.form.NumberField',{
			id : 'simb_per_bentukField',
			name : 'simb_per_bentuk',
			fieldLabel : 'simb_per_bentuk',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		simb_per_alamatField = Ext.create('Ext.form.TextField',{
			id : 'simb_per_alamatField',
			name : 'simb_per_alamat',
			fieldLabel : 'simb_per_alamat',
			maxLength : 200
		});
		simb_per_kelField = Ext.create('Ext.form.TextField',{
			id : 'simb_per_kelField',
			name : 'simb_per_kel',
			fieldLabel : 'simb_per_kel',
			maxLength : 50
		});
		simb_per_kecField = Ext.create('Ext.form.TextField',{
			id : 'simb_per_kecField',
			name : 'simb_per_kec',
			fieldLabel : 'simb_per_kec',
			maxLength : 50
		});
		simb_per_kotaField = Ext.create('Ext.form.TextField',{
			id : 'simb_per_kotaField',
			name : 'simb_per_kota',
			fieldLabel : 'simb_per_kota',
			maxLength : 50
		});
		simb_per_telpField = Ext.create('Ext.form.TextField',{
			id : 'simb_per_telpField',
			name : 'simb_per_telp',
			fieldLabel : 'simb_per_telp',
			maxLength : 20
		});
		simb_jenisField = Ext.create('Ext.form.TextField',{
			id : 'simb_jenisField',
			name : 'simb_jenis',
			fieldLabel : 'simb_jenis',
			maxLength : 50
		});
		simb_statusField = Ext.create('Ext.form.NumberField',{
			id : 'simb_statusField',
			name : 'simb_status',
			fieldLabel : 'simb_status',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		simb_jenisusahaField = Ext.create('Ext.form.TextField',{
			id : 'simb_jenisusahaField',
			name : 'simb_jenisusaha',
			fieldLabel : 'simb_jenisusaha',
			maxLength : 50
		});
		simb_panjangField = Ext.create('Ext.form.NumberField',{
			id : 'simb_panjangField',
			name : 'simb_panjang',
			fieldLabel : 'simb_panjang',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		simb_lebarField = Ext.create('Ext.form.NumberField',{
			id : 'simb_lebarField',
			name : 'simb_lebar',
			fieldLabel : 'simb_lebar',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		simb_alamatField = Ext.create('Ext.form.TextField',{
			id : 'simb_alamatField',
			name : 'simb_alamat',
			fieldLabel : 'simb_alamat',
			maxLength : 100
		});
		simb_kelField = Ext.create('Ext.form.TextField',{
			id : 'simb_kelField',
			name : 'simb_kel',
			fieldLabel : 'simb_kel',
			maxLength : 50
		});
		simb_kecField = Ext.create('Ext.form.TextField',{
			id : 'simb_kecField',
			name : 'simb_kec',
			fieldLabel : 'simb_kec',
			maxLength : 50
		});
		simb_bentukField = Ext.create('Ext.form.NumberField',{
			id : 'simb_bentukField',
			name : 'simb_bentuk',
			fieldLabel : 'simb_bentuk',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		simb_lokasiField = Ext.create('Ext.form.NumberField',{
			id : 'simb_lokasiField',
			name : 'simb_lokasi',
			fieldLabel : 'simb_lokasi',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		simb_gangguanField = Ext.create('Ext.form.NumberField',{
			id : 'simb_gangguanField',
			name : 'simb_gangguan',
			fieldLabel : 'simb_gangguan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		simb_batasutaraField = Ext.create('Ext.form.TextField',{
			id : 'simb_batasutaraField',
			name : 'simb_batasutara',
			fieldLabel : 'simb_batasutara',
			maxLength : 100
		});
		simb_batastimurField = Ext.create('Ext.form.TextField',{
			id : 'simb_batastimurField',
			name : 'simb_batastimur',
			fieldLabel : 'simb_batastimur',
			maxLength : 100
		});
		simb_batasselatanField = Ext.create('Ext.form.TextField',{
			id : 'simb_batasselatanField',
			name : 'simb_batasselatan',
			fieldLabel : 'simb_batasselatan',
			maxLength : 100
		});
		simb_batasbaratField = Ext.create('Ext.form.TextField',{
			id : 'simb_batasbaratField',
			name : 'simb_batasbarat',
			fieldLabel : 'simb_batasbarat',
			maxLength : 100
		});
		var simb_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : simb_save
		});
		var simb_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				simb_resetForm();
				simb_switchToGrid();
			}
		});
		simb_formPanel = Ext.create('Ext.form.Panel', {
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
						simb_idField,
						simb_per_npwpField,
						simb_per_namaField,
						simb_per_aktaField,
						simb_per_bentukField,
						simb_per_alamatField,
						simb_per_kelField,
						simb_per_kecField,
						simb_per_kotaField,
						simb_per_telpField,
						simb_jenisField,
						simb_statusField,
						simb_jenisusahaField,
						simb_panjangField,
						simb_lebarField,
						simb_alamatField,
						simb_kelField,
						simb_kecField,
						simb_bentukField,
						simb_lokasiField,
						simb_gangguanField,
						simb_batasutaraField,
						simb_batastimurField,
						simb_batasselatanField,
						simb_batasbaratField,
											]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [simb_saveButton,simb_cancelButton]
		});
		simb_formWindow = Ext.create('Ext.window.Window',{
			id : 'simb_formWindow',
			renderTo : 'simbSaveWindow',
			title : globalFormAddEditTitle + ' ' + simb_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [simb_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		simb_per_npwpSearchField = Ext.create('Ext.form.TextField',{
			id : 'simb_per_npwpSearchField',
			name : 'simb_per_npwp',
			fieldLabel : 'simb_per_npwp',
			maxLength : 50
		
		});
		simb_per_namaSearchField = Ext.create('Ext.form.TextField',{
			id : 'simb_per_namaSearchField',
			name : 'simb_per_nama',
			fieldLabel : 'simb_per_nama',
			maxLength : 50
		
		});
		simb_per_aktaSearchField = Ext.create('Ext.form.TextField',{
			id : 'simb_per_aktaSearchField',
			name : 'simb_per_akta',
			fieldLabel : 'simb_per_akta',
			maxLength : 50
		
		});
		simb_per_bentukSearchField = Ext.create('Ext.form.NumberField',{
			id : 'simb_per_bentukSearchField',
			name : 'simb_per_bentuk',
			fieldLabel : 'simb_per_bentuk',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		simb_per_alamatSearchField = Ext.create('Ext.form.TextField',{
			id : 'simb_per_alamatSearchField',
			name : 'simb_per_alamat',
			fieldLabel : 'simb_per_alamat',
			maxLength : 200
		
		});
		simb_per_kelSearchField = Ext.create('Ext.form.TextField',{
			id : 'simb_per_kelSearchField',
			name : 'simb_per_kel',
			fieldLabel : 'simb_per_kel',
			maxLength : 50
		
		});
		simb_per_kecSearchField = Ext.create('Ext.form.TextField',{
			id : 'simb_per_kecSearchField',
			name : 'simb_per_kec',
			fieldLabel : 'simb_per_kec',
			maxLength : 50
		
		});
		simb_per_kotaSearchField = Ext.create('Ext.form.TextField',{
			id : 'simb_per_kotaSearchField',
			name : 'simb_per_kota',
			fieldLabel : 'simb_per_kota',
			maxLength : 50
		
		});
		simb_per_telpSearchField = Ext.create('Ext.form.TextField',{
			id : 'simb_per_telpSearchField',
			name : 'simb_per_telp',
			fieldLabel : 'simb_per_telp',
			maxLength : 20
		
		});
		simb_jenisSearchField = Ext.create('Ext.form.TextField',{
			id : 'simb_jenisSearchField',
			name : 'simb_jenis',
			fieldLabel : 'simb_jenis',
			maxLength : 50
		
		});
		simb_statusSearchField = Ext.create('Ext.form.NumberField',{
			id : 'simb_statusSearchField',
			name : 'simb_status',
			fieldLabel : 'simb_status',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		simb_jenisusahaSearchField = Ext.create('Ext.form.TextField',{
			id : 'simb_jenisusahaSearchField',
			name : 'simb_jenisusaha',
			fieldLabel : 'simb_jenisusaha',
			maxLength : 50
		
		});
		simb_panjangSearchField = Ext.create('Ext.form.NumberField',{
			id : 'simb_panjangSearchField',
			name : 'simb_panjang',
			fieldLabel : 'simb_panjang',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		simb_lebarSearchField = Ext.create('Ext.form.NumberField',{
			id : 'simb_lebarSearchField',
			name : 'simb_lebar',
			fieldLabel : 'simb_lebar',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		simb_alamatSearchField = Ext.create('Ext.form.TextField',{
			id : 'simb_alamatSearchField',
			name : 'simb_alamat',
			fieldLabel : 'simb_alamat',
			maxLength : 100
		
		});
		simb_kelSearchField = Ext.create('Ext.form.TextField',{
			id : 'simb_kelSearchField',
			name : 'simb_kel',
			fieldLabel : 'simb_kel',
			maxLength : 50
		
		});
		simb_kecSearchField = Ext.create('Ext.form.TextField',{
			id : 'simb_kecSearchField',
			name : 'simb_kec',
			fieldLabel : 'simb_kec',
			maxLength : 50
		
		});
		simb_bentukSearchField = Ext.create('Ext.form.NumberField',{
			id : 'simb_bentukSearchField',
			name : 'simb_bentuk',
			fieldLabel : 'simb_bentuk',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		simb_lokasiSearchField = Ext.create('Ext.form.NumberField',{
			id : 'simb_lokasiSearchField',
			name : 'simb_lokasi',
			fieldLabel : 'simb_lokasi',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		simb_gangguanSearchField = Ext.create('Ext.form.NumberField',{
			id : 'simb_gangguanSearchField',
			name : 'simb_gangguan',
			fieldLabel : 'simb_gangguan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		simb_batasutaraSearchField = Ext.create('Ext.form.TextField',{
			id : 'simb_batasutaraSearchField',
			name : 'simb_batasutara',
			fieldLabel : 'simb_batasutara',
			maxLength : 100
		
		});
		simb_batastimurSearchField = Ext.create('Ext.form.TextField',{
			id : 'simb_batastimurSearchField',
			name : 'simb_batastimur',
			fieldLabel : 'simb_batastimur',
			maxLength : 100
		
		});
		simb_batasselatanSearchField = Ext.create('Ext.form.TextField',{
			id : 'simb_batasselatanSearchField',
			name : 'simb_batasselatan',
			fieldLabel : 'simb_batasselatan',
			maxLength : 100
		
		});
		simb_batasbaratSearchField = Ext.create('Ext.form.TextField',{
			id : 'simb_batasbaratSearchField',
			name : 'simb_batasbarat',
			fieldLabel : 'simb_batasbarat',
			maxLength : 100
		
		});
		var simb_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : simb_search
		});
		var simb_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				simb_searchWindow.hide();
			}
		});
		simb_searchPanel = Ext.create('Ext.form.Panel', {
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
						simb_per_npwpSearchField,
						simb_per_namaSearchField,
						simb_per_aktaSearchField,
						simb_per_bentukSearchField,
						simb_per_alamatSearchField,
						simb_per_kelSearchField,
						simb_per_kecSearchField,
						simb_per_kotaSearchField,
						simb_per_telpSearchField,
						simb_jenisSearchField,
						simb_statusSearchField,
						simb_jenisusahaSearchField,
						simb_panjangSearchField,
						simb_lebarSearchField,
						simb_alamatSearchField,
						simb_kelSearchField,
						simb_kecSearchField,
						simb_bentukSearchField,
						simb_lokasiSearchField,
						simb_gangguanSearchField,
						simb_batasutaraSearchField,
						simb_batastimurSearchField,
						simb_batasselatanSearchField,
						simb_batasbaratSearchField,
						]
				}],
			buttons : [simb_searchingButton,simb_cancelSearchButton]
		});
		simb_searchWindow = Ext.create('Ext.window.Window',{
			id : 'simb_searchWindow',
			renderTo : 'simbSearchWindow',
			title : globalFormSearchTitle + ' ' + simb_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [simb_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="simbSaveWindow"></div>
<div id="simbSearchWindow"></div>
<div class="span12" id="simbGrid"></div>