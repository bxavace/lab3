<h1>Brylle Ace Nunez</h1>

<p>Software Engineer</p>

<?php 
    echo img("https://thelukewest.files.wordpress.com/2016/11/coin-shine1.gif");
?>

<p>
    Hi, Rams! Thank you for visiting my web page. Here's a <span class="nes-text is-warning">coin</span> for you.
</p>

<div class="nes-balloon from-left">
    <p>
        Motivate me.
    </p>
</div>

<?php
    $quotes = [
        "The only way to do great work is to love what you do. - Steve Jobs",
        "Success is not the key to happiness. Happiness is the key to success. - Albert Schweitzer",
        "Believe you can and you're halfway there. - Theodore Roosevelt",
        "The future belongs to those who believe in the beauty of their dreams. - Eleanor Roosevelt",
        "The only limit to our realization of tomorrow will be our doubts of today. - Franklin D. Roosevelt"
    ];

    $randomQuote = $quotes[array_rand($quotes)];
?>

<div class="nes-balloon from-right">
    <p>
        <?php echo $randomQuote; ?>
    </p>
</div>