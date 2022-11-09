window.onload = (function(){
    console.log('Welcome to RamNav Maintenance WebApp');
    var viewReportsBtn = document.getElementById('reportsBtn');
    var settingsBtn = document.getElementById('settingsBtn');
    var logoutBtn = document.getElementById('logoutBtn');

    viewReportsBtn.addEventListener("click", function(event) {
        $('#reportsModal').modal('show');
    })

    logoutBtn.addEventListener("click", function(event) {
        confirm("Are you sure you want to logout?");
    })

    /*settingsBtn.addEventListener("click", function(event) {
        $('#settingsModal').modal('show');
        console.log('View Settings')
    })*/
})