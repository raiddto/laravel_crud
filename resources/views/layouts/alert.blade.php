<!-- @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div><br />
@endif -->
@if(session()->get('success'))
  <div class="alert alert-success">
    {{ session()->get('success') }}  
  </div><br />
@endif

<!-- @if ($errors->any())
  <div class="alert alert-danger">
    @foreach ($errors->all() as $error)
      {{ $error }}<br>
    @endforeach
  </div><br />
@endif -->

<!-- Script -->
<script type="text/javascript">
  $("document").ready(function(){
    setTimeout(function(){
        $("div.alert").remove();
    }, 3000 ); 
  });
</script>