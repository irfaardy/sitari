<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
          </li> 
          {{-- Admin --}}
        @if(auth()->user()->role == 'admin')
              <li class="nav-item">
                <a href="{{route('pengguna')}}" class="nav-link">
                  <i class="far fa-user nav-icon"></i>
                  <p>Pengguna</p>
                </a>
              </li>
           
          <li class="nav-item">
            <a href="{{route('presensi')}}" class="nav-link">
              <i class="nav-icon fas fa-user-clock"></i>
              <p>
                Kelola Presensi
                
              </p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="{{route('admin.pembayaran')}}" class="nav-link">
              <i class="nav-icon fas fa-money-check"></i>
              <p>
                 Kelola Pembayaran 
                 @if(PembayaranHelper::cek_menunggu() > 0)
                   <span class="badge badge-danger">
                    {{PembayaranHelper::cek_menunggu()}}
                      </span>
                  @elseif(PembayaranHelper::cek_menunggu() > 100)
                  <span class="badge badge-danger">
                    100+
                      </span>
                  @endif
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('biaya')}}" class="nav-link">
              <i class="nav-icon fas fa-wrench"></i>
              <p>
                 Pengaturan Biaya
                
              </p>
            </a>
          </li>
          {{-- D --}}
        
          @endif
          {{-- Anggota --}}
          @if(auth()->user()->role == 'member')
          <li class="nav-item">
            <a href="{{route('member.pembayaran')}}" class="nav-link">
              <i class="nav-icon fas fa-money-check"></i>
              <p>
                 Pembayaran
                
              </p>
            </a>
          </li>
          @endif
           
        </ul>
      </nav>