<style>
	.checked{
		background-image:url(../assets/images/icons/check.png) !important;
		margin:auto;
	}
	.unchecked{
		background-image:url(../assets/images/icons/forward.png) !important;
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
				
		var ID_PEMOHONSearchField;
		var JENIS_PERMOHONANSearchField;
		var NO_SKSearchField;
		var NO_SK_LAMASearchField;
		var NAMA_PERUSAHAANSearchField;
		var ALAMATSearchField;
		var PERUNTUKANSearchField;
		var ALAMAT_LOKASISearchField;
		var TGL_PERMOHONANSearchField;
		var TGL_BERLAKUSearchField;
		var TGL_BERAKHIRSearchField;
		var STATUSSearchField;
		var STATUS_SURVEYSearchField;
				
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
					var ID_TROTOARValue = '';
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
					var array_otoar_keterangan=new Array();
					if(otoar_syaratDataStore.getCount() > 0){
						for(var i=0;i<otoar_syaratDataStore.getCount();i++){
							array_otoar_keterangan.push(otoar_syaratDataStore.getAt(i).data.KETERANGAN);
						}
					}					
					var encoded_array_otoar_keterangan = Ext.encode(array_otoar_keterangan);
					
					ID_TROTOARValue = ID_TROTOARField.getValue();
					ID_PEMOHONValue = ID_PEMOHONField.getValue();
					JENIS_PERMOHONANValue = JENIS_PERMOHONANField.getValue();
					NO_SKValue = NO_SKField.getValue();
					NO_SK_LAMAValue = NO_SK_LAMAField.getValue();
					NAMA_PERUSAHAANValue = NAMA_PERUSAHAANField.getValue();
					ALAMATValue = ALAMATField.getValue();
					PERUNTUKANValue = PERUNTUKANField.getValue();
					ALAMAT_LOKASIValue = ALAMAT_LOKASIField.getValue();
					TGL_PERMOHONANValue = TGL_PERMOHONANField.getValue();
					TGL_BERLAKUValue = TGL_BERLAKUField.getValue();
					TGL_BERAKHIRValue = TGL_BERAKHIRField.getValue();
					STATUSValue = STATUSField.getValue();
					STATUS_SURVEYValue = STATUS_SURVEYField.getValue();
					pemohon_namaValue = pemohon_namaField.getValue();
					pemohon_telpValue = pemohon_telpField.getValue();
					pemohon_alamatValue = pemohon_alamatField.getValue();
					pemohon_idValue = pemohon_idField.getValue();
					pemohon_nikValue = pemohon_nikField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_trotoar/switchAction',
						params: {							
							ID_TROTOAR : ID_TROTOARValue,
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
							pemohon_nama : pemohon_namaValue,
							pemohon_telp : pemohon_telpValue,
							pemohon_alamat : pemohon_alamatValue,
							pemohon_id : pemohon_idValue,
							pemohon_nik : pemohon_nikValue,
							KETERANGAN : encoded_array_otoar_keterangan,
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
			otoar_searchPanel.getForm().reset();
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
			ID_TROTOARField.setValue(record.data.ID_TROTOAR);
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
				{ name : 'pemohon_id', type : 'int', mapping : 'pemohon_id' },
				{ name : 'pemohon_nama', type : 'string', mapping : 'pemohon_nama' },
				{ name : 'pemohon_alamat', type : 'string', mapping : 'pemohon_alamat' },
				{ name : 'pemohon_telp', type : 'string', mapping : 'pemohon_telp' },
				{ name : 'pemohon_nik', type : 'string', mapping : 'pemohon_nik' },
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
						window.open('<?php echo base_url("index.php/c_trotoar/printBP/"); ?>' + record.get('ID_TROTOAR'));
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
							window.open('../print/idam_sk.html');
						}
					});
				}
			});
			var otoar_sk_printCM = Ext.create('Ext.menu.Item',{
				text : 'SK',
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
							window.open('../print/idam_lembarkontrol.html');
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
		ID_TROTOARField = Ext.create('Ext.form.NumberField',{
			id : 'ID_TROTOARField',
			name : 'ID_TROTOAR',
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
			name : 'TGL_PERMOHONAN',
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
			name : 'TGL_BERAKHIR',
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
		/*Start Deklarasi Form Pemohon*/
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
		/*End Deklarasi Form Pemohon*/
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
						NO_SK_LAMAField,
						]
				}, {
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
				}, {
					xtype : 'fieldset',
					title : '2. Data Perijinan',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						// NO_SKField,
						NAMA_PERUSAHAANField,
						ALAMATField,
						PERUNTUKANField,
						ALAMAT_LOKASIField,
						TGL_PERMOHONANField,
						TGL_BERLAKUField,
						STATUS_SURVEYField,
						STATUSField,
						TGL_BERAKHIRField,
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