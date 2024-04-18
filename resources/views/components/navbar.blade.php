@push('styles')
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
@endpush

<nav class="navbar navbar-color navbar-expand-lg text-white py-2">
    <div class="container">
      <div class="navbar-nav mr-auto">
        <a class="navbar-brand" href="/"><h3>K-24 Admin</h3></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav navbar-list d-flex justify-content-center">
            <a class="nav-link text-white align-self-center ml-2 {{isset($active) ? $active === 'home' || $active === '' ? 'active text-active': '' : ''}}"  href="/home">Home </a>
            <a class="nav-link text-white align-self-center ml-2 {{isset($active) ? $active === 'administator' ? 'active text-active': '' : ''}}"  href="/administator">Administator </a>
            <a class="nav-link text-white align-self-center ml-2 {{isset($active) ? $active === 'member' ? 'active text-active': '': ''}}"  href="/member">Member</a>
            @auth
            <a class="nav-link text-white align-self-center ml-2"> 
              <form action="/logout" method="post">
                  @csrf
                  <button type="submit" class="btn btn-danger" onclick="return confirm('Are you Sure want Logout it?')">Logout</button>
              </form>
            </a>
            @endauth
        </div>
      </div>
    </div>
  </nav>