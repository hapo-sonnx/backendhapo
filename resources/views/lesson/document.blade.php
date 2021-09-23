<div class="container-fluid document-container">
    <div class="row">
        <div class="col-lg-12 title-documents">
            <p>Documents</p>
        </div>
        <div class="col-lg-12">
            @foreach ($documents as $items)
                <hr>
                <div class="row">
                    <div class="col-lg-1 pr-0 type-file-container align-self-center">
                        <img class="pdf" @if ($items->type == 'pdf')
                        src="{{ asset('image/') }}" alt="pdf"
                    @elseif ($items->type == 'docx')
                        src="{{ asset('image/') }}" alt="docx"
                    @elseif ($items->type == 'mp4')
                        src="{{ asset('image/') }}" alt="docx"
            @endif
            >
        </div>
        <div class="col-lg-6 pl-0 name-file-container align-self-center">
            <a href="" class="title">{{ $items->description }}</a>
        </div>
        <div class="col-lg-5 button-preview-container align-self-center">
            <a href="{{ url('view', $items->id) }}" target="_blank" rel="noopener norefer">Review</a>
        </div>
    </div>
    @endforeach
</div>
</div>
</div>
