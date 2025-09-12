@extends('layouts.dashboard')

@section('template_title')
    Tipo Vozs
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Tipo Vozs') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('tipo-vozs.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
									<th >Nombre</th>
									<th >Descripcion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tipoVozs as $tipoVoz)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $tipoVoz->nombre }}</td>
										<td >{{ $tipoVoz->descripcion }}</td>

                                            <td>
                                                <form action="{{ route('tipo-vozs.destroy', $tipoVoz->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('tipo-vozs.show', $tipoVoz->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('tipo-vozs.edit', $tipoVoz->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $tipoVozs->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
