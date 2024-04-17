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
            <a class="nav-link text-white align-self-center ml-2" href="/login"> 
              <button type="button" class="btn btn-primary">Login</button>
            </a>
              <div class="dropdown d-flex align-middle align-items-center pl-3">
                <a role="button" data-toggle="dropdown" aria-expanded="false">
                    <div class="style-person-icon">
                        <span class="material-icons">
                            person
                        </span>
                    </div>
                </a>
  
                <div class="dropdown-menu">
                    <div class="account-login pl-2 ">
                        <span> Anjasmara </span>
                    </div>
                    <div class="pl-2 pt-1">
                        <button type="button" class="btn btn-danger" 
                            >Logout
                        </button>
                    </div>
                </div>
            </div>
            {{-- <a v-if="!responseAuth?.token" class="nav-link text-white" href="/login">
                <button type="button" class="btn btn-light">Login</button>
            </a> --}}
        </div>
      </div>
    </div>
  </nav>