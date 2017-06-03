
    <div class="box-body">

        <div class="form-group">
            {!! Form::label('email', 'E-mail', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'E-mail', 'name' => 'email']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('title', 'Título', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Título', 'name' => 'title']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('subject', 'Assunto', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::text('subject', null, ['class' => 'form-control', 'placeholder' => 'Assunto', 'name' => 'subject']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('doubt', 'Dúvida', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-6">
                {{ Form::textarea('doubt', null, ['rows' => '10', 'cols' => '100', 'style' => 'reszie:none;']) }}
            </div>
        </div>

        <div class="col-md-2">
            {!! Form::submit('Enviar', ['class' => 'btn btn-block btn-success btn-flat', 'style' => 'margin-left: 110%;']) !!}
        </div>

    </div>
