document.addEventListener('click', function(e) {

    // EDITAR
    if (e.target.closest('.btn-upload')) {

        const upload = e.target.closest('.image-upload');

        upload.querySelector('input').click();
    }

    // REMOVER
    if (e.target.closest('.btn-remove')) {

        const upload = e.target.closest('.image-upload');

        upload.querySelector('input').value = '';

        upload.querySelector('.image-upload-preview').innerHTML = `
            <div class="image-upload-placeholder btn-upload">
                <i class="fas fa-cloud-upload-alt"></i>
                <span>Clique ou arraste uma imagem</span>
            </div>
        `;
    }

});


document.addEventListener('change', function(e) {

    if (!e.target.classList.contains('image-upload-input')) {
        return;
    }

    const input = e.target;

    if (!input.files[0]) return;

    const reader = new FileReader();

    reader.onload = function(ev) {

        const upload = input.closest('.image-upload');

        upload.querySelector('.image-upload-preview').innerHTML = `
            <img src="${ev.target.result}" alt="">

            <div class="image-upload-actions">
                <button type="button" class="btn-edit btn-upload">
                    <i class="fas fa-pen"></i>
                </button>

                <button type="button" class="btn-remove">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        `;
    };

    reader.readAsDataURL(input.files[0]);
});