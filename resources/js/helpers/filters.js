$("#filter").keyup(function () {
    // Search text
    var text = $(this).val().toLowerCase();

    // Hide all content class element
    $(".filter").hide();

    // Search
    $(".filter .title").each(function () {
        if (
            $(this)
                .text()
                .toLowerCase()
                .indexOf("" + text + "") != -1
        ) {
            $(this).closest(".filter").show();
        }
    });
});

export const filterPosts = () => {
    const textValue = document.querySelector("#filter").val().toLowerCase();
    const allTitles = document.querySelectorAll('.filter .title')
    filterElement.hide();
    allTitles?.forEach(title => {
        const text = title.text().toLowerCase
        if(text.includes(textValue)){
            text.closest('.filter').show()
        }
    })
    
};
