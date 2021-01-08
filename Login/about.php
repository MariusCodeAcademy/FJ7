<?php
require('./process/loginProcess.php');
require('./inc/head.php');
require('./inc/nav.php');

?>
<main class="container">
    <h1>About our Blog</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum architecto voluptates cupiditate expedita voluptate. Perspiciatis, ad! Molestias, vero ab. Id architecto repudiandae dolore, provident reprehenderit mollitia veniam vero corporis voluptates?</p>


    <section class="articles">
        <?php
        // render array data as articles 
        foreach ($articles as $article) :
            // jei vartotjas neprisijunges ir straipsnis yra VIP true tai mes jo nerodom
            if (!ifUserIsLoggedIn() && $article['Vip']) {
                continue;
            }
        ?>
            <article>
                <h3 class='artTitle'><?php echo $article['title'] ?></h3>
                <p class="artText"><?php echo $article['body'] ?></p>
                <a href="#" class="read-more"><?php echo $article['linkText'] ?></a>

            </article>

        <?php endforeach; ?>

        <!-- jei nera prisijunges tai rodom
                jei yra prisijunges tai ne -->
        <?php if (!ifUserIsLoggedIn()) : ?>
            <p>Please <a href="login.php">login</a> to see our premium content</p>
        <?php endif; ?>
    </section>



</main>

<?php
require('./inc/footer.php');
?>