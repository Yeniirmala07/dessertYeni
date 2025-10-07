<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Food Order</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body style="background-color: #fff0f6">

    <header class="bg-danger text-white text-center py-3">
        <h1>Food Order</h1>
    </header>

    <main class="container my-4">
        <div class="row">
            <!-- Menu makanan -->
            <div class="col-md-8">
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    @foreach ($foods as $food)
                        <div class="col">
                            <div class="card h-100 shadow-sm">
                                <img src="{{ $food['image_url'] }}" class="card-img-top" alt="{{ $food['name'] }}" style="height: 200px; object-fit: cover;" />
                                <div class="card-body">
                                    <h5 class="card-title">{{ $food['name'] }}</h5>
                                    <p class="card-text text-muted">{{ $food['description'] }}</p>
                                    <p class="card-text fw-bold">Rp {{ number_format($food['price'], 0, ',', '.') }}</p>
                                    <button class="btn btn-danger w-100" onclick="addToCart('{{ addslashes($food['name']) }}', {{ $food['price'] }})">
                                        Tambah ke Keranjang
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Keranjang -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-danger text-white">
                        <h4 class="mb-0">Keranjang Anda (<span id="cart-count">0</span>)</h4>
                    </div>
                    <div class="card-body">
                        <ul id="cart-items" class="list-group list-group-flush mb-3"></ul>
                        <p class="fw-bold">Total: Rp <span id="cart-total">0</span></p>
                        <button class="btn btn-success w-100" onclick="checkout()">Pesan Sekarang</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Bootstrap JS (optional but good for components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        let cart = [];

        function addToCart(name, price) {
            const existingItem = cart.find(item => item.name === name);
            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push({ name, price, quantity: 1 });
            }
            renderCart();
        }

        function renderCart() {
            const cartItems = document.getElementById('cart-items');
            const cartCount = document.getElementById('cart-count');
            const cartTotal = document.getElementById('cart-total');

            cartItems.innerHTML = '';
            let total = 0;
            let totalItems = 0;

            cart.forEach((item, index) => {
                const li = document.createElement('li');
                li.className = 'list-group-item d-flex justify-content-between align-items-center';

                // Nama dan quantity
                const itemText = document.createElement('span');
                itemText.textContent = `${item.name} x${item.quantity}`;

                // Tombol minus
                const btnMinus = document.createElement('button');
                btnMinus.className = 'btn btn-sm btn-outline-danger me-2';
                btnMinus.textContent = '-';
                btnMinus.onclick = () => {
                    if (item.quantity > 1) {
                        item.quantity--;
                    } else {
                        cart.splice(index, 1);
                    }
                    renderCart();
                };

                // Tombol plus
                const btnPlus = document.createElement('button');
                btnPlus.className = 'btn btn-sm btn-outline-success ms-2';
                btnPlus.textContent = '+';
                btnPlus.onclick = () => {
                    item.quantity++;
                    renderCart();
                };

                // Container untuk tombol + dan -
                const controls = document.createElement('div');
                controls.appendChild(btnMinus);
                controls.appendChild(btnPlus);

                // Harga subtotal
                const span = document.createElement('span');
                const subtotal = item.price * item.quantity;
                span.textContent = `Rp ${subtotal.toLocaleString('id-ID')}`;

                // Atur layout: text, controls, harga subtotal
                li.appendChild(itemText);
                li.appendChild(controls);
                li.appendChild(span);

                cartItems.appendChild(li);

                total += subtotal;
                totalItems += item.quantity;
            });

            cartCount.textContent = totalItems;
            cartTotal.textContent = total.toLocaleString('id-ID');
        }

        function checkout() {
            if (cart.length === 0) {
                alert('Keranjang Anda masih kosong.');
                return;
            }

            alert('Terima kasih, pesanan Anda telah dikirim!');
            cart = [];
            renderCart();
        }
    </script>
</body>
</html>
