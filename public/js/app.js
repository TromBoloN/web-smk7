document.addEventListener("DOMContentLoaded", function () {
    const loadMoreBtn = document.querySelector(".teachers-load-more");
    const rowWrapper = document.querySelector(".row-wrapper");
    const rowItems = document.querySelectorAll(".row .teacher-card");
    const rowHeight = 250; 
    const itemsPerRow = 4; 
    let visibleRows = 2;

    
    rowWrapper.style.height = `${visibleRows * rowHeight}px`;

    
    rowItems.forEach((item, index) => {
        if (index < visibleRows * itemsPerRow) {
            item.style.display = "block";
        } else {
            item.style.display = "none";
        }
    });

    loadMoreBtn.addEventListener("click", function (e) {
        e.preventDefault();

        visibleRows += 1;
        rowWrapper.style.height = `${visibleRows * rowHeight + 10}px`;

        rowItems.forEach((item, index) => {
            if (index < visibleRows * itemsPerRow) {
                item.style.display = "block";
            }
        });

      
        if (visibleRows * itemsPerRow >= rowItems.length) {
            loadMoreBtn.style.display = "none";
        }
    });
});
