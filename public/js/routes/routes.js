"use strict";
/**
 * Created by andres on 09/09/15.
 */

var route = route || {};
var baseUrl= window.location.origin;

route = {
	urlName: ""
};

route.get = {
	url: function (urlName) {
		var relativeUrl;

		console.log(urlName);

		if(urlName == undefined){
			console.log(urlName);
			console.log(route.urlName);
			relativeUrl = this.getValue(routes, route.urlName);
			console.log(relativeUrl);
		}else{
			relativeUrl = this.getValue(routes, urlName);
		}
		if(relativeUrl.length>0)
			return baseUrl+relativeUrl[0];
		return "NaN"
	},
	getValue: function(obj, key) {
		var objects = [];
		for (var i in obj) {
			if (!obj.hasOwnProperty(i)) continue;
			if (typeof obj[i] == 'object') {
				objects = objects.concat(this.getValue(obj[i], key));
			} else if (i == key) {
				objects.push(obj[i]);
			}
		}
		return objects;
	}
};

var routes = {
	'getEditOption'		: '/option/{id}/editModal/',
};
