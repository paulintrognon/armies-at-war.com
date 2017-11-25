<select name="{{$armySelectorName}}">
  <option value="">Neutre</option>
  @foreach (\App\Models\Army::all() as $army)
    <option value="{{$army->id}}" {{$armySelectorCurrentArmy && $army->id === $armySelectorCurrentArmy->id ? 'selected' : ''}}>
      {{$army->name}}
    </option>
  @endforeach
</select>
