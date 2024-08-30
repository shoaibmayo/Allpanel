// scroll to top
const scrollbtn = document.querySelector('#scroll-to-top');
window.addEventListener('scroll', () => {
    if (window.pageYOffset > 500 ) {
        scrollbtn.style.display = "block";
    } else {
        scrollbtn.style.display = "none";
    }
});
scrollbtn.addEventListener('click', () => {
    window.scrollTo({
        top : 0,
        behavior : "smooth"
    })
});