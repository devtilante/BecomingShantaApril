function loadTable() {
    $('#destination-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "destination-list",
        columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex',
            searchable: false,
            orderable: false
        },
        {
            data: 'destination',
            name: 'destination'
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

function addDestination(e) {
    e.preventDefault();
    let title = $('#destinationFormTitle').val();
    let image = $('#destinationFormImage')[0].files.length;
    let content = CKEDITOR.instances.destinationFormContent.getData();
    if (title !== '' && title !== null && title !== undefined && image && image > 0 && content && content !== '' && content !== null && content !== undefined) {
        let formData = new FormData($('#addDestinationForm')[0]);
        formData.append('content', content);
        formData.append('image', $('#destinationFormImage')[0].files[0]);
        $.ajax({
            url: "add-tour-menu",
            data: formData,
            type: "POST",
            processData: false,
            cache: false,
            contentType: false,
            success: function (addDestinationResponse) {
                window.location.href = 'destination';
            },
            error: function (addDestinationErrors) {
                console.log(addDestinationErrors);
            }
        });
    } else {
        if (!title || title === '' || title === null || title === undefined) {
            $('#destinationFormTitleError').html('Please enter title');
        }
        if (!image || image === '' || image === null || image === undefined) {
            $('#destinationFormImageError').html('Please select image');
        }
        if (!content || content === '' || content === null || content === undefined) {
            $('#destinationFormContentError').html('Please enter content');
        }
    }
}
function editDestination(e, route) {
    e.preventDefault();
    let title = $('#destinationFormTitle').val();
    let image = $('#destinationFormImage')[0].files.length;
    let content = CKEDITOR.instances.destinationFormContent.getData();
    if (title !== '' && title !== null && title !== undefined && content && content !== '' && content !== null && content !== undefined) {
        let formData = new FormData($('#editDestinationForm')[0]);
        formData.append('content', content);
        if(image && image > 0) {
            formData.append('image', $('#destinationFormImage')[0].files[0]);
        }
        $.ajax({
            url: 'update',
            data: formData,
            type: "POST",
            processData: false,
            cache: false,
            contentType: false,
            success: function (editDestinationResponse) {
                window.location.reload();
            },
            error: function (editDestinationErrors) {
                console.log(editDestinationErrors);
            }
        });
    } else {
        if (!title || title === '' || title === null || title === undefined) {
            $('#destinationFormTitleError').html('Please enter title');
        }
        if (!content || content === '' || content === null || content === undefined) {
            $('#destinationFormContentError').html('Please enter content');
        }
    }
}
$('#destinationFormTitle').on('input', function () {
    $('#destinationFormTitleError').html('');
});
$('#destinationFormImage').on('change', function () {
    $('#destinationFormImageError').html('');
});
CKEDITOR.instances.destinationFormContent.on('change', function() { 
    $('#destinationFormContentError').html('');
});
function deleteDestination(id, image) {
    $('#deleteDestinationId').val(id);
    $('#deleteDestinationImage').attr('src',image);
    $('#deleteDestinationModal').modal('show');
}