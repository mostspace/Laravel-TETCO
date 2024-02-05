"use strict";
var AdminDashboard = function() {

	var initTable1 = function() {
		var table = $('#priceLimitTable');

		// begin first table
		table.DataTable({
			responsive: true,
			searchDelay: 500,
			processing: true,
			serverSide: true,
			ajax: {
				url: '/school-price-limit',
				type: 'POST',
				data: {
					// parameters for custom backend script demo
					columnsDef: [
						'level_name', 'price_limit'],
				},
			},
			columns: [
				{data: 'level_name'},
				{data: 'price_limit'},
			]
		});
	};

	return {
		//main function to initiate the module
		init: function() {
			initTable1();
		},

	};

}();

jQuery(document).ready(function() {
	AdminDashboard.init();
});
