(function sidebarBar() {
    let arrow = $(".arrow");
    for (let i = 0; i < arrow.length; i++) {
        arrow[i].addEventListener("click", (e) => {
            let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
            arrowParent.classList.toggle("showMenu");
        });
    }

    $("#nav-bar-icon").on("click", () => {
        $(".sidebar").toggleClass("close");
        $('#app').toggleClass('app-without-sidebar')
            .toggleClass('app-with-sidebar');
        $('nav.fixed-top').toggleClass('with-sidebar')
            .toggleClass('without-sidebar');
    });
})();
