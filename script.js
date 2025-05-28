// Track the last scroll position
let lastScrollTop = 0;

// Get the header element
const header = document.querySelector('header');

// Listen for the scroll event
window.addEventListener('scroll', function() {
    let currentScroll = window.pageYOffset || document.documentElement.scrollTop;

    // If scrolling down and past header height, hide header
    if (currentScroll > lastScrollTop && currentScroll > header.offsetHeight) {
        header.style.top = `-120px`;  // Hide the header by setting top position
    } else {
        // If scrolling up, show the header
        header.style.top = "0";
    }

    // Update the last scroll position
    lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; // Prevent negative scroll
});

function openModal(imageSrc, title, description) {
    document.getElementById('modalImage').src = imageSrc;
    document.getElementById('modalTitle').innerText = title;
    document.getElementById('modalDescription').textContent = description;
    document.getElementById('wineModal').style.display = 'flex';
    
}

function closeModal() {
    document.getElementById('wineModal').style.display = 'none';
}
// JavaScript function to show images and a fun fact when the button is clicked
function showWineImages() {
    const funFact = document.getElementById("funFact");
    const funFactImages = document.getElementById("funFactImages");

    // Debugging log
    console.log('Button clicked!');
    
    // Toggle visibility of images and fun fact text
    funFact.classList.toggle("hidden");
    funFactImages.classList.toggle("hidden");

     // Debugging log to check if the elements are being toggled
     console.log('Images visibility:', images.classList.contains("hidden"));
     console.log('Fact text visibility:', factText.classList.contains("hidden"));
  }
  