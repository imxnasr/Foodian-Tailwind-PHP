// VARIABLES:
const bars = document.querySelector('.fa-bars');
const mobileNavContainer = document.querySelector('.mobile-nav-container');
const mobileNavOverlay = document.querySelector('.mobile-nav-overlay');
const toTopBtn = document.querySelector('.to-top-btn');
const searchBtn = document.querySelector('.search-btn');
const searchBox = document.querySelector('.search-box');
const closeSearchBoxBtn = document.querySelector('.close-search-box');
const removeQtyBtn = document.querySelector('.remove-qty');
const addQtyBtn = document.querySelector('.add-qty');
const productPrice = document.querySelector('.product-price');
const totalPrice = document.querySelector('.total-price');
const inStock = document.querySelector('span.in-stock');

// EVENT LISTENERS:

// Show Mobile Nav after Click on the Bars
bars.addEventListener('click', () => {
  mobileNavContainer.classList.toggle('hidden');
});

// Disappear the Mobile Nav after Click on the Overlay
mobileNavOverlay.addEventListener('click', () => {
  mobileNavContainer.classList.toggle('hidden');
});

// Scroll to Top 
toTopBtn.addEventListener('click', () => {
  window.scrollTo({top: 0, behavior: 'smooth'});
});

// Onscroll Function to Track the To Top Button
window.addEventListener('scroll', () => {
  // Show if user scrolled more than the Screen Height
  if(window.pageYOffset > window.innerHeight){
    toTopBtn.classList.add('grid');
    toTopBtn.classList.remove('hidden');
  // Disappear if user scrolled less than the Screen Height
  }else{
    toTopBtn.classList.remove('grid');
    toTopBtn.classList.add('hidden');
  }
});

// Show Search Box Function
searchBtn.addEventListener('click', () => {
  searchBox.classList.remove('-top-24');
  searchBox.classList.add('-top-0');
});

// Close Search Box With Button Function
closeSearchBoxBtn.addEventListener('click', () => {
  searchBox.classList.remove('-top-0');
  searchBox.classList.add('-top-24');
});

removeQtyBtn.addEventListener('click', (e) => {
  let targetElement = e.target.nextElementSibling;
  let qty = +targetElement.textContent;
  let currentPrice = +productPrice.textContent.substring(1);
  if(qty > 1){
    targetElement.textContent = qty - 1;
    totalPrice.textContent = '$' + (currentPrice.toFixed(2) * (qty - 1)).toFixed(2);
  }
});
addQtyBtn.addEventListener('click', (e) => {
  let targetElement = e.target.previousElementSibling;
  let qty = +targetElement.textContent;
  let currentPrice = +productPrice.textContent.substring(1);
  let inStockNumber = +inStock.textContent;
  if(qty < inStockNumber){
    targetElement.textContent = qty + 1;
    totalPrice.textContent = '$' + (currentPrice.toFixed(2) * (qty + 1)).toFixed(2);
  }
});