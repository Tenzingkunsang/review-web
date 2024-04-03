// script.js
document.getElementById('reviewForm').addEventListener('submit', submitReview);

function submitReview(event) {
  event.preventDefault();

  const hotelName = document.getElementById('hotelName').value;
  const rating = document.getElementById('rating').value;
  const review = document.getElementById('review').value;

  const reviewData = {
    hotelName,
    rating,
    review
  };

  // Assuming you'll use fetch API to send data to backend
  fetch('/submitReview', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(reviewData),
  })
  .then(response => response.json())
  .then(data => {
    alert('Review submitted successfully!');
    // You can redirect user to another page or show a confirmation message
  })
  .catch((error) => {
    console.error('Error:', error);
    alert('An error occurred while submitting your review.');
  });
}
