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
				
		var ID_USERSearchField;
		var NO_SKSearchField;
		var NAMA_USAHASearchField;
		var PENANGGUNG_JAWABSearchField;
		var NO_TELPSearchField;
		var JENIS_USAHASearchField;
		var ALAMAT_USAHASearchField;
		var STATUS_LAHANSearchField;
		var NO_AKTASearchField;
		var TANGGALSearchField;
		var LUAS_LAHANSearchField;
		var LUAS_TAPAK_BANGUNANSearchField;
		var LUAS_KEGIATANSearchField;
		var LUAS_PARKIRSearchField;
				
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
					var ID_SPPLValue = '';
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
					var array_sppl_keterangan=new Array();
					if(sppl_syaratDataStore.getCount() > 0){
						for(var i=0;i<sppl_syaratDataStore.getCount();i++){
							array_sppl_keterangan.push(sppl_syaratDataStore.getAt(i).data.KETERANGAN);
						}
					}					
					var encoded_array_sppl_keterangan = Ext.encode(array_sppl_keterangan);					
					ID_SPPLValue = ID_SPPLField.getValue();
					ID_USERValue = ID_USERField.getValue();
					NO_SKValue = NO_SKField.getValue();
					NAMA_USAHAValue = NAMA_USAHAField.getValue();
					PENANGGUNG_JAWABValue = PENANGGUNG_JAWABField.getValue();
					NO_TELPValue = NO_TELPField.getValue();
					pemohon_namaValue = pemohon_namaField.getValue();
					pemohon_telpValue = pemohon_telpField.getValue();
					pemohon_alamatValue = pemohon_alamatField.getValue();
					JENIS_USAHAValue = JENIS_USAHAField.getValue();
					ALAMAT_USAHAValue = ALAMAT_USAHAField.getValue();
					STATUS_LAHANValue = STATUS_LAHANField.getValue();
					NO_AKTAValue = NO_AKTAField.getValue();
					TANGGALValue = TANGGALField.getValue();
					LUAS_LAHANValue = LUAS_LAHANField.getValue();
					LUAS_TAPAK_BANGUNANValue = LUAS_TAPAK_BANGUNANField.getValue();
					LUAS_KEGIATANValue = LUAS_KEGIATANField.getValue();
					LUAS_PARKIRValue = LUAS_PARKIRField.getValue();
					JENIS_PERMOHONANValue = JENIS_PERMOHONANField.getValue();
					MULAI_KEGIATANValue = MULAI_KEGIATANField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_sppl/switchAction',
						params: {							
							ID_SPPL : ID_SPPLValue,
							ID_USER : ID_USERValue,
							NO_SK : NO_SKValue,
							NAMA_USAHA : NAMA_USAHAValue,
							PENANGGUNG_JAWAB : PENANGGUNG_JAWABValue,
							NO_TELP : NO_TELPValue,
							JENIS_USAHA : JENIS_USAHAValue,
							ALAMAT_USAHA : ALAMAT_USAHAValue,
							STATUS_LAHAN : STATUS_LAHANValue,
							pemohon_nama : pemohon_namaValue,
							pemohon_telp : pemohon_telpValue,
							pemohon_alamat : pemohon_alamatValue,
							NO_AKTA : NO_AKTAValue,
							TANGGAL : TANGGALValue,
							LUAS_LAHAN : LUAS_LAHANValue,
							LUAS_TAPAK_BANGUNAN : LUAS_TAPAK_BANGUNANValue,
							LUAS_KEGIATAN : LUAS_KEGIATANValue,
							LUAS_PARKIR : LUAS_PARKIRValue,
							JENIS_PERMOHONAN : JENIS_PERMOHONANValue,
							MULAI_KEGIATAN : MULAI_KEGIATANValue,
							KETERANGAN : encoded_array_sppl_keterangan,
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
										// icon : Ext.MessageBox.WARNING,
										fn : function(btn){
											$('html, body').animate({scrollTop: 0}, 500);
										}
									});
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
			pl_searchPanel.getForm().reset();
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
			TANGGALField.setValue(record.data.TANGGAL);
			LUAS_LAHANField.setValue(record.data.LUAS_LAHAN);
			LUAS_TAPAK_BANGUNANField.setValue(record.data.LUAS_TAPAK_BANGUNAN);
			LUAS_KEGIATANField.setValue(record.data.LUAS_KEGIATAN);
			LUAS_PARKIRField.setValue(record.data.LUAS_PARKIR);
			sppl_syaratDataStore.proxy.extraParams = { 
				trayek_id : record.data.ID_TRAYEK,
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
				{ name : 'ID_USER', type : 'int', mapping : 'ID_USER' },
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
				{ name : 'TANGGAL', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'TANGGAL' },
				{ name : 'MULAI_KEGIATAN', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'MULAI_KEGIATAN' },
				{ name : 'LUAS_LAHAN', type : 'float', mapping : 'LUAS_LAHAN' },
				{ name : 'LUAS_TAPAK_BANGUNAN', type : 'float', mapping : 'LUAS_TAPAK_BANGUNAN' },
				{ name : 'LUAS_KEGIATAN', type : 'float', mapping : 'LUAS_KEGIATAN' },
				{ name : 'LUAS_PARKIR', type : 'float', mapping : 'LUAS_PARKIR' },
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
						window.open('<?php echo base_url("index.php/c_sppl/cetak_bp/")?>' + record.get('ID_SPPL'));
					}
				});
			}
		});
		var sppl_lk_printCM = Ext.create('Ext.menu.Item',{
			text : 'Lembar Kontrol',
			tooltip : 'Cetak Lembar Kontrol',
			handler : function(){
				var record = tr_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_sppl/switchAction',
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
					url: 'c_sppl/switchAction',
					params: {
						ID_SKTR : record.get('ID_SKTR'),
						action : 'CETAKSKTR'
					},success : function(){
						window.open('../print/idam_lembarkontrol.html');
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
			var record = tr_gridPanel.getSelectionModel().getSelection()[0];
			Ext.Ajax.request({
				waitMsg: 'Please wait...',
				url: 'c_sppl/switchAction',
				params: {
					sppl_id : record.get('ID_SKTR'),
					proses : proses,
					action : 'UBAHPROSES'
				},success : function(){
					tr_dataStore.reload();
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
			name : 'ID_SPPL',
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
					// { name : 'pemohon_npwp', type : 'string', mapping : 'pemohon_npwp' },
					// { name : 'pemohon_rt', type : 'int', mapping : 'pemohon_rt' },
					// { name : 'pemohon_rw', type : 'int', mapping : 'pemohon_rw' },
					// { name : 'pemohon_kel', type : 'string', mapping : 'pemohon_kel' },
					// { name : 'pemohon_kec', type : 'string', mapping : 'pemohon_kec' },
					{ name : 'pemohon_nik', type : 'string', mapping : 'pemohon_nik' },
					// { name : 'pemohon_stra', type : 'string', mapping : 'pemohon_stra' },
					// { name : 'pemohon_surattugas', type : 'string', mapping : 'pemohon_surattugas' },
					// { name : 'pemohon_pekerjaan', type : 'string', mapping : 'pemohon_pekerjaan' },
					// { name : 'pemohon_tempatlahir', type : 'string', mapping : 'pemohon_tempatlahir' },
					// { name : 'pemohon_tanggallahir', type : 'date', dateFormat : 'Y-m-d', mapping : 'pemohon_tanggallahir' },
					// { name : 'pemohon_user_id', type : 'int', mapping : 'pemohon_user_id' },
					// { name : 'pemohon_pendidikan', type : 'string', mapping : 'pemohon_pendidikan' },
					// { name : 'pemohon_tahunlulus', type : 'int', mapping : 'pemohon_tahunlulus' },
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
			name : 'JENIS_PERMOHONAN',
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
		NO_AKTAField = Ext.create('Ext.form.TextField',{
			id : 'NO_AKTAField',
			name : 'NO_AKTA',
			fieldLabel : 'No Akta',
			maxLength : 100
		});
		TANGGALField = Ext.create('Ext.form.Date',{
			id : 'TANGGALField',
			name : 'TANGGAL',
			fieldLabel : 'Tanggal Akta',
			maxLength : 20
		});
		MULAI_KEGIATANField = Ext.create('Ext.form.Date',{
			id : 'MULAI_KEGIATANField',
			name : 'MULAI_KEGIATAN',
			fieldLabel : 'Mulai Kegiatan',
			maxLength : 20
		});
		pemohon_idField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_idField',
			name : 'pemohon_id',
			fieldLabel : '',
			maxLength : 20,
			hidden:true
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
						JENIS_PERMOHONANField,
						NO_SK_LAMAField
											]
				},{
					xtype : 'fieldset',
					title : '1. Data Permohon',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						pemohon_nikField,
						pemohon_namaField,
						pemohon_telpField,
						pemohon_alamatField
											]
				},{
					xtype : 'fieldset',
					title : '1. Data Permohonan',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						ID_SPPLField,
						// ID_USERField,
						// NO_SKField,
						NAMA_USAHAField,
						PENANGGUNG_JAWABField,
						NO_TELPField,
						JENIS_USAHAField,
						ALAMAT_USAHAField,
						STATUS_LAHANField,
						NO_AKTAField,
						TANGGALField,
						MULAI_KEGIATANField,
						LUAS_LAHANField,
						LUAS_TAPAK_BANGUNANField,
						LUAS_KEGIATANField,
						LUAS_PARKIRField,
											]
				},{
					xtype : 'fieldset',
					title : '2. Data Kelengkapan',
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