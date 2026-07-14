<div class="col-sm-12 col-md-6">
    <div class="card ">
        <div class="card-header pt-3 bg-main">
            <h5 class="card-title text-center fw-bold text-white">वडा अनुसार तालिममा उपस्थितिको संख्या</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive" style="max-height: 100vh;">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>वडा नं</th>
                            <th>पुरुष</th>
                            <th>महिला</th>
                            <th>संख्या</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($wards as $ward)
                            <tr>
                                <td>{{ $ward->name ?? '' }}</td>
                                <td>{{\App\Helpers\NumberHelper::toNepaliNumber($ward->male_count)??0}}</td>
                                <td>{{\App\Helpers\NumberHelper::toNepaliNumber($ward->female_count)??0}}</td>
                                <td>{{\App\Helpers\NumberHelper::toNepaliNumber($ward->total_count)??0}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>जम्मा</td>
                            <td>{{\App\Helpers\NumberHelper::toNepaliNumber($totalCounts->total_male_count)??0}}</td>
                            <td>{{\App\Helpers\NumberHelper::toNepaliNumber($totalCounts->total_female_count)??0}}</td>
                            <td>{{\App\Helpers\NumberHelper::toNepaliNumber($totalCounts->grand_total_count)??0}}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

</div>