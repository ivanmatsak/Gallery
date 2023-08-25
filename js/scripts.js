$(document).ready(function() {
    $(".like").bind("click", function(event) {
        var id = this.id;
      $.ajax({
        url: "like.php",
        type: "POST",
        data: ("id=" + id),
        dataType: "text",
        success: function(result) {
                $("#"+id).text(Number($("#"+id).text()) + 1);
        }
      });
    });
  });
  $(document).ready(function() {
    $(".dislike").bind("click", function(event) {

        var id = this.id;   // Getting Button id
        var split_id = id.split("_");

        var text = split_id[0];
        var postid = split_id[1];  // postid
      $.ajax({
        url: "dislike.php",
        type: "POST",
        data: ("id=" + postid),
        dataType: "text",
        success: function(result) {
                $("#"+id).text(Number($("#"+id).text()) + 1);
        }
      });
    });
  });
  $(document).ready(function(){
    $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });
});
var btn1 = document.querySelector('#green');
var btn2 = document.querySelector('#red');

btn1.addEventListener('click', function() {

if (btn2.classList.contains('red')) {
btn2.classList.remove('red');
} 
this.classList.toggle('green');

});

btn2.addEventListener('click', function() {

if (btn1.classList.contains('green')) {
btn1.classList.remove('green');
} 
this.classList.toggle('red');

});