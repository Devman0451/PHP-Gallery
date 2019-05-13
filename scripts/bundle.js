(() => {
    // Handle the profile dropdown menu
    // =================================================================================

    const trigger = document.querySelector('.signin--list');
    const dropdown = document.querySelector('.dropdown');

    function hoverProfileEnter() {
        dropdown.style.display = 'block';
    }

    function hoverProfileLeave() {
        dropdown.style.display = 'none';
    }

    trigger.addEventListener('mouseenter', hoverProfileEnter);
    trigger.addEventListener('mouseleave', hoverProfileLeave);

    // Navigation Menu for mobile
    // =================================================================================

    const menuBarButton = document.querySelector('.hamburger-header');
    const mobileNavMenu = document.querySelector('.mobile--navmenu');

    window.onresize = throttle(function () {
        checkWindowSize();
    }, 100);

    //Removes open mobile menu if window is resized above media query limit for mobile
    function checkWindowSize() {
        if (window.innerWidth > 950) {
            mobileNavMenu.style.display = 'none';
        }
    }

    //Toggle menu open and closed
    function toggleMenu() {
        if (mobileNavMenu.style.display == '' || mobileNavMenu.style.display == 'none') {
            mobileNavMenu.style.display = 'block';

        } else {
            mobileNavMenu.style.display = 'none';
        }
    }

    menuBarButton.addEventListener('click', toggleMenu);

    //Limits calls to checkWindowResize
    function throttle(func, limit) {
        let lastFunc;
        let lastRan;

        return function () {
            const context = this;
            const args = arguments;
            if (!lastRan) {
                func.apply(context, args);
                lastRan = Date.now();
            } else {
                clearTimeout(lastFunc);
                lastFunc = setTimeout(function () {
                    if ((Date.now() - lastRan) >= limit) {
                        func.apply(context, args);
                        lastRan = Date.now();
                    }
                }, limit - (Date.now() - lastRan))
            }
        }
    }

    // Display filename for uploaded images in upload.php
    // =================================================================================

    const fileUploadInput = document.querySelector('#image');
    const fileName = document.querySelector('.filename');

    function addFileTitle(e) {
        fileName.innerText = this.files[0].name;
    }

    if (fileUploadInput != null) {
        fileUploadInput.addEventListener('change', addFileTitle);
    }
})();