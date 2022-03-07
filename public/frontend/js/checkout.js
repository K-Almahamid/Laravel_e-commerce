$(document).ready(function () {
    $('.razorpay_btn').click(function (e) {
        e.preventDefault();

        var fname = $('.fname').val();
        var lname = $('.lname').val();
        var email = $('.email').val();
        var phone = $('.phone').val();
        var address1 = $('.address1').val();
        var address2 = $('.address2').val();
        var city = $('.city').val();
        var state = $('.state').val();
        var country = $('.country').val();
        var pincode = $('.pincode').val();

        if (!fname) {
            fname_error = 'First Name is required';
            $('#fname_error').html('');
            $('#fname_error').html(fname_error);
        }
        else {
            fname_error = '';//remove error message
            $('#fname_error').html('');
        }
        if (!lname) {
            lname_error = 'Last Name is required';
            $('#lname_error').html('');
            $('#lname_error').html(lname_error);
        }
        else {
            lname_error = '';//remove error message
            $('#lname_error').html('');
        }
        if (!email) {
            email_error = 'Email is required';
            $('#email_error').html('');
            $('#email_error').html(email_error);
        }
        else {
            email_error = '';//remove error message
            $('#email_error').html('');
        }
        if (!phone) {
            phone_error = 'Phone is required';
            $('#phone_error').html('');
            $('#phone_error').html(phone_error);
        }
        else {
            phone_error = '';//remove error message
            $('#phone_error').html('');
        }
        if (!address1) {
            address1_error = 'Address1 is required';
            $('#address1_error').html('');
            $('#address1_error').html(address1_error);
        }
        else {
            address1_error = '';//remove error message
            $('#address1_error').html('');
        }
        if (!address2) {
            address2_error = 'Address2 is required';
            $('#address2_error').html('');
            $('#address2_error').html(address2_error);
        }
        else {
            address2_error = '';//remove error message
            $('#address2_error').html('');
        }
        if (!city) {
            city_error = 'City is required';
            $('#city_error').html('');
            $('#city_error').html(city_error);
        }
        else {
            city_error = '';//remove error message
            $('#city_error').html('');
        }
        if (!state) {
            state_error = 'State is required';
            $('#state_error').html('');
            $('#state_error').html(state_error);
        }
        else {
            state_error = '';//remove error message
            $('#state_error').html('');
        }
        if (!country) {
            country_error = 'Country is required';
            $('#country_error').html('');
            $('#country_error').html(country_error);
        }
        else {
            country_error = '';//remove error message
            $('#country_error').html('');
        }

        if (!pincode) {
            pincode_error = 'Pincode is required';
            $('#pincode_error').html('');
            $('#pincode_error').html(pincode_error);
        }
        else {
            pincode_error = '';//remove error message
            $('#pincode_error').html('');
        }

        if (fname_error != '' || lname_error != '' || email_error != '' || phone_error != '' || address1_error != '' || address2_error != '' || city_error != '' || state_error != '' || country_error != '' || pincode_error != '') {
            return false;
        } else {
            var data = {
                'fname': fname,
                'lname': lname,
                'email': email,
                'phone': phone,
                'address1': address1,
                'address2': address2,
                'city': city,
                'state': state,
                'country': country,
                'pincode': pincode,
            };
            $.ajax({
                method: "POST",
                url: "/proceed-to-pay",
                data: data,
                success: function (response) {
                    //alert(response.total_price);

                    var options = {
                        "key": "YOUR_KEY_ID", // Enter the Key ID generated from the Dashboard
                        "amount": "50000", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                        "currency": "INR",
                        "name": "Acme Corp",
                        "description": "Test Transaction",
                        "image": "https://example.com/your_logo",
                        "order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                        "handler": function (response) {
                            alert(response.razorpay_payment_id);
                            alert(response.razorpay_order_id);
                            alert(response.razorpay_signature)
                        },
                        "prefill": {
                            "name": "Gaurav Kumar",
                            "email": "gaurav.kumar@example.com",
                            "contact": "9999999999"
                        },
                        "notes": {
                            "address": "Razorpay Corporate Office"
                        },
                        "theme": {
                            "color": "#3399cc"
                        }
                    };
                    var rzp1 = new Razorpay(options);
                        rzp1.open();
                }
            });
        }
    });
});