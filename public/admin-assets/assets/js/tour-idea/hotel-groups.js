function loadTable() {
    $('#hotel-groups-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "hotel-groups-list",
        columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex',
            searchable: false,
            orderable: false
        },
        {
            data: 'hotel_groups',
            name: 'hotel_groups'
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

function addHotelGroups(e) {
    e.preventDefault();
    let title = $('#hotelGroupsFormTitle').val();
    let image = $('#hotelGroupsFormImage')[0].files.length;
    let content = CKEDITOR.instances.hotelGroupsFormContent.getData();
    if (title !== '' && title !== null && title !== undefined && image && image > 0 && content && content !== '' && content !== null && content !== undefined) {
        let formData = new FormData($('#addHotelGroupsForm')[0]);
        formData.append('content', content);
        formData.append('image', $('#hotelGroupsFormImage')[0].files[0]);
        $.ajax({
            url: "add-tour-menu",
            data: formData,
            type: "POST",
            processData: false,
            cache: false,
            contentType: false,
            success: function (addHotelGroupsResponse) {
                window.location.href = 'hotel-groups';
            },
            error: function (addHotelGroupsErrors) {
                console.log(addHotelGroupsErrors);
            }
        });
    } else {
        if (!title || title === '' || title === null || title === undefined) {
            $('#hotelGroupsFormTitleError').html('Please enter title');
        }
        if (!image || image === '' || image === null || image === undefined) {
            $('#hotelGroupsFormImageError').html('Please select image');
        }
        if (!content || content === '' || content === null || content === undefined) {
            $('#hotelGroupsFormContentError').html('Please enter content');
        }
    }
}
function editHotelGroups(e) {
    e.preventDefault();
    let title = $('#hotelGroupsFormTitle').val();
    let image = $('#hotelGroupsFormImage')[0].files.length;
    let content = CKEDITOR.instances.hotelGroupsFormContent.getData();
    if (title !== '' && title !== null && title !== undefined && content && content !== '' && content !== null && content !== undefined) {
        let formData = new FormData($('#editHotelGroupsForm')[0]);
        formData.append('content', content);
        if(image && image > 0) {
            formData.append('image', $('#hotelGroupsFormImage')[0].files[0]);
        }
        $.ajax({
            url: 'update',
            data: formData,
            type: "POST",
            processData: false,
            cache: false,
            contentType: false,
            success: function (editHotelGroupsResponse) {
                window.location.reload();
            },
            error: function (editHotelGroupsErrors) {
                console.log(editHotelGroupsErrors);
            }
        });
    } else {
        if (!title || title === '' || title === null || title === undefined) {
            $('#hotelGroupsFormTitleError').html('Please enter title');
        }
        if (!content || content === '' || content === null || content === undefined) {
            $('#hotelGroupsFormContentError').html('Please enter content');
        }
    }
}
$('#hotelGroupsFormTitle').on('input', function () {
    $('#hotelGroupsFormTitleError').html('');
});
$('#hotelGroupsFormImage').on('change', function () {
    $('#hotelGroupsFormImageError').html('');
});
CKEDITOR.instances.hotelGroupsFormContent.on('change', function() { 
    $('#hotelGroupsFormContentError').html('');
});
function deleteHotelGroups(id, image) {
    $('#deleteHotelGroupsId').val(id);
    $('#deleteHotelGroupsImage').attr('src',image);
    $('#deleteHotelGroupsModal').modal('show');
}