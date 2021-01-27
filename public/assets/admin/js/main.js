$(document).ready(function () {
    tinymce.init({
    selector: '#description',
    height : "400",
    plugins : ['advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table paste code'],
    toolbar: 'undo redo | formatselect | bold italic backcolor | ' +
        'alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
    });
    tinymce.init({
    selector: '#short_description',
    height : "400",
    plugins : ['advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table paste code'],
    toolbar: 'undo redo | formatselect | bold italic backcolor | ' +
        'alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
    });

    // select2
    $('.customSelect').select2();

    // dashboard scripts
    $( "#dateFrom" ).datepicker();
    $( "#dateTo" ).datepicker();
    function getRandomColor() {
        var letters = '0123456789ABCDEF'.split('');
        var color = '#';
        for (var i = 0; i < 6; i++ ) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }

    $('.remove-image').on('click', function () {
        var id = $(this).data('id');
        var $remove_images_ids = $("#removeImagesIds");
        if ($remove_images_ids.val().length > 0) {
            var image_ids = $remove_images_ids.val().split(",");
        } else {
            var image_ids = [];
        }
        image_ids.push($(this).data('id'));
        $remove_images_ids.val(image_ids.join(","));
        $(`.img-wrap[data-id="${id}"]`).remove();
    });

});

$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

function dropzoneInit(id, url_upload, successCallback, multiple = false) {
  var dropzoneConfig = {
      url: `${base_url}/${url_upload}`,
      paramName: "image",
      autoDiscover: false,
      headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
      },
      init: function() {
          this.on("error", function(file, msg) {
              console.log(msg);
          });
      },
      success: successCallback
  };

  if (!multiple) {
      dropzoneConfig.maxFiles = 1;
  }

  var imageDropzone = new Dropzone(id, dropzoneConfig);
}

function addZero(i) {
    if (i < 10) {
      i = "0" + i;
    }
    return i;
}

function dateFormat(date_input) {
    return moment(date_input).format('YYYY-MM-DD hh:mm:ss'); 
}

function sortableInit(selector, url)
{
    $(selector).sortable({
        revert: 100,
        placeholder: 'placeholder',
        update: function(event,ui) {
            var sortable_data = $(selector).sortable('serialize'); 

            $.ajax({ 
                data: sortable_data,
                type: 'POST',
                url: `${base_url}/${url}`, // save.php - file with database update
            });  
         }
        });
    $(selector).disableSelection();
}

function setDataTableRowOrder(table, url) {
    table.on('row-reorder', function (e, diff, edit) {
        for (var i = 0, ien = diff.length; i < ien; i++) {
          var rowData = table.row(diff[i].node).data();
          var current_data = $(".row_order-" + rowData.id);
          current_data.val(diff[i].newData);
        }

        $.ajax({
            type: "POST",
            url: `${base_url}/${url}`,
            data: $("[name^=row_order]").serialize(),
            dataType: "json",
            success: function (data) { table.draw() }
          });

    });
}