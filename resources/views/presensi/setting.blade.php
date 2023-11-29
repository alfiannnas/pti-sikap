@extends('dashboard.tabler')
@section('content')
<!-- Include Flatpickr CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<!-- Include Flatpickr JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h1 class="page-title">
                Setting
                </h1>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div class="col-6">
                <div class="card">
                   
                    <div class="card-body">
                        <form action="/presensi/simpansetting" method="POST">
                            @csrf
                            <div class="row">
                            <h2 class="mt-2">Lokasi Kantor</h2>
                                <div class="col-12">
                                    <div class="form-group" style="margin-top: 0px;">
                                        Latitude
                                        <div class="input-icon mb-2">
                                            <span class="input-icon-addon">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"> <g clip-path="url(#clip0_993_5208)"> <path d="M13.9719 2.69375C12.5094 1.04375 10.3812 0 8 0C3.58125 0 0 3.58125 0 8H2C2 4.68438 4.68438 2 8 2C9.82812 2 11.45 2.82813 12.5469 4.11875L10.6656 6H16V0.665625L13.9719 2.69375ZM8 14C6.17188 14 4.55 13.1719 3.45312 11.8813L5.33437 10H0V15.3344L2.02813 13.3062C3.49063 14.9562 5.62188 16 8 16C12.4187 16 16 12.4187 16 8H14C14 11.3156 11.3156 14 8 14ZM9.33438 8C9.33438 7.2625 8.7375 6.66563 8 6.66563C7.2625 6.66563 6.66563 7.2625 6.66563 8C6.66563 8.7375 7.2625 9.33438 8 9.33438C8.7375 9.33438 9.33438 8.7375 9.33438 8Z" fill="#747474"/> </g> <defs> <clipPath id="clip0_993_5208"> <rect width="16" height="16" fill="white"/> </clipPath> </defs> </svg>
                                            </span>
                                            <input type="text" class="form-control" placeholder="Longitude" name='longitude' id='longitude' value="{{ $setting->longitude }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        
                                    Longitude
                                        <div class="input-icon mb-3">
                                            <span class="input-icon-addon">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"> <g clip-path="url(#clip0_993_5208)"> <path d="M13.9719 2.69375C12.5094 1.04375 10.3812 0 8 0C3.58125 0 0 3.58125 0 8H2C2 4.68438 4.68438 2 8 2C9.82812 2 11.45 2.82813 12.5469 4.11875L10.6656 6H16V0.665625L13.9719 2.69375ZM8 14C6.17188 14 4.55 13.1719 3.45312 11.8813L5.33437 10H0V15.3344L2.02813 13.3062C3.49063 14.9562 5.62188 16 8 16C12.4187 16 16 12.4187 16 8H14C14 11.3156 11.3156 14 8 14ZM9.33438 8C9.33438 7.2625 8.7375 6.66563 8 6.66563C7.2625 6.66563 6.66563 7.2625 6.66563 8C6.66563 8.7375 7.2625 9.33438 8 9.33438C8.7375 9.33438 9.33438 8.7375 9.33438 8Z" fill="#747474"/> </g> <defs> <clipPath id="clip0_993_5208"> <rect width="16" height="16" fill="white"/> </clipPath> </defs> </svg>
                                            </span>
                                            <input type="text" class="form-control" placeholder="Latitude" name='latitude' id='latitude' value="{{ $setting->latitude }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <h2 class="mt-3">Jam Masuk dan Jam Keluar</h2>
                 
                                <div class="col-12">
                                    <div class="form-group">
                                        Jam Masuk
                                        <div class="input-icon mb-2">
                                            <span class="input-icon-addon">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_996_6068)">
<path d="M9.49967 1.5835C13.872 1.5835 17.4163 5.12779 17.4163 9.50016C17.4163 13.8725 13.872 17.4168 9.49967 17.4168C5.1273 17.4168 1.58301 13.8725 1.58301 9.50016C1.58301 5.12779 5.1273 1.5835 9.49967 1.5835ZM9.49967 3.16683C7.81997 3.16683 6.20906 3.83409 5.02133 5.02182C3.8336 6.20955 3.16634 7.82046 3.16634 9.50016C3.16634 11.1799 3.8336 12.7908 5.02133 13.9785C6.20906 15.1662 7.81997 15.8335 9.49967 15.8335C11.1794 15.8335 12.7903 15.1662 13.978 13.9785C15.1657 12.7908 15.833 11.1799 15.833 9.50016C15.833 7.82046 15.1657 6.20955 13.978 5.02182C12.7903 3.83409 11.1794 3.16683 9.49967 3.16683ZM9.49967 4.75016C9.69358 4.75019 9.88073 4.82138 10.0256 4.95023C10.1705 5.07908 10.2631 5.25663 10.2858 5.4492L10.2913 5.54183V9.17241L12.4344 11.3155C12.5764 11.4579 12.6588 11.6491 12.6649 11.8501C12.6711 12.0512 12.6005 12.247 12.4674 12.3979C12.3344 12.5487 12.1489 12.6433 11.9487 12.6624C11.7485 12.6815 11.5485 12.6236 11.3894 12.5006L11.315 12.4349L8.93997 10.0599C8.81692 9.93672 8.7379 9.77646 8.71513 9.60387L8.70801 9.50016V5.54183C8.70801 5.33187 8.79142 5.1305 8.93988 4.98204C9.08835 4.83357 9.28971 4.75016 9.49967 4.75016Z" fill="#747474"/>
</g>
<defs>
<clipPath id="clip0_996_6068">
<rect width="19" height="19" fill="white"/>
</clipPath>
</defs>
</svg>

                                            </span>
                                            <input type="text" class="form-control" placeholder="Jam Masuk" name="jam_masuk" id="jam_masuk" value="{{ $setting->jam_masuk }}">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        Jam Keluar
                                        <div class="input-icon mb-3">
                                            <span class="input-icon-addon">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_996_6068)">
<path d="M9.49967 1.5835C13.872 1.5835 17.4163 5.12779 17.4163 9.50016C17.4163 13.8725 13.872 17.4168 9.49967 17.4168C5.1273 17.4168 1.58301 13.8725 1.58301 9.50016C1.58301 5.12779 5.1273 1.5835 9.49967 1.5835ZM9.49967 3.16683C7.81997 3.16683 6.20906 3.83409 5.02133 5.02182C3.8336 6.20955 3.16634 7.82046 3.16634 9.50016C3.16634 11.1799 3.8336 12.7908 5.02133 13.9785C6.20906 15.1662 7.81997 15.8335 9.49967 15.8335C11.1794 15.8335 12.7903 15.1662 13.978 13.9785C15.1657 12.7908 15.833 11.1799 15.833 9.50016C15.833 7.82046 15.1657 6.20955 13.978 5.02182C12.7903 3.83409 11.1794 3.16683 9.49967 3.16683ZM9.49967 4.75016C9.69358 4.75019 9.88073 4.82138 10.0256 4.95023C10.1705 5.07908 10.2631 5.25663 10.2858 5.4492L10.2913 5.54183V9.17241L12.4344 11.3155C12.5764 11.4579 12.6588 11.6491 12.6649 11.8501C12.6711 12.0512 12.6005 12.247 12.4674 12.3979C12.3344 12.5487 12.1489 12.6433 11.9487 12.6624C11.7485 12.6815 11.5485 12.6236 11.3894 12.5006L11.315 12.4349L8.93997 10.0599C8.81692 9.93672 8.7379 9.77646 8.71513 9.60387L8.70801 9.50016V5.54183C8.70801 5.33187 8.79142 5.1305 8.93988 4.98204C9.08835 4.83357 9.28971 4.75016 9.49967 4.75016Z" fill="#747474"/>
</g>
<defs>
<clipPath id="clip0_996_6068">
<rect width="19" height="19" fill="white"/>
</clipPath>
</defs>
</svg>

                                            </span>
                                            
                                            <input type="text" class="form-control" placeholder="Jam Keluar" name="jam_keluar" id="jam_keluar" value="{{ $setting->jam_keluar }}">



                                                </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary" name="simpan" onclick="showSuccessAlert()">Sismpan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    flatpickr("#jam_masuk", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        clickOpens: true,
    });
</script>
<script>
    flatpickr("#jam_keluar", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        clickOpens: true,
    });
</script>
<script>
    function showSuccessAlert() {
        Swal.fire({
            icon: 'success',
            title: 'Data Saved Successfully!',
            showConfirmButton: false,
            timer: 1500
        });
    }
</script>
@endsection