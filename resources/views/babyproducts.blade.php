<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Purchase Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        nav ul {
            list-style-type: none;
            padding: 10px;
            display: flex;
            justify-content: space-around;
            background-color: #333;
        }

        nav ul li {
            margin: 0 10px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }

        .banner {
            position: relative;
            width: 100%;
            margin-top: -16px;
        }

        .banner img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .products {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 10px;
            margin: 20px;
        }

        .sub-categories {
            display: flex;
            justify-content: space-between;
            margin: 5px;
        }

        .product-card {
            position: relative;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            padding: 20px;
            transition: transform 0.3s;
        }

        .product-card img {
            width: 100px;
            height: 100px;
            object-fit: cover;
        }

        .product-card:hover {
            transform: translateY(-10px);
        }

        .categories {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .category {
            text-align: center;
            margin: 10px;
            margin-left: 70px;
            margin-right: 70px;
        }

        .category a {
            text-decoration: none;
            /* Remove underline */
            color: inherit;
            /* Inherit text color */
            display: block;
            /* Make the anchor block-level */
        }

        .category img {
            width: 130px;
            height: auto;
            border-radius: 50%;
            transition: transform 0.3s;
        }

        .category p {
            margin-top: 10px;
            font-size: 1.2em;
        }

        .product-card button {
            display: block;
            margin: 10px auto;
            padding: 10px 20px;
            background-color: #215688;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .product-card button:hover {
            background-color: #1e4a75;
        }

        .product-card p {
            margin: 10px 0;
        }

        .sub-categories .sub-category {
            cursor: pointer;
            padding: 10px 20px;
            border-bottom: 2px solid transparent;
        }

        .sub-categories .sub-category:hover {
            border-bottom: 2px solid #000;
        }

        .section-heading {
            text-align: center;
            margin-top: 40px;
        }

        .baby-nutrition img {
            border: 5px solid lightblue;
        }

        /* Popup Styles */
        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .popup-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            text-align: center;
            position: relative;
        }

        .popup-close {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            cursor: pointer;
        }

        .popup-product-info img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .quantity-selector {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 10px;
        }

        .quantity-selector button {
            width: 30px;
            height: 30px;
            font-size: 20px;
            cursor: pointer;
        }

        .quantity-selector input {
            width: 50px;
            text-align: center;
            margin: 0 10px;
            font-size: 18px;
        }

        .hidden {
            display: none;
        }

        #submit-button {
            background-color: #215688;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        #submit-button:hover {
            background-color: #1e4a75;
        }
    </style>
</head>

<body>
    <nav>
        <ul>
            <li><a href="">Favorites</a></li>
            <li><a href="{{ route('shoppingcart') }}">Cart</a></li>
            <li><a href="">User Account</a></li>
        </ul>
    </nav>

    <div class="banner">
        <img class="banner-slide" src="images/babybanner1.jpeg" alt="Banner 1">
        <img class="banner-slide" src="images/babybanner2.jpeg" alt="Banner 2">
        <img class="banner-slide" src="images/babybanner3.jpeg" alt="Banner 3">
    </div><br><br><br>

    <div class="categories">
        <div class="category baby-nutrition">
            <a href="purchase.html">
                <img src="images/babyfoodpicc.jpeg" alt="Baby Nutrition">
                <p>Baby Nutrition</p>
            </a>
        </div>
        <div class="category">
            <a href="babyhygiene.html">
                <img src="images/babyhygienepicc.jpeg" alt="Baby Hygiene">
                <p>Baby Hygiene</p>
            </a>
        </div>
        <div class="category">
            <a href="babyhealth.html">
                <img src="images/babyhealthpicc.jpeg" alt="Baby Health">
                <p>Baby Health</p>
            </a>
        </div>
        <div class="category">
            <a href="babygear.html">
                <img src="images/babygearpicc.jpeg" alt="Baby Gear">
                <p>Baby Gear</p>
            </a>
        </div>
        <div class="category">
            <a href="toys.html">
                <img src="images/babytoyspicc.jpeg" alt="Toys & Accessories">
                <p>Toys & Accessories</p>
            </a>
        </div>
    </div>
    <br><br><br>

    <h2 class="section-heading" id="milk-formula">Milk Formula</h2>
    <div class="products">

        <!-- Milk Formula products -->


        <div class="product-card" data-product-id="1" data-product-price="1000">
            <img src="images/aptamil.jpeg" alt="Milk Formula 1">
            <p>Aptamil</p>
            <p>Rs 1,000</p>
            <button class="add-to-cart-btn">Add to cart</button>
        </div>

        <div class="product-card" data-product-id="2" data-product-price="1200">
            <img src="images/ceralac.jpeg" alt="Milk Formula 2">
            <p>Ceralac</p>
            <p>Rs 1,200</p>
            <button class="add-to-cart-btn">Add to cart</button>
        </div>

        <div class="product-card" data-product-id="3" data-product-price="1500">
            <img src="images/aldo_baby.jpeg" alt="Milk Formula 3">
            <p>Eldo Baby</p>
            <p>Rs 1,500</p>
            <button class="add-to-cart-btn">Add to cart</button>
        </div>


        <div class="product-card" data-product-id="4" data-product-price="900">
            <img src="images/novosure.jpeg" alt="Milk Formula 4">
            <p>NovoSure</p>
            <p>Rs 900</p>
            <button class="add-to-cart-btn">Add to cart</button>
        </div>
        <div class="product-card" data-product-id="5" data-product-price="1350">
            <img src="images/cowngate.jpeg" alt="Milk Formula 5">
            <p>Cow & Gate</p>
            <p>Rs 1,350</p>
            <button class="add-to-cart-btn">Add to cart</button>
        </div>
        <div class="product-card" data-product-id="6" data-product-price="890">
            <img src="images/pediapro.jpeg" alt="Milk Formula 6">
            <p>PediaPro</p>
            <p>Rs 890</p>
            <button class="add-to-cart-btn">Add to cart</button>
        </div>
        <div class="product-card" data-product-id="7" data-product-price="2300">
            <img src="images/dexolac.jpeg" alt="Milk Formula 7">
            <p>Dexolac</p>
            <p>Rs 2,300</p>
            <button class="add-to-cart-btn">Add to cart</button>
        </div>

    </div>

    <h2 class="section-heading" id="baby-food">Baby Food</h2>
    <div class="products">
        <!-- Baby Food products -->
        <div class="product-card" data-product-id="8" data-product-price="800">
            <img src="images/organic_mamia.jpeg" alt="Baby Food 1">
            <p>Chicken & Vegetable Casserole</p>
            <p>Rs 800</p>
            <button class="add-to-cart-btn">Add to cart</button>
        </div>
        <div class="product-card" data-product-id="9" data-product-price="750">
            <img src="images/organic2.jpeg" alt="Baby Food 2">
            <p>Apple,Sweet Potato,Butternut Squash & Blueberry</p>
            <p>Rs 750</p>
            <button>Add to cart</button>
        </div>
        <div class="product-card" data-product-id="10" data-product-price="700">
            <img src="images/organic3.jpeg" alt="Baby Food 3">
            <p>Just Bananas</p>
            <p>Rs 700</p>
            <button>Add to cart</button>
        </div>
        <div class="product-card" data-product-id="11" data-product-price="850">
            <img src="images/organic4.jpeg" alt="Baby Food 4">
            <p>Apples,Carrots & Parsnips</p>
            <p>Rs 850</p>
            <button>Add to cart</button>
        </div>
        <div class="product-card" data-product-id="12" data-product-price="900">
            <img src="images/organic5.jpeg" alt="Baby Food 5">
            <p>Apples & Strawberries</p>
            <p>Rs 900</p>
            <button>Add to cart</button>
        </div>
        <div class="product-card" data-product-id="13" data-product-price="750">
            <img src="images/organic6.jpeg" alt="Baby Food 2">
            <p>Pasta Bolognese</p>
            <p>Rs 750</p>
            <button>Add to cart</button>
        </div>
        <div class="product-card" data-product-id="14" data-product-price="700">
            <img src="images/organic7.jpeg" alt="Baby Food 3">
            <p>Prunes</p>
            <p>Rs 700</p>
            <button>Add to cart</button>
        </div>

        <!-- heinz jars-->
        <div class="product-card" data-product-id="15" data-product-price="800">
            <img src="images/jar1.jpeg" alt="Baby Food 1">
            <p>Beef & Sweet Potato Mash</p>
            <p>Rs 800</p>
            <button>Add to cart</button>
        </div>
        <div class="product-card" data-product-id="16" data-product-price="750">
            <img src="images/jar2.jpeg" alt="Baby Food 2">
            <p>Cheesy Tomato Pasta</p>
            <p>Rs 750</p>
            <button>Add to cart</button>
        </div>
        <div class="product-card" data-product-id="17" data-product-price="700">
            <img src="images/jar3.jpeg" alt="Baby Food 3">
            <p>Mixed Vegetables</p>
            <p>Rs 700</p>
            <button>Add to cart</button>
        </div>
        <div class="product-card" data-product-id="18" data-product-price="850">
            <img src="images/jar4.jpeg" alt="Baby Food 4">
            <p>Creamed Porridge</p>
            <p>Rs 850</p>
            <button>Add to cart</button>
        </div>
        <div class="product-card" data-product-id="19" data-product-price="900">
            <img src="images/jar5.jpeg" alt="Baby Food 5">
            <p>Apple & Yoghurt</p>
            <p>Rs 900</p>
            <button>Add to cart</button>
        </div>
        <div class="product-card" data-product-id="20" data-product-price="750">
            <img src="images/jar6.jpeg" alt="Baby Food 2">
            <p>Green Beans & Sweet Corn</p>
            <p>Rs 750</p>
            <button>Add to cart</button>
        </div>
        <div class="product-card" data-product-id="21" data-product-price="700">
            <img src="images/jar7.jpeg" alt="Baby Food 3">
            <p>Apple Pommes</p>
            <p>Rs 700</p>
            <button>Add to cart</button>
        </div>

        <!-- heinz pouches-->
        <div class="product-card" data-product-id="22" data-product-price="800">
            <img src="images/heinz1.jpeg" alt="Baby Food 1">
            <p>Sweet Potato & Beef Casserole</p>
            <p>Rs 800</p>
            <button>Add to cart</button>
        </div>
        <div class="product-card" data-product-id="23" data-product-price="750">
            <img src="images/heinz2.jpeg" alt="Baby Food 2">
            <p>Sunday Chicken Dinner</p>
            <p>Rs 750</p>
            <button>Add to cart</button>
        </div>
        <div class="product-card" data-product-id="24" data-product-price="700">
            <img src="images/heinz3.jpeg" alt="Baby Food 3">
            <p>Apple & Strawberry</p>
            <p>Rs 700</p>
            <button>Add to cart</button>
        </div>
        <div class="product-card" data-product-id="25" data-product-price="850">
            <img src="images/heinz4.jpeg" alt="Baby Food 4">
            <p>Apple & Blueberries</p>
            <p>Rs 850</p>
            <button>Add to cart</button>
        </div>
        <div class="product-card" data-product-id="26" data-product-price="900">
            <img src="images/heinz5.jpeg" alt="Baby Food 5">
            <p>Potato & Fish Pie</p>
            <p>Rs 900</p>
            <button>Add to cart</button>
        </div>
        <div class="product-card" data-product-id="27" data-product-price="750">
            <img src="images/heinz6.jpeg" alt="Baby Food 2">
            <p>Spaghetti Bolognese</p>
            <p>Rs 750</p>
            <button>Add to cart</button>
        </div>
        <div class="product-card" data-product-id="28" data-product-price="700">
            <img src="images/heinz7.jpeg" alt="Baby Food 3">
            <p>Apple,Spinach,Kiwi & Quinoa</p>
            <p>Rs 700</p>
            <button>Add to cart</button>
        </div>

    </div>

    <h2 class="section-heading" id="vitamins">Vitamins</h2>
    <div class="products">
        <!-- Vitamins products -->
        <div class="product-card" data-product-id="29" data-product-price="1100">
            <img src="images/abidec.jpeg" alt="vitamin 1">
            <p>Abidec</p>
            <p>Rs 1100</p>
            <button id="add-to-cart">Add to cart</button>
        </div>
        <div class="product-card" data-product-id="30" data-product-price="900">
            <img src="images/brauer.jpeg" alt="vitamin 2">
            <p>Brauer</p>
            <p>Rs 900</p>
            <button>Add to cart</button>
        </div>
        <div class="product-card" data-product-id="29" data-product-price="1100">
            <img src="images/abidec.jpeg" alt="vitamin 3">
            <p>Abidec</p>
            <p>Rs 1100</p>
            <button>Add to cart</button>
        </div>
        <div class="product-card" data-product-id="29" data-product-price="1100">
            <img src="images/abidec.jpeg" alt="vitamin 1">
            <p>Abidec</p>
            <p>Rs 1100</p>
            <button>Add to cart</button>
        </div>
        <div class="product-card" data-product-id="29" data-product-price="1100">
            <img src="images/abidec.jpeg" alt="vitamin 1">
            <p>Abidec</p>
            <p>Rs 1100</p>
            <button>Add to cart</button>
        </div>
        <div class="product-card" data-product-id="29" data-product-price="1100">
            <img src="images/abidec.jpeg" alt="vitamin 1">
            <p>Abidec</p>
            <p>Rs 1100</p>
            <button>Add to cart</button>
        </div>
        <div class="product-card" data-product-id="29" data-product-price="1100">
            <img src="images/abidec.jpeg" alt="vitamin 1">
            <p>Abidec</p>
            <p>Rs 1100</p>
            <button>Add to cart</button>
        </div>

    </div>

    <!-- Popup Structure -->
    <div id="cart-popup" class="popup">
        <div class="popup-content">
            <span class="popup-close">&times;</span>
            <h2>Add to Cart</h2>
            <div class="popup-product-info">
                <img id="popup-product-image" src="" alt="Product">
                <p id="popup-product-name"></p>
            </div>
            <form id="cart-form" action="{{ route('add.to.cart') }}" method="POST">
                @csrf
                <input type="hidden" id="popup-product-id" name="product_id" value="">
                <p>Select quantity:</p>
                <div class="quantity-selector">
                    <button type="button" id="minus-quantity">-</button>
                    <input type="number" id="quantity" name="quantity" value="1" min="1" required>
                    <button type="button" id="plus-quantity">+</button>
                </div>
                <button type="submit" id="submit-button">Add to Cart</button>
            </form>
            <p id="confirmation-message" class="hidden">Product has been added to cart</p>
        </div>
    </div>


    <h2 class="section-heading" id="add-product">Add Product</h2>
    <form action="{{ route('add.product') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="product-name">Product Name:</label>
            <input type="text" id="product-name" name="product_name" required>
        </div>
        <div class="form-group">
            <label for="product-price">Product Price (Rs):</label>
            <input type="number" id="product-price" name="product_price" required>
        </div>
        <div class="form-group">
            <label for="product-quantity">Product Quantity:</label>
            <input type="number" id="product-quantity" name="product_quantity" required>
        </div>
        <button type="submit" id="add-product-button">Add Product</button>
    </form>






    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const popup = document.getElementById('cart-popup');
            const popupImage = document.getElementById('popup-product-image');
            const popupName = document.getElementById('popup-product-name');
            const quantityInput = document.getElementById('quantity');
            const plusButton = document.getElementById('plus-quantity');
            const minusButton = document.getElementById('minus-quantity');
            const submitButton = document.getElementById('submit-button');
            const confirmationMessage = document.getElementById('confirmation-message');
            const closeButton = document.querySelector('.popup-close');
            const productForm = document.getElementById('product-form');

            // Handling the product card click event
            document.querySelectorAll('.product-card button').forEach(button => {
                button.addEventListener('click', function() {
                    const productCard = this.parentElement;
                    const productImage = productCard.querySelector('img').src;
                    const productName = productCard.querySelector('p').innerText;
                    const productId = productCard.getAttribute('data-product-id');
                    const productPrice = productCard.getAttribute('data-product-price');

                    popupImage.src = productImage;
                    popupName.innerText = productName;
                    quantityInput.value = 0; // Reset quantity

                    // Store product ID for later use
                    popup.dataset.productId = productId;
                    popup.dataset.productPrice = productPrice;

                    popup.style.display = 'flex'; // Show pop-up
                });
            });

            // Close the pop-up
            closeButton.addEventListener('click', () => {
                popup.style.display = 'none';
            });

            // Increase quantity
            plusButton.addEventListener('click', () => {
                quantityInput.value = parseInt(quantityInput.value) + 1;
            });

            // Decrease quantity
            minusButton.addEventListener('click', () => {
                const newValue = parseInt(quantityInput.value) - 1;
                quantityInput.value = newValue >= 0 ? newValue : 0;
            });

            // Submit the form
            submitButton.addEventListener('click', () => {
                const productId = popup.dataset.productId; // Get product ID
                const quantity = quantityInput.value;
                const pricePerUnit = popup.dataset.productPrice; // Get product price

                fetch('/add-to-cart', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content')
                        },
                        body: JSON.stringify({
                            product_id: productId,
                            quantity: quantity,
                            price: pricePerUnit
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            confirmationMessage.classList.remove('hidden');
                            setTimeout(() => {
                                popup.style.display = 'none';
                                confirmationMessage.classList.add('hidden');
                            }, 2000);
                        } else {
                            alert('There was an error adding the product to the cart.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });

            // Banner image slider
            let currentSlide = 0;
            const slides = document.querySelectorAll('.banner-slide');

            function showSlide(index) {
                slides.forEach((slide, i) => {
                    slide.style.display = i === index ? 'block' : 'none';
                });
            }

            showSlide(currentSlide);
            setInterval(() => {
                currentSlide = (currentSlide + 1) % slides.length;
                showSlide(currentSlide);
            }, 5000); // Change slide every 5 seconds

            // Handle product form submission
            productForm.addEventListener('submit', function(event) {
                event.preventDefault();

                const formData = new FormData(this);
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                fetch('/save-product-info', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: JSON.stringify(Object.fromEntries(formData))
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Product information has been saved successfully.');
                            productForm.reset(); // Optional: Reset the form
                        } else {
                            alert('There was an error saving the product information.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });
        });
    </script>


</body>

</html>
