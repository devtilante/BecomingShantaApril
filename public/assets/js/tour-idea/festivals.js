function loadTable() {
    $('#festivals-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "festivals-list",
        columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex',
            searchable: false,
            orderable: false
        },
        {
            data: 'festivals',
            name: 'festivals'
        },
        {
            data: 'content',
            name: 'content'
        },
        {
            data: 'action',
            name: 'action',
            searchable: false,
            orderable: false
        },
        ]
    });
}
loadTable();

function addFestival(e) {
    e.preventDefault();
    let title = $('#festivalsFormTitle').val();
    let image = $('#festivalsFormImage')[0].files.length;
    let content = CKEDITOR.instances.festivalsFormContent.getData();
    if (title !== '' && title !== null && title !== undefined && image && image > 0 && content && content !== '' && content !== null && content !== undefined) {
        let formData = new FormData($('#addFestivalForm')[0]);
        formData.append('content', content);
        formData.append('image', $('#festivalsFormImage')[0].files[0]);
        $.ajax({
            url: "add-tour-menu",
            data: formData,
            type: "POST",
            processData: false,
            cache: false,
            contentType: false,
            success: function (addFestivalResponse) {
                window.location.href = 'festivals';
            },
            error: function (addFestivalErrors) {
                console.log(addFestivalErrors);
            }
        });
    } else {
        if (!title || title === '' || title === null || title === undefined) {
            $('#festivalsFormTitleError').html('Please enter title');
        }
        if (!image || image === '' || image === null || image === undefined) {
            $('#festivalsFormImageError').html('Please select image');
        }
        if (!content || content === '' || content === null || content === undefined) {
            $('#festivalsFormContentError').html('Please enter content');
        }
    }
}
function editFestival(e) {
    e.preventDefault();
    let title = $('#festivalsFormTitle').val();
    let image = $('#festivalsFormImage')[0].files.length;
    let content = CKEDITOR.instances.festivalsFormContent.getData();
    if (title !== '' && title !== null && title !== undefined && content && content !== '' && content !== null && content !== undefined) {
        let formData = new FormData($('#editFestivalsForm')[0]);
        formData.append('content', content);
        if(image && image > 0) {
            formData.append('image', $('#festivalsFormImage')[0].files[0]);
        }
        $.ajax({
            url: 'update',
            data: formData,
            type: "POST",
            processData: false,
            cache: false,
            contentType: false,
            success: function (editFestivalResponse) {
                window.location.reload();
            },
            error: function (editFestivalErrors) {
                console.log(editFestivalErrors);
            }
        });
    } else {
        if (!title || title === '' || title === null || title === undefined) {
            $('#festivalsFormTitleError').html('Please enter title');
        }
        if (!content || content === '' || content === null || content === undefined) {
            $('#festivalsFormContentError').html('Please enter content');
        }
    }
}
$('#festivalsFormTitle').on('input', function () {
    $('#festivalsFormTitleError').html('');
});
$('#festivalsFormImage').on('change', function () {
    $('#festivalsFormImageError').html('');
});
CKEDITOR.instances.festivalsFormContent.on('change', function() { 
    $('#festivalsFormContentError').html('');
});
function deleteFestivals(id, image) {
    $('#deleteFestivalsId').val(id);
    $('#deleteFestivalsImage').attr('src',image);
    $('#deleteFestivalModal').modal('show');
}