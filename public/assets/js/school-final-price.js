"use strict";
var AdminDashboard = function() {

	var initTable1 = function() {
		var table = $('#gradeTable');

		// begin first table
		table.DataTable({
			responsive: true,
			searchDelay: 500,
			processing: true,
			serverSide: true,
			ajax: {
				url: '/school/' + school_id,
				type: 'POST',
				data: {
					// parameters for custom backend script demo
					columnsDef: [
						'level_name', 'grade', 'final_price'],
				},
			},
			columns: [
				{data: 'level_name'},
				{data: 'grade'},
				// {data: 'seats'},
				// {data: 'actual_price'},
				{data: 'final_price'},
			],
            columnDefs: [
				{
					targets: 2,
					data: "final_price",
					render: function(data, type, row, meta) {
						if(type === 'display') {
							return row.final_price;
						} else if (type === 'sort' || type === 'type') {
							return row.final_price;
						}
					}
				}
			],
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
