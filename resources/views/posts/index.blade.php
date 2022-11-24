@extends('layouts.timeline')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8 mb-3">
            <div class="card">
                <div class="card-header">ホーム</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('posts.store') }}">
                        @csrf

                        <div class="form-group row mb-0">
                            <div class="col-md-12 p-3 w-100 d-flex">
                               
                                <div class="ml-2 d-flex flex-column">
                                    <p class="mb-0">{{ $user->name }}</p>
                                    <a href="{{ url('users/' .$user->id) }}" class="text-secondary">{{ $user->screen_name }}</a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control @error('text') is-invalid @enderror" name="text" placeholder="いまどうしてる？" required autocomplete="text" rows="1">{{ old('text') }}</textarea>

                                @error('text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-right">
                                <p class="mb-4 text-danger">140文字以内</p>
                                <button type="submit" class="btn btn-primary">
                                    つぶやく
                                </button>
                            </div>
                        </div>
                    </form>

                    
                </div>
            </div>
        </div>
        @if (isset($timelines))
            @foreach ($timelines as $timeline)
                <div class="col-md-8 mb-1">
                    <div class="card">
                        <div class="card-haeder p-2 w-100 d-flex">
                            
                            <div class="ml-2 d-flex flex-column ">
                                <p class="post_user">{{ $timeline->user->user_id }}</p>
                            </div>
                            <div class="d-flex justify-content-end flex-grow-1">
                                <p class="mb-0 text-secondary">{{ $timeline->created_at->format('Y-m-d H:i') }}</p>
                            </div>
                        </div>
                        <div class="card-body">
                            {!! nl2br(e($timeline->body)) !!}
                            @if ($timeline->user->id === Auth::user()->id)
                                
                            <div class="d-flex justify-content-end flex-grow-1">        
                                <form method="POST" action="{{ url('posts/' .$timeline->id) }}" class="mb-0">
                                         @csrf
                                         @method('DELETE')
                                    <button type="submit" class="btn-sm btn-outline-secondary">削除</button>
                                </form>
                            </div>        
                                
                            @endif
                        </div>
                        
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <div class="my-4 d-flex justify-content-center">
        {{ $timelines->links() }}
    </div>
</div>
@endsection