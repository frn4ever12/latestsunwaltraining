  <div class="table-responsive">
      <table id="fixed-header-datatable" class="table table-striped table-bordered dt-responsive nowrap w-100">
          <thead>
              <tr style="text-align:center;">
                  <th>सि.नं.</th>
                  <th>संस्थाको नाम </th>
                  <th>क्याटेगोरी</th>
                  <th class="no-print">अनुभव दस्तावेज</th>
                  @if ($application->status != 'approved' || Auth::user()->hasAnyRole(['super-admin','admin']))
                  <th class="no-print">क्रियाकलाप</th>
                  @endif
              </tr>
          </thead>
          <tbody>
              @if (!empty($application->experienceDetails) && $application->experienceDetails->count())

                  @foreach (  $application->experienceDetails as $detail)
                      <tr>
                          <td>{{ \App\Helpers\NumberHelper::toNepaliNumber($loop->iteration) }}</td>
                          <td>{{ $detail->sanstha_name ?? '' }}</td>
                          <td>{{ $detail->category->name_np ?? '' }}</td>
                          <td class="no-print">
                              @if (isset($detail->document))
                                  <a href="{{ Url::temporarySignedRoute('application-file.show', now()->addMinutes(2), $detail->document) }}"
                                      target="_blank">
                                      <i class="fa fa-file-pdf"></i>
                                  </a>
                              @else
                                  <strong>N/A</strong>
                              @endif
                          </td>
                          @if ($application->status != 'approved' || Auth::user()->hasAnyRole(['super-admin','admin']))
                          <td class="no-print">
                              <a href="{{ route('training-application.experience.edit', ['training' => $application->training_id, 'application' => $application->id, 'detail' => $detail->id]) }}"
                                  class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                              <button type="button"
                                  data-route="{{ route('training-application.experience.destroy', ['training' => $application->training_id, 'application' => $application->id, 'detail' => $detail->id]) }}"
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
