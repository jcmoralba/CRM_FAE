const formatNumber = n => {
  // Format number 1000000 to 1,234,567
  return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
};

const formatCurrency = (input, currency, blur) => {
  // Append currency symbol to value, validate decimal side,
  // and put cursor back in the right position.
  // Get input value
  let input_val = input.value;
  // Don't validate empty input
  if (input_val === "") {
    return;
  }

  // Original length
  const original_len = input_val.length;

  // Initial caret position
  let caret_pos = input.selectionStart;

  // Check for decimal
  if (input_val.indexOf(".") >= 0) {
    // Get position of first decimal
    // This prevents multiple decimals from being entered
    const decimal_pos = input_val.indexOf(".");

    // Split number by decimal point
    let left_side = input_val.substring(0, decimal_pos);
    let right_side = input_val.substring(decimal_pos);

    // Add commas to left side of number
    left_side = formatNumber(left_side);

    // Validate right side
    right_side = formatNumber(right_side);

    // On blur make sure 2 numbers after decimal
    if (blur === "blur") {
      right_side += "00";
    }

    // Limit decimal to only 2 digits
    right_side = right_side.substring(0, 2);

    // Join number by .
    input_val = currency + left_side + "." + right_side;
  } else {
    // No decimal entered
    // Add commas to number
    // Remove all non-digits
    input_val = formatNumber(input_val);
    input_val = currency + input_val;

    // Final formatting
    if (blur === "blur") {
      input_val += ".00";
    }
  }

  // Send updated string to input
  input.value = input_val;

  // Put caret back in the right position
  const updated_len = input_val.length;
  caret_pos = updated_len - original_len + caret_pos;
  input.setSelectionRange(caret_pos, caret_pos);
};
