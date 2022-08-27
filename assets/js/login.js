$(document).ready(function() {
    // show hide login and registration form
    $('#register').on('click', function(e) {
        e.preventDefault();
        $("#register_form").removeClass('d-none');
        $("#login_form").addClass('d-none');
        $("#auth_system").text("Registration")
    });

    $('#login').on('click', function(e) {
        e.preventDefault();
        $("#login_form").removeClass('d-none');
        $("#register_form").addClass('d-none');
        $("#auth_system").text("Login")
    });
    
    // user registration
    $('#register_form').on('submit', function(e) {
        e.preventDefault();

        var formData = $(this).serialize();
        formData += "&sign_up=" + true;

        $.ajax({
            url: "authentication.php",
            type: "POST",
            data: formData,
            cache: false,
            success: function(data){

                var response = jQuery.parseJSON(data);

                if(response.status == 200){
                    location.href = "index.php";

                } else if(response.status == 201){
                    $('#errorMessage').removeClass('d-none');
                    $('#errorMessage').text(response.message);

                    setTimeout(function() {
                        $('#errorMessage').addClass('d-none');
                    }, 1500);	
                }
                
            }
        });
    });

    // user login
    $('#login_form').on('submit', function(e) {
        
        e.preventDefault();

        var formData = $(this).serialize();
        formData += "&sign_in=" + true;

        $.ajax({
            url: "authentication.php",
            type: "POST",
            data: formData,
            success: function(data){

                var response = JSON.parse(data);
                
                if(response.status == 200){
                    location.href = "index.php";

                } else if(response.status == 422){
                    $('#errorMessage').removeClass('d-none');
                    $('#errorMessage').text(response.message);

                    setTimeout(function() {
                        $('#errorMessage').addClass('d-none');
                    }, 1500);	
                } else if(response.status == 201) {
                    $('#errorMessage').removeClass('d-none');
                    $('#errorMessage').text(response.message);

                    setTimeout(function() {
                        $('#errorMessage').addClass('d-none');
                    }, 1500);
                } else {
                    // alert(response.message)
                }
            }
        });
    });
});