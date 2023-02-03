$('#check_all').change(function(){
    $('.checkitem').prop('checked',$(this).prop('checked'));
});

$('.checkitem').change(function(){

    if($(this).prop("checked")==false){
        $('#checkall').prop('checked',false);
    }

    if($('.checkitem:checked').length == $('.checkitem').length){
        $('#checkall').prop('checked',true);
    }
});
