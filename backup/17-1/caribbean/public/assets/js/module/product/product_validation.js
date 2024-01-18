$(document).ready(function(){
    $("#product_name").on('input',function(){
		checkName();
	});
     $("#sku").on('input',function(){
		checkSKU();
	});
    $("#p_price").on('input',function(){
		check_p_price();
	});
    $("#r_price").on('input',function(){
		check_r_price();
	});
    $('#shelf').on('change',function(){ 
        checkShelf();
    });
    $('#shelf').on('input', function() {
        //Shelf value prevent from going into minus value.
        var value = $(this).val();        
        if (value < 0) {
          $(this).val(0);
        }
        checkShelf();     
    });
    $('#kt_ecommerce_add_product_store_template').on('change',function(){
        checkBusiness();
    });
    $('#kt_ecommerce_add_product_form').submit(function(event) {
        if (!checkName() || !checkSKU() || !check_p_price() || !check_r_price() || !checkBusiness() || !checkShelf()) 
        {
          console.log('Prevent from submiting');
          event.preventDefault(); 
          if(!checkName())
          {
            checkName();
          }         
          if(!checkSKU())
          {
            checkSKU();
          }
          if(!check_p_price())
          {
            check_p_price();
          }
          if(!check_r_price())
          {
            check_r_price();
          }
          if(!checkBusiness())
          {
            checkBusiness();
          }
          if(!checkShelf())
          {
            checkShelf();
          }
        }
        else
        {
            console.log('ready to submit');   
            event.submit();         
        }
      });
});

function checkName(){
    var name = $('#product_name').val();
    var pattern = /^[a-zA-Z\s-]+$/; // Regular expression to match alphabet with digits and dashed
    var validuser = pattern.test(name);
    var checkSpecialCharacter = /[^\w\s]/; // Regular expression to match special characters
    var checkSC = checkSpecialCharacter.test(name);
    if($("#product_name").val() == '' || $("#product_name").val() == null)
	{
		$("#nameErr").html("<div class='alert alert-danger mt-2'>Product Name should not be empty.</div>");
        // $('#product_name').css('border-color', 'red');

        return false;
	}
    else if($("#product_name").val().length <= 2 || $("#product_name").val().length >= 15){
        $("#nameErr").html("<div class='alert alert-danger mt-2'>Length of name must be between 2 to 15 characters.</div>");
        return false;
    }
    else if (checkSC) {
        $('#nameErr').html("<div class='alert alert-danger mt-2'>You cannot use another characters.</div>");
        return false;
    }
    else{
        $("#nameErr").html("<div class='alert alert-success mt-2'>Got ahead!</div>"); 
        // $('#product_name').css('border-color', 'green');
        return true;
    }
}
function checkSKU()
{
    var sku = $('#sku').val();
    var pattern = /^\d+$/;
    var validuser = pattern.test(sku);
    if($("#sku").val() == '' || $("#sku").val() == "null")
	{
		$("#skuErr").html("<div class='alert alert-danger mt-2'>SKU should not be empty.</div>");
        return false;
	}
    else if (!validuser) {
        $('#skuErr').html("<div class='alert alert-danger mt-2'>SKU accepts only digits.</div>");
        return false;
    }
    else if($("#sku").val().length != 6){
        $("#skuErr").html("<div class='alert alert-danger mt-2'>Length of SKU must be 6 characters.</div>");
        return false;
    }
    else{
        $("#skuErr").html("<div class='alert alert-success mt-2'>Got it!</div>"); 
        return true;
    }
}

function check_p_price()
{
    var p_price = $('#p_price').val();
    var pattern = /^\d+$/;
    var validuser = pattern.test(p_price);
    if($("#p_price").val() == '' || $("#p_price").val() == "null")
	{
		$("#p_priceErr").html("<div class='alert alert-danger mt-2'>Purchased price should not be empty.</div>");
        return false;
	}
    if($("#p_price").val() == 0)
	{
		$("#p_priceErr").html("<div class='alert alert-danger mt-2'>Price cannot be 0.</div>");
        return false;
	}
    if($("#p_price").val() < 0)
	{
		$("#p_priceErr").html("<div class='alert alert-danger mt-2'>Price cannot be in minus value.</div>");
        return false;
	}
    else if (!validuser) {
        $('#p_priceErr').html("<div class='alert alert-danger mt-2'>Price must be only digits.</div>");
       
        return false;
    }
    else{
        $("#p_priceErr").html("<div class='alert alert-success mt-2'>Looks good!</div>");  
        return true;
    }
}
function check_r_price()
{
    var r_price = $('#r_price').val();
    var pattern = /^\d+$/;
    var validuser = pattern.test(r_price);
    if($("#r_price").val() == '' || $("#r_price").val() == "null")
	{
		$("#r_priceErr").html("<div class='alert alert-danger mt-2'>Retail price should not be empty.</div>");
       
        return false;
	}
    else if (!validuser) {
        $('#r_priceErr').html("<div class='alert alert-danger mt-2'>Retail price must be only digits.</div>");
       
        return false;
    }
    if($("#r_price").val() < 0)
	{
		$("#r_priceErr").html("<div class='alert alert-danger mt-2'>Price cannot be in minus value.</div>");
        return false;
	}
    else{
        $("#r_priceErr").html("<div class='alert alert-success mt-2'>Got it!</div>");    
        return true;
    }
}
function checkBusiness()
{
    var select = $('#kt_ecommerce_add_product_store_template').val();
    if(select == 'default')
    {
        $('#selectBusiness').html("<div class='alert alert-danger mt-2'>You must have to select business.</div>");       
        return false;
    }
    else
    {
        $("#selectBusiness").html("<div class='alert alert-success mt-2'>Selected.</div>");
        return true; 
    } 
}
function checkShelf()
{
    var shelf = $('#shelf').val();
    if($("#shelf").val() == '' || $("#shelf").val() == "null")
	{
		$("#shelfErr").html("<div class='alert alert-danger mt-2'>Quantity is required.</div>");
        return false;
	}
    else{
        $("#shelfErr").html("<div class='alert alert-success mt-2'>Valid.</div>");
        return true;
    }
}