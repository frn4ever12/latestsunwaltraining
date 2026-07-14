<div class="table-responsive">
    <table id="fixed-header-datatable" class="table table-striped table-bordered dt-responsive nowrap w-100">
        <thead>
            <tr style="text-align:center;">
                <th>सि.नं.</th>
                <th>चलनी नं. </th>
                <th>कागजको नाम</th>
                <th class="no-print">कागजात</th>
                @if ($application->status != 'approved' || Auth::user()->hasAnyRole(['super-admin','admin']))
                <th class="no-print">क्रियाकलाप</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @if (!empty($application->anyeBibaranDetails) && $application->anyeBibaranDetails->count())
                @forelse ($application->anyeBibaranDetails as $detail)
                    <tr>
                        <td>{{ \App\Helpers\NumberHelper::toNepaliNumber($loop->iteration) }}</td>
                        <td>{{ $detail->chalani_no ?? '' }}</td>
                        <td class="no-print">
                            @if (isset($detail->anye_document))
                                <a href="{{ Url::temporarySignedRoute('application-file.show', now()->addMinutes(2), $detail->anye_document) }}"
                                    target="_blank"><i class="fa fa-file-pdf"></i></a>
                            @endif
                        </td>
                        @if ($application->status != 'approved' || Auth::user()->hasAnyRole(['super-admin','admin']))
                        <td class="no-print">
                            <a href="{{ route('training-application.anye-bibaran.edit', ['training' => $application->training_id, 'application' => $application->id, 'detail' => $detail->id]) }}"
                                class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                            <button type="button"
                                data-route="{{ route('training-application.anye-bibaran.destroy', ['training' => $application->training_id, 'application' => $application->id, 'detail' => $detail->id]) }}"
                                class="btn btn-sm btn-danger deleteBtn"><i class="fa fa-trash"></i></button>
                        </td>
                        @endif
                    </tr>
                @endforeach
            @else
                <tr><td colspan="5" class="text-center">डेटा उपलब्ध छैन</td></tr>
            @endif
        </tbody>
    </table>
</div>
