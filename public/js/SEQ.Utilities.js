"use strict";
/**
 * Created by andres on 08/09/15.
 */

var Seq = Seq || {};

Seq.get = {
	json: function (url, callback) {
		$.getJSON(url, function(data) {
			return callback(data, url);
		}).fail(function (result) {
			console.log(result);
		});
	},
	html: function(url, callback){
		$.get(url, function (html) {
			return callback(html);
		});
	}
};

Seq.modal = {
	render: function(html, $modal, size){
		var $modalDialog = $modal.find('.modal-dialog');
		$modalDialog.removeClass("modal-sm modal-lg");
		switch (size){
			case "small":
				$modalDialog.addClass("modal-sm");
				break;
			case "large":
				$modalDialog.addClass("modal-lg");
				break;
			default :
				break;
		}

		$modal.children().children().html(html);
		$modal.modal('show');
	},
	showModal: function(html, modal, size){
		this.render(html, modal, size);
	}
};

Seq.buttons = {
	$button: "",
	loading: function(){
		this.$button.button('loading');
	},

	reset: function(){
		this.$button.button('reset');
	}
};

Seq.undescoreTableRender = {
	render: function ($template, $tableId, data, colspan){
		var col = (typeof colspan == "undefined") ? 3 : colspan;
		console.log (data);
		if(data.length > 0){
				$tableId.find('tbody').html(_.template($template)({'json': data}));
			}else{
				$tableId.find('tbody').html("<tr><td colspan='"+col+"' class='text-center'>SIN RESULTADOS</td></tr>");
		}
	},
	pager: function (url, lastPage) {
		var $pager= $('#pager');
		var template = $('#bootstrap-pagination').html();
		var pager = "";

		for(var i = 1; i <= lastPage; i++){
			pager += "<li><a href='#!' data-loading-text='...' data-button='paginate' data-action='" + url + "&page="+i+"'>"+i+"</a></li>";
		}

		var data = {'pages': pager};

		$pager.find('nav').remove();

		$pager.append(_.template(template)(data));
	},
	paginate: function (url) {

	}
};

Seq.table ={
	render: function ($template, $table, data, colspan, paginatorJson, $container, url) {
		var col = (typeof colspan == "undefined") ? 3 : colspan;
		if(data.length > 0){
			$table.find('tbody').html(_.template($template)({'json': data}));
		}else{
			$table.find('tbody').html("<tr><td colspan='"+col+"' class='text-center'>SIN RESULTADOS</td></tr>");
		}
		if(typeof  paginatorJson != "undefined"){
			this.pager(url, paginatorJson.last_page, $container)
		}
	},
	pager: function (url, lastPage, $container) {
		var $pager= $container.find('.seq-pagination .seq-pager');
		var template = $('#bootstrap-pagination').html();
		var pager = "";

		for(var i = 1; i <= lastPage; i++){
			pager += "<li><a href='#!' data-loading-text='...' data-button='paginate' data-action='" + url + "?page="+i+"'>"+i+"</a></li>";
		}

		var pages = {'pages': pager};

		$pager.find('nav').remove();

		$pager.append(_.template(template)(pages));

		$pager.find('nav ul li').first().addClass('active');
	},
	removeRow: function (row) {
		row.fadeOut(function () {
			this.remove();
		});
	}
};

Seq.string = {
	split: function(str, separator){
		return str.split(separator);
	}
};

Seq.json ={
	//return an array of objects according to key, value, or key and value matching
	getObjects: function(obj, key, val) {
		var objects = [];
		for (var i in obj) {
			if (!obj.hasOwnProperty(i)) continue;
			if (typeof obj[i] == 'object') {
				objects = objects.concat(this.getObjects(obj[i], key, val));
			} else
			//if key matches and value matches or if key matches and value is not passed (eliminating the case where
			// key matches but passed value does not)
			if (i == key && obj[i] == val || i == key && val == '') { //
				objects.push(obj);
			} else if (obj[i] == val && key == ''){
				//only add if the object is not already in the array
				if (objects.lastIndexOf(obj) == -1){
					objects.push(obj);
				}
			}
		}
		return objects;
	},
	//return an array of values that match on a certain key
	getValues: function(obj, key) {
		var objects = [];
		for (var i in obj) {
			if (!obj.hasOwnProperty(i)) continue;
			if (typeof obj[i] == 'object') {
				objects = objects.concat(this.getValues(obj[i], key));
			} else if (i == key) {
				objects.push(obj[i]);
			}
		}
		return objects;
	},
	//return an array of keys that match on a certain value
	getKeys: function(obj, val) {
		var objects = [];
		for (var i in obj) {
			if (!obj.hasOwnProperty(i)) continue;
			if (typeof obj[i] == 'object') {
				objects = objects.concat(this.getKeys(obj[i], val));
			} else if (obj[i] == val) {
				objects.push(i);
			}
		}
		return objects;
	}
};

Seq.errors = {
	$errorListTemplate: $('#error-list-template').html(),
	$errorList: $('#error-list'),
	$containerErrorList: $('#container-error-list'),
	errorMessages: [],
	show: function () {
		this.$errorList.empty();
		this.$errorList.append(_.template(this.$errorListTemplate)({'json': this.errorMessages}));
		this.$containerErrorList.removeClass('hidden');
		this.errors = [];
	},
	hide: function () {
		this.$containerErrorList.addClass('hidden');
		this.$errorList.empty();
		this.errors = [];
	}
};

Seq.date = {
	now: function () {
		var date = new Date();
		return date.toLocaleDateString();
	}
};

Seq.alert = {
	_type: "",
	success: function (msg) {
		this._type = "alert-success";
		this._render(msg);
	},
	info: function (msg) {
		this._type = "alert-info";
		this._render(msg);
	},
	warning: function (msg) {
		this._type = "alert-warning";
		this._render(msg);
	},
	danger: function (msg) {
		this._type = "alert-danger";
		this._render(msg);
	},
	standarError: function () {
		this.danger("Oops! Ha ocurrido un errror :(, al parecer hemos hecho algo mal, favor de contactar al Administrador");
	},
	_render: function (msg) {
		var $containerAlert = $('#container-alert');
		var $alert = $containerAlert.find('.alert');
		var data = {'type': this._type, 'body': msg};
		var template = $('#bootstrap-alert').html();

		$alert.remove();
		$containerAlert.append(_.template(template)(data));
	}
};

Seq.forms = {
	reset: function($form){
		$form.each(function () {
			this.reset();
		});
	}
};


Seq.response = {
	success: function(response, callback){
		return callback(response);
		/*if(response.isValid){
			Seq.alert.success(response.msg);
			return callback(response);
		}else{
			Seq.alert.warning(response.msg);
			return callback(response);
		}*/
	},
	fail: function (response) {
		Seq.alert.standarError();
		console.log(response.msg);
	}
};

/**
 * Templating
 * @param id
 * @returns {Node}
 */
function activateTemplate(id)
{
	var t = document.querySelector(id);
	return document.importNode(t.content, true);
}


/**
 * Templating
 * @param templateId
 * @param targetId
 * @param fields
 */
function renderTableTemplate(templateId, targetId, fields){
	var $targetId = $(targetId);
	var clone;

	if(isEmptyJson(fields)){
		clone = activateTemplate(templateId);
		for(var key in fields){
			clone.querySelector("["+ key + "]").innerHTML = fields[key];
		}
	}else{
		clone = activateTemplate('#template-empty');
	}
	$($targetId).append(clone);
}

/**
 * Verificar si un objeto esta vacio o no
 * @param obj
 * @returns {boolean}
 */
function isEmptyJson(obj){
	return Object.keys(obj).length != 0;

}

/**
 * Mostrar cargando cuando se presiona un button de bootstrap
 * @param state
 * @param $button
 */
function buttonState(state, $button){
	if(state)
		$button.button('loading');
	else
		$button.button('reset');
}

/**
 *
 * @param $template
 * @param $tableId
 * @param data
 */
function underscoreTableTempplate($template, $tableId, data){
	if(data.length > 0){
		$tableId.find('tbody').html(_.template($template)({'centros': data}));
	}else{
		$tableId.find('tbody').html("<tr><td colspan='3' class='text-center'>SIN RESULTADOS</td></tr>");
	}
}

/*
* More info https://css-tricks.com/snippets/jquery/serialize-form-to-json/
*
* */

(function ($) {
	$.fn.serializeJSON = function () {

		var o = {};
		var a = this.serializeArray();
		$.each(a, function () {
			if (o[this.name]) {
				if (!o[this.name].push) {
					o[this.name] = [o[this.name]];
				}
				o[this.name].push(this.value || '');
			} else {
				o[this.name] = this.value || '';
			}
		});
		return o;
	};
})(jQuery);


/*
* More info in http://stepansuvorov.com/blog/2014/04/jquery-put-and-delete/
*
* */
$.put = function(url, data, callback, type){

	if ( $.isFunction(data) ){
		type = type || callback;
		callback = data;
		data = {}
	}

	return $.ajax({
		url: url,
		type: 'PUT',
		success: callback,
		data: data,
		contentType: type
	});
};

$.del = function(url, data, callback, type){

	if ( $.isFunction(data) ){
		type = type || callback;
		callback = data;
		data = {}
	}

	return $.ajax({
		url: url,
		type: 'DELETE',
		success: callback,
		data: data,
		contentType: type
	});
};

$.extend( true, $.fn.dataTable.defaults, {
	"language": {
		"lengthMenu": "Ver _MENU_ registros por página",
		"zeroRecords": "Sin resultados",
		"info": "Viendo página _PAGE_ de _PAGES_",
		"infoEmpty": "No hay registros disponibles",
		"infoFiltered": "(Filtrados _MAX_ del total de registros)",
		"loadingRecords": "Cargando...",
		"processing":     "Procesando...",
		"search":         "Buscar:",
		"paginate": {
			"first":      "Primera",
			"last":       "Última",
			"next":       "Siguiente",
			"previous":   "Anterior"
		}
	}
} );
