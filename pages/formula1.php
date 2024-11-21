<?php
$Part = new Part($Conn);
$parts = $Part->getAllParts();
?>

<body id="formula1">

    <!-- Main Content -->
    <div class="container">
        <h1 class="mb-4 pb-2">Parts</h1>

        <div class="row">
            <?php foreach($parts as $part) { ?>
                <div class="col-md-3">
                    <div class="part-card">
                        <div class="part-card-image" style="background-image: url('./images/front_disc.jpg');">
                        </div>
                </div>
            <?php } ?>
    </div>
    <div class="container">
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