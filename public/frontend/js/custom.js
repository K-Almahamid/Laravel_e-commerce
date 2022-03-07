
    $(document).ready(function () {
        
        $('.addToCartBtn').click(function (e) { 
    e.preventDefault();
    var product_id = $(this).closest('.product_data').find('.product_id').val();
    var product_quantity = $(this).closest('.product_data').find('.quantity-input').val();
    
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

    $.ajax({
        method: "POST",
        url: "/add-to-cart",
        data: {
            'product_id' : product_id ,
            'product_quantity' : product_quantity,
        },
        success: function (response) {
            swal(response.status);
        }
    });

   
});

});

    function incrementValue()
{
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('number').value = value;
}

function  decrementValue()
{
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    if(value > 1)
    {
            value--;
            document.getElementById('number').value = value;
    }
}
