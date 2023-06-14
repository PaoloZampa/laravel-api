@if($errors->any())
  <div class="alert alert-danger p-3 m-3" role="alert">
    <ul class="mb-0">
      @foreach($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
  @endif