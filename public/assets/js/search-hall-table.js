"use strict";

var SearchStore = function() {

	var searchedHallModal = function () {
        // Search Region
		$("#searchRegion").val('');
		var keyword = "";

		$("#searchRegion").keydown(function(event) {
			if(event.which == 13) {
				keyword = $("#searchRegion").val();
				if(keyword) {
					$('#searchModal').modal('show');
					modalTable(keyword);
				}
			}
		});

		$("#searchRegionBtn").click(function() {
			keyword = $("#searchRegion").val();
			if(keyword) {
				$('#searchModal').modal('show');
				modalTable(keyword);
			}
		});

		$("#searchRegion").on('keyup', function(event) {
			if(event.key === 'Delete' || event.key === 'Backspace') {
				if($(this).val().trim() === '') {
					$("#filteredRegion").html('');
					$("#allRegionList").show();
				}
			}
		});
    }

	var modalTable = function(hall_name) {

		var table = $('#kt_datatable');

		// Check if DataTable is already initialized
		if ($.fn.DataTable.isDataTable('#kt_datatable')) {
			// If DataTable is already initialized, destroy it
			table.DataTable().destroy();
			table.empty(); //Optional: Clear the table content
		}

		// begin first table
		table.DataTable({
			responsive: true,
			searchDelay: 500,
			processing: true,
			serverSide: true,
			paging: false,
			info: false,
			scrollbars: true,
			ajax: {
				url: '/search-hall/' + hall_name,
				type: 'POST',
				data: {
					// parameters for custom backend script demo
					columnsDef: ['id', 'region_id', 'name', 'city'],
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
							return '<a href="/hall-data/' + row.region_id + '/' + row.id + '" class="p-link">' + row.name + '</a>';
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
			searchedHallModal();
		},
	};

}();

jQuery(document).ready(function() {
	SearchStore.init();
});
