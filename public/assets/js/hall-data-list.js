"use strict";
var HallDataList = function() {

	var initHallDataListTable = function() {
		var table = $('#kt_datatable');

		// begin first table
		table.DataTable({
			responsive: true,
			searchDelay: 500,
			processing: true,
			serverSide: true,
			paging: false,
			info: false,
			ajax: {
				url: '/hall-data/' + region_id,
				type: 'POST',
				data: {
					// parameters for custom backend script demo
					columnsDef: ['id', 'name', 'city'],
				},
			},
			columns: [
				{ data: 'name' },
				{ data: 'city' }
			],
			columnDefs: [
				{
					targets: 0,
					data: "name",
					render: function(data, type, row, meta) {
						if(type === 'display') {
							return '<a href="/hall-data/' + region_id + '/' + row.id + '" class="p-link">' + row.name + '</a>';
						} else if (type === 'sort' || type === 'type') {
							return row.name;
						}
					}
				}
			],
		});
	};

	return {
		//main function to initiate the module
		init: function() {
			initHallDataListTable();
		},
	};

}();

jQuery(document).ready(function() {
	HallDataList.init();
});
