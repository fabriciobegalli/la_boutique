function addToCart(id, url) {
    $.ajax({
        type: 'POST',
        cache: false,
        url: url,
        data: {id: id},
        success: function () {
            var $cart = $('#cartItemsNumber');
            var prev = parseInt($cart.html());
            $cart.html(prev + 1);
        },
        statusCode: {
            500: function (data) {
                alert('Error!\n' + data.responseText);
            }
        }
    });
}

function removeFromCart(id, url) {
    $.ajax({
        type: 'POST',
        cache: false,
        url: url,
        data: {id: id},
        success: function () {
            var $cart = $('#cartItemsNumber');
            var prev = parseInt($cart.html());
            if (prev <= 1) {
                $cart.html(0);
            }
            else {
                $cart.html(prev - 1);
            }
        },
        statusCode: {
            500: function (data) {
                alert('Error!\n' + data.responseText);
            }
        }
    });
}

function searchItem(id, url) {
    var key = $('#search-field').val();
    $.ajax({
        type: 'GET',
        cache: false,
        url: url,
        data: {'key': key, 'id': id},
        statusCode: {
            500: function (data) {
                alert('Error!\n' + data.responseText);
            }
        }
    });
}


function setClicks() {
    $('.addToCartButton').on('click', function (e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        addToCart(id, url);
    });
    $('.removeFromCartButton').on('click', function (e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        removeFromCart(id, url);
    })
}


function setLink(id) {
    $('#search-link').attr('href', '../catalog/search?key=' + $('#search-field').val() + '&id=' + id);
}

var shop = true;