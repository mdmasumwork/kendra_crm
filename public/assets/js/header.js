document.addEventListener('DOMContentLoaded', function() {
    const burgerMenu = document.querySelector('.burger-menu');
    const burgerMenuClose = document.querySelector('.burger-menu-close');
    const siteHeaderConditional = document.querySelector('.site-header-conditional');
    
    burgerMenu.addEventListener('click', function() {
        // Toggle visibility of the buttons
        burgerMenu.style.display = 'none';
        burgerMenuClose.style.display = 'block';
        
        // Toggle visibility of the site-header-conditional
        siteHeaderConditional.style.display = 'block';
    });
    
    burgerMenuClose.addEventListener('click', function() {
        // Toggle visibility of the buttons
        burgerMenuClose.style.display = 'none';
        burgerMenu.style.display = 'block';
        
        // Toggle visibility of the site-header-conditional
        siteHeaderConditional.style.display = 'none';
    });
});
