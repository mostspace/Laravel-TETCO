"use strict";
var AdminDashboard = function() {

	var initTable1 = function() {
		var table = $('#actualPriceTable');

		// begin first table
		table.DataTable({
			responsive: true,
			searchDelay: 500,
			processing: true,
			serverSide: true,
			ajax: {
				url: '/school-grade/' + school_id,
				type: 'POST',
				data: {
					// parameters for custom backend script demo
					columnsDef: [
						'id', 'level_name', 'grade', 'seats', 'actual_price'],
				},
			},
			columns: [
				{data: 'level_name'},
				{data: 'grade'},
				{data: 'seats'},
				{data: 'actual_price'},
			],
			columnDefs: [
                {
					targets: 2,
					data: "seats",
					render: function(data, type, row, meta) {
						if(type === 'display') {
							return '<input type="text" class="form-control edit_value" data-id="' + row.id + '" data-target="seats" value="'+  row.seats +'"/>';
						} else if (type === 'sort' || type === 'type') {
							return row.seats;
						}
					}
				},
                {
					targets: 3,
					data: "actual_price",
					render: function(data, type, row, meta) {
						if(type === 'display') {
							return '<input type="text" class="form-control edit_value" data-id="' + row.id + '" data-target="actual_price" value="'+  row.actual_price +'"/>';
						} else if (type === 'sort' || type === 'type') {
							return row.actual_price;
						}
					}
				},
			],
		});
	};

	var initMain = function () {

		// Keydown event handler for elements with class 'edit_value'
        $("#actualPriceTable").on("keydown", ".edit_value", function(event) {
            // Check if the key pressed is Enter (key code 13)
            if (event.keyCode === 13) {
				// Remove focus from the input field
				$(this).blur();
                $.ajax({
                    type: "POST",
                    url: "/update-actual-price",
                    data: {
                        id: $(this).data('id'),
                        target: $(this).data('target'),
                        value: $(this).val(),
                    },
                    success: function (response) {
                        handleResponse(response);
                    },
                    error: function (error) {
						// console.log(error.responseJSON('error.responseJSON.message'));
                        handleAjaxError('Please enter the input format correctly.');
                    }
                });
            }
        });

		// Add actual price and available seats
		$("#addGrade").click(function(e) {
			e.preventDefault();

			$.ajax({
                type: "POST",
                url: "/add-grade",
                data: {
					data: $("#newGradeForm").serializeJSON(),
					school_id: school_id
				},
                success: function (response) {
                    handleResponse(response);
                },
                error: function (error) {
                    handleAjaxError('Please enter the input format correctly.');
                }
            });
		});
	}

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
