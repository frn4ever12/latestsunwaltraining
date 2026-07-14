<div class="table-responsive">
    <table id="fixed-header-datatable" class="table table-striped table-bordered dt-responsive nowrap w-100">
        <thead>
            <tr style="text-align:center;">
                <th>सि.नं.</th>
                <th>नाम</th>
                <th>सम्बन्ध</th>
                <th>पेशा</th>
                <th>मोबाइल</th>
                @if ($application->status != 'approved' || Auth::user()->hasAnyRole(['super-admin','admin']))
                <th class="no-print">क्रियाकलाप</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @if (!empty($application->familyDetails) && $application->familyDetails->count())
                @foreach ($application->familyDetails as $detail)
                    <tr>
                        <td>{{ \App\Helpers\NumberHelper::toNepaliNumber($loop->iteration) }}</td>
                        <td>{{ $detail->name ?? '' }}</td>
                        <td>{{ $detail->relationship ?? '' }}</td>
                        <td>{{ $detail->occupation ?? '' }}</td>
                        <td>{{ $detail->mobile ?? '' }}</td>
                        @if ($application->status != 'approved' || Auth::user()->hasAnyRole(['super-admin','admin']))
                        
                        <td class="no-print">
                            <a href="{{ route('training-application.family.edit', ['training' => $application->training_id, 'application' => $application->id, 'detail' => $detail->id]) }}"
                                class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                            <button type="button" data-detail="{{ $detail->id }}"
                                data-training="{{ $application->training_id }}"
                                data-application="{{ $application->id }}"
                                data-route="{{ route('training-application.family.destroy', ['training' => $application->training_id, 'application' => $application->id, 'detail' => $detail->id]) }}"
                                class="btn btn-sm btn-danger deleteBtn"><i class="fa fa-trash"></i></button>
                        </td>
                        @endif
                    </tr>
                @endforeach
            @else
                <tr><td colspan="6" class="text-center">डेटा उपलब्ध छैन</td></tr>
            @endif
        </tbody>
    </table>
</div>
