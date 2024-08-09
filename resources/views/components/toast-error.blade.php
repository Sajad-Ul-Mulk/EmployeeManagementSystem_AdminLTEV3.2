@if (session('error'))
<div id="toastsContainerTopRight" class="toasts-top-right fixed">
    <div class="toast bg-danger fade show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="mr-auto">Try Again</strong>
            <small>Subtitle</small>
            <button data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="toast-body">
            {{ session('error') }}
        </div>
    </div>
</div>
@endif
