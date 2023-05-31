<div class="dashboard-header">
    <nav class="navbar navbar-expand-lg bg-white fixed-top">
        <a class="ml-5" href="/"><span class="navbar-brand">Sample</span></a>
        <a class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </a>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto navbar-right-top">
                <li class="nav-item dropdown nav-user">
                    @if (Route::has('login'))
                        @auth
                            <a class="nav-link nav-user-img" href="#" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ Auth::user()->image }}" alt="" class="user-avatar-md rounded-circle" onerror="this.onerror=null;this.src='/images/logo.png';"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">{{ ucfirst(Auth::user()->name) }}</h5>
                                </div>
                                <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Profile</a>
                                <!-- <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a> -->
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                    <i class="fas fa-power-off mr-2"></i>
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                            @endif
                        @endauth
                    @endif
                </li>
            </ul>
        </div>
    </nav>
</div>
<script type="text/javascript">
  // onload
  $('a[data-toggle=collapse]').each(function() { 
      var chevron = $(this).parent().next('div');
      if ( chevron.hasClass('in') ) {
          $(this).children('span').removeClass('fas fa-chevron-down').addClass('fas fa-chevron-up');
      } else {
          $(this).children('span').removeClass('fas fa-chevron-up').addClass('fas fa-chevron-down');
      }
  });

  // click event
  $('a[data-toggle=collapse]').click( function() {  
      // swap chevron
      $(this).children('span').toggleClass('fas fa-chevron-down fas fa-chevron-up');
  });
</script>