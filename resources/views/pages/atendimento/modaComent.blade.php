
@foreach($coment as $com)
    <div class="media align-items-center comentcs">
        <div class="avatar mr-50">
            @if($com->use_foto == null)
                <img src=" {{asset('app-assets/images/avatars/avatar.png')}}" alt="avatar" height="38" width="38">
            @endif
            @if($com->use_foto !== null)
                <img src="{{asset('arquivos').'/'.$com->use_foto}}" alt="avatar" height="38" width="38">
            @endif        
        </div>
        <div class="media-body ">
            <b>{{$com->name}}</b>  <small> {{date( 'd/m/Y h:i', strtotime($com->created_at ?? ''))}}</small>
            <p class="mb-0">{{$com->com_texto ?? ''}}</p>
        </div>
    </div>
@endforeach


