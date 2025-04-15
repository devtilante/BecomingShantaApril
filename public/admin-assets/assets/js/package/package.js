function loadTable() {
    $('#package-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "package-list",
        columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex',
            searchable: false,
            orderable: false
        },
        {
            data: 'package',
            name: 'package'
        },
        {
            data: 'place',
            name: 'place'
        },
        {
            data: 'price',
            name: 'price'
        },
        {
            data: 'day',
            name: 'day'
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
function addPackage(e) {
    e.preventDefault();
    let title = $('#packageFormTitle').val();
    let price = $('#packageFormPrice').val();
    let days = $('#packageFormDays').val();
    let place = $('#packageFormPlace').val();
    let image = $('#packageFormImage')[0].files.length;
    let content = CKEDITOR.instances.packageFormContent.getData();
    let itineraryTitleInvalid = [];
    let itineraryContentInvalid = [];
    for (var i in CKEDITOR.instances) {
        (function(i){
            if(CKEDITOR.instances[i].name != 'packageFormContent' && CKEDITOR.instances[i].getData().length === 0) {
                itineraryContentInvalid.push(CKEDITOR.instances[i].name);
            }else {
                $('#'+CKEDITOR.instances[i].name).parent().find('small:first').html('');
            }
        })(i);
    }
    if (title !== '' && title !== null && title !== undefined && image && image > 0 && price && price !== '' && price !== null && price !== undefined && days && days !== '' && days !== null && days !== undefined && place && place !== '' && place !== null && place !== undefined && content && content !== '' && content !== null && content !== undefined && itineraryContentInvalid && itineraryContentInvalid.length === 0) {
        let formData = new FormData($('#addPackageForm')[0]);
        formData.append('content', content);
        formData.append('image', $('#packageFormImage')[0].files[0]);
        $.ajax({
            url: "store",
            data: formData,
            type: "POST",
            processData: false,
            cache: false,
            contentType: false,
            success: function (addPackageResponse) {
                if(addPackageResponse && addPackageResponse.route) {
                    window.location.href = addPackageResponse.route;
                }
            },
            error: function (addPackageErrors) {
                console.log(addPackageErrors);
            }
        });
    } else {
        if (!title || title === '' || title === null || title === undefined) {
            $('#packageFormTitleError').html('Please enter title');
        }
        if (!price || price === '' || price === null || price === undefined) {
            $('#packageFormPriceError').html('Please enter price');
        }
        if (!days || days === '' || days === null || days === undefined) {
            $('#packageFormDaysError').html('Please enter days');
        }
        if (!place || place === '' || place === null || place === undefined) {
            $('#packageFormPlaceError').html('Please enter place');
        }
        if (!image || image === '' || image === null || image === undefined) {
            $('#packageFormImageError').html('Please select image');
        }
        if (!content || content === '' || content === null || content === undefined) {
            $('#packageFormContentError').html('Please enter content');
        }
        for (let index = 0; index < itineraryContentInvalid.length; index++) {
            $('#'+itineraryContentInvalid[index]).parent().find('small:first').html('Please enter itinerary content');
        }
    }
}
function addItinerary(index) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "add-itinerary",
        type: "POST",
        data: {
            index: index
        },
        success: function(addItineraryResponse) {
            $('#itinerary_'+(index -1)).after(addItineraryResponse);
        },
        error: function(addItineraryErrors) {
            console.log(addItineraryErrors);
        }
    });
}
function removeItinerary(index) {
    $('#itinerary_'+index).remove();
}
$('#packageFormTitle').on('input', function () {
    $('#packageFormTitleError').html('');
});
$('#packageFormPrice').on('input', function () {
    $('#packageFormPriceError').html('');
});
$('#packageFormDays').on('input', function () {
    $('#packageFormDaysError').html('');
});
$('#packageFormPlace').on('input', function () {
    $('#packageFormPlaceError').html('');
});
$('#packageFormImage').on('change', function () {
    $('#packageFormImageError').html('');
});
CKEDITOR.instances.packageFormContent.on('change', function() { 
    $('#packageFormContentError').html('');
});