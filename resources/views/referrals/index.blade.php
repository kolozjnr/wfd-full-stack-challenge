@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Referrals</h1></div>

                <div class="panel-body">
                    
                    @if (!Auth::user()->hasRole('executive'))
                        <div>@include('partials.filterReferrals') @include('partials.createReferralButton')</div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="col-md-12">
                        <form action="{{route('Search')}}" class="" method="GET">
                            {{ csrf_field() }}
                            <div class=" col-8" >
                                <div class="col-md-6" style="display: flex; margin-bottom: 3px; "> 
                                    <input type="text" class="form-control" name="search" placeholder="Search...">
                                    <button class="btn btn-success">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <table class="table table-hover">
                        <tr>
                            <th>Country</th>
                            <th>Reference No</th>
                            <th>Organisation</th>
                            <th>Province</th>
                            <th>District</th>
                            <th>City</th>
                            <th>Street Address</th>
                            <th>Gps Location</th>
                            <th>Facility Name</th>
                            <th>Facility Type</th>
                            <th>Provider Name</th>
                            <th>Position</th>
                            <th>Phone</th>
                            <th>eMail</th>
                            <th>Website</th>
                            <th>Pills Available</th>
                            <th>Code To Use</th>
                            <th>Type of Service</th>
                            <th>Note</th>
                            <th>Womens Evaluation</th>
                            <th>Action</th>
                        </tr>
                        @foreach($referrals as $referral)
                        <tr>
                            <td><a href="{{ route('show',['referral' =>$referral]) }}">{{ $referral->country }} </a></td>
                            <td>{{ $referral->reference_no }} </td>
                            <td>{{ $referral->organisation }} </td>
                            <td>{{ $referral->province }} </td>
                            <td>{{ $referral->district }} </td>
                            <td>{{ $referral->city }} </td>
                            <td>{{ $referral->street_address }} </td>
                            <td>{{ $referral->gps_location }} </td>
                            <td>{{ $referral->facility_name }} </td>
                            <td>{{ $referral->facility_type }} </td>
                            <td>{{ $referral->provider_name }} </td>
                            <td>{{ $referral->position }} </td>
                            <td>{{ $referral->phone }} </td>
                            <td>{{ $referral->email }} </td>
                            <td>{{ $referral->website }} </td>
                            <td>{{ $referral->pills_available }} </td>
                            <td>{{ $referral->code_to_use }} </td>
                            <td>{{ $referral->type_of_service }} </td>
                            <td>{{ $referral->note }} </td>
                            <td>{{ $referral->womens_evaluation }} </td>
                            
                        </tr>
                        @endforeach
                    </table>
                </div>

                <div class="panel-footer">
                    {{ $referrals->links() }}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
