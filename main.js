var shelf = [];
$(document).on('click', '.shelf', function () {
    shelf.push($(this).text());
    $(this).css('background','red');
    $(this).css('color','white');
})
$(document).on('click', '#depot', function () {
    // console.log(shelf)
    $.ajax({
        url: 'fetch_route.php',
        type: 'post',

        data: {
            shelf: shelf
        },
        success: function (data) {

            $('#routing_result').html(data)
            shelf = [];

        }
    })
})