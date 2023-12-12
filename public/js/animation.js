    //ANIMATION
function reveal(){  //function to show animation on screen when u scroll
    let reveals = document.querySelectorAll(".reveal");
    for (let i = 0; i < reveals.length; i++) {
        let windowHeight = window.innerHeight; //give the height of the viewport.
        let elementTop = reveals[i].getBoundingClientRect().top; //gives the distance from the top of the viewport
        let elementVisible = 100; // height at which the element should be revealed to the user
        if (elementTop < windowHeight - elementVisible) {
            reveals[i].classList.add("active");
          } 
        // console.log(windowHeight);
        // console.log(elementTop);
        //   else {
        //     reveals[i].classList.remove("ac tive");
        //   }
    }
}
window.addEventListener("scroll", reveal);
// To check the scroll position on page load
reveal();

