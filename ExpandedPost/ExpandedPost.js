document.addEventListener("DOMContentLoaded", function() {
    var comments = document.querySelectorAll(".Comments .Comment");
    var commentCount = comments.length;

    if (commentCount >= 5) {
        console.log("At least 5 comments");
    } else {
        console.log("Less than 5 comments");
    }
});