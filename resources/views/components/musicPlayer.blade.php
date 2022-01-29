<?php

?>

<link rel="stylesheet" href="{{ URL::asset('css/musicPlayer.css') }}">

<nav class="navbar bg-light fixed-bottom" id='container' style="display: none;">
    <div class=''>
        <input type="range" id="progress_bar" name="progress_bar" min="0" max="100">
    </div>
    <div class="container">
        <div class="row align-items-center">
            <div class="music_cover_box">
                <img class="music_cover" src="https://cdns-images.dzcdn.net/images/cover/aac47589aff99a34cacc267b793b20c8/500x500.jpg">
            </div>

            <div class="bg-red flex-column align-items-center">
                <div>
                    <span class="music_name align-middle">Aí Eu bebo</span>
                </div>
                <div>
                    <span class="composer_name">Maiara e Maraisa</span>
                </div>
            </div>
        </div>

        <div class="row d-flex align-items-center">
            <div class="mediaPlayer_box">
                <a href='#' onclick="someFunction(); return false;"><i class="fas fa-forward mediaPlayer_icons fa-rotate-180"></i></a>
                <a href='#' id="playButtom" onclick="playVideo(); return false;" style="display: inline"><i class="fas fa-play mediaPlayer_icons"></i></a>
                <a href='#' id="pauseButtom" onclick="pauseVideo(); return false;" style="display: none;"><i class="fas fa-pause mediaPlayer_icons"></i></a>
                <a href='#' onclick="someFunction(); return false;"><i class="fas fa-forward mediaPlayer_icons"></i></a>
            </div>
        </div>

        <div class="row d-flex align-items-center">
            <div class="m-2">
                <span id='currentTime' class="margin-5">00:00</span>
                <span class="margin-5 grayColor">-</span>
                <span id='totalTime' class="margin-5 grayColor">02:35</span>
            </div>
            <div>
                <a id="volumeUp" onclick="muteVolume(); return false;" style="display: inline"><i class="fas fa-volume-up mediaPlayer_icons"></i></a>
                <a id="volumeMute" onclick="upVolume(); return false;" style="display: none;"><i class="fas fa-volume-mute mediaPlayer_icons"></i></a>
                <a><i class="fas fa-download mediaPlayer_icons"></i></a>
            </div>
        </div>
    </div>
</nav>

<div id="ytplayer">
    <iframe width="0" height="0" src="https://www.youtube.com/watch?v=QhsIg4ZsA6w" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
</div>

<script>
    // Load the IFrame Player API code asynchronously.
    var tag = document.createElement('script');
    tag.src = "https://www.youtube.com/player_api";

    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    var player;

    function onYouTubePlayerAPIReady() {
        player = new YT.Player('ytplayer', {
            height: '0',
            width: '0',
            videoId: youtube_parser('https://www.youtube.com/watch?v=QhsIg4ZsA6w&ab_channel=MaiaraeMaraisa'),
            events: {
                'onReady': onPlayerReady
            }
        });

    }

    function youtube_parser(url) {
        var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#&?]*).*/;
        var match = url.match(regExp);
        return (match && match[7].length == 11) ? match[7] : false;
    }

    function onPlayerReady() {
        document.getElementById('container').style.display = 'inline';
        var duration = FormateSeconds(player.getDuration());
        document.getElementById("totalTime").innerHTML = duration;
    }

    function playVideo() {
        player.playVideo();
        document.getElementById('playButtom').style.display = 'none';
        document.getElementById('pauseButtom').style.display = 'inline';
    }

    function pauseVideo() {
        player.pauseVideo();
        document.getElementById('playButtom').style.display = 'inline';
        document.getElementById('pauseButtom').style.display = 'none';
    }

    function upVolume() {
        player.unMute();
        document.getElementById('volumeUp').style.display = 'inline';
        document.getElementById('volumeMute').style.display = 'none';
    }

    function muteVolume() {
        player.mute();
        document.getElementById('volumeUp').style.display = 'none';
        document.getElementById('volumeMute').style.display = 'inline';
    }

    window.setInterval(function() {
        //Aqui controla o tempo da musica mostrado na tela
        var currentTimeInt = Math.round(player.getCurrentTime());
        if (!player) return;
        var formatted = FormateSeconds(currentTimeInt);
        document.getElementById("currentTime").innerHTML = formatted;

        //Aqui controla o slider que mostra que parte ta na musica
        var currentTimeFloat = Math.round(player.getCurrentTime(), 2);


        document.getElementById('progress_bar').style.display = 'inline';
    }, 10);

    function FormateSeconds(number){
        var s = number % 60;
        if (s < 10)
            s = '0' + s;
        var m = Math.floor(number / 60);
        if (m < 10)
            m = '0' + m;
        var formatted = m + ':' + s;
        return formatted;
    }
</script>
