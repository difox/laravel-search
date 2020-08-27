$(document).ready(function(){
    $('.product-save-link').click(function(){
        id = $(this).data('id');

        $.ajax({
            'url' : '/addProductFromApi',
            'data' : { 'id' : id },
            'dataType' : 'json',
            'success' : function(response) {
                alert('Product ' + response.message);
            }
        });
    });
});