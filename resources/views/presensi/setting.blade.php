@extends('dashboard.tabler')
@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                Setting
                </h2>
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
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="input-icon mb-3">
                                            <span class="input-icon-addon">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-scan" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                   <path d="M4 7v-1a2 2 0 0 1 2 -2h2"></path>
                                                   <path d="M4 17v1a2 2 0 0 0 2 2h2"></path>
                                                   <path d="M16 4h2a2 2 0 0 1 2 2v1"></path>
                                                   <path d="M16 20h2a2 2 0 0 0 2 -2v-1"></path>
                                                   <path d="M5 12l14 0"></path>
                                                </svg>
                                            </span>
                                            <input type="text" class="form-control" placeholder="longitude" name='longitude' id='longitude' value="{{ $setting->longitude }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="input-icon mb-3">
                                            <span class="input-icon-addon">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-scan" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                   <path d="M4 7v-1a2 2 0 0 1 2 -2h2"></path>
                                                   <path d="M4 17v1a2 2 0 0 0 2 2h2"></path>
                                                   <path d="M16 4h2a2 2 0 0 1 2 2v1"></path>
                                                   <path d="M16 20h2a2 2 0 0 0 2 -2v-1"></path>
                                                   <path d="M5 12l14 0"></path>
                                                </svg>
                                            </span>
                                            <input type="text" class="form-control" placeholder="latitude" name='latitude' id='latitude' value="{{ $setting->latitude }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="input-icon mb-3">
                                            <span class="input-icon-addon">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-scan" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                   <path d="M4 7v-1a2 2 0 0 1 2 -2h2"></path>
                                                   <path d="M4 17v1a2 2 0 0 0 2 2h2"></path>
                                                   <path d="M16 4h2a2 2 0 0 1 2 2v1"></path>
                                                   <path d="M16 20h2a2 2 0 0 0 2 -2v-1"></path>
                                                   <path d="M5 12l14 0"></path>
                                                </svg>
                                            </span>
                                            <input type="text" class="form-control" placeholder="jam_masuk" name='jam_masuk' id='jam_masuk' value="{{ $setting->jam_masuk}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="input-icon mb-3">
                                            <span class="input-icon-addon">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-scan" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                   <path d="M4 7v-1a2 2 0 0 1 2 -2h2"></path>
                                                   <path d="M4 17v1a2 2 0 0 0 2 2h2"></path>
                                                   <path d="M16 4h2a2 2 0 0 1 2 2v1"></path>
                                                   <path d="M16 20h2a2 2 0 0 0 2 -2v-1"></path>
                                                   <path d="M5 12l14 0"></path>
                                                </svg>
                                            </span>
                                            <input type="text" class="form-control" placeholder="jam_keluar" name='jam_keluar' id='jam_keluar' value="{{ $setting->jam_keluar }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
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
@endsection