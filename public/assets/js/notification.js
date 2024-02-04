// Notification

var content = {};

function notification() {
    $.notify(content, {
        type: content.type,
        allow_dismiss: false,
        newest_on_top: true,
        mouse_over: true,
        showProgressbar: false,
        spacing: 10,
        timer: 2000,
        placement: {
            from: 'top',
            align: 'right'
        },
        offset: {
            x: 50,
            y: 100
        },
        delay: 1000,
        z_index: 10000,
        animate: {
            enter: 'animate__animated animate__' + content.animation_enter,
            exit: 'animate__animated animate__' + content.animation_exit
        }
    });
}

// Handle AJAX response
function handleResponse(response) {
    if (response.result === "success") {
        content.message = '';
        content.title = response.message;
        content.type = 'success';
        content.animation_enter = 'bounceInDown';
        content.animation_exit = 'bounceOutUp';
        notification(content);
    } else {
        handleAjaxError(response.message);
    }
}

// Handle AJAX error
function handleAjaxError(errorMessage) {
    content.message = '';
    content.title = errorMessage;
    content.type = 'warning';
    content.animation_enter = 'wobble';
    content.animation_exit = 'bounceOutRight';
    notification(content);
}

// Handle client-side validation error
function handleValidationError(errorMessage) {
    content.message = '';
    content.title = errorMessage;
    content.type = 'warning';
    content.animation_enter = 'wobble';
    content.animation_exit = 'bounceOutRight';
    notification(content);
}