import jQuery from 'jquery';

window.$ = jQuery;
import '../../node_modules/select2/dist/js/select2.full';
import '../../node_modules/toastr/toastr';

import './components/delete-modal';
import './components/sidebar';
import './item';

$(function () {
    $('select').select2({
        theme: "bootstrap-5",
    });
});
