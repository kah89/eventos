<script src="https://www.youtube.com/player_api"></script>
<main>
    <div class="container bg-white" style="padding-bottom: 10em;">
        <div class="row">
            <div class="col-12 row" style="padding: 40px;">
                <h1>Olá
                    <?= session()->get('firstname') ?>, bem-vindo!</h1><br>

                <div class="col-12 col-md-8">
                    <div class="video-container">
                        <div id="player"></div>
                    </div>
                </div>
                <div class="col-12 col-md-4"><iframe allowfullscreen="" frameborder="0" src="https://www.youtube.com/live_chat?v=ZZfVgVnnUpo&embed_domain=portal.crfsp.org.br" width="100%" height="390"></iframe></div>


                <script>
                    // create youtube player
                    var player;

                    function onYouTubePlayerAPIReady() {
                        player = new YT.Player('player', {
                            height: '390',
                            width: '640',
                            videoId: 'ZZfVgVnnUpo',
                            events: {
                                'onReady': onPlayerReady,
                                'onStateChange': onPlayerStateChange
                            }

                        });
                    }

                    // autoplay video
                    function onPlayerReady(event) {
                        event.target.playVideo();
                    }

                    // when video ends
                    function onPlayerStateChange(event) {
                        if (event.data === 0) {
                            alert('done');
                        }
                    }
                </script>
            </div>
        </div>
    </div>
    <style>
        #player {
            /* override other styles to make responsive */
            width: 100% !important;
        }
        
        .video-container {
            overflow: hidden;
            position: relative;
            width: 100%;
        }
        
        .video-container::after {
            padding-top: 56.25%;
            display: block;
            content: '';
        }
        
        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
</main>