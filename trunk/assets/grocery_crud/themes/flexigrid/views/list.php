<?php 
	$column_width = (int)(80/count($columns));
	if(!empty($list)){
?>
<div class="bDiv" >
	<table cellspacing="0" cellpadding="0" border="0" id="flex1">
		<thead>
			<tr class='hDiv'>
			<?php foreach($columns as $column){?>
				<th width='<?php echo $column_width; ?>%'>
					<div class="text-left field-sorting <?php if(isset($order_by[0]) &&  $column->field_name == $order_by[0]){?><?php echo $order_by[1]; ?><?php }?>" rel='<?php echo $column->field_name; ?>'>
						<?php echo $column->display_as; ?>
					</div>
				</th>
				<?php }?>
				<?php if(!$unset_delete || !$unset_edit || !empty($actions)){?>
				<th align="left" abbr="tools" axis="col1" class="" width='20%'>
					<div class="text-right">
						<?php echo $this->l('list_actions'); ?>
					</div>
				</th>
				<?php }?>
			</tr>
		</thead>		
		<tbody>
<?php foreach($list as $num_row => $row){ ?>        
		<tr  <?php if($num_row % 2 == 1){?>class="erow"<?php }?>>
			<?php foreach($columns as $column){?>
			<td width='<?php echo $column_width?>%' class='<?php if(isset($order_by[0]) &&  $column->field_name == $order_by[0]){?>sorted<?php }?>'>
				<div class='text-left'><?php echo $row->{$column->field_name} != '' ? $row->{$column->field_name} : '&nbsp;' ; ?></div>
			</td>
			<?php }?>
			<?php if(!$unset_delete || !$unset_edit || !empty($actions)){?>
			<td align="left" width='20%'>
				<div class='tools'>				
					<?php if(!$unset_delete){?>
                    	<a href='<?php echo $row->delete_url?>' title='<?php echo $this->l('list_delete')?> <?php echo $subject?>' class="delete-row" >
                    			<span class='delete-icon'></span>
                    	</a>
                    <?php }?>
                    <?php if(!$unset_edit){?>
						<a href='<?php echo $row->edit_url?>' title='<?php echo $this->l('list_edit')?> <?php echo $subject?>' class="edit_button"><span class='edit-icon'></span></a>
					<?php }?>
					<?php if(!$unset_read){?>
						<a href='<?php echo $row->read_url?>' title='<?php echo $this->l('list_view')?> <?php echo $subject?>' class="edit_button"><span class='read-icon'></span></a>
					<?php }?>
					<?php 
					if(!empty($row->action_urls)){
						foreach($row->action_urls as $action_unique_id => $action_url){ 
							$action = $actions[$action_unique_id];
							if ($action->label=="Ubah Status Pemrosessan Data")
								{		
								?>
								<a href="#" onclick="document.getElementById('status<?php echo $num_row?>').style.display=''" class="<?php echo $action->css_class; ?> crud-action" title="<?php echo $action->label?>">
								<?php 
								}
							elseif ($action->label=="Ubah Status Pemrosessan Data IMB")
								{		
								?>
								<a href="#" onclick="document.getElementById('statusIMB<?php echo $num_row?>').style.display=''" class="<?php echo $action->css_class; ?> crud-action" title="<?php echo $action->label?>">
								<?php 
								}
							elseif ($action->label=="Cetak SK")
								{		
								?>
								<a href="#" onclick="document.getElementById('sk<?php echo $num_row?>').style.display=''" class="<?php echo $action->css_class; ?> crud-action" title="<?php echo $action->label?>">
								<?php 
								}
							elseif ($action->label=="Cetak SK IMB")
								{		
								?>
								<a href="#" onclick="document.getElementById('skIMB<?php echo $num_row?>').style.display=''" class="<?php echo $action->css_class; ?> crud-action" title="<?php echo $action->label?>">
								<?php 
								}
							elseif ($action->label=="Cetak SK IUJK")
								{		
								?>
								<a href="#" onclick="document.getElementById('skIUJK<?php echo $num_row?>').style.display=''" class="<?php echo $action->css_class; ?> crud-action" title="<?php echo $action->label?>">
								<?php 
								}
							elseif ($action->label=="Cetak Tanda Bukti")
								{		
								?>
								<a href="#" onclick="document.getElementById('bukti<?php echo $num_row?>').style.display=''" class="<?php echo $action->css_class; ?> crud-action" title="<?php echo $action->label?>">
								<?php 
								}
							elseif ($action->label=="Cetak Dokumen Survey")
								{		
								?>
								<a href="#" onclick="document.getElementById('survey<?php echo $num_row?>').style.display=''" class="<?php echo $action->css_class; ?> crud-action" title="<?php echo $action->label?>">
								<?php 
								}
							elseif ($action->label=="Cetak Tanda Bukti IMB" || $action->label=="Cetak Tanda Bukti IUJK" || $action->label=="Cetak Tanda Bukti Lokasi" || $action->label=="Cetak Tanda Bukti Trayek" || $action->label=="Cetak Tanda Bukti Reklame")
								{		
								?>
								<a href="#" onclick="document.getElementById('buktiIMB<?php echo $num_row?>').style.display=''" class="<?php echo $action->css_class; ?> crud-action" title="<?php echo $action->label?>">
								<?php 
								}
							elseif ($action->label=="Cetak Tanda Bukti IUJK")
								{		
								?>
								<a href="#" onclick="document.getElementById('buktiIUJK<?php echo $num_row?>').style.display=''" class="<?php echo $action->css_class; ?> crud-action" title="<?php echo $action->label?>">
								<?php 
								}
							elseif ($action->label=="Pilih")
								{		
								?>
								<a href="#" onclick="javascript:Tpilih('<?php echo $action->link_url?>','<?php echo $row->id?>')" data-dismiss="modal" class="<?php echo $action->css_class; ?> crud-action" title="<?php echo $action->label?>">
								<?php 
								}
							elseif ($action->label=="Edit Data")
								{		
								?>
								<a href="<?php echo $action->link_url?>?id=<?php echo $row->id?>" class="<?php echo $action->css_class; ?> crud-action" title="<?php echo $action->label?>">
								<?php 
								}
							elseif ($action->label=="Hapus Data")
								{		
								?>
								<a href="#" onclick="javascript:Thapus('<?php echo $action->link_url?>','<?php echo $row->id?>')" class="<?php echo $action->css_class; ?> crud-action" title="<?php echo $action->label?>">
								<?php 
								}
							else
								{
							?>
							<a href="<?php echo $action_url; ?>" class="<?php echo $action->css_class; ?> crud-action" title="<?php echo $action->label?>">
							<?php 
								}
								if(!empty($action->image_url))
								{
									?><img src="<?php echo $action->image_url; ?>" alt="<?php echo $action->label?>" /><?php 	
								}
							?></a>		
					<?php
							if ($action->label=="Ubah Status Pemrosessan Data")
								{
							?>
								<div style="display:none; position:absolute " id="status<?php echo $num_row?>" onmouseout="document.getElementById('status<?php echo $num_row?>').style.display='none'" >
                  					<div class="mnuaksi" style="width:135px " onmouseover="document.getElementById('status<?php echo $num_row?>').style.display=''"><a href="<?php echo site_url()."/master/put_ubah_statuspermohonan?status=4&idpermohonan=".$row->id."&control=".$action->link_url?>">Selesai, belum diambil</a></div>
                  					<div class="mnuaksi" style="width:135px " onmouseover="document.getElementById('status<?php echo $num_row?>').style.display=''"><a href="<?php echo site_url()."/master/put_ubah_statuspermohonan?status=5&idpermohonan=".$row->id."&control=".$action->link_url?>">Selesai, sudah diambil</a></div>
                  					<div class="mnuaksi" style="width:135px " onmouseover="document.getElementById('status<?php echo $num_row?>').style.display=''"><a href="<?php echo site_url()."/master/put_ubah_statuspermohonan?status=6&idpermohonan=".$row->id."&control=".$action->link_url?>">Tolak Permohonan</a></div>
                				</div>
							<?php
								}
							elseif ($action->label=="Ubah Status Pemrosessan Data IMB")
								{
							?>
								<div style="display:none; position:absolute " id="statusIMB<?php echo $num_row?>" onmouseout="document.getElementById('statusIMB<?php echo $num_row?>').style.display='none'" >
                  					<div class="mnuaksi" style="width:135px " onmouseover="document.getElementById('statusIMB<?php echo $num_row?>').style.display=''"><a href="<?php echo site_url()."/master/put_ubah_statuspermohonan?status=2&idpermohonan=".$row->id."&control=".$action->link_url?>">Proses</a></div>
                  					<div class="mnuaksi" style="width:135px " onmouseover="document.getElementById('statusIMB<?php echo $num_row?>').style.display=''"><a href="<?php echo site_url()."/master/put_ubah_statuspermohonan?status=3&idpermohonan=".$row->id."&control=".$action->link_url?>">Survey</a></div>
                  					<div class="mnuaksi" style="width:135px " onmouseover="document.getElementById('statusIMB<?php echo $num_row?>').style.display=''"><a href="<?php echo site_url()."/master/put_ubah_statuspermohonan?status=6&idpermohonan=".$row->id."&control=".$action->link_url?>">Pembayaran</a></div>
									<div class="mnuaksi" style="width:135px " onmouseover="document.getElementById('statusIMB<?php echo $num_row?>').style.display=''"><a href="<?php echo site_url()."/master/put_ubah_statuspermohonan?status=4&idpermohonan=".$row->id."&control=".$action->link_url?>">Selesai, belum diambil</a></div>
                  					<div class="mnuaksi" style="width:135px " onmouseover="document.getElementById('statusIMB<?php echo $num_row?>').style.display=''"><a href="<?php echo site_url()."/master/put_ubah_statuspermohonan?status=5&idpermohonan=".$row->id."&control=".$action->link_url?>">Selesai, sudah diambil</a></div>
                  					<div class="mnuaksi" style="width:135px " onmouseover="document.getElementById('statusIMB<?php echo $num_row?>').style.display=''"><a href="<?php echo site_url()."/master/put_ubah_statuspermohonan?status=6&idpermohonan=".$row->id."&control=".$action->link_url?>">Tolak Permohonan</a></div>
                				</div>
							<?php
								}
							elseif ($action->label=="Cetak SK")
								{	
							?>		
							<div style="display:none; position:absolute " id="sk<?php echo $num_row?>" onMouseOut="document.getElementById('sk<?php echo $num_row?>').style.display='none'" >				
								<div class="mnuaksi" onMouseOver="document.getElementById('sk<?php echo $num_row?>').style.display=''"><a target="_blank" href="<?php echo $action->link_url?>?jenis=<?php echo $action->var1?>&id=<?php echo $row->id?>">Cetak SK</a></div>
								<div class="mnuaksi" onMouseOver="document.getElementById('sk<?php echo $num_row?>').style.display=''"><a target="_blank" href="<?php echo $action->link_url?>?jenis=<?php echo $action->var2?>&id=<?php echo $row->id?>">Cetak tanpa TTD</a></div>
							</div>
							<?php
								}	
							elseif ($action->label=="Cetak SK IMB")
								{	
							?>		
							<div style="display:none; position:absolute " id="skIMB<?php echo $num_row?>" onMouseOut="document.getElementById('skIMB<?php echo $num_row?>').style.display='none'" >				
								<div class="mnuaksi" onMouseOver="document.getElementById('skIMB<?php echo $num_row?>').style.display=''"><a target="_blank" href="<?php echo $action->link_url?>?jenis=<?php echo $action->var1?>&id=<?php echo $row->id?>">Cetak SK</a></div>
								<div class="mnuaksi" onMouseOver="document.getElementById('skIMB<?php echo $num_row?>').style.display=''"><a target="_blank" href="<?php echo $action->link_url?>?jenis=<?php echo $action->var2?>&id=<?php echo $row->id?>">Cetak tanpa TTD</a></div>
								<div class="mnuaksi" onMouseOver="document.getElementById('skIMB<?php echo $num_row?>').style.display=''"><a target="_blank" href="<?php echo $action->link_url?>?jenis=<?php echo $action->var3?>&id=<?php echo $row->id?>">Lampiran 1</a></div>
								<div class="mnuaksi" onMouseOver="document.getElementById('skIMB<?php echo $num_row?>').style.display=''"><a target="_blank" href="<?php echo $action->link_url?>?jenis=<?php echo $action->var4?>&id=<?php echo $row->id?>">Lampiran 2</a></div>
								<div class="mnuaksi" onMouseOver="document.getElementById('skIMB<?php echo $num_row?>').style.display=''"><a target="_blank" href="<?php echo $action->link_url?>?jenis=<?php echo $action->var5?>&id=<?php echo $row->id?>">Lampiran 1-Panjang</a></div>
								<div class="mnuaksi" onMouseOver="document.getElementById('skIMB<?php echo $num_row?>').style.display=''"><a target="_blank" href="<?php echo $action->link_url?>?jenis=<?php echo $action->var6?>&id=<?php echo $row->id?>">Lampiran 2-Panjang</a></div>
								<div class="mnuaksi" onMouseOver="document.getElementById('skIMB<?php echo $num_row?>').style.display=''"><a target="_blank" href="<?php echo $action->link_url?>?jenis=<?php echo $action->var7?>&id=<?php echo $row->id?>">Lampiran 3-Panjang</a></div>
							</div>
							<?php
								}			
							elseif ($action->label=="Cetak SK IUJK")
								{	
							?>		
							<div style="display:none; position:absolute " id="skIUJK<?php echo $num_row?>" onMouseOut="document.getElementById('skIUJK<?php echo $num_row?>').style.display='none'" >				
								<div class="mnuaksi" onMouseOver="document.getElementById('skIUJK<?php echo $num_row?>').style.display=''"><a target="_blank" href="<?php echo $action->link_url?>?jenis=<?php echo $action->var1?>&id=<?php echo $row->id?>">Cetak SK</a></div>
								<div class="mnuaksi" onMouseOver="document.getElementById('skIUJK<?php echo $num_row?>').style.display=''"><a target="_blank" href="<?php echo $action->link_url?>?jenis=<?php echo $action->var2?>&id=<?php echo $row->id?>">Cetak Lampiran</a></div>
								<div class="mnuaksi" onMouseOver="document.getElementById('skIUJK<?php echo $num_row?>').style.display=''"><a target="_blank" href="<?php echo $action->link_url?>?jenis=<?php echo $action->var3?>&id=<?php echo $row->id?>">Cetak tanpa TTD</a></div>
							</div>
							<?php
								}					
							elseif ($action->label=="Cetak Tanda Bukti")
								{	
							?>
							<div style="display:none; position:absolute " id="bukti<?php echo $num_row?>" onmouseout="document.getElementById('bukti<?php echo $num_row?>').style.display='none'" >                    			
                      			<div class="mnuaksi" style="width:130px " onmouseover="document.getElementById('bukti<?php echo $num_row?>').style.display=''"><a target="_blank" href="<?php echo $action->link_url?>?jenis=<?php echo $action->var1?>&id=<?php echo $row->id?>">Lembar Kontrol</a></div>					  
					  			<div class="mnuaksi" style="width:130px " onmouseover="document.getElementById('bukti<?php echo $num_row?>').style.display=''"><a target="_blank" href="<?php echo $action->link_url?>?jenis=<?php echo $action->var2?>&id=<?php echo $row->id?>">Surat Keterangan</a></div>					
								<div class="mnuaksi" style="width:130px " onMouseOver="document.getElementById('bukti<?php echo $num_row?>').style.display=''"><a target="_blank" href="<?php echo $action->link_url?>?jenis=<?php echo $action->var3?>&id=<?php echo $row->id?>">Bukti Penerimaan</a></div>
                			</div>   
						    <?php	
							}
							elseif ($action->label=="Cetak Dokumen Survey")
								{	
							?>		
							<div style="display:none; position:absolute " id="survey<?php echo $num_row?>" onMouseOut="document.getElementById('survey<?php echo $num_row?>').style.display='none'" >				
								<div class="mnuaksi" onMouseOver="document.getElementById('survey<?php echo $num_row?>').style.display=''"><a target="_blank" href="<?php echo $action->link_url?>?jenis=<?php echo $action->var1?>&id=<?php echo $row->id?>">Dokumen Survei</a></div>
								<div class="mnuaksi" onMouseOver="document.getElementById('survey<?php echo $num_row?>').style.display=''"><a target="_blank" href="<?php echo $action->link_url?>?jenis=<?php echo $action->var2?>&id=<?php echo $row->id?>">Dokumen Hasil Survei</a></div>
							</div>
							<?php
								}
							elseif ($action->label=="Cetak Tanda Bukti IMB" || $action->label=="Cetak Tanda Bukti IUJK"  || $action->label=="Cetak Tanda Bukti Lokasi" || $action->label=="Cetak Tanda Bukti Trayek" || $action->label=="Cetak Tanda Bukti Reklame")
								{	
							?>
							<div style="display:none; position:absolute " id="buktiIMB<?php echo $num_row?>" onmouseout="document.getElementById('buktiIMB<?php echo $num_row?>').style.display='none'" >                    			
                      			<div class="mnuaksi" style="width:130px " onmouseover="document.getElementById('buktiIMB<?php echo $num_row?>').style.display=''"><a target="_blank" href="<?php echo $action->link_url?>?jenis=<?php echo $action->var1?>&id=<?php echo $row->id?>">Lembar Kontrol</a></div>					  
								<div class="mnuaksi" style="width:130px " onMouseOver="document.getElementById('buktiIMB<?php echo $num_row?>').style.display=''"><a target="_blank" href="<?php echo $action->link_url?>?jenis=<?php echo $action->var3?>&id=<?php echo $row->id?>">Bukti Penerimaan</a></div>
                			</div>   
						    <?php	
							}												
					}
					}
					?>					
                    <div class='clear'></div>
				</div>
			</td>
			<?php }?>
		</tr>
<?php } ?>        
		</tbody>
		</table>
	</div>
<?php }else{?>
	<br/>
	&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->l('list_no_items'); ?>
	<br/>
	<br/>
<?php }?>	
