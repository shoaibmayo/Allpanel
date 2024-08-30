<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('game_videos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_id')->constrained()->onDelete('cascade');
            $table->string('round_id');
            $table->text('video_description')->nullable();
            $table->string('video');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_videos');
    }
};


// ////////////
// <!DOCTYPE html>
// <html lang="en">
// <head>
//     <meta charset="UTF-8">
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">
//     <style>
//         body {
//             font-family: Arial, sans-serif;
//             display: flex;
//             flex-direction: column;
//             align-items: center;
//             justify-content: center;
//             height: 100vh;
//             margin: 0;
//             background-color: #f0f0f0;
//         }
//         .video-container {
//             position: relative;
//             width: 730px;
//             height: 530px;
//             margin-bottom: 20px;
//             background: black;
//         }
//         video {
//             width: 100%;
//             height: 100%;
//             position: absolute;
//             background: black;
//             transition: opacity 0.5s;
//         }
//         .hidden {
//             opacity: 0;
//             pointer-events: none;
//         }
//         .visible {
//             opacity: 1;
//             pointer-events: all;
//         }
//         button {
//             margin: 5px;
//             padding: 10px 20px;
//             font-size: 16px;
//             cursor: pointer;
//         }
//         .custom-controls {
//             display: flex;
//             justify-content: center;
//         }
//     </style>
// </head>
// <body>
//     <div class="video-container">
//         <video id="videoPlayer1" class="visible" autoplay muted>
//             <source src="http://localhost/casino/public/vedio/22.06.2024_03.17.38_REC.mp4" type="video/mp4">
//             Your browser does not support the video tag.
//         </video>
//         <video id="videoPlayer2" class="hidden" autoplay muted>
//             <source src="" type="video/mp4">
//             Your browser does not support the video tag.
//         </video>
//     </div>

//     <div class="custom-controls">
//         <button onclick="changeVideo('http://localhost/casino/public/vedio/22.06.2024_03.17.38_REC.mp4')">Video 1</button>
//         <button onclick="changeVideo('http://localhost/casino/public/vedio/22.06.2024_03.12.26_REC.mp4')">Video 2</button>
//         <button onclick="changeVideo('http://localhost/casino/public/vedio/22.06.2024_03.14.53_REC.mp4')">Video 3</button>
//     </div>

//     <script>
//         let currentVideo = document.getElementById('videoPlayer1');
//         let nextVideo = document.getElementById('videoPlayer2');
//         let isChangingVideo = false;

//         async function changeVideo(newSource) {
//             if (isChangingVideo) {
//                 return;
//             }
//             isChangingVideo = true;

//             // Pause the current video immediately
//             currentVideo.pause();

//             // Set the new source for the next video
//             nextVideo.querySelector('source').src = newSource;
//             nextVideo.load();

//             nextVideo.oncanplay = () => {
//                 // Wait for 2 seconds to simulate loading delay
//                 setTimeout(() => {
//                     // Play the next video
//                     nextVideo.play();

//                     // Swap visibility
//                     currentVideo.classList.add('hidden');
//                     currentVideo.classList.remove('visible');
//                     nextVideo.classList.add('visible');
//                     nextVideo.classList.remove('hidden');

//                     // Swap the video elements
//                     let temp = currentVideo;
//                     currentVideo = nextVideo;
//                     nextVideo = temp;

//                     isChangingVideo = false;
//                 }, 2000);
//             };
//         }
//     </script>
// </body>
// </html>