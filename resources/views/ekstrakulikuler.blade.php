@extends('layouts.app')

@section('content')
    {{-- DAFTAR EKSTRAKULIKULER --}}
    <section class="py-5 bg-white">
        <div class="container">
            <div class="row g-4">
                @forelse ($extracurricularItems as $item)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 border-0 shadow-sm ekskul-card">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-3">
                                        <div class="ekskul-icon-wrap me-3">
                                         @if($item['name'] == 'Pramuka')
                                          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="512" height="512">
                                            <path d="M0 0 C3.60185638 1.78935906 5.65271868 4.06029761 7.0625 7.875 C6.97961928 12.01903601 6.14602992 14.44563794 4 18 C0.0205113 20.52544475 -2.01394307 21.15041546 -6.6875 20.4375 C-11.98927614 18.13672922 -11.98927614 18.13672922 -14 15 C-14.84715191 10.33629773 -14.65619755 7.04991608 -12.125 3 C-8.46981433 -0.44017475 -4.87233139 -0.79548268 0 0 Z " fill="#000000" transform="translate(306,129)"/>
                                          </svg>  
                                         @elseif($item['name'] == 'PMR')
                                          <svg width="26" height="26" fill="currentColor" class="text-primary">
                                              <rect x="6" y="6" width="14" height="14"/>
                                          </svg>
                                         @else
                                         <svg width="26" height="26" fill="currentColor" class="text-primary">
                                             <polygon points="13,3 23,23 3,23"/>
                                         </svg>
                                          @endif
                                        </div>
                                    <h5 class="mb-0 fw-semibold" style="font-size:16px;">
                                        {{ $item['name'] }}</h5>
                                </div>
                                <p class="text-muted" style="font-size:13px; line-height:1.7;">
                                    {{ $item['description'] }}
                                </p>
                                <div class="mt-3">
                                    <span class="badge {{ $item['type_class'] }}"
                                        style="font-size:11px;">{{ $item['type'] }}</span>
                                    <span class="badge bg-light text-muted ms-1"
                                        style="font-size:11px;">{{ $item['schedule'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted py-5">
                        <p class="mb-0">Belum ada ekstrakurikuler yang ditampilkan.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
