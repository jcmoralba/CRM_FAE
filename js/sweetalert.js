function showSuccessAlert() {
  // Show SweetAlert2 alert
  Swal.fire({
    title: "Success!",
    text: "You successfully added a new prospect",
    icon: "success",
    confirmButtonText: "OK"
  }).then((result) => {
    // Check if the "OK" button is clicked
    if (result.isConfirmed) {
      // Remove the 'added=success' parameter from the URL
      history.replaceState({}, document.title, window.location.pathname);
    }
  });
}

// PHP logic for checking 'added=success' parameter and calling showSuccessAlert
