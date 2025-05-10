<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="ctgr.css"> -->

    <style>
        :root {
            --coklat-color : #40342A;
            --cream-color : #F2F0EB;
            --putih-color : #fff;
            --hitam-color : #000000;
            --abu-color : #333;
        }

    body {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    background-color: var(--cream-color);
    color: var(--hitam-color);
    line-height: 1.6;
}

/* Navigation Bar */
.navbar {
    background-color: var(--coklat-color);
    padding: 10px 0;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    position: fixed; /* tambahkan ini */
    width: 100%;
    top: 0;
    left: 0;
    z-index: 999;
    transition: opacity 0.3s ease;
}

.nav-container {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10 30px;
}

.nav-photo {
    display: flex;
    align-items: center;
    gap: 15px;
}

.logo {
    color: white;
    font-size: 1.3em;
    font-weight: bold;
    text-decoration: none;
}

.nameuser {
    color: white;
    font-size: 1.0em;
    font-weight: 600;
    text-decoration: none;
}

.nav-links {
    display: flex;
    gap: 55px;
}

.nav-links a {
    color: var(--putih-color);
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s;
    font-size: 18px;
}

.nav-links a:hover {
    color: var(--cream-color);
}

.profile-img {
    width: 45px;             /* Ukuran sesuai standar navbar */
    height: 45px;
    object-fit: cover;       /* Menyesuaikan isi foto */
    border-radius: 50%;      /* Membuat lingkaran */
    border: none;
}

/* Main Content */
.container {
    max-width: 1200px;
    margin: 40px auto;
    padding: 0 120px;
    margin-top: 100px;
}

h1 {
    color: var(--coklat-color);
    text-align: center;
    margin-bottom: 40px;
    font-size: 2.2em;
}

p {
    text-align: center;
}

/* Category Cards */
.categories {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 35px;
    margin-bottom: 50px;
}

.category-card {
    background-color: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    transition: transform 0.3s, box-shadow 0.3s;
    cursor: pointer;
}

.category-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(63, 39, 2, 0.808);
}

.card-image {
    height: 180px;
    overflow: hidden;
}

.card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.card-content {
    padding: 20px;
}

.card-content h3 {
    margin-top: 0;
    color: var(--coklat-color);
    text-align: center;
}

.card-content p {
    color: var(--abu-color);
    margin-bottom: 15px;
}

/* Grid */
.grid {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    grid-template-rows: auto auto;
    gap: 18px;
    padding: 40px 0px;
}

/* Untuk semua item klik */
.item {
    position: relative;
    overflow: hidden;
    display: block;
    border-radius: 8px;
    text-decoration: none;
    color: inherit;
}

.item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.3s ease;
}

/* Hover efek */
.item:hover img {
    transform: scale(1.05);
}

/* Overlay teks kategori */
.overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(0, 0, 0, 0.45);
    color: white;
    text-align: center;
    padding: 15px;
    font-size: 20px;
    font-weight: bold;
    
    transform: translateY(100%);
    transition: transform 0.4s ease;

}

/* Saat hover, teks naik dari bawah ke posisi semula */
.item:hover .overlay {
    transform: translateY(0%);
}


/* Ukuran grid item */
.item-1 {
    grid-column: 1 / 2;
    grid-row: 1 / 2;
    height: 250px;
}

.item-2 {
    grid-column: 2 / 3;
    grid-row: 1 / 2;
    height: 250px;
}

.item-3 {
    grid-column: 3 / 4;
    grid-row: 1 / 3;
    height: 518px;
}

.item-4 {
    grid-column: 1 / 3;
    grid-row: 2 / 3;
    height: 250px;
}

/* Footer */
footer {
    background-color: var(--coklat-color);
    color: var(--putih-color);
    padding: 50px 0 20px;
    font-size: 14px;
}

.footer-container {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    padding: 0 20px;
    gap: 20px;
}

.footer-section {
    flex: 1;
    min-width: 250px;
    margin-bottom: 30px;
}

.footer-section h3 {
    font-size: 18px;
    margin-bottom: 15px;
    color: var(--putih-color);
    border-bottom: 2px solid var(--coklat-color);
    padding-bottom: 8px;
    display: inline-block;
}

.footer-section p {
    text-align: left;
}

.quick-links ul {
    list-style: none;
    padding: 0;
}

.quick-links li {
    margin-bottom: 10px;
}

.quick-links a {
    color: var(--putih-color);
    text-decoration: none;
    transition: color 0.3s;
}

.quick-links a:hover {
    color: var(--cream-color);
}

.contact-us p {
    margin-bottom: 10px;
    color: var(--putih-color);
    text-align: left;
}

.newsletter-form {
    display: flex;
    gap: 5px;
    align-items: center;
}

.newsletter-form input {
    flex: 1;
    padding: 10px;
    border: none;
    border-radius: 3px;
    outline: none;
}

.newsletter-form button {
    background-color: var(--coklat-color);
    color: var(--putih-color);
    padding: 10px 15px;
    border-radius: 10px;
    cursor: pointer;
    border-color: var(--putih-color);
    transition: background-color 0.3s;
}

.newsletter-form button:hover {
    background-color: var(--cream-color);
    color: var(--coklat-color);
    border-color: var(--coklat-color);
}

.footer-bottom {
    text-align: center;
    padding-top: 20px;
    border-top: 1px solid var(--cream-color);
    margin-top: 20px;
}

.footer-bottom p {
    margin: 5px 0;
    color: var(--cream-color);
}



    </style>
    <!-- Add Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-photo">
                <img src="logo.jpg" alt="Profile" class="profile-img">
                <a href="#" class="logo">Nazarch Studio</a>

            </div>
            <div class="nav-links">
                <a href="">Home</a>
                <a href="#">Categories</a>
                <a href="#">About</a>
                <a href="#">Contact</a>
            </div>

            <!-- Tambahkan foto di sini -->
        <div class="nav-photo">
            <a href="" class="nameuser">Moch. Dzaky Musyaddad</a>
            <img src="ganteng.jpg" alt="Profile" class="profile-img">
        </div>
        </div>
    </nav>

    <div class="container">
        <h1>CHOOSE YOUR CATEGORY DESIGN</h1>
        
        <!-- First Category Section -->
        <div class="categories">
            <div class="category-card">
                <div class="card-image">
                    <img src="ganteng.jpg" alt="">
                </div>
                <div class="card-content">
                    <h3>Kategori 1</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
            </div>
            
            <div class="category-card">
                <div class="card-image">
                    <img src="ganteng.jpg" alt="">
                </div>
                <div class="card-content">
                    <h3>Kategori 2</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
            </div>
            
            <div class="category-card">
                <div class="card-image">
                    <img src="ganteng.jpg" alt="">
                </div>
                <div class="card-content">
                    <h3>Kategori 3</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
            </div>
        </div>

        <h1>CHOOSE YOUR CATEGORY DESIGN</h1>
        <p>Lorem ipsum dolor set amet kawoakwoa aduabfatuabfa</p>

        <div class="grid">
            <a href="#" class="item item-1">
                <img src="ganteng.jpg" alt="Kategori 1">
                <div class="overlay">Kategori 1</div>
            </a>
            <a href="#" class="item item-2">
                <img src="ganteng.jpg" alt="Kategori 2">
                <div class="overlay">Kategori 2</div>
            </a>
            <a href="#" class="item item-3">
                <img src="ganteng.jpg" alt="Kategori 3">
                <div class="overlay">Kategori 3</div>
            </a>
            <a href="#" class="item item-4">
                <img src="ganteng.jpg" alt="More">
                <div class="overlay">More</div>
            </a>
        </div>
        </div>
        

    <!-- Footer -->
    <footer>
        <div class="container footer-container">
            <div class="footer-section logo-section">
                <img src="logo.jpg" alt="" width="100">
                <!-- <h2>REAL HOMES</h2> -->
                <p class="logo">Nazarch Studio</p>
            </div>
            
            <div class="footer-section quick-links">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Kategori</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            
            <div class="footer-section contact-us">
                <h3>Contact Us</h3>
                <p><i class="fas fa-map-marker-alt"></i> 3015 Grand Ave, Coconut Grove,<br>Merrick Way, FL 12345</p>
                <p><i class="fas fa-phone-alt"></i> <strong>Phone:</strong> +023-456-789</p>
                <p><i class="fas fa-envelope"></i> <strong>Email:</strong> sales@example.com</p>
            </div>
            
            <div class="footer-section newsletter">
                <h3>Stay Updated</h3>
                <form class="newsletter-form">
                    <input type="email" placeholder="Enter your email" required>
                    <button type="submit">Sign Up</button>
                </form>
            </div>
        </div>
        
        <div class="footer-bottom container">
            <p>&copy; 2023. All rights reserved.</p>
            <p>Designed by Inspiry Themes</p>
        </div>
    </footer>

    <script>
        const navbar = document.querySelector('.navbar');
    
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.style.opacity = '0.8'; // ketika discroll
            } else {
                navbar.style.opacity = '1';   // saat di atas
            }
        });
    </script>
    
</body>
</html>