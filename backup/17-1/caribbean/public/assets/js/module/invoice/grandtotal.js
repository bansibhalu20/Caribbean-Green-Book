// Function to calculate and update the grand total
function updateGrandTotal() {
  // Get the table body rows
  const tableBody = document.querySelector('table[data-kt-element="items"] tbody');
  const rows = tableBody.querySelectorAll('tr[data-kt-element="item"]');

  let subTotal = 0;

  // Loop through each row and calculate the subtotal
  rows.forEach((row) => {
    const quantity = parseInt(row.querySelector('input[name="quantity[]"]').value) || 0;
    const price = parseFloat((row.querySelector('input[name="price[]"]').value).replace(",", "")) || 0;

    const total = quantity * price;
    row.querySelector('span[data-kt-element="total"]').textContent = total.toFixed(2);

    subTotal += total;
  });

  // Update the subtotal value in the table
  document.querySelector('span[data-kt-element="sub-total"]').textContent = subTotal.toFixed(2);

  // Calculate and update the grand total
  const taxPercentage = parseFloat(document.querySelector('input[name="add_tax"]').value) || 0;
  const discount = parseFloat(document.querySelector('input[name="add_discount"]').value) || 0;
  const shippingCharge = parseFloat(document.querySelector('input[name="shipping_charge"]').value) || 0;

  const taxAmount = (taxPercentage / 100) * subTotal; // Calculate the tax amount based on the percentage
  const grandTotal = subTotal + taxAmount - discount + shippingCharge;

  document.querySelector('span[data-kt-element="grand-total"]').textContent = grandTotal.toFixed(2);

  // Update the hidden input value for total
  document.querySelector('input[name="total"]').value = grandTotal.toFixed(2);
}

// Event listeners for quantity and price inputs
const quantityInputs = document.querySelectorAll('input[name="quantity[]"]');
const priceInputs = document.querySelectorAll('input[name="price[]"]');
quantityInputs.forEach((input) => {
  input.addEventListener('input', updateGrandTotal);
});
priceInputs.forEach((input) => {
  input.addEventListener('input', updateGrandTotal);
});

// Event listeners for add tax, add discount, and shipping charge inputs
const addTaxInput = document.querySelector('input[name="add_tax"]');
const addDiscountInput = document.querySelector('input[name="add_discount"]');
const shippingChargeInput = document.querySelector('input[name="shipping_charge"]');
addTaxInput.addEventListener('input', updateGrandTotal);
addDiscountInput.addEventListener('input', updateGrandTotal);
shippingChargeInput.addEventListener('input', updateGrandTotal);

// Call the updateGrandTotal function initially to display the initial total
updateGrandTotal();
