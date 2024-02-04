"use strict";
var StoreDataList = function() {

	var initTable1 = function() {
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
				url: '/store-data-list/' + store_data_id,
				type: 'POST',
				data: {
					columnsDef: ['id', 'model_name', 'machine_number', 'g_number', 'bb', 'rb', 'art', 'composite_probability', 'bb_probability', 'rb_probability', 'art_probability'],
				},
			},
			columns: [
				{ data: 'model_name' },
				{ data: 'machine_number' },
				{ data: 'g_number' },
				{ data: 'bb' },
				{ data: 'rb' },
				{ data: 'art' },
				{ data: 'composite_probability' },
				{ data: 'bb_probability' },
				{ data: 'rb_probability' },
				{ data: 'art_probability' },
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
	StoreDataList.init();
});
