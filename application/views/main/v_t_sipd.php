<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var sipd_componentItemTitle="SIPD";
		var sipd_dataStore;
		
		var sipd_shorcut;
		var sipd_contextMenu;
		var sipd_gridSearchField;
		var sipd_gridPanel;
		var sipd_formPanel;
		var sipd_formWindow;
		var sipd_searchPanel;
		var sipd_searchWindow;
		
		var sipd_idField;
		var sipd_namaField;
		var sipd_alamatField;
		var sipd_telpField;
		var sipd_urutanField;
		var sipd_jenisdokterField;
				
		var sipd_namaSearchField;
		var sipd_alamatSearchField;
		var sipd_telpSearchField;
		var sipd_urutanSearchField;
		var sipd_jenisdokterSearchField;
				
		var sipd_dbTask = 'CREATE';
		var sipd_dbTaskMessage = 'Tambah';
		var sipd_dbPermission = 'CRUD';
		var sipd_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function sipd_switchToGrid(){
			sipd_formPanel.setDisabled(true);
			sipd_gridPanel.setDisabled(false);
			sipd_formWindow.hide();
		}
		
		function sipd_switchToForm(){
			sipd_gridPanel.setDisabled(true);
			sipd_formPanel.setDisabled(false);
			sipd_formWindow.show();
		}
		
		function sipd_confirmAdd(){
			sipd_dbTask = 'CREATE';
			sipd_dbTaskMessage = 'created';
			sipd_resetForm();
			sipd_switchToForm();
		}
		
		function sipd_confirmUpdate(){
			if(sipd_gridPanel.selModel.getCount() == 1) {
				sipd_dbTask = 'UPDATE';
				sipd_dbTaskMessage = 'updated';
				sipd_switchToForm();
				sipd_setForm();
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
		
		function sipd_confirmDelete(){
			if(sipd_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, sipd_delete);
			}else if(sipd_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, sipd_delete);
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
		
		function sipd_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(sipd_dbPermission)==false && pattC.test(sipd_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(sipd_confirmFormValid()){
					var sipd_idValue = '';
					var sipd_namaValue = '';
					var sipd_alamatValue = '';
					var sipd_telpValue = '';
					var sipd_urutanValue = '';
					var sipd_jenisdokterValue = '';
										
					sipd_idValue = sipd_idField.getValue();
					sipd_namaValue = sipd_namaField.getValue();
					sipd_alamatValue = sipd_alamatField.getValue();
					sipd_telpValue = sipd_telpField.getValue();
					sipd_urutanValue = sipd_urutanField.getValue();
					sipd_jenisdokterValue = sipd_jenisdokterField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_t_sipd/switchAction',
						params: {							
							sipd_id : sipd_idValue,
							sipd_nama : sipd_namaValue,
							sipd_alamat : sipd_alamatValue,
							sipd_telp : sipd_telpValue,
							sipd_urutan : sipd_urutanValue,
							sipd_jenisdokter : sipd_jenisdokterValue,
							action : sipd_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									sipd_dataStore.reload();
									sipd_resetForm();
									sipd_switchToGrid();
									sipd_gridPanel.getSelectionModel().deselectAll();
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
		
		function sipd_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(sipd_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = sipd_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< sipd_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.sipd_id);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_t_sipd/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									sipd_dataStore.reload();
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
		
		function sipd_refresh(){
			sipd_dbListAction = "GETLIST";
			sipd_gridSearchField.reset();
			sipd_searchPanel.getForm().reset();
			sipd_dataStore.proxy.extraParams = { action : 'GETLIST' };
			sipd_dataStore.proxy.extraParams.query = "";
			sipd_dataStore.currentPage = 1;
			sipd_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function sipd_confirmFormValid(){
			return sipd_formPanel.getForm().isValid();
		}
		
		function sipd_resetForm(){
			sipd_dbTask = 'CREATE';
			sipd_dbTaskMessage = 'create';
			sipd_formPanel.getForm().reset();
			sipd_idField.setValue(0);
		}
		
		function sipd_setForm(){
			sipd_dbTask = 'UPDATE';
            sipd_dbTaskMessage = 'update';
			
			var record = sipd_gridPanel.getSelectionModel().getSelection()[0];
			sipd_idField.setValue(record.data.sipd_id);
			sipd_namaField.setValue(record.data.sipd_nama);
			sipd_alamatField.setValue(record.data.sipd_alamat);
			sipd_telpField.setValue(record.data.sipd_telp);
			sipd_urutanField.setValue(record.data.sipd_urutan);
			sipd_jenisdokterField.setValue(record.data.sipd_jenisdokter);
					}
		
		function sipd_showSearchWindow(){
			sipd_searchWindow.show();
		}
		
		function sipd_search(){
			sipd_gridSearchField.reset();
			
			var sipd_namaValue = '';
			var sipd_alamatValue = '';
			var sipd_telpValue = '';
			var sipd_urutanValue = '';
			var sipd_jenisdokterValue = '';
						
			sipd_namaValue = sipd_namaSearchField.getValue();
			sipd_alamatValue = sipd_alamatSearchField.getValue();
			sipd_telpValue = sipd_telpSearchField.getValue();
			sipd_urutanValue = sipd_urutanSearchField.getValue();
			sipd_jenisdokterValue = sipd_jenisdokterSearchField.getValue();
			sipd_dbListAction = "SEARCH";
			sipd_dataStore.proxy.extraParams = { 
				sipd_nama : sipd_namaValue,
				sipd_alamat : sipd_alamatValue,
				sipd_telp : sipd_telpValue,
				sipd_urutan : sipd_urutanValue,
				sipd_jenisdokter : sipd_jenisdokterValue,
				action : 'SEARCH'
			};
			sipd_dataStore.currentPage = 1;
			sipd_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function sipd_printExcel(outputType){
			var searchText = "";
			var sipd_namaValue = '';
			var sipd_alamatValue = '';
			var sipd_telpValue = '';
			var sipd_urutanValue = '';
			var sipd_jenisdokterValue = '';
			
			if(sipd_dataStore.proxy.extraParams.query!==null){searchText = sipd_dataStore.proxy.extraParams.query;}
			if(sipd_dataStore.proxy.extraParams.sipd_nama!==null){sipd_namaValue = sipd_dataStore.proxy.extraParams.sipd_nama;}
			if(sipd_dataStore.proxy.extraParams.sipd_alamat!==null){sipd_alamatValue = sipd_dataStore.proxy.extraParams.sipd_alamat;}
			if(sipd_dataStore.proxy.extraParams.sipd_telp!==null){sipd_telpValue = sipd_dataStore.proxy.extraParams.sipd_telp;}
			if(sipd_dataStore.proxy.extraParams.sipd_urutan!==null){sipd_urutanValue = sipd_dataStore.proxy.extraParams.sipd_urutan;}
			if(sipd_dataStore.proxy.extraParams.sipd_jenisdokter!==null){sipd_jenisdokterValue = sipd_dataStore.proxy.extraParams.sipd_jenisdokter;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_t_sipd/switchAction',
				params : {
					action : outputType,
					query : searchText,
					sipd_nama : sipd_namaValue,
					sipd_alamat : sipd_alamatValue,
					sipd_telp : sipd_telpValue,
					sipd_urutan : sipd_urutanValue,
					sipd_jenisdokter : sipd_jenisdokterValue,
					currentAction : sipd_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/t_sipd_list.xls');
							}else{
								window.open('./print/t_sipd_list.html','sipdlist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		sipd_dataStore = Ext.create('Ext.data.Store',{
			id : 'sipd_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_sipd/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'sipd_id'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'sipd_id', type : 'int', mapping : 'sipd_id' },
				{ name : 'sipd_nama', type : 'string', mapping : 'sipd_nama' },
				{ name : 'sipd_alamat', type : 'string', mapping : 'sipd_alamat' },
				{ name : 'sipd_telp', type : 'string', mapping : 'sipd_telp' },
				{ name : 'sipd_urutan', type : 'int', mapping : 'sipd_urutan' },
				{ name : 'sipd_jenisdokter', type : 'string', mapping : 'sipd_jenisdokter' },
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		sipd_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						sipd_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						sipd_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						sipd_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						sipd_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						sipd_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						sipd_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						sipd_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						sipd_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var sipd_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : sipd_confirmAdd
		});
		var sipd_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : sipd_confirmUpdate
		});
		var sipd_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : sipd_confirmDelete
		});
		var sipd_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : sipd_refresh
		});
		var sipd_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : sipd_showSearchWindow
		});
		var sipd_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				sipd_printExcel('PRINT');
			}
		});
		var sipd_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				sipd_printExcel('EXCEL');
			}
		});
		
		var sipd_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : sipd_confirmUpdate
		});
		var sipd_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : sipd_confirmDelete
		});
		var sipd_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : sipd_refresh
		});
		sipd_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'sipd_contextMenu',
			items: [
				sipd_contextMenuEdit,sipd_contextMenuDelete,'-',sipd_contextMenuRefresh
			]
		});
		
		sipd_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : sipd_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						sipd_dataStore.proxy.extraParams = { action : 'GETLIST'};
						sipd_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		sipd_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'sipd_gridPanel',
			constrain : true,
			store : sipd_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'sipdGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						sipd_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : sipd_shorcut,
			columns : [
				{
					text : 'sipd_nama',
					dataIndex : 'sipd_nama',
					width : 100,
					sortable : false
				},
				{
					text : 'sipd_alamat',
					dataIndex : 'sipd_alamat',
					width : 100,
					sortable : false
				},
				{
					text : 'sipd_telp',
					dataIndex : 'sipd_telp',
					width : 100,
					sortable : false
				},
				{
					text : 'sipd_urutan',
					dataIndex : 'sipd_urutan',
					width : 100,
					sortable : false
				},
				{
					text : 'sipd_jenisdokter',
					dataIndex : 'sipd_jenisdokter',
					width : 100,
					sortable : false
				},
							
			],
			tbar : [
				sipd_addButton,
				sipd_editButton,
				sipd_deleteButton,
				sipd_gridSearchField,
				sipd_searchButton,
				sipd_refreshButton,
				sipd_printButton,
				sipd_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : sipd_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					sipd_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		sipd_idField = Ext.create('Ext.form.NumberField',{
			id : 'sipd_idField',
			name : 'sipd_id',
			fieldLabel : 'sipd_id<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		sipd_namaField = Ext.create('Ext.form.TextField',{
			id : 'sipd_namaField',
			name : 'sipd_nama',
			fieldLabel : 'sipd_nama',
			maxLength : 50
		});
		sipd_alamatField = Ext.create('Ext.form.TextField',{
			id : 'sipd_alamatField',
			name : 'sipd_alamat',
			fieldLabel : 'sipd_alamat',
			maxLength : 100
		});
		sipd_telpField = Ext.create('Ext.form.TextField',{
			id : 'sipd_telpField',
			name : 'sipd_telp',
			fieldLabel : 'sipd_telp',
			maxLength : 20
		});
		sipd_urutanField = Ext.create('Ext.form.NumberField',{
			id : 'sipd_urutanField',
			name : 'sipd_urutan',
			fieldLabel : 'sipd_urutan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		sipd_jenisdokterField = Ext.create('Ext.form.TextField',{
			id : 'sipd_jenisdokterField',
			name : 'sipd_jenisdokter',
			fieldLabel : 'sipd_jenisdokter',
			maxLength : 50
		});
		var sipd_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : sipd_save
		});
		var sipd_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				sipd_resetForm();
				sipd_switchToGrid();
			}
		});
		sipd_formPanel = Ext.create('Ext.form.Panel', {
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
						sipd_idField,
						sipd_namaField,
						sipd_alamatField,
						sipd_telpField,
						sipd_urutanField,
						sipd_jenisdokterField,
											]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [sipd_saveButton,sipd_cancelButton]
		});
		sipd_formWindow = Ext.create('Ext.window.Window',{
			id : 'sipd_formWindow',
			renderTo : 'sipdSaveWindow',
			title : globalFormAddEditTitle + ' ' + sipd_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [sipd_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		sipd_namaSearchField = Ext.create('Ext.form.TextField',{
			id : 'sipd_namaSearchField',
			name : 'sipd_nama',
			fieldLabel : 'sipd_nama',
			maxLength : 50
		
		});
		sipd_alamatSearchField = Ext.create('Ext.form.TextField',{
			id : 'sipd_alamatSearchField',
			name : 'sipd_alamat',
			fieldLabel : 'sipd_alamat',
			maxLength : 100
		
		});
		sipd_telpSearchField = Ext.create('Ext.form.TextField',{
			id : 'sipd_telpSearchField',
			name : 'sipd_telp',
			fieldLabel : 'sipd_telp',
			maxLength : 20
		
		});
		sipd_urutanSearchField = Ext.create('Ext.form.NumberField',{
			id : 'sipd_urutanSearchField',
			name : 'sipd_urutan',
			fieldLabel : 'sipd_urutan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		sipd_jenisdokterSearchField = Ext.create('Ext.form.TextField',{
			id : 'sipd_jenisdokterSearchField',
			name : 'sipd_jenisdokter',
			fieldLabel : 'sipd_jenisdokter',
			maxLength : 50
		
		});
		var sipd_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : sipd_search
		});
		var sipd_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				sipd_searchWindow.hide();
			}
		});
		sipd_searchPanel = Ext.create('Ext.form.Panel', {
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
						sipd_namaSearchField,
						sipd_alamatSearchField,
						sipd_telpSearchField,
						sipd_urutanSearchField,
						sipd_jenisdokterSearchField,
						]
				}],
			buttons : [sipd_searchingButton,sipd_cancelSearchButton]
		});
		sipd_searchWindow = Ext.create('Ext.window.Window',{
			id : 'sipd_searchWindow',
			renderTo : 'sipdSearchWindow',
			title : globalFormSearchTitle + ' ' + sipd_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [sipd_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="sipdSaveWindow"></div>
<div id="sipdSearchWindow"></div>
<div class="span12" id="sipdGrid"></div>