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
			paging: true,
			info: false,
            searching: false,
			ajax: {
				url: '/discount-matrix',
				type: 'POST',
				data: {
					// parameters for custom backend script demo
					columnsDef: [
						'id', 'from', 'to', 'applied_discount'],
				},
			},
			columns: [
				{data: 'from'},
				{data: 'to'},
				{data: 'applied_discount'},
			],
            columnDefs: [
                {
					targets: 0,
					data: "from",
					render: function(data, type, row, meta) {
						if(type === 'display') {
							return '<input type="text" class="form-control edit_value" data-id="' + row.id + '" data-target="from" value="'+  row.from +'"/>';
						} else if (type === 'sort' || type === 'type') {
							return row.from;
						}
					}
				},
                {
					targets: 1,
					data: "applied_discount",
					render: function(data, type, row, meta) {
						if(type === 'display') {
							return '<input type="text" class="form-control edit_value" data-id="' + row.id + '" data-target="to" value="'+  row.to +'"/>';
						} else if (type === 'sort' || type === 'type') {
							return row.to;
						}
					}
				},
                {
					targets: 2,
					data: "applied_discount",
					render: function(data, type, row, meta) {
						if(type === 'display') {
							return '<input type="text" class="form-control edit_value" data-id="' + row.id + '" data-target="applied_discount" value="'+  row.applied_discount +'"/>';
						} else if (type === 'sort' || type === 'type') {
							return row.applied_discount;
						}
					}
				},
			],
		});
	};

    var initMain = function () {
        // Keydown event handler for elements with class 'edit_value'
        $("#discountMatrixTable").on("keydown", ".edit_value", function(event) {
            if (event.keyCode === 13) {
				$(this).blur();
                $.ajax({
                    type: "POST",
                    url: "/update-discount-matrix",
                    data: {
                        id: $(this).data('id'),
                        target: $(this).data('target'),
                        value: $(this).val(),
                    },
                    success: function (response) {
                        handleResponse(response);
                    },
                    error: function (error) {
                        handleAjaxError('Please enter the input format correctly.');
                    }
                });
            }
        });
    };

	return {
		//main function to initiate the module
		init: function() {
			initTable1();
			initMain();
		},
	};
}();

jQuery(document).ready(function() {
	AdminDashboard.init();
});
