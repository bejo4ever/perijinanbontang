<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var rusahaan_componentItemTitle="RUSAHAAN";
		var rusahaan_dataStore;
		
		var rusahaan_shorcut;
		var rusahaan_contextMenu;
		var rusahaan_gridSearchField;
		var rusahaan_gridPanel;
		var rusahaan_formPanel;
		var rusahaan_formWindow;
		var rusahaan_searchPanel;
		var rusahaan_searchWindow;
		
		var idField;
		var npwpField;
		var namaField;
		var noaktaField;
		var notarisField;
		var tglaktaField;
		var bentuk_idField;
		var kualifikasi_idField;
		var alamatField;
		var rtField;
		var rwField;
		var propinsi_idField;
		var kabkota_idField;
		var kecamatan_idField;
		var desa_idField;
		var kodeposField;
		var telpField;
		var faxField;
		var stempat_idField;
		var sperusahaan_idField;
		var usahaField;
		var butaraField;
		var bselatanField;
		var btimurField;
		var bbaratField;
		var modalField;
		var merkField;
		var jusaha_idField;
		var sdataField;
				
		var npwpSearchField;
		var namaSearchField;
		var noaktaSearchField;
		var notarisSearchField;
		var tglaktaSearchField;
		var bentuk_idSearchField;
		var kualifikasi_idSearchField;
		var alamatSearchField;
		var rtSearchField;
		var rwSearchField;
		var propinsi_idSearchField;
		var kabkota_idSearchField;
		var kecamatan_idSearchField;
		var desa_idSearchField;
		var kodeposSearchField;
		var telpSearchField;
		var faxSearchField;
		var stempat_idSearchField;
		var sperusahaan_idSearchField;
		var usahaSearchField;
		var butaraSearchField;
		var bselatanSearchField;
		var btimurSearchField;
		var bbaratSearchField;
		var modalSearchField;
		var merkSearchField;
		var jusaha_idSearchField;
		var sdataSearchField;
				
		var rusahaan_dbTask = 'CREATE';
		var rusahaan_dbTaskMessage = 'Tambah';
		var rusahaan_dbPermission = 'CRUD';
		var rusahaan_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function rusahaan_switchToGrid(){
			rusahaan_formPanel.setDisabled(true);
			rusahaan_gridPanel.setDisabled(false);
			rusahaan_formWindow.hide();
		}
		
		function rusahaan_switchToForm(){
			rusahaan_gridPanel.setDisabled(true);
			rusahaan_formPanel.setDisabled(false);
			rusahaan_formWindow.show();
		}
		
		function rusahaan_confirmAdd(){
			rusahaan_dbTask = 'CREATE';
			rusahaan_dbTaskMessage = 'created';
			rusahaan_resetForm();
			rusahaan_switchToForm();
		}
		
		function rusahaan_confirmUpdate(){
			if(rusahaan_gridPanel.selModel.getCount() == 1) {
				rusahaan_dbTask = 'UPDATE';
				rusahaan_dbTaskMessage = 'updated';
				rusahaan_switchToForm();
				rusahaan_setForm();
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
		
		function rusahaan_confirmDelete(){
			if(rusahaan_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, rusahaan_delete);
			}else if(rusahaan_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, rusahaan_delete);
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
		
		function rusahaan_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(rusahaan_dbPermission)==false && pattC.test(rusahaan_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(rusahaan_confirmFormValid()){
					var idValue = '';
					var npwpValue = '';
					var namaValue = '';
					var noaktaValue = '';
					var notarisValue = '';
					var tglaktaValue = '';
					var bentuk_idValue = '';
					var kualifikasi_idValue = '';
					var alamatValue = '';
					var rtValue = '';
					var rwValue = '';
					var propinsi_idValue = '';
					var kabkota_idValue = '';
					var kecamatan_idValue = '';
					var desa_idValue = '';
					var kodeposValue = '';
					var telpValue = '';
					var faxValue = '';
					var stempat_idValue = '';
					var sperusahaan_idValue = '';
					var usahaValue = '';
					var butaraValue = '';
					var bselatanValue = '';
					var btimurValue = '';
					var bbaratValue = '';
					var modalValue = '';
					var merkValue = '';
					var jusaha_idValue = '';
					var sdataValue = '';
										
					idValue = idField.getValue();
					npwpValue = npwpField.getValue();
					namaValue = namaField.getValue();
					noaktaValue = noaktaField.getValue();
					notarisValue = notarisField.getValue();
					tglaktaValue = tglaktaField.getValue();
					bentuk_idValue = bentuk_idField.getValue();
					kualifikasi_idValue = kualifikasi_idField.getValue();
					alamatValue = alamatField.getValue();
					rtValue = rtField.getValue();
					rwValue = rwField.getValue();
					propinsi_idValue = propinsi_idField.getValue();
					kabkota_idValue = kabkota_idField.getValue();
					kecamatan_idValue = kecamatan_idField.getValue();
					desa_idValue = desa_idField.getValue();
					kodeposValue = kodeposField.getValue();
					telpValue = telpField.getValue();
					faxValue = faxField.getValue();
					stempat_idValue = stempat_idField.getValue();
					sperusahaan_idValue = sperusahaan_idField.getValue();
					usahaValue = usahaField.getValue();
					butaraValue = butaraField.getValue();
					bselatanValue = bselatanField.getValue();
					btimurValue = btimurField.getValue();
					bbaratValue = bbaratField.getValue();
					modalValue = modalField.getValue();
					merkValue = merkField.getValue();
					jusaha_idValue = jusaha_idField.getValue();
					sdataValue = sdataField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_perusahaan/switchAction',
						params: {							
							id : idValue,
							npwp : npwpValue,
							nama : namaValue,
							noakta : noaktaValue,
							notaris : notarisValue,
							tglakta : tglaktaValue,
							bentuk_id : bentuk_idValue,
							kualifikasi_id : kualifikasi_idValue,
							alamat : alamatValue,
							rt : rtValue,
							rw : rwValue,
							propinsi_id : propinsi_idValue,
							kabkota_id : kabkota_idValue,
							kecamatan_id : kecamatan_idValue,
							desa_id : desa_idValue,
							kodepos : kodeposValue,
							telp : telpValue,
							fax : faxValue,
							stempat_id : stempat_idValue,
							sperusahaan_id : sperusahaan_idValue,
							usaha : usahaValue,
							butara : butaraValue,
							bselatan : bselatanValue,
							btimur : btimurValue,
							bbarat : bbaratValue,
							modal : modalValue,
							merk : merkValue,
							jusaha_id : jusaha_idValue,
							sdata : sdataValue,
							action : rusahaan_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									rusahaan_dataStore.reload();
									rusahaan_resetForm();
									rusahaan_switchToGrid();
									rusahaan_gridPanel.getSelectionModel().deselectAll();
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
		
		function rusahaan_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(rusahaan_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = rusahaan_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< rusahaan_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.id);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_perusahaan/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									rusahaan_dataStore.reload();
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
		
		function rusahaan_refresh(){
			rusahaan_dbListAction = "GETLIST";
			rusahaan_gridSearchField.reset();
			rusahaan_searchPanel.getForm().reset();
			rusahaan_dataStore.proxy.extraParams = { action : 'GETLIST' };
			rusahaan_dataStore.proxy.extraParams.query = "";
			rusahaan_dataStore.currentPage = 1;
			rusahaan_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function rusahaan_confirmFormValid(){
			return rusahaan_formPanel.getForm().isValid();
		}
		
		function rusahaan_resetForm(){
			rusahaan_dbTask = 'CREATE';
			rusahaan_dbTaskMessage = 'create';
			rusahaan_formPanel.getForm().reset();
			idField.setValue(0);
		}
		
		function rusahaan_setForm(){
			rusahaan_dbTask = 'UPDATE';
            rusahaan_dbTaskMessage = 'update';
			
			var record = rusahaan_gridPanel.getSelectionModel().getSelection()[0];
			idField.setValue(record.data.id);
			npwpField.setValue(record.data.npwp);
			namaField.setValue(record.data.nama);
			noaktaField.setValue(record.data.noakta);
			notarisField.setValue(record.data.notaris);
			tglaktaField.setValue(record.data.tglakta);
			bentuk_idField.setValue(record.data.bentuk_id);
			kualifikasi_idField.setValue(record.data.kualifikasi_id);
			alamatField.setValue(record.data.alamat);
			rtField.setValue(record.data.rt);
			rwField.setValue(record.data.rw);
			propinsi_idField.setValue(record.data.propinsi_id);
			kabkota_idField.setValue(record.data.kabkota_id);
			kecamatan_idField.setValue(record.data.kecamatan_id);
			desa_idField.setValue(record.data.desa_id);
			kodeposField.setValue(record.data.kodepos);
			telpField.setValue(record.data.telp);
			faxField.setValue(record.data.fax);
			stempat_idField.setValue(record.data.stempat_id);
			sperusahaan_idField.setValue(record.data.sperusahaan_id);
			usahaField.setValue(record.data.usaha);
			butaraField.setValue(record.data.butara);
			bselatanField.setValue(record.data.bselatan);
			btimurField.setValue(record.data.btimur);
			bbaratField.setValue(record.data.bbarat);
			modalField.setValue(record.data.modal);
			merkField.setValue(record.data.merk);
			jusaha_idField.setValue(record.data.jusaha_id);
			sdataField.setValue(record.data.sdata);
					}
		
		function rusahaan_showSearchWindow(){
			rusahaan_searchWindow.show();
		}
		
		function rusahaan_search(){
			rusahaan_gridSearchField.reset();
			
			var npwpValue = '';
			var namaValue = '';
			var noaktaValue = '';
			var notarisValue = '';
			var tglaktaValue = '';
			var bentuk_idValue = '';
			var kualifikasi_idValue = '';
			var alamatValue = '';
			var rtValue = '';
			var rwValue = '';
			var propinsi_idValue = '';
			var kabkota_idValue = '';
			var kecamatan_idValue = '';
			var desa_idValue = '';
			var kodeposValue = '';
			var telpValue = '';
			var faxValue = '';
			var stempat_idValue = '';
			var sperusahaan_idValue = '';
			var usahaValue = '';
			var butaraValue = '';
			var bselatanValue = '';
			var btimurValue = '';
			var bbaratValue = '';
			var modalValue = '';
			var merkValue = '';
			var jusaha_idValue = '';
			var sdataValue = '';
						
			npwpValue = npwpSearchField.getValue();
			namaValue = namaSearchField.getValue();
			noaktaValue = noaktaSearchField.getValue();
			notarisValue = notarisSearchField.getValue();
			tglaktaValue = tglaktaSearchField.getValue();
			bentuk_idValue = bentuk_idSearchField.getValue();
			kualifikasi_idValue = kualifikasi_idSearchField.getValue();
			alamatValue = alamatSearchField.getValue();
			rtValue = rtSearchField.getValue();
			rwValue = rwSearchField.getValue();
			propinsi_idValue = propinsi_idSearchField.getValue();
			kabkota_idValue = kabkota_idSearchField.getValue();
			kecamatan_idValue = kecamatan_idSearchField.getValue();
			desa_idValue = desa_idSearchField.getValue();
			kodeposValue = kodeposSearchField.getValue();
			telpValue = telpSearchField.getValue();
			faxValue = faxSearchField.getValue();
			stempat_idValue = stempat_idSearchField.getValue();
			sperusahaan_idValue = sperusahaan_idSearchField.getValue();
			usahaValue = usahaSearchField.getValue();
			butaraValue = butaraSearchField.getValue();
			bselatanValue = bselatanSearchField.getValue();
			btimurValue = btimurSearchField.getValue();
			bbaratValue = bbaratSearchField.getValue();
			modalValue = modalSearchField.getValue();
			merkValue = merkSearchField.getValue();
			jusaha_idValue = jusaha_idSearchField.getValue();
			sdataValue = sdataSearchField.getValue();
			rusahaan_dbListAction = "SEARCH";
			rusahaan_dataStore.proxy.extraParams = { 
				npwp : npwpValue,
				nama : namaValue,
				noakta : noaktaValue,
				notaris : notarisValue,
				tglakta : tglaktaValue,
				bentuk_id : bentuk_idValue,
				kualifikasi_id : kualifikasi_idValue,
				alamat : alamatValue,
				rt : rtValue,
				rw : rwValue,
				propinsi_id : propinsi_idValue,
				kabkota_id : kabkota_idValue,
				kecamatan_id : kecamatan_idValue,
				desa_id : desa_idValue,
				kodepos : kodeposValue,
				telp : telpValue,
				fax : faxValue,
				stempat_id : stempat_idValue,
				sperusahaan_id : sperusahaan_idValue,
				usaha : usahaValue,
				butara : butaraValue,
				bselatan : bselatanValue,
				btimur : btimurValue,
				bbarat : bbaratValue,
				modal : modalValue,
				merk : merkValue,
				jusaha_id : jusaha_idValue,
				sdata : sdataValue,
				action : 'SEARCH'
			};
			rusahaan_dataStore.currentPage = 1;
			rusahaan_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function rusahaan_printExcel(outputType){
			var searchText = "";
			var npwpValue = '';
			var namaValue = '';
			var noaktaValue = '';
			var notarisValue = '';
			var tglaktaValue = '';
			var bentuk_idValue = '';
			var kualifikasi_idValue = '';
			var alamatValue = '';
			var rtValue = '';
			var rwValue = '';
			var propinsi_idValue = '';
			var kabkota_idValue = '';
			var kecamatan_idValue = '';
			var desa_idValue = '';
			var kodeposValue = '';
			var telpValue = '';
			var faxValue = '';
			var stempat_idValue = '';
			var sperusahaan_idValue = '';
			var usahaValue = '';
			var butaraValue = '';
			var bselatanValue = '';
			var btimurValue = '';
			var bbaratValue = '';
			var modalValue = '';
			var merkValue = '';
			var jusaha_idValue = '';
			var sdataValue = '';
			
			if(rusahaan_dataStore.proxy.extraParams.query!==null){searchText = rusahaan_dataStore.proxy.extraParams.query;}
			if(rusahaan_dataStore.proxy.extraParams.npwp!==null){npwpValue = rusahaan_dataStore.proxy.extraParams.npwp;}
			if(rusahaan_dataStore.proxy.extraParams.nama!==null){namaValue = rusahaan_dataStore.proxy.extraParams.nama;}
			if(rusahaan_dataStore.proxy.extraParams.noakta!==null){noaktaValue = rusahaan_dataStore.proxy.extraParams.noakta;}
			if(rusahaan_dataStore.proxy.extraParams.notaris!==null){notarisValue = rusahaan_dataStore.proxy.extraParams.notaris;}
			if(rusahaan_dataStore.proxy.extraParams.tglakta!==null){tglaktaValue = rusahaan_dataStore.proxy.extraParams.tglakta;}
			if(rusahaan_dataStore.proxy.extraParams.bentuk_id!==null){bentuk_idValue = rusahaan_dataStore.proxy.extraParams.bentuk_id;}
			if(rusahaan_dataStore.proxy.extraParams.kualifikasi_id!==null){kualifikasi_idValue = rusahaan_dataStore.proxy.extraParams.kualifikasi_id;}
			if(rusahaan_dataStore.proxy.extraParams.alamat!==null){alamatValue = rusahaan_dataStore.proxy.extraParams.alamat;}
			if(rusahaan_dataStore.proxy.extraParams.rt!==null){rtValue = rusahaan_dataStore.proxy.extraParams.rt;}
			if(rusahaan_dataStore.proxy.extraParams.rw!==null){rwValue = rusahaan_dataStore.proxy.extraParams.rw;}
			if(rusahaan_dataStore.proxy.extraParams.propinsi_id!==null){propinsi_idValue = rusahaan_dataStore.proxy.extraParams.propinsi_id;}
			if(rusahaan_dataStore.proxy.extraParams.kabkota_id!==null){kabkota_idValue = rusahaan_dataStore.proxy.extraParams.kabkota_id;}
			if(rusahaan_dataStore.proxy.extraParams.kecamatan_id!==null){kecamatan_idValue = rusahaan_dataStore.proxy.extraParams.kecamatan_id;}
			if(rusahaan_dataStore.proxy.extraParams.desa_id!==null){desa_idValue = rusahaan_dataStore.proxy.extraParams.desa_id;}
			if(rusahaan_dataStore.proxy.extraParams.kodepos!==null){kodeposValue = rusahaan_dataStore.proxy.extraParams.kodepos;}
			if(rusahaan_dataStore.proxy.extraParams.telp!==null){telpValue = rusahaan_dataStore.proxy.extraParams.telp;}
			if(rusahaan_dataStore.proxy.extraParams.fax!==null){faxValue = rusahaan_dataStore.proxy.extraParams.fax;}
			if(rusahaan_dataStore.proxy.extraParams.stempat_id!==null){stempat_idValue = rusahaan_dataStore.proxy.extraParams.stempat_id;}
			if(rusahaan_dataStore.proxy.extraParams.sperusahaan_id!==null){sperusahaan_idValue = rusahaan_dataStore.proxy.extraParams.sperusahaan_id;}
			if(rusahaan_dataStore.proxy.extraParams.usaha!==null){usahaValue = rusahaan_dataStore.proxy.extraParams.usaha;}
			if(rusahaan_dataStore.proxy.extraParams.butara!==null){butaraValue = rusahaan_dataStore.proxy.extraParams.butara;}
			if(rusahaan_dataStore.proxy.extraParams.bselatan!==null){bselatanValue = rusahaan_dataStore.proxy.extraParams.bselatan;}
			if(rusahaan_dataStore.proxy.extraParams.btimur!==null){btimurValue = rusahaan_dataStore.proxy.extraParams.btimur;}
			if(rusahaan_dataStore.proxy.extraParams.bbarat!==null){bbaratValue = rusahaan_dataStore.proxy.extraParams.bbarat;}
			if(rusahaan_dataStore.proxy.extraParams.modal!==null){modalValue = rusahaan_dataStore.proxy.extraParams.modal;}
			if(rusahaan_dataStore.proxy.extraParams.merk!==null){merkValue = rusahaan_dataStore.proxy.extraParams.merk;}
			if(rusahaan_dataStore.proxy.extraParams.jusaha_id!==null){jusaha_idValue = rusahaan_dataStore.proxy.extraParams.jusaha_id;}
			if(rusahaan_dataStore.proxy.extraParams.sdata!==null){sdataValue = rusahaan_dataStore.proxy.extraParams.sdata;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_perusahaan/switchAction',
				params : {
					action : outputType,
					query : searchText,
					npwp : npwpValue,
					nama : namaValue,
					noakta : noaktaValue,
					notaris : notarisValue,
					tglakta : tglaktaValue,
					bentuk_id : bentuk_idValue,
					kualifikasi_id : kualifikasi_idValue,
					alamat : alamatValue,
					rt : rtValue,
					rw : rwValue,
					propinsi_id : propinsi_idValue,
					kabkota_id : kabkota_idValue,
					kecamatan_id : kecamatan_idValue,
					desa_id : desa_idValue,
					kodepos : kodeposValue,
					telp : telpValue,
					fax : faxValue,
					stempat_id : stempat_idValue,
					sperusahaan_id : sperusahaan_idValue,
					usaha : usahaValue,
					butara : butaraValue,
					bselatan : bselatanValue,
					btimur : btimurValue,
					bbarat : bbaratValue,
					modal : modalValue,
					merk : merkValue,
					jusaha_id : jusaha_idValue,
					sdata : sdataValue,
					currentAction : rusahaan_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/perusahaan_list.xls');
							}else{
								window.open('./print/perusahaan_list.html','rusahaanlist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		rusahaan_dataStore = Ext.create('Ext.data.Store',{
			id : 'rusahaan_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_perusahaan/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'id'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'id', type : 'int', mapping : 'id' },
				{ name : 'npwp', type : 'string', mapping : 'npwp' },
				{ name : 'nama', type : 'string', mapping : 'nama' },
				{ name : 'noakta', type : 'string', mapping : 'noakta' },
				{ name : 'notaris', type : 'string', mapping : 'notaris' },
				{ name : 'tglakta', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'tglakta' },
				{ name : 'bentuk_id', type : , mapping : 'bentuk_id' },
				{ name : 'kualifikasi_id', type : , mapping : 'kualifikasi_id' },
				{ name : 'alamat', type : 'string', mapping : 'alamat' },
				{ name : 'rt', type : 'string', mapping : 'rt' },
				{ name : 'rw', type : 'string', mapping : 'rw' },
				{ name : 'propinsi_id', type : 'int', mapping : 'propinsi_id' },
				{ name : 'kabkota_id', type : 'int', mapping : 'kabkota_id' },
				{ name : 'kecamatan_id', type : 'int', mapping : 'kecamatan_id' },
				{ name : 'desa_id', type : 'int', mapping : 'desa_id' },
				{ name : 'kodepos', type : 'string', mapping : 'kodepos' },
				{ name : 'telp', type : 'string', mapping : 'telp' },
				{ name : 'fax', type : 'string', mapping : 'fax' },
				{ name : 'stempat_id', type : , mapping : 'stempat_id' },
				{ name : 'sperusahaan_id', type : , mapping : 'sperusahaan_id' },
				{ name : 'usaha', type : , mapping : 'usaha' },
				{ name : 'butara', type : 'string', mapping : 'butara' },
				{ name : 'bselatan', type : 'string', mapping : 'bselatan' },
				{ name : 'btimur', type : 'string', mapping : 'btimur' },
				{ name : 'bbarat', type : 'string', mapping : 'bbarat' },
				{ name : 'modal', type : , mapping : 'modal' },
				{ name : 'merk', type : , mapping : 'merk' },
				{ name : 'jusaha_id', type : 'int', mapping : 'jusaha_id' },
				{ name : 'sdata', type : , mapping : 'sdata' },
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		rusahaan_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						rusahaan_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						rusahaan_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						rusahaan_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						rusahaan_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						rusahaan_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						rusahaan_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						rusahaan_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						rusahaan_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var rusahaan_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : rusahaan_confirmAdd
		});
		var rusahaan_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : rusahaan_confirmUpdate
		});
		var rusahaan_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : rusahaan_confirmDelete
		});
		var rusahaan_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : rusahaan_refresh
		});
		var rusahaan_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : rusahaan_showSearchWindow
		});
		var rusahaan_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				rusahaan_printExcel('PRINT');
			}
		});
		var rusahaan_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				rusahaan_printExcel('EXCEL');
			}
		});
		
		var rusahaan_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : rusahaan_confirmUpdate
		});
		var rusahaan_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : rusahaan_confirmDelete
		});
		var rusahaan_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : rusahaan_refresh
		});
		rusahaan_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'rusahaan_contextMenu',
			items: [
				rusahaan_contextMenuEdit,rusahaan_contextMenuDelete,'-',rusahaan_contextMenuRefresh
			]
		});
		
		rusahaan_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : rusahaan_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						rusahaan_dataStore.proxy.extraParams = { action : 'GETLIST'};
						rusahaan_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		rusahaan_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'rusahaan_gridPanel',
			constrain : true,
			store : rusahaan_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'rusahaanGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						rusahaan_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : rusahaan_shorcut,
			columns : [
				{
					text : 'npwp',
					dataIndex : 'npwp',
					width : 100,
					sortable : false
				},
				{
					text : 'nama',
					dataIndex : 'nama',
					width : 100,
					sortable : false
				},
				{
					text : 'noakta',
					dataIndex : 'noakta',
					width : 100,
					sortable : false
				},
				{
					text : 'notaris',
					dataIndex : 'notaris',
					width : 100,
					sortable : false
				},
				{
					text : 'tglakta',
					dataIndex : 'tglakta',
					width : 100,
					sortable : false
				},
				{
					text : 'bentuk_id',
					dataIndex : 'bentuk_id',
					width : 100,
					sortable : false
				},
				{
					text : 'kualifikasi_id',
					dataIndex : 'kualifikasi_id',
					width : 100,
					sortable : false
				},
				{
					text : 'alamat',
					dataIndex : 'alamat',
					width : 100,
					sortable : false
				},
				{
					text : 'rt',
					dataIndex : 'rt',
					width : 100,
					sortable : false
				},
				{
					text : 'rw',
					dataIndex : 'rw',
					width : 100,
					sortable : false
				},
				{
					text : 'propinsi_id',
					dataIndex : 'propinsi_id',
					width : 100,
					sortable : false
				},
				{
					text : 'kabkota_id',
					dataIndex : 'kabkota_id',
					width : 100,
					sortable : false
				},
				{
					text : 'kecamatan_id',
					dataIndex : 'kecamatan_id',
					width : 100,
					sortable : false
				},
				{
					text : 'desa_id',
					dataIndex : 'desa_id',
					width : 100,
					sortable : false
				},
				{
					text : 'kodepos',
					dataIndex : 'kodepos',
					width : 100,
					sortable : false
				},
				{
					text : 'telp',
					dataIndex : 'telp',
					width : 100,
					sortable : false
				},
				{
					text : 'fax',
					dataIndex : 'fax',
					width : 100,
					sortable : false
				},
				{
					text : 'stempat_id',
					dataIndex : 'stempat_id',
					width : 100,
					sortable : false
				},
				{
					text : 'sperusahaan_id',
					dataIndex : 'sperusahaan_id',
					width : 100,
					sortable : false
				},
				{
					text : 'usaha',
					dataIndex : 'usaha',
					width : 100,
					sortable : false
				},
				{
					text : 'butara',
					dataIndex : 'butara',
					width : 100,
					sortable : false
				},
				{
					text : 'bselatan',
					dataIndex : 'bselatan',
					width : 100,
					sortable : false
				},
				{
					text : 'btimur',
					dataIndex : 'btimur',
					width : 100,
					sortable : false
				},
				{
					text : 'bbarat',
					dataIndex : 'bbarat',
					width : 100,
					sortable : false
				},
				{
					text : 'modal',
					dataIndex : 'modal',
					width : 100,
					sortable : false
				},
				{
					text : 'merk',
					dataIndex : 'merk',
					width : 100,
					sortable : false
				},
				{
					text : 'jusaha_id',
					dataIndex : 'jusaha_id',
					width : 100,
					sortable : false
				},
				{
					text : 'sdata',
					dataIndex : 'sdata',
					width : 100,
					sortable : false
				},
							
			],
			tbar : [
				rusahaan_addButton,
				rusahaan_editButton,
				rusahaan_deleteButton,
				rusahaan_gridSearchField,
				rusahaan_searchButton,
				rusahaan_refreshButton,
				rusahaan_printButton,
				rusahaan_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : rusahaan_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					rusahaan_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		idField = Ext.create('Ext.form.NumberField',{
			id : 'idField',
			name : 'id',
			fieldLabel : 'id<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		npwpField = Ext.create('Ext.form.TextField',{
			id : 'npwpField',
			name : 'npwp',
			fieldLabel : 'npwp',
			maxLength : 100
		});
		namaField = Ext.create('Ext.form.TextField',{
			id : 'namaField',
			name : 'nama',
			fieldLabel : 'nama',
			maxLength : 100
		});
		noaktaField = Ext.create('Ext.form.TextField',{
			id : 'noaktaField',
			name : 'noakta',
			fieldLabel : 'noakta',
			maxLength : 100
		});
		notarisField = Ext.create('Ext.form.TextField',{
			id : 'notarisField',
			name : 'notaris',
			fieldLabel : 'notaris',
			maxLength : 100
		});
		tglaktaField = Ext.create('Ext.form.TextField',{
			id : 'tglaktaField',
			name : 'tglakta',
			fieldLabel : 'tglakta',
			maxLength : 0
		});
		bentuk_idField = Ext.create('Ext.form.TextField',{
			id : 'bentuk_idField',
			name : 'bentuk_id',
			fieldLabel : 'bentuk_id',
			maxLength : 0
		});
		kualifikasi_idField = Ext.create('Ext.form.TextField',{
			id : 'kualifikasi_idField',
			name : 'kualifikasi_id',
			fieldLabel : 'kualifikasi_id',
			maxLength : 0
		});
		alamatField = Ext.create('Ext.form.TextField',{
			id : 'alamatField',
			name : 'alamat',
			fieldLabel : 'alamat',
			maxLength : 100
		});
		rtField = Ext.create('Ext.form.TextField',{
			id : 'rtField',
			name : 'rt',
			fieldLabel : 'rt',
			maxLength : 10
		});
		rwField = Ext.create('Ext.form.TextField',{
			id : 'rwField',
			name : 'rw',
			fieldLabel : 'rw',
			maxLength : 10
		});
		propinsi_idField = Ext.create('Ext.form.NumberField',{
			id : 'propinsi_idField',
			name : 'propinsi_id',
			fieldLabel : 'propinsi_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		kabkota_idField = Ext.create('Ext.form.NumberField',{
			id : 'kabkota_idField',
			name : 'kabkota_id',
			fieldLabel : 'kabkota_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		kecamatan_idField = Ext.create('Ext.form.NumberField',{
			id : 'kecamatan_idField',
			name : 'kecamatan_id',
			fieldLabel : 'kecamatan_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		desa_idField = Ext.create('Ext.form.NumberField',{
			id : 'desa_idField',
			name : 'desa_id',
			fieldLabel : 'desa_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		kodeposField = Ext.create('Ext.form.TextField',{
			id : 'kodeposField',
			name : 'kodepos',
			fieldLabel : 'kodepos',
			maxLength : 45
		});
		telpField = Ext.create('Ext.form.TextField',{
			id : 'telpField',
			name : 'telp',
			fieldLabel : 'telp',
			maxLength : 50
		});
		faxField = Ext.create('Ext.form.TextField',{
			id : 'faxField',
			name : 'fax',
			fieldLabel : 'fax',
			maxLength : 50
		});
		stempat_idField = Ext.create('Ext.form.TextField',{
			id : 'stempat_idField',
			name : 'stempat_id',
			fieldLabel : 'stempat_id',
			maxLength : 0
		});
		sperusahaan_idField = Ext.create('Ext.form.TextField',{
			id : 'sperusahaan_idField',
			name : 'sperusahaan_id',
			fieldLabel : 'sperusahaan_id',
			maxLength : 0
		});
		usahaField = Ext.create('Ext.form.TextField',{
			id : 'usahaField',
			name : 'usaha',
			fieldLabel : 'usaha',
			maxLength : 65535
		});
		butaraField = Ext.create('Ext.form.TextField',{
			id : 'butaraField',
			name : 'butara',
			fieldLabel : 'butara',
			maxLength : 100
		});
		bselatanField = Ext.create('Ext.form.TextField',{
			id : 'bselatanField',
			name : 'bselatan',
			fieldLabel : 'bselatan',
			maxLength : 100
		});
		btimurField = Ext.create('Ext.form.TextField',{
			id : 'btimurField',
			name : 'btimur',
			fieldLabel : 'btimur',
			maxLength : 100
		});
		bbaratField = Ext.create('Ext.form.TextField',{
			id : 'bbaratField',
			name : 'bbarat',
			fieldLabel : 'bbarat',
			maxLength : 100
		});
		modalField = Ext.create('Ext.form.TextField',{
			id : 'modalField',
			name : 'modal',
			fieldLabel : 'modal',
			maxLength : 0
		});
		merkField = Ext.create('Ext.form.TextField',{
			id : 'merkField',
			name : 'merk',
			fieldLabel : 'merk',
			maxLength : 0
		});
		jusaha_idField = Ext.create('Ext.form.NumberField',{
			id : 'jusaha_idField',
			name : 'jusaha_id',
			fieldLabel : 'jusaha_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		sdataField = Ext.create('Ext.form.TextField',{
			id : 'sdataField',
			name : 'sdata',
			fieldLabel : 'sdata',
			maxLength : 0
		});
		var rusahaan_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : rusahaan_save
		});
		var rusahaan_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				rusahaan_resetForm();
				rusahaan_switchToGrid();
			}
		});
		rusahaan_formPanel = Ext.create('Ext.form.Panel', {
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
						idField,
						npwpField,
						namaField,
						noaktaField,
						notarisField,
						tglaktaField,
						bentuk_idField,
						kualifikasi_idField,
						alamatField,
						rtField,
						rwField,
						propinsi_idField,
						kabkota_idField,
						kecamatan_idField,
						desa_idField,
						kodeposField,
						telpField,
						faxField,
						stempat_idField,
						sperusahaan_idField,
						usahaField,
						butaraField,
						bselatanField,
						btimurField,
						bbaratField,
						modalField,
						merkField,
						jusaha_idField,
						sdataField,
											]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [rusahaan_saveButton,rusahaan_cancelButton]
		});
		rusahaan_formWindow = Ext.create('Ext.window.Window',{
			id : 'rusahaan_formWindow',
			renderTo : 'rusahaanSaveWindow',
			title : globalFormAddEditTitle + ' ' + rusahaan_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [rusahaan_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		npwpSearchField = Ext.create('Ext.form.TextField',{
			id : 'npwpSearchField',
			name : 'npwp',
			fieldLabel : 'npwp',
			maxLength : 100
		
		});
		namaSearchField = Ext.create('Ext.form.TextField',{
			id : 'namaSearchField',
			name : 'nama',
			fieldLabel : 'nama',
			maxLength : 100
		
		});
		noaktaSearchField = Ext.create('Ext.form.TextField',{
			id : 'noaktaSearchField',
			name : 'noakta',
			fieldLabel : 'noakta',
			maxLength : 100
		
		});
		notarisSearchField = Ext.create('Ext.form.TextField',{
			id : 'notarisSearchField',
			name : 'notaris',
			fieldLabel : 'notaris',
			maxLength : 100
		
		});
		tglaktaSearchField = Ext.create('Ext.form.TextField',{
			id : 'tglaktaSearchField',
			name : 'tglakta',
			fieldLabel : 'tglakta',
			maxLength : 0
		
		});
		bentuk_idSearchField = Ext.create('Ext.form.TextField',{
			id : 'bentuk_idSearchField',
			name : 'bentuk_id',
			fieldLabel : 'bentuk_id',
			maxLength : 0
		
		});
		kualifikasi_idSearchField = Ext.create('Ext.form.TextField',{
			id : 'kualifikasi_idSearchField',
			name : 'kualifikasi_id',
			fieldLabel : 'kualifikasi_id',
			maxLength : 0
		
		});
		alamatSearchField = Ext.create('Ext.form.TextField',{
			id : 'alamatSearchField',
			name : 'alamat',
			fieldLabel : 'alamat',
			maxLength : 100
		
		});
		rtSearchField = Ext.create('Ext.form.TextField',{
			id : 'rtSearchField',
			name : 'rt',
			fieldLabel : 'rt',
			maxLength : 10
		
		});
		rwSearchField = Ext.create('Ext.form.TextField',{
			id : 'rwSearchField',
			name : 'rw',
			fieldLabel : 'rw',
			maxLength : 10
		
		});
		propinsi_idSearchField = Ext.create('Ext.form.NumberField',{
			id : 'propinsi_idSearchField',
			name : 'propinsi_id',
			fieldLabel : 'propinsi_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		kabkota_idSearchField = Ext.create('Ext.form.NumberField',{
			id : 'kabkota_idSearchField',
			name : 'kabkota_id',
			fieldLabel : 'kabkota_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		kecamatan_idSearchField = Ext.create('Ext.form.NumberField',{
			id : 'kecamatan_idSearchField',
			name : 'kecamatan_id',
			fieldLabel : 'kecamatan_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		desa_idSearchField = Ext.create('Ext.form.NumberField',{
			id : 'desa_idSearchField',
			name : 'desa_id',
			fieldLabel : 'desa_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		kodeposSearchField = Ext.create('Ext.form.TextField',{
			id : 'kodeposSearchField',
			name : 'kodepos',
			fieldLabel : 'kodepos',
			maxLength : 45
		
		});
		telpSearchField = Ext.create('Ext.form.TextField',{
			id : 'telpSearchField',
			name : 'telp',
			fieldLabel : 'telp',
			maxLength : 50
		
		});
		faxSearchField = Ext.create('Ext.form.TextField',{
			id : 'faxSearchField',
			name : 'fax',
			fieldLabel : 'fax',
			maxLength : 50
		
		});
		stempat_idSearchField = Ext.create('Ext.form.TextField',{
			id : 'stempat_idSearchField',
			name : 'stempat_id',
			fieldLabel : 'stempat_id',
			maxLength : 0
		
		});
		sperusahaan_idSearchField = Ext.create('Ext.form.TextField',{
			id : 'sperusahaan_idSearchField',
			name : 'sperusahaan_id',
			fieldLabel : 'sperusahaan_id',
			maxLength : 0
		
		});
		usahaSearchField = Ext.create('Ext.form.TextField',{
			id : 'usahaSearchField',
			name : 'usaha',
			fieldLabel : 'usaha',
			maxLength : 65535
		
		});
		butaraSearchField = Ext.create('Ext.form.TextField',{
			id : 'butaraSearchField',
			name : 'butara',
			fieldLabel : 'butara',
			maxLength : 100
		
		});
		bselatanSearchField = Ext.create('Ext.form.TextField',{
			id : 'bselatanSearchField',
			name : 'bselatan',
			fieldLabel : 'bselatan',
			maxLength : 100
		
		});
		btimurSearchField = Ext.create('Ext.form.TextField',{
			id : 'btimurSearchField',
			name : 'btimur',
			fieldLabel : 'btimur',
			maxLength : 100
		
		});
		bbaratSearchField = Ext.create('Ext.form.TextField',{
			id : 'bbaratSearchField',
			name : 'bbarat',
			fieldLabel : 'bbarat',
			maxLength : 100
		
		});
		modalSearchField = Ext.create('Ext.form.TextField',{
			id : 'modalSearchField',
			name : 'modal',
			fieldLabel : 'modal',
			maxLength : 0
		
		});
		merkSearchField = Ext.create('Ext.form.TextField',{
			id : 'merkSearchField',
			name : 'merk',
			fieldLabel : 'merk',
			maxLength : 0
		
		});
		jusaha_idSearchField = Ext.create('Ext.form.NumberField',{
			id : 'jusaha_idSearchField',
			name : 'jusaha_id',
			fieldLabel : 'jusaha_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		sdataSearchField = Ext.create('Ext.form.TextField',{
			id : 'sdataSearchField',
			name : 'sdata',
			fieldLabel : 'sdata',
			maxLength : 0
		
		});
		var rusahaan_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : rusahaan_search
		});
		var rusahaan_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				rusahaan_searchWindow.hide();
			}
		});
		rusahaan_searchPanel = Ext.create('Ext.form.Panel', {
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
						npwpSearchField,
						namaSearchField,
						noaktaSearchField,
						notarisSearchField,
						tglaktaSearchField,
						bentuk_idSearchField,
						kualifikasi_idSearchField,
						alamatSearchField,
						rtSearchField,
						rwSearchField,
						propinsi_idSearchField,
						kabkota_idSearchField,
						kecamatan_idSearchField,
						desa_idSearchField,
						kodeposSearchField,
						telpSearchField,
						faxSearchField,
						stempat_idSearchField,
						sperusahaan_idSearchField,
						usahaSearchField,
						butaraSearchField,
						bselatanSearchField,
						btimurSearchField,
						bbaratSearchField,
						modalSearchField,
						merkSearchField,
						jusaha_idSearchField,
						sdataSearchField,
						]
				}],
			buttons : [rusahaan_searchingButton,rusahaan_cancelSearchButton]
		});
		rusahaan_searchWindow = Ext.create('Ext.window.Window',{
			id : 'rusahaan_searchWindow',
			renderTo : 'rusahaanSearchWindow',
			title : globalFormSearchTitle + ' ' + rusahaan_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [rusahaan_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="rusahaanSaveWindow"></div>
<div id="rusahaanSearchWindow"></div>
<div class="span12" id="rusahaanGrid"></div>