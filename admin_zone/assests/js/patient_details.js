//trigger and show the note form
$('#add_note').click(function(){
    $('.patient_notes').slideToggle(1500);
});

//validation
$('#send_note').click(function(e){
if ($("#note").val() === '') {
    e.preventDefault();
    $('#error').html('Note fiels must not be empty');
}
else{
    //send data
}
});