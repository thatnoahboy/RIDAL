// // signup.js

// document.addEventListener('DOMContentLoaded', function () {
//     const signupForm = document.getElementById('signup-form');
//     const modal = document.getElementById('modal');
//     const modalMessage = document.getElementById('modal-message');
//     const closeButton = document.querySelector('.close-button');
  
//     // Function to display modal message
//     function showModal(message) {
//       modalMessage.textContent = message;
//       modal.style.display = 'block';
//     }
  
//     // Function to close modal
//     function closeModal() {
//       modal.style.display = 'none';
//     }
  
//     // Event listener for form submission
//     signupForm.addEventListener('submit', function (event) {
//       event.preventDefault(); // Prevent default form submission behavior
  
//       // Get form data
//       const formData = new FormData(signupForm);
  
//       // Send form data to server using fetch API
//       fetch('/signup', {
//         method: 'POST',
//         body: formData
//       })
//       .then(response => response.text())
//       .then(data => {
//         if (data.success) {
//           // Redirect to sign-in page
//           window.location.href = '/signin';
//         } else {
//           // Display error message or handle other cases
//           showModal('An error occurred. Please try again later.');
//         }
//       })
//       .catch(error => {
//         // Display error message
//         showModal('An error occurred. Please try again later.');
//       });
//     });
  
//     // Event listener to close modal when close button is clicked
//     closeButton.addEventListener('click', closeModal);
//   });
  