@extends('layouts.template')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="layout"></i></div>
                                Boxed Layout
                            </h1>
                            <div class="page-header-subtitle">On larger screens, this layout will keep the page content
                                from expanding beyond a max width.</div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="container-xl px-4">
            <div class="card mt-n10">
                <div class="card-header">Boxed Layout Example</div>
                <div class="card-body">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vero rerum ipsum, consequuntur inventore impedit amet doloribus quas? Dolorum dignissimos pariatur quos qui nisi repellat laudantium! Minima est impedit harum eos?
                </div>
            </div>
        </div>
    </main>

@endsection
