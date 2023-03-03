@if (session("warning"))
    <div class="alert alert-warning alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        {{ __(session("warning")) }}
    </div>
@endif
@if (session("error"))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        {{ __(session("error")) }}
    </div>
@endif
@if (session("success"))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        {{ __(session("success")) }}
    </div>
@endif
