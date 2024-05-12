$('#add_data').click(function(){
    $('#addWithdrawModal').modal('show');
    $('.modal-title').text("Withdrawal");
    $('#add_form')[0].reset();
    $('#form_output').html('');
    $('#button_action').val('insert');

});