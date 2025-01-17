document.addEventListener('DOMContentLoaded', () => {
    console.log("Page Loaded!");
});

function isElementInViewport(el) {
    const rect = el.getBoundingClientRect();
    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
}

function handleScroll() {
    const journeyItems = document.querySelectorAll('.journey-item');
    journeyItems.forEach(item => {
        if (isElementInViewport(item)) {
            item.classList.add('visible');
        }
    });
}

window.addEventListener('scroll', handleScroll);
window.addEventListener('load', handleScroll);


document.getElementById('requestForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const itemName = document.getElementById('itemName').value;
    const itemCategory = document.getElementById('itemCategory').value;
    const itemQuantity = document.getElementById('itemQuantity').value;
    
    // Generate a random price between $10 and $100
    const basePrice = Math.floor(Math.random() * (100 - 10 + 1)) + 10;
    const totalPrice = basePrice * itemQuantity;
    
    const priceListDiv = document.getElementById('priceList');
    const priceItem = document.createElement('div');
    priceItem.classList.add('price-item');
    priceItem.innerHTML = `
        <p><strong>${itemName}</strong> (${itemCategory})</p>
        <p>Quantity: ${itemQuantity}</p>
        <p>Price: $${basePrice.toFixed(2)} each</p>
        <p>Total: $${totalPrice.toFixed(2)}</p>
    `;
    
    priceListDiv.appendChild(priceItem);
    
    // Reset form
    document.getElementById('requestForm').reset();
});