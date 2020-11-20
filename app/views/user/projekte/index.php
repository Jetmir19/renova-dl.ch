<?php require_once VIEWS_PATH . "/user/includes/header.php"; ?>

<!-- MAIN Content START -->
<section class="py-5">
    <div class="container">
        <?php
        // getContent('gallery', 'gallery', 1);
        ?>

        <!-- Database section START -->
        <h1 class="font-weight-bold"><span class="black-border">PRO</span>JEKTE</h1>
        <!-- Database section END -->

        <hr />

        <!-- Grid row gallery SRART -->
        <div class="gallery" id="gallery">
            <?php

            // for ($i = 0; $i < count($data['gallery']); $i++) {
            //     echo '<div class="mb-3 pics animation all 2">
            //                 <img class="img-fluid galleryImg" src="' . APPURL . '/public/img/gallery/' . $data['gallery'][$i]['galleryImage'] . '" alt="">
            //         </div>';
            // }

            // or...

            if ($data['projekte']) {
                foreach ($data['projekte'] as $gallery) {
                    echo '<div class="mb-3 pics animation all 2">
                        <img class="img-fluid galleryImg" src="' . APPURL . '/public/uploads/gallery/' . $gallery['galleryImage'] . '" alt="">
                    </div>';
                }
            } else {
                echo '<h2>Something went wrong!</h2>';
            }

            ?>
        </div>
        <!-- Grid row gallery END -->

    </div>
</section>
<!-- MAIN Content END -->

<?php require_once VIEWS_PATH . "/user/includes/footer.php"; ?>