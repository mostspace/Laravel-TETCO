"use strict";
var AdminDashboard = function() {

	var initTable1 = function() {
		var table = $('#schoolTable');

		// begin first table
		table.DataTable({
			responsive: true,
			searchDelay: 500,
			processing: true,
			serverSide: true,
			ajax: {
				url: '/schools-list',
				type: 'POST',
				data: {
					// parameters for custom backend script demo
					columnsDef: [
						'id', 'name'],
				},
			},
			columns: [
				{data: 'id'},
				{data: 'name'},
			],
			columnDefs: [
				{
					targets: 1,
					data: "name",
					render: function(data, type, row, meta) {
						if(type === 'display') {
							return '<a href="/schools-actual-price/' + row.id + '" class="">' + row.name + '</a>';
						} else if (type === 'sort' || type === 'type') {
							return row.name;
						}
					}
				}
			],
		});
	};

	var initMain = function () {
		$("#schoolTable").on("click", "td:nth-child(2)", function() {
		
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
