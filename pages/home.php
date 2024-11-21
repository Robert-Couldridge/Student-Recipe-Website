<body id="page-home">
    <!-- Main Content -->
    <div class="container">

        <!-- Popular Recipes Section -->
        <section id="recipes">
            <h2>Popular Recipes</h2>
            <div class="recipes">
                <!-- Recipe 1 -->
                <div class="card">
                    <img src="recipe1.jpg" alt="Recipe 1"> <!-- Replace with an image -->
                    <h3>Easy Pasta</h3>
                    <p>A quick pasta recipe that only takes 15 minutes!</p>
                    <a href="#">View Recipe</a>
                </div>
                <!-- Recipe 2 -->
                <div class="card">
                    <img src="recipe2.jpg" alt="Recipe 2">
                    <h3>Avocado Toast</h3>
                    <p>Healthy and delicious avocado toast in just 5 minutes.</p>
                    <a href="#">View Recipe</a>
                </div>
                <!-- Recipe 3 -->
                <div class="card">
                    <img src="recipe3.jpg" alt="Recipe 3">
                    <h3>One-Pot Chili</h3>
                    <p>A hearty meal perfect for any student.</p>
                    <a href="#">View Recipe</a>
                </div>
                <div class="bg-primary", aria-hidden="true", role="presentation", loading="lazy">
                    <img aria-hidden="true", role="presentation", loading="lazy", src="https://cdn.ferrari.com/cms/network/media/img/resize/66e3fbf870dcce0011d9c701-fia-wec-6-hours-fuji-2024-hypercar-free-practice-home-2?width=768&height=1024">
                </div>
            </div>
        </section>

        <section id="next-race">
            <h2>Formula 1 Race Calendar</h2>
            <div class="next-race"></div>
            <script src="src/js/next_race.js"></script>
        </section>

        <!-- Newsletter Signup Section -->
        <section id="newsletter">
            <h2>Join Our Newsletter</h2>
            <p>Sign up to receive the latest recipes and cooking tips right in your inbox!</p>
            <form action="#" method="POST">
                <input type="email" name="email" placeholder="Enter your email" required>
                <button type="submit">Subscribe</button>
            </form>
        </section>
    </div>
</body>