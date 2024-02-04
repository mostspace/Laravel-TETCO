"use strict";

var Payment = (function () {
    var $form = $(".require-validation");

    var initStripePayment = function () {
        $('form.require-validation').on('submit', function (e) {
            var inputSelector = ['input[type=email]', 'input[type=password]',
                'input[type=text]', 'input[type=file]',
                'textarea'].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error');

            $errorMessage.addClass('hide');

            $('.has-error').removeClass('has-error');

            $inputs.each(function (i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });

            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
            }
        });
    };

    var initConfirmModal = function () {
        $("#paySubmit").removeClass('spinner');
        
        $("#payment-form").on("click", "#paySubmit", function(e) {
            e.preventDefault();

            // Assuming cardNumber is the variable containing the card number
            var cardNumber = $(".card-number").val();
            // Use validateCreditCard method on the input field
            var cardInfo = $(".card-number").validateCreditCard();
            // Check if the card is valid
            if (cardInfo.valid) {
                var cardType = cardInfo.card_type.name;

                $("#pay_method").text(cardType + " ****" + cardNumber.slice(-4));
                $("#pay_amount").text($(".course_pay_amount").text());
            } else {
                $("#pay_method").text("無効なカード番号");
            }
        });

        $("#confirmPayBtn").click(function() {
            $('#confirmPaymentModal').modal('hide');
            $("#paySubmit").addClass('spinner');
            $("#payment-form").submit();
        });
    };

    /* Stripe Response Handler */
    function stripeResponseHandler(status, response) {
        if (response.error) {
            var errorMessages = {
                'incorrect_number': 'カード番号が正しくありません。',
                'invalid_number': 'カード番号が無効です。',
                'invalid_expiry_month': '有効期限の月が無効です。',
                'invalid_expiry_year': '有効期限の年が無効です。',
                'invalid_cvc': 'CVCが無効です。',
                'expired_card': 'カードの有効期限が切れています。',
                'incorrect_cvc': 'CVCが正しくありません。',
                'card_declined': 'カードが拒否されました。',
                'missing': '必要なカード情報が提供されていません。',
                'processing_error': '処理中にエラーが発生しました。もう一度お試しください。'
                // Add more error messages as needed
            };

            var errorMessage = errorMessages[response.error.code] || 'エラーが発生しました。もう一度お試しください。';

            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(errorMessage);

            $("#paySubmit").removeClass('spinner');
        } else {
            /* token contains id, last4, and card type */
            var token = response['id'];

            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.append("<input type='hidden' name='paymentCourse' value='" + course + "'/>");
            $form.append("<input type='hidden' name='storeId' value='" + store_id + "'/>");
            $form.get(0).submit();
        }
    }

    return {
        init: function () {
            initStripePayment();
            initConfirmModal();
        },
    };
})();

jQuery(document).ready(function () {
    Payment.init();
});
