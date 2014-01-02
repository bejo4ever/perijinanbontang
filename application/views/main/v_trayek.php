<style>
	.checked{
		background-image:url(../assets/images/icons/check.png) !important;
		margin:auto;
	}
	.unchecked{
		background-image:url(../assets/images/icons/forward.png) !important;
	}
</style>
<h4>IZIN TRAYEK</h4>
<hr>
<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var ayek_componentItemTitle="Perijinan Trayek";
		var ayek_dataStore;
		var trayek_syaratDataStore;
		
		var ayek_shorcut;
		var ayek_contextMenu;
		var ayek_gridSearchField;
		var ayek_gridPanel;
		var ayek_formPanel;
		var ayek_formWindow;
		var ayek_searchPanel;
		var ayek_searchWindow;
		
		var ID_TRAYEKField;
		var ID_TRAYEK_INTIField;
		var KODE_TRAYEKField;
		var NOMOR_UBField;
		var TGL_PERMOHONANField;
		var NAMA_PERUSAHAANField;
		var NAMA_PEMOHONField;
		var TGL_AKHIRField;
				
		var ID_TRAYEK_INTISearchField;
		var KODE_TRAYEKSearchField;
		var NOMOR_UBSearchField;
		var TGL_PERMOHONANSearchField;
		var NAMA_PERUSAHAANSearchField;
		var NAMA_PEMOHONSearchField;
		var TGL_AKHIRSearchField;
				
		var ayek_dbTask = 'CREATE';
		var ayek_dbTaskMessage = 'Tambah';
		var ayek_dbPermission = 'CRUD';
		var ayek_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function ayek_switchToGrid(){
			ayek_formPanel.setDisabled(true);
			ayek_gridPanel.setDisabled(false);
			ayek_formWindow.hide();
		}
		
		function ayek_switchToForm(){
			ayek_gridPanel.setDisabled(true);
			ayek_formPanel.setDisabled(false);
			ayek_formWindow.show();
		}
		
		function ayek_confirmAdd(){
			ayek_dbTask = 'CREATE';
			ayek_dbTaskMessage = 'created';
			ayek_resetForm();
			ayek_switchToForm();
			trayek_syaratDataStore.proxy.extraParams = {
				currentAction : 'create',
				action : 'GETSYARAT'
			};
			trayek_syaratDataStore.load();
		}
		
		function ayek_confirmUpdate(){
			if(ayek_gridPanel.selModel.getCount() == 1) {
				ayek_dbTask = 'UPDATE';
				ayek_dbTaskMessage = 'updated';
				ayek_switchToForm();
				ayek_setForm();
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
		
		function ayek_confirmDelete(){
			if(ayek_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, ayek_delete);
			}else if(ayek_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, ayek_delete);
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
		
		function ayek_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(ayek_dbPermission)==false && pattC.test(ayek_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(ayek_confirmFormValid()){
					var ID_TRAYEKValue = '';
					var ID_TRAYEK_INTIValue = '';
					var KODE_TRAYEKValue = '';
					var NOMOR_UBValue = '';
					var TGL_PERMOHONANValue = '';
					var NAMA_PERUSAHAANValue = '';
					var NAMA_PEMOHONValue = '';
					var TGL_AKHIRValue = '';
					var NOMOR_KENDARAANValue = '';
					var NAMA_PEMILIKValue = '';
					var ALAMAT_PEMILIKValue = '';
					var NO_HPValue = '';
					var NOMOR_RANGKAValue = '';
					var NOMOR_MESINValue = '';
					var JENIS_PERMOHONANValue = '';
					
					var array_trayek_keterangan=new Array();
					if(trayek_syaratDataStore.getCount() > 0){
						for(var i=0;i<trayek_syaratDataStore.getCount();i++){
							array_trayek_keterangan.push(trayek_syaratDataStore.getAt(i).data.KETERANGAN);
						}
					}					
					var encoded_array_trayek_keterangan = Ext.encode(array_trayek_keterangan);		
					
					ID_TRAYEKValue = ID_TRAYEKField.getValue();
					ID_TRAYEK_INTIValue = ID_TRAYEK_INTIField.getValue();
					KODE_TRAYEKValue = KODE_TRAYEKField.getValue();
					NOMOR_UBValue = NOMOR_UBField.getValue();
					TGL_PERMOHONANValue = TGL_PERMOHONANField.getValue();
					NAMA_PERUSAHAANValue = NAMA_PERUSAHAANField.getValue();
					NAMA_PEMOHONValue = NAMA_PEMOHONField.getValue();
					TGL_AKHIRValue = TGL_AKHIRField.getValue();
					pemohon_namaValue = pemohon_namaField.getValue();
					pemohon_telpValue = pemohon_telpField.getValue();
					pemohon_alamatValue = pemohon_alamatField.getValue();
					pemohon_nikValue = pemohon_nikField.getValue();
					pemohon_idValue = pemohon_idField.getValue();
					NOMOR_KENDARAANValue = NOMOR_KENDARAANField.getValue();
					STATUSValue = STATUSField.getValue();
					STATUS_SURVEYValue = STATUS_SURVEYField.getValue();
					NAMA_PEMILIKValue = NAMA_PEMILIKField.getValue();
					ALAMAT_PEMILIKValue = ALAMAT_PEMILIKField.getValue();
					NO_HPValue = NO_HPField.getValue();
					NOMOR_RANGKAValue = NOMOR_RANGKAField.getValue();
					NOMOR_MESINValue = NOMOR_MESINField.getValue();
					JENIS_PERMOHONANValue = JENIS_PERMOHONANField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_trayek/switchAction',
						params: {							
							ID_TRAYEK : ID_TRAYEKValue,
							ID_TRAYEK_INTI : ID_TRAYEK_INTIValue,
							KODE_TRAYEK : KODE_TRAYEKValue,
							NOMOR_UB : NOMOR_UBValue,
							TGL_PERMOHONAN : TGL_PERMOHONANValue,
							NAMA_PERUSAHAAN : NAMA_PERUSAHAANValue,
							NAMA_PEMOHON : NAMA_PEMOHONValue,
							pemohon_nama : pemohon_namaValue,
							pemohon_telp : pemohon_telpValue,
							pemohon_alamat : pemohon_alamatValue,
							pemohon_id : pemohon_idValue,
							TGL_AKHIR : TGL_AKHIRValue,
							NOMOR_KENDARAAN : NOMOR_KENDARAANValue,
							NAMA_PEMILIK : NAMA_PEMILIKValue,
							ALAMAT_PEMILIK : ALAMAT_PEMILIKValue,
							STATUS : STATUSValue,
							STATUS_SURVEY : STATUS_SURVEYValue,
							NO_HP : NO_HPValue,
							NOMOR_RANGKA : NOMOR_RANGKAValue,
							NOMOR_MESIN : NOMOR_MESINValue,
							JENIS_PERMOHONAN : JENIS_PERMOHONANValue,
							KETERANGAN : encoded_array_trayek_keterangan,
							action : ayek_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									// Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
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
									trayek_syaratDataStore.reload();
									ayek_dataStore.reload();
									ayek_resetForm();
									ayek_switchToGrid();
									ayek_gridPanel.getSelectionModel().deselectAll();
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
		
		function ayek_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(ayek_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = ayek_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< ayek_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.ID_TRAYEK);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_trayek/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									ayek_dataStore.reload();
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
		
		function ayek_refresh(){
			ayek_dbListAction = "GETLIST";
			ayek_gridSearchField.reset();
			ayek_searchPanel.getForm().reset();
			ayek_dataStore.proxy.extraParams = { action : 'GETLIST' };
			ayek_dataStore.proxy.extraParams.query = "";
			ayek_dataStore.currentPage = 1;
			ayek_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function ayek_confirmFormValid(){
			return ayek_formPanel.getForm().isValid();
		}
		
		function ayek_resetForm(){
			ayek_dbTask = 'CREATE';
			ayek_dbTaskMessage = 'create';
			ayek_formPanel.getForm().reset();
			ID_TRAYEKField.setValue(0);
		}
		
		function ayek_setForm(){
			ayek_dbTask = 'UPDATE';
            ayek_dbTaskMessage = 'update';
			
			var record = ayek_gridPanel.getSelectionModel().getSelection()[0];
			ID_TRAYEKField.setValue(record.data.ID_TRAYEK);
			pemohon_idField.setValue(record.data.pemohon_id);
			pemohon_nikField.setValue(record.data.pemohon_nik);
			pemohon_namaField.setValue(record.data.pemohon_nama);
			pemohon_telpField.setValue(record.data.pemohon_telp);
			pemohon_alamatField.setValue(record.data.pemohon_alamat);
			ID_TRAYEK_INTIField.setValue(record.data.ID_TRAYEK_INTI);
			KODE_TRAYEKField.setValue(record.data.KODE_TRAYEK);
			NOMOR_UBField.setValue(record.data.NOMOR_UB);
			TGL_PERMOHONANField.setValue(record.data.TGL_PERMOHONAN);
			NAMA_PERUSAHAANField.setValue(record.data.NAMA_PERUSAHAAN);
			NAMA_PEMOHONField.setValue(record.data.NAMA_PEMOHON);
			TGL_AKHIRField.setValue(record.data.TGL_AKHIR);
			NOMOR_KENDARAANField.setValue(record.data.NOMOR_KENDARAAN);
			NAMA_PEMILIKField.setValue(record.data.NAMA_PEMILIK);
			ALAMAT_PEMILIKField.setValue(record.data.ALAMAT_PEMILIK);
			NO_HPField.setValue(record.data.NO_HP);
			NOMOR_RANGKAField.setValue(record.data.NOMOR_RANGKA);
			NOMOR_MESINField.setValue(record.data.NOMOR_MESIN);
			JENIS_PERMOHONANField.setValue(record.data.JENIS_PERMOHONAN);
			trayek_syaratDataStore.proxy.extraParams = { 
				trayek_id : record.data.ID_TRAYEK,
				currentAction : 'update',
				action : 'GETSYARAT'
			};
			trayek_syaratDataStore.load();
		}
		
		function ayek_showSearchWindow(){
			ayek_searchWindow.show();
		}
		
		function ayek_search(){
			ayek_gridSearchField.reset();
			
			var ID_TRAYEK_INTIValue = '';
			var KODE_TRAYEKValue = '';
			var NOMOR_UBValue = '';
			var TGL_PERMOHONANValue = '';
			var NAMA_PERUSAHAANValue = '';
			var NAMA_PEMOHONValue = '';
			var TGL_AKHIRValue = '';
						
			ID_TRAYEK_INTIValue = ID_TRAYEK_INTISearchField.getValue();
			KODE_TRAYEKValue = KODE_TRAYEKSearchField.getValue();
			NOMOR_UBValue = NOMOR_UBSearchField.getValue();
			TGL_PERMOHONANValue = TGL_PERMOHONANSearchField.getValue();
			NAMA_PERUSAHAANValue = NAMA_PERUSAHAANSearchField.getValue();
			NAMA_PEMOHONValue = NAMA_PEMOHONSearchField.getValue();
			TGL_AKHIRValue = TGL_AKHIRSearchField.getValue();
			ayek_dbListAction = "SEARCH";
			ayek_dataStore.proxy.extraParams = { 
				ID_TRAYEK_INTI : ID_TRAYEK_INTIValue,
				KODE_TRAYEK : KODE_TRAYEKValue,
				NOMOR_UB : NOMOR_UBValue,
				TGL_PERMOHONAN : TGL_PERMOHONANValue,
				NAMA_PERUSAHAAN : NAMA_PERUSAHAANValue,
				NAMA_PEMOHON : NAMA_PEMOHONValue,
				TGL_AKHIR : TGL_AKHIRValue,
				action : 'SEARCH'
			};
			ayek_dataStore.currentPage = 1;
			ayek_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function ayek_printExcel(outputType){
			var searchText = "";
			var ID_TRAYEK_INTIValue = '';
			var KODE_TRAYEKValue = '';
			var NOMOR_UBValue = '';
			var TGL_PERMOHONANValue = '';
			var NAMA_PERUSAHAANValue = '';
			var NAMA_PEMOHONValue = '';
			var TGL_AKHIRValue = '';
			
			if(ayek_dataStore.proxy.extraParams.query!==null){searchText = ayek_dataStore.proxy.extraParams.query;}
			if(ayek_dataStore.proxy.extraParams.ID_TRAYEK_INTI!==null){ID_TRAYEK_INTIValue = ayek_dataStore.proxy.extraParams.ID_TRAYEK_INTI;}
			if(ayek_dataStore.proxy.extraParams.KODE_TRAYEK!==null){KODE_TRAYEKValue = ayek_dataStore.proxy.extraParams.KODE_TRAYEK;}
			if(ayek_dataStore.proxy.extraParams.NOMOR_UB!==null){NOMOR_UBValue = ayek_dataStore.proxy.extraParams.NOMOR_UB;}
			if(ayek_dataStore.proxy.extraParams.TGL_PERMOHONAN!==null){TGL_PERMOHONANValue = ayek_dataStore.proxy.extraParams.TGL_PERMOHONAN;}
			if(ayek_dataStore.proxy.extraParams.NAMA_PERUSAHAAN!==null){NAMA_PERUSAHAANValue = ayek_dataStore.proxy.extraParams.NAMA_PERUSAHAAN;}
			if(ayek_dataStore.proxy.extraParams.NAMA_PEMOHON!==null){NAMA_PEMOHONValue = ayek_dataStore.proxy.extraParams.NAMA_PEMOHON;}
			if(ayek_dataStore.proxy.extraParams.TGL_AKHIR!==null){TGL_AKHIRValue = ayek_dataStore.proxy.extraParams.TGL_AKHIR;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_trayek/switchAction',
				params : {
					action : outputType,
					query : searchText,
					ID_TRAYEK_INTI : ID_TRAYEK_INTIValue,
					KODE_TRAYEK : KODE_TRAYEKValue,
					NOMOR_UB : NOMOR_UBValue,
					TGL_PERMOHONAN : TGL_PERMOHONANValue,
					NAMA_PERUSAHAAN : NAMA_PERUSAHAANValue,
					NAMA_PEMOHON : NAMA_PEMOHONValue,
					TGL_AKHIR : TGL_AKHIRValue,
					currentAction : ayek_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/trayek_list.xls');
							}else{
								window.open('./print/trayek_list.html','ayeklist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		ayek_dataStore = Ext.create('Ext.data.Store',{
			id : 'ayek_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_trayek/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'ID_TRAYEK'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'ID_TRAYEK', type : 'int', mapping : 'ID_TRAYEK' },
				{ name : 'ID_TRAYEK_INTI', type : 'int', mapping : 'ID_TRAYEK_INTI' },
				{ name : 'KODE_TRAYEK', type : 'string', mapping : 'KODE_TRAYEK' },
				{ name : 'NOMOR_UB', type : 'string', mapping : 'NOMOR_UB' },
				{ name : 'pemohon_nama', type : 'string', mapping : 'pemohon_nama' },
				{ name : 'pemohon_id', type : 'int', mapping : 'pemohon_id' },
				{ name : 'pemohon_alamat', type : 'string', mapping : 'pemohon_alamat' },
				{ name : 'pemohon_telp', type : 'string', mapping : 'pemohon_telp' },
				{ name : 'pemohon_nik', type : 'string', mapping : 'pemohon_nik' },
				{ name : 'lama_proses', type : 'string', mapping : 'lama_proses' },
				{ name : 'TGL_PERMOHONAN', type : 'date', dateFormat : 'Y-m-d', mapping : 'TGL_PERMOHONAN' },
				{ name : 'NAMA_PERUSAHAAN', type : 'string', mapping : 'NAMA_PERUSAHAAN' },
				{ name : 'NAMA_PEMOHON', type : 'string', mapping : 'NAMA_PEMOHON' },
				{ name : 'TGL_AKHIR', type : 'date', dateFormat : 'Y-m-d', mapping : 'TGL_AKHIR' },
				{ name : 'NOMOR_KENDARAAN', type : 'string', mapping : 'NOMOR_KENDARAAN' },
				{ name : 'NAMA_PEMILIK', type : 'string', mapping : 'NAMA_PEMILIK' },
				{ name : 'ALAMAT_PEMILIK', type : 'string', mapping : 'ALAMAT_PEMILIK' },
				{ name : 'NO_HP', type : 'string', mapping : 'NO_HP' },
				{ name : 'NOMOR_RANGKA', type : 'string', mapping : 'NOMOR_RANGKA' },
				{ name : 'NOMOR_MESIN', type : 'string', mapping : 'NOMOR_MESIN' },
				{ name : 'JENIS_PERMOHONAN', type : 'int', mapping : 'JENIS_PERMOHONAN' },
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		ayek_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						ayek_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						ayek_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						ayek_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						ayek_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						ayek_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						ayek_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						ayek_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						ayek_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var ayek_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : ayek_confirmAdd
		});
		var ayek_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : ayek_confirmUpdate
		});
		var ayek_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : ayek_confirmDelete
		});
		var ayek_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : ayek_refresh
		});
		var ayek_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : ayek_showSearchWindow
		});
		var ayek_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				ayek_printExcel('PRINT');
			}
		});
		var ayek_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				ayek_printExcel('EXCEL');
			}
		});
		
		var ayek_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : ayek_confirmUpdate
		});
		var ayek_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : ayek_confirmDelete
		});
		var ayek_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : ayek_refresh
		});
		ayek_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'ayek_contextMenu',
			items: [
				ayek_contextMenuEdit,ayek_contextMenuDelete,'-',ayek_contextMenuRefresh
			]
		});
		/* Start ContextMenu For Action Column */
		var trayek_bp_printCM = Ext.create('Ext.menu.Item',{
			text : 'Bukti Penerimaan',
			tooltip : 'Cetak Bukti Penerimaan',
			handler : function(){
				var record = ayek_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_trayek/switchAction',
					params: {
						ID_TRAYEK : record.get('ID_TRAYEK'),
						action : 'CETAKBP'
					},success : function(){
						window.open('<?php echo base_url("index.php/c_trayek/printBP/")?>' + record.get('ID_TRAYEK'));
					}
				});
			}
		});
		var trayek_lk_printCM = Ext.create('Ext.menu.Item',{
			text : 'Lembar Kontrol',
			tooltip : 'Cetak Lembar Kontrol',
			handler : function(){
				var record = tr_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_trayek/switchAction',
					params: {
						ID_SKTR : record.get('ID_SKTR'),
						action : 'CETAKLK'
					},success : function(){
						window.open('../print/idam_sk.html');
					}
				});
			}
		});
		var trayek_rekom_printCM = Ext.create('Ext.menu.Item',{
			text : 'TRAYEK',
			tooltip : 'Cetak Lembar Rekomendasi',
			handler : function(){
				var record = tr_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_trayek/switchAction',
					params: {
						ID_SKTR : record.get('ID_SKTR'),
						action : 'CETAKSKTR'
					},success : function(){
						window.open('../print/idam_lembarkontrol.html');
					}
				});
			}
		});
		var trayek_sk_printCM = Ext.create('Ext.menu.Item',{
			text : 'TRAYEK',
			tooltip : 'Cetak Lembar SK',
			handler : function(){
				var record = tr_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_trayek/switchAction',
					params: {
						ID_SKTR : record.get('ID_SKTR'),
						action : 'CETAKSKTR'
					},success : function(){
						window.open('../print/idam_lembarkontrol.html');
					}
				});
			}
		});
		var trayek_printContextMenu = Ext.create('Ext.menu.Menu',{
			items: [
				<?php echo ($_SESSION["IDHAK"] == 2) ? ("trayek_bp_printCM") : ("trayek_bp_printCM,trayek_lk_printCM,trayek_sk_printCM,trayek_rekom_printCM,")?>
			]
		});
		function trayek_ubahProses(proses){
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
		var trayek_prosesContextMenu = Ext.create('Ext.menu.Menu',{
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
		ayek_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : ayek_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						ayek_dataStore.proxy.extraParams = { action : 'GETLIST'};
						ayek_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		ayek_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'ayek_gridPanel',
			constrain : true,
			store : ayek_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'ayekGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						ayek_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : ayek_shorcut,
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
							trayek_printContextMenu.showAt(e.getXY());
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
							ayek_confirmUpdate();
						}
					},{
						iconCls: 'icon16x16-delete',
						tooltip: 'Hapus Data',
						handler: function(grid, rowIndex){
							grid.getSelectionModel().select(rowIndex);
							ayek_confirmDelete();
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
							trayek_prosesContextMenu.showAt(e.getXY());
							return false;
						}
					}],
					<?php echo ($_SESSION["IDHAK"] == 2) ? ("hidden:true") : ("")?>
				}
			],
			tbar : [
				ayek_addButton,
				// ayek_editButton,
				// ayek_deleteButton,
				ayek_gridSearchField,
				// ayek_searchButton,
				ayek_refreshButton,
				ayek_printButton,
				ayek_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : ayek_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					ayek_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		ID_TRAYEKField = Ext.create('Ext.form.NumberField',{
			id : 'ID_TRAYEKField',
			name : 'ID_TRAYEK',
			fieldLabel : 'ID_TRAYEK<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		ID_TRAYEK_INTIField = Ext.create('Ext.form.NumberField',{
			id : 'ID_TRAYEK_INTIField',
			name : 'ID_TRAYEK_INTI',
			fieldLabel : 'ID_TRAYEK_INTI',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		KODE_TRAYEKField = Ext.create('Ext.form.TextField',{
			id : 'KODE_TRAYEKField',
			name : 'KODE_TRAYEK',
			fieldLabel : 'Kode Trayek',
			maxLength : 50,
		});
		NOMOR_UBField = Ext.create('Ext.form.TextField',{
			id : 'NOMOR_UBField',
			name : 'NOMOR_UB',
			fieldLabel : 'Nomor Uji Berkala',
			maxLength : 50,
		});
		TGL_PERMOHONANField = Ext.create('Ext.form.TextField',{
			id : 'TGL_PERMOHONANField',
			name : 'TGL_PERMOHONAN',
			fieldLabel : 'Tanggal Permohonan',
			maxLength : 0,
			hidden : true,
		});
		NAMA_PERUSAHAANField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_PERUSAHAANField',
			name : 'NAMA_PERUSAHAAN',
			fieldLabel : 'Nama Perusahaan',
			maxLength : 50
		});
		NAMA_PEMOHONField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_PEMOHONField',
			name : 'NAMA_PEMOHON',
			fieldLabel : 'Nama Pemohon',
			maxLength : 50,
			hidden : true,
		});
		TGL_AKHIRField = Ext.create('Ext.form.Date',{
			id : 'TGL_AKHIRField',
			name : 'TGL_AKHIR',
			format:'d-m-Y',
			fieldLabel : 'Tanggal Akhir',
		});
		STATUSField = Ext.create('Ext.form.ComboBox',{
			id : 'STATUSField',
			name : 'STATUS',
			fieldLabel : 'Status Permohonan',
			allowBlank : false,
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
			fieldLabel : 'Status Survey',
			allowBlank : false,
			store : new Ext.data.ArrayStore({
				fields : ['status_survey_id', 'status_survey'],
				data : [[1,'Diterima'],[0,'Ditolak']]
			}),
			displayField : 'status_survey',
			valueField : 'status_survey_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true
		});
		NOMOR_KENDARAANField = Ext.create('Ext.form.TextField',{
			id : 'NOMOR_KENDARAANField',
			name : 'NOMOR_KENDARAAN',
			fieldLabel : 'Nomor Kendaraan',
			maxLength : 20
		});
		NAMA_PEMILIKField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_PEMILIKField',
			name : 'NAMA_PEMILIK',
			fieldLabel : 'Nama Pemilik',
			maxLength : 50
		});
		ALAMAT_PEMILIKField = Ext.create('Ext.form.TextField',{
			id : 'ALAMAT_PEMILIKField',
			name : 'ALAMAT_PEMILIK',
			fieldLabel : 'Alamat Pemilik',
			maxLength : 100
		});
		NO_HPField = Ext.create('Ext.form.TextField',{
			id : 'NO_HPField',
			name : 'NO_HP',
			fieldLabel : 'No. HP Pemilik',
			maxLength : 20
		});
		NOMOR_RANGKAField = Ext.create('Ext.form.TextField',{
			id : 'NOMOR_RANGKAField',
			name : 'NOMOR_RANGKA',
			fieldLabel : 'Nomor Rangka',
			maxLength : 50
		});
		NOMOR_MESINField = Ext.create('Ext.form.TextField',{
			id : 'NOMOR_MESINField',
			name : 'NOMOR_MESIN',
			fieldLabel : 'Nomor Mesin',
			maxLength : 50
		});
		pemohon_namaField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_namaField',
			name : 'pemohon_nama',
			fieldLabel : 'Nama Pemohon',
			maxLength : 50
		});
		pemohon_idField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_idField',
			name : 'pemohon_id',
			fieldLabel : '',
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
		NO_SK_LAMAField = Ext.create('Ext.form.ComboBox',{
			name : 'NO_SK_LAMA',
			fieldLabel : 'SK Lama',
			hidden:true,
			store : Ext.create('Ext.data.Store',{
				pageSize : globalPageSize,
				proxy : Ext.create('Ext.data.HttpProxy',{
					url : 'c_trayek/switchAction',
					reader : {
						type : 'json', root : 'results', rootProperty : 'results', totalProperty : 'total', idProperty : 'ID_TRAYEK'
					},
					actionMethods : { read : 'POST' },
					extraParams : { action : 'SEARCH' }
				}),
				fields : [
					{ name : 'ID_TRAYEK', type : 'int', mapping : 'ID_TRAYEK' },
					{ name : 'ID_TRAYEK_INTI', type : 'int', mapping : 'ID_TRAYEK_INTI' },
					{ name : 'KODE_TRAYEK', type : 'string', mapping : 'KODE_TRAYEK' },
					{ name : 'NOMOR_UB', type : 'string', mapping : 'NOMOR_UB' },
					{ name : 'NO_SK', type : 'string', mapping : 'NO_SK' },
					{ name : 'pemohon_nik', type : 'string', mapping : 'pemohon_nik' },
					{ name : 'pemohon_id', type : 'string', mapping : 'pemohon_id' },
					{ name : 'pemohon_nama', type : 'string', mapping : 'pemohon_nama' },
					{ name : 'pemohon_alamat', type : 'string', mapping : 'pemohon_alamat' },
					{ name : 'pemohon_telp', type : 'string', mapping : 'pemohon_telp' },
					{ name : 'lama_proses', type : 'string', mapping : 'lama_proses' },
					{ name : 'TGL_PERMOHONAN', type : 'date', dateFormat : 'Y-m-d', mapping : 'TGL_PERMOHONAN' },
					{ name : 'NAMA_PERUSAHAAN', type : 'string', mapping : 'NAMA_PERUSAHAAN' },
					{ name : 'TGL_AKHIR', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'TGL_AKHIR' },
					{ name : 'NOMOR_KENDARAAN', type : 'string', mapping : 'NOMOR_KENDARAAN' },
					{ name : 'NAMA_PEMILIK', type : 'string', mapping : 'NAMA_PEMILIK' },
					{ name : 'ALAMAT_PEMILIK', type : 'string', mapping : 'ALAMAT_PEMILIK' },
					{ name : 'NO_HP', type : 'string', mapping : 'NO_HP' },
					{ name : 'NOMOR_RANGKA', type : 'string', mapping : 'NOMOR_RANGKA' },
					{ name : 'NOMOR_MESIN', type : 'string', mapping : 'NOMOR_MESIN' },
					{ name : 'JENIS_PERMOHONAN', type : 'int', mapping : 'JENIS_PERMOHONAN' },
				]
			}),
			displayField : 'NO_SK',
			valueField : 'ID_TRAYEK',
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
					'<div class="x-boundlist-item">No. SK : {NO_SK}<br>Nama Perusahaan : {NAMA_PERUSAHAAN}<br>Nomor Kendaraan : {NOMOR_KENDARAAN}</div>',
				'</tpl>'
			),
			listeners : {
				select : function(cmb, record){
					var rec=record[0];
					NAMA_PERUSAHAANField.setValue(rec.get('NAMA_PERUSAHAAN'));
					NOMOR_KENDARAANField.setValue(rec.get('NOMOR_KENDARAAN'));
					NAMA_PEMILIKField.setValue(rec.get('NAMA_PEMILIK'));
					ALAMAT_PEMILIKField.setValue(rec.get('ALAMAT_PEMILIK'));
					NO_HPField.setValue(rec.get('NO_HP'));
					NOMOR_RANGKAField.setValue(rec.get('NOMOR_RANGKA'));
					NOMOR_MESINField.setValue(rec.get('NOMOR_MESIN'));
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
		JENIS_PERMOHONANField = Ext.create('Ext.form.ComboBox',{
			id : 'JENIS_PERMOHONANField',
			name : 'JENIS_PERMOHONAN',
			fieldLabel : 'Jenis Permohonan',
			allowBlank : false,
			store : new Ext.data.ArrayStore({
				fields : ['jenis_id', 'jenis'],
				data : [[1,'Baru'],[0,'Perpanjangan']]
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
		var ayek_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : ayek_save
		});
		var ayek_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				ayek_resetForm();
				ayek_switchToGrid();
				$('html, body').animate({scrollTop: 0}, 500);
			}
		});
		
		/*Get Syarat*/
		trayek_syaratDataStore = Ext.create('Ext.data.Store',{
			id : 'trayek_syaratDataStore',
			pageSize : globalPageSize,
			autoLoad : true,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_trayek/switchAction',
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
		var trayek_syaratGridEditor = new Ext.grid.plugin.CellEditing({
			clicksToEdit: 1
		});
		trayek_syaratGrid = Ext.create('Ext.grid.Panel',{
			id : 'trayek_syaratDataStore',
			store : trayek_syaratDataStore,
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
		
		ayek_formPanel = Ext.create('Ext.form.Panel', {
			disabled : true,
			frame : true,
			layout : {
				type : 'form',
				padding : 5
			},
			items: [
				{
					xtype : 'fieldset',
					title : 'Perijinan Trayek',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						JENIS_PERMOHONANField,
						NO_SK_LAMAField
											]
				},{
					xtype : 'fieldset',
					title : 'Data Permohon',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						pemohon_nikField,
						pemohon_namaField,
						pemohon_telpField,
						pemohon_alamatField
											]
				}, {
					xtype : 'fieldset',
					title : '1. Data Permohonan',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						NAMA_PERUSAHAANField,
						NOMOR_KENDARAANField,
						NAMA_PEMILIKField,
						ALAMAT_PEMILIKField,
						NO_HPField,
						NOMOR_RANGKAField,
						NOMOR_MESINField,
						<?php echo ($_SESSION["IDHAK"] == 2) ? ("") : ("TGL_AKHIRField,"); ?>
						<?php echo ($_SESSION["IDHAK"] == 2) ? ("") : ("KODE_TRAYEKField,"); ?>
						<?php echo ($_SESSION["IDHAK"] == 2) ? ("") : ("NOMOR_UBField,"); ?>
						<?php echo ($_SESSION["IDHAK"] == 2) ? ("") : ("STATUSField,"); ?>
						<?php echo ($_SESSION["IDHAK"] == 2) ? ("") : ("STATUS_SURVEYField,"); ?>
						]
				},{
					xtype : 'fieldset',
					title : '2. Data Kelengkapan',
					columnWidth : 0.5,
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						trayek_syaratGrid
					]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [ayek_saveButton,ayek_cancelButton]
		});
		ayek_formWindow = Ext.create('Ext.window.Window',{
			id : 'ayek_formWindow',
			renderTo : 'ayekSaveWindow',
			title : globalFormAddEditTitle + ' ' + ayek_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [ayek_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		ID_TRAYEK_INTISearchField = Ext.create('Ext.form.NumberField',{
			id : 'ID_TRAYEK_INTISearchField',
			name : 'ID_TRAYEK_INTI',
			fieldLabel : 'ID_TRAYEK_INTI',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		KODE_TRAYEKSearchField = Ext.create('Ext.form.TextField',{
			id : 'KODE_TRAYEKSearchField',
			name : 'KODE_TRAYEK',
			fieldLabel : 'KODE_TRAYEK',
			maxLength : 50
		
		});
		NOMOR_UBSearchField = Ext.create('Ext.form.TextField',{
			id : 'NOMOR_UBSearchField',
			name : 'NOMOR_UB',
			fieldLabel : 'NOMOR_UB',
			maxLength : 50
		
		});
		TGL_PERMOHONANSearchField = Ext.create('Ext.form.TextField',{
			id : 'TGL_PERMOHONANSearchField',
			name : 'TGL_PERMOHONAN',
			fieldLabel : 'TGL_PERMOHONAN',
			maxLength : 0
		
		});
		NAMA_PERUSAHAANSearchField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_PERUSAHAANSearchField',
			name : 'NAMA_PERUSAHAAN',
			fieldLabel : 'NAMA_PERUSAHAAN',
			maxLength : 50
		
		});
		NAMA_PEMOHONSearchField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_PEMOHONSearchField',
			name : 'NAMA_PEMOHON',
			fieldLabel : 'NAMA_PEMOHON',
			maxLength : 50
		
		});
		TGL_AKHIRSearchField = Ext.create('Ext.form.TextField',{
			id : 'TGL_AKHIRSearchField',
			name : 'TGL_AKHIR',
			fieldLabel : 'TGL_AKHIR',
			maxLength : 0
		
		});
		var ayek_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : ayek_search
		});
		var ayek_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				ayek_searchWindow.hide();
			}
		});
		ayek_searchPanel = Ext.create('Ext.form.Panel', {
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
						ID_TRAYEK_INTISearchField,
						KODE_TRAYEKSearchField,
						NOMOR_UBSearchField,
						TGL_PERMOHONANSearchField,
						NAMA_PERUSAHAANSearchField,
						NAMA_PEMOHONSearchField,
						TGL_AKHIRSearchField,
						]
				}],
			buttons : [ayek_searchingButton,ayek_cancelSearchButton]
		});
		ayek_searchWindow = Ext.create('Ext.window.Window',{
			id : 'ayek_searchWindow',
			renderTo : 'ayekSearchWindow',
			title : globalFormSearchTitle + ' ' + ayek_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [ayek_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="ayekSaveWindow"></div>
<div id="ayekSearchWindow"></div>
<div class="span12" id="ayekGrid"></div>