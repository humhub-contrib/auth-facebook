function loadFacebookSDK() {
    if (typeof FB !== 'undefined') {
        FB.XFBML.parse();
    } else {
        $.getScript('https://connect.facebook.net/en_US/sdk.js', function() {
            FB.init({
                xfbml            : true,
                version          : 'v16.0'
            });
            FB.XFBML.parse();
        });
    }
}

$(document).on('ready pjax:success', function() {
    loadFacebookSDK();
});

loadFacebookSDK();