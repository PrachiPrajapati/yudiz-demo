/* Parallax and Rellax Js */
var scene = document.getElementById('object-group');
var parallax = new Parallax(scene);
var rellax = new Rellax('.rellax', {
    // center: true
    callback: function(position) {
        //console.log(position);
    }
});