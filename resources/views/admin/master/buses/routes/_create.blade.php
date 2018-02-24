{!! Form::select('source_city', $cities, null, ['class' => 'form-control', 'id' => 'source_city', 'autocomplete' => 'off', 'required' => true, 'placeholder' => 'Source']) !!}
                
<br>

{!! Form::select('destination_city', $cities, null, ['class' => 'form-control', 'id' => 'destination_city', 'autocomplete' => 'off', 'required' => true, 'placeholder' => 'Destination']) !!}

<br>

{!! Form::number('journey_duration', null, ['class' => 'form-control', 'id' => 'journey_duration', 'autocomplete' => 'off', 'required' => true, 'placeholder' => 'Duration in hours', 'step' => '0.01']) !!}