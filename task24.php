<?php
/*
Plugin Name: Обратный отсчет
Description: Показывает время до 1 сентября в формате ДД:ЧЧ:ММ:СС.
Version: 1.0
*/

// Добавляем таймер на фронтенд
function oo_countdown_timer() {
    echo '
    <div id="oo-countdown-timer" style="position: fixed; left: 20px; bottom: 20px; background: #fff; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <span id="oo-timer"></span>
    </div>
    <script>
        function updateCountdown() {
            const targetDate = new Date("September 1, " + new Date().getFullYear() + " 00:00:00").getTime();
            const now = new Date().getTime();
            const distance = targetDate - now;

            if (distance < 0) {
                document.getElementById("oo-timer").innerHTML = "Время вышло!";
                return;
            }

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("oo-timer").innerHTML = days + "д " + hours + "ч " + minutes + "м " + seconds + "с ";
        }

        setInterval(updateCountdown, 1000);
        updateCountdown();
    </script>
    ';
}
add_action('wp_footer', 'oo_countdown_timer');