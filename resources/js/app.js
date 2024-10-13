import './bootstrap';

import Alpine from 'alpinejs'
 
window.Alpine = Alpine
 
Alpine.start()

// LOADER FUNCTION
window.addEventListener('load', function() {

    var loader = document.getElementById('loader');
    loader.style.opacity = '0';
    loader.style.transition = 'opacity 0.5s ease';

    setTimeout(function() {
        loader.style.display = 'none';
        document.getElementById('content').style.display = 'block';
    }, 500);
});

  