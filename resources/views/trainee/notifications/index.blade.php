@extends('trainee.includes.main')
@section('title', 'सूचनाहरू')
@section('page-title')
    सूचनाहरू
@endsection
@section('content')
    <div class="glass-card">
        <div class="card-header">
            <h2 class="card-title">
                <i class="bi bi-bell"></i>
                सूचनाहरू
            </h2>
        </div>
        @if($notifications->count() > 0)
            <div class="list-group">
                @foreach($notifications as $notification)
                    <div class="list-group-item" style="border: 1px solid #e5e7eb; border-radius: 8px; padding: 12px; margin-bottom: 10px;">
                        <h6 class="mb-1 fw-bold">{{ $notification->data['title'] ?? 'सूचना' }}</h6>
                        <p class="mb-1 small text-muted">{{ $notification->data['message'] ?? '' }}</p>
                        <small class="text-muted">{{ $notification->created_at }}</small>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info text-center" style="border-radius: 8px;">कुनै सूचना उपलब्ध छैन।</div>
        @endif
    </div>
@endsection
