    document.addEventListener("DOMContentLoaded", function() {
        var audioPlayer = document.getElementById('audioPlayer');
        var seekBar = document.getElementById('seek-bar');
        var play_pause_Btn = document.getElementById('play_pause_Btn');
        var rewindBtn = document.getElementById('rewindBtn');
        var forwardBtn = document.getElementById('forwardBtn');
        var currentTimeSpan = document.getElementById('currentTime');
        var durationSpan = document.getElementById('duration');

        // Mettre à jour le temps actuel pendant la lecture
        audioPlayer.addEventListener('timeupdate', function () {
            const currentTime = audioPlayer.currentTime;
            const duration = audioPlayer.duration;
    
            seekBar.value = (currentTime / duration) * 100;
            currentTimeSpan.textContent = formatTime(currentTime);
            durationSpan.textContent = formatTime(duration);
        });
    
        seekBar.addEventListener('input', function () {
            const seekTo = audioPlayer.duration * (seekBar.value / 100);
            audio.currentTime = seekTo;
        });


        // Ajouter des contrôles
        play_pause_Btn.addEventListener('click', function() {
            

            if (audioPlayer.paused) {
                audioPlayer.play();
                play_pause_Btn.style.backgroundImage = "url(../footer/icon_lecture/pause.png)";
            } else {
                audioPlayer.pause();
                play_pause_Btn.style.backgroundImage = "url(../footer/icon_lecture/play.png)";
            }
        });

        rewindBtn.addEventListener('click', function() {
            audioPlayer.currentTime -= 10; // Reculer de 10 secondes
        });

        forwardBtn.addEventListener('click', function() {
            audioPlayer.currentTime += 10; // Avancer de 10 secondes
        });

        function formatTime(seconds) {
            const minutes = Math.floor(seconds / 60);
            const secondsLeft = Math.floor(seconds % 60);
            return `${minutes}:${secondsLeft < 10 ? '0' : ''}${secondsLeft}`;
        }
    });
   