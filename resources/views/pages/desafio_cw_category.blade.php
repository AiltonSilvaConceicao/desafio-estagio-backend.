{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    {{-- Usuarios --}}
    <link href="{{ URL::asset('../assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <style>
    body {
        padding-right: 0 !important;
    }
    </style>
	<div class="row">
        <div class="col-lg-12 col-xxl-4">
            <div class="card card-custom bg-gray-100 {{ @$class }}">
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header card-header-tabs-line">
                        <div class="card-title">
                            <h3 class="card-label">Dashboard - Pesquisa Por Categoria</h3>
                        </div>
                        <div class="card-toolbar">
							<ul class="nav nav-tabs nav-bold nav-tabs-line">
                                <li class="nav-item">
                                    <a class="nav-link {{$active_index ?? ''}}" data-toggle="tab"
                                        href="#kt_tab_pane_1_3">
                                        <span class="nav-icon">
                                            <i class="flaticon2-writing"></i>
                                        </span>
                                        <span class="nav-text">RSS - Correio da Bahia</span>
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown"
                                        href="#" role="button" aria-haspopup="true"
                                        aria-expanded="false">
                                        <span class="nav-icon">
                                            <i class="flaticon2-map"></i>
                                        </span>
                                        <span class="nav-text">Atalhos</span>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                            href="{{ route('init') }}">Página Inicial</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="kt_tab_pane_1_3"
                                role="tabpanel" aria-labelledby="kt_tab_pane_1_3" style="min-height: 300px;">
                                <!--begin::Form-->
								@php 
									if(isset($result) && isset($message)){
								@endphp 
								<div class="alert alert-custom alert-{{$result}} fade show" role="alert">
									<div class="alert-icon"><i class="flaticon-warning"></i></div>
									<div class="alert-text">{{$message}} </div>
									<div class="alert-close">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true"><i class="ki ki-close"></i></span>
										</button>
									</div>
								</div>
                                @php 
								}
                                @endphp
                                <form class="form" action='' id="formSearch">
									{{ csrf_field() }}
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Categoria</label>
                                                    <div class="input-group">
                                                        <input type="text" name="category" id="category" class="form-control" placeholder="Digite a categoria" />

                                                        <input type="hidden" name="route_search" id="route_search" value="{{ route('search-filter-category') }}">

                                                        <div class="input-group-append">
                                                            <button id="btnSearch" class="btn btn-success" type="button">Pesquisar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="result_json">
                                            <div class="card card-custom">
                                                <div class="card-body">
                                                    <!--begin: Datatable-->
                                                    <table class="table table-separate table-head-custom table-checkable responsive" id="kt_datatable1">
                                                    <thead>
                                                        <tr>
                                                            <th title="Field #1">Data Pub.</th>
                                                            <th title="Field #2">Categoria</th>
                                                            <th title="Field #3">Título</th>
                                                            <th title="Field #4">Descrição</th>
                                                        </tr>
                                                    </thead>
                                                        @if(isset($dados_json))
                                                            @foreach($dados_json as $list)
                                                                @foreach($list as $dado)
                                                                    <tr>
                                                                        <td>{{ $dado['pubDate'] }}</td>
                                                                        <td>{{ $dado['category']}}</td>
                                                                        <td>{{ $dado['title'] }}</td>
                                                                        <td>{{ $dado['description'] }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            @endforeach
                                                        @endif
                                                    </table>
                                                    {{--
                                                    <div class="d-flex justify-content-center">
                                                        @if(count($all) > 0)
                                                            {{ $all->links('pagination::bootstrap-4') }}
                                                        @endif
                                                    </div>
                                                    --}}
                                                    <!--end: Datatable-->
                                                </div>
                                            </div>
                                            <!--end::Card-->
                                        </div>
                                </form>
                                <!--end::Form-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
        </div>
    </div>
@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('../resources/metronic/js/pages/search_category.js') }}" type="text/javascript"></script>
@endsection
