<div style="margin:0px 50px 0px 50px;">

    @if($pages)

        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Alias</th>
                <th>Content</th>
                <th>Date Created</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>

            @foreach($pages as $k => $page)

                <tr>
                    <td>{{ $page->id }}</td>
                    <td>{!! Html::link(route('editPages',['page'=>$page->id]),$page->name,['alt'=>$page->name]) !!}</td>
                    <td>{{ $page->alias }}</td>
                    <td>{{ $page->content }}</td>
                    <td>{{ $page->created_at }}</td>
                    <td>
                        {!! Form::open(['url'=>route('editPages',['page'=>$page->id]), 'class'=>'form-horizontal','method' => 'POST']) !!}

                        {!! Form::hidden('action','delete') !!}
                        {!! Form::button('Delete',['class'=>'btn btn-danger','type'=>'submit']) !!}

                        {!! Form::close() !!}
                    </td>
                </tr>

            @endforeach

            </tbody>
        </table>
    @endif

    {!! Html::link(route('addPages'),'Add page') !!}

</div>