const button = document.querySelector('.btn-racing-submit');

button.addEventListener('click', function(e) {

    e.preventDefault();

    if (button.classList.contains('loading')) {
        return;
    }

    button.classList.add('loading');

    setTimeout(() => {
        button.closest('form').submit();
        button.classList.remove('loading');
    }, 900);

});