<?php

?>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="{{ URL::asset('css/musicPlayer.css') }}">

<nav class="musicPlayer_container fixed-bottom" id='mediaPlayerContainer' style="display: none;">
    <div class="slidecontainer">
        <input onChange='ProgressChanged()' type="range" min="1" max="100" value="0" step="0.0001" class="slider" id="progress_bar">
    </div>
    <div class="navbar bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="music_cover_box">
                    <img class="music_cover" src="https://cdns-images.dzcdn.net/images/cover/aac47589aff99a34cacc267b793b20c8/500x500.jpg">
                </div>

                <div class="bg-red flex-column align-items-center">
                    <div>
                        <span id="music_name" class="music_name align-middle">Selecione uma música para tocar</span>
                    </div>
                    <div>
                        <span id="composer_name" class="composer_name"></span>
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
                    <span id='totalTime' class="margin-5 grayColor">00:00</span>
                </div>
                <div>
                    <a id="volumeUp" onclick="muteVolume(); return false;" style="display: inline"><i class="fas fa-volume-up mediaPlayer_icons"></i></a>
                    <a id="volumeMute" onclick="upVolume(); return false;" style="display: none;"><i class="fas fa-volume-mute mediaPlayer_icons"></i></a>
                    <a><i class="fas fa-download mediaPlayer_icons"></i></a>
                </div>
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

    const abortController = new AbortController();

    function onYouTubePlayerAPIReady() {
        player = new YT.Player('ytplayer', {
            height: '0',
            width: '0',
            events: {
                'onReady': onPlayerReady
            }
        });
        player.setPlaybackQuality('small');
    }

    function youtube_parser(url) {
        var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#&?]*).*/;
        var match = url.match(regExp);
        return (match && match[7].length == 11) ? match[7] : false;
    }

    function changeMusic(u, music, composer) {
        MediaPlayerStarted();
        document.getElementById("music_name").innerHTML = music;
        document.getElementById("composer_name").innerHTML = composer;

        var video_id = youtube_parser(u);
        player.loadVideoById(video_id, 0, "small")
        playVideo();
    }

    function onPlayerReady() {
        document.getElementById('mediaPlayerContainer').style.display = 'inline';
    }

    function ProgressChanged() {
        var val = document.getElementById('progress_bar').value;
        var current = val / 100 * player.getDuration();
        player.seekTo(Math.round(current));
    }

    window.setInterval(function() {
        if (player.getPlayerState() == 1) {
            //Aqui controla o tempo da musica mostrado na tela
            var currentTimeInt = Math.round(player.getCurrentTime());
            if (!player) return;
            var formatted = FormateSeconds(currentTimeInt);
            document.getElementById("currentTime").innerHTML = formatted;

            //Aqui mostra o tempo total da musica
            var totalDuration = FormateSeconds(Math.round(player.getDuration()));
            document.getElementById("totalTime").innerHTML = totalDuration;

            //Aqui controla o slider que mostra que parte ta na musica
            var currentTimeFloat = player.getCurrentTime();
            var totalDuration = player.getDuration();
            percent = currentTimeFloat * 100 / totalDuration;
            document.getElementById('progress_bar').value = percent;
        }
    }, 10);

    function delay(time) {
        return new Promise(resolve => setTimeout(resolve, time));
    }

    async function MediaPlayerStarted() {
        var mediaPlayerContainer = document.getElementById('mediaPlayerContainer');
        mediaPlayerContainer.classList ? mediaPlayerContainer.classList.add('musicPlayer_container_showing') : mediaPlayerContainer.className += ' musicPlayer_container_showing';
        await delay(3000);
        mediaPlayerContainer.classList ? mediaPlayerContainer.classList.remove('musicPlayer_container_showing') : mediaPlayerContainer.className -= ' musicPlayer_container_showing';
    }


    function onStateChange() {
        var totalDuration = FormateSeconds(player.getDuration());
        document.getElementById("totalTime").innerHTML = totalDuration;
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

    function FormateSeconds(number) {
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
