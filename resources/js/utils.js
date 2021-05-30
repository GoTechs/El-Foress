export function ready(callback) {
    if (!callback) return;
    if (document.readyState !== "loading") {
        return callback();
    }
    document.addEventListener("DomContentLoaded", callback());
}
