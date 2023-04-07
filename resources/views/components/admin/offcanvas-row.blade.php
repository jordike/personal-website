@props(["id", "item", "name"])

<div class="mb-3">
    <div class="admin-offcanvas-row">
        <div class="row">
            <div class="col">
                <div class="d-flex">
                    <span class="align-middle">{{ $name }}</span>
                </div>
            </div>
            <div class="col-2">
                <a class="btn btn-secondary rounded-pill" href="{{ route("$id.edit", $item) }}">
                    <i class="fa-solid fa-pen"></i>
                </a>
            </div>
            <div class="col-2">
                <form method="POST" action="{{ route("$id.destroy", $item) }}">
                    @method("DELETE")
                    @csrf
                    <button class="btn btn-danger rounded-pill" type="submit">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
