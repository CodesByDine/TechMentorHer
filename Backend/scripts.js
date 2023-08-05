function determineGender(idNumber) {
  // Extract the 7th to 10th characters from the ID number
  const genderDigits = idNumber.substring(6, 10);

  // Convert the genderDigits to a number for comparison
  const genderCode = parseInt(genderDigits);

  // Check if the genderCode falls within the female range (0000-4999)
  if (genderCode >= 0 && genderCode <= 4999) {
    alert("Female");
  }
  // Check if the genderCode falls within the male range (5000-9999)
  else if (genderCode >= 5000 && genderCode <= 9999) {
    alert("Male");
  } else {
    alert("Gender not determined");
  }
}

// Example usage:
const idNumber = "0311180238082"; // Replace with the user's ID number
const gender = determineGender(idNumber);
console.log("Gender:", gender);
