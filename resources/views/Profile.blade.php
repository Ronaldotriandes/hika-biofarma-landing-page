@extends('Layout/Master')
    @section('content')
    <section id="hero" class="hero section">
    <div class="container">
      
      <div class="row" style="justify-content: center; padding-top:200px">
        <div class="col-lg-10 custom-box-shadow">
          <div class="row p-4">
            <div class="container section-title" data-aos="fade-up">
              <h2>Profile</h2>
            </div><!-- End Section Title -->
            <!-- Profile Picture Column -->
            <div class="col-md-4 text-center">
            <form id="photoForm" action="{{ route('profile.photo.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="position-relative mb-4">
                  <img src="/images/profile/{{$anggota->images}}" alt="Profile Picture" 
                       id="preview-image"
                       class="img-fluid rounded-circle mb-3" 
                       style="width: 200px; height: 200px; object-fit: cover;">
                  <div class="position-absolute bottom-0 end-0">
                    <label for="photo-upload" class="btn btn-primary rounded-circle p-2">
                      <i class="bi bi-camera-fill"></i>
                    </label>
                    <input type="file" 
                           id="photo-upload" 
                           name="photo" 
                           class="d-none" 
                           accept="image/*"
                           onchange="uploadPhoto(this)">
                  </div>
                </div>
              </form>
              <h4 class="mt-3">{{Auth::user()->nama_lengkap}}</h4>
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
    <script>
    function uploadPhoto(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview-image').src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);

            // Auto submit form
            const form = document.getElementById('photoForm');
            const formData = new FormData(form);
            
            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                  'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    // Show success notification
                    Livewire.emit('photoUpdated');
                }
            }).catch(error => {
                console.error('Error:', error);
            });
        }
    }
    </script>
@endsection
