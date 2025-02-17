let formImageUpload = document.querySelector('.form-image-upload');

formImageUpload.addEventListener('change', function(event){
    const [file] = event.target.files;

    if(file){
        const reader = new FileReader();
        reader.onload = function(e){
            const formImagePreview = document.querySelector('.form-image-preview');
            formImagePreview.src = e.target.result;
            formImagePreview.style.display = 'block';
        }

        reader.readAsDataURL(file);
    }
})