let formImageUpload = document.querySelector('.form-image-upload');

formImageUpload.addEventListener('change', function(event){
    const [file] = event.target.files;

    if(file){
            const formImagePreview = document.querySelector('.form-image-preview');
            const valuePreview = document.querySelector('.value-preview');

            const objURL = URL.createObjectURL(file);
            formImagePreview.src = objURL;

            formImagePreview.style.display = 'block';

    }
})