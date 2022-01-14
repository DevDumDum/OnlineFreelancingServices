const imgDiv = document.querySelector('.cover-pic-div');
const img = document.querySelector('#photoCover');
const file  = document.querySelector('#file');
const uploadBtn = document.querySelector('#uploadBtn');


imgDiv.addEventListener('mouseenter', function () {
    uploadBtn.style.display = "block";
});

imgDiv.addEventListener('mouseleave', function() {
    uploadBtn.style.display = "none";
});

file.addEventListener('change', function(){
    const choosedFile = this.files[0];

    if (choosedFile) {
        const reader = new FileReader();

        reader.addEventListener('load', function(){
            img.setAttribute('src', reader.result);
        });

        reader.readAsDataURL(choosedFile);
    }
});


const imgDivProfile = document.querySelector('.profile-pic-div');
const imgProfile = document.querySelector('#photoProfile');
const fileProfile  = document.querySelector('#fileProfile');
const uploadBtnProfile = document.querySelector('#uploadBtnProfile');


imgDivProfile.addEventListener('mouseenter', function () {
    uploadBtnProfile.style.display = "block";
});

imgDivProfile.addEventListener('mouseleave', function() {
    uploadBtnProfile.style.display = "none";
});

fileProfile.addEventListener('change', function(){
    const choosedFileProfile = this.files[0];

    if (choosedFileProfile) {
        const readerProfile = new FileReader();

        readerProfile.addEventListener('load', function(){
            imgProfile.setAttribute('src', readerProfile.result);
        });

        readerProfile.readAsDataURL(choosedFileProfile);
    }
});
