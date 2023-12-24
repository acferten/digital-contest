@php
    use App\Helpers\ImageHelper;
@endphp
<div class="{{$viewClass['form-group']}} {!! !$errors->has($errorKey) ? '' : 'has-error' !!}">

    <label for="{{$id}}" class="{{$viewClass['label']}} control-label">{{$label}}</label>

    <div class="{{$viewClass['field']}}">

        @include('admin::form.error')

        @if ($value)
            <img id="{{$id}}_preview" src="/{{str_ireplace(env('APP_URL').'/', '', config('filesystems.disks.'.config('admin.upload.disk').'.url'))}}{{ImageHelper::getThumbnailImage($help['model'], $value, 'medium')}}">
        @endif
        <input type="file" class="{{$class}}" name="{{$id}}" accept="image/*" {!! $attributes !!} multiple="multiple"/>
        @include('admin::form.help-block')

    </div>

</div>
