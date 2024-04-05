const showAlert = () => {
  Swal.fire({
    title: "Custom width, padding, color, background.",
    width: 600,
    padding: "3em",
    color: "#716add",
    background: "#fff url(/images/trees.png)",
    backdrop: `
      rgba(0,0,123,0.4)
      url("/images/nyan-cat.gif")
      left top
      no-repeat
    `
  
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      document.getElementById("update_button1").click();
;}
else {
  document.getElementById("update_button1").click();
}
    });
} 
const tryAlert = () => {
  Swal.fire("SweetAlert2 is working!");


}

//sweetalert for new prospect
document.getElementById('update_button').addEventListener('click', showAlert);
document.getElementById('update_button1').addEventListener('click', tryAlert);