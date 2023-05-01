const accountButton = document.querySelector('.account-button');
const accountDropdown = document.querySelector('.account-dropdown');

accountButton.addEventListener('click', function() {
  accountDropdown.classList.toggle('show');
});
