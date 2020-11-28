function ActionDelete(e) {
    e.preventDefault();
    let urlRequest = $(this).data('url');
    let that = $(this);
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: urlRequest,
                success: function(data) {
                    if (data.code == 200) {
                        that.parent().parent().remove();
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                },
                error: function() {

                }
            });

        }
    })
}
$(function() {
    $(document).on('click', '.action_delete', ActionDelete);
});

$(function() {
    $(document).on('click', '.chuc_mung', function(y) {
        y.preventDefault();
        Swal.fire({
            title: 'chúc mừng bạn đã update thành công!',
            width: 600,
            padding: '3em',
            background: '#fff url(/images/trees.png)',
            backdrop: `
              rgba(0,0,123,0.4)
              url("/images/nyan-cat.gif")
              left top
              no-repeat
            `
        })
    });
});
