<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var iphhk_rencana_produksi_componentItemTitle="IPHHK_RENCANA_PRODUKSI";
		var iphhk_rencana_produksi_dataStore;
		
		var iphhk_rencana_produksi_shorcut;
		var iphhk_rencana_produksi_contextMenu;
		var iphhk_rencana_produksi_gridSearchField;
		var iphhk_rencana_produksi_gridPanel;
		var iphhk_rencana_produksi_formPanel;
		var iphhk_rencana_produksi_formWindow;
		var iphhk_rencana_produksi_searchPanel;
		var iphhk_rencana_produksi_searchWindow;
		
		var ID_RENCANA_PRODUKSIField;
		var ID_IUIPHHKField;
		var JENIS_PRODUKSIField;
		var KAPASITASField;
		var KETERANGANField;
				
		var ID_IUIPHHKSearchField;
		var JENIS_PRODUKSISearchField;
		var KAPASITASSearchField;
		var KETERANGANSearchField;
				
		var iphhk_rencana_produksi_dbTask = 'CREATE';
		var iphhk_rencana_produksi_dbTaskMessage = 'Tambah';
		var iphhk_rencana_produksi_dbPermission = 'CRUD';
		var iphhk_rencana_produksi_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function iphhk_rencana_produksi_switchToGrid(){
			iphhk_rencana_produksi_formPanel.setDisabled(true);
			iphhk_rencana_produksi_gridPanel.setDisabled(false);
			iphhk_rencana_produksi_formWindow.hide();
		}
		
		function iphhk_rencana_produksi_switchToForm(){
			iphhk_rencana_produksi_gridPanel.setDisabled(true);
			iphhk_rencana_produksi_formPanel.setDisabled(false);
			iphhk_rencana_produksi_formWindow.show();
		}
		
		function iphhk_rencana_produksi_confirmAdd(){
			iphhk_rencana_produksi_dbTask = 'CREATE';
			iphhk_rencana_produksi_dbTaskMessage = 'created';
			iphhk_rencana_produksi_resetForm();
			iphhk_rencana_produksi_switchToForm();
		}
		
		function iphhk_rencana_produksi_confirmUpdate(){
			if(iphhk_rencana_produksi_gridPanel.selModel.getCount() == 1) {
				iphhk_rencana_produksi_dbTask = 'UPDATE';
				iphhk_rencana_produksi_dbTaskMessage = 'updated';
				iphhk_rencana_produksi_switchToForm();
				iphhk_rencana_produksi_setForm();
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
		
		function iphhk_rencana_produksi_confirmDelete(){
			if(iphhk_rencana_produksi_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, iphhk_rencana_produksi_delete);
			}else if(iphhk_rencana_produksi_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, iphhk_rencana_produksi_delete);
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
		
		function iphhk_rencana_produksi_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(iphhk_rencana_produksi_dbPermission)==false && pattC.test(iphhk_rencana_produksi_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(iphhk_rencana_produksi_confirmFormValid()){
					var ID_RENCANA_PRODUKSIValue = '';
					var ID_IUIPHHKValue = '';
					var JENIS_PRODUKSIValue = '';
					var KAPASITASValue = '';
					var KETERANGANValue = '';
										
					ID_RENCANA_PRODUKSIValue = ID_RENCANA_PRODUKSIField.getValue();
					ID_IUIPHHKValue = ID_IUIPHHKField.getValue();
					JENIS_PRODUKSIValue = JENIS_PRODUKSIField.getValue();
					KAPASITASValue = KAPASITASField.getValue();
					KETERANGANValue = KETERANGANField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_iuiphhk_rencana_produksi/switchAction',
						params: {							
							ID_RENCANA_PRODUKSI : ID_RENCANA_PRODUKSIValue,
							ID_IUIPHHK : ID_IUIPHHKValue,
							JENIS_PRODUKSI : JENIS_PRODUKSIValue,
							KAPASITAS : KAPASITASValue,
							KETERANGAN : KETERANGANValue,
							action : iphhk_rencana_produksi_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									iphhk_rencana_produksi_dataStore.reload();
									iphhk_rencana_produksi_resetForm();
									iphhk_rencana_produksi_switchToGrid();
									iphhk_rencana_produksi_gridPanel.getSelectionModel().deselectAll();
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
		
		function iphhk_rencana_produksi_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(iphhk_rencana_produksi_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = iphhk_rencana_produksi_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< iphhk_rencana_produksi_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.ID_RENCANA_PRODUKSI);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_iuiphhk_rencana_produksi/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									iphhk_rencana_produksi_dataStore.reload();
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
		
		function iphhk_rencana_produksi_refresh(){
			iphhk_rencana_produksi_dbListAction = "GETLIST";
			iphhk_rencana_produksi_gridSearchField.reset();
			iphhk_rencana_produksi_searchPanel.getForm().reset();
			iphhk_rencana_produksi_dataStore.proxy.extraParams = { action : 'GETLIST' };
			iphhk_rencana_produksi_dataStore.proxy.extraParams.query = "";
			iphhk_rencana_produksi_dataStore.currentPage = 1;
			iphhk_rencana_produksi_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function iphhk_rencana_produksi_confirmFormValid(){
			return iphhk_rencana_produksi_formPanel.getForm().isValid();
		}
		
		function iphhk_rencana_produksi_resetForm(){
			iphhk_rencana_produksi_dbTask = 'CREATE';
			iphhk_rencana_produksi_dbTaskMessage = 'create';
			iphhk_rencana_produksi_formPanel.getForm().reset();
			ID_RENCANA_PRODUKSIField.setValue(0);
		}
		
		function iphhk_rencana_produksi_setForm(){
			iphhk_rencana_produksi_dbTask = 'UPDATE';
            iphhk_rencana_produksi_dbTaskMessage = 'update';
			
			var record = iphhk_rencana_produksi_gridPanel.getSelectionModel().getSelection()[0];
			ID_RENCANA_PRODUKSIField.setValue(record.data.ID_RENCANA_PRODUKSI);
			ID_IUIPHHKField.setValue(record.data.ID_IUIPHHK);
			JENIS_PRODUKSIField.setValue(record.data.JENIS_PRODUKSI);
			KAPASITASField.setValue(record.data.KAPASITAS);
			KETERANGANField.setValue(record.data.KETERANGAN);
					}
		
		function iphhk_rencana_produksi_showSearchWindow(){
			iphhk_rencana_produksi_searchWindow.show();
		}
		
		function iphhk_rencana_produksi_search(){
			iphhk_rencana_produksi_gridSearchField.reset();
			
			var ID_IUIPHHKValue = '';
			var JENIS_PRODUKSIValue = '';
			var KAPASITASValue = '';
			var KETERANGANValue = '';
						
			ID_IUIPHHKValue = ID_IUIPHHKSearchField.getValue();
			JENIS_PRODUKSIValue = JENIS_PRODUKSISearchField.getValue();
			KAPASITASValue = KAPASITASSearchField.getValue();
			KETERANGANValue = KETERANGANSearchField.getValue();
			iphhk_rencana_produksi_dbListAction = "SEARCH";
			iphhk_rencana_produksi_dataStore.proxy.extraParams = { 
				ID_IUIPHHK : ID_IUIPHHKValue,
				JENIS_PRODUKSI : JENIS_PRODUKSIValue,
				KAPASITAS : KAPASITASValue,
				KETERANGAN : KETERANGANValue,
				action : 'SEARCH'
			};
			iphhk_rencana_produksi_dataStore.currentPage = 1;
			iphhk_rencana_produksi_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function iphhk_rencana_produksi_printExcel(outputType){
			var searchText = "";
			var ID_IUIPHHKValue = '';
			var JENIS_PRODUKSIValue = '';
			var KAPASITASValue = '';
			var KETERANGANValue = '';
			
			if(iphhk_rencana_produksi_dataStore.proxy.extraParams.query!==null){searchText = iphhk_rencana_produksi_dataStore.proxy.extraParams.query;}
			if(iphhk_rencana_produksi_dataStore.proxy.extraParams.ID_IUIPHHK!==null){ID_IUIPHHKValue = iphhk_rencana_produksi_dataStore.proxy.extraParams.ID_IUIPHHK;}
			if(iphhk_rencana_produksi_dataStore.proxy.extraParams.JENIS_PRODUKSI!==null){JENIS_PRODUKSIValue = iphhk_rencana_produksi_dataStore.proxy.extraParams.JENIS_PRODUKSI;}
			if(iphhk_rencana_produksi_dataStore.proxy.extraParams.KAPASITAS!==null){KAPASITASValue = iphhk_rencana_produksi_dataStore.proxy.extraParams.KAPASITAS;}
			if(iphhk_rencana_produksi_dataStore.proxy.extraParams.KETERANGAN!==null){KETERANGANValue = iphhk_rencana_produksi_dataStore.proxy.extraParams.KETERANGAN;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_iuiphhk_rencana_produksi/switchAction',
				params : {
					action : outputType,
					query : searchText,
					ID_IUIPHHK : ID_IUIPHHKValue,
					JENIS_PRODUKSI : JENIS_PRODUKSIValue,
					KAPASITAS : KAPASITASValue,
					KETERANGAN : KETERANGANValue,
					currentAction : iphhk_rencana_produksi_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/iuiphhk_rencana_produksi_list.xls');
							}else{
								window.open('./print/iuiphhk_rencana_produksi_list.html','iphhk_rencana_produksilist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		iphhk_rencana_produksi_dataStore = Ext.create('Ext.data.Store',{
			id : 'iphhk_rencana_produksi_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_iuiphhk_rencana_produksi/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'ID_RENCANA_PRODUKSI'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'ID_RENCANA_PRODUKSI', type : 'int', mapping : 'ID_RENCANA_PRODUKSI' },
				{ name : 'ID_IUIPHHK', type : 'int', mapping : 'ID_IUIPHHK' },
				{ name : 'JENIS_PRODUKSI', type : 'string', mapping : 'JENIS_PRODUKSI' },
				{ name : 'KAPASITAS', type : 'string', mapping : 'KAPASITAS' },
				{ name : 'KETERANGAN', type : 'string', mapping : 'KETERANGAN' },
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		iphhk_rencana_produksi_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						iphhk_rencana_produksi_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						iphhk_rencana_produksi_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						iphhk_rencana_produksi_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						iphhk_rencana_produksi_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						iphhk_rencana_produksi_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						iphhk_rencana_produksi_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						iphhk_rencana_produksi_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						iphhk_rencana_produksi_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var iphhk_rencana_produksi_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : iphhk_rencana_produksi_confirmAdd
		});
		var iphhk_rencana_produksi_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : iphhk_rencana_produksi_confirmUpdate
		});
		var iphhk_rencana_produksi_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : iphhk_rencana_produksi_confirmDelete
		});
		var iphhk_rencana_produksi_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : iphhk_rencana_produksi_refresh
		});
		var iphhk_rencana_produksi_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : iphhk_rencana_produksi_showSearchWindow
		});
		var iphhk_rencana_produksi_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				iphhk_rencana_produksi_printExcel('PRINT');
			}
		});
		var iphhk_rencana_produksi_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				iphhk_rencana_produksi_printExcel('EXCEL');
			}
		});
		
		var iphhk_rencana_produksi_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : iphhk_rencana_produksi_confirmUpdate
		});
		var iphhk_rencana_produksi_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : iphhk_rencana_produksi_confirmDelete
		});
		var iphhk_rencana_produksi_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : iphhk_rencana_produksi_refresh
		});
		iphhk_rencana_produksi_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'iphhk_rencana_produksi_contextMenu',
			items: [
				iphhk_rencana_produksi_contextMenuEdit,iphhk_rencana_produksi_contextMenuDelete,'-',iphhk_rencana_produksi_contextMenuRefresh
			]
		});
		
		iphhk_rencana_produksi_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : iphhk_rencana_produksi_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						iphhk_rencana_produksi_dataStore.proxy.extraParams = { action : 'GETLIST'};
						iphhk_rencana_produksi_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		iphhk_rencana_produksi_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'iphhk_rencana_produksi_gridPanel',
			constrain : true,
			store : iphhk_rencana_produksi_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'iphhk_rencana_produksiGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						iphhk_rencana_produksi_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : iphhk_rencana_produksi_shorcut,
			columns : [
				{
					text : 'ID_IUIPHHK',
					dataIndex : 'ID_IUIPHHK',
					width : 100,
					sortable : false
				},
				{
					text : 'JENIS_PRODUKSI',
					dataIndex : 'JENIS_PRODUKSI',
					width : 100,
					sortable : false
				},
				{
					text : 'KAPASITAS',
					dataIndex : 'KAPASITAS',
					width : 100,
					sortable : false
				},
				{
					text : 'KETERANGAN',
					dataIndex : 'KETERANGAN',
					width : 100,
					sortable : false
				},
							
			],
			tbar : [
				iphhk_rencana_produksi_addButton,
				iphhk_rencana_produksi_editButton,
				iphhk_rencana_produksi_deleteButton,
				iphhk_rencana_produksi_gridSearchField,
				iphhk_rencana_produksi_searchButton,
				iphhk_rencana_produksi_refreshButton,
				iphhk_rencana_produksi_printButton,
				iphhk_rencana_produksi_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : iphhk_rencana_produksi_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					iphhk_rencana_produksi_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		ID_RENCANA_PRODUKSIField = Ext.create('Ext.form.NumberField',{
			id : 'ID_RENCANA_PRODUKSIField',
			name : 'ID_RENCANA_PRODUKSI',
			fieldLabel : 'ID_RENCANA_PRODUKSI<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		ID_IUIPHHKField = Ext.create('Ext.form.NumberField',{
			id : 'ID_IUIPHHKField',
			name : 'ID_IUIPHHK',
			fieldLabel : 'ID_IUIPHHK',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		JENIS_PRODUKSIField = Ext.create('Ext.form.TextField',{
			id : 'JENIS_PRODUKSIField',
			name : 'JENIS_PRODUKSI',
			fieldLabel : 'JENIS_PRODUKSI',
			maxLength : 50
		});
		KAPASITASField = Ext.create('Ext.form.TextField',{
			id : 'KAPASITASField',
			name : 'KAPASITAS',
			fieldLabel : 'KAPASITAS',
			maxLength : 50
		});
		KETERANGANField = Ext.create('Ext.form.TextField',{
			id : 'KETERANGANField',
			name : 'KETERANGAN',
			fieldLabel : 'KETERANGAN',
			maxLength : 100
		});
		var iphhk_rencana_produksi_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : iphhk_rencana_produksi_save
		});
		var iphhk_rencana_produksi_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				iphhk_rencana_produksi_resetForm();
				iphhk_rencana_produksi_switchToGrid();
			}
		});
		iphhk_rencana_produksi_formPanel = Ext.create('Ext.form.Panel', {
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
						ID_RENCANA_PRODUKSIField,
						ID_IUIPHHKField,
						JENIS_PRODUKSIField,
						KAPASITASField,
						KETERANGANField,
											]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [iphhk_rencana_produksi_saveButton,iphhk_rencana_produksi_cancelButton]
		});
		iphhk_rencana_produksi_formWindow = Ext.create('Ext.window.Window',{
			id : 'iphhk_rencana_produksi_formWindow',
			renderTo : 'iphhk_rencana_produksiSaveWindow',
			title : globalFormAddEditTitle + ' ' + iphhk_rencana_produksi_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [iphhk_rencana_produksi_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		ID_IUIPHHKSearchField = Ext.create('Ext.form.NumberField',{
			id : 'ID_IUIPHHKSearchField',
			name : 'ID_IUIPHHK',
			fieldLabel : 'ID_IUIPHHK',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		JENIS_PRODUKSISearchField = Ext.create('Ext.form.TextField',{
			id : 'JENIS_PRODUKSISearchField',
			name : 'JENIS_PRODUKSI',
			fieldLabel : 'JENIS_PRODUKSI',
			maxLength : 50
		
		});
		KAPASITASSearchField = Ext.create('Ext.form.TextField',{
			id : 'KAPASITASSearchField',
			name : 'KAPASITAS',
			fieldLabel : 'KAPASITAS',
			maxLength : 50
		
		});
		KETERANGANSearchField = Ext.create('Ext.form.TextField',{
			id : 'KETERANGANSearchField',
			name : 'KETERANGAN',
			fieldLabel : 'KETERANGAN',
			maxLength : 100
		
		});
		var iphhk_rencana_produksi_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : iphhk_rencana_produksi_search
		});
		var iphhk_rencana_produksi_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				iphhk_rencana_produksi_searchWindow.hide();
			}
		});
		iphhk_rencana_produksi_searchPanel = Ext.create('Ext.form.Panel', {
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
						ID_IUIPHHKSearchField,
						JENIS_PRODUKSISearchField,
						KAPASITASSearchField,
						KETERANGANSearchField,
						]
				}],
			buttons : [iphhk_rencana_produksi_searchingButton,iphhk_rencana_produksi_cancelSearchButton]
		});
		iphhk_rencana_produksi_searchWindow = Ext.create('Ext.window.Window',{
			id : 'iphhk_rencana_produksi_searchWindow',
			renderTo : 'iphhk_rencana_produksiSearchWindow',
			title : globalFormSearchTitle + ' ' + iphhk_rencana_produksi_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [iphhk_rencana_produksi_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="iphhk_rencana_produksiSaveWindow"></div>
<div id="iphhk_rencana_produksiSearchWindow"></div>
<div class="span12" id="iphhk_rencana_produksiGrid"></div>