import {
    animateScroll,
    backToTop,
    filterPosts,
    initAutoCompleteWilaya,
    initCategory,
    initOwlDemo
} from "./helpers";
import { ready } from "./utils";

document.querySelector(".back-to-top").addEventListener("click", backToTop());
document.querySelector("#filter").addEventListener("keyup", filterPosts());
document.addEventListener("scroll", animateScroll());

function executeAllScripts() {
    initSelectedPicker();
    initCounterApp();
    initScroll();
    initDimentionImage();
    initCategory();
    initAutoCompleteWilaya();
    initOwlDemo();
    fadeOutLoader();
}

export function initApp() {
    ready(executeAllScripts);
}

const fadeOutLoader = () => {
    const loader = document.querySelector("#loader");
    window.load(loader?.fadeOut());
};

const initSelectedPicker = () => {
    const selectedPickerElement = document.querySelector(".selectpicker");

    selectedPickerElement?.selectpicker({ style: "btn-select", size: 4 });
};

const initCounterApp = () => {
    const counterElement = document.querySelector(".counter");
    counterElement?.counterUp({ delay: 1, time: 800 });
};

const initScroll = () => {
    let wow = new WOW();
    wow.init();
};

const initDimentionImage = () => {
    var imgHeight = document.querySelector(
        "#principal-image>img"
    )?.naturalHeight;
    var imgWidth = document.querySelector("#principal-image>img")?.naturalWidth;
    if (imgWidth && imgWidth < 600) {
        $("#details-pricipale-img").css("width", "300");
    } else {
        $("#details-pricipale-img").css("width", "100%");
    }
};
