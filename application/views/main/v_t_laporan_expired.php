<h4>Laporan Expired</h4>
<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var laporan_expired_dataStore;
		
		var laporan_expired_formPanel;
		
		var laporan_expired_tanggalAwalField;
		var laporan_expired_tanggalAkhirField;
		var laporan_expired_bulanField;
		var laporan_expired_tahunField;
		var laporan_expired_kelurahanField;
		var laporan_expired_kecamatanField;
		var laporan_expired_ijinField;
/* End variabel declaration */
		function laporan_expired_save(outputType){
			if(laporan_expired_confirmFormValid()){
				var laporan_expired_ijinValue=laporan_expired_ijinField.getValue();
				var laporan_expired_ijin_namaValue=laporan_expired_ijinField.getRawValue();
				var laporan_expired_bulanValue=laporan_expired_bulanField.getValue();
				var laporan_expired_tahunValue=laporan_expired_tahunField.getValue();
				var laporan_expired_tanggalAwalValue=Ext.Date.format(laporan_expired_tanggalAwalField.getValue(),'Y-m-d');
				var laporan_expired_tanggalAkhirValue=Ext.Date.format(laporan_expired_tanggalAkhirField.getValue(),'Y-m-d');
				var laporan_expired_opsitglValue=laporan_expired_opsitglField.getValue();
				var laporan_expired_opsiblnValue=laporan_expired_opsiblnField.getValue();
				if(laporan_expired_opsitglField.getValue() == true){
					laporan_expired_opsiValue = 'tanggal';
				}else{
					laporan_expired_opsiValue = 'bulan';
				}
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_laporan_expired/cetaklaporan_expired',
					params: {	
						laporan_expired_ijin : laporan_expired_ijinValue,
						laporan_expired_ijin_nama : laporan_expired_ijin_namaValue,
						laporan_expired_bulan : laporan_expired_bulanValue,
						laporan_expired_tahun : laporan_expired_tahunValue,
						laporan_expired_tanggalAwal : laporan_expired_tanggalAwalValue,
						laporan_expired_tanggalAkhir : laporan_expired_tanggalAkhirValue,
						laporan_expired_opsi : laporan_expired_opsiValue,
						outputType : outputType
					},
					success: function(response){
						ajaxWaitMessage.hide();
						var result = response.responseText;
						window.open('<?php echo base_url(); ?>print/' + result);
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
		
		function laporan_expired_confirmFormValid(){
			return laporan_expired_formPanel.getForm().isValid();
		}
		
		function laporan_expired_resetForm(){
			laporan_expired_formPanel.getForm().reset();
		}
/* Start DataStore declaration */
		laporan_expired_ijindataStore = Ext.create('Ext.data.Store',{
			pageSize : globalPageSize,
			autoLoad : true,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_master_ijin/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'ID_IJIN'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'ID_IJIN', type : 'int', mapping : 'ID_IJIN' },
				{ name : 'NAMA_IJIN', type : 'string', mapping : 'NAMA_IJIN' }
			]
		});
/* End DataStore declaration */
/* Start FormPanel declaration */
		laporan_expired_ijinField=Ext.create('Ext.form.ComboBox',{
			fieldLabel:'<b>Perijinan </b>',
			store : laporan_expired_ijindataStore,
			mode: 'local',
			displayField: 'NAMA_IJIN',
			valueField: 'ID_IJIN',
			width: 100,
			triggerAction: 'all',
			labelWidth : 135
		});
		laporan_expired_bulanField=Ext.create('Ext.form.ComboBox',{
			fieldLabel:' ',
			store:new Ext.data.SimpleStore({
				fields:['value', 'display'],
				data:[['01','Januari'],['02','Pebruari'],['03','Maret'],['04','April'],['05','Mei'],['06','Juni'],['07','Juli'],['08','Agustus'],['09','September'],['10','Oktober'],['11','Nopember'],['12','Desember']]
			}),
			hidden : true,
			mode: 'local',
			displayField: 'display',
			valueField: 'value',
			value: Ext.Date.format(new Date(),'m'),
			width: 150,
			triggerAction: 'all',
			labelWidth : 25
		});

		laporan_expired_tahunField=Ext.create('Ext.form.ComboBox',{
			fieldLabel:' ',
			store:new Ext.data.SimpleStore({
				fields:['tahun'],
				data: [['2013'], ['2014'], ['2015'], ['2016'], ['2017'], ['2018']]
			}),
			mode: 'local',
			hidden : true,
			displayField: 'tahun',
			valueField: 'tahun',
			value: Ext.Date.format(new Date(),'Y'),
			width: 150,
			triggerAction: 'all',
			labelWidth : 25,
			labelSeparator : ' '
		});
		laporan_expired_tanggalAwalField=Ext.create('Ext.form.Date',{
			fieldLabel: '<b>Periode</b> ',
			format : 'Y-m-d',
			name: 'laporan_expired_tanggalAwalField',
			allowBlank: true,
			width: 250,
			value: new Date(),
			labelWidth : 125
		});

		laporan_expired_tanggalAkhirField=Ext.create('Ext.form.Date',{
			fieldLabel: 's/d',
			format : 'Y-m-d',
			allowBlank: true,
			width: 150,
			value: new Date(),
			labelWidth : 25,
			labelSeparator : ' '
		});

		laporan_expired_opsitglField=Ext.create('Ext.form.Radio',{
			boxLabel:'Tanggal',
			width:100,
			hidden : true,
			name: 'filter_opsi',
			checked: true,
			listeners: {
				check: function(){
					if(laporan_expired_opsitglField.getValue()==true){
						laporan_expired_tanggalAwalField.allowBlank=false;
						laporan_expired_tanggalAkhirField.allowBlank=false;
					}else{
						laporan_expired_tanggalAwalField.allowBlank=true;
						laporan_expired_tanggalAkhirField.allowBlank=true;
					}
				}
			}
		});
		laporan_expired_opsiblnField=Ext.create('Ext.form.Radio',{
			boxLabel:'Bulan',
			width:100,
			hidden : true,
			name: 'filter_opsi'
		});
		
		laporan_expired_formPanel = Ext.create('Ext.FormPanel', {
			renderTo : 'laporan_expiredSaveWindow',
			width : 450,
			frame : true,
			autoHeight : true,
			layout : 'form',
			items: [
				laporan_expired_ijinField,
				Ext.create('Ext.form.Label',{ html : '<br>' }),
				{
					xtype : 'fieldset',
					layout : 'column',
					border: false,
					items : [
						laporan_expired_opsitglField,
						laporan_expired_tanggalAwalField,
						laporan_expired_tanggalAkhirField,
					]
				},{
					xtype : 'fieldset',
					layout: 'column',
					border: false,
					items:[laporan_expired_opsiblnField,laporan_expired_bulanField,laporan_expired_tahunField]
				}
			],
			buttons : [
				{
					text : 'Cetak',
					tooltip : 'Cetak laporan_expired',
					handler : function(){
						laporan_expired_save('PRINT');
					}
				},
				{
					text : 'Excel',
					tooltip : 'Export laporan_expired ke Excel',
					handler : function(){
						laporan_expired_save('EXCEL');
					}
				}
			]
		});
/* End FormPanel declaration */
});
</script>
<div id="laporan_expiredSaveWindow"></div>