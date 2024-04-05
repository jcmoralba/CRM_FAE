const showAlert = () => {
  Swal.fire(
    'Good job!',
    'You clicked the button!',
    'success'
  );
}

const tryAlert = () => {
  Swal.fire("SweetAlert2 is working!");
}


document.getElementById('button1').addEventListener('click', showAlert);
document.getElementById('button2').addEventListener('click', tryAlert);