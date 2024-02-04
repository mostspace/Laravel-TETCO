"use strict";

var searchModalWidget = function() {

	var searchedHallModal = function () {
        // Search Store
		$("#searchStore").val('');
        var store_id = "";

		$("#searchStore").click(function() {
			$('#searchModal').modal('show');
            modalTable("whole");
		});

		$("#searchStoreBtn").click(function() {
            $('#searchModal').modal('show');
            modalTable("whole");
		});

        $("#searchModal").on("click", ".p-link", function() {
            store_id = $(this).data('id');
            $("#searchStore").val($(this).text());
            $('#searchModal').modal('hide');
        });

        $("#checkStore").click(function(e) {
            if ($("#searchStore").val()) {
                Swal.fire({
                    title: $("#searchStore").val(),
                    text: "こちらの店舗情報を購読しますか？",
                    icon: "success",
                    buttonsStyling: false,
                    confirmButtonText: "購読する",
                    showCancelButton: true,
                    cancelButtonText: "キャンセル",
                    customClass: {
                        confirmButton: "btn btn-primary",
                        cancelButton: "btn btn-outline btn-outline-danger"
                    }
                }).then(function (result) {
                    if (result.value) {
                        window.location.href = '/billing/light/' + store_id;
                    }
                });
            } else {
                Swal.fire({
                    title: "店舗を選択してください",
                    icon: "warning",
                    buttonsStyling: false,
                    confirmButtonText: "閉じる",
                    customClass: {
                        confirmButton: "btn btn-primary",
                    }
                });
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
			paging: true,
			info: true,
			ajax: {
				url: '/search-hall/' + hall_name,
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
							return '<a class="p-link" data-id="' + row.id + '">' + row.name + '</a>';
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
	searchModalWidget.init();
});
