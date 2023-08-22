import './bootstrap';
import 'flowbite';
import Alpine from 'alpinejs'
import { Datepicker, DateRangePicker } from 'flowbite-datepicker';

window.Alpine = Alpine
Alpine.start()

// const datepicker = new Datepicker(document.querySelector('[datepicker]'), {
//     language: 'id',
//     autohide: true,
//     format: 'dd-mm-yyyy',
//     todayBtn: true,
//     clearBtn: true,
//     todayBtnMode: 1,
// });

const rangepicker = new DateRangePicker(document.querySelector('[rangepicker]'), {
    language: 'id',
    format: 'dd-mm-yyyy',
    todayBtn: true,
    clearBtn: true,
    todayBtnMode: 1,
});

