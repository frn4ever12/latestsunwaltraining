 <div class="table-responsive">
     <table id="fixed-header-datatable" class="table table-striped table-bordered dt-responsive nowrap w-100">
         <thead>
             <tr style="text-align:center;">
                 <th>सि.नं.</th>
                 <th>शिक्षा स्तर </th>
                 <th>शैक्षिक संस्थाको नाम</th>
                 <th>GPA / Percentage</th>
                 @if ($application->status != 'approved' || Auth::user()->hasAnyRole(['super-admin','admin']))
                 <th class="no-print">क्रियाकलाप</th>
                 @endif
             </tr>
         </thead>
         <tbody>
             @if (!empty($application->educationDetails) && $application->educationDetails->count())
                 @foreach ($application->educationDetails as $detail)
                     <tr>
                         <td>{{ \App\Helpers\NumberHelper::toNepaliNumber($loop->iteration) }}</td>
                         <td>{{ $detail->educationLevel->name_np ?? '' }}</td>
                         <td>{{ $detail->institution_name ?? '' }}</td>
                         <td>{{ $detail->result_score ?? '' }} {{ $detail->result_type == 'grade' ? 'GPA' : ($detail->result_type == 'percentage' ? '%' : '') }}</td>
                         @if ($application->status != 'approved' || Auth::user()->hasAnyRole(['super-admin','admin']))
                             
                         <td class="no-print">
                             <a href="{{ route('training-application.education.edit', ['training' => $application->training_id, 'application' => $application->id, 'detail' => $detail->id]) }}"
                                 class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                             <button type="button" data-detail="{{ $detail->id }}"
                                 data-training="{{ $application->training_id }}"
                                 data-application="{{ $application->id }}"
                                 data-route="{{ route('training-application.education.destroy', ['training' => $application->training_id, 'application' => $application->id, 'detail' => $detail->id]) }}"
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
