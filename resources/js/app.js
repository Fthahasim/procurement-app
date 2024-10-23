import '../css/app.css'; 

import 'bootstrap';
import $ from 'jquery';

window.$ = $;
window.jQuery = $;

import './supplier.js'
import './items.js'
import './purchaseOrder.js'


$(document).ready(()=>{
    $('#open-sidebar,#sidebar-overlay').click(()=>{
        // add class active on #sidebar
        $('#sidebar').toggleClass('active');
        // show sidebar overlay
        $('#sidebar-overlay').toggleClass('d-none');
     });
});