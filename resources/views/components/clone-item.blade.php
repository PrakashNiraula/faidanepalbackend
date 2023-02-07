<a class="btn action-btn btn--primary btn-outline-primary"


href="javascript:"
onclick="form_alert_get('clone-{{$item['id']}}','Are You Sure You Want To Duplicate Item?',`{{ route('admin.item.duplicate',$item['id']) }}`)"

title="Duplicate Item">

{{-- <i class="tio-delete-outlined"></i> --}}

<i class="fa fa-clone"></i>
</a>


{{-- 
<form action="{{}}"
method="post" id="clone-{{$item['id']}}">

Ram shyam hari
@csrf
</form> --}}
