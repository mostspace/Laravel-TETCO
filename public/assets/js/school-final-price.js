"use strict";
var SchoolFinalPrice = function() {

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
						'level_name', 'grade', 'seats', 'actual_price', 'citizen_final_price', 'non_citizen_final_price'],
				},
			},
			columns: [
				{data: 'level_name'},
				{data: 'grade'},
				{data: 'seats'},
				{data: 'actual_price'},
				{data: 'citizen_final_price'},
				{data: 'non_citizen_final_price'},
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
	SchoolFinalPrice.init();
});
