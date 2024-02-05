"use strict";
var AdminDashboard = function() {

	var initTable1 = function() {
		var table = $('#discountMatrixTable');

		// begin first table
		table.DataTable({
			responsive: true,
			searchDelay: 500,
			processing: true,
			serverSide: true,
			ajax: {
				url: '/discount-matrix',
				type: 'POST',
				data: {
					// parameters for custom backend script demo
					columnsDef: [
						'from', 'to', 'applied_discount'],
				},
			},
			columns: [
				{data: 'from'},
				{data: 'to'},
				{data: 'applied_discount'},
			],
            columnDefs: [
                {
					targets: 2,
					data: "applied_discount",
					render: function(data, type, row, meta) {
						if(type === 'display') {
							return '<input type="text" class="form-control price_limit_value" data-id="' + row.id + '" value="'+  row.applied_discount +'"/>';
						} else if (type === 'sort' || type === 'type') {
							return row.applied_discount;
						}
					}
				},
			],
		});
	};

    // var initMain = function () {
        
    // };

	return {
		//main function to initiate the module
		init: function() {
			initTable1();
			// initMain();
		},

	};

}();

jQuery(document).ready(function() {
	AdminDashboard.init();
});
