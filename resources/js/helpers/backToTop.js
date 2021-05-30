
export const backToTop = (event) => {
    const duration = 500;
    event.preventDefault();
    const mainElement = document.querySelector(".html, .body");
    mainElement?.animate({ scrollTop: 0, duration });
    return false;
};

export const animateScroll = () => {
    const backToTopElement = document.querySelector(".back-to-top");
    const offset = 200;

    if (window.scrollTop() > offset) {
        backToTopElement.fadeIn(400);
        return;
    }
    backToTopElement.fadeOut(400);
};
