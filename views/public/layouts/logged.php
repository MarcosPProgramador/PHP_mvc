<?php
    if (isset($_GET['destroy'])){
        session_unset();

        header("Location:  signIn");
        exit();
    }
?>

<section class="section-container-layout">
    <div class="section-container-layout__card-container">
        <div class="section-container-layout__card">
            <div class="section-container-layout__card-size">
                <img src="https://source.unsplash.com/301x600" alt="">
                <div class="card-size__overlay-gradient d">
                    <div class="overlay-gradient__circle">
                        <h2>Title - orign</h2>

                    </div>
                    <div class="overlay-gradient__buttons-config">
                        <button class="buttons-config__btn btn n1">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                        </button>
                        <button class="buttons-config__btn btn n2">
                            <i class="fa fa-paperclip" aria-hidden="true"></i>
                        </button>
                        <button class="buttons-config__btn btn n3">
                            <i class="fa fa-bell-o" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>

            </div>
        </div>
        <div class="section-container-layout__card">
            <div class="section-container-layout__card-size">
                <img src="https://source.unsplash.com/300x601" alt="">
                <div class="card-size__overlay-gradient d">
                    <div class="overlay-gradient__circle">
                        <h2>Title - orign</h2>

                    </div>
                    <div class="overlay-gradient__buttons-config">
                        <button class="buttons-config__btn btn n1">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                        </button>
                        <button class="buttons-config__btn btn n2">
                            <i class="fa fa-paperclip" aria-hidden="true"></i>
                        </button>
                        <button class="buttons-config__btn btn n3">
                            <i class="fa fa-bell-o" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>

            </div>
        </div>
        <div class="section-container-layout__card">
            <div class="section-container-layout__card-size">
                <img src="https://source.unsplash.com/300x600" alt="">
                <div class="card-size__overlay-gradient d">
                    <div class="overlay-gradient__circle">
                        <h2>Title - orign</h2>

                    </div>
                    <div class="overlay-gradient__buttons-config">
                        <button class="buttons-config__btn btn n1">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                        </button>
                        <button class="buttons-config__btn btn n2">
                            <i class="fa fa-paperclip" aria-hidden="true"></i>
                        </button>
                        <button class="buttons-config__btn btn n3">
                            <i class="fa fa-bell-o" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>

            </div>
        </div>
 
    </div>

</section>
