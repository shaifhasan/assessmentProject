$('#add_data').click(function(){
    $('#addDepositModal').modal('show');
    $('.modal-title').text("Deposit");
    $('#add_form')[0].reset();
    $('#form_output').html('');
    $('#button_action').val('insert');

});