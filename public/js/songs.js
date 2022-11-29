// // data
// let title = $('#title');
// let artist = $('#artist');
// let track_image = $('#track_image');
// let prev = $('#pre');
// let play = $('#play');
// let next = $('#next');
// let volume = $('#volume');
// let volume_show = $('#volume_show');
// let volume_icon = $('#volume_icon');
// let duration = $('#duraction_silder');

// $('.music .play').on('click', function(e){
//     // console.log($(this))
//     load_track(($(this).data('index-number')));
//     playsong();
// });

// let current_time_track = $('#remaining-time');
// let end_time_track = $('#all-time');

// let track = document.createElement('audio');

// let playing = false;
// let index = $('.music .play:first').data('index-number');

// let timer;

// // Load track

// function load_track(index){
//     current_time_track.html('00:00');
//     end_time_track.html('00:00');
//     volume_show.html(volume.val());
//     track.volume = volume.val()/100;
//     track.src = all_songs[index].path;
//     title.html(all_songs[index].name);
//     artist.html(all_songs[index].artist);
//     track_image.attr("src",all_songs[index].img);
//     //volume.val();
//     //volume_show.html(90);
//     //track.volume = 90/100;
//     track.load();
//     $('.hover').removeClass('hover');
//     ($(`[data-index="${index}"]`)).addClass('hover');

//     timer = setInterval(slider_duration, 1000);
// }
// load_track(index);

// setInterval(checktime, 1000);

// function checktime(){
//     let min = track.currentTime/60;
//     min = Math.floor(min);
//     sec = (track.currentTime%60);
//     sec = Math.floor(sec);
//     if(sec < 10) sec = '0'+sec;
//     if(min < 10) min = '0'+min;
//     current_time_track.html(min+':'+sec);

//     let alltime = track.duration;
//     min = alltime/60;
//     min = Math.floor(min);
//     sec = alltime%60;
//     sec = Math.floor(sec);
//     if(sec < 10) sec = '0'+sec;
//     if(min < 10) min = '0'+min;
//     end_time_track.html(min+':'+sec); 
// }
// // play

// function justplay(){
//     if(playing === false){
//         playsong();
//     }else{
//         pausesong();
//     }
// }

// //play song

// function playsong(){
//     track.play();
//     playing = true;
//     play.html('<i class="fa fa-pause" aria-hidden="true"></i>');
// }

// // pause song
// function pausesong(){
//     track.pause();
//     playing = false;
//     play.html('<i class="fa fa-play" aria-hidden="true"></i>');
// }

// function mute(){
//     track.volume = 0;
//     volume.val(0);
//     volume_show.html(0);
//     volume_icon.css('color', '#C3073F');
//     volume_show.css('color', '#C3073F');
// }

// function nextsong(){
//     if(index < all_songs.length -1 ){
//         index ++;
//     }else {
//         index = 0;
//     }
//     load_track(index);
//     playsong();
// }

// function prevsong(){
//     if(index == 0 ){
//         index = all_songs.length-1;
//     }else {
//         index--;
//     }
//     load_track(index);
//     playsong();
// }

// function change_volume(){
//     volume_show.html(volume.val());
//     track.volume = volume.val()/100;
//     if(volume.val() > 0){
//         volume_icon.css('color', '#fff');
//         volume_show.css('color', '#fff');
//     }else{
//         volume_icon.css('color', '#C3073F');
//         volume_show.css('color', '#C3073F');
//     }
// }

// function change_duration(){
//     slider_position = track.duration * (duration.val()/ 100);
//     track.currentTime = slider_position;
// }

// function slider_duration(){
//     let position = 0;

//     if(!isNaN(track.duration)){
//         position = track.currentTime * (100 / track.duration);
//         duration.val(position);
//     }
    
//     if(track.ended){
//         play.html('<i class="fa fa-play" aria-hidden="true"></i>');
//     }
// }

// play.on("click", justplay);
// volume_icon.on("click", mute);
// next.on("click", nextsong);
// prev.on("click", prevsong);
// volume.on("input", change_volume);
// duration.on("input", change_duration);
// duration.on("input", checktime);
