$('#edit').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)

    var categoryId = button.data('category-id')
    var categoryName = button.data('category-name')

    var sizeId = button.data('size-id')
    var sizeName = button.data('size-name')

    var productId = button.data('product-id')
    var productName = button.data('product-name')
    var productPrice = button.data('product-price')

    var modal = $(this)
    modal.find('.modal-body #category-id').val(categoryId)
    modal.find('.modal-body #category-name').val(categoryName)

    modal.find('.modal-body #size-id').val(sizeId)
    modal.find('.modal-body #size-name').val(sizeName)

    modal.find('.modal-body #product-id').val(productId)
    modal.find('.modal-body #product-name').val(productName)
    modal.find('.modal-body #product-price').val(productPrice)
})

$('#delete').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)

    var categoryId = button.data('category-id')
    var categoryName = button.data('category-name')

    var sizeId = button.data('size-id')
    var sizeName = button.data('size-name')

    var productId = button.data('product-id')
    var productName = button.data('product-name')
    var productPrice = button.data('product-price')

    var modal = $(this)
    modal.find('.modal-body #category-id').val(categoryId)
    modal.find('.modal-body #category-name').val(categoryName)

    modal.find('.modal-body #size-id').val(sizeId)
    modal.find('.modal-body #size-name').val(sizeName)

    modal.find('.modal-body #product-id').val(productId)
    modal.find('.modal-body #product-name').val(productName)
    modal.find('.modal-body #product-price').val(productPrice)
})
