const textarea = document.getElementById('review-body');
textarea.value = '';
const btn = document.getElementById('clearReview');

btn.addEventListener('input', function handleClick() {
  textarea.value = '';
});