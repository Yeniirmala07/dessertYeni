const menu = document.getElementById("menu");
const cartItems = document.getElementById("cart-items");
const cartCount = document.getElementById("cart-count");

const foodData = [
  {
    name: "Waffle",
    description: "Waffle with Berries",
    price: 6.5,
    image: "https://source.unsplash.com/300x200/?waffle"
  },
  {
    name: "Crème Brûlée",
    description: "Vanilla Bean Crème Brûlée",
    price: 7.0,
    image: "https://source.unsplash.com/300x200/?creme-brulee"
  },
  {
    name: "Macaron",
    description: "Macaron Mix of Five",
    price: 8.0,
    image: "https://source.unsplash.com/300x200/?macaron"
  },
  {
    name: "Tiramisu",
    description: "Classic Tiramisu",
    price: 5.5,
    image: "https://source.unsplash.com/300x200/?tiramisu"
  },
  {
    name: "Baklava",
    description: "Pistachio Baklava",
    price: 4.0,
    image: "https://source.unsplash.com/300x200/?baklava"
  }
];

let cart = [];

function renderMenu() {
  foodData.forEach((item, index) => {
    const card = document.createElement("div");
    card.className = "food-card";
    card.innerHTML = `
      <img src="${item.image}" alt="${item.name}" />
      <h3>${item.name}</h3>
      <p>${item.description}</p>
      <div class="price">$${item.price.toFixed(2)}</div>
      <button data-index="${index}">Add to Cart</button>
    `;
    menu.appendChild(card);
  });

  // Tambahkan event listener setelah render
  const buttons = document.querySelectorAll(".food-card button");
  buttons.forEach(btn => {
    btn.addEventListener("click", () => {
      const index = btn.getAttribute("data-index");
      addToCart(index);
    });
  });
}

function addToCart(index) {
  const item = foodData[index];
  cart.push(item);
  updateCart();
}

function updateCart() {
  cartItems.innerHTML = "";
  cart.forEach(item => {
    const div = document.createElement("div");
    div.textContent = `${item.name} - $${item.price.toFixed(2)}`;
    cartItems.appendChild(div);
  });
  cartCount.textContent = cart.length;
}

renderMenu();
