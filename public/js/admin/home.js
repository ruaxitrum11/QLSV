function showFormAdd() {
    $('.form-add').toggle(1000);
}
$('.form-add').hide();

$(document).on("click", ".delete_account", function () {
    $name = $(this).data('name');
    // console.log($name);
    $('.name_account').html($name);
});
