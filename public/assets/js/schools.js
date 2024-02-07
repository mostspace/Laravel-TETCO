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
						'id', 'school_name', 'id'],
				},
			},
			columns: [
				{data: 'id'},
				{data: 'school_name'},
				{data: 'id', responsivePriority: -1},
			],
			columnDefs: [
				{
					targets: 2,
					// title: 'Actions',
					// orderable: false,
					render: function(data, type, full, meta) {
						return '\
							<a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-row-edit" title="Edit details" data-id="' + full.id + '" data-name="' + full.school_name + '">\
								<i class="la la-edit"></i>\
							</a>\
							<a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-row-delete" title="Delete" data-id="' + full.id + '">\
								<i class="la la-trash"></i>\
							</a>\
						';
					},
				},
				{
					targets: 1,
					data: "school_name",
					render: function(data, type, row, meta) {
						if(type === 'display') {
							return '<a href="/schools-actual-price/' + row.id + '" class="">' + row.school_name + '</a>';
						} else if (type === 'sort' || type === 'type') {
							return row.school_name;
						}
					}
				}
			],
		});
	};

	var initMain = function () {
		$("#dataModal").on("click", "#addSchool", function() {
			if ($("#schoolName").val() !== '') {
				addNewSchool();
			}
		});

		$("#schoolTable").on("click", ".btn-row-delete", function() {
			var school_id = $(this).data('id');

			Swal.fire({
				title: "Are you sure?",
				text: "You won't be able to revert this!",
				icon: "warning",
				showCancelButton: true,
				confirmButtonText: "Yes, delete it!",
				cancelButtonText: "No, cancel!",
				reverseButtons: true
			}).then(function(result) {
				if (result.value) {
					$.ajax({
						url: "/delete-school",
						type: "post",
						data: {
							id: school_id,
						},
						success: function (response) {
							Swal.fire(
								"Deleted!",
								"The school has been deleted.",
								"success"
							).then(function(result) {
								window.location.reload();
							});
						},
						error: function (error) {
							handleAjaxError('Failed to delete school.');
						}
					});
				} 
			});
		});

		$("#schoolTable").on("click", ".btn-row-edit", function() {
			var school_name = $(this).data('name');
			var school_id = $(this).data('id'); // Corrected variable name
			$("#editModal").modal('show');
			$("#editModal").find("#updateSchool").val(school_name);
			$("#editModal").find("#updateSchoolId").val(school_id);
		});
		

		$("#editModal").on("click", "#updateSchoolBtn", function() {
			$.ajax({
				url: "/update-school",
				type: "post",
				data: {
					school_id: $("#updateSchoolId").val(),
					school_name: $("#updateSchool").val(),
				},
				success: function (response) {
					handleResponse(response);
					$("#editModal").modal('hide');
					setTimeout(function() {
						window.location.reload();
					}, 2000);
				},
				error: function (error) {
					handleAjaxError('Please enter the school name correctly.');
				}
			});
		});
	}
	
	var addNewSchool = function () {
		$.ajax({
			url: "/add-new-school",
			type: "post",
			data: {
				data: $("#newSchoolFrom").serializeJSON(),
			},
			success: function (response) {
				handleResponse(response);
				$("#dataModal").modal('hide');
				setTimeout(function() {
					window.location.reload();
				}, 2000);
			},
			error: function (error) {
				handleAjaxError('Please enter the school name correctly.');
			}
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
