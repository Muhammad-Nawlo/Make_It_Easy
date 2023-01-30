$('#m-delete').on('shown.bs.modal', function (e) {
    let url = $(e.relatedTarget).data('url');
    let table = $(e.relatedTarget).data('table');
    $(this).find('input[type=hidden][name=url]').val(url);
    $(this).find('input[type=hidden][name=table]').val(table);
});

$("#m-delete-confirm-btn").on('click', function () {
    let deleteModal = $('#m-delete');
    let url = deleteModal.find('input[type=hidden][name=url]').val();
    let csrfToken = deleteModal.find('input[type=hidden][name=_token]').val();
    let table = deleteModal.find('input[type=hidden][name=table]').val();
    $.ajax({
        url: `${url}`, type: 'DELETE', data: {
            "_token": csrfToken,
        }, success: function () {
            deleteModal.toggle('toggle')
            $('.modal-backdrop').css('display', 'none');
            $('body').css('overflow', 'auto').css('padding-right', 0);
            $(`#${table}`).DataTable().ajax.reload();
            toastr.success('Deleted successfully')
        }, error: function (data) {
            if (data.status === 404) {
            }
        }
    });
});
