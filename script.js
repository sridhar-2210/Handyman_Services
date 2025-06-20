document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('appointmentForm');
  const resultMessage = document.getElementById('resultMessage');

  form.addEventListener('submit', function (e) {
    e.preventDefault();

    const formData = new FormData(form);

    fetch('submit.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.text())
    .then(()=> {
      form.reset();
      alert("Your Appointment Successful");
    })
    .catch(error => {
      resultMessage.innerHTML = 'An error occurred.';
      console.error(error);
    });
  });
});
