let cart = [];

function addToCart(productName, productPrice, productImage) {
    const product = {
        name: productName,
        price: productPrice,
        image: productImage
    };
    cart.push(product);
    displayCart();
}

function displayCart() {
    const cartItemsContainer = document.getElementById('cart-items');
    const totalPriceElement = document.getElementById('total-price');
    cartItemsContainer.innerHTML = '';

    let totalPrice = 0;

    cart.forEach((product, index) => {
        const cartItem = document.createElement('div');
        cartItem.className = 'cart-item';
        cartItem.innerHTML = `
            <img src="${product.image}" alt="${product.name}">
            <span>${product.name} - $${product.price.toFixed(2)}</span>
            <button onclick="removeFromCart(${index})">Remove</button>
        `;
        cartItemsContainer.appendChild(cartItem);
        totalPrice += product.price;
    });

    totalPriceElement.innerText = totalPrice.toFixed(2);
}

function removeFromCart(index) {
    cart.splice(index, 1);
    displayCart();
}
