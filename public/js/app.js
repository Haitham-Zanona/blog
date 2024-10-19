import $ from 'jquery';
window.$ = window.jQuery = $;

import './bootstrap';
import 'datatables.net-dt';
import 'datatables.net-responsive-dt';

// Import CKEditor Classic build
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

// Initialize CKEditor on a textarea (or any other element)
ClassicEditor
    .create(document.querySelector('#editor'), {
        toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote']
    })
    .then(editor => {
        console.log('Editor was initialized:', editor);
    })
    .catch(error => {
        console.error('There was a problem initializing the editor:', error);
    });



import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
