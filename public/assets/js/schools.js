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
						'id', 'school_name'],
				},
			},
			columns: [
				{data: 'id'},
				{data: 'school_name'},
			],
			columnDefs: [
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
