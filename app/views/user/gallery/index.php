<?php require_once VIEWS_PATH . "/user/includes/header.php"; ?>

<!-- MAIN Content START -->
<!-- Content section1 -->
<section class="py-5">
    <div class="container">
        <?php
        getContent('gallery', 'gallery', 1);
        ?>

        <hr />

        <!-- Grid row gallery SRART -->
        <div class="gallery" id="gallery">
            <?php

            // for ($i = 0; $i < count($data['gallery']); $i++) {
            //     echo '<div class="mb-3 pics animation all 2">
            //                 <img class="img-fluid galleryImg" src="' . APPURL . '/public/img/gallery/' . $data['gallery'][$i]['source'] . '" alt="">
            //         </div>';
            // }

            // or...

            if ($data['gallery']) {
                foreach ($data['gallery'] as $gallery) {
                    echo '<div class="mb-3 pics animation all 2">
                        <img class="img-fluid galleryImg" src="' . APPURL . '/public/img/gallery/' . $gallery['source'] . '" alt="">
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