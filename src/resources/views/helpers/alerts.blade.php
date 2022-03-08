@if(Session::get('success'))
  <div class="customAlert -success">
      <div class="customAlert__icon">
          <i class="mdi mdi-check-bold"></i>
      </div>
      <p class="customAlert__message">
          {{Session::get('success')}}
      </p>
  </div>
@endif

@if(Session::get('error'))
    <div class="customAlert -error">
        <div class="customAlert__icon">
            <i class="mdi mdi-close-thick"></i>
        </div>
        <p class="customAlert__message">
            {{Session::get('error')}}
        </p>
    </div>
@endif

@push('scripts.body.bottom')
    <script>
        $(document).ready(()=> {
            setTimeout(() => {
                $('.customAlert').addClass('-out')
            }, 4000)
        })
    </script>
@endpush
