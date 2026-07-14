@extends('trainee.includes.main')
@section('title', 'प्रतिक्रिया')
@section('page-title')
    प्रतिक्रिया
@endsection
@section('content')
    <div class="glass-card">
        <div class="card-header">
            <h2 class="card-title">
                <i class="bi bi-chat-dots"></i>
                प्रतिक्रिया
            </h2>
        </div>
        @if($trainings->count() > 0)
            <form method="POST" action="{{ route('trainee.feedback.store') }}">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="training_id" class="form-label">तालिम छान्नुहोस् <span class="text-danger">*</span></label>
                        <select class="form-control" id="training_id" name="training_id" required>
                            <option value="">--कृपया छान्नुहोस्--</option>
                            @foreach($trainings as $training)
                                <option value="{{ $training->training_id }}">{{ $training->training->name_np }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="rating" class="form-label">मूल्यांकन <span class="text-danger">*</span></label>
                        <select class="form-control" id="rating" name="rating" required>
                            <option value="">--कृपया छान्नुहोस्--</option>
                            <option value="5">⭐⭐⭐⭐⭐ (उत्कृष्ट)</option>
                            <option value="4">⭐⭐⭐⭐ (राम्रो)</option>
                            <option value="3">⭐⭐⭐ (साधारण)</option>
                            <option value="2">⭐⭐ (कमजोर)</option>
                            <option value="1">⭐ (निकै कमजोर)</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="comments" class="form-label">टिप्पणीहरू</label>
                        <textarea class="form-control" id="comments" name="comments" rows="4" placeholder="तपाईंको प्रतिक्रिया यहाँ लेख्नुहोस्..."></textarea>
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">प्रतिक्रिया पेश गर्नुहोस्</button>
                </div>
            </form>
        @else
            <div class="alert alert-info text-center" style="border-radius: 8px;">तपाईंले अहिलेसम्म कुनै तालिम पूरा गर्नुभएको छैन। प्रतिक्रिया दिन तालिम पूरा गरेपछि फर्क आउनुहोस्।</div>
        @endif
    </div>
@endsection
