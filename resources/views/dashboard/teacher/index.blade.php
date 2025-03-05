@extends('dashboard.admin')

@section('title', 'Guru SMKN 7')

@section('content')
    <section class="dashboard-main-header">
        <h1>Data Guru</h1>
        <a href="{{url('admin/teachers/create')}}">Tambah</a>
    </section>
    
    @livewire('admin-teacher')

    <div class="tabz-dropdown-menu"  id="dropdown_action">
                                
        <div class="tabz-dropdown-item-contain">
            <a class="tabz-dropdown-item" data-tabz-action href="{{url("admin/teachers/0/edit")}}"> 
                <i class="fa-solid fa-pencil"></i> <span>Edit</span>
            </a>
        </div>

        <form class="tabz-dropdown-item-contain" data-tabz-action action="{{"/admin/teachers/0"}}" method="post"> @method('DELETE') @csrf
            <button class="tabz-dropdown-item">
                <i class="fa-solid fa-trash-can"></i> 
                <span>Delete</span>
            </button>
        </form>

    </div>
@endsection
