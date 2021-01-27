dropzoneInit(
    '#imageDropzone',
    'portal/ajax/upload/housing-image',
    function (file, response) {
        $('#locationImages').append(
            `<input type="hidden" name="images[]" value="${response.image_url}"/>`
            );
    },
    true
    );

$('#get-lat-lng').on('click', function () {
    $('input[name=latitude]').val('');
    $('input[name=longitude]').val('');

    var postal_code = $('input[name=postal_code]').val();
    $.get(
        `https://developers.onemap.sg/commonapi/search?searchVal=${postal_code}&returnGeom=Y&getAddrDetails=Y&pageNum=1`,
        function (data, status) {
            if (data.results.length > 0) {
                $('input[name=latitude]').val(data.results[0].LATITUDE);
                $('input[name=longitude]').val(data.results[0].LONGITUDE);
            }
        }
    );
});

$('input[name=postal_code]').on('keyup', function () {
    if ($(this).val().length > 0) {
        $('#get-lat-lng').attr('disabled', false);
    } else {
        $('#get-lat-lng').attr('disabled', true);
    }
});

tinymce.init({
    selector: '#description',
    height: "400",
    plugins: ['advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table paste code'],
    toolbar: 'undo redo | formatselect | bold italic backcolor | ' +
        'alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
});

$(document).ready(function () {
    sortableInit("#sortable", "portal/ajax/housing/reorder-images")
});