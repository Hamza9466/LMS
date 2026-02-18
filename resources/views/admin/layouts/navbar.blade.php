    <div class="dashboard-menu">

        <!-- Dashboard Menu Close Start -->
        <div class="dashboard-menu__close">
            <button class="close-btn"><i class="fas fa-times"></i></button>
        </div>
        <!-- Dashboard Menu Close End -->

        <!-- Dashboard Menu Content Start -->
        <div class="dashboard-menu__content">
            <div class="dashboard-menu__image">
<img src="{{ asset('assets/admin/images/canvas-menu-image.png') }}" alt="Images" width="984" height="692">
            </div>
            <div class="dashboard-menu__main-menu">
                <ul class="dashboard-menu__menu-link">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Courses</a></li>
                    <li><a href="#">Events</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <div class="dashboard-menu__search">
                    <form action="#">
                        <input type="text" placeholder="Search…">
                        <button class="search-btn"><i class="far fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Dashboard Menu Content End -->

    </div>
    <!-- Dashboard Menu End -->


    <!-- Dashboard Main Wrapper Start -->
    <main class="dashboard-main-wrapper">

        <!-- Dashboard Header Start -->
        <div class="dashboard-header">
            <div class="container">
                <!-- Dashboard Header Wrapper Start -->
                <div class="dashboard-header__wrap">

                    <div class="dashboard-header__toggle-menu d-xl-none">
                        <button class="toggle-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDashboard">
                            <svg width="20px" height="18px" viewBox="0 0 20 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <path d="M18.7179688,2.60581293 L1.28207031,2.60581293 C0.573828125,2.60581293 0,2.02491559 0,1.30798783 C0,0.591060076 0.573828125,0.0101231939 1.28207031,0.0101231939 L18.7179688,0.0101231939 C19.4261719,0.0101231939 20,0.591020532 20,1.30798783 C20,2.02495513 19.4261719,2.60581293 18.7179688,2.60581293 Z"></path>
                                <path d="M11.5384766,10.5957293 L1.28207031,10.5957293 C0.573828125,10.5957293 2.91322522e-13,10.0147924 2.91322522e-13,9.29786464 C2.91322522e-13,8.58093688 0.573828125,8 1.28207031,8 L11.5384766,8 C12.2466797,8 12.8205469,8.58089734 12.8205469,9.29786464 C12.8205469,10.0148319 12.2466797,10.5957293 11.5384766,10.5957293 Z"></path>
                                <path d="M18.7179688,17.6 L1.28207031,17.6 C0.573828125,17.6 0,17.0628683 0,16.4 C0,15.7371317 0.573828125,15.2 1.28207031,15.2 L18.7179688,15.2 C19.4261719,15.2 20,15.7370952 20,16.4 C20,17.0628683 19.4261719,17.6 18.7179688,17.6 Z"></path>
                            </svg>
                        </button>
                    </div>
@php
$u = auth()->user();
$role = $u?->role ?? 'guest';

$d = $role==='admin'   ? $u?->adminDetail
   : ($role==='teacher'? $u?->teacherDetail
   : ($role==='student'? $u?->studentDetail : null));

$name = trim(($d?->first_name ?? '').' '.($d?->last_name ?? ''))
     ?: ($u->name ?? (isset($u?->email) ? explode('@',$u->email)[0] : 'Guest'));

$raw = $u?->avatar
     ?? $u?->profile_photo_path
     ?? $u?->profile_image
     ?? $d?->profile_image
     ?? $d?->avatar
     ?? $d?->photo;

$toUrl = function($p){
    if(!$p) return null;
    if(preg_match('#^https?://#',$p)) return $p;
    $p = ltrim(str_replace('\\','/',$p), '/');
    if (file_exists(public_path($p))) return asset($p);                     // public/uploads/...
    if (file_exists(public_path('storage/'.$p))) return asset('storage/'.$p); // public/storage/...
    return asset('storage/'.$p); // last try
};

$img = $toUrl($raw) ?? asset(match($role){
    'admin'   => 'assets/admin/images/avatar/admin-default.png',
    'teacher' => 'assets/admin/images/avatar/teacher-default.png',
    'student' => 'assets/admin/images/avatar/student-default.png',
    default   => 'assets/admin/images/avatar/avatar-02.jpg',
});
@endphp


<div class="dashboard-header__user">
  <div class="dashboard-header__user-avatar">
    <img src="{{ $img }}" alt="Avatar" width="90" height="90" class="rounded-circle object-fit-cover">
  </div>
  <div class="dashboard-header__user-info">
    <h4 class="dashboard-header__user-name"><span class="welcome-text">Welcome,</span> {{ $name }}</h4>
    <p>Your role is: {{ ucfirst($role) }}</p>
  </div>
</div>





           



                   @php
    $user = auth()->user();
@endphp

@if($user->role !== 'student')
    <div class="dashboard-header__btn">
        <a class="btn btn-outline-primary" href="{{ route('courses.create') }}">
            <i class="edumi edumi-content-writing"></i> 
            <span class="text">Add A New Course </span>
        </a>
    </div>
@endif


                    <div class="dashboard-header__toggle">
                        <button class="btn btn-toggle"><i class="fas fa-bars"></i></button>
                    </div>

                </div>
                <!-- Dashboard Header Wrapper End -->
            </div>
        </div>