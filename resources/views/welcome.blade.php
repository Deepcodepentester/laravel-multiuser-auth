<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Marketplace</title>

<style>
:root {
    --primary: #4e73df;
    --secondary: #1cc88a;
    --dark: #111;
    --light: #f8f9fc;
    --gray: #6c757d;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    background: var(--light);
    color: #333;
    line-height: 1.6;
}

/* ================= NAVBAR ================= */
header {
    background: var(--dark);
    color: white;
    padding: 1rem 1.5rem;
}

.nav-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.logo {
    font-size: 1.3rem;
    font-weight: bold;
}

nav {
    display: flex;
    gap: 1.5rem;
}

nav a {
    color: white;
    text-decoration: none;
    font-size: 0.95rem;
}

nav a:hover {
    opacity: 0.7;
}

/* Hamburger */
.menu-toggle {
    display: none;
    flex-direction: column;
    cursor: pointer;
}

.menu-toggle span {
    height: 3px;
    width: 25px;
    background: white;
    margin-bottom: 4px;
    border-radius: 5px;
}

/* ================= HERO ================= */
.hero {
    background: linear-gradient(to right, var(--primary), var(--secondary));
    color: white;
    text-align: center;
    padding: 4rem 1.5rem;
}

.hero h1 {
    font-size: clamp(1.8rem, 5vw, 3rem);
    margin-bottom: 1rem;
}

.hero p {
    max-width: 600px;
    margin: 0 auto 2rem;
    font-size: 1rem;
}

.hero button {
    padding: 0.8rem 1.5rem;
    border: none;
    border-radius: 6px;
    background: white;
    color: var(--dark);
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
}

.hero button:hover {
    opacity: 0.85;
}

/* ================= CATEGORIES ================= */
.categories {
    padding: 3rem 1.5rem;
    text-align: center;
}

.categories h2 {
    margin-bottom: 2rem;
    font-size: 1.8rem;
}

.category-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
    gap: 20px;
    max-width: 1100px;
    margin: auto;
}

.category-card {
    background: white;
    padding: 2rem 1rem;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    transition: 0.3s;
    cursor: pointer;
}

.category-card:hover {
    transform: translateY(-6px);
}

/* ================= CTA ================= */
.cta {
    background: white;
    text-align: center;
    padding: 3rem 1.5rem;
}

.cta h2 {
    margin-bottom: 1rem;
}

.cta p {
    color: var(--gray);
    margin-bottom: 1.5rem;
}

.cta button {
    padding: 0.8rem 1.5rem;
    border: none;
    background: var(--primary);
    color: white;
    border-radius: 6px;
    cursor: pointer;
    transition: 0.3s;
}

.cta button:hover {
    opacity: 0.9;
}

/* ================= FOOTER ================= */
footer {
    background: var(--dark);
    color: #bbb;
    text-align: center;
    padding: 1rem;
    font-size: 0.85rem;
}

/* ================= RESPONSIVE ================= */

/* Mobile Navigation */
@media (max-width: 768px) {

    nav {
        position: absolute;
        top: 70px;
        right: 0;
        background: var(--dark);
        flex-direction: column;
        width: 200px;
        padding: 1rem;
        display: none;
    }

    nav.active {
        display: flex;
    }

    .menu-toggle {
        display: flex;
    }
}
</style>
</head>

<body>

<header>
    <div class="nav-container">
        <div class="logo">MarketPlace</div>

        <div class="menu-toggle" onclick="toggleMenu()">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <nav id="nav-menu">
            <a href="#">Home</a>
            <!-- <a href="#">Browse</a>
            <a href="#">Sell</a> -->
            <a href="/login">Login</a>
        </nav>
    </div>
</header>

<section class="hero">
    <h1>Buy & Sell Anything</h1>
    <p>Your one-stop marketplace for products, services, and more.</p>
    <button>Start Shopping</button>
</section>

<section class="categories">
    <h2>Shop by Category</h2>
    <div class="category-grid">
        <div class="category-card">Electronics</div>
        <div class="category-card">Fashion</div>
        <div class="category-card">Home & Living</div>
        <div class="category-card">Sports</div>
        <div class="category-card">Vehicles</div>
        <div class="category-card">Services</div>
    </div>
</section>

<section class="cta">
    <h2>Start Selling Today</h2>
    <p>Create your seller account and reach thousands of buyers.</p>
    <button>Become a Seller</button>
</section>

<footer>
    © 2026 MarketPlace. All rights reserved.
</footer>

<script>
function toggleMenu() {
    document.getElementById("nav-menu").classList.toggle("active");
}
</script>

</body>
</html>