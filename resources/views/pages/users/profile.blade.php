@extends('pages.layouts.layout')

@section('page-title')
    <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcome-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                <div class="breadcome-heading">
                                    <h3>{{ $user->name }}</h3>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul class="breadcome-menu">
                                    <li>
                                        <a href="{{ route("home") }}">Home</a> 
                                        <span class="bread-slash">/</span>
                                    </li>
                                    <li>
                                        <span class="bread-blod">Profile</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="single-pro-review-area mt-t-30 mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                    <div class="profile-info-inner">
                        <div class="text-center" >
                            <img height="200px" width="200px" class="img-circle" src="{{ auth()->user()->user_profile }}" alt="" />
                        </div>

                        <div class="profile-details-hr">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                    <div class="address-hr">
                                        <p><b>Name</b><br /> {{$user->name}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                    <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                        <p><b>Role</b><br /> {{ $user->roles()->first()->display_name }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-4">
                                    <div class="address-hr">
                                        <p><b>Phone Number</b><br /> {{ $user->phone }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-4">
                                    <div class="address-hr">
                                        <p><b>Email</b><br /> {{$user->email}}</p>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-4">
                                    <div class="address-hr">
                                        <p><b>Sex</b><br /> {{ ucfirst($user->sex)}}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                        <p><b>Address</b><br /> {{$user->address}}</p>
                                    </div>
                                </div>
                            </div>

                            @if($user->roles()->first()->id == 3)
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-6">
                                        <div class="address-hr">
                                            <p><b>Facility</b><br /> {{$user->facility->name}}</p>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-6">
                                        <div class="address-hr">
                                            <p><b>Clients Uploaded</b><br /> {{$user->uploaded_clients->count()}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Chanage picture modal --}}
    <div class="modal fade" id="profile-image-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog phone-width" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title text-center " id="exampleModalLabel">Upload profile photo</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
                <div class="col-9 offset-1 ml-5">
                    <img height="250" width="250" id="new-profile-photo" class="rounded-circle">
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default rounded-pill btn-lg" data-dismiss="modal">Cancel</button>
            <button type="button" id="photo-button" class="btn btn-success rounded-pill btn-lg">Apply</button>
          </div>
        </div>
      </div>
    </div>
@endsection

@section("script")
    <script type="text/javascript">
        //Code that manages the selection of profile image
        input = document.getElementById('select');
        if(input){
            input.addEventListener('change', (e) => {
                // u_button = document.getElementById('upload-image');
                photo = document.getElementById('new-profile-photo');
                // u_button.classList.add('loader');
                let type = e.target.files[0].type;
                if(type == "image/jpeg" || type == "image/png" || type == "image/jpg"){
                    var reader = new FileReader();
                    reader.readAsDataURL(e.target.files[0]);
                    reader.onload = function (e) {
                        photo.setAttribute('src', e.target.result);
                        $('#profile-image-modal').modal('show')
                    };
                }else{
                    //Show sweet alert
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 4000
                    });

                    Toast.fire({
                        type: 'error',
                        html: "<h3 class='text-success ml-3'>Invalid file type. Only .jpg and .png are acceped<h3>"
                    })
                }
                // u_button.classList.remove('loader');
            })
        }

        //Code that submits the form after the apply button is clicked
        $( "#photo-button" ).click(function() {
          $( "#photo-upload" ).submit();
        });

        //Code that manages the uploading of profile image
        $("#photo-upload").on('submit',(function(e) {
            e.preventDefault()
            message = document.getElementById('message');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{ route('change_photo', $user->id) }}',
                type: "POST",
                enctype: 'multipart/form-data',
                dataType: 'json',
                traditional: true,
                contentType: false,
                cache: false,
                processData:false,
                data: new FormData(this),
                success: function(res){
                    //Code to display success upon update complete
                    location.reload();
                },
                error: function(jqXhr){
                    console.log(jqXhr);
                    //Code that displays appropriate error if the form fail validation
                    if( jqXhr.status === 401 ) //redirect if not authenticated user.
                        $( location ).prop( 'pathname', 'auth/login' );
                    if( jqXhr.status === 422 ) {
                        error = jqXhr.responseJSON.errors.image;
                        message.innerHTML = error;
                    } else {
                        //Show sweet alert
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 4000
                        });

                        Toast.fire({
                            type: 'error',
                            html: "<h3 class='text-success ml-3'>Photo upload failed, please try again.<h3>"
                        })
                    }
                }
            });  
        }));
    </script>
@endsection
