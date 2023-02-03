<a class="btn action-btn btn--primary btn-outline-primary"


href="javascript:"
onclick="form_alert('clone-{{$item['id']}}','Are You Sure You Want To Duplicate Item?')"

title="Duplicate Item">

{{-- <i class="tio-delete-outlined"></i> --}}

<i class="fa fa-clone"></i>
</a>



<form action="{{route('admin.item.duplicate',$item['id'])}}"
method="get" id="clone-{{$item['id']}}">
