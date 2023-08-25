// Global variables
let ajaxurl;


/**
 * Verify if the DOM is ready
 *
 * @return {void}
 */
function domReady(fn)
{
    // If we're early to the party
    document.addEventListener("DOMContentLoaded", fn);
    // If late; I mean on time.
    if (document.readyState === "interactive" || document.readyState === "complete" ) {
        fn();
    }
}


/**
 * Application entrypoint
 *
 * @return {void}
 */
domReady(() => {
    console.log('The Boilerplate Plugin Engine Dom is ready! 🚀');

    // Get the settings from the global object
    const zone = bpsettings.zone;
    ajaxurl = bpsettings.ajaxurl;

    // Execute the function
    switch ( zone ) {
        case 'admin': admin(); break;
        case 'frontend': frontend(); break;
    }

    // Global functions

});

/**
 * Admin
 *
 * @return {void}
 */
function admin()
{
    console.log('Admin Functions');
}

/**
 * Frontend
 *
 * @return {void}
 */
function frontend()
{
    console.log('Frontend Functions');

    // Load functions for the frontend
    loadFrontendFunctions();
}

/**
 * Load functions for the frontend
 *
 */
function loadFrontendFunctions(){

    // Add a click event to the button
    if ( document.getElementById('checkservertime') ) {
        document.getElementById('checkservertime').addEventListener('click', function(e){
            e.preventDefault();

            // create the params with time format and action values
            const paramsCheckServertime = new URLSearchParams({
                action:     'checkServerTime',
                timeFormat: 'H:i:s',
            });

            // Store the response
            let response = getFromAdminAjax(paramsCheckServertime);

            // Show the response
            response.then(function(data) {
                document.getElementById('response-checkservertime').innerHTML = data + 'hrs';
            });

        });
    }

}

/**
 * Get data from admin-ajax.php
 * @param params
 * @returns {Promise<any>}
 */
function getFromAdminAjax(params) {
    return fetch(ajaxurl, {
        method: 'POST',
        body: params
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .catch(error => {
            console.error(error);
            throw error; // Rethrow the error to handle it in the calling code
        });
}