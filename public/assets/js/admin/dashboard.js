"use strict";
var AdminDashboard = function() {

	var initTable1 = function() {
		var table = $('#usersTable');

		// begin first table
		table.DataTable({
			responsive: true,
			searchDelay: 500,
			processing: true,
			serverSide: true,
			ajax: {
				url: '/users-list',
				type: 'POST',
				data: {
					// parameters for custom backend script demo
					columnsDef: [
						'id', 'name', 'email'],
				},
			},
			columns: [
				{data: 'id'},
				{data: 'name'},
				{data: 'email'},
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
