<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var iujt_componentItemTitle="IUJT";
		var iujt_dataStore;
		
		var iujt_shorcut;
		var iujt_contextMenu;
		var iujt_gridSearchField;
		var iujt_gridPanel;
		var iujt_formPanel;
		var iujt_formWindow;
		var iujt_searchPanel;
		var iujt_searchWindow;
		
		var iujt_idField;
		var iujt_usahaField;
		var iujt_alamatusahaField;
		var iujt_penanggungjawabField;
				
		var iujt_usahaSearchField;
		var iujt_alamatusahaSearchField;
		var iujt_penanggungjawabSearchField;
				
		var iujt_dbTask = 'CREATE';
		var iujt_dbTaskMessage = 'Tambah';
		var iujt_dbPermission = 'CRUD';
		var iujt_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function iujt_switchToGrid(){
			iujt_formPanel.setDisabled(true);
			iujt_gridPanel.setDisabled(false);
			iujt_formWindow.hide();
		}
		
		function iujt_switchToForm(){
			iujt_gridPanel.setDisabled(true);
			iujt_formPanel.setDisabled(false);
			iujt_formWindow.show();
		}
		
		function iujt_confirmAdd(){
			iujt_dbTask = 'CREATE';
			iujt_dbTaskMessage = 'created';
			iujt_resetForm();
			iujt_switchToForm();
		}
		
		function iujt_confirmUpdate(){
			if(iujt_gridPanel.selModel.getCount() == 1) {
				iujt_dbTask = 'UPDATE';
				iujt_dbTaskMessage = 'updated';
				iujt_switchToForm();
				iujt_setForm();
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
		
		function iujt_confirmDelete(){
			if(iujt_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, iujt_delete);
			}else if(iujt_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, iujt_delete);
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
		
		function iujt_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(iujt_dbPermission)==false && pattC.test(iujt_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(iujt_confirmFormValid()){
					var iujt_idValue = '';
					var iujt_usahaValue = '';
					var iujt_alamatusahaValue = '';
					var iujt_penanggungjawabValue = '';
										
					iujt_idValue = iujt_idField.getValue();
					iujt_usahaValue = iujt_usahaField.getValue();
					iujt_alamatusahaValue = iujt_alamatusahaField.getValue();
					iujt_penanggungjawabValue = iujt_penanggungjawabField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_t_iujt/switchAction',
						params: {							
							iujt_id : iujt_idValue,
							iujt_usaha : iujt_usahaValue,
							iujt_alamatusaha : iujt_alamatusahaValue,
							iujt_penanggungjawab : iujt_penanggungjawabValue,
							action : iujt_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									iujt_dataStore.reload();
									iujt_resetForm();
									iujt_switchToGrid();
									iujt_gridPanel.getSelectionModel().deselectAll();
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
		
		function iujt_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(iujt_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = iujt_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< iujt_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.iujt_id);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_t_iujt/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									iujt_dataStore.reload();
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
		
		function iujt_refresh(){
			iujt_dbListAction = "GETLIST";
			iujt_gridSearchField.reset();
			iujt_searchPanel.getForm().reset();
			iujt_dataStore.proxy.extraParams = { action : 'GETLIST' };
			iujt_dataStore.proxy.extraParams.query = "";
			iujt_dataStore.currentPage = 1;
			iujt_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function iujt_confirmFormValid(){
			return iujt_formPanel.getForm().isValid();
		}
		
		function iujt_resetForm(){
			iujt_dbTask = 'CREATE';
			iujt_dbTaskMessage = 'create';
			iujt_formPanel.getForm().reset();
			iujt_idField.setValue(0);
		}
		
		function iujt_setForm(){
			iujt_dbTask = 'UPDATE';
            iujt_dbTaskMessage = 'update';
			
			var record = iujt_gridPanel.getSelectionModel().getSelection()[0];
			iujt_idField.setValue(record.data.iujt_id);
			iujt_usahaField.setValue(record.data.iujt_usaha);
			iujt_alamatusahaField.setValue(record.data.iujt_alamatusaha);
			iujt_penanggungjawabField.setValue(record.data.iujt_penanggungjawab);
					}
		
		function iujt_showSearchWindow(){
			iujt_searchWindow.show();
		}
		
		function iujt_search(){
			iujt_gridSearchField.reset();
			
			var iujt_usahaValue = '';
			var iujt_alamatusahaValue = '';
			var iujt_penanggungjawabValue = '';
						
			iujt_usahaValue = iujt_usahaSearchField.getValue();
			iujt_alamatusahaValue = iujt_alamatusahaSearchField.getValue();
			iujt_penanggungjawabValue = iujt_penanggungjawabSearchField.getValue();
			iujt_dbListAction = "SEARCH";
			iujt_dataStore.proxy.extraParams = { 
				iujt_usaha : iujt_usahaValue,
				iujt_alamatusaha : iujt_alamatusahaValue,
				iujt_penanggungjawab : iujt_penanggungjawabValue,
				action : 'SEARCH'
			};
			iujt_dataStore.currentPage = 1;
			iujt_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function iujt_printExcel(outputType){
			var searchText = "";
			var iujt_usahaValue = '';
			var iujt_alamatusahaValue = '';
			var iujt_penanggungjawabValue = '';
			
			if(iujt_dataStore.proxy.extraParams.query!==null){searchText = iujt_dataStore.proxy.extraParams.query;}
			if(iujt_dataStore.proxy.extraParams.iujt_usaha!==null){iujt_usahaValue = iujt_dataStore.proxy.extraParams.iujt_usaha;}
			if(iujt_dataStore.proxy.extraParams.iujt_alamatusaha!==null){iujt_alamatusahaValue = iujt_dataStore.proxy.extraParams.iujt_alamatusaha;}
			if(iujt_dataStore.proxy.extraParams.iujt_penanggungjawab!==null){iujt_penanggungjawabValue = iujt_dataStore.proxy.extraParams.iujt_penanggungjawab;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_t_iujt/switchAction',
				params : {
					action : outputType,
					query : searchText,
					iujt_usaha : iujt_usahaValue,
					iujt_alamatusaha : iujt_alamatusahaValue,
					iujt_penanggungjawab : iujt_penanggungjawabValue,
					currentAction : iujt_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/t_iujt_list.xls');
							}else{
								window.open('./print/t_iujt_list.html','iujtlist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		iujt_dataStore = Ext.create('Ext.data.Store',{
			id : 'iujt_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_iujt/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'iujt_id'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'iujt_id', type : 'int', mapping : 'iujt_id' },
				{ name : 'iujt_usaha', type : 'string', mapping : 'iujt_usaha' },
				{ name : 'iujt_alamatusaha', type : 'string', mapping : 'iujt_alamatusaha' },
				{ name : 'iujt_penanggungjawab', type : 'string', mapping : 'iujt_penanggungjawab' },
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		iujt_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						iujt_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						iujt_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						iujt_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						iujt_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						iujt_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						iujt_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						iujt_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						iujt_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var iujt_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : iujt_confirmAdd
		});
		var iujt_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : iujt_confirmUpdate
		});
		var iujt_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : iujt_confirmDelete
		});
		var iujt_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : iujt_refresh
		});
		var iujt_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : iujt_showSearchWindow
		});
		var iujt_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				iujt_printExcel('PRINT');
			}
		});
		var iujt_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				iujt_printExcel('EXCEL');
			}
		});
		
		var iujt_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : iujt_confirmUpdate
		});
		var iujt_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : iujt_confirmDelete
		});
		var iujt_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : iujt_refresh
		});
		iujt_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'iujt_contextMenu',
			items: [
				iujt_contextMenuEdit,iujt_contextMenuDelete,'-',iujt_contextMenuRefresh
			]
		});
		
		iujt_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : iujt_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						iujt_dataStore.proxy.extraParams = { action : 'GETLIST'};
						iujt_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		iujt_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'iujt_gridPanel',
			constrain : true,
			store : iujt_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'iujtGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						iujt_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : iujt_shorcut,
			columns : [
				{
					text : 'iujt_usaha',
					dataIndex : 'iujt_usaha',
					width : 100,
					sortable : false
				},
				{
					text : 'iujt_alamatusaha',
					dataIndex : 'iujt_alamatusaha',
					width : 100,
					sortable : false
				},
				{
					text : 'iujt_penanggungjawab',
					dataIndex : 'iujt_penanggungjawab',
					width : 100,
					sortable : false
				},
							
			],
			tbar : [
				iujt_addButton,
				iujt_editButton,
				iujt_deleteButton,
				iujt_gridSearchField,
				iujt_searchButton,
				iujt_refreshButton,
				iujt_printButton,
				iujt_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : iujt_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					iujt_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		iujt_idField = Ext.create('Ext.form.NumberField',{
			id : 'iujt_idField',
			name : 'iujt_id',
			fieldLabel : 'iujt_id<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		iujt_usahaField = Ext.create('Ext.form.TextField',{
			id : 'iujt_usahaField',
			name : 'iujt_usaha',
			fieldLabel : 'iujt_usaha',
			maxLength : 50
		});
		iujt_alamatusahaField = Ext.create('Ext.form.TextField',{
			id : 'iujt_alamatusahaField',
			name : 'iujt_alamatusaha',
			fieldLabel : 'iujt_alamatusaha',
			maxLength : 100
		});
		iujt_penanggungjawabField = Ext.create('Ext.form.TextField',{
			id : 'iujt_penanggungjawabField',
			name : 'iujt_penanggungjawab',
			fieldLabel : 'iujt_penanggungjawab',
			maxLength : 50
		});
		var iujt_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : iujt_save
		});
		var iujt_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				iujt_resetForm();
				iujt_switchToGrid();
			}
		});
		iujt_formPanel = Ext.create('Ext.form.Panel', {
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
						iujt_idField,
						iujt_usahaField,
						iujt_alamatusahaField,
						iujt_penanggungjawabField,
											]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [iujt_saveButton,iujt_cancelButton]
		});
		iujt_formWindow = Ext.create('Ext.window.Window',{
			id : 'iujt_formWindow',
			renderTo : 'iujtSaveWindow',
			title : globalFormAddEditTitle + ' ' + iujt_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [iujt_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		iujt_usahaSearchField = Ext.create('Ext.form.TextField',{
			id : 'iujt_usahaSearchField',
			name : 'iujt_usaha',
			fieldLabel : 'iujt_usaha',
			maxLength : 50
		
		});
		iujt_alamatusahaSearchField = Ext.create('Ext.form.TextField',{
			id : 'iujt_alamatusahaSearchField',
			name : 'iujt_alamatusaha',
			fieldLabel : 'iujt_alamatusaha',
			maxLength : 100
		
		});
		iujt_penanggungjawabSearchField = Ext.create('Ext.form.TextField',{
			id : 'iujt_penanggungjawabSearchField',
			name : 'iujt_penanggungjawab',
			fieldLabel : 'iujt_penanggungjawab',
			maxLength : 50
		
		});
		var iujt_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : iujt_search
		});
		var iujt_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				iujt_searchWindow.hide();
			}
		});
		iujt_searchPanel = Ext.create('Ext.form.Panel', {
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
						iujt_usahaSearchField,
						iujt_alamatusahaSearchField,
						iujt_penanggungjawabSearchField,
						]
				}],
			buttons : [iujt_searchingButton,iujt_cancelSearchButton]
		});
		iujt_searchWindow = Ext.create('Ext.window.Window',{
			id : 'iujt_searchWindow',
			renderTo : 'iujtSearchWindow',
			title : globalFormSearchTitle + ' ' + iujt_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [iujt_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="iujtSaveWindow"></div>
<div id="iujtSearchWindow"></div>
<div class="span12" id="iujtGrid"></div>