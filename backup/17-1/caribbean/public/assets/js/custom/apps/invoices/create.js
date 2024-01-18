'use strict';

var KTAppInvoicesCreate = (function () {
    var e,
        t = function () {
            var t = [].slice.call(
                e.querySelectorAll(
                    '[data-kt-element="items"] [data-kt-element="item"]'
                )
            );
            var a = 0;
            var n = wNumb({ decimals: 2, thousand: ',' });

            t.map(function (e) {
                var t = e.querySelector('[data-kt-element="quantity"]');
                var l = e.querySelector('[data-kt-element="price"]');
                var r = n.from(l.value);
                r = !r || r < 0 ? 0 : r;
                var i = parseInt(t.value);
                i = !i || i < 0 ? 1 : i;
                l.value = n.to(r);
                t.value = i;
                e.querySelector('[data-kt-element="total"]').innerText = n.to(r * i);
                a += r * i;
            });

            e.querySelector('[data-kt-element="sub-total"]').innerText = n.to(a);
            e.querySelector('[data-kt-element="grand-total"]').innerText = n.to(a);
        },
        a = function () {
            if (
                0 ===
                e.querySelectorAll(
                    '[data-kt-element="items"] [data-kt-element="item"]'
                ).length
            ) {
                var t = e
                    .querySelector('[data-kt-element="empty-template"] tr')
                    .cloneNode(true);
                e.querySelector('[data-kt-element="items"] tbody').appendChild(t);
            } else {
                KTUtil.remove(
                    e.querySelector(
                        '[data-kt-element="items"] [data-kt-element="empty"]'
                    )
                );
            }
        };

    return {
        init: function (n) {
            e = document.querySelector('#kt_invoice_form');

            KTUtil.on(
                e,
                '[data-kt-element="items"] [data-kt-element="remove-item"]',
                'click',
                function (e) {
                    e.preventDefault();
                    KTUtil.remove(
                        this.closest('[data-kt-element="item"]')
                    );
                    a();
                    t();
                }
            );

            KTUtil.on(
                e,
                '[data-kt-element="items"] [data-kt-element="quantity"], [data-kt-element="items"] [data-kt-element="price"]',
                'change',
                function (e) {
                    e.preventDefault();
                    t();
                }
            );

            $(e.querySelector('[name="invoice_date"]')).flatpickr({
                enableTime: false,
                dateFormat: 'd, M Y'
            });

            // $(e.querySelector('[name="invoice_due_date"]')).flatpickr({
            //     enableTime: false,
            //     dateFormat: 'd, M Y'
            // });

            t();
        }
    };
})();

KTUtil.onDOMContentLoaded(function () {
    KTAppInvoicesCreate.init();
});


