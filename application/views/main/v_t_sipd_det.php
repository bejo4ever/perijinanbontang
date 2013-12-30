<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var sipd_det_componentItemTitle="SIPD_DET";
		var sipd_det_dataStore;
		
		var sipd_det_shorcut;
		var sipd_det_contextMenu;
		var sipd_det_gridSearchField;
		var sipd_det_gridPanel;
		var sipd_det_formPanel;
		var sipd_det_formWindow;
		var sipd_det_searchPanel;
		var sipd_det_searchWindow;
		
		var det_sipd_idField;
		var det_sipd_sipd_idField;
		var det_sipd_jenisField;
		var det_sipd_tanggalField;
		var det_sipd_pemohon_idField;
		var det_sipd_nomorregField;
		var det_sipd_prosesField;
		var det_sipd_skField;
		var det_sipd_skurutField;
		var det_sipd_berlakuField;
		var det_sipd_kadaluarsaField;
		var det_sipd_terimaField;
		var det_sipd_terimatanggalField;
		var det_sipd_kelengkapanField;
		var det_sipd_bapField;
		var det_sipd_keputusanField;
		var det_sipd_baptanggalField;
		var det_sipd_sipField;
		var det_sipd_nropField;
		var det_sipd_strField;
		var det_sipd_kompetensiField;
				
		var det_sipd_sipd_idSearchField;
		var det_sipd_jenisSearchField;
		var det_sipd_tanggalSearchField;
		var det_sipd_pemohon_idSearchField;
		var det_sipd_nomorregSearchField;
		var det_sipd_prosesSearchField;
		var det_sipd_skSearchField;
		var det_sipd_skurutSearchField;
		var det_sipd_berlakuSearchField;
		var det_sipd_kadaluarsaSearchField;
		var det_sipd_terimaSearchField;
		var det_sipd_terimatanggalSearchField;
		var det_sipd_kelengkapanSearchField;
		var det_sipd_bapSearchField;
		var det_sipd_keputusanSearchField;
		var det_sipd_baptanggalSearchField;
		var det_sipd_sipSearchField;
		var det_sipd_nropSearchField;
		var det_sipd_strSearchField;
		var det_sipd_kompetensiSearchField;
				
		var sipd_det_dbTask = 'CREATE';
		var sipd_det_dbTaskMessage = 'Tambah';
		var sipd_det_dbPermission = 'CRUD';
		var sipd_det_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function sipd_det_switchToGrid(){
			sipd_det_formPanel.setDisabled(true);
			sipd_det_gridPanel.setDisabled(false);
			sipd_det_formWindow.hide();
		}
		
		function sipd_det_switchToForm(){
			sipd_det_gridPanel.setDisabled(true);
			sipd_det_formPanel.setDisabled(false);
			sipd_det_formWindow.show();
		}
		
		function sipd_det_confirmAdd(){
			sipd_det_dbTask = 'CREATE';
			sipd_det_dbTaskMessage = 'created';
			sipd_det_resetForm();
			sipd_det_switchToForm();
		}
		
		function sipd_det_confirmUpdate(){
			if(sipd_det_gridPanel.selModel.getCount() == 1) {
				sipd_det_dbTask = 'UPDATE';
				sipd_det_dbTaskMessage = 'updated';
				sipd_det_switchToForm();
				sipd_det_setForm();
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
		
		function sipd_det_confirmDelete(){
			if(sipd_det_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, sipd_det_delete);
			}else if(sipd_det_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, sipd_det_delete);
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
		
		function sipd_det_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(sipd_det_dbPermission)==false && pattC.test(sipd_det_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(sipd_det_confirmFormValid()){
					var det_sipd_idValue = '';
					var det_sipd_sipd_idValue = '';
					var det_sipd_jenisValue = '';
					var det_sipd_tanggalValue = '';
					var det_sipd_pemohon_idValue = '';
					var det_sipd_nomorregValue = '';
					var det_sipd_prosesValue = '';
					var det_sipd_skValue = '';
					var det_sipd_skurutValue = '';
					var det_sipd_berlakuValue = '';
					var det_sipd_kadaluarsaValue = '';
					var det_sipd_terimaValue = '';
					var det_sipd_terimatanggalValue = '';
					var det_sipd_kelengkapanValue = '';
					var det_sipd_bapValue = '';
					var det_sipd_keputusanValue = '';
					var det_sipd_baptanggalValue = '';
					var det_sipd_sipValue = '';
					var det_sipd_nropValue = '';
					var det_sipd_strValue = '';
					var det_sipd_kompetensiValue = '';
										
					det_sipd_idValue = det_sipd_idField.getValue();
					det_sipd_sipd_idValue = det_sipd_sipd_idField.getValue();
					det_sipd_jenisValue = det_sipd_jenisField.getValue();
					det_sipd_tanggalValue = det_sipd_tanggalField.getValue();
					det_sipd_pemohon_idValue = det_sipd_pemohon_idField.getValue();
					det_sipd_nomorregValue = det_sipd_nomorregField.getValue();
					det_sipd_prosesValue = det_sipd_prosesField.getValue();
					det_sipd_skValue = det_sipd_skField.getValue();
					det_sipd_skurutValue = det_sipd_skurutField.getValue();
					det_sipd_berlakuValue = det_sipd_berlakuField.getValue();
					det_sipd_kadaluarsaValue = det_sipd_kadaluarsaField.getValue();
					det_sipd_terimaValue = det_sipd_terimaField.getValue();
					det_sipd_terimatanggalValue = det_sipd_terimatanggalField.getValue();
					det_sipd_kelengkapanValue = det_sipd_kelengkapanField.getValue();
					det_sipd_bapValue = det_sipd_bapField.getValue();
					det_sipd_keputusanValue = det_sipd_keputusanField.getValue();
					det_sipd_baptanggalValue = det_sipd_baptanggalField.getValue();
					det_sipd_sipValue = det_sipd_sipField.getValue();
					det_sipd_nropValue = det_sipd_nropField.getValue();
					det_sipd_strValue = det_sipd_strField.getValue();
					det_sipd_kompetensiValue = det_sipd_kompetensiField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_t_sipd_det/switchAction',
						params: {							
							det_sipd_id : det_sipd_idValue,
							det_sipd_sipd_id : det_sipd_sipd_idValue,
							det_sipd_jenis : det_sipd_jenisValue,
							det_sipd_tanggal : det_sipd_tanggalValue,
							det_sipd_pemohon_id : det_sipd_pemohon_idValue,
							det_sipd_nomorreg : det_sipd_nomorregValue,
							det_sipd_proses : det_sipd_prosesValue,
							det_sipd_sk : det_sipd_skValue,
							det_sipd_skurut : det_sipd_skurutValue,
							det_sipd_berlaku : det_sipd_berlakuValue,
							det_sipd_kadaluarsa : det_sipd_kadaluarsaValue,
							det_sipd_terima : det_sipd_terimaValue,
							det_sipd_terimatanggal : det_sipd_terimatanggalValue,
							det_sipd_kelengkapan : det_sipd_kelengkapanValue,
							det_sipd_bap : det_sipd_bapValue,
							det_sipd_keputusan : det_sipd_keputusanValue,
							det_sipd_baptanggal : det_sipd_baptanggalValue,
							det_sipd_sip : det_sipd_sipValue,
							det_sipd_nrop : det_sipd_nropValue,
							det_sipd_str : det_sipd_strValue,
							det_sipd_kompetensi : det_sipd_kompetensiValue,
							action : sipd_det_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									sipd_det_dataStore.reload();
									sipd_det_resetForm();
									sipd_det_switchToGrid();
									sipd_det_gridPanel.getSelectionModel().deselectAll();
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
		
		function sipd_det_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(sipd_det_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = sipd_det_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< sipd_det_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.det_sipd_id);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_t_sipd_det/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									sipd_det_dataStore.reload();
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
		
		function sipd_det_refresh(){
			sipd_det_dbListAction = "GETLIST";
			sipd_det_gridSearchField.reset();
			sipd_det_searchPanel.getForm().reset();
			sipd_det_dataStore.proxy.extraParams = { action : 'GETLIST' };
			sipd_det_dataStore.proxy.extraParams.query = "";
			sipd_det_dataStore.currentPage = 1;
			sipd_det_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function sipd_det_confirmFormValid(){
			return sipd_det_formPanel.getForm().isValid();
		}
		
		function sipd_det_resetForm(){
			sipd_det_dbTask = 'CREATE';
			sipd_det_dbTaskMessage = 'create';
			sipd_det_formPanel.getForm().reset();
			det_sipd_idField.setValue(0);
		}
		
		function sipd_det_setForm(){
			sipd_det_dbTask = 'UPDATE';
            sipd_det_dbTaskMessage = 'update';
			
			var record = sipd_det_gridPanel.getSelectionModel().getSelection()[0];
			det_sipd_idField.setValue(record.data.det_sipd_id);
			det_sipd_sipd_idField.setValue(record.data.det_sipd_sipd_id);
			det_sipd_jenisField.setValue(record.data.det_sipd_jenis);
			det_sipd_tanggalField.setValue(record.data.det_sipd_tanggal);
			det_sipd_pemohon_idField.setValue(record.data.det_sipd_pemohon_id);
			det_sipd_nomorregField.setValue(record.data.det_sipd_nomorreg);
			det_sipd_prosesField.setValue(record.data.det_sipd_proses);
			det_sipd_skField.setValue(record.data.det_sipd_sk);
			det_sipd_skurutField.setValue(record.data.det_sipd_skurut);
			det_sipd_berlakuField.setValue(record.data.det_sipd_berlaku);
			det_sipd_kadaluarsaField.setValue(record.data.det_sipd_kadaluarsa);
			det_sipd_terimaField.setValue(record.data.det_sipd_terima);
			det_sipd_terimatanggalField.setValue(record.data.det_sipd_terimatanggal);
			det_sipd_kelengkapanField.setValue(record.data.det_sipd_kelengkapan);
			det_sipd_bapField.setValue(record.data.det_sipd_bap);
			det_sipd_keputusanField.setValue(record.data.det_sipd_keputusan);
			det_sipd_baptanggalField.setValue(record.data.det_sipd_baptanggal);
			det_sipd_sipField.setValue(record.data.det_sipd_sip);
			det_sipd_nropField.setValue(record.data.det_sipd_nrop);
			det_sipd_strField.setValue(record.data.det_sipd_str);
			det_sipd_kompetensiField.setValue(record.data.det_sipd_kompetensi);
					}
		
		function sipd_det_showSearchWindow(){
			sipd_det_searchWindow.show();
		}
		
		function sipd_det_search(){
			sipd_det_gridSearchField.reset();
			
			var det_sipd_sipd_idValue = '';
			var det_sipd_jenisValue = '';
			var det_sipd_tanggalValue = '';
			var det_sipd_pemohon_idValue = '';
			var det_sipd_nomorregValue = '';
			var det_sipd_prosesValue = '';
			var det_sipd_skValue = '';
			var det_sipd_skurutValue = '';
			var det_sipd_berlakuValue = '';
			var det_sipd_kadaluarsaValue = '';
			var det_sipd_terimaValue = '';
			var det_sipd_terimatanggalValue = '';
			var det_sipd_kelengkapanValue = '';
			var det_sipd_bapValue = '';
			var det_sipd_keputusanValue = '';
			var det_sipd_baptanggalValue = '';
			var det_sipd_sipValue = '';
			var det_sipd_nropValue = '';
			var det_sipd_strValue = '';
			var det_sipd_kompetensiValue = '';
						
			det_sipd_sipd_idValue = det_sipd_sipd_idSearchField.getValue();
			det_sipd_jenisValue = det_sipd_jenisSearchField.getValue();
			det_sipd_tanggalValue = det_sipd_tanggalSearchField.getValue();
			det_sipd_pemohon_idValue = det_sipd_pemohon_idSearchField.getValue();
			det_sipd_nomorregValue = det_sipd_nomorregSearchField.getValue();
			det_sipd_prosesValue = det_sipd_prosesSearchField.getValue();
			det_sipd_skValue = det_sipd_skSearchField.getValue();
			det_sipd_skurutValue = det_sipd_skurutSearchField.getValue();
			det_sipd_berlakuValue = det_sipd_berlakuSearchField.getValue();
			det_sipd_kadaluarsaValue = det_sipd_kadaluarsaSearchField.getValue();
			det_sipd_terimaValue = det_sipd_terimaSearchField.getValue();
			det_sipd_terimatanggalValue = det_sipd_terimatanggalSearchField.getValue();
			det_sipd_kelengkapanValue = det_sipd_kelengkapanSearchField.getValue();
			det_sipd_bapValue = det_sipd_bapSearchField.getValue();
			det_sipd_keputusanValue = det_sipd_keputusanSearchField.getValue();
			det_sipd_baptanggalValue = det_sipd_baptanggalSearchField.getValue();
			det_sipd_sipValue = det_sipd_sipSearchField.getValue();
			det_sipd_nropValue = det_sipd_nropSearchField.getValue();
			det_sipd_strValue = det_sipd_strSearchField.getValue();
			det_sipd_kompetensiValue = det_sipd_kompetensiSearchField.getValue();
			sipd_det_dbListAction = "SEARCH";
			sipd_det_dataStore.proxy.extraParams = { 
				det_sipd_sipd_id : det_sipd_sipd_idValue,
				det_sipd_jenis : det_sipd_jenisValue,
				det_sipd_tanggal : det_sipd_tanggalValue,
				det_sipd_pemohon_id : det_sipd_pemohon_idValue,
				det_sipd_nomorreg : det_sipd_nomorregValue,
				det_sipd_proses : det_sipd_prosesValue,
				det_sipd_sk : det_sipd_skValue,
				det_sipd_skurut : det_sipd_skurutValue,
				det_sipd_berlaku : det_sipd_berlakuValue,
				det_sipd_kadaluarsa : det_sipd_kadaluarsaValue,
				det_sipd_terima : det_sipd_terimaValue,
				det_sipd_terimatanggal : det_sipd_terimatanggalValue,
				det_sipd_kelengkapan : det_sipd_kelengkapanValue,
				det_sipd_bap : det_sipd_bapValue,
				det_sipd_keputusan : det_sipd_keputusanValue,
				det_sipd_baptanggal : det_sipd_baptanggalValue,
				det_sipd_sip : det_sipd_sipValue,
				det_sipd_nrop : det_sipd_nropValue,
				det_sipd_str : det_sipd_strValue,
				det_sipd_kompetensi : det_sipd_kompetensiValue,
				action : 'SEARCH'
			};
			sipd_det_dataStore.currentPage = 1;
			sipd_det_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function sipd_det_printExcel(outputType){
			var searchText = "";
			var det_sipd_sipd_idValue = '';
			var det_sipd_jenisValue = '';
			var det_sipd_tanggalValue = '';
			var det_sipd_pemohon_idValue = '';
			var det_sipd_nomorregValue = '';
			var det_sipd_prosesValue = '';
			var det_sipd_skValue = '';
			var det_sipd_skurutValue = '';
			var det_sipd_berlakuValue = '';
			var det_sipd_kadaluarsaValue = '';
			var det_sipd_terimaValue = '';
			var det_sipd_terimatanggalValue = '';
			var det_sipd_kelengkapanValue = '';
			var det_sipd_bapValue = '';
			var det_sipd_keputusanValue = '';
			var det_sipd_baptanggalValue = '';
			var det_sipd_sipValue = '';
			var det_sipd_nropValue = '';
			var det_sipd_strValue = '';
			var det_sipd_kompetensiValue = '';
			
			if(sipd_det_dataStore.proxy.extraParams.query!==null){searchText = sipd_det_dataStore.proxy.extraParams.query;}
			if(sipd_det_dataStore.proxy.extraParams.det_sipd_sipd_id!==null){det_sipd_sipd_idValue = sipd_det_dataStore.proxy.extraParams.det_sipd_sipd_id;}
			if(sipd_det_dataStore.proxy.extraParams.det_sipd_jenis!==null){det_sipd_jenisValue = sipd_det_dataStore.proxy.extraParams.det_sipd_jenis;}
			if(sipd_det_dataStore.proxy.extraParams.det_sipd_tanggal!==null){det_sipd_tanggalValue = sipd_det_dataStore.proxy.extraParams.det_sipd_tanggal;}
			if(sipd_det_dataStore.proxy.extraParams.det_sipd_pemohon_id!==null){det_sipd_pemohon_idValue = sipd_det_dataStore.proxy.extraParams.det_sipd_pemohon_id;}
			if(sipd_det_dataStore.proxy.extraParams.det_sipd_nomorreg!==null){det_sipd_nomorregValue = sipd_det_dataStore.proxy.extraParams.det_sipd_nomorreg;}
			if(sipd_det_dataStore.proxy.extraParams.det_sipd_proses!==null){det_sipd_prosesValue = sipd_det_dataStore.proxy.extraParams.det_sipd_proses;}
			if(sipd_det_dataStore.proxy.extraParams.det_sipd_sk!==null){det_sipd_skValue = sipd_det_dataStore.proxy.extraParams.det_sipd_sk;}
			if(sipd_det_dataStore.proxy.extraParams.det_sipd_skurut!==null){det_sipd_skurutValue = sipd_det_dataStore.proxy.extraParams.det_sipd_skurut;}
			if(sipd_det_dataStore.proxy.extraParams.det_sipd_berlaku!==null){det_sipd_berlakuValue = sipd_det_dataStore.proxy.extraParams.det_sipd_berlaku;}
			if(sipd_det_dataStore.proxy.extraParams.det_sipd_kadaluarsa!==null){det_sipd_kadaluarsaValue = sipd_det_dataStore.proxy.extraParams.det_sipd_kadaluarsa;}
			if(sipd_det_dataStore.proxy.extraParams.det_sipd_terima!==null){det_sipd_terimaValue = sipd_det_dataStore.proxy.extraParams.det_sipd_terima;}
			if(sipd_det_dataStore.proxy.extraParams.det_sipd_terimatanggal!==null){det_sipd_terimatanggalValue = sipd_det_dataStore.proxy.extraParams.det_sipd_terimatanggal;}
			if(sipd_det_dataStore.proxy.extraParams.det_sipd_kelengkapan!==null){det_sipd_kelengkapanValue = sipd_det_dataStore.proxy.extraParams.det_sipd_kelengkapan;}
			if(sipd_det_dataStore.proxy.extraParams.det_sipd_bap!==null){det_sipd_bapValue = sipd_det_dataStore.proxy.extraParams.det_sipd_bap;}
			if(sipd_det_dataStore.proxy.extraParams.det_sipd_keputusan!==null){det_sipd_keputusanValue = sipd_det_dataStore.proxy.extraParams.det_sipd_keputusan;}
			if(sipd_det_dataStore.proxy.extraParams.det_sipd_baptanggal!==null){det_sipd_baptanggalValue = sipd_det_dataStore.proxy.extraParams.det_sipd_baptanggal;}
			if(sipd_det_dataStore.proxy.extraParams.det_sipd_sip!==null){det_sipd_sipValue = sipd_det_dataStore.proxy.extraParams.det_sipd_sip;}
			if(sipd_det_dataStore.proxy.extraParams.det_sipd_nrop!==null){det_sipd_nropValue = sipd_det_dataStore.proxy.extraParams.det_sipd_nrop;}
			if(sipd_det_dataStore.proxy.extraParams.det_sipd_str!==null){det_sipd_strValue = sipd_det_dataStore.proxy.extraParams.det_sipd_str;}
			if(sipd_det_dataStore.proxy.extraParams.det_sipd_kompetensi!==null){det_sipd_kompetensiValue = sipd_det_dataStore.proxy.extraParams.det_sipd_kompetensi;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_t_sipd_det/switchAction',
				params : {
					action : outputType,
					query : searchText,
					det_sipd_sipd_id : det_sipd_sipd_idValue,
					det_sipd_jenis : det_sipd_jenisValue,
					det_sipd_tanggal : det_sipd_tanggalValue,
					det_sipd_pemohon_id : det_sipd_pemohon_idValue,
					det_sipd_nomorreg : det_sipd_nomorregValue,
					det_sipd_proses : det_sipd_prosesValue,
					det_sipd_sk : det_sipd_skValue,
					det_sipd_skurut : det_sipd_skurutValue,
					det_sipd_berlaku : det_sipd_berlakuValue,
					det_sipd_kadaluarsa : det_sipd_kadaluarsaValue,
					det_sipd_terima : det_sipd_terimaValue,
					det_sipd_terimatanggal : det_sipd_terimatanggalValue,
					det_sipd_kelengkapan : det_sipd_kelengkapanValue,
					det_sipd_bap : det_sipd_bapValue,
					det_sipd_keputusan : det_sipd_keputusanValue,
					det_sipd_baptanggal : det_sipd_baptanggalValue,
					det_sipd_sip : det_sipd_sipValue,
					det_sipd_nrop : det_sipd_nropValue,
					det_sipd_str : det_sipd_strValue,
					det_sipd_kompetensi : det_sipd_kompetensiValue,
					currentAction : sipd_det_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/t_sipd_det_list.xls');
							}else{
								window.open('./print/t_sipd_det_list.html','sipd_detlist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		sipd_det_dataStore = Ext.create('Ext.data.Store',{
			id : 'sipd_det_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_sipd_det/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'det_sipd_id'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'det_sipd_id', type : 'int', mapping : 'det_sipd_id' },
				{ name : 'det_sipd_sipd_id', type : 'int', mapping : 'det_sipd_sipd_id' },
				{ name : 'det_sipd_jenis', type : 'int', mapping : 'det_sipd_jenis' },
				{ name : 'det_sipd_tanggal', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'det_sipd_tanggal' },
				{ name : 'det_sipd_pemohon_id', type : 'int', mapping : 'det_sipd_pemohon_id' },
				{ name : 'det_sipd_nomorreg', type : 'string', mapping : 'det_sipd_nomorreg' },
				{ name : 'det_sipd_proses', type : 'string', mapping : 'det_sipd_proses' },
				{ name : 'det_sipd_sk', type : 'string', mapping : 'det_sipd_sk' },
				{ name : 'det_sipd_skurut', type : 'int', mapping : 'det_sipd_skurut' },
				{ name : 'det_sipd_berlaku', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'det_sipd_berlaku' },
				{ name : 'det_sipd_kadaluarsa', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'det_sipd_kadaluarsa' },
				{ name : 'det_sipd_terima', type : 'string', mapping : 'det_sipd_terima' },
				{ name : 'det_sipd_terimatanggal', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'det_sipd_terimatanggal' },
				{ name : 'det_sipd_kelengkapan', type : 'int', mapping : 'det_sipd_kelengkapan' },
				{ name : 'det_sipd_bap', type : 'string', mapping : 'det_sipd_bap' },
				{ name : 'det_sipd_keputusan', type : 'int', mapping : 'det_sipd_keputusan' },
				{ name : 'det_sipd_baptanggal', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'det_sipd_baptanggal' },
				{ name : 'det_sipd_sip', type : 'string', mapping : 'det_sipd_sip' },
				{ name : 'det_sipd_nrop', type : 'string', mapping : 'det_sipd_nrop' },
				{ name : 'det_sipd_str', type : 'string', mapping : 'det_sipd_str' },
				{ name : 'det_sipd_kompetensi', type : 'string', mapping : 'det_sipd_kompetensi' },
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		sipd_det_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						sipd_det_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						sipd_det_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						sipd_det_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						sipd_det_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						sipd_det_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						sipd_det_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						sipd_det_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						sipd_det_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var sipd_det_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : sipd_det_confirmAdd
		});
		var sipd_det_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : sipd_det_confirmUpdate
		});
		var sipd_det_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : sipd_det_confirmDelete
		});
		var sipd_det_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : sipd_det_refresh
		});
		var sipd_det_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : sipd_det_showSearchWindow
		});
		var sipd_det_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				sipd_det_printExcel('PRINT');
			}
		});
		var sipd_det_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				sipd_det_printExcel('EXCEL');
			}
		});
		
		var sipd_det_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : sipd_det_confirmUpdate
		});
		var sipd_det_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : sipd_det_confirmDelete
		});
		var sipd_det_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : sipd_det_refresh
		});
		sipd_det_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'sipd_det_contextMenu',
			items: [
				sipd_det_contextMenuEdit,sipd_det_contextMenuDelete,'-',sipd_det_contextMenuRefresh
			]
		});
		
		sipd_det_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : sipd_det_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						sipd_det_dataStore.proxy.extraParams = { action : 'GETLIST'};
						sipd_det_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		sipd_det_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'sipd_det_gridPanel',
			constrain : true,
			store : sipd_det_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'sipd_detGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						sipd_det_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : sipd_det_shorcut,
			columns : [
				{
					text : 'det_sipd_sipd_id',
					dataIndex : 'det_sipd_sipd_id',
					width : 100,
					sortable : false
				},
				{
					text : 'det_sipd_jenis',
					dataIndex : 'det_sipd_jenis',
					width : 100,
					sortable : false
				},
				{
					text : 'det_sipd_tanggal',
					dataIndex : 'det_sipd_tanggal',
					width : 100,
					sortable : false
				},
				{
					text : 'det_sipd_pemohon_id',
					dataIndex : 'det_sipd_pemohon_id',
					width : 100,
					sortable : false
				},
				{
					text : 'det_sipd_nomorreg',
					dataIndex : 'det_sipd_nomorreg',
					width : 100,
					sortable : false
				},
				{
					text : 'det_sipd_proses',
					dataIndex : 'det_sipd_proses',
					width : 100,
					sortable : false
				},
				{
					text : 'det_sipd_sk',
					dataIndex : 'det_sipd_sk',
					width : 100,
					sortable : false
				},
				{
					text : 'det_sipd_skurut',
					dataIndex : 'det_sipd_skurut',
					width : 100,
					sortable : false
				},
				{
					text : 'det_sipd_berlaku',
					dataIndex : 'det_sipd_berlaku',
					width : 100,
					sortable : false
				},
				{
					text : 'det_sipd_kadaluarsa',
					dataIndex : 'det_sipd_kadaluarsa',
					width : 100,
					sortable : false
				},
				{
					text : 'det_sipd_terima',
					dataIndex : 'det_sipd_terima',
					width : 100,
					sortable : false
				},
				{
					text : 'det_sipd_terimatanggal',
					dataIndex : 'det_sipd_terimatanggal',
					width : 100,
					sortable : false
				},
				{
					text : 'det_sipd_kelengkapan',
					dataIndex : 'det_sipd_kelengkapan',
					width : 100,
					sortable : false
				},
				{
					text : 'det_sipd_bap',
					dataIndex : 'det_sipd_bap',
					width : 100,
					sortable : false
				},
				{
					text : 'det_sipd_keputusan',
					dataIndex : 'det_sipd_keputusan',
					width : 100,
					sortable : false
				},
				{
					text : 'det_sipd_baptanggal',
					dataIndex : 'det_sipd_baptanggal',
					width : 100,
					sortable : false
				},
				{
					text : 'det_sipd_sip',
					dataIndex : 'det_sipd_sip',
					width : 100,
					sortable : false
				},
				{
					text : 'det_sipd_nrop',
					dataIndex : 'det_sipd_nrop',
					width : 100,
					sortable : false
				},
				{
					text : 'det_sipd_str',
					dataIndex : 'det_sipd_str',
					width : 100,
					sortable : false
				},
				{
					text : 'det_sipd_kompetensi',
					dataIndex : 'det_sipd_kompetensi',
					width : 100,
					sortable : false
				},
							
			],
			tbar : [
				sipd_det_addButton,
				sipd_det_editButton,
				sipd_det_deleteButton,
				sipd_det_gridSearchField,
				sipd_det_searchButton,
				sipd_det_refreshButton,
				sipd_det_printButton,
				sipd_det_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : sipd_det_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					sipd_det_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		det_sipd_idField = Ext.create('Ext.form.NumberField',{
			id : 'det_sipd_idField',
			name : 'det_sipd_id',
			fieldLabel : 'det_sipd_id<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		det_sipd_sipd_idField = Ext.create('Ext.form.NumberField',{
			id : 'det_sipd_sipd_idField',
			name : 'det_sipd_sipd_id',
			fieldLabel : 'det_sipd_sipd_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		det_sipd_jenisField = Ext.create('Ext.form.NumberField',{
			id : 'det_sipd_jenisField',
			name : 'det_sipd_jenis',
			fieldLabel : 'det_sipd_jenis',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		det_sipd_tanggalField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_tanggalField',
			name : 'det_sipd_tanggal',
			fieldLabel : 'det_sipd_tanggal',
			maxLength : 0
		});
		det_sipd_pemohon_idField = Ext.create('Ext.form.NumberField',{
			id : 'det_sipd_pemohon_idField',
			name : 'det_sipd_pemohon_id',
			fieldLabel : 'det_sipd_pemohon_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		det_sipd_nomorregField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_nomorregField',
			name : 'det_sipd_nomorreg',
			fieldLabel : 'det_sipd_nomorreg',
			maxLength : 50
		});
		det_sipd_prosesField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_prosesField',
			name : 'det_sipd_proses',
			fieldLabel : 'det_sipd_proses',
			maxLength : 50
		});
		det_sipd_skField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_skField',
			name : 'det_sipd_sk',
			fieldLabel : 'det_sipd_sk',
			maxLength : 50
		});
		det_sipd_skurutField = Ext.create('Ext.form.NumberField',{
			id : 'det_sipd_skurutField',
			name : 'det_sipd_skurut',
			fieldLabel : 'det_sipd_skurut',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		det_sipd_berlakuField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_berlakuField',
			name : 'det_sipd_berlaku',
			fieldLabel : 'det_sipd_berlaku',
			maxLength : 0
		});
		det_sipd_kadaluarsaField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_kadaluarsaField',
			name : 'det_sipd_kadaluarsa',
			fieldLabel : 'det_sipd_kadaluarsa',
			maxLength : 0
		});
		det_sipd_terimaField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_terimaField',
			name : 'det_sipd_terima',
			fieldLabel : 'det_sipd_terima',
			maxLength : 50
		});
		det_sipd_terimatanggalField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_terimatanggalField',
			name : 'det_sipd_terimatanggal',
			fieldLabel : 'det_sipd_terimatanggal',
			maxLength : 0
		});
		det_sipd_kelengkapanField = Ext.create('Ext.form.NumberField',{
			id : 'det_sipd_kelengkapanField',
			name : 'det_sipd_kelengkapan',
			fieldLabel : 'det_sipd_kelengkapan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		det_sipd_bapField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_bapField',
			name : 'det_sipd_bap',
			fieldLabel : 'det_sipd_bap',
			maxLength : 50
		});
		det_sipd_keputusanField = Ext.create('Ext.form.NumberField',{
			id : 'det_sipd_keputusanField',
			name : 'det_sipd_keputusan',
			fieldLabel : 'det_sipd_keputusan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		det_sipd_baptanggalField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_baptanggalField',
			name : 'det_sipd_baptanggal',
			fieldLabel : 'det_sipd_baptanggal',
			maxLength : 0
		});
		det_sipd_sipField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_sipField',
			name : 'det_sipd_sip',
			fieldLabel : 'det_sipd_sip',
			maxLength : 50
		});
		det_sipd_nropField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_nropField',
			name : 'det_sipd_nrop',
			fieldLabel : 'det_sipd_nrop',
			maxLength : 50
		});
		det_sipd_strField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_strField',
			name : 'det_sipd_str',
			fieldLabel : 'det_sipd_str',
			maxLength : 50
		});
		det_sipd_kompetensiField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_kompetensiField',
			name : 'det_sipd_kompetensi',
			fieldLabel : 'det_sipd_kompetensi',
			maxLength : 50
		});
		var sipd_det_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : sipd_det_save
		});
		var sipd_det_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				sipd_det_resetForm();
				sipd_det_switchToGrid();
			}
		});
		sipd_det_formPanel = Ext.create('Ext.form.Panel', {
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
						det_sipd_idField,
						det_sipd_sipd_idField,
						det_sipd_jenisField,
						det_sipd_tanggalField,
						det_sipd_pemohon_idField,
						det_sipd_nomorregField,
						det_sipd_prosesField,
						det_sipd_skField,
						det_sipd_skurutField,
						det_sipd_berlakuField,
						det_sipd_kadaluarsaField,
						det_sipd_terimaField,
						det_sipd_terimatanggalField,
						det_sipd_kelengkapanField,
						det_sipd_bapField,
						det_sipd_keputusanField,
						det_sipd_baptanggalField,
						det_sipd_sipField,
						det_sipd_nropField,
						det_sipd_strField,
						det_sipd_kompetensiField,
											]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [sipd_det_saveButton,sipd_det_cancelButton]
		});
		sipd_det_formWindow = Ext.create('Ext.window.Window',{
			id : 'sipd_det_formWindow',
			renderTo : 'sipd_detSaveWindow',
			title : globalFormAddEditTitle + ' ' + sipd_det_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [sipd_det_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		det_sipd_sipd_idSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_sipd_sipd_idSearchField',
			name : 'det_sipd_sipd_id',
			fieldLabel : 'det_sipd_sipd_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_sipd_jenisSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_sipd_jenisSearchField',
			name : 'det_sipd_jenis',
			fieldLabel : 'det_sipd_jenis',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_sipd_tanggalSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_tanggalSearchField',
			name : 'det_sipd_tanggal',
			fieldLabel : 'det_sipd_tanggal',
			maxLength : 0
		
		});
		det_sipd_pemohon_idSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_sipd_pemohon_idSearchField',
			name : 'det_sipd_pemohon_id',
			fieldLabel : 'det_sipd_pemohon_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_sipd_nomorregSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_nomorregSearchField',
			name : 'det_sipd_nomorreg',
			fieldLabel : 'det_sipd_nomorreg',
			maxLength : 50
		
		});
		det_sipd_prosesSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_prosesSearchField',
			name : 'det_sipd_proses',
			fieldLabel : 'det_sipd_proses',
			maxLength : 50
		
		});
		det_sipd_skSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_skSearchField',
			name : 'det_sipd_sk',
			fieldLabel : 'det_sipd_sk',
			maxLength : 50
		
		});
		det_sipd_skurutSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_sipd_skurutSearchField',
			name : 'det_sipd_skurut',
			fieldLabel : 'det_sipd_skurut',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_sipd_berlakuSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_berlakuSearchField',
			name : 'det_sipd_berlaku',
			fieldLabel : 'det_sipd_berlaku',
			maxLength : 0
		
		});
		det_sipd_kadaluarsaSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_kadaluarsaSearchField',
			name : 'det_sipd_kadaluarsa',
			fieldLabel : 'det_sipd_kadaluarsa',
			maxLength : 0
		
		});
		det_sipd_terimaSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_terimaSearchField',
			name : 'det_sipd_terima',
			fieldLabel : 'det_sipd_terima',
			maxLength : 50
		
		});
		det_sipd_terimatanggalSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_terimatanggalSearchField',
			name : 'det_sipd_terimatanggal',
			fieldLabel : 'det_sipd_terimatanggal',
			maxLength : 0
		
		});
		det_sipd_kelengkapanSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_sipd_kelengkapanSearchField',
			name : 'det_sipd_kelengkapan',
			fieldLabel : 'det_sipd_kelengkapan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_sipd_bapSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_bapSearchField',
			name : 'det_sipd_bap',
			fieldLabel : 'det_sipd_bap',
			maxLength : 50
		
		});
		det_sipd_keputusanSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_sipd_keputusanSearchField',
			name : 'det_sipd_keputusan',
			fieldLabel : 'det_sipd_keputusan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_sipd_baptanggalSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_baptanggalSearchField',
			name : 'det_sipd_baptanggal',
			fieldLabel : 'det_sipd_baptanggal',
			maxLength : 0
		
		});
		det_sipd_sipSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_sipSearchField',
			name : 'det_sipd_sip',
			fieldLabel : 'det_sipd_sip',
			maxLength : 50
		
		});
		det_sipd_nropSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_nropSearchField',
			name : 'det_sipd_nrop',
			fieldLabel : 'det_sipd_nrop',
			maxLength : 50
		
		});
		det_sipd_strSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_strSearchField',
			name : 'det_sipd_str',
			fieldLabel : 'det_sipd_str',
			maxLength : 50
		
		});
		det_sipd_kompetensiSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_sipd_kompetensiSearchField',
			name : 'det_sipd_kompetensi',
			fieldLabel : 'det_sipd_kompetensi',
			maxLength : 50
		
		});
		var sipd_det_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : sipd_det_search
		});
		var sipd_det_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				sipd_det_searchWindow.hide();
			}
		});
		sipd_det_searchPanel = Ext.create('Ext.form.Panel', {
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
						det_sipd_sipd_idSearchField,
						det_sipd_jenisSearchField,
						det_sipd_tanggalSearchField,
						det_sipd_pemohon_idSearchField,
						det_sipd_nomorregSearchField,
						det_sipd_prosesSearchField,
						det_sipd_skSearchField,
						det_sipd_skurutSearchField,
						det_sipd_berlakuSearchField,
						det_sipd_kadaluarsaSearchField,
						det_sipd_terimaSearchField,
						det_sipd_terimatanggalSearchField,
						det_sipd_kelengkapanSearchField,
						det_sipd_bapSearchField,
						det_sipd_keputusanSearchField,
						det_sipd_baptanggalSearchField,
						det_sipd_sipSearchField,
						det_sipd_nropSearchField,
						det_sipd_strSearchField,
						det_sipd_kompetensiSearchField,
						]
				}],
			buttons : [sipd_det_searchingButton,sipd_det_cancelSearchButton]
		});
		sipd_det_searchWindow = Ext.create('Ext.window.Window',{
			id : 'sipd_det_searchWindow',
			renderTo : 'sipd_detSearchWindow',
			title : globalFormSearchTitle + ' ' + sipd_det_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [sipd_det_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="sipd_detSaveWindow"></div>
<div id="sipd_detSearchWindow"></div>
<div class="span12" id="sipd_detGrid"></div>