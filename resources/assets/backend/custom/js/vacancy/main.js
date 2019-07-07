$(document).ready(function () {
    initPhotoField();
});

function initPhotoField() {
    $('#photo').imageInput({
        type: 'avatar'
    });
}
