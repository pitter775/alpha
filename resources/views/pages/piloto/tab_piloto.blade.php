<!-- list section start -->
<div class="card">
    <div class=" " style="width: 100%;">
        <table class="piloto-list-table table table-sm table-responsive-lg" data-colum="{{count($colunas)}}">
            <thead class="thead-light">
                <tr>
                    @foreach($colunas as $key => $value)
                        <th>{{$value}}</th>
                    @endforeach
                </tr>
            </thead>
            <TBOdy>
                @foreach($tabArray as $key => $tab)
                    <tr>
                        @foreach($colunas as $key => $colum)
                            @if($colum == 'use_dt_nascimento')
                            <td>{{ date( 'd/m/Y' , strtotime($tab->$colum))}}</td>
                            @else
                            <td>{{ $tab->$colum }}</td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
            </TBOdy>
        </table>
    </div>
</div>
<!-- list section end -->