"use strict";
var UsersList = function() {

	var initTable1 = function() {
		var table = $('#kt_datatable');

		// begin first table
		table.DataTable({
			responsive: true,
			searchDelay: 500,
			processing: true,
			serverSide: true,
			ajax: {
				url: '/admin/users-list',
				type: 'POST',
				data: {
					// parameters for custom backend script demo
					columnsDef: [
						'id', 'email', 'created_at'],
				},
			},
			columns: [
				{data: 'id'},
				{data: 'email'},
				{data: 'created_at'},
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
	UsersList.init();
});
