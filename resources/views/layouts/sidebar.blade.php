    <nav class="pc-sidebar">
      <div class="navbar-wrapper">
        <div class="m-header">
          <a href="../dashboard/index.html" class="b-brand text-primary"
            ><!-- ========   Change your logo from here   ============ -->
            <img
              src="../assets/images/logo-white.svg"
              alt="logo image"
              class="logo-lg"
            />
            <span class="badge bg-primary rounded-pill ms-2 theme-version"
              >v3.1.0</span
            ></a
          >
        </div>
        <div class="card pc-user-card">
          <div class="card-body">
            <div class="nav-user-image">
              <a data-bs-toggle="collapse" href="#navuserlink"
                ><img
                  src="../assets/images/user/avatar-1.jpg"
                  alt="user-image"
                  class="user-avtar rounded-circle"
              /></a>
            </div>
            <div class="pc-user-collpsed collapse" id="navuserlink">
              <h4 class="mb-0">{{ auth()->user()->name }}</h4>
              <span>Administrator</span>
              <ul>
                <li>
                  <a class="pc-user-links"
                    ><i class="ph-duotone ph-user"></i>
                    <span>My Account</span></a
                  >
                </li>
                <li>
                  <a class="pc-user-links"
                    ><i class="ph-duotone ph-gear"></i> <span>Settings</span></a
                  >
                </li>
                <li>
                  <a class="pc-user-links"
                    ><i class="ph-duotone ph-lock-key"></i>
                    <span>Lock Screen</span></a
                  >
                </li>
                <li>
                  <a class="pc-user-links" id="logout-btn">
                    <i class="ph-duotone ph-power"></i>
                    <span>Logout</span>
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                    @csrf
                  </form>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="navbar-content">
          <ul class="pc-navbar">
            <li class="pc-item active">
              <a href="{{ route('chat') }}" class="pc-link"
                ><span class="pc-micon"
                  ><i class="ph-duotone ph-chats-circle"></i> </span
                ><span class="pc-mtext">Chat</span></a
              >
            </li>
            <li class="pc-item">
              <a href="plans.html" class="pc-link"
                ><span class="pc-micon"
                  ><i class="ph-duotone ph-currency-circle-dollar"></i> </span
                ><span class="pc-mtext">Plans</span></a
              >
            </li>
          </ul>
        </div>
      </div>
    </nav>

    @push('scripts')
      <script>
        document.getElementById('logout-btn').addEventListener('click', function(e) {
            e.preventDefault();
            fetch("{{ route('logout') }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value,
                    "Accept": "application/json"
                }
            }).then(() => {
                window.location.href = "{{ route('login') }}";
            });
        });
      </script>
    @endpush