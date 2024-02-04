"use strict";
var ModelList = function() {

	var initModelList = function() {
		$("#modelTable").on("click", ".store-model", function() {
            window.location.href = '/hall-data/' + region.id + '/' + store.id + '/' + encodeURIComponent($(this).text());
        });

		var table = $('#kt_datatables');

		// begin first table
		table.DataTable({
			responsive: true,
			searchDelay: 200,
			processing: true,
			serverSide: true,
			paging: false,
			info: false,
			ajax: {
				url: '/hall-data/model-list/' + store.id,
				type: 'POST',
				data: {
					// parameters for custom backend script demo
					columnsDef: ['model_name'],
				},
			},
			columns: [
				{ data: 'model_name' },
			],
			columnDefs: [
				{ 
					targets: 0,
					data: "model_name",
					render: function(data, type, row, meta) {
						if(type === 'display') {
							return '<a class="p-link store-model">' + row.model_name + '</a>';
						} else if (type === 'sort' || type === 'type') {
							return row.model_name;
						}
					}
				}
			],
		});
	};

	return {
		//main function to initiate the module
		init: function() {
			initModelList();
		},
	};
}();

jQuery(document).ready(function() {
	ModelList.init();
});
