<div class="dropdown">
    <i class="material-icons action" data-bs-toggle="dropdown" aria-expanded="false">more_horiz</i>
    <ul class="dropdown-menu" aria-labelledby="treasure-action">
        <li><a class="dropdown-item text-primary"
               href="{{$showRoute}}">View</a>
        </li>
        <li><a class="dropdown-item text-success"
               href="{{$editRoute}}">Edit</a>
        </li>
        <li><a class="dropdown-item text-danger btn btn-link"
               data-bs-toggle="modal" data-bs-target="#m-delete"
               data-id="{{$model->id}}"
               data-url="{{$destroyRoute}}"
               data-table="{{$table}}"
            >Delete</a></li>
    </ul>
</div>

