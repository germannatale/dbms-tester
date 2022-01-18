function aplicar_filtro() {
	//Oculta tr clase item-detail si hay
	var details = $('.item-detail');
	details.each(function () {
		if (!$(this).hasClass('d-none')) {
			$(this).addClass('d-none');
		}
	});
	//Fitra tr clase item-row segun entrada
	var $rows = $('.item-row');
	var val = $.trim($('#ipt_filtrar').val()).replace(/ +/g, ' ').toLowerCase();
	$rows.show().filter(function () {
		var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
		return !~text.indexOf(val);
	}).hide();
}

function quitar_filtro() {
	$('#ipt_filtrar').val('');
	var $rows = $('.item-row');
	$rows.show();
}

function toggleSubClassOfClass(targetClass, groupClass) {
	//muestra u ocutal la clase objetivo y oculta el grupo al que pertenece	
	var target = $('.' + targetClass);
	var others = $('.' + groupClass).not('.' + targetClass);
	others.each(function () {
		if (!$(this).hasClass('d-none')) {
			$(this).addClass('d-none');
		}
	});
	target.toggleClass('d-none');
}