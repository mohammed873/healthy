     //activating to slidetooglr function to show the update form
     $('#update_profile').click(function(){
        $('.profile_update_form').slideToggle(1500);
    });

    //  validating the update profile form
    $('#update-profile').click(function(e){

        //  checking if the user name is empty
        if ($('#user-name').val() === '' ){
            e.preventDefault();
            $('#name-error').html('user name required');
        }else{
            $('#name-error').html(" ");
        }

        //  checking if the user email is empty and valid
        if ($('#user-email').val() === '' ){
            e.preventDefault();
            $('#email-error').html('user email required');
        }
        else if(IsEmail($('#user-email').val())==false){
            e.preventDefault();
            $('#email-error').html('user email is not valid');
        }
        else{
            $('#email-error').html(" ");
        }

        //  checking if the user passwords is empty and if the two passwords matches
        if($('#user-password').val() === '' || $('#confirm-password').val() === 
        ''){
            e.preventDefault();
            $('.password-error').html("password field must not be empty");
        }
        else if ($('#user-password').val() !== $('#confirm-password').val()){
            e.preventDefault();
            $('.password-error').html("passwords don't match");
        }
        else{
            $('.password-error').html(" ");
        }
        
        //  checking if the user picture is empty
        if ($('#user-picture').val() === '' ){
            e.preventDefault();
            $('#picture-error').html('user picture required');
        }else{
            $('#picture-error').html(" ");
        }        
    });

    //email validation
    function IsEmail(email) {
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(email)) {
          return false;
        }else{
          return true;
        }
      }