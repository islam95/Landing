<div class="wrapper container-fluid">

    {!! Form::open(['url' => route('addPages'),'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data']) !!}

    <div class="form-group">
        {!! Form::label('name','Name:',['class' => 'col-xs-2 control-label'])   !!}
        <div class="col-xs-8">
            {!! Form::text('name',old('name'),['class' => 'form-control','placeholder'=>'Enter page name'])!!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('alias', 'Alias:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('alias', old('alias'), ['class' => 'form-control','placeholder'=>'Enter page alias']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('text', 'Content:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::textarea('content', old('content'), ['id'=>'editor','class' => 'form-control','placeholder'=>'Enter page content']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('images', 'Image:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::file('images', ['class' => 'filestyle','data-buttonText'=>'Choose file','data-buttonName'=>"btn-primary",'data-placeholder'=>"No file"]) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10">
            {!! Form::button('Save', ['class' => 'btn btn-primary','type'=>'submit']) !!}
        </div>
    </div>

    {!! Form::close() !!}

    <script>
        // Replace the <textarea id="editor"> with a CKEditor instance, using default configuration.
        CKEDITOR.replace('editor');
    </script>

</div>
