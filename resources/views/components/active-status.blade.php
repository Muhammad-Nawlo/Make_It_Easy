<div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select class="form-control" id="status" name="status" required>
        @foreach($activeStatus as $key=>$status)
            <option value="{{$key}}"
            @if($type === 'create')
                {{old('status') == $key?'selected':''}}
                @elseif($type === 'update' && $model !== null)
                {{$model->status->value == $key?'selected':''}}
                @endif
            >{{$status}}</option>
        @endforeach
    </select>
    <x-input-error name="status"/>
</div>
