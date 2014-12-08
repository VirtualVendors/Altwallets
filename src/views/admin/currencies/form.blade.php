{{Form::textField('code', 'Currency Code', null, ['placeholder' => 'e.x. BTC'])}}
{{Form::textField('name', 'Name', null, ['placeholder' => 'e.x. Bitcoin'])}}
{{Form::textField('scheme', 'Scheme', null, ['placeholder' => 'e.x. http'])}}
{{Form::textField('username', 'Username')}}
{{Form::textField('password', 'Password')}}
{{Form::textField('address', 'Address/Host', null, ['placeholder' => 'e.x. 10.1.1.1'])}}
{{Form::textField('port', 'Port', null, ['placeholder' => 'e.x. 6000'])}}
{{Form::textField('explorer', 'Block Chain Explorer', null, ['placeholder' => 'Use %id to express Transaction ID'])}}
{{Form::textField('market_id', 'Cryptsy Market ID')}}
{{Form::checkboxField('active', 'Active?')}}