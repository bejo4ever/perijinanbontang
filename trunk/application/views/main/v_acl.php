<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var l_componentItemTitle="L";
		var l_dataStore;
		
		var l_shorcut;
		var l_contextMenu;
		var l_gridSearchField;
		var l_gridPanel;
		var l_formPanel;
		var l_formWindow;
		var l_searchPanel;
		var l_searchWindow;
		
		var idField;
		var namaField;
		var linkField;
		var defaultusergroupField;
		var statusField;
		var orderField;
		var levelField;
		var parentField;
		var groupmenu_idField;
		var publikField;
		var keteranganField;
		var link_baruField;
				
		var namaSearchField;
		var linkSearchField;
		var defaultusergroupSearchField;
		var statusSearchField;
		var orderSearchField;
		var levelSearchField;
		var parentSearchField;
		var groupmenu_idSearchField;
		var publikSearchField;
		var keteranganSearchField;
		var link_baruSearchField;
				
		var l_dbTask = 'CREATE';
		var l_dbTaskMessage = 'Tambah';
		var l_dbPermission = 'CRUD';
		var l_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function l_switchToGrid(){
			l_formPanel.setDisabled(true);
			l_gridPanel.setDisabled(false);
			l_formWindow.hide();
		}
		
		function l_switchToForm(){
			l_gridPanel.setDisabled(true);
			l_formPanel.setDisabled(false);
			l_formWindow.show();
		}
		
		function l_confirmAdd(){
			l_dbTask = 'CREATE';
			l_dbTaskMessage = 'created';
			l_resetForm();
			l_switchToForm();
		}
		
		function l_confirmUpdate(){
			if(l_gridPanel.selModel.getCount() == 1) {
				l_dbTask = 'UPDATE';
				l_dbTaskMessage = 'updated';
				l_switchToForm();
				l_setForm();
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
		
		function l_confirmDelete(){
			if(l_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, l_delete);
			}else if(l_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, l_delete);
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
		
		function l_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(l_dbPermission)==false && pattC.test(l_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(l_confirmFormValid()){
					var idValue = '';
					var namaValue = '';
					var linkValue = '';
					var defaultusergroupValue = '';
					var statusValue = '';
					var orderValue = '';
					var levelValue = '';
					var parentValue = '';
					var groupmenu_idValue = '';
					var publikValue = '';
					var keteranganValue = '';
					var link_baruValue = '';
										
					idValue = idField.getValue();
					namaValue = namaField.getValue();
					linkValue = linkField.getValue();
					defaultusergroupValue = defaultusergroupField.getValue();
					statusValue = statusField.getValue();
					orderValue = orderField.getValue();
					levelValue = levelField.getValue();
					parentValue = parentField.getValue();
					groupmenu_idValue = groupmenu_idField.getValue();
					publikValue = publikField.getValue();
					keteranganValue = keteranganField.getValue();
					link_baruValue = link_baruField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_acl/switchAction',
						params: {							
							id : idValue,
							nama : namaValue,
							link : linkValue,
							defaultusergroup : defaultusergroupValue,
							status : statusValue,
							order : orderValue,
							level : levelValue,
							parent : parentValue,
							groupmenu_id : groupmenu_idValue,
							publik : publikValue,
							keterangan : keteranganValue,
							link_baru : link_baruValue,
							action : l_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									l_dataStore.reload();
									l_resetForm();
									l_switchToGrid();
									l_gridPanel.getSelectionModel().deselectAll();
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
		
		function l_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(l_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = l_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< l_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.id);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_acl/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									l_dataStore.reload();
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
		
		function l_refresh(){
			l_dbListAction = "GETLIST";
			l_gridSearchField.reset();
			l_searchPanel.getForm().reset();
			l_dataStore.proxy.extraParams = { action : 'GETLIST' };
			l_dataStore.proxy.extraParams.query = "";
			l_dataStore.currentPage = 1;
			l_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function l_confirmFormValid(){
			return l_formPanel.getForm().isValid();
		}
		
		function l_resetForm(){
			l_dbTask = 'CREATE';
			l_dbTaskMessage = 'create';
			l_formPanel.getForm().reset();
			idField.setValue(0);
		}
		
		function l_setForm(){
			l_dbTask = 'UPDATE';
            l_dbTaskMessage = 'update';
			
			var record = l_gridPanel.getSelectionModel().getSelection()[0];
			idField.setValue(record.data.id);
			namaField.setValue(record.data.nama);
			linkField.setValue(record.data.link);
			defaultusergroupField.setValue(record.data.defaultusergroup);
			statusField.setValue(record.data.status);
			orderField.setValue(record.data.order);
			levelField.setValue(record.data.level);
			parentField.setValue(record.data.parent);
			groupmenu_idField.setValue(record.data.groupmenu_id);
			publikField.setValue(record.data.publik);
			keteranganField.setValue(record.data.keterangan);
			link_baruField.setValue(record.data.link_baru);
					}
		
		function l_showSearchWindow(){
			l_searchWindow.show();
		}
		
		function l_search(){
			l_gridSearchField.reset();
			
			var namaValue = '';
			var linkValue = '';
			var defaultusergroupValue = '';
			var statusValue = '';
			var orderValue = '';
			var levelValue = '';
			var parentValue = '';
			var groupmenu_idValue = '';
			var publikValue = '';
			var keteranganValue = '';
			var link_baruValue = '';
						
			namaValue = namaSearchField.getValue();
			linkValue = linkSearchField.getValue();
			defaultusergroupValue = defaultusergroupSearchField.getValue();
			statusValue = statusSearchField.getValue();
			orderValue = orderSearchField.getValue();
			levelValue = levelSearchField.getValue();
			parentValue = parentSearchField.getValue();
			groupmenu_idValue = groupmenu_idSearchField.getValue();
			publikValue = publikSearchField.getValue();
			keteranganValue = keteranganSearchField.getValue();
			link_baruValue = link_baruSearchField.getValue();
			l_dbListAction = "SEARCH";
			l_dataStore.proxy.extraParams = { 
				nama : namaValue,
				link : linkValue,
				defaultusergroup : defaultusergroupValue,
				status : statusValue,
				order : orderValue,
				level : levelValue,
				parent : parentValue,
				groupmenu_id : groupmenu_idValue,
				publik : publikValue,
				keterangan : keteranganValue,
				link_baru : link_baruValue,
				action : 'SEARCH'
			};
			l_dataStore.currentPage = 1;
			l_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function l_printExcel(outputType){
			var searchText = "";
			var namaValue = '';
			var linkValue = '';
			var defaultusergroupValue = '';
			var statusValue = '';
			var orderValue = '';
			var levelValue = '';
			var parentValue = '';
			var groupmenu_idValue = '';
			var publikValue = '';
			var keteranganValue = '';
			var link_baruValue = '';
			
			if(l_dataStore.proxy.extraParams.query!==null){searchText = l_dataStore.proxy.extraParams.query;}
			if(l_dataStore.proxy.extraParams.nama!==null){namaValue = l_dataStore.proxy.extraParams.nama;}
			if(l_dataStore.proxy.extraParams.link!==null){linkValue = l_dataStore.proxy.extraParams.link;}
			if(l_dataStore.proxy.extraParams.defaultusergroup!==null){defaultusergroupValue = l_dataStore.proxy.extraParams.defaultusergroup;}
			if(l_dataStore.proxy.extraParams.status!==null){statusValue = l_dataStore.proxy.extraParams.status;}
			if(l_dataStore.proxy.extraParams.order!==null){orderValue = l_dataStore.proxy.extraParams.order;}
			if(l_dataStore.proxy.extraParams.level!==null){levelValue = l_dataStore.proxy.extraParams.level;}
			if(l_dataStore.proxy.extraParams.parent!==null){parentValue = l_dataStore.proxy.extraParams.parent;}
			if(l_dataStore.proxy.extraParams.groupmenu_id!==null){groupmenu_idValue = l_dataStore.proxy.extraParams.groupmenu_id;}
			if(l_dataStore.proxy.extraParams.publik!==null){publikValue = l_dataStore.proxy.extraParams.publik;}
			if(l_dataStore.proxy.extraParams.keterangan!==null){keteranganValue = l_dataStore.proxy.extraParams.keterangan;}
			if(l_dataStore.proxy.extraParams.link_baru!==null){link_baruValue = l_dataStore.proxy.extraParams.link_baru;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_acl/switchAction',
				params : {
					action : outputType,
					query : searchText,
					nama : namaValue,
					link : linkValue,
					defaultusergroup : defaultusergroupValue,
					status : statusValue,
					order : orderValue,
					level : levelValue,
					parent : parentValue,
					groupmenu_id : groupmenu_idValue,
					publik : publikValue,
					keterangan : keteranganValue,
					link_baru : link_baruValue,
					currentAction : l_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/acl_list.xls');
							}else{
								window.open('./print/acl_list.html','llist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		l_dataStore = Ext.create('Ext.data.Store',{
			id : 'l_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_acl/switchAction',
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
				{ name : 'id', type : , mapping : 'id' },
				{ name : 'nama', type : 'string', mapping : 'nama' },
				{ name : 'link', type : 'string', mapping : 'link' },
				{ name : 'defaultusergroup', type : 'string', mapping : 'defaultusergroup' },
				{ name : 'status', type : , mapping : 'status' },
				{ name : 'order', type : , mapping : 'order' },
				{ name : 'level', type : , mapping : 'level' },
				{ name : 'parent', type : , mapping : 'parent' },
				{ name : 'groupmenu_id', type : , mapping : 'groupmenu_id' },
				{ name : 'publik', type : , mapping : 'publik' },
				{ name : 'keterangan', type : , mapping : 'keterangan' },
				{ name : 'link_baru', type : 'string', mapping : 'link_baru' },
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		l_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						l_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						l_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						l_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						l_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						l_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						l_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						l_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						l_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var l_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : l_confirmAdd
		});
		var l_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : l_confirmUpdate
		});
		var l_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : l_confirmDelete
		});
		var l_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : l_refresh
		});
		var l_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : l_showSearchWindow
		});
		var l_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				l_printExcel('PRINT');
			}
		});
		var l_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				l_printExcel('EXCEL');
			}
		});
		
		var l_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : l_confirmUpdate
		});
		var l_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : l_confirmDelete
		});
		var l_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : l_refresh
		});
		l_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'l_contextMenu',
			items: [
				l_contextMenuEdit,l_contextMenuDelete,'-',l_contextMenuRefresh
			]
		});
		
		l_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : l_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						l_dataStore.proxy.extraParams = { action : 'GETLIST'};
						l_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		l_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'l_gridPanel',
			constrain : true,
			store : l_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'lGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						l_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : l_shorcut,
			columns : [
				{
					text : 'nama',
					dataIndex : 'nama',
					width : 100,
					sortable : false
				},
				{
					text : 'link',
					dataIndex : 'link',
					width : 100,
					sortable : false
				},
				{
					text : 'defaultusergroup',
					dataIndex : 'defaultusergroup',
					width : 100,
					sortable : false
				},
				{
					text : 'status',
					dataIndex : 'status',
					width : 100,
					sortable : false
				},
				{
					text : 'order',
					dataIndex : 'order',
					width : 100,
					sortable : false
				},
				{
					text : 'level',
					dataIndex : 'level',
					width : 100,
					sortable : false
				},
				{
					text : 'parent',
					dataIndex : 'parent',
					width : 100,
					sortable : false
				},
				{
					text : 'groupmenu_id',
					dataIndex : 'groupmenu_id',
					width : 100,
					sortable : false
				},
				{
					text : 'publik',
					dataIndex : 'publik',
					width : 100,
					sortable : false
				},
				{
					text : 'keterangan',
					dataIndex : 'keterangan',
					width : 100,
					sortable : false
				},
				{
					text : 'link_baru',
					dataIndex : 'link_baru',
					width : 100,
					sortable : false
				},
							
			],
			tbar : [
				l_addButton,
				l_editButton,
				l_deleteButton,
				l_gridSearchField,
				l_searchButton,
				l_refreshButton,
				l_printButton,
				l_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : l_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					l_dataStore.reload({params: {start: 0, limit: globalPageSize}});
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
			maxLength : 0
		});
		namaField = Ext.create('Ext.form.TextField',{
			id : 'namaField',
			name : 'nama',
			fieldLabel : 'nama',
			maxLength : 45
		});
		linkField = Ext.create('Ext.form.TextField',{
			id : 'linkField',
			name : 'link',
			fieldLabel : 'link',
			maxLength : 45
		});
		defaultusergroupField = Ext.create('Ext.form.TextField',{
			id : 'defaultusergroupField',
			name : 'defaultusergroup',
			fieldLabel : 'defaultusergroup',
			maxLength : 45
		});
		statusField = Ext.create('Ext.form.TextField',{
			id : 'statusField',
			name : 'status',
			fieldLabel : 'status',
			maxLength : 0
		});
		orderField = Ext.create('Ext.form.TextField',{
			id : 'orderField',
			name : 'order',
			fieldLabel : 'order',
			maxLength : 0
		});
		levelField = Ext.create('Ext.form.TextField',{
			id : 'levelField',
			name : 'level',
			fieldLabel : 'level',
			maxLength : 0
		});
		parentField = Ext.create('Ext.form.TextField',{
			id : 'parentField',
			name : 'parent',
			fieldLabel : 'parent',
			maxLength : 0
		});
		groupmenu_idField = Ext.create('Ext.form.TextField',{
			id : 'groupmenu_idField',
			name : 'groupmenu_id',
			fieldLabel : 'groupmenu_id',
			maxLength : 0
		});
		publikField = Ext.create('Ext.form.TextField',{
			id : 'publikField',
			name : 'publik',
			fieldLabel : 'publik',
			maxLength : 0
		});
		keteranganField = Ext.create('Ext.form.TextField',{
			id : 'keteranganField',
			name : 'keterangan',
			fieldLabel : 'keterangan',
			maxLength : 255
		});
		link_baruField = Ext.create('Ext.form.TextField',{
			id : 'link_baruField',
			name : 'link_baru',
			fieldLabel : 'link_baru<font color=red>*</font>',
			allowBlank : false,
			maxLength : 45
		});
		var l_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : l_save
		});
		var l_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				l_resetForm();
				l_switchToGrid();
			}
		});
		l_formPanel = Ext.create('Ext.form.Panel', {
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
						namaField,
						linkField,
						defaultusergroupField,
						statusField,
						orderField,
						levelField,
						parentField,
						groupmenu_idField,
						publikField,
						keteranganField,
						link_baruField,
											]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [l_saveButton,l_cancelButton]
		});
		l_formWindow = Ext.create('Ext.window.Window',{
			id : 'l_formWindow',
			renderTo : 'lSaveWindow',
			title : globalFormAddEditTitle + ' ' + l_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [l_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		namaSearchField = Ext.create('Ext.form.TextField',{
			id : 'namaSearchField',
			name : 'nama',
			fieldLabel : 'nama',
			maxLength : 45
		
		});
		linkSearchField = Ext.create('Ext.form.TextField',{
			id : 'linkSearchField',
			name : 'link',
			fieldLabel : 'link',
			maxLength : 45
		
		});
		defaultusergroupSearchField = Ext.create('Ext.form.TextField',{
			id : 'defaultusergroupSearchField',
			name : 'defaultusergroup',
			fieldLabel : 'defaultusergroup',
			maxLength : 45
		
		});
		statusSearchField = Ext.create('Ext.form.TextField',{
			id : 'statusSearchField',
			name : 'status',
			fieldLabel : 'status',
			maxLength : 0
		
		});
		orderSearchField = Ext.create('Ext.form.TextField',{
			id : 'orderSearchField',
			name : 'order',
			fieldLabel : 'order',
			maxLength : 0
		
		});
		levelSearchField = Ext.create('Ext.form.TextField',{
			id : 'levelSearchField',
			name : 'level',
			fieldLabel : 'level',
			maxLength : 0
		
		});
		parentSearchField = Ext.create('Ext.form.TextField',{
			id : 'parentSearchField',
			name : 'parent',
			fieldLabel : 'parent',
			maxLength : 0
		
		});
		groupmenu_idSearchField = Ext.create('Ext.form.TextField',{
			id : 'groupmenu_idSearchField',
			name : 'groupmenu_id',
			fieldLabel : 'groupmenu_id',
			maxLength : 0
		
		});
		publikSearchField = Ext.create('Ext.form.TextField',{
			id : 'publikSearchField',
			name : 'publik',
			fieldLabel : 'publik',
			maxLength : 0
		
		});
		keteranganSearchField = Ext.create('Ext.form.TextField',{
			id : 'keteranganSearchField',
			name : 'keterangan',
			fieldLabel : 'keterangan',
			maxLength : 255
		
		});
		link_baruSearchField = Ext.create('Ext.form.TextField',{
			id : 'link_baruSearchField',
			name : 'link_baru',
			fieldLabel : 'link_baru',
			maxLength : 45
		
		});
		var l_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : l_search
		});
		var l_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				l_searchWindow.hide();
			}
		});
		l_searchPanel = Ext.create('Ext.form.Panel', {
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
						namaSearchField,
						linkSearchField,
						defaultusergroupSearchField,
						statusSearchField,
						orderSearchField,
						levelSearchField,
						parentSearchField,
						groupmenu_idSearchField,
						publikSearchField,
						keteranganSearchField,
						link_baruSearchField,
						]
				}],
			buttons : [l_searchingButton,l_cancelSearchButton]
		});
		l_searchWindow = Ext.create('Ext.window.Window',{
			id : 'l_searchWindow',
			renderTo : 'lSearchWindow',
			title : globalFormSearchTitle + ' ' + l_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [l_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="lSaveWindow"></div>
<div id="lSearchWindow"></div>
<div class="span12" id="lGrid"></div>