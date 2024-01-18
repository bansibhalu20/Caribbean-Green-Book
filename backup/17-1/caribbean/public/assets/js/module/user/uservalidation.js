

$('#fname').on('input', function() {
    var fname = $(this).val();
    fname = fname.replace(/[^A-Za-z]/g, ''); // Remove non-alphabetic characters

    $(this).val(fname); // Update the input field with the alphabetic value

    if (fname.length > 0) {
        $('#fname-error').text('Firstname is valid').css('color', 'green');
        $('#fname').css('border-color','green');
    } else {
        $('#fname-error').text('Firstname is invalid').css('color', 'red');
        $('#fname').css('border-color','red');
    }
});

$('#lname').on('input', function() {
    var lname = $(this).val();
    lname = lname.replace(/[^A-Za-z]/g, ''); // Remove non-alphabetic characters

    $(this).val(lname); // Update the input field with the alphabetic value

    if (lname.length > 0) {
        $('#lname-error').text('Lastname is valid').css('color', 'green');
        $('#lname').css('border-color','green');
    } else {
        $('#lname-error').text('Lastname is invalid').css('color', 'red');
        $('#lname').css('border-color','red');
    }
});

$('#country').on('change', function() {
    var selectedCountry = $(this).val();

    if (selectedCountry !== '') {
        $('#country-error').text('Valid country').css('color', 'green');
        $('#country').css('border-color', 'green');
        return true;
    } else {
        $('#country-error').text('Please select a country').css('color', 'red');
        $('#country').css('border-color', 'red');
        return false;
    }
});

$('#phone').on('input', function() {
    var phoneNumber = $(this).val();
    phoneNumber = phoneNumber.replace(/[^0-9+]/g,
        ''); // Remove non-numeric characters except "+"
    phoneNumber = phoneNumber.substring(0, 14);
    $(this).val(phoneNumber); // Update the input field with the numeric value
    var regex =
        /^\+?\d{10,14}$/; // Regular expression to match phone number with or without "+"

    if (regex.test(phoneNumber)) {
        $('#phone-error').text('Valid phone number').css('color', 'green');
        $('#phone').css('border-color', 'green');
    } else {
        $('#phone-error').text('Invalid phone number').css('color', 'red');
        $('#phone').css('border-color', 'red');
    }
});

$('#password').on('input', function() {
var password = $('#password').val();

// Password validation criteria
var hasUpperCase = /[A-Z]/.test(password);
var hasLowerCase = /[a-z]/.test(password);
var hasDigit = /\d/.test(password);
var hasSpecialChar = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(password);
var isValidLength = password.length >= 8;

if (hasUpperCase && hasLowerCase && hasDigit && hasSpecialChar && isValidLength) {
    $('#password-error').text('Valid password').css('color', 'green');
    $('#password').css('border-color', 'green');

} else {
    $('#password-error').text('Invalid password. Password must be at least 8 characters long .').css('color', 'red');
    $('#password').css('border-color', 'red');
    return false;
}

});

$('#confirmPassword').on('input', function() {
    var confirmPassword = $('#confirmPassword').val();
    
    // Password validation criteria
    var hasUpperCase = /[A-Z]/.test(confirmPassword);
    var hasLowerCase = /[a-z]/.test(confirmPassword);
    var hasDigit = /\d/.test(confirmPassword);
    var hasSpecialChar = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(confirmPassword);
    var isValidLength = confirmPassword.length >= 8;
    
    if (hasUpperCase && hasLowerCase && hasDigit && hasSpecialChar && isValidLength) {
        $('#confirmPassword-error').text('Valid password').css('color', 'green');
        $('#confirmPassword').css('border-color', 'green');
    
    } else {
        $('#confirmPassword-error').text('Invalid password. Password must be at least 8 characters long .').css('color', 'red');
        $('#confirmPassword').css('border-color', 'red');
        return false;
    }
    
    });
$('#currentPassword').on('input', function() {
    var currentPassword = $('#currentPassword').val();
    
    // Password validation criteria
    var hasUpperCase = /[A-Z]/.test(currentPassword);
    var hasLowerCase = /[a-z]/.test(currentPassword);
    var hasDigit = /\d/.test(currentPassword);
    var hasSpecialChar = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(currentPassword);
    var isValidLength = currentPassword.length >= 8;
    
    if (hasUpperCase && hasLowerCase && hasDigit && hasSpecialChar && isValidLength) {
        $('#currentPassword-error').text('Valid password').css('color', 'green');
        $('#currentPassword').css('border-color', 'green');
    
    } else {
        $('#currentPassword-error').text('Invalid password. Password must be at least 8 characters long .').css('color', 'red');
        $('#currentPassword').css('border-color', 'red');
        return false;
    }
    
    });
$('#email').on('input', function() {
    var email = $(this).val().trim();

    $(this).val(email); // Update the input field with the trimmed value
    var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (emailPattern.test(email)) {
        $('#email-error').text('Valid email').css('color', 'green');
        $('#email').css('border-color', 'green');
    } else {
        $('#email-error').text('Invalid email. Please enter a valid email address.').css('color', 'red');
        $('#email').css('border-color', 'red');
    }
});


$('#zipcode').on('input', function() {
    var zipcode = $(this).val();
    zipcode = zipcode.replace(/[^0-9]/g, ''); // Remove non-numeric characters
    zipcode = zipcode.substring(0, 6); // Limit to maximum 6 digits

    $(this).val(zipcode); // Update the input field with the limited value

    var regex = /^\d{6}$/; // Regular expression to match 5-digit zip code

    if (regex.test(zipcode)) {
        $('#zipcode-error').text('Valid zip code').css('color', 'green');
    } else {
        $('#zipcode-error').text('Invalid zip code').css('color', 'red');
    }
});

$('#state-id').on('change', function() {

    var selectedState = $(this).val();

    if (selectedState !== '') {
        $('#state-error').text('Valid State').css('color', 'green');
        $('#state-id').css('border-color', 'green');
        return true;
    } else {
        $('#state-error').text('Please select a state').css('color', 'red');
        $('#state-id').css('border-color', 'red');
        return false;
    }
});

$('#city').on('input', function() {
    var city = $(this).val();
    city = city.replace(/[^A-Za-z]/g, ''); // Remove non-alphabetic characters

    $(this).val(city); // Update the input field with the alphabetic value

    if (city.length > 0) {
        $('#city-error').text('City is valid').css('color', 'green');
        $('#city').css('border-color','green');
    } else {
        $('#city-error').text('City is invalid').css('color', 'red');

        $('#city').css('border-color','red');
    }
}); 