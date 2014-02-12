<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var oupmenu_componentItemTitle="OUPMENU";
		var oupmenu_dataStore;
		
		var oupmenu_shorcut;
		var oupmenu_contextMenu;
		var oupmenu_gridSearchField;
		var oupmenu_gridPanel;
		var oupmenu_formPanel;
		var oupmenu_formWindow;
		var oupmenu_searchPanel;
		var oupmenu_searchWindow;
		
		var idField;
		var menuField;
		var iconField;
		var orderField;
		var linkField;
		var publikField;
				
		var menuSearchField;
		var iconSearchField;
		var orderSearchField;
		var linkSearchField;
		var publikSearchField;
				
		var oupmenu_dbTask = 'CREATE';
		var oupmenu_dbTaskMessage = 'Tambah';
		var oupmenu_dbPermission = 'CRUD';
		var oupmenu_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function oupmenu_switchToGrid(){
			oupmenu_formPanel.setDisabled(true);
			oupmenu_gridPanel.setDisabled(false);
			oupmenu_formWindow.hide();
		}
		
		function oupmenu_switchToForm(){
			oupmenu_gridPanel.setDisabled(true);
			oupmenu_formPanel.setDisabled(false);
			oupmenu_formWindow.show();
		}
		
		function oupmenu_confirmAdd(){
			oupmenu_dbTask = 'CREATE';
			oupmenu_dbTaskMessage = 'created';
			oupmenu_resetForm();
			oupmenu_switchToForm();
		}
		
		function oupmenu_confirmUpdate(){
			if(oupmenu_gridPanel.selModel.getCount() == 1) {
				oupmenu_dbTask = 'UPDATE';
				oupmenu_dbTaskMessage = 'updated';
				oupmenu_switchToForm();
				oupmenu_setForm();
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
		
		function oupmenu_confirmDelete(){
			if(oupmenu_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, oupmenu_delete);
			}else if(oupmenu_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, oupmenu_delete);
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
		
		function oupmenu_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(oupmenu_dbPermission)==false && pattC.test(oupmenu_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(oupmenu_confirmFormValid()){
					var idValue = '';
					var menuValue = '';
					var iconValue = '';
					var orderValue = '';
					var linkValue = '';
					var publikValue = '';
										
					idValue = idField.getValue();
					menuValue = menuField.getValue();
					iconValue = iconField.getValue();
					orderValue = orderField.getValue();
					linkValue = linkField.getValue();
					publikValue = publikField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_groupmenu/switchAction',
						params: {							
							id : idValue,
							menu : menuValue,
							icon : iconValue,
							order : orderValue,
							link : linkValue,
							publik : publikValue,
							action : oupmenu_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									oupmenu_dataStore.reload();
									oupmenu_resetForm();
									oupmenu_switchToGrid();
									oupmenu_gridPanel.getSelectionModel().deselectAll();
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
		
		function oupmenu_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(oupmenu_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = oupmenu_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< oupmenu_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.id);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_groupmenu/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									oupmenu_dataStore.reload();
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
		
		function oupmenu_refresh(){
			oupmenu_dbListAction = "GETLIST";
			oupmenu_gridSearchField.reset();
			oupmenu_searchPanel.getForm().reset();
			oupmenu_dataStore.proxy.extraParams = { action : 'GETLIST' };
			oupmenu_dataStore.proxy.extraParams.query = "";
			oupmenu_dataStore.currentPage = 1;
			oupmenu_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function oupmenu_confirmFormValid(){
			return oupmenu_formPanel.getForm().isValid();
		}
		
		function oupmenu_resetForm(){
			oupmenu_dbTask = 'CREATE';
			oupmenu_dbTaskMessage = 'create';
			oupmenu_formPanel.getForm().reset();
			idField.setValue(0);
		}
		
		function oupmenu_setForm(){
			oupmenu_dbTask = 'UPDATE';
            oupmenu_dbTaskMessage = 'update';
			
			var record = oupmenu_gridPanel.getSelectionModel().getSelection()[0];
			idField.setValue(record.data.id);
			menuField.setValue(record.data.menu);
			iconField.setValue(record.data.icon);
			orderField.setValue(record.data.order);
			linkField.setValue(record.data.link);
			publikField.setValue(record.data.publik);
					}
		
		function oupmenu_showSearchWindow(){
			oupmenu_searchWindow.show();
		}
		
		function oupmenu_search(){
			oupmenu_gridSearchField.reset();
			
			var menuValue = '';
			var iconValue = '';
			var orderValue = '';
			var linkValue = '';
			var publikValue = '';
						
			menuValue = menuSearchField.getValue();
			iconValue = iconSearchField.getValue();
			orderValue = orderSearchField.getValue();
			linkValue = linkSearchField.getValue();
			publikValue = publikSearchField.getValue();
			oupmenu_dbListAction = "SEARCH";
			oupmenu_dataStore.proxy.extraParams = { 
				menu : menuValue,
				icon : iconValue,
				order : orderValue,
				link : linkValue,
				publik : publikValue,
				action : 'SEARCH'
			};
			oupmenu_dataStore.currentPage = 1;
			oupmenu_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function oupmenu_printExcel(outputType){
			var searchText = "";
			var menuValue = '';
			var iconValue = '';
			var orderValue = '';
			var linkValue = '';
			var publikValue = '';
			
			if(oupmenu_dataStore.proxy.extraParams.query!==null){searchText = oupmenu_dataStore.proxy.extraParams.query;}
			if(oupmenu_dataStore.proxy.extraParams.menu!==null){menuValue = oupmenu_dataStore.proxy.extraParams.menu;}
			if(oupmenu_dataStore.proxy.extraParams.icon!==null){iconValue = oupmenu_dataStore.proxy.extraParams.icon;}
			if(oupmenu_dataStore.proxy.extraParams.order!==null){orderValue = oupmenu_dataStore.proxy.extraParams.order;}
			if(oupmenu_dataStore.proxy.extraParams.link!==null){linkValue = oupmenu_dataStore.proxy.extraParams.link;}
			if(oupmenu_dataStore.proxy.extraParams.publik!==null){publikValue = oupmenu_dataStore.proxy.extraParams.publik;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_groupmenu/switchAction',
				params : {
					action : outputType,
					query : searchText,
					menu : menuValue,
					icon : iconValue,
					order : orderValue,
					link : linkValue,
					publik : publikValue,
					currentAction : oupmenu_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/groupmenu_list.xls');
							}else{
								window.open('./print/groupmenu_list.html','oupmenulist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		oupmenu_dataStore = Ext.create('Ext.data.Store',{
			id : 'oupmenu_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_groupmenu/switchAction',
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
				{ name : 'menu', type : 'string', mapping : 'menu' },
				{ name : 'icon', type : 'string', mapping : 'icon' },
				{ name : 'order', type : 'int', mapping : 'order' },
				{ name : 'link', type : 'string', mapping : 'link' },
				{ name : 'publik', type : 'int', mapping : 'publik' },
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		oupmenu_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						oupmenu_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						oupmenu_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						oupmenu_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						oupmenu_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						oupmenu_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						oupmenu_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						oupmenu_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						oupmenu_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var oupmenu_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : oupmenu_confirmAdd
		});
		var oupmenu_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : oupmenu_confirmUpdate
		});
		var oupmenu_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : oupmenu_confirmDelete
		});
		var oupmenu_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : oupmenu_refresh
		});
		var oupmenu_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : oupmenu_showSearchWindow
		});
		var oupmenu_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				oupmenu_printExcel('PRINT');
			}
		});
		var oupmenu_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				oupmenu_printExcel('EXCEL');
			}
		});
		
		var oupmenu_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : oupmenu_confirmUpdate
		});
		var oupmenu_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : oupmenu_confirmDelete
		});
		var oupmenu_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : oupmenu_refresh
		});
		oupmenu_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'oupmenu_contextMenu',
			items: [
				oupmenu_contextMenuEdit,oupmenu_contextMenuDelete,'-',oupmenu_contextMenuRefresh
			]
		});
		
		oupmenu_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : oupmenu_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						oupmenu_dataStore.proxy.extraParams = { action : 'GETLIST'};
						oupmenu_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		oupmenu_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'oupmenu_gridPanel',
			constrain : true,
			store : oupmenu_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'oupmenuGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						oupmenu_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : oupmenu_shorcut,
			columns : [
				{
					text : 'Nama Menu',
					dataIndex : 'menu',
					width : 100,
					sortable : false
				},
				{
					text : 'icon',
					dataIndex : 'icon',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'Order',
					dataIndex : 'order',
					width : 100,
					sortable : false
				},
				{
					text : 'Link',
					dataIndex : 'link',
					width : 100,
					sortable : false
				},
				{
					text : 'Publik',
					dataIndex : 'publik',
					width : 100,
					sortable : false,
					renderer : function(value){
							if(value == 1){
								return 'Tampilkan';
							}else{
								return 'Sembunyikan';
							}
						}
				},
							
			],
			tbar : [
				oupmenu_addButton,
				oupmenu_editButton,
				oupmenu_deleteButton,
				oupmenu_gridSearchField,
				oupmenu_searchButton,
				oupmenu_refreshButton,
				oupmenu_printButton,
				oupmenu_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : oupmenu_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					oupmenu_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		idField = Ext.create('Ext.form.TextField',{
			id : 'idField',
			name : 'id',
			fieldLabel : 'id<font color=red>*</font>',
			allowBlank : false,
			maxLength : 0,
			hidden : true
		});
		menuField = Ext.create('Ext.form.TextField',{
			id : 'menuField',
			name : 'menu',
			fieldLabel : 'Nama Menu',
			maxLength : 45
		});
		iconField = Ext.create('Ext.form.TextField',{
			id : 'iconField',
			name : 'icon',
			fieldLabel : 'icon',
			maxLength : 45,
			hidden : true
		});
		orderField = Ext.create('Ext.form.TextField',{
			id : 'orderField',
			name : 'order',
			fieldLabel : 'Order',
			maxLength : 10
		});
		linkField = Ext.create('Ext.form.TextField',{
			id : 'linkField',
			name : 'link',
			fieldLabel : 'Link',
			maxLength : 45
		});
		// publikField = Ext.create('Ext.form.TextField',{
			// id : 'publikField',
			// name : 'publik',
			// fieldLabel : 'publik',
			// maxLength : 10
		// });
		publikField = Ext.create('Ext.form.ComboBox',{
			id : 'publikField',
			name : 'publik',
			fieldLabel : 'Publik',
			store : new Ext.data.ArrayStore({
				fields : ['publik_id', 'publik'],
				data : [[1,'Tampilkan'],[2,'Sembunyikan']]
			}),
			displayField : 'publik',
			valueField : 'publik_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true,
			// listeners : {
				// select : function(cmb, rec){
					// if(cmb.getValue() == '2'){
						// NO_SK_LAMAField.show();
					// }else{
						// NO_SK_LAMAField.hide();
					// }
				// }
			// }
		});
		var oupmenu_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : oupmenu_save
		});
		var oupmenu_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				oupmenu_resetForm();
				oupmenu_switchToGrid();
			}
		});
		oupmenu_formPanel = Ext.create('Ext.form.Panel', {
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
						// idField,
						menuField,
						iconField,
						orderField,
						linkField,
						publikField,
											]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [oupmenu_saveButton,oupmenu_cancelButton]
		});
		oupmenu_formWindow = Ext.create('Ext.window.Window',{
			id : 'oupmenu_formWindow',
			renderTo : 'oupmenuSaveWindow',
			title : globalFormAddEditTitle + ' ' + oupmenu_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [oupmenu_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		menuSearchField = Ext.create('Ext.form.TextField',{
			id : 'menuSearchField',
			name : 'menu',
			fieldLabel : 'menu',
			maxLength : 45
		
		});
		iconSearchField = Ext.create('Ext.form.TextField',{
			id : 'iconSearchField',
			name : 'icon',
			fieldLabel : 'icon',
			maxLength : 45
		
		});
		orderSearchField = Ext.create('Ext.form.TextField',{
			id : 'orderSearchField',
			name : 'order',
			fieldLabel : 'order',
			maxLength : 0
		
		});
		linkSearchField = Ext.create('Ext.form.TextField',{
			id : 'linkSearchField',
			name : 'link',
			fieldLabel : 'link',
			maxLength : 45
		
		});
		publikSearchField = Ext.create('Ext.form.TextField',{
			id : 'publikSearchField',
			name : 'publik',
			fieldLabel : 'publik',
			maxLength : 0
		
		});
		var oupmenu_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : oupmenu_search
		});
		var oupmenu_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				oupmenu_searchWindow.hide();
			}
		});
		oupmenu_searchPanel = Ext.create('Ext.form.Panel', {
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
						menuSearchField,
						iconSearchField,
						orderSearchField,
						linkSearchField,
						publikSearchField,
						]
				}],
			buttons : [oupmenu_searchingButton,oupmenu_cancelSearchButton]
		});
		oupmenu_searchWindow = Ext.create('Ext.window.Window',{
			id : 'oupmenu_searchWindow',
			renderTo : 'oupmenuSearchWindow',
			title : globalFormSearchTitle + ' ' + oupmenu_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [oupmenu_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="oupmenuSaveWindow"></div>
<div id="oupmenuSearchWindow"></div>
<div class="span12" id="oupmenuGrid"></div>