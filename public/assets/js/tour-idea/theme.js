function loadTable() {
    $('#theme-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "theme-list",
        columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex',
            searchable: false,
            orderable: false
        },
        {
            data: 'theme',
            name: 'theme'
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

function addTheme(e) {
    e.preventDefault();
    let title = $('#themeFormTitle').val();
    let image = $('#themeFormImage')[0].files.length;
    let content = CKEDITOR.instances.themeFormContent.getData();
    if (title !== '' && title !== null && title !== undefined && image && image > 0 && content && content !== '' && content !== null && content !== undefined) {
        let formData = new FormData($('#addThemeForm')[0]);
        formData.append('content', content);
        formData.append('image', $('#themeFormImage')[0].files[0]);
        $.ajax({
            url: "add-tour-menu",
            data: formData,
            type: "POST",
            processData: false,
            cache: false,
            contentType: false,
            success: function (addThemeResponse) {
                window.location.href = 'theme';
            },
            error: function (addThemeErrors) {
                console.log(addThemeErrors);
            }
        });
    } else {
        if (!title || title === '' || title === null || title === undefined) {
            $('#themeFormTitleError').html('Please enter title');
        }
        if (!image || image === '' || image === null || image === undefined) {
            $('#themeFormImageError').html('Please select image');
        }
        if (!content || content === '' || content === null || content === undefined) {
            $('#themeFormContentError').html('Please enter content');
        }
    }
}
function editTheme(e) {
    e.preventDefault();
    let title = $('#themeFormTitle').val();
    let image = $('#themeFormImage')[0].files.length;
    let content = CKEDITOR.instances.themeFormContent.getData();
    if (title !== '' && title !== null && title !== undefined && content && content !== '' && content !== null && content !== undefined) {
        let formData = new FormData($('#editThemeForm')[0]);
        formData.append('content', content);
        if(image && image > 0) {
            formData.append('image', $('#themeFormImage')[0].files[0]);
        }
        $.ajax({
            url: 'update',
            data: formData,
            type: "POST",
            processData: false,
            cache: false,
            contentType: false,
            success: function (editThemeResponse) {
                window.location.reload();
            },
            error: function (editThemeErrors) {
                console.log(editThemeErrors);
            }
        });
    } else {
        if (!title || title === '' || title === null || title === undefined) {
            $('#themeFormTitleError').html('Please enter title');
        }
        if (!content || content === '' || content === null || content === undefined) {
            $('#themeFormContentError').html('Please enter content');
        }
    }
}
$('#themeFormTitle').on('input', function () {
    $('#themeFormTitleError').html('');
});
$('#themeFormImage').on('change', function () {
    $('#themeFormImageError').html('');
});
CKEDITOR.instances.themeFormContent.on('change', function() { 
    $('#themeFormContentError').html('');
});
function deleteTheme(id, image) {
    $('#deleteThemeId').val(id);
    $('#deleteThemeImage').attr('src',image);
    $('#deleteThemeModal').modal('show');
}