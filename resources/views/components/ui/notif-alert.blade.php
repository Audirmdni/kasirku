@foreach(['success', 'warning', 'danger','primary'] as $status)
    @if(session($status))
        <div class="alert alert-{{$status}} alert-dismissible alert-alt solid fade show mt-3">
            <strong>{{ session($status) }}</strong>
        </div>
    @endif
@endforeach

<script>
    setTimeout(() => {
        $('.alert').hide('slow')
    }, 1000);
</script>