@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<section class="dashboard my-5">
    <div class="container">
        <div class="row text-left">
            <div class=" col-lg-12 col-12 header-wrap mt-4">
                <p class="story">
                    DASHBOARD
                </p>
                <h2 class="primary-header ">
                    Bootcamp Data
                </h2>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-lg-12 col-12 mt-4">
                @include("components.alert")
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Camp</th>
                            <th>Price</th>
                            <th>Register Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($checkouts as $checkout)
                        <tr>
                                <td>{{ $checkout->User->name }}</td>
                                <td>{{ $checkout->Camp->title }}</td>
                                <td>{{ $checkout->Camp->price}}</td>
                                <td>{{ $checkout->created_at }}</td>
                                <td>
                                    @if ($checkout->is_paid)
                                        <span class="badge bg-success">Paid</span>
                                    @else
                                        <span class="badge bg-danger">Pending</span>
                                    @endif
                                </td>
                                <td>
                                    @if (!$checkout->is_paid)
                                        <form action="{{ route('admin.checkout.update', $checkout->id) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Set to Paid</button>
                                        </form>
                                    @endif
                                </td>
                            @empty

                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
