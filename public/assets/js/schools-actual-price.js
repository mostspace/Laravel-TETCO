"use strict";
var AdminDashboard = function() {

	var initTable1 = function() {
		var table = $('#gradeTable');

		// begin first table
		table.DataTable({
			responsive: true,
			searchDelay: 500,
			processing: true,
			serverSide: true,
			ajax: {
				url: '/school-grade/' + school_id,
				type: 'POST',
				data: {
					// parameters for custom backend script demo
					columnsDef: [
						'level_name', 'grade', 'seats', 'actual_price'],
				},
			},
			columns: [
				{data: 'level_name'},
				{data: 'grade'},
				{data: 'seats'},
				{data: 'actual_price'},
			],
		});
	};

	var initMain = function () {
		$("#addGrade").click(function(e) {
			e.preventDefault();

			console.log($("#newGradeForm").serializeJSON());

			$.ajax({
                type: "POST",
                url: "/add-grade",
                data: {
					data: $("#newGradeForm").serializeJSON(),
					school_id: school_id
				},
                success: function (response) {
                    handleResponse(response);
                },
                error: function (error) {
                    handleAjaxError('メールアドレスが間違っています。再度ご確認ください。');
                }
            });
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
