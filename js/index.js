const searchForm = document.querySelector('.form');
const searchBox = document.querySelector('.searchbox');

document.querySelector('#searchButton').onclick = (e) => {
    searchForm.classList.toggle('active');
    e.preventDefault();
}

$('.page-item').on('click', function () {
    // Remove the "active" class from all buttons
    $('.page-item').removeClass('active');

    // Add the "active" class to the clicked button
    $(this).addClass('active');
});
