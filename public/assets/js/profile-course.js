"use strict";

var ProfileCourse = (function () {

    var initDataTable = function () {
        var table = $('#kt_datatable');

        table.DataTable({
            responsive: true,
            searchDelay: 500,
            processing: true,
            serverSide: true,
            info: true,
            ajax: {
                url: '/user-profile/course',
                type: 'POST',
                data: {
                    columnsDef: ['course', 'name', 'transaction_id', 'created_at'],
                },
            },
            columns: [
                { data: 'course' },
                { data: 'name' },
                { data: 'created_at' },
            ],
            columnDefs: [
                {
                    targets: 0,
                    data: "course",
                    render: function (data, type, row, meta) {
                        if (type === 'display') {
                            return row.course === "light" ? "ライト" : "スタンダード";
                        } else {
                            return row.course;
                        }
                    }
                },
                {
                    targets: 1,
                    data: "name",
                    render: function (data, type, row, meta) {
                        if (type === 'display') {
                            return row.name === null ? "全店舗" : row.name;
                        } else {
                            return row.name;
                        }
                    }
                },
                {
                    targets: 2,
                    data: "created_at",
                    render: function (data, type, row, meta) {
                        if (type === 'display') {
                            var date = new Date(row.created_at);
                            date.setMonth(date.getMonth() + 1);
                            var formattedDate = date.toISOString().split('T')[0];
                            return formattedDate;
                        } else {
                            return row.created_at;
                        }
                    }
                }
            ],
        });
    };

    var initUserAccount = function () {
        $("#updateEmailBtn").click(function () {
            $.ajax({
                type: "POST",
                url: "/user-profile/account",
                data: $("#userAccountForm").serializeJSON(),
                success: function (response) {
                    handleResponse(response);
                },
                error: function (error) {
                    handleAjaxError('メールアドレスが間違っています。再度ご確認ください。');
                }
            });
        });
    };

    var initUserPasswordChange = function () {
        $("#changePwdBtn").click(function () {
            var formData = $("#userPasswordChangeForm").serializeJSON();
            var oldPwd = formData.old_pwd;
            var newPwd = formData.new_pwd;
            var confirmPwd = formData.confirm_pwd;

            if (newPwd !== confirmPwd) {
                handleValidationError('新しいパスワードが一致しません.');
                return;
            }

            if (newPwd.length < 8) {
                handleValidationError('新しいパスワードは少なくとも8文字以上である必要があります。');
                return;
            }

            $.ajax({
                type: "POST",
                url: "/user-profile/password",
                data: formData,
                success: function (response) {
                    handleResponse(response);
                    $("#userPasswordChangeForm input").val('');
                },
                error: function (error) {
                    handleAjaxError('パスワードの変更に失敗しました. 古いパスワードを確認してください.');
                }
            });
        });
    };

    var handleRedirectionTab = function () {
        function openPricingTab(tabId) {
            $('[data-toggle="tab"][href="#' + tabId + '"]').tab('show');
        }

        var urlParams = new URLSearchParams(window.location.search);
        var tabToOpen = urlParams.get('tab');

        if (tabToOpen) {
            openPricingTab(tabToOpen);
        }
    };

    var initUserCourse = function () {
        if (course == "light") {
            $(".course-card").eq(1).addClass('bg-primary').parent().addClass('my-md-n10');
        } else if (course == "standard") {
            $(".course-card").eq(2).addClass('bg-primary').parent().addClass('my-md-n10');
        } else {
            $(".course-card").eq(0).addClass('bg-primary').parent().addClass('my-md-n10');
        }
    };

    return {
        init: function () {
            initUserAccount();
            initUserPasswordChange();
            initDataTable();
            initUserCourse();
            handleRedirectionTab();
        },
    };
})();

jQuery(document).ready(function () {
    ProfileCourse.init();
});