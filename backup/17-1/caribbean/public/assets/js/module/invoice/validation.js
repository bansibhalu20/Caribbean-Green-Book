$(document).ready(function(){

    $('#date').on('input',function(){
        checkDate();
    })
    $('#business').on('change',function(){
        checkBusiness();
    });
    // $('#customer').on('change',function(){
    //     checkCustomer();
    // });
    $('#product').on('change',function(){
        chechProduct();
    });
    $('#orderstatus').on('change',function(){
        checkorderstatus();
    });
    $('#paymentstatus').on('change',function(){
        checkpaymentStatus();
    });
    $('#status').on('change'),function(){
        checkStatus();
    }
  

    $('#kt_invoice_form').submit(function(event){
        if(!checkBusiness() || !checkProduct() || !checkDate() || !checkorderstatus() || 
        !checkpaymentStatus() || !checkStatus()){
            console.log("prevent")
            event.preventDefault();
            if(!checkBusiness())
            {
                checkBusiness();
            }
            // if(!checkCustomer())
            // {
            //     checkCustomer();
            // }
            if(!checkProduct())
            {
                checkProduct();
            }
            if(!checkDate())
            {
                checkDate();
            }
            if(! checkorderstatus())
            {
                checkorderstatus();
            }
            if(!checkpaymentStatus())
            {
                checkpaymentStatus();
            }
            if(!checkStatus())
            {
                checkStatus();
            }
            
        }
       
    });
});
function checkDate(){
    
    var dt = $('#date').val();
    if(dt == "")
    {
        $('#selectdate').html("<div class='alert alert-danger mt-2'>Select Date.</div>");
        return false;
    }
    else
    {
        $('#selectdate').html("<div class='mt-2' style='color:green'>Selected</div>");
        return true;
    }
}

function checkBusiness(){
    var busi = $('#business').val();
    if(busi == "")
    {
        $('#selectbusiness').html("<div class='alert alert-danger mt-2'>Select business.</div>");
        return false;
    }
    else
    {

        $('#selectbusiness').html("<div class='mt-2' style='color:green'>Selected</div>");

       
        return true;
    }
}
function checkCustomer(){
    var cust = $('#customer').val();
    if(cust == "")
    {
        $('#selectcustomer').html("<div class='alert alert-danger mt-2'>You must have to select customer.</div>");
        return false;
    }
    else{
        $('#selectcustomer').html("<div class='alert alert-success mt-2'>Selected</div>");

        return true;
    }
}
// function checkCustomer(){
//     var cust = $('#customer').val();
//     if(cust == "")
//     {
//         $('#selectcustomer').html("<div class='alert alert-danger mt-2'>You must have to select customer.</div>");
//         return false;
//     }
//     else{
//         $('#selectcustomer').html("<div class='alert alert-success mt-2'>Selected</div>");
//         return true;
//     }
// }
function checkProduct()
{
    var pro = $("#productname").val();
    if(pro == "")
    {
        $('#selectproductname').html("<div class='alert alert-danger mt-2'>Select product.</div>");
        return false;
    }
    else
    {
        $('#selectproductname').html("<div class='mt-2' style='color:green'>Selected</div>");
        return true;
    }
}
function  checkorderstatus()
{
    var os = $("#orderstatus").val();
    if(os == "")
    {
        $('#selectorder').html("<div class='alert alert-danger mt-2'>Select Order Status.</div>");
        return false;
    }
    else
    {
        $('#selectorder').html("<div class='mt-2' style='color:green'>Selected</div>");
        return true;
    }
}
function checkpaymentStatus()
{
    var ps = $('#paymentstatus').val();
    if(ps == "")
    {
        $('#selectpayment').html("<div class='alert alert-danger mt-2'>Select payment Status.</div>");
        return false;
    }
    else
    {
        $('#selectpayment').html("<div class='mt-2' style='color:green'>Selected</div>");
        return true;   
    }
}
function checkStatus()
{
    var status = $('#status').val();
    if(status == "")
    {
        $('#selectstatus').html("<div class='alert alert-danger mt-2'>Select Status.</div>");
        return false;
    }
    else
    {
        $('#selectstatus').html("<div class='mt-2' style='color:green'>Selected</div>");
        return true;   
    }
}
$('#qty').on('input',function(){
    var qty = $(this).val();
    quantity = qty.replace(/[^0-9]/g, ''); // Remove non-numeric characters
    
    $(this).val(quantity); // Update the input field with the limited value

});
$('#discount').on('input', function() {
    var discount = $(this).val();
    discount = discount.replace(/[^0-9]/g, ''); // Remove non-numeric characters
    
    $(this).val(discount); // Update the input field with the limited value

    var regex = /^(?!-)\d+$/; // Regular expression to not allow minus value

   
});
$('#ship_charge').on('input', function() {
    var ship = $(this).val();
    shiping = ship.replace(/[^0-9]/g, ''); // Remove non-numeric characters
    
    $(this).val(shiping); // Update the input field with the limited value

    var regex = /^(?!-)\d+$/; // Regular expression to not allow minus value
 
});

$('#price').on('input',function(){
    var rs = $(this).val();
    price = rs.replace(/[^0-9]/g, ''); // Remove non-numeric characters
    $(this).val(price); 
    var regex = /^(?!-)\d+$/; // Regular expression to not allow minus value
});

