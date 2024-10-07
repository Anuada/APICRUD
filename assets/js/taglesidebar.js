
    function toggleSideMenu() {
        var sideMenu = document.querySelector('#offcanvasProfile');
        var body = document.body;

        if (sideMenu.classList.contains('show')) {
            sideMenu.classList.remove('show');
            body.classList.remove('offcanvas-active');
        } else {
            sideMenu.classList.add('show');
            body.classList.add('offcanvas-active');
        }
    }

    function toggleRightMenu() {
        // Implement your logic to toggle the right-side menu here
        // You can use a similar approach as the toggleSideMenu function
    }