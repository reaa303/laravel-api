@extends('layouts.app')

@section('content')
<div style="background:#f3f4f6; min-height:100vh; padding:24px; font-family: system-ui;">

  <h2 style="color:#111827; margin-bottom:16px;">Assessment Manager - Add Grade Form</h2>

  <div style="background:#ffffff; max-width:500px; width:100%; margin:0 auto; padding:24px; border-radius:6px; box-shadow:0 1px 3px rgba(0,0,0,0.1);">
    
    <form action="{{ route('products.store') }}" method="POST">
      @csrf
      
      {{-- Student Name --}}
      <label style="display:block; font-size:14px; font-weight:600; margin-bottom:8px; color:#111827;">
        Student Name (required, min 3 chars)
      </label>
      <input type="text" name="name" required minlength="3" 
             placeholder="e.g. Juan Dela Cruz"
             style="width:100%; height:48px; font-size:16px; padding:0 12px; border:1px solid #d1d5db; border-radius:6px; box-sizing:border-box; margin-bottom:16px;">
      @error('name')<span style="color:#dc2626; font-size:13px;">{{ $message }}</span>@enderror

      {{-- Subject --}}
      <label style="display:block; font-size:14px; font-weight:600; margin-bottom:8px; color:#111827;">
        Subject (required)
      </label>
      <input type="text" name="subject" required
             placeholder="e.g. Math"
             style="width:100%; height:48px; font-size:16px; padding:0 12px; border:1px solid #d1d5db; border-radius:6px; box-sizing:border-box; margin-bottom:16px;">
      
      {{-- Grade --}}
      <label style="display:block; font-size:14px; font-weight:600; margin-bottom:8px; color:#111827;">
        Grade (required, 0-100)
      </label>
      <input type="number" name="price" required min="0" max="100"
             placeholder="e.g. 85"
             style="width:100%; height:48px; font-size:16px; padding:0 12px; border:1px solid #d1d5db; border-radius:6px; box-sizing:border-box; margin-bottom:16px;">
      
      {{-- Remarks --}}
      <label style="display:block; font-size:14px; font-weight:600; margin-bottom:8px; color:#111827;">
        Remarks (optional, max 255)
      </label>
      <textarea name="description" maxlength="255" rows="3"
                placeholder="e.g. Good performance"
                style="width:100%; font-size:16px; padding:12px; border:1px solid #d1d5db; border-radius:6px; box-sizing:border-box; margin-bottom:24px; resize:none;"></textarea>

      {{-- Submit --}}
      <button type="submit" 
              style="width:100%; height:48px; background:#000000; color:#ffffff; border:none; border-radius:6px; font-size:16px; font-weight:600; cursor:pointer;">
        Submit Grade
      </button>

      <style>
        button:focus{ outline: 3px solid #2563eb; outline-offset:2px; }
        input:focus, textarea:focus{ outline: 3px solid #2563eb; border-color:#2563eb; }
      </style>

    </form>
  </div>

  <a href="/products" style="display:block; margin-top:16px; color:#4f46e5; font-size:14px;">Back to Assessment List</a>
</div>
@endsection
