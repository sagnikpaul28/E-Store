function AtrributeDisable(){
	document.getElementById('first-name').removeAttribute('disabled');
	document.getElementById('last-name').removeAttribute('disabled');
	document.getElementById('gender-male').removeAttribute('disabled');
	document.getElementById('gender-female').removeAttribute('disabled');
	document.getElementById('email').removeAttribute('disabled');
	document.getElementById('number').removeAttribute('disabled');
	document.getElementById("change").style.display = "inherit";
	document.getElementById("cancel").style.display = "inherit";

}

function AttributeEnable(){
	document.getElementById("first-name").disabled = true;
	document.getElementById('last-name').disabled = true;
	document.getElementById('gender-male').disabled = true;
	document.getElementById('gender-female').disabled = true;
	document.getElementById('email').disabled = true;
	document.getElementById('number').disabled = true;
	document.getElementById("change").style.display = "none";
	document.getElementById("cancel").style.display = "none";

}

function PasswordChange(){
	document.getElementById('info').style.display = "none";
	document.getElementById('passwordchange').style.display = "inherit";
	document.getElementById('cancelpasswordchange').style.display = "inherit";

}

function fetch_date_descending(){
	jQuery.post('/E-Store/wp-admin/admin-ajax.php', {'action' : 'date_descending'}, function(response){
		jQuery('#content').html(response);
	});
}

function fetch_date_ascending(){
	jQuery.post('/E-Store/wp-admin/admin-ajax.php', {'action' : 'date_ascending'}, function(response){
		jQuery('#content').html(response);
	});
}

function fetch_price_descending(){
	jQuery.post('/E-Store/wp-admin/admin-ajax.php', {'action' : 'price_descending'}, function(response){
		jQuery('#content').html(response);
	});
}

function fetch_price_ascending(){
	jQuery.post('/E-Store/wp-admin/admin-ajax.php', {'action' : 'price_ascending'}, function(response){
		jQuery('#content').html(response);
	});
}

var changeResultFunction = function(){

	if (jQuery('input:checkbox:checked').length > 0){

		var arraybrands = [];
		var arrayprice = [];
		var arraybattery = [];
		var arrayinternal = [];
		var arrayprimarycam = [];
		var arrayram = [];
		var arrayscreen = [];

		jQuery('[id=contain]').hide();

		jQuery('input[name="brands"]:checkbox:checked').each(function(){
			var item = jQuery(this).val();
			arraybrands.push(item);
		});

		jQuery('input[name="price"]:checkbox:checked').each(function(){
			var item = jQuery(this).val();
			arrayprice.push(item);
		});

		jQuery('input[name="battery"]:checkbox:checked').each(function(){
			var item = jQuery(this).val();
			arraybattery.push(item);
		});

		jQuery('input[name="internal_storage"]:checkbox:checked').each(function(){
			var item = jQuery(this).val();
			arrayinternal.push(item);
		});

		jQuery('input[name="primary_camera"]:checkbox:checked').each(function(){
			var item = jQuery(this).val();
			arrayprimarycam.push(item);
		});

		jQuery('input[name="ram"]:checkbox:checked').each(function(){
			var item = jQuery(this).val();
			arrayram.push(item);
		});

		jQuery('input[name="screen"]:checkbox:checked').each(function(){
			var item = jQuery(this).val();
			arrayscreen.push(item);
		});


		if (arraybrands.length === 0){
			arraybrands = [' '];
		}			

		if (arrayprice.length === 0){
			arrayprice = [' '];
		}

		if (arraybattery.length === 0){
			arraybattery = [' '];
		}

		if (arrayinternal.length === 0){
			arrayinternal = [' '];
		}

		if (arrayprimarycam.length === 0){
			arrayprimarycam = [' '];
		}

		if (arrayram.length === 0){
			arrayram = [' '];
		}

		if (arrayscreen.length === 0){
			arrayscreen = [' '];
		}

		var count = 0;
		var arg, arg1, arg2, arg3, arg4, arg5, arg6, arg7;

		for (var i = 0; i < arraybrands.length; i++){
			arg = "";
			if (arraybrands[0] !== " "){
				arg1 = arg + "." + arraybrands[i];
			}
			else{
				arg1 = arg;
			}
			for (var j = 0; j < arrayprice.length; j++){
				if (arrayprice[0] !== " "){
					arg2 = arg1 + "." + arrayprice[j];
				}
				else{
					arg2 = arg1;
				}
				for (var k = 0; k < arraybattery.length; k++){
					if (arraybattery[0] !== " "){
						arg3 = arg2 + "." + arraybattery[k];
					}
					else{
						arg3 = arg2;
					}
					for (var l = 0; l < arrayinternal.length; l++){
						if (arrayinternal[0] !== " "){
							arg4 = arg3 + "." + arrayinternal[l];
						}
						else{
							arg4 = arg3;
						}
						for (var m = 0; m < arrayprimarycam.length; m++){
							if (arrayprimarycam[0] !== " "){
								arg5 = arg4 + "." + arrayprimarycam[m];
							}
							else{
								arg5 = arg4;
							}
							for (var n = 0; n < arrayram.length; n++){
								if (arrayram[0] !== " "){
									arg6 = arg5 + "." + arrayram[n];
								}
								else{
									arg6 = arg5;
								}
								for (var o = 0; o < arrayscreen.length; o++){
									if (arrayscreen[0] !== " "){
										arg7 = arg6 + "." + arrayscreen[o];
									}
									else{
										arg7 = arg6;
									}

									jQuery(arg7).show();

									jQuery(arg7).each(function(){
										var x = jQuery(this).data('namephone');
										var y = jQuery('#Search').val();
										if (x.indexOf(y) === -1){
											jQuery(this).hide();
										}
									
									})
								}
							}
						}
					}
				}
			}
		}

	}
	else{
		jQuery('[id=contain]').show();
		jQuery('[id=contain]').each(function(){
			var x = jQuery(this).data('namephone').toLowerCase().trim();
			var y = jQuery('#Search').val().toLowerCase().trim();
			if (x.indexOf(y) === -1){
				jQuery(this).hide();
			}
		})
	}
};
jQuery('input[type=checkbox]').click(changeResultFunction);
