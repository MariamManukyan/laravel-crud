$('.view').on('click', function () {
    let id = $(this).closest('tr').find('input').val();
    $.ajax({
        url: '/users/view',
        method: 'POST',
        dataType: 'json',
        data: {
            id: id,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
        },
    });
});
