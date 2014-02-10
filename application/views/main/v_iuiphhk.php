<style>
	.checked{
		background-image:url(../assets/images/icons/check.png) !important;
		margin:auto;
	}
	.unchecked{
		background-image:url(../assets/images/icons/forward.png) !important;
	}
</style>
<h4>IZIN USAHA INDUSTRI PRIMER HASIL HUTAN KAYU</h4>
<hr>
<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var iphhk_componentItemTitle="IUPHHK";
		var iphhk_dataStore;
		
		var iphhk_shorcut;
		var iphhk_contextMenu;
		var iphhk_gridSearchField;
		var iphhk_gridPanel;
		var iphhk_formPanel;
		var iphhk_formWindow;
		var iphhk_searchPanel;
		var iphhk_searchWindow;
		
		var ID_IUIPHHKField;
		var ID_PEMOHONField;
		var NO_SKField;
		var NO_SK_LAMAField;
		var JENIS_PERMOHONANField;
		var NAMA_PERUSAHAANField;
		var NPWPField;
		var ALAMATField;
		var STATUS_MODALField;
		var NAMA_NOTARISField;
		var NO_AKTAField;
		var PENANGGUNG_JAWABField;
		var NAMA_DIREKSIField;
		var DEWAN_KOMISARISField;
		var TUJUAN_PRODUKSIField;
		var LOKASI_PABRIKField;
		var LUAS_TANAHField;
		var ALAMAT_PABRIKField;
		var OLAH1_P_TAHUNField;
		var OLAH1_P_BULANField;
		var OLAH2_P_TAHUNField;
		var OLAH2_P_BULANField;
		var OLAH3_P_TAHUNField;
		var OLAH3_P_BULANField;
		var OLAH1_S_TAHUNField;
		var OLAH1_S_BULANField;
		var OLAH2_S_TAHUNField;
		var OLAH2_S_BULANField;
		var OLAH3_S_TAHUNField;
		var OLAH3_S_BULANField;
		var MT_TANAHField;
		var MT_BANGUNANField;
		var MT_MESINField;
		var MT_DLLField;
		var MK_BAHAN_BAKUField;
		var MK_UPAHField;
		var MK_DLLField;
		var SP_MODAL_SENDIRIField;
		var SP_PINJAMANField;
		var TKI_L_JUMLAHField;
		var TKI_P_JUMLAHField;
		var TKA_JUMLAHField;
		var TKA_ASALField;
		var TKA_JABATANField;
		var TKA_JANGKA_WAKTUField;
		var DN_JENIS_PRODUK1Field;
		var DN_JENIS_PRODUK2Field;
		var DN_JENIS_PRODUK3Field;
		var E_JENIS_PRODUK1Field;
		var E_JENIS_PRODUK2Field;
		var E_JENIS_PRODUK3Field;
		var MERK_JENIS_PRODUKField;
		var BBKB_DN_JUMLAHField;
		var BBKB_DN_SATUANField;
		var BBKB_DN_ASALField;
		var BBKB_DN_HARGAField;
		var BBKB_DN_KETERANGANField;
		var BBKO_DN_JUMLAHField;
		var BBKO_DN_SATUANField;
		var BBKO_DN_ASALField;
		var BBKO_DN_HARGAField;
		var BBKO_DN_KETERANGANField;
		var BP_DN_JUMLAHField;
		var BP_DN_SATUANField;
		var BP_DN_ASALField;
		var BP_DN_HARGAField;
		var BP_DN_KETERANGANField;
		var RBB_LUAS_GUDANGField;
		var RBB_KAYU_OLAHANField;
		var RBB_PENOLONGField;
		var RBB_HASIL_PRODUKSIField;
		var RLPLY_LOKASIField;
		var RLPLY_LUASField;
		var RLPLY_PERIZINANField;
		var RSD1_KAPASITASField;
		var RSD1_JUMLAHField;
		var RSD211_KAPASITASField;
		var RSD211_JUMLAHField;
		var RSD212_KAPASITASField;
		var RSD212_JUMLAHField;
		var RSD213_KAPASITASField;
		var RSD213_JUMLAHField;
		var RSD22_KAPASITASField;
		var RSD22_JUMLAHField;
		var RSD23_KAPASITASField;
		var RSD23_JUMLAHField;
		var RPL1_VOLUMEField;
		var RPL1_SATUANField;
		var RPL1_PENANGANANField;
		var RPL2_VOLUMEField;
		var RPL2_SATUANField;
		var RPL2_PENANGANANField;
		var RPL3_VOLUMEField;
		var RPL3_SATUANField;
		var RPL3_PENANGANANField;
		var RPL4_VOLUMEField;
		var RPL4_SATUANField;
		var RPL4_PENANGANANField;
		var PENYETUJUField;
		var NOMOR_SURATField;
		var TGL_TERLAMPIRField;
		var TGL_PERMOHONANField;
		var STATUS_SURVEYField;
		var STATUSField;
		var TGL_BERLAKUField;
		var TGL_BERAKHIRField;
				
		var ID_PEMOHONSearchField;
		var NO_SKSearchField;
		var NO_SK_LAMASearchField;
		var JENIS_PERMOHONANSearchField;
		var NAMA_PERUSAHAANSearchField;
		var NPWPSearchField;
		var ALAMATSearchField;
		var STATUS_MODALSearchField;
		var NAMA_NOTARISSearchField;
		var NO_AKTASearchField;
		var PENANGGUNG_JAWABSearchField;
		var NAMA_DIREKSISearchField;
		var DEWAN_KOMISARISSearchField;
		var TUJUAN_PRODUKSISearchField;
		var LOKASI_PABRIKSearchField;
		var LUAS_TANAHSearchField;
		var ALAMAT_PABRIKSearchField;
		var OLAH1_P_TAHUNSearchField;
		var OLAH1_P_BULANSearchField;
		var OLAH2_P_TAHUNSearchField;
		var OLAH2_P_BULANSearchField;
		var OLAH3_P_TAHUNSearchField;
		var OLAH3_P_BULANSearchField;
		var OLAH1_S_TAHUNSearchField;
		var OLAH1_S_BULANSearchField;
		var OLAH2_S_TAHUNSearchField;
		var OLAH2_S_BULANSearchField;
		var OLAH3_S_TAHUNSearchField;
		var OLAH3_S_BULANSearchField;
		var MT_TANAHSearchField;
		var MT_BANGUNANSearchField;
		var MT_MESINSearchField;
		var MT_DLLSearchField;
		var MK_BAHAN_BAKUSearchField;
		var MK_UPAHSearchField;
		var MK_DLLSearchField;
		var SP_MODAL_SENDIRISearchField;
		var SP_PINJAMANSearchField;
		var TKI_L_JUMLAHSearchField;
		var TKI_P_JUMLAHSearchField;
		var TKA_JUMLAHSearchField;
		var TKA_ASALSearchField;
		var TKA_JABATANSearchField;
		var TKA_JANGKA_WAKTUSearchField;
		var DN_JENIS_PRODUK1SearchField;
		var DN_JENIS_PRODUK2SearchField;
		var DN_JENIS_PRODUK3SearchField;
		var E_JENIS_PRODUK1SearchField;
		var E_JENIS_PRODUK2SearchField;
		var E_JENIS_PRODUK3SearchField;
		var MERK_JENIS_PRODUKSearchField;
		var BBKB_DN_JUMLAHSearchField;
		var BBKB_DN_SATUANSearchField;
		var BBKB_DN_ASALSearchField;
		var BBKB_DN_HARGASearchField;
		var BBKB_DN_KETERANGANSearchField;
		var BBKO_DN_JUMLAHSearchField;
		var BBKO_DN_SATUANSearchField;
		var BBKO_DN_ASALSearchField;
		var BBKO_DN_HARGASearchField;
		var BBKO_DN_KETERANGANSearchField;
		var BP_DN_JUMLAHSearchField;
		var BP_DN_SATUANSearchField;
		var BP_DN_ASALSearchField;
		var BP_DN_HARGASearchField;
		var BP_DN_KETERANGANSearchField;
		var RBB_LUAS_GUDANGSearchField;
		var RBB_KAYU_OLAHANSearchField;
		var RBB_PENOLONGSearchField;
		var RBB_HASIL_PRODUKSISearchField;
		var RLPLY_LOKASISearchField;
		var RLPLY_LUASSearchField;
		var RLPLY_PERIZINANSearchField;
		var RSD1_KAPASITASSearchField;
		var RSD1_JUMLAHSearchField;
		var RSD211_KAPASITASSearchField;
		var RSD211_JUMLAHSearchField;
		var RSD212_KAPASITASSearchField;
		var RSD212_JUMLAHSearchField;
		var RSD213_KAPASITASSearchField;
		var RSD213_JUMLAHSearchField;
		var RSD22_KAPASITASSearchField;
		var RSD22_JUMLAHSearchField;
		var RSD23_KAPASITASSearchField;
		var RSD23_JUMLAHSearchField;
		var RPL1_VOLUMESearchField;
		var RPL1_SATUANSearchField;
		var RPL1_PENANGANANSearchField;
		var RPL2_VOLUMESearchField;
		var RPL2_SATUANSearchField;
		var RPL2_PENANGANANSearchField;
		var RPL3_VOLUMESearchField;
		var RPL3_SATUANSearchField;
		var RPL3_PENANGANANSearchField;
		var RPL4_VOLUMESearchField;
		var RPL4_SATUANSearchField;
		var RPL4_PENANGANANSearchField;
		var PENYETUJUSearchField;
		var NOMOR_SURATSearchField;
		var TGL_TERLAMPIRSearchField;
		var TGL_PERMOHONANSearchField;
		var STATUS_SURVEYSearchField;
		var STATUSSearchField;
		var TGL_BERLAKUSearchField;
		var TGL_BERAKHIRSearchField;
				
		var iphhk_dbTask = 'CREATE';
		var iphhk_dbTaskMessage = 'Tambah';
		var iphhk_dbPermission = 'CRUD';
		var iphhk_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function iphhk_switchToGrid(){
			iphhk_formPanel.setDisabled(true);
			iphhk_gridPanel.setDisabled(false);
			iphhk_formWindow.hide();
		}
		
		function iphhk_switchToForm(){
			iphhk_gridPanel.setDisabled(true);
			iphhk_formPanel.setDisabled(false);
			iphhk_formWindow.show();
		}
		
		function iphhk_confirmAdd(){
			iphhk_dbTask = 'CREATE';
			iphhk_dbTaskMessage = 'created';
			iphhk_resetForm();
			iphhk_switchToForm();
		}
		
		function iphhk_confirmUpdate(){
			if(iphhk_gridPanel.selModel.getCount() == 1) {
				iphhk_dbTask = 'UPDATE';
				iphhk_dbTaskMessage = 'updated';
				iphhk_switchToForm();
				iphhk_setForm();
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
		
		function iphhk_confirmDelete(){
			if(iphhk_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, iphhk_delete);
			}else if(iphhk_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, iphhk_delete);
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
		
		function iphhk_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(iphhk_dbPermission)==false && pattC.test(iphhk_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(iphhk_confirmFormValid()){
					var ID_IUIPHHKValue = '';
					var ID_PEMOHONValue = '';
					var NO_SKValue = '';
					var NO_SK_LAMAValue = '';
					var JENIS_PERMOHONANValue = '';
					var NAMA_PERUSAHAANValue = '';
					var NPWPValue = '';
					var ALAMATValue = '';
					var STATUS_MODALValue = '';
					var NAMA_NOTARISValue = '';
					var NO_AKTAValue = '';
					var PENANGGUNG_JAWABValue = '';
					var NAMA_DIREKSIValue = '';
					var DEWAN_KOMISARISValue = '';
					var TUJUAN_PRODUKSIValue = '';
					var LOKASI_PABRIKValue = '';
					var LUAS_TANAHValue = '';
					var ALAMAT_PABRIKValue = '';
					var OLAH1_P_TAHUNValue = '';
					var OLAH1_P_BULANValue = '';
					var OLAH2_P_TAHUNValue = '';
					var OLAH2_P_BULANValue = '';
					var OLAH3_P_TAHUNValue = '';
					var OLAH3_P_BULANValue = '';
					var OLAH1_S_TAHUNValue = '';
					var OLAH1_S_BULANValue = '';
					var OLAH2_S_TAHUNValue = '';
					var OLAH2_S_BULANValue = '';
					var OLAH3_S_TAHUNValue = '';
					var OLAH3_S_BULANValue = '';
					var MT_TANAHValue = '';
					var MT_BANGUNANValue = '';
					var MT_MESINValue = '';
					var MT_DLLValue = '';
					var MK_BAHAN_BAKUValue = '';
					var MK_UPAHValue = '';
					var MK_DLLValue = '';
					var SP_MODAL_SENDIRIValue = '';
					var SP_PINJAMANValue = '';
					var TKI_L_JUMLAHValue = '';
					var TKI_P_JUMLAHValue = '';
					var TKA_JUMLAHValue = '';
					var TKA_ASALValue = '';
					var TKA_JABATANValue = '';
					var TKA_JANGKA_WAKTUValue = '';
					var DN_JENIS_PRODUK1Value = '';
					var DN_JENIS_PRODUK2Value = '';
					var DN_JENIS_PRODUK3Value = '';
					var E_JENIS_PRODUK1Value = '';
					var E_JENIS_PRODUK2Value = '';
					var E_JENIS_PRODUK3Value = '';
					var MERK_JENIS_PRODUKValue = '';
					
					var BBKB_DN_JUMLAHValue = '';
					var BBKB_DN_SATUANValue = '';
					var BBKB_DN_ASALValue = '';
					var BBKB_DN_HARGAValue = '';
					var BBKB_DN_KETERANGANValue = '';
					var BBKO_DN_JUMLAHValue = '';
					var BBKO_DN_SATUANValue = '';
					var BBKO_DN_ASALValue = '';
					var BBKO_DN_HARGAValue = '';
					var BBKO_DN_KETERANGANValue = '';
					var BP_DN_JUMLAHValue = '';
					var BP_DN_SATUANValue = '';
					var BP_DN_ASALValue = '';
					var BP_DN_HARGAValue = '';
					var BP_DN_KETERANGANValue = '';
					
					var BBKB_I_JUMLAHValue = '';
					var BBKB_I_SATUANValue = '';
					var BBKB_I_ASALValue = '';
					var BBKB_I_HARGAValue = '';
					var BBKB_I_KETERANGANValue = '';
					var BBKO_I_JUMLAHValue = '';
					var BBKO_I_SATUANValue = '';
					var BBKO_I_ASALValue = '';
					var BBKO_I_HARGAValue = '';
					var BBKO_I_KETERANGANValue = '';
					var BP_I_JUMLAHValue = '';
					var BP_I_SATUANValue = '';
					var BP_I_ASALValue = '';
					var BP_I_HARGAValue = '';
					var BP_I_KETERANGANValue = '';
					
					var RBB_LUAS_GUDANGValue = '';
					var RBB_KAYU_OLAHANValue = '';
					var RBB_PENOLONGValue = '';
					var RBB_HASIL_PRODUKSIValue = '';
					var RLPLY_LOKASIValue = '';
					var RLPLY_LUASValue = '';
					var RLPLY_PERIZINANValue = '';
					var RSD1_KAPASITASValue = '';
					var RSD1_JUMLAHValue = '';
					var RSD211_KAPASITASValue = '';
					var RSD211_JUMLAHValue = '';
					var RSD212_KAPASITASValue = '';
					var RSD212_JUMLAHValue = '';
					var RSD213_KAPASITASValue = '';
					var RSD213_JUMLAHValue = '';
					var RSD22_KAPASITASValue = '';
					var RSD22_JUMLAHValue = '';
					var RSD23_KAPASITASValue = '';
					var RSD23_JUMLAHValue = '';
					var RPL1_VOLUMEValue = '';
					var RPL1_SATUANValue = '';
					var RPL1_PENANGANANValue = '';
					var RPL2_VOLUMEValue = '';
					var RPL2_SATUANValue = '';
					var RPL2_PENANGANANValue = '';
					var RPL3_VOLUMEValue = '';
					var RPL3_SATUANValue = '';
					var RPL3_PENANGANANValue = '';
					var RPL4_VOLUMEValue = '';
					var RPL4_SATUANValue = '';
					var RPL4_PENANGANANValue = '';
					var PENYETUJUValue = '';
					var NOMOR_SURATValue = '';
					var TGL_TERLAMPIRValue = '';
					var TGL_PERMOHONANValue = '';
					var STATUS_SURVEYValue = '';
					var STATUSValue = '';
					var TGL_BERLAKUValue = '';
					var TGL_BERAKHIRValue = '';
					
					/*Syarat*/
					var array_iuiphhk_keterangan=new Array();
					if(iuiphhk_syaratDataStore.getCount() > 0){
						for(var i=0;i<iuiphhk_syaratDataStore.getCount();i++){
							array_iuiphhk_keterangan.push(iuiphhk_syaratDataStore.getAt(i).data.KETERANGAN);
						}
					}					
					var encoded_array_iuiphhk_keterangan = Ext.encode(array_iuiphhk_keterangan);
					/*End*/
					
					/*Produksi Impor*/
					var array_iuiphhk_rencana_alat=new Array();
					if(det_iuiphhk_rencana_alat_dataStore.getCount() > 0){
						for(var i=0;i<det_iuiphhk_rencana_alat_dataStore.getCount();i++){
							array_iuiphhk_rencana_alat.push(det_iuiphhk_rencana_alat_dataStore.getAt(i).data.KETERANGAN);
						}
					}					
					var encoded_array_iuiphhk_keterangan = Ext.encode(array_iuiphhk_rencana_alat);
					/*End*/
					
					/*Produksi Ekspor*/
					var array_iuiphhk_keterangan=new Array();
					if(iuiphhk_syaratDataStore.getCount() > 0){
						for(var i=0;i<iuiphhk_syaratDataStore.getCount();i++){
							array_iuiphhk_keterangan.push(iuiphhk_syaratDataStore.getAt(i).data.KETERANGAN);
						}
					}					
					var encoded_array_iuiphhk_keterangan = Ext.encode(array_iuiphhk_keterangan);
					/*End*/
					
					/*Jenis Produksi*/
					var array_iuiphhk_keterangan=new Array();
					if(iuiphhk_syaratDataStore.getCount() > 0){
						for(var i=0;i<iuiphhk_syaratDataStore.getCount();i++){
							array_iuiphhk_keterangan.push(iuiphhk_syaratDataStore.getAt(i).data.KETERANGAN);
						}
					}					
					var encoded_array_iuiphhk_keterangan = Ext.encode(array_iuiphhk_keterangan);
					/*End*/
					
					ID_IUIPHHKValue = ID_IUIPHHKField.getValue();
					ID_PEMOHONValue = ID_PEMOHONField.getValue();
					NO_SKValue = NO_SKField.getValue();
					NO_SK_LAMAValue = NO_SK_LAMAField.getValue();
					JENIS_PERMOHONANValue = JENIS_PERMOHONANField.getValue();
					NAMA_PERUSAHAANValue = NAMA_PERUSAHAANField.getValue();
					NPWPValue = NPWPField.getValue();
					ALAMATValue = ALAMATField.getValue();
					STATUS_MODALValue = STATUS_MODALField.getValue();
					NAMA_NOTARISValue = NAMA_NOTARISField.getValue();
					NO_AKTAValue = NO_AKTAField.getValue();
					PENANGGUNG_JAWABValue = PENANGGUNG_JAWABField.getValue();
					NAMA_DIREKSIValue = NAMA_DIREKSIField.getValue();
					DEWAN_KOMISARISValue = DEWAN_KOMISARISField.getValue();
					TUJUAN_PRODUKSIValue = TUJUAN_PRODUKSIField.getValue();
					LOKASI_PABRIKValue = LOKASI_PABRIKField.getValue();
					LUAS_TANAHValue = LUAS_TANAHField.getValue();
					ALAMAT_PABRIKValue = ALAMAT_PABRIKField.getValue();
					OLAH1_P_TAHUNValue = OLAH1_P_TAHUNField.getValue();
					OLAH1_P_BULANValue = OLAH1_P_BULANField.getValue();
					OLAH2_P_TAHUNValue = OLAH2_P_TAHUNField.getValue();
					OLAH2_P_BULANValue = OLAH2_P_BULANField.getValue();
					OLAH3_P_TAHUNValue = OLAH3_P_TAHUNField.getValue();
					OLAH3_P_BULANValue = OLAH3_P_BULANField.getValue();
					OLAH1_S_TAHUNValue = OLAH1_S_TAHUNField.getValue();
					OLAH1_S_BULANValue = OLAH1_S_BULANField.getValue();
					OLAH2_S_TAHUNValue = OLAH2_S_TAHUNField.getValue();
					OLAH2_S_BULANValue = OLAH2_S_BULANField.getValue();
					OLAH3_S_TAHUNValue = OLAH3_S_TAHUNField.getValue();
					OLAH3_S_BULANValue = OLAH3_S_BULANField.getValue();
					MT_TANAHValue = MT_TANAHField.getValue();
					MT_BANGUNANValue = MT_BANGUNANField.getValue();
					MT_MESINValue = MT_MESINField.getValue();
					MT_DLLValue = MT_DLLField.getValue();
					MK_BAHAN_BAKUValue = MK_BAHAN_BAKUField.getValue();
					MK_UPAHValue = MK_UPAHField.getValue();
					MK_DLLValue = MK_DLLField.getValue();
					SP_MODAL_SENDIRIValue = SP_MODAL_SENDIRIField.getValue();
					SP_PINJAMANValue = SP_PINJAMANField.getValue();
					TKI_L_JUMLAHValue = TKI_L_JUMLAHField.getValue();
					TKI_P_JUMLAHValue = TKI_P_JUMLAHField.getValue();
					TKA_JUMLAHValue = TKA_JUMLAHField.getValue();
					TKA_ASALValue = TKA_ASALField.getValue();
					TKA_JABATANValue = TKA_JABATANField.getValue();
					TKA_JANGKA_WAKTUValue = TKA_JANGKA_WAKTUField.getValue();
					DN_JENIS_PRODUK1Value = DN_JENIS_PRODUK1Field.getValue();
					DN_JENIS_PRODUK2Value = DN_JENIS_PRODUK2Field.getValue();
					DN_JENIS_PRODUK3Value = DN_JENIS_PRODUK3Field.getValue();
					E_JENIS_PRODUK1Value = E_JENIS_PRODUK1Field.getValue();
					E_JENIS_PRODUK2Value = E_JENIS_PRODUK2Field.getValue();
					E_JENIS_PRODUK3Value = E_JENIS_PRODUK3Field.getValue();
					MERK_JENIS_PRODUKValue = MERK_JENIS_PRODUKField.getValue();
					pemohon_namaValue = pemohon_namaField.getValue();
					pemohon_telpValue = pemohon_telpField.getValue();
					pemohon_alamatValue = pemohon_alamatField.getValue();
					pemohon_idValue = pemohon_idField.getValue();
					pemohon_nikValue = pemohon_nikField.getValue();
					BBKB_DN_JUMLAHValue = BBKB_DN_JUMLAHField.getValue();
					BBKB_DN_SATUANValue = BBKB_DN_SATUANField.getValue();
					BBKB_DN_ASALValue = BBKB_DN_ASALField.getValue();
					BBKB_DN_HARGAValue = BBKB_DN_HARGAField.getValue();
					BBKB_DN_KETERANGANValue = BBKB_DN_KETERANGANField.getValue();
					BBKO_DN_JUMLAHValue = BBKO_DN_JUMLAHField.getValue();
					BBKO_DN_SATUANValue = BBKO_DN_SATUANField.getValue();
					BBKO_DN_ASALValue = BBKO_DN_ASALField.getValue();
					BBKO_DN_HARGAValue = BBKO_DN_HARGAField.getValue();
					BBKO_DN_KETERANGANValue = BBKO_DN_KETERANGANField.getValue();
					BP_DN_JUMLAHValue = BP_DN_JUMLAHField.getValue();
					BP_DN_SATUANValue = BP_DN_SATUANField.getValue();
					BP_DN_ASALValue = BP_DN_ASALField.getValue();
					BP_DN_HARGAValue = BP_DN_HARGAField.getValue();
					BP_DN_KETERANGANValue = BP_DN_KETERANGANField.getValue();
					
					BBKB_I_JUMLAHValue = BBKB_I_JUMLAHField.getValue();
					BBKB_I_SATUANValue = BBKB_I_SATUANField.getValue();
					BBKB_I_ASALValue = BBKB_I_ASALField.getValue();
					BBKB_I_HARGAValue = BBKB_I_HARGAField.getValue();
					BBKB_I_KETERANGANValue = BBKB_I_KETERANGANField.getValue();
					BBKO_I_JUMLAHValue = BBKO_I_JUMLAHField.getValue();
					BBKO_I_SATUANValue = BBKO_I_SATUANField.getValue();
					BBKO_I_ASALValue = BBKO_I_ASALField.getValue();
					BBKO_I_HARGAValue = BBKO_I_HARGAField.getValue();
					BBKO_I_KETERANGANValue = BBKO_I_KETERANGANField.getValue();
					BP_I_JUMLAHValue = BP_I_JUMLAHField.getValue();
					BP_I_SATUANValue = BP_I_SATUANField.getValue();
					BP_I_ASALValue = BP_I_ASALField.getValue();
					BP_I_HARGAValue = BP_I_HARGAField.getValue();
					BP_I_KETERANGANValue = BP_I_KETERANGANField.getValue();
					
					RBB_LUAS_GUDANGValue = RBB_LUAS_GUDANGField.getValue();
					RBB_KAYU_OLAHANValue = RBB_KAYU_OLAHANField.getValue();
					RBB_PENOLONGValue = RBB_PENOLONGField.getValue();
					RBB_HASIL_PRODUKSIValue = RBB_HASIL_PRODUKSIField.getValue();
					RLPLY_LOKASIValue = RLPLY_LOKASIField.getValue();
					RLPLY_LUASValue = RLPLY_LUASField.getValue();
					RLPLY_PERIZINANValue = RLPLY_PERIZINANField.getValue();
					RSD1_KAPASITASValue = RSD1_KAPASITASField.getValue();
					RSD1_JUMLAHValue = RSD1_JUMLAHField.getValue();
					RSD211_KAPASITASValue = RSD211_KAPASITASField.getValue();
					RSD211_JUMLAHValue = RSD211_JUMLAHField.getValue();
					RSD212_KAPASITASValue = RSD212_KAPASITASField.getValue();
					RSD212_JUMLAHValue = RSD212_JUMLAHField.getValue();
					RSD213_KAPASITASValue = RSD213_KAPASITASField.getValue();
					RSD213_JUMLAHValue = RSD213_JUMLAHField.getValue();
					RSD22_KAPASITASValue = RSD22_KAPASITASField.getValue();
					RSD22_JUMLAHValue = RSD22_JUMLAHField.getValue();
					RSD23_KAPASITASValue = RSD23_KAPASITASField.getValue();
					RSD23_JUMLAHValue = RSD23_JUMLAHField.getValue();
					RPL1_VOLUMEValue = RPL1_VOLUMEField.getValue();
					RPL1_SATUANValue = RPL1_SATUANField.getValue();
					RPL1_PENANGANANValue = RPL1_PENANGANANField.getValue();
					RPL2_VOLUMEValue = RPL2_VOLUMEField.getValue();
					RPL2_SATUANValue = RPL2_SATUANField.getValue();
					RPL2_PENANGANANValue = RPL2_PENANGANANField.getValue();
					RPL3_VOLUMEValue = RPL3_VOLUMEField.getValue();
					RPL3_SATUANValue = RPL3_SATUANField.getValue();
					RPL3_PENANGANANValue = RPL3_PENANGANANField.getValue();
					RPL4_VOLUMEValue = RPL4_VOLUMEField.getValue();
					RPL4_SATUANValue = RPL4_SATUANField.getValue();
					RPL4_PENANGANANValue = RPL4_PENANGANANField.getValue();
					PENYETUJUValue = PENYETUJUField.getValue();
					NOMOR_SURATValue = NOMOR_SURATField.getValue();
					TGL_TERLAMPIRValue = TGL_TERLAMPIRField.getValue();
					TGL_PERMOHONANValue = TGL_PERMOHONANField.getValue();
					STATUS_SURVEYValue = STATUS_SURVEYField.getValue();
					STATUSValue = STATUSField.getValue();
					TGL_BERLAKUValue = TGL_BERLAKUField.getValue();
					TGL_BERAKHIRValue = TGL_BERAKHIRField.getValue();
					RETRIBUSIValue = RETRIBUSIField.getValue();
					pemohon_namaValue = pemohon_namaField.getValue();
					pemohon_telpValue = pemohon_telpField.getValue();
					pemohon_alamatValue = pemohon_alamatField.getValue();
					pemohon_idValue = pemohon_idField.getValue();
					pemohon_nikValue = pemohon_nikField.getValue();
					
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_iuiphhk/switchAction',
						params: {
							pemohon_nama : pemohon_namaValue,
							pemohon_telp : pemohon_telpValue,
							pemohon_alamat : pemohon_alamatValue,
							pemohon_id : pemohon_idValue,
							pemohon_nik : pemohon_nikValue,
							ID_IUIPHHK : ID_IUIPHHKValue,
							ID_PEMOHON : ID_PEMOHONValue,
							NO_SK : NO_SKValue,
							NO_SK_LAMA : NO_SK_LAMAValue,
							JENIS_PERMOHONAN : JENIS_PERMOHONANValue,
							NAMA_PERUSAHAAN : NAMA_PERUSAHAANValue,
							NPWP : NPWPValue,
							ALAMAT : ALAMATValue,
							STATUS_MODAL : STATUS_MODALValue,
							NAMA_NOTARIS : NAMA_NOTARISValue,
							NO_AKTA : NO_AKTAValue,
							PENANGGUNG_JAWAB : PENANGGUNG_JAWABValue,
							NAMA_DIREKSI : NAMA_DIREKSIValue,
							DEWAN_KOMISARIS : DEWAN_KOMISARISValue,
							TUJUAN_PRODUKSI : TUJUAN_PRODUKSIValue,
							LOKASI_PABRIK : LOKASI_PABRIKValue,
							LUAS_TANAH : LUAS_TANAHValue,
							ALAMAT_PABRIK : ALAMAT_PABRIKValue,
							OLAH1_P_TAHUN : OLAH1_P_TAHUNValue,
							OLAH1_P_BULAN : OLAH1_P_BULANValue,
							OLAH2_P_TAHUN : OLAH2_P_TAHUNValue,
							OLAH2_P_BULAN : OLAH2_P_BULANValue,
							OLAH3_P_TAHUN : OLAH3_P_TAHUNValue,
							OLAH3_P_BULAN : OLAH3_P_BULANValue,
							OLAH1_S_TAHUN : OLAH1_S_TAHUNValue,
							OLAH1_S_BULAN : OLAH1_S_BULANValue,
							OLAH2_S_TAHUN : OLAH2_S_TAHUNValue,
							OLAH2_S_BULAN : OLAH2_S_BULANValue,
							OLAH3_S_TAHUN : OLAH3_S_TAHUNValue,
							OLAH3_S_BULAN : OLAH3_S_BULANValue,
							MT_TANAH : MT_TANAHValue,
							MT_BANGUNAN : MT_BANGUNANValue,
							MT_MESIN : MT_MESINValue,
							MT_DLL : MT_DLLValue,
							MK_BAHAN_BAKU : MK_BAHAN_BAKUValue,
							MK_UPAH : MK_UPAHValue,
							MK_DLL : MK_DLLValue,
							SP_MODAL_SENDIRI : SP_MODAL_SENDIRIValue,
							SP_PINJAMAN : SP_PINJAMANValue,
							TKI_L_JUMLAH : TKI_L_JUMLAHValue,
							TKI_P_JUMLAH : TKI_P_JUMLAHValue,
							TKA_JUMLAH : TKA_JUMLAHValue,
							TKA_ASAL : TKA_ASALValue,
							TKA_JABATAN : TKA_JABATANValue,
							TKA_JANGKA_WAKTU : TKA_JANGKA_WAKTUValue,
							DN_JENIS_PRODUK1 : DN_JENIS_PRODUK1Value,
							DN_JENIS_PRODUK2 : DN_JENIS_PRODUK2Value,
							DN_JENIS_PRODUK3 : DN_JENIS_PRODUK3Value,
							E_JENIS_PRODUK1 : E_JENIS_PRODUK1Value,
							E_JENIS_PRODUK2 : E_JENIS_PRODUK2Value,
							E_JENIS_PRODUK3 : E_JENIS_PRODUK3Value,
							MERK_JENIS_PRODUK : MERK_JENIS_PRODUKValue,
							
							BBKB_DN_JUMLAH : BBKB_DN_JUMLAHValue,
							BBKB_DN_SATUAN : BBKB_DN_SATUANValue,
							BBKB_DN_ASAL : BBKB_DN_ASALValue,
							BBKB_DN_HARGA : BBKB_DN_HARGAValue,
							BBKB_DN_KETERANGAN : BBKB_DN_KETERANGANValue,
							BBKO_DN_JUMLAH : BBKO_DN_JUMLAHValue,
							BBKO_DN_SATUAN : BBKO_DN_SATUANValue,
							BBKO_DN_ASAL : BBKO_DN_ASALValue,
							BBKO_DN_HARGA : BBKO_DN_HARGAValue,
							BBKO_DN_KETERANGAN : BBKO_DN_KETERANGANValue,
							BP_DN_JUMLAH : BP_DN_JUMLAHValue,
							BP_DN_SATUAN : BP_DN_SATUANValue,
							BP_DN_ASAL : BP_DN_ASALValue,
							BP_DN_HARGA : BP_DN_HARGAValue,
							BP_DN_KETERANGAN : BP_DN_KETERANGANValue,
							
							BBKB_I_JUMLAH : BBKB_I_JUMLAHValue,
							BBKB_I_SATUAN : BBKB_I_SATUANValue,
							BBKB_I_ASAL : BBKB_I_ASALValue,
							BBKB_I_HARGA : BBKB_I_HARGAValue,
							BBKB_I_KETERANGAN : BBKB_I_KETERANGANValue,
							BBKO_I_JUMLAH : BBKO_I_JUMLAHValue,
							BBKO_I_SATUAN : BBKO_I_SATUANValue,
							BBKO_I_ASAL : BBKO_I_ASALValue,
							BBKO_I_HARGA : BBKO_I_HARGAValue,
							BBKO_I_KETERANGAN : BBKO_I_KETERANGANValue,
							BP_I_JUMLAH : BP_I_JUMLAHValue,
							BP_I_SATUAN : BP_I_SATUANValue,
							BP_I_ASAL : BP_I_ASALValue,
							BP_I_HARGA : BP_I_HARGAValue,
							BP_I_KETERANGAN : BP_I_KETERANGANValue,
							
							RBB_LUAS_GUDANG : RBB_LUAS_GUDANGValue,
							RBB_KAYU_OLAHAN : RBB_KAYU_OLAHANValue,
							RBB_PENOLONG : RBB_PENOLONGValue,
							RBB_HASIL_PRODUKSI : RBB_HASIL_PRODUKSIValue,
							RLPLY_LOKASI : RLPLY_LOKASIValue,
							RLPLY_LUAS : RLPLY_LUASValue,
							RLPLY_PERIZINAN : RLPLY_PERIZINANValue,
							RSD1_KAPASITAS : RSD1_KAPASITASValue,
							RSD1_JUMLAH : RSD1_JUMLAHValue,
							RSD211_KAPASITAS : RSD211_KAPASITASValue,
							RSD211_JUMLAH : RSD211_JUMLAHValue,
							RSD212_KAPASITAS : RSD212_KAPASITASValue,
							RSD212_JUMLAH : RSD212_JUMLAHValue,
							RSD213_KAPASITAS : RSD213_KAPASITASValue,
							RSD213_JUMLAH : RSD213_JUMLAHValue,
							RSD22_KAPASITAS : RSD22_KAPASITASValue,
							RSD22_JUMLAH : RSD22_JUMLAHValue,
							RSD23_KAPASITAS : RSD23_KAPASITASValue,
							RSD23_JUMLAH : RSD23_JUMLAHValue,
							RPL1_VOLUME : RPL1_VOLUMEValue,
							RPL1_SATUAN : RPL1_SATUANValue,
							RPL1_PENANGANAN : RPL1_PENANGANANValue,
							RPL2_VOLUME : RPL2_VOLUMEValue,
							RPL2_SATUAN : RPL2_SATUANValue,
							RPL2_PENANGANAN : RPL2_PENANGANANValue,
							RPL3_VOLUME : RPL3_VOLUMEValue,
							RPL3_SATUAN : RPL3_SATUANValue,
							RPL3_PENANGANAN : RPL3_PENANGANANValue,
							RPL4_VOLUME : RPL4_VOLUMEValue,
							RPL4_SATUAN : RPL4_SATUANValue,
							RPL4_PENANGANAN : RPL4_PENANGANANValue,
							PENYETUJU : PENYETUJUValue,
							NOMOR_SURAT : NOMOR_SURATValue,
							TGL_TERLAMPIR : TGL_TERLAMPIRValue,
							TGL_PERMOHONAN : TGL_PERMOHONANValue,
							STATUS_SURVEY : STATUS_SURVEYValue,
							STATUS : STATUSValue,
							TGL_BERLAKU : TGL_BERLAKUValue,
							TGL_BERAKHIR : TGL_BERAKHIRValue,
							RETRIBUSI : RETRIBUSIValue,
							KETERANGAN_SYARAT : encoded_array_iuiphhk_keterangan,
							pemohon_nama : pemohon_namaValue,
							pemohon_telp : pemohon_telpValue,
							pemohon_alamat : pemohon_alamatValue,
							pemohon_id : pemohon_idValue,
							pemohon_nik : pemohon_nikValue,
							action : iphhk_dbTask
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
									iphhk_dataStore.reload();
									iphhk_resetForm();
									iphhk_switchToGrid();
									iphhk_gridPanel.getSelectionModel().deselectAll();
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
		
		function iphhk_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(iphhk_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = iphhk_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< iphhk_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.ID_IUIPHHK);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_iuiphhk/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									iphhk_dataStore.reload();
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
		
		function iphhk_refresh(){
			iphhk_dbListAction = "GETLIST";
			iphhk_gridSearchField.reset();
			iphhk_searchPanel.getForm().reset();
			iphhk_dataStore.proxy.extraParams = { action : 'GETLIST' };
			iphhk_dataStore.proxy.extraParams.query = "";
			iphhk_dataStore.currentPage = 1;
			iphhk_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function iphhk_confirmFormValid(){
			return iphhk_formPanel.getForm().isValid();
		}
		
		function iphhk_resetForm(){
			iphhk_dbTask = 'CREATE';
			iphhk_dbTaskMessage = 'create';
			iphhk_formPanel.getForm().reset();
			ID_IUIPHHKField.setValue(0);
		}
		
		function iphhk_setForm(){
			iphhk_dbTask = 'UPDATE';
            iphhk_dbTaskMessage = 'update';
			
			var record = iphhk_gridPanel.getSelectionModel().getSelection()[0];
			pemohon_idField.setValue(record.data.pemohon_id);
			pemohon_nikField.setValue(record.data.pemohon_nik);
			pemohon_namaField.setValue(record.data.pemohon_nama);
			pemohon_telpField.setValue(record.data.pemohon_telp);
			pemohon_alamatField.setValue(record.data.pemohon_alamat);
			ID_IUIPHHKField.setValue(record.data.ID_IUIPHHK);
			ID_PEMOHONField.setValue(record.data.ID_PEMOHON);
			NO_SKField.setValue(record.data.NO_SK);
			NO_SK_LAMAField.setValue(record.data.NO_SK_LAMA);
			JENIS_PERMOHONANField.setValue(record.data.JENIS_PERMOHONAN);
			NAMA_PERUSAHAANField.setValue(record.data.NAMA_PERUSAHAAN);
			NPWPField.setValue(record.data.NPWP);
			ALAMATField.setValue(record.data.ALAMAT);
			STATUS_MODALField.setValue(record.data.STATUS_MODAL);
			NAMA_NOTARISField.setValue(record.data.NAMA_NOTARIS);
			NO_AKTAField.setValue(record.data.NO_AKTA);
			PENANGGUNG_JAWABField.setValue(record.data.PENANGGUNG_JAWAB);
			NAMA_DIREKSIField.setValue(record.data.NAMA_DIREKSI);
			DEWAN_KOMISARISField.setValue(record.data.DEWAN_KOMISARIS);
			TUJUAN_PRODUKSIField.setValue(record.data.TUJUAN_PRODUKSI);
			LOKASI_PABRIKField.setValue(record.data.LOKASI_PABRIK);
			LUAS_TANAHField.setValue(record.data.LUAS_TANAH);
			ALAMAT_PABRIKField.setValue(record.data.ALAMAT_PABRIK);
			OLAH1_P_TAHUNField.setValue(record.data.OLAH1_P_TAHUN);
			OLAH1_P_BULANField.setValue(record.data.OLAH1_P_BULAN);
			OLAH2_P_TAHUNField.setValue(record.data.OLAH2_P_TAHUN);
			OLAH2_P_BULANField.setValue(record.data.OLAH2_P_BULAN);
			OLAH3_P_TAHUNField.setValue(record.data.OLAH3_P_TAHUN);
			OLAH3_P_BULANField.setValue(record.data.OLAH3_P_BULAN);
			OLAH1_S_TAHUNField.setValue(record.data.OLAH1_S_TAHUN);
			OLAH1_S_BULANField.setValue(record.data.OLAH1_S_BULAN);
			OLAH2_S_TAHUNField.setValue(record.data.OLAH2_S_TAHUN);
			OLAH2_S_BULANField.setValue(record.data.OLAH2_S_BULAN);
			OLAH3_S_TAHUNField.setValue(record.data.OLAH3_S_TAHUN);
			OLAH3_S_BULANField.setValue(record.data.OLAH3_S_BULAN);
			MT_TANAHField.setValue(record.data.MT_TANAH);
			MT_BANGUNANField.setValue(record.data.MT_BANGUNAN);
			MT_MESINField.setValue(record.data.MT_MESIN);
			MT_DLLField.setValue(record.data.MT_DLL);
			MK_BAHAN_BAKUField.setValue(record.data.MK_BAHAN_BAKU);
			MK_UPAHField.setValue(record.data.MK_UPAH);
			MK_DLLField.setValue(record.data.MK_DLL);
			SP_MODAL_SENDIRIField.setValue(record.data.SP_MODAL_SENDIRI);
			SP_PINJAMANField.setValue(record.data.SP_PINJAMAN);
			TKI_L_JUMLAHField.setValue(record.data.TKI_L_JUMLAH);
			TKI_P_JUMLAHField.setValue(record.data.TKI_P_JUMLAH);
			TKA_JUMLAHField.setValue(record.data.TKA_JUMLAH);
			TKA_ASALField.setValue(record.data.TKA_ASAL);
			TKA_JABATANField.setValue(record.data.TKA_JABATAN);
			TKA_JANGKA_WAKTUField.setValue(record.data.TKA_JANGKA_WAKTU);
			DN_JENIS_PRODUK1Field.setValue(record.data.DN_JENIS_PRODUK1);
			DN_JENIS_PRODUK2Field.setValue(record.data.DN_JENIS_PRODUK2);
			DN_JENIS_PRODUK3Field.setValue(record.data.DN_JENIS_PRODUK3);
			E_JENIS_PRODUK1Field.setValue(record.data.E_JENIS_PRODUK1);
			E_JENIS_PRODUK2Field.setValue(record.data.E_JENIS_PRODUK2);
			E_JENIS_PRODUK3Field.setValue(record.data.E_JENIS_PRODUK3);
			MERK_JENIS_PRODUKField.setValue(record.data.MERK_JENIS_PRODUK);
			
			BBKB_DN_JUMLAHField.setValue(record.data.BBKB_DN_JUMLAH);
			BBKB_DN_SATUANField.setValue(record.data.BBKB_DN_SATUAN);
			BBKB_DN_ASALField.setValue(record.data.BBKB_DN_ASAL);
			BBKB_DN_HARGAField.setValue(record.data.BBKB_DN_HARGA);
			BBKB_DN_KETERANGANField.setValue(record.data.BBKB_DN_KETERANGAN);
			BBKO_DN_JUMLAHField.setValue(record.data.BBKO_DN_JUMLAH);
			BBKO_DN_SATUANField.setValue(record.data.BBKO_DN_SATUAN);
			BBKO_DN_ASALField.setValue(record.data.BBKO_DN_ASAL);
			BBKO_DN_HARGAField.setValue(record.data.BBKO_DN_HARGA);
			BBKO_DN_KETERANGANField.setValue(record.data.BBKO_DN_KETERANGAN);
			BP_DN_JUMLAHField.setValue(record.data.BP_DN_JUMLAH);
			BP_DN_SATUANField.setValue(record.data.BP_DN_SATUAN);
			BP_DN_ASALField.setValue(record.data.BP_DN_ASAL);
			BP_DN_HARGAField.setValue(record.data.BP_DN_HARGA);
			BP_DN_KETERANGANField.setValue(record.data.BP_DN_KETERANGAN);
			
			pemohon_idField.setValue(record.data.pemohon_id);
			pemohon_nikField.setValue(record.data.pemohon_nik);
			pemohon_namaField.setValue(record.data.pemohon_nama);
			pemohon_telpField.setValue(record.data.pemohon_telp);
			pemohon_alamatField.setValue(record.data.pemohon_alamat);
			
			BBKB_I_JUMLAHField.setValue(record.data.BBKB_I_JUMLAH);
			BBKB_I_SATUANField.setValue(record.data.BBKB_I_SATUAN);
			BBKB_I_ASALField.setValue(record.data.BBKB_I_ASAL);
			BBKB_I_HARGAField.setValue(record.data.BBKB_I_HARGA);
			BBKB_I_KETERANGANField.setValue(record.data.BBKB_I_KETERANGAN);
			BBKO_I_JUMLAHField.setValue(record.data.BBKO_I_JUMLAH);
			BBKO_I_SATUANField.setValue(record.data.BBKO_I_SATUAN);
			BBKO_I_ASALField.setValue(record.data.BBKO_I_ASAL);
			BBKO_I_HARGAField.setValue(record.data.BBKO_I_HARGA);
			BBKO_I_KETERANGANField.setValue(record.data.BBKO_I_KETERANGAN);
			BP_I_JUMLAHField.setValue(record.data.BP_I_JUMLAH);
			BP_I_SATUANField.setValue(record.data.BP_I_SATUAN);
			BP_I_ASALField.setValue(record.data.BP_I_ASAL);
			BP_I_HARGAField.setValue(record.data.BP_I_HARGA);
			BP_I_KETERANGANField.setValue(record.data.BP_I_KETERANGAN);
			
			RBB_LUAS_GUDANGField.setValue(record.data.RBB_LUAS_GUDANG);
			RBB_KAYU_OLAHANField.setValue(record.data.RBB_KAYU_OLAHAN);
			RBB_PENOLONGField.setValue(record.data.RBB_PENOLONG);
			RBB_HASIL_PRODUKSIField.setValue(record.data.RBB_HASIL_PRODUKSI);
			RLPLY_LOKASIField.setValue(record.data.RLPLY_LOKASI);
			RLPLY_LUASField.setValue(record.data.RLPLY_LUAS);
			RLPLY_PERIZINANField.setValue(record.data.RLPLY_PERIZINAN);
			RSD1_KAPASITASField.setValue(record.data.RSD1_KAPASITAS);
			RSD1_JUMLAHField.setValue(record.data.RSD1_JUMLAH);
			RSD211_KAPASITASField.setValue(record.data.RSD211_KAPASITAS);
			RSD211_JUMLAHField.setValue(record.data.RSD211_JUMLAH);
			RSD212_KAPASITASField.setValue(record.data.RSD212_KAPASITAS);
			RSD212_JUMLAHField.setValue(record.data.RSD212_JUMLAH);
			RSD213_KAPASITASField.setValue(record.data.RSD213_KAPASITAS);
			RSD213_JUMLAHField.setValue(record.data.RSD213_JUMLAH);
			RSD22_KAPASITASField.setValue(record.data.RSD22_KAPASITAS);
			RSD22_JUMLAHField.setValue(record.data.RSD22_JUMLAH);
			RSD23_KAPASITASField.setValue(record.data.RSD23_KAPASITAS);
			RSD23_JUMLAHField.setValue(record.data.RSD23_JUMLAH);
			RPL1_VOLUMEField.setValue(record.data.RPL1_VOLUME);
			RPL1_SATUANField.setValue(record.data.RPL1_SATUAN);
			RPL1_PENANGANANField.setValue(record.data.RPL1_PENANGANAN);
			RPL2_VOLUMEField.setValue(record.data.RPL2_VOLUME);
			RPL2_SATUANField.setValue(record.data.RPL2_SATUAN);
			RPL2_PENANGANANField.setValue(record.data.RPL2_PENANGANAN);
			RPL3_VOLUMEField.setValue(record.data.RPL3_VOLUME);
			RPL3_SATUANField.setValue(record.data.RPL3_SATUAN);
			RPL3_PENANGANANField.setValue(record.data.RPL3_PENANGANAN);
			RPL4_VOLUMEField.setValue(record.data.RPL4_VOLUME);
			RPL4_SATUANField.setValue(record.data.RPL4_SATUAN);
			RPL4_PENANGANANField.setValue(record.data.RPL4_PENANGANAN);
			PENYETUJUField.setValue(record.data.PENYETUJU);
			NOMOR_SURATField.setValue(record.data.NOMOR_SURAT);
			TGL_TERLAMPIRField.setValue(record.data.TGL_TERLAMPIR);
			TGL_PERMOHONANField.setValue(record.data.TGL_PERMOHONAN);
			STATUS_SURVEYField.setValue(record.data.STATUS_SURVEY);
			STATUSField.setValue(record.data.STATUS);
			TGL_BERLAKUField.setValue(record.data.TGL_BERLAKU);
			TGL_BERAKHIRField.setValue(record.data.TGL_BERAKHIR);
			RETRIBUSIField.setValue(record.data.RETRIBUSI);
			if(record.data.RETRIBUSI != 0){
				RETRIBUSI_STATUSField.setValue({ s_retribusi : ['1'] });
			}else{
				RETRIBUSI_STATUSField.setValue({ s_retribusi : ['0'] });
			}
			det_iuiphhk_rencana_alat_dataStore.proxy.extraParams = { 
				iuiphhk_id : record.data.ID_IUIPHHK,
				currentAction : 'update',
				action : 'GETR_ALAT',
				jenis : '1'
			};
			det_iuiphhk_rencana_alat_e_dataStore.proxy.extraParams = { 
				iuiphhk_id : record.data.ID_IUIPHHK,
				currentAction : 'update',
				action : 'GETR_ALAT',
				jenis : '2'
			};
			det_iuiphhk_rencana_alat_e_dataStore.proxy.extraParams = { 
				iuiphhk_id : record.data.ID_IUIPHHK,
				currentAction : 'update',
				action : 'GETR_PRODUKSI',
				// jenis : '2'
			};
			iuiphhk_syaratDataStore.proxy.extraParams = { 
				iuiphhk_id : record.data.ID_IUIPHHK,
				currentAction : 'update',
				action : 'GETSYARAT'
			};
			iuiphhk_syaratDataStore.load();
			det_iuiphhk_rencana_alat_dataStore.load();
			det_iuiphhk_rencana_alat_e_dataStore.load();
			det_iuiphhk_rencana_produksi_dataStore.load();
		}
		
		function iphhk_showSearchWindow(){
			iphhk_searchWindow.show();
		}
		function iphhk_search(){
			iphhk_gridSearchField.reset();
			
			var ID_PEMOHONValue = '';
			var NO_SKValue = '';
			var NO_SK_LAMAValue = '';
			var JENIS_PERMOHONANValue = '';
			var NAMA_PERUSAHAANValue = '';
			var NPWPValue = '';
			var ALAMATValue = '';
			var STATUS_MODALValue = '';
			var NAMA_NOTARISValue = '';
			var NO_AKTAValue = '';
			var PENANGGUNG_JAWABValue = '';
			var NAMA_DIREKSIValue = '';
			var DEWAN_KOMISARISValue = '';
			var TUJUAN_PRODUKSIValue = '';
			var LOKASI_PABRIKValue = '';
			var LUAS_TANAHValue = '';
			var ALAMAT_PABRIKValue = '';
			var OLAH1_P_TAHUNValue = '';
			var OLAH1_P_BULANValue = '';
			var OLAH2_P_TAHUNValue = '';
			var OLAH2_P_BULANValue = '';
			var OLAH3_P_TAHUNValue = '';
			var OLAH3_P_BULANValue = '';
			var OLAH1_S_TAHUNValue = '';
			var OLAH1_S_BULANValue = '';
			var OLAH2_S_TAHUNValue = '';
			var OLAH2_S_BULANValue = '';
			var OLAH3_S_TAHUNValue = '';
			var OLAH3_S_BULANValue = '';
			var MT_TANAHValue = '';
			var MT_BANGUNANValue = '';
			var MT_MESINValue = '';
			var MT_DLLValue = '';
			var MK_BAHAN_BAKUValue = '';
			var MK_UPAHValue = '';
			var MK_DLLValue = '';
			var SP_MODAL_SENDIRIValue = '';
			var SP_PINJAMANValue = '';
			var TKI_L_JUMLAHValue = '';
			var TKI_P_JUMLAHValue = '';
			var TKA_JUMLAHValue = '';
			var TKA_ASALValue = '';
			var TKA_JABATANValue = '';
			var TKA_JANGKA_WAKTUValue = '';
			var DN_JENIS_PRODUK1Value = '';
			var DN_JENIS_PRODUK2Value = '';
			var DN_JENIS_PRODUK3Value = '';
			var E_JENIS_PRODUK1Value = '';
			var E_JENIS_PRODUK2Value = '';
			var E_JENIS_PRODUK3Value = '';
			var MERK_JENIS_PRODUKValue = '';
			var BBKB_DN_JUMLAHValue = '';
			var BBKB_DN_SATUANValue = '';
			var BBKB_DN_ASALValue = '';
			var BBKB_DN_HARGAValue = '';
			var BBKB_DN_KETERANGANValue = '';
			var BBKO_DN_JUMLAHValue = '';
			var BBKO_DN_SATUANValue = '';
			var BBKO_DN_ASALValue = '';
			var BBKO_DN_HARGAValue = '';
			var BBKO_DN_KETERANGANValue = '';
			var BP_DN_JUMLAHValue = '';
			var BP_DN_SATUANValue = '';
			var BP_DN_ASALValue = '';
			var BP_DN_HARGAValue = '';
			var BP_DN_KETERANGANValue = '';
			var RBB_LUAS_GUDANGValue = '';
			var RBB_KAYU_OLAHANValue = '';
			var RBB_PENOLONGValue = '';
			var RBB_HASIL_PRODUKSIValue = '';
			var RLPLY_LOKASIValue = '';
			var RLPLY_LUASValue = '';
			var RLPLY_PERIZINANValue = '';
			var RSD1_KAPASITASValue = '';
			var RSD1_JUMLAHValue = '';
			var RSD211_KAPASITASValue = '';
			var RSD211_JUMLAHValue = '';
			var RSD212_KAPASITASValue = '';
			var RSD212_JUMLAHValue = '';
			var RSD213_KAPASITASValue = '';
			var RSD213_JUMLAHValue = '';
			var RSD22_KAPASITASValue = '';
			var RSD22_JUMLAHValue = '';
			var RSD23_KAPASITASValue = '';
			var RSD23_JUMLAHValue = '';
			var RPL1_VOLUMEValue = '';
			var RPL1_SATUANValue = '';
			var RPL1_PENANGANANValue = '';
			var RPL2_VOLUMEValue = '';
			var RPL2_SATUANValue = '';
			var RPL2_PENANGANANValue = '';
			var RPL3_VOLUMEValue = '';
			var RPL3_SATUANValue = '';
			var RPL3_PENANGANANValue = '';
			var RPL4_VOLUMEValue = '';
			var RPL4_SATUANValue = '';
			var RPL4_PENANGANANValue = '';
			var PENYETUJUValue = '';
			var NOMOR_SURATValue = '';
			var TGL_TERLAMPIRValue = '';
			var TGL_PERMOHONANValue = '';
			var STATUS_SURVEYValue = '';
			var STATUSValue = '';
			var TGL_BERLAKUValue = '';
			var TGL_BERAKHIRValue = '';
						
			ID_PEMOHONValue = ID_PEMOHONSearchField.getValue();
			NO_SKValue = NO_SKSearchField.getValue();
			NO_SK_LAMAValue = NO_SK_LAMASearchField.getValue();
			JENIS_PERMOHONANValue = JENIS_PERMOHONANSearchField.getValue();
			NAMA_PERUSAHAANValue = NAMA_PERUSAHAANSearchField.getValue();
			NPWPValue = NPWPSearchField.getValue();
			ALAMATValue = ALAMATSearchField.getValue();
			STATUS_MODALValue = STATUS_MODALSearchField.getValue();
			NAMA_NOTARISValue = NAMA_NOTARISSearchField.getValue();
			NO_AKTAValue = NO_AKTASearchField.getValue();
			PENANGGUNG_JAWABValue = PENANGGUNG_JAWABSearchField.getValue();
			NAMA_DIREKSIValue = NAMA_DIREKSISearchField.getValue();
			DEWAN_KOMISARISValue = DEWAN_KOMISARISSearchField.getValue();
			TUJUAN_PRODUKSIValue = TUJUAN_PRODUKSISearchField.getValue();
			LOKASI_PABRIKValue = LOKASI_PABRIKSearchField.getValue();
			LUAS_TANAHValue = LUAS_TANAHSearchField.getValue();
			ALAMAT_PABRIKValue = ALAMAT_PABRIKSearchField.getValue();
			OLAH1_P_TAHUNValue = OLAH1_P_TAHUNSearchField.getValue();
			OLAH1_P_BULANValue = OLAH1_P_BULANSearchField.getValue();
			OLAH2_P_TAHUNValue = OLAH2_P_TAHUNSearchField.getValue();
			OLAH2_P_BULANValue = OLAH2_P_BULANSearchField.getValue();
			OLAH3_P_TAHUNValue = OLAH3_P_TAHUNSearchField.getValue();
			OLAH3_P_BULANValue = OLAH3_P_BULANSearchField.getValue();
			OLAH1_S_TAHUNValue = OLAH1_S_TAHUNSearchField.getValue();
			OLAH1_S_BULANValue = OLAH1_S_BULANSearchField.getValue();
			OLAH2_S_TAHUNValue = OLAH2_S_TAHUNSearchField.getValue();
			OLAH2_S_BULANValue = OLAH2_S_BULANSearchField.getValue();
			OLAH3_S_TAHUNValue = OLAH3_S_TAHUNSearchField.getValue();
			OLAH3_S_BULANValue = OLAH3_S_BULANSearchField.getValue();
			MT_TANAHValue = MT_TANAHSearchField.getValue();
			MT_BANGUNANValue = MT_BANGUNANSearchField.getValue();
			MT_MESINValue = MT_MESINSearchField.getValue();
			MT_DLLValue = MT_DLLSearchField.getValue();
			MK_BAHAN_BAKUValue = MK_BAHAN_BAKUSearchField.getValue();
			MK_UPAHValue = MK_UPAHSearchField.getValue();
			MK_DLLValue = MK_DLLSearchField.getValue();
			SP_MODAL_SENDIRIValue = SP_MODAL_SENDIRISearchField.getValue();
			SP_PINJAMANValue = SP_PINJAMANSearchField.getValue();
			TKI_L_JUMLAHValue = TKI_L_JUMLAHSearchField.getValue();
			TKI_P_JUMLAHValue = TKI_P_JUMLAHSearchField.getValue();
			TKA_JUMLAHValue = TKA_JUMLAHSearchField.getValue();
			TKA_ASALValue = TKA_ASALSearchField.getValue();
			TKA_JABATANValue = TKA_JABATANSearchField.getValue();
			TKA_JANGKA_WAKTUValue = TKA_JANGKA_WAKTUSearchField.getValue();
			DN_JENIS_PRODUK1Value = DN_JENIS_PRODUK1SearchField.getValue();
			DN_JENIS_PRODUK2Value = DN_JENIS_PRODUK2SearchField.getValue();
			DN_JENIS_PRODUK3Value = DN_JENIS_PRODUK3SearchField.getValue();
			E_JENIS_PRODUK1Value = E_JENIS_PRODUK1SearchField.getValue();
			E_JENIS_PRODUK2Value = E_JENIS_PRODUK2SearchField.getValue();
			E_JENIS_PRODUK3Value = E_JENIS_PRODUK3SearchField.getValue();
			MERK_JENIS_PRODUKValue = MERK_JENIS_PRODUKSearchField.getValue();
			BBKB_DN_JUMLAHValue = BBKB_DN_JUMLAHSearchField.getValue();
			BBKB_DN_SATUANValue = BBKB_DN_SATUANSearchField.getValue();
			BBKB_DN_ASALValue = BBKB_DN_ASALSearchField.getValue();
			BBKB_DN_HARGAValue = BBKB_DN_HARGASearchField.getValue();
			BBKB_DN_KETERANGANValue = BBKB_DN_KETERANGANSearchField.getValue();
			BBKO_DN_JUMLAHValue = BBKO_DN_JUMLAHSearchField.getValue();
			BBKO_DN_SATUANValue = BBKO_DN_SATUANSearchField.getValue();
			BBKO_DN_ASALValue = BBKO_DN_ASALSearchField.getValue();
			BBKO_DN_HARGAValue = BBKO_DN_HARGASearchField.getValue();
			BBKO_DN_KETERANGANValue = BBKO_DN_KETERANGANSearchField.getValue();
			BP_DN_JUMLAHValue = BP_DN_JUMLAHSearchField.getValue();
			BP_DN_SATUANValue = BP_DN_SATUANSearchField.getValue();
			BP_DN_ASALValue = BP_DN_ASALSearchField.getValue();
			BP_DN_HARGAValue = BP_DN_HARGASearchField.getValue();
			BP_DN_KETERANGANValue = BP_DN_KETERANGANSearchField.getValue();
			RBB_LUAS_GUDANGValue = RBB_LUAS_GUDANGSearchField.getValue();
			RBB_KAYU_OLAHANValue = RBB_KAYU_OLAHANSearchField.getValue();
			RBB_PENOLONGValue = RBB_PENOLONGSearchField.getValue();
			RBB_HASIL_PRODUKSIValue = RBB_HASIL_PRODUKSISearchField.getValue();
			RLPLY_LOKASIValue = RLPLY_LOKASISearchField.getValue();
			RLPLY_LUASValue = RLPLY_LUASSearchField.getValue();
			RLPLY_PERIZINANValue = RLPLY_PERIZINANSearchField.getValue();
			RSD1_KAPASITASValue = RSD1_KAPASITASSearchField.getValue();
			RSD1_JUMLAHValue = RSD1_JUMLAHSearchField.getValue();
			RSD211_KAPASITASValue = RSD211_KAPASITASSearchField.getValue();
			RSD211_JUMLAHValue = RSD211_JUMLAHSearchField.getValue();
			RSD212_KAPASITASValue = RSD212_KAPASITASSearchField.getValue();
			RSD212_JUMLAHValue = RSD212_JUMLAHSearchField.getValue();
			RSD213_KAPASITASValue = RSD213_KAPASITASSearchField.getValue();
			RSD213_JUMLAHValue = RSD213_JUMLAHSearchField.getValue();
			RSD22_KAPASITASValue = RSD22_KAPASITASSearchField.getValue();
			RSD22_JUMLAHValue = RSD22_JUMLAHSearchField.getValue();
			RSD23_KAPASITASValue = RSD23_KAPASITASSearchField.getValue();
			RSD23_JUMLAHValue = RSD23_JUMLAHSearchField.getValue();
			RPL1_VOLUMEValue = RPL1_VOLUMESearchField.getValue();
			RPL1_SATUANValue = RPL1_SATUANSearchField.getValue();
			RPL1_PENANGANANValue = RPL1_PENANGANANSearchField.getValue();
			RPL2_VOLUMEValue = RPL2_VOLUMESearchField.getValue();
			RPL2_SATUANValue = RPL2_SATUANSearchField.getValue();
			RPL2_PENANGANANValue = RPL2_PENANGANANSearchField.getValue();
			RPL3_VOLUMEValue = RPL3_VOLUMESearchField.getValue();
			RPL3_SATUANValue = RPL3_SATUANSearchField.getValue();
			RPL3_PENANGANANValue = RPL3_PENANGANANSearchField.getValue();
			RPL4_VOLUMEValue = RPL4_VOLUMESearchField.getValue();
			RPL4_SATUANValue = RPL4_SATUANSearchField.getValue();
			RPL4_PENANGANANValue = RPL4_PENANGANANSearchField.getValue();
			PENYETUJUValue = PENYETUJUSearchField.getValue();
			NOMOR_SURATValue = NOMOR_SURATSearchField.getValue();
			TGL_TERLAMPIRValue = TGL_TERLAMPIRSearchField.getValue();
			TGL_PERMOHONANValue = TGL_PERMOHONANSearchField.getValue();
			STATUS_SURVEYValue = STATUS_SURVEYSearchField.getValue();
			STATUSValue = STATUSSearchField.getValue();
			TGL_BERLAKUValue = TGL_BERLAKUSearchField.getValue();
			TGL_BERAKHIRValue = TGL_BERAKHIRSearchField.getValue();
			iphhk_dbListAction = "SEARCH";
			iphhk_dataStore.proxy.extraParams = { 
				ID_PEMOHON : ID_PEMOHONValue,
				NO_SK : NO_SKValue,
				NO_SK_LAMA : NO_SK_LAMAValue,
				JENIS_PERMOHONAN : JENIS_PERMOHONANValue,
				NAMA_PERUSAHAAN : NAMA_PERUSAHAANValue,
				NPWP : NPWPValue,
				ALAMAT : ALAMATValue,
				STATUS_MODAL : STATUS_MODALValue,
				NAMA_NOTARIS : NAMA_NOTARISValue,
				NO_AKTA : NO_AKTAValue,
				PENANGGUNG_JAWAB : PENANGGUNG_JAWABValue,
				NAMA_DIREKSI : NAMA_DIREKSIValue,
				DEWAN_KOMISARIS : DEWAN_KOMISARISValue,
				TUJUAN_PRODUKSI : TUJUAN_PRODUKSIValue,
				LOKASI_PABRIK : LOKASI_PABRIKValue,
				LUAS_TANAH : LUAS_TANAHValue,
				ALAMAT_PABRIK : ALAMAT_PABRIKValue,
				OLAH1_P_TAHUN : OLAH1_P_TAHUNValue,
				OLAH1_P_BULAN : OLAH1_P_BULANValue,
				OLAH2_P_TAHUN : OLAH2_P_TAHUNValue,
				OLAH2_P_BULAN : OLAH2_P_BULANValue,
				OLAH3_P_TAHUN : OLAH3_P_TAHUNValue,
				OLAH3_P_BULAN : OLAH3_P_BULANValue,
				OLAH1_S_TAHUN : OLAH1_S_TAHUNValue,
				OLAH1_S_BULAN : OLAH1_S_BULANValue,
				OLAH2_S_TAHUN : OLAH2_S_TAHUNValue,
				OLAH2_S_BULAN : OLAH2_S_BULANValue,
				OLAH3_S_TAHUN : OLAH3_S_TAHUNValue,
				OLAH3_S_BULAN : OLAH3_S_BULANValue,
				MT_TANAH : MT_TANAHValue,
				MT_BANGUNAN : MT_BANGUNANValue,
				MT_MESIN : MT_MESINValue,
				MT_DLL : MT_DLLValue,
				MK_BAHAN_BAKU : MK_BAHAN_BAKUValue,
				MK_UPAH : MK_UPAHValue,
				MK_DLL : MK_DLLValue,
				SP_MODAL_SENDIRI : SP_MODAL_SENDIRIValue,
				SP_PINJAMAN : SP_PINJAMANValue,
				TKI_L_JUMLAH : TKI_L_JUMLAHValue,
				TKI_P_JUMLAH : TKI_P_JUMLAHValue,
				TKA_JUMLAH : TKA_JUMLAHValue,
				TKA_ASAL : TKA_ASALValue,
				TKA_JABATAN : TKA_JABATANValue,
				TKA_JANGKA_WAKTU : TKA_JANGKA_WAKTUValue,
				DN_JENIS_PRODUK1 : DN_JENIS_PRODUK1Value,
				DN_JENIS_PRODUK2 : DN_JENIS_PRODUK2Value,
				DN_JENIS_PRODUK3 : DN_JENIS_PRODUK3Value,
				E_JENIS_PRODUK1 : E_JENIS_PRODUK1Value,
				E_JENIS_PRODUK2 : E_JENIS_PRODUK2Value,
				E_JENIS_PRODUK3 : E_JENIS_PRODUK3Value,
				MERK_JENIS_PRODUK : MERK_JENIS_PRODUKValue,
				BBKB_DN_JUMLAH : BBKB_DN_JUMLAHValue,
				BBKB_DN_SATUAN : BBKB_DN_SATUANValue,
				BBKB_DN_ASAL : BBKB_DN_ASALValue,
				BBKB_DN_HARGA : BBKB_DN_HARGAValue,
				BBKB_DN_KETERANGAN : BBKB_DN_KETERANGANValue,
				BBKO_DN_JUMLAH : BBKO_DN_JUMLAHValue,
				BBKO_DN_SATUAN : BBKO_DN_SATUANValue,
				BBKO_DN_ASAL : BBKO_DN_ASALValue,
				BBKO_DN_HARGA : BBKO_DN_HARGAValue,
				BBKO_DN_KETERANGAN : BBKO_DN_KETERANGANValue,
				BP_DN_JUMLAH : BP_DN_JUMLAHValue,
				BP_DN_SATUAN : BP_DN_SATUANValue,
				BP_DN_ASAL : BP_DN_ASALValue,
				BP_DN_HARGA : BP_DN_HARGAValue,
				BP_DN_KETERANGAN : BP_DN_KETERANGANValue,
				RBB_LUAS_GUDANG : RBB_LUAS_GUDANGValue,
				RBB_KAYU_OLAHAN : RBB_KAYU_OLAHANValue,
				RBB_PENOLONG : RBB_PENOLONGValue,
				RBB_HASIL_PRODUKSI : RBB_HASIL_PRODUKSIValue,
				RLPLY_LOKASI : RLPLY_LOKASIValue,
				RLPLY_LUAS : RLPLY_LUASValue,
				RLPLY_PERIZINAN : RLPLY_PERIZINANValue,
				RSD1_KAPASITAS : RSD1_KAPASITASValue,
				RSD1_JUMLAH : RSD1_JUMLAHValue,
				RSD211_KAPASITAS : RSD211_KAPASITASValue,
				RSD211_JUMLAH : RSD211_JUMLAHValue,
				RSD212_KAPASITAS : RSD212_KAPASITASValue,
				RSD212_JUMLAH : RSD212_JUMLAHValue,
				RSD213_KAPASITAS : RSD213_KAPASITASValue,
				RSD213_JUMLAH : RSD213_JUMLAHValue,
				RSD22_KAPASITAS : RSD22_KAPASITASValue,
				RSD22_JUMLAH : RSD22_JUMLAHValue,
				RSD23_KAPASITAS : RSD23_KAPASITASValue,
				RSD23_JUMLAH : RSD23_JUMLAHValue,
				RPL1_VOLUME : RPL1_VOLUMEValue,
				RPL1_SATUAN : RPL1_SATUANValue,
				RPL1_PENANGANAN : RPL1_PENANGANANValue,
				RPL2_VOLUME : RPL2_VOLUMEValue,
				RPL2_SATUAN : RPL2_SATUANValue,
				RPL2_PENANGANAN : RPL2_PENANGANANValue,
				RPL3_VOLUME : RPL3_VOLUMEValue,
				RPL3_SATUAN : RPL3_SATUANValue,
				RPL3_PENANGANAN : RPL3_PENANGANANValue,
				RPL4_VOLUME : RPL4_VOLUMEValue,
				RPL4_SATUAN : RPL4_SATUANValue,
				RPL4_PENANGANAN : RPL4_PENANGANANValue,
				PENYETUJU : PENYETUJUValue,
				NOMOR_SURAT : NOMOR_SURATValue,
				TGL_TERLAMPIR : TGL_TERLAMPIRValue,
				TGL_PERMOHONAN : TGL_PERMOHONANValue,
				STATUS_SURVEY : STATUS_SURVEYValue,
				STATUS : STATUSValue,
				TGL_BERLAKU : TGL_BERLAKUValue,
				TGL_BERAKHIR : TGL_BERAKHIRValue,
				action : 'SEARCH'
			};
			iphhk_dataStore.currentPage = 1;
			iphhk_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function iphhk_printExcel(outputType){
			var searchText = "";
			var ID_PEMOHONValue = '';
			var NO_SKValue = '';
			var NO_SK_LAMAValue = '';
			var JENIS_PERMOHONANValue = '';
			var NAMA_PERUSAHAANValue = '';
			var NPWPValue = '';
			var ALAMATValue = '';
			var STATUS_MODALValue = '';
			var NAMA_NOTARISValue = '';
			var NO_AKTAValue = '';
			var PENANGGUNG_JAWABValue = '';
			var NAMA_DIREKSIValue = '';
			var DEWAN_KOMISARISValue = '';
			var TUJUAN_PRODUKSIValue = '';
			var LOKASI_PABRIKValue = '';
			var LUAS_TANAHValue = '';
			var ALAMAT_PABRIKValue = '';
			var OLAH1_P_TAHUNValue = '';
			var OLAH1_P_BULANValue = '';
			var OLAH2_P_TAHUNValue = '';
			var OLAH2_P_BULANValue = '';
			var OLAH3_P_TAHUNValue = '';
			var OLAH3_P_BULANValue = '';
			var OLAH1_S_TAHUNValue = '';
			var OLAH1_S_BULANValue = '';
			var OLAH2_S_TAHUNValue = '';
			var OLAH2_S_BULANValue = '';
			var OLAH3_S_TAHUNValue = '';
			var OLAH3_S_BULANValue = '';
			var MT_TANAHValue = '';
			var MT_BANGUNANValue = '';
			var MT_MESINValue = '';
			var MT_DLLValue = '';
			var MK_BAHAN_BAKUValue = '';
			var MK_UPAHValue = '';
			var MK_DLLValue = '';
			var SP_MODAL_SENDIRIValue = '';
			var SP_PINJAMANValue = '';
			var TKI_L_JUMLAHValue = '';
			var TKI_P_JUMLAHValue = '';
			var TKA_JUMLAHValue = '';
			var TKA_ASALValue = '';
			var TKA_JABATANValue = '';
			var TKA_JANGKA_WAKTUValue = '';
			var DN_JENIS_PRODUK1Value = '';
			var DN_JENIS_PRODUK2Value = '';
			var DN_JENIS_PRODUK3Value = '';
			var E_JENIS_PRODUK1Value = '';
			var E_JENIS_PRODUK2Value = '';
			var E_JENIS_PRODUK3Value = '';
			var MERK_JENIS_PRODUKValue = '';
			var BBKB_DN_JUMLAHValue = '';
			var BBKB_DN_SATUANValue = '';
			var BBKB_DN_ASALValue = '';
			var BBKB_DN_HARGAValue = '';
			var BBKB_DN_KETERANGANValue = '';
			var BBKO_DN_JUMLAHValue = '';
			var BBKO_DN_SATUANValue = '';
			var BBKO_DN_ASALValue = '';
			var BBKO_DN_HARGAValue = '';
			var BBKO_DN_KETERANGANValue = '';
			var BP_DN_JUMLAHValue = '';
			var BP_DN_SATUANValue = '';
			var BP_DN_ASALValue = '';
			var BP_DN_HARGAValue = '';
			var BP_DN_KETERANGANValue = '';
			var RBB_LUAS_GUDANGValue = '';
			var RBB_KAYU_OLAHANValue = '';
			var RBB_PENOLONGValue = '';
			var RBB_HASIL_PRODUKSIValue = '';
			var RLPLY_LOKASIValue = '';
			var RLPLY_LUASValue = '';
			var RLPLY_PERIZINANValue = '';
			var RSD1_KAPASITASValue = '';
			var RSD1_JUMLAHValue = '';
			var RSD211_KAPASITASValue = '';
			var RSD211_JUMLAHValue = '';
			var RSD212_KAPASITASValue = '';
			var RSD212_JUMLAHValue = '';
			var RSD213_KAPASITASValue = '';
			var RSD213_JUMLAHValue = '';
			var RSD22_KAPASITASValue = '';
			var RSD22_JUMLAHValue = '';
			var RSD23_KAPASITASValue = '';
			var RSD23_JUMLAHValue = '';
			var RPL1_VOLUMEValue = '';
			var RPL1_SATUANValue = '';
			var RPL1_PENANGANANValue = '';
			var RPL2_VOLUMEValue = '';
			var RPL2_SATUANValue = '';
			var RPL2_PENANGANANValue = '';
			var RPL3_VOLUMEValue = '';
			var RPL3_SATUANValue = '';
			var RPL3_PENANGANANValue = '';
			var RPL4_VOLUMEValue = '';
			var RPL4_SATUANValue = '';
			var RPL4_PENANGANANValue = '';
			var PENYETUJUValue = '';
			var NOMOR_SURATValue = '';
			var TGL_TERLAMPIRValue = '';
			var TGL_PERMOHONANValue = '';
			var STATUS_SURVEYValue = '';
			var STATUSValue = '';
			var TGL_BERLAKUValue = '';
			var TGL_BERAKHIRValue = '';
			
			if(iphhk_dataStore.proxy.extraParams.query!==null){searchText = iphhk_dataStore.proxy.extraParams.query;}
			if(iphhk_dataStore.proxy.extraParams.ID_PEMOHON!==null){ID_PEMOHONValue = iphhk_dataStore.proxy.extraParams.ID_PEMOHON;}
			if(iphhk_dataStore.proxy.extraParams.NO_SK!==null){NO_SKValue = iphhk_dataStore.proxy.extraParams.NO_SK;}
			if(iphhk_dataStore.proxy.extraParams.NO_SK_LAMA!==null){NO_SK_LAMAValue = iphhk_dataStore.proxy.extraParams.NO_SK_LAMA;}
			if(iphhk_dataStore.proxy.extraParams.JENIS_PERMOHONAN!==null){JENIS_PERMOHONANValue = iphhk_dataStore.proxy.extraParams.JENIS_PERMOHONAN;}
			if(iphhk_dataStore.proxy.extraParams.NAMA_PERUSAHAAN!==null){NAMA_PERUSAHAANValue = iphhk_dataStore.proxy.extraParams.NAMA_PERUSAHAAN;}
			if(iphhk_dataStore.proxy.extraParams.NPWP!==null){NPWPValue = iphhk_dataStore.proxy.extraParams.NPWP;}
			if(iphhk_dataStore.proxy.extraParams.ALAMAT!==null){ALAMATValue = iphhk_dataStore.proxy.extraParams.ALAMAT;}
			if(iphhk_dataStore.proxy.extraParams.STATUS_MODAL!==null){STATUS_MODALValue = iphhk_dataStore.proxy.extraParams.STATUS_MODAL;}
			if(iphhk_dataStore.proxy.extraParams.NAMA_NOTARIS!==null){NAMA_NOTARISValue = iphhk_dataStore.proxy.extraParams.NAMA_NOTARIS;}
			if(iphhk_dataStore.proxy.extraParams.NO_AKTA!==null){NO_AKTAValue = iphhk_dataStore.proxy.extraParams.NO_AKTA;}
			if(iphhk_dataStore.proxy.extraParams.PENANGGUNG_JAWAB!==null){PENANGGUNG_JAWABValue = iphhk_dataStore.proxy.extraParams.PENANGGUNG_JAWAB;}
			if(iphhk_dataStore.proxy.extraParams.NAMA_DIREKSI!==null){NAMA_DIREKSIValue = iphhk_dataStore.proxy.extraParams.NAMA_DIREKSI;}
			if(iphhk_dataStore.proxy.extraParams.DEWAN_KOMISARIS!==null){DEWAN_KOMISARISValue = iphhk_dataStore.proxy.extraParams.DEWAN_KOMISARIS;}
			if(iphhk_dataStore.proxy.extraParams.TUJUAN_PRODUKSI!==null){TUJUAN_PRODUKSIValue = iphhk_dataStore.proxy.extraParams.TUJUAN_PRODUKSI;}
			if(iphhk_dataStore.proxy.extraParams.LOKASI_PABRIK!==null){LOKASI_PABRIKValue = iphhk_dataStore.proxy.extraParams.LOKASI_PABRIK;}
			if(iphhk_dataStore.proxy.extraParams.LUAS_TANAH!==null){LUAS_TANAHValue = iphhk_dataStore.proxy.extraParams.LUAS_TANAH;}
			if(iphhk_dataStore.proxy.extraParams.ALAMAT_PABRIK!==null){ALAMAT_PABRIKValue = iphhk_dataStore.proxy.extraParams.ALAMAT_PABRIK;}
			if(iphhk_dataStore.proxy.extraParams.OLAH1_P_TAHUN!==null){OLAH1_P_TAHUNValue = iphhk_dataStore.proxy.extraParams.OLAH1_P_TAHUN;}
			if(iphhk_dataStore.proxy.extraParams.OLAH1_P_BULAN!==null){OLAH1_P_BULANValue = iphhk_dataStore.proxy.extraParams.OLAH1_P_BULAN;}
			if(iphhk_dataStore.proxy.extraParams.OLAH2_P_TAHUN!==null){OLAH2_P_TAHUNValue = iphhk_dataStore.proxy.extraParams.OLAH2_P_TAHUN;}
			if(iphhk_dataStore.proxy.extraParams.OLAH2_P_BULAN!==null){OLAH2_P_BULANValue = iphhk_dataStore.proxy.extraParams.OLAH2_P_BULAN;}
			if(iphhk_dataStore.proxy.extraParams.OLAH3_P_TAHUN!==null){OLAH3_P_TAHUNValue = iphhk_dataStore.proxy.extraParams.OLAH3_P_TAHUN;}
			if(iphhk_dataStore.proxy.extraParams.OLAH3_P_BULAN!==null){OLAH3_P_BULANValue = iphhk_dataStore.proxy.extraParams.OLAH3_P_BULAN;}
			if(iphhk_dataStore.proxy.extraParams.OLAH1_S_TAHUN!==null){OLAH1_S_TAHUNValue = iphhk_dataStore.proxy.extraParams.OLAH1_S_TAHUN;}
			if(iphhk_dataStore.proxy.extraParams.OLAH1_S_BULAN!==null){OLAH1_S_BULANValue = iphhk_dataStore.proxy.extraParams.OLAH1_S_BULAN;}
			if(iphhk_dataStore.proxy.extraParams.OLAH2_S_TAHUN!==null){OLAH2_S_TAHUNValue = iphhk_dataStore.proxy.extraParams.OLAH2_S_TAHUN;}
			if(iphhk_dataStore.proxy.extraParams.OLAH2_S_BULAN!==null){OLAH2_S_BULANValue = iphhk_dataStore.proxy.extraParams.OLAH2_S_BULAN;}
			if(iphhk_dataStore.proxy.extraParams.OLAH3_S_TAHUN!==null){OLAH3_S_TAHUNValue = iphhk_dataStore.proxy.extraParams.OLAH3_S_TAHUN;}
			if(iphhk_dataStore.proxy.extraParams.OLAH3_S_BULAN!==null){OLAH3_S_BULANValue = iphhk_dataStore.proxy.extraParams.OLAH3_S_BULAN;}
			if(iphhk_dataStore.proxy.extraParams.MT_TANAH!==null){MT_TANAHValue = iphhk_dataStore.proxy.extraParams.MT_TANAH;}
			if(iphhk_dataStore.proxy.extraParams.MT_BANGUNAN!==null){MT_BANGUNANValue = iphhk_dataStore.proxy.extraParams.MT_BANGUNAN;}
			if(iphhk_dataStore.proxy.extraParams.MT_MESIN!==null){MT_MESINValue = iphhk_dataStore.proxy.extraParams.MT_MESIN;}
			if(iphhk_dataStore.proxy.extraParams.MT_DLL!==null){MT_DLLValue = iphhk_dataStore.proxy.extraParams.MT_DLL;}
			if(iphhk_dataStore.proxy.extraParams.MK_BAHAN_BAKU!==null){MK_BAHAN_BAKUValue = iphhk_dataStore.proxy.extraParams.MK_BAHAN_BAKU;}
			if(iphhk_dataStore.proxy.extraParams.MK_UPAH!==null){MK_UPAHValue = iphhk_dataStore.proxy.extraParams.MK_UPAH;}
			if(iphhk_dataStore.proxy.extraParams.MK_DLL!==null){MK_DLLValue = iphhk_dataStore.proxy.extraParams.MK_DLL;}
			if(iphhk_dataStore.proxy.extraParams.SP_MODAL_SENDIRI!==null){SP_MODAL_SENDIRIValue = iphhk_dataStore.proxy.extraParams.SP_MODAL_SENDIRI;}
			if(iphhk_dataStore.proxy.extraParams.SP_PINJAMAN!==null){SP_PINJAMANValue = iphhk_dataStore.proxy.extraParams.SP_PINJAMAN;}
			if(iphhk_dataStore.proxy.extraParams.TKI_L_JUMLAH!==null){TKI_L_JUMLAHValue = iphhk_dataStore.proxy.extraParams.TKI_L_JUMLAH;}
			if(iphhk_dataStore.proxy.extraParams.TKI_P_JUMLAH!==null){TKI_P_JUMLAHValue = iphhk_dataStore.proxy.extraParams.TKI_P_JUMLAH;}
			if(iphhk_dataStore.proxy.extraParams.TKA_JUMLAH!==null){TKA_JUMLAHValue = iphhk_dataStore.proxy.extraParams.TKA_JUMLAH;}
			if(iphhk_dataStore.proxy.extraParams.TKA_ASAL!==null){TKA_ASALValue = iphhk_dataStore.proxy.extraParams.TKA_ASAL;}
			if(iphhk_dataStore.proxy.extraParams.TKA_JABATAN!==null){TKA_JABATANValue = iphhk_dataStore.proxy.extraParams.TKA_JABATAN;}
			if(iphhk_dataStore.proxy.extraParams.TKA_JANGKA_WAKTU!==null){TKA_JANGKA_WAKTUValue = iphhk_dataStore.proxy.extraParams.TKA_JANGKA_WAKTU;}
			if(iphhk_dataStore.proxy.extraParams.DN_JENIS_PRODUK1!==null){DN_JENIS_PRODUK1Value = iphhk_dataStore.proxy.extraParams.DN_JENIS_PRODUK1;}
			if(iphhk_dataStore.proxy.extraParams.DN_JENIS_PRODUK2!==null){DN_JENIS_PRODUK2Value = iphhk_dataStore.proxy.extraParams.DN_JENIS_PRODUK2;}
			if(iphhk_dataStore.proxy.extraParams.DN_JENIS_PRODUK3!==null){DN_JENIS_PRODUK3Value = iphhk_dataStore.proxy.extraParams.DN_JENIS_PRODUK3;}
			if(iphhk_dataStore.proxy.extraParams.E_JENIS_PRODUK1!==null){E_JENIS_PRODUK1Value = iphhk_dataStore.proxy.extraParams.E_JENIS_PRODUK1;}
			if(iphhk_dataStore.proxy.extraParams.E_JENIS_PRODUK2!==null){E_JENIS_PRODUK2Value = iphhk_dataStore.proxy.extraParams.E_JENIS_PRODUK2;}
			if(iphhk_dataStore.proxy.extraParams.E_JENIS_PRODUK3!==null){E_JENIS_PRODUK3Value = iphhk_dataStore.proxy.extraParams.E_JENIS_PRODUK3;}
			if(iphhk_dataStore.proxy.extraParams.MERK_JENIS_PRODUK!==null){MERK_JENIS_PRODUKValue = iphhk_dataStore.proxy.extraParams.MERK_JENIS_PRODUK;}
			if(iphhk_dataStore.proxy.extraParams.BBKB_DN_JUMLAH!==null){BBKB_DN_JUMLAHValue = iphhk_dataStore.proxy.extraParams.BBKB_DN_JUMLAH;}
			if(iphhk_dataStore.proxy.extraParams.BBKB_DN_SATUAN!==null){BBKB_DN_SATUANValue = iphhk_dataStore.proxy.extraParams.BBKB_DN_SATUAN;}
			if(iphhk_dataStore.proxy.extraParams.BBKB_DN_ASAL!==null){BBKB_DN_ASALValue = iphhk_dataStore.proxy.extraParams.BBKB_DN_ASAL;}
			if(iphhk_dataStore.proxy.extraParams.BBKB_DN_HARGA!==null){BBKB_DN_HARGAValue = iphhk_dataStore.proxy.extraParams.BBKB_DN_HARGA;}
			if(iphhk_dataStore.proxy.extraParams.BBKB_DN_KETERANGAN!==null){BBKB_DN_KETERANGANValue = iphhk_dataStore.proxy.extraParams.BBKB_DN_KETERANGAN;}
			if(iphhk_dataStore.proxy.extraParams.BBKO_DN_JUMLAH!==null){BBKO_DN_JUMLAHValue = iphhk_dataStore.proxy.extraParams.BBKO_DN_JUMLAH;}
			if(iphhk_dataStore.proxy.extraParams.BBKO_DN_SATUAN!==null){BBKO_DN_SATUANValue = iphhk_dataStore.proxy.extraParams.BBKO_DN_SATUAN;}
			if(iphhk_dataStore.proxy.extraParams.BBKO_DN_ASAL!==null){BBKO_DN_ASALValue = iphhk_dataStore.proxy.extraParams.BBKO_DN_ASAL;}
			if(iphhk_dataStore.proxy.extraParams.BBKO_DN_HARGA!==null){BBKO_DN_HARGAValue = iphhk_dataStore.proxy.extraParams.BBKO_DN_HARGA;}
			if(iphhk_dataStore.proxy.extraParams.BBKO_DN_KETERANGAN!==null){BBKO_DN_KETERANGANValue = iphhk_dataStore.proxy.extraParams.BBKO_DN_KETERANGAN;}
			if(iphhk_dataStore.proxy.extraParams.BP_DN_JUMLAH!==null){BP_DN_JUMLAHValue = iphhk_dataStore.proxy.extraParams.BP_DN_JUMLAH;}
			if(iphhk_dataStore.proxy.extraParams.BP_DN_SATUAN!==null){BP_DN_SATUANValue = iphhk_dataStore.proxy.extraParams.BP_DN_SATUAN;}
			if(iphhk_dataStore.proxy.extraParams.BP_DN_ASAL!==null){BP_DN_ASALValue = iphhk_dataStore.proxy.extraParams.BP_DN_ASAL;}
			if(iphhk_dataStore.proxy.extraParams.BP_DN_HARGA!==null){BP_DN_HARGAValue = iphhk_dataStore.proxy.extraParams.BP_DN_HARGA;}
			if(iphhk_dataStore.proxy.extraParams.BP_DN_KETERANGAN!==null){BP_DN_KETERANGANValue = iphhk_dataStore.proxy.extraParams.BP_DN_KETERANGAN;}
			if(iphhk_dataStore.proxy.extraParams.RBB_LUAS_GUDANG!==null){RBB_LUAS_GUDANGValue = iphhk_dataStore.proxy.extraParams.RBB_LUAS_GUDANG;}
			if(iphhk_dataStore.proxy.extraParams.RBB_KAYU_OLAHAN!==null){RBB_KAYU_OLAHANValue = iphhk_dataStore.proxy.extraParams.RBB_KAYU_OLAHAN;}
			if(iphhk_dataStore.proxy.extraParams.RBB_PENOLONG!==null){RBB_PENOLONGValue = iphhk_dataStore.proxy.extraParams.RBB_PENOLONG;}
			if(iphhk_dataStore.proxy.extraParams.RBB_HASIL_PRODUKSI!==null){RBB_HASIL_PRODUKSIValue = iphhk_dataStore.proxy.extraParams.RBB_HASIL_PRODUKSI;}
			if(iphhk_dataStore.proxy.extraParams.RLPLY_LOKASI!==null){RLPLY_LOKASIValue = iphhk_dataStore.proxy.extraParams.RLPLY_LOKASI;}
			if(iphhk_dataStore.proxy.extraParams.RLPLY_LUAS!==null){RLPLY_LUASValue = iphhk_dataStore.proxy.extraParams.RLPLY_LUAS;}
			if(iphhk_dataStore.proxy.extraParams.RLPLY_PERIZINAN!==null){RLPLY_PERIZINANValue = iphhk_dataStore.proxy.extraParams.RLPLY_PERIZINAN;}
			if(iphhk_dataStore.proxy.extraParams.RSD1_KAPASITAS!==null){RSD1_KAPASITASValue = iphhk_dataStore.proxy.extraParams.RSD1_KAPASITAS;}
			if(iphhk_dataStore.proxy.extraParams.RSD1_JUMLAH!==null){RSD1_JUMLAHValue = iphhk_dataStore.proxy.extraParams.RSD1_JUMLAH;}
			if(iphhk_dataStore.proxy.extraParams.RSD211_KAPASITAS!==null){RSD211_KAPASITASValue = iphhk_dataStore.proxy.extraParams.RSD211_KAPASITAS;}
			if(iphhk_dataStore.proxy.extraParams.RSD211_JUMLAH!==null){RSD211_JUMLAHValue = iphhk_dataStore.proxy.extraParams.RSD211_JUMLAH;}
			if(iphhk_dataStore.proxy.extraParams.RSD212_KAPASITAS!==null){RSD212_KAPASITASValue = iphhk_dataStore.proxy.extraParams.RSD212_KAPASITAS;}
			if(iphhk_dataStore.proxy.extraParams.RSD212_JUMLAH!==null){RSD212_JUMLAHValue = iphhk_dataStore.proxy.extraParams.RSD212_JUMLAH;}
			if(iphhk_dataStore.proxy.extraParams.RSD213_KAPASITAS!==null){RSD213_KAPASITASValue = iphhk_dataStore.proxy.extraParams.RSD213_KAPASITAS;}
			if(iphhk_dataStore.proxy.extraParams.RSD213_JUMLAH!==null){RSD213_JUMLAHValue = iphhk_dataStore.proxy.extraParams.RSD213_JUMLAH;}
			if(iphhk_dataStore.proxy.extraParams.RSD22_KAPASITAS!==null){RSD22_KAPASITASValue = iphhk_dataStore.proxy.extraParams.RSD22_KAPASITAS;}
			if(iphhk_dataStore.proxy.extraParams.RSD22_JUMLAH!==null){RSD22_JUMLAHValue = iphhk_dataStore.proxy.extraParams.RSD22_JUMLAH;}
			if(iphhk_dataStore.proxy.extraParams.RSD23_KAPASITAS!==null){RSD23_KAPASITASValue = iphhk_dataStore.proxy.extraParams.RSD23_KAPASITAS;}
			if(iphhk_dataStore.proxy.extraParams.RSD23_JUMLAH!==null){RSD23_JUMLAHValue = iphhk_dataStore.proxy.extraParams.RSD23_JUMLAH;}
			if(iphhk_dataStore.proxy.extraParams.RPL1_VOLUME!==null){RPL1_VOLUMEValue = iphhk_dataStore.proxy.extraParams.RPL1_VOLUME;}
			if(iphhk_dataStore.proxy.extraParams.RPL1_SATUAN!==null){RPL1_SATUANValue = iphhk_dataStore.proxy.extraParams.RPL1_SATUAN;}
			if(iphhk_dataStore.proxy.extraParams.RPL1_PENANGANAN!==null){RPL1_PENANGANANValue = iphhk_dataStore.proxy.extraParams.RPL1_PENANGANAN;}
			if(iphhk_dataStore.proxy.extraParams.RPL2_VOLUME!==null){RPL2_VOLUMEValue = iphhk_dataStore.proxy.extraParams.RPL2_VOLUME;}
			if(iphhk_dataStore.proxy.extraParams.RPL2_SATUAN!==null){RPL2_SATUANValue = iphhk_dataStore.proxy.extraParams.RPL2_SATUAN;}
			if(iphhk_dataStore.proxy.extraParams.RPL2_PENANGANAN!==null){RPL2_PENANGANANValue = iphhk_dataStore.proxy.extraParams.RPL2_PENANGANAN;}
			if(iphhk_dataStore.proxy.extraParams.RPL3_VOLUME!==null){RPL3_VOLUMEValue = iphhk_dataStore.proxy.extraParams.RPL3_VOLUME;}
			if(iphhk_dataStore.proxy.extraParams.RPL3_SATUAN!==null){RPL3_SATUANValue = iphhk_dataStore.proxy.extraParams.RPL3_SATUAN;}
			if(iphhk_dataStore.proxy.extraParams.RPL3_PENANGANAN!==null){RPL3_PENANGANANValue = iphhk_dataStore.proxy.extraParams.RPL3_PENANGANAN;}
			if(iphhk_dataStore.proxy.extraParams.RPL4_VOLUME!==null){RPL4_VOLUMEValue = iphhk_dataStore.proxy.extraParams.RPL4_VOLUME;}
			if(iphhk_dataStore.proxy.extraParams.RPL4_SATUAN!==null){RPL4_SATUANValue = iphhk_dataStore.proxy.extraParams.RPL4_SATUAN;}
			if(iphhk_dataStore.proxy.extraParams.RPL4_PENANGANAN!==null){RPL4_PENANGANANValue = iphhk_dataStore.proxy.extraParams.RPL4_PENANGANAN;}
			if(iphhk_dataStore.proxy.extraParams.PENYETUJU!==null){PENYETUJUValue = iphhk_dataStore.proxy.extraParams.PENYETUJU;}
			if(iphhk_dataStore.proxy.extraParams.NOMOR_SURAT!==null){NOMOR_SURATValue = iphhk_dataStore.proxy.extraParams.NOMOR_SURAT;}
			if(iphhk_dataStore.proxy.extraParams.TGL_TERLAMPIR!==null){TGL_TERLAMPIRValue = iphhk_dataStore.proxy.extraParams.TGL_TERLAMPIR;}
			if(iphhk_dataStore.proxy.extraParams.TGL_PERMOHONAN!==null){TGL_PERMOHONANValue = iphhk_dataStore.proxy.extraParams.TGL_PERMOHONAN;}
			if(iphhk_dataStore.proxy.extraParams.STATUS_SURVEY!==null){STATUS_SURVEYValue = iphhk_dataStore.proxy.extraParams.STATUS_SURVEY;}
			if(iphhk_dataStore.proxy.extraParams.STATUS!==null){STATUSValue = iphhk_dataStore.proxy.extraParams.STATUS;}
			if(iphhk_dataStore.proxy.extraParams.TGL_BERLAKU!==null){TGL_BERLAKUValue = iphhk_dataStore.proxy.extraParams.TGL_BERLAKU;}
			if(iphhk_dataStore.proxy.extraParams.TGL_BERAKHIR!==null){TGL_BERAKHIRValue = iphhk_dataStore.proxy.extraParams.TGL_BERAKHIR;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_iuiphhk/switchAction',
				params : {
					action : outputType,
					query : searchText,
					ID_PEMOHON : ID_PEMOHONValue,
					NO_SK : NO_SKValue,
					NO_SK_LAMA : NO_SK_LAMAValue,
					JENIS_PERMOHONAN : JENIS_PERMOHONANValue,
					NAMA_PERUSAHAAN : NAMA_PERUSAHAANValue,
					NPWP : NPWPValue,
					ALAMAT : ALAMATValue,
					STATUS_MODAL : STATUS_MODALValue,
					NAMA_NOTARIS : NAMA_NOTARISValue,
					NO_AKTA : NO_AKTAValue,
					PENANGGUNG_JAWAB : PENANGGUNG_JAWABValue,
					NAMA_DIREKSI : NAMA_DIREKSIValue,
					DEWAN_KOMISARIS : DEWAN_KOMISARISValue,
					TUJUAN_PRODUKSI : TUJUAN_PRODUKSIValue,
					LOKASI_PABRIK : LOKASI_PABRIKValue,
					LUAS_TANAH : LUAS_TANAHValue,
					ALAMAT_PABRIK : ALAMAT_PABRIKValue,
					OLAH1_P_TAHUN : OLAH1_P_TAHUNValue,
					OLAH1_P_BULAN : OLAH1_P_BULANValue,
					OLAH2_P_TAHUN : OLAH2_P_TAHUNValue,
					OLAH2_P_BULAN : OLAH2_P_BULANValue,
					OLAH3_P_TAHUN : OLAH3_P_TAHUNValue,
					OLAH3_P_BULAN : OLAH3_P_BULANValue,
					OLAH1_S_TAHUN : OLAH1_S_TAHUNValue,
					OLAH1_S_BULAN : OLAH1_S_BULANValue,
					OLAH2_S_TAHUN : OLAH2_S_TAHUNValue,
					OLAH2_S_BULAN : OLAH2_S_BULANValue,
					OLAH3_S_TAHUN : OLAH3_S_TAHUNValue,
					OLAH3_S_BULAN : OLAH3_S_BULANValue,
					MT_TANAH : MT_TANAHValue,
					MT_BANGUNAN : MT_BANGUNANValue,
					MT_MESIN : MT_MESINValue,
					MT_DLL : MT_DLLValue,
					MK_BAHAN_BAKU : MK_BAHAN_BAKUValue,
					MK_UPAH : MK_UPAHValue,
					MK_DLL : MK_DLLValue,
					SP_MODAL_SENDIRI : SP_MODAL_SENDIRIValue,
					SP_PINJAMAN : SP_PINJAMANValue,
					TKI_L_JUMLAH : TKI_L_JUMLAHValue,
					TKI_P_JUMLAH : TKI_P_JUMLAHValue,
					TKA_JUMLAH : TKA_JUMLAHValue,
					TKA_ASAL : TKA_ASALValue,
					TKA_JABATAN : TKA_JABATANValue,
					TKA_JANGKA_WAKTU : TKA_JANGKA_WAKTUValue,
					DN_JENIS_PRODUK1 : DN_JENIS_PRODUK1Value,
					DN_JENIS_PRODUK2 : DN_JENIS_PRODUK2Value,
					DN_JENIS_PRODUK3 : DN_JENIS_PRODUK3Value,
					E_JENIS_PRODUK1 : E_JENIS_PRODUK1Value,
					E_JENIS_PRODUK2 : E_JENIS_PRODUK2Value,
					E_JENIS_PRODUK3 : E_JENIS_PRODUK3Value,
					MERK_JENIS_PRODUK : MERK_JENIS_PRODUKValue,
					BBKB_DN_JUMLAH : BBKB_DN_JUMLAHValue,
					BBKB_DN_SATUAN : BBKB_DN_SATUANValue,
					BBKB_DN_ASAL : BBKB_DN_ASALValue,
					BBKB_DN_HARGA : BBKB_DN_HARGAValue,
					BBKB_DN_KETERANGAN : BBKB_DN_KETERANGANValue,
					BBKO_DN_JUMLAH : BBKO_DN_JUMLAHValue,
					BBKO_DN_SATUAN : BBKO_DN_SATUANValue,
					BBKO_DN_ASAL : BBKO_DN_ASALValue,
					BBKO_DN_HARGA : BBKO_DN_HARGAValue,
					BBKO_DN_KETERANGAN : BBKO_DN_KETERANGANValue,
					BP_DN_JUMLAH : BP_DN_JUMLAHValue,
					BP_DN_SATUAN : BP_DN_SATUANValue,
					BP_DN_ASAL : BP_DN_ASALValue,
					BP_DN_HARGA : BP_DN_HARGAValue,
					BP_DN_KETERANGAN : BP_DN_KETERANGANValue,
					RBB_LUAS_GUDANG : RBB_LUAS_GUDANGValue,
					RBB_KAYU_OLAHAN : RBB_KAYU_OLAHANValue,
					RBB_PENOLONG : RBB_PENOLONGValue,
					RBB_HASIL_PRODUKSI : RBB_HASIL_PRODUKSIValue,
					RLPLY_LOKASI : RLPLY_LOKASIValue,
					RLPLY_LUAS : RLPLY_LUASValue,
					RLPLY_PERIZINAN : RLPLY_PERIZINANValue,
					RSD1_KAPASITAS : RSD1_KAPASITASValue,
					RSD1_JUMLAH : RSD1_JUMLAHValue,
					RSD211_KAPASITAS : RSD211_KAPASITASValue,
					RSD211_JUMLAH : RSD211_JUMLAHValue,
					RSD212_KAPASITAS : RSD212_KAPASITASValue,
					RSD212_JUMLAH : RSD212_JUMLAHValue,
					RSD213_KAPASITAS : RSD213_KAPASITASValue,
					RSD213_JUMLAH : RSD213_JUMLAHValue,
					RSD22_KAPASITAS : RSD22_KAPASITASValue,
					RSD22_JUMLAH : RSD22_JUMLAHValue,
					RSD23_KAPASITAS : RSD23_KAPASITASValue,
					RSD23_JUMLAH : RSD23_JUMLAHValue,
					RPL1_VOLUME : RPL1_VOLUMEValue,
					RPL1_SATUAN : RPL1_SATUANValue,
					RPL1_PENANGANAN : RPL1_PENANGANANValue,
					RPL2_VOLUME : RPL2_VOLUMEValue,
					RPL2_SATUAN : RPL2_SATUANValue,
					RPL2_PENANGANAN : RPL2_PENANGANANValue,
					RPL3_VOLUME : RPL3_VOLUMEValue,
					RPL3_SATUAN : RPL3_SATUANValue,
					RPL3_PENANGANAN : RPL3_PENANGANANValue,
					RPL4_VOLUME : RPL4_VOLUMEValue,
					RPL4_SATUAN : RPL4_SATUANValue,
					RPL4_PENANGANAN : RPL4_PENANGANANValue,
					PENYETUJU : PENYETUJUValue,
					NOMOR_SURAT : NOMOR_SURATValue,
					TGL_TERLAMPIR : TGL_TERLAMPIRValue,
					TGL_PERMOHONAN : TGL_PERMOHONANValue,
					STATUS_SURVEY : STATUS_SURVEYValue,
					STATUS : STATUSValue,
					TGL_BERLAKU : TGL_BERLAKUValue,
					TGL_BERAKHIR : TGL_BERAKHIRValue,
					currentAction : iphhk_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/iuiphhk_list.xls');
							}else{
								window.open('./print/iuiphhk_list.html','iphhklist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		iphhk_dataStore = Ext.create('Ext.data.Store',{
			id : 'iphhk_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_iuiphhk/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'ID_IUIPHHK'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'ID_IUIPHHK', type : 'int', mapping : 'ID_IUIPHHK' },
				{ name : 'ID_PEMOHON', type : 'int', mapping : 'ID_PEMOHON' },
				{ name : 'NO_SK', type : 'string', mapping : 'NO_SK' },
				{ name : 'NO_SK_LAMA', type : 'string', mapping : 'NO_SK_LAMA' },
				{ name : 'JENIS_PERMOHONAN', type : 'int', mapping : 'JENIS_PERMOHONAN' },
				{ name : 'NAMA_PERUSAHAAN', type : 'string', mapping : 'NAMA_PERUSAHAAN' },
				{ name : 'NPWP', type : 'string', mapping : 'NPWP' },
				{ name : 'ALAMAT', type : 'string', mapping : 'ALAMAT' },
				{ name : 'STATUS_MODAL', type : 'int', mapping : 'STATUS_MODAL' },
				{ name : 'NAMA_NOTARIS', type : 'string', mapping : 'NAMA_NOTARIS' },
				{ name : 'NO_AKTA', type : 'string', mapping : 'NO_AKTA' },
				{ name : 'PENANGGUNG_JAWAB', type : 'string', mapping : 'PENANGGUNG_JAWAB' },
				{ name : 'NAMA_DIREKSI', type : 'string', mapping : 'NAMA_DIREKSI' },
				{ name : 'DEWAN_KOMISARIS', type : 'string', mapping : 'DEWAN_KOMISARIS' },
				{ name : 'TUJUAN_PRODUKSI', type : 'string', mapping : 'TUJUAN_PRODUKSI' },
				{ name : 'LOKASI_PABRIK', type : 'int', mapping : 'LOKASI_PABRIK' },
				{ name : 'LUAS_TANAH', type : 'float', mapping : 'LUAS_TANAH' },
				{ name : 'ALAMAT_PABRIK', type : 'string', mapping : 'ALAMAT_PABRIK' },
				{ name : 'OLAH1_P_TAHUN', type : 'int', mapping : 'OLAH1_P_TAHUN' },
				{ name : 'OLAH1_P_BULAN', type : 'int', mapping : 'OLAH1_P_BULAN' },
				{ name : 'OLAH2_P_TAHUN', type : 'int', mapping : 'OLAH2_P_TAHUN' },
				{ name : 'OLAH2_P_BULAN', type : 'int', mapping : 'OLAH2_P_BULAN' },
				{ name : 'OLAH3_P_TAHUN', type : 'int', mapping : 'OLAH3_P_TAHUN' },
				{ name : 'OLAH3_P_BULAN', type : 'int', mapping : 'OLAH3_P_BULAN' },
				{ name : 'OLAH1_S_TAHUN', type : 'int', mapping : 'OLAH1_S_TAHUN' },
				{ name : 'OLAH1_S_BULAN', type : 'int', mapping : 'OLAH1_S_BULAN' },
				{ name : 'OLAH2_S_TAHUN', type : 'int', mapping : 'OLAH2_S_TAHUN' },
				{ name : 'OLAH2_S_BULAN', type : 'int', mapping : 'OLAH2_S_BULAN' },
				{ name : 'OLAH3_S_TAHUN', type : 'int', mapping : 'OLAH3_S_TAHUN' },
				{ name : 'OLAH3_S_BULAN', type : 'int', mapping : 'OLAH3_S_BULAN' },
				{ name : 'MT_TANAH', type : 'float', mapping : 'MT_TANAH' },
				{ name : 'MT_BANGUNAN', type : 'float', mapping : 'MT_BANGUNAN' },
				{ name : 'MT_MESIN', type : 'float', mapping : 'MT_MESIN' },
				{ name : 'MT_DLL', type : 'float', mapping : 'MT_DLL' },
				{ name : 'MK_BAHAN_BAKU', type : 'float', mapping : 'MK_BAHAN_BAKU' },
				{ name : 'MK_UPAH', type : 'float', mapping : 'MK_UPAH' },
				{ name : 'MK_DLL', type : 'float', mapping : 'MK_DLL' },
				{ name : 'SP_MODAL_SENDIRI', type : 'float', mapping : 'SP_MODAL_SENDIRI' },
				{ name : 'SP_PINJAMAN', type : 'float', mapping : 'SP_PINJAMAN' },
				{ name : 'TKI_L_JUMLAH', type : 'int', mapping : 'TKI_L_JUMLAH' },
				{ name : 'TKI_P_JUMLAH', type : 'int', mapping : 'TKI_P_JUMLAH' },
				{ name : 'TKA_JUMLAH', type : 'int', mapping : 'TKA_JUMLAH' },
				{ name : 'TKA_ASAL', type : 'string', mapping : 'TKA_ASAL' },
				{ name : 'TKA_JABATAN', type : 'string', mapping : 'TKA_JABATAN' },
				{ name : 'TKA_JANGKA_WAKTU', type : 'float', mapping : 'TKA_JANGKA_WAKTU' },
				{ name : 'DN_JENIS_PRODUK1', type : 'float', mapping : 'DN_JENIS_PRODUK1' },
				{ name : 'DN_JENIS_PRODUK2', type : 'float', mapping : 'DN_JENIS_PRODUK2' },
				{ name : 'DN_JENIS_PRODUK3', type : 'float', mapping : 'DN_JENIS_PRODUK3' },
				{ name : 'E_JENIS_PRODUK1', type : 'float', mapping : 'E_JENIS_PRODUK1' },
				{ name : 'E_JENIS_PRODUK2', type : 'float', mapping : 'E_JENIS_PRODUK2' },
				{ name : 'E_JENIS_PRODUK3', type : 'float', mapping : 'E_JENIS_PRODUK3' },
				{ name : 'MERK_JENIS_PRODUK', type : 'int', mapping : 'MERK_JENIS_PRODUK' },
				{ name : 'BBKB_DN_JUMLAH', type : 'int', mapping : 'BBKB_DN_JUMLAH' },
				{ name : 'BBKB_DN_SATUAN', type : 'string', mapping : 'BBKB_DN_SATUAN' },
				{ name : 'BBKB_DN_ASAL', type : 'string', mapping : 'BBKB_DN_ASAL' },
				{ name : 'BBKB_DN_HARGA', type : 'float', mapping : 'BBKB_DN_HARGA' },
				{ name : 'BBKB_DN_KETERANGAN', type : 'string', mapping : 'BBKB_DN_KETERANGAN' },
				{ name : 'BBKO_DN_JUMLAH', type : 'int', mapping : 'BBKO_DN_JUMLAH' },
				{ name : 'BBKO_DN_SATUAN', type : 'string', mapping : 'BBKO_DN_SATUAN' },
				{ name : 'BBKO_DN_ASAL', type : 'string', mapping : 'BBKO_DN_ASAL' },
				{ name : 'BBKO_DN_HARGA', type : 'float', mapping : 'BBKO_DN_HARGA' },
				{ name : 'BBKO_DN_KETERANGAN', type : 'string', mapping : 'BBKO_DN_KETERANGAN' },
				{ name : 'BP_DN_JUMLAH', type : 'int', mapping : 'BP_DN_JUMLAH' },
				{ name : 'BP_DN_SATUAN', type : 'string', mapping : 'BP_DN_SATUAN' },
				{ name : 'BP_DN_ASAL', type : 'string', mapping : 'BP_DN_ASAL' },
				{ name : 'BP_DN_HARGA', type : 'float', mapping : 'BP_DN_HARGA' },
				{ name : 'BP_DN_KETERANGAN', type : 'string', mapping : 'BP_DN_KETERANGAN' },
				{ name : 'BBKB_I_JUMLAH', type : 'int', mapping : 'BBKB_I_JUMLAH' },
				{ name : 'BBKB_I_SATUAN', type : 'string', mapping : 'BBKB_I_SATUAN' },
				{ name : 'BBKB_I_ASAL', type : 'string', mapping : 'BBKB_I_ASAL' },
				{ name : 'BBKB_I_HARGA', type : 'float', mapping : 'BBKB_I_HARGA' },
				{ name : 'BBKB_I_KETERANGAN', type : 'string', mapping : 'BBKB_I_KETERANGAN' },
				{ name : 'BBKO_I_JUMLAH', type : 'int', mapping : 'BBKO_I_JUMLAH' },
				{ name : 'BBKO_I_SATUAN', type : 'string', mapping : 'BBKO_I_SATUAN' },
				{ name : 'BBKO_I_ASAL', type : 'string', mapping : 'BBKO_I_ASAL' },
				{ name : 'BBKO_I_HARGA', type : 'float', mapping : 'BBKO_I_HARGA' },
				{ name : 'BBKO_I_KETERANGAN', type : 'string', mapping : 'BBKO_I_KETERANGAN' },
				{ name : 'BP_I_JUMLAH', type : 'int', mapping : 'BP_I_JUMLAH' },
				{ name : 'BP_I_SATUAN', type : 'string', mapping : 'BP_I_SATUAN' },
				{ name : 'BP_I_ASAL', type : 'string', mapping : 'BP_I_ASAL' },
				{ name : 'BP_I_HARGA', type : 'float', mapping : 'BP_I_HARGA' },
				{ name : 'BP_I_KETERANGAN', type : 'string', mapping : 'BP_I_KETERANGAN' },
				{ name : 'RBB_LUAS_GUDANG', type : 'float', mapping : 'RBB_LUAS_GUDANG' },
				{ name : 'RBB_KAYU_OLAHAN', type : 'float', mapping : 'RBB_KAYU_OLAHAN' },
				{ name : 'RBB_PENOLONG', type : 'float', mapping : 'RBB_PENOLONG' },
				{ name : 'RBB_HASIL_PRODUKSI', type : 'float', mapping : 'RBB_HASIL_PRODUKSI' },
				{ name : 'RLPLY_LOKASI', type : 'int', mapping : 'RLPLY_LOKASI' },
				{ name : 'RLPLY_LUAS', type : 'int', mapping : 'RLPLY_LUAS' },
				{ name : 'RLPLY_PERIZINAN', type : 'int', mapping : 'RLPLY_PERIZINAN' },
				{ name : 'RSD1_KAPASITAS', type : 'int', mapping : 'RSD1_KAPASITAS' },
				{ name : 'RSD1_JUMLAH', type : 'int', mapping : 'RSD1_JUMLAH' },
				{ name : 'RSD211_KAPASITAS', type : 'int', mapping : 'RSD211_KAPASITAS' },
				{ name : 'RSD211_JUMLAH', type : 'int', mapping : 'RSD211_JUMLAH' },
				{ name : 'RSD212_KAPASITAS', type : 'int', mapping : 'RSD212_KAPASITAS' },
				{ name : 'RSD212_JUMLAH', type : 'int', mapping : 'RSD212_JUMLAH' },
				{ name : 'RSD213_KAPASITAS', type : 'int', mapping : 'RSD213_KAPASITAS' },
				{ name : 'RSD213_JUMLAH', type : 'int', mapping : 'RSD213_JUMLAH' },
				{ name : 'RSD22_KAPASITAS', type : 'int', mapping : 'RSD22_KAPASITAS' },
				{ name : 'RSD22_JUMLAH', type : 'int', mapping : 'RSD22_JUMLAH' },
				{ name : 'RSD23_KAPASITAS', type : 'int', mapping : 'RSD23_KAPASITAS' },
				{ name : 'RSD23_JUMLAH', type : 'int', mapping : 'RSD23_JUMLAH' },
				{ name : 'RPL1_VOLUME', type : 'float', mapping : 'RPL1_VOLUME' },
				{ name : 'RPL1_SATUAN', type : 'string', mapping : 'RPL1_SATUAN' },
				{ name : 'RPL1_PENANGANAN', type : 'string', mapping : 'RPL1_PENANGANAN' },
				{ name : 'RPL2_VOLUME', type : 'float', mapping : 'RPL2_VOLUME' },
				{ name : 'RPL2_SATUAN', type : 'string', mapping : 'RPL2_SATUAN' },
				{ name : 'RPL2_PENANGANAN', type : 'string', mapping : 'RPL2_PENANGANAN' },
				{ name : 'RPL3_VOLUME', type : 'float', mapping : 'RPL3_VOLUME' },
				{ name : 'RPL3_SATUAN', type : 'string', mapping : 'RPL3_SATUAN' },
				{ name : 'RPL3_PENANGANAN', type : 'string', mapping : 'RPL3_PENANGANAN' },
				{ name : 'RPL4_VOLUME', type : 'float', mapping : 'RPL4_VOLUME' },
				{ name : 'RPL4_SATUAN', type : 'string', mapping : 'RPL4_SATUAN' },
				{ name : 'RPL4_PENANGANAN', type : 'string', mapping : 'RPL4_PENANGANAN' },
				{ name : 'PENYETUJU', type : 'string', mapping : 'PENYETUJU' },
				{ name : 'NOMOR_SURAT', type : 'string', mapping : 'NOMOR_SURAT' },
				{ name : 'TGL_TERLAMPIR', type : 'date', dateFormat : 'Y-m-d', mapping : 'TGL_TERLAMPIR' },
				{ name : 'TGL_PERMOHONAN', type : 'date', dateFormat : 'Y-m-d', mapping : 'TGL_PERMOHONAN' },
				{ name : 'STATUS_SURVEY', type : 'string', mapping : 'STATUS_SURVEY' },
				{ name : 'STATUS', type : 'int', mapping : 'STATUS' },
				{ name : 'TGL_BERLAKU', type : 'date', dateFormat : 'Y-m-d', mapping : 'TGL_BERLAKU' },
				{ name : 'TGL_BERAKHIR', type : 'date', dateFormat : 'Y-m-d', mapping : 'TGL_BERAKHIR' },
				{ name : 'pemohon_id', type : 'int', mapping : 'pemohon_id' },
				{ name : 'pemohon_nama', type : 'string', mapping : 'pemohon_nama' },
				{ name : 'pemohon_alamat', type : 'string', mapping : 'pemohon_alamat' },
				{ name : 'pemohon_telp', type : 'string', mapping : 'pemohon_telp' },
				{ name : 'pemohon_nik', type : 'string', mapping : 'pemohon_nik' },
				{ name : 'lama_proses', type : 'string', mapping : 'lama_proses' },
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		iphhk_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						iphhk_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						iphhk_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						iphhk_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						iphhk_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						iphhk_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						iphhk_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						iphhk_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						iphhk_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var iphhk_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : iphhk_confirmAdd
		});
		var iphhk_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : iphhk_confirmUpdate
		});
		var iphhk_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : iphhk_confirmDelete
		});
		var iphhk_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : iphhk_refresh
		});
		var iphhk_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : iphhk_showSearchWindow
		});
		var iphhk_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				iphhk_printExcel('PRINT');
			}
		});
		var iphhk_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				iphhk_printExcel('EXCEL');
			}
		});
		
		var iphhk_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : iphhk_confirmUpdate
		});
		var iphhk_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : iphhk_confirmDelete
		});
		var iphhk_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : iphhk_refresh
		});
		iphhk_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'iphhk_contextMenu',
			items: [
				iphhk_contextMenuEdit,iphhk_contextMenuDelete,'-',iphhk_contextMenuRefresh
			]
		});
		
		iphhk_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : iphhk_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						iphhk_dataStore.proxy.extraParams = { action : 'GETLIST'};
						iphhk_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		
		/* Start ContextMenu For Action Column */
		var iuiphhk_bp_printCM = Ext.create('Ext.menu.Item',{
			text : 'Bukti Penerimaan',
			tooltip : 'Cetak Bukti Penerimaan',
			handler : function(){
				var record = iphhk_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_iuiphhk/switchAction',
					params: {
						ID_IUIPHHK : record.get('ID_IUIPHHK'),
						action : 'CETAKBP'
					},success : function(){
						window.open('<? echo base_url("print/iuiphhk_bp.html"); ?>');
					}
				});
			}
		});
		var iuiphhk_lk_printCM = Ext.create('Ext.menu.Item',{
			text : 'Lembar Kontrol',
			tooltip : 'Cetak Lembar Kontrol',
			handler : function(){
				var record = iphhk_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_iuiphhk/switchAction',
					params: {
						ID_IUIPHHK : record.get('ID_IUIPHHK'),
						action : 'CETAKLK'
					},success : function(){
						window.open('<? echo base_url("print/iuiphhk_lk.html"); ?>');
					}
				});
			}
		});
		var iuiphhk_sk_printCM = Ext.create('Ext.menu.Item',{
			text : 'Lembar SK',
			tooltip : 'Cetak Lembar SK',
			handler : function(){
				var record = iphhk_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_iuiphhk/switchAction',
					params: {
						ID_IUIPHHK : record.get('ID_IUIPHHK'),
						action : 'CETAKSK'
					},success : function(){
						window.open('<? echo base_url("print/iuiphhk_sk.html"); ?>');
					}
				});
			}
		});
		// var iuiphhk_rekom_printCM = Ext.create('Ext.menu.Item',{
			// text : 'Lembar Rekomendasi',
			// tooltip : 'Cetak Lembar Rekomendasi',
			// handler : function(){
				// var record = iphhk_gridPanel.getSelectionModel().getSelection()[0];
				// Ext.Ajax.request({
					// waitMsg: 'Please wait...',
					// url: 'c_iuiphhk/switchAction',
					// params: {
						// ID_IUIPHHK : record.get('ID_IUIPHHK'),
						// action : 'CETAKREKOM'
					// },success : function(){
						// window.open('../print/idam_lembarkontrol.html');
					// }
				// });
			// }
		// });
		var iuiphhk_printContextMenu = Ext.create('Ext.menu.Menu',{
			items: [
				<?php echo ($_SESSION["IDHAK"] == 2) ? ("iuiphhk_bp_printCM") : ("iuiphhk_bp_printCM,iuiphhk_lk_printCM,iuiphhk_sk_printCM"); ?>
			]
		});
		function iuiphhk_ubahProses(proses){
			var record = iphhk_gridPanel.getSelectionModel().getSelection()[0];
			Ext.Ajax.request({
				waitMsg: 'Please wait...',
				url: 'c_iuiphhk/switchAction',
				params: {
					iuiphhk_id : record.get('ID_IUIPHHK'),
					no_sk : record.get('NO_SK'),
					proses : proses,
					action : 'UBAHPROSES'
				},success : function(){
					iphhk_dataStore.reload();
				}
			});
		}
		var iuiphhk_prosesContextMenu = Ext.create('Ext.menu.Menu',{
			items: [
				{
					text : 'Selesai, belum diambil',
					tooltip : 'Ubah Menjadi Selesai, belum diambil',
					handler : function(){
						iuiphhk_ubahProses('Selesai, belum diambil');
					}
				},
				{
					text : 'Selesai, sudah diambil',
					tooltip : 'Ubah Menjadi Selesai, sudah diambil',
					handler : function(){
						iuiphhk_ubahProses('Selesai, sudah diambil');
					}
				},
				{
					text : 'Ditolak',
					tooltip : 'Ubah Menjadi Ditolak',
					handler : function(){
						iuiphhk_ubahProses('Ditolak');
					}
				}
			]
		});
		/*----------------end----------------*/
		
		iphhk_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'iphhk_gridPanel',
			constrain : true,
			store : iphhk_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'iphhkGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						iphhk_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : iphhk_shorcut,
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
							} else if (value == null || value ==""){
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
							iuiphhk_printContextMenu.showAt(e.getXY());
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
							iphhk_confirmUpdate();
						}
					},{
						iconCls: 'icon16x16-delete',
						tooltip: 'Hapus Data',
						handler: function(grid, rowIndex){
							grid.getSelectionModel().select(rowIndex);
							iphhk_confirmDelete();
						}
					}],
					<?php echo ($_SESSION["IDHAK"] == 2) ? ("hidden:true") : (""); ?>
				},{
					xtype:'actioncolumn',
					width:100,
					text : 'Status Berkas',
					items: [{
						iconCls : 'checked',
						tooltip : 'Ubah Status',
						handler: function(grid, rowIndex, colIndex, node, e) {
							e.stopEvent();
							iuiphhk_prosesContextMenu.showAt(e.getXY());
							return false;
						}
					}],
					<?php echo ($_SESSION["IDHAK"] == 2) ? ("hidden:true") : (""); ?>
				}			
			],
			tbar : [
				iphhk_addButton,
				// iphhk_editButton,
				// iphhk_deleteButton,
				iphhk_gridSearchField,
				// iphhk_searchButton,
				iphhk_refreshButton,
				iphhk_printButton,
				iphhk_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : iphhk_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					iphhk_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */

/* START RIWAYAT DOKUMEN */
		var det_iuiphhk_rencana_alat_dataStore = Ext.create('Ext.data.Store',{
			id : 'ipmbl_det_riwayatDataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_iuiphhk/switchAction',
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
					action : 'GETR_ALAT'
				}
			}),
			fields : [
				{ name : 'ID_RENCANA_ALAT', type : 'int', mapping : 'ID_RENCANA_ALAT' },
				{ name : 'NAMA_ALAT', type : 'string', mapping : 'NAMA_ALAMAT' },
				{ name : 'JUMLAH', type : 'string', mapping : 'JUMLAH' },
				{ name : 'KAPASITAS', type : 'string', mapping : 'KAPASITAS' },
				{ name : 'MERK', type : 'string', mapping : 'MERK' },
				{ name : 'TAHUN', type : 'string', mapping : 'TAHUN' },
				{ name : 'NEGARA', type : 'string', mapping : 'NEGARA' },
				{ name : 'HARGA', type : 'string', mapping : 'HARGA' },
				{ name : 'JENIS', type : 'string', mapping : 'JENIS' }
			]
		});
		function det_iuiphhk_rencana_alat_addHandler(){
			det_iuiphhk_rencana_alat_roleRowEditor.cancelEdit();
			var data_rencana_alatDetail = {
				ID_RENCANA_ALAT : 0,
				NAMA_ALAT : '',
				JUMLAH : '',
				KAPASITAS : '',
				MERK : '',
				TAHUN : '',
				NEGARA : '',
				HARGA : '',
				JENIS : ''
				
			};
			det_iuiphhk_rencana_alat_dataStore.insert(0, data_rencana_alatDetail);
			det_iuiphhk_rencana_alat_roleRowEditor.startEdit(0, 0);
		}
		function det_iuiphhk_rencana_alat_deleteHandler(){
			var sm = det_iuiphhk_rencana_alat_gridPanel.getSelectionModel();
			det_iuiphhk_rencana_alat_roleRowEditor.cancelEdit();
			det_iuiphhk_rencana_alat_dataStore.remove(sm.getSelection());
			if (det_iuiphhk_rencana_alat_dataStore.getCount() > 0) {
				sm.select(0);
			}
		}
		det_iuiphhk_rencana_alat_addEditor = Ext.create('Ext.Button',{
			text: globalAddButtonTitle,
			iconCls: 'icon16x16-add',
			handler : det_iuiphhk_rencana_alat_addHandler
		});
		det_iuiphhk_rencana_alat_deleteEditor = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : det_iuiphhk_rencana_alat_deleteHandler
		});
		var det_iuiphhk_rencana_alat_roleRowEditor = Ext.create('Ext.grid.plugin.RowEditing', {
			clicksToMoveEditor : 1,
			autoCancel : false
		});
		det_iuiphhk_rencana_alat_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'det_iuiphhk_rencana_alat_gridPanel',
			title : 'Mesin / Peralatan Produksi Impor',
			constrain : true,
			store : det_iuiphhk_rencana_alat_dataStore,
			loadMask : true,
			height : 200,
			width : '100%',
			plugins: [det_iuiphhk_rencana_alat_roleRowEditor],
            enableColLock : false,
			selModel : Ext.selection.Model(),
			multiSelect : false,
			tbar: [det_iuiphhk_rencana_alat_addEditor,det_iuiphhk_rencana_alat_deleteEditor],
			columns : [
				{
					text : 'Nama Alat',
					dataIndex : 'NAMA_ALAT',
					width : 100,
					sortable : false,
					editor : Ext.create('Ext.form.TextField',{
						maxLength : 50
					})
				},
				{
					text : 'Jumlah',
					dataIndex: 'JUMLAH',
					width: 100,
					sortable : false,
					editor : Ext.create('Ext.form.TextField',{
						maxLength : 50
					})
				},
				{
					text : 'Kapasitas',
					dataIndex: 'KAPASITAS',
					width: 100,
					sortable : false,
					// renderer : Ext.util.Format.dateRenderer('d-m-Y'),
					editor : Ext.create('Ext.form.TextField',{
						maxLength : 50
					})
				},
				{
					text : 'Merk',
					dataIndex: 'MERK',
					width: 100,
					sortable : false,
					editor : Ext.create('Ext.form.TextField',{
						maxLength : 50
					})
				},
				{
					text : 'Tahun',
					dataIndex: 'TAHUN',
					width: 100,
					sortable : false,
					editor : Ext.create('Ext.form.TextField',{
						maxLength : 50
					})
				},
				{
					text : 'Negara',
					dataIndex: 'NEGARA',
					width: 100,
					sortable : false,
					editor : Ext.create('Ext.form.TextField',{
						maxLength : 50
					})
				},
				{
					text : 'Harga',
					dataIndex: 'HARGA',
					width: 100,
					sortable : false,
					editor : Ext.create('Ext.form.TextField',{
						maxLength : 50
					})
				},
				{
					text : 'Jenis',
					dataIndex: 'JENIS',
					width: 100,
					sortable : false,
					editor : Ext.create('Ext.form.TextField',{
						maxLength : 50
					})
				}
			]
		});
		
		/* END RIWAYAT DOKUMEN */

		/* START RIWAYAT DOKUMEN */
		var det_iuiphhk_rencana_alat_e_dataStore = Ext.create('Ext.data.Store',{
			id : 'ipmbl_det_riwayatDataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_iuiphhk/switchAction',
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
					action : 'GETR_ALAT'
				}
			}),
			fields : [
				{ name : 'ID_RENCANA_ALAT', type : 'int', mapping : 'ID_RENCANA_ALAT' },
				{ name : 'NAMA_ALAT', type : 'string', mapping : 'NAMA_ALAMAT' },
				{ name : 'JUMLAH', type : 'string', mapping : 'JUMLAH' },
				{ name : 'KAPASITAS', type : 'string', mapping : 'KAPASITAS' },
				{ name : 'MERK', type : 'string', mapping : 'MERK' },
				{ name : 'TAHUN', type : 'string', mapping : 'TAHUN' },
				{ name : 'NEGARA', type : 'string', mapping : 'NEGARA' },
				{ name : 'HARGA', type : 'string', mapping : 'HARGA' },
				{ name : 'JENIS', type : 'string', mapping : 'JENIS' }
			]
		});
		function det_iuiphhk_rencana_alat_e_addHandler(){
			det_iuiphhk_rencana_alat_e_roleRowEditor.cancelEdit();
			var data_rencana_alat_eDetail = {
				ID_RENCANA_ALAT : 0,
				NAMA_ALAT : '',
				JUMLAH : '',
				KAPASITAS : '',
				MERK : '',
				TAHUN : '',
				NEGARA : '',
				HARGA : '',
				JENIS : ''
				
			};
			det_iuiphhk_rencana_alat_e_dataStore.insert(0, data_rencana_alat_eDetail);
			det_iuiphhk_rencana_alat_e_roleRowEditor.startEdit(0, 0);
		}
		function det_iuiphhk_rencana_alat_e_deleteHandler(){
			var sm = det_iuiphhk_rencana_alat_e_gridPanel.getSelectionModel();
			det_iuiphhk_rencana_alat_e_roleRowEditor.cancelEdit();
			det_iuiphhk_rencana_alat_e_dataStore.remove(sm.getSelection());
			if (det_iuiphhk_rencana_alat_e_dataStore.getCount() > 0) {
				sm.select(0);
			}
		}
		det_iuiphhk_rencana_alat_e_addEditor = Ext.create('Ext.Button',{
			text: globalAddButtonTitle,
			iconCls: 'icon16x16-add',
			handler : det_iuiphhk_rencana_alat_e_addHandler
		});
		det_iuiphhk_rencana_alat_e_deleteEditor = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : det_iuiphhk_rencana_alat_e_deleteHandler
		});
		var det_iuiphhk_rencana_alat_e_roleRowEditor = Ext.create('Ext.grid.plugin.RowEditing', {
			clicksToMoveEditor : 1,
			autoCancel : false
		});
		det_iuiphhk_rencana_alat_e_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'det_iuiphhk_rencana_alat_e_gridPanel',
			title : 'Mesin / Peralatan Produksi Ekspor',
			constrain : true,
			store : det_iuiphhk_rencana_alat_e_dataStore,
			loadMask : true,
			height : 200,
			width : '100%',
			plugins: [det_iuiphhk_rencana_alat_e_roleRowEditor],
            enableColLock : false,
			selModel : Ext.selection.Model(),
			multiSelect : false,
			tbar: [det_iuiphhk_rencana_alat_e_addEditor,det_iuiphhk_rencana_alat_e_deleteEditor],
			columns : [
				{
					text : 'Nama Alat',
					dataIndex : 'NAMA_ALAT',
					width : 100,
					sortable : false,
					editor : Ext.create('Ext.form.TextField',{
						maxLength : 50
					})
				},
				{
					text : 'Jumlah',
					dataIndex: 'JUMLAH',
					width: 100,
					sortable : false,
					editor : Ext.create('Ext.form.TextField',{
						maxLength : 50
					})
				},
				{
					text : 'Kapasitas',
					dataIndex: 'KAPASITAS',
					width: 100,
					sortable : false,
					// renderer : Ext.util.Format.dateRenderer('d-m-Y'),
					editor : Ext.create('Ext.form.TextField',{
						maxLength : 50
					})
				},
				{
					text : 'Merk',
					dataIndex: 'MERK',
					width: 100,
					sortable : false,
					editor : Ext.create('Ext.form.TextField',{
						maxLength : 50
					})
				},
				{
					text : 'Tahun',
					dataIndex: 'TAHUN',
					width: 100,
					sortable : false,
					editor : Ext.create('Ext.form.TextField',{
						maxLength : 50
					})
				},
				{
					text : 'Negara',
					dataIndex: 'NEGARA',
					width: 100,
					sortable : false,
					editor : Ext.create('Ext.form.TextField',{
						maxLength : 50
					})
				},
				{
					text : 'Harga',
					dataIndex: 'HARGA',
					width: 100,
					sortable : false,
					editor : Ext.create('Ext.form.TextField',{
						maxLength : 50
					})
				},
				{
					text : 'Jenis',
					dataIndex: 'JENIS',
					width: 100,
					sortable : false,
					editor : Ext.create('Ext.form.TextField',{
						maxLength : 50
					})
				}
			]
		});
		
		/* END RIWAYAT DOKUMEN */
		
		/* START RIWAYAT DOKUMEN */
		var det_iuiphhk_rencana_produksi_dataStore = Ext.create('Ext.data.Store',{
			id : 'ipmbl_det_riwayatDataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_iuiphhk/switchAction',
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
					action : 'GETR_PRODUKSI'
				}
			}),
			fields : [
				{ name : 'ID_RENCANA_PRODUKSI', type : 'int', mapping : 'ID_RENCANA_PRODUKSI' },
				{ name : 'JENIS_PRODUK', type : 'string', mapping : 'JENIS_PRODUK' },
				{ name : 'KAPASITAS', type : 'string', mapping : 'KAPASITAS' },
				{ name : 'KETERANGAN', type : 'string', mapping : 'KETERANGAN' }
			]
		});
		function det_iuiphhk_rencana_produksi_addHandler(){
			det_iuiphhk_rencana_produksi_roleRowEditor.cancelEdit();
			var data_rencana_produksiDetail = {
				ID_RENCANA_PRODUKSI : 0,
				JENIS_PRODUK : '',
				KAPASITAS : '',
				KETERANGAN : ''
				
			};
			det_iuiphhk_rencana_produksi_dataStore.insert(0, data_rencana_produksiDetail);
			det_iuiphhk_rencana_produksi_roleRowEditor.startEdit(0, 0);
		}
		function det_iuiphhk_rencana_produksi_deleteHandler(){
			var sm = det_iuiphhk_rencana_produksi_gridPanel.getSelectionModel();
			det_iuiphhk_rencana_produksi_roleRowEditor.cancelEdit();
			det_iuiphhk_rencana_produksi_dataStore.remove(sm.getSelection());
			if (det_iuiphhk_rencana_produksi_dataStore.getCount() > 0) {
				sm.select(0);
			}
		}
		det_iuiphhk_rencana_produksi_addEditor = Ext.create('Ext.Button',{
			text: globalAddButtonTitle,
			iconCls: 'icon16x16-add',
			handler : det_iuiphhk_rencana_produksi_addHandler
		});
		det_iuiphhk_rencana_produksi_deleteEditor = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : det_iuiphhk_rencana_produksi_deleteHandler
		});
		var det_iuiphhk_rencana_produksi_roleRowEditor = Ext.create('Ext.grid.plugin.RowEditing', {
			clicksToMoveEditor : 1,
			autoCancel : false
		});
		det_iuiphhk_rencana_produksi_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'det_iuiphhk_rencana_produksi_gridPanel',
			title : 'Jenis Produksi',
			constrain : true,
			store : det_iuiphhk_rencana_produksi_dataStore,
			loadMask : true,
			height : 200,
			width : '100%',
			plugins: [det_iuiphhk_rencana_produksi_roleRowEditor],
            enableColLock : false,
			selModel : Ext.selection.Model(),
			multiSelect : false,
			tbar: [det_iuiphhk_rencana_produksi_addEditor,det_iuiphhk_rencana_produksi_deleteEditor],
			columns : [
				{
					text : 'Jenis Produk',
					dataIndex : 'JENIS_PRODUK',
					width : 100,
					sortable : false,
					editor : Ext.create('Ext.form.TextField',{
						maxLength : 50
					})
				},
				{
					text : 'Kapasitas',
					dataIndex: 'KAPASITAS',
					width: 100,
					sortable : false,
					editor : Ext.create('Ext.form.TextField',{
						maxLength : 50
					})
				},
				{
					text : 'Keterangan',
					dataIndex: 'KETERANGAN',
					width: 100,
					sortable : false,
					editor : Ext.create('Ext.form.TextField',{
						maxLength : 50
					})
				}
			]
		});
		
		/* END RIWAYAT DOKUMEN */
		/*Get Syarat*/
		iuiphhk_syaratDataStore = Ext.create('Ext.data.Store',{
			id : 'iuiphhk_syaratDataStore',
			pageSize : globalPageSize,
			autoLoad : true,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_iuiphhk/switchAction',
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
		var iuiphhk_syaratGridEditor = new Ext.grid.plugin.CellEditing({
			clicksToEdit: 1
		});
		iuiphhk_syaratGrid = Ext.create('Ext.grid.Panel',{
			id : 'iuiphhk_syaratDataStore',
			store : iuiphhk_syaratDataStore,
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
				},
				{
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
/* Start FormPanel declaration */
		var RETRIBUSI_STATUSField = Ext.create('Ext.form.RadioGroup',{
			fieldLabel : 'Retribusi ',
			vertical : false,
			items : [
				{ boxLabel : 'Gratis', name : 's_retribusi', inputValue : '0', checked : true},
				{ boxLabel : 'Bayar', name : 's_retribusi', inputValue : '1'}
			],
			listeners : {
				change : function(com, newval, oldval, e){
					if(newval.s_retribusi == 1){
						RETRIBUSIField.show();
					}else{
						RETRIBUSIField.hide();
					}
				}
			}
		});
		RETRIBUSIField = Ext.create('Ext.form.TextField',{
			id : 'RETRIBUSIField',
			name : 'RETRIBUSI',
			fieldLabel : 'Retribusi',
			maxLength : 50
		});
		ID_IUIPHHKField = Ext.create('Ext.form.NumberField',{
			id : 'ID_IUIPHHKField',
			name : 'ID_IUIPHHK',
			fieldLabel : 'ID_IUIPHHK<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		ID_PEMOHONField = Ext.create('Ext.form.NumberField',{
			id : 'ID_PEMOHONField',
			name : 'ID_PEMOHON',
			fieldLabel : 'ID_PEMOHON',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		NO_SKField = Ext.create('Ext.form.TextField',{
			id : 'NO_SKField',
			name : 'NO_SK',
			fieldLabel : 'NO_SK',
			maxLength : 50
		});
		NO_SK_LAMAField = Ext.create('Ext.form.TextField',{
			id : 'NO_SK_LAMAField',
			name : 'NO_SK_LAMA',
			fieldLabel : 'No SK Lama',
			maxLength : 50,
			hidden : true 
		});
		JENIS_PERMOHONANField = Ext.create('Ext.form.ComboBox',{
			id : 'JENIS_PERMOHONANField',
			name : 'JENIS_PERMOHONAN',
			fieldLabel : 'Jenis Permohonan',
			store : new Ext.data.ArrayStore({
				fields : ['jenis_id', 'jenis'],
				data : [[1,'Baru'],[2,'Perpanjangan']]
			}),
			displayField : 'jenis',
			valueField : 'jenis_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true,
			listeners : {
				select : function(cmb, rec){
					if(cmb.getValue() == '2'){
						NO_SK_LAMAField.show();
					}else{
						NO_SK_LAMAField.hide();
					}
				}
			}
		});
		NAMA_PERUSAHAANField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_PERUSAHAANField',
			name : 'NAMA_PERUSAHAAN',
			fieldLabel : 'Nama Perusahaan',
			maxLength : 50
		});
		NPWPField = Ext.create('Ext.form.TextField',{
			id : 'NPWPField',
			name : 'NPWP',
			fieldLabel : 'NPWP',
			maxLength : 50
		});
		ALAMATField = Ext.create('Ext.form.TextField',{
			id : 'ALAMATField',
			name : 'ALAMAT',
			fieldLabel : 'Alamat',
			maxLength : 100
		});
		STATUS_MODALField = Ext.create('Ext.form.ComboBox',{
			id : 'STATUS_MODALField',
			name : 'STATUS_MODAL',
			fieldLabel : 'Status Penanaman Modal',
			store : new Ext.data.ArrayStore({
				fields : ['status_modal_id', 'status_modal'],
				data : [[1,'PMA'],[2,'PMDN'],[3,'Non PMA-PMDN']]
			}),
			displayField : 'status_modal',
			valueField : 'status_modal_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true
		});
		NAMA_NOTARISField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_NOTARISField',
			name : 'NAMA_NOTARIS',
			fieldLabel : 'Nama Notaris',
			maxLength : 50
		});
		NO_AKTAField = Ext.create('Ext.form.TextField',{
			id : 'NO_AKTAField',
			name : 'NO_AKTA',
			fieldLabel : 'No Akta',
			maxLength : 50
		});
		PENANGGUNG_JAWABField = Ext.create('Ext.form.TextField',{
			id : 'PENANGGUNG_JAWABField',
			name : 'PENANGGUNG_JAWAB',
			fieldLabel : 'Penanggung Jawab',
			maxLength : 50
		});
		NAMA_DIREKSIField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_DIREKSIField',
			name : 'NAMA_DIREKSI',
			fieldLabel : 'Nama Direksi',
			maxLength : 50
		});
		DEWAN_KOMISARISField = Ext.create('Ext.form.TextField',{
			id : 'DEWAN_KOMISARISField',
			name : 'DEWAN_KOMISARIS',
			fieldLabel : 'Dewan Komisaris',
			maxLength : 50
		});
		TUJUAN_PRODUKSIField = Ext.create('Ext.form.TextField',{
			id : 'TUJUAN_PRODUKSIField',
			name : 'TUJUAN_PRODUKSI',
			fieldLabel : 'Tujuan Produksi',
			maxLength : 200
		});
		/* LOKASI_PABRIKField = Ext.create('Ext.form.TextField',{
			id : 'LOKASI_PABRIKField',
			name : 'LOKASI_PABRIK',
			fieldLabel : 'LOKASI_PABRIK',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/}); */
		LOKASI_PABRIKField = Ext.create('Ext.form.ComboBox',{
			id : 'LOKASI_PABRIKField',
			name : 'LOKASI_PABRIK',
			fieldLabel : 'Lokasi Pabrik',
			store : new Ext.data.ArrayStore({
				fields : ['lokasi_pabrik_id', 'lokasi_pabrik'],
				data : [[1,'Lahan Peruntukan Industri (LPI)'],[2,'Di dalam kawasan Industri / Kawasan Berikat'],[3,'Di luar Kawasan Industri / Kawasan Berikat'],[4,'Komplek Industri'],[5,'Daerah Lainnya']]
			}),
			displayField : 'lokasi_pabrik',
			valueField : 'lokasi_pabrik_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true
		});
		LUAS_TANAHField = Ext.create('Ext.form.TextField',{
			id : 'LUAS_TANAHField',
			name : 'LUAS_TANAH',
			fieldLabel : 'Luas Tanah',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		ALAMAT_PABRIKField = Ext.create('Ext.form.TextField',{
			id : 'ALAMAT_PABRIKField',
			name : 'ALAMAT_PABRIK',
			fieldLabel : 'Alamat Pabrik',
			maxLength : 100
		});
		OLAH1_P_TAHUNField = Ext.create('Ext.form.TextField',{
			id : 'OLAH1_P_TAHUNField',
			name : 'OLAH1_P_TAHUN',
			fieldLabel : 'Tahun',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		OLAH1_P_BULANField = Ext.create('Ext.form.TextField',{
			id : 'OLAH1_P_BULANField',
			name : 'OLAH1_P_BULAN',
			fieldLabel : 'Bulan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		OLAH2_P_TAHUNField = Ext.create('Ext.form.TextField',{
			id : 'OLAH2_P_TAHUNField',
			name : 'OLAH2_P_TAHUN',
			fieldLabel : 'Tahun',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		OLAH2_P_BULANField = Ext.create('Ext.form.TextField',{
			id : 'OLAH2_P_BULANField',
			name : 'OLAH2_P_BULAN',
			fieldLabel : 'Bulan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		OLAH3_P_TAHUNField = Ext.create('Ext.form.TextField',{
			id : 'OLAH3_P_TAHUNField',
			name : 'OLAH3_P_TAHUN',
			fieldLabel : 'Tahun',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		OLAH3_P_BULANField = Ext.create('Ext.form.TextField',{
			id : 'OLAH3_P_BULANField',
			name : 'OLAH3_P_BULAN',
			fieldLabel : 'Bulan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		OLAH1_S_TAHUNField = Ext.create('Ext.form.TextField',{
			id : 'OLAH1_S_TAHUNField',
			name : 'OLAH1_S_TAHUN',
			fieldLabel : 'Tahun',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		OLAH1_S_BULANField = Ext.create('Ext.form.TextField',{
			id : 'OLAH1_S_BULANField',
			name : 'OLAH1_S_BULAN',
			fieldLabel : 'Bulan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		OLAH2_S_TAHUNField = Ext.create('Ext.form.TextField',{
			id : 'OLAH2_S_TAHUNField',
			name : 'OLAH2_S_TAHUN',
			fieldLabel : 'Tahun',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		OLAH2_S_BULANField = Ext.create('Ext.form.TextField',{
			id : 'OLAH2_S_BULANField',
			name : 'OLAH2_S_BULAN',
			fieldLabel : 'Bulan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		OLAH3_S_TAHUNField = Ext.create('Ext.form.TextField',{
			id : 'OLAH3_S_TAHUNField',
			name : 'OLAH3_S_TAHUN',
			fieldLabel : 'Tahun',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		OLAH3_S_BULANField = Ext.create('Ext.form.TextField',{
			id : 'OLAH3_S_BULANField',
			name : 'OLAH3_S_BULAN',
			fieldLabel : 'Bulan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		MT_TANAHField = Ext.create('Ext.form.TextField',{
			id : 'MT_TANAHField',
			name : 'MT_TANAH',
			fieldLabel : 'Tanah',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		MT_BANGUNANField = Ext.create('Ext.form.TextField',{
			id : 'MT_BANGUNANField',
			name : 'MT_BANGUNAN',
			fieldLabel : 'Bangunan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		MT_MESINField = Ext.create('Ext.form.TextField',{
			id : 'MT_MESINField',
			name : 'MT_MESIN',
			fieldLabel : 'Mesin / Peralatan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		MT_DLLField = Ext.create('Ext.form.TextField',{
			id : 'MT_DLLField',
			name : 'MT_DLL',
			fieldLabel : 'Dan Lain - Lain',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		MK_BAHAN_BAKUField = Ext.create('Ext.form.TextField',{
			id : 'MK_BAHAN_BAKUField',
			name : 'MK_BAHAN_BAKU',
			fieldLabel : 'Bahan Baku untuk 4 (empat) Bulan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		MK_UPAHField = Ext.create('Ext.form.TextField',{
			id : 'MK_UPAHField',
			name : 'MK_UPAH',
			fieldLabel : 'Upah',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		MK_DLLField = Ext.create('Ext.form.TextField',{
			id : 'MK_DLLField',
			name : 'MK_DLL',
			fieldLabel : 'Dan Lain - Lain',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		SP_MODAL_SENDIRIField = Ext.create('Ext.form.TextField',{
			id : 'SP_MODAL_SENDIRIField',
			name : 'SP_MODAL_SENDIRI',
			fieldLabel : 'Modal Sendiri',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		SP_PINJAMANField = Ext.create('Ext.form.TextField',{
			id : 'SP_PINJAMANField',
			name : 'SP_PINJAMAN',
			fieldLabel : 'Pinjaman',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		TKI_L_JUMLAHField = Ext.create('Ext.form.TextField',{
			id : 'TKI_L_JUMLAHField',
			name : 'TKI_L_JUMLAH',
			fieldLabel : 'Laki - Laki',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		TKI_P_JUMLAHField = Ext.create('Ext.form.TextField',{
			id : 'TKI_P_JUMLAHField',
			name : 'TKI_P_JUMLAH',
			fieldLabel : 'Wanita',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		TKA_JUMLAHField = Ext.create('Ext.form.TextField',{
			id : 'TKA_JUMLAHField',
			name : 'TKA_JUMLAH',
			fieldLabel : 'Jumlah',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		TKA_ASALField = Ext.create('Ext.form.TextField',{
			id : 'TKA_ASALField',
			name : 'TKA_ASAL',
			fieldLabel : 'Negara Asal',
			maxLength : 255
		});
		TKA_JABATANField = Ext.create('Ext.form.TextField',{
			id : 'TKA_JABATANField',
			name : 'TKA_JABATAN',
			fieldLabel : 'Keahlian / Jabatan',
			maxLength : 50
		});
		TKA_JANGKA_WAKTUField = Ext.create('Ext.form.TextField',{
			id : 'TKA_JANGKA_WAKTUField',
			name : 'TKA_JANGKA_WAKTU',
			fieldLabel : 'Lama Menetap',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		DN_JENIS_PRODUK1Field = Ext.create('Ext.form.TextField',{
			id : 'DN_JENIS_PRODUK1Field',
			name : 'DN_JENIS_PRODUK1',
			fieldLabel : 'Jenis Produk ke-1',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		DN_JENIS_PRODUK2Field = Ext.create('Ext.form.TextField',{
			id : 'DN_JENIS_PRODUK2Field',
			name : 'DN_JENIS_PRODUK2',
			fieldLabel : 'Jenis Produk ke-2',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		DN_JENIS_PRODUK3Field = Ext.create('Ext.form.TextField',{
			id : 'DN_JENIS_PRODUK3Field',
			name : 'DN_JENIS_PRODUK3',
			fieldLabel : 'Jenis Produk ke-3',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		E_JENIS_PRODUK1Field = Ext.create('Ext.form.TextField',{
			id : 'E_JENIS_PRODUK1Field',
			name : 'E_JENIS_PRODUK1',
			fieldLabel : 'Jenis Produk ke-1',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		E_JENIS_PRODUK2Field = Ext.create('Ext.form.TextField',{
			id : 'E_JENIS_PRODUK2Field',
			name : 'E_JENIS_PRODUK2',
			fieldLabel : 'Jenis Produk ke-2',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		E_JENIS_PRODUK3Field = Ext.create('Ext.form.TextField',{
			id : 'E_JENIS_PRODUK3Field',
			name : 'E_JENIS_PRODUK3',
			fieldLabel : 'Jenis Produk ke-3',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		/* MERK_JENIS_PRODUKField = Ext.create('Ext.form.TextField',{
			id : 'MERK_JENIS_PRODUKField',
			name : 'MERK_JENIS_PRODUK',
			fieldLabel : 'MERK_JENIS_PRODUK',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/}); */
		MERK_JENIS_PRODUKField = Ext.create('Ext.form.ComboBox',{
			id : 'MERK_JENIS_PRODUKField',
			name : 'MERK_JENIS_PRODUK',
			fieldLabel : 'Merk Jenis Produk',
			store : new Ext.data.ArrayStore({
				fields : ['merk_jenis_id', 'merk_jenis'],
				data : [[1,'Milik Sendiri'],[2,'Lisensi']]
			}),
			displayField : 'merk_jenis',
			valueField : 'merk_jenis_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true
		});
		BBKB_DN_JUMLAHField = Ext.create('Ext.form.TextField',{
			id : 'BBKB_DN_JUMLAHField',
			name : 'BBKB_DN_JUMLAH',
			fieldLabel : 'Jumlah',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		BBKB_DN_SATUANField = Ext.create('Ext.form.TextField',{
			id : 'BBKB_DN_SATUANField',
			name : 'BBKB_DN_SATUAN',
			fieldLabel : 'Satuan',
			maxLength : 50
		});
		BBKB_DN_ASALField = Ext.create('Ext.form.TextField',{
			id : 'BBKB_DN_ASALField',
			name : 'BBKB_DN_ASAL',
			fieldLabel : 'Asal',
			maxLength : 50
		});
		BBKB_DN_HARGAField = Ext.create('Ext.form.TextField',{
			id : 'BBKB_DN_HARGAField',
			name : 'BBKB_DN_HARGA',
			fieldLabel : 'Harga',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		BBKB_DN_KETERANGANField = Ext.create('Ext.form.TextField',{
			id : 'BBKB_DN_KETERANGANField',
			name : 'BBKB_DN_KETERANGAN',
			fieldLabel : 'Keterangan',
			maxLength : 100
		});
		BBKO_DN_JUMLAHField = Ext.create('Ext.form.TextField',{
			id : 'BBKO_DN_JUMLAHField',
			name : 'BBKO_DN_JUMLAH',
			fieldLabel : 'Jumlah',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		BBKO_DN_SATUANField = Ext.create('Ext.form.TextField',{
			id : 'BBKO_DN_SATUANField',
			name : 'BBKO_DN_SATUAN',
			fieldLabel : 'Satuan',
			maxLength : 50
		});
		BBKO_DN_ASALField = Ext.create('Ext.form.TextField',{
			id : 'BBKO_DN_ASALField',
			name : 'BBKO_DN_ASAL',
			fieldLabel : 'Asal',
			maxLength : 50
		});
		BBKO_DN_HARGAField = Ext.create('Ext.form.TextField',{
			id : 'BBKO_DN_HARGAField',
			name : 'BBKO_DN_HARGA',
			fieldLabel : 'Harga',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		BBKO_DN_KETERANGANField = Ext.create('Ext.form.TextField',{
			id : 'BBKO_DN_KETERANGANField',
			name : 'BBKO_DN_KETERANGAN',
			fieldLabel : 'Keterangan',
			maxLength : 100
		});
		BP_DN_JUMLAHField = Ext.create('Ext.form.TextField',{
			id : 'BP_DN_JUMLAHField',
			name : 'BP_DN_JUMLAH',
			fieldLabel : 'Jumlah',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		BP_DN_SATUANField = Ext.create('Ext.form.TextField',{
			id : 'BP_DN_SATUANField',
			name : 'BP_DN_SATUAN',
			fieldLabel : 'Satuan',
			maxLength : 50
		});
		BP_DN_ASALField = Ext.create('Ext.form.TextField',{
			id : 'BP_DN_ASALField',
			name : 'BP_DN_ASAL',
			fieldLabel : 'Asal',
			maxLength : 50
		});
		BP_DN_HARGAField = Ext.create('Ext.form.TextField',{
			id : 'BP_DN_HARGAField',
			name : 'BP_DN_HARGA',
			fieldLabel : 'Harga',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		BP_DN_KETERANGANField = Ext.create('Ext.form.TextField',{
			id : 'BP_DN_KETERANGANField',
			name : 'BP_DN_KETERANGAN',
			fieldLabel : 'Keterangan',
			maxLength : 100
		});
		
		BBKB_I_JUMLAHField = Ext.create('Ext.form.TextField',{
			id : 'BBKB_I_JUMLAHField',
			name : 'BBKB_I_JUMLAH',
			fieldLabel : 'Jumlah',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		BBKB_I_SATUANField = Ext.create('Ext.form.TextField',{
			id : 'BBKB_I_SATUANField',
			name : 'BBKB_I_SATUAN',
			fieldLabel : 'Satuan',
			maxLength : 50
		});
		BBKB_I_ASALField = Ext.create('Ext.form.TextField',{
			id : 'BBKB_I_ASALField',
			name : 'BBKB_I_ASAL',
			fieldLabel : 'Asal',
			maxLength : 50
		});
		BBKB_I_HARGAField = Ext.create('Ext.form.TextField',{
			id : 'BBKB_I_HARGAField',
			name : 'BBKB_I_HARGA',
			fieldLabel : 'Harga',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		BBKB_I_KETERANGANField = Ext.create('Ext.form.TextField',{
			id : 'BBKB_I_KETERANGANField',
			name : 'BBKB_I_KETERANGAN',
			fieldLabel : 'Keterangan',
			maxLength : 100
		});
		BBKO_I_JUMLAHField = Ext.create('Ext.form.TextField',{
			id : 'BBKO_I_JUMLAH',
			name : 'BBKO_I_JUMLAH',
			fieldLabel : 'Jumlah',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		BBKO_I_SATUANField = Ext.create('Ext.form.TextField',{
			id : 'BBKO_I_SATUANField',
			name : 'BBKO_I_SATUAN',
			fieldLabel : 'Satuan',
			maxLength : 50
		});
		BBKO_I_ASALField = Ext.create('Ext.form.TextField',{
			id : 'BBKO_I_ASALField',
			name : 'BBKO_I_ASAL',
			fieldLabel : 'Asal',
			maxLength : 50
		});
		BBKO_I_HARGAField = Ext.create('Ext.form.TextField',{
			id : 'BBKO_I_HARGAField',
			name : 'BBKO_I_HARGA',
			fieldLabel : 'Harga',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		BBKO_I_KETERANGANField = Ext.create('Ext.form.TextField',{
			id : 'BBKO_I_KETERANGAN',
			name : 'BBKO_I_KETERANGAN',
			fieldLabel : 'Keterangan',
			maxLength : 100
		});
		BP_I_JUMLAHField = Ext.create('Ext.form.TextField',{
			id : 'BP_I_JUMLAHField',
			name : 'BP_I_JUMLAH',
			fieldLabel : 'Jumlah',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		BP_I_SATUANField = Ext.create('Ext.form.TextField',{
			id : 'BP_I_SATUANField',
			name : 'BP_I_SATUAN',
			fieldLabel : 'Satuan',
			maxLength : 50
		});
		BP_I_ASALField = Ext.create('Ext.form.TextField',{
			id : 'BP_I_ASAL',
			name : 'BP_I_ASAL',
			fieldLabel : 'Asal',
			maxLength : 50
		});
		BP_I_HARGAField = Ext.create('Ext.form.TextField',{
			id : 'BP_I_HARGAField',
			name : 'BP_I_HARGA',
			fieldLabel : 'Harga',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		BP_I_KETERANGANField = Ext.create('Ext.form.TextField',{
			id : 'BP_I_KETERANGANField',
			name : 'BP_I_KETERANGAN',
			fieldLabel : 'Keterangan',
			maxLength : 100
		});
		RBB_LUAS_GUDANGField = Ext.create('Ext.form.TextField',{
			id : 'RBB_LUAS_GUDANGField',
			name : 'RBB_LUAS_GUDANG',
			fieldLabel : 'Luas Gudang',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		RBB_KAYU_OLAHANField = Ext.create('Ext.form.TextField',{
			id : 'RBB_KAYU_OLAHANField',
			name : 'RBB_KAYU_OLAHAN',
			fieldLabel : 'Bahan Baku Kayu Olahan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		RBB_PENOLONGField = Ext.create('Ext.form.TextField',{
			id : 'RBB_PENOLONGField',
			name : 'RBB_PENOLONG',
			fieldLabel : 'Bahan Baku Penolong',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		RBB_HASIL_PRODUKSIField = Ext.create('Ext.form.TextField',{
			id : 'RBB_HASIL_PRODUKSIField',
			name : 'RBB_HASIL_PRODUKSI',
			fieldLabel : 'Hasil Produksi',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		RLPLY_LOKASIField = Ext.create('Ext.form.TextField',{
			id : 'RLPLY_LOKASIField',
			name : 'RLPLY_LOKASI',
			fieldLabel : 'Lokasi',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		RLPLY_LUASField = Ext.create('Ext.form.TextField',{
			id : 'RLPLY_LUASField',
			name : 'RLPLY_LUAS',
			fieldLabel : 'Luas',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		RLPLY_PERIZINANField = Ext.create('Ext.form.TextField',{
			id : 'RLPLY_PERIZINANField',
			name : 'RLPLY_PERIZINAN',
			fieldLabel : 'Perizinan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		RSD1_KAPASITASField = Ext.create('Ext.form.TextField',{
			id : 'RSD1_KAPASITASField',
			name : 'RSD1_KAPASITAS',
			fieldLabel : 'Kapasitas',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		RSD1_JUMLAHField = Ext.create('Ext.form.TextField',{
			id : 'RSD1_JUMLAHField',
			name : 'RSD1_JUMLAH',
			fieldLabel : 'Jumlah',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		RSD211_KAPASITASField = Ext.create('Ext.form.TextField',{
			id : 'RSD211_KAPASITASField',
			name : 'RSD211_KAPASITAS',
			fieldLabel : 'Kapasitas',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		RSD211_JUMLAHField = Ext.create('Ext.form.TextField',{
			id : 'RSD211_JUMLAHField',
			name : 'RSD211_JUMLAH',
			fieldLabel : 'Jumlah',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		RSD212_KAPASITASField = Ext.create('Ext.form.TextField',{
			id : 'RSD212_KAPASITASField',
			name : 'RSD212_KAPASITAS',
			fieldLabel : 'Kapasitas',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		RSD212_JUMLAHField = Ext.create('Ext.form.TextField',{
			id : 'RSD212_JUMLAHField',
			name : 'RSD212_JUMLAH',
			fieldLabel : 'Jumlah',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		RSD213_KAPASITASField = Ext.create('Ext.form.TextField',{
			id : 'RSD213_KAPASITASField',
			name : 'RSD213_KAPASITAS',
			fieldLabel : 'Kapasitas',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		RSD213_JUMLAHField = Ext.create('Ext.form.TextField',{
			id : 'RSD213_JUMLAHField',
			name : 'RSD213_JUMLAH',
			fieldLabel : 'Jumlah',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		RSD22_KAPASITASField = Ext.create('Ext.form.TextField',{
			id : 'RSD22_KAPASITASField',
			name : 'RSD22_KAPASITAS',
			fieldLabel : 'Kapasitas',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		RSD22_JUMLAHField = Ext.create('Ext.form.TextField',{
			id : 'RSD22_JUMLAHField',
			name : 'RSD22_JUMLAH',
			fieldLabel : 'Jumlah',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		RSD23_KAPASITASField = Ext.create('Ext.form.TextField',{
			id : 'RSD23_KAPASITASField',
			name : 'RSD23_KAPASITAS',
			fieldLabel : 'Kapasitas',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		RSD23_JUMLAHField = Ext.create('Ext.form.TextField',{
			id : 'RSD23_JUMLAHField',
			name : 'RSD23_JUMLAH',
			fieldLabel : 'Jumlah',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		RPL1_VOLUMEField = Ext.create('Ext.form.TextField',{
			id : 'RPL1_VOLUMEField',
			name : 'RPL1_VOLUME',
			fieldLabel : 'Volume',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		RPL1_SATUANField = Ext.create('Ext.form.TextField',{
			id : 'RPL1_SATUANField',
			name : 'RPL1_SATUAN',
			fieldLabel : 'Satuan',
			maxLength : 50
		});
		RPL1_PENANGANANField = Ext.create('Ext.form.TextField',{
			id : 'RPL1_PENANGANANField',
			name : 'RPL1_PENANGANAN',
			fieldLabel : 'Penanganan',
			maxLength : 100
		});
		RPL2_VOLUMEField = Ext.create('Ext.form.TextField',{
			id : 'RPL2_VOLUMEField',
			name : 'RPL2_VOLUME',
			fieldLabel : 'Volume',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		RPL2_SATUANField = Ext.create('Ext.form.TextField',{
			id : 'RPL2_SATUANField',
			name : 'RPL2_SATUAN',
			fieldLabel : 'Satuan',
			maxLength : 50
		});
		RPL2_PENANGANANField = Ext.create('Ext.form.TextField',{
			id : 'RPL2_PENANGANANField',
			name : 'RPL2_PENANGANAN',
			fieldLabel : 'Penanganan',
			maxLength : 100
		});
		RPL3_VOLUMEField = Ext.create('Ext.form.TextField',{
			id : 'RPL3_VOLUMEField',
			name : 'RPL3_VOLUME',
			fieldLabel : 'Volume',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		RPL3_SATUANField = Ext.create('Ext.form.TextField',{
			id : 'RPL3_SATUANField',
			name : 'RPL3_SATUAN',
			fieldLabel : 'Satuan',
			maxLength : 50
		});
		RPL3_PENANGANANField = Ext.create('Ext.form.TextField',{
			id : 'RPL3_PENANGANANField',
			name : 'RPL3_PENANGANAN',
			fieldLabel : 'Penanganan',
			maxLength : 100
		});
		RPL4_VOLUMEField = Ext.create('Ext.form.TextField',{
			id : 'RPL4_VOLUMEField',
			name : 'RPL4_VOLUME',
			fieldLabel : 'Volume',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		RPL4_SATUANField = Ext.create('Ext.form.TextField',{
			id : 'RPL4_SATUANField',
			name : 'RPL4_SATUAN',
			fieldLabel : 'Satuan',
			maxLength : 50
		});
		RPL4_PENANGANANField = Ext.create('Ext.form.TextField',{
			id : 'RPL4_PENANGANANField',
			name : 'RPL4_PENANGANAN',
			fieldLabel : 'Penanganan',
			maxLength : 100
		});
		PENYETUJUField = Ext.create('Ext.form.TextField',{
			id : 'PENYETUJUField',
			name : 'PENYETUJU',
			fieldLabel : 'Disetujui Oleh',
			maxLength : 50
		});
		NOMOR_SURATField = Ext.create('Ext.form.TextField',{
			id : 'NOMOR_SURATField',
			name : 'NOMOR_SURAT',
			fieldLabel : 'Nomor Surat',
			maxLength : 50
		});
		TGL_TERLAMPIRField = Ext.create('Ext.form.Date',{
			id : 'TGL_TERLAMPIRFieuld',
			name : 'TGL_TERLAMPIR',
			format : 'd-m-Y',
			fieldLabel : 'Tanggal Terlampir',
			maxLength : 20
		});
		TGL_PERMOHONANField = Ext.create('Ext.form.TextField',{
			id : 'TGL_PERMOHONANField',
			name : 'TGL_PERMOHONAN',
			fieldLabel : 'TGL_PERMOHONAN',
			maxLength : 0,
			hidden : true
		});
		STATUS_SURVEYField = Ext.create('Ext.form.ComboBox',{
			id : 'STATUS_SURVEYField',
			name : 'STATUS_SURVEY',
			fieldLabel : 'Hasil Survey',
			store : new Ext.data.ArrayStore({
				fields : ['survey_id', 'survey'],
				data : [['1','Lolos Survey'],['0','Tidak Lolos Survey']]
			}),
			displayField : 'survey',
			valueField : 'survey_id',
			queryMode : 'local',
			<?php echo ($_SESSION["IDHAK"] == 2) ? ("hidden : true,") : (""); ?>
			triggerAction : 'all',
			forceSelection : true
		});
		STATUSField = Ext.create('Ext.form.ComboBox',{
			id : 'STATUSField',
			name : 'STATUS',
			fieldLabel : 'Status Permohonan',
			store : new Ext.data.ArrayStore({
				fields : ['status_id', 'status'],
				data : [['1','Diterima'],['0','Ditolak']]
			}),
			displayField : 'status',
			valueField : 'status_id',
			queryMode : 'local',
			triggerAction : 'all',
			<?php echo ($_SESSION["IDHAK"] == 2) ? ("hidden : true,") : (""); ?>
			forceSelection : true
		});
		TGL_BERLAKUField = Ext.create('Ext.form.TextField',{
			id : 'TGL_BERLAKUField',
			name : 'TGL_BERLAKU',
			fieldLabel : 'TGL_BERLAKU',
			maxLength : 0,
			hidden : true
		});
		TGL_BERAKHIRField = Ext.create('Ext.form.Date',{
			id : 'TGL_BERAKHIRField',
			name : 'TGL_BERAKHIR',
			fieldLabel : 'Masa Berlaku',
			format : 'd-m-Y',
			maxLength : 10,
			<?php echo ($_SESSION["IDHAK"] == 2) ? ("hidden : true,") : (""); ?>
		});
		/*Data Pemohon*/
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
					{ name : 'pemohon_nik', type : 'string', mapping : 'pemohon_nik' },
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
		pemohon_namaField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_namaField',
			name : 'pemohon_nama',
			fieldLabel : 'Nama Pemohon',
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
		pemohon_idField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_idField',
			name : 'pemohon_id',
			fieldLabel : '',
			maxLength : 20,
			hidden:true
		});
		/*End Data Pemohon*/
		var iphhk_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : iphhk_save
		});
		var iphhk_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				iphhk_resetForm();
				iphhk_switchToGrid();
				$('html, body').animate({scrollTop: 0}, 500);
			}
		});
		iphhk_formPanel = Ext.create('Ext.form.Panel', {
			disabled : true,
			frame : true,
			layout : {
				type : 'form',
				padding : 5
			},
			defaults : {anchor : '95%'},
			items: [
				{
					xtype : 'fieldset',
					title : 'IUIPHKK',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
							JENIS_PERMOHONANField,
							NO_SK_LAMAField
							]
				},{
					xtype : 'fieldset',
					title : '1. Data Pemohon',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
							pemohon_nikField,
							pemohon_namaField,
							pemohon_alamatField,
							pemohon_telpField,
							]
				}, {
					xtype : 'fieldset',
					title : '2. Administrasi Perusahaan',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
							NAMA_PERUSAHAANField,
							NPWPField,
							ALAMATField,
							STATUS_MODALField,
							NAMA_NOTARISField,
							NO_AKTAField,
							PENANGGUNG_JAWABField,
							NAMA_DIREKSIField,
							DEWAN_KOMISARISField,
							TUJUAN_PRODUKSIField
							]
				}, {
					xtype : 'fieldset',
					title : '3. Rencana Lokasi Pabrik',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
							LOKASI_PABRIKField,
							LUAS_TANAHField,
							ALAMAT_PABRIKField,
							]
				}, {
					xtype : 'fieldset',
					title : '4. Rencana Penyelesaian Pembangunan Pabrik dan Sarana Produksi',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
							{
								xtype : 'fieldset',
								title : '1. Penyelesaian Pembangunan Pabrik',
								checkboxToggle : false,
								collapsible : false,
								layout :'form',
								border : false,
								items : [
									{
										xtype : 'fieldset',
										title : 'a. Pengolahan kayu bulat menjadi kayu olahan',
										checkboxToggle : false,
										collapsible : false,
										layout :'form',
										border : false,
										items : [
											OLAH1_P_TAHUNField,
											OLAH1_P_BULANField,
										]
									}, {
										xtype : 'fieldset',
										title : 'b. Pengolahan kayu olahan menjadi kayu olahan lain',
										checkboxToggle : false,
										collapsible : false,
										layout :'form',
										border : false,
										items : [
											OLAH2_P_TAHUNField,
											OLAH2_P_BULANField,
										]
									}, {
										xtype : 'fieldset',
										title : 'c. Pengolahan HHBK menjadi produk lain',
										checkboxToggle : false,
										collapsible : false,
										border : false,
										layout :'form',
										items : [
											OLAH3_P_TAHUNField,
											OLAH3_P_BULANField,
										]
									}
								]
							},{
								xtype : 'fieldset',
								title : '2. Penyelesaian Pembangunan Sarana Produksi',
								checkboxToggle : false,
								collapsible : false,
								border : false,
								layout :'form',
								items : [
									{
										xtype : 'fieldset',
										title : 'a. Pengolahan kayu bulat menjadi kayu olahan',
										checkboxToggle : false,
										collapsible : false,
										layout :'form',
										border : false,
										items : [
											OLAH1_S_TAHUNField,
											OLAH1_S_BULANField,
										]
									}, {
										xtype : 'fieldset',
										title : 'b. Pengolahan kayu olahan menjadi kayu olahan lain',
										checkboxToggle : false,
										collapsible : false,
										layout :'form',
										border : false,
										items : [
											OLAH2_S_TAHUNField,
											OLAH2_S_BULANField,
										]
									}, {
										xtype : 'fieldset',
										title : 'c. Pengolahan HHBK menjadi produk lain',
										checkboxToggle : false,
										collapsible : false,
										layout :'form',
										border : false,
										items : [
											OLAH3_S_TAHUNField,
											OLAH3_S_BULANField,
										]
									}
								]
							},
						]
				}, {
					xtype : 'fieldset',
					title : '5. Rencana Nilai Investasi',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
							{
								xtype : 'fieldset',
								title : '1. Modal Tetap',
								checkboxToggle : false,
								collapsible : false,
								border : false,
								layout :'form',
								items : [
									MT_TANAHField,
									MT_BANGUNANField,
									MT_MESINField,
									MT_DLLField,
								]
							}, {
								xtype : 'fieldset',
								title : '2. Modal Kerja',
								checkboxToggle : false,
								collapsible : false,
								border : false,
								layout :'form',
								items : [
									MK_BAHAN_BAKUField,
									MK_UPAHField,
									MK_DLLField,
								]
							}, {
								xtype : 'fieldset',
								title : '3. Sumber Pembiayaan',
								checkboxToggle : false,
								collapsible : false,
								border : false,
								layout :'form',
								items : [
									SP_MODAL_SENDIRIField,
									SP_PINJAMANField,
								]
							}
						]
				}, {
					xtype : 'fieldset',
					title : '6. Rencana Penyerapan Tenaga Kerja',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
							{
								xtype : 'fieldset',
								title : '1. Penggunaan Tenaga Kerja Indonesia',
								checkboxToggle : false,
								collapsible : false,
								border : false,
								layout :'form',
								items : [
									TKI_L_JUMLAHField,
									TKI_P_JUMLAHField,
								]
							}, {
								xtype : 'fieldset',
								title : '2. Penggunaan Tenaga Kerja Asing',
								checkboxToggle : false,
								collapsible : false,
								border : false,
								layout :'form',
								items : [
									TKA_JUMLAHField,
									TKA_ASALField,
									TKA_JABATANField,
									TKA_JANGKA_WAKTUField,
								]
							}
						]
				}, {
					xtype : 'fieldset',
					title : '7. Rencana Pemasaran',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
							{
								xtype : 'fieldset',
								title : '1. Dalam Negeri',
								checkboxToggle : false,
								collapsible : false,
								border : false,
								layout :'form',
								items : [
									DN_JENIS_PRODUK1Field,
									DN_JENIS_PRODUK2Field,
									DN_JENIS_PRODUK3Field,
								]
							}, {
								xtype : 'fieldset',
								title : '2. Ekspor',
								checkboxToggle : false,
								collapsible : false,
								border : false,
								layout :'form',
								items : [
									E_JENIS_PRODUK1Field,
									E_JENIS_PRODUK2Field,
									E_JENIS_PRODUK3Field,
								]
							},
							MERK_JENIS_PRODUKField,
						]
				}, {
					xtype : 'fieldset',
					title : 'Daftar Rencana Mesin Dan Peralatan Yang Digunakan',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
							det_iuiphhk_rencana_alat_gridPanel,
							det_iuiphhk_rencana_alat_e_gridPanel
							]
				}, {
					xtype : 'fieldset',
					title : 'Daftar Rencana Jenis Produksi dan Kapasitas Produksi',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
							det_iuiphhk_rencana_produksi_gridPanel,
							]
				}, {
					xtype : 'fieldset',
					title : '8. Daftar Pemenuhan Bahan Baku Kayu',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
								{
									xtype : 'fieldset',
									title : '1. Bahan Baku Kayu Bulat',
									checkboxToggle : false,
									collapsible : false,
									border : false,
									layout :'form',
									items : [
												{
													xtype : 'fieldset',
													title : 'a. Dalam Negeri',
													checkboxToggle : false,
													collapsible : false,
													border : false,
													layout :'form',
													items : [
															BBKB_DN_JUMLAHField,
															BBKB_DN_SATUANField,
															BBKB_DN_ASALField,
															BBKB_DN_HARGAField,
															BBKB_DN_KETERANGANField,
															]
												},{
													xtype : 'fieldset',
													title : 'b. Impor',
													border : false,
													checkboxToggle : false,
													collapsible : false,
													layout :'form',
													items : [
															BBKB_I_JUMLAHField,
															BBKB_I_SATUANField,
															BBKB_I_ASALField,
															BBKB_I_HARGAField,
															BBKB_I_KETERANGANField,
															]
												}
											]
								}, {
									xtype : 'fieldset',
									title : '2. Bahan Baku Kayu Olahan',
									checkboxToggle : false,
									border : false,
									collapsible : false,
									layout :'form',
									items : [
												{
													xtype : 'fieldset',
													title : 'a. Dalam Negeri',
													border : false,
													checkboxToggle : false,
													collapsible : false,
													layout :'form',
													items : [
															BBKO_DN_JUMLAHField,
															BBKO_DN_SATUANField,
															BBKO_DN_ASALField,
															BBKO_DN_HARGAField,
															BBKO_DN_KETERANGANField,
															]
												},{
													xtype : 'fieldset',
													title : 'b. Impor',
													border : false,
													checkboxToggle : false,
													collapsible : false,
													layout :'form',
													items : [
															BBKO_I_JUMLAHField,
															BBKO_I_SATUANField,
															BBKO_I_ASALField,
															BBKO_I_HARGAField,
															BBKO_I_KETERANGANField,
															]
												}
											]
								}, {
									xtype : 'fieldset',
									title : '3. Bahan Penoling',
									checkboxToggle : false,
									collapsible : false,
									border : false,
									layout :'form',
									items : [
												{
													xtype : 'fieldset',
													title : 'a. Dalam Negeri',
													checkboxToggle : false,
													border : false,
													collapsible : false,
													layout :'form',
													items : [
															BP_DN_JUMLAHField,
															BP_DN_SATUANField,
															BP_DN_ASALField,
															BP_DN_HARGAField,
															BP_DN_KETERANGANField,
															]
												},{
													xtype : 'fieldset',
													title : 'b. Impor',
													checkboxToggle : false,
													border : false,
													collapsible : false,
													layout :'form',
													items : [
															BP_I_JUMLAHField,
															BP_I_SATUANField,
															BP_I_ASALField,
															BP_I_HARGAField,
															BP_I_KETERANGANField,
															]
												}
											]
								}
							]
				}, {
					xtype : 'fieldset',
					title : '9. Rencana Gudang Bahan Baku dan Hasil Produksi',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
							RBB_LUAS_GUDANGField,
							RBB_KAYU_OLAHANField,
							RBB_PENOLONGField,
							RBB_HASIL_PRODUKSIField,
							]
				}, {
					xtype : 'fieldset',
					title : '10. Rencana Log Pond Log Yard',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
							RLPLY_LOKASIField,
							RLPLY_LUASField,
							RLPLY_PERIZINANField,
							]
				}, {
					xtype : 'fieldset',
					title : '11. Rencana Sumber Daya Energi',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
							{
								xtype : 'fieldset',
								title : 'a. Air',
								border : false,
								checkboxToggle : false,
								collapsible : false,
								layout :'form',
								items : [
										RSD1_KAPASITASField,
										RSD1_JUMLAHField,
										]
							}, {
								xtype : 'fieldset',
								title : 'b. Energi Penggerak',
								border : false,
								checkboxToggle : false,
								collapsible : false,
								layout :'form',
								items : [
										{
											xtype : 'fieldset',
											title : '- PLN',
											checkboxToggle : false,
											border : false,
											collapsible : false,
											layout :'form',
											items : [
													RSD211_KAPASITASField,
													RSD211_JUMLAHField,
													]
										}, {
											xtype : 'fieldset',
											title : '- Ganset',
											checkboxToggle : false,
											border : false,
											collapsible : false,
											layout :'form',
											items : [
													RSD212_KAPASITASField,
													RSD212_JUMLAHField,
													]
										}, {
											xtype : 'fieldset',
											title : '- Pembangkit Listrik (Power Plant)',
											checkboxToggle : false,
											border : false,
											collapsible : false,
											layout :'form',
											items : [
													RSD213_KAPASITASField,
													RSD213_JUMLAHField,
													]
										}
										]
							}, {
								xtype : 'fieldset',
								title : 'b. Gas',
								checkboxToggle : false,
								border : false,
								collapsible : false,
								layout :'form',
								items : [
										RSD22_KAPASITASField,
										RSD22_JUMLAHField,
										]
							}, {
								xtype : 'fieldset',
								title : 'c. Lain - Lain',
								border : false,
								checkboxToggle : false,
								collapsible : false,
								layout :'form',
								items : [
										RSD23_KAPASITASField,
										RSD23_JUMLAHField,
										]
							}
							]
				}, {
					xtype : 'fieldset',
					title : '12. Rencana Pengelolaan Lingkungan',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
							{
								xtype : 'fieldset',
								title : 'a. Padat',
								border : false,
								checkboxToggle : false,
								collapsible : false,
								layout :'form',
								items : [
										RPL1_VOLUMEField,
										RPL1_SATUANField,
										RPL1_PENANGANANField
										]
							}, {
								xtype : 'fieldset',
								title : 'b. Gas',
								checkboxToggle : false,
								border : false,
								collapsible : false,
								layout :'form',
								items : [
										RPL2_VOLUMEField,
										RPL2_SATUANField,
										RPL2_PENANGANANField
										]
							}, {
								xtype : 'fieldset',
								title : 'c. Cair',
								checkboxToggle : false,
								collapsible : false,
								border : false,
								layout :'form',
								items : [
										RPL3_VOLUMEField,
										RPL3_SATUANField,
										RPL3_PENANGANANField
										]
							}, {
								xtype : 'fieldset',
								title : 'd. Lain - Lain',
								checkboxToggle : false,
								border : false,
								collapsible : false,
								layout :'form',
								items : [
										RPL4_VOLUMEField,
										RPL4_SATUANField,
										RPL4_PENANGANANField
										]
							}
							]
				}, {
						xtype : 'fieldset',
						title : '13. Dokumen UKL-UPL',
						checkboxToggle : false,
						collapsible : false,
						layout :'form',
						items : [
							PENYETUJUField,
							NOMOR_SURATField,
							TGL_TERLAMPIRField,
						]
				}, {
						xtype : 'fieldset',
						title : '14. Data Kelengkapan',
						checkboxToggle : false,
						collapsible : false,
						<?//php echo ($_SESSION["IDHAK"] == 2) ? ("hidden : true,") : (""); ?>
						layout :'form',
						items : [
							iuiphhk_syaratGrid
						]
				}, {
						xtype : 'fieldset',
						title : '15. Data Pendukung',
						checkboxToggle : false,
						collapsible : false,
						<?php echo ($_SESSION["IDHAK"] == 2) ? ("hidden : true,") : (""); ?>
						layout :'form',
						items : [
							// TGL_PERMOHONANField,
							STATUS_SURVEYField,
							// STATUSField,
							// TGL_BERLAKUField,
							TGL_BERAKHIRField,
							<?php echo ($_SESSION["IDHAK"] == 2) ? ("") : ("RETRIBUSI_STATUSField,"); ?>
							<?php echo ($_SESSION["IDHAK"] == 2) ? ("") : ("RETRIBUSIField,"); ?>
						]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [iphhk_saveButton,iphhk_cancelButton]
		});
		iphhk_formWindow = Ext.create('Ext.window.Window',{
			id : 'iphhk_formWindow',
			renderTo : 'iphhkSaveWindow',
			title : globalFormAddEditTitle + ' ' + iphhk_componentItemTitle,
			width : 600,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [iphhk_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		ID_PEMOHONSearchField = Ext.create('Ext.form.TextField',{
			id : 'ID_PEMOHONSearchField',
			name : 'ID_PEMOHON',
			fieldLabel : 'ID_PEMOHON',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		NO_SKSearchField = Ext.create('Ext.form.TextField',{
			id : 'NO_SKSearchField',
			name : 'NO_SK',
			fieldLabel : 'NO_SK',
			maxLength : 50
		
		});
		NO_SK_LAMASearchField = Ext.create('Ext.form.TextField',{
			id : 'NO_SK_LAMASearchField',
			name : 'NO_SK_LAMA',
			fieldLabel : 'NO_SK_LAMA',
			maxLength : 50
		
		});
		JENIS_PERMOHONANSearchField = Ext.create('Ext.form.TextField',{
			id : 'JENIS_PERMOHONANSearchField',
			name : 'JENIS_PERMOHONAN',
			fieldLabel : 'JENIS_PERMOHONAN',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		NAMA_PERUSAHAANSearchField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_PERUSAHAANSearchField',
			name : 'NAMA_PERUSAHAAN',
			fieldLabel : 'NAMA_PERUSAHAAN',
			maxLength : 50
		
		});
		NPWPSearchField = Ext.create('Ext.form.TextField',{
			id : 'NPWPSearchField',
			name : 'NPWP',
			fieldLabel : 'NPWP',
			maxLength : 50
		
		});
		ALAMATSearchField = Ext.create('Ext.form.TextField',{
			id : 'ALAMATSearchField',
			name : 'ALAMAT',
			fieldLabel : 'ALAMAT',
			maxLength : 100
		
		});
		STATUS_MODALSearchField = Ext.create('Ext.form.TextField',{
			id : 'STATUS_MODALSearchField',
			name : 'STATUS_MODAL',
			fieldLabel : 'STATUS_MODAL',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		NAMA_NOTARISSearchField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_NOTARISSearchField',
			name : 'NAMA_NOTARIS',
			fieldLabel : 'NAMA_NOTARIS',
			maxLength : 50
		
		});
		NO_AKTASearchField = Ext.create('Ext.form.TextField',{
			id : 'NO_AKTASearchField',
			name : 'NO_AKTA',
			fieldLabel : 'NO_AKTA',
			maxLength : 50
		
		});
		PENANGGUNG_JAWABSearchField = Ext.create('Ext.form.TextField',{
			id : 'PENANGGUNG_JAWABSearchField',
			name : 'PENANGGUNG_JAWAB',
			fieldLabel : 'PENANGGUNG_JAWAB',
			maxLength : 50
		
		});
		NAMA_DIREKSISearchField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_DIREKSISearchField',
			name : 'NAMA_DIREKSI',
			fieldLabel : 'NAMA_DIREKSI',
			maxLength : 50
		
		});
		DEWAN_KOMISARISSearchField = Ext.create('Ext.form.TextField',{
			id : 'DEWAN_KOMISARISSearchField',
			name : 'DEWAN_KOMISARIS',
			fieldLabel : 'DEWAN_KOMISARIS',
			maxLength : 50
		
		});
		TUJUAN_PRODUKSISearchField = Ext.create('Ext.form.TextField',{
			id : 'TUJUAN_PRODUKSISearchField',
			name : 'TUJUAN_PRODUKSI',
			fieldLabel : 'TUJUAN_PRODUKSI',
			maxLength : 200
		
		});
		LOKASI_PABRIKSearchField = Ext.create('Ext.form.TextField',{
			id : 'LOKASI_PABRIKSearchField',
			name : 'LOKASI_PABRIK',
			fieldLabel : 'LOKASI_PABRIK',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		LUAS_TANAHSearchField = Ext.create('Ext.form.TextField',{
			id : 'LUAS_TANAHSearchField',
			name : 'LUAS_TANAH',
			fieldLabel : 'LUAS_TANAH',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		ALAMAT_PABRIKSearchField = Ext.create('Ext.form.TextField',{
			id : 'ALAMAT_PABRIKSearchField',
			name : 'ALAMAT_PABRIK',
			fieldLabel : 'ALAMAT_PABRIK',
			maxLength : 100
		
		});
		OLAH1_P_TAHUNSearchField = Ext.create('Ext.form.TextField',{
			id : 'OLAH1_P_TAHUNSearchField',
			name : 'OLAH1_P_TAHUN',
			fieldLabel : 'OLAH1_P_TAHUN',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		OLAH1_P_BULANSearchField = Ext.create('Ext.form.TextField',{
			id : 'OLAH1_P_BULANSearchField',
			name : 'OLAH1_P_BULAN',
			fieldLabel : 'OLAH1_P_BULAN',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		OLAH2_P_TAHUNSearchField = Ext.create('Ext.form.TextField',{
			id : 'OLAH2_P_TAHUNSearchField',
			name : 'OLAH2_P_TAHUN',
			fieldLabel : 'OLAH2_P_TAHUN',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		OLAH2_P_BULANSearchField = Ext.create('Ext.form.TextField',{
			id : 'OLAH2_P_BULANSearchField',
			name : 'OLAH2_P_BULAN',
			fieldLabel : 'OLAH2_P_BULAN',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		OLAH3_P_TAHUNSearchField = Ext.create('Ext.form.TextField',{
			id : 'OLAH3_P_TAHUNSearchField',
			name : 'OLAH3_P_TAHUN',
			fieldLabel : 'OLAH3_P_TAHUN',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		OLAH3_P_BULANSearchField = Ext.create('Ext.form.TextField',{
			id : 'OLAH3_P_BULANSearchField',
			name : 'OLAH3_P_BULAN',
			fieldLabel : 'OLAH3_P_BULAN',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		OLAH1_S_TAHUNSearchField = Ext.create('Ext.form.TextField',{
			id : 'OLAH1_S_TAHUNSearchField',
			name : 'OLAH1_S_TAHUN',
			fieldLabel : 'OLAH1_S_TAHUN',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		OLAH1_S_BULANSearchField = Ext.create('Ext.form.TextField',{
			id : 'OLAH1_S_BULANSearchField',
			name : 'OLAH1_S_BULAN',
			fieldLabel : 'OLAH1_S_BULAN',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		OLAH2_S_TAHUNSearchField = Ext.create('Ext.form.TextField',{
			id : 'OLAH2_S_TAHUNSearchField',
			name : 'OLAH2_S_TAHUN',
			fieldLabel : 'OLAH2_S_TAHUN',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		OLAH2_S_BULANSearchField = Ext.create('Ext.form.TextField',{
			id : 'OLAH2_S_BULANSearchField',
			name : 'OLAH2_S_BULAN',
			fieldLabel : 'OLAH2_S_BULAN',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		OLAH3_S_TAHUNSearchField = Ext.create('Ext.form.TextField',{
			id : 'OLAH3_S_TAHUNSearchField',
			name : 'OLAH3_S_TAHUN',
			fieldLabel : 'OLAH3_S_TAHUN',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		OLAH3_S_BULANSearchField = Ext.create('Ext.form.TextField',{
			id : 'OLAH3_S_BULANSearchField',
			name : 'OLAH3_S_BULAN',
			fieldLabel : 'OLAH3_S_BULAN',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		MT_TANAHSearchField = Ext.create('Ext.form.TextField',{
			id : 'MT_TANAHSearchField',
			name : 'MT_TANAH',
			fieldLabel : 'MT_TANAH',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		MT_BANGUNANSearchField = Ext.create('Ext.form.TextField',{
			id : 'MT_BANGUNANSearchField',
			name : 'MT_BANGUNAN',
			fieldLabel : 'MT_BANGUNAN',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		MT_MESINSearchField = Ext.create('Ext.form.TextField',{
			id : 'MT_MESINSearchField',
			name : 'MT_MESIN',
			fieldLabel : 'MT_MESIN',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		MT_DLLSearchField = Ext.create('Ext.form.TextField',{
			id : 'MT_DLLSearchField',
			name : 'MT_DLL',
			fieldLabel : 'MT_DLL',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		MK_BAHAN_BAKUSearchField = Ext.create('Ext.form.TextField',{
			id : 'MK_BAHAN_BAKUSearchField',
			name : 'MK_BAHAN_BAKU',
			fieldLabel : 'MK_BAHAN_BAKU',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		MK_UPAHSearchField = Ext.create('Ext.form.TextField',{
			id : 'MK_UPAHSearchField',
			name : 'MK_UPAH',
			fieldLabel : 'MK_UPAH',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		MK_DLLSearchField = Ext.create('Ext.form.TextField',{
			id : 'MK_DLLSearchField',
			name : 'MK_DLL',
			fieldLabel : 'MK_DLL',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		SP_MODAL_SENDIRISearchField = Ext.create('Ext.form.TextField',{
			id : 'SP_MODAL_SENDIRISearchField',
			name : 'SP_MODAL_SENDIRI',
			fieldLabel : 'SP_MODAL_SENDIRI',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		SP_PINJAMANSearchField = Ext.create('Ext.form.TextField',{
			id : 'SP_PINJAMANSearchField',
			name : 'SP_PINJAMAN',
			fieldLabel : 'SP_PINJAMAN',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		TKI_L_JUMLAHSearchField = Ext.create('Ext.form.TextField',{
			id : 'TKI_L_JUMLAHSearchField',
			name : 'TKI_L_JUMLAH',
			fieldLabel : 'TKI_L_JUMLAH',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		TKI_P_JUMLAHSearchField = Ext.create('Ext.form.TextField',{
			id : 'TKI_P_JUMLAHSearchField',
			name : 'TKI_P_JUMLAH',
			fieldLabel : 'TKI_P_JUMLAH',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		TKA_JUMLAHSearchField = Ext.create('Ext.form.TextField',{
			id : 'TKA_JUMLAHSearchField',
			name : 'TKA_JUMLAH',
			fieldLabel : 'TKA_JUMLAH',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		TKA_ASALSearchField = Ext.create('Ext.form.TextField',{
			id : 'TKA_ASALSearchField',
			name : 'TKA_ASAL',
			fieldLabel : 'TKA_ASAL',
			maxLength : 255
		
		});
		TKA_JABATANSearchField = Ext.create('Ext.form.TextField',{
			id : 'TKA_JABATANSearchField',
			name : 'TKA_JABATAN',
			fieldLabel : 'TKA_JABATAN',
			maxLength : 50
		
		});
		TKA_JANGKA_WAKTUSearchField = Ext.create('Ext.form.TextField',{
			id : 'TKA_JANGKA_WAKTUSearchField',
			name : 'TKA_JANGKA_WAKTU',
			fieldLabel : 'TKA_JANGKA_WAKTU',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		DN_JENIS_PRODUK1SearchField = Ext.create('Ext.form.TextField',{
			id : 'DN_JENIS_PRODUK1SearchField',
			name : 'DN_JENIS_PRODUK1',
			fieldLabel : 'DN_JENIS_PRODUK1',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		DN_JENIS_PRODUK2SearchField = Ext.create('Ext.form.TextField',{
			id : 'DN_JENIS_PRODUK2SearchField',
			name : 'DN_JENIS_PRODUK2',
			fieldLabel : 'DN_JENIS_PRODUK2',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		DN_JENIS_PRODUK3SearchField = Ext.create('Ext.form.TextField',{
			id : 'DN_JENIS_PRODUK3SearchField',
			name : 'DN_JENIS_PRODUK3',
			fieldLabel : 'DN_JENIS_PRODUK3',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		E_JENIS_PRODUK1SearchField = Ext.create('Ext.form.TextField',{
			id : 'E_JENIS_PRODUK1SearchField',
			name : 'E_JENIS_PRODUK1',
			fieldLabel : 'E_JENIS_PRODUK1',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		E_JENIS_PRODUK2SearchField = Ext.create('Ext.form.TextField',{
			id : 'E_JENIS_PRODUK2SearchField',
			name : 'E_JENIS_PRODUK2',
			fieldLabel : 'E_JENIS_PRODUK2',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		E_JENIS_PRODUK3SearchField = Ext.create('Ext.form.TextField',{
			id : 'E_JENIS_PRODUK3SearchField',
			name : 'E_JENIS_PRODUK3',
			fieldLabel : 'E_JENIS_PRODUK3',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		MERK_JENIS_PRODUKSearchField = Ext.create('Ext.form.TextField',{
			id : 'MERK_JENIS_PRODUKSearchField',
			name : 'MERK_JENIS_PRODUK',
			fieldLabel : 'MERK_JENIS_PRODUK',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		BBKB_DN_JUMLAHSearchField = Ext.create('Ext.form.TextField',{
			id : 'BBKB_DN_JUMLAHSearchField',
			name : 'BBKB_DN_JUMLAH',
			fieldLabel : 'BBKB_DN_JUMLAH',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		BBKB_DN_SATUANSearchField = Ext.create('Ext.form.TextField',{
			id : 'BBKB_DN_SATUANSearchField',
			name : 'BBKB_DN_SATUAN',
			fieldLabel : 'BBKB_DN_SATUAN',
			maxLength : 50
		
		});
		BBKB_DN_ASALSearchField = Ext.create('Ext.form.TextField',{
			id : 'BBKB_DN_ASALSearchField',
			name : 'BBKB_DN_ASAL',
			fieldLabel : 'BBKB_DN_ASAL',
			maxLength : 50
		
		});
		BBKB_DN_HARGASearchField = Ext.create('Ext.form.TextField',{
			id : 'BBKB_DN_HARGASearchField',
			name : 'BBKB_DN_HARGA',
			fieldLabel : 'BBKB_DN_HARGA',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		BBKB_DN_KETERANGANSearchField = Ext.create('Ext.form.TextField',{
			id : 'BBKB_DN_KETERANGANSearchField',
			name : 'BBKB_DN_KETERANGAN',
			fieldLabel : 'BBKB_DN_KETERANGAN',
			maxLength : 100
		
		});
		BBKO_DN_JUMLAHSearchField = Ext.create('Ext.form.TextField',{
			id : 'BBKO_DN_JUMLAHSearchField',
			name : 'BBKO_DN_JUMLAH',
			fieldLabel : 'BBKO_DN_JUMLAH',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		BBKO_DN_SATUANSearchField = Ext.create('Ext.form.TextField',{
			id : 'BBKO_DN_SATUANSearchField',
			name : 'BBKO_DN_SATUAN',
			fieldLabel : 'BBKO_DN_SATUAN',
			maxLength : 50
		
		});
		BBKO_DN_ASALSearchField = Ext.create('Ext.form.TextField',{
			id : 'BBKO_DN_ASALSearchField',
			name : 'BBKO_DN_ASAL',
			fieldLabel : 'BBKO_DN_ASAL',
			maxLength : 50
		
		});
		BBKO_DN_HARGASearchField = Ext.create('Ext.form.TextField',{
			id : 'BBKO_DN_HARGASearchField',
			name : 'BBKO_DN_HARGA',
			fieldLabel : 'BBKO_DN_HARGA',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		BBKO_DN_KETERANGANSearchField = Ext.create('Ext.form.TextField',{
			id : 'BBKO_DN_KETERANGANSearchField',
			name : 'BBKO_DN_KETERANGAN',
			fieldLabel : 'BBKO_DN_KETERANGAN',
			maxLength : 100
		
		});
		BP_DN_JUMLAHSearchField = Ext.create('Ext.form.TextField',{
			id : 'BP_DN_JUMLAHSearchField',
			name : 'BP_DN_JUMLAH',
			fieldLabel : 'BP_DN_JUMLAH',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		BP_DN_SATUANSearchField = Ext.create('Ext.form.TextField',{
			id : 'BP_DN_SATUANSearchField',
			name : 'BP_DN_SATUAN',
			fieldLabel : 'BP_DN_SATUAN',
			maxLength : 50
		
		});
		BP_DN_ASALSearchField = Ext.create('Ext.form.TextField',{
			id : 'BP_DN_ASALSearchField',
			name : 'BP_DN_ASAL',
			fieldLabel : 'BP_DN_ASAL',
			maxLength : 50
		
		});
		BP_DN_HARGASearchField = Ext.create('Ext.form.TextField',{
			id : 'BP_DN_HARGASearchField',
			name : 'BP_DN_HARGA',
			fieldLabel : 'BP_DN_HARGA',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		BP_DN_KETERANGANSearchField = Ext.create('Ext.form.TextField',{
			id : 'BP_DN_KETERANGANSearchField',
			name : 'BP_DN_KETERANGAN',
			fieldLabel : 'BP_DN_KETERANGAN',
			maxLength : 100
		
		});
		RBB_LUAS_GUDANGSearchField = Ext.create('Ext.form.TextField',{
			id : 'RBB_LUAS_GUDANGSearchField',
			name : 'RBB_LUAS_GUDANG',
			fieldLabel : 'RBB_LUAS_GUDANG',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		RBB_KAYU_OLAHANSearchField = Ext.create('Ext.form.TextField',{
			id : 'RBB_KAYU_OLAHANSearchField',
			name : 'RBB_KAYU_OLAHAN',
			fieldLabel : 'RBB_KAYU_OLAHAN',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		RBB_PENOLONGSearchField = Ext.create('Ext.form.TextField',{
			id : 'RBB_PENOLONGSearchField',
			name : 'RBB_PENOLONG',
			fieldLabel : 'RBB_PENOLONG',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		RBB_HASIL_PRODUKSISearchField = Ext.create('Ext.form.TextField',{
			id : 'RBB_HASIL_PRODUKSISearchField',
			name : 'RBB_HASIL_PRODUKSI',
			fieldLabel : 'RBB_HASIL_PRODUKSI',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		RLPLY_LOKASISearchField = Ext.create('Ext.form.TextField',{
			id : 'RLPLY_LOKASISearchField',
			name : 'RLPLY_LOKASI',
			fieldLabel : 'RLPLY_LOKASI',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		RLPLY_LUASSearchField = Ext.create('Ext.form.TextField',{
			id : 'RLPLY_LUASSearchField',
			name : 'RLPLY_LUAS',
			fieldLabel : 'RLPLY_LUAS',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		RLPLY_PERIZINANSearchField = Ext.create('Ext.form.TextField',{
			id : 'RLPLY_PERIZINANSearchField',
			name : 'RLPLY_PERIZINAN',
			fieldLabel : 'RLPLY_PERIZINAN',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		RSD1_KAPASITASSearchField = Ext.create('Ext.form.TextField',{
			id : 'RSD1_KAPASITASSearchField',
			name : 'RSD1_KAPASITAS',
			fieldLabel : 'RSD1_KAPASITAS',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		RSD1_JUMLAHSearchField = Ext.create('Ext.form.TextField',{
			id : 'RSD1_JUMLAHSearchField',
			name : 'RSD1_JUMLAH',
			fieldLabel : 'RSD1_JUMLAH',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		RSD211_KAPASITASSearchField = Ext.create('Ext.form.TextField',{
			id : 'RSD211_KAPASITASSearchField',
			name : 'RSD211_KAPASITAS',
			fieldLabel : 'RSD211_KAPASITAS',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		RSD211_JUMLAHSearchField = Ext.create('Ext.form.TextField',{
			id : 'RSD211_JUMLAHSearchField',
			name : 'RSD211_JUMLAH',
			fieldLabel : 'RSD211_JUMLAH',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		RSD212_KAPASITASSearchField = Ext.create('Ext.form.TextField',{
			id : 'RSD212_KAPASITASSearchField',
			name : 'RSD212_KAPASITAS',
			fieldLabel : 'RSD212_KAPASITAS',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		RSD212_JUMLAHSearchField = Ext.create('Ext.form.TextField',{
			id : 'RSD212_JUMLAHSearchField',
			name : 'RSD212_JUMLAH',
			fieldLabel : 'RSD212_JUMLAH',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		RSD213_KAPASITASSearchField = Ext.create('Ext.form.TextField',{
			id : 'RSD213_KAPASITASSearchField',
			name : 'RSD213_KAPASITAS',
			fieldLabel : 'RSD213_KAPASITAS',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		RSD213_JUMLAHSearchField = Ext.create('Ext.form.TextField',{
			id : 'RSD213_JUMLAHSearchField',
			name : 'RSD213_JUMLAH',
			fieldLabel : 'RSD213_JUMLAH',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		RSD22_KAPASITASSearchField = Ext.create('Ext.form.TextField',{
			id : 'RSD22_KAPASITASSearchField',
			name : 'RSD22_KAPASITAS',
			fieldLabel : 'RSD22_KAPASITAS',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		RSD22_JUMLAHSearchField = Ext.create('Ext.form.TextField',{
			id : 'RSD22_JUMLAHSearchField',
			name : 'RSD22_JUMLAH',
			fieldLabel : 'RSD22_JUMLAH',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		RSD23_KAPASITASSearchField = Ext.create('Ext.form.TextField',{
			id : 'RSD23_KAPASITASSearchField',
			name : 'RSD23_KAPASITAS',
			fieldLabel : 'RSD23_KAPASITAS',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		RSD23_JUMLAHSearchField = Ext.create('Ext.form.TextField',{
			id : 'RSD23_JUMLAHSearchField',
			name : 'RSD23_JUMLAH',
			fieldLabel : 'RSD23_JUMLAH',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		RPL1_VOLUMESearchField = Ext.create('Ext.form.TextField',{
			id : 'RPL1_VOLUMESearchField',
			name : 'RPL1_VOLUME',
			fieldLabel : 'RPL1_VOLUME',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		RPL1_SATUANSearchField = Ext.create('Ext.form.TextField',{
			id : 'RPL1_SATUANSearchField',
			name : 'RPL1_SATUAN',
			fieldLabel : 'RPL1_SATUAN',
			maxLength : 50
		
		});
		RPL1_PENANGANANSearchField = Ext.create('Ext.form.TextField',{
			id : 'RPL1_PENANGANANSearchField',
			name : 'RPL1_PENANGANAN',
			fieldLabel : 'RPL1_PENANGANAN',
			maxLength : 100
		
		});
		RPL2_VOLUMESearchField = Ext.create('Ext.form.TextField',{
			id : 'RPL2_VOLUMESearchField',
			name : 'RPL2_VOLUME',
			fieldLabel : 'RPL2_VOLUME',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		RPL2_SATUANSearchField = Ext.create('Ext.form.TextField',{
			id : 'RPL2_SATUANSearchField',
			name : 'RPL2_SATUAN',
			fieldLabel : 'RPL2_SATUAN',
			maxLength : 50
		
		});
		RPL2_PENANGANANSearchField = Ext.create('Ext.form.TextField',{
			id : 'RPL2_PENANGANANSearchField',
			name : 'RPL2_PENANGANAN',
			fieldLabel : 'RPL2_PENANGANAN',
			maxLength : 100
		
		});
		RPL3_VOLUMESearchField = Ext.create('Ext.form.TextField',{
			id : 'RPL3_VOLUMESearchField',
			name : 'RPL3_VOLUME',
			fieldLabel : 'RPL3_VOLUME',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		RPL3_SATUANSearchField = Ext.create('Ext.form.TextField',{
			id : 'RPL3_SATUANSearchField',
			name : 'RPL3_SATUAN',
			fieldLabel : 'RPL3_SATUAN',
			maxLength : 50
		
		});
		RPL3_PENANGANANSearchField = Ext.create('Ext.form.TextField',{
			id : 'RPL3_PENANGANANSearchField',
			name : 'RPL3_PENANGANAN',
			fieldLabel : 'RPL3_PENANGANAN',
			maxLength : 100
		
		});
		RPL4_VOLUMESearchField = Ext.create('Ext.form.TextField',{
			id : 'RPL4_VOLUMESearchField',
			name : 'RPL4_VOLUME',
			fieldLabel : 'RPL4_VOLUME',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		RPL4_SATUANSearchField = Ext.create('Ext.form.TextField',{
			id : 'RPL4_SATUANSearchField',
			name : 'RPL4_SATUAN',
			fieldLabel : 'RPL4_SATUAN',
			maxLength : 50
		
		});
		RPL4_PENANGANANSearchField = Ext.create('Ext.form.TextField',{
			id : 'RPL4_PENANGANANSearchField',
			name : 'RPL4_PENANGANAN',
			fieldLabel : 'RPL4_PENANGANAN',
			maxLength : 100
		
		});
		PENYETUJUSearchField = Ext.create('Ext.form.TextField',{
			id : 'PENYETUJUSearchField',
			name : 'PENYETUJU',
			fieldLabel : 'PENYETUJU',
			maxLength : 50
		
		});
		NOMOR_SURATSearchField = Ext.create('Ext.form.TextField',{
			id : 'NOMOR_SURATSearchField',
			name : 'NOMOR_SURAT',
			fieldLabel : 'NOMOR_SURAT',
			maxLength : 50
		
		});
		TGL_TERLAMPIRSearchField = Ext.create('Ext.form.TextField',{
			id : 'TGL_TERLAMPIRSearchField',
			name : 'TGL_TERLAMPIR',
			fieldLabel : 'TGL_TERLAMPIR',
			maxLength : 0
		
		});
		TGL_PERMOHONANSearchField = Ext.create('Ext.form.TextField',{
			id : 'TGL_PERMOHONANSearchField',
			name : 'TGL_PERMOHONAN',
			fieldLabel : 'TGL_PERMOHONAN',
			maxLength : 0
		
		});
		STATUS_SURVEYSearchField = Ext.create('Ext.form.TextField',{
			id : 'STATUS_SURVEYSearchField',
			name : 'STATUS_SURVEY',
			fieldLabel : 'STATUS_SURVEY',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		STATUSSearchField = Ext.create('Ext.form.TextField',{
			id : 'STATUSSearchField',
			name : 'STATUS',
			fieldLabel : 'STATUS',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		TGL_BERLAKUSearchField = Ext.create('Ext.form.TextField',{
			id : 'TGL_BERLAKUSearchField',
			name : 'TGL_BERLAKU',
			fieldLabel : 'TGL_BERLAKU',
			maxLength : 0
		
		});
		TGL_BERAKHIRSearchField = Ext.create('Ext.form.TextField',{
			id : 'TGL_BERAKHIRSearchField',
			name : 'TGL_BERAKHIR',
			fieldLabel : 'TGL_BERAKHIR',
			maxLength : 0
		
		});
		var iphhk_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : iphhk_search
		});
		var iphhk_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				iphhk_searchWindow.hide();
			}
		});
		iphhk_searchPanel = Ext.create('Ext.form.Panel', {
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
						ID_PEMOHONSearchField,
						NO_SKSearchField,
						NO_SK_LAMASearchField,
						JENIS_PERMOHONANSearchField,
						NAMA_PERUSAHAANSearchField,
						NPWPSearchField,
						ALAMATSearchField,
						STATUS_MODALSearchField,
						NAMA_NOTARISSearchField,
						NO_AKTASearchField,
						PENANGGUNG_JAWABSearchField,
						NAMA_DIREKSISearchField,
						DEWAN_KOMISARISSearchField,
						TUJUAN_PRODUKSISearchField,
						LOKASI_PABRIKSearchField,
						LUAS_TANAHSearchField,
						ALAMAT_PABRIKSearchField,
						OLAH1_P_TAHUNSearchField,
						OLAH1_P_BULANSearchField,
						OLAH2_P_TAHUNSearchField,
						OLAH2_P_BULANSearchField,
						OLAH3_P_TAHUNSearchField,
						OLAH3_P_BULANSearchField,
						OLAH1_S_TAHUNSearchField,
						OLAH1_S_BULANSearchField,
						OLAH2_S_TAHUNSearchField,
						OLAH2_S_BULANSearchField,
						OLAH3_S_TAHUNSearchField,
						OLAH3_S_BULANSearchField,
						MT_TANAHSearchField,
						MT_BANGUNANSearchField,
						MT_MESINSearchField,
						MT_DLLSearchField,
						MK_BAHAN_BAKUSearchField,
						MK_UPAHSearchField,
						MK_DLLSearchField,
						SP_MODAL_SENDIRISearchField,
						SP_PINJAMANSearchField,
						TKI_L_JUMLAHSearchField,
						TKI_P_JUMLAHSearchField,
						TKA_JUMLAHSearchField,
						TKA_ASALSearchField,
						TKA_JABATANSearchField,
						TKA_JANGKA_WAKTUSearchField,
						DN_JENIS_PRODUK1SearchField,
						DN_JENIS_PRODUK2SearchField,
						DN_JENIS_PRODUK3SearchField,
						E_JENIS_PRODUK1SearchField,
						E_JENIS_PRODUK2SearchField,
						E_JENIS_PRODUK3SearchField,
						MERK_JENIS_PRODUKSearchField,
						BBKB_DN_JUMLAHSearchField,
						BBKB_DN_SATUANSearchField,
						BBKB_DN_ASALSearchField,
						BBKB_DN_HARGASearchField,
						BBKB_DN_KETERANGANSearchField,
						BBKO_DN_JUMLAHSearchField,
						BBKO_DN_SATUANSearchField,
						BBKO_DN_ASALSearchField,
						BBKO_DN_HARGASearchField,
						BBKO_DN_KETERANGANSearchField,
						BP_DN_JUMLAHSearchField,
						BP_DN_SATUANSearchField,
						BP_DN_ASALSearchField,
						BP_DN_HARGASearchField,
						BP_DN_KETERANGANSearchField,
						RBB_LUAS_GUDANGSearchField,
						RBB_KAYU_OLAHANSearchField,
						RBB_PENOLONGSearchField,
						RBB_HASIL_PRODUKSISearchField,
						RLPLY_LOKASISearchField,
						RLPLY_LUASSearchField,
						RLPLY_PERIZINANSearchField,
						RSD1_KAPASITASSearchField,
						RSD1_JUMLAHSearchField,
						RSD211_KAPASITASSearchField,
						RSD211_JUMLAHSearchField,
						RSD212_KAPASITASSearchField,
						RSD212_JUMLAHSearchField,
						RSD213_KAPASITASSearchField,
						RSD213_JUMLAHSearchField,
						RSD22_KAPASITASSearchField,
						RSD22_JUMLAHSearchField,
						RSD23_KAPASITASSearchField,
						RSD23_JUMLAHSearchField,
						RPL1_VOLUMESearchField,
						RPL1_SATUANSearchField,
						RPL1_PENANGANANSearchField,
						RPL2_VOLUMESearchField,
						RPL2_SATUANSearchField,
						RPL2_PENANGANANSearchField,
						RPL3_VOLUMESearchField,
						RPL3_SATUANSearchField,
						RPL3_PENANGANANSearchField,
						RPL4_VOLUMESearchField,
						RPL4_SATUANSearchField,
						RPL4_PENANGANANSearchField,
						PENYETUJUSearchField,
						NOMOR_SURATSearchField,
						TGL_TERLAMPIRSearchField,
						TGL_PERMOHONANSearchField,
						STATUS_SURVEYSearchField,
						STATUSSearchField,
						TGL_BERLAKUSearchField,
						TGL_BERAKHIRSearchField,
						]
				}],
			buttons : [iphhk_searchingButton,iphhk_cancelSearchButton]
		});
		iphhk_searchWindow = Ext.create('Ext.window.Window',{
			id : 'iphhk_searchWindow',
			renderTo : 'iphhkSearchWindow',
			title : globalFormSearchTitle + ' ' + iphhk_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [iphhk_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="iphhkSaveWindow"></div>
<div id="iphhkSearchWindow"></div>
<div class="span12" id="iphhkGrid"></div>