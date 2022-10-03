$('#newAddress').val( $('#building,#street,#city,#province').map(function(){
    return $(this).val();
}).get().join(' ') );
