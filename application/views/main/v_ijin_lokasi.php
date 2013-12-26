<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var in_lokasi_componentItemTitle="IN_LOKASI";
		var in_lokasi_dataStore;
		
		var in_lokasi_shorcut;
		var in_lokasi_contextMenu;
		var in_lokasi_gridSearchField;
		var in_lokasi_gridPanel;
		var in_lokasi_formPanel;
		var in_lokasi_formWindow;
		var in_lokasi_searchPanel;
		var in_lokasi_searchWindow;
		
		var ID_IJIN_LOKASIField;
		var ID_IJIN_LOKASI_INTIField;
		var NO_KTPField;
		var NAMA_LENGKAPField;
		var TEMPAT_LAHIRField;
		var TGL_LAHIRField;
		var PEKERJAANField;
		var ALAMATField;
		var ID_DESAField;
		var ID_KECAMATANField;
		var ID_KOTAField;
		var TELEPON_PEMOHONField;
		var TGL_PERMOHONANField;
		var TGL_AKHIRField;
				
		var ID_IJIN_LOKASI_INTISearchField;
		var NO_KTPSearchField;
		var NAMA_LENGKAPSearchField;
		var TEMPAT_LAHIRSearchField;
		var TGL_LAHIRSearchField;
		var PEKERJAANSearchField;
		var ALAMATSearchField;
		var ID_DESASearchField;
		var ID_KECAMATANSearchField;
		var ID_KOTASearchField;
		var TELEPON_PEMOHONSearchField;
		var TGL_PERMOHONANSearchField;
		var TGL_AKHIRSearchField;
				
		var in_lokasi_dbTask = 'CREATE';
		var in_lokasi_dbTaskMessage = 'Tambah';
		var in_lokasi_dbPermission = 'CRUD';
		var in_lokasi_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function in_lokasi_switchToGrid(){
			in_lokasi_formPanel.setDisabled(true);
			in_lokasi_gridPanel.setDisabled(false);
			in_lokasi_formWindow.hide();
		}
		
		function in_lokasi_switchToForm(){
			in_lokasi_gridPanel.setDisabled(true);
			in_lokasi_formPanel.setDisabled(false);
			in_lokasi_formWindow.show();
		}
		
		function in_lokasi_confirmAdd(){
			in_lokasi_dbTask = 'CREATE';
			in_lokasi_dbTaskMessage = 'created';
			in_lokasi_resetForm();
			in_lokasi_switchToForm();
		}
		
		function in_lokasi_confirmUpdate(){
			if(in_lokasi_gridPanel.selModel.getCount() == 1) {
				in_lokasi_dbTask = 'UPDATE';
				in_lokasi_dbTaskMessage = 'updated';
				in_lokasi_switchToForm();
				in_lokasi_setForm();
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
		
		function in_lokasi_confirmDelete(){
			if(in_lokasi_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, in_lokasi_delete);
			}else if(in_lokasi_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, in_lokasi_delete);
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
		
		function in_lokasi_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(in_lokasi_dbPermission)==false && pattC.test(in_lokasi_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(in_lokasi_confirmFormValid()){
					var ID_IJIN_LOKASIValue = '';
					var ID_IJIN_LOKASI_INTIValue = '';
					var NO_KTPValue = '';
					var NAMA_LENGKAPValue = '';
					var TEMPAT_LAHIRValue = '';
					var TGL_LAHIRValue = '';
					var PEKERJAANValue = '';
					var ALAMATValue = '';
					var ID_DESAValue = '';
					var ID_KECAMATANValue = '';
					var ID_KOTAValue = '';
					var TELEPON_PEMOHONValue = '';
					var TGL_PERMOHONANValue = '';
					var TGL_AKHIRValue = '';
										
					ID_IJIN_LOKASIValue = ID_IJIN_LOKASIField.getValue();
					ID_IJIN_LOKASI_INTIValue = ID_IJIN_LOKASI_INTIField.getValue();
					NO_KTPValue = NO_KTPField.getValue();
					NAMA_LENGKAPValue = NAMA_LENGKAPField.getValue();
					TEMPAT_LAHIRValue = TEMPAT_LAHIRField.getValue();
					TGL_LAHIRValue = TGL_LAHIRField.getValue();
					PEKERJAANValue = PEKERJAANField.getValue();
					ALAMATValue = ALAMATField.getValue();
					ID_DESAValue = ID_DESAField.getValue();
					ID_KECAMATANValue = ID_KECAMATANField.getValue();
					ID_KOTAValue = ID_KOTAField.getValue();
					TELEPON_PEMOHONValue = TELEPON_PEMOHONField.getValue();
					TGL_PERMOHONANValue = TGL_PERMOHONANField.getValue();
					TGL_AKHIRValue = TGL_AKHIRField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_ijin_lokasi/switchAction',
						params: {							
							ID_IJIN_LOKASI : ID_IJIN_LOKASIValue,
							ID_IJIN_LOKASI_INTI : ID_IJIN_LOKASI_INTIValue,
							NO_KTP : NO_KTPValue,
							NAMA_LENGKAP : NAMA_LENGKAPValue,
							TEMPAT_LAHIR : TEMPAT_LAHIRValue,
							TGL_LAHIR : TGL_LAHIRValue,
							PEKERJAAN : PEKERJAANValue,
							ALAMAT : ALAMATValue,
							ID_DESA : ID_DESAValue,
							ID_KECAMATAN : ID_KECAMATANValue,
							ID_KOTA : ID_KOTAValue,
							TELEPON_PEMOHON : TELEPON_PEMOHONValue,
							TGL_PERMOHONAN : TGL_PERMOHONANValue,
							TGL_AKHIR : TGL_AKHIRValue,
							action : in_lokasi_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									in_lokasi_dataStore.reload();
									in_lokasi_resetForm();
									in_lokasi_switchToGrid();
									in_lokasi_gridPanel.getSelectionModel().deselectAll();
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
		
		function in_lokasi_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(in_lokasi_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = in_lokasi_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< in_lokasi_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.ID_IJIN_LOKASI);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_ijin_lokasi/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									in_lokasi_dataStore.reload();
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
		
		function in_lokasi_refresh(){
			in_lokasi_dbListAction = "GETLIST";
			in_lokasi_gridSearchField.reset();
			in_lokasi_searchPanel.getForm().reset();
			in_lokasi_dataStore.proxy.extraParams = { action : 'GETLIST' };
			in_lokasi_dataStore.proxy.extraParams.query = "";
			in_lokasi_dataStore.currentPage = 1;
			in_lokasi_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function in_lokasi_confirmFormValid(){
			return in_lokasi_formPanel.getForm().isValid();
		}
		
		function in_lokasi_resetForm(){
			in_lokasi_dbTask = 'CREATE';
			in_lokasi_dbTaskMessage = 'create';
			in_lokasi_formPanel.getForm().reset();
			ID_IJIN_LOKASIField.setValue(0);
		}
		
		function in_lokasi_setForm(){
			in_lokasi_dbTask = 'UPDATE';
            in_lokasi_dbTaskMessage = 'update';
			
			var record = in_lokasi_gridPanel.getSelectionModel().getSelection()[0];
			ID_IJIN_LOKASIField.setValue(record.data.ID_IJIN_LOKASI);
			ID_IJIN_LOKASI_INTIField.setValue(record.data.ID_IJIN_LOKASI_INTI);
			NO_KTPField.setValue(record.data.NO_KTP);
			NAMA_LENGKAPField.setValue(record.data.NAMA_LENGKAP);
			TEMPAT_LAHIRField.setValue(record.data.TEMPAT_LAHIR);
			TGL_LAHIRField.setValue(record.data.TGL_LAHIR);
			PEKERJAANField.setValue(record.data.PEKERJAAN);
			ALAMATField.setValue(record.data.ALAMAT);
			ID_DESAField.setValue(record.data.ID_DESA);
			ID_KECAMATANField.setValue(record.data.ID_KECAMATAN);
			ID_KOTAField.setValue(record.data.ID_KOTA);
			TELEPON_PEMOHONField.setValue(record.data.TELEPON_PEMOHON);
			TGL_PERMOHONANField.setValue(record.data.TGL_PERMOHONAN);
			TGL_AKHIRField.setValue(record.data.TGL_AKHIR);
					}
		
		function in_lokasi_showSearchWindow(){
			in_lokasi_searchWindow.show();
		}
		
		function in_lokasi_search(){
			in_lokasi_gridSearchField.reset();
			
			var ID_IJIN_LOKASI_INTIValue = '';
			var NO_KTPValue = '';
			var NAMA_LENGKAPValue = '';
			var TEMPAT_LAHIRValue = '';
			var TGL_LAHIRValue = '';
			var PEKERJAANValue = '';
			var ALAMATValue = '';
			var ID_DESAValue = '';
			var ID_KECAMATANValue = '';
			var ID_KOTAValue = '';
			var TELEPON_PEMOHONValue = '';
			var TGL_PERMOHONANValue = '';
			var TGL_AKHIRValue = '';
						
			ID_IJIN_LOKASI_INTIValue = ID_IJIN_LOKASI_INTISearchField.getValue();
			NO_KTPValue = NO_KTPSearchField.getValue();
			NAMA_LENGKAPValue = NAMA_LENGKAPSearchField.getValue();
			TEMPAT_LAHIRValue = TEMPAT_LAHIRSearchField.getValue();
			TGL_LAHIRValue = TGL_LAHIRSearchField.getValue();
			PEKERJAANValue = PEKERJAANSearchField.getValue();
			ALAMATValue = ALAMATSearchField.getValue();
			ID_DESAValue = ID_DESASearchField.getValue();
			ID_KECAMATANValue = ID_KECAMATANSearchField.getValue();
			ID_KOTAValue = ID_KOTASearchField.getValue();
			TELEPON_PEMOHONValue = TELEPON_PEMOHONSearchField.getValue();
			TGL_PERMOHONANValue = TGL_PERMOHONANSearchField.getValue();
			TGL_AKHIRValue = TGL_AKHIRSearchField.getValue();
			in_lokasi_dbListAction = "SEARCH";
			in_lokasi_dataStore.proxy.extraParams = { 
				ID_IJIN_LOKASI_INTI : ID_IJIN_LOKASI_INTIValue,
				NO_KTP : NO_KTPValue,
				NAMA_LENGKAP : NAMA_LENGKAPValue,
				TEMPAT_LAHIR : TEMPAT_LAHIRValue,
				TGL_LAHIR : TGL_LAHIRValue,
				PEKERJAAN : PEKERJAANValue,
				ALAMAT : ALAMATValue,
				ID_DESA : ID_DESAValue,
				ID_KECAMATAN : ID_KECAMATANValue,
				ID_KOTA : ID_KOTAValue,
				TELEPON_PEMOHON : TELEPON_PEMOHONValue,
				TGL_PERMOHONAN : TGL_PERMOHONANValue,
				TGL_AKHIR : TGL_AKHIRValue,
				action : 'SEARCH'
			};
			in_lokasi_dataStore.currentPage = 1;
			in_lokasi_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function in_lokasi_printExcel(outputType){
			var searchText = "";
			var ID_IJIN_LOKASI_INTIValue = '';
			var NO_KTPValue = '';
			var NAMA_LENGKAPValue = '';
			var TEMPAT_LAHIRValue = '';
			var TGL_LAHIRValue = '';
			var PEKERJAANValue = '';
			var ALAMATValue = '';
			var ID_DESAValue = '';
			var ID_KECAMATANValue = '';
			var ID_KOTAValue = '';
			var TELEPON_PEMOHONValue = '';
			var TGL_PERMOHONANValue = '';
			var TGL_AKHIRValue = '';
			
			if(in_lokasi_dataStore.proxy.extraParams.query!==null){searchText = in_lokasi_dataStore.proxy.extraParams.query;}
			if(in_lokasi_dataStore.proxy.extraParams.ID_IJIN_LOKASI_INTI!==null){ID_IJIN_LOKASI_INTIValue = in_lokasi_dataStore.proxy.extraParams.ID_IJIN_LOKASI_INTI;}
			if(in_lokasi_dataStore.proxy.extraParams.NO_KTP!==null){NO_KTPValue = in_lokasi_dataStore.proxy.extraParams.NO_KTP;}
			if(in_lokasi_dataStore.proxy.extraParams.NAMA_LENGKAP!==null){NAMA_LENGKAPValue = in_lokasi_dataStore.proxy.extraParams.NAMA_LENGKAP;}
			if(in_lokasi_dataStore.proxy.extraParams.TEMPAT_LAHIR!==null){TEMPAT_LAHIRValue = in_lokasi_dataStore.proxy.extraParams.TEMPAT_LAHIR;}
			if(in_lokasi_dataStore.proxy.extraParams.TGL_LAHIR!==null){TGL_LAHIRValue = in_lokasi_dataStore.proxy.extraParams.TGL_LAHIR;}
			if(in_lokasi_dataStore.proxy.extraParams.PEKERJAAN!==null){PEKERJAANValue = in_lokasi_dataStore.proxy.extraParams.PEKERJAAN;}
			if(in_lokasi_dataStore.proxy.extraParams.ALAMAT!==null){ALAMATValue = in_lokasi_dataStore.proxy.extraParams.ALAMAT;}
			if(in_lokasi_dataStore.proxy.extraParams.ID_DESA!==null){ID_DESAValue = in_lokasi_dataStore.proxy.extraParams.ID_DESA;}
			if(in_lokasi_dataStore.proxy.extraParams.ID_KECAMATAN!==null){ID_KECAMATANValue = in_lokasi_dataStore.proxy.extraParams.ID_KECAMATAN;}
			if(in_lokasi_dataStore.proxy.extraParams.ID_KOTA!==null){ID_KOTAValue = in_lokasi_dataStore.proxy.extraParams.ID_KOTA;}
			if(in_lokasi_dataStore.proxy.extraParams.TELEPON_PEMOHON!==null){TELEPON_PEMOHONValue = in_lokasi_dataStore.proxy.extraParams.TELEPON_PEMOHON;}
			if(in_lokasi_dataStore.proxy.extraParams.TGL_PERMOHONAN!==null){TGL_PERMOHONANValue = in_lokasi_dataStore.proxy.extraParams.TGL_PERMOHONAN;}
			if(in_lokasi_dataStore.proxy.extraParams.TGL_AKHIR!==null){TGL_AKHIRValue = in_lokasi_dataStore.proxy.extraParams.TGL_AKHIR;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_ijin_lokasi/switchAction',
				params : {
					action : outputType,
					query : searchText,
					ID_IJIN_LOKASI_INTI : ID_IJIN_LOKASI_INTIValue,
					NO_KTP : NO_KTPValue,
					NAMA_LENGKAP : NAMA_LENGKAPValue,
					TEMPAT_LAHIR : TEMPAT_LAHIRValue,
					TGL_LAHIR : TGL_LAHIRValue,
					PEKERJAAN : PEKERJAANValue,
					ALAMAT : ALAMATValue,
					ID_DESA : ID_DESAValue,
					ID_KECAMATAN : ID_KECAMATANValue,
					ID_KOTA : ID_KOTAValue,
					TELEPON_PEMOHON : TELEPON_PEMOHONValue,
					TGL_PERMOHONAN : TGL_PERMOHONANValue,
					TGL_AKHIR : TGL_AKHIRValue,
					currentAction : in_lokasi_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/ijin_lokasi_list.xls');
							}else{
								window.open('./print/ijin_lokasi_list.html','in_lokasilist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		in_lokasi_dataStore = Ext.create('Ext.data.Store',{
			id : 'in_lokasi_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_ijin_lokasi/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'ID_IJIN_LOKASI'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'ID_IJIN_LOKASI', type : 'int', mapping : 'ID_IJIN_LOKASI' },
				{ name : 'ID_IJIN_LOKASI_INTI', type : 'int', mapping : 'ID_IJIN_LOKASI_INTI' },
				{ name : 'NO_KTP', type : 'string', mapping : 'NO_KTP' },
				{ name : 'NAMA_LENGKAP', type : 'string', mapping : 'NAMA_LENGKAP' },
				{ name : 'TEMPAT_LAHIR', type : 'string', mapping : 'TEMPAT_LAHIR' },
				{ name : 'TGL_LAHIR', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'TGL_LAHIR' },
				{ name : 'PEKERJAAN', type : 'string', mapping : 'PEKERJAAN' },
				{ name : 'ALAMAT', type : 'string', mapping : 'ALAMAT' },
				{ name : 'ID_DESA', type : 'int', mapping : 'ID_DESA' },
				{ name : 'ID_KECAMATAN', type : 'int', mapping : 'ID_KECAMATAN' },
				{ name : 'ID_KOTA', type : 'int', mapping : 'ID_KOTA' },
				{ name : 'TELEPON_PEMOHON', type : 'string', mapping : 'TELEPON_PEMOHON' },
				{ name : 'TGL_PERMOHONAN', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'TGL_PERMOHONAN' },
				{ name : 'TGL_AKHIR', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'TGL_AKHIR' },
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		in_lokasi_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						in_lokasi_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						in_lokasi_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						in_lokasi_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						in_lokasi_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						in_lokasi_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						in_lokasi_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						in_lokasi_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						in_lokasi_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var in_lokasi_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : in_lokasi_confirmAdd
		});
		var in_lokasi_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : in_lokasi_confirmUpdate
		});
		var in_lokasi_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : in_lokasi_confirmDelete
		});
		var in_lokasi_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : in_lokasi_refresh
		});
		var in_lokasi_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : in_lokasi_showSearchWindow
		});
		var in_lokasi_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				in_lokasi_printExcel('PRINT');
			}
		});
		var in_lokasi_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				in_lokasi_printExcel('EXCEL');
			}
		});
		
		var in_lokasi_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : in_lokasi_confirmUpdate
		});
		var in_lokasi_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : in_lokasi_confirmDelete
		});
		var in_lokasi_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : in_lokasi_refresh
		});
		in_lokasi_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'in_lokasi_contextMenu',
			items: [
				in_lokasi_contextMenuEdit,in_lokasi_contextMenuDelete,'-',in_lokasi_contextMenuRefresh
			]
		});
		
		in_lokasi_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : in_lokasi_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						in_lokasi_dataStore.proxy.extraParams = { action : 'GETLIST'};
						in_lokasi_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		in_lokasi_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'in_lokasi_gridPanel',
			constrain : true,
			store : in_lokasi_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'in_lokasiGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						in_lokasi_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : in_lokasi_shorcut,
			columns : [
				// {
					// text : 'ID_IJIN_LOKASI_INTI',
					// dataIndex : 'ID_IJIN_LOKASI_INTI',
					// width : 100,
					// sortable : false
				// },
				// {
					// text : 'NO_KTP',
					// dataIndex : 'NO_KTP',
					// width : 100,
					// sortable : false
				// },
				// {
					// text : 'NAMA_LENGKAP',
					// dataIndex : 'NAMA_LENGKAP',
					// width : 100,
					// sortable : false
				// },
				// {
					// text : 'TEMPAT_LAHIR',
					// dataIndex : 'TEMPAT_LAHIR',
					// width : 100,
					// sortable : false
				// },
				// {
					// text : 'TGL_LAHIR',
					// dataIndex : 'TGL_LAHIR',
					// width : 100,
					// sortable : false
				// },
				// {
					// text : 'PEKERJAAN',
					// dataIndex : 'PEKERJAAN',
					// width : 100,
					// sortable : false
				// },
				// {
					// text : 'ALAMAT',
					// dataIndex : 'ALAMAT',
					// width : 100,
					// sortable : false
				// },
				// {
					// text : 'ID_DESA',
					// dataIndex : 'ID_DESA',
					// width : 100,
					// sortable : false
				// },
				// {
					// text : 'ID_KECAMATAN',
					// dataIndex : 'ID_KECAMATAN',
					// width : 100,
					// sortable : false
				// },
				// {
					// text : 'ID_KOTA',
					// dataIndex : 'ID_KOTA',
					// width : 100,
					// sortable : false
				// },
				// {
					// text : 'TELEPON_PEMOHON',
					// dataIndex : 'TELEPON_PEMOHON',
					// width : 100,
					// sortable : false
				// },
				// {
					// text : 'TGL_PERMOHONAN',
					// dataIndex : 'TGL_PERMOHONAN',
					// width : 100,
					// sortable : false
				// },
				// {
					// text : 'TGL_AKHIR',
					// dataIndex : 'TGL_AKHIR',
					// width : 100,
					// sortable : false
				// },
				// {
					// text : 'ID_SKTR_INTI',
					// dataIndex : 'ID_SKTR_INTI',
					// width : 100,
					// sortable : false
				// },
				// {
					// text : 'ID_USER',
					// dataIndex : 'ID_USER',
					// width : 100,
					// sortable : false
				// },
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
				// {
					// text : 'NAMA_PEMILIK',
					// dataIndex : 'NAMA_PEMILIK',
					// width : 100,
					// sortable : false
				// },
				// {
					// text : 'NO_SURAT_TANAH',
					// dataIndex : 'NO_SURAT_TANAH',
					// width : 100,
					// sortable : false
				// },
				// {
					// text : 'BATAS_KIRI',
					// dataIndex : 'BATAS_KIRI',
					// width : 100,
					// sortable : false
				// },
				// {
					// text : 'BATAS_KANAN',
					// dataIndex : 'BATAS_KANAN',
					// width : 100,
					// sortable : false
				// },
				// {
					// text : 'BATAS_DEPAN',
					// dataIndex : 'BATAS_DEPAN',
					// width : 100,
					// sortable : false
				// },
				// {
					// text : 'BATAS_BELAKANG',
					// dataIndex : 'BATAS_BELAKANG',
					// width : 100,
					// sortable : false
				// },
				// {
					// text : 'TGL_PERMOHONAN',
					// dataIndex : 'TGL_PERMOHONAN',
					// width : 100,
					// sortable : false
				// },
				// {
					// text : 'Lama Proses',
					// dataIndex : 'lama_proses',
					// width : 100,
					// sortable : false
				// },
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
					}]
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
					}]
				}
							
			],
			tbar : [
				in_lokasi_addButton,
				// in_lokasi_editButton,
				// in_lokasi_deleteButton,
				in_lokasi_gridSearchField,
				// in_lokasi_searchButton,
				in_lokasi_refreshButton,
				in_lokasi_printButton,
				in_lokasi_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : in_lokasi_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					in_lokasi_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		ID_IJIN_LOKASIField = Ext.create('Ext.form.NumberField',{
			id : 'ID_IJIN_LOKASIField',
			name : 'ID_IJIN_LOKASI',
			fieldLabel : 'ID_IJIN_LOKASI<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		ID_IJIN_LOKASI_INTIField = Ext.create('Ext.form.NumberField',{
			id : 'ID_IJIN_LOKASI_INTIField',
			name : 'ID_IJIN_LOKASI_INTI',
			fieldLabel : 'ID_IJIN_LOKASI_INTI',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		NO_KTPField = Ext.create('Ext.form.TextField',{
			id : 'NO_KTPField',
			name : 'NO_KTP',
			fieldLabel : 'NO_KTP',
			maxLength : 255
		});
		NAMA_LENGKAPField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_LENGKAPField',
			name : 'NAMA_LENGKAP',
			fieldLabel : 'NAMA_LENGKAP',
			maxLength : 255
		});
		TEMPAT_LAHIRField = Ext.create('Ext.form.TextField',{
			id : 'TEMPAT_LAHIRField',
			name : 'TEMPAT_LAHIR',
			fieldLabel : 'TEMPAT_LAHIR',
			maxLength : 255
		});
		TGL_LAHIRField = Ext.create('Ext.form.TextField',{
			id : 'TGL_LAHIRField',
			name : 'TGL_LAHIR',
			fieldLabel : 'TGL_LAHIR',
			maxLength : 0
		});
		PEKERJAANField = Ext.create('Ext.form.TextField',{
			id : 'PEKERJAANField',
			name : 'PEKERJAAN',
			fieldLabel : 'PEKERJAAN',
			maxLength : 255
		});
		ALAMATField = Ext.create('Ext.form.TextField',{
			id : 'ALAMATField',
			name : 'ALAMAT',
			fieldLabel : 'ALAMAT',
			maxLength : 255
		});
		ID_DESAField = Ext.create('Ext.form.NumberField',{
			id : 'ID_DESAField',
			name : 'ID_DESA',
			fieldLabel : 'ID_DESA',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		ID_KECAMATANField = Ext.create('Ext.form.NumberField',{
			id : 'ID_KECAMATANField',
			name : 'ID_KECAMATAN',
			fieldLabel : 'ID_KECAMATAN',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		ID_KOTAField = Ext.create('Ext.form.NumberField',{
			id : 'ID_KOTAField',
			name : 'ID_KOTA',
			fieldLabel : 'ID_KOTA',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		TELEPON_PEMOHONField = Ext.create('Ext.form.TextField',{
			id : 'TELEPON_PEMOHONField',
			name : 'TELEPON_PEMOHON',
			fieldLabel : 'TELEPON_PEMOHON',
			maxLength : 255
		});
		TGL_PERMOHONANField = Ext.create('Ext.form.TextField',{
			id : 'TGL_PERMOHONANField',
			name : 'TGL_PERMOHONAN',
			fieldLabel : 'TGL_PERMOHONAN',
			maxLength : 0
		});
		TGL_AKHIRField = Ext.create('Ext.form.TextField',{
			id : 'TGL_AKHIRField',
			name : 'TGL_AKHIR',
			fieldLabel : 'TGL_AKHIR',
			maxLength : 0
		});
		var in_lokasi_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : in_lokasi_save
		});
		var in_lokasi_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				in_lokasi_resetForm();
				in_lokasi_switchToGrid();
			}
		});
		in_lokasi_formPanel = Ext.create('Ext.form.Panel', {
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
						ID_IJIN_LOKASIField,
						ID_IJIN_LOKASI_INTIField,
						NO_KTPField,
						NAMA_LENGKAPField,
						TEMPAT_LAHIRField,
						TGL_LAHIRField,
						PEKERJAANField,
						ALAMATField,
						ID_DESAField,
						ID_KECAMATANField,
						ID_KOTAField,
						TELEPON_PEMOHONField,
						TGL_PERMOHONANField,
						TGL_AKHIRField,
											]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [in_lokasi_saveButton,in_lokasi_cancelButton]
		});
		in_lokasi_formWindow = Ext.create('Ext.window.Window',{
			id : 'in_lokasi_formWindow',
			renderTo : 'in_lokasiSaveWindow',
			title : globalFormAddEditTitle + ' ' + in_lokasi_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [in_lokasi_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		ID_IJIN_LOKASI_INTISearchField = Ext.create('Ext.form.NumberField',{
			id : 'ID_IJIN_LOKASI_INTISearchField',
			name : 'ID_IJIN_LOKASI_INTI',
			fieldLabel : 'ID_IJIN_LOKASI_INTI',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		NO_KTPSearchField = Ext.create('Ext.form.TextField',{
			id : 'NO_KTPSearchField',
			name : 'NO_KTP',
			fieldLabel : 'NO_KTP',
			maxLength : 255
		
		});
		NAMA_LENGKAPSearchField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_LENGKAPSearchField',
			name : 'NAMA_LENGKAP',
			fieldLabel : 'NAMA_LENGKAP',
			maxLength : 255
		
		});
		TEMPAT_LAHIRSearchField = Ext.create('Ext.form.TextField',{
			id : 'TEMPAT_LAHIRSearchField',
			name : 'TEMPAT_LAHIR',
			fieldLabel : 'TEMPAT_LAHIR',
			maxLength : 255
		
		});
		TGL_LAHIRSearchField = Ext.create('Ext.form.TextField',{
			id : 'TGL_LAHIRSearchField',
			name : 'TGL_LAHIR',
			fieldLabel : 'TGL_LAHIR',
			maxLength : 0
		
		});
		PEKERJAANSearchField = Ext.create('Ext.form.TextField',{
			id : 'PEKERJAANSearchField',
			name : 'PEKERJAAN',
			fieldLabel : 'PEKERJAAN',
			maxLength : 255
		
		});
		ALAMATSearchField = Ext.create('Ext.form.TextField',{
			id : 'ALAMATSearchField',
			name : 'ALAMAT',
			fieldLabel : 'ALAMAT',
			maxLength : 255
		
		});
		ID_DESASearchField = Ext.create('Ext.form.NumberField',{
			id : 'ID_DESASearchField',
			name : 'ID_DESA',
			fieldLabel : 'ID_DESA',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		ID_KECAMATANSearchField = Ext.create('Ext.form.NumberField',{
			id : 'ID_KECAMATANSearchField',
			name : 'ID_KECAMATAN',
			fieldLabel : 'ID_KECAMATAN',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		ID_KOTASearchField = Ext.create('Ext.form.NumberField',{
			id : 'ID_KOTASearchField',
			name : 'ID_KOTA',
			fieldLabel : 'ID_KOTA',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		TELEPON_PEMOHONSearchField = Ext.create('Ext.form.TextField',{
			id : 'TELEPON_PEMOHONSearchField',
			name : 'TELEPON_PEMOHON',
			fieldLabel : 'TELEPON_PEMOHON',
			maxLength : 255
		
		});
		TGL_PERMOHONANSearchField = Ext.create('Ext.form.TextField',{
			id : 'TGL_PERMOHONANSearchField',
			name : 'TGL_PERMOHONAN',
			fieldLabel : 'TGL_PERMOHONAN',
			maxLength : 0
		
		});
		TGL_AKHIRSearchField = Ext.create('Ext.form.TextField',{
			id : 'TGL_AKHIRSearchField',
			name : 'TGL_AKHIR',
			fieldLabel : 'TGL_AKHIR',
			maxLength : 0
		
		});
		var in_lokasi_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : in_lokasi_search
		});
		var in_lokasi_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				in_lokasi_searchWindow.hide();
			}
		});
		in_lokasi_searchPanel = Ext.create('Ext.form.Panel', {
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
						ID_IJIN_LOKASI_INTISearchField,
						NO_KTPSearchField,
						NAMA_LENGKAPSearchField,
						TEMPAT_LAHIRSearchField,
						TGL_LAHIRSearchField,
						PEKERJAANSearchField,
						ALAMATSearchField,
						ID_DESASearchField,
						ID_KECAMATANSearchField,
						ID_KOTASearchField,
						TELEPON_PEMOHONSearchField,
						TGL_PERMOHONANSearchField,
						TGL_AKHIRSearchField,
						]
				}],
			buttons : [in_lokasi_searchingButton,in_lokasi_cancelSearchButton]
		});
		in_lokasi_searchWindow = Ext.create('Ext.window.Window',{
			id : 'in_lokasi_searchWindow',
			renderTo : 'in_lokasiSearchWindow',
			title : globalFormSearchTitle + ' ' + in_lokasi_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [in_lokasi_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="in_lokasiSaveWindow"></div>
<div id="in_lokasiSearchWindow"></div>
<div class="span12" id="in_lokasiGrid"></div>