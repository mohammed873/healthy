$('#update_info').click(function()
{
    $('.update_info_form').slideToggle(1500);
});

//validate the update info form
$('#update-info').click(function(e){

  //checking the doctor name if empty
    if ($("#doctor-name").val() === '') {
        e.preventDefault();
        $('#name-error').html('doctor name required');
    }else{
      $('#name-error').css('visibility','hidden');
    }
    
    //  checking if the doctor email is empty and valid
    if ($('#doctor-email').val() === '' ){
      e.preventDefault();
      $('#email-error').html('doctor email required');
    }
    else if(IsEmail($('#doctor-email').val())==false){
        e.preventDefault();
        $('#email-error').html('invalid email address');
    }else{
      $('#email-error').css('visibility','hidden');
    }
    
    //  checking if the doctor linkdin url if it is empty and valid
    if ($('#doctor-linkdin').val() === '' ){
      e.preventDefault();
      $('#linkdin-error').html(' linkdin URL required');
    }
    else if(isUrlValid($('#doctor-linkdin').val())==false){
      e.preventDefault();
      $('#linkdin-error').html('invalid linkdin URL');
    }else{
      $('#linkdin-error').css('visibility','hidden');
    }
    
    //  checking if the doctor  phone number if it  is empty and valid
    if ($('#doctor-phone').val() === '' ){
      e.preventDefault();
      $('#phone-error').html(' phone number required');
    }
    else if(IsPhone($('#doctor-phone').val())==false){
      e.preventDefault();
      $('#phone-error').html('invalid phone number');
    }else{
      $('#phone-error').css('visibility','hidden');
    }
    
    //  checking if the doctor  years of experience if it is empty and valid
    if ($('#years-experience').val() === '' ){
      e.preventDefault();
      $('#experience-error').html(' years of experience required');
    }
    else if($('#years-experience').val() <= 0 ){
      e.preventDefault();
      $('#experience-error').html('at least one year experience is needed');
    }else{
      $('#experience-error').css('visibility','hidden');
    }
    
    //  checking if the doctor  number of surgeries if it is empty and valid
    if ($('#surgeries-number').val() === '' ){
      e.preventDefault();
      $('#surgeries-error').html(' surgeries number required');
    }
    else if($('#surgeries-number').val() <= 0 ){
      e.preventDefault();
      $('#surgeries-error').html('at least one surgery is needed');
    }else{
      $('#surgeries-error').css('visibility','hidden');
    }
    
    //  checking if the doctor passwords is empty and if the two passwords matches
    if($('#doctor-password').val() === '' || $('#confirm-password').val() === 
    ''){
      e.preventDefault();
        $('.password-error').html("password field must not be empty");
    }
    else if($('#doctor-password').val() !== $('#confirm-password').val()){
      e.preventDefault();
       $('.password-error').html("password don't match ");
    }
    else{
        $('.password-error').html("");
    }
    

    //checking the doctor specialiciation if empty
    if ($("#doctor-specialization").val() === '') {
      e.preventDefault();
      $('#specialization-error').html('doctor specialization required');
    }else{
      $('#specialization-error').css('visibility','hidden');
    }
    

    //checking if the doctor picture is empty
    if ($('#doctor-picture').val() === '' ){
      e.preventDefault();
      $('#picture-error').html('doctor picture required');
    }else{
      $('#picture-error').css('visibility','hidden');
    }

    //  checking if the about doctor is empty
    if ($('#about-doctor').val() === '' ){
      e.preventDefault();
      $('#about-error').html('about doctor details required');
    }else{
      $('#about-error').css('visibility','hidden');
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

//phone number validation
function IsPhone(phone) {
  var regex = /[0-9\-\(\)\s]+./;
  if(!regex.test(phone)) {
    return false;
  }else{
    return true;
  }
}

//url validation
function isUrlValid(url) {
var regex = /[(http(s)?):\/\/(www\.)?a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/ig;
    if(!regex.test(url)) {
      return false;
    }else{
      return true;
    }
}
