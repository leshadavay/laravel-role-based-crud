@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Tenants') }}</div>

                    <div class="card-body">
                        <a href="{{route('tenants.create')}}" class="btn btn-primary">
                            Add Tenant
                        </a>
                        <br>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Domain</th>
                                <th></th>
                            </tr>

                            </thead>
                            <tbody>
                            @forelse($tenants as $tenant)
                                <tr>
                                    <td>{{$tenant->name}}</td>
                                    <td>{{$tenant->email}}</td>
                                    <td>{{$tenant->domain}}</td>
                                    <td>
                                        <a href="{{route('tenants.edit',$tenant->id)}}" class="btn btn-sm btn-info">Edit</a>
                                        <form action="{{route('tenants.destroy',$tenant->id)}}" method="POST" class="d-inline-block">
                                            @method("DELETE")
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('are you sure?')">delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4">No tenatns</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
