@extends('Layout/Master')
    @section('content')
    <section id="hero" class="hero section">
    <div class="container">
      <div class="row" style="justify-content: center; padding-top:200px">
        <div class="col-lg-10 custom-box-shadow">
          <div class="row p-4">
            <!-- Profile Picture Column -->
            <div class="col-md-4 text-center">
              <img src="/assets/img/team/team-1.jpg" alt="Profile Picture" 
                   class="img-fluid rounded-circle mb-3" 
                   style="width: 200px; height: 200px; object-fit: cover;">
              <h4>{{Auth::user()->nama_lengkap}}</h4>
              <p class="text-muted">{{Auth::user()->role}}</p>
            </div>
            
            <!-- Profile Details Column -->
            <div class="col-md-8">
              <h3>Profile Details</h3>
              <div class="row mt-3">
                <div class="col-lg-6">
                  <div class="mb-3">
                    <strong>Full Name</strong>
                    <p>{{$anggota->nama_lengkap}}</p>
                  </div>
                  <div class="mb-3">
                    <strong>Email</strong>
                    <p>{{$anggota->email_kantor}}</p>
                  </div>
                  <div class="mb-3">
                    <strong>Phone</strong>
                    <p>{{$anggota->no_telp}}</p>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <strong>Department</strong>
                    <p>{{$anggota->departemen_kerja}}</p>
                  </div>
                  <div class="mb-3">
                    <strong>Employee ID</strong>
                    <p>{{$anggota->nip}}</p>
                  </div>
                  <div class="mb-3">
                    <strong>Join Date</strong>
                    <p>{{Auth::user()->created_at->format('d M Y')}}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </section>
@endsection
