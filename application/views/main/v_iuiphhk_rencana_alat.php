<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var iphhk_rencana_alat_componentItemTitle="IPHHK_RENCANA_ALAT";
		var iphhk_rencana_alat_dataStore;
		
		var iphhk_rencana_alat_shorcut;
		var iphhk_rencana_alat_contextMenu;
		var iphhk_rencana_alat_gridSearchField;
		var iphhk_rencana_alat_gridPanel;
		var iphhk_rencana_alat_formPanel;
		var iphhk_rencana_alat_formWindow;
		var iphhk_rencana_alat_searchPanel;
		var iphhk_rencana_alat_searchWindow;
		
		var ID_RENCANA_ALATField;
		var ID_IUIPHHKField;
		var NAMA_ALATField;
		var JUMLAHField;
		var KAPASITASField;
		var MERKField;
		var TAHUNField;
		var NEGARAField;
		var HARGAField;
		var JENISField;
				
		var ID_IUIPHHKSearchField;
		var NAMA_ALATSearchField;
		var JUMLAHSearchField;
		var KAPASITASSearchField;
		var MERKSearchField;
		var TAHUNSearchField;
		var NEGARASearchField;
		var HARGASearchField;
		var JENISSearchField;
				
		var iphhk_rencana_alat_dbTask = 'CREATE';
		var iphhk_rencana_alat_dbTaskMessage = 'Tambah';
		var iphhk_rencana_alat_dbPermission = 'CRUD';
		var iphhk_rencana_alat_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function iphhk_rencana_alat_switchToGrid(){
			iphhk_rencana_alat_formPanel.setDisabled(true);
			iphhk_rencana_alat_gridPanel.setDisabled(false);
			iphhk_rencana_alat_formWindow.hide();
		}
		
		function iphhk_rencana_alat_switchToForm(){
			iphhk_rencana_alat_gridPanel.setDisabled(true);
			iphhk_rencana_alat_formPanel.setDisabled(false);
			iphhk_rencana_alat_formWindow.show();
		}
		
		function iphhk_rencana_alat_confirmAdd(){
			iphhk_rencana_alat_dbTask = 'CREATE';
			iphhk_rencana_alat_dbTaskMessage = 'created';
			iphhk_rencana_alat_resetForm();
			iphhk_rencana_alat_switchToForm();
		}
		
		function iphhk_rencana_alat_confirmUpdate(){
			if(iphhk_rencana_alat_gridPanel.selModel.getCount() == 1) {
				iphhk_rencana_alat_dbTask = 'UPDATE';
				iphhk_rencana_alat_dbTaskMessage = 'updated';
				iphhk_rencana_alat_switchToForm();
				iphhk_rencana_alat_setForm();
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
		
		function iphhk_rencana_alat_confirmDelete(){
			if(iphhk_rencana_alat_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, iphhk_rencana_alat_delete);
			}else if(iphhk_rencana_alat_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, iphhk_rencana_alat_delete);
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
		
		function iphhk_rencana_alat_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(iphhk_rencana_alat_dbPermission)==false && pattC.test(iphhk_rencana_alat_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(iphhk_rencana_alat_confirmFormValid()){
					var ID_RENCANA_ALATValue = '';
					var ID_IUIPHHKValue = '';
					var NAMA_ALATValue = '';
					var JUMLAHValue = '';
					var KAPASITASValue = '';
					var MERKValue = '';
					var TAHUNValue = '';
					var NEGARAValue = '';
					var HARGAValue = '';
					var JENISValue = '';
										
					ID_RENCANA_ALATValue = ID_RENCANA_ALATField.getValue();
					ID_IUIPHHKValue = ID_IUIPHHKField.getValue();
					NAMA_ALATValue = NAMA_ALATField.getValue();
					JUMLAHValue = JUMLAHField.getValue();
					KAPASITASValue = KAPASITASField.getValue();
					MERKValue = MERKField.getValue();
					TAHUNValue = TAHUNField.getValue();
					NEGARAValue = NEGARAField.getValue();
					HARGAValue = HARGAField.getValue();
					JENISValue = JENISField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_iuiphhk_rencana_alat/switchAction',
						params: {							
							ID_RENCANA_ALAT : ID_RENCANA_ALATValue,
							ID_IUIPHHK : ID_IUIPHHKValue,
							NAMA_ALAT : NAMA_ALATValue,
							JUMLAH : JUMLAHValue,
							KAPASITAS : KAPASITASValue,
							MERK : MERKValue,
							TAHUN : TAHUNValue,
							NEGARA : NEGARAValue,
							HARGA : HARGAValue,
							JENIS : JENISValue,
							action : iphhk_rencana_alat_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									iphhk_rencana_alat_dataStore.reload();
									iphhk_rencana_alat_resetForm();
									iphhk_rencana_alat_switchToGrid();
									iphhk_rencana_alat_gridPanel.getSelectionModel().deselectAll();
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
		
		function iphhk_rencana_alat_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(iphhk_rencana_alat_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = iphhk_rencana_alat_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< iphhk_rencana_alat_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.ID_RENCANA_ALAT);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_iuiphhk_rencana_alat/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									iphhk_rencana_alat_dataStore.reload();
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
		
		function iphhk_rencana_alat_refresh(){
			iphhk_rencana_alat_dbListAction = "GETLIST";
			iphhk_rencana_alat_gridSearchField.reset();
			iphhk_rencana_alat_searchPanel.getForm().reset();
			iphhk_rencana_alat_dataStore.proxy.extraParams = { action : 'GETLIST' };
			iphhk_rencana_alat_dataStore.proxy.extraParams.query = "";
			iphhk_rencana_alat_dataStore.currentPage = 1;
			iphhk_rencana_alat_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function iphhk_rencana_alat_confirmFormValid(){
			return iphhk_rencana_alat_formPanel.getForm().isValid();
		}
		
		function iphhk_rencana_alat_resetForm(){
			iphhk_rencana_alat_dbTask = 'CREATE';
			iphhk_rencana_alat_dbTaskMessage = 'create';
			iphhk_rencana_alat_formPanel.getForm().reset();
			ID_RENCANA_ALATField.setValue(0);
		}
		
		function iphhk_rencana_alat_setForm(){
			iphhk_rencana_alat_dbTask = 'UPDATE';
            iphhk_rencana_alat_dbTaskMessage = 'update';
			
			var record = iphhk_rencana_alat_gridPanel.getSelectionModel().getSelection()[0];
			ID_RENCANA_ALATField.setValue(record.data.ID_RENCANA_ALAT);
			ID_IUIPHHKField.setValue(record.data.ID_IUIPHHK);
			NAMA_ALATField.setValue(record.data.NAMA_ALAT);
			JUMLAHField.setValue(record.data.JUMLAH);
			KAPASITASField.setValue(record.data.KAPASITAS);
			MERKField.setValue(record.data.MERK);
			TAHUNField.setValue(record.data.TAHUN);
			NEGARAField.setValue(record.data.NEGARA);
			HARGAField.setValue(record.data.HARGA);
			JENISField.setValue(record.data.JENIS);
					}
		
		function iphhk_rencana_alat_showSearchWindow(){
			iphhk_rencana_alat_searchWindow.show();
		}
		
		function iphhk_rencana_alat_search(){
			iphhk_rencana_alat_gridSearchField.reset();
			
			var ID_IUIPHHKValue = '';
			var NAMA_ALATValue = '';
			var JUMLAHValue = '';
			var KAPASITASValue = '';
			var MERKValue = '';
			var TAHUNValue = '';
			var NEGARAValue = '';
			var HARGAValue = '';
			var JENISValue = '';
						
			ID_IUIPHHKValue = ID_IUIPHHKSearchField.getValue();
			NAMA_ALATValue = NAMA_ALATSearchField.getValue();
			JUMLAHValue = JUMLAHSearchField.getValue();
			KAPASITASValue = KAPASITASSearchField.getValue();
			MERKValue = MERKSearchField.getValue();
			TAHUNValue = TAHUNSearchField.getValue();
			NEGARAValue = NEGARASearchField.getValue();
			HARGAValue = HARGASearchField.getValue();
			JENISValue = JENISSearchField.getValue();
			iphhk_rencana_alat_dbListAction = "SEARCH";
			iphhk_rencana_alat_dataStore.proxy.extraParams = { 
				ID_IUIPHHK : ID_IUIPHHKValue,
				NAMA_ALAT : NAMA_ALATValue,
				JUMLAH : JUMLAHValue,
				KAPASITAS : KAPASITASValue,
				MERK : MERKValue,
				TAHUN : TAHUNValue,
				NEGARA : NEGARAValue,
				HARGA : HARGAValue,
				JENIS : JENISValue,
				action : 'SEARCH'
			};
			iphhk_rencana_alat_dataStore.currentPage = 1;
			iphhk_rencana_alat_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function iphhk_rencana_alat_printExcel(outputType){
			var searchText = "";
			var ID_IUIPHHKValue = '';
			var NAMA_ALATValue = '';
			var JUMLAHValue = '';
			var KAPASITASValue = '';
			var MERKValue = '';
			var TAHUNValue = '';
			var NEGARAValue = '';
			var HARGAValue = '';
			var JENISValue = '';
			
			if(iphhk_rencana_alat_dataStore.proxy.extraParams.query!==null){searchText = iphhk_rencana_alat_dataStore.proxy.extraParams.query;}
			if(iphhk_rencana_alat_dataStore.proxy.extraParams.ID_IUIPHHK!==null){ID_IUIPHHKValue = iphhk_rencana_alat_dataStore.proxy.extraParams.ID_IUIPHHK;}
			if(iphhk_rencana_alat_dataStore.proxy.extraParams.NAMA_ALAT!==null){NAMA_ALATValue = iphhk_rencana_alat_dataStore.proxy.extraParams.NAMA_ALAT;}
			if(iphhk_rencana_alat_dataStore.proxy.extraParams.JUMLAH!==null){JUMLAHValue = iphhk_rencana_alat_dataStore.proxy.extraParams.JUMLAH;}
			if(iphhk_rencana_alat_dataStore.proxy.extraParams.KAPASITAS!==null){KAPASITASValue = iphhk_rencana_alat_dataStore.proxy.extraParams.KAPASITAS;}
			if(iphhk_rencana_alat_dataStore.proxy.extraParams.MERK!==null){MERKValue = iphhk_rencana_alat_dataStore.proxy.extraParams.MERK;}
			if(iphhk_rencana_alat_dataStore.proxy.extraParams.TAHUN!==null){TAHUNValue = iphhk_rencana_alat_dataStore.proxy.extraParams.TAHUN;}
			if(iphhk_rencana_alat_dataStore.proxy.extraParams.NEGARA!==null){NEGARAValue = iphhk_rencana_alat_dataStore.proxy.extraParams.NEGARA;}
			if(iphhk_rencana_alat_dataStore.proxy.extraParams.HARGA!==null){HARGAValue = iphhk_rencana_alat_dataStore.proxy.extraParams.HARGA;}
			if(iphhk_rencana_alat_dataStore.proxy.extraParams.JENIS!==null){JENISValue = iphhk_rencana_alat_dataStore.proxy.extraParams.JENIS;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_iuiphhk_rencana_alat/switchAction',
				params : {
					action : outputType,
					query : searchText,
					ID_IUIPHHK : ID_IUIPHHKValue,
					NAMA_ALAT : NAMA_ALATValue,
					JUMLAH : JUMLAHValue,
					KAPASITAS : KAPASITASValue,
					MERK : MERKValue,
					TAHUN : TAHUNValue,
					NEGARA : NEGARAValue,
					HARGA : HARGAValue,
					JENIS : JENISValue,
					currentAction : iphhk_rencana_alat_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/iuiphhk_rencana_alat_list.xls');
							}else{
								window.open('./print/iuiphhk_rencana_alat_list.html','iphhk_rencana_alatlist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		iphhk_rencana_alat_dataStore = Ext.create('Ext.data.Store',{
			id : 'iphhk_rencana_alat_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_iuiphhk_rencana_alat/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'ID_RENCANA_ALAT'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'ID_RENCANA_ALAT', type : 'int', mapping : 'ID_RENCANA_ALAT' },
				{ name : 'ID_IUIPHHK', type : 'int', mapping : 'ID_IUIPHHK' },
				{ name : 'NAMA_ALAT', type : 'string', mapping : 'NAMA_ALAT' },
				{ name : 'JUMLAH', type : 'int', mapping : 'JUMLAH' },
				{ name : 'KAPASITAS', type : 'string', mapping : 'KAPASITAS' },
				{ name : 'MERK', type : 'string', mapping : 'MERK' },
				{ name : 'TAHUN', type : 'int', mapping : 'TAHUN' },
				{ name : 'NEGARA', type : 'string', mapping : 'NEGARA' },
				{ name : 'HARGA', type : 'float', mapping : 'HARGA' },
				{ name : 'JENIS', type : 'int', mapping : 'JENIS' },
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		iphhk_rencana_alat_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						iphhk_rencana_alat_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						iphhk_rencana_alat_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						iphhk_rencana_alat_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						iphhk_rencana_alat_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						iphhk_rencana_alat_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						iphhk_rencana_alat_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						iphhk_rencana_alat_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						iphhk_rencana_alat_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var iphhk_rencana_alat_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : iphhk_rencana_alat_confirmAdd
		});
		var iphhk_rencana_alat_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : iphhk_rencana_alat_confirmUpdate
		});
		var iphhk_rencana_alat_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : iphhk_rencana_alat_confirmDelete
		});
		var iphhk_rencana_alat_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : iphhk_rencana_alat_refresh
		});
		var iphhk_rencana_alat_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : iphhk_rencana_alat_showSearchWindow
		});
		var iphhk_rencana_alat_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				iphhk_rencana_alat_printExcel('PRINT');
			}
		});
		var iphhk_rencana_alat_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				iphhk_rencana_alat_printExcel('EXCEL');
			}
		});
		
		var iphhk_rencana_alat_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : iphhk_rencana_alat_confirmUpdate
		});
		var iphhk_rencana_alat_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : iphhk_rencana_alat_confirmDelete
		});
		var iphhk_rencana_alat_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : iphhk_rencana_alat_refresh
		});
		iphhk_rencana_alat_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'iphhk_rencana_alat_contextMenu',
			items: [
				iphhk_rencana_alat_contextMenuEdit,iphhk_rencana_alat_contextMenuDelete,'-',iphhk_rencana_alat_contextMenuRefresh
			]
		});
		
		iphhk_rencana_alat_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : iphhk_rencana_alat_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						iphhk_rencana_alat_dataStore.proxy.extraParams = { action : 'GETLIST'};
						iphhk_rencana_alat_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		iphhk_rencana_alat_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'iphhk_rencana_alat_gridPanel',
			constrain : true,
			store : iphhk_rencana_alat_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'iphhk_rencana_alatGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						iphhk_rencana_alat_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : iphhk_rencana_alat_shorcut,
			columns : [
				{
					text : 'ID_IUIPHHK',
					dataIndex : 'ID_IUIPHHK',
					width : 100,
					sortable : false
				},
				{
					text : 'NAMA_ALAT',
					dataIndex : 'NAMA_ALAT',
					width : 100,
					sortable : false
				},
				{
					text : 'JUMLAH',
					dataIndex : 'JUMLAH',
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
					text : 'MERK',
					dataIndex : 'MERK',
					width : 100,
					sortable : false
				},
				{
					text : 'TAHUN',
					dataIndex : 'TAHUN',
					width : 100,
					sortable : false
				},
				{
					text : 'NEGARA',
					dataIndex : 'NEGARA',
					width : 100,
					sortable : false
				},
				{
					text : 'HARGA',
					dataIndex : 'HARGA',
					width : 100,
					sortable : false
				},
				{
					text : 'JENIS',
					dataIndex : 'JENIS',
					width : 100,
					sortable : false
				},
							
			],
			tbar : [
				iphhk_rencana_alat_addButton,
				iphhk_rencana_alat_editButton,
				iphhk_rencana_alat_deleteButton,
				iphhk_rencana_alat_gridSearchField,
				iphhk_rencana_alat_searchButton,
				iphhk_rencana_alat_refreshButton,
				iphhk_rencana_alat_printButton,
				iphhk_rencana_alat_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : iphhk_rencana_alat_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					iphhk_rencana_alat_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		ID_RENCANA_ALATField = Ext.create('Ext.form.NumberField',{
			id : 'ID_RENCANA_ALATField',
			name : 'ID_RENCANA_ALAT',
			fieldLabel : 'ID_RENCANA_ALAT<font color=red>*</font>',
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
		NAMA_ALATField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_ALATField',
			name : 'NAMA_ALAT',
			fieldLabel : 'NAMA_ALAT',
			maxLength : 50
		});
		JUMLAHField = Ext.create('Ext.form.NumberField',{
			id : 'JUMLAHField',
			name : 'JUMLAH',
			fieldLabel : 'JUMLAH',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		KAPASITASField = Ext.create('Ext.form.TextField',{
			id : 'KAPASITASField',
			name : 'KAPASITAS',
			fieldLabel : 'KAPASITAS',
			maxLength : 100
		});
		MERKField = Ext.create('Ext.form.TextField',{
			id : 'MERKField',
			name : 'MERK',
			fieldLabel : 'MERK',
			maxLength : 100
		});
		TAHUNField = Ext.create('Ext.form.NumberField',{
			id : 'TAHUNField',
			name : 'TAHUN',
			fieldLabel : 'TAHUN',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		NEGARAField = Ext.create('Ext.form.TextField',{
			id : 'NEGARAField',
			name : 'NEGARA',
			fieldLabel : 'NEGARA',
			maxLength : 100
		});
		HARGAField = Ext.create('Ext.form.NumberField',{
			id : 'HARGAField',
			name : 'HARGA',
			fieldLabel : 'HARGA',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		JENISField = Ext.create('Ext.form.NumberField',{
			id : 'JENISField',
			name : 'JENIS',
			fieldLabel : 'JENIS',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		var iphhk_rencana_alat_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : iphhk_rencana_alat_save
		});
		var iphhk_rencana_alat_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				iphhk_rencana_alat_resetForm();
				iphhk_rencana_alat_switchToGrid();
			}
		});
		iphhk_rencana_alat_formPanel = Ext.create('Ext.form.Panel', {
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
						ID_RENCANA_ALATField,
						ID_IUIPHHKField,
						NAMA_ALATField,
						JUMLAHField,
						KAPASITASField,
						MERKField,
						TAHUNField,
						NEGARAField,
						HARGAField,
						JENISField,
											]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [iphhk_rencana_alat_saveButton,iphhk_rencana_alat_cancelButton]
		});
		iphhk_rencana_alat_formWindow = Ext.create('Ext.window.Window',{
			id : 'iphhk_rencana_alat_formWindow',
			renderTo : 'iphhk_rencana_alatSaveWindow',
			title : globalFormAddEditTitle + ' ' + iphhk_rencana_alat_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [iphhk_rencana_alat_formPanel]
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
		NAMA_ALATSearchField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_ALATSearchField',
			name : 'NAMA_ALAT',
			fieldLabel : 'NAMA_ALAT',
			maxLength : 50
		
		});
		JUMLAHSearchField = Ext.create('Ext.form.NumberField',{
			id : 'JUMLAHSearchField',
			name : 'JUMLAH',
			fieldLabel : 'JUMLAH',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		KAPASITASSearchField = Ext.create('Ext.form.TextField',{
			id : 'KAPASITASSearchField',
			name : 'KAPASITAS',
			fieldLabel : 'KAPASITAS',
			maxLength : 100
		
		});
		MERKSearchField = Ext.create('Ext.form.TextField',{
			id : 'MERKSearchField',
			name : 'MERK',
			fieldLabel : 'MERK',
			maxLength : 100
		
		});
		TAHUNSearchField = Ext.create('Ext.form.NumberField',{
			id : 'TAHUNSearchField',
			name : 'TAHUN',
			fieldLabel : 'TAHUN',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		NEGARASearchField = Ext.create('Ext.form.TextField',{
			id : 'NEGARASearchField',
			name : 'NEGARA',
			fieldLabel : 'NEGARA',
			maxLength : 100
		
		});
		HARGASearchField = Ext.create('Ext.form.NumberField',{
			id : 'HARGASearchField',
			name : 'HARGA',
			fieldLabel : 'HARGA',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		JENISSearchField = Ext.create('Ext.form.NumberField',{
			id : 'JENISSearchField',
			name : 'JENIS',
			fieldLabel : 'JENIS',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		var iphhk_rencana_alat_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : iphhk_rencana_alat_search
		});
		var iphhk_rencana_alat_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				iphhk_rencana_alat_searchWindow.hide();
			}
		});
		iphhk_rencana_alat_searchPanel = Ext.create('Ext.form.Panel', {
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
						NAMA_ALATSearchField,
						JUMLAHSearchField,
						KAPASITASSearchField,
						MERKSearchField,
						TAHUNSearchField,
						NEGARASearchField,
						HARGASearchField,
						JENISSearchField,
						]
				}],
			buttons : [iphhk_rencana_alat_searchingButton,iphhk_rencana_alat_cancelSearchButton]
		});
		iphhk_rencana_alat_searchWindow = Ext.create('Ext.window.Window',{
			id : 'iphhk_rencana_alat_searchWindow',
			renderTo : 'iphhk_rencana_alatSearchWindow',
			title : globalFormSearchTitle + ' ' + iphhk_rencana_alat_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [iphhk_rencana_alat_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="iphhk_rencana_alatSaveWindow"></div>
<div id="iphhk_rencana_alatSearchWindow"></div>
<div class="span12" id="iphhk_rencana_alatGrid"></div>