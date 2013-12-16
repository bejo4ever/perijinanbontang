<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var ayek_inti_componentItemTitle="AYEK_INTI";
		var ayek_inti_dataStore;
		
		var ayek_inti_shorcut;
		var ayek_inti_contextMenu;
		var ayek_inti_gridSearchField;
		var ayek_inti_gridPanel;
		var ayek_inti_formPanel;
		var ayek_inti_formWindow;
		var ayek_inti_searchPanel;
		var ayek_inti_searchWindow;
		
		var ID_TRAYEK_INTIField;
		var ID_USERField;
		var NOMOR_KENDARAANField;
		var NAMA_PEMILIKField;
		var ALAMAT_PEMILIKField;
		var NO_HPField;
		var NOMOR_RANGKAField;
		var NOMOR_MESINField;
		var JENIS_PERMOHONANField;
				
		var ID_USERSearchField;
		var NOMOR_KENDARAANSearchField;
		var NAMA_PEMILIKSearchField;
		var ALAMAT_PEMILIKSearchField;
		var NO_HPSearchField;
		var NOMOR_RANGKASearchField;
		var NOMOR_MESINSearchField;
		var JENIS_PERMOHONANSearchField;
				
		var ayek_inti_dbTask = 'CREATE';
		var ayek_inti_dbTaskMessage = 'Tambah';
		var ayek_inti_dbPermission = 'CRUD';
		var ayek_inti_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function ayek_inti_switchToGrid(){
			ayek_inti_formPanel.setDisabled(true);
			ayek_inti_gridPanel.setDisabled(false);
			ayek_inti_formWindow.hide();
		}
		
		function ayek_inti_switchToForm(){
			ayek_inti_gridPanel.setDisabled(true);
			ayek_inti_formPanel.setDisabled(false);
			ayek_inti_formWindow.show();
		}
		
		function ayek_inti_confirmAdd(){
			ayek_inti_dbTask = 'CREATE';
			ayek_inti_dbTaskMessage = 'created';
			ayek_inti_resetForm();
			ayek_inti_switchToForm();
		}
		
		function ayek_inti_confirmUpdate(){
			if(ayek_inti_gridPanel.selModel.getCount() == 1) {
				ayek_inti_dbTask = 'UPDATE';
				ayek_inti_dbTaskMessage = 'updated';
				ayek_inti_switchToForm();
				ayek_inti_setForm();
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
		
		function ayek_inti_confirmDelete(){
			if(ayek_inti_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, ayek_inti_delete);
			}else if(ayek_inti_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, ayek_inti_delete);
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
		
		function ayek_inti_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(ayek_inti_dbPermission)==false && pattC.test(ayek_inti_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(ayek_inti_confirmFormValid()){
					var ID_TRAYEK_INTIValue = '';
					var ID_USERValue = '';
					var NOMOR_KENDARAANValue = '';
					var NAMA_PEMILIKValue = '';
					var ALAMAT_PEMILIKValue = '';
					var NO_HPValue = '';
					var NOMOR_RANGKAValue = '';
					var NOMOR_MESINValue = '';
					var JENIS_PERMOHONANValue = '';
										
					ID_TRAYEK_INTIValue = ID_TRAYEK_INTIField.getValue();
					ID_USERValue = ID_USERField.getValue();
					NOMOR_KENDARAANValue = NOMOR_KENDARAANField.getValue();
					NAMA_PEMILIKValue = NAMA_PEMILIKField.getValue();
					ALAMAT_PEMILIKValue = ALAMAT_PEMILIKField.getValue();
					NO_HPValue = NO_HPField.getValue();
					NOMOR_RANGKAValue = NOMOR_RANGKAField.getValue();
					NOMOR_MESINValue = NOMOR_MESINField.getValue();
					JENIS_PERMOHONANValue = JENIS_PERMOHONANField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_trayek_inti/switchAction',
						params: {							
							ID_TRAYEK_INTI : ID_TRAYEK_INTIValue,
							ID_USER : ID_USERValue,
							NOMOR_KENDARAAN : NOMOR_KENDARAANValue,
							NAMA_PEMILIK : NAMA_PEMILIKValue,
							ALAMAT_PEMILIK : ALAMAT_PEMILIKValue,
							NO_HP : NO_HPValue,
							NOMOR_RANGKA : NOMOR_RANGKAValue,
							NOMOR_MESIN : NOMOR_MESINValue,
							JENIS_PERMOHONAN : JENIS_PERMOHONANValue,
							action : ayek_inti_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									ayek_inti_dataStore.reload();
									ayek_inti_resetForm();
									ayek_inti_switchToGrid();
									ayek_inti_gridPanel.getSelectionModel().deselectAll();
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
		
		function ayek_inti_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(ayek_inti_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = ayek_inti_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< ayek_inti_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.ID_TRAYEK_INTI);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_trayek_inti/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									ayek_inti_dataStore.reload();
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
		
		function ayek_inti_refresh(){
			ayek_inti_dbListAction = "GETLIST";
			ayek_inti_gridSearchField.reset();
			ayek_inti_searchPanel.getForm().reset();
			ayek_inti_dataStore.proxy.extraParams = { action : 'GETLIST' };
			ayek_inti_dataStore.proxy.extraParams.query = "";
			ayek_inti_dataStore.currentPage = 1;
			ayek_inti_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function ayek_inti_confirmFormValid(){
			return ayek_inti_formPanel.getForm().isValid();
		}
		
		function ayek_inti_resetForm(){
			ayek_inti_dbTask = 'CREATE';
			ayek_inti_dbTaskMessage = 'create';
			ayek_inti_formPanel.getForm().reset();
			ID_TRAYEK_INTIField.setValue(0);
		}
		
		function ayek_inti_setForm(){
			ayek_inti_dbTask = 'UPDATE';
            ayek_inti_dbTaskMessage = 'update';
			
			var record = ayek_inti_gridPanel.getSelectionModel().getSelection()[0];
			ID_TRAYEK_INTIField.setValue(record.data.ID_TRAYEK_INTI);
			ID_USERField.setValue(record.data.ID_USER);
			NOMOR_KENDARAANField.setValue(record.data.NOMOR_KENDARAAN);
			NAMA_PEMILIKField.setValue(record.data.NAMA_PEMILIK);
			ALAMAT_PEMILIKField.setValue(record.data.ALAMAT_PEMILIK);
			NO_HPField.setValue(record.data.NO_HP);
			NOMOR_RANGKAField.setValue(record.data.NOMOR_RANGKA);
			NOMOR_MESINField.setValue(record.data.NOMOR_MESIN);
			JENIS_PERMOHONANField.setValue(record.data.JENIS_PERMOHONAN);
					}
		
		function ayek_inti_showSearchWindow(){
			ayek_inti_searchWindow.show();
		}
		
		function ayek_inti_search(){
			ayek_inti_gridSearchField.reset();
			
			var ID_USERValue = '';
			var NOMOR_KENDARAANValue = '';
			var NAMA_PEMILIKValue = '';
			var ALAMAT_PEMILIKValue = '';
			var NO_HPValue = '';
			var NOMOR_RANGKAValue = '';
			var NOMOR_MESINValue = '';
			var JENIS_PERMOHONANValue = '';
						
			ID_USERValue = ID_USERSearchField.getValue();
			NOMOR_KENDARAANValue = NOMOR_KENDARAANSearchField.getValue();
			NAMA_PEMILIKValue = NAMA_PEMILIKSearchField.getValue();
			ALAMAT_PEMILIKValue = ALAMAT_PEMILIKSearchField.getValue();
			NO_HPValue = NO_HPSearchField.getValue();
			NOMOR_RANGKAValue = NOMOR_RANGKASearchField.getValue();
			NOMOR_MESINValue = NOMOR_MESINSearchField.getValue();
			JENIS_PERMOHONANValue = JENIS_PERMOHONANSearchField.getValue();
			ayek_inti_dbListAction = "SEARCH";
			ayek_inti_dataStore.proxy.extraParams = { 
				ID_USER : ID_USERValue,
				NOMOR_KENDARAAN : NOMOR_KENDARAANValue,
				NAMA_PEMILIK : NAMA_PEMILIKValue,
				ALAMAT_PEMILIK : ALAMAT_PEMILIKValue,
				NO_HP : NO_HPValue,
				NOMOR_RANGKA : NOMOR_RANGKAValue,
				NOMOR_MESIN : NOMOR_MESINValue,
				JENIS_PERMOHONAN : JENIS_PERMOHONANValue,
				action : 'SEARCH'
			};
			ayek_inti_dataStore.currentPage = 1;
			ayek_inti_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function ayek_inti_printExcel(outputType){
			var searchText = "";
			var ID_USERValue = '';
			var NOMOR_KENDARAANValue = '';
			var NAMA_PEMILIKValue = '';
			var ALAMAT_PEMILIKValue = '';
			var NO_HPValue = '';
			var NOMOR_RANGKAValue = '';
			var NOMOR_MESINValue = '';
			var JENIS_PERMOHONANValue = '';
			
			if(ayek_inti_dataStore.proxy.extraParams.query!==null){searchText = ayek_inti_dataStore.proxy.extraParams.query;}
			if(ayek_inti_dataStore.proxy.extraParams.ID_USER!==null){ID_USERValue = ayek_inti_dataStore.proxy.extraParams.ID_USER;}
			if(ayek_inti_dataStore.proxy.extraParams.NOMOR_KENDARAAN!==null){NOMOR_KENDARAANValue = ayek_inti_dataStore.proxy.extraParams.NOMOR_KENDARAAN;}
			if(ayek_inti_dataStore.proxy.extraParams.NAMA_PEMILIK!==null){NAMA_PEMILIKValue = ayek_inti_dataStore.proxy.extraParams.NAMA_PEMILIK;}
			if(ayek_inti_dataStore.proxy.extraParams.ALAMAT_PEMILIK!==null){ALAMAT_PEMILIKValue = ayek_inti_dataStore.proxy.extraParams.ALAMAT_PEMILIK;}
			if(ayek_inti_dataStore.proxy.extraParams.NO_HP!==null){NO_HPValue = ayek_inti_dataStore.proxy.extraParams.NO_HP;}
			if(ayek_inti_dataStore.proxy.extraParams.NOMOR_RANGKA!==null){NOMOR_RANGKAValue = ayek_inti_dataStore.proxy.extraParams.NOMOR_RANGKA;}
			if(ayek_inti_dataStore.proxy.extraParams.NOMOR_MESIN!==null){NOMOR_MESINValue = ayek_inti_dataStore.proxy.extraParams.NOMOR_MESIN;}
			if(ayek_inti_dataStore.proxy.extraParams.JENIS_PERMOHONAN!==null){JENIS_PERMOHONANValue = ayek_inti_dataStore.proxy.extraParams.JENIS_PERMOHONAN;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_trayek_inti/switchAction',
				params : {
					action : outputType,
					query : searchText,
					ID_USER : ID_USERValue,
					NOMOR_KENDARAAN : NOMOR_KENDARAANValue,
					NAMA_PEMILIK : NAMA_PEMILIKValue,
					ALAMAT_PEMILIK : ALAMAT_PEMILIKValue,
					NO_HP : NO_HPValue,
					NOMOR_RANGKA : NOMOR_RANGKAValue,
					NOMOR_MESIN : NOMOR_MESINValue,
					JENIS_PERMOHONAN : JENIS_PERMOHONANValue,
					currentAction : ayek_inti_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/trayek_inti_list.xls');
							}else{
								window.open('./print/trayek_inti_list.html','ayek_intilist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		ayek_inti_dataStore = Ext.create('Ext.data.Store',{
			id : 'ayek_inti_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_trayek_inti/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'ID_TRAYEK_INTI'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'ID_TRAYEK_INTI', type : 'int', mapping : 'ID_TRAYEK_INTI' },
				{ name : 'ID_USER', type : 'int', mapping : 'ID_USER' },
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
		ayek_inti_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						ayek_inti_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						ayek_inti_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						ayek_inti_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						ayek_inti_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						ayek_inti_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						ayek_inti_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						ayek_inti_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						ayek_inti_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var ayek_inti_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : ayek_inti_confirmAdd
		});
		var ayek_inti_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : ayek_inti_confirmUpdate
		});
		var ayek_inti_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : ayek_inti_confirmDelete
		});
		var ayek_inti_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : ayek_inti_refresh
		});
		var ayek_inti_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : ayek_inti_showSearchWindow
		});
		var ayek_inti_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				ayek_inti_printExcel('PRINT');
			}
		});
		var ayek_inti_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				ayek_inti_printExcel('EXCEL');
			}
		});
		
		var ayek_inti_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : ayek_inti_confirmUpdate
		});
		var ayek_inti_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : ayek_inti_confirmDelete
		});
		var ayek_inti_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : ayek_inti_refresh
		});
		ayek_inti_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'ayek_inti_contextMenu',
			items: [
				ayek_inti_contextMenuEdit,ayek_inti_contextMenuDelete,'-',ayek_inti_contextMenuRefresh
			]
		});
		
		ayek_inti_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : ayek_inti_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						ayek_inti_dataStore.proxy.extraParams = { action : 'GETLIST'};
						ayek_inti_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		ayek_inti_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'ayek_inti_gridPanel',
			constrain : true,
			store : ayek_inti_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'ayek_intiGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						ayek_inti_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : ayek_inti_shorcut,
			columns : [
				{
					text : 'ID_USER',
					dataIndex : 'ID_USER',
					width : 100,
					sortable : false
				},
				{
					text : 'NOMOR_KENDARAAN',
					dataIndex : 'NOMOR_KENDARAAN',
					width : 100,
					sortable : false
				},
				{
					text : 'NAMA_PEMILIK',
					dataIndex : 'NAMA_PEMILIK',
					width : 100,
					sortable : false
				},
				{
					text : 'ALAMAT_PEMILIK',
					dataIndex : 'ALAMAT_PEMILIK',
					width : 100,
					sortable : false
				},
				{
					text : 'NO_HP',
					dataIndex : 'NO_HP',
					width : 100,
					sortable : false
				},
				{
					text : 'NOMOR_RANGKA',
					dataIndex : 'NOMOR_RANGKA',
					width : 100,
					sortable : false
				},
				{
					text : 'NOMOR_MESIN',
					dataIndex : 'NOMOR_MESIN',
					width : 100,
					sortable : false
				},
				{
					text : 'JENIS_PERMOHONAN',
					dataIndex : 'JENIS_PERMOHONAN',
					width : 100,
					sortable : false
				},
							
			],
			tbar : [
				ayek_inti_addButton,
				ayek_inti_editButton,
				ayek_inti_deleteButton,
				ayek_inti_gridSearchField,
				ayek_inti_searchButton,
				ayek_inti_refreshButton,
				ayek_inti_printButton,
				ayek_inti_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : ayek_inti_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					ayek_inti_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		ID_TRAYEK_INTIField = Ext.create('Ext.form.NumberField',{
			id : 'ID_TRAYEK_INTIField',
			name : 'ID_TRAYEK_INTI',
			fieldLabel : 'ID_TRAYEK_INTI<font color=red>*</font>',
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
			maskRe : /([0-9]+)$/});
		NOMOR_KENDARAANField = Ext.create('Ext.form.TextField',{
			id : 'NOMOR_KENDARAANField',
			name : 'NOMOR_KENDARAAN',
			fieldLabel : 'NOMOR_KENDARAAN',
			maxLength : 20
		});
		NAMA_PEMILIKField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_PEMILIKField',
			name : 'NAMA_PEMILIK',
			fieldLabel : 'NAMA_PEMILIK',
			maxLength : 50
		});
		ALAMAT_PEMILIKField = Ext.create('Ext.form.TextField',{
			id : 'ALAMAT_PEMILIKField',
			name : 'ALAMAT_PEMILIK',
			fieldLabel : 'ALAMAT_PEMILIK',
			maxLength : 100
		});
		NO_HPField = Ext.create('Ext.form.TextField',{
			id : 'NO_HPField',
			name : 'NO_HP',
			fieldLabel : 'NO_HP',
			maxLength : 20
		});
		NOMOR_RANGKAField = Ext.create('Ext.form.TextField',{
			id : 'NOMOR_RANGKAField',
			name : 'NOMOR_RANGKA',
			fieldLabel : 'NOMOR_RANGKA',
			maxLength : 50
		});
		NOMOR_MESINField = Ext.create('Ext.form.TextField',{
			id : 'NOMOR_MESINField',
			name : 'NOMOR_MESIN',
			fieldLabel : 'NOMOR_MESIN',
			maxLength : 50
		});
		JENIS_PERMOHONANField = Ext.create('Ext.form.NumberField',{
			id : 'JENIS_PERMOHONANField',
			name : 'JENIS_PERMOHONAN',
			fieldLabel : 'JENIS_PERMOHONAN',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		var ayek_inti_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : ayek_inti_save
		});
		var ayek_inti_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				ayek_inti_resetForm();
				ayek_inti_switchToGrid();
			}
		});
		ayek_inti_formPanel = Ext.create('Ext.form.Panel', {
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
						ID_TRAYEK_INTIField,
						ID_USERField,
						NOMOR_KENDARAANField,
						NAMA_PEMILIKField,
						ALAMAT_PEMILIKField,
						NO_HPField,
						NOMOR_RANGKAField,
						NOMOR_MESINField,
						JENIS_PERMOHONANField,
											]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [ayek_inti_saveButton,ayek_inti_cancelButton]
		});
		ayek_inti_formWindow = Ext.create('Ext.window.Window',{
			id : 'ayek_inti_formWindow',
			renderTo : 'ayek_intiSaveWindow',
			title : globalFormAddEditTitle + ' ' + ayek_inti_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [ayek_inti_formPanel]
		});
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
		NOMOR_KENDARAANSearchField = Ext.create('Ext.form.TextField',{
			id : 'NOMOR_KENDARAANSearchField',
			name : 'NOMOR_KENDARAAN',
			fieldLabel : 'NOMOR_KENDARAAN',
			maxLength : 20
		
		});
		NAMA_PEMILIKSearchField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_PEMILIKSearchField',
			name : 'NAMA_PEMILIK',
			fieldLabel : 'NAMA_PEMILIK',
			maxLength : 50
		
		});
		ALAMAT_PEMILIKSearchField = Ext.create('Ext.form.TextField',{
			id : 'ALAMAT_PEMILIKSearchField',
			name : 'ALAMAT_PEMILIK',
			fieldLabel : 'ALAMAT_PEMILIK',
			maxLength : 100
		
		});
		NO_HPSearchField = Ext.create('Ext.form.TextField',{
			id : 'NO_HPSearchField',
			name : 'NO_HP',
			fieldLabel : 'NO_HP',
			maxLength : 20
		
		});
		NOMOR_RANGKASearchField = Ext.create('Ext.form.TextField',{
			id : 'NOMOR_RANGKASearchField',
			name : 'NOMOR_RANGKA',
			fieldLabel : 'NOMOR_RANGKA',
			maxLength : 50
		
		});
		NOMOR_MESINSearchField = Ext.create('Ext.form.TextField',{
			id : 'NOMOR_MESINSearchField',
			name : 'NOMOR_MESIN',
			fieldLabel : 'NOMOR_MESIN',
			maxLength : 50
		
		});
		JENIS_PERMOHONANSearchField = Ext.create('Ext.form.NumberField',{
			id : 'JENIS_PERMOHONANSearchField',
			name : 'JENIS_PERMOHONAN',
			fieldLabel : 'JENIS_PERMOHONAN',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		var ayek_inti_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : ayek_inti_search
		});
		var ayek_inti_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				ayek_inti_searchWindow.hide();
			}
		});
		ayek_inti_searchPanel = Ext.create('Ext.form.Panel', {
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
						NOMOR_KENDARAANSearchField,
						NAMA_PEMILIKSearchField,
						ALAMAT_PEMILIKSearchField,
						NO_HPSearchField,
						NOMOR_RANGKASearchField,
						NOMOR_MESINSearchField,
						JENIS_PERMOHONANSearchField,
						]
				}],
			buttons : [ayek_inti_searchingButton,ayek_inti_cancelSearchButton]
		});
		ayek_inti_searchWindow = Ext.create('Ext.window.Window',{
			id : 'ayek_inti_searchWindow',
			renderTo : 'ayek_intiSearchWindow',
			title : globalFormSearchTitle + ' ' + ayek_inti_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [ayek_inti_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="ayek_intiSaveWindow"></div>
<div id="ayek_intiSearchWindow"></div>
<div class="span12" id="ayek_intiGrid"></div>