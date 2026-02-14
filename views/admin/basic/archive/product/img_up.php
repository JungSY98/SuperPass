<?=form_open_multipart("/admin/archive/product/fileupload/", array("method"=>"post"), array())?>
<div class="input-group">
	<span class="input-group-text">대표이미지</span>
	<select name="keyNo" class="form-control">
		<option value="">선택하세요</option>
<? foreach($bizD as $k => $bD) { ?>
		<option value="<?=$bD['no']?>"><?=$bD['applyCategory']?> > <?=$bD['com1Name']?> > <?=$bD['title']?></option>
<? } ?>
	</select>
	<input type="file" class="form-control" name="listIMG" required>
	<button type="submit" class="btn btn-success">업로드</button>
</div>
<?=form_close()?>