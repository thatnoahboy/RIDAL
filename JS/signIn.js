// signIn.js

document.addEventListener('DOMContentLoaded', function () {
  const signinForm = document.getElementById('signin-form');
  const modal = document.getElementById('modal');
  const modalMessage = document.getElementById('modal-message');
  const closeButton = document.querySelector('.close-button');

  // Function to display modal message
  function showModal(message) {
    modalMessage.textContent = message;
    modal.style.display = 'block';
  }

  // Function to close modal
  function closeModal() {
    modal.style.display = 'none';
  }

  // Event listener for form submission
  signinForm.addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent default form submission behavior

    // Get login data from form
    const phone = document.getElementById('login-phone').value;
    const password = document.getElementById('login-password').value;

    // Send login data to server using fetch API
    fetch('/login', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({ phone, password })
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        // Login successful
        showModal('Login successful');
        // Redirect user or perform other actions as needed
      } else {
        // Login failed
        showModal(data.message);
      }
    })
    .catch(error => {
      // Display error message
      showModal('An error occurred. Please try again later.');
    });
  });

  // Event listener to close modal when close button is clicked
  closeButton.addEventListener('click', closeModal);
});
